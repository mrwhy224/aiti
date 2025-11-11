@include('layouts.vuexy.header')
@include('layouts.vuexy.footer')
    <!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl">
@yield('header')
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
@include('layouts.vuexy.navbar')

@if(Auth::user()->roles->first()->role_group=='site_owner')@include('layouts.vuexy.owner_menu')
@elseif(Auth::user()->roles->first()->role_group=='company_member')@include('layouts.vuexy.company_menu')
@elseif(Auth::user()->roles->first()->role_group=='default')@include('layouts.vuexy.default_menu')@endif

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
@yield('page_footer')
@yield('script')
</body>
</html>
