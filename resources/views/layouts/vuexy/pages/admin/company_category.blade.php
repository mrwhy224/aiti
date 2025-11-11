@extends('layouts.vuexy.layout')

@section('title', 'دسته‌بندی شرکت‌ها')

@push('vendor_js')
    {{-- DataTables JS --}}
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
@endpush

@push('page_js')
    {{-- Page specific JS --}}
    <script src="{{ asset('js/scripts/company_category.js') }}"></script>
@endpush

@push('styles_before_theme')
    {{-- DataTables CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">مدیریت دسته‌بندی شرکت‌ها</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active">دسته‌بندی شرکت‌ها</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="company-categories-section">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="form-title">افزودن دسته جدید</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-vertical" id="category-form">
                                @csrf
                                <input type="hidden" name="id" id="category-id">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">نام دسته</label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="مثال: فناوری اطلاعات" required>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">ذخیره</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">لغو</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">لیست دسته‌بندی‌ها</h4>
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="datatables-basic table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام دسته</th>
                                    <th>تعداد شرکت‌ها</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
        </section>
    </div>
@endsection