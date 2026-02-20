<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/summernote/summernote-bs4.css')); ?>">
<style>
    .info-card {
        border-left: 4px solid linear-gradient(to right, #dc8a45, #5c5555);
        background: linear-gradient(135deg, #e3f2fd 0%, #fbf2bb 100%);
    }
    .info-card .card-body p {
        margin-bottom: 10px;
    }
    .info-card .card-body p:last-child {
        margin-bottom: 0;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Send Verification Reminder</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.user.all')); ?>">Users</a></li>
                    <li class="breadcrumb-item active">Send Verification Reminder</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Compose Verification Reminder Email</h3>
                </div>
                <form action="<?php echo e(route('admin.user.send-verification-reminder', $user->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="alert" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white; border: none;">
                            <i class="fas fa-info-circle"></i> You are sending a verification reminder to <strong><?php echo e($user->name); ?></strong> (<?php echo e($user->email); ?>)
                        </div>

                        <div class="form-group">
                            <label style="font-weight: 600; color: #333;">User Information</label>
                            <div class="card info-card">
                                <div class="card-body">
                                    <p><strong>Name:</strong> <?php echo e($user->name); ?></p>
                                    <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                                    <p><strong>Contact:</strong> <?php echo e($user->contact_no ?? 'N/A'); ?></p>
                                    <?php if($user->reference_by): ?>
                                        <?php if($referencePerson): ?>
                                            <p><strong>Reference Person Name:</strong> <?php echo e($referencePerson->name); ?></p>
                                            <p><strong>Reference Person Email:</strong> <?php echo e($referencePerson->email); ?></p>
                                        <?php else: ?>
                                            <p><strong>Reference Person Email:</strong> <?php echo e($user->reference_by); ?></p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <p><strong>Reference Status:</strong>
                                        <?php if($user->is_verified === null): ?>
                                            <span class="badge badge-warning">Pending Verification</span>
                                        <?php elseif($user->is_verified == 1): ?>
                                            <span class="badge badge-success">Verified</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">Rejected</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" style="font-weight: 600; color: #333;">Your Message <span class="text-danger">*</span></label>
                            <textarea
                                class="form-control summernote <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="message"
                                name="message"
                                placeholder="Write your message to the user here..."
                                required><?php echo e(old('message')); ?></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted">
                                Please provide clear instructions or information to help the user complete their verification process.
                            </small>
                        </div>

                        <div class="alert" style="background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%); color: #000; border: none;">
                            <i class="fas fa-exclamation-triangle"></i> <strong>Note:</strong> This email will be sent from the system email. The user can reply directly to this email, and the conversation will continue via webmail.
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Send Email
                        </button>
                        <a href="<?php echo e(route('admin.user.all')); ?>" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_plugin'); ?>
<script src="<?php echo e(asset('backend/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_custom'); ?>
<script>
    $(function () {
        // Initialize Summernote
        $('.summernote').summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            placeholder: 'Write your message to the user here...'
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/user/send-verification-reminder.blade.php ENDPATH**/ ?>