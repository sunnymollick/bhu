<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Approved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #4caf50;
        }
        .header h1 {
            color: #4caf50;
            margin: 0;
        }
        .content {
            padding: 20px 0;
        }
        .success-box {
            background: #e8f5e9;
            padding: 15px;
            border-left: 4px solid #4caf50;
            margin: 20px 0;
            border-radius: 4px;
        }
        .success-box p {
            margin: 8px 0;
            color: #2e7d32;
        }
        .info-box {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #2196f3;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-box p {
            margin: 8px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Account Approved!</h1>
        </div>

        <div class="content">
            <p>Dear <?php echo e($user->name); ?>,</p>

            <div class="success-box">
                <p><strong>Great news!</strong> Your account has been approved by our administrator.</p>
            </div>

            <p>You can now login and access all features of Bengali Hindu Unity platform.</p>

            <div class="info-box">
                <p><strong>Your Login Email:</strong> <?php echo e($user->email); ?></p>
                <p><strong>Note:</strong> Use the password provided in your registration confirmation email.</p>
            </div>

            <p style="text-align: center;">
                <a href="<?php echo e(route('login')); ?>" class="button">Login Now</a>
            </p>

            <p>If you have forgotten your password or need any assistance, please contact our support team.</p>

            <p>We're excited to have you as part of our community!</p>

            <p>Best regards,<br>
            <strong>Bengali Hindu Unity Team</strong></p>
        </div>

        <div class="footer">
            <p>&copy; <?php echo e(date('Y')); ?> Bengali Hindu Unity. All rights reserved.</p>
            <p>This is an automated email. Please do not reply to this message.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/emails/user-approved.blade.php ENDPATH**/ ?>