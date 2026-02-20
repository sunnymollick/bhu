<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #8b5a83 0%, #6b4163 100%);
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
        }
        .info-section {
            margin-bottom: 25px;
        }
        .info-label {
            font-weight: 600;
            color: #8b5a83;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        .info-value {
            color: #555;
            font-size: 16px;
            padding: 12px;
            background: #f8f9fa;
            border-left: 3px solid #8b5a83;
            border-radius: 4px;
        }
        .message-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            border-left: 3px solid #8b5a83;
            margin-top: 10px;
            line-height: 1.8;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .email-footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #777;
            font-size: 13px;
            border-top: 1px solid #e0e0e0;
        }
        .timestamp {
            color: #999;
            font-size: 13px;
            margin-top: 20px;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>📧 New Contact Form Submission</h1>
        </div>

        <div class="email-body">
            <p style="font-size: 16px; color: #555; margin-bottom: 30px;">
                You have received a new message from your website contact form.
            </p>

            <div class="info-section">
                <div class="info-label">Full Name</div>
                <div class="info-value"><?php echo e($contact->full_name); ?></div>
            </div>

            <div class="info-section">
                <div class="info-label">Email Address</div>
                <div class="info-value">
                    <a href="mailto:<?php echo e($contact->email); ?>" style="color: #8b5a83; text-decoration: none;">
                        <?php echo e($contact->email); ?>

                    </a>
                </div>
            </div>

            <div class="info-section">
                <div class="info-label">Subject</div>
                <div class="info-value"><?php echo e($contact->subject); ?></div>
            </div>

            <div class="info-section">
                <div class="info-label">Message</div>
                <div class="message-box"><?php echo e($messageText); ?></div>
            </div>

            <div class="timestamp">
                Submitted on <?php echo e($contact->created_at->format('F j, Y \a\t g:i A')); ?>

            </div>
        </div>

        <div class="email-footer">
            <p style="margin: 0;">This is an automated notification from Bengali Hindu Unity website.</p>
            <p style="margin: 5px 0 0 0;">Please respond to the sender directly at their email address.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/emails/contact-notification.blade.php ENDPATH**/ ?>