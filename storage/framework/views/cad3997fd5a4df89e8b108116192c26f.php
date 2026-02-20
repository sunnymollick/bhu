<?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="event-card">
    <div class="event-image-wrapper">
        <?php if(isset($event->temple_id) && $event->banner_image): ?>
            <img src="<?php echo e(asset('backend/uploads/temple_event/banner/' . $event->banner_image)); ?>" alt="<?php echo e($event->event_name); ?>">
            <div class="event-type-badge temple">Temple Event</div>
        <?php elseif(isset($event->organization_id) && $event->banner_image): ?>
            <img src="<?php echo e(asset('backend/uploads/organization_event/banner/' . $event->banner_image)); ?>" alt="<?php echo e($event->event_name); ?>">
            <div class="event-type-badge organization">Organization Event</div>
        <?php elseif(isset($event->temple_id)): ?>
            <img src="https://placehold.co/800x400/a9561f/ffffff?text=Temple+Event" alt="<?php echo e($event->event_name); ?>">
            <div class="event-type-badge temple">Temple Event</div>
        <?php else: ?>
            <img src="https://placehold.co/800x400/c94641/ffffff?text=Organization+Event" alt="<?php echo e($event->event_name); ?>">
            <div class="event-type-badge organization">Organization Event</div>
        <?php endif; ?>
        <div class="event-date-badge">
            <?php if($event->event_date_end && $event->event_date != $event->event_date_end): ?>
                
                <div class="date-range-start">
                    <span class="day"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('d')); ?></span>
                    <span class="month"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('M')); ?></span>
                </div>
                <span class="date-separator">to</span>
                <div class="date-range-end">
                    <span class="day"><?php echo e(\Carbon\Carbon::parse($event->event_date_end)->format('d')); ?></span>
                    <span class="month"><?php echo e(\Carbon\Carbon::parse($event->event_date_end)->format('M y')); ?></span>
                </div>
            <?php else: ?>
                
                <span class="day"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('d')); ?></span>
                <span class="month"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('M y')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="event-content">
        <h3 class="event-title">
            <?php if(isset($event->temple_id)): ?>
                <a href="<?php echo e(route('frontend.event.details.unified', ['type' => 'temple', 'id' => $event->id])); ?>"><?php echo e($event->event_name); ?></a>
            <?php else: ?>
                <a href="<?php echo e(route('frontend.event.details.unified', ['type' => 'organization', 'id' => $event->id])); ?>"><?php echo e($event->event_name); ?></a>
            <?php endif; ?>
        </h3>
        <?php if($event->short_description): ?>
            <p class="event-description"><?php echo e(Str::limit(strip_tags($event->short_description), 150)); ?></p>
        <?php elseif($event->description): ?>
            <p class="event-description"><?php echo e(Str::limit(strip_tags($event->description), 150)); ?></p>
        <?php endif; ?>
        <div class="event-meta">
            <?php if($event->event_date_end && $event->event_date != $event->event_date_end): ?>
                
                <div class="event-meta-item">
                    <i class="far fa-calendar-alt"></i>
                    <span>
                        <?php echo e(\Carbon\Carbon::parse($event->event_date)->format('l, M d')); ?> - <?php echo e(\Carbon\Carbon::parse($event->event_date_end)->format('l, M d, Y')); ?>

                    </span>
                </div>
            <?php endif; ?>
            <?php if($event->event_time_start || $event->event_time_end): ?>
            <div class="event-meta-item">
                <i class="far fa-clock"></i>
                <span>
                    <?php if(!($event->event_date_end && $event->event_date != $event->event_date_end)): ?>
                        <?php echo e(\Carbon\Carbon::parse($event->event_date)->format('l')); ?>

                    <?php endif; ?>
                    <?php if($event->event_time_start): ?>
                        <?php echo e(!($event->event_date_end && $event->event_date != $event->event_date_end) ? '(' : ''); ?><?php echo e(\Carbon\Carbon::parse($event->event_time_start)->format('g:i A')); ?>

                    <?php endif; ?>
                    <?php if($event->event_time_start && $event->event_time_end): ?>
                        -
                    <?php endif; ?>
                    <?php if($event->event_time_end): ?>
                        <?php echo e(\Carbon\Carbon::parse($event->event_time_end)->format('g:i A')); ?><?php echo e(!($event->event_date_end && $event->event_date != $event->event_date_end) ? ')' : ''); ?>

                    <?php endif; ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if($event->location): ?>
            <div class="event-meta-item">
                <i class="far fa-map-marker-alt"></i>
                <span><?php echo e($event->location); ?></span>
            </div>
            <?php endif; ?>
        </div>
        <div class="event-source">
            <i class="far fa-building"></i>
            <?php if(isset($event->temple_id)): ?>
                <strong><?php echo e($event->temple->name ?? 'Temple'); ?></strong>
            <?php else: ?>
                <strong><?php echo e($event->organization->name ?? 'Organization'); ?></strong>
            <?php endif; ?>
        </div>
        <?php if(isset($event->temple_id)): ?>
            <a href="<?php echo e(route('frontend.event.details.unified', ['type' => 'temple', 'id' => $event->id])); ?>" class="join-btn">
                VIEW DETAILS
                <i class="far fa-arrow-right"></i>
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('frontend.event.details.unified', ['type' => 'organization', 'id' => $event->id])); ?>" class="join-btn">
                VIEW DETAILS
                <i class="far fa-arrow-right"></i>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="alert alert-info">
    <i class="far fa-info-circle me-2"></i>No upcoming events found.
</div>
<?php endif; ?>

<!-- Pagination -->
<?php if($events->hasPages()): ?>
<nav aria-label="Event pagination" id="events-pagination">
    <?php echo e($events->links('pagination::bootstrap-4')); ?>

</nav>
<?php endif; ?>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/events/partials/events_grid.blade.php ENDPATH**/ ?>