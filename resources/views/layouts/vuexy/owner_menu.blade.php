<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html"><span class="brand-logo">

                </span>
                    <h2 class="text-brand-primary brand-text ">انجمن صنایع نساجی</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item{{ Route::currentRouteNamed('admin_dashboard')?' active':'' }}"><a class="d-flex align-items-center" href="{{ route('admin_dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">داشبورد</span></a>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">صفحات</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Invoice">شرکت ها</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('current_company')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('current_company') }}"><i data-feather="file"></i><span class="menu-item text-truncate" data-i18n="List">شرکت های ثبت شده</span></a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('pending_company')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('pending_company') }}"><i data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="Preview">در انتظار تایید</span></a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('admin_finance')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('admin_finance') }}"><i data-feather="dollar-sign"></i><span class="menu-item text-truncate" data-i18n="Edit">گزارش مالی</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">بلاگ</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('post_list')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('post_list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">لیست مطالب</span></a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('post_add')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('post_add') }}"><i data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">افزودن مطلب</span></a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('tags')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('tags') }}"><i data-feather="grid"></i><span class="menu-item text-truncate" data-i18n="Preview">تگ</span></a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('comments')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('comments') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">نظرات</span></a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('statistics')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('statistics') }}"><i data-feather="bar-chart-2"></i><span class="menu-item text-truncate" data-i18n="Edit">آمار</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed('contact')?' active':'' }}"><a class="d-flex align-items-center" href="{{ route('contact') }}"><i data-feather="message-circle"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">اطلاع رسانی</span></a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('settings')?' active':'' }}"><a class="d-flex align-items-center" href="{{ route('settings') }}"><i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps"></span>تنظیمات</a>
            </li>

        </ul>
    </div>
</div>
