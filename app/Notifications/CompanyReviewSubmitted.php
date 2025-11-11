<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CompanyReviewSubmitted extends Notification  // برای ارسال در صف
{
    use Queueable;

    protected $overallComment;
    protected $rejectedItems;
    protected $isFullyApproved;

    /**
     * @param string|null $overallComment پیام کلی ادمین
     * @param array $rejectedItems آرایه‌ای از موارد رد شده
     * @param bool $isFullyApproved آیا کل پرونده تایید نهایی شد؟
     */
    public function __construct($overallComment, $rejectedItems, $isFullyApproved)
    {
        $this->overallComment = $overallComment;
        $this->rejectedItems = $rejectedItems;
        $this->isFullyApproved = $isFullyApproved;
    }

    /**
     * کانال‌های ارسال (ایمیل، دیتابیس و...)
     */
    public function via($notifiable)
    {
        return ['database']; // ارسال ایمیل و ذخیره در دیتابیس
    }

    /**
     * فرمت‌بندی ایمیل ارسالی
     */
    public function toMail($notifiable)
    {
        $mail = new MailMessage;

        // بر اساس وضعیت نهایی، عنوان و متن ایمیل تغییر می‌کند
        if ($this->isFullyApproved) {
            // --- حالت تایید کامل ---
            $mail->subject('پرونده عضویت شما تایید شد')
                ->greeting('تبریک!')
                ->line('پرونده عضویت شما در انجمن به طور کامل بررسی و تایید گردید.');
        } else {
            // --- حالت رد شده (نیاز به بازبینی) ---
            $mail->subject('پرونده شما نیاز به بازبینی دارد')
                ->greeting('اطلاعیه بررسی پرونده')
                ->line('پرونده عضویت شما توسط ادمین بررسی شد. متاسفانه، برخی از مدارک شما نیاز به اصلاح دارند.');
        }

        // ۱. اضافه کردن لیست موارد رد شده (اگر وجود داشته باشد)
        if (!empty($this->rejectedItems)) {
            $mail->line('---'); // خط جداکننده
            $mail->line('**موارد نیازمند اصلاح:**');

            foreach ($this->rejectedItems as $item) {
                $mail->line("<strong>{$item['title']}:</strong>"); // عنوان فایل (مثلاً: لوگوی شرکت)
                $mail->line($item['reason']); // دلیل رد (مثلاً: کیفیت پایین است)
            }
            $mail->line('---'); // خط جداکننده
        }

        // ۲. اضافه کردن پیام کلی ادمین (اگر وجود داشته باشد)
        if (!empty($this->overallComment)) {
            $mail->line('**پیام کلی ادمین:**');
            $mail->line(nl2br(e($this->overallComment))); // e() برای امنیت و nl2br() برای حفظ خطوط
        }

        // ۳. دکمه اقدام (Action Button)
        $mail->action('مشاهده و اصلاح پرونده', route('upload_documents')) // لینک به صفحه آپلود مدارک
        ->salutation('با تشکر،');

        return $mail;
    }

    /**
     * فرمت‌بندی برای ذخیره در دیتابیس (برای نوتیفیکیشن‌های داخل پنل)
     */
    public function toDatabase($notifiable)
    {
        $title = $this->isFullyApproved ? 'پرونده شما تایید شد' : 'پرونده شما نیاز به بازبینی دارد';

        // ۲. ساخت متن پیام (Message Body)
        $messageLines = [];
        $messageLines[] = "سلام و وقت بخیر،";

        if ($this->isFullyApproved) {
            $messageLines[] = "پرونده عضویت شما به طور کامل بررسی و تایید گردید.";
        } else {
            $messageLines[] = "پرونده شما بررسی شد. متاسفانه، برخی از مدارک شما نیاز به اصلاح دارند.";
        }

        if (!empty($this->rejectedItems)) {
            $messageLines[] = "\n**موارد نیازمند اصلاح:**";
            foreach ($this->rejectedItems as $item) {
                // استفاده از فرمت لیست (Markdown)
                $reason = $item['reason'] ?? 'دلیل مشخصی ثبت نشده است.';
                $messageLines[] = "- **{$item['title']}**: {$reason}";
            }
        }
        if (!empty($this->overallComment)) {
            $messageLines[] = "\n**پیام کلی ادمین:**";
            $messageLines[] = $this->overallComment;
        }
        $messageLines[] = "\nبا تشکر.";
        $messageString = implode("\n", $messageLines);
        return [
            'title'      => $title,
            'type'       => 'SYSTEM',
            'action_url' => route('upload_documents'),

            // --- بخش اضافه شده ---
            'message'    => $messageString,
            // --------------------

            'details' => [
                'rejected_items' => $this->rejectedItems,
                'comment' => $this->overallComment
            ]
        ];
    }
}
