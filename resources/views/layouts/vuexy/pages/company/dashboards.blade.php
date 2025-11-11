@extends('layouts.vuexy.layout')
@section('title', 'داشبورد')
@push('page_js')
<script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js') }}"></script>
@endpush
@section('content')

    <div class="content-header row">
        {{-- ... (بخش Breadcrumbs شما - بدون تغییر) ... --}}
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">خانه</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">داشبورد
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6 col-12">
            <div class="card card-congratulations h-100"> {{-- <--- h-100 برای هم‌قد شدن --}}
                <div class="card-body">
                    <div>
                        <h3 class="mb-1 text-primary">خوش آمدید، {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h3>
                        
                    </div>
                    <img
                        src="/images/illustration/personalization.svg"
                        class="congratulations-img"
                        alt="Analytics Illustration"
                        height="150"
                    />
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            
            @if($profileStatus == 'incomplete')
                
                <div class="card card-congratulations-profile h-100"> {{-- <--- h-100 برای هم‌قد شدن --}}
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <div class="text-center mt-2">
                            <h3 class="mb-1 text-primary">پرونده شما ناقص است!</h3>
                            <p class="card-text mb-2">
                                برای دسترسی کامل به امکانات و فعال‌سازی عضویت،
                                لطفاً اطلاعات و مدارک خود را تکمیل کنید.
                            </p>
                            <a href="{{ route('upload_documents') }}" class="btn btn-primary">
                                همین حالا تکمیل می‌کنم
                            </a>
                        </div>
                    </div>
                </div>

            @elseif($profileStatus == 'pending')

                <div class="card card-profile-status bg-light-warning h-100"> {{-- <--- h-100 --}}
                    <div class="card-body text-center d-flex flex-column justify-content-center d-flex flex-column justify-content-center"> {{-- کلاس‌های اضافی برای وسط‌چینی بهتر --}}
                        <div class="avatar avatar-xl bg-warning shadow mb-2 mx-auto"> {{-- mx-auto برای وسط‌چینی آواتار --}}
                            <div class="avatar-content">
                                <i data-feather="clock" class="font-large-2"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 ">در انتظار تایید</h3>
                        <p class="card-text mb-2 text-black">
                            مدارک شما با موفقیت بارگذاری شده و در حال حاضر در انتظار بررسی و تایید توسط کارشناسان ما است.
                        </p>
                        <a href="{{ route('upload_documents') }}" class="btn btn-warning">
                            مشاهده مدارک
                        </a>
                    </div>
                </div>

            @elseif($profileStatus == 'active')

                <div class="card card-congratulations-profile bg-light-success h-100"> {{-- <--- h-100 --}}
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <img 
                          src="/images/illustration/badge.svg"
                          class="congratulations-img" 
                          alt="Badge Illustration"
                          height="140"
                        />
                        <h3 class="mb-1 text-success mt-2">عضویت شما فعال است!</h3>
                        <p class="card-text mb-2">
                            پرونده شما با موفقیت تایید شده است. شما هم‌اکنون عضو فعال انجمن هستید.
                        </p>
                    </div>
                </div>

            @endif



        </div>
        <div class="col-lg-6 col-12 mt-2">
            <div class="card card-congratulations-profile h-100"> {{-- <--- h-100 برای هم‌قد شدن --}}
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <div class="text-center mt-2">
                            <h3 class="mb-1 text-primary">نمایه شرکت هنوز تکمیل نشده!</h3>
                            <p class="card-text mb-2">                                 برای دسترسی کامل به امکانات و فعال‌سازی عضویت،                                 لطفاً نمایه شرکت را تکمیل کنید.                             
                            </p>
                            <a href="{{ route('company_profile') }}" class="btn btn-primary">
                                همین حالا تکمیل می‌کنم
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection