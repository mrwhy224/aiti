@extends('layouts.vuexy.layout')
@section('title', 'مدیریت تگ‌ها')

@push('styles_before_theme')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">مدیریت تگ‌ها</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{-- route('admin_dashboard') --}}">داشبورد</a></li>
                            <li class="breadcrumb-item active">تگ‌ها</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">افزودن تگ جدید</h4>
                    </div>
                    <div class="card-body">
                        {{-- فرم به روت store تگ‌ها ارسال می‌شود --}}
                        <form action="{{-- route('admin.tags.store') --}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-12"> {{-- تمام عرض شد --}}
                                    <div class="mb-1">
                                        <label class="form-label" for="name">عنوان تگ</label>
                                        <input type="text" id="name" class="form-control" placeholder="مثال: نساجی هوشمند" name="name" required>
                                    </div>
                                </div>
                                {{-- فیلد اسلاگ حذف شد --}}
                                
                                {{-- فیلد توضیحات در حال حاضر وجود ندارد، اگر نیاز بود می‌توانید آن را اضافه کنید --}}
                                {{-- <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="description">توضیحات (اختیاری)</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="توضیح کوتاه در مورد این تگ"></textarea>
                                    </div>
                                </div> --}}
                                
                                <div class="col-12 mt-1">
                                    <button type="submit" class="btn btn-primary me-1">ذخیره تگ</button>
                                    <button type="reset" class="btn btn-outline-secondary">لغو</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام </th>
                                <th>تعداد پست</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('vendor_js')
    <script src="{{ asset('vendors/js/extensions/jstree.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
@endpush
@push('page_js')
    <script>
        $(function() {
            'use strict';

            var dt_basic_table = $('.datatables-basic');
            var assetPath = $('body').attr('data-asset-path') || '../';
            
            // DataTable initialization
            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    ajax: function(data, callback, settings) {
                        // This function fetches the data for the table.
                        // You would replace this with your actual API endpoint.
                        DataService.getData('/post/tags')
                            .then(json => callback(json))
                            .catch(error => callback({
                                data: []
                            }));
                    },
                    columns: [
                        // columns according to your data
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'posts_count' },
                        { data: '' }
                    ],
                    columnDefs: [
                        // {
                        //     // For the status column
                        //     targets: 3,
                        //     render: function(data, type, full, meta) {
                        //         return full['company_manager'] ? data:'(یافت نشد)';
                        //     }
                        // },
                        {
                            // Actions
                            targets: -1,
                            title: '',
                            orderable: false,
                            render: function(data, type, full, meta) {
                                return `
                                    <a href="javascript:;" class="item-delete">${feather.icons['trash-2'].toSvg({ class: 'font-small-4' })}</a> | <a href="javascript:;" class="item-edit">${feather.icons['edit'].toSvg({ class: 'font-small-4' })}</a>`;
                            }
                        }
                    ],
                    order: [
                        [0, 'desc'] // Default sort by the first column in descending order
                    ],
                    // The 'dom' option now excludes the buttons ('B') and the header label.
                    dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 100],
                    // The buttons array is now empty.
                    buttons: [],
                    language: {
                        search: "جستجو:",
                        lengthMenu: "نمایش _MENU_ رکورد",
                        emptyTable: "هیچ داده‌ای در جدول وجود ندارد",
                        zeroRecords: "هیچ رکوردی با این مشخصات یافت نشد",
                        info: "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                        infoEmpty: "نمایش 0 تا 0 از 0 رکورد",
                        infoFiltered: "(فیلتر شده از _MAX_ رکورد کل)",
                        loadingRecords: "در حال بارگذاری...",
                        processing: "در حال پردازش...",
                        paginate: {
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });
            }
        });

    </script>
@endpush