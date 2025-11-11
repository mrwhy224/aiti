@php
    // این متغیرها را از کنترلر خود ارسال کنید
    // $post = (object) ['title' => 'ساختار تشکیلاتی']; // مثال
    // $popularTags = []; // مثال
    // $relatedPosts = collect(); // مثال
@endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ساختار تشکیلاتی - انجمن صنایع نساجی ایران</title>

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
        /* --- استایل‌های هدر (از فایل قبلی شما) --- */
        body {
            font-family: 'Vazirmatn', sans-serif;
            background-color: #f8f9fa; 
            overflow-x: hidden; /* اضافه شد: جلوگیری از اسکرول کل صفحه */
        }
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

        /* =========================================
         جدید: استایل‌های رفع اسکرول افقی
        =========================================
        */

        /* 1. Wrapper for the chart */
        .org-chart-wrapper {
            width: 100%;
            overflow-x: auto; /* اسکرول افقی فقط برای این بخش */
            padding-bottom: 1.5rem; /* فضا برای نوار اسکرول */
        }

        /* 2. خود چارت */
        .org-chart {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 600px; /* حداقل عرض برای چارت */
            width: max-content; /* عرض چارت بر اساس محتوا */
            margin: 0 auto; /* وسط‌چین کردن چارت در داخل wrapper */
        }

        /* =========================================
         استایل‌های ساختار درختواره (اصلاح شده قبلی)
        =========================================
        */

        /* نگهدارنده ردیف‌ها (برای اتصال خطوط) */
        .org-chart ul {
            display: flex;
            justify-content: center;
            position: relative;
        }

        /* هر آیتم در چارت (شامل کارت و فرزندان) */
        .org-chart li {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            padding: 2rem 1rem 0 1rem; /* فضا برای خطوط در بالا */
        }

        /* --- خطوط اتصال --- */
        .org-chart li::before {
            content: '';
            position: absolute;
            top: 0; 
            right: 50%; 
            transform: translateX(50%);
            width: 2px;
            height: 2rem; 
            background-color: #d1d5db; 
        }

        .org-chart li::after {
            content: '';
            position: absolute;
            top: 0; 
            right: 0;
            width: 100%;
            height: 2px;
            background-color: #d1d5db;
        }

        /* --- مدیریت حالت‌های خاص خطوط --- */
        .org-chart > ul > li {
            padding-top: 0; /* ریشه اصلی پدینگ بالا ندارد */
        }
        .org-chart > ul > li::before,
        .org-chart > ul > li::after {
            display: none;
        }
        .org-chart li:only-child::after {
            display: none;
        }
        .org-chart li:first-child::after {
            right: 50%;
            width: 50%;
        }
        .org-chart li:last-child::after {
            right: 0;
            width: 50%;
        }

        /* --- کارت مشخصات فرد --- */
        .org-card {
            background-color: #ffffff;
            border: 1px solid #e5e7eb; 
            border-radius: 0.75rem; 
            padding: 1.5rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1); 
            text-align: center;
            width: 200px; 
            transition: all 0.3s ease;
        }
        
        .org-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1); 
            transform: translateY(-5px);
        }

        .org-card img {
            width: 80px; 
            height: 80px; 
            border-radius: 9999px; 
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 0.75rem; 
            object-fit: cover;
            border: 3px solid #f0f0f0;
        }

        .org-card .name {
            font-weight: 700; 
            color: #074172; 
            font-size: 1.125rem; 
            white-space: nowrap; /* جلوگیری از شکستن نام */
        }

        .org-card .title {
            font-size: 0.875rem; 
            color: #6b7280; 
            white-space: nowrap; /* جلوگیری از شکستن عنوان */
        }
        
        /* =========================================
         جدید: استایل‌های کارت توضیحات
        =========================================
        */
        .description-card {
            background-color: #ffffff;
            border-radius: 0.75rem; /* rounded-xl */
            padding: 2rem; /* p-8 */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1); /* shadow-xl */
            margin-top: 4rem; /* mt-16 */
            border: 1px solid #e5e7eb; /* gray-200 */
        }
        .description-card h2 {
            font-size: 1.875rem; /* text-3xl */
            font-weight: 800; /* font-extrabold */
            color: #074172; /* text-brand-primary */
            margin-bottom: 1.5rem; /* mb-6 */
            border-bottom: 2px solid #e9d8a6; /* brand-secondary */
            padding-bottom: 1rem; /* pb-4 */
        }
        .description-card p {
            font-size: 1rem; /* text-base */
            line-height: 1.75; /* leading-7 */
            color: #374151; /* text-gray-700 */
            margin-bottom: 1rem; /* mb-4 */
        }
        .description-card ul {
            list-style-type: disc;
            padding-right: 2rem; /* pr-8 */
            color: #4b5563; /* text-gray-600 */
            space-y: 0.5rem; /* space-y-2 */
        }
        
    </style>
</head>
<body class="bg-gray-50">

@include('header')
<!-- Main Article Content -->
<main class="main-content py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- عنوان صفحه -->
        <header class="mb-16 text-center">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-brand-primary leading-tight">
                ساختار تشکیلاتی کارگروه‌ها
            </h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                آشنایی با اعضای هیئت مدیره و مسئولین کارگروه‌های تخصصی انجمن صنایع نساجی ایران.
            </p>
        </header>

        <!-- Wrapper چارت برای اسکرول افقی -->
        <div class="org-chart-wrapper">
            <!-- ساختار درختواره -->
            <div class="org-chart">
                <ul>
                    {{-- ریشه اصلی (هیئت مدیره / رئیس) --}}
                    <li>
                        <div class="org-card">
                            <img src="https://placehold.co/80x80/074172/ffffff?text=رئیس" alt="عکس رئیس">
                            <p class="name">دکتر الف. رئیسی</p>
                            <p class="title">رئیس هیئت مدیره</p>
                        </div>
                        
                        {{-- ردیف کارگروه‌ها --}}
                        <ul>
                            <li>
                                <div class="org-card">
                                    <img src="https://placehold.co/80x80/50808e/ffffff?text=۱" alt="عکس مسئول">
                                    <p class="name">مهندس ب. محمدی</p>
                                    <p class="title">مسئول کارگروه آموزش</p>
                                </div>
                                {{-- اعضای کارگروه ۱ --}}
                                <ul>
                                    <li>
                                        <div class="org-card">
                                            <img src="https://placehold.co/80x80/e9d8a6/333333?text=عضو" alt="عکس عضو">
                                            <p class="name">عضو ۱</p>
                                            <p class="title">عضو کارگروه</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="org-card">
                                            <img src="https://placehold.co/80x80/e9d8a6/333333?text=عضو" alt="عکس عضو">
                                            <p class="name">عضو ۲</p>
                                            <p class="title">عضو کارگروه</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="org-card">
                                    <img src="https://placehold.co/80x80/50808e/ffffff?text=۲" alt="عکس مسئول">
                                    <p class="name">دکتر ج. صادقی</p>
                                    <p class="title">مسئول کارگروه پژوهش</p>
                                </div>
                                {{-- اعضای کارگروه ۲ --}}
                                <ul>
                                    <li>
                                        <div class="org-card">
                                            <img src="https://placehold.co/80x80/e9d8a6/333333?text=عضو" alt="عکس عضو">
                                            <p class="name">عضو ۳</p>
                                            <p class="title">عضو کارگروه</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="org-card">
                                    <img src="https://placehold.co/80x80/50808e/ffffff?text=۳" alt="عکس مسئول">
                                    <p class="name">خانم د. اکبری</p>
                                    <p class="title">مسئول کارگروه بازار</p>
                                </div>
                                {{-- اعضای کارگروه ۳ --}}
                                <ul>
                                    <li>
                                        <div class="org-card">
                                            <img src="https://placehold.co/80x80/e9d8a6/333333?text=عضو" alt="عکس عضو">
                                            <p class="name">عضو ۴</p>
                                            <p class="title">عضو کارگروه</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="org-card">
                                            <img src="https://placehold.co/80x80/e9d8a6/333333?text=عضو" alt="عکس عضو">
                                            <p class="name">عضو ۵</p>
                                            <p class="title">عضو کارگروه</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="org-card">
                                            <img src="https://placehold.co/80x80/e9d8a6/333333?text=عضو" alt="عکس عضو">
                                            <p class="name">عضو ۶</p>
                                            <p class="title">عضو کارگروه</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div> <!-- /end org-chart-wrapper -->


        <!-- ========== START: بخش توضیحات اضافه شده ========== -->
        <section class="description-card">
            <h2>درباره کارگروه‌ها</h2>
            <p>
                کارگروه‌های تخصصی انجمن صنایع نساجی ایران، بازوهای اجرایی و فکری انجمن در راستای تحقق اهداف استراتژیک آن هستند. هر کارگروه متشکل از نخبگان، متخصصان و فعالان باتجربه همان حوزه بوده و وظیفه رصد، تحلیل، برنامه‌ریزی و اجرای پروژه‌های مرتبط با آن بخش از صنعت را بر عهده دارد.
            </p>
            <p>
                این ساختار پویا به انجمن اجازه می‌دهد تا به صورت متمرکز و تخصصی به چالش‌ها و فرصت‌های پیش روی صنعت نساجی پاسخ دهد.
            </p>
            <h3>اقدامات و وظایف اصلی:</h3>
            <ul>
                <li>برگزاری نشست‌های تخصصی، وبینارها و کارگاه‌های آموزشی.</li>
                <li>تهیه گزارش‌های تحلیلی و آماری از وضعیت بازار و تکنولوژی.</li>
                <li>ارائه مشاوره تخصصی به اعضا و نهادهای دولتی.</li>
                <li>تعریف و راهبری پروژه‌های پژوهشی و کاربردی.</li>
                <li>ایجاد ارتباط موثر میان صنعت، دانشگاه و بازار کار.</li>
            </ul>
        </section>
        <!-- ========== END: بخش توضیحات اضافه شده ========== -->


    </div>
</main>


@include('footer')


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Sticky Navigation Script ---
        const header = document.querySelector('.site-header');
        const mainContent = document.querySelector('.main-content');
        const scrollThreshold = 50; 

        if (header && mainContent) {
            const headerHeight = header.offsetHeight;
            
            const handleScroll = () => {
                if (window.scrollY > scrollThreshold) {
                    header.classList.add('scrolled');
                    mainContent.style.marginTop = headerHeight + 'px';
                } else {
                    header.classList.remove('scrolled');
                    mainContent.style.marginTop = 0;
                }
            };
            
            window.addEventListener('scroll', handleScroll);
            handleScroll(); // اجرا در زمان بارگذاری صفحه
        }
    });
</script>

</body>
</html>