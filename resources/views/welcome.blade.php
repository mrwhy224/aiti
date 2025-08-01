<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-primary': '#69a297', // یک رنگ آبی-سبز تیره
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

</head>
<style>
    body {
        direction: rtl;
        margin: 0;
        font-family: 'Vazirmatn', sans-serif;
        background-color: #fdfdfd;
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
        padding: 15px 0;
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
        width: 100px;
        height: 100px;
        border-radius: 12px;
        padding: 4px;
        object-fit: cover;
    }

    .logo-text {
        margin-right: 15px;
    }

    .logo-text h1 {
        font-size: 19px;
        font-weight: 700;
        margin: 0 0 4px 0;
        color: #ddd8c4;
    }

    .logo-text p {
        font-size: 12px;
        margin: 0;
        color: #fff;
        letter-spacing: 0.5px;
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
        transition: color 0.3s ease;
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
        transition: color 0.3s ease;
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
        transition: background-color 0.3s ease;
        white-space: nowrap; /* جلوگیری از شکستن متن دکمه */
    }

    .cta-button:hover {
        background-color: #ddd8c4;
        color: #212922;
    }

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
</style>
<body>
<div class="header-hero-wrapper">
    <header class="site-header">
        <!-- نوار بالایی هدر -->
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
                <!-- بخش راست: منوی ثابت -->
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

        <!-- بخش اصلی هدر -->
        <div class="main-header">
            <div class="container">
                <!-- این بخش در سمت راست قرار می‌گیرد -->
                <div class="header-right">
                    <div class="logo-area">
                        <!-- لوگوی خود را در اینجا قرار دهید -->
                        <img src="logo-aiti-white.svg" alt="لوگو نظام مهندسی" class="logo-icon">
                        <div class="logo-text">
                            <h1>انجمن صنایع نساجی ایران</h1>
                            <p>Association Of Iran Textile Industries </p>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul>
                            <!-- منوی بازشو -->
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
                <!-- این بخش در سمت چپ قرار می‌گیرد -->
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

    <main>
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1>پیشرو در نوآوری و توسعه صنعت نساجی</h1>
                    <p>ما در انجمن تخصصی نساجی، با ایجاد پل ارتباطی میان متخصصان، صنعتگران و دانشگاهیان، برای رشد و پویایی این صنعت تلاش می‌کنیم.</p>
                    <button class="hero-cta-button">درخواست مشاوره رایگان</button>
                </div>
                <div class="hero-animation">
                    <svg class="animated-logo" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <!-- Loom Frame -->
                        <g class="loom-frame">
                            <rect x="10" y="10" width="180" height="15" rx="2"></rect>
                            <rect x="10" y="175" width="180" height="15" rx="2"></rect>
                        </g>

                        <!-- Static Vertical "Warp" Threads -->
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

                        <!-- Woven "Weft" Threads -->
                        <g id="carpet-weave">
                            <!-- Row 8 (Bottom) -->
                            <path class="weft-thread row-8" stroke="var(--weft-color-1)" d="M25 160 H 175"></path>
                            <!-- Row 7 -->
                            <path class="weft-thread row-7" stroke="var(--weft-color-2)" d="M25 150 H 70 L 90 140 L 110 150 L 130 140 L 175 150"></path>
                            <!-- Row 6 -->
                            <path class="weft-thread row-6" stroke="var(--weft-color-3)" d="M25 140 H 175"></path>
                            <!-- Row 5 -->
                            <path class="weft-thread row-5" stroke="var(--weft-color-1)" d="M25 130 H 175"></path>
                            <!-- Row 4 -->
                            <path class="weft-thread row-4" stroke="var(--weft-color-2)" d="M25 120 H 175"></path>
                            <!-- Row 3 -->
                            <path class="weft-thread row-3" stroke="var(--weft-color-3)" d="M25 110 H 50 L 70 100 L 90 110 L 110 100 L 130 110 L 150 100 L 175 110"></path>
                            <!-- Row 2 -->
                            <path class="weft-thread row-2" stroke="var(--weft-color-2)" d="M25 100 H 175"></path>
                            <!-- Row 1 (Top) -->
                            <path class="weft-thread row-1" stroke="var(--weft-color-1)" d="M25 90 H 175"></path>
                        </g>

                        <!-- Animated Comb/Beater -->
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
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/313c4e/ffffff?text=خبر+۱)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">تحول در الیاف پایدار</h3>
                    <p class="text-sm opacity-80 mt-1">نسل جدیدی از مواد اولیه سازگار با محیط زیست معرفی شد.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/c0a062/ffffff?text=خبر+۲)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">همکاری با دانشگاه صنعتی</h3>
                    <p class="text-sm opacity-80 mt-1">امضای تفاهم‌نامه برای پروژه‌های مشترک تحقیقاتی.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/5a677d/ffffff?text=خبر+۳)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">نمایشگاه نساجی پیش‌رو</h3>
                    <p class="text-sm opacity-80 mt-1">ثبت‌نام برای حضور در بزرگترین رویداد سال آغاز شد.</p>
                </div>
            </div>
            <!-- Slide 4 -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/4a5568/ffffff?text=خبر+۴)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">گزارش بازار جهانی</h3>
                    <p class="text-sm opacity-80 mt-1">تحلیل روندها و پیش‌بینی آینده صنعت پوشاک.</p>
                </div>
            </div>
            <!-- Slide 5 -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/718096/ffffff?text=خبر+۵)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">کارگاه چاپ دیجیتال</h3>
                    <p class="text-sm opacity-80 mt-1">فرصتی برای یادگیری تکنیک‌های نوین چاپ پارچه.</p>
                </div>
            </div>
            <!-- Duplicated Slides for seamless loop -->
            <!-- Slide 6 (copy of 1) -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/313c4e/ffffff?text=خبر+۱)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">تحول در الیاف پایدار</h3>
                    <p class="text-sm opacity-80 mt-1">نسل جدیدی از مواد اولیه سازگار با محیط زیست معرفی شد.</p>
                </div>
            </div>
            <!-- Slide 7 (copy of 2) -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/c0a062/ffffff?text=خبر+۲)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">همکاری با دانشگاه صنعتی</h3>
                    <p class="text-sm opacity-80 mt-1">امضای تفاهم‌نامه برای پروژه‌های مشترک تحقیقاتی.</p>
                </div>
            </div>
            <!-- Slide 8 (copy of 3) -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/5a677d/ffffff?text=خبر+۳)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">نمایشگاه نساجی پیش‌رو</h3>
                    <p class="text-sm opacity-80 mt-1">ثبت‌نام برای حضور در بزرگترین رویداد سال آغاز شد.</p>
                </div>
            </div>
            <!-- Slide 9 (copy of 4) -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/4a5568/ffffff?text=خبر+۴)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">گزارش بازار جهانی</h3>
                    <p class="text-sm opacity-80 mt-1">تحلیل روندها و پیش‌بینی آینده صنعت پوشاک.</p>
                </div>
            </div>
            <!-- Slide 10 (copy of 5) -->
            <div class="swiper-slide" style="background-image:url(https://placehold.co/400x550/718096/ffffff?text=خبر+۵)">
                <div class="slide-content">
                    <h3 class="font-bold text-xl">کارگاه چاپ دیجیتال</h3>
                    <p class="text-sm opacity-80 mt-1">فرصتی برای یادگیری تکنیک‌های نوین چاپ پارچه.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Tabbed "What We Do" Section -->
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
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h4 class="font-bold text-lg text-brand-dark mb-2">فصلنامه "تار و پود" - شماره جدید</h4>
                        <p class="text-slate-600">مقالات تحلیلی در مورد بازار، تکنولوژی و آینده صنعت نساجی.</p>
                        <a href="#" class="text-brand-primary font-semibold mt-4 inline-block">دانلود &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="grid grid-cols-1 lg:grid-cols-5 min-h-[70vh] items-center">

    <!-- === Left Column: Shape Container (1/4 width) === -->
    <!-- This column is hidden on mobile/tablet (lg:block) and acts as a positioning context -->
    <div class="hidden lg:block h-full relative overflow-hidden lg:col-span-1">
        <!-- The curved shape element, positioned absolutely BUT relative to its parent grid cell -->
        <div class="absolute top-1/2 h-[70vh] w-[80vh] -translate-y-1/2 right-0 translate-x-3/4 rounded-[50%] bg-slate-800">
            <!-- Shape only -->
        </div>
    </div>

    <!-- === Right Column: Content and Slider (3/4 width) === -->
    <!-- This column is always visible -->
    <div class="w-full p-8 sm:p-12 md:p-16 lg:col-span-4">
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
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-slate-200">
                            <img src="https://placehold.co/600x400/16a34a/ffffff?text=خبر+۲" class="w-full h-56 object-cover" alt="خبر ۲">
                            <div class="p-6 flex flex-col justify-center">
                                <span class="text-sm font-semibold text-rose-600">رویداد</span>
                                <h3 class="font-bold text-xl mb-2 text-gray-900">تحلیل آخرین رویدادهای ورزشی هفته</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-base mb-4">
                                    این طرح تفکیک‌شده به محتوای متنی فضای بیشتری می‌دهد و برای خلاصه‌های طولانی‌تر مناسب است.
                                </p>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    <span>۱۴ تیر ۱۴۰۳</span> &bull; <span>نویسنده: تیم تحریریه</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-slate-200">
                            <img src="https://placehold.co/600x400/16a34a/ffffff?text=خبر+۲" class="w-full h-56 object-cover" alt="خبر ۲">
                            <div class="p-6 flex flex-col justify-center">
                                <span class="text-sm font-semibold text-rose-600">رویداد</span>
                                <h3 class="font-bold text-xl mb-2 text-gray-900">تحلیل آخرین رویدادهای ورزشی هفته</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-base mb-4">
                                    این طرح تفکیک‌شده به محتوای متنی فضای بیشتری می‌دهد و برای خلاصه‌های طولانی‌تر مناسب است.
                                </p>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    <span>۱۴ تیر ۱۴۰۳</span> &bull; <span>نویسنده: تیم تحریریه</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-slate-200">
                            <img src="https://placehold.co/600x400/16a34a/ffffff?text=خبر+۲" class="w-full h-56 object-cover" alt="خبر ۲">
                            <div class="p-6 flex flex-col justify-center">
                                <span class="text-sm font-semibold text-rose-600">رویداد</span>
                                <h3 class="font-bold text-xl mb-2 text-gray-900">تحلیل آخرین رویدادهای ورزشی هفته</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-base mb-4">
                                    این طرح تفکیک‌شده به محتوای متنی فضای بیشتری می‌دهد و برای خلاصه‌های طولانی‌تر مناسب است.
                                </p>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    <span>۱۴ تیر ۱۴۰۳</span> &bull; <span>نویسنده: تیم تحریریه</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-slate-200">
                            <img src="https://placehold.co/600x400/16a34a/ffffff?text=خبر+۲" class="w-full h-56 object-cover" alt="خبر ۲">
                            <div class="p-6 flex flex-col justify-center">
                                <span class="text-sm font-semibold text-rose-600">رویداد</span>
                                <h3 class="font-bold text-xl mb-2 text-gray-900">تحلیل آخرین رویدادهای ورزشی هفته</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-base mb-4">
                                    این طرح تفکیک‌شده به محتوای متنی فضای بیشتری می‌دهد و برای خلاصه‌های طولانی‌تر مناسب است.
                                </p>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    <span>۱۴ تیر ۱۴۰۳</span> &bull; <span>نویسنده: تیم تحریریه</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-slate-200">
                            <img src="https://placehold.co/600x400/16a34a/ffffff?text=خبر+۲" class="w-full h-56 object-cover" alt="خبر ۲">
                            <div class="p-6 flex flex-col justify-center">
                                <span class="text-sm font-semibold text-rose-600">رویداد</span>
                                <h3 class="font-bold text-xl mb-2 text-gray-900">تحلیل آخرین رویدادهای ورزشی هفته</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-base mb-4">
                                    این طرح تفکیک‌شده به محتوای متنی فضای بیشتری می‌دهد و برای خلاصه‌های طولانی‌تر مناسب است.
                                </p>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    <span>۱۴ تیر ۱۴۰۳</span> &bull; <span>نویسنده: تیم تحریریه</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="w-1/2 bg-slate-800 rounded-2xl shadow-2xl p-8 md:p-10 border-t-4 border-cyan-400 mx-auto my-[10rem]">

    <!-- Icon Wrapper -->
    <div class="flex justify-center mb-6">
        <div class="bg-cyan-400/10 p-4 rounded-full">
            <svg class="w-10 h-10 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
    </div>

    <!-- Title -->
    <h2 class="text-3xl font-bold text-white text-center mb-3">
        به جامعه ما بپیوندید
    </h2>

    <!-- Description -->
    <p class="text-slate-400 text-center leading-relaxed mb-8">
        با عضویت در انجمن به منابع انحصاری، شبکه متخصصان و آخرین فرصت‌های صنعت دسترسی پیدا کنید.
    </p>

    <a href="#" class="block w-1/2 mx-auto text-center bg-cyan-400 hover:bg-cyan-500 text-slate-900 font-bold py-3 px-6 rounded-lg text-lg transition-all duration-300 transform hover:scale-105">
        هم اکنون عضو شوید
    </a>

</div>

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
                    <span>محصولات آژانس ساتیفای:</span>
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
                    <img src="https://placehold.co/150x50/ffffff/112227?text=Sitify" alt="Sitify Logo" class="footer-logo">
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



</body>
<script>
    // Swiper Initialization
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3.5,
        spaceBetween: 50,
        loop: true,
        loopedSlides: 6,
        observer: true, // Re-initializes Swiper when the container is mutated
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
        slidesPerView: 4,
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
    });


    document.addEventListener('DOMContentLoaded', () => {
        // --- Reveal on Scroll ---
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
    });

</script>
</html>
