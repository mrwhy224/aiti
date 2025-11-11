@extends('layouts.vuexy.layout')
@section('title', 'تکمیل پروفایل شرکت')

@push('styles')
    {{-- CSS مورد نیاز برای فرم چند مرحله‌ای (Wizard) --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/form-wizard.css') }}">
    <style>
        /* استایل برای جدا کردن آیتم‌های تکرار شونده */
        .repeater-item {
            border: 1px dashed #dbdbdb;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            background-color: #fcfcfc;
        }

        .repeater-item .row {
            margin-bottom: 1rem;
        }

        .repeater-item:last-of-type {
            margin-bottom: 0;
        }

        .product-item {
            padding: 1rem;
            background: #f8f8f8;
            border-radius: 5px;
            margin-top: 1rem;
        }
    </style>
@endpush

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">تکمیل پروفایل شرکت</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">داشبورد</li>
                            <li class="breadcrumb-item active">تکمیل پروفایل</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">فرم اطلاعات جامع اعضا</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        لطفاً با دقت تمام اطلاعات درخواستی در مراحل زیر را تکمیل و در نهایت تایید نمایید.
                    </p>

                    <form id="profile-wizard-form" action="{{-- route('company.profile.store') --}}" method="POST">
                        @csrf
                        <div class="bs-stepper vertical modern">
                            <div class="bs-stepper-header">
                                <div class="step" data-target="#step-company-info">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">1</span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">اطلاعات پایه شرکت</span>
                                            <span class="bs-stepper-subtitle">اطلاعات ثبتی و هویتی</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#step-addresses">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">2</span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">آدرس‌ها و اطلاعات تماس</span>
                                            <span class="bs-stepper-subtitle">دفتر مرکزی و کارخانه</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#step-personnel">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">3</span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">اعضای هیئت مدیره</span>
                                            <span class="bs-stepper-subtitle">مدیرعامل و رئیس هیئت مدیره</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#step-signatories">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">4</span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">صاحبان امضا مجاز</span>
                                            <span class="bs-stepper-subtitle">لیست افراد دارای امضا</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#step-permits">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">5</span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">پروانه‌های بهره‌برداری</span>
                                            <span class="bs-stepper-subtitle">محصولات و ظرفیت تولید</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#step-activity-fields">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">6</span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">زمینه فعالیت</span>
                                            <span class="bs-stepper-subtitle">انتخاب حوزه‌های تولیدی</span>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="bs-stepper-content">

                                <div id="step-company-info" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">اطلاعات پایه شرکت</h5>
                                        <small class="text-muted">اطلاعات ثبتی شرکت را وارد کنید.</small>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="company_name">نام شرکت</label>
                                            <input type="text" id="company_name" name="company[name]" class="form-control" value="{{ Auth::user()->company->name }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="founding_year">سال تاسیس</label>
                                            <input type="number" id="founding_year" name="company[founding_year]" class="form-control" placeholder="مثال: ۱۳۷۵" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="economic_code">کد اقتصادی</label>
                                            <input type="text" id="economic_code" name="company[economic_code]" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="national_id">شناسه ملی</label>
                                            <input type="text" id="national_id" name="company[national_id]" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="registration_number">شماره ثبت</label>
                                            <input type="text" id="registration_number" name="company[registration_number]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <button type="button" class="btn btn-outline-secondary btn-prev" disabled>
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="step-addresses" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">آدرس‌ها و اطلاعات تماس</h5>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="card shadow-none border">
                                                <div class="card-header">
                                                    <h6 class="card-title mb-0">اطلاعات دفتر مرکزی</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="head_office_address">آدرس کامل</label>
                                                        <textarea name="head_office[address]" id="head_office_address" class="form-control" rows="3"></textarea>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="head_office_phone">تلفن</label>
                                                        <input type="text" name="head_office[phone]" id="head_office_phone" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="head_office_fax">فکس</label>
                                                        <input type="text" name="head_office[fax]" id="head_office_fax" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="head_office_postal_code">کد پستی</label>
                                                        <input type="text" name="head_office[postal_code]" id="head_office_postal_code" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow-none border">
                                                <div class="card-header">
                                                    <h6 class="card-title mb-0">اطلاعات کارخانه</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="factory_address">آدرس کامل</label>
                                                        <textarea name="factory[address]" id="factory_address" class="form-control" rows="3"></textarea>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="factory_phone">تلفن</label>
                                                        <input type="text" name="factory[phone]" id="factory_phone" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="factory_fax">فکس</label>
                                                        <input type="text" name="factory[fax]" id="factory_fax" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="factory_postal_code">کد پستی</label>
                                                        <input type="text" name="factory[postal_code]" id="factory_postal_code" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <button type="button" class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="step-personnel" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">اطلاعات مدیران کلیدی</h5>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="card shadow-none border">
                                                <div class="card-header">
                                                    <h6 class="card-title mb-0">مدیرعامل</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="ceo_full_name">نام و نام خانوادگی</label>
                                                        <input type="text" name="ceo[full_name]" id="ceo_full_name" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="ceo_national_code">کد ملی</label>
                                                        <input type="text" name="ceo[national_code]" id="ceo_national_code" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="ceo_mobile">تلفن همراه</label>
                                                        <input type="text" name="ceo[mobile]" id="ceo_mobile" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="ceo_email">ایمیل</label>
                                                        <input type="email" name="ceo[email]" id="ceo_email" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow-none border">
                                                <div class="card-header">
                                                    <h6 class="card-title mb-0">رئیس هیئت مدیره</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="chairman_full_name">نام و نام خانوادگی</label>
                                                        <input type="text" name="chairman[full_name]" id="chairman_full_name" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="chairman_national_code">کد ملی</label>
                                                        <input type="text" name="chairman[national_code]" id="chairman_national_code" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="chairman_mobile">تلفن همراه</label>
                                                        <input type="text" name="chairman[mobile]" id="chairman_mobile" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="chairman_email">ایمیل</label>
                                                        <input type="email" name="chairman[email]" id="chairman_email" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <button type="button" class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="step-signatories" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">صاحبان امضا مجاز</h5>
                                        <small class="text-muted">افراد مجاز به امضا اسناد را اضافه کنید.</small>
                                    </div>
                                    <div id="signatories-repeater-container" class="mt-2">
                                        <div class="repeater-item signatory-item">
                                            <div class="row">
                                                <div class="col-md-5 mb-1">
                                                    <label class="form-label" for="sig_full_name_0">نام و نام خانوادگی</label>
                                                    <input type="text" name="signatories[0][full_name]" id="sig_full_name_0" class="form-control" />
                                                </div>
                                                <div class="col-md-3 mb-1">
                                                    <label class="form-label" for="sig_position_0">سمت</label>
                                                    <input type="text" name="signatories[0][position]" id="sig_position_0" class="form-control" placeholder="مثال: مدیرعامل" />
                                                </div>
                                                <div class="col-md-3 mb-1">
                                                    <label class="form-label" for="sig_national_code_0">کد ملی</label>
                                                    <input type="text" name="signatories[0][national_code]" id="sig_national_code_0" class="form-control" />
                                                </div>
                                                <div class="col-md-3 mb-1">
                                                    <label class="form-label" for="sig_phone_number_0">شماره تلفن</label>
                                                    <input type="text" name="signatories[0][phone_number]" id="sig_phone_number_0" class="form-control" />
                                                </div>
                                                <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-outline-danger btn-icon btn-remove-signatory" style="margin-top: 8px;">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-1">
                                            <button type="button" class="btn btn-icon btn-primary" id="btn-add-signatory">
                                                <i data-feather="plus"></i>
                                                <span class="align-middle ms-25">افزودن امضادار جدید</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="step-permits" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">پروانه‌های بهره‌برداری</h5>
                                        <small class="text-muted">پروانه‌ها و محصولات مرتبط را وارد کنید.</small>
                                    </div>
                                    
                                    <div id="permits-repeater-container" class="mt-2">
                                        <div class="repeater-item permit-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6>پروانه شماره ۱</h6>
                                                <button type="button" class="btn btn-outline-danger btn-sm btn-icon btn-remove-permit">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <label class="form-label" for="permit_number_0">شماره پروانه</label>
                                                    <input type="text" name="permits[0][number]" id="permit_number_0" class="form-control" />
                                                </div>
                                                <div class="col-md-6 mb-1">
                                                    <label class="form-label" for="permit_date_0">تاریخ صدور/ اعتبار</label>
                                                    <input type="text" name="permits[0][date]" id="permit_date_0" class="form-control" placeholder="تاریخ (از پکیج دیت پیکر استفاده شود)" />
                                                </div>
                                            </div>
                                            
                                            <h6 class="mt-2">محصولات این پروانه:</h6>
                                            <div class="products-repeater-container">
                                                <div class="product-item">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-1">
                                                            <label class="form-label" for="product_name_0_0">نام محصول</label>
                                                            <input type="text" name="permits[0][products][0][name]" id="product_name_0_0" class="form-control" />
                                                        </div>
                                                        <div class="col-md-6 mb-1">
                                                            <label class="form-label" for="product_capacity_0_0">ظرفیت اسمی (سالانه)</label>
                                                            <input type="text" name="permits[0][products][0][capacity]" id="product_capacity_0_0" class="form-control" />
                                                        </div>
                                                        <div class="col-md-6 mb-1">
                                                            <label class="form-label" for="product_production_0_0">میزان تولید (سال گذشته)</label>
                                                            <input type="text" name="permits[0][products][0][production]" id="product_production_0_0" class="form-control" />
                                                        </div>
                                                        <div class="col-md-5 mb-1">
                                                            <label class="form-label" for="product_desc_0_0">توضیحات</label>
                                                            <input type="text" name="permits[0][products][0][description]" id="product_desc_0_0" class="form-control" />
                                                        </div>
                                                        <div class="col-md-1 d-flex align-items-end">
                                                            <button type="button" class="btn btn-outline-danger btn-icon btn-remove-product">
                                                                <i data-feather="trash-2"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-success mt-1 btn-add-product">
                                                <i data-feather="plus"></i> افزودن محصول به این پروانه
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <button type="button" class="btn btn-icon btn-primary" id="btn-add-permit">
                                                <i data-feather="plus"></i>
                                                <span class="align-middle ms-25">افزودن پروانه جدید</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="step-activity-fields" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">زمینه فعالیت</h5>
                                        <small class="text-muted">حوزه‌های اصلی فعالیت شرکت را انتخاب کنید.</small>
                                    </div>
                                    <div class="row mt-2">
                                        @php
                                            $activities = ['الیاف', 'ریسندگی', 'نخ دوخت', 'بافندگی', 'پتو', 'موکت', 'فرش ماشینی', 'پارچه رومبلی', 'رنگرزی و چاپ', 'پوشاک', 'منسوجات بی بافت', 'سایر'];
                                        @endphp
                                        
                                        @foreach($activities as $activity)
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline mb-1">
                                                <input class="form-check-input" type="checkbox" name="activity_fields[]" id="activity_{{ $loop->index }}" value="{{ $activity }}" />
                                                <label class="form-check-label" for="activity_{{ $loop->index }}">{{ $activity }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                        </button>
                                        <button type="submit" class="btn btn-success btn-submit">
                                            <i data-feather="check" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">ثبت و ارسال نهایی</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>

@endsection

@push('page_js')
    {{-- JS مورد نیاز برای فرم چند مرحله‌ای (Wizard) --}}
    <script src="{{ asset('vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    {{-- <script src="{{ asset('js/scripts/forms/form-wizard.js') }}"></script> --}} {{-- این فایل را کامنت میکنیم تا اسکریپت سفارشی خودمان را بنویسیم --}}

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // --- بخش ۱: راه‌اندازی Stepper ---
            var stepperEl = document.querySelector('.bs-stepper');
            if (typeof Stepper !== 'undefined') {
                var stepper = new Stepper(stepperEl, {
                    linear: false // اگر false باشد کاربر می‌تواند روی مراحل کلیک کند
                });

                document.querySelectorAll('.btn-next').forEach(btn => {
                    btn.addEventListener('click', () => stepper.next());
                });
                document.querySelectorAll('.btn-prev').forEach(btn => {
                    btn.addEventListener('click', () => stepper.previous());
                });
                
                // مدیریت دکمه Submit نهایی
                const form = document.getElementById('profile-wizard-form');
                form.addEventListener('submit', (e) => {
                    // جلوگیری از ارسال عادی فرم برای مدیریت با Ajax یا SweetAlert
                    e.preventDefault(); 
                    
                    // در اینجا می‌توانید لاجیک ارسال با Ajax یا SweetAlert را قرار دهید
                    // مثال: نمایش SweetAlert برای تایید نهایی
                    Swal.fire({
                        title: 'آیا مطمئن هستید؟',
                        text: "اطلاعات شما برای تایید ارسال خواهد شد.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'بله، ارسال کن!',
                        cancelButtonText: 'خیر، بررسی میکنم',
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-outline-danger ms-1'
                        },
                        buttonsStyling: false
                    }).then(function (result) {
                        if (result.isConfirmed) {
                             // در صورت تایید، فرم را واقعا submit کنید
                             // form.submit(); // <-- این خط را برای ارسال عادی فعال کنید
                             
                             // یا با Ajax ارسال کنید
                             console.log('Form submitted!'); // برای تست
                             
                             Swal.fire({
                                icon: 'success',
                                title: 'ثبت شد!',
                                text: 'اطلاعات شما با موفقیت ارسال شد.',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                }
                             });
                        }
                    });
                });


            } else {
                console.error('Stepper class not found. Make sure bs-stepper.min.js is loaded.');
            }

            // --- بخش ۲: مدیریت Repeater صاحبان امضا ---
            let signatoryIndex = 1; // ایندکس برای آیتم‌های *جدید*
            const sigContainer = document.getElementById('signatories-repeater-container');
            
            document.getElementById('btn-add-signatory').addEventListener('click', () => {
                // اگر آیتم اول خالی بود، از کلون کردن جلوگیری کن و به کاربر هشدار بده
                const firstItemInputs = sigContainer.querySelector('.signatory-item:first-of-type').querySelectorAll('input');
                let isFirstItemEmpty = true;
                firstItemInputs.forEach(input => {
                    if (input.value.trim() !== '') {
                        isFirstItemEmpty = false;
                    }
                });

                // اگر آیتم اول خالی بود، همان را پر کند
                if (sigContainer.children.length === 1 && isFirstItemEmpty) {
                    firstItemInputs[0].focus();
                    // می‌توانید از Toastr یا SweetAlert برای نمایش پیام استفاده کنید
                    console.warn('لطفا ابتدا ردیف اول را پر کنید.');
                    return; 
                }

                const itemToClone = sigContainer.querySelector('.signatory-item:last-of-type');
                const newItem = itemToClone.cloneNode(true);
                
                // پاک کردن مقادیر و آپدیت کردن name ها
                newItem.querySelectorAll('input').forEach(input => {
                    input.value = '';
                    if (input.name) {
                        input.name = input.name.replace(/\[\d+\]/g, '[' + signatoryIndex + ']');
                    }
                    if (input.id) {
                         input.id = input.id.replace(/_\d+$/g, '_' + signatoryIndex);
                    }
                });
                 // آپدیت کردن label ها
                newItem.querySelectorAll('label').forEach(label => {
                    if (label.htmlFor) {
                         label.htmlFor = label.htmlFor.replace(/_\d+$/g, '_' + signatoryIndex);
                    }
                });

                sigContainer.appendChild(newItem);
                signatoryIndex++;
                feather.replace(); // برای نمایش آیکون حذف
            });

            // Event delegation برای حذف آیتم امضادار
            sigContainer.addEventListener('click', e => {
                const removeBtn = e.target.closest('.btn-remove-signatory');
                if (removeBtn) {
                    // فقط در صورتی حذف کن که بیشتر از یک آیتم وجود داشته باشد
                    if (sigContainer.querySelectorAll('.signatory-item').length > 1) {
                        removeBtn.closest('.signatory-item').remove();
                    } else {
                        // اگر آیتم آخر بود، فقط فیلدها را پاک کن
                        sigContainer.querySelector('.signatory-item').querySelectorAll('input').forEach(input => input.value = '');
                    }
                }
            });

            // --- بخش ۳: مدیریت Repeater پروانه‌ها (Nested) ---
            let permitIndex = 1; // ایندکس برای پروانه‌های *جدید*
            const permitsContainer = document.getElementById('permits-repeater-container');

            // افزودن پروانه جدید (Outer repeater)
            document.getElementById('btn-add-permit').addEventListener('click', () => {
                const itemToClone = permitsContainer.querySelector('.permit-item:last-of-type');
                const newItem = itemToClone.cloneNode(true);

                // پاک کردن مقادیر
                newItem.querySelectorAll('input, textarea').forEach(input => input.value = '');
                
                // حذف تمام محصولات *بجز* اولی (برای تمیز بودن قالب)
                const productsContainer = newItem.querySelector('.products-repeater-container');
                while (productsContainer.children.length > 1) {
                    productsContainer.lastChild.remove();
                }

                // آپدیت کردن نام پروانه (مثال: پروانه شماره ۲)
                newItem.querySelector('h6').textContent = 'پروانه شماره ' + (permitsContainer.children.length + 1);

                // آپدیت کردن تمام name ها و id های داخل پروانه جدید
                newItem.querySelectorAll('[name]').forEach(el => {
                    el.name = el.name.replace(/permits\[\d+\]/g, 'permits[' + permitIndex + ']');
                });
                 newItem.querySelectorAll('[id]').forEach(el => {
                    el.id = el.id.replace(/_\d+(_\d+)?$/, `_${permitIndex}${el.id.includes('product') ? '_0' : ''}`);
                });
                newItem.querySelectorAll('label').forEach(label => {
                    if(label.htmlFor) {
                         label.htmlFor = label.htmlFor.replace(/_\d+(_\d+)?$/, `_${permitIndex}${label.htmlFor.includes('product') ? '_0' : ''}`);
                    }
                });


                permitsContainer.appendChild(newItem);
                permitIndex++;
                feather.replace(); // برای نمایش آیکون‌ها
            });

            // Event delegation برای اکشن‌های داخل پروانه‌ها (حذف پروانه، افزودن محصول، حذف محصول)
            permitsContainer.addEventListener('click', e => {
                const targetButton = e.target.closest('button');
                if (!targetButton) return;

                // ۱. حذف پروانه (Outer remove)
                if (targetButton.classList.contains('btn-remove-permit')) {
                    if (permitsContainer.querySelectorAll('.permit-item').length > 1) {
                        targetButton.closest('.permit-item').remove();
                    } else {
                         // اگر آیتم آخر بود، فقط فیلدها را پاک کن
                        targetButton.closest('.permit-item').querySelectorAll('input, textarea').forEach(input => input.value = '');
                    }
                }

                // ۲. افزودن محصول (Inner add)
                if (targetButton.classList.contains('btn-add-product')) {
                    const permitItem = targetButton.closest('.permit-item');
                    const productsContainer = permitItem.querySelector('.products-repeater-container');
                    const productToClone = productsContainer.querySelector('.product-item:last-of-type');
                    const newProduct = productToClone.cloneNode(true);
                    
                    newProduct.querySelectorAll('input, textarea').forEach(input => input.value = '');

                    // پیدا کردن ایندکس پروانه فعلی
                    const currentPermitIndex = permitItem.querySelector('input[name*="[number]"]').name.match(/\[(\d+)\]/)[1];
                    // ایندکس محصول جدید
                    const productIndex = productsContainer.children.length;

                    // آپدیت name ها و id های محصول جدید
                    newProduct.querySelectorAll('[name]').forEach(el => {
                        el.name = el.name.replace(/permits\[\d+\]\[products\]\[\d+\]/g, `permits[${currentPermitIndex}][products][${productIndex}]`);
                    });
                     newProduct.querySelectorAll('[id]').forEach(el => {
                        el.id = el.id.replace(/_\d+_\d+$/, `_${currentPermitIndex}_${productIndex}`);
                    });
                     newProduct.querySelectorAll('label').forEach(label => {
                        if (label.htmlFor) {
                             label.htmlFor = label.htmlFor.replace(/_\d+_\d+$/, `_${currentPermitIndex}_${productIndex}`);
                        }
                    });

                    productsContainer.appendChild(newProduct);
                    feather.replace(); // برای آیکون سطل زباله
                }

                // ۳. حذف محصول (Inner remove)
                if (targetButton.classList.contains('btn-remove-product')) {
                    const productsContainer = targetButton.closest('.products-repeater-container');
                    if (productsContainer.querySelectorAll('.product-item').length > 1) {
                        targetButton.closest('.product-item').remove();
                    } else {
                        productsContainer.querySelector('.product-item').querySelectorAll('input, textarea').forEach(input => input.value = '');
                    }
                }
            });

        });
    </script>
@endpush