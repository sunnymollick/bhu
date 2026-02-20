<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Registration Reference Notification</title>
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
            border-bottom: 2px solid #2196F3;
        }
        .header h1 {
            color: #2196F3;
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px 0;
        }
        .info-box {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #2196F3;
            margin: 20px 0;
        }
        .info-box p {
            margin: 8px 0;
        }
        .info-box strong {
            color: #333;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #777;
            font-size: 14px;
        }
        .highlight {
            color: #2196F3;
            font-weight: bold;
        }
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            margin: 0 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: opacity 0.3s;
        }
        .button:hover {
            opacity: 0.8;
        }
        .button-verify {
            background: #4caf50;
            color: #fff;
        }
        .button-reject {
            background: #f44336;
            color: #fff;
        }
        .question-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .question-box p {
            margin: 5px 0;
            color: #856404;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Registration Notification</h1>
        </div>

        <div class="content">
            <p>Dear {{ $referrer->name }},</p>

            <p>We wanted to inform you that a new user has registered on <strong>Bengali Hindu Unity</strong> platform using your email as a reference.</p>

            <div class="info-box">
                <p><strong>New User Details:</strong></p>
                <p><strong>Name:</strong> {{ $newUser->name }}</p>
                <p><strong>Email:</strong> {{ $newUser->email }}</p>
                <p><strong>Phone:</strong> {{ $newUser->contact_no }}</p>
                <p><strong>Registration Date:</strong> {{ $newUser->created_at->format('F d, Y h:i A') }}</p>
            </div>

            <div class="question-box">
                <p>Do you know this person?</p>
                <p style="font-size: 14px; font-weight: normal; color: #666;">Please help us verify this registration by confirming whether you know this person.</p>
            </div>

            <div class="button-container">
                <a href="{{ $verifyUrl }}" class="button button-verify">Yes, I Know This Person</a>
                <a href="{{ $rejectUrl }}" class="button button-reject">No, I Don't Know This Person</a>
            </div>

            <p>Thank you for being a valuable member of our community and helping us grow by referring new members.</p>

            <p>Your support and participation in our platform is greatly appreciated!</p>

            <p>Best regards,<br>
            <strong>Bengali Hindu Unity Team</strong></p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Bengali Hindu Unity. All rights reserved.</p>
            <p>This is an automated notification. Please do not reply to this message.</p>
        </div>
    </div>
</body>
</html>
