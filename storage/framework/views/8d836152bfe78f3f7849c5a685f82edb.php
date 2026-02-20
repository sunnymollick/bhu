<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply from Bengali Hindu Unity</title>
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
        .greeting {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
        .message-content {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            border-left: 4px solid #8b5a83;
            margin: 25px 0;
            line-height: 1.8;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .original-message {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
        }
        .original-message-header {
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .original-message-content {
            background: #fff;
            padding: 15px;
            border-left: 3px solid #ddd;
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            white-space: pre-wrap;
        }
        .email-footer {
            background: #f8f9fa;
            padding: 25px;
            text-align: center;
            color: #777;
            font-size: 13px;
            border-top: 1px solid #e0e0e0;
        }
        .contact-info {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e0e0e0;
        }
        .contact-info p {
            margin: 5px 0;
        }
        .signature {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #555;
        }
        .signature strong {
            color: #8b5a83;
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>📧 Reply from Bengali Hindu Unity</h1>
        </div>

        <div class="email-body">
            <div class="greeting">
                Dear <?php echo e($contact->full_name); ?>,
            </div>

            <p style="color: #555; line-height: 1.8;">
                Thank you for reaching out to us. We have received your message and here is our response:
            </p>

            <div class="message-content">
                <?php echo e($replyMessage); ?>

            </div>

            <p style="color: #555; line-height: 1.8;">
                If you have any further questions or concerns, please don't hesitate to contact us again. We're here to help!
            </p>

            <div class="signature">
                <strong>Best regards,</strong>
                <p style="margin: 5px 0;">Bengali Hindu Unity Team</p>
                <p style="margin: 5px 0; color: #777; font-size: 14px;">admin@bengalihindunity.com</p>
            </div>

            <div class="original-message">
                <div class="original-message-header">
                    YOUR ORIGINAL MESSAGE:
                </div>
                <div style="color: #777; font-size: 13px; margin-bottom: 10px;">
                    <strong>Subject:</strong> <?php echo e($contact->subject); ?><br>
                    <strong>Date:</strong> <?php echo e($contact->created_at->format('F d, Y \a\t h:i A')); ?>

                </div>
                <div class="original-message-content">
                    <?php echo e(is_array($contact->message) ? $contact->message[0]['message'] : $contact->message); ?>

                </div>
            </div>
        </div>

        <div class="email-footer">
            <p style="margin: 0 0 10px 0;"><strong>Bengali Hindu Unity</strong></p>
            <p style="margin: 5px 0;">This is an automated response from our contact system.</p>
            <p style="margin: 5px 0;">Please do not reply to this email directly.</p>

            <div class="contact-info">
                <p><strong>Contact Us:</strong></p>
                <p>Email: admin@bengalihindunity.com</p>
                <p>Website: www.bengalihindunity.com</p>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/emails/contact-reply.blade.php ENDPATH**/ ?>