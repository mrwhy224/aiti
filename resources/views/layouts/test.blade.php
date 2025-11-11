@php

    function extractTextFromBody($post): string
    {
        if (empty($post->body)) 
            return "";
        
        $content = json_decode($post->body);
        $fullText = "";

        if (json_last_error() !== JSON_ERROR_NONE || !isset($content->blocks) || !is_array($content->blocks)) 
            return (string) $post->body;
        

        foreach ($content->blocks as $block) 
            if (isset($block->data) && isset($block->data->text))
                $fullText .= $block->data->text . " ";
            elseif (isset($block->data) && isset($block->data->items) && is_array($block->data->items))
                $fullText .= implode(" ", $block->data->items) . " ";
            

        return $fullText;
    }

    function getReadingTimeAttribute($post): string
    {
        $wordsPerMinute = 200;
        $fullText = extractTextFromBody($post);
        preg_match_all('/\p{L}+/u', $fullText, $matches);
        $wordCount = count($matches[0]);
        $minutes = ceil($wordCount / $wordsPerMinute);
        if ($minutes < 1) 
            return "کمتر از ۱ دقیقه";
        return $minutes . " دقیقه ";
    }

@endphp


<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>آینده نساجی هوشمند: چگونه اینترنت اشیاء صنعت را متحول می‌کند؟</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-primary': '#074172', // یک رنگ آبی-سبز تیره
                        'brand-secondary': '#e9d8a6', // یک رنگ کرم
                        'brand-accent': '#50808e', // یک رنگ نارنجی-طلایی
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .logo-icon{
            width: 70px;
            height: 70px;
        }
        .main-header{
            padding: 5px 0;
        }
        .top-bar{
            border-bottom: unset;
        }
        
    </style>
</head>
<body>
<div id="reading-progress-bar"></div>

@include('header')
<!-- Main Article Content -->
<main class="main-content py-16 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-12">

            <!-- Main Content Column -->
            <div class="lg:col-span-8">
                <article id="article-body" class="bg-white p-6 sm:p-8 md:p-10 rounded-2xl shadow-lg light-border">
                    <!-- Post Header -->
                    <header class="mb-8 text-center bg-gray-50 p-8 rounded-xl" style="background-image: url('data:image/svg+xml,%3Csvg width=%2252%22 height=%2226%22 viewBox=%220 0 52 26%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23e5e7eb%22 fill-opacity=%220.4%22%3E%3Cpath d=%22M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414zM41 18c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm10 8h2v-2h-2v2zM3 18c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm10 8h2v-2h-2v2zM3 6h2V4h-2v2z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
                        
                        @forelse($post->tags as $tag)
                            <span class="text-sm font-semibold bg-brand-primary/10 text-brand-primary px-3 py-1 rounded-full mb-4 inline-block">{{ $tag->name }}</span>
                        @empty
                            <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">
                                عمومی
                            </span>
                        @endforelse


                        <h1 class="text-2xl lg:text-3xl font-extrabold text-brand-dark leading-tight">
                            {{ $post->title }}
                        </h1>
                        <div class="mt-6 flex items-center justify-center text-sm text-gray-500">
                            
                            <div>
                                @php
                                    if($post->published_at) {
                                        $data = \Morilog\Jalali\Jalalian::fromCarbon($post->published_at)->format('j F Y');
                                    } else {
                                        $data = 'تاریخ نامشخص';
                                    }
                                @endphp
                                <p>{{ $data }}· زمان مطالعه {{ getReadingTimeAttribute($post) }}</p>
                            </div>
                        </div>
                    </header>

                    <!-- Featured Image -->
                    <figure class="mb-8 overflow-hidden rounded-2xl">
                        <img class="w-full shadow-lg transition-transform duration-300 hover:scale-105" src="{{ $post->featured_image_path }}" alt="تصویر مقاله">
                    </figure>

                    <!-- Article Body -->
                    <div class="article-content">{!! $htmlContent !!}</div>

                    <!-- Article Footer -->
                    <footer class="mt-12 pt-8 border-t space-y-8">
                        <!-- Share Section -->
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <span class="font-bold text-lg text-brand-dark">این مقاله را به اشتراک بگذارید:</span>
                            <div class="flex items-center gap-2">
                                <a href="#" class="share-btn telegram flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full text-gray-600"><i class="fab fa-telegram-plane"></i></a>
                                <a href="#" class="share-btn whatsapp flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full text-gray-600"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="share-btn linkedin flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full text-gray-600"><i class="fab fa-linkedin-in"></i></a>
                                <button class="share-btn link flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full text-gray-600"><i class="fas fa-link"></i></button>
                            </div>
                        </div>
                        <!-- <div class="bg-gradient-to-r from-brand-primary/10 to-brand-accent/10 border p-6 rounded-2xl flex items-start gap-5">
                            <img class="w-16 h-16 rounded-full" src="https://placehold.co/64x64/212922/ffffff?text=نویسنده" alt="نویسنده">
                            <div>
                                <p class="text-sm text-gray-500">نویسنده</p>
                                <h4 class="font-bold text-xl text-brand-dark mt-1">دکتر رضایی</h4>
                                <p class="text-gray-600 mt-2 leading-relaxed text-sm">متخصص حوزه تکنولوژی‌های نوین در صنعت نساجی و عضو هیئت علمی دانشگاه صنعتی امیرکبیر. علاقه‌مند به تحقیق در زمینه پارچه‌های هوشمند و منسوجات پایدار.</p>
                            </div>
                        </div> -->
                    </footer>
                </article>

                <!-- Comments Section -->
                <div class="mt-16 bg-white p-6 sm:p-8 md:p-10 rounded-2xl shadow-lg light-border">
                    <!-- Comment Form -->
                    <div>
                        <h3 class="text-2xl font-bold text-brand-dark mb-6">دیدگاه خود را بنویسید</h3>
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="comment_name" class="block text-sm font-medium text-gray-700 mb-2">نام شما</label>
                                    <input type="text" id="comment_name" placeholder="مثال: علی محمدی" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-brand-primary focus:border-brand-primary transition-colors">
                                </div>
                                <div>
                                    <label for="comment_email" class="block text-sm font-medium text-gray-700 mb-2">ایمیل شما (محفوظ می‌ماند)</label>
                                    <input type="email" id="comment_email" placeholder="example@mail.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-brand-primary focus:border-brand-primary transition-colors">
                                </div>
                            </div>
                            <div>
                                <label for="comment_body" class="block text-sm font-medium text-gray-700 mb-2">دیدگاه</label>
                                <textarea id="comment_body" rows="5" placeholder="نظر خود را اینجا بنویسید..." class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-brand-primary focus:border-brand-primary transition-colors"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="bg-brand-primary text-white font-bold py-3 px-8 rounded-lg hover:bg-brand-primary/90 transition-colors transform hover:scale-105">
                                    ارسال دیدگاه
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Existing Comments -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-brand-dark mb-8 pb-4 border-b">
                            <span class="inline-flex items-center justify-center bg-brand-primary text-white w-8 h-8 rounded-full ml-2">۲</span> دیدگاه
                        </h3>
                        <div class="space-y-8">
                            <!-- Comment 1 -->
                            <div class="flex items-start gap-4">
                                <img src="https://placehold.co/48x48/e9d8a6/333333?text=A" alt="Avatar" class="w-12 h-12 rounded-full flex-shrink-0">
                                <div class="flex-1 bg-gray-50 p-5 rounded-lg border">
                                    <div class="flex justify-between items-center mb-2">
                                        <div>
                                            <p class="font-semibold text-gray-800">علی محمدی</p>
                                            <p class="text-xs text-gray-500">۳۰ مرداد ۱۴۰۴</p>
                                        </div>
                                        <button class="text-sm text-brand-primary font-semibold hover:underline"><i class="fas fa-reply ml-1"></i> پاسخ</button>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">
                                        مقاله بسیار جامع و کاربردی بود. به خصوص بخش چالش‌های پیش رو دید خوبی به من داد. ممنون از تیم شما.
                                    </p>
                                </div>
                            </div>
                            <!-- Comment 2 (with a reply) -->
                            <div class="flex items-start gap-4">
                                <img src="https://placehold.co/48x48/50808e/ffffff?text=S" alt="Avatar" class="w-12 h-12 rounded-full flex-shrink-0">
                                <div class="flex-1">
                                    <div class="bg-gray-50 p-5 rounded-lg border">
                                        <div class="flex justify-between items-center mb-2">
                                            <div>
                                                <p class="font-semibold text-gray-800">سارا حسینی</p>
                                                <p class="text-xs text-gray-500">۲۹ مرداد ۱۴۰۴</p>
                                            </div>
                                            <button class="text-sm text-brand-primary font-semibold hover:underline"><i class="fas fa-reply ml-1"></i> پاسخ</button>
                                        </div>
                                        <p class="text-gray-700 leading-relaxed">
                                            آیا منابعی برای مطالعه بیشتر در زمینه تامین انرژی برای این سنسورها وجود دارد؟
                                        </p>
                                    </div>
                                    <!-- Reply -->
                                    <div class="flex items-start gap-4 mt-6 ml-8 md:ml-12 border-r-2 border-brand-primary/20 pr-4">
                                        <img src="https://placehold.co/40x40/212922/ffffff?text=R" alt="Avatar" class="w-10 h-10 rounded-full flex-shrink-0">
                                        <div class="flex-1 bg-white p-5 rounded-lg border">
                                            <div class="flex justify-between items-center mb-2">
                                                <div>
                                                    <p class="font-semibold text-gray-800">دکتر رضایی <span class="text-xs font-normal text-white bg-brand-primary px-2 py-0.5 rounded-full">نویسنده</span></p>
                                                    <p class="text-xs text-gray-500">۲۹ مرداد ۱۴۰۴</p>
                                                </div>
                                            </div>
                                            <p class="text-gray-700 leading-relaxed">
                                                حتماً. می‌توانید مقالات منتشر شده در ژورنال IEEE در این زمینه را بررسی کنید. به زودی یک پست تکمیلی هم در این مورد منتشر خواهیم کرد.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <aside class="lg:col-span-4 mt-12 lg:mt-0">
                <div class="sticky top-28 space-y-8">
                    @if($relatedPosts && $relatedPosts->count() > 0)
                        <div class="widget">
                            <h3 class="widget-title">مقالات مرتبط</h3>
                            <ul class="space-y-4">
                                
                                @foreach($relatedPosts as $relatedPost)
                                    <li>
                                        <a href="{{ route('single', $relatedPost->slug) }}" class="group flex items-start gap-4">
                                            <img src="{{ $relatedPost->featured_image_path }}" 
                                                 class="w-20 h-20 rounded-lg object-cover flex-shrink-0" 
                                                 alt="{{ $relatedPost->title }}">
                                            <div>
                                                <p class="font-semibold text-gray-800 group-hover:text-brand-primary transition-colors leading-tight line-clamp-2">
                                                    {{ $relatedPost->title }}
                                                </p>
                                                
                                                @php
                                                    $data = \Morilog\Jalali\Jalalian::fromCarbon($relatedPost->published_at)->format('j F Y');
                                                @endphp
                                                <p class="text-xs text-gray-500 mt-1">{{ $data }}</p>

                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    @endif
                    <!-- Categories -->
                    <div class="widget">
                        <h3 class="widget-title">تگ‌های محبوب</h3>
                        <ul class="space-y-3">
                            @forelse($popularTags as $tag)
                                <li>
                                    <a href="{{-- route('tag.show', $tag->slug) --}}" class="flex justify-between items-center text-gray-700 hover:text-brand-primary transition-all group">
                                        <span>
                                            <i class="fas fa-tag text-brand-primary/50 ml-2 group-hover:text-brand-primary"></i>
                                            {{ $tag->name }}
                                        </span>
                                        <span class="text-xs bg-gray-100 px-2 py-1 rounded">
                                            {{ $tag->posts_count }}
                                        </span>
                                    </a>
                                </li>
                            @empty
                                <li>
                                    <span class="text-gray-500">هیچ تگی یافت نشد.</span>
                                </li>
                            @endforelse

                        </ul>
                    </div>
                    <!-- Search Widget -->
                    <div class="widget">
                        <h3 class="widget-title">جستجو</h3>
                        <form class="relative">
                            <input type="search" placeholder="جستجو در مقالات..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-brand-primary focus:border-brand-primary transition-colors">
                            <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-brand-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</main>


@include('footer')




<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Sticky Navigation Script ---
        const header = document.querySelector('.site-header');
        const headerWrapper = document.querySelector('.header-hero-wrapper');
        const mainContent = document.querySelector('.main-content');
        const scrollThreshold = 50; // The scroll position in pixels to trigger the sticky nav


        const headerHeight = headerWrapper.offsetHeight;
        // Function to handle the scroll logic
        const handleScroll = () => {
            if (window.scrollY > scrollThreshold) {
                header.classList.add('scrolled');
                mainContent.style.marginTop = headerHeight + 'px';
            } else {
                header.classList.remove('scrolled');
                mainContent.style.marginTop = 0;
            }
        };
        const progressBar = document.getElementById('reading-progress-bar');
        const articleBody = document.getElementById('article-body');

        const updateProgressBar = () => {
            const articleRect = articleBody.getBoundingClientRect();
            const articleHeight = articleRect.height - window.innerHeight;
            const scrollPosition = -articleRect.top;

            if (scrollPosition >= 0 && scrollPosition <= articleHeight) {
                const progress = (scrollPosition / articleHeight) * 100;
                progressBar.style.width = progress + '%';
            } else if (scrollPosition < 0) {
                progressBar.style.width = '0%';
            } else {
                progressBar.style.width = '100%';
            }
        };
        // --- END: Reading Progress Bar ---

        // --- START: Table of Contents Generator ---
        const tocContainer = document.getElementById('toc');
        const headings = articleBody.querySelectorAll('.article-content h2');

        if (headings.length > 0 && tocContainer) {
            headings.forEach((heading, index) => {
                const id = 'heading-' + index;
                heading.id = id;

                const listItem = document.createElement('li');
                const link = document.createElement('a');

                link.href = '#' + id;
                link.textContent = heading.textContent;
                link.className = "flex items-center text-gray-600 hover:text-brand-primary transition-colors group";

                const icon = document.createElement('i');
                icon.className = "fas fa-circle text-xs text-brand-primary/30 ml-3 group-hover:text-brand-primary";

                link.prepend(icon);
                listItem.appendChild(link);
                tocContainer.appendChild(listItem);
            });
        } else if (tocContainer) {
            tocContainer.parentElement.style.display = 'none'; // Hide TOC widget if no headings
        }
        // --- END: Table of Contents Generator ---


        // --- Combined Scroll Listener for Performance ---
        window.addEventListener('scroll', () => {
            handleScroll();
            updateProgressBar();
        });

        // Run on page load
        handleScroll();
        updateProgressBar();
    });
</script>

</body>
</html>
