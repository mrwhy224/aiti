@extends('layouts.vuexy.layout')
@section('title', 'مدیریت پشتیبان‌گیری')

@push('styles')
<style>
    /* Custom styles for a more polished look */
    .backup-history-table .action-btn {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s ease;
    }
    .backup-history-table .action-btn:hover {
        transform: scale(1.1);
    }
</style>
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">مدیریت پشتیبان‌گیری</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">داشبورد </a></li>
                            <li class="breadcrumb-item active">پشتیبان‌گیری</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <!-- Section 1: Automatic Backup Settings -->
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fas fa-sync-alt me-1"></i> تنظیمات پشتیبان‌گیری خودکار</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="form-check form-switch form-check-primary form-switch-lg">
                                <input type="checkbox" class="form-check-input" id="auto-backup-switch" checked>
                            </div>
                            <label class="form-label ms-1 mb-0" for="auto-backup-switch"><strong>فعال‌سازی پشتیبان‌گیری خودکار</strong></label>
                        </div>
                        <p class="text-muted">با فعال‌سازی این گزینه، سیستم به صورت خودکار در دوره‌های زمانی مشخص شده از اطلاعات شما نسخه پشتیبان تهیه می‌کند.</p>
                        <div class="mb-1">
                            <label class="form-label" for="backup-frequency">دوره زمانی</label>
                            <select class="form-select" id="backup-frequency">
                                <option value="daily">روزانه (ساعت ۰۰:۰۰ بامداد)</option>
                                <option value="weekly" selected>هفتگی (جمعه‌ها)</option>
                                <option value="monthly">ماهانه (روز اول هر ماه)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">ذخیره تنظیمات</button>
                    </div>
                </div>
            </div>

            <!-- Section 2: Manual Backup -->
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fas fa-hand-paper me-1"></i> پشتیبان‌گیری دستی</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">هر زمان که نیاز داشتید، می‌توانید به صورت دستی یک نسخه پشتیبان کامل از وب‌سایت خود ایجاد کنید.</p>
                        
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="send-email-checkbox">
                            <label class="form-check-label" for="send-email-checkbox">
                                ارسال نسخه پشتیبان به ایمیل
                            </label>
                        </div>

                        <div id="email-input-container" class="mb-2" style="display: none;">
                            <label for="backup-email" class="form-label">آدرس ایمیل</label>
                            <input type="email" id="backup-email" class="form-control" placeholder="admin@example.com">
                        </div>
                        
                        <button type="button" class="btn btn-success w-100">
                            <i class="fas fa-plus me-1"></i>
                            ایجاد نسخه پشتیبان جدید
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Backup History -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fas fa-history me-1"></i> تاریخچه نسخه‌های پشتیبان</h4>
                    </div>
                    <div class="table-responsive backup-history-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>نسخه</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>حجم فایل</th>
                                    <th>نوع</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="fw-bold">v2.5.1</span></td>
                                    <td>۱۴۰۴/۰۶/۰۸ - ۱۲:۳۰</td>
                                    <td>۱۵۰ مگابایت</td>
                                    <td><span class="badge rounded-pill badge-light-success">خودکار</span></td>
                                    <td>
                                        <a href="#" class="action-btn bg-light-primary text-primary" title="دانلود"><i class="fas fa-download"></i></a>
                                        <a href="#" class="action-btn bg-light-info text-info mx-1" title="بازیابی"><i class="fas fa-undo"></i></a>
                                        <a href="#" class="action-btn bg-light-danger text-danger" title="حذف"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-bold">v2.5.0</span></td>
                                    <td>۱۴۰۴/۰۶/۰۷ - ۰۹:۰۰</td>
                                    <td>۱۴۸ مگابایت</td>
                                    <td><span class="badge rounded-pill badge-light-warning">دستی</span></td>
                                    <td>
                                        <a href="#" class="action-btn bg-light-primary text-primary" title="دانلود"><i class="fas fa-download"></i></a>
                                        <a href="#" class="action-btn bg-light-info text-info mx-1" title="بازیابی"><i class="fas fa-undo"></i></a>
                                        <a href="#" class="action-btn bg-light-danger text-danger" title="حذف"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-bold">v2.4.9</span></td>
                                    <td>۱۴۰۴/۰۶/۰۱ - ۰۰:۰۰</td>
                                    <td>۱۴۵ مگابایت</td>
                                    <td><span class="badge rounded-pill badge-light-success">خودکار</span></td>
                                    <td>
                                        <a href="#" class="action-btn bg-light-primary text-primary" title="دانلود"><i class="fas fa-download"></i></a>
                                        <a href="#" class="action-btn bg-light-info text-info mx-1" title="بازیابی"><i class="fas fa-undo"></i></a>
                                        <a href="#" class="action-btn bg-light-danger text-danger" title="حذف"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const emailCheckbox = document.getElementById('send-email-checkbox');
        const emailInputContainer = document.getElementById('email-input-container');

        emailCheckbox.addEventListener('change', function () {
            if (this.checked) {
                emailInputContainer.style.display = 'block';
            } else {
                emailInputContainer.style.display = 'none';
            }
        });
    });
</script>
@endpush
