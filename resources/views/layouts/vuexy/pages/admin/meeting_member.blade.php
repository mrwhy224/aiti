@extends('layouts.vuexy.layout')

@section('title', 'مدیریت مدعوین: ' )

@push('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endpush

@push('vendor_js')
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
@endpush

@push('page_js')
    {{-- اسکریپت‌های اختصاصی این صفحه برای فعال‌سازی DataTable و Select2 --}}
    <script>
        $(function () {
            // Basic Datatable
            $('.datatables-basic').DataTable({
                "language": {
                    "url": "{{ asset('vendors/js/tables/datatable/fa.json') }}"
                }
            });

            // Select2 for individual search
            $('#select2-users-members').select2({
                placeholder: 'نام کاربر یا عضو را جستجو کنید...',
                ajax: {
                    url: '', // روت جستجو باید ساخته شود
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush


@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">مدیریت مدعوین</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">داشبورد</a></li>
                            <li class="breadcrumb-item"><a href="#">لیست جلسات</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Add Attendee Card -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">افزودن مدعوین</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="group-invite-tab" data-bs-toggle="tab" href="#group-invite" aria-controls="group-invite" role="tab" aria-selected="true">دعوت گروهی (فیلتر)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="individual-invite-tab" data-bs-toggle="tab" href="#individual-invite" aria-controls="individual-invite" role="tab" aria-selected="false">دعوت فردی (جستجو)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="guest-invite-tab" data-bs-toggle="tab" href="#guest-invite" aria-controls="guest-invite" role="tab" aria-selected="false">دعوت مهمان</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- Group Invite Tab -->
                    <div class="tab-pane active" id="group-invite" aria-labelledby="group-invite-tab" role="tabpanel">
                        <form action="#" method="POST" class="row gy-1 gx-2 align-items-end p-2">
                            @csrf
                            <div class="col-md-5 col-12">
                                <label class="form-label" for="company_id">شرکت</label>
                                <select id="company_id" name="company_id" class="form-select">
                                    <option value="">همه شرکت‌ها</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-5 col-12">
                                <label class="form-label" for="position">سِمَت</label>
                                <input type="text" class="form-control" name="position" id="position" placeholder="مثال: مدیرعامل">
                            </div>
                            <div class="col-md-2 col-12">
                                <button type="submit" class="btn btn-primary w-100">افزودن گروهی</button>
                            </div>
                        </form>
                    </div>1
                    <!-- Individual Invite Tab -->
                    <div class="tab-pane" id="individual-invite" aria-labelledby="individual-invite-tab" role="tabpanel">
                        <form action="#" method="POST" class="row gy-1 gx-2 align-items-end p-2">
                            @csrf
                            <div class="col-md-10 col-12">
                                <label class="form-label" for="select2-users-members">جستجوی کاربر یا عضو</label>
                                <select class="form-select" id="select2-users-members" name="attendable"></select>
                            </div>
                             <div class="col-md-2 col-12">
                                <button type="submit" class="btn btn-primary w-100">افزودن فرد</button>
                            </div>
                        </form>
                    </div>
                    <!-- Guest Invite Tab -->
                    <div class="tab-pane" id="guest-invite" aria-labelledby="guest-invite-tab" role="tabpanel">
                       <form action="#" method="POST" class="row g-1 p-2">
                           @csrf
                           <div class="col-md-3 col-12">
                               <label class="form-label" for="guest_name">نام کامل</label>
                               <input type="text" name="name" id="guest_name" class="form-control" required>
                           </div>
                           <div class="col-md-3 col-12">
                               <label class="form-label" for="guest_email">ایمیل</label>
                               <input type="email" name="email" id="guest_email" class="form-control">
                           </div>
                           <div class="col-md-3 col-12">
                               <label class="form-label" for="guest_phone">شماره تماس</label>
                               <input type="tel" name="phone" id="guest_phone" class="form-control">
                           </div>
                            <div class="col-md-3 col-12 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">افزودن مهمان</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendees List Card -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom d-flex justify-content-between">
                             <h4 class="card-title">لیست مدعوین ()</h4>
                             <button class="btn btn-info btn-sm"><i data-feather="send" class="me-50"></i>ارسال اطلاع‌رسانی</button>
                        </div>
                        <div class="card-datatable">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>شرکت</th>
                                        <th>سِمَت</th>
                                        <th>نوع</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

