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
            <li class="nav-item{{ Route::currentRouteNamed('dashboard')?' active':'' }}"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">داشبورد</span></a>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">صفحات</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">مدریت پرونده</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('agents')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('agents') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">مدریت نماینده ها</span></a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('upload_documents')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('upload_documents') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">اپلود مدارک</span></a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('company_profile')?'active':'' }}"><a class="d-flex align-items-center" href="{{ route('company_profile') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">نمایه شرکت</span></a>
                    </li>
                </ul>
            </li>


            <li class="nav-item {{ Route::currentRouteNamed('company_finance')?' active':'' }}"><a class="d-flex align-items-center" href="{{ route('company_finance') }}"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">امور مالی</span></a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('company_members')?' active':'' }}"><a class="d-flex align-items-center" href="{{ route('company_members') }}"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">اعضای شرکت</span></a>
            </li>

        </ul>
    </div>
</div>
