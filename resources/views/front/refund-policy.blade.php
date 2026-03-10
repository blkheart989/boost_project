<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Policy - SolarPanel</title>
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
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-solar-panel" style="color: #ff9f00; margin-right: 10px;"></i>SolarPanel</h1>
    </div>

    <div class="container">
        <div class="policy-card">
            <h1 style="color: #ff9f00; font-size: 2.2rem; margin-bottom: 0.5rem;">Refund & Cancellation Policy</h1>
            <div class="date">Last Updated: March 10, 2026</div>

            <h2>1. Investment Plans</h2>
            <p>SolarPanel investments are <span class="highlight">non-refundable</span> once purchased. Please choose your plan carefully. Returns are guaranteed as per plan terms.</p>

            <h2>2. Cooling-Off Period</h2>
            <p>You have <span class="highlight">24 hours</span> from plan purchase to request cancellation if you changed your mind. Contact support immediately with your transaction details.</p>

            <h2>3. Failed Transactions</h2>
            <ul>
                <li>If amount deducted but plan not activated → Auto-refund within 24 hours</li>
                <li>UTR mismatch issues → Refund after verification (3-5 working days)</li>
                <li>Duplicate payments → Full refund within 48 hours</li>
            </ul>

            <h2>4. Withdrawal Reversals</h2>
            <p>Once a withdrawal is approved and processed, it cannot be reversed. Ensure your bank/UPI details are correct before requesting.</p>

            <h2>5. Referral Bonuses</h2>
            <p>Referral commissions once credited cannot be reversed or refunded.</p>

            <h2>6. Account Closure</h2>
            <p>If you close your account, all remaining assets will be processed as withdrawal after verification (subject to KYC and legal compliance).</p>

            <h2>7. Dispute Resolution</h2>
            <p>Any disputes will be resolved through arbitration in accordance with Indian laws. All communications must be in writing via email.</p>

            <h2>8. Contact for Refunds</h2>
            <p>For refund-related queries:</p>
            <ul>
                {{-- <li>Email: <a href="mailto:refunds@solarpanel.in" style="color: #ff9f00;">refunds@solarpanel.in</a></li> --}}
                <li>Telegram: <a href="https://t.me/solar_earn" style="color: #ff9f00;" target="_blank">@solarpaneladmin</a></li>
                <li>Support: <a href="https://t.me/+_PVubJPTYek3MzU1" style="color: #ff9f00;" target="_blank">Join Support Group</a></li>
            </ul>

            <a href="{{ url('/') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>
    </div>

    <div class="footer">
        <p>© 2026 SolarPanel. All rights reserved.</p>
    </div>
</body>
</html>