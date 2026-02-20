<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('admin.dashboard') }}" class="brand-link d-flex align-items-center" style="gap: 10px;">
        <img src="{{ asset('backend/dist/img/logo_om.png') }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8; width: 36px; height: 36px; object-fit: cover;">
        <span class="brand-text font-weight-light" style="font-size: 1.2rem;">RR - Admin</span>
    </a>

    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column mb-2" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview {{ request()->routeIs('admin.user.profile*') || request()->routeIs('admin.user.change.password') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.user.profile*') || request()->routeIs('admin.user.change.password') ? 'active' : '' }}">
                    <img src="{{ auth()->user()->profile_pic ? asset('backend/uploads/user/' . auth()->user()->profile_pic) : asset('frontend/assets/img/man-avatar.png') }}"
                        class="img-circle elevation-2 mr-2" alt="User Image"
                        style="width: 34px; height: 34px; object-fit: cover;">
                    <p class="d-flex align-items-center justify-content-between w-100" style="margin: 0;">
                        <span>{{ \Illuminate\Support\Str::limit(auth()->user()->name, 15, '...') }}</span>
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="padding-left: 15px;">
                    <li class="nav-item">
                        <a href="{{ route('admin.user.profile') }}" class="nav-link {{ request()->routeIs('admin.user.profile') && !request()->routeIs('admin.user.profile.edit') ? 'active' : '' }}">
                            <i class="far fa-user nav-icon"></i>
                            <p>My Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.profile.edit') }}" class="nav-link {{ request()->routeIs('admin.user.profile.edit') ? 'active' : '' }}">
                            <i class="fas fa-user-edit nav-icon"></i>
                            <p>Edit Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.change.password') }}" class="nav-link {{ request()->routeIs('admin.user.change.password') ? 'active' : '' }}">
                            <i class="fas fa-key nav-icon"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                    @if(Auth::check() && Auth::user()->is_student)
                    <li class="nav-item">
                        <a href="{{ route('admin.user.my.career') }}" class="nav-link {{ request()->routeIs('admin.user.my.career') ? 'active' : '' }}">
                            <i class="fas fa-briefcase nav-icon"></i>
                            <p>My Career</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        </ul>
        @include('backend.includes.sidebar')
    </div>
</aside>
