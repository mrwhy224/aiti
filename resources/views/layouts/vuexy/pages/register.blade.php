<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="قالب ادمین Vuexy یک قالب ادمین بوت‌استرپ ۴ بسیار انعطاف‌پذیر، قدرتمند، تمیز و مدرن با امکانات نامحدود است.">
    <meta name="keywords" content="قالب ادمین، قالب ادمین Vuexy، قالب داشبورد، قالب ادمین فلت، قالب ادمین واکنش‌گرا، وب اپلیکیشن">
    <meta name="author" content="PIXINVENT">
    <title>صفحه ثبت نام چند مرحله‌ای - Vuexy - قالب ادمین بوت‌استرپ</title>
    <link rel="apple-touch-icon" href="../../../images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../images/ico/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-primary': '#69a297', // یک رنگ آبی-سبز تیره
                        'brand-secondary': '#e9d8a6', // یک رنگ کرم
                        'brand-accent': '#50808e', // یک رنگ نارنجی-طلایی
                    }
                }
            }
        }
    </script>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../vendors/css/vendors-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="../../../vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="../../../vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../css/plugins/forms/form-wizard.css">
    <link rel="stylesheet" type="text/css" href="../../../css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../css/custom-rtl.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style-rtl.css">
    <!-- END: Custom CSS-->
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
        .file-uploader {
            border: 2px dashed #d9d9d9;
            border-radius: 0.5rem;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }
        .file-uploader:hover {
            background-color: #f8f8f8;
            border-color: #7367f0;
        }
        .form-text.text-danger {
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0 justify-content-end auth-bg">
                        <!-- Brand logo-->
                        <a class="brand-logo items-center w-auto" href="index.html">
                            <img src="/logo-aiti-main.svg" class="h-[100px]">
                            <h2 class="brand-text text-brand-primary ms-1 text-xl">انجمن صنایع نساجی ایران</h2>
                        </a>
                        <div class="col-lg-10 d-flex align-items-center auth-bg px-2 px-sm-3 px-lg-5 pt-3">
                            <div class="width-700 mx-auto">
                                <div class="bs-stepper register-multi-steps-wizard shadow-none">


                                    <div class="bs-stepper-header px-0" role="tablist">
                                        <div class="step" data-target="#primary-info-step" role="tab" id="primary-info-step-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="user" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">شرایط عضویت</span>
                                                    <span class="bs-stepper-subtitle">توضیحات کلی مراحل عضویت</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"><i data-feather="chevron-right" class="font-medium-2"></i></div>
                                        <div class="step" data-target="#company-info-step" role="tab" id="company-info-step-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="briefcase" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">اطلاعات شرکت</span>
                                                    <span class="bs-stepper-subtitle">مشخصات شرکت خود را اضافه کنید</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"><i data-feather="chevron-right" class="font-medium-2"></i></div>
                                        <div class="step" data-target="#confirmation-step" role="tab" id="confirmation-step-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="check-circle" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">تکمیل ثبت نام</span>
                                                    <span class="bs-stepper-subtitle">مراحل بعدی</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>



                                    <div class="bs-stepper-content px-0 mt-4">
                                        <div id="primary-info-step" class="content" role="tabpanel" aria-labelledby="primary-info-step-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">شرایط و مدارک مورد نیاز جهت عضویت</h2>
                                                <p>خواهشمند است پیش از شروع فرآیند ثبت‌نام، موارد زیر را به دقت مطالعه فرمایید.</p>
                                            </div>
                                            
                                            <div class="mb-2">
                                                <h5 class="fw-bolder">خوش آمدید</h5>
                                                <p>جهت ثبت درخواست عضویت در انجمن صنایع نساجی ایران، اطلاعات خواسته شده در فرم درخواست عضویت را به دقت تکمیل نمایید و همچنین تصاویر مدارک خواسته شده را جهت بررسی بارگذاری نمایید.</p>
                                            </div>

                                            <div class="mb-2">
                                                <h5 class="fw-bolder">مدارک مورد نیاز</h5>
                                                <p>پیشنهاد می شود پیش از شروع ثبت درخواست، تصاویر ذیل را آماده داشته باشید:</p>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">تصویر آخرین تغییرات روزنامه رسمی / روزنامه رسمی سرمایه ثبت شده</li>
                                                    <li class="list-group-item">جواز تاسیس و پروانه بهره برداری</li>
                                                    <li class="list-group-item">تصویر آخرین لیست بیمه کارکنان</li>
                                                    <li class="list-group-item">لوگوی شرکت و عکس پرسنلی مدیرعامل</li>
                                                </ul>
                                            </div>

                                            <div class="mb-2">
                                                <h5 class="fw-bolder">شرایط عمومی</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">داشتن تابعیت جمهوری اسلامی ایران</li>
                                                    <li class="list-group-item">قبول و تعهد اجرای اساسنامه انجمن</li>
                                                    <li class="list-group-item">پرداخت هزینه های عضویت سالانه (بجز اعضای افتخاری)</li>
                                                </ul>
                                            </div>

                                            <div class="mb-2">
                                                <h5 class="fw-bolder">شرایط اختصاصی عضویت برای اعضای پیوسته</h5>
                                                <p>فعالیت در یکی از حوزه‌های زیر:</p>
                                                <p><small>انواع ریسندگی، بافندگی، رنگرزی، چاپ و تکمیل منسوجات بی بافت و ژئوتکستایل ها، انواع پتو، انواع الیاف و نخ های مصنوعی، انواع پوشاک و جوراب، انواع حوله و گونی بافته شده.</small></p>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">داشتن پروانه بهره برداری از وزارت صنعت معدن و تجارت</li>
                                                    <li class="list-group-item">برخورداری از دست کم یکی از دو شرط ذیل:
                                                        <ul class="list-group">
                                                            <li class="list-group-item border-0 py-0">- سرمایه ثبت شده در روزنامه رسمی بیش از ۵۰۰،۰۰۰،۰۰۰ ریال</li>
                                                            <li class="list-group-item border-0 py-0">- اشتغال بیش از پنجاه کارگر در واحد مذکور</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mb-2">
                                                <h5 class="fw-bolder mb-2">هزینه عضویت/تمدید</h5>
                                                <div class="row">
                                                    <!-- New Member Card -->
                                                    <div class="col-md-6 mb-1">
                                                        <div class="card border border-brand-primary shadow-sm">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title">عضویت جدید</h5>
                                                                <p class="card-text text-muted small">برای شرکت‌هایی که برای اولین بار عضو می‌شوند.</p>
                                                                <div class="my-2">
                                                                    <span class="fw-bolder fs-1 text-primary">۲۵۰,۰۰۰</span>
                                                                    <span class="text-muted">تومان / سال</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Renewal Card -->
                                                    <div class="col-md-6 mb-1">
                                                        <div class="card border border-brand-primary shadow-sm">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title">تمدید عضویت</h5>
                                                                <p class="card-text text-muted small">برای اعضای فعلی انجمن.</p>
                                                                <div class="my-2">
                                                                    <span class="fw-bolder fs-1 text-primary">۳,۰۰۰,۰۰۰</span>
                                                                    <span class="text-muted">تومان / سال</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="btn btn-outline-secondary btn-prev" disabled>
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                                </button>
                                                <button class="btn bg-brand-primary text-white btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="company-info-step" class="content" role="tabpanel" aria-labelledby="company-info-step-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">اطلاعات شرکت و متقاضی</h2>
                                                <p>متقاضی می بایست شخصی از صاحبان امضای مجاز قانونی شرکت و یا به نمایندگی از آنها باشد.</p>
                                            </div>
                                            <form id="company-info-form">
                                                <div class="row">
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="company-name">نام شرکت</label>
                                                        <input type="text" name="company_name" id="company-name" class="form-control" required />
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="company-id">شناسه ملی شرکت</label>
                                                        <input type="text" name="company_id" id="company-id" class="form-control" required />
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="role_id">سمت</label>
                                                        <!-- This should be a select dropdown populated from your roles table -->
                                                        <select name="role_id" id="role_id" class="form-control" required>
                                                            @foreach($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="first-name">نام</label>
                                                        <input type="text" name="first_name" id="first-name" class="form-control" required />
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="last-name">نام خانوادگی</label>
                                                        <input type="text" name="last_name" id="last-name" class="form-control" required />
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="national-code">کد ملی</label>
                                                        <input type="text" name="national_code" id="national-code" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="phone">شماره تلفن همراه</label>
                                                        <input type="tel" name="phone" id="phone" class="form-control" required />
                                                    </div>
                                                    <div class="mb-1 col-md-4 d-flex align-items-end" id="send-otp-btn-container">
                                                        <button type="button" id="send-otp-btn" class="btn bg-brand-primary text-white w-100">درخواست کد تایید</button>
                                                    </div>
                                                    <div class="mb-1 col-md-4 d-none" id="otp-container">
                                                        <label class="form-label" for="verification-code">کد تایید</label>
                                                        <div class="input-group">
                                                          <input type="text" name="verification_code" id="verification-code" class="form-control" placeholder="کد تایید"/>
                                                          <button class="btn btn-outline-primary" type="button" id="verify-otp-btn">تایید کد</button>
                                                          <span id="otp-status-icon" class="input-group-text d-none"><i class="fas fa-check-circle text-success"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="btn bg-brand-primary text-white btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                                </button>
                                                <button class="btn bg-brand-primary text-white" id="company-info-next">
                                                    <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div id="confirmation-step" class="content" role="tabpanel" aria-labelledby="confirmation-step-trigger">
                                            <div class="text-center">
                                                <div class="mb-2">
                                                    <i data-feather="check-circle" class="text-success" style="width: 5rem; height: 5rem;"></i>
                                                </div>
                                                <h2 class="fw-bolder mb-75">ثبت نام اولیه با موفقیت انجام شد</h2>
                                                <p class="px-2">اطلاعات اولیه شما با موفقیت در سیستم ثبت گردید. برای تکمیل فرآیند عضویت، لطفا مراحل زیر را دنبال کنید:</p>
                                                <div class="alert alert-light-primary" role="alert">
                                                    <div class="alert-body">
                                                        <ol class="text-start">
                                                            <li class="mb-1">از طریق صفحه ورود و با استفاده از شماره موبایل خود وارد حساب کاربری شوید.</li>
                                                            <li class="mb-1">در پنل کاربری، اطلاعات و مدارک مورد نیاز (مانند مدارک ثبتی شرکت، لوگو و...) را تکمیل و بارگذاری نمایید.</li>
                                                            <li>پس از تکمیل اطلاعات، درخواست شما توسط کارشناسان انجمن بررسی خواهد شد.</li>
                                                            <li class="mt-1">در صورت تایید، درگاه پرداخت برای شما فعال شده تا حق عضویت سالانه را پرداخت نمایید.</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                                <a href="/login" class="btn bg-brand-primary text-white mt-2">
                                                    <i data-feather="log-in" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">رفتن به صفحه ورود</span>
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn bg-brand-primary text-white btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">بازگشت</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="../../../vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="../../../vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="../../../vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../js/core/app-menu.js"></script>
    <script src="../../../js/core/app.js"></script>

    <!-- <script src="../../../js/scripts/pages/auth-register.js"></script> -->
    <!-- END: Theme JS-->
    
    <!-- BE<script src="../../../js/scripts/pages/auth-register.js"></script>GIN: Page JS-->
    <script>
        // This is a simplified version of auth-register.js to only handle stepper initialization
        $(function () {
            'use strict';

            // 1. Initialize Stepper ONCE
            var stepperEl = document.querySelector('.register-multi-steps-wizard');
            if (typeof stepperEl === 'undefined' || stepperEl === null) {
                return;
            }
            var modernVerticalWizard = new Stepper(stepperEl);

            // 2. Generic Button Handlers (for all steps EXCEPT step 2)
            $(stepperEl)
                .find('.btn-next')
                .not('#company-info-next') // Exclude our custom button
                .on('click', function () {
                    modernVerticalWizard.next();
                });
            
            $(stepperEl)
                .find('.btn-prev')
                .on('click', function () {
                    modernVerticalWizard.previous();
                });
        // --- Start of Custom Logic ---
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const formStep2 = document.getElementById('company-info-form');
        const allRequiredInputs = Array.from(formStep2.querySelectorAll('input[required], select[required]'));
        const phoneInput = document.getElementById('phone');
        const sendOtpBtn = document.getElementById('send-otp-btn');
        const otpContainer = document.getElementById('otp-container');
        const otpInput = document.getElementById('verification-code');
        const verifyOtpBtn = document.getElementById('verify-otp-btn');
        const otpStatusIcon = document.getElementById('otp-status-icon');
        const nextBtnStep2 = document.getElementById('company-info-next');
        const storageKey = 'registerFormStep2';

        let isOtpSent = false;
        let isOtpVerified = false;

        function saveFormState() {
            const formData = {};
            allRequiredInputs.forEach(input => { formData[input.id] = input.value; });
            formData.isOtpSent = isOtpSent;
            formData.isOtpVerified = isOtpVerified;
            if(isOtpSent){ formData[otpInput.id] = otpInput.value; }
            localStorage.setItem(storageKey, JSON.stringify(formData));
        }

        function loadFormState() {
            const savedData = localStorage.getItem(storageKey);
            if (savedData) {
                const formData = JSON.parse(savedData);
                allRequiredInputs.forEach(input => {
                    if (formData[input.id]) { input.value = formData[input.id]; }
                });
                if (formData.isOtpSent) { showOtpField(false); }
                if (formData.isOtpVerified) { setOtpVerifiedState(); }
            }
        }
        
        function areBaseFieldsValid() {
            return allRequiredInputs.every(input => input.value.trim() !== '');
        }

        function validateStep2() {
            nextBtnStep2.disabled = !(areBaseFieldsValid() && isOtpVerified);
        }

        function showOtpField() {
            otpContainer.classList.remove('d-none');
            isOtpSent = true;
            saveFormState();
            validateStep2();
        }

        function setOtpVerifiedState() {
            isOtpVerified = true;
            otpInput.disabled = true;
            verifyOtpBtn.classList.add('d-none');
            otpStatusIcon.classList.remove('d-none');
            phoneInput.disabled = true; // شماره موبایل پس از تایید غیرقابل تغییر باشد
            sendOtpBtn.disabled = true;
            sendOtpBtn.textContent = 'تایید شده';
        }

        function clearValidationErrors() {
            $('.form-text.text-danger').remove();
            $('.is-invalid').removeClass('is-invalid');
        }

        function displayValidationErrors(errors) {
            clearValidationErrors();
            $.each(errors, function (key, value) {
                const inputName = key.replace(/_/g, '-');
                const input = $('#' + inputName);
                input.addClass('is-invalid');
                input.after('<div class="form-text text-danger">' + value[0] + '</div>');
            });
        }

        sendOtpBtn.addEventListener('click', function() {
            if (!areBaseFieldsValid()) {
                alert('لطفا تمام فیلدهای ستاره‌دار را پر کنید.');
                return;
            }

            clearValidationErrors();
            sendOtpBtn.disabled = true;
            sendOtpBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> در حال ارسال...';
            
            // ارسال تمام اطلاعات فرم برای ثبت اولیه و دریافت OTP
            $.ajax({
                url: '/api/register/company', // روت ثبت شرکت
                type: 'POST',
                data: $('#company-info-form').serialize(),
                success: function(response) {
                    showOtpField();
                    sendOtpBtn.textContent = 'ارسال مجدد کد';
                },
                error: function(xhr) {
                   if (xhr.status === 422) {
                       displayValidationErrors(xhr.responseJSON.errors);
                   } else {
                       alert('خطایی در سرور رخ داد. لطفا دوباره تلاش کنید.');
                   }
                   sendOtpBtn.textContent = 'درخواست کد تایید'; // بازگرداندن متن اولیه در صورت خطا
                },
                complete: function(){
                    sendOtpBtn.disabled = false;
                }
            });
        });

        verifyOtpBtn.addEventListener('click', function() {
            if (otpInput.value.trim() === '') {
                alert('کد تایید را وارد کنید.');
                return;
            }
            verifyOtpBtn.disabled = true;
            verifyOtpBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';

            // ارسال کد برای اعتبارسنجی
            $.ajax({
                url: '/api/register/verify-otp',
                type: 'POST',
                data: {
                    phone: phoneInput.value,
                    verification_code: otpInput.value
                },
                success: function(response) {
                    setOtpVerifiedState();
                    saveFormState();
                    validateStep2();
                },
                error: function(xhr) {
                    const errorMsg = xhr.responseJSON ? xhr.responseJSON.message : 'خطای ناشناخته';
                    alert(`خطا: ${errorMsg}`);
                    otpInput.classList.add('is-invalid');
                },
                complete: function() {
                    if (!isOtpVerified) {
                       verifyOtpBtn.disabled = false;
                       verifyOtpBtn.innerHTML = 'تایید کد';
                    }
                }
            });
        });
        
        // دکمه بعدی نهایی برای این مرحله
        nextBtnStep2.addEventListener('click', function() {
             if (areBaseFieldsValid() && isOtpVerified) {
                // چون اطلاعات قبلا ارسال شده، فقط به مرحله بعد می‌رویم
                modernVerticalWizard.next();
            } else {
                alert('لطفا تمام اطلاعات را تکمیل کرده و کد تایید را وارد نمایید.');
            }
        });

        formStep2.querySelectorAll('input, select').forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('is-invalid');
                // فقط اگر کد تایید نشده باشد، وضعیت دکمه را بررسی می‌کنیم
                if(!isOtpVerified) {
                   validateStep2();
                }
                saveFormState();
            });
        });

        loadFormState();
        validateStep2();
    });
</script>
     <!-- END: Custom Page JS -->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>

