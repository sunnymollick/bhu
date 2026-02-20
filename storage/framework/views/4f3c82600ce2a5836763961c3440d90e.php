<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Posts</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?php echo e(route('admin.post.create')); ?>" class="btn btn-primary float-right">Add Post</a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Short Title</th>
                            <th>Page</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->title); ?></td>
                            <td><?php echo e($post->short_title); ?></td>
                            <td><?php echo e($post->page->title ?? ''); ?></td>
                            <td>
                                <?php if($post->status): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($post->image): ?>
                                    <img src="<?php echo e(asset('backend/uploads/post/'.$post->image)); ?>" style="max-width:80px;">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.post.edit', $post->id)); ?>" class="btn btn-sm btn-info">Edit</a>
                                <form action="<?php echo e(route('admin.post.destroy', $post->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/post/all.blade.php ENDPATH**/ ?>