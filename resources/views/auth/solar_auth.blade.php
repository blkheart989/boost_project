<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solar Invest Auth</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #020617;
            overflow: hidden;
            color: white;
        }

        /* animated gradient background */
        body::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            background: linear-gradient(45deg, #06b6d4, #6366f1);
            border-radius: 50%;
            top: -200px;
            left: -200px;
            filter: blur(180px);
            animation: move1 10s infinite alternate;
        }

        body::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: linear-gradient(45deg, #f59e0b, #ef4444);
            border-radius: 50%;
            bottom: -200px;
            right: -200px;
            filter: blur(180px);
            animation: move2 10s infinite alternate;
        }

        @keyframes move1 {
            from { transform: translateY(0); }
            to { transform: translateY(120px); }
        }

        @keyframes move2 {
            from { transform: translateY(0); }
            to { transform: translateY(-120px); }
        }

        /* main card */
        .auth-container {
            width: 900px;
            height: 600px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 30px;
            backdrop-filter: blur(30px);
            box-shadow: 0 50px 120px rgba(0, 0, 0, .8);
            display: flex;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        /* form area */
        .form-area {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
        }

        .form-area h2 {
            font-family: 'Orbitron', sans-serif;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, .08);
            color: white;
            outline: none;
            transition: .3s;
        }

        .input-group input:focus {
            box-shadow: 0 0 20px #06b6d4;
            background: rgba(255, 255, 255, .15);
        }

        .input-group small {
            color: #aaa;
            font-size: 11px;
            display: block;
            margin-top: 5px;
        }

        /* button */
        .btn {
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(45deg, #06b6d4, #6366f1);
            color: white;
            font-size: 15px;
            cursor: pointer;
            transition: .3s;
            width: 100%;
        }

        .btn:hover {
            transform: scale(1.02);
            box-shadow: 0 0 30px #06b6d4;
        }

        /* side panel */
        .panel {
            width: 50%;
            background: linear-gradient(135deg, #06b6d4, #6366f1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
        }

        .panel h2 {
            font-family: 'Orbitron', sans-serif;
            margin-bottom: 10px;
        }

        .panel p {
            font-size: 14px;
            opacity: .9;
        }

        .switch-btn {
            margin-top: 20px;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            background: white;
            color: #111;
            cursor: pointer;
            font-weight: 500;
            transition: .3s;
        }

        .switch-btn:hover {
            transform: scale(1.05);
        }

        /* hidden register */
        #registerForm {
            display: none;
        }

        /* referral info box */
        .referral-info {
            background: rgba(6, 182, 212, 0.15);
            border: 1px solid #06b6d4;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .referral-info span {
            color: white;
        }

        .referral-info strong {
            color: #06b6d4;
        }

        /* responsive */
        @media (max-width: 900px) {
            .auth-container {
                flex-direction: column;
                width: 95%;
                height: auto;
            }

            .panel {
                display: none;
            }

            .form-area {
                width: 100%;
                padding: 30px;
            }
        }

        /* error and success messages */
        .error-box {
            background: rgba(239, 68, 68, 0.2);
            border-left: 4px solid #ef4444;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #ff9999;
        }

        .success-box {
            background: rgba(34, 197, 94, 0.2);
            border-left: 4px solid #22c55e;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #99ff99;
        }

        .error-list {
            margin-left: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- FORM AREA -->
        <div class="form-area">
            <h2 id="formTitle">LOGIN</h2>

            <!-- Message Display Section -->
            @if(session('success'))
                <div class="success-box">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="error-box">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error-box">
                    <ul class="error-list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- LOGIN FORM -->
            <form method="POST" action="{{ url('login') }}" id="loginForm">
                @csrf
                <div class="input-group">
                    <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button class="btn">Login</button>
            </form>

            <!-- REGISTER FORM -->
            <form method="post" action="{{ URL::to('register') }}" id="registerForm">
                @csrf
                
                <!-- Show referral code if coming from link -->
                @if(isset($_GET['ref']) && !empty($_GET['ref']))
                <div class="referral-info">
                    <i class="fas fa-gift" style="color: #06b6d4; margin-right: 5px;"></i>
                    <span>You were referred by code: <strong>{{ $_GET['ref'] }}</strong></span>
                    <input type="hidden" name="referral_code" value="{{ $_GET['ref'] }}">
                </div>
                @else
                <div class="input-group">
                    <input type="text" name="referral_code" placeholder="Referral Code (Optional)" value="{{ old('referral_code') }}">
                    <small>Enter referral code if you have one</small>
                </div>
                @endif
                
                <div class="input-group">
                    <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="input-group">
                    <input type="text" name="phone" placeholder="Phone Number (10 digits)" value="{{ old('phone') }}" maxlength="10" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button class="btn">Register</button>
            </form>
        </div>

        <!-- SIDE PANEL -->
        <div class="panel">
            <h2>Solar Energy Platform</h2>
            <p>Invest in smart solar plans and earn daily passive income.</p>
            <p style="margin-top: 15px; font-size: 12px;">Earn 10% referral bonus on deposits & 5%/3%/1% on withdrawals!</p>
            <button class="switch-btn" onclick="switchForm()">Switch to Register</button>
        </div>
    </div>

    <script>
        function switchForm() {
            let login = document.getElementById("loginForm");
            let register = document.getElementById("registerForm");
            let title = document.getElementById("formTitle");
            let switchBtn = document.querySelector('.switch-btn');

            if (login.style.display === "none") {
                login.style.display = "block";
                register.style.display = "none";
                title.innerText = "LOGIN";
                switchBtn.innerText = "Switch to Register";
            } else {
                login.style.display = "none";
                register.style.display = "block";
                title.innerText = "REGISTER";
                switchBtn.innerText = "Switch to Login";
            }
        }

        // Check URL parameter to show register form if needed
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('form') === 'register' || urlParams.get('ref')) {
                document.getElementById("loginForm").style.display = "none";
                document.getElementById("registerForm").style.display = "block";
                document.getElementById("formTitle").innerText = "REGISTER";
                document.querySelector('.switch-btn').innerText = "Switch to Login";
            }
        }
    </script>
</body>
</html>