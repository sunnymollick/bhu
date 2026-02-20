@extends('backend.layouts.default')

@section('stylesheet')
<style>
    .password-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        overflow: hidden;
        margin-bottom: 2rem;
        border: none;
    }

    .password-card-header {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        padding: 1.5rem;
        color: #fff;
    }

    .btn-change-password {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        border: none;
        color: #fff;
        padding: 0.75rem 3rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(220, 138, 69, 0.25);
    }

    .btn-change-password:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 138, 69, 0.35);
        color: #fff;
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-control {
        border: 2px solid #ecf0f1;
        border-radius: 10px;
        padding: 0.65rem 1rem;
        padding-right: 3rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #dc8a45;
        box-shadow: 0 0 0 0.2rem rgba(220, 138, 69, 0.15);
    }

    .password-field-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 42px;
        cursor: pointer;
        color: #7f8c8d;
        z-index: 10;
        font-size: 1.1rem;
        transition: color 0.3s;
    }

    .password-toggle:hover {
        color: #dc8a45;
    }

    .password-requirements {
        background: linear-gradient(135deg, rgba(220, 138, 69, 0.05) 0%, rgba(92, 85, 85, 0.05) 100%);
        padding: 1.5rem;
        border-radius: 15px;
        margin-top: 1.5rem;
        border-left: 4px solid #dc8a45;
    }

    .password-requirements ul {
        margin-bottom: 0;
        padding-left: 1.5rem;
    }

    .password-requirements li {
        font-size: 0.9rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .password-requirements li::marker {
        color: #dc8a45;
    }
</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Change Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.profile') }}">Profile</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="password-card">
                    <div class="password-card-header">
                        <h3 class="mb-0"><i class="fas fa-lock mr-2"></i>Update Your Password</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.user.update.password') }}" method="POST" id="changePasswordForm" novalidate>
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="password-field-wrapper">
                                        <div class="form-group">
                                            <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                                            <i class="fas fa-eye password-toggle" data-target="current_password"></i>
                                            @error('current_password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="password-field-wrapper">
                                        <div class="form-group">
                                            <label for="new_password" class="form-label">New Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required>
                                            <i class="fas fa-eye password-toggle" data-target="new_password"></i>
                                            @error('new_password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <div id="password_strength" class="mt-2" style="display: none;">
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                                </div>
                                                <small id="password_strength_text" style="display: block; margin-top: 5px;"></small>
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
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="password-field-wrapper">
                                        <div class="form-group">
                                            <label for="new_password_confirmation" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                            <i class="fas fa-eye password-toggle" data-target="new_password_confirmation"></i>
                                            <div id="password_match_error" class="invalid-feedback" style="display: none;">Passwords do not match</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="col-12 mt-4 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap" style="gap: 10px;">
                                        <a href="{{ route('admin.user.profile') }}" class="btn btn-secondary btn-lg">
                                            <i class="fas fa-arrow-left mr-2"></i>Back to Profile
                                        </a>
                                        <button type="submit" class="btn btn-change-password btn-lg">
                                            <i class="fas fa-key mr-2"></i>Change Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                        $(document).ready(function() {
                            // Password strength checker
                            function checkPasswordStrength(password) {
                                var strength = 0;
                                if (password.length >= 8) strength += 1;
                                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
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
                            $('#new_password').on('input change blur', function(e) {
                                var password = $(this).val();
                                var $strengthDiv = $('#password_strength');
                                var $strengthBar = $strengthDiv.find('.progress-bar');
                                var $strengthText = $('#password_strength_text');
                                var $requirementsDiv = $('#password_requirements');
                                var $input = $(this);
                                var $formGroup = $input.closest('.form-group');

                                // Remove ALL invalid-feedback messages within the form-group
                                $formGroup.find('.invalid-feedback:not([data-server-error])').remove();

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
                                var password = $('#new_password').val();
                                var confirmPassword = $('#new_password_confirmation').val();

                                if (confirmPassword && password !== confirmPassword) {
                                    $('#new_password_confirmation').addClass('is-invalid');
                                    $('#password_match_error').show();
                                } else if (confirmPassword) {
                                    $('#new_password_confirmation').removeClass('is-invalid');
                                    $('#password_match_error').hide();
                                }
                            }

                            $('#new_password_confirmation').on('input change blur', validatePasswordMatch);

                            // Current password validation
                            $('#current_password').on('input change blur', function(e) {
                                var $input = $(this);
                                var $wrapper = $input.closest('.password-field-wrapper');
                                var $formGroup = $input.closest('.form-group');

                                // Remove only client-side added error messages (those added by this script)
                                $formGroup.find('.invalid-feedback').filter(function() {
                                    return $(this).text() === 'This field is required';
                                }).remove();

                                if (!$input.val() || $input.val().trim() === '') {
                                    // Show required error on blur if field is empty
                                    if (e.type === 'blur' || $input.data('touched')) {
                                        $input.addClass('is-invalid').css('border-color', '#dc3545');
                                        $formGroup.append('<div class="invalid-feedback" style="display: block;">This field is required</div>');
                                        $input.data('touched', true);
                                    }
                                } else {
                                    // Field has value, remove error and clear touched state
                                    $input.removeClass('is-invalid').css('border-color', '');
                                    $input.data('touched', false);
                                }
                            });
                        });

                        // Password toggle functionality
                        document.querySelectorAll('.password-toggle').forEach(function(icon) {
                            icon.addEventListener('click', function() {
                                const targetId = this.getAttribute('data-target');
                                const field = document.getElementById(targetId);

                                if (field && field.type === 'password') {
                                    field.type = 'text';
                                    this.classList.remove('fa-eye');
                                    this.classList.add('fa-eye-slash');
                                } else if (field) {
                                    field.type = 'password';
                                    this.classList.remove('fa-eye-slash');
                                    this.classList.add('fa-eye');
                                }
                            });
                        });

                        // Form validation
                        const changePasswordForm = document.getElementById('changePasswordForm');
                        if (changePasswordForm) {
                            changePasswordForm.addEventListener('submit', function(e) {
                                const currentPassword = document.getElementById('current_password');
                                const newPassword = document.getElementById('new_password');
                                const confirmPassword = document.getElementById('new_password_confirmation');

                                let isValid = true;
                                let firstError = null;

                                // Validate current password
                                const currentPasswordFormGroup = currentPassword.closest('.form-group');
                                // Remove only client-side added errors (those with "This field is required" text)
                                if (currentPasswordFormGroup) {
                                    const existingErrors = currentPasswordFormGroup.querySelectorAll('.invalid-feedback');
                                    existingErrors.forEach(error => {
                                        if (error.textContent === 'This field is required') {
                                            error.remove();
                                        }
                                    });
                                }

                                if (!currentPassword.value || currentPassword.value.trim() === '') {
                                    currentPassword.classList.add('is-invalid');
                                    currentPassword.style.borderColor = '#dc3545';
                                    // Add error message
                                    const errorDiv = document.createElement('div');
                                    errorDiv.className = 'invalid-feedback';
                                    errorDiv.style.display = 'block';
                                    errorDiv.textContent = 'This field is required';
                                    if (currentPasswordFormGroup) {
                                        currentPasswordFormGroup.appendChild(errorDiv);
                                    }
                                    isValid = false;
                                    firstError = firstError || currentPassword;
                                }

                                // Validate new password requirements
                                var password = newPassword.value;
                                var hasMinLength = password.length >= 8;
                                var hasLowercase = /[a-z]/.test(password);
                                var hasUppercase = /[A-Z]/.test(password);
                                var hasNumber = /[0-9]/.test(password);
                                var hasSpecial = /[@$!%*#?&]/.test(password);
                                var allValid = hasMinLength && hasLowercase && hasUppercase && hasNumber && hasSpecial;

                                if (!allValid) {
                                    newPassword.classList.add('is-invalid');
                                    document.getElementById('password_requirements').style.display = 'block';
                                    isValid = false;
                                    firstError = firstError || newPassword;
                                }

                                // Validate password confirmation
                                if (password !== confirmPassword.value) {
                                    confirmPassword.classList.add('is-invalid');
                                    document.getElementById('password_match_error').style.display = 'block';
                                    isValid = false;
                                    firstError = firstError || confirmPassword;
                                }

                                if (!isValid) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    if (firstError) {
                                        firstError.focus();
                                    }
                                    return false;
                                }
                            });
                        }

                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
