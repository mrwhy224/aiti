@extends('layouts.vuexy.layout')
@section('title', 'گزارشات و لاگ‌های سیستم')

@push('styles')
{{-- ApexCharts is a great library for charts --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.42.0/dist/apexcharts.min.css">
<style>
    /* Custom styles for a more polished look */
    .log-icon {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #fff;
    }
    .log-icon.create { background-color: #28c76f; } /* Success */
    .log-icon.update { background-color: #00cfe8; } /* Info */
    .log-icon.delete { background-color: #ea5455; } /* Danger */
    .log-icon.login { background-color: #ff9f43; } /* Warning */

    .stat-card i {
        font-size: 2.5rem;
        opacity: 0.3;
    }
</style>
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">گزارشات و لاگ‌های سیستم</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">داشبورد </a></li>
                            <li class="breadcrumb-item active">گزارشات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Statistics Section -->
        <div class="row">
            <!-- Top User Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card stat-card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bolder mb-0">علی محمدی</h2>
                            <p class="card-text">پرکارترین کاربر</p>
                            <small class="text-muted">۱۵۰ فعالیت در ۷ روز گذشته</small>
                        </div>
                        <i class="fas fa-user-astronaut text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- Top Module Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card stat-card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bolder mb-0">پست‌ها</h2>
                            <p class="card-text">بخش پرفعالیت</p>
                            <small class="text-muted">۴۵٪ از کل فعالیت‌ها</small>
                        </div>
                        <i class="fas fa-file-alt text-success"></i>
                    </div>
                </div>
            </div>
            <!-- Total Logs Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card stat-card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bolder mb-0">۳۲۰</h2>
                            <p class="card-text">کل رویدادها (۲۴ ساعت)</p>
                            <small class="text-danger"><i class="fas fa-arrow-up"></i> ۱۲٪ افزایش ناگهانی</small>
                        </div>
                        <i class="fas fa-chart-line text-danger"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Log History Table -->
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">تاریخچه رویدادها</h4>
                    </div>
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label">بازه زمانی</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">نوع رویداد</label>
                                <select class="form-select">
                                    <option value="">همه</option>
                                    <option value="create">ایجاد</option>
                                    <option value="update">ویرایش</option>
                                    <option value="delete">حذف</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">کاربر</label>
                                <select class="form-select">
                                    <option value="">همه</option>
                                    <option value="1">علی محمدی</option>
                                    <option value="2">سارا حسینی</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><div class="log-icon update"><i class="fas fa-edit"></i></div></td>
                                    <td>
                                        <p class="mb-0 fw-bold">پست <a href="#">"آینده نساجی هوشمند"</a> ویرایش شد.</p>
                                        <small class="text-muted">توسط: علی محمدی</small>
                                    </td>
                                    <td class="text-end">
                                        <small>۱۴۰۴/۰۶/۱۰ - ۱۱:۴۵</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div class="log-icon create"><i class="fas fa-comment-dots"></i></div></td>
                                    <td>
                                        <p class="mb-0 fw-bold">نظر جدیدی برای پست <a href="#">"تحلیل بازار پنبه"</a> ثبت شد.</p>
                                        <small class="text-muted">توسط: سارا حسینی</small>
                                    </td>
                                    <td class="text-end">
                                        <small>۱۴۰۴/۰۶/۱۰ - ۱۰:۳۰</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div class="log-icon delete"><i class="fas fa-user-times"></i></div></td>
                                    <td>
                                        <p class="mb-0 fw-bold">کاربر <span class="text-danger">"test_user"</span> حذف شد.</p>
                                        <small class="text-muted">توسط: مدیر سیستم</small>
                                    </td>
                                    <td class="text-end">
                                        <small>۱۴۰۴/۰۶/۰۹ - ۱۸:۰۰</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div class="log-icon login"><i class="fas fa-sign-in-alt"></i></div></td>
                                    <td>
                                        <p class="mb-0 fw-bold">ورود موفق به سیستم.</p>
                                        <small class="text-muted">توسط: علی محمدی</small>
                                    </td>
                                    <td class="text-end">
                                        <small>۱۴۰۴/۰۶/۰۹ - ۰۹:۱۵</small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Chart Section -->
            <div class="col-lg-4 col-12">
                 <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">توزیع فعالیت‌ها</h4>
                    </div>
                    <div class="card-body">
                        <div id="activity-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.42.0/dist/apexcharts.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ApexCharts configuration for the donut chart
        var options = {
            chart: {
                type: 'donut',
                fontFamily: 'Vazirmatn, sans-serif',
            },
            series: [45, 25, 15, 15], // Example data: Posts, Comments, Users, Other
            labels: ['پست‌ها', 'نظرات', 'کاربران', 'سایر'],
            colors: ['#69a297', '#50808e', '#e9d8a6', '#b9c2d3'],
            legend: {
                position: 'bottom'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: '100%'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#activity-chart"), options);
        chart.render();
    });
</script>
@endpush
