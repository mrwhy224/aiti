@php
    // $posts = ...; // متغیر انتشارات شما
@endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انتشارات - انجمن صنایع نساجی ایران</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-primary': '#074172', // رنگ اصلی شما
                        'brand-secondary': '#e9d8a6', 
                        'brand-accent': '#50808e', 
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome (برای آیکون‌ها) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- فونت وزیرمتن -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700;800;900&display=swap" rel="stylesheet">
    
    <!-- استایل‌های اصلی و استایل کتاب‌ها -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://aiti.ir/assets/css/books-rtl.css?v=2" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            /* background-image حذف شد تا پس‌زمینه تمیز باشد */
        }

        /* استایل‌های هدر، فوتر و ... باید در style.css باشند.
          من استایل‌های اسکرول‌بار که از صفحه رویداد مانده بود را حذف می‌کنم
          چون در این صفحه (احتمالا) نیازی به اسکرول داخلی نیست.
        */
        
        /* استایل بخش عنوان که اضافه شده */
        .page-header {
            text-align: center;
            margin-bottom: 4rem; /* 64px */
        }
        .page-header h1 {
            font-size: 2.25rem; /* text-4xl */
            line-height: 2.5rem; /* leading-10 */
            font-weight: 900; /* font-black */
            color: #074172; /* text-brand-primary */
        }
        .page-header p {
            margin-top: 1rem; /* mt-4 */
            font-size: 1.125rem; /* text-lg */
            line-height: 1.75rem; /* leading-7 */
            color: #4b5563; /* text-gray-600 */
            max-width: 42rem; /* max-w-2xl */
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>
<body class="bg-gray-50">

@include('header')

<!-- Main Content -->
<main class="main-content py-16 lg:py-24">
    
    <!-- ========== START: بخش عنوان اضافه شده ========== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="page-header">
            <h1>گنجینه دانش و انتشارات</h1>
            <p>
                به آرشیو جامع جزوات، گزارش‌های تحلیلی و آماری انجمن صنایع نساجی ایران خوش آمدید. در این بخش می‌توانید آخرین یافته‌ها و بررسی‌های تخصصی صنعت را مطالعه و دریافت نمایید.
            </p>
        </header>
    </div>
    <!-- ========== END: بخش عنوان اضافه شده ========== -->

    <div class="component">
        <ul class="align" style="">
            <li>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۲۶</h3>
                        <span> آبان ۱۴۰۴ </span>
                        <p> 126- بررسی روند واردات و صادرات دوازده ساله پارچه‌های نسجی آغشته، اندوده ، پوشانده یا مطبق شده مناسب برای مصارف صنعتی(ردیف تعرفه 59) ایران از سال 1392 الی 1403 به همراه آمار شش ماهه 1404 </p>
                    </figcaption>
                </figure>
            </li>
            <li>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۲۵</h3>
                        <span> مهر ۱۴۰۴ </span>
                        <p> "آمار واردات و صادرات صنایع نساجی کشور در شش ماهه نخست سال 1404" به همراه آمار مقایسه‌ای واردات و صادرات در شش ماهه نخست سال1402، 1403 و 1404 </p>
                    </figcaption>
                </figure>
            </li>
            <li>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۲۴</h3>
                        <span> مهر ۱۴۰۴ </span>
                        <p> "تجارت خارجی صنایع نساجی و پوشاک ایران (بخش سوم)" بررسی میزان صادرات ردیف تعرفه‌های نساجی درسه سال اخیر با تمرکز بر ده کشور عمده تأمین کننده واردات </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="book">
                    <!-- Front -->
                    <ul class="hardcover_front">
                        <li>
                            <!-- <span class="ribbon">۵۵۱</span> -->
                            <img src="https://aiti.ir/studies/c3786a0a46441c33ff4436d075644208/cover.png" alt="" width="100%" height="100%">
                        </li>
                        <li></li>
                    </ul>
                    <!-- Pages -->
                    <ul class="page">
                        <li></li>
                        <li>
                            <a class="btn" href="download.php?download_file=studies%2Fc3786a0a46441c33ff4436d075644208%2F01.pdf">دریافت فایل</a>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۲۳</h3>
                        <span> مهر ۱۴۰۴ </span>
                        <p> "تجارت خارجی صنایع نساجی و پوشاک ایران (بخش دوم)" بررسی میزان واردات ردیف تعرفه‌های نساجی درسه سال اخیر با تمرکز بر ده کشور عمده تأمین کننده واردات </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="book">
                    <!-- Front -->
                    <ul class="hardcover_front">
                        <li>
                            <!-- <span class="ribbon">۵۵۱</span> -->
                            <img src="https://aiti.ir/studies/5db653a70e07a117bed0e4757c8a73d4/cover.png" alt="" width="100%" height="100%">
                        </li>
                        <li></li>
                    </ul>
                    <!-- Pages -->
                    <ul class="page">
                        <li></li>
                        <li>
                            <a class="btn" href="download.php?download_file=studies%2F5db653a70e07a117bed0e4757c8a73d4%2F01.pdf">دریافت فایل</a>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۲۲</h3>
                        <span> مهر ۱۴۰۴ </span>
                        <p> "تجارت خارجی صنایع نساجی و پوشاک ایران (بخش اول)" مروری بر عمده شرکای تجاری ایران و سهم صنایع نساجی و پوشاک در تجارت فیمابین با این کشورها </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="book">
                    <!-- Front -->
                    <ul class="hardcover_front">
                        <li>
                            <!-- <span class="ribbon">۵۵۱</span> -->
                            <img src="https://aiti.ir/studies/fcffaf4f99a9216535c99bca540fb534/cover.png" alt="" width="100%" height="100%">
                        </li>
                        <li></li>
                    </ul>
                    <!-- Pages -->
                    <ul class="page">
                        <li></li>
                        <li>
                            <a class="btn" href="download.php?download_file=studies%2Ffcffaf4f99a9216535c99bca540fb534%2F01.pdf">دریافت فایل</a>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۲۱</h3>
                        <span> مهر ۱۴۰۴ </span>
                        <p> 121- بررسی سهم عرضه، تقاضا و معامله انواع پلیمرها از سال 1397 تا 6 ماهه ابتدای سال 1404 </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="book">
                    <!-- Front -->
                    <ul class="hardcover_front">
                        <li>
                            <!-- <span class="ribbon">۵۵۱</span> -->
                            <img src="https://aiti.ir/studies/11dbcdb44c72a26753111c559e42287e/cover.png" alt="" width="100%" height="100%">
                        </li>
                        <li></li>
                    </ul>
                    <!-- Pages -->
                    <ul class="page">
                        <li></li>
                        <li>
                            <a class="btn" href="download.php?download_file=studies%2F11dbcdb44c72a26753111c559e42287e%2F01.pdf">دریافت فایل</a>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۲۰</h3>
                        <span> شهریور ۱۴۰۴ </span>
                        <p> "آمار واردات و صادرات صنایع نساجی کشور در پنج ماهه نخست سال 1404" به همراه آمار مقایسه‌ای واردات و صادرات در پنج ماهه نخست سال1402، 1403 و 1404 </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="book">
                    <!-- Front -->
                    <ul class="hardcover_front">
                        <li>
                            <!-- <span class="ribbon">۵۵۱</span> -->
                            <img src="https://aiti.ir/studies/fcb107025d037a9f0a5e0d3870e417c2/cover.png" alt="" width="100%" height="100%">
                        </li>
                        <li></li>
                    </ul>
                    <!-- Pages -->
                    <ul class="page">
                        <li></li>
                        <li>
                            <a class="btn" href="download.php?download_file=studies%2Ffcb107025d037a9f0a5e0d3870e417c2%2F01.pdf">دریافت فایل</a>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۱۹</h3>
                        <span> شهریور ۱۴۰۴ </span>
                        <p> 119- "آمار واردات و صادرات صنایع نساجی کشور در چهار ماهه نخست سال 1404" به همراه آمار مقایسه‌ای واردات و صادرات در چهار ماهه نخست سال1402، 1403 و 1404 </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="book">
                    <!-- Front -->
                    <ul class="hardcover_front">
                        <li>
                            <!-- <span class="ribbon">۵۵۱</span> -->
                            <img src="https://aiti.ir/studies/7ba2cd2706ce26cb01555c0a94d31143/cover.png" alt="" width="100%" height="100%">
                        </li>
                        <li></li>
                    </ul>
                    <!-- Pages -->
                    <ul class="page">
                        <li></li>
                        <li>
                            <a class="btn" href="download.php?download_file=studies%2F7ba2cd2706ce26cb01555c0a94d31143%2F01.pdf">دریافت فایل</a>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۱۸</h3>
                        <span> مرداد ۱۴۰۴ </span>
                        <p> 118- بررسی سهم عرضه، تقاضا و معامله انواع پلیمرها از سال 1397 تا 4 ماهه ابتدای سال 1404 </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="book">
                    <!-- Front -->
                    <ul class="hardcover_front">
                        <li>
                            <!-- <span class="ribbon">۵۵۱</span> -->
                            <img src="https://aiti.ir/studies/f58520a007951ab6f398b42e6794af0f/cover.png" alt="" width="100%" height="100%">
                        </li>
                        <li></li>
                    </ul>
                    <!-- Pages -->
                    <ul class="page">
                        <li></li>
                        <li>
                            <a class="btn" href="download.php?download_file=studies%2Ff58520a007951ab6f398b42e6794af0f%2F01.pdf">دریافت فایل</a>
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
                    <figcaption>
                        <h3> جزوه شماره ۱۱۷</h3>
                        <span> تیر ۱۴۰۴ </span>
                        <p> 117- "آمار واردات و صادرات صنایع نساجی کشور در سه ماهه نخست سال 1404" به همراه آمار مقایسه‌ای واردات و صادرات در سه ماهه نخست سال1402، 1403 و 1404 </p>
                    </figcaption>
                </figure>
            </li>
        </ul>
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

        // --- Combined Scroll Listener for Performance ---
        window.addEventListener('scroll', () => {
            handleScroll();
        });

        handleScroll();
    });
</script>
</body>
</html>