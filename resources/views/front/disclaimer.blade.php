<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Disclaimer - SolarPanel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0a0f1e 0%, #1a1f32 100%);
            color: white;
            line-height: 1.6;
        }
        
        /* Header */
        .header {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff, #a5a5ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
        }
        
        .nav-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #ff9f00;
        }
        
        /* Main content */
        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ff9f00, #ff6b00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        
        .last-updated {
            color: #aaa;
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }
        
        .disclaimer-card {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
        }
        
        .section-title {
            color: #ff9f00;
            font-size: 1.5rem;
            margin: 1.5rem 0 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            font-size: 1.8rem;
        }
        
        .section-title:first-of-type {
            margin-top: 0;
        }
        
        p {
            color: #ccc;
            margin-bottom: 1rem;
        }
        
        .highlight {
            color: #ff9f00;
            font-weight: 600;
        }
        
        .warning-box {
            background: rgba(255, 159, 0, 0.1);
            border-left: 4px solid #ff9f00;
            padding: 1.5rem;
            border-radius: 10px;
            margin: 2rem 0;
        }
        
        .warning-box i {
            color: #ff9f00;
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        ul, ol {
            color: #ccc;
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }
        
        li {
            margin-bottom: 0.5rem;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
        }
        
        th {
            background: rgba(255,159,0,0.1);
            color: #ff9f00;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }
        
        td {
            padding: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        
        .back-btn {
            display: inline-block;
            background: #ff9f00;
            color: #0a0f1e;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s;
        }
        
        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255,159,0,0.3);
        }
        
        /* Footer */
        .footer {
            background: #0a0f1e;
            padding: 2rem;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.05);
            color: #aaa;
            margin-top: 3rem;
        }
        
        .footer a {
            color: #ff9f00;
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header {
                padding: 1rem;
            }
            
            .nav-links {
                display: none;
            }
            
            .main-content {
                padding: 0 1rem;
            }
            
            .disclaimer-card {
                padding: 1.5rem;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 1.3rem;
            }
            
            table {
                font-size: 0.9rem;
            }
            
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">SolarPanel.in</div>
            <div class="nav-links">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/privacy-policy') }}">Privacy</a>
                <a href="{{ url('/terms-of-service') }}">Terms</a>
                <a href="{{ url('/refund-policy') }}">Refund</a>
                <a href="{{ url('/disclaimer') }}">Disclaimer</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Disclaimer</h1>
        <p class="last-updated">Last Updated: {{ date('F d, Y') }}</p>
        
        <div class="disclaimer-card">
            <!-- Important Notice -->
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>PLEASE READ THIS DISCLAIMER CAREFULLY BEFORE USING OUR PLATFORM</strong>
            </div>
            
            <h2 class="section-title">
                <i class="fas fa-info-circle"></i>
                1. General Information
            </h2>
            <p>The information provided by SolarPanel.in ("we," "us," or "our") on https://solarpanel.in (the "Site") and our mobile application is for general informational purposes only. All information on the Site and our mobile application is provided in good faith, however we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on the Site.</p>
            
            <h2 class="section-title">
                <i class="fas fa-chart-line"></i>
                2. Investment Disclaimer
            </h2>
            <p><span class="highlight">NOT FINANCIAL ADVICE:</span> The information provided on this platform does not constitute investment advice, financial advice, trading advice, or any other sort of advice, and you should not treat any of the platform's content as such. SolarPanel.in does not recommend that any investment product should be bought, sold, or held by you.</p>
            
            <p>Do conduct your own due diligence and consult your financial advisor before making any investment decisions. By investing in our solar plans, you acknowledge that you understand the investment products.</p>
            
            <h2 class="section-title">
                <i class="fas fa-file-signature"></i>
                3. No Guarantee of Returns
            </h2>
            <p>While we strive to provide accurate information about potential returns from our solar investment plans, we do not guarantee any specific return on investment. The actual returns may vary based on various factors including but not limited to:</p>
            <ul>
                <li>Market conditions and economic factors</li>
                <li>Regulatory changes in the renewable energy sector</li>
                <li>Operational efficiency of solar infrastructure</li>
                <li>Maintenance and technical issues</li>
                <li>Weather conditions affecting solar generation</li>
            </ul>

            <!-- FIXED: Positive Risk Section -->
            <h2 class="section-title">
                <i class="fas fa-shield-alt"></i>
                4. Your Investment Protection
            </h2>

            <div style="background: rgba(76, 175, 80, 0.1); border-left: 4px solid #4CAF50; padding: 1.5rem; border-radius: 10px; margin: 2rem 0;">
                <i class="fas fa-check-circle" style="color: #4CAF50; margin-right: 10px; font-size: 1.2rem;"></i>
                <strong style="color: #4CAF50;">YOUR INVESTMENT SAFETY IS OUR PRIORITY</strong>
            </div>

            <p>At SolarPanel, we've built multiple layers of protection to ensure your investment journey is safe, transparent, and rewarding. Here's how we protect you:</p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin: 30px 0;">
                
                <div style="background: rgba(76, 175, 80, 0.03); padding: 25px; border-radius: 15px; border: 1px solid rgba(76, 175, 80, 0.1);">
                    <div style="background: rgba(76, 175, 80, 0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fas fa-shield-virus" style="color: #4CAF50; font-size: 1.8rem;"></i>
                    </div>
                    <h3 style="color: white; margin-bottom: 10px; font-size: 1.3rem;">Capital Protection</h3>
                    <p style="color: #ccc; line-height: 1.6;">Your investment is backed by real solar assets. We maintain full transparency and provide regular updates on your investment performance.</p>
                </div>
                
                <div style="background: rgba(33, 150, 243, 0.03); padding: 25px; border-radius: 15px; border: 1px solid rgba(33, 150, 243, 0.1);">
                    <div style="background: rgba(33, 150, 243, 0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fas fa-rocket" style="color: #2196F3; font-size: 1.8rem;"></i>
                    </div>
                    <h3 style="color: white; margin-bottom: 10px; font-size: 1.3rem;">Quick Liquidity</h3>
                    <p style="color: #ccc; line-height: 1.6;">Need your money? Withdraw your earnings anytime. Most withdrawal requests are processed within 24 hours after admin approval.</p>
                </div>
                
                <div style="background: rgba(255, 193, 7, 0.03); padding: 25px; border-radius: 15px; border: 1px solid rgba(255, 193, 7, 0.1);">
                    <div style="background: rgba(255, 193, 7, 0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fas fa-balance-scale" style="color: #ffc107; font-size: 1.8rem;"></i>
                    </div>
                    <h3 style="color: white; margin-bottom: 10px; font-size: 1.3rem;">Regulatory Compliant</h3>
                    <p style="color: #ccc; line-height: 1.6;">We operate within Indian laws and regulations. Our legal team actively monitors regulatory changes to keep your investments compliant.</p>
                </div>
                
                <div style="background: rgba(156, 39, 176, 0.03); padding: 25px; border-radius: 15px; border: 1px solid rgba(156, 39, 176, 0.1);">
                    <div style="background: rgba(156, 39, 176, 0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fas fa-cloud" style="color: #9C27B0; font-size: 1.8rem;"></i>
                    </div>
                    <h3 style="color: white; margin-bottom: 10px; font-size: 1.3rem;">99.9% Platform Uptime</h3>
                    <p style="color: #ccc; line-height: 1.6;">Our platform runs on enterprise-grade infrastructure with redundant systems, ensuring you can access your investments anytime, anywhere.</p>
                </div>
                
                <div style="background: rgba(233, 30, 99, 0.03); padding: 25px; border-radius: 15px; border: 1px solid rgba(233, 30, 99, 0.1);">
                    <div style="background: rgba(233, 30, 99, 0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fas fa-shield-halved" style="color: #E91E63; font-size: 1.8rem;"></i>
                    </div>
                    <h3 style="color: white; margin-bottom: 10px; font-size: 1.3rem;">Military-Grade Security</h3>
                    <p style="color: #ccc; line-height: 1.6;">256-bit SSL encryption, mandatory 2FA, biometric authentication, and regular security audits keep your funds and data completely safe.</p>
                </div>
                
                <div style="background: rgba(0, 150, 136, 0.03); padding: 25px; border-radius: 15px; border: 1px solid rgba(0, 150, 136, 0.1);">
                    <div style="background: rgba(0, 150, 136, 0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fas fa-hand-holding-heart" style="color: #009688; font-size: 1.8rem;"></i>
                    </div>
                    <h3 style="color: white; margin-bottom: 10px; font-size: 1.3rem;">24/7 Customer Support</h3>
                    <p style="color: #ccc; line-height: 1.6;">Our dedicated support team is always available via chat, email, and phone to assist you with any questions or concerns.</p>
                </div>
            </div>

            <!-- Success Stats -->
            <div style="display: flex; flex-wrap: wrap; justify-content: space-around; gap: 30px; margin: 40px 0; padding: 30px; background: rgba(255,255,255,0.02); border-radius: 20px;">
                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: 700; color: #4CAF50;">10,000+</div>
                    <div style="color: #ccc;">Happy Investors</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: 700; color: #4CAF50;">₹2Cr+</div>
                    <div style="color: #ccc;">Returns Paid</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: 700; color: #4CAF50;">4.8/5</div>
                    <div style="color: #ccc;">User Rating</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: 700; color: #4CAF50;">24/7</div>
                    <div style="color: #ccc;">Support</div>
                </div>
            </div>

            <!-- Friendly Reminder -->
            <div style="background: rgba(255, 159, 0, 0.05); border-radius: 15px; padding: 25px; margin: 30px 0;">
                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <i class="fas fa-lightbulb" style="color: #ff9f00; font-size: 2rem;"></i>
                    <div>
                        <h3 style="color: #ff9f00; margin-bottom: 10px;">Smart Investing Tips</h3>
                        <p style="color: #ccc; margin-bottom: 15px;">While we make every effort to protect your investments, here are some tips to make your experience even better:</p>
                        <ul style="color: #ccc; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px;">
                            <li><i class="fas fa-check" style="color: #4CAF50; margin-right: 8px;"></i> Start small to understand the platform</li>
                            <li><i class="fas fa-check" style="color: #4CAF50; margin-right: 8px;"></i> Diversify across different plans</li>
                            <li><i class="fas fa-check" style="color: #4CAF50; margin-right: 8px;"></i> Enable 2FA for extra security</li>
                            <li><i class="fas fa-check" style="color: #4CAF50; margin-right: 8px;"></i> Monitor your dashboard regularly</li>
                            <li><i class="fas fa-check" style="color: #4CAF50; margin-right: 8px;"></i> Contact support for any doubts</li>
                            <li><i class="fas fa-check" style="color: #4CAF50; margin-right: 8px;"></i> Read plan details carefully</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <h2 class="section-title">
                <i class="fas fa-exchange-alt"></i>
                5. Third-Party Links
            </h2>
            <p>Our platform may contain links to third-party websites or services that are not owned or controlled by SolarPanel.in. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party websites. You further acknowledge and agree that SolarPanel.in shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods, or services available on or through any such websites or services.</p>
            
            <h2 class="section-title">
                <i class="fas fa-hand-holding-heart"></i>
                6. Referral Program
            </h2>
            <p>Our referral program is subject to change. We reserve the right to:</p>
            <ul>
                <li>Modify referral bonus percentages at any time</li>
                <li>Disqualify referrals suspected of fraudulent activity</li>
                <li>Reverse bonuses if referred accounts violate our terms</li>
                <li>Cancel the referral program entirely with prior notice</li>
            </ul>
            
            <h2 class="section-title">
                <i class="fas fa-calculator"></i>
                7. Taxation
            </h2>
            <p>It is your responsibility to determine what, if any, taxes apply to the payments you receive from your investments. We do not provide tax advice. You agree that:</p>
            <ul>
                <li>You are solely responsible for reporting and paying any applicable taxes</li>
                <li>We may be required to report your earnings to tax authorities</li>
                <li>Tax laws may change and affect your net returns</li>
                <li>You should consult with tax professionals regarding your situation</li>
            </ul>
            
            <h2 class="section-title">
                <i class="fas fa-gavel"></i>
                8. Limitation of Liability
            </h2>
            <p>To the maximum extent permitted by law, in no event shall SolarPanel.in, its affiliates, directors, employees, or agents be liable for any indirect, punitive, incidental, special, consequential, or exemplary damages, including without limitation damages for loss of profits, goodwill, use, data, or other intangible losses, arising out of or relating to the use of, or inability to use, the platform.</p>
            
            <h2 class="section-title">
                <i class="fas fa-clock"></i>
                9. Changes to Disclaimer
            </h2>
            <p>We reserve the right to modify this disclaimer at any time. We will notify users of any material changes by posting the new disclaimer on this page with an updated effective date. Your continued use of the platform after such modifications constitutes your acknowledgment and agreement to the modified disclaimer.</p>
            
            <!-- Small Print -->
            <p style="color: #aaa; font-size: 0.85rem; margin-top: 30px; padding: 15px; border-top: 1px solid rgba(255,255,255,0.05);">
                <i class="fas fa-info-circle" style="color: #ff9f00; margin-right: 5px;"></i>
                Standard Disclaimer: While we strive to provide accurate information and protect your investments, please understand that all investments carry some inherent risk. Past performance does not guarantee future returns. We recommend consulting with a financial advisor before making investment decisions.
            </p>
            
            <h2 class="section-title">
                <i class="fas fa-envelope"></i>
                10. Contact Us
            </h2>
            <p>If you have any questions about this Disclaimer, please contact us:</p>
            <ul>
                <li><i class="fas fa-envelope" style="color:#ff9f00; margin-right: 10px;"></i> Email: legal@solarpanel.in</li>
                <li><i class="fas fa-phone" style="color:#ff9f00; margin-right: 10px;"></i> Phone: 1800-123-7433</li>
                <li><i class="fas fa-map-marker-alt" style="color:#ff9f00; margin-right: 10px;"></i> Address: Mumbai, India - 400001</li>
            </ul>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ url('/') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <p>© {{ date('Y') }} SolarPanel.in. All rights reserved. | 
            <a href="{{ url('/privacy-policy') }}">Privacy</a> | 
            <a href="{{ url('/terms-of-service') }}">Terms</a> | 
            <a href="{{ url('/refund-policy') }}">Refund</a> | 
            <a href="{{ url('/disclaimer') }}">Disclaimer</a>
        </p>
    </footer>
</body>
</html>