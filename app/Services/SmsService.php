<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    protected $apiKey;
    protected $lineNumber;
    protected $baseUrl;

    /**
     * در زمان ساخته شدن این کلاس، اطلاعات را از فایل config می‌خواند
     */
    public function __construct()
    {
        $this->apiKey = config('services.sms_ir.api_key');
        $this->lineNumber = config('services.sms_ir.line_number');
        $this->baseUrl = config('services.sms_ir.base_url');
    }

    /**
     * متد اصلی برای ارسال پیامک
     *
     * @param array $mobiles آرایه‌ای از شماره موبایل‌ها
     * @param string $messageText متن پیام
     * @return array|null
     */
    public function send(array $mobiles, string $messageText)
    {
        if (empty($this->apiKey)) {
            // می‌توانید اینجا لاگ (Log) هم بفرستید
            return ['error' => 'API Key for SMS service is not set.'];
        }
        //dd($this->lineNumber);
        // استفاده از HTTP Client لاراول به جای cURL
        $response = Http::withoutVerifying()->withHeaders([
            'X-API-KEY' => $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($this->baseUrl . '/send/bulk', [
            'lineNumber' => '30001333001215',
            'messageText' => $messageText,
            'mobiles' => $mobiles,
            'sendDateTime' => null, // برای ارسال آنی
        ]);

        // برگرداندن پاسخ به صورت آرایه
        return $response->json();
    }

    /**
     * یک متد کمکی برای ارسال تکی (مثلاً برای OTP)
     *
     * @param string $mobile شماره موبایل
     * @param string $messageText متن پیام
     * @return array|null
     */
    public function sendOtp(string $mobile, string $code)
    {if (empty($this->apiKey)) {
        // می‌توانید اینجا لاگ (Log) هم بفرستید
        return ['error' => 'API Key for SMS service is not set.'];
    }
        //dd($this->lineNumber);
        // استفاده از HTTP Client لاراول به جای cURL
        $response = Http::withoutVerifying()->withHeaders([
            'X-API-KEY' => $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($this->baseUrl . '/send/verify', [
            'lineNumber' => '30001333001215',
            'TemplateId' => '253074',
            'Mobile' => $mobile,
            'Parameters' => [
                [
                    'Name' => 'NUM',
                    'Value'=> $code,
                ],
            ],
        ]);

        // برگرداندن پاسخ به صورت آرایه
        return $response->json();
    }
}
