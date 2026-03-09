@extends('frontend.layouts.default')
@section('title', 'Verify Email - Bengali Hindu Unity')

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

    /* Verify Email box styling */
    .verify-email-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
    }

    .verify-email-box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 40px;
        max-width: 550px;
        margin: 0 auto;
    }

    .verify-email-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .verify-email-header .icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(to right, #dc8a45, #5c5555);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: #fff;
        font-size: 36px;
    }

    .verify-email-header h4 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
    }

    .verify-email-header p {
        color: #6c757d;
        font-size: 15px;
        line-height: 1.8;
        margin-bottom: 10px;
    }

    .email-display {
        background: #f8f9fa;
        padding: 15px 20px;
        border-radius: 8px;
        margin: 20px 0;
        text-align: center;
        border-left: 4px solid #dc8a45;
    }

    .email-display strong {
        color: #333;
        font-size: 16px;
    }

    .info-box {
        background: linear-gradient(135deg, rgba(220, 138, 69, 0.05) 0%, rgba(92, 85, 85, 0.05) 100%);
        padding: 20px;
        border-radius: 10px;
        margin: 25px 0;
        border-left: 4px solid #dc8a45;
    }

    .info-box h6 {
        color: #333;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .info-box ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .info-box li {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 8px;
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
        margin-bottom: 15px;
        border-radius: 8px;
    }

    .sigma_btn-custom.primary {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: #fff;
    }

    .sigma_btn-custom.primary:hover {
        background: linear-gradient(to right, #c97a35, #4c4545);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 138, 69, 0.3);
    }

    .sigma_btn-custom.secondary {
        background: #fff;
        color: #333;
        border: 2px solid #e0e0e0;
    }

    .sigma_btn-custom.secondary:hover {
        background: #f8f9fa;
        border-color: #dc8a45;
        color: #dc8a45;
    }

    .sigma_btn-custom:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    .divider {
        text-align: center;
        margin: 20px 0;
        position: relative;
    }

    .divider span {
        background: #fff;
        padding: 0 15px;
        color: #6c757d;
        font-size: 14px;
        position: relative;
        z-index: 1;
    }

    .divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e0e0e0;
    }

    @media (max-width: 576px) {
        .verify-email-box {
            padding: 30px 20px;
        }

        .verify-email-header h4 {
            font-size: 24px;
        }
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Email Verification</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-normal">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('frontend.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('login') }}">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">Verify Email</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<!-- Verify Email Start -->
<div class="verify-email-section">
    <div class="container">
        <div class="verify-email-box">
            <div class="verify-email-header">
                <div class="icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h4 class="title">Verify Your Email Address</h4>
                <p>Before proceeding, please check your email for a verification link.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> {{ session('warning') }}
                </div>
            @endif

            <div class="email-display">
                <strong><i class="fas fa-envelope mr-2"></i>{{ $email }}</strong>
            </div>

            <div class="info-box">
                <h6><i class="fas fa-info-circle mr-2"></i>What to do next:</h6>
                <ul>
                    <li>Check your email inbox for a verification message from us</li>
                    <li>Click the verification link in the email</li>
                    <li>If you don't see the email, check your spam folder</li>
                    <li>After verifying your email, return to login</li>
                </ul>
            </div>

            <a href="{{ route('login') }}" class="sigma_btn-custom primary" style="margin-top: 20px;">
                <i class="fas fa-arrow-left mr-2"></i>Back to Login
            </a>
        </div>
    </div>
</div>
<!-- Verify Email End -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Toastr configuration
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        @if(session('success'))
            toastr.success('{{ session('success') }}', 'Success');
        @endif

        @if(session('error'))
            toastr.error('{{ session('error') }}', 'Error');
        @endif

        @if(session('warning'))
            toastr.warning('{{ session('warning') }}', 'Notice');
        @endif
    });
</script>
@endsection
