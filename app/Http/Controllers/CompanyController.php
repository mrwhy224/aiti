<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Company;
use App\Models\CompanyAttribute;
use App\Notifications\CompanyReviewSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categories()
    {
        return view('layouts.vuexy.pages.admin.company_category');
    }

    public function finance()
    {
        return view('layouts.vuexy.pages.admin.finance');
    }
    public function list()
    {
        return view('layouts.vuexy.pages.admin.current_company');
    }
    public function pending()
    {
        return view('layouts.vuexy.pages.admin.pending_company');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function review(Company $company)
    {
        $requiredTypes = [
            'gazette-changes' => 'روزنامه رسمی تغییرات',
            'gazette-capital' => 'روزنامه رسمی سرمایه',
            'establishment-license' => 'جواز تاسیس',
            'operation-license' => 'پروانه بهره برداری',
            'insurance-list' => 'لیست بیمه',
            'logo' => 'لوگوی شرکت',
            'personnel-photo' => 'عکس پرسنلی',
        ];

        $attachments = Attachment::where('attachable_id', $company->id)
            ->where('attachable_type', get_class($company))
            ->get()
            ->keyBy('original_name');

        $attributes = $company->companyAttributes()->pluck('value', 'name');
        return view('layouts.vuexy.pages.admin.company_review', [
            'company' => $company,
            'attachments' => $attachments,
            'requiredTypes' => $requiredTypes,
            'attributes' => $attributes
        ]);
    }
    public function submitReview(Request $request, Company $company)
    {
        // ۱. اعتبارسنجی داده‌های ورودی از JS
        $validator = Validator::make($request->all(), [
            'decisions' => 'required|array',
            'decisions.*.status' => 'required|in:approved,rejected', // وضعیت باید یکی از این دو باشد
            'decisions.*.reason' => 'nullable|string|max:500',
            'overall_comment' => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'داده‌های ارسالی نامعتبر است.'], 422);
        }

        $decisions = $request->input('decisions');
        $overallComment = $request->input('overall_comment');

        $rejectedItems = []; // آرایه‌ای برای نگهداری موارد رد شده (برای نوتیفیکیشن)
        $allApproved = true; // فرض اولیه: همه تایید هستند

        // لیست عناوین فارسی (برای نوتیفیکیشن)
        $documentTitles = [
            'gazette-changes' => 'روزنامه رسمی تغییرات',
            'gazette-capital' => 'روزنامه رسمی سرمایه',
            'establishment-license' => 'جواز تاسیس',
            'operation-license' => 'پروانه بهره برداری',
            'insurance-list' => 'لیست بیمه',
            'logo' => 'لوگوی شرکت',
            'personnel-photo' => 'عکس پرسنلی',
        ];

        try {
            DB::beginTransaction();

            // ۲. پردازش و ذخیره در دیتابیس
            foreach ($decisions as $docType => $data) {
                $status = $data['status'];
                $reason = $data['reason'] ?? null;

                if ($status == 'approved') {
                    CompanyAttribute::updateOrCreate(
                        ['company_id' => $company->id, 'name' => $docType],
                        ['value' => 'confirmed']
                    );
                }
                elseif ($status == 'rejected') {
                    // اگر رد شده: وضعیت 'rejected' و ثبت دلیل رد
                    $allApproved = false; // چون یکی رد شده، کل پرونده تایید نیست
                    CompanyAttribute::updateOrCreate(
                        ['company_id' => $company->id, 'name' => $docType],
                        ['value' => 'rejected']
                    );

                    // افزودن به لیست برای ارسال در نوتیفیکیشن
                    $rejectedItems[] = [
                        'title' => $documentTitles[$docType] ?? $docType, // عنوان فارسی
                        'reason' => $reason ?? 'دلیل مشخصی ثبت نشده است.',
                    ];
                }
                // اگر status == 'uploaded' بود (که JS ما جلویش را می‌گیرد)، اینجا هیچ کاری نمی‌کنیم
            }

            DB::commit(); // ثبت نهایی تغییرات در دیتابیس

        } catch (\Exception $e) {
            DB::rollBack(); // بازگرداندن تغییرات در صورت خطا
            Log::error('خطا در ثبت بررسی ادمین: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'خطایی در ذخیره اطلاعات رخ داد.'], 500);
        }

        // ۳. ارسال نوتیفیکیشن به کاربران شرکت
        $usersToNotify = $company->users; // <-- باید رابطه users() در مدل Company تعریف شده باشد

        if ($usersToNotify && $usersToNotify->isNotEmpty()) {
            Notification::send($usersToNotify, new CompanyReviewSubmitted(
                $overallComment,
                $rejectedItems,
                $allApproved
            ));
        }

        // ۴. بازگرداندن پاسخ موفقیت آمیز
        return response()->json(['success' => true, 'message' => 'بررسی با موفقیت ثبت شد و به کاربر اطلاع‌رسانی گردید.']);
    }

    public function download(Company $company, $documentType)
    {
        $attachment = Attachment::where('attachable_id', $company->id)
            ->where('attachable_type', get_class($company))
            ->where('original_name', $documentType)
            ->first();

        if (!$attachment)
            abort(404, 'فایل مورد نظر یافت نشد.');

        if (!Storage::disk('local')->exists($attachment->file_path))
            abort(404, 'فایل روی سرور یافت نشد.');

        return Storage::disk('local')->response($attachment->file_path);
    }
}
