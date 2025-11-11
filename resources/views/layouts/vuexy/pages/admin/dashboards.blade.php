@extends('layouts.vuexy.layout')
@section('title', 'داشبورد')
@push('page_js')
<script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js') }}"></script>
@endpush
@section('content')

    <div class="content-header row">
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
        @if($pendingCompanyCount > 0)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-profile-status bg-light-warning">
                    <div class="card-body text-center d-flex flex-column justify-content-center h-100">
                        <div class="avatar avatar-xl bg-warning shadow mb-2 mx-auto">
                            <div class="avatar-content">
                                <i data-feather="clock" class="font-large-2"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 text-warning">{{ $pendingCompanyCount }} درخواست در انتظار تایید</h3>
                        <p class="card-text mb-2">
                            پرونده‌های جدیدی برای بررسی و تایید نهایی شما ثبت شده‌اند.
                        </p>

                        <a href="{{ route('company.pending') }}" {{-- نام روت صفحه مدیریت --}}
                        class="btn btn-warning">
                            مدیریت درخواست‌ها
                        </a>
                    </div>
                </div>
            </div>
        @else
            {{-- (اختیاری) کارتی برای زمانی که درخواستی نیست --}}
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-profile-status bg-light-success">
                    <div class="card-body text-center d-flex flex-column justify-content-center h-100">
                        <div class="avatar avatar-xl bg-success shadow mb-2 mx-auto">
                            <div class="avatar-content">
                                <i data-feather="check-square" class="font-large-2"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 text-success">صندوق ورودی شما خالی است</h3>
                        <p class="card-text mb-2">
                            در حال حاضر هیچ درخواست جدیدی برای بررسی وجود ندارد.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
