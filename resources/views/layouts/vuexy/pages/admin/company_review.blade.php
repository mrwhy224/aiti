@extends('layouts.vuexy.layout')
@section('title', 'بررسی پرونده شرکت: ' . $company->name)

@push('vendor_js')
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endpush

@push('styles_before_theme')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
@endpush

@push('styles')
<style>
    /* استایل برای کارت‌های بررسی */
    .document-review-card {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    .document-review-card.status-approved {
        border-color: #28c76f; /* سبز */
        background-color: #eaf8f0;
    }
    .document-review-card.status-rejected {
        border-color: #ea5455; /* قرمز */
        background-color: #fceeee;
    }
    .document-preview {
        height: 150px;
        width: 100%;
        background-color: #f3f3f3;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
    }
    .document-preview img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
    }
    .document-preview .preview-icon {
        font-size: 3rem;
        color: #b9b9c3;
    }
</style>
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h2 class="content-header-title float-start mb-0">بررسی پرونده: {{ $company->name }}</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">داشبورد </a></li>
                    <li class="breadcrumb-item"><a href="{{ route('company.pending') }}">در انتظار تایید</a></li> {{-- فرض می‌کنیم نام روت لیست انتظار این است --}}
                    <li class="breadcrumb-item active">بررسی پرونده</li>
                </ol>
            </div>
        </div>
    </div>
    
    <div class="content-body">
        <div class="row">
            @foreach ($requiredTypes as $type => $title)
                @php
                    $attachment = $attachments->get($type); // فایل پیوست شده را پیدا کن
                    $currentStatus = $attributes->get($type, 'uploaded'); // وضعیت فعلی (uploaded, confirmed, rejected)
                    $isImage = $attachment && Str::startsWith($attachment->mime_type, 'image/');
                @endphp

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card document-review-card status-{{ $currentStatus }}" data-doc-type="{{ $type }}" data-status="{{ $currentStatus }}">
                        <div class="card-header">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            
                            @if ($attachment)
                                <div class="document-preview mb-1">
                                    @if ($isImage)
                                        <img src="{{ route('company.documents', ['company' => $company->id, 'documentType' => $type]) }}" alt="{{ $title }}">
                                    @else
                                        <i data-feather="file-text" class="preview-icon"></i>
                                    @endif
                                </div>
                                <p class="text-muted small">نام فایل: {{ $attachment->original_name }}</p>
                                <a href="{{ route('company.documents', ['company' => $company->id, 'documentType' => $type]) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100 mb-1">
                                    <i data-feather="eye"></i> مشاهده / دانلود فایل
                                </a>
                            @else
                                <div class="document-preview mb-1">
                                    <i data-feather="x-circle" class="preview-icon text-danger"></i>
                                </div>
                                <p class="text-danger w-100 text-center">فایل بارگذاری نشده است</p>
                            @endif

                            {{-- ... (بخش دکمه‌های تایید/رد و دلیل رد بدون تغییر) ... --}}
                            <div class="d-flex justify-content-between mb-1">
                                <button class="btn btn-success btn-approve w-50 me-1" {{ $currentStatus == 'confirmed' ? 'disabled' : '' }}>
                                    <i data-feather="check"></i> تایید
                                </button>
                                <button class="btn btn-danger btn-reject w-50" {{ $currentStatus == 'rejected' ? 'disabled' : '' }}>
                                    <i data-feather="x"></i> رد
                                </button>
                            </div>
                            <div class="rejection-reason {{ $currentStatus != 'rejected' ? 'd-none' : '' }} mt-1">
                                <label class="form-label" for="reason-{{$type}}">دلیل رد کردن:</label>
                                <textarea class="form-control rejection-reason-input" id="reason-{{$type}}" rows="2">{{ $attributes->get('notes') }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <label for="overall-comment" class="form-label">پیام کلی برای کاربر (اختیاری):</label>
                    <textarea id="overall-comment" class="form-control" rows="3" placeholder="این پیام برای کاربر ارسال خواهد شد (مثلاً: لوگوی شما نیاز به اصلاح دارد)..."></textarea>
                </div>
                <button id="submit-review-btn" class="btn btn-primary w-100" data-company-id="{{ $company->id }}">
                    ثبت نهایی بررسی و ارسال نتایج
                </button>
            </div>
        </div>
    </div>
@endsection


@push('page_js')
<script>
// فایل: public/js/scripts/company_review.js

document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf_token"]')?.getAttribute('content');
    const reviewCards = document.querySelectorAll('.document-review-card');
    
    // شیء برای نگهداری وضعیت‌ها
    let reviewDecisions = {};

    reviewCards.forEach(card => {
        const docType = card.dataset.docType;
        const initialStatus = card.dataset.status;

        // مقداردهی اولیه وضعیت
        reviewDecisions[docType] = {
            status: initialStatus,
            reason: card.querySelector('.rejection-reason-input')?.value || ''
        };

        const approveBtn = card.querySelector('.btn-approve');
        const rejectBtn = card.querySelector('.btn-reject');
        const reasonDiv = card.querySelector('.rejection-reason');
        const reasonInput = card.querySelector('.rejection-reason-input');

        // رویداد کلیک دکمه "تایید"
        if (approveBtn) {
            approveBtn.addEventListener('click', () => {
                card.classList.add('status-approved');
                card.classList.remove('status-rejected');
                reasonDiv.classList.add('d-none');
                approveBtn.disabled = true;
                rejectBtn.disabled = false;
                reviewDecisions[docType] = { status: 'approved', reason: '' };
                if (reasonInput) reasonInput.value = '';
            });
        }

        // رویداد کلیک دکمه "رد"
        if (rejectBtn) {
            rejectBtn.addEventListener('click', () => {
                card.classList.add('status-rejected');
                card.classList.remove('status-approved');
                reasonDiv.classList.remove('d-none');
                rejectBtn.disabled = true;
                approveBtn.disabled = false;
                reviewDecisions[docType] = { status: 'rejected', reason: '' };
            });
        }
    });

    const submitBtn = document.getElementById('submit-review-btn');
    if (submitBtn) {
        submitBtn.addEventListener('click', () => {
            
            // ---
            // *** بخش اصلاح شده اعتبارسنجی (Validation) ***
            // ---
            let allReviewed = true;
            let unreviewedItems = []; // آرایه‌ای برای نام مدارک بررسی نشده

            for (const docType in reviewDecisions) {
                // اگر وضعیت مدرکی هنوز 'uploaded' (یعنی بررسی نشده) بود
                if (reviewDecisions[docType].status === 'uploaded') {
                    allReviewed = false;
                    // نام مدرک را از کارت مربوطه پیدا کن
                    const card = document.querySelector(`.document-review-card[data-doc-type="${docType}"]`);
                    const title = card.querySelector('.card-title').textContent;
                    unreviewedItems.push(title);
                }
            }

            // اگر همه‌ی موارد بررسی نشده بودند، خطای واضح نمایش بده
            if (!allReviewed) {
                
                // ۱. ساخت لیست HTML خوانا با نام مدارک
                let errorListHtml = '<ul class="list-unstyled text-end mt-1" style="padding-right: 1rem;">';
                unreviewedItems.forEach(itemTitle => {
                    // ۲. استفاده از آیکون هشدار Feather برای جلب توجه
                    errorListHtml += `<li class="mb-50 d-flex align-items-center justify-content-end">
                                          <strong class="me-50">${itemTitle}</strong>
                                          ${feather.icons['alert-triangle'].toSvg({ class: 'text-warning', width: 18, height: 18 })}
                                      </li>`;
                });
                errorListHtml += '</ul>';

                // ۳. نمایش پیغام SweetAlert بسیار شفاف
                Swal.fire({
                    title: 'بررسی کامل نشده!',
                    icon: 'warning',
                    // استفاده از `html` برای نمایش لیست
                    html: `
                        <p class="mb-1">
                            شما باید وضعیت <strong>تمام</strong> مدارک را مشخص کنید.
                            لطفاً برای موارد زیر، دکمه <strong>«تایید»</strong> یا <strong>«رد»</strong> را بزنید:
                        </p>
                        ${errorListHtml}
                        <p class="mt-1">هیچ مدرکی نباید در حالت اولیه (بررسی نشده) باقی بماند.</p>
                    `,
                    confirmButtonText: 'متوجه شدم'
                });
                return; // ارسال را متوقف کن
            }
            // --- (پایان بخش اصلاح شده) ---


            const companyId = submitBtn.dataset.companyId;
            const overallComment = document.getElementById('overall-comment').value;

            // ۱. جمع‌آوری دلایل رد
            for (const docType in reviewDecisions) {
                if (reviewDecisions[docType].status === 'rejected') {
                    const reason = document.querySelector(`.document-review-card[data-doc-type="${docType}"] .rejection-reason-input`).value;
                    reviewDecisions[docType].reason = reason;
                }
            }

            // ۲. نمایش لودینگ
            submitBtn.disabled = true;
            submitBtn.innerHTML = feather.icons['loader'].toSvg({ class: 'animate-spin me-50' }) + ' در حال ارسال...';

            // ۳. ارسال با Fetch
            fetch(`/admin/api/review/${companyId}/`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    decisions: reviewDecisions,
                    overall_comment: overallComment
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'موفق!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'باشه'
                    }).then(() => {
                        window.location.href = document.referrer; // بازگشت به صفحه‌ی لیست
                    });
                } else {
                    throw new Error(data.message || 'خطایی رخ داد');
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'خطا!',
                    text: error.message,
                    icon: 'error',
                    confirmButtonText: 'باشه'
                });
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'ثبت نهایی بررسی و ارسال نتایج';
            });
        });
    }
});
</script>
@endpush