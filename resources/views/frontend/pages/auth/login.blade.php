@extends('frontend.layouts.default')
@section('title', 'Login - Bengali Hindu Unity')

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

    /* Login box styling */
    .login-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
    }

    .login-box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 40px;
        max-width: 600px;
        margin: 0 auto;
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-header h4 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 8px;
    }

    .login-header p {
        color: #6c757d;
        font-size: 15px;
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

    .password-field {
        position: relative;
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

    .login-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .remember-me {
        display: flex;
        align-items: center;
    }

    .remember-me input[type="checkbox"] {
        width: 18px;
        height: 18px;
        margin-right: 8px;
        cursor: pointer;
    }

    .remember-me label {
        margin-bottom: 0;
        cursor: pointer;
        font-weight: 500;
        color: #495057;
    }

    .forgot-password {
        color: #4a90e2;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        transition: color 0.3s;
    }

    .forgot-password:hover {
        color: #357abd;
        text-decoration: underline;
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

    .register-link {
        text-align: center;
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #e0e0e0;
    }

    .register-link p {
        margin-bottom: 0;
        color: #6c757d;
        font-size: 15px;
    }

    .register-link a {
        color: #4a90e2;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s;
    }

    .register-link a:hover {
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

    @media (max-width: 576px) {
        .login-box {
            padding: 30px 20px;
        }

        .login-header h4 {
            font-size: 24px;
        }

        .login-options {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Login</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('frontend.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<!-- Login Start -->
<div class="login-section">
    <div class="container">
        <div class="login-box">
            <div class="login-header">
                <h4 class="title">Welcome Back</h4>
                <p>Please login to your account</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form method="post" action="{{ route('auth.login.store') }}">
                @csrf

                <div class="form-group">
                    <label>Email Address <span class="text-danger">*</span></label>
                    <input
                        type="email"
                        placeholder="Enter your email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"

                        autocomplete="email"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label>
                    <div class="password-field">
                        <input
                            type="password"
                            placeholder="Enter your password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"

                            autocomplete="current-password"
                        >
                        <span toggle="#password" class="fa fa-eye-slash toggle-password"></span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="login-options">
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit" class="sigma_btn-custom primary" id="submitBtn">
                    <span id="btnText">Login</span>
                    <span id="btnSpinner" style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Logging in...
                    </span>
                </button>

                <div class="register-link">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register Here</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Login End -->
@endsection

@section('custom_scripts')
<script>
    $(document).ready(function() {
        // Scroll to error message on page load if exists
        @if($errors->any())
            var errorAlert = $('.alert-danger').first();
            if (errorAlert.length > 0) {
                errorAlert[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                // Focus on the first invalid field
                setTimeout(function() {
                    var firstInvalid = $('.is-invalid').first();
                    if (firstInvalid.length > 0) {
                        firstInvalid.focus();
                    }
                }, 700);
            }
        @endif

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
                if ($input.next('.invalid-feedback.custom-error').length === 0) {
                    $input.after('<div class="invalid-feedback custom-error">Email is required</div>');
                }
            }
            // Check for email validity
            else if (!this.validity.valid) {
                $input.addClass('is-invalid');
                if ($input.next('.invalid-feedback.custom-error').length === 0) {
                    $input.after('<div class="invalid-feedback custom-error">Please enter a valid email address</div>');
                }
            }
            // Field is valid
            else {
                $input.removeClass('is-invalid');
            }
        });

        // Real-time validation for password
        $('#password').on('input change blur', function() {
            var $input = $(this);
            var value = $input.val();

            // Remove existing custom error
            $input.parent().siblings('.invalid-feedback.custom-error').remove();
            $input.parent().next('.invalid-feedback.custom-error').remove();

            // Check if field is empty
            if (value === '') {
                $input.addClass('is-invalid');
                if ($input.parent().next('.invalid-feedback.custom-error').length === 0) {
                    $input.parent().after('<div class="invalid-feedback custom-error">Password is required</div>');
                }
            }
            // Field is valid
            else {
                $input.removeClass('is-invalid');
            }
        });

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

        // Form validation on submit
        function validateForm() {
            var isValid = true;
            var invalidFields = [];

            // Validate email
            var $email = $('#email');
            var emailValue = $email.val().trim();

            $email.siblings('.invalid-feedback.custom-error').remove();
            $email.next('.invalid-feedback.custom-error').remove();

            if (emailValue === '') {
                $email.addClass('is-invalid');
                if ($email.next('.invalid-feedback.custom-error').length === 0) {
                    $email.after('<div class="invalid-feedback custom-error">Email is required</div>');
                }
                isValid = false;
                invalidFields.push($email);
            } else if (!$email[0].validity.valid) {
                $email.addClass('is-invalid');
                if ($email.next('.invalid-feedback.custom-error').length === 0) {
                    $email.after('<div class="invalid-feedback custom-error">Please enter a valid email address</div>');
                }
                isValid = false;
                invalidFields.push($email);
            }

            // Validate password
            var $password = $('#password');
            var passwordValue = $password.val();

            $password.parent().siblings('.invalid-feedback.custom-error').remove();
            $password.parent().next('.invalid-feedback.custom-error').remove();

            if (passwordValue === '') {
                $password.addClass('is-invalid');
                if ($password.parent().next('.invalid-feedback.custom-error').length === 0) {
                    $password.parent().after('<div class="invalid-feedback custom-error">Password is required</div>');
                }
                isValid = false;
                invalidFields.push($password);
            }

            // Scroll to first error if validation fails
            if (!isValid && invalidFields.length > 0) {
                invalidFields[0][0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                setTimeout(function() {
                    invalidFields[0].focus();
                }, 700);
            }

            return isValid;
        }

        // Handle form submission via AJAX
        $('form').on('submit', function(e) {
            e.preventDefault();

            var $form = $(this);
            var $submitBtn = $('#submitBtn');
            var $btnText = $('#btnText');
            var $btnSpinner = $('#btnSpinner');

            // Check if already submitting
            if ($submitBtn.prop('disabled')) {
                return false;
            }

            // Validate form
            if (!validateForm()) {
                return false;
            }

            // Show spinner and disable button
            $btnText.hide();
            $btnSpinner.show();
            $submitBtn.prop('disabled', true);

            // Submit form via AJAX
            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        toastr.success(response.message, 'Success');

                        // Store success message in sessionStorage for admin panel
                        sessionStorage.setItem('loginSuccess', 'true');
                        sessionStorage.setItem('loginUserName', response.user.name);

                        // Open admin dashboard in new tab
                        window.open(response.redirect_url, '_blank');

                        // Reload current page to show logged in status
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    } else {
                        // Show error message
                        toastr.error(response.message, 'Login Failed');

                        // Reset button
                        $btnText.show();
                        $btnSpinner.hide();
                        $submitBtn.prop('disabled', false);
                    }
                },
                error: function(xhr) {
                    var errorMessage = 'An error occurred. Please try again.';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.status === 401) {
                        errorMessage = 'Invalid credentials.';
                    } else if (xhr.status === 403) {
                        errorMessage = xhr.responseJSON.message || 'Access denied.';
                    } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                        // Validation errors
                        var errors = xhr.responseJSON.errors;
                        errorMessage = '';
                        $.each(errors, function(field, messages) {
                            $.each(messages, function(index, message) {
                                if (errorMessage) errorMessage += '<br>';
                                errorMessage += message;
                            });
                        });
                    }

                    toastr.error(errorMessage, 'Login Error');

                    // Reset button
                    $btnText.show();
                    $btnSpinner.hide();
                    $submitBtn.prop('disabled', false);
                }
            });

            return false;
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
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Display success message
        @if(session('success'))
            toastr.success('{{ session('success') }}', 'Success');
        @endif

        // Display error messages via toastr
        @if($errors->has('email'))
            toastr.error('{{ $errors->first('email') }}', 'Login Error');
        @endif

        @if($errors->has('password'))
            toastr.error('{{ $errors->first('password') }}', 'Validation Error');
        @endif
    });
</script>
@endsection
