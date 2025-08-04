<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
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
                                        <div class="step" data-target="#upload-files-step" role="tab" id="upload-files-step-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="upload" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">آپلود فایل</span>
                                                    <span class="bs-stepper-subtitle">مدارک مورد نیاز را بارگذاری کنید</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"><i data-feather="chevron-right" class="font-medium-2"></i></div>
                                        <div class="step" data-target="#payment-step" role="tab" id="payment-step-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="credit-card" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">پرداخت</span>
                                                    <span class="bs-stepper-subtitle">پرداخت حق عضویت</span>
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
                                            <form>
                                                <div class="row">
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="company-name">نام شرکت</label>
                                                        <input type="text" name="company-name" id="company-name" class="form-control" />
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="company-id">شناسه ملی شرکت</label>
                                                        <input type="text" name="company-id" id="company-id" class="form-control" />
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="position">سمت</label>
                                                        <input type="text" name="position" id="position" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="first-name">نام</label>
                                                        <input type="text" name="first-name" id="first-name" class="form-control" />
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="last-name">نام خانوادگی</label>
                                                        <input type="text" name="last-name" id="last-name" class="form-control" />
                                                    </div>
                                                     <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="national-code">کد ملی</label>
                                                        <input type="text" name="national-code" id="national-code" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                     <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="mobile">شماره تلفن همراه</label>
                                                        <input type="text" name="mobile" id="mobile" class="form-control" />
                                                    </div>
                                                    <div class="mb-1 col-md-4 d-flex align-items-end">
                                                        <button type="button" class="btn bg-brand-primary text-white w-100">درخواست کد تایید</button>
                                                    </div>
                                                    <div class="mb-1 col-md-4 d-none">
                                                        <label class="form-label" for="verification-code">کد تایید تلفن همراه</label>
                                                        <input type="text" name="verification-code" id="verification-code" class="form-control" />
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="btn bg-brand-primary text-white btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                                </button>
                                                <button class="btn bg-brand-primary text-white btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="upload-files-step" class="content" role="tabpanel" aria-labelledby="upload-files-step-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">آپلود مدارک</h2>
                                                <span>لطفا فایل‌های مورد نیاز را بارگذاری کنید</span>
                                            </div>
                                            <form>
                                                <div class="row d-flex mb-2">
                                                    <!-- جواز تاسیس -->
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label fw-bolder">جواز تاسیس</label>
                                                        <div class="file-uploader h-100">
                                                            <i data-feather="upload-cloud" class="text-primary" style="width: 3rem; height: 3rem;"></i>
                                                            <p class="mt-1">فایل خود را اینجا بکشید یا کلیک کنید</p>
                                                            <small class="text-muted">حداکثر حجم: ۲ مگابایت | فرمت‌های مجاز: PDF, JPG, PNG</small>
                                                            <input type="file" class="d-none">
                                                        </div>
                                                    </div>
                                                    <!-- پروانه بهره برداری -->
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label fw-bolder">پروانه بهره برداری</label>
                                                        <div class="file-uploader h-100">
                                                            <i data-feather="upload-cloud" class="text-primary" style="width: 3rem; height: 3rem;"></i>
                                                            <p class="mt-1">فایل خود را اینجا بکشید یا کلیک کنید</p>
                                                            <small class="text-muted">حداکثر حجم: ۲ مگابایت | فرمت‌های مجاز: PDF, JPG, PNG</small>
                                                            <input type="file" class="d-none">
                                                        </div>
                                                    </div>
                                                </div>
                                                     <!-- لیست بیمه -->
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <label class="form-label fw-bolder">تصویر آخرین لیست بیمه کارکنان</label>
                                                        <div class="file-uploader">
                                                            <i data-feather="upload-cloud" class="text-primary" style="width: 3rem; height: 3rem;"></i>
                                                            <p class="mt-1">فایل خود را اینجا بکشید یا کلیک کنید</p>
                                                            <small class="text-muted">حداکثر حجم: ۵ مگابایت | فرمت‌های مجاز: PDF, XLS, XLSX</small>
                                                            <input type="file" class="d-none">
                                                        </div>
                                                    </div>
                                                    <!-- لوگوی شرکت -->
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label fw-bolder">لوگوی شرکت</label>
                                                        <div class="file-uploader h-100">
                                                            <i data-feather="upload-cloud" class="text-primary" style="width: 3rem; height: 3rem;"></i>
                                                            <p class="mt-1">فایل خود را اینجا بکشید یا کلیک کنید</p>
                                                            <small class="text-muted">حداکثر حجم: ۱ مگابایت | فرمت‌های مجاز: JPG, PNG, SVG</small>
                                                            <input type="file" class="d-none">
                                                        </div>
                                                    </div>
                                                    <!-- عکس پرسنلی -->
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label fw-bolder">عکس پرسنلی مدیرعامل</label>
                                                        <div class="file-uploader h-100">
                                                            <i data-feather="upload-cloud" class="text-primary" style="width: 3rem; height: 3rem;"></i>
                                                            <p class="mt-1">فایل خود را اینجا بکشید یا کلیک کنید</p>
                                                            <small class="text-muted">حداکثر حجم: ۱ مگابایت | فرمت‌های مجاز: JPG, PNG</small>
                                                            <input type="file" class="d-none">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex justify-content-between mt-2">
                                                 <button class="btn bg-brand-primary text-white btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                                </button>
                                                <button class="btn btn-flat-primary">
                                                    <span class="align-middle d-sm-inline-block d-none">رد کردن</span>
                                                    <i data-feather="skip-back" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                                <button class="btn bg-brand-primary text-white btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div id="payment-step" class="content" role="tabpanel" aria-labelledby="payment-step-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">مرحله نهایی: پرداخت و تایید عضویت</h2>
                                                <span>لطفا پیش از پرداخت، نکات زیر را مطالعه فرمایید.</span>
                                            </div>
                                            
                                            <div class="alert alert-secondary" role="alert">
                                                <h4 class="alert-heading">توجه</h4>
                                                <div class="alert-body">
                                                    پس از پرداخت موفق، فرآیند بررسی و تایید مدارک شما آغاز خواهد شد. این فرآیند ممکن است چند روز کاری به طول انجامد. در این مدت، کارشناسان ما جهت هماهنگی‌های لازم با شما تماس خواهند گرفت.
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">خلاصه پرداخت</h5>
                                                    <div class="d-flex justify-content-between">
                                                        <span>پلن انتخابی:</span>
                                                        <span class="fw-bolder">عضویت جدید</span>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-bolder">مبلغ قابل پرداخت:</span>
                                                        <span class="fw-bolder">۵,۰۰۰,۰۰۰ تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class=" my-2">
                                                <p>با عضویت در انجمن نساجی ایران، <a href="#" class="text-primary">قوانین و مقررات</a> انجمن را می‌پذیرم. </p>
                                            </div>

                                            <div class="d-flex justify-content-between mt-1">
                                                <button class="btn bg-brand-primary text-white btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                                </button>
                                                <button class="btn btn-flat-success btn-submit">
                                                    <i data-feather="check" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">پرداخت و ثبت نهایی</span>
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
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../js/scripts/pages/auth-register.js"></script>
    <!-- END: Page JS-->

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
