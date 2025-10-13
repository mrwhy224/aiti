@extends('layouts.vuexy.layout')

@section('title', 'کارتابل')

{{-- استایل‌های اختصاصی برای صفحه کارتابل (نسخه اصلاح‌شده با اسکرول داخلی) --}}
@push('page-style')
<style>
    /* 1. ارتفاع ثابت برای کل کامپوننت کارتابل */
    .inbox-application {
        height: calc(100vh - 12rem);

         /* ارتفاع متناسب با صفحه نمایش، با کسر ارتفاع هدر و فوتر */
    }

    /* 2. تنظیم ارتفاع 100% برای بدنه اصلی کارت */
    .inbox-application .card-body {
        height: 100%;
    }

    /* 3. استفاده از Flexbox برای مدیریت ستون‌ها */
    .inbox-list,
    .inbox-detail-content {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    /* 4. تعریف بخش‌های اسکرول شونده */
    .inbox-list-scroll,
    .inbox-detail-scroll {
        flex-grow: 1; /* این بخش تمام فضای خالی موجود را پر می‌کند */
        overflow-y: auto; /* اسکرول عمودی فقط در صورت نیاز فعال می‌شود */
        position: relative;
    }

    /* استایل‌های ظاهری */
    .inbox-list .list-group-item.active {
        background-color: #7367f0;
        color: white;
        border-color: #7367f0;
    }
    .inbox-list .list-group-item.active .text-muted {
        color: #e0e0e0 !important;
    }
</style>
@endpush

@section('content')
    {{-- Breadcrumbs --}}
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">کارتابل</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">داشبورد</li>
                            <li class="breadcrumb-item active">پیام‌ها و اعلان‌ها</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcrumbs --}}


    {{-- Main Content - Inbox Application --}}
    <div class="card inbox-application" style="max-height: 75vh;">
        <div class="card-body p-0 d-flex" style="overflow-y: hidden;">
            
            <div class="inbox-menu col-md-3 col-lg-2 border-end" style="overflow-y: auto;">
                <div class="p-2">
                    <button class="btn btn-primary w-100" type="button">ارسال پیام جدید</button>
                </div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link active d-flex align-items-center">
                            <i data-feather="mail" class="me-1"></i>
                            <span class="flex-grow-1">صندوق ورودی</span>
                            <span class="badge bg-primary rounded-pill">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center">
                            <i data-feather="message-square" class="me-1"></i>
                            <span class="flex-grow-1">تیکت‌ها</span>
                             <span class="badge bg-danger rounded-pill">2</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center">
                            <i data-feather="bell" class="me-1"></i>
                            <span class="flex-grow-1">اعلان‌ها</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center">
                            <i data-feather="send" class="me-1"></i>
                            <span class="flex-grow-1">ارسال شده</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center">
                           <i data-feather="archive" class="me-1"></i>
                            <span class="flex-grow-1">آرشیو</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="inbox-list col-md-4 col-lg-3 border-end" style="overflow-y: auto;">
                <div class="p-2 border-bottom">
                     <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو..." />
                    </div>
                </div>
                <div class="inbox-list-scroll list-group list-group-flush">
                    {{-- آیتم نمونه - این بخش با حلقه @foreach پر می‌شود --}}
                    <div class="list-group-item list-group-item-action active">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-1">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" width="32" height="32">
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="mb-0 fw-bolder">علی رضایی</h6>
                                <p class="text-truncate mb-0">موضوع: درخواست بازبینی فاکتور</p>
                            </div>
                             <small class="text-muted">دیروز</small>
                        </div>
                    </div>
                     <div class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-1 bg-light-danger">
                                <span class="avatar-content">پ</span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="mb-0">پشتیبانی</h6>
                                <p class="text-truncate mb-0 text-muted">تیکت #5678 پاسخ داده شد</p>
                            </div>
                            <span class="badge bg-danger rounded-pill" title="پیام خوانده نشده"></span>
                        </div>
                    </div>
                     <div class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                             <div class="avatar me-1">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-2.jpg') }}" alt="avatar" width="32" height="32">
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="mb-0">سارا محمدی</h6>
                                <p class="text-truncate mb-0 text-muted">با تشکر از شما</p>
                            </div>
                            <small class="text-muted">۲ روز پیش</small>
                        </div>
                    </div>
                    {{-- اضافه کردن آیتم‌های بیشتر برای تست اسکرول --}}
                    @for ($i = 0; $i < 15; $i++)
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                             <div class="avatar me-1 bg-light-secondary">
                                <span class="avatar-content">{{ $i }}</span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="mb-0">کاربر تستی {{ $i }}</h6>
                                <p class="text-truncate mb-0 text-muted">این یک پیام آزمایشی برای تست اسکرول است</p>
                            </div>
                            <small class="text-muted">{{ $i }} روز پیش</small>
                        </div>
                    </div>
                    @endfor
                     {{-- پایان آیتم نمونه --}}
                </div>
            </div>

            <div class="inbox-detail-content col-md-5 col-lg-7" style="overflow-y: auto;">
                {{-- هدر بخش محتوا --}}
                <div class="d-flex justify-content-between align-items-center p-2 border-bottom">
                    <h5 class="mb-0">موضوع: درخواست بازبینی فاکتور</h5>
                    <div>
                        <button class="btn btn-sm btn-icon btn-flat-secondary"><i data-feather="printer"></i></button>
                        <button class="btn btn-sm btn-icon btn-flat-secondary"><i data-feather="trash-2"></i></button>
                    </div>
                </div>

                {{-- محتوای پیام‌ها (بخش اسکرول) --}}
                <div class="inbox-detail-scroll p-2">
                    {{-- کارت پیام اصلی --}}
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="avatar me-1">
                                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" width="36" height="36">
                                </div>
                                <div>
                                    <h6 class="mb-0">علی رضایی</h6>
                                    <small class="text-muted">ali.rezaei@example.com</small>
                                </div>
                            </div>
                            <small class="text-muted">دیروز، ساعت ۱۶:۳۰</small>
                        </div>
                        <div class="card-body">
                            <p>سلام و وقت بخیر،</p>
                            <p>احتراماً، فاکتور شماره F-12045 که به تازگی برای بنده صادر شده دارای مغایرت در بخش هزینه حمل و نقل است. لطفاً جهت بررسی و اصلاح آن اقدام فرمایید.</p>
                            <p>با تشکر فراوان</p>
                        </div>
                    </div>
                     {{-- کارت پاسخ --}}
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="avatar me-1 bg-light-primary">
                                    <span class="avatar-content">ش</span>
                                </div>
                                <div>
                                    <h6 class="mb-0">شما (پشتیبانی)</h6>
                                    <small class="text-muted">پاسخ به علی رضایی</small>
                                </div>
                            </div>
                            <small class="text-muted">امروز، ساعت ۰۹:۱۵</small>
                        </div>
                        <div class="card-body">
                           <p>سلام جناب رضایی،</p>
                           <p>موضوع توسط واحد مالی در حال بررسی است. نتیجه در اسرع وقت به اطلاع شما خواهد رسید.</p>
                        </div>
                    </div>
                </div>

                 {{-- بخش ارسال پاسخ --}}
                <div class="p-2 border-top">
                     <h5 class="mb-1">ارسال پاسخ</h5>
                     {{-- در اینجا می‌توانید یک ویرایشگر متن حرفه‌ای مثل Quill یا TinyMCE قرار دهید --}}
                     <div class="border rounded p-1 mb-1" style="min-height: 150px;">
                        محتوای پاسخ شما...
                     </div>
                     <button class="btn btn-primary">
                        <i data-feather="send" class="me-1"></i>
                        ارسال
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection


{{-- اسکریپت‌های لازم برای تعامل اولیه --}}
@push('page-script')
<script>
    // فعال‌سازی آیکون‌های Feather
    if (feather) {
        feather.replace({
            width: 18,
            height: 18
        });
    }

    // یک اسکریپت ساده برای شبیه‌سازی انتخاب آیتم در لیست
    document.querySelectorAll('.inbox-list .list-group-item-action').forEach(item => {
        item.addEventListener('click', event => {
            // حذف کلاس active از آیتم قبلی
            const currentActive = document.querySelector('.inbox-list .list-group-item.active');
            if (currentActive) {
                currentActive.classList.remove('active');
            }
            // افزودن کلاس active به آیتم کلیک شده
            event.currentTarget.classList.add('active');

            // TODO: در اینجا باید با AJAX محتوای آیتم جدید را بارگذاری کنید
        });
    });
</script>
@endpush