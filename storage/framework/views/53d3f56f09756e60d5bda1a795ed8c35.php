<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Job Posts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">All Job Posts</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <?php if(in_array(auth()->user()->role?->name, ['Admin', 'Super Admin'])): ?>
                    All Job Posts
                <?php else: ?>
                    My Job Posts
                <?php endif; ?>
            </h3>
            <a href="<?php echo e(route('admin.job_post.create')); ?>" class="btn btn-primary btn-sm float-right">Create New Job Post</a>
        </div>
        <div class="card-body table-responsive p-0">
            <table id="jobPostsTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>Type</th>
                        <th>Mode</th>
                        <th>Division</th>
                        <th>District</th>
                        <th>Deadline</th>
                        <?php if(in_array(auth()->user()->role?->name, ['Admin', 'Super Admin'])): ?>
                        <th>Posted By</th>
                        <?php endif; ?>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $jobPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($job->company); ?></td>
                        <td><?php echo e($job->job_title); ?></td>
                        <td><?php echo e(ucfirst(str_replace('_', ' ', $job->job_type))); ?></td>
                        <td><?php echo e(ucfirst(str_replace('_', ' ', $job->work_mode))); ?></td>
                        <td><?php echo e(optional($job->division)->name); ?></td>
                        <td><?php echo e(optional($job->district)->name); ?></td>
                        <td><?php echo e($job->deadline); ?></td>
                        <?php if(in_array(auth()->user()->role?->name, ['Admin', 'Super Admin'])): ?>
                        <td>
                            <span class="badge badge-info"><?php echo e(optional($job->user)->name ?? 'N/A'); ?></span>
                        </td>
                        <?php endif; ?>
                        <td>
                            <?php if($job->is_approved): ?>
                                <span class="badge badge-success">Approved</span>
                            <?php else: ?>
                                <span class="badge badge-warning">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!$job->is_approved && in_array(auth()->user()->role?->name, ['Admin', 'Super Admin'])): ?>
                                <form action="<?php echo e(route('admin.job_post.approve', $job->id)); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-sm btn-success" title="Approve Job Post">
                                        <i class="fas fa-check"></i> Approve
                                    </button>
                                </form>
                            <?php endif; ?>
                            <a href="<?php echo e(route('admin.job_post.edit', $job->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?php echo e(route('admin.job_post.destroy', $job->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this job post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="<?php if(in_array(auth()->user()->role?->name, ['Admin', 'Super Admin'])): ?> 10 <?php else: ?> 9 <?php endif; ?>" class="text-center">
                            No job posts found.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_plugin'); ?>
<script src="<?php echo e(asset('backend/plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_custom'); ?>
<script>
    $(function () {
        $("#jobPostsTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
            "order": [[6, "desc"]], // Sort by deadline column descending
            "columnDefs": [
                { "orderable": false, "targets": -1 } // Disable sorting on Actions column
            ]
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/job_post/all.blade.php ENDPATH**/ ?>