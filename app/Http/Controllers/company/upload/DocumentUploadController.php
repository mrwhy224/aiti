<?php

namespace App\Http\Controllers\company\upload;


use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\CompanyAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DocumentUploadController extends Controller
{
    public function download(Request $request, $documentType)
    {
        $user = Auth::user();
        if (!$user->company)
            abort(403, 'شما به هیچ شرکتی وابسته نیستید.');

        $company = $user->company;
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

    public function showUploadPage(Request $request)
    {
        $user = Auth::user();
        $company = $user->company;
        $latestNotificationMessage = null;
        if ($request->has('notification_id')) {
            $notification = $user->notifications()->find($request->notification_id);
            if ($notification && $notification->unread()) {
                $notification->markAsRead();
                $latestNotificationMessage = $notification->data['message'] ?? null;
            }
        }
        if (!$company) {
            $attachments = collect();
            $attributes = collect();
        }
        else {
            $attachments = Attachment::where(['attachable_id' => $company->id, 'attachable_type' => get_class($company)])->get()->keyBy('original_name');
            $attributes = CompanyAttribute::where('company_id', $company->id)->get()->keyBy('name');
        }

        return view('layouts.vuexy.pages.company.upload', [
            'attachments' => $attachments,
            'attributes'  => $attributes,
            'latestNotificationMessage' => $latestNotificationMessage,
        ]);
    }

    /**
     * ذخیره فایل‌های آپلود شده بر اساس نوع سند
     *
     * @param Request $request
     * @param string $documentType <-- این همان پارامتر روت است
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $documentType)
    {
        // ۱. تعریف عناوین فایل‌ها برای اعتبارسنجی و پیغام‌ها
        $allowedTypes = [
            'gazette-changes' => 'روزنامه رسمی تغییرات',
            'gazette-capital' => 'روزنامه رسمی سرمایه',
            'establishment-license' => 'جواز تاسیس',
            'operation-license' => 'پروانه بهره برداری',
            'insurance-list' => 'لیست بیمه',
            'logo' => 'لوگوی شرکت',
            'personnel-photo' => 'عکس پرسنلی',
        ];

        // ۲. اعتبارسنجی نوع سند (آیا عنوانی که فرستاده مجاز است؟)
        if (!array_key_exists($documentType, $allowedTypes)) {
            return response()->json(['message' => 'نوع سند نامعتبر است.'], 400);
        }

        // ۳. اعتبارسنجی فایل (بر اساس نوع سند)
        $imageRules = 'required|file|image|mimes:jpeg,png,jpg|max:2048'; // ۲ مگابایت برای عکس
        $fileRules = 'required|file|mimes:jpeg,png,jpg,pdf|max:5120';  // ۵ مگابایت برای فایل (عکس یا PDF)

        $rules = ($documentType == 'logo' || $documentType == 'personnel-photo') ? $imageRules : $fileRules;

        $validator = Validator::make($request->all(), [
            'file' => $rules,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'فایل ارسالی معتبر نیست.',
                'errors' => $validator->errors()
            ], 422); // 422 = Unprocessable Entity
        }

        // ۴. دریافت کاربر لاگین کرده
        $user = $request->user();

        // ۵. ذخیره‌سازی فایل
        try {
            $file = $request->file('file');

            // ساخت یک مسیر اختصاصی برای کاربر و نوع سند
            // مثلا: documents/user_1/logo
            $attachableId = $user->id;

            // ۳. ذخیره فایل در دیسک خصوصی (local)
            // مسیر فایل چیزی شبیه: storage/app/documents/user_1/logo.png
            $path = $file->storeAs(
                "documents/user_{$attachableId}", // پوشه‌ی اختصاصی کاربر
                $documentType . '.' . $file->getClientOriginalExtension(), // نام فایل بر اساس نوع سند
                'local' // استفاده از دیسک خصوصی
            );

            $mimeType = $file->getMimeType();
            $size = $file->getSize();

            $existingAttachment = Attachment::where('attachable_type', get_class($user->company))
                ->where('attachable_id', $user->company->id)
                ->where('original_name', $documentType)
                ->first();

            if ($existingAttachment) {
                Storage::disk('local')->delete($existingAttachment->file_path);
            }

            $attachment = Attachment::updateOrCreate(
                [
                    // ستون‌هایی که برای جستجو استفاده می‌شوند:
                    'attachable_type' => get_class($user->company), // مثلاً 'logo'
                    'attachable_id' => $user->company->id,   // مثلاً 1 (ID کاربر یا شرکت)
                    'original_name' => $documentType,
                ],
                [
                    // ستون‌هایی که باید آپدیت یا ایجاد شوند:
                    'file_path' => $path,
                    'mime_type' => $mimeType,
                    'size' => $size,
                ]
            );
            CompanyAttribute::updateOrCreate(
                [
                    'company_id' => $user->company->id,
                    'name' => $documentType,
                ],
                [
                    'value' => 'uploaded',
                ]);

            // ۷. ارسال پیغام موفقیت آمیز به فرانت‌اند (جاوا اسکریپت)
            return response()->json([
                'success' => true,
                'message' => "فایل '{$allowedTypes[$documentType]}' با موفقیت آپلود شد.",
                'file_name' => $documentType,
                'document_type' => $documentType,
                'url' => Storage::disk('public')->url($path) // URL قابل دسترس فایل
            ], 200); // 200 or 201 (Created)

        } catch (\Exception $e) {
            Log::error($e->getMessage()); // لاگ کردن خطا
            return response()->json([
                'success' => false,
                'message' => 'خطایی در سرور رخ داد. لطفا دوباره تلاش کنید.'
            ], 500);
        }
    }
}
