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
        .share-btn {
            transition: all 0.2s ease;
        }
        .share-btn.telegram:hover { background-color: #2AABEE; color: white; }
        .share-btn.whatsapp:hover { background-color: #25D366; color: white; }
        .share-btn.linkedin:hover { background-color: #0A66C2; color: white; }
        .share-btn.link:hover { background-color: #334155; color: white; }
        .light-border {
            border:1px solid #e5e7eb;
        }
        #reading-progress-bar {
            position: fixed;
            top: 0px;
            /*right: 0.5rem;*/
            /*left: 0.5rem;*/
            height: 4px;
            background: #51818e;
            border-radius: 0 5px 5px 0;
            z-index: 9999;
            transition: width 0.1s ease-out;
        }
    </style>
</head>
<body>
<div id="reading-progress-bar"></div>
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

<!-- Main Article Content -->
<main class="main-content py-16 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-12">

            <!-- Main Content Column -->
            <div class="lg:col-span-8">
                <article id="article-body" class="bg-white p-6 sm:p-8 md:p-10 rounded-2xl shadow-lg light-border">
                    <!-- Post Header -->
                    <header class="mb-8 text-center bg-gray-50 p-8 rounded-xl" style="background-image: url('data:image/svg+xml,%3Csvg width=%2252%22 height=%2226%22 viewBox=%220 0 52 26%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23e5e7eb%22 fill-opacity=%220.4%22%3E%3Cpath d=%22M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414zM41 18c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm10 8h2v-2h-2v2zM3 18c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm10 8h2v-2h-2v2zM3 6h2V4h-2v2z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
                        <a href="#" class="text-sm font-semibold bg-brand-primary/10 text-brand-primary px-3 py-1 rounded-full mb-4 inline-block">تکنولوژی</a>
                        <h1 class="text-2xl lg:text-3xl font-extrabold text-brand-dark leading-tight">
                            آینده نساجی هوشمند: چگونه اینترنت اشیاء (IoT) صنعت را متحول می‌کند؟
                        </h1>
                        <div class="mt-6 flex items-center justify-center text-sm text-gray-500">
                            <img class="w-12 h-12 rounded-full ml-4" src="https://placehold.co/48x48/212922/ffffff?text=نویسنده" alt="نویسنده">
                            <div>
                                <p class="font-semibold text-gray-800">دکتر رضایی</p>
                                <p>۲۸ مرداد ۱۴۰۴ · زمان مطالعه: ۸ دقیقه</p>
                            </div>
                        </div>
                    </header>

                    <!-- Featured Image -->
                    <figure class="mb-8 overflow-hidden rounded-2xl">
                        <img class="w-full shadow-lg transition-transform duration-300 hover:scale-105" src="https://placehold.co/1200x600/69a297/ffffff?text=نساجی+هوشمند" alt="تصویر مقاله">
                    </figure>

                    <!-- Article Body -->
                    <div class="article-content">
                        <p>نساجی هوشمند دیگر یک مفهوم علمی-تخیلی نیست. با ادغام سنسورهای اینترنت اشیاء (IoT) در پارچه‌ها، لباس‌هایی تولید می‌شوند که می‌توانند داده‌های سلامتی را پایش کرده، با محیط تعامل داشته باشند و تجربه‌ای کاملاً جدید از پوشاک را برای ما به ارمغان بیاورند. این تحول، فرصت‌ها و چالش‌های جدیدی را پیش روی صنعت نساجی قرار داده است.</p>
                        <h2>کاربردها در حوزه سلامت و ورزش</h2>
                        <p>یکی از هیجان‌انگیزترین جنبه‌های نساجی هوشمند، کاربرد آن در حوزه سلامت است. لباس‌های ورزشی هوشمند می‌توانند ضربان قلب، میزان تعریق، و الگوی تنفس ورزشکاران را به صورت لحظه‌ای اندازه‌گیری کرده و داده‌ها را برای تحلیل به یک اپلیکیشن ارسال کنند. این اطلاعات به ورزشکاران و مربیان کمک می‌کند تا عملکرد خود را بهینه کرده و از آسیب‌دیدگی جلوگیری کنند.</p>
                        <blockquote>این فناوری نه تنها برای ورزشکاران حرفه‌ای، بلکه برای نظارت بر سلامت سالمندان یا بیماران نیز کاربرد دارد و می‌تواند به طور خودکار در مواقع اضطراری به مراکز درمانی هشدار دهد.</blockquote>
                        <h2>چالش‌های پیش رو</h2>
                        <p>با وجود تمام مزایا، چالش‌هایی نیز در مسیر توسعه نساجی هوشمند وجود دارد. برخی از این چالش‌ها عبارتند از:</p>
                        <ul>
                            <li><strong>دوام و قابلیت شستشو:</strong> سنسورها و قطعات الکترونیکی باید به گونه‌ای طراحی شوند که در برابر شستشو و استفاده روزمره مقاوم باشند.</li>
                            <li><strong>تأمین انرژی:</strong> یافتن راهی برای تأمین انرژی پایدار برای سنسورها، چه از طریق باتری‌های کوچک و چه با استفاده از انرژی حرکتی بدن، یک چالش کلیدی است.</li>
                            <li><strong>امنیت داده‌ها:</strong> حفاظت از اطلاعات شخصی و حساسی که توسط این لباس‌ها جمع‌آوری می‌شود، از اهمیت بالایی برخوردار است.</li>
                        </ul>
                        <p>در نهایت، با پیشرفت فناوری و کاهش هزینه‌ها، می‌توان انتظار داشت که نساجی هوشمند به بخشی جدایی‌ناپذیر از زندگی روزمره ما تبدیل شود و تعامل ما با دنیای اطراف را برای همیشه تغییر دهد.</p>
                    </div>

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
                        <!-- Author Box -->
                        <div class="bg-gradient-to-r from-brand-primary/10 to-brand-accent/10 border p-6 rounded-2xl flex items-start gap-5">
                            <img class="w-16 h-16 rounded-full" src="https://placehold.co/64x64/212922/ffffff?text=نویسنده" alt="نویسنده">
                            <div>
                                <p class="text-sm text-gray-500">نویسنده</p>
                                <h4 class="font-bold text-xl text-brand-dark mt-1">دکتر رضایی</h4>
                                <p class="text-gray-600 mt-2 leading-relaxed text-sm">متخصص حوزه تکنولوژی‌های نوین در صنعت نساجی و عضو هیئت علمی دانشگاه صنعتی امیرکبیر. علاقه‌مند به تحقیق در زمینه پارچه‌های هوشمند و منسوجات پایدار.</p>
                            </div>
                        </div>
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
                    <!-- Related Posts -->
                    <div class="widget">
                        <h3 class="widget-title">مقالات مرتبط</h3>
                        <ul class="space-y-4">
                            <li>
                                <a href="#" class="group flex items-start gap-4">
                                    <img src="https://placehold.co/80x80/50808e/ffffff" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" alt="">
                                    <div>
                                        <p class="font-semibold text-gray-800 group-hover:text-brand-primary transition-colors leading-tight">تحلیل بازار پنبه در سال ۲۰۲۵</p>
                                        <p class="text-xs text-gray-500 mt-1">۲۵ مرداد ۱۴۰۴</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex items-start gap-4">
                                    <img src="https://placehold.co/80x80/e9d8a6/333333" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" alt="">
                                    <div>
                                        <p class="font-semibold text-gray-800 group-hover:text-brand-primary transition-colors leading-tight">۵ روش برای کاهش مصرف آب در رنگرزی</p>
                                        <p class="text-xs text-gray-500 mt-1">۲۰ مرداد ۱۴۰۴</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Categories -->
                    <div class="widget">
                        <h3 class="widget-title">دسته‌بندی‌ها</h3>
                        <ul class="space-y-3">
                            <li><a href="#" class="flex justify-between items-center text-gray-700 hover:text-brand-primary transition-all group"><span><i class="fas fa-chart-line text-brand-primary/50 ml-2 group-hover:text-brand-primary"></i>بازار</span><span class="text-xs bg-gray-100 px-2 py-1 rounded">۵</span></a></li>
                            <li><a href="#" class="flex justify-between items-center text-gray-700 hover:text-brand-primary transition-all group"><span><i class="fas fa-cogs text-brand-primary/50 ml-2 group-hover:text-brand-primary"></i>تکنولوژی</span><span class="text-xs bg-gray-100 px-2 py-1 rounded">۸</span></a></li>
                            <li><a href="#" class="flex justify-between items-center text-gray-700 hover:text-brand-primary transition-all group"><span><i class="fas fa-leaf text-brand-primary/50 ml-2 group-hover:text-brand-primary"></i>پایداری</span><span class="text-xs bg-gray-100 px-2 py-1 rounded">۳</span></a></li>
                            <li><a href="#" class="flex justify-between items-center text-gray-700 hover:text-brand-primary transition-all group"><span><i class="fas fa-calendar-alt text-brand-primary/50 ml-2 group-hover:text-brand-primary"></i>رویدادها</span><span class="text-xs bg-gray-100 px-2 py-1 rounded">۱۲</span></a></li>
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
                    <!-- Tags Cloud -->
                    <div class="widget">
                        <h3 class="widget-title">برچسب ها</h3>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full hover:bg-brand-primary hover:text-white hover:border-brand-primary transition-colors">نساجی هوشمند</a>
                            <a href="#" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full hover:bg-brand-primary hover:text-white hover:border-brand-primary transition-colors">IoT</a>
                            <a href="#" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full hover:bg-brand-primary hover:text-white hover:border-brand-primary transition-colors">پایداری</a>
                            <a href="#" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full hover:bg-brand-primary hover:text-white hover:border-brand-primary transition-colors">رنگرزی</a>
                            <a href="#" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full hover:bg-brand-primary hover:text-white hover:border-brand-primary transition-colors">بازار جهانی</a>
                            <a href="#" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full hover:bg-brand-primary hover:text-white hover:border-brand-primary transition-colors">پنبه</a>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
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
