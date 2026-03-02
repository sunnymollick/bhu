<aside class="sigma_aside sigma_aside-left">
    <a class="navbar-brand" href="<?php echo e(route('frontend.index')); ?>"> <img src="<?php echo e(asset('frontend/assets/img/rr_logo_resized.jpg')); ?>" alt="logo"> </a>
    <ul>
    <li class="menu-item"> <a href="<?php echo e(route('frontend.index')); ?>">Home</a> </li>
    <li class="menu-item"> <a href="<?php echo e(route('frontend.about')); ?>">About Us</a> </li>
    <li class="menu-item"> <a href="<?php echo e(route('frontend.temples')); ?>">Temples</a> </li>
    <li class="menu-item"> <a href="<?php echo e(route('frontend.organizations')); ?>">Organizations</a> </li>
    <li class="menu-item"> <a href="<?php echo e(route('frontend.events')); ?>">Events</a> </li>
    <li class="menu-item"> <a href="<?php echo e(route('frontend.jobs')); ?>">Jobs</a> </li>
    <li class="menu-item"> <a href="<?php echo e(route('frontend.teams')); ?>">Our Team</a> </li>
    <li class="menu-item"> <a href="<?php echo e(route('frontend.contact')); ?>">Contact</a> </li>

    <?php if(auth()->guard()->check()): ?>
        <li class="menu-item" style="border-top: 1px solid #ddd; margin-top: 10px; padding-top: 10px;">
            <a href="#" style="display: flex; align-items: center; padding: 10px 0;">
                <img src="<?php echo e(auth()->user()->profile_pic ? asset('backend/uploads/user/' . auth()->user()->profile_pic) : asset('frontend/assets/img/man-avatar.png')); ?>"
                     alt="Profile"
                     style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                <span><?php echo e(auth()->user()->name); ?></span>
            </a>
        </li>
        <li class="menu-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>" target="_blank"><i class="fal fa-tachometer-alt"></i> Go to Admin Panel</a>
        </li>
        <li class="menu-item">
            <a href="#" onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                <i class="fal fa-sign-out-alt"></i> Logout
            </a>
            <form id="mobile-logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        </li>
    <?php else: ?>
        <li class="menu-item" style="border-top: 1px solid #ddd; margin-top: 10px; padding-top: 10px;">
            <a href="<?php echo e(route('register')); ?>">Register</a>
        </li>
        <li class="menu-item">
            <a href="<?php echo e(route('login')); ?>">Login</a>
        </li>
    <?php endif; ?>
    </ul>
</aside>
<div class="sigma_aside-overlay aside-trigger-left"></div>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/includes/mobile_nav.blade.php ENDPATH**/ ?>