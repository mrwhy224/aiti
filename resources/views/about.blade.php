<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>درباره ما - انجمن نساجی</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-primary': '#69a297',
                        'brand-secondary': '#e9d8a6',
                        'brand-accent': '#50808e',
                        'brand-dark': '#212922',
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
body {
            direction: rtl;
            margin: 0;
            font-family: 'Vazirmatn', sans-serif;
            background-color: #f7f8fc;
            color: #333;
            scroll-behavior: smooth;
        }

        /* برای قرار دادن محتوا در وسط صفحه */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* استایل کلی هدر */
        .site-header {
            background-color: transparent;
            /* START: ADDED FOR STICKY NAV */
            position: relative;
            z-index: 1000;
            transition: all 0.4s ease-in-out;
            /* END: ADDED FOR STICKY NAV */
        }

        /* --- نوار بالایی --- */
        .top-bar {
            border-bottom: 1px solid #50808e;
            padding: 8px 0;
            font-size: 13px;
            color: #fff;
        }

        .top-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .top-nav ul li a {
            text-decoration: none;
            color: #fff;
            padding: 5px 15px;
            transition: color 0.3s ease;
            white-space: nowrap;
        }

        .top-nav ul li a:hover {
            color: #ddd8c4;
        }

        .top-bar-nav, .top-bar-static-text {
            flex-shrink: 0;
        }

        .top-bar-scrolling {
            display: flex;
            align-items: center;

            flex-grow: 1;
            min-width: 0;
            padding: 0 20px;
        }

        .top-bar-scrolling i {
            margin-left: 10px;
            color: #ddd8c4; /* رنگ بنفش */
        }

        .top-bar-static-text {
            white-space: nowrap;
            padding-right: 10px;
        }

        /* --- استایل متن چرخان --- */
        .scrolling-text-container {
            flex-grow: 1;
            overflow: hidden;
            position: relative;
            height: 20px; /* ارتفاع متناسب با نوار بالا */
        }

        .scrolling-text {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            line-height: 20px; /* برای وسط چین عمودی */
            white-space: nowrap; /* جلوگیری از شکستن متن */
            animation: marquee 25s linear infinite; /* اعمال انیمیشن */
        }

        /* تعریف انیمیشن حرکت متن */
        @keyframes marquee {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(100%);
            }
        }


        /* --- بخش اصلی هدر --- */
        .main-header {
            transition: padding 0.4s ease-in-out; /* Add transition for smooth resizing */
        }

        /* سمت راست هدر (لوگو و منوی اصلی) */
        .header-right {
            display: flex;
            align-items: center;
            /* خاصیت justify-content در کلاس container فاصله را ایجاد می‌کند */
        }

        .logo-area {
            display: flex;
            align-items: center;
            margin-left: 40px; /* فاصله لوگو از منو */
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: cover;
            transition: all 0.4s ease-in-out; /* Add transition for smooth resizing */
        }

        .logo-text {
            margin-right: 15px;
        }

        .logo-text h1 {
            font-size: 19px;
            font-weight: 700;
            margin: 0 0 4px 0;
            color: #ddd8c4;
            transition: font-size 0.4s ease-in-out; /* Add transition for smooth resizing */
        }

        .logo-text p {
            font-size: 12px;
            margin: 0;
            color: #fff;
            letter-spacing: 0.5px;
            transition: opacity 0.4s ease-in-out; /* Add transition for smooth fade */
        }

        /* منوی اصلی - تغییرات در این بخش اعمال شده */
        .main-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: flex-start; /* آیتم‌ها از بالا تراز می‌شوند */
        }

        .main-nav ul li {
            position: relative; /* برای جای‌گیری جداکننده */
        }

        .main-nav ul li a {
            display: flex;
            flex-direction: column; /* چیدمان عمودی آیکون و متن */
            align-items: center;    /* وسط‌چین کردن افقی */
            padding: 10px 20px;     /* افزایش پدینگ برای ایجاد فاصله */
            text-decoration: none;
            color: #fff;
            font-size: 13px;        /* کمی کوچکتر کردن فونت برای جایگیری بهتر */
            font-weight: 500;
            transition: all 0.4s ease-in-out;
        }
        .main-nav ul .dropdown-content a {
            color: #212922;
            align-items: flex-start;
        }
        .main-nav ul .dropdown-content a:hover {

            color: #fff;
            background: #212922;
        }


        /* استایل آیکون اصلی منو */
        .main-nav ul li a > i:first-child {
            font-size: 22px;      /* بزرگتر کردن آیکون */
            margin-bottom: 8px;   /* فاصله بین آیکون و متن */
            color: #fff;
            transition: all 0.4s ease-in-out;
        }

        /* تغییر رنگ آیکون و متن با هاور شدن */
        .main-nav ul li a:hover,
        .main-nav ul li a:hover span {
            color: #ddd8c4;
        }

        .main-nav ul li a:hover > i:first-child {
            color: #ddd8c4;
        }

        /* استایل منوی بازشو (Dropdown) */
        .dropdown {
            position: relative;
        }

        .dropdown-arrow {
            font-size: 9px !important;
            margin-right: 5px; /* فاصله متن از فلش */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #ffffff;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 8px;
            z-index: 1000;
            padding: 8px 0;
            border: 1px solid #f0f0f0;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            display: block;
            text-align: right;
            font-size: 14px;
        }

        .dropdown-content a:hover {
            background-color: #f5f5f5;
            color: #ddd8c4;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* سمت چپ هدر (دکمه و جستجو) */
        .header-left {
            display: flex;
            align-items: center;
        }

        .cta-button {
            background-color: #212922;
            color: #84B59F;
            border: none;
            padding: 12px 28px;
            border-radius: 3px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.4s ease-in-out;
            white-space: nowrap; /* جلوگیری از شکستن متن دکمه */
        }

        .cta-button:hover {
            background-color: #ddd8c4;
            color: #212922;
        }

        /* START: ADDED FOR STICKY NAV */
        /* --- Styles for Scrolled Header --- */
        .site-header.scrolled {
            position: fixed;
            top: 6px;
            right: 5px;
            left: 5px;
            border-radius: 5px;
            /*width: 100%;*/
            background-color: rgba(80, 128, 142, 0.75); /* A slightly transparent version of the header color */
            backdrop-filter: blur(10px); /* Frosted glass effect */
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 0 10px;
        }

        /* Hide the top bar when scrolled */
        .site-header.scrolled .top-bar {
            display: none;
        }

        /* Adjust padding on the main header when scrolled */
        .site-header.scrolled .main-header {
            padding: 5px 0;
        }

        /* Make the logo smaller when scrolled */
        .site-header.scrolled .logo-icon {
            width: 50px;
            height: 50px;
        }

        .site-header.scrolled .logo-text h1 {
            font-size: 16px;
        }

        /* Hide the logo subtitle when scrolled */
        .site-header.scrolled .logo-text p {
            display: none;
        }

        /* Adjust the main navigation menu items to be horizontal and smaller */
        .site-header.scrolled .main-nav ul li a {
            padding: 15px;
            flex-direction: row; /* Change layout to horizontal */
            align-items: center;
        }

        .site-header.scrolled .main-nav ul li a > i:first-child {
            font-size: 16px;      /* Smaller icon */
            margin-bottom: 0;     /* Remove bottom margin */
            margin-left: 8px;     /* Add space between icon and text */
        }
        .site-header.scrolled .main-nav ul li a > span {
            font-size: 12px;
        }

        /* Make the CTA button slightly smaller */
        .site-header.scrolled .cta-button {
            padding: 8px 20px;
            font-size: 14px;
        }
        /* END: ADDED FOR STICKY NAV */


        .search-box {
            background-color: #f5f5f5;
            padding: 12px 14px;
            border-radius: 3px;
            margin-right: 12px;
            cursor: pointer;
            font-size: 16px;
            color: #555;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-section {
            background: transparent;
            padding: 80px 0;
            overflow: hidden;
        }

        .hero-section .container {
            align-items: center;
        }

        .hero-content {
            flex-basis: 50%;
            padding-left: 40px;
        }

        .hero-content h1 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.4;
            color: #ffffff;
        }

        .hero-content .highlight {
            position: relative;
            display: inline-block;
        }

        .hero-content .highlight::after {
            content: '';
            position: absolute;
            right: -25px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 30px;
            background-color: #00BFA5;
            border-radius: 5px;
        }

        .hero-content p {
            font-size: 18px;
            line-height: 1.7;
            max-width: 500px;
            margin-bottom: 30px;
        }

        .hero-cta-button {
            background-color: #212922;
            color: #84B59F;
            font-weight: bold;
            padding: 15px 35px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        .hero-cta-button:hover {
            transform: translateY(-2px);
            background-color: #FFEDE1;
        }

        .hero-animation {
            flex-basis: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .animated-logo {
            width: 80%;
            max-width: 450px;
            height: auto;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        #cube1 { animation: float 6s ease-in-out infinite; }
        #cube2 { animation: float 6s ease-in-out infinite 0.5s; }
        #cube3 { animation: float 6s ease-in-out infinite 1s; }
        #cube4 { animation: float 6s ease-in-out infinite 1.5s; }
        #cube5 { animation: float 6s ease-in-out infinite 2s; }
        .header-hero-wrapper {
            background: linear-gradient(110deg, #50808e 0%, #69a297 100%);
            color: #e0f7fa;
        }


        .animated-logo {
            --loom-color: #042123;       /* Wooden loom color */
            --warp-color: #042123;       /* Cream color for vertical threads */
            --weft-color-1: #eee;      /* Deep red */
            --weft-color-2: #2980b9;      /* Strong blue */
            --weft-color-3: #093537;      /* Gold/Yellow */
            --comb-color: #cff2f2;
        }

        /* --- SVG Element Styling --- */

        .loom-frame {
            fill: var(--loom-color);
            filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.4));
        }

        .warp-thread {
            stroke: var(--warp-color);
            stroke-width: 1.5;
        }

        .weft-thread {
            fill: none;
            stroke-width: 5;
            stroke-linecap: round;
            stroke-dasharray: 160;
            stroke-dashoffset: 160;
            animation: weave-row 8s ease-out infinite;
        }

        .comb {
            fill: var(--comb-color);
            animation: beat-comb 8s ease-in-out infinite;
        }

        /* --- Animation Staggering --- */

        /* Each row is animated with a delay to appear sequentially */
        .row-1 { animation-delay: -7s; }
        .row-2 { animation-delay: -6s; }
        .row-3 { animation-delay: -5s; }
        .row-4 { animation-delay: -4s; }
        .row-5 { animation-delay: -3s; }
        .row-6 { animation-delay: -2s; }
        .row-7 { animation-delay: -1s; }
        .row-8 { animation-delay: 0s; } /* Reference animation */

        /* The comb's animation is also staggered to follow the last woven row */
        .comb-1 { animation-delay: -7s; }
        .comb-2 { animation-delay: -6s; }
        .comb-3 { animation-delay: -5s; }
        .comb-4 { animation-delay: -4s; }
        .comb-5 { animation-delay: -3s; }
        .comb-6 { animation-delay: -2s; }
        .comb-7 { animation-delay: -1s; }
        .comb-8 { animation-delay: 0s; }


        /* --- Keyframes --- */

        @keyframes weave-row {
            0% { stroke-dashoffset: 160; } /* Start hidden */
            15% { stroke-dashoffset: 0; }  /* Weaving complete */
            90% { stroke-dashoffset: 0; opacity: 1; }
            100% { stroke-dashoffset: 0; opacity: 0; } /* Fade out to restart cycle */
        }

        @keyframes beat-comb {
            0% { transform: translateY(0); opacity: 0; }
            15% { transform: translateY(0); opacity: 1; } /* Appears after row is woven */
            25% { transform: translateY(10px); } /* Beats down */
            35% { transform: translateY(0); }    /* Returns up */
            90% { opacity: 1; }
            100% { opacity: 0; }
        }








        /* --- Hamburger Menu and Responsive Styles --- */
        .hamburger-menu {
            display: none; /* Hidden on desktop */
            font-size: 28px;
            color: #fff;
            background: none;
            border: none;
            cursor: pointer;
        }

        .mobile-nav {
            position: fixed;
            top: 0;
            right: -100%; /* Initially hidden off-screen */
            width: 300px;
            height: 100%;
            background-color: #50808e;
            box-shadow: -5px 0 15px rgba(0,0,0,0.2);
            z-index: 1000;
            transition: right 0.4s ease;
            padding: 60px 20px 20px 20px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .mobile-nav.open {
            right: 0; /* Slides in */
        }

        .mobile-nav .close-btn {
            position: absolute;
            top: 15px;
            left: 20px;
            font-size: 28px;
            color: #fff;
            background: none;
            border: none;
            cursor: pointer;
        }

        .mobile-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            padding: 15px 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: block;
        }

        /* --- Hero Section Styles --- */
        .hero-section { background: transparent; padding: 60px 0; overflow: hidden; }
        .hero-section .container { align-items: center; }
        .hero-content { flex-basis: 50%; padding-left: 40px; }
        .hero-content h1 { font-size: 42px; font-weight: 800; margin-bottom: 20px; line-height: 1.4; color: #ffffff; }
        .hero-cta-button { background-color: #212922; color: #84B59F; font-weight: bold; padding: 15px 35px; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; }
        .hero-animation { flex-basis: 50%; display: flex; justify-content: center; align-items: center; }
        .animated-svg { width: 80%; max-width: 450px; height: auto; }


        /* --- Media Query for Responsive Design --- */
        @media (max-width: 1024px) {
            /* Hide desktop navigation elements */
            .top-bar, .main-nav, .header-left {
                display: none;
            }
            /* START: ADDED FOR STICKY NAV */
            /* Make sure the scrolled nav also hides on mobile */
            .site-header.scrolled .main-nav, .site-header.scrolled .header-left {
                display: none;
            }
            .site-header.scrolled .hamburger-menu {
                display: block;
            }
            /* END: ADDED FOR STICKY NAV */
            .hamburger-menu {
                display: block; /* Show hamburger icon */
            }
            .main-header .container, .top-bar .container {
                justify-content: space-between;
            }
            .header-hero-wrapper {
                padding: 0 10px;
            }
            .logo-area {
                margin-left: 0;
            }
            .logo-icon {
                width: 60px; height: 60px;
            }
            .logo-text h1 { font-size: 16px; }

            /* Hero Section Mobile Layout */
            .hero-section .container {
                flex-direction: column; /* Stack items vertically */
            }
            .hero-content {
                padding-left: 0;
                flex-basis: 100%;
                text-align: center;
            }
            .hero-content h1 {
                font-size: 32px;
            }
            .hero-animation {
                display: flex; /* Ensure animation is visible */
                flex-basis: 100%;
                margin-top: 40px; /* Add space above the animation */
            }
            .animated-svg {
                width: 70%; /* Adjust SVG size for mobile */
                max-width: 200px;
            }
        }


        /* --- Main Container --- */
        .contact-section {
            padding: 50px;
            background: linear-gradient(-110deg, #50808e 0%, #69a297 100%);
            display: flex;
            align-items: center;
            flex-flow: column;
        }

        .contact-section h2 {
            text-align: center;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 40px;
            color: #ffffff;
        }

        /* --- Layout Container --- */
        .contact-container {
            max-width: 1300px;
            display: flex;
            gap: 40px;
        }

        /* --- Form Side --- */
        .form-wrapper {
            flex: 1;
            display: flex;
            flex-flow: wrap;
        }

        .form-wrapper form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group input {
            background-color:  rgba(26, 50, 56, 0.7);
            border: 1px solid #2a4a53;
            border-radius: 12px;
            padding: 15px;
            color: #e0f7fa;
            font-family: 'Vazirmatn', sans-serif;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input::placeholder {
            color: #88aebc;
        }

        .form-group input:focus {
            outline: none;
            border-color: #212922;
        }

        /* Container for Textarea and Button */
        .textarea-container {
            position: relative;
            flex-grow: 1; /* Allows this container to take up remaining vertical space */
            margin-top: 20px;
        }

        .textarea-container textarea {
            width: 100%;
            height: 100%;
            min-height: 180px;
            background-color: rgba(26, 50, 56, 0.7);
            border: 1px solid #2a4a53;
            border-radius: 12px;
            padding: 15px;
            padding-bottom: 80px; /* Space for the button */
            color: #e0f7fa;
            font-family: 'Vazirmatn', sans-serif;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
            resize: none;
            box-sizing: border-box;
        }

        .textarea-container textarea::placeholder {
            color: #88aebc;
        }

        .textarea-container textarea:focus {
            outline: none;
            border-color: #212922;
        }

        .textarea-container .submit-button {
            position: absolute;
            left: 20px;
            bottom: 20px;
            width: auto;
            padding: 15px 40px;
            background-color: #38c1a1;
            color: #0d1a1e;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .textarea-container .submit-button:hover {
            background-color: #45dbc1;
            transform: translateY(-2px);
        }


        /* --- Map Side --- */
        .map-wrapper {
            flex-basis: 40%; /* عرض ستون نقشه */
            display: flex;
            flex-direction: column;
        }

        .map-placeholder {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 15px;
            overflow: hidden;
            background-color:  rgba(26, 50, 56, 0.7);
        }

        .map-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.6;
        }

        .map-actions {
            background-color: rgba(26, 50, 56, 0.8);
            backdrop-filter: blur(5px);
            padding: 10px;
            border-radius: 12px;
            position: absolute;
            bottom: 15px;
            right: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: calc(100% - 30px);
        }

        .map-actions-left a {
            color: #e0f7fa;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .map-actions-left a:hover {
            color: #38c1a1;
        }

        .map-icons {
            display: flex;
            gap: 10px;
        }

        .map-icons a {
            color: #e0f7fa;
            font-size: 20px;
        }


        /* --- Responsive Styles --- */
        @media (max-width: 992px) {
            .contact-container {
                flex-direction: column;
            }
            .contact-container-wrapper {
                order: -1; /* نقشه بالای فرم قرار گیرد */
                height: 300px; /* یک ارتفاع ثابت برای نقشه در موبایل */
                min-height: 300px;
            }
        }

        @media (max-width: 768px) {
            .contact-section {
                padding: 30px 20px;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
        }



        .footer-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 50px;
            color: #b0c4de;
        }

        /* Footer Top Section */
        .footer-top {
            display: flex;
            justify-content: space-between;
            gap: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid #2a4a53;
        }

        .footer-about {
            flex-basis: 60%;
            line-height: 1.8;
            text-align: justify;
        }

        .footer-contact-info {
            flex-basis: 40%;
            display: flex;
            gap: 20px 20px;
            justify-content: space-between;
        }
        .footer-contact-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-contact-info ul li {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            flex-flow: row-reverse;
            height: 48px;
        }
        .footer-contact-info ul li i {
            margin-left: 15px;
            font-size: 20px;
            width: 25px;
            text-align: center;
        }

        /* Footer Middle Section */
        .footer-middle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid #2a4a53;
        }

        .partner-logos { display: flex; align-items: center; gap: 20px; flex-wrap: wrap; }
        .partner-logos span { font-weight: bold; }
        .partner-logos img {
            height: 30px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        .partner-logos img:hover { opacity: 1; }

        .newsletter-form { display: flex; }
        .newsletter-form input {
            background-color: #1a3238;
            border: 1px solid #2a4a53;
            color: #fff;
            padding: 12px;
            border-radius: 0 10px 10px 0;
            border-left: none;
            width: 300px;
        }
        .newsletter-form input::placeholder { color: #88aebc; }
        .newsletter-form button {
            background-color: #38c1a1;
            border: none;
            color: #112227;
            padding: 0 20px;
            border-radius: 10px 0 0 10px;
            cursor: pointer;
        }

        /* Footer Bottom Section */
        .footer-bottom {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .footer-logo-area img.footer-logo {
            height: 40px;
            margin-bottom: 20px;
        }
        .social-icons a {
            color: #b0c4de;
            margin-left: 15px;
            font-size: 18px;
            transition: color 0.3s;
        }
        .social-icons a:hover { color: #38c1a1; }

        .footer-links h4 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 18px;
        }
        .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-links ul li a {
            color: #b0c4de;
            text-decoration: none;
            line-height: 2.2;
            transition: color 0.3s;
        }
        .footer-links ul li a:hover { color: #38c1a1; }

        .footer-certs { display: flex; gap: 15px; }
        .cert-box {
            background-color: #1a4a53;
            border-radius: 10px;
            padding: 15px;
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cert-box img {
            max-width: 100%;
            filter: grayscale(1) brightness(2);
        }

        /* --- Responsive Styles --- */
        @media (max-width: 992px) {
            .footer-top, .footer-middle {
                flex-direction: column;
                align-items: flex-start;
            }
            .footer-bottom {
                grid-template-columns: 1fr 1fr;
            }
            .footer-logo-area, .footer-certs {
                grid-column: 1 / -1;
                text-align: center;
            }
            .footer-certs {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .footer-bottom { grid-template-columns: 1fr; }
            .footer-logo-area, .footer-links { text-align: center; }
            .newsletter-form input { width: 100%; }
            .partner-logos { justify-content: center; }
        }
        .icon-list-item span{
            display: flex;
            align-items: center;

            color: #eee;
        }
        .footer-contact-info div:nth-child(2) span{
            color: #b1cad3;
            font-weight: bold;
        }
        /* Staggered Loading Animation */
        .animated-on-scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .animated-on-scroll.is-visible { opacity: 1; transform: translateY(0); }

        /* Timeline Styles */
        .timeline-item { position: relative; padding-bottom: 3rem; }
        .timeline-item:not(:last-child)::before { content: ''; position: absolute; top: 1.25rem; right: 24px; width: 2px; height: 100%; background-color: #cbd5e1; }
        .timeline-dot { position: absolute; top: 0.75rem; right: 16px; width: 20px; height: 20px; }

        /* --- START: Corrected Org Chart Styles --- */
        .org-chart-container {
            /* Force LTR direction for the layout engine */
            direction: ltr;
            text-align: center;
        }
        .org-chart ul {
            padding-top: 20px;
            position: relative;
            transition: all 0.5s;
        }
        .org-chart li {
            display: inline-block; /* Use inline-block for horizontal alignment */
            vertical-align: top;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 8px 0 8px;
            transition: all 0.5s;
        }
        /* Draw lines */
        .org-chart li::before, .org-chart li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 2px solid #ccc;
            width: 50%;
            height: 20px;
        }
        .org-chart li::after {
            right: auto;
            left: 50%;
            border-left: 2px solid #ccc;
        }
        /* Remove lines for single child */
        .org-chart li:only-child::after, .org-chart li:only-child::before {
            display: none;
        }
        .org-chart li:only-child {
            padding-top: 0;
        }
        /* Remove outer connectors */
        .org-chart li:first-child::before, .org-chart li:last-child::after {
            border: 0 none;
        }
        /* Add curve to end connectors */
        .org-chart li:last-child::before {
            border-right: 2px solid #ccc;
            border-radius: 0 5px 0 0;
        }
        .org-chart li:first-child::after {
            border-radius: 5px 0 0 0;
        }
        /* Vertical line from parent */
        .org-chart ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 2px solid #ccc;
            width: 0;
            height: 20px;
        }
        /* The content box */
        .org-chart li a {
            /* Set text direction back to RTL for content */
            direction: rtl; 
            border: 1px solid #ccc;
            padding: 1rem;
            text-decoration: none;
            color: #333;
            background-color: #fff;
            font-size: 0.9rem;
            display: inline-block;
            border-radius: 8px;
            transition: all 0.3s;
            min-width: 120px;
        }
        .org-chart li a:hover, .org-chart li a:hover+ul li a {
            background: #e9d8a6;
            color: #212922;
            border-color: #e9d8a6;
        }
        .org-chart li a:hover+ul li::after, .org-chart li a:hover+ul li::before, .org-chart li a:hover+ul ul::before {
            border-color: #999;
        }
        /* --- END: Corrected Org Chart Styles --- */

        /* --- Footer Styles --- */
        footer { background-color: #212922; color: #b0c4de; }
        .footer-container { width: 90%; max-width: 1200px; margin: 0 auto; padding: 50px 0; }
    </style>
</head>
<body>

<!-- Header Section -->
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

                <div class="w-[1px] h-[15px] bg-[#CCDDF3] mt-1 text-splitter"></div>
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
                                    <a href="#">شعب انجمن</a>
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
                    <button class="cta-button">
                        عضویت / کارتابل انجمن
                    </button>

                </div>
                <button class="hamburger-menu" id="hamburger-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>
</div>

<!-- Main Content -->
<main class="main-content">
    <!-- Hero Section -->
    <section class="relative py-24 md:py-32 text-center text-white overflow-hidden">
        <div class="absolute inset-0 bg-brand-dark">
            <img src="https://placehold.co/1920x800/212922/69a297?text=." alt="بافت پارچه" class="w-full h-full object-cover opacity-10">
        </div>
        <div class="relative max-w-4xl mx-auto px-4">
            <h1 class="text-4xl md:text-6xl font-extrabold animated-on-scroll">ما تار و پود صنعت نساجی ایران را به هم می‌بافیم</h1>
            <p class="mt-6 text-lg md:text-xl max-w-2xl mx-auto text-gray-300 animated-on-scroll" style="transition-delay: 150ms;">انجمن صنایع نساجی ایران، با بیش از یک دهه تجربه، به عنوان قلب تپنده این صنعت، برای رشد، نوآوری و هم‌افزایی میان متخصصان، تولیدکنندگان و دانش‌پژوهان تلاش می‌کند.</p>
        </div>
    </section>

    <!-- Our Story (Timeline) Section -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark animated-on-scroll">داستان ما: از یک ایده تا یک نهاد ملی</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto animated-on-scroll" style="transition-delay: 150ms;">نگاهی به مسیر پر افتخار انجمن در گذر زمان</p>
            </div>
            <div class="max-w-3xl mx-auto">
                <div class="timeline-item animated-on-scroll">
                    <div class="timeline-dot bg-brand-secondary border-4 border-white rounded-full shadow-md"></div>
                    <div class="mr-12 bg-gray-50 p-6 rounded-xl shadow-sm border">
                        <p class="font-bold text-brand-primary mb-1">۱۳۸۸ - تولد یک ایده</p>
                        <h3 class="text-xl font-bold text-brand-dark mb-2">تاسیس انجمن</h3>
                        <p class="text-gray-600">انجمن با گردهمایی جمعی از پیشکسوتان و متخصصان صنعت نساجی با هدف ایجاد یک نهاد منسجم برای حمایت از فعالان این حوزه تاسیس شد.</p>
                    </div>
                </div>
                <div class="timeline-item animated-on-scroll">
                    <div class="timeline-dot bg-brand-secondary border-4 border-white rounded-full shadow-md"></div>
                    <div class="mr-12 bg-gray-50 p-6 rounded-xl shadow-sm border">
                        <p class="font-bold text-brand-primary mb-1">۱۳۹۲ - برداشتن گام‌های بزرگ</p>
                        <h3 class="text-xl font-bold text-brand-dark mb-2">برگزاری اولین کنفرانس ملی</h3>
                        <p class="text-gray-600">اولین کنفرانس ملی نساجی با حضور بیش از ۵۰۰ شرکت‌کننده برگزار شد و به یک رویداد سالانه موفق تبدیل گشت.</p>
                    </div>
                </div>
                <div class="timeline-item animated-on-scroll">
                    <div class="timeline-dot bg-brand-secondary border-4 border-white rounded-full shadow-md"></div>
                    <div class="mr-12 bg-gray-50 p-6 rounded-xl shadow-sm border">
                        <p class="font-bold text-brand-primary mb-1">۱۳۹۸ - گسترش افق‌ها</p>
                        <h3 class="text-xl font-bold text-brand-dark mb-2">همکاری‌های بین‌المللی</h3>
                        <p class="text-gray-600">امضای تفاهم‌نامه با انجمن‌های نساجی ترکیه و ایتالیا برای انتقال دانش و فناوری‌های نوین به کشور.</p>
                    </div>
                </div>
                 <div class="timeline-item animated-on-scroll">
                    <div class="timeline-dot bg-brand-secondary border-4 border-white rounded-full shadow-md"></div>
                    <div class="mr-12 bg-gray-50 p-6 rounded-xl shadow-sm border">
                        <p class="font-bold text-brand-primary mb-1">۱۴۰۴ - نگاه به آینده</p>
                        <h3 class="text-xl font-bold text-brand-dark mb-2">راه‌اندازی مرکز نوآوری</h3>
                        <p class="text-gray-600">افتتاح مرکز نوآوری و شتابدهی برای حمایت از استارتاپ‌ها و ایده‌های خلاقانه در صنعت نساجی.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organizational Chart Section -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark animated-on-scroll">ساختار راهبری انجمن</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto animated-on-scroll" style="transition-delay: 150ms;">با تیمی از متخصصان متعهد، برای آینده‌ای روشن تلاش می‌کنیم.</p>
            </div>
            <div class="org-chart-container animated-on-scroll" style="transition-delay: 300ms;">
                <div class="org-chart">
                    <ul>
                        <li>
                            <a href="#">رئیس هیئت مدیره</a>
                            <ul>
                                <li><a href="#">عضو هیئت مدیره</a></li><li><a href="#">عضو هیئت مدیره</a>
                                    <ul>
                                        <li><a href="#">رئیس کمیته آموزش</a></li><li><a href="#">رئیس کمیته پژوهش</a></li>
                                    </ul>
                                </li><li><a href="#">عضو هیئت مدیره</a></li><li><a href="#">عضو هیئت مدیره</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet the Team Section -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark animated-on-scroll">آشنایی با اعضای هیئت مدیره</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member Card -->
                <div class="animated-on-scroll text-center group" style="transition-delay: 450ms;">
                    <div class="relative w-48 h-48 mx-auto rounded-full shadow-lg overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" src="https://placehold.co/200x200/69a297/ffffff?text=عضو" alt="نام عضو">
                        <div class="absolute inset-0 bg-brand-dark/60 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="#" class="text-white hover:text-brand-secondary"><i class="fab fa-linkedin-in text-xl"></i></a>
                            <a href="#" class="text-white hover:text-brand-secondary"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-brand-dark">دکتر حسینی</h3>
                    <p class="text-brand-primary">عضو هیئت مدیره</p>
                </div>
                <!-- Repeat for other members -->
                <div class="animated-on-scroll text-center group" style="transition-delay: 450ms;">
                    <div class="relative w-48 h-48 mx-auto rounded-full shadow-lg overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" src="https://placehold.co/200x200/50808e/ffffff?text=عضو" alt="نام عضو">
                        <div class="absolute inset-0 bg-brand-dark/60 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="#" class="text-white hover:text-brand-secondary"><i class="fab fa-linkedin-in text-xl"></i></a>
                            <a href="#" class="text-white hover:text-brand-secondary"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-brand-dark">دکتر حسینی</h3>
                    <p class="text-brand-primary">عضو هیئت مدیره</p>
                </div>
                <div class="animated-on-scroll text-center group" style="transition-delay: 450ms;">
                    <div class="relative w-48 h-48 mx-auto rounded-full shadow-lg overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" src="https://placehold.co/200x200/e9d8a6/000000?text=عضو" alt="نام عضو">
                        <div class="absolute inset-0 bg-brand-dark/60 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="#" class="text-white hover:text-brand-secondary"><i class="fab fa-linkedin-in text-xl"></i></a>
                            <a href="#" class="text-white hover:text-brand-secondary"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-brand-dark">دکتر حسینی</h3>
                    <p class="text-brand-primary">عضو هیئت مدیره</p>
                </div>
                <div class="animated-on-scroll text-center group" style="transition-delay: 450ms;">
                    <div class="relative w-48 h-48 mx-auto rounded-full shadow-lg overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" src="https://placehold.co/200x200/212922/ffffff?text=عضو" alt="نام عضو">
                        <div class="absolute inset-0 bg-brand-dark/60 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="#" class="text-white hover:text-brand-secondary"><i class="fab fa-linkedin-in text-xl"></i></a>
                            <a href="#" class="text-white hover:text-brand-secondary"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-brand-dark">دکتر حسینی</h3>
                    <p class="text-brand-primary">عضو هیئت مدیره</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Us CTA -->
    <section class="py-20 bg-brand-primary/10">
        <div class="max-w-4xl mx-auto px-4 text-center">
             <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark animated-on-scroll">به خانواده بزرگ نساجی ایران بپیوندید</h2>
             <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto animated-on-scroll" style="transition-delay: 150ms;">با عضویت در انجمن، به شبکه‌ای از متخصصان، منابع آموزشی انحصاری و فرصت‌های بی‌نظیر دسترسی پیدا کنید و در شکل‌دهی به آینده این صنعت سهیم باشید.</p>
             <div class="mt-8 animated-on-scroll" style="transition-delay: 300ms;">
                <a href="#" class="inline-block bg-brand-dark text-white font-bold py-4 px-10 rounded-lg hover:bg-brand-dark/90 transition-transform transform hover:scale-105 shadow-lg">اطلاعات بیشتر و عضویت</a>
             </div>
        </div>
    </section>

</main>


<footer>

    <section class="contact-section border-b border-brand-accent p-10 border-b-[10px]">

        <div class="contact-container">
            <!-- Form Section -->
            <div class="form-wrapper">
                <h2>با ما در تماس باشید</h2>
                <form>
                    <div class="form-grid">
                        <div class="form-group">
                            <input type="text" id="name" placeholder="نام و نام خانوادگی">
                        </div>
                        <div class="form-group">
                            <input type="tel" id="phone" placeholder="شماره همراه">
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" placeholder="ایمیل شما">
                        </div>
                        <div class="form-group">
                            <input type="text" id="subject" placeholder="تلفن ثابت">
                        </div>
                    </div>
                    <div class="textarea-container">
                        <textarea id="message" placeholder="توضیحات"></textarea>
                        <button type="submit" class="submit-button">ارسال</button>
                    </div>
                </form>
            </div>
            <!-- Map Section -->
            <div class="map-wrapper">
                <div class="map-placeholder">
                    <img src="https://placehold.co/600x400/1a3238/38c1a1?text=Map" alt="محل ما روی نقشه">
                    <div class="map-actions">
                        <div class="map-actions-left">
                            <a href="#"><i class="fas fa-map-marker-alt" style="margin-left: 8px;"></i>آدرس ما روی نقشه</a>
                        </div>
                        <div class="map-icons">
                            <a href="#"><i class="fab fa-google"></i></a>
                            <a href="#"><i class="fas fa-compass"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[url('footer-back.png')] bg-cover bg-center border-b border-gray-300 max-w-100" style="padding:30px 20px 10px 20px;background-color: #212922;;background-position: 250px -24px;background-repeat: repeat;background-size: unset">

        <div class="footer-container">
            <!-- Top Section -->
            <div class="footer-top">
                <div class="footer-about">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد
                </div>
                <div class="footer-contact-info">
                    <div class="widget-container">
                        <ul class="icon-list-items">
                            <li class="icon-list-item">
                                <span class="elementor-icon-list-icon"><i aria-hidden="true" class="iconOutline iconOutline-location"></i></span>
                                <span class="elementor-icon-list-text"><i class="fas fa-map-marker"></i>آدرس</span>
                            </li>
                            <li class="icon-list-item">
                                <span class="elementor-icon-list-icon"><i aria-hidden="true" class="iconOutline iconOutline-location"></i></span>
                                <span class="elementor-icon-list-text"><i class="fas fa-phone"></i>تلفن</span>
                            </li>
                            <li class="icon-list-item">
                                <span class="elementor-icon-list-icon"><i aria-hidden="true" class="iconOutline iconOutline-location"></i></span>
                                <span class="elementor-icon-list-text"><i class="fas fa-at"></i>ایمیل</span>
                            </li>
                        </ul>
                    </div>

                    <div class="widget-container">
                        <ul class="icon-list-items">
                            <li class="icon-list-item">
                                <span class="elementor-icon-list-icon"><i aria-hidden="true" class="iconOutline iconOutline-location"></i></span>
                                <span class="elementor-icon-list-text">تهران - بلوار آفریقا(جردن) انتهای خیابان تور پلاک ۸ -طبقه اول- واحد ۱</span>
                            </li>
                            <li class="icon-list-item">
                                <span class="elementor-icon-list-icon"><i aria-hidden="true" class="iconOutline iconOutline-location"></i></span>
                                <span class="elementor-icon-list-text">۲۶۲۰۰۱۹۶</span>
                            </li>
                            <li class="icon-list-item">
                                <span class="elementor-icon-list-icon"><i aria-hidden="true" class="iconOutline iconOutline-location"></i></span>
                                <span class="elementor-icon-list-text">info@aiti.org.ir</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Middle Section -->
            <div class="footer-middle">
                <div class="partner-logos">
                    <span>منتخبی از اعضای انجمن</span>
                    <img src="https://placehold.co/100x40/ffffff/112227?text=DigiClub" alt="DigiClub">
                    <img src="https://placehold.co/100x40/ffffff/112227?text=Asayer" alt="Asayer">
                    <img src="https://placehold.co/100x40/ffffff/112227?text=Savision" alt="Savision">
                    <img src="https://placehold.co/100x40/ffffff/112227?text=PooYna" alt="Pooyna">
                    <img src="https://placehold.co/100x40/ffffff/112227?text=Zoomit" alt="Zoomit">
                </div>
                <div class="newsletter-form">
                    <input type="email" placeholder="ایمیل خود را برای دریافت خبرنامه وارد کنید...">
                    <button type="submit"><i class="fas fa-arrow-left"></i></button>
                </div>
            </div>
            <!-- Bottom Section -->
            <div class="footer-bottom">
                <div class="footer-logo-area">
                    <img src="https://placehold.co/150x50/ffffff/112227?text=Aiti" alt="Aiti Logo" class="footer-logo">
                    <p>ایده هایتان به واقعیت تبدیل کن</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>دسترسی سریع</h4>
                    <ul>
                        <li><a href="#">آموزش طراحی سایت</a></li>
                        <li><a href="#">نمونه کار</a></li>
                        <li><a href="#">طراحی سایت</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>خدمات</h4>
                    <ul>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">تماس با ما</a></li>
                        <li><a href="#">خدمات</a></li>
                    </ul>
                </div>
                <div class="footer-certs">
                    <div class="cert-box">
                        <img src="https://placehold.co/80x80/ffffff/1a4a53?text=نماد" alt="نماد اعتماد">
                    </div>
                    <div class="cert-box">
                        <img src="https://placehold.co/80x80/ffffff/1a4a53?text=نماد" alt="نماد ساماندهی">
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Sticky Navigation Script ---
        const header = document.querySelector('.site-header');
        const headerWrapper = document.querySelector('.header-hero-wrapper');
        const mainContent = document.querySelector('.main-content');
        const scrollThreshold = 100; // The scroll position in pixels to trigger the sticky nav


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

        // --- Staggered Loading Animation ---
        const animatedElements = document.querySelectorAll('.animated-on-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        animatedElements.forEach(el => {
            observer.observe(el);
        });

        // --- Combined Scroll Listener ---
        window.addEventListener('scroll', handleScroll);
        handleScroll();
    });
</script>

</body>
</html>
