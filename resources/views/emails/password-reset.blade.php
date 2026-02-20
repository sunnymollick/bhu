<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Bengali Hindu Unity</title>
    <style>
        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .email-header {
            background: linear-gradient(to right, #dc8a45, #5c5555);
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .email-body {
            padding: 40px 30px;
            color: #333333;
            line-height: 1.6;
        }
        .email-body h2 {
            color: #dc8a45;
            margin-top: 0;
            font-size: 22px;
        }
        .email-body p {
            margin: 15px 0;
            font-size: 16px;
        }
        .button {
            display: inline-block;
            padding: 14px 32px;
            background: linear-gradient(to right, #dc8a45, #5c5555);
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            margin: 25px 0;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.3s;
        }
        .button:hover {
            transform: translateY(-2px);
        }
        .button-container {
            text-align: center;
        }
        .security-notice {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 25px 0;
            border-radius: 4px;
        }
        .security-notice p {
            margin: 5px 0;
            font-size: 14px;
            color: #856404;
        }
        .alternative-link {
            word-break: break-all;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
            font-size: 13px;
            color: #666;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 25px 30px;
            text-align: center;
            color: #666666;
            font-size: 14px;
            border-top: 1px solid #e0e0e0;
        }
        .email-footer p {
            margin: 8px 0;
        }
        .email-footer a {
            color: #dc8a45;
            text-decoration: none;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 20px;
            }
            .email-body {
                padding: 25px 20px;
            }
            .button {
                padding: 12px 24px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>🔐 Password Reset Request</h1>
        </div>

        <div class="email-body">
            <h2>Hello {{ $userName }},</h2>

            <p>We received a request to reset your password for your Bengali Hindu Unity account. If you made this request, click the button below to reset your password:</p>

            <div class="button-container">
                <a href="{{ $resetUrl }}" class="button">Reset Password</a>
            </div>

            <div class="security-notice">
                <p><strong>⏰ Important:</strong></p>
                <p>This password reset link will expire in <strong>{{ $expiryTime }} minutes</strong>.</p>
                <p>For security reasons, please do not share this link with anyone.</p>
            </div>

            <p><strong>If the button above doesn't work, copy and paste this link into your browser:</strong></p>
            <div class="alternative-link">
                {{ $resetUrl }}
            </div>

            <p style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                <strong>⚠️ Didn't request this?</strong><br>
                If you didn't request a password reset, you can safely ignore this email. Your password will remain unchanged. However, if you're concerned about your account security, please contact us immediately.
            </p>
        </div>

        <div class="email-footer">
            <p><strong>Bengali Hindu Unity</strong></p>
            <p>Building bridges, strengthening communities</p>
            <p>
                <a href="mailto:info@bengalihinduunity.com">info@bengalihinduunity.com</a><br>
                <a href="{{ route('frontend.index') }}">Visit Our Website</a>
            </p>
            <p style="margin-top: 15px; font-size: 12px; color: #999;">
                © {{ date('Y') }} Bengali Hindu Unity. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
