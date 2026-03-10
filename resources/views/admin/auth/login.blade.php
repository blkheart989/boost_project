<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Admin Login - SolarPanel</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #7367f0, #9e95f5);
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            width: 450px;
            max-width: 90%;
            padding: 40px;
            animation: slideUp 0.5s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .brand {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .brand h2 {
            color: #7367f0;
            font-weight: 700;
            margin-top: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            height: 50px;
            border-radius: 12px;
            border: 2px solid #e0e0e0;
            padding: 0 20px;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #7367f0;
            box-shadow: 0 0 0 3px rgba(115, 103, 240, 0.2);
            outline: none;
        }
        
        .input-group-text {
            background: transparent;
            border: 2px solid #e0e0e0;
            border-left: none;
            border-radius: 0 12px 12px 0;
            cursor: pointer;
        }
        
        .btn-login {
            background: #7367f0;
            color: white;
            height: 50px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            border: none;
            width: 100%;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            background: #5e50ee;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(115, 103, 240, 0.3);
        }
        
        .alert {
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
            border: none;
        }
        
        .alert-danger {
            background: rgba(234, 84, 85, 0.1);
            color: #ea5455;
        }
        
        .alert-success {
            background: rgba(40, 199, 111, 0.1);
            color: #28c76f;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: #7367f0;
        }
        
        .footer {
            text-align: center;
            margin-top: 25px;
            color: #b9b9b9;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <!-- Brand -->
        <div class="brand">
            <svg viewBox="0 0 139 95" width="50" height="35">
                <path class="text-primary" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" fill="#7367f0"></path>
            </svg>
            <h2>SolarPanel Admin</h2>
        </div>
        
        <!-- Alert Messages -->
        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        @endif
        
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Login Form -->
        <form action="{{ url('admin/login') }}" method="POST">
            @csrf
            
            <!-- Email Field -->
            <div class="form-group">
                <label class="font-weight-500">Email Address</label>
                <input type="email" 
                       name="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       placeholder="admin@solarpanel.in"
                       value="{{ old('email') }}"
                       required
                       autofocus>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Password Field -->
            <div class="form-group">
                <label class="font-weight-500">Password</label>
                <div class="input-group">
                    <input type="password" 
                           name="password" 
                           id="password"
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="············"
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Remember Me -->
            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt mr-2"></i> Sign In
            </button>
        </form>
        
        <!-- Footer -->
        <div class="footer">
            <p>© {{ date('Y') }} SolarPanel. All rights reserved.</p>
        </div>
    </div>
    
    <!-- JavaScript -->
    <script>
        function togglePassword() {
            var password = document.getElementById('password');
            var icon = document.getElementById('toggleIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>