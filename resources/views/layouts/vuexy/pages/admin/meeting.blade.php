@extends('layouts.vuexy.layout')

@section('title', 'مدیریت رویدادها')

@push('page_js')
    <script src="{{ asset('js/scripts/finance.js') }}"></script>
@endpush
@push('styles_before_theme')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
@endpush

@push('vendor_js')
    <script src="{{ asset('vendors/js/extensions/jstree.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
@endpush

@push('page_js')
    <script>
        $(document).ready(function() {
            // فعال‌سازی DataTable
            $('.datatables-basic').DataTable({ /* ... تنظیمات ... */ });

            // ✅ فعال‌سازی Persian Datepicker با تنظیمات حرفه‌ای
            $('#event_date_persian').persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#event_date_gregorian', // فیلد مخفی برای تاریخ میلادی
                altFormat: 'X', // فرمت یونیکس برای ارسال به سرور
                initialValue: false // برای اینکه در ابتدا خالی باشد
            });

            // فعال‌سازی انتخابگر زمان با flatpickr (همچنان بهترین گزینه برای زمان)
            $('.flatpickr-time').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });
        });
    </script>
@endpush


@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">مدیریت رویدادها</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{-- route('admin_dashboard') --}}">داشبورد</a></li>
                            <li class="breadcrumb-item active">مدیریت رویدادها</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">افزودن رویداد جدید</h4>
            </div>
            <div class="card-body">
                <form action="{{-- route('events.store') --}}" method="POST" class="row g-1 p-2">
                    @csrf
                    <div class="col-md-6 col-12">
                        <label class="form-label" for="event_title">عنوان رویداد</label>
                        <input type="text" name="title" id="event_title" class="form-control" placeholder="مثال: جلسه هیئت مدیره" required>
                    </div>

                    <div class="col-md-3 col-12">
                        <label class="form-label" for="event_date">تاریخ</label>
                        <input type="text" name="date" id="event_date" class="form-control flatpickr-date" placeholder="YYYY/MM/DD" required>
                    </div>

                    <div class="col-md-3 col-12">
                        <label class="form-label" for="event_time">زمان</label>
                        <input type="text" name="time" id="event_time" class="form-control flatpickr-time" placeholder="HH:MM" required>
                    </div>

                    <div class="col-md-4 col-12">
                        <label class="form-label" for="event_status">وضعیت جلسه</label>
                        <select id="event_status" name="status" class="form-select" required>
                            <option value="scheduled">برنامه‌ریزی شده</option>
                            <option value="completed">برگزار شده</option>
                            <option value="canceled">لغو شده</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4 col-12">
                        <label class="form-label" for="event_duration">طول جلسه (ساعت)</label>
                        <input type="number" name="duration" id="event_duration" class="form-control" placeholder="مثال: 2" min="1">
                    </div>

                    <div class="col-md-4 col-12 d-flex align-items-center mt-2">
                         <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="send_invitation" name="send_invitation" value="1" checked />
                            <label class="form-check-label" for="send_invitation">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                                آیا دعوت‌نامه ارسال شود؟
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="event_description">توضیحات</label>
                        <textarea name="description" id="event_description" class="form-control" rows="3" placeholder="توضیحات تکمیلی درباره رویداد..."></textarea>
                    </div>
                    
                    <div class="col-12 text-end mt-2">
                        <button type="submit" class="btn btn-primary">
                            <i data-feather="check" class="me-50"></i>
                            ثبت رویداد
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>وضیعت</th>
                                    <th>عنوان فاکتور</th>
                                    <th>مجموع فاکتور</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>تاریخ پرداخت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection