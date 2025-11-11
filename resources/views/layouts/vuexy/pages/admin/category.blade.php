@extends('layouts.vuexy.layout')
@section('title', 'مدیریت دسته‌بندی‌ها')

@push('styles')
    {{-- استایل‌های مورد نیاز برای DataTables --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">مدیریت دسته‌بندی‌ها</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{-- route('admin_dashboard') --}}">داشبورد</a></li>
                            <li class="breadcrumb-item active">دسته‌بندی‌ها</li>
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
                        <h4 class="card-title">افزودن دسته‌بندی جدید</h4>
                    </div>
                    <div class="card-body">
                        {{-- فرم به روت store ارسال می‌شود --}}
                        <form action="{{-- route('admin.categories.store') --}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="name">عنوان دسته‌بندی</label>
                                        <input type="text" id="name" class="form-control" placeholder="مثال: تکنولوژی نساجی" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="slug">اسلاگ (Slug)</label>
                                        <input type="text" id="slug" class="form-control" placeholder="مثال: tech-textile" name="slug" required>
                                        <div class="form-text">این آدرس URL دسته‌بندی است (فقط حروف انگلیسی، اعداد و خط تیره).</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="description">توضیحات (اختیاری)</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="توضیح کوتاه در مورد این دسته‌بندی"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary me-1">ذخیره</button>
                                    <button type="reset" class="btn btn-outline-secondary">لغو</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">لیست دسته‌بندی‌ها</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="categories-datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان</th>
                                        <th>اسلاگ</th>
                                        <th>تعداد مطالب</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- این متغیر باید از کنترلر پاس داده شود --}}
                                    @forelse($categories as $index => $category)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>{{ $category->name }}</strong></td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->posts_count ?? 0 }}</td> {{-- فرض بر اینکه شمارش مطالب را دارید --}}
                                            <td>
                                                {{-- دکمه ویرایش --}}
                                                <a href="{{-- route('admin.categories.edit', $category->id) --}}" class="btn btn-icon btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                
                                                {{-- دکمه حذف (داخل فرم برای متد DELETE) --}}
                                                <form action="{{-- route('admin.categories.destroy', $category->id) --}}" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این دسته‌بندی مطمئن هستید؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                        <i data-feather="trash-2"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">هیچ دسته‌بندی یافت نشد.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_js')
    {{-- اسکریپت‌های مورد نیاز برای DataTables --}}
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>

    <script>
        // فعال‌سازی DataTables
        $(document).ready(function() {
            $('#categories-datatable').DataTable({
                language: {
                    // آدرس فایل ترجمه فارسی DataTables
                    "url": "{{ asset('app-assets/vendors/js/tables/datatable/fa.json') }}" 
                },
                responsive: true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "همه"]],
                "pageLength": 10
            });

            // فعال‌سازی Tooltip‌ها
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endpush