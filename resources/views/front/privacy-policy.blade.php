<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - SolarPanel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0f1e 0%, #1a1f32 100%);
            color: white;
            line-height: 1.6;
        }
        .header {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .header h1 {
            color: #ff9f00;
            font-size: 1.8rem;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        .policy-card {
            background: rgba(255,255,255,0.03);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255,255,255,0.05);
        }
        h2 {
            color: #ff9f00;
            margin: 1.5rem 0 1rem;
            font-size: 1.5rem;
        }
        h3 {
            color: white;
            margin: 1rem 0 0.5rem;
        }
        p {
            color: #ccc;
            margin-bottom: 1rem;
        }
        ul {
            color: #ccc;
            margin-left: 2rem;
            margin-bottom: 1rem;
        }
        li {
            margin-bottom: 0.5rem;
        }
        .back-btn {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.8rem 2rem;
            background: #ff9f00;
            color: #0a0f1e;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,159,0,0.3);
        }
        .footer {
            text-align: center;
            padding: 2rem;
            color: #666;
            border-top: 1px solid rgba(255,255,255,0.05);
            margin-top: 3rem;
        }
        .highlight {
            color: #ff9f00;
            font-weight: 600;
        }
        .date {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-solar-panel" style="color: #ff9f00; margin-right: 10px;"></i>SolarPanel</h1>
    </div>

    <div class="container">
        <div class="policy-card">
            <h1 style="color: #ff9f00; font-size: 2.2rem; margin-bottom: 0.5rem;">Privacy Policy</h1>
            <div class="date">Last Updated: March 10, 2026</div>

            <h2>1. Introduction</h2>
            <p>Welcome to SolarPanel. We respect your privacy and are committed to protecting your personal data. This privacy policy explains how we collect, use, and safeguard your information when you use our solar investment platform.</p>

            <h2>2. Information We Collect</h2>
            <h3>2.1 Personal Information</h3>
            <ul>
                <li>Name and contact details (email, phone number)</li>
                <li>Bank account and UPI details for transactions</li>
                <li>PAN card and government ID for KYC verification</li>
                <li>Investment history and transaction records</li>
            </ul>

            <h3>2.2 Technical Information</h3>
            <ul>
                <li>IP address and device information</li>
                <li>Browser type and version</li>
                <li>Time zone and location data</li>
                <li>Cookies and usage data</li>
            </ul>

            <h2>3. How We Use Your Information</h2>
            <ul>
                <li>To process your investments and withdrawals</li>
                <li>To verify your identity (KYC compliance)</li>
                <li>To send you updates about your investments</li>
                <li>To improve our platform and services</li>
                <li>To comply with legal obligations</li>
            </ul>

            <h2>4. Data Security</h2>
            <p>We implement <span class="highlight">bank-level 256-bit SSL encryption</span> for all transactions. Your data is stored on secure servers with multiple layers of protection. We never share your personal information with third parties without your consent.</p>

            <h2>5. Your Rights</h2>
            <ul>
                <li>Access your personal data anytime through dashboard</li>
                <li>Request correction of inaccurate data</li>
                <li>Request deletion of your account (subject to legal holds)</li>
                <li>Opt-out of marketing communications</li>
            </ul>

            <h2>6. Cookies Policy</h2>
            <p>We use cookies to enhance your experience. These include session cookies for login, preference cookies for settings, and analytics cookies to improve our service. You can disable cookies in your browser settings.</p>

            <h2>7. Contact Us</h2>
            <p>If you have questions about this privacy policy, contact us at:</p>
            <ul>
                
                {{-- <li>Phone: 1800-123-7433</li> --}}
                <li>Telegram: <a href="https://t.me/solar_earn" style="color: #ff9f00;" target="_blank">@solarpaneladmin</a></li>
            </ul>

            <a href="{{ url('/') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>
    </div>

    <div class="footer">
        <p>© 2026 SolarPanel. All rights reserved. | <a href="{{ url('/') }}" style="color: #ff9f00;">Home</a> | <a href="#" style="color: #ff9f00;">Terms</a></p>
    </div>
</body>
</html>