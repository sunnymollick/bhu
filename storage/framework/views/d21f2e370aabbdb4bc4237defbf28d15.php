<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Bengali Hindu Unity</title>
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
        .credentials {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #4caf50;
            margin: 20px 0;
        }
        .credentials p {
            margin: 8px 0;
        }
        .credentials strong {
            color: #333;
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
            <h1>Welcome to Bengali Hindu Unity!</h1>
        </div>

        <div class="content">
            <p>Dear <?php echo e($user->name); ?>,</p>

            <p>Thank you for registering with Bengali Hindu Unity. Your account has been successfully created!</p>

            <div class="credentials">
                <p><strong>Your Registration Details:</strong></p>
                <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                <p><strong>Status:</strong> Pending Admin Approval</p>
            </div>

            <p><strong>Important:</strong> Please verify your email address by clicking the button below. After verification, your account will be pending admin approval before you can log in.</p>

            <p style="text-align: center;">
                <a href="<?php echo e($verificationUrl); ?>" class="button">Verify Your Email</a>
            </p>

            <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>

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
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/emails/welcome.blade.php ENDPATH**/ ?>