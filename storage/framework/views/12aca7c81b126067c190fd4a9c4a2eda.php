<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact Message Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.contact.index')); ?>">Contact Messages</a></li>
                    <li class="breadcrumb-item active">Message Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Message Details Card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-envelope mr-2"></i>
                            Message from <?php echo e($contact->full_name); ?>

                        </h3>
                        <div class="card-tools">
                            <?php if($contact->status === 'unread'): ?>
                                <span class="badge badge-warning">Unread</span>
                            <?php elseif($contact->status === 'read'): ?>
                                <span class="badge badge-info">Read</span>
                            <?php else: ?>
                                <span class="badge badge-success">Replied</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong><i class="fas fa-user mr-2"></i>Full Name:</strong><br>
                                <p class="text-muted ml-4"><?php echo e($contact->full_name); ?></p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-envelope mr-2"></i>Email Address:</strong><br>
                                <p class="text-muted ml-4">
                                    <a href="mailto:<?php echo e($contact->email); ?>"><?php echo e($contact->email); ?></a>
                                </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong><i class="fas fa-calendar mr-2"></i>Received On:</strong><br>
                                <p class="text-muted ml-4"><?php echo e($contact->created_at->format('F d, Y \a\t h:i A')); ?></p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-info-circle mr-2"></i>Status:</strong><br>
                                <p class="text-muted ml-4">
                                    <select class="form-control form-control-sm d-inline-block"
                                            style="width: auto;"
                                            onchange="updateStatus(<?php echo e($contact->id); ?>, this.value)">
                                        <option value="unread" <?php echo e($contact->status === 'unread' ? 'selected' : ''); ?>>Unread</option>
                                        <option value="read" <?php echo e($contact->status === 'read' ? 'selected' : ''); ?>>Read</option>
                                        <option value="replied" <?php echo e($contact->status === 'replied' ? 'selected' : ''); ?>>Replied</option>
                                    </select>
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <strong><i class="fas fa-tag mr-2"></i>Subject:</strong><br>
                            <p class="text-muted ml-4"><?php echo e($contact->subject); ?></p>
                        </div>

                        <div class="mb-3">
                            <strong><i class="fas fa-comments mr-2"></i>Conversation History:</strong>
                            <div class="ml-4 mt-3">
                                <?php if(is_array($contact->message)): ?>
                                    <?php $__currentLoopData = $contact->message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card mb-3 <?php echo e($msg['sender'] === 'user' ? 'border-primary' : 'border-success'); ?>">
                                            <div class="card-header <?php echo e($msg['sender'] === 'user' ? 'bg-primary text-white' : 'bg-success text-white'); ?>">
                                                <strong>
                                                    <i class="fas <?php echo e($msg['sender'] === 'user' ? 'fa-user' : 'fa-user-shield'); ?> mr-2"></i>
                                                    <?php echo e($msg['sender'] === 'user' ? $contact->full_name : 'Admin'); ?>

                                                </strong>
                                                <span class="float-right">
                                                    <i class="fas fa-clock mr-1"></i>
                                                    <?php echo e(\Carbon\Carbon::parse($msg['timestamp'])->format('M d, Y h:i A')); ?>

                                                </span>
                                            </div>
                                            <div class="card-body">
                                                <?php if(isset($msg['subject']) && $msg['sender'] === 'admin'): ?>
                                                    <p class="mb-2"><strong>Subject:</strong> <?php echo e($msg['subject']); ?></p>
                                                <?php endif; ?>
                                                <p style="white-space: pre-wrap; line-height: 1.8; margin: 0;"><?php echo e($msg['message']); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="card mb-3 border-primary">
                                        <div class="card-header bg-primary text-white">
                                            <strong>
                                                <i class="fas fa-user mr-2"></i>
                                                <?php echo e($contact->full_name); ?>

                                            </strong>
                                            <span class="float-right">
                                                <i class="fas fa-clock mr-1"></i>
                                                <?php echo e($contact->created_at->format('M d, Y h:i A')); ?>

                                            </span>
                                        </div>
                                        <div class="card-body">
                                            <p style="white-space: pre-wrap; line-height: 1.8; margin: 0;"><?php echo e(is_string($contact->message) ? $contact->message : 'No message content'); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo e(route('admin.contact.index')); ?>" class="btn btn-default">
                            <i class="fas fa-arrow-left mr-2"></i>Back to List
                        </a>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo e(urlencode($contact->email)); ?>&su=<?php echo e(urlencode('Re: ' . $contact->subject)); ?>"
                           target="_blank"
                           class="btn btn-primary">
                            <i class="fas fa-reply mr-2"></i>Reply via Webmail
                        </a>
                        <button type="button" class="btn btn-danger float-right" onclick="deleteContact(<?php echo e($contact->id); ?>)">
                            <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Info Sidebar -->
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Quick Actions</h3>
                    </div>
                    <div class="card-body">
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo e(urlencode($contact->email)); ?>&su=<?php echo e(urlencode('Re: ' . $contact->subject)); ?>"
                           target="_blank"
                           class="btn btn-block btn-primary mb-2">
                            <i class="fas fa-reply mr-2"></i>Reply via Webmail
                        </a>
                        
                        <button type="button" class="btn btn-block btn-outline-danger" onclick="deleteContact(<?php echo e($contact->id); ?>)">
                            <i class="fas fa-trash mr-2"></i>Delete Message
                        </button>
                    </div>
                </div>

                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Message Info</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-hashtag mr-2"></i>Message ID</strong>
                        <p class="text-muted"><?php echo e($contact->id); ?></p>
                        <hr>

                        <strong><i class="fas fa-clock mr-2"></i>Received</strong>
                        <p class="text-muted"><?php echo e($contact->created_at->diffForHumans()); ?></p>
                        <hr>

                        <strong><i class="fas fa-sync mr-2"></i>Last Updated</strong>
                        <p class="text-muted"><?php echo e($contact->updated_at->diffForHumans()); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reply Modal - Removed (Using Webmail Instead) -->

<!-- Delete Form -->
<form id="deleteForm" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_custom'); ?>
<script>
    // Delete contact function
    function deleteContact(id) {
        if (confirm('Are you sure you want to delete this contact message? This action cannot be undone.')) {
            $('#deleteForm').attr('action', '/admin/contact/' + id);
            $('#deleteForm').submit();
        }
    }

    // Update status function
    function updateStatus(id, status) {
        $.ajax({
            url: '/admin/contact/' + id + '/status',
            method: 'POST',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                status: status
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    location.reload();
                } else {
                    toastr.error('Failed to update status');
                }
            },
            error: function() {
                toastr.error('An error occurred');
            }
        });
    }

    // Auto dismiss alerts
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/contact/show.blade.php ENDPATH**/ ?>