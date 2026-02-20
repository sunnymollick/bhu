<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(to right, #dc8a45, #5c5555);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .message-box {
            background: white;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #dc8a45;
        }
        .message-box h3 {
            margin-top: 0;
            color: #dc8a45;
        }
        .admin-message {
            color: #333;
            line-height: 1.8;
        }
        .admin-message * {
            max-width: 100%;
        }
        .admin-message p {
            margin-bottom: 10px;
        }
        .admin-message ul, .admin-message ol {
            padding-left: 20px;
        }
        .footer {
            background: #333;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 5px 5px;
            font-size: 12px;
        }
        h1 {
            margin: 0;
            font-size: 24px;
        }
        .greeting {
            font-size: 16px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Complete Your Verification</h1>
    </div>

    <div class="content">
        <p class="greeting">Dear <?php echo e($user->name); ?>,</p>

        <p>We hope this email finds you well. This is a reminder from the Bengali Hindu Unity platform regarding your account verification.</p>

        <div class="message-box">
            <h3>Message from Admin (<?php echo e($adminName); ?>):</h3>
            <div class="admin-message"><?php echo $customMessage; ?></div>
        </div>

        <p><strong>Please complete your verification process to activate your account.</strong></p>

        <p>If you have any questions or need assistance, please reply to this email and we'll be happy to help you.</p>

        <p>Best regards,<br>
        Bengali Hindu Unity Team</p>
    </div>

    <div class="footer">
        <p>&copy; <?php echo e(date('Y')); ?> Bengali Hindu Unity. All rights reserved.</p>
    </div>
</body>
</html>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/emails/verification-reminder.blade.php ENDPATH**/ ?>