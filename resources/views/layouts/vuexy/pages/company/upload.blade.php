@extends('layouts.vuexy.layout')
@section('title', 'آپلود سند')
@push('styles')
    <style>
    /* استایل اصلی کادر آپلودر */
    .file-uploader {
    border: 2px dashed #dbdbdb; /* استفاده از رنگ خاکستری ملایم Vuexy */
    border-radius: 8px; /* گوشه‌های گرد */
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    position: relative;
    min-height: 190px;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    /* حالت هاور (Hover) */
    .file-uploader:hover,
    .file-uploader.drag-over {
    background-color: #f8f8f8; /* پس‌زمینه بسیار روشن */
    border-color: #7367f0; /* رنگ اصلی Vuexy (Primary) */
    }

    /* آیکون آپلود */
    .file-uploader .uploader-default-state i {
    color: #7367f0; /* رنگ Primary */
    }

    /* حالت‌های آپلود و موفقیت */
    .file-uploader .uploader-loading-state,
    .file-uploader .uploader-success-state {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    }

    /* استایل پیش‌نمایش تصویر */
    .file-uploader .uploader-success-state .img-thumbnail {
    object-fit: cover;
    }
    </style>
@endpush

@push('page_js')
    <script>

        document.addEventListener("DOMContentLoaded", function () {

            const csrfToken = document.querySelector('meta[name="csrf_token"]')?.getAttribute('content');
            if (!csrfToken) {
                console.error('CSRF Token not found!');
            }

            const allUploaders = document.querySelectorAll(".file-uploader");

            allUploaders.forEach((uploader) => {

                // --- بخش جدید: چک کردن وضعیت ---
                // اگر آپلودر کلاس 'disabled-uploader' (تایید شده) را داشت...
                if (uploader.classList.contains('disabled-uploader')) {
                    const fileInput = uploader.querySelector(".file-input");
                    if(fileInput) fileInput.disabled = true; // اینپوت را هم غیرفعال کن
                    return; // ...هیچ رویداد کلیک یا درگی به آن اضافه نکن و خارج شو
                }
                // --- پایان بخش جدید ---

                // (ادامه کد JS شما برای آپلودرهای فعال)
                const fileInput = uploader.querySelector(".file-input");
                const defaultState = uploader.querySelector(".uploader-default-state");
                const loadingState = uploader.querySelector(".uploader-loading-state");
                const successState = uploader.querySelector(".uploader-success-state");
                const removeButton = uploader.querySelector(".btn-remove-file");
                const fileNameEl = successState.querySelector(".file-name"); // انتخاب دقیق‌تر
                const previewImg = successState.querySelector(".img-thumbnail"); // انتخاب دقیق‌تر

                // بخش مربوط به پوشاندن پیام رد شده (Rejected)
                const rejectionOverlay = uploader.querySelector('.rejection-overlay');

                const uploadURL = uploader.dataset.uploadUrl;
                const showPreview = uploader.dataset.showPreview === "true";

                // ۱. فعال کردن کلیک روی کادر
                uploader.addEventListener("click", (e) => {
                    if (e.target.classList.contains('btn-remove-file')) return;
                    fileInput.click();
                });

                // ۲. مدیریت رویداد انتخاب فایل
                fileInput.addEventListener("change", (e) => {
                    if (e.target.files && e.target.files[0]) {
                        const file = e.target.files[0];
                        handleUpload(file);
                    }
                });

                // ۳. مدیریت کشیدن و رها کردن (Drag & Drop)
                uploader.addEventListener("dragover", (e) => {
                    e.preventDefault();
                    uploader.classList.add("drag-over");
                });
                uploader.addEventListener("dragleave", () => {
                    uploader.classList.remove("drag-over");
                });
                uploader.addEventListener("drop", (e) => {
                    e.preventDefault();
                    uploader.classList.remove("drag-over");
                    if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                        const file = e.dataTransfer.files[0];
                        fileInput.files = e.dataTransfer.files;
                        handleUpload(file);
                    }
                });

                // ۴. تابع اصلی آپلود فایل
                function handleUpload(file) {
                    // اگر پیام "رد شده" وجود داشت، آن را مخفی کن
                    if (rejectionOverlay) {
                        rejectionOverlay.classList.add('d-none');
                    }

                    // ... (بقیه کد handleUpload شما) ...
                    defaultState.classList.add("d-none");
                    successState.classList.add("d-none");
                    loadingState.classList.remove("d-none");
                    loadingState.classList.add("d-flex");

                    const formData = new FormData();
                    formData.append("file", file);
                    if (csrfToken)
                        formData.append("_token", csrfToken);

                    // ... (بقیه کد fetch شما) ...
                    fetch(uploadURL, {
                        method: "POST",
                        body: formData,
                        headers: { 'Accept': 'application/json' }
                    })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(errorData => {
                                    throw { responseData: errorData, status: response.status };
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            loadingState.classList.add("d-none");
                            loadingState.classList.remove("d-flex");
                            successState.classList.remove("d-none");
                            successState.classList.add("d-flex");

                            if (fileNameEl) {
                                fileNameEl.textContent = file.name;
                            }

                            if (showPreview && previewImg && file.type.startsWith("image/")) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    previewImg.src = e.target.result;
                                }
                                reader.readAsDataURL(file);
                            } else if (!showPreview && successState.querySelector('i[data-feather="check-circle"]')) {
                                // اگر پیش‌نمایش نبود، آیکون چک را نشان بده (اگر قبلا file-text بود)
                                successState.querySelector('i').setAttribute('data-feather', 'check-circle');
                                feather.replace(); // رفرش آیکون‌ها
                            }

                            // ... (کد SweetAlert موفقیت‌آمیز) ...
                        })
                        .catch(error => {
                            // ... (کد SweetAlert خطا) ...
                            resetToDefault(); // بازگشت به حالت پیش‌فرض
                        });
                }

                // ۵. مدیریت دکمه حذف
                removeButton.addEventListener("click", () => {
                    resetToDefault();
                });

                function resetToDefault() {
                    fileInput.value = "";
                    successState.classList.add("d-none");
                    successState.classList.remove("d-flex");
                    loadingState.classList.add("d-none");
                    loadingState.classList.remove("d-flex");
                    defaultState.classList.remove("d-none");

                    // اگر پیام "رد شده" وجود داشت، آن را دوباره نشان بده
                    if (rejectionOverlay) {
                        rejectionOverlay.classList.remove('d-none');
                    }
                }

            }); // پایان forEach
        });
    </script>
@endpush
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">مدارک</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">داشبورد
                            </li>
                            <li class="breadcrumb-item active">آپلود سند</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if($latestNotificationMessage)
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">
                <i data-feather="bell" class="me-50"></i>
                آخرین پیام از طرف ادمین
            </h4>
            <div class="alert-body">
                {!! nl2br(e($latestNotificationMessage)) !!}
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">بارگذاری اسناد و مدارک شرکت</h4>
        </div>
        <div class="card-body">
            <p class="card-text">
                مدارک مورد نیاز را بارگذاری کنید. مدارک <span class="text-success">تایید شده</span> قابل تغییر نیستند.
                مدارک <span class="text-danger">رد شده</span> باید مجدداً بارگذاری شوند.
            </p>

            <div class="row">

                @php
                    $documentList = [
                        'gazette-changes' => 'روزنامه رسمی تغییرات',
                        'gazette-capital' => 'روزنامه رسمی سرمایه',
                        'establishment-license' => 'جواز تاسیس',
                        'operation-license' => 'پروانه بهره برداری',
                        'insurance-list' => 'لیست بیمه',
                        'logo' => 'لوگوی شرکت (PNG شفاف)',
                        'personnel-photo' => 'عکس پرسنلی (مدیرعامل / رئیس هیئت مدیره)',
                    ];
                @endphp

                @foreach ($documentList as $docType => $title)
                    @php
                        $file = $attachments->get($docType); // فایل پیوست (اگر وجود دارد)
                        $attribute = $attributes->get($docType); // وضعیت (اگر وجود دارد)

                        // تعیین وضعیت نهایی
                        // 1. اگر وضعیت در دیتابیس بود (confirmed, rejected)
                        // 2. اگر نبود، چک کن فایل هست؟ (uploaded)
                        // 3. اگر فایل هم نبود (empty)
                        $status = $attribute->value ?? ($file ? 'uploaded' : 'empty');

                        $isDisabled = ($status == 'confirmed');
                        $isRejected = ($status == 'rejected');
                        $rejectionNote = $attribute->notes ?? null;

                        $isImage = in_array($docType, ['logo', 'personnel-photo']);
                    @endphp

                    <div class="col-md-6 mb-2">
                        <label class="form-label">{{ $title }}</label>

                        <div class="file-uploader
                            {{ $isDisabled ? 'disabled-uploader' : '' }}
                            {{ $isRejected ? 'rejected-uploader' : '' }}"
                             data-upload-url="/company/upload/{{ $docType }}"
                             data-show-preview="{{ $isImage ? 'true' : 'false' }}">

                            <div class="uploader-default-state {{ $file ? 'd-none' : '' }}">
                                <i data-feather="{{ $isImage ? 'image' : 'upload-cloud' }}" class="font-large-2"></i>
                                <h5 class="mt-1">فایل را بکشید و رها کنید</h5>
                                <p class="text-muted">یا برای انتخاب کلیک کنید</p>
                            </div>

                            <div class="uploader-loading-state d-none">
                                <div class="spinner-border text-primary" role="status"></div>
                                <p class="mt-1">در حال آپلود...</p>
                            </div>

                            <div class="uploader-success-state {{ $file ? 'd-flex' : 'd-none' }}">
                                @if ($file)
                                    @if ($isImage)
                                        <img class="img-thumbnail rounded" src="{{ route('documents.download', ['documentType' => $docType]) }}" alt="{{ $title }}" style="max-height: 100px;"/>
                                    @else
                                        <i data-feather="file-text" class="font-large-2 text-success"></i>
                                    @endif

                                    <p class="file-name mt-1">{{ $file->original_name }}</p>

                                    @if($status == 'uploaded')
                                        <span class="badge bg-warning mt-1">در انتظار بررسی</span>
                                    @endif
                                        @if(!$isDisabled)
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-remove-file mt-1">
                                        تغییر فایل
                                    </button>
                                        @endif
                                @else
                                    <img class="img-thumbnail rounded" src="#" alt="Preview" style="max-height: 100px;"/>
                                    <p class="file-name mt-1"></p>
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-remove-file mt-1">
                                        تغییر فایل
                                    </button>
                                @endif
                            </div>

                            <input type="file" class="file-input" hidden {{ $isImage ? 'accept="image/*"' : '' }} />

                            @if($isRejected)
                                <div class="rejection-overlay">
                                    <div class="alert alert-danger h-100 d-flex flex-column justify-content-center">
                                        <h4 class="alert-heading"><i data-feather="x-circle" class="me-50"></i> رد شده</h4>
                                        <div class="alert-body">
                                            <strong>دلیل:</strong> {{ $rejectionNote ?? 'دلیلی ثبت نشده است.' }}
                                            <br>
                                            <small>لطفاً فایل صحیح را دوباره آپلود کنید.</small>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($isDisabled)
                                <div class="disabled-overlay">
                                    <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                        <i data-feather="lock" class="font-large-2 text-success"></i>
                                        <h5 class="mt-1 text-success">تایید نهایی شده</h5>
                                        <p class="text-muted">این مدرک قابل تغییر نیست.</p>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
