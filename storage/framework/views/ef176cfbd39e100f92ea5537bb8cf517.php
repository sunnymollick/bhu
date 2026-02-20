<?php $__env->startSection('title', 'Forgot Password - Bengali Hindu Unity'); ?>

<?php $__env->startSection('stylesheet'); ?>
<style>
    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .is-invalid {
        border-color: #dc3545;
    }

    /* Forgot Password box styling */
    .forgot-password-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
    }

    .forgot-password-box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 40px;
        max-width: 500px;
        margin: 0 auto;
    }

    .forgot-password-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .forgot-password-header .icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(to right, #dc8a45, #5c5555);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: #fff;
        font-size: 32px;
    }

    .forgot-password-header h4 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 8px;
    }

    .forgot-password-header p {
        color: #6c757d;
        font-size: 15px;
        line-height: 1.6;
    }

    .form-group label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }

    .form-control {
        height: 50px;
        border-radius: 8px;
        border: 2px solid #e0e0e0;
        padding: 12px 20px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
    }

    .sigma_btn-custom {
        width: 100%;
        height: 50px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sigma_btn-custom.primary {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: #fff;
    }

    .sigma_btn-custom.primary:hover {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        transform: translateY(-2px);
    }

    .sigma_btn-custom:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    .back-to-login {
        text-align: center;
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #e0e0e0;
    }

    .back-to-login a {
        color: #4a90e2;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        transition: color 0.3s;
    }

    .back-to-login a:hover {
        color: #357abd;
        text-decoration: underline;
    }

    .alert {
        border-radius: 8px;
        padding: 12px 20px;
        margin-bottom: 20px;
        border: none;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    @media (max-width: 576px) {
        .forgot-password-box {
            padding: 30px 20px;
        }

        .forgot-password-header h4 {
            font-size: 24px;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subheader'); ?>
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Forgot Password</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="<?php echo e(route('frontend.index')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a class="btn-link" href="<?php echo e(route('login')); ?>">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Forgot Password Start -->
<div class="forgot-password-section">
    <div class="container">
        <div class="forgot-password-box">
            <div class="forgot-password-header">
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h4 class="title">Forgot Password?</h4>
                <p>No worries! Enter your email address and we'll send you a link to reset your password.</p>
            </div>

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('info')): ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> <?php echo e(session('info')); ?>

                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label>Email Address <span class="text-danger">*</span></label>
                    <input
                        type="email"
                        placeholder="Enter your registered email"
                        name="email"
                        id="email"
                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('email')); ?>"
                        
                        autocomplete="email"
                    >
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="sigma_btn-custom primary" id="submitBtn">
                    <span id="btnText">Send Reset Link</span>
                    <span id="btnSpinner" style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Sending...
                    </span>
                </button>

                <div class="back-to-login">
                    <a href="<?php echo e(route('login')); ?>">
                        <i class="fas fa-arrow-left"></i> Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Forgot Password End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_scripts'); ?>
<script>
    $(document).ready(function() {
        // Real-time validation for email
        $('#email').on('input change blur', function() {
            var $input = $(this);
            var value = $input.val().trim();

            // Remove existing custom error
            $input.siblings('.invalid-feedback.custom-error').remove();
            $input.next('.invalid-feedback.custom-error').remove();

            // Check if field is empty
            if (value === '') {
                $input.addClass('is-invalid');
                // Add error only if it doesn't exist
                if ($input.next('.invalid-feedback.custom-error').length === 0) {
                    $input.after('<div class="invalid-feedback custom-error">Email is required</div>');
                }
            }
            // Check for email validity
            else if (!this.validity.valid) {
                $input.addClass('is-invalid');
                // Add error only if it doesn't exist
                if ($input.next('.invalid-feedback.custom-error').length === 0) {
                    $input.after('<div class="invalid-feedback custom-error">Please enter a valid email address</div>');
                }
            }
            // Field is valid
            else {
                $input.removeClass('is-invalid');
            }
        });

        // Form validation on submit
        function validateForm() {
            var isValid = true;
            var $email = $('#email');
            var emailValue = $email.val().trim();

            // Remove all previous custom errors
            $email.siblings('.invalid-feedback.custom-error').remove();
            $email.next('.invalid-feedback.custom-error').remove();

            if (emailValue === '') {
                $email.addClass('is-invalid');
                // Add error only if it doesn't exist
                if ($email.next('.invalid-feedback.custom-error').length === 0) {
                    $email.after('<div class="invalid-feedback custom-error">Email is required</div>');
                }
                isValid = false;
            } else if (!$email[0].validity.valid) {
                $email.addClass('is-invalid');
                // Add error only if it doesn't exist
                if ($email.next('.invalid-feedback.custom-error').length === 0) {
                    $email.after('<div class="invalid-feedback custom-error">Please enter a valid email address</div>');
                }
                isValid = false;
            }

            return isValid;
        }

        // Handle form submission
        $('form').on('submit', function(e) {
            var $submitBtn = $('#submitBtn');
            var $btnText = $('#btnText');
            var $btnSpinner = $('#btnSpinner');

            // Check if already submitting
            if ($submitBtn.prop('disabled')) {
                e.preventDefault();
                return false;
            }

            // Validate form
            if (!validateForm()) {
                e.preventDefault();
                return false;
            }

            // Show spinner and disable button
            $btnText.hide();
            $btnSpinner.show();
            $submitBtn.prop('disabled', true);

            return true;
        });

        // Toastr configuration
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Display success message
        <?php if(session('success')): ?>
            toastr.success('<?php echo e(session('success')); ?>', 'Success');
        <?php endif; ?>

        // Display error message
        <?php if(session('error')): ?>
            toastr.error('<?php echo e(session('error')); ?>', 'Error');
        <?php endif; ?>

        // Display info message
        <?php if(session('info')): ?>
            toastr.info('<?php echo e(session('info')); ?>', 'Info');
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/auth/forgot-password.blade.php ENDPATH**/ ?>