<nav class="main-header navbar navbar-expand navbar-dark">
    <style>
    /* Notification Bell Animation */
    @keyframes ring {
        0% { transform: rotate(0); }
        10% { transform: rotate(20deg); }
        20% { transform: rotate(-20deg); }
        30% { transform: rotate(15deg); }
        40% { transform: rotate(-15deg); }
        50% { transform: rotate(10deg); }
        60% { transform: rotate(-10deg); }
        70% { transform: rotate(5deg); }
        80% { transform: rotate(-5deg); }
        90% { transform: rotate(2deg); }
        100% { transform: rotate(0); }
    }

    .notification-bell {
        font-size: 22px !important;
        color: #ffd700 !important;
        transition: all 0.3s ease;
    }

    .notification-bell:hover {
        animation: ring 1s ease-in-out;
        color: #ffed4e !important;
    }

    .notification-badge {
        font-size: 11px !important;
        padding: 3px 6px !important;
        font-weight: 700 !important;
        background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%) !important;
        border: 2px solid #fff !important;
        box-shadow: 0 2px 8px rgba(231, 76, 60, 0.5) !important;
        animation: pulse 2s infinite !important;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
    </style>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(url('admin')); ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu (Contact Messages - Admin/SuperAdmin Only) -->
      <?php if(Auth::check() && in_array(Auth::user()->role?->name, ['Admin', 'Super Admin'])): ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <?php if($unreadContactsCount > 0): ?>
          <span class="badge badge-danger navbar-badge"><?php echo e($unreadContactsCount); ?></span>
          <?php endif; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo e($unreadContactsCount); ?> New Contact Message<?php echo e($unreadContactsCount != 1 ? 's' : ''); ?></span>

          <?php $__empty_1 = true; $__currentLoopData = $recentContacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo e(route('admin.contact.show', $contact->id)); ?>" class="dropdown-item" style="white-space: normal;">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo e($contact->full_name); ?>

                  <span class="float-right text-sm text-danger"><i class="fas fa-envelope"></i></span>
                </h3>
                <p class="text-sm"><?php echo e(Str::limit($contact->subject ?? 'No subject', 40)); ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo e($contact->created_at->diffForHumans()); ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="dropdown-divider"></div>
          <div class="dropdown-item text-center text-muted">
            <i class="fas fa-inbox"></i> No new messages
          </div>
          <?php endif; ?>

          <div class="dropdown-divider"></div>
          <a href="<?php echo e(route('admin.contact.index')); ?>" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <?php endif; ?>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell notification-bell"></i>
          <?php if($totalPending > 0): ?>
          <span class="badge navbar-badge notification-badge"><?php echo e($totalPending); ?></span>
          <?php endif; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo e($totalPending); ?> Pending Approval<?php echo e($totalPending != 1 ? 's' : ''); ?></span>

          <?php if($pendingTemples->count() > 0): ?>
          <div class="dropdown-divider"></div>
          <?php $__currentLoopData = $pendingTemples->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temple): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('admin.temple.all')); ?>" class="dropdown-item" style="white-space: normal; word-wrap: break-word;">
            <i class="fas fa-place-of-worship mr-2 text-info"></i>
            <span style="display: inline-block; max-width: 200px; vertical-align: middle;">New Temple: <?php echo e(Str::limit($temple->name, 25)); ?></span>
            <span class="float-right text-muted text-sm" style="white-space: nowrap;"><?php echo e($temple->created_at->diffForHumans()); ?></span>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($pendingTemples->count() > 3): ?>
          <a href="<?php echo e(route('admin.temple.all')); ?>" class="dropdown-item text-center text-muted">
            <small>+ <?php echo e($pendingTemples->count() - 3); ?> more temples</small>
          </a>
          <?php endif; ?>
          <?php endif; ?>

          <?php if($pendingOrganizations->count() > 0): ?>
          <div class="dropdown-divider"></div>
          <?php $__currentLoopData = $pendingOrganizations->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('admin.organization.all')); ?>" class="dropdown-item" style="white-space: normal; word-wrap: break-word;">
            <i class="fas fa-building mr-2 text-success"></i>
            <span style="display: inline-block; max-width: 200px; vertical-align: middle;">New Organization: <?php echo e(Str::limit($org->name, 25)); ?></span>
            <span class="float-right text-muted text-sm" style="white-space: nowrap;"><?php echo e($org->created_at->diffForHumans()); ?></span>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($pendingOrganizations->count() > 3): ?>
          <a href="<?php echo e(route('admin.organization.all')); ?>" class="dropdown-item text-center text-muted">
            <small>+ <?php echo e($pendingOrganizations->count() - 3); ?> more organizations</small>
          </a>
          <?php endif; ?>
          <?php endif; ?>

          <?php if($pendingJobs->count() > 0): ?>
          <div class="dropdown-divider"></div>
          <?php $__currentLoopData = $pendingJobs->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('admin.job_post.all')); ?>" class="dropdown-item" style="white-space: normal; word-wrap: break-word;">
            <i class="fas fa-briefcase mr-2 text-primary"></i>
            <span style="display: inline-block; max-width: 200px; vertical-align: middle;">New Job: <?php echo e(Str::limit($job->job_title, 25)); ?></span>
            <span class="float-right text-muted text-sm" style="white-space: nowrap;"><?php echo e($job->created_at->diffForHumans()); ?></span>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($pendingJobs->count() > 3): ?>
          <a href="<?php echo e(route('admin.job_post.all')); ?>" class="dropdown-item text-center text-muted">
            <small>+ <?php echo e($pendingJobs->count() - 3); ?> more jobs</small>
          </a>
          <?php endif; ?>
          <?php endif; ?>

          <?php if($pendingNews->count() > 0): ?>
          <div class="dropdown-divider"></div>
          <?php $__currentLoopData = $pendingNews->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('admin.news.all')); ?>" class="dropdown-item" style="white-space: normal; word-wrap: break-word;">
            <i class="fas fa-newspaper mr-2 text-danger"></i>
            <span style="display: inline-block; max-width: 200px; vertical-align: middle;">New News: <?php echo e(Str::limit($newsItem->title, 25)); ?></span>
            <span class="float-right text-muted text-sm" style="white-space: nowrap;"><?php echo e($newsItem->created_at->diffForHumans()); ?></span>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($pendingNews->count() > 3): ?>
          <a href="<?php echo e(route('admin.news.all')); ?>" class="dropdown-item text-center text-muted">
            <small>+ <?php echo e($pendingNews->count() - 3); ?> more news</small>
          </a>
          <?php endif; ?>
          <?php endif; ?>

          <?php if($totalPending == 0): ?>
          <div class="dropdown-divider"></div>
          <span class="dropdown-item text-center text-muted">
            <i class="fas fa-check-circle mr-2"></i> No pending approvals
          </span>
          <?php endif; ?>
        </div>
      </li>
    </ul>
  </nav>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/includes/nav.blade.php ENDPATH**/ ?>