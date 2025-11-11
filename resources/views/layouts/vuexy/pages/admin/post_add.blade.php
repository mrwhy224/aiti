@extends('layouts.vuexy.layout')
@section('title', 'افزودن مطلب')

@push('styles_before_theme')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    {{-- SweetAlert برای پیام‌های موفقیت/خطا --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/animate/animate.min.css') }}">
@endpush

@push('styles')
    {{-- استایل‌های شما برای Editor.js و Select2 --}}
    <style>
        .editor-container { border: 1px solid #d8d6de; ... }
        .codex-editor--rtl { ... }
        /* ... بقیه استایل‌های شما ... */
        .select2-container--default ... { ... }
        
        /* نمایش پیش‌نمایش تصویر شاخص */
        #featured-image-preview-container {
            display: none;
            position: relative;
            margin-top: 10px;
        }
        #featured-image-preview {
            max-width: 100%;
            height: auto;
            border-radius: 0.357rem;
            border: 1px solid #d8d6de;
        }
        #remove-featured-image {
            position: absolute;
            top: -10px;
            right: -10px;
            background: #ea5455;
            color: white;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    {{-- ... بخش breadcrumbs ... --}}
    <div class="content-body">
        {{-- 
          - اکشن فرم باید به روت store اشاره کند
          - enctype حذف شد چون ارسال با AJAX است
        --}}
        <form action="{{ route('post_store') }}" method="POST" id="article-form">
            <input type="hidden" name="upload_token" value="{{ $uploadToken }}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"> ... </div>
                        <div class="card-body">
                            <div class="row">
                                {{-- عنوان مطلب --}}
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="title">عنوان مطلب</label>
                                        <input type="text" id="title" class="form-control" name="title" required>
                                    </div>
                                </div>
                                {{-- تگ‌ها --}}
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="tags-select">تگ‌ها</label>
                                        <select class="select2 form-select" id="tags-select" name="tags[]" multiple="multiple">
                                            @isset($tags)
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                
                                {{-- تصویر شاخص (اصلاح شده) --}}
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label for="featured_image_input" class="form-label">تصویر شاخص</label>
                                        {{-- 
                                          - ID این فیلد تغییر کرد
                                          - name="featured_image" حذف شد تا در ارسال فرم اصلی نیاید
                                        --}}
                                        <input class="form-control" type="file" id="featured_image_input">
                                        
                                        {{-- فیلد مخفی برای ذخیره آدرس تصویر در دیتابیس (بر اساس میگریشن شما) --}}
                                        <input type="hidden" name="featured_image_path" id="featured_image_path">
                                        
                                        {{-- (اختیاری) نمایش پیش‌نمایش تصویر آپلود شده --}}
                                        <div id="featured-image-preview-container">
                                            <img id="featured-image-preview" src="" alt="پیش‌نمایش تصویر شاخص" />
                                            <span id="remove-featured-image" class="badge badge-circle">
                                                @icon('x')
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- خلاصه مطلب --}}
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="excerpt">خلاصه مطلب (Excerpt)</label>
                                        <textarea class="form-control" id="excerpt" name="excerpt" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- محتوای مطلب (Editor.js) --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">محتوای مطلب (Body)</h4>
                        </div>
                        <div class="card-body">
                            <div id="editorjs" class="editor-container"></div>
                            <input type="hidden" name="body" id="editor-content">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1" id="save-button">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                        ذخیره مطلب
                    </button>
                    <button type="reset" class="btn btn-outline-secondary">لغو</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('page_js')
    {{-- ۱. اسکریپت‌های Select2 و SweetAlert --}}
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/select/i18n/fa.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

    {{-- ۲. اسکریپت‌های Editor.js (از کد شما) --}}
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    {{-- ... بقیه اسکریپت‌های tools ... --}}
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/editorjs-button@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>

    <script>
        $(document).ready(function() {
            // ۳. فعال‌سازی Select2
            $('#tags-select').wrap('<div class="position-relative"></div>').select2({
                dropdownAutoWidth: true,
                dropdownParent: $('#tags-select').parent(),
                width: '100%',
                placeholder: 'تگ‌ها را انتخاب کنید...',
                dir: 'rtl',
                language: 'fa'
            });

            // --- متغیرهای اصلی برای آپلود و ذخیره ---
            const editorInstance = initializeEditor();
            const form = document.getElementById('article-form');
            const saveButton = document.getElementById('save-button');
            const uploadToken = document.querySelector('input[name="upload_token"]').value;
            const csrfToken = document.querySelector('input[name="_token"]').value;
            const uploadUrl = '{{ route("admin.post.upload") }}'; // روت آپلود شما

            // ۴. آپلود فوری تصویر شاخص
            $('#featured_image_input').on('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                const formData = new FormData();
                formData.append('image', file);
                formData.append('upload_token', uploadToken);
                formData.append('_token', csrfToken);
                
                // نمایش لودینگ (مثلا روی فیلد)
                $(this).prop('disabled', true);

                fetch(uploadUrl, {
                    method: 'POST',
                    body: formData,
                    headers: { 'Accept': 'application/json' }
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        // آدرس URL را در فیلد مخفی قرار بده (بر اساس میگریشن شما)
                        $('#featured_image_path').val(result.file.url);

                        // نمایش پیش‌نمایش
                        $('#featured-image-preview').attr('src', result.file.url);
                        $('#featured-image-preview-container').show();
                        $(this).hide(); // مخفی کردن فیلد آپلود
                        
                        Swal.fire({ icon: 'success', title: 'تصویر شاخص آپلود شد', showConfirmButton: false, timer: 1500 });
                    } else {
                        throw new Error('Upload failed');
                    }
                })
                .catch(error => {
                    console.error('Featured image upload error:', error);
                    Swal.fire({ icon: 'error', title: 'خطا', text: 'آپلود تصویر شاخص ناموفق بود.' });
                    $(this).prop('disabled', false); // فعال‌سازی مجدد
                });
            });

            // ۴.ب. حذف تصویر شاخص (اختیاری)
            $('#remove-featured-image').on('click', function() {
                $('#featured_image_path').val('');
                $('#featured-image-preview-container').hide();
                $('#featured_image_input').val('').show().prop('disabled', false);
                // نکته: این کار فایل را از دیتابیس (attachments) حذف نمی‌کند
                // فایل‌های رها شده باید بعدا پاکسازی شوند
            });


            // ۵. ذخیره نهایی فرم (اصلاح شده)
            saveButton.addEventListener('click', function (event) {
                event.preventDefault();
                const saveButtonSpan = saveButton.querySelector('span');
                saveButton.disabled = true;
                saveButtonSpan.style.display = 'inline-block';

                // ۱. ابتدا دیتای Editor.js را ذخیره کن
                editorInstance.save()
                    .then((outputData) => {
                        // ۲. دیتای JSON را در فیلد مخفی body قرار بده
                        document.getElementById('editor-content').value = JSON.stringify(outputData);

                        // ۳. کل فرم را با FormData جمع‌آوری کن
                        const formData = new FormData(form);
                        
                        // ۴. فرم را با AJAX ارسال کن
                        return fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json',
                                // 'X-CSRF-TOKEN' نیاز نیست چون در FormData هست
                            }
                        });
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'موفق!',
                                text: result.message,
                                showConfirmButton: false,
                                timer: 2000
                            }).then(() => {
                                // ریدایرکت به صفحه لیست (مثلا)
                                window.location.href = result.redirect_url;
                            });
                        } else {
                            throw new Error(result.message || 'خطای ناشناخته');
                        }
                    })
                    .catch((error) => {
                        console.error('Saving failed: ', error);
                        Swal.fire({ icon: 'error', title: 'خطا در ذخیره‌سازی!', text: error.message });
                        saveButton.disabled = false;
                        saveButtonSpan.style.display = 'none';
                    });
            });
        });

        // ۵. اسکریپت فعال‌سازی Editor.js (از کد شما)
        function initializeEditor() {
            const TOKEN = document.querySelector('input[name="upload_token"]').value;
            const CSRF_TOKEN = document.querySelector('input[name="_token"]').value;
            const editor = new EditorJS({
                holder: 'editorjs',
                i18n: {
                    direction: 'rtl',
                     messages: {
                        ui: {
                            "blockTunes": { "toggler": { "Click to tune": "برای تنظیم کلیک کنید", "or drag to move": "یا برای جابجایی بکشید" } },
                            "inlineToolbar": { "converter": { "Convert to": "تبدیل به" } },
                            "toolbar": { "toolbox": { "Add": "افزودن", "Filter": "جستجو..." } },
                            "popover": { "Filter": "جستجو...", "Nothing found": "چیزی یافت نشد" }
                        },
                        toolNames: { "Text": "متن", "Heading": "تیتر", "List": "لیست", "Quote": "نقل قول", "Table": "جدول", "Image": "تصویر", "Embed": "جاسازی", "Bold": "ضخیم", "Italic": "کج", "Link": "لینک" },
                        tools: { "list": { "Ordered": "لیست عددی", "Unordered": "لیست نقطه‌ای" }, "link": { "Add a link": "افزودن لینک" }, "stub": { 'The block can not be displayed correctly.': 'این بلوک به درستی نمایش داده نمی‌شود.' } },
                        blockTunes: { "delete": { "Delete": "حذف", "Click to delete": "برای حذف کلیک کنید" }, "moveUp": { "Move up": "انتقال به بالا" }, "moveDown": { "Move down": "انتقال به پایین" } },
                    }
                },
                tools: {
                    AnyButton: { class: AnyButton, inlineToolbar: false, config:{ css:{ "btnColor": "btn--gray" }, textValidation: (text) => { console.log("error!", text); return true; } } },
                    delimiter: Delimiter,
                    header: { class: Header, inlineToolbar: true, config: { placeholder: 'تیتر را وارد کنید', levels: [2, 3, 4], defaultLevel: 2 } },
                    quote: { class: Quote, inlineToolbar: true, config: { quotePlaceholder: 'متن نقل قول را وارد کنید', captionPlaceholder: 'نویسنده نقل قول' } },
                    image: {
                        class: ImageTool,
                        config: {
                            additionalRequestData: {
                                _token: CSRF_TOKEN,
                                upload_token: TOKEN 
                            },
                            uploader: {
                                uploadByFile(file){
                                    var formData = new FormData();
                                    formData.append('image', file);
                                    formData.append('_token', CSRF_TOKEN);
                                    formData.append('upload_token', TOKEN);
                                    formData.append('is_main', '0');
                                    return fetch('{{ route("admin.post.upload") }}', {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'Accept': 'application/json'
                                        }
                                    }).then(response => response.json())
                                      .then(result => {
                                        if (result.success) {
                                            return {
                                                success: 1,
                                                file: {
                                                    url: result.file.url
                                                }
                                            };
                                        } else {
                                            return { success: 0 };
                                        }
                                    });
                                },
                                uploadByUrl(url){
                                    return new Promise((resolve) => {
                                        resolve({ success: 1, file: { url: url } });
                                    });
                                }
                            }
                        }
                    },
                    table: { class: Table, inlineToolbar: true },
                    embed: Embed,
                },
                placeholder: 'شروع به نوشتن کنید...',
            });

            return editor;
        }
    </script>
@endpush