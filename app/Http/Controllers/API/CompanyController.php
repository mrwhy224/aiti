<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return response()->success('Response was rendered successfully', CompanyResource::collection(Company::with('manager')->where('is_confirmed', 1)->get()));
    }

    public function pending(Request $request)
    {
        return response()->success('Response was rendered successfully', CompanyResource::collection(Company::with('manager')->where('is_confirmed', 0)->get()));
    }
    public function store(Request $request)
    {
        // 1. اعتبارسنجی داده‌های ورودی
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'company_id' => 'required|string|max:255|unique:companies,national_id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'national_code' => 'required|string|max:10|unique:users,national_code',
            'phone' => 'required|string|regex:/^09\d{9}$/|unique:users,phone',
            'role_id' => 'required|integer|exists:roles,id', // تغییر یافته: ولیدیشن برای role_id
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // 2. شروع ترنزاکشن دیتابیس
            $result = DB::transaction(function () use ($request) {
                // الف) ایجاد شرکت
//                $company = Company::create([
//                    'name' => $request->input('company_name'),
//                    'national_id' => $request->input('company_id'),
//                    // سایر فیلدهای مربوط به شرکت را اینجا اضافه کنید
//                ]);

                // ب) تولید کد تایید (OTP)
                // در محیط واقعی این کد باید کاملا تصادفی باشد
                $otpCode = '12345'; // برای تست، یک مقدار ثابت در نظر گرفته شده است
                // $otpCode = rand(10000, 99999);
                $otpExpiresAt = Carbon::now()->addMinutes(5); // کد تا ۵ دقیقه معتبر است

                // ج) ایجاد کاربر و اتصال به شرکت
                $user = User::create([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'national_code' => $request->input('national_code'),
                    'phone' => $request->input('phone'),
//                    'role_id' => $request->input('role_id'), // تغییر یافته: ذخیره role_id

                    'password' => bcrypt($request->input('phone')), // یک پسورد تصادفی برای شروع
                    'otp_code' => $otpCode,
                    'otp_expires_at' => $otpExpiresAt,
                ]);
                UserRole::create([
                   'user_id' => $user->id,
                    'role_id' => 1,
                ]);
                $company = Company::create([
                    'name' => $request->input('company_name'),
                    'national_id' => $request->input('company_id'),
                    'creator_id' => $user->id,
                ]);
                $user->company_id = $company->id;
                $user->save();
                return [
                    'user' => $user,
                    'company' => $company,
                    'otp_for_testing' => $otpCode // این خط فقط برای راحتی در تست است و در محیط نهایی باید حذف شود
                ];
            });

            // 3. بازگرداندن پاسخ موفقیت‌آمیز
            return response()->json([
                'message' => 'اطلاعات با موفقیت ثبت شد. کد تایید به شماره موبایل شما ارسال گردید.',
                'data' => $result
            ], 201);

        } catch (\Exception $e) {
            // 4. بازگرداندن خطا در صورت شکست ترنزاکشن
            // لاگ کردن خطا برای بررسی‌های بعدی
            \Log::error('خطا در ثبت نام شرکت: ' . $e->getMessage());

            return response()->json([
                'message' => 'خطایی در هنگام ثبت اطلاعات رخ داد. لطفا دوباره تلاش کنید.'
            ], 500);
        }
    }

    /**
     * مرحله دوم: بررسی کد تایید (OTP) ارسال شده توسط کاربر.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyOtp(Request $request)
    {
        // 1. اعتبارسنجی داده‌های ورودی
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|regex:/^09\d{9}$/',
            'verification_code' => 'required|string|digits:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // 2. پیدا کردن کاربر بر اساس شماره موبایل
        $user = User::where('phone', $request->input('phone'))->first();

        if (!$user) {
            return response()->json(['message' => 'کاربری با این شماره موبایل یافت نشد.'], 404);
        }

        // 3. بررسی صحت کد و تاریخ انقضای آن
        if ($user->otp_code !== $request->input('verification_code')) {
            return response()->json(['message' => 'کد تایید نامعتبر است.'], 400);
        }

        if (Carbon::now()->isAfter($user->otp_expires_at)) {
            return response()->json(['message' => 'کد تایید منقضی شده است. لطفا مجددا درخواست دهید.'], 400);
        }

        // 4. در صورت موفقیت، کاربر را تایید کرده و فیلدهای OTP را پاک می‌کنیم
        $user->phone_verified_at = now();
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();

        // می‌توانید در اینجا یک توکن برای احراز هویت کاربر صادر کنید
        // $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'شماره موبایل با موفقیت تایید شد. می‌توانید به مرحله بعد بروید.',
            // 'token' => $token
        ], 200);
    }

}
