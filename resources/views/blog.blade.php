<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>وبلاگ انجمن نساجی</title>

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
        /* --- Base Styles --- */
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






        .counter-value { transition: all 1.5s ease-in-out; }
        /* Styles for tabs */
        .tab-button {
            transition: all 0.3s ease;
            padding: 0.75rem 1.5rem;
            border-bottom: 3px solid transparent;
        }
        .tab-button.active {
            color: #2563eb; /* brand-primary */
            border-bottom-color: #2563eb; /* brand-primary */
            font-weight: 700;
        }
        /* Reveal on scroll */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }






        .event-section .swiper-container {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .event-section .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 320px;
            height: 420px;
            background-color: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .event-section .swiper-slide .slide-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
        }
        .event-section .swiper-3d .swiper-slide-shadow-left,
        .event-section .swiper-3d .swiper-slide-shadow-right {
            background-image: linear-gradient(to right, rgba(0,0,0,0.5), rgba(0,0,0,0));
        }
        .article-content h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            color: #212922;
        }
        .article-content p {
            line-height: 1.8;
            margin-bottom: 1.5rem;
            color: #4a5568;
        }
        .article-content ul {
            list-style-type: disc;
            padding-right: 2rem;
            margin-bottom: 1.5rem;
        }
        .article-content blockquote {
            border-right: 4px solid #69a297;
            padding-right: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #4a5568;
        }

        /* --- New Design Enhancements --- */
        .widget {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border: 1px solid #e5e7eb;
        }
        .widget-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #212922;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #69a297;
            display: inline-block;
        }

        .category-filter-btn { transition: all 0.3s ease; }
        .category-filter-btn.active { background-color: #212922; color: #fff; box-shadow: 0 4px 14px rgba(33, 41, 34, 0.25); }
        
        .animated-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out, box-shadow 0.3s ease;
            transition-delay: var(--delay, 0s);
            border: 1px solid transparent;
        }
        .animated-on-scroll.is-visible { opacity: 1; transform: translateY(0); }
        
        .post-card-image-wrapper { overflow: hidden; }
        .post-card-image { transition: transform 0.5s ease; }
        .post-card:hover .post-card-image { transform: scale(1.05); }

        /* Video Post Card Styles */
        .video-play-icon {
            transition: all 0.3s ease;
        }
        .post-card:hover .video-play-icon {
            transform: scale(1.1);
            background-color: #69a297;
            color: white;
        }

        /* --- Footer Styles --- */
        footer { background-color: #212922; color: #b0c4de; }
        .footer-container { width: 90%; max-width: 1200px; margin: 0 auto; padding: 50px 0; }
        .footer-bottom { display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 40px; }
        .footer-links h4 { color: #fff; margin-bottom: 20px; font-size: 18px; }
        .footer-links ul { list-style: none; padding: 0; margin: 0; }
        .footer-links ul li a { color: #b0c4de; text-decoration: none; line-height: 2.2; transition: color 0.3s; }
        .footer-links ul li a:hover { color: #38c1a1; }
    </style>
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

<!-- Main Blog Content -->
<main class="py-16 lg:py-24 main-content">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="text-center mb-12 lg:mb-16">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-brand-dark">وبلاگ انجمن</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">آخرین مقالات، اخبار و تحلیل‌های تخصصی صنعت نساجی را اینجا بخوانید.</p>
        </div>

        

        <!-- Dynamic Blog Grid -->
        <div class="grid grid-cols-12 gap-8">

            <!-- Featured Post (Redesigned) -->
            <div class="col-span-12 lg:col-span-7">
                <article class="post-card animated-on-scroll relative rounded-2xl shadow-lg overflow-hidden h-full group">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://placehold.co/800x600/69a297/ffffff?text=مقاله+ویژه" alt="تصویر مقاله ویژه">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 right-0 p-8 text-white">
                        <a href="#" class="text-sm font-semibold bg-brand-secondary text-brand-dark px-3 py-1 rounded-full mb-3 inline-block">تکنولوژی</a>
                        <h2 class="text-2xl lg:text-3xl font-bold mb-4">
                            <a href="#" class="hover:underline">
                                آینده نساجی هوشمند: چگونه اینترنت اشیاء (IoT) صنعت را متحول می‌کند؟
                            </a>
                        </h2>
                        <div class="flex items-center text-sm opacity-80">
                            <img class="w-10 h-10 rounded-full ml-3 border-2 border-white/50" src="https://placehold.co/40x40/212922/ffffff?text=نویسنده" alt="نویسنده">
                            <span>دکتر رضایی</span>
                            <span class="mx-2">&bull;</span>
                            <span><i class="far fa-clock ml-1"></i> ۸ دقیقه مطالعه</span>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Side Posts Column -->
            <div class="col-span-12 lg:col-span-5 flex flex-col gap-8">
                <!-- Side Post 1 -->
                <article class="post-card animated-on-scroll bg-white rounded-2xl shadow-lg overflow-hidden flex-1 flex flex-col">
                    <a href="#" class="block post-card-image-wrapper h-48">
                        <img class="post-card-image w-full h-full object-cover" src="https://placehold.co/600x400/50808e/ffffff?text=مقاله" alt="تصویر مقاله">
                    </a>
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-sm font-semibold text-brand-primary mb-2">بازار</p>
                        <h3 class="text-lg font-bold text-brand-dark mb-3 flex-grow">
                            <a href="#" class="hover:text-brand-primary transition-colors">تحلیل بازار پنبه در سال ۲۰۲۵ و تاثیر آن</a>
                        </h3>
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                            <span>تیم تحریریه</span>
                            <span><i class="far fa-clock ml-1"></i> ۵ دقیقه مطالعه</span>
                        </div>
                    </div>
                </article>
                <!-- Side Post 2 (Video Format) -->
                <article class="post-card animated-on-scroll bg-white rounded-2xl shadow-lg overflow-hidden flex-1 flex flex-col relative">
                    <a href="#" class="block post-card-image-wrapper h-48">
                        <img class="post-card-image w-full h-full object-cover" src="https://placehold.co/600x400/8d99ae/ffffff?text=ویدیو" alt="تصویر ویدیو">
                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                            <div class="video-play-icon w-16 h-16 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white text-2xl">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </a>
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-sm font-semibold text-brand-primary mb-2">ویدیو</p>
                        <h3 class="text-lg font-bold text-brand-dark mb-3 flex-grow">
                            <a href="#" class="hover:text-brand-primary transition-colors">وبینار تخصصی: الیاف بازیافتی و آینده مد پایدار</a>
                        </h3>
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                            <span>سارا حسینی</span>
                            <span><i class="far fa-clock ml-1"></i> ۴۵ دقیقه</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!-- Popular Posts Section -->
        <section class="my-16 lg:my-24">
            <div class="bg-brand-dark text-white rounded-2xl p-8 lg:p-12 shadow-2xl" style="background-image: linear-gradient(rgba(33, 41, 34, 0.95), rgba(33, 41, 34, 0.95)), url('https://www.transparenttextures.com/patterns/subtle-carbon.png');">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold">محبوب‌ترین مقالات هفته</h2>
                    <a href="#" class="text-brand-secondary font-semibold hover:underline">مشاهده همه</a>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Popular Post 1 -->
                    <a href="#" class="group">
                        <div class="overflow-hidden rounded-lg mb-4">
                            <img class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" src="https://placehold.co/400x300/e9d8a6/333333?text=محبوب" alt="">
                        </div>
                        <h3 class="font-semibold text-lg group-hover:text-brand-secondary transition-colors">۵ روش برای کاهش مصرف آب در رنگرزی</h3>
                        <p class="text-sm text-gray-400 mt-1">توسط مهندس اکبری</p>
                    </a>
                    <!-- Popular Post 2 -->
                    <a href="#" class="group">
                        <div class="overflow-hidden rounded-lg mb-4">
                            <img class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" src="https://placehold.co/400x300/212922/ffffff?text=محبوب" alt="">
                        </div>
                        <h3 class="font-semibold text-lg group-hover:text-brand-secondary transition-colors">گزارش تصویری از نمایشگاه نساجی استانبول</h3>
                        <p class="text-sm text-gray-400 mt-1">توسط تیم تحریریه</p>
                    </a>
                    <!-- Popular Post 3 -->
                    <a href="#" class="group">
                        <div class="overflow-hidden rounded-lg mb-4">
                            <img class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" src="https://placehold.co/400x300/8d99ae/ffffff?text=محبوب" alt="">
                        </div>
                        <h3 class="font-semibold text-lg group-hover:text-brand-secondary transition-colors">الیاف بازیافتی: انقلابی سبز در صنعت مد</h3>
                        <p class="text-sm text-gray-400 mt-1">توسط سارا حسینی</p>
                    </a>
                </div>
            </div>
        </section>

        <!-- Rest of the posts -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <article class="post-card animated-on-scroll bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                <a href="#" class="block post-card-image-wrapper h-56"><img class="post-card-image w-full h-full object-cover" src="https://placehold.co/600x400/e9d8a6/333333?text=مقاله" alt=""></a>
                <div class="p-6 flex-grow flex flex-col"><p class="text-sm font-semibold text-brand-primary mb-2">پایداری</p><h3 class="text-xl font-bold text-brand-dark mb-3 flex-grow"><a href="#" class="hover:text-brand-primary transition-colors">چگونه پایداری به مزیت رقابتی تبدیل می‌شود؟</a></h3><div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500"><span>مهندس اکبری</span><span><i class="far fa-clock ml-1"></i> ۶ دقیقه مطالعه</span></div></div>
            </article>
            <!-- Card 2 -->
            <article class="post-card animated-on-scroll bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                <a href="#" class="block post-card-image-wrapper h-56"><img class="post-card-image w-full h-full object-cover" src="https://placehold.co/600x400/212922/ffffff?text=مقاله" alt=""></a>
                <div class="p-6 flex-grow flex flex-col"><p class="text-sm font-semibold text-brand-primary mb-2">رویداد</p><h3 class="text-xl font-bold text-brand-dark mb-3 flex-grow"><a href="#" class="hover:text-brand-primary transition-colors">آنچه در نمایشگاه نساجی استانبول گذشت</a></h3><div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500"><span>تیم تحریریه</span><span><i class="far fa-clock ml-1"></i> ۴ دقیقه مطالعه</span></div></div>
            </article>
            <!-- Card 3 -->
            <article class="post-card animated-on-scroll bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                <a href="#" class="block post-card-image-wrapper h-56"><img class="post-card-image w-full h-full object-cover" src="https://placehold.co/600x400/8d99ae/ffffff?text=مقاله" alt=""></a>
                <div class="p-6 flex-grow flex flex-col"><p class="text-sm font-semibold text-brand-primary mb-2">تکنولوژی</p><h3 class="text-xl font-bold text-brand-dark mb-3 flex-grow"><a href="#" class="hover:text-brand-primary transition-colors">الیاف بازیافتی: انقلابی سبز در صنعت مد</a></h3><div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500"><span>سارا حسینی</span><span><i class="far fa-clock ml-1"></i> ۷ دقیقه مطالعه</span></div></div>
            </article>
            <article class="post-card animated-on-scroll bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                <a href="#" class="block post-card-image-wrapper h-56"><img class="post-card-image w-full h-full object-cover" src="https://placehold.co/600x400/e9d8a6/333333?text=مقاله" alt=""></a>
                <div class="p-6 flex-grow flex flex-col"><p class="text-sm font-semibold text-brand-primary mb-2">پایداری</p><h3 class="text-xl font-bold text-brand-dark mb-3 flex-grow"><a href="#" class="hover:text-brand-primary transition-colors">چگونه پایداری به مزیت رقابتی تبدیل می‌شود؟</a></h3><div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500"><span>مهندس اکبری</span><span><i class="far fa-clock ml-1"></i> ۶ دقیقه مطالعه</span></div></div>
            </article>
            <!-- Card 2 -->
            <article class="post-card animated-on-scroll bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                <a href="#" class="block post-card-image-wrapper h-56"><img class="post-card-image w-full h-full object-cover" src="https://placehold.co/600x400/212922/ffffff?text=مقاله" alt=""></a>
                <div class="p-6 flex-grow flex flex-col"><p class="text-sm font-semibold text-brand-primary mb-2">رویداد</p><h3 class="text-xl font-bold text-brand-dark mb-3 flex-grow"><a href="#" class="hover:text-brand-primary transition-colors">آنچه در نمایشگاه نساجی استانبول گذشت</a></h3><div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500"><span>تیم تحریریه</span><span><i class="far fa-clock ml-1"></i> ۴ دقیقه مطالعه</span></div></div>
            </article>
            <!-- Card 3 -->
            <article class="post-card animated-on-scroll bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                <a href="#" class="block post-card-image-wrapper h-56"><img class="post-card-image w-full h-full object-cover" src="https://placehold.co/600x400/8d99ae/ffffff?text=مقاله" alt=""></a>
                <div class="p-6 flex-grow flex flex-col"><p class="text-sm font-semibold text-brand-primary mb-2">تکنولوژی</p><h3 class="text-xl font-bold text-brand-dark mb-3 flex-grow"><a href="#" class="hover:text-brand-primary transition-colors">الیاف بازیافتی: انقلابی سبز در صنعت مد</a></h3><div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500"><span>سارا حسینی</span><span><i class="far fa-clock ml-1"></i> ۷ دقیقه مطالعه</span></div></div>
            </article>

        </div>
        <article class="mt-16 animated-on-scroll">
                    <a href="#" class="group block lg:grid lg:grid-cols-2 lg:gap-10 items-center bg-white rounded-2xl shadow-lg overflow-hidden transition-shadow hover:shadow-2xl">
                        <div class="relative">
                            <img class="w-full h-64 lg:h-full object-cover" src="https://placehold.co/800x600/69a297/ffffff?text=مقاله+ویژه" alt="تصویر مقاله ویژه">
                            <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all"></div>
                        </div>
                        <div class="p-8 lg:p-12">
                            <p class="text-sm font-semibold text-brand-primary mb-2">تکنولوژی</p>
                            <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark mb-4 group-hover:text-brand-primary transition-colors">
                                آینده نساجی هوشمند: چگونه اینترنت اشیاء (IoT) صنعت را متحول می‌کند؟
                            </h2>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                نساجی هوشمند دیگر یک مفهوم علمی-تخیلی نیست. با ادغام سنسورهای اینترنت اشیاء در پارچه‌ها، لباس‌هایی تولید می‌شوند که می‌توانند داده‌های سلامتی را پایش کرده، با محیط تعامل داشته باشند و...
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <img class="w-10 h-10 rounded-full ml-3" src="https://placehold.co/40x40/212922/ffffff?text=نویسنده" alt="نویسنده">
                                <div>
                                    <span class="font-semibold">دکتر رضایی</span>
                                    <span class="mx-2">·</span>
                                    <span>۲۸ مرداد ۱۴۰۴</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
        <nav class="mt-16 flex justify-center animated-on-scroll" aria-label="Pagination">
            <ul class="flex items-center gap-2">
                <!-- <li>
                    <a href="#" class="flex items-center justify-center w-12 h-12 text-gray-500 bg-white rounded-full shadow-sm hover:bg-gray-100 transition-colors">
                        <span class="sr-only">قبلی</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li> -->
                <li>
                    <a href="#" aria-current="page" class="flex items-center justify-center w-12 h-12 font-bold text-white bg-brand-primary rounded-full shadow-lg">1</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center w-12 h-12 font-bold text-gray-700 bg-white rounded-full shadow-sm hover:bg-gray-100 transition-colors">2</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center w-12 h-12 font-bold text-gray-700 bg-white rounded-full shadow-sm hover:bg-gray-100 transition-colors">3</a>
                </li>
                 <li>
                    <span class="flex items-center justify-center w-12 h-12 font-bold text-gray-500">...</span>
                </li>
                 <li>
                    <a href="#" class="flex items-center justify-center w-12 h-12 font-bold text-gray-700 bg-white rounded-full shadow-sm hover:bg-gray-100 transition-colors">10</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center w-12 h-12 text-gray-500 bg-white rounded-full shadow-sm hover:bg-gray-100 transition-colors">
                        <span class="sr-only">بعدی</span>
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            </ul>
        </nav>
        

    </div>
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

        // --- Category Filter Logic ---
        const filterButtons = document.querySelectorAll('.category-filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                // Add your filtering logic here
            });
        });

        // --- Staggered Loading Animation ---
        const postCards = document.querySelectorAll('.animated-on-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.05 });

        postCards.forEach((card, index) => {
             card.style.setProperty('--delay', `${index * 100}ms`);
            observer.observe(card);
        });

        // --- Combined Scroll Listener ---
        window.addEventListener('scroll', handleScroll);
        
        // Run on page load
        handleScroll();
    });
</script>

</body>
</html>
