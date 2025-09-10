<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            @auth
                @php
                    $new_notifications = count(Auth::user()->unreadNotifications);
                @endphp
            @endauth

            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i>@if($new_notifications)<span class="badge rounded-pill bg-danger badge-up">{{ $new_notifications }}</span>@endif</a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">اعلان ها</h4>
                            @if($new_notifications)<div class="badge rounded-pill badge-light-primary">{{ $new_notifications }} پیام جید</div>@endif
                        </div>
                        @if(!$new_notifications)
                                <div class="list-item d-flex align-items-start mb-2 text-center">
                                    <div class="list-item-body flex-grow-1">
                                        <small class="notification-text">اعلان جدیدی وجود ندارد</small>
                                    </div>

                                </div>@endif
                            
                    </li>
                    <li class="scrollable-container media-list">
                        @foreach (Auth::user()->notifications as $notification)
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        @if($notification->data['type']=='USER')<div class="avatar bg-white" style="color: #6BA398"><i data-feather="message-circle" style="width: 2rem;height: 2rem"></i></div>
                                        @elseif($notification->data['type']=='SYSTEM')<div class="avatar bg-white" style="color: #6BA398;"><div class="avatar-content" style="font-size: 2rem;">🤖</div></div>@endif
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">@if($notification->data['type']=='SYSTEM')<span class="badge badge-light-secondary">پیام سیستم</span> @endif{{ $notification->data['message']['title'] }}</span></p>

                                        @if($notification->data['type']=='USER')<small class="notification-text"> برای مشاهده پیام کلیک کنید.</small>
                                        @elseif($notification->data['type']=='SYSTEM')<small class="notification-text">برای بررسی بیتشر کلیک کنید</small>@endif
                                    </div>
                                    <small>{{ $notification->created_at->diffForHumans() }}</small>

                                </div>
                            </a>
                        @endforeach
                        

                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">مشاهده همه پیام ها</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{  Auth::user()->name }}</span><span class="user-status">{{ Auth::user()->roles->first()->display_name }}</span></div><span class="avatar bg-white" style="color: #6BA398;border: 3px solid #6BA398"><i data-feather="user" style="width: 2.5rem;height: 2.5rem"></i><span class="avatar-status-online"></span></span> </a> <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="page-profile.html"><i class="me-50" data-feather="user"></i> نمایه</a> <div class="dropdown-divider"></div><a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i> تنظیمات </a> <a class="dropdown-item logout" href="{{ route('logout') }}"><i class="me-50" data-feather="power"></i> خروج</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
