@extends('layouts.vuexy.layout')
@section('title', 'افزودن مطلب')

@push('styles')
<style>
    .editor-container {
        border: 1px solid #d8d6de;
        border-radius: 0.357rem;
        padding: 1rem;
        background-color: #fff;
    }
    .codex-editor--rtl {
        direction: rtl;
    }
    .codex-editor--rtl .ce-block__content,
    .codex-editor--rtl .ce-toolbar__content {
        text-align: right;
    }
    .active {
        color: blue;
    }
</style>
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">افزودن مطلب جدید</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">داشبورد </a></li>
                            <li class="breadcrumb-item active">افزودن مطلب</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Form for adding a new post -->
        <form action="" method="POST" enctype="multipart/form-data" id="article-form">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">اطلاعات اصلی مطلب</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="title">عنوان مطلب</label>
                                        <input type="text" id="title" class="form-control" placeholder="مثال: آینده نساجی هوشمند" name="title" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="category">دسته‌بندی</label>
                                        <select class="form-select" id="category" name="category_id" required>
                                            <option value="">انتخاب کنید...</option>
                                            <option value="1">تکنولوژی</option>
                                            <option value="2">بازار</option>
                                            <option value="3">پایداری</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label for="formFile" class="form-label">تصویر شاخص</label>
                                        <input class="form-control" type="file" id="formFile" name="featured_image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="summary">خلاصه مطلب</label>
                                        <textarea class="form-control" id="summary" name="summary" rows="3" placeholder="یک توضیح کوتاه در مورد مقاله بنویسید"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">محتوای مطلب</h4>
                        </div>
                        <div class="card-body">
                            <!-- Placeholder for Editor.js -->
                            <div id="editorjs" class="editor-container"></div>
                            <!-- Hidden input to store Editor.js JSON output -->
                            <input type="hidden" name="content" id="editor-content">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1" id="save-button">ذخیره مطلب</button>
                    <button type="reset" class="btn btn-outline-secondary">لغو</button>
                </div>
            </div>
        </form>
    </div>
@endsection

{{-- START: Scripts for Editor.js --}}
@push('page_js')
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    <!-- 2. Editor.js Tools -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>

    <script>
        // Use the 'load' event to ensure all external scripts are loaded before execution
        window.addEventListener('load', function () {
            // Initialize Editor.js
            const editor = new EditorJS({
                holder: 'editorjs',
                
                // RTL and Persian Language Configuration
                i18n: {
                    direction: 'rtl',
                     messages: {
                        ui: {
                            "blockTunes": {
                                "toggler": {
                                    "Click to tune": "برای تنظیم کلیک کنید",
                                    "or drag to move": "یا برای جابجایی بکشید"
                                }
                            },
                            "inlineToolbar": {
                                "converter": {
                                    "Convert to": "تبدیل به"
                                }
                            },
                            "toolbar": {
                                "toolbox": {
                                    "Add": "افزودن",
                                    "Filter": "جستجو..."
                                }
                            },
                            "popover": {
                                "Filter": "جستجو...",
                                "Nothing found": "چیزی یافت نشد"
                            }
                        },
                        toolNames: {
                            "Text": "متن",
                            "Heading": "تیتر",
                            "List": "لیست",
                            "Quote": "نقل قول",
                            "Table": "جدول",
                            "Image": "تصویر",
                            "Embed": "جاسازی",
                            "Bold": "ضخیم",
                            "Italic": "کج",
                            "Link": "لینک"
                        },
                        tools: {
                            "list": {
                                "Ordered": "لیست عددی",
                                "Unordered": "لیست نقطه‌ای"
                            },
                            "link": {
                                "Add a link": "افزودن لینک"
                            },
                            "stub": {
                                'The block can not be displayed correctly.': 'این بلوک به درستی نمایش داده نمی‌شود.'
                            }
                        },
                        blockTunes: {
                            "delete": {
                                "Delete": "حذف",
                                "Click to delete": "برای حذف کلیک کنید"
                            },
                            "moveUp": {
                                "Move up": "انتقال به بالا"
                            },
                            "moveDown": {
                                "Move down": "انتقال به پایین"
                            }
                        },
                    }
                },

                // Tools Configuration
                tools: {
                    header: {
                        class: Header,
                        inlineToolbar: true,
                        config: {
                            placeholder: 'تیتر را وارد کنید',
                            levels: [2, 3, 4],
                            defaultLevel: 2
                        }
                    },
                    
                    quote: {
                        class: Quote,
                        inlineToolbar: true,
                        config: {
                            quotePlaceholder: 'متن نقل قول را وارد کنید',
                            captionPlaceholder: 'نویسنده نقل قول',
                        },
                    },
                    image: {
                        class: ImageTool,
                        config: {
                            // You need to implement an uploader on your backend
                            uploader: {
                                uploadByFile(file){
                                    // your upload logic here
                                    // For now, we return a fake success response
                                    return new Promise((resolve) => {
                                        resolve({
                                            success: 1,
                                            file: {
                                                url: 'https://placehold.co/600x400/69a297/ffffff?text=Uploaded',
                                            }
                                        });
                                    });
                                },
                                uploadByUrl(url){
                                    // your upload logic here
                                    return new Promise((resolve) => {
                                        resolve({
                                            success: 1,
                                            file: {
                                                url: url,
                                            }
                                        });
                                    });
                                }
                            }
                        }
                    },
                    table: {
                        class: Table,
                        inlineToolbar: true,
                    },
                    embed: Embed,
                },

                // Placeholder for the editor
                placeholder: 'شروع به نوشتن کنید...',
            });

            // Save content on form submit
            const form = document.getElementById('article-form');
            const saveButton = document.getElementById('save-button');
            const hiddenInput = document.getElementById('editor-content');

            saveButton.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default form submission
                
                editor.save()
                    .then((outputData) => {
                        // Stringify the JSON output and put it in the hidden input
                        hiddenInput.value = JSON.stringify(outputData);
                        // Now, submit the form
                        form.submit();
                    })
                    .catch((error) => {
                        console.error('Saving failed: ', error);
                        alert('خطا در ذخیره‌سازی محتوا!');
                    });
            });
        });
    </script>
@endpush
{{-- END: Scripts for Editor.js --}}
