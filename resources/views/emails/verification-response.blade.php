<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Response</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: #fff;
            max-width: 500px;
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
            text-align: center;
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }
        .icon.success {
            background: #d4edda;
            color: #28a745;
        }
        .icon.error {
            background: #f8d7da;
            color: #dc3545;
        }
        .icon.info {
            background: #d1ecf1;
            color: #0c5460;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }
        .success h1 {
            color: #28a745;
        }
        .error h1 {
            color: #dc3545;
        }
        p {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        .message {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid;
        }
        .message.success {
            border-left-color: #28a745;
            background: #d4edda;
            color: #155724;
        }
        .message.error {
            border-left-color: #dc3545;
            background: #f8d7da;
            color: #721c24;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            color: #999;
            font-size: 14px;
        }
        .checkmark {
            animation: checkmark 0.5s ease-in-out 0.3s both;
        }
        @keyframes checkmark {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if($success)
            <div class="icon success checkmark">
                <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h1 class="success">{{ isset($alreadyProcessed) && $alreadyProcessed ? 'Already Processed' : 'Success!' }}</h1>
        @else
            <div class="icon error">
                <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h1 class="error">Verification Failed</h1>
        @endif

        <div class="message {{ $success ? 'success' : 'error' }}">
            <p style="margin: 0; color: inherit; font-weight: 500;">{{ $message }}</p>
        </div>

        @if($success)
            <p>You can now close this window and return to your email.</p>
        @else
            <p>Please try again or contact support if the problem persists.</p>
        @endif

        <div class="footer">
            <p>&copy; {{ date('Y') }} Bengali Hindu Unity. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
