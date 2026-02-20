<header class="sigma_header header-3 {{ Route::currentRouteName() === 'frontend.index' ? 'can-sticky' : '' }}">
    <div class="sigma_header-middle">
    <nav class="navbar">

        <div class="sigma_logo-wrapper">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">
            <img src="{{ asset('frontend/assets/img/generated-image (1).png') }}" alt="logo">
        </a>
        </div>

        <!-- Menu -->
        <div class="sigma_header-inner">
        <div class="sigma_header-top">
            <div class="sigma_header-top-inner">
            <!-- FIX: Hide top links on smaller screens for better responsiveness -->
            <ul class="sigma_header-top-links d-none d-lg-flex">
                <li class="menu-item"> <a href="tel:+123456789"> <i class="fal fa-phone"></i> (+1) 123 456 7890</a> </li>
                <li class="menu-item"> <a href="mailto:info@example.com"> <i class="fal fa-envelope"></i> info@bengalihinduunity.com</a> </li>
            </ul>
            <!-- FIX: Hide top links on smaller screens for better responsiveness -->
            <ul class="sigma_header-top-links d-none d-lg-flex">
                @auth
                    <!-- User Profile Dropdown -->
                    <li class="menu-item menu-item-has-children">
                        <a href="#" class="d-flex align-items-center">
                            <img src="{{ auth()->user()->profile_pic ? asset('backend/uploads/user/' . auth()->user()->profile_pic) : asset('frontend/assets/img/man-avatar.png') }}"
                                 alt="Profile"
                                 style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; margin-right: 8px;">
                            <span>{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{ route('admin.dashboard') }}" target="_blank">
                                    <i class="fal fa-tachometer-alt"></i> Go to Admin Panel
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fal fa-sign-out-alt"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="d-flex align-items-center">
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="d-flex align-items-center">
                        <a href="{{ route('login') }}" class="m-0"> Login </a>
                    </li>
                @endauth
            </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center justify-content-lg-between">
            <!-- FIX: Hide desktop navbar on screens smaller than large (992px) -->
            <ul class="navbar-nav d-none d-lg-flex">
            <li class="menu-item"> <a href="{{ route('frontend.index') }}">Home</a> </li>
            <li class="menu-item"> <a href="about.html">About Us</a> </li>
            <li class="menu-item"> <a href="{{ route('frontend.temples') }}">Temples</a> </li>
            <li class="menu-item"> <a href="{{ route('frontend.organizations') }}">Organizations</a> </li>
            <li class="menu-item"> <a href="{{ route('frontend.events') }}">Events</a> </li>
            <li class="menu-item"> <a href="{{ route('frontend.jobs') }}">Jobs</a> </li>
            <li class="menu-item"> <a href="{{ route('frontend.news') }}">News</a> </li>
            <li class="menu-item"> <a href="volunteers.html">Our Team</a> </li>
            <li class="menu-item"> <a href="{{ route('frontend.contact') }}">Contact</a> </li>
            </ul>
        </div>
        </div>

        <!-- Controls -->
        <div class="sigma_header-controls style-2">
        <a href="donation.html" class="sigma_btn-custom d-none d-lg-block"> Donate Here</a>
        <ul class="sigma_header-controls-inner">
            <!-- Mobile Toggler -->
            <li class="aside-toggler style-2 aside-trigger-left">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </li>
        </ul>
        </div>

    </nav>
    </div>
</header>
