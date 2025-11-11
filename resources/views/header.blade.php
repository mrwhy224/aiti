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
                        <a href="{{ route('home') }}">
                            <img src="logo-aiti-white.svg" alt="لوگو نظام مهندسی" class="logo-icon">
                        </a>
                        <div class="logo-text">
                             <a href="{{ route('home') }}">
                                <h1>انجمن صنایع نساجی ایران</h1>
                                <p>Association Of Iran Textile Industries </p>
                            </a>
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
</div>