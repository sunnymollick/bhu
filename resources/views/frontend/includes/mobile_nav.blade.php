<aside class="sigma_aside sigma_aside-left">
    <a class="navbar-brand" href="{{ route('frontend.index') }}"> <img src="{{ asset('frontend/assets/img/rr_logo_resized.jpg') }}" alt="logo"> </a>
    <ul>
    <li class="menu-item {{ Request::is('/') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.index') }}">Home</a> </li>
    <li class="menu-item {{ Request::is('about') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.about') }}">About Us</a> </li>
    <li class="menu-item {{ Request::is('temples') || Request::is('temples/*') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.temples') }}">Temples</a> </li>
    <li class="menu-item {{ Request::is('organizations') || Request::is('organizations/*') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.organizations') }}">Organizations</a> </li>
    <li class="menu-item {{ Request::is('events') || Request::is('events/*') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.events') }}">Events</a> </li>
    <li class="menu-item {{ Request::is('jobs') || Request::is('jobs/*') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.jobs') }}">Jobs</a> </li>
    <li class="menu-item {{ Request::is('news') || Request::is('news/*') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.news') }}">News</a> </li>
    <li class="menu-item {{ Request::is('teams') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.teams') }}">Our Team</a> </li>
    <li class="menu-item {{ Request::is('contact') ? 'current-menu-item' : '' }}"> <a href="{{ route('frontend.contact') }}">Contact</a> </li>

    @auth
        <li class="menu-item" style="border-top: 1px solid #ddd; margin-top: 10px; padding-top: 10px;">
            <a href="#" style="display: flex; align-items: center; padding: 10px 0;">
                <img src="{{ auth()->user()->profile_pic ? asset('backend/uploads/user/' . auth()->user()->profile_pic) : asset('frontend/assets/img/man-avatar.png') }}"
                     alt="Profile"
                     style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                <span>{{ auth()->user()->name }}</span>
            </a>
        </li>
        <li class="menu-item mobile-auth-item">
            <a href="{{ route('admin.dashboard') }}" target="_blank"><i class="fal fa-tachometer-alt"></i> <span>Go to Dashboard</span></a>
        </li>
        <li class="menu-item mobile-auth-item">
            <a href="#" onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                <i class="fal fa-sign-out-alt"></i> <span>Logout</span>
            </a>
            <form id="mobile-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @else
        <li class="menu-item {{ Request::is('register') ? 'current-menu-item' : '' }}" style="border-top: 1px solid #ddd; margin-top: 10px; padding-top: 10px;">
            <a href="{{ route('register') }}">Register</a>
        </li>
        <li class="menu-item {{ Request::is('login') ? 'current-menu-item' : '' }}">
            <a href="{{ route('login') }}">Login</a>
        </li>
    @endauth
    </ul>
</aside>
<div class="sigma_aside-overlay aside-trigger-left"></div>
