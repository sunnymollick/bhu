<?php if($temples->hasPages()): ?>
    <div class="sigma_pagination">
        <ul class="pagination">
            
            <?php if($temples->onFirstPage()): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="far fa-chevron-left"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($temples->previousPageUrl()); ?>" rel="prev">
                        <i class="far fa-chevron-left"></i>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $temples->getUrlRange(1, $temples->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $temples->currentPage()): ?>
                    <li class="page-item active"><a class="page-link" href="#"><?php echo e($page); ?></a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($temples->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($temples->nextPageUrl()); ?>" rel="next">
                        <i class="far fa-chevron-right"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="far fa-chevron-right"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/partials/temples-pagination.blade.php ENDPATH**/ ?>