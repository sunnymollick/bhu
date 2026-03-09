@extends('frontend.layouts.default')
@section('title', 'Reset Password - Bengali Hindu Unity')

@section('stylesheet')
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

    /* Reset Password box styling */
    .reset-password-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
    }

    .reset-password-box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 40px;
        max-width: 550px;
        margin: 0 auto;
    }

    .reset-password-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .reset-password-header .icon {
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

    .reset-password-header h4 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 8px;
    }

    .reset-password-header p {
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
        padding: 12px 20px 12px 45px;
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

    .password-field {
        position: relative;
    }

    .password-field .icon-left {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 16px;
        z-index: 10;
    }

    .toggle-password {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
        font-size: 18px;
        z-index: 10;
        transition: color 0.3s;
    }

    .toggle-password:hover {
        color: #4a90e2;
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

    #password_strength {
        margin-top: 10px;
    }

    #password_strength .progress {
        height: 5px;
        border-radius: 3px;
        overflow: hidden;
        background-color: #e9ecef;
    }

    #password_strength .progress-bar {
        transition: width 0.3s ease, background-color 0.3s ease;
    }

    #password_strength_text {
        display: block;
        margin-top: 5px;
        font-size: 13px;
        font-weight: 600;
    }

    .password-requirements {
        background-color: #f8f9fa;
        border-left: 4px solid #4a90e2;
        padding: 15px;
        margin: 15px 0;
        border-radius: 4px;
        font-size: 14px;
    }

    .password-requirements ul {
        margin: 10px 0 0 0;
        padding-left: 20px;
    }

    .password-requirements li {
        margin: 5px 0;
        color: #495057;
    }

    @media (max-width: 576px) {
        .reset-password-box {
            padding: 30px 20px;
        }

        .reset-password-header h4 {
            font-size: 24px;
        }
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Reset Password</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-normal">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('frontend.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('login') }}">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<!-- Reset Password Start -->
<div class="reset-password-section">
    <div class="container">
        <div class="reset-password-box">
            <div class="reset-password-header">
                <div class="icon">
                    <i class="fas fa-key"></i>
                </div>
                <h4 class="title">Reset Your Password</h4>
                <p>Please enter your new password below. Make sure it's strong and secure.</p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="form-group">
                    <label>Email Address</label>
                    <div class="password-field">
                        <i class="fas fa-envelope icon-left"></i>
                        <input
                            type="email"
                            class="form-control"
                            value="{{ $email }}"
                            readonly
                            style="background-color: #f8f9fa; cursor: not-allowed;"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label>New Password <span class="text-danger">*</span></label>
                    <div class="password-field">
                        <i class="fas fa-lock icon-left"></i>
                        <input
                            type="password"
                            placeholder="Enter new password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required
                        >
                        <span toggle="#password" class="fa fa-eye-slash toggle-password"></span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="password_strength" style="display: none;">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small id="password_strength_text"></small>
                    </div>
                    <div id="password_requirements" class="mt-2" style="display: none;">
                        <small class="text-muted d-block mb-1"><strong>Password Requirements:</strong></small>
                        <small id="req_length" class="d-block" style="color: #dc3545;">✗ Minimum 8 characters</small>
                        <small id="req_lowercase" class="d-block" style="color: #dc3545;">✗ At least one lowercase letter</small>
                        <small id="req_uppercase" class="d-block" style="color: #dc3545;">✗ At least one uppercase letter</small>
                        <small id="req_number" class="d-block" style="color: #dc3545;">✗ At least one number</small>
                        <small id="req_special" class="d-block" style="color: #dc3545;">✗ At least one special character (@$!%*#?&)</small>
                    </div>
                </div>

                <div class="form-group">
                    <label>Confirm New Password <span class="text-danger">*</span></label>
                    <div class="password-field">
                        <i class="fas fa-lock icon-left"></i>
                        <input
                            type="password"
                            placeholder="Confirm new password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            required
                        >
                        <span toggle="#password_confirmation" class="fa fa-eye-slash toggle-password"></span>
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="password_match_error" class="invalid-feedback" style="display: none;">Passwords do not match</div>
                </div>

                <button type="submit" class="sigma_btn-custom primary" id="submitBtn">
                    <span id="btnText">Reset Password</span>
                    <span id="btnSpinner" style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Resetting...
                    </span>
                </button>

                <div class="back-to-login">
                    <a href="{{ route('login') }}">
                        <i class="fas fa-arrow-left"></i> Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Reset Password End -->
@endsection

@section('custom_scripts')
<script>
    $(document).ready(function() {
        // Password strength checker
        function checkPasswordStrength(password) {
            var strength = 0;
            if (password.length >= 8) strength += 1;
            if (password.length >= 12) strength += 1;
            if (/[a-z]/.test(password)) strength += 1;
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^a-zA-Z0-9]/.test(password)) strength += 1;

            var strengthText = '';
            var strengthPercent = 0;
            var strengthColor = '';

            if (strength <= 2) {
                strengthText = 'Weak';
                strengthPercent = 33;
                strengthColor = '#dc3545';
            } else if (strength <= 4) {
                strengthText = 'Medium';
                strengthPercent = 66;
                strengthColor = '#ffc107';
            } else {
                strengthText = 'Strong';
                strengthPercent = 100;
                strengthColor = '#28a745';
            }

            return { text: strengthText, percent: strengthPercent, color: strengthColor };
        }

        // Password validation with strength indicator
        $('#password').on('input change blur', function(e) {
            var password = $(this).val();
            var $strengthDiv = $('#password_strength');
            var $strengthBar = $strengthDiv.find('.progress-bar');
            var $strengthText = $('#password_strength_text');
            var $requirementsDiv = $('#password_requirements');
            var $input = $(this);
            var $formGroup = $input.closest('.form-group');

            // Remove ALL invalid-feedback messages within the form-group
            $formGroup.find('.invalid-feedback:not(#password_match_error)').remove();

            if (password.length > 0) {
                $strengthDiv.show();
                var strength = checkPasswordStrength(password);

                $strengthBar.css('width', strength.percent + '%')
                    .css('background-color', strength.color);
                $strengthText.text('Password Strength: ' + strength.text)
                    .css('color', strength.color);

                // Validate each requirement
                var hasMinLength = password.length >= 8;
                var hasLowercase = /[a-z]/.test(password);
                var hasUppercase = /[A-Z]/.test(password);
                var hasNumber = /[0-9]/.test(password);
                var hasSpecial = /[@$!%*#?&]/.test(password);

                // Update requirement indicators
                updateRequirement('#req_length', hasMinLength, 'Minimum 8 characters');
                updateRequirement('#req_lowercase', hasLowercase, 'At least one lowercase letter');
                updateRequirement('#req_uppercase', hasUppercase, 'At least one uppercase letter');
                updateRequirement('#req_number', hasNumber, 'At least one number');
                updateRequirement('#req_special', hasSpecial, 'At least one special character (@$!%*#?&)');

                // Check if all requirements are met
                var allValid = hasMinLength && hasLowercase && hasUppercase && hasNumber && hasSpecial;

                if (!allValid) {
                    // Show requirements and mark field as invalid
                    $requirementsDiv.show();
                    $input.addClass('is-invalid').css('border-color', '#dc3545');
                } else {
                    // Hide requirements and mark field as valid
                    $requirementsDiv.hide();
                    $input.removeClass('is-invalid').css('border-color', '');
                }
            } else {
                // Field is empty
                $strengthDiv.hide();
                $requirementsDiv.hide();

                // Show required error on blur if field is empty
                if (e.type === 'blur' || $input.data('touched')) {
                    $input.addClass('is-invalid').css('border-color', '#dc3545');
                    $input.parent().after('<div class="invalid-feedback" style="display: block;">This field is required</div>');
                    $input.data('touched', true);
                } else {
                    $input.removeClass('is-invalid').css('border-color', '');
                }
            }

            // Check password match
            validatePasswordMatch();
        });

        // Helper function to update requirement status
        function updateRequirement(selector, isValid, text) {
            var $elem = $(selector);
            if (isValid) {
                $elem.html('✓ ' + text).css('color', '#28a745');
            } else {
                $elem.html('✗ ' + text).css('color', '#dc3545');
            }
        }

        // Password confirmation validation
        function validatePasswordMatch() {
            var password = $('#password').val();
            var confirmPassword = $('#password_confirmation').val();

            if (confirmPassword && password !== confirmPassword) {
                $('#password_confirmation').addClass('is-invalid');
                $('#password_match_error').show();
            } else if (confirmPassword) {
                $('#password_confirmation').removeClass('is-invalid');
                $('#password_match_error').hide();
            }
        }

        $('#password_confirmation').on('input change blur', validatePasswordMatch);

        // Toggle password visibility
        $('.toggle-password').on('click', function() {
            var input = $($(this).attr('toggle'));
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                input.attr('type', 'password');
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });

        // Form validation
        function validateForm() {
            var isValid = true;
            var invalidFields = [];

            // Validate password
            var password = $('#password').val();

            // Check all password requirements
            var hasMinLength = password.length >= 8;
            var hasLowercase = /[a-z]/.test(password);
            var hasUppercase = /[A-Z]/.test(password);
            var hasNumber = /[0-9]/.test(password);
            var hasSpecial = /[@$!%*#?&]/.test(password);
            var allValid = hasMinLength && hasLowercase && hasUppercase && hasNumber && hasSpecial;

            if (!allValid) {
                $('#password').addClass('is-invalid').css('border-color', '#dc3545');
                $('#password_requirements').show();
                isValid = false;
                invalidFields.push($('#password'));
            }

            // Validate password confirmation
            var confirmPassword = $('#password_confirmation').val();
            if (confirmPassword && password !== confirmPassword) {
                $('#password_confirmation').addClass('is-invalid');
                $('#password_match_error').show();
                isValid = false;
                invalidFields.push($('#password_confirmation'));
            }

            if (!isValid && invalidFields.length > 0) {
                invalidFields[0][0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                setTimeout(function() { invalidFields[0].focus(); }, 700);
            }

            return isValid;
        }

        // Handle form submission
        $('form').on('submit', function(e) {
            var $submitBtn = $('#submitBtn');
            var $btnText = $('#btnText');
            var $btnSpinner = $('#btnSpinner');

            if ($submitBtn.prop('disabled')) {
                e.preventDefault();
                return false;
            }

            if (!validateForm()) {
                e.preventDefault();
                return false;
            }

            $btnText.hide();
            $btnSpinner.show();
            $submitBtn.prop('disabled', true);

            return true;
        });

        // Toastr configuration
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        @if(session('error'))
            toastr.error('{{ session('error') }}', 'Error');
        @endif
    });
</script>
@endsection
