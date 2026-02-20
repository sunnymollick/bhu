<?php $__env->startSection('stylesheet'); ?>
<style>
    .dashboard-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: none;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .stat-card {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .stat-card.primary {
        background: linear-gradient(135deg, #3498db, #2980b9);
    }

    .stat-card.success {
        background: linear-gradient(135deg, #27ae60, #229954);
    }

    .stat-card.warning {
        background: linear-gradient(135deg, #f39c12, #e67e22);
    }

    .stat-card.danger {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
    }

    .stat-card.info {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
    }

    .stat-icon {
        font-size: 2.5rem;
        opacity: 0.3;
        position: absolute;
        right: 20px;
        bottom: 10px;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .quick-action-btn {
        display: inline-block;
        background: linear-gradient(to right, #dc8a45, #5c5555);
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
        margin: 0.5rem 0.5rem 0.5rem 0;
        text-decoration: none;
    }

    .quick-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 138, 69, 0.3);
        color: white;
    }

    .recent-item {
        padding: 1rem;
        border-bottom: 1px solid #ecf0f1;
        transition: background 0.2s;
    }

    .recent-item:last-child {
        border-bottom: none;
    }

    .recent-item:hover {
        background: #f8f9fa;
    }

    .user-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-verified {
        background: #d4edda;
        color: #155724;
    }

    .badge-pending {
        background: #fff3cd;
        color: #856404;
    }

    .badge-unverified {
        background: #f8d7da;
        color: #721c24;
    }

    .chart-container {
        position: relative;
        height: 300px;
    }

    .welcome-banner {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .profile-completion {
        position: relative;
        height: 10px;
        background: rgba(255,255,255,0.3);
        border-radius: 10px;
        overflow: hidden;
        margin-top: 1rem;
    }

    .profile-completion-bar {
        height: 100%;
        background: white;
        border-radius: 10px;
        transition: width 0.5s ease;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 3px solid #dc8a45;
        display: inline-block;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #7f8c8d;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    @media (max-width: 768px) {
        .stat-card {
            margin-bottom: 1rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        
        <div class="welcome-banner">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="mb-2">
                        <i class="fas fa-hand-wave mr-2"></i>
                        Welcome back, <?php echo e(Auth::user()->name); ?>!
                    </h2>
                    <p class="mb-0">
                        <?php if(in_array($role ?? '', ['Admin', 'Super Admin'])): ?>
                            Here's what's happening with your platform today.
                        <?php else: ?>
                            Explore opportunities and manage your profile.
                        <?php endif; ?>
                    </p>
                    <?php if(isset($stats['profile_completion'])): ?>
                        <div class="mt-3">
                            <small>Profile Completion: <?php echo e($stats['profile_completion']); ?>%</small>
                            <div class="profile-completion">
                                <div class="profile-completion-bar" style="width: <?php echo e($stats['profile_completion']); ?>%"></div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 text-right">
                    <h4><?php echo e(\Carbon\Carbon::now()->format('l')); ?></h4>
                    <p class="mb-0"><?php echo e(\Carbon\Carbon::now()->format('F d, Y')); ?></p>
                </div>
            </div>
        </div>

        <?php if(in_array($role ?? '', ['Admin', 'Super Admin'])): ?>
            

            
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.user.all')); ?>" style="text-decoration: none;">
                        <div class="stat-card primary">
                            <div class="stat-icon"><i class="fas fa-users"></i></div>
                            <div class="stat-value"><?php echo e($stats['total_users'] ?? 0); ?></div>
                            <div class="stat-label">Total Users</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.user.all')); ?>?filter=verified" style="text-decoration: none;">
                        <div class="stat-card success">
                            <div class="stat-icon"><i class="fas fa-user-check"></i></div>
                            <div class="stat-value"><?php echo e($stats['verified_users'] ?? 0); ?></div>
                            <div class="stat-label">Verified Users</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.user.all')); ?>?filter=pending" style="text-decoration: none;">
                        <div class="stat-card warning">
                            <div class="stat-icon"><i class="fas fa-clock"></i></div>
                            <div class="stat-value"><?php echo e($stats['pending_users'] ?? 0); ?></div>
                            <div class="stat-label">Pending Verification</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.contact.index')); ?>?filter=unread" style="text-decoration: none;">
                        <div class="stat-card danger">
                            <div class="stat-icon"><i class="fas fa-envelope"></i></div>
                            <div class="stat-value"><?php echo e($stats['unread_contacts'] ?? 0); ?></div>
                            <div class="stat-label">Unread Messages</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.user.all')); ?>?filter=pending_approval" style="text-decoration: none;">
                        <div class="stat-card" style="background: linear-gradient(135deg, #e74c3c, #c0392b);">
                            <div class="stat-icon"><i class="fas fa-user-clock"></i></div>
                            <div class="stat-value"><?php echo e($stats['pending_user_approvals'] ?? 0); ?></div>
                            <div class="stat-label">User Approval Requests</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.temple.all')); ?>?filter=pending_approval" style="text-decoration: none;">
                        <div class="stat-card" style="background: linear-gradient(135deg, #9b59b6, #8e44ad);">
                            <div class="stat-icon"><i class="fas fa-mosque"></i></div>
                            <div class="stat-value"><?php echo e($stats['pending_temple_approvals'] ?? 0); ?></div>
                            <div class="stat-label">Temple Approval Requests</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.organization.all')); ?>?filter=pending_approval" style="text-decoration: none;">
                        <div class="stat-card" style="background: linear-gradient(135deg, #16a085, #1abc9c);">
                            <div class="stat-icon"><i class="fas fa-building"></i></div>
                            <div class="stat-value"><?php echo e($stats['pending_organization_approvals'] ?? 0); ?></div>
                            <div class="stat-label">Organization Approval Requests</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.job_post.all')); ?>?filter=pending_approval" style="text-decoration: none;">
                        <div class="stat-card" style="background: linear-gradient(135deg, #f39c12, #e67e22);">
                            <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
                            <div class="stat-value"><?php echo e($stats['pending_job_approvals'] ?? 0); ?></div>
                            <div class="stat-label">Job Approval Requests</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.temple_event.all')); ?>?filter=pending_approval" style="text-decoration: none;">
                        <div class="stat-card" style="background: linear-gradient(135deg, #3498db, #2980b9);">
                            <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                            <div class="stat-value"><?php echo e($stats['pending_event_approvals'] ?? 0); ?></div>
                            <div class="stat-label">Event Approval Requests</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.news.all')); ?>?filter=pending_approval" style="text-decoration: none;">
                        <div class="stat-card" style="background: linear-gradient(135deg, #e67e22, #d35400);">
                            <div class="stat-icon"><i class="fas fa-newspaper"></i></div>
                            <div class="stat-value"><?php echo e($stats['pending_news_approvals'] ?? 0); ?></div>
                            <div class="stat-label">News Approval Requests</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.temple.all')); ?>" style="text-decoration: none;">
                        <div class="stat-card" style="background: linear-gradient(135deg, #1abc9c, #16a085);">
                            <div class="stat-icon"><i class="fas fa-mosque"></i></div>
                            <div class="stat-value"><?php echo e($stats['total_temples'] ?? 0); ?></div>
                            <div class="stat-label">Total Temples</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.organization.all')); ?>" style="text-decoration: none;">
                        <div class="stat-card" style="background: linear-gradient(135deg, #c0392b, #e74c3c);">
                            <div class="stat-icon"><i class="fas fa-building"></i></div>
                            <div class="stat-value"><?php echo e($stats['total_organizations'] ?? 0); ?></div>
                            <div class="stat-label">Total Organizations</div>
                        </div>
                    </a>
                </div>
            </div>

            
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-bolt mr-2"></i>Quick Actions</h3>
                        <div class="mt-3">
                            <a href="<?php echo e(route('admin.user.all')); ?>" class="quick-action-btn">
                                <i class="fas fa-users mr-2"></i>Manage Users
                            </a>
                            <a href="<?php echo e(route('admin.temple.all')); ?>" class="quick-action-btn">
                                <i class="fas fa-mosque mr-2"></i>Manage Temples
                            </a>
                            <a href="<?php echo e(route('admin.organization.all')); ?>" class="quick-action-btn">
                                <i class="fas fa-building mr-2"></i>Manage Organizations
                            </a>
                            <a href="<?php echo e(route('admin.job_post.all')); ?>" class="quick-action-btn">
                                <i class="fas fa-briefcase mr-2"></i>Manage Jobs
                            </a>
                            <a href="<?php echo e(route('admin.news.all')); ?>" class="quick-action-btn">
                                <i class="fas fa-newspaper mr-2"></i>Manage News
                            </a>
                            <a href="<?php echo e(route('admin.post.all')); ?>" class="quick-action-btn">
                                <i class="fas fa-blog mr-2"></i>Manage Posts
                            </a>
                            <a href="<?php echo e(route('admin.contact.index')); ?>" class="quick-action-btn">
                                <i class="fas fa-envelope mr-2"></i>View Messages
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-6">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-user-plus mr-2"></i>Recent Users</h3>
                        <?php if(isset($recent_users) && $recent_users->count() > 0): ?>
                            <?php $__currentLoopData = $recent_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="recent-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo e($user->profile_pic ? asset('backend/uploads/user/' . $user->profile_pic) : asset('frontend/assets/img/man-avatar.png')); ?>"
                                                 class="rounded-circle mr-3"
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                            <div>
                                                <strong><?php echo e($user->name); ?></strong>
                                                <br>
                                                <small class="text-muted"><?php echo e($user->email); ?></small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <?php if($user->is_verified === 1): ?>
                                                <span class="user-badge badge-verified">Verified</span>
                                            <?php elseif($user->is_verified === 0): ?>
                                                <span class="user-badge badge-unverified">Rejected</span>
                                            <?php else: ?>
                                                <span class="user-badge badge-pending">Pending</span>
                                            <?php endif; ?>
                                            <br>
                                            <small class="text-muted"><?php echo e($user->created_at->diffForHumans()); ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('admin.user.all')); ?>" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;" class="btn btn-sm">View All Users</a>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="fas fa-users"></i>
                                <p>No recent users</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="col-lg-6">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-newspaper mr-2"></i>Recent News</h3>
                        <?php if(isset($recent_news) && $recent_news->count() > 0): ?>
                            <?php $__currentLoopData = $recent_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="recent-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong><?php echo e(Str::limit($news->title, 40)); ?></strong>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-user mr-1"></i><?php echo e($news->creator->name ?? 'Unknown'); ?>

                                            </small>
                                        </div>
                                        <div class="text-right">
                                            <?php if($news->status === 'approved'): ?>
                                                <span class="badge badge-success">Approved</span>
                                            <?php elseif($news->status === 'pending'): ?>
                                                <span class="badge badge-warning">Pending</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Disapproved</span>
                                            <?php endif; ?>
                                            <br>
                                            <small class="text-muted"><?php echo e($news->created_at->diffForHumans()); ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('admin.news.all')); ?>" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;" class="btn btn-sm">View All News</a>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="fas fa-newspaper"></i>
                                <p>No recent news</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-12">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-user-clock mr-2"></i>Pending Verifications</h3>
                        <?php if(isset($pending_verifications) && $pending_verifications->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Reference Name</th>
                                            <th>Reference Email</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $pending_verifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo e($user->profile_pic ? asset('backend/uploads/user/' . $user->profile_pic) : asset('frontend/assets/img/man-avatar.png')); ?>"
                                                             class="rounded-circle mr-2"
                                                             style="width: 40px; height: 40px; object-fit: cover;">
                                                        <strong><?php echo e($user->name); ?></strong>
                                                    </div>
                                                </td>
                                                <td><?php echo e($user->email); ?></td>
                                                <td>
                                                    <?php if($user->reference_by): ?>
                                                        <?php
                                                            // reference_by contains the email, fetch the user to get name
                                                            $referenceUser = \App\Models\User::where('email', $user->reference_by)->first();
                                                        ?>
                                                        <?php echo e($referenceUser ? $referenceUser->name : 'N/A'); ?>

                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($user->reference_by ?? 'N/A'); ?></td>
                                                <td><?php echo e($user->created_at->format('M d, Y')); ?></td>
                                                <td>
                                                    <form action="<?php echo e(route('admin.user.verify', $user->id)); ?>" method="POST" class="d-inline">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fas fa-check-circle"></i> Verify
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('admin.user.all')); ?>?filter=pending" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;" class="btn btn-sm">View All Pending</a>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="fas fa-check-circle"></i>
                                <p>No pending verifications</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-12">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-envelope mr-2"></i>Recent Contact Messages</h3>
                        <?php if(isset($recent_contacts) && $recent_contacts->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $recent_contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($contact->full_name); ?></td>
                                                <td><?php echo e($contact->email); ?></td>
                                                <td><?php echo e(Str::limit($contact->subject, 30)); ?></td>
                                                <td><?php echo e($contact->created_at->format('M d, Y')); ?></td>
                                                <td>
                                                    <?php if($contact->status === 'read' || $contact->status === 'replied'): ?>
                                                        <span class="badge badge-success"><?php echo e(ucfirst($contact->status)); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-warning">Unread</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.contact.show', $contact->id)); ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="fas fa-inbox"></i>
                                <p>No recent contacts</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php else: ?>
            

            <div class="row">
                
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.temple.all')); ?>" style="text-decoration: none;">
                        <div class="stat-card primary">
                            <div class="stat-icon"><i class="fas fa-mosque"></i></div>
                            <div class="stat-value"><?php echo e($stats['my_temples'] ?? 0); ?></div>
                            <div class="stat-label">My Temples</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.organization.all')); ?>" style="text-decoration: none;">
                        <div class="stat-card success">
                            <div class="stat-icon"><i class="fas fa-building"></i></div>
                            <div class="stat-value"><?php echo e($stats['my_organizations'] ?? 0); ?></div>
                            <div class="stat-label">My Organizations</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route('admin.job_post.all')); ?>" style="text-decoration: none;">
                        <div class="stat-card warning">
                            <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
                            <div class="stat-value"><?php echo e($stats['my_jobs'] ?? 0); ?></div>
                            <div class="stat-label">My Jobs</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" style="text-decoration: none;">
                        <div class="stat-card info">
                            <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
                            <div class="stat-value"><?php echo e($stats['my_events'] ?? 0); ?></div>
                            <div class="stat-label">My Events</div>
                        </div>
                    </a>
                </div>
            </div>

            
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-bolt mr-2"></i>Quick Actions</h3>
                        <div class="mt-3">
                            <a href="<?php echo e(route('admin.user.profile')); ?>" class="quick-action-btn">
                                <i class="fas fa-user mr-2"></i>My Profile
                            </a>
                            <a href="<?php echo e(route('admin.user.profile.edit')); ?>" class="quick-action-btn">
                                <i class="fas fa-edit mr-2"></i>Edit Profile
                            </a>
                            <a href="<?php echo e(route('admin.user.change.password')); ?>" class="quick-action-btn">
                                <i class="fas fa-lock mr-2"></i>Change Password
                            </a>
                            <?php if(Auth::user()->is_student): ?>
                                <a href="#" class="quick-action-btn">
                                    <i class="fas fa-graduation-cap mr-2"></i>My Career
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-briefcase mr-2"></i>My Job Posts</h3>
                        <?php if(isset($my_jobs) && $my_jobs->count() > 0): ?>
                            <?php $__currentLoopData = $my_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="recent-item">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="mb-1"><?php echo e($job->job_title ?? 'Job'); ?></h5>
                                            <p class="text-muted mb-2">
                                                <i class="fas fa-building mr-1"></i><?php echo e($job->company ?? 'N/A'); ?>

                                            </p>
                                            <small class="text-muted">Posted <?php echo e($job->created_at->diffForHumans()); ?></small>
                                        </div>
                                        <div>
                                            <a href="<?php echo e(route('admin.job_post.edit', $job->id)); ?>" class="btn btn-sm" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">
                                                <i class="fas fa-edit mr-1"></i>Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('admin.job_post.all')); ?>" class="btn" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">View All My Jobs</a>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="fas fa-briefcase"></i>
                                <p>You haven't posted any jobs yet</p>
                                <a href="<?php echo e(route('admin.job_post.create')); ?>" class="btn mt-2" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">Post a Job</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-lg-6">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-mosque mr-2"></i>My Temples</h3>
                        <?php if(isset($my_temples) && $my_temples->count() > 0): ?>
                            <?php $__currentLoopData = $my_temples->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temple): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="recent-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="mb-1"><?php echo e($temple->name); ?></h5>
                                            <p class="text-muted mb-0">
                                                <i class="fas fa-map-marker-alt mr-1"></i>
                                                <?php echo e($temple->district->name ?? 'N/A'); ?>

                                            </p>
                                        </div>
                                        <div>
                                            <a href="<?php echo e(route('admin.temple.edit', $temple->id)); ?>" class="btn btn-sm" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('admin.temple.all')); ?>" class="btn btn-sm" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">View All</a>
                            </div>
                        <?php else: ?>
                            <div class="empty-state py-4">
                                <i class="fas fa-mosque"></i>
                                <p>You haven't added any temples yet</p>
                                <a href="<?php echo e(route('admin.temple.add')); ?>" class="btn btn-sm mt-2" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">Add Temple</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="col-lg-6">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-building mr-2"></i>My Organizations</h3>
                        <?php if(isset($my_organizations) && $my_organizations->count() > 0): ?>
                            <?php $__currentLoopData = $my_organizations->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="recent-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="mb-1"><?php echo e($org->name); ?></h5>
                                            <p class="text-muted mb-0">
                                                <i class="fas fa-briefcase mr-1"></i>
                                                <?php echo e($org->organization_type ?? 'Organization'); ?>

                                            </p>
                                        </div>
                                        <div>
                                            <a href="<?php echo e(route('admin.organization.edit', $org->id)); ?>" class="btn btn-sm" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('admin.organization.all')); ?>" class="btn btn-sm" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">View All</a>
                            </div>
                        <?php else: ?>
                            <div class="empty-state py-4">
                                <i class="fas fa-building"></i>
                                <p>You haven't added any organizations yet</p>
                                <a href="<?php echo e(route('admin.organization.create')); ?>" class="btn btn-sm mt-2" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">Add Organization</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-card">
                        <h3 class="section-title"><i class="fas fa-calendar-alt mr-2"></i>My Events</h3>
                        <?php if(isset($my_activities) && $my_activities->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Event Name</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $my_activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($event->event_name ?? 'Event'); ?></td>
                                                <td>
                                                    <?php if($event->event_type == 'temple'): ?>
                                                        <span class="badge badge-primary">Temple Event</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-success">Organization Event</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($event->event_type == 'temple'): ?>
                                                        <?php echo e($event->temple->name ?? 'N/A'); ?>

                                                    <?php else: ?>
                                                        <?php echo e($event->organization->name ?? 'N/A'); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('M d, Y') : 'N/A'); ?></td>
                                                <td>
                                                    <?php if($event->event_type == 'temple'): ?>
                                                        <a href="<?php echo e(route('admin.temple_event.edit', $event->id)); ?>" class="btn btn-sm" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('admin.organization_event.edit', $event->id)); ?>" class="btn btn-sm" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('admin.temple_event.all')); ?>" class="btn btn-sm mr-2" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">Temple Events</a>
                                <a href="<?php echo e(route('admin.organization_event.all')); ?>" class="btn btn-sm" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">Organization Events</a>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="fas fa-calendar-alt"></i>
                                <p>You haven't created any events yet</p>
                                <a href="<?php echo e(route('admin.temple_event.create')); ?>" class="btn btn-sm mt-2 mr-2" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">Add Temple Event</a>
                                <a href="<?php echo e(route('admin.organization_event.create')); ?>" class="btn btn-sm mt-2" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">Add Organization Event</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/dashboard.blade.php ENDPATH**/ ?>