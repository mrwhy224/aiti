@extends('layouts.vuexy.layout')
@section('title', 'اطلاع رسانی')

@section('styles')
{{-- You might need a CSS file for a multi-select library like Select2 or Tom-Select --}}
<style>
    /* Custom styles for a more polished look */
    .channel-card {
        border: 2px solid #e0e0e0;
        transition: all 0.3s ease;
    }
    .channel-card.active {
        border-color: #69a297; /* brand-primary */
        box-shadow: 0 4px 15px rgba(105, 162, 151, 0.3);
        background-color: #f0f8f7;
    }
    .channel-card input:checked ~ .channel-icon {
        color: #69a297;
    }
    .recipient-tab.active {
        border-bottom-color: #69a297;
        color: #69a297;
        font-weight: 700;
    }
</style>
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">ارسال اطلاع رسانی جدید</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">داشبورد </a></li>
                            <li class="breadcrumb-item active">اطلاع رسانی</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <form action="#" method="POST" id="notification-form">
            @csrf
            <div class="row">

                <!-- Section 1: Message Content -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fas fa-pen-alt me-1"></i> ۱. محتوای پیام</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label class="form-label" for="title">عنوان پیام (برای ایمیل و پنل)</label>
                                <input type="text" id="title" class="form-control" placeholder="مثال: فراخوان حضور در نمایشگاه نساجی" name="title">
                            </div>
                            <div>
                                <label class="form-label" for="message-body">متن اصلی پیام</label>
                                <p class="text-muted small">این متن در ایمیل، پنل کاربری و (در صورت انتخاب) در پیامک ارسال خواهد شد.</p>
                                <textarea class="form-control" id="message-body" name="message_body" rows="8" placeholder="پیام خود را اینجا بنویسید..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Channels -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fas fa-paper-plane me-1"></i> ۲. کانال‌های ارسال</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Panel Channel -->
                                <div class="col-md-4">
                                    <label for="channel-panel" class="channel-card p-2 rounded-lg text-center cursor-pointer d-block">
                                        <input type="checkbox" class="form-check-input visually-hidden" id="channel-panel" name="channels[]" value="panel">
                                        <div class="channel-icon text-4xl text-gray-400 mb-2"><i class="fas fa-desktop"></i></div>
                                        <h5 class="mb-0">پیام در پنل</h5>
                                    </label>
                                </div>
                                <!-- Email Channel -->
                                <div class="col-md-4">
                                    <label for="channel-email" class="channel-card p-2 rounded-lg text-center cursor-pointer d-block">
                                        <input type="checkbox" class="form-check-input visually-hidden" id="channel-email" name="channels[]" value="email">
                                        <div class="channel-icon text-4xl text-gray-400 mb-2"><i class="fas fa-envelope-open-text"></i></div>
                                        <h5 class="mb-0">ایمیل</h5>
                                    </label>
                                </div>
                                <!-- SMS Channel -->
                                <div class="col-md-4">
                                    <label for="channel-sms" class="channel-card p-2 rounded-lg text-center cursor-pointer d-block">
                                        <input type="checkbox" class="form-check-input visually-hidden" id="channel-sms" name="channels[]" value="sms">
                                        <div class="channel-icon text-4xl text-gray-400 mb-2"><i class="fas fa-sms"></i></div>
                                        <h5 class="mb-0">پیامک (SMS)</h5>
                                    </label>
                                </div>
                            </div>
                            <!-- Conditional SMS Options -->
                            <div id="sms-options" class="mt-3 p-3 bg-light-secondary rounded-lg" style="display: none;">
                                <h6 class="mb-1">تنظیمات پیامک</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sms_type" id="sms-full" value="full" checked>
                                    <label class="form-check-label" for="sms-full">ارسال متن کامل پیام</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sms_type" id="sms-notification" value="notification">
                                    <label class="form-check-label" for="sms-notification">ارسال اطلاع‌رسانی (چک کردن پنل)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Recipients -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fas fa-users me-1"></i> ۳. انتخاب گیرندگان</h4>
                        </div>
                        <div class="card-body">
                            <!-- Recipient Tabs -->
                            <div class="border-bottom mb-3 d-flex">
                                <button type="button" class="recipient-tab btn btn-transparent border-bottom-2 border-transparent rounded-0 px-3 py-2 active" data-tab="company">شرکت</button>
                                <button type="button" class="recipient-tab btn btn-transparent border-bottom-2 border-transparent rounded-0 px-3 py-2" data-tab="representative">نماینده</button>
                                <button type="button" class="recipient-tab btn btn-transparent border-bottom-2 border-transparent rounded-0 px-3 py-2" data-tab="individual">فرد خاص</button>
                                <button type="button" class="recipient-tab btn btn-transparent border-bottom-2 border-transparent rounded-0 px-3 py-2" data-tab="manual">ارسال دستی</button>
                            </div>
                            <!-- Tab Content -->
                            <div id="recipient-tabs-content">
                                <div id="tab-company">
                                    <label class="form-label">انتخاب شرکت(ها)</label>
                                    <p class="text-muted small">پیام به تمام اعضای شرکت(های) انتخاب شده ارسال می‌شود.</p>
                                    <select class="form-select" name="companies[]" multiple>
                                        {{-- A multi-select library like Select2 should be initialized here --}}
                                        <option value="1">شرکت نساجی تهران</option>
                                        <option value="2">شرکت بافت یزد</option>
                                        <option value="3">شرکت الیاف اصفهان</option>
                                    </select>
                                </div>
                                <div id="tab-representative" style="display: none;">
                                    <label class="form-label">انتخاب شرکت(ها)</label>
                                    <p class="text-muted small">پیام فقط به نماینده اصلی شرکت(های) انتخاب شده ارسال می‌شود.</p>
                                    <select class="form-select" name="representatives[]" multiple>
                                        <option value="1">شرکت نساجی تهران</option>
                                        <option value="2">شرکت بافت یزد</option>
                                        <option value="3">شرکت الیاف اصفهان</option>
                                    </select>
                                </div>
                                <div id="tab-individual" style="display: none;">
                                     <label class="form-label">جستجوی عضو</label>
                                     <p class="text-muted small">نام یا کد عضویت فرد مورد نظر را جستجو کنید.</p>
                                     <input type="text" class="form-control" placeholder="جستجو...">
                                </div>
                                <div id="tab-manual" style="display: none;">
                                    <label class="form-label">شماره موبایل یا ایمیل</label>
                                    <p class="text-muted small">شماره‌ها یا ایمیل‌ها را با کاما (,) از هم جدا کنید.</p>
                                    <textarea class="form-control" rows="4" placeholder="09123456789, info@example.com, ..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Scheduling -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fas fa-clock me-1"></i> ۴. زمان‌بندی ارسال</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="schedule_type" id="send-now" value="now" checked>
                                <label class="form-check-label" for="send-now">ارسال فوری</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="schedule_type" id="send-later" value="later">
                                <label class="form-check-label" for="send-later">ارسال زمان‌بندی شده</label>
                            </div>
                            <div id="schedule-options" class="row mt-2 align-items-end" style="display: none;">
                                <div class="col-md-4">
                                    <label class="form-label">تاریخ ارسال</label>
                                    <input type="date" class="form-control" name="schedule_date">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">ساعت ارسال</label>
                                    <input type="time" class="form-control" name="schedule_time">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1" id="submit-button">ارسال پیام</button>
                    <button type="reset" class="btn btn-outline-secondary">لغو</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('page_js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Channel Selection Logic
        const channelCheckboxes = document.querySelectorAll('input[name="channels[]"]');
        const smsOptions = document.getElementById('sms-options');
        const smsCheckbox = document.getElementById('channel-sms');

        channelCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const card = this.closest('.channel-card');
                if (this.checked) {
                    card.classList.add('active');
                } else {
                    card.classList.remove('active');
                }
                
                // Show/hide SMS options
                if (smsCheckbox.checked) {
                    smsOptions.style.display = 'block';
                } else {
                    smsOptions.style.display = 'none';
                }
            });
        });

        // Recipient Tabs Logic
        const recipientTabs = document.querySelectorAll('.recipient-tab');
        const tabContents = document.getElementById('recipient-tabs-content').children;

        recipientTabs.forEach(tab => {
            tab.addEventListener('click', function () {
                recipientTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const targetTab = this.dataset.tab;
                
                for (let content of tabContents) {
                    content.style.display = 'none';
                }
                document.getElementById('tab-' + targetTab).style.display = 'block';
            });
        });

        // Scheduling Logic
        const scheduleRadios = document.querySelectorAll('input[name="schedule_type"]');
        const scheduleOptions = document.getElementById('schedule-options');
        const submitButton = document.getElementById('submit-button');

        scheduleRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'later') {
                    scheduleOptions.style.display = 'flex';
                    submitButton.textContent = 'زمان‌بندی ارسال';
                } else {
                    scheduleOptions.style.display = 'none';
                    submitButton.textContent = 'ارسال پیام';
                }
            });
        });
    });
</script>
@endpush
