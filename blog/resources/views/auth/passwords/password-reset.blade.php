<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            padding: 30px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .content {
            background: #f8fafc;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
        .security-notice {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>🔐 Password Reset Request</h1>
</div>

<div class="content">
    <h2>Hello {{ $user->name }},</h2>

    <p>You are receiving this email because we received a password reset request for your account.</p>

    <div style="text-align: center;">
        <a href="{{ $url }}" class="button">Reset Password</a>
    </div>

    <div class="security-notice">
        <strong>⚠️ Security Notice:</strong>
        <ul>
            <li>This password reset link will expire in <strong>2 hours</strong></li>
            <li>If you did not request a password reset, no further action is required</li>
            <li>Never share this link with anyone</li>
        </ul>
    </div>

    <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
    <p style="word-break: break-all; color: #6b7280; font-size: 14px;">{{ $url }}</p>
</div>

<div class="footer">
    <p>This email was sent from <strong>Your Blog</strong></p>
    <p>If you have any questions, please contact our support team.</p>
</div>
</body>
</html>
