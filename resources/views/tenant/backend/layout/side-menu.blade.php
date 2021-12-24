<!--aside open-->
<div class="app-sidebar app-sidebar2">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{ route('tenant.home') }}">
            <img src="{{ URL::asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo"
                alt="Covido logo">
            <img src="{{ URL::asset('assets/images/brand/logo1.png') }}" class="header-brand-img dark-logo"
                alt="Covido logo">
            <img src="{{ URL::asset('assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo"
                alt="Covido logo">
            <img src="{{ URL::asset('assets/images/brand/favicon1.png') }}" class="header-brand-img darkmobile-logo"
                alt="Covido logo">
        </a>
    </div>
</div>
<aside class="app-sidebar app-sidebar3">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{ URL::asset('assets/images/users/16.jpg') }}" alt="user-img"
                    class="avatar-xl rounded-circle mb-1">
            </div>
            <div class="user-info">
                <h5 class=" mb-1 font-weight-bold">{{ Auth::user()->name }}</h5>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li class="slide">
            <a class="side-menu__item" href="{{ route('tenant.home') }}">
                {{-- <a class="side-menu__item" href="#"> --}}
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="side-menu__label">Dashboard</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                    <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                </svg>
                <span class="side-menu__label">Setting</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{ route('tenant.profile') }}" class="slide-item">Profile</a></li>
                {{-- <li><a href="#" class="slide-item">Profile</a></li> --}}
            </ul>
        </li>
    </ul>
    <div class="app-sidebar-help">
        <div class="dropdown text-center">
            <div class="help d-flex">
                <a href="{{ url('/' . ($page = '#')) }}" class="nav-link p-0 help-dropdown" data-toggle="dropdown">
                    <span class="font-weight-bold">Help Info</span> <i class="fa fa-angle-down ml-2"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-4">
                    <div class="border-bottom pb-3">
                        <h4 class="font-weight-bold">Help</h4>
                        <a class="text-primary d-block" href="{{ url('/' . ($page = '#')) }}">Knowledge base</a>
                        <a class="text-primary d-block" href="{{ url('/' . ($page = '#')) }}">Contact@info.com</a>
                        <a class="text-primary d-block" href="{{ url('/' . ($page = '#')) }}">88 8888 8888</a>
                    </div>
                    <div class="border-bottom pb-3 pt-3 mb-3">
                        <p class="mb-1">Your Fax Number</p>
                        <a class="font-weight-bold" href="{{ url('/' . ($page = '#')) }}">88 8888 8888</a>
                    </div>
                    <a class="text-primary" href="{{ url('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        Logout
                    </a>
                    <form action="{{ route('logout') }}" method="post" id="logoutForm">@csrf</form>
                </div>
                {{-- <div class="ml-auto">
									<a class="nav-link icon p-0" href="{{ url('/' . $page='#') }}">
										<svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path opacity=".3" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z"></path><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z"></path></svg>
										<span class="pulse "></span>
									</a>
								</div> --}}
            </div>
        </div>
    </div>
</aside>
<!--aside closed-->
