<?php $__empty_1 = true; $__currentLoopData = $temples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temple): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-md-4">
        <article class="sigma_post">
            <div class="sigma_post-thumb">
                <a href="<?php echo e(route('frontend.temples.details', $temple->id)); ?>">
                    <?php if($temple->main_picture): ?>
                        <img src="<?php echo e(asset('backend/uploads/temple/profile/' . $temple->main_picture)); ?>" alt="<?php echo e($temple->name); ?>">
                    <?php else: ?>
                        <img src="https://placehold.co/400x270" alt="<?php echo e($temple->name); ?>">
                    <?php endif; ?>
                </a>
            </div>
            <div class="sigma_post-body">
                <h5>
                    <a href="<?php echo e(route('frontend.temples.details', $temple->id)); ?>"><?php echo e($temple->name); ?></a>
                </h5>
                <?php if($temple->address): ?>
                    <p class="text-muted small"><i class="fal fa-map-marker-alt"></i> <?php echo e(Str::limit($temple->address, 50)); ?></p>
                <?php endif; ?>
            </div>
        </article>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12">
        <div class="alert alert-info text-center">
            <i class="fal fa-info-circle"></i> No temples found. Please adjust your filters.
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/partials/temples-grid.blade.php ENDPATH**/ ?>