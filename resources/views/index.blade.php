<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>انجمن صنایع نساجی ایران</title>

    <link rel="icon" type="image/x-icon" href="/logo-aiti-white.svg">
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
    <!-- SwiperJS for Carousel -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <link href="https://aiti.ir/assets/css/books-rtl.css?v=2" rel="stylesheet">

</head>
<body>
<div class="header-hero-wrapper px-2">
    <header class="site-header">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-static-text">
                    <i class="fas fa-th-large"></i>
                    <span>اخبار انجمن</span>

                </div>
                <div class="top-bar-scrolling">
                    <div class="scrolling-text-container">
                        <p class="scrolling-text">این یک متن آزمایشی چرخان برای نمایش در نوار بالایی است. شما می‌توانید این متن را با محتوای دلخواه خود جایگزین کنید...</p>
                    </div>
                </div>

                <div class="w-[4px] h-[15px] bg-[#D4A017] rounded-sm mt-1 text-splitter"></div>
                <div class="top-bar-nav">
                    <nav class="top-nav">
                        <ul>
                            <li><a href="#">درباره ما</a></li>
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">وبلاگ</a></li>
                            <li><a href="#">اخبار</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="main-header">
            <div class="container">
                <div class="header-right">
                    <div class="logo-area">
                        <img src="logo-aiti-white.svg" alt="لوگو نظام مهندسی" class="logo-icon">
                        <div class="logo-text">
                            <h1>انجمن صنایع نساجی ایران</h1>
                            <p>Association Of Iran Textile Industries </p>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul>
                            <li class="dropdown">
                                <a href="#">
                                    <i class="fas fa-sitemap"></i>
                                    <span>ساختار تشکیلاتی<i class="fas fa-chevron-down dropdown-arrow"></i></span>
                                </a>
                                <div class="dropdown-content">
                                    <a href="#">هیئت مدیره</a>
                                    <a href="{{ route('tree') }}">ساختار تشکیلاتی کارگروه‌ها</a>
                                    <a href="#">اعضا</a>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <span>آموزش</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-users"></i>
                                    <span>اعضای انجمن</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-user-md"></i>
                                    <span>کاریابی</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-left">
                    <a class="cta-button" href="/login">
                        عضویت / کارتابل انجمن
                    </a>

                </div>
                <button class="hamburger-menu" id="hamburger-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <main>
        <section class="hero-section px-6">
            <div class="container">
                <div class="hero-content">
                    <h1>پیشرو در نوآوری و توسعه صنعت نساجی</h1>
                    <p>ما در انجمن تخصصی نساجی، با ایجاد پل ارتباطی میان متخصصان، صنعتگران و دانشگاهیان، برای رشد و پویایی این صنعت تلاش می‌کنیم.</p>
                    <button class="cta-button">درخواست مشاوره رایگان</button>
                </div>
                <div class="hero-animation">
                    <svg class="animated-logo" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <g class="loom-frame">
                            <rect x="10" y="10" width="180" height="15" rx="2"></rect>
                            <rect x="10" y="175" width="180" height="15" rx="2"></rect>
                        </g>

                        <g class="warp-threads">
                            <line class="warp-thread" x1="30" y1="25" x2="30" y2="175"></line>
                            <line class="warp-thread" x1="50" y1="25" x2="50" y2="175"></line>
                            <line class="warp-thread" x1="70" y1="25" x2="70" y2="175"></line>
                            <line class="warp-thread" x1="90" y1="25" x2="90" y2="175"></line>
                            <line class="warp-thread" x1="110" y1="25" x2="110" y2="175"></line>
                            <line class="warp-thread" x1="130" y1="25" x2="130" y2="175"></line>
                            <line class="warp-thread" x1="150" y1="25" x2="150" y2="175"></line>
                            <line class="warp-thread" x1="170" y1="25" x2="170" y2="175"></line>
                        </g>

                        <g id="carpet-weave">
                            <path class="weft-thread row-8" stroke="var(--weft-color-1)" d="M25 160 H 175"></path>
                            <path class="weft-thread row-7" stroke="var(--weft-color-2)" d="M25 150 H 70 L 90 140 L 110 150 L 130 140 L 175 150"></path>
                            <path class="weft-thread row-6" stroke="var(--weft-color-3)" d="M25 140 H 175"></path>
                            <path class="weft-thread row-5" stroke="var(--weft-color-1)" d="M25 130 H 175"></path>
                            <path class="weft-thread row-4" stroke="var(--weft-color-2)" d="M25 120 H 175"></path>
                            <path class="weft-thread row-3" stroke="var(--weft-color-3)" d="M25 110 H 50 L 70 100 L 90 110 L 110 100 L 130 110 L 150 100 L 175 110"></path>
                            <path class="weft-thread row-2" stroke="var(--weft-color-2)" d="M25 100 H 175"></path>
                            <path class="weft-thread row-1" stroke="var(--weft-color-1)" d="M25 90 H 175"></path>
                        </g>

                        <g id="comb-group">
                            <rect class="comb comb-1" x="25" y="80" width="150" height="5" rx="1"></rect>
                            <rect class="comb comb-2" x="25" y="90" width="150" height="5" rx="1"></rect>
                            <rect class="comb comb-3" x="25" y="100" width="150" height="5" rx="1"></rect>
                            <rect class="comb comb-4" x="25" y="110" width="150" height="5" rx="1"></rect>
                            <rect class="comb comb-5" x="25" y="120" width="150" height="5" rx="1"></rect>
                            <rect class="comb comb-6" x="25" y="130" width="150" height="5" rx="1"></rect>
                            <rect class="comb comb-7" x="25" y="140" width="150" height="5" rx="1"></rect>
                            <rect class="comb comb-8" x="25" y="150" width="150" height="5" rx="1"></rect>
                        </g>

                    </svg>
                </div>
            </div>
        </section>
    </main>
</div>

<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-6 flex flex-col">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">اهداف و ماموریت‌های ما</h2>
            <p class="text-slate-500 mt-3 max-w-2xl mx-auto">ما برای توانمندسازی اعضا و ارتقاء صنعت نساجی در سه حوزه کلیدی فعالیت می‌کنیم.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature Card 1 -->
            <div class="text-center p-8 border border-slate-200 rounded-xl hover:shadow-xl hover:border-brand-primary transition-all duration-300">
                <div class="bg-brand-primary/10 inline-flex p-4 rounded-full mb-4">
                    <svg class="w-10 h-10 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-9.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v-5.5a2.5 2.5 0 00-5 0V14"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">آموزش و پژوهش</h3>
                <p class="text-slate-600">برگزاری کارگاه‌های تخصصی، وبینارها و حمایت از طرح‌های پژوهشی نوآورانه.</p>
            </div>
            <!-- Feature Card 2 -->
            <div class="text-center p-8 border border-slate-200 rounded-xl hover:shadow-xl hover:border-brand-primary transition-all duration-300">
                <div class="bg-brand-primary/10 inline-flex p-4 rounded-full mb-4">
                    <svg class="w-10 h-10 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">شبکه‌سازی و فرصت‌ها</h3>
                <p class="text-slate-600">ایجاد پل ارتباطی میان متخصصان، صنعتگران و بازار کار در رویدادهای تخصصی.</p>
            </div>
            <!-- Feature Card 3 -->
            <div class="text-center p-8 border border-slate-200 rounded-xl hover:shadow-xl hover:border-brand-primary transition-all duration-300">
                <div class="bg-brand-primary/10 inline-flex p-4 rounded-full mb-4">
                    <svg class="w-10 h-10 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3h3m-3 4h3m-3 4h3m-3 4h3"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">اخبار و اطلاعات</h3>
                <p class="text-slate-600">انتشار آخرین اخبار، مقالات و گزارش‌های تحلیلی از وضعیت صنعت نساجی ایران و جهان.</p>
            </div>
        </div>
    </div>
</section>
<section id="stats" class="py-16 bg-white">
    <div class="container mx-auto px-6 flex-col">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
            <div class="reveal">
                <h3 class="text-4xl md:text-5xl font-extrabold text-brand-primary counter-value" data-target="153">0</h3>
                <p class="text-slate-600 mt-2 text-lg">+ عضو متخصص</p>
            </div>
            <div class="reveal">
                <h3 class="text-4xl md:text-5xl font-extrabold text-brand-primary counter-value" data-target="200">0</h3>
                <p class="text-slate-600 mt-2 text-lg">+ کارگاه آموزشی</p>
            </div>
            <div class="reveal">
                <h3 class="text-4xl md:text-5xl font-extrabold text-brand-primary counter-value" data-target="50">0</h3>
                <p class="text-slate-600 mt-2 text-lg">+ پروژه ملی</p>
            </div>
            <div class="reveal">
                <h3 class="text-4xl md:text-5xl font-extrabold text-brand-primary counter-value" data-target="10">0</h3>
                <p class="text-slate-600 mt-2 text-lg">+ سال تجربه</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 text-center">
    <div class="container mx-auto px-6 flex-col">
        <h1 class="text-4xl md:text-5xl font-extrabold text-brand-dark mb-3">
            مرکز نوآوری و آینده‌پژوهی نساجی
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            آخرین اخبار، رویدادها و دستاوردهای صنعت را در یک نگاه ببینید.
        </p>
    </div>
</section>

<!-- 2. Infinite Loop Carousel Section -->
<section class="bg-brand-light event-section">
    <div class="swiper-container max-w-100 mx-auto mb-16 overflow-hidden">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide" style="background-image:url(/images/banner/01.jpeg)">
                <div class="slide-content">
                    <a href="/event">
                        <h3 class="font-bold text-xl">نمایشگاه 2025 مشهد</h3>
                        <p class="text-sm opacity-80 mt-1">تازه ترین صنایع پوشاک و منسوجات خانگی</p>
                    </a>
                </div>
            </div>

            <div class="swiper-slide" style="background-image:url(/images/banner/01.jpeg)">
                <div class="slide-content">
                    <a href="/event">
                        <h3 class="font-bold text-xl">نمایشگاه 2025 مشهد</h3>
                        <p class="text-sm opacity-80 mt-1">تازه ترین صنایع پوشاک و منسوجات خانگی</p>
                    </a>
                </div>
            </div>

            <div class="swiper-slide" style="background-image:url(/images/banner/01.jpeg)">
                <div class="slide-content">
                    <a href="/event">
                        <h3 class="font-bold text-xl">نمایشگاه 2025 مشهد</h3>
                        <p class="text-sm opacity-80 mt-1">تازه ترین صنایع پوشاک و منسوجات خانگی</p>
                    </a>
                </div>
            </div>

            <div class="swiper-slide" style="background-image:url(/images/banner/01.jpeg)">
                <div class="slide-content">
                    <a href="/event">
                        <h3 class="font-bold text-xl">نمایشگاه 2025 مشهد</h3>
                        <p class="text-sm opacity-80 mt-1">تازه ترین صنایع پوشاک و منسوجات خانگی</p>
                    </a>
                </div>
            </div>

            <div class="swiper-slide" style="background-image:url(/images/banner/01.jpeg)">
                <div class="slide-content">
                    <a href="/event">
                        <h3 class="font-bold text-xl">نمایشگاه 2025 مشهد</h3>
                        <p class="text-sm opacity-80 mt-1">تازه ترین صنایع پوشاک و منسوجات خانگی</p>
                    </a>
                </div>
            </div>

            <div class="swiper-slide" style="background-image:url(/images/banner/01.jpeg)">
                <div class="slide-content">
                    <a href="/event">
                        <h3 class="font-bold text-xl">نمایشگاه 2025 مشهد</h3>
                        <p class="text-sm opacity-80 mt-1">تازه ترین صنایع پوشاک و منسوجات خانگی</p>
                    </a>
                </div>
            </div>

            <div class="swiper-slide" style="background-image:url(/images/banner/01.jpeg)">
                <div class="slide-content">
                    <a href="/event">
                        <h3 class="font-bold text-xl">نمایشگاه 2025 مشهد</h3>
                        <p class="text-sm opacity-80 mt-1">تازه ترین صنایع پوشاک و منسوجات خانگی</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="grid grid-cols-1 lg:grid-cols-5 min-h-[70vh] items-center">


    <!-- === Right Column: Content and Slider (3/4 width) === -->
    <!-- This column is always visible -->
    <div class="w-full p-8 sm:p-12 md:p-16 lg:col-span-5">
        <div class="max-w-xl mx-auto lg:mx-0 lg:max-w-none">
            <!-- Title and Subtitle -->
            <div class="mb-8">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-800 mb-3">
                    اخبار و رویدادها
                </h1>
                <p class="text-lg text-slate-500">
                    آخرین تحولات صنعت نساجی را از اینجا دنبال کنید.
                </p>
            </div>

            <!-- Swiper Slider -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    @forelse($posts as $post)
                        <div class="swiper-slide h-full"> 
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-slate-200 h-full flex flex-col">
                                
                                <a href="{{ route('single', ['slug'=>$post->slug]) }}"><img src="{{ asset($post->featured_image_path) }}" class="w-full h-56 object-cover" alt="{{ $post->title }}"></a>
                                     
                                <div class="p-6 flex flex-col justify-center flex-1">
                                    <div class="flex flex-wrap gap-2 mb-2">
                                        @forelse($post->tags as $tag)
                                            <span class="text-xs font-semibold text-rose-600 bg-rose-100 px-2 py-0.5 rounded-full">
                                                {{ $tag->name }}
                                            </span>
                                        @empty
                                            <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">
                                                عمومی
                                            </span>
                                        @endforelse
                                    </div>
                                    
                                    <a href="{{ route('single', ['slug'=>$post->slug]) }}"><h3 class="font-bold text-xl mb-2 text-gray-900">{{ $post->title }}</h3></a>

                                    <p class="text-gray-700 dark:text-gray-500 text-base mb-4">
                                        {{ $post->excerpt }}
                                    </p>
                                    
                                    <div class="text-sm text-gray-500 dark:text-gray-400 mt-auto">
                                        @php
                                            if($post->published_at) {
                                                $data = \Morilog\Jalali\Jalalian::fromCarbon($post->published_at)->format('j F Y');
                                            } else {
                                                $data = 'تاریخ نامشخص';
                                            }
                                        @endphp
                                        <span>{{ $data }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- 
                            بخش Else (زمانی که $posts خالی است):
                            این بخش اجرا می‌شود اگر حلقه هیچ دیتایی برای نمایش پیدا نکند.
                        --}}
                        <div class="swiper-slide">
                            <div class="p-6 text-center text-gray-500 bg-white rounded-lg shadow-lg border border-slate-200">
                                هیچ پستی برای نمایش یافت نشد.
                            </div>
                        </div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
</div>


<section>
    <div class="relative bg-fixed bg-cover bg-center overflow-hidden py-24 px-8 text-center" style="background-image: url('/images/pages/home_page.png')">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-slate-900/70"></div>
        
        <div class="relative max-w-3xl mx-auto">
            <!-- Icon -->
            <div class="flex justify-center mb-6">
               <i class="fas fa-infinity fa-3x text-[#D4A017]"></i>
            </div>
            <!-- Title -->
            <h3 class="text-4xl font-extrabold text-white mb-4">
                در قلب نوآوری صنعت نساجی قرار بگیرید
            </h3>
            <!-- Description -->
            <p class="text-slate-300 text-lg leading-relaxed mb-10">
               با عضویت، از آخرین روندها، تکنولوژی‌ها و فرصت‌های رشد در این صنعت پویا مطلع شوید و مسیر حرفه‌ای خود را متحول کنید.
            </p>
            <!-- Button -->
            <a href="{{ route('register') }}" class="border-2 border-[#D4A017] hover:bg-[#D4A017] text-white hover:text-[#0D2A4B] font-bold py-3 px-10 rounded-lg text-lg transition-all duration-300">
                اکنون بپیوندید
            </a>
        </div>
    </div>
</section>

<section class="py-20 md:py-28 bg-brand-light">
    <div class="container mx-auto px-6 flex-col">
        <div class="text-center mb-12 reveal">
            <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark">فعالیت‌های ما</h2>
            <p class="text-slate-500 mt-3 max-w-2xl mx-auto">ما بستری برای رشد و همکاری در صنعت نساجی فراهم می‌کنیم.</p>
        </div>

        <div class="max-w-4xl mx-auto reveal">
            <!-- Tab Buttons -->
            <div id="tabs-container" class="flex justify-center border-b border-slate-200 mb-8">
                <button data-tab="events" class="tab-button active">رویدادها</button>
                <button data-tab="workshops" class="tab-button">کارگاه‌ها</button>
                <button data-tab="publications" class="tab-button">انتشارات</button>
            </div>

            <!-- Tab Content -->
            <div id="tabs-content">
                <div id="events" class="tab-content grid md:grid-cols-2 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h4 class="font-bold text-lg text-brand-dark mb-2">کنفرانس سالانه نساجی ۱۴۰۴</h4>
                        <p class="text-slate-600">بزرگترین گردهمایی متخصصان صنعت. تهران، مرکز همایش‌ها.</p>
                        <a href="#" class="text-brand-primary font-semibold mt-4 inline-block">اطلاعات بیشتر &rarr;</a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h4 class="font-bold text-lg text-brand-dark mb-2">نمایشگاه بین‌المللی الیاف</h4>
                        <p class="text-slate-600">معرفی آخرین دستاوردهای حوزه الیاف مصنوعی و طبیعی.</p>
                        <a href="#" class="text-brand-primary font-semibold mt-4 inline-block">اطلاعات بیشتر &rarr;</a>
                    </div>
                </div>
                <div id="workshops" class="tab-content hidden grid md:grid-cols-2 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h4 class="font-bold text-lg text-brand-dark mb-2">کارگاه رنگرزی دیجیتال</h4>
                        <p class="text-slate-600">آموزش عملی جدیدترین تکنیک‌های چاپ و رنگرزی دیجیتال.</p>
                        <a href="#" class="text-brand-primary font-semibold mt-4 inline-block">ثبت‌نام &rarr;</a>
                    </div>
                </div>
                <div id="publications" class="tab-content hidden">
                    

                    <div class="component">
                        <ul class="align" style="">
                            <li style="width:200px;padding: unset;margin-bottom: unset;">
                                <figure class="book">
                                    <!-- Front -->
                                    <ul class="hardcover_front">
                                        <li>
                                            <!-- <span class="ribbon">۵۵۱</span> -->
                                            <img src="https://aiti.ir/studies/cdc0554873976620c18a2412ed606b53/cover.png" alt="" width="100%" height="100%">
                                        </li>
                                        <li></li>
                                    </ul>
                                    <!-- Pages -->
                                    <ul class="page">
                                        <li></li>
                                        <li>
                                            <a class="btn" href="download.php?download_file=studies%2Fcdc0554873976620c18a2412ed606b53%2F01.pdf">دریافت فایل</a>
                                        </li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <!-- Back -->
                                    <ul class="hardcover_back">
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <ul class="book_spine">
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </figure>
                            </li>

                            
                            <li style="width:200px;padding: unset;margin-bottom: unset;">
                                <figure class="book">
                                    <!-- Front -->
                                    <ul class="hardcover_front">
                                        <li>
                                            <!-- <span class="ribbon">۵۵۱</span> -->
                                            <img src="https://aiti.ir/studies/38e9d31ff7dfa07991bc1315ab935d02/cover.png" alt="" width="100%" height="100%">
                                        </li>
                                        <li></li>
                                    </ul>
                                    <!-- Pages -->
                                    <ul class="page">
                                        <li></li>
                                        <li>
                                            <a class="btn" href="download.php?download_file=studies%2F38e9d31ff7dfa07991bc1315ab935d02%2F01.pdf">دریافت فایل</a>
                                        </li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <!-- Back -->
                                    <ul class="hardcover_back">
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <ul class="book_spine">
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </figure>
                            </li>


                            <li style="width:200px;padding: unset;margin-bottom: unset;">
                                <figure class="book">
                                    <!-- Front -->
                                    <ul class="hardcover_front">
                                        <li>
                                            <!-- <span class="ribbon">۵۵۱</span> -->
                                            <img src="https://aiti.ir/studies/17ce801a94950796daf017aa104c85d4/cover.png" alt="" width="100%" height="100%">
                                        </li>
                                        <li></li>
                                    </ul>
                                    <!-- Pages -->
                                    <ul class="page">
                                        <li></li>
                                        <li>
                                            <a class="btn" href="download.php?download_file=studies%2F17ce801a94950796daf017aa104c85d4%2F01.pdf">دریافت فایل</a>
                                        </li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <!-- Back -->
                                    <ul class="hardcover_back">
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <ul class="book_spine">
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </figure>
                            </li>
                        </ul>
                    </div>
                    <div class="text-center reveal">
                        <p class="text-slate-500 max-w-2xl mx-auto"><a href="/books">مشاهده بیشتر</a></p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>


@include('footer')



</body>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3.5,
        spaceBetween: 50,
        loop: true,
        loopedSlides: 6,
        observer: true,
        observeParents: true,
        breakpoints: {
            300: {
                slidesPerView: 1.2,
                spaceBetween: 10,
            },
            1000: {
                slidesPerView: 1.8,
                spaceBetween: 10,
            },
            1500: {
                slidesPerView: 2.6,
                spaceBetween: 20,
            },
            2000: {
                slidesPerView: 3.2,
                spaceBetween: 20,
            },
            2500:{
                slidesPerView: 3.5,
                spaceBetween: 50,
            }
        }
    });
    var swiper1 = new Swiper('.event-section .swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        coverflowEffect: {
            rotate: 40,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.3,
                spaceBetween: 20
            },
            640: {
                slidesPerView: 2.5,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3.5,
                spaceBetween: 40
            },
            1536: {
                slidesPerView: 4,
                spaceBetween: 50
            }
        }
    });


    document.addEventListener('DOMContentLoaded', () => {
        const revealElements = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Optional: unobserve after revealing
                    // observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        revealElements.forEach(el => observer.observe(el));

        // --- Animated Counter ---
        const statsSection = document.getElementById('stats');
        const counters = statsSection.querySelectorAll('.counter-value');
        let isCounterStarted = false;

        const counterObserver = new IntersectionObserver((entries) => {
            const [entry] = entries;
            if (entry.isIntersecting && !isCounterStarted) {
                isCounterStarted = true;
                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-target');
                    const duration = 2000; // 2 seconds
                    const stepTime = Math.abs(Math.floor(duration / target));

                    let current = 0;
                    const timer = setInterval(() => {
                        current += 1;
                        counter.textContent = current;
                        if (current == target) {
                            clearInterval(timer);
                        }
                    }, stepTime);
                });
                counterObserver.unobserve(statsSection);
            }
        }, { threshold: 0.5 });

        counterObserver.observe(statsSection);

        // --- Tabs Functionality ---
        const tabsContainer = document.getElementById('tabs-container');
        const tabsContent = document.getElementById('tabs-content');

        tabsContainer.addEventListener('click', (event) => {
            if (event.target.classList.contains('tab-button')) {
                // Deactivate all buttons
                tabsContainer.querySelectorAll('.tab-button').forEach(button => button.classList.remove('active'));
                // Hide all content
                tabsContent.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));

                // Activate the clicked button
                event.target.classList.add('active');

                // Show the corresponding content
                const tabId = event.target.getAttribute('data-tab');
                document.getElementById(tabId).classList.remove('hidden');
            }
        });

        const header = document.querySelector('.site-header');
        const scrollThreshold = 50; // Pixels to scroll before the nav becomes sticky

        // 1. Create a function for the scroll logic
        const handleScroll = () => {
            // Check if the user has scrolled past the threshold
            if (window.scrollY > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        };

        // 2. Add the event listener for scrolling
        window.addEventListener('scroll', handleScroll);

        // 3. Run the function ONCE on page load to check the initial position
        handleScroll();

    });

</script>
</html>
