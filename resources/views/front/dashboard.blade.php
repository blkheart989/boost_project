<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>User Dashboard - Solar Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
<!-- Add this CSS for mobile responsiveness -->
<style>
    .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    /* For very small phones */
    @media (max-width: 480px) {
        .navbar-container {
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
        }
        
        .navbar-container > div {
            justify-content: space-between !important;
            width: 100%;
        }
        
        .user-menu {
            justify-content: flex-end !important;
            width: 100%;
        }
        
        /* Hide text, show only icons on very small screens */
        .home-text, .user-text, .logout-text {
            display: none;
        }
        
        .navbar-container a i, .user-name i {
            font-size: 1.2rem;
        }
        
        .logout-btn {
            padding: 5px 10px !important;
        }
    }
    
    /* For medium phones */
    @media (min-width: 481px) and (max-width: 768px) {
        .navbar-container {
            flex-direction: row;
            align-items: center;
        }
        
        /* Show only first name or shorter version */
        .user-text {
            max-width: 80px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-block;
        }
    }
    
    /* For tablets and up */
    @media (min-width: 769px) {
        .home-text, .user-text, .logout-text {
            display: inline;
        }
    }
    
    /* User menu styles */
    .user-menu {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .user-name {
        color: rgba(255,255,255,0.8);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .logout-btn {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 8px;
        padding: 5px 12px;
        color: white;
        text-decoration: none;
        transition: all 0.3s;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }
    
    .logout-btn:hover {
        background: rgba(255,255,255,0.1);
    }
    
    /* Modal styles */
    #withdrawModal, #referralModal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.9);
        z-index: 99999;
        justify-content: center;
        align-items: center;
    }
    
    #withdrawModal > div, #referralModal > div {
        max-height: 90vh;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4CAF50 #1a1f32;
    }
    
    #withdrawModal > div::-webkit-scrollbar, #referralModal > div::-webkit-scrollbar {
        width: 6px;
    }
    
    #withdrawModal > div::-webkit-scrollbar-track, #referralModal > div::-webkit-scrollbar-track {
        background: #1a1f32;
    }
    
    #withdrawModal > div::-webkit-scrollbar-thumb, #referralModal > div::-webkit-scrollbar-thumb {
        background: #4CAF50;
        border-radius: 10px;
    }
    
    /* Form inputs */
    input:focus {
        outline: none;
        border-color: #4CAF50 !important;
        box-shadow: 0 0 10px rgba(76, 175, 80, 0.3);
    }
    
    /* Loading spinner */
    .fa-spinner {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Space Grotesk', sans-serif;
            background: linear-gradient(135deg, #0a0f1e 0%, #1a1f32 100%);
            min-height: 100vh;
            color: white;
        }
        
        /* Navbar - Mobile First */
        .navbar {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 0.8rem 1rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        
        .logo {
            font-size: 1.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff, #a5a5ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            flex-wrap: wrap;
        }
        
        .user-name {
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
        }
        
        .user-name i {
            margin-right: 0.3rem;
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 8px;
            padding: 0.4rem 0.8rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .logout-btn i {
            margin-right: 0.3rem;
        }
        
        /* Main Content - Mobile First */
        .premium-dashboard {
            max-width: 1400px;
            margin: 1rem auto;
            padding: 0 1rem;
            position: relative;
            overflow: hidden;
        }
        
        /* Animated background particles */
        .premium-dashboard::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(76, 175, 80, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(33, 150, 243, 0.1) 0%, transparent 50%);
            top: 0;
            left: 0;
            pointer-events: none;
            animation: pulseGlow 8s ease-in-out infinite;
        }
        
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }
        
        /* Floating orbs - Hidden on mobile for performance */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            z-index: 0;
        }
        
        .orb-1 {
            width: 300px;
            height: 300px;
            background: rgba(76, 175, 80, 0.15);
            top: -100px;
            right: -100px;
            animation: float 20s ease-in-out infinite;
        }
        
        .orb-2 {
            width: 400px;
            height: 400px;
            background: rgba(33, 150, 243, 0.1);
            bottom: -150px;
            left: -150px;
            animation: float 25s ease-in-out infinite reverse;
        }
        
        @media (max-width: 768px) {
            .orb-1, .orb-2 {
                display: none;
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        
        /* Glass card effect */
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }
        
        @media (min-width: 640px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (min-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1.5rem;
            padding: 1.2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .stat-card:hover {
            transform: translateY(-5px) scale(1.01);
            border-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }
        
        @media (max-width: 768px) {
            .stat-card {
                padding: 1rem;
            }
        }
        
        /* Card shine effect */
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.03), transparent);
            transition: left 0.7s ease;
        }
        
        .stat-card:hover::before {
            left: 100%;
        }
        
        /* Animated border gradient */
        .stat-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 1.5rem;
            padding: 2px;
            background: linear-gradient(45deg, #4CAF50, #2196F3, #9C27B0, #FF9800);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .stat-card:hover::after {
            opacity: 1;
            animation: rotateBorder 4s linear infinite;
        }
        
        @keyframes rotateBorder {
            0% { background: linear-gradient(45deg, #4CAF50, #2196F3, #9C27B0, #FF9800); }
            25% { background: linear-gradient(135deg, #FF9800, #4CAF50, #2196F3, #9C27B0); }
            50% { background: linear-gradient(225deg, #9C27B0, #FF9800, #4CAF50, #2196F3); }
            75% { background: linear-gradient(315deg, #2196F3, #9C27B0, #FF9800, #4CAF50); }
            100% { background: linear-gradient(405deg, #4CAF50, #2196F3, #9C27B0, #FF9800); }
        }
        
        /* Card header */
        .card-header-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        
        .card-icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.2), rgba(33, 150, 243, 0.2));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        @media (min-width: 768px) {
            .card-icon-wrapper {
                width: 60px;
                height: 60px;
            }
        }
        
        .card-icon-wrapper::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }
        
        .stat-card:hover .card-icon-wrapper::before {
            transform: translateX(100%);
        }
        
        .card-icon {
            font-size: 24px;
            position: relative;
            z-index: 1;
            animation: iconFloat 3s ease-in-out infinite;
        }
        
        @media (min-width: 768px) {
            .card-icon {
                font-size: 28px;
            }
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        /* Badge */
        .trend-badge {
            background: rgba(76, 175, 80, 0.15);
            color: #4CAF50;
            padding: 0.3rem 0.8rem;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            border: 1px solid rgba(76, 175, 80, 0.3);
            backdrop-filter: blur(5px);
        }
        
        @media (min-width: 768px) {
            .trend-badge {
                font-size: 0.8rem;
                padding: 0.5rem 1rem;
            }
        }
        
        /* Card content */
        .card-title-custom {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 0.3rem;
        }
        
        @media (min-width: 768px) {
            .card-title-custom {
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
            }
        }
        
        .card-value-custom {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.3rem;
            background: linear-gradient(135deg, #fff, #a5a5ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            display: inline-block;
        }
        
        @media (min-width: 768px) {
            .card-value-custom {
                font-size: 3rem;
            }
        }
        
        .card-value-custom::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #4CAF50, transparent);
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        
        .stat-card:hover .card-value-custom::after {
            transform: scaleX(1);
        }
        
        /* Stats footer */
        .card-footer-custom {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
        }
        
        .stat-change {
            display: flex;
            align-items: center;
            gap: 0.2rem;
            padding: 0.2rem 0.6rem;
            border-radius: 100px;
            background: rgba(255, 255, 255, 0.03);
        }
        
        .stat-change.positive {
            color: #4CAF50;
        }
        
        /* Digital particles */
        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(76, 175, 80, 0.5);
            border-radius: 50%;
            pointer-events: none;
            animation: particleFloat 10s linear infinite;
        }
        
        @media (max-width: 768px) {
            .particle {
                display: none;
            }
        }
        
        @keyframes particleFloat {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(100px);
                opacity: 0;
            }
        }
        
        /* Alert messages */
        .alert {
            padding: 0.8rem;
            border-radius: 1rem;
            margin-bottom: 1rem;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.05);
            color: white;
            font-size: 0.9rem;
        }
        
        .alert-success {
            background: rgba(76, 175, 80, 0.1);
            border-color: rgba(76, 175, 80, 0.3);
            color: #4CAF50;
        }
        
        /* Welcome header */
        .welcome-header {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .welcome-header {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 3rem;
            }
        }
        
        .welcome-title {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
            background: linear-gradient(135deg, #fff, #a5a5ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        @media (min-width: 768px) {
            .welcome-title {
                font-size: 2.5rem;
            }
        }
        
        .welcome-subtitle {
            color: rgba(255,255,255,0.5);
            font-size: 0.9rem;
        }
        
        .date-badge {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(10px);
            border-radius: 100px;
            padding: 0.4rem 0.8rem;
            border: 1px solid rgba(255,255,255,0.05);
            display: inline-block;
            align-self: flex-start;
        }
        
        @media (min-width: 768px) {
            .date-badge {
                padding: 0.5rem 1rem;
            }
        }
        
        /* Plans grid */
        .plans-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.8rem;
            margin-top: 1rem;
        }
        
        @media (min-width: 640px) {
            .plans-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (min-width: 1024px) {
            .plans-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        .plan-item {
            background: rgba(255,255,255,0.03);
            border-radius: 1rem;
            padding: 1rem;
            border-left: 4px solid #4CAF50;
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem 1rem;
            background: rgba(255,255,255,0.03);
            border-radius: 1rem;
        }
        
        .empty-state i {
            font-size: 2.5rem;
            color: rgba(255,255,255,0.3);
            margin-bottom: 0.8rem;
        }
        
        .empty-state h3 {
            color: white;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        
        .empty-state p {
            color: rgba(255,255,255,0.5);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        /* Buttons */
        .btn {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 0.8rem 1.2rem;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }
        
        .btn:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4CAF50, #2196F3);
            border: none;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }
        
        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        
        @media (min-width: 768px) {
            .action-buttons {
                gap: 1rem;
                margin-top: 0;
            }
        }
        
        .action-btn {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 1rem 0.5rem;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            text-align: center;
            font-size: 0.8rem;
            display: block;
        }
        
        .action-btn i {
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
            display: block;
        }
        
        @media (min-width: 768px) {
            .action-btn {
                padding: 1.5rem 0.5rem;
                font-size: 0.9rem;
            }
            
            .action-btn i {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }
        }
        
        .action-btn:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-3px);
        }
        
        /* Two column layout */
        .two-column {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .two-column {
                grid-template-columns: 2fr 1fr;
                gap: 2rem;
                margin-top: 2rem;
            }
        }
        
        /* Progress bar */
        .progress-bar {
            height: 4px;
            background: rgba(255,255,255,0.05);
            border-radius: 2px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #4CAF50, #2196F3);
            border-radius: 2px;
        }
        
        /* Mini charts */
        .mini-chart {
            display: flex;
            gap: 0.2rem;
            margin-top: 1rem;
        }
        
        .chart-bar {
            flex: 1;
            height: 25px;
            background: rgba(255,255,255,0.03);
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }
        
        .chart-fill {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: linear-gradient(to top, #4CAF50, #2196F3);
            opacity: 0.7;
        }
        
        @media (max-width: 768px) {
            .chart-bar {
                height: 20px;
            }
        }
        
        /* Activity list */
        .activity-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.03);
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .activity-item {
                font-size: 0.8rem;
            }
        }
        /* Fix for clickable buttons */
.action-btn {
    cursor: pointer !important;
    position: relative !important;
    z-index: 9999 !important;
    pointer-events: auto !important;
    transition: all 0.3s ease !important;
}

.action-btn:hover {
    background: rgba(255,255,255,0.2) !important;
    transform: translateY(-3px) !important;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3) !important;
}

.action-buttons {
    position: relative !important;
    z-index: 999 !important;
}

.stat-card {
    position: relative !important;
    z-index: 1 !important;
    overflow: visible !important;
}

/* Ensure no parent element blocks clicks */
.stat-card, .two-column, .premium-dashboard, body {
    pointer-events: auto !important;
}

/* Fix for any potential overlay issues */
* {
    pointer-events: auto;
}
    </style>
</head>
<body>
    <!-- Navbar - Fully Responsive -->
    <nav class="navbar">
        <div class="navbar-container">
            <!-- Left side - Logo and Home link -->
            <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                <div class="logo">SolarPanel.in</div>
                <a href="{{ url('/') }}" style="background: rgba(255,255,255,0.1); color: white; text-decoration: none; padding: 5px 12px; border-radius: 50px; font-size: 0.85rem; display: flex; align-items: center; gap: 5px; border: 1px solid rgba(255,255,255,0.1); white-space: nowrap;">
                    <i class="fas fa-globe"></i> 
                    <span class="home-text">Main Site</span>
                </a>
            </div>
            
            <!-- Right side - User menu -->
            <div class="user-menu">
                <span class="user-name">
                    <i class="fas fa-user-circle"></i> 
                    <span class="user-text"><?php echo session('user_name'); ?></span>
                </span>
                <a href="{{ url('logout') }}" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> 
                    <span class="logout-text">Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Dashboard -->
    <div class="premium-dashboard">
        <!-- Floating orbs -->
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        
        <!-- Particles container -->
        <div id="particles-container"></div>
        
        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif
        
        <div style="position: relative; z-index: 2;">
            <!-- Welcome header -->
            <div class="welcome-header">
                <div>
                    <h1 class="welcome-title">Welcome Back, <?php echo session('user_name'); ?>!</h1>
                    <p class="welcome-subtitle">Track your solar earnings in real-time</p>
                </div>
                <div class="date-badge">
                    <span style="color: #4CAF50;">⚡</span>
                    <span style="color: white; margin-left: 0.5rem;"><?php echo date('d M Y'); ?></span>
                </div>
            </div>
            
            <!-- Stats Grid -->
            <div class="stats-grid">
                <!-- Total Assets Card -->
                <div class="stat-card">
                    <div class="card-header-custom">
                        <div class="card-icon-wrapper">
                            <span class="card-icon">💰</span>
                        </div>
                        <div class="trend-badge">
                            <span>Assets</span>
                        </div>
                    </div>
                    <div class="card-title-custom">Total Assets</div>
                    <div class="card-value-custom">₹<?php echo number_format($userAsset->total_assets ?? 0); ?></div>
                    <div class="card-footer-custom">
                        <div class="stat-change positive">
                            <span>✓</span>
                            <span>Available</span>
                        </div>
                        <span>₹<?php echo number_format($userAsset->remaining_assets ?? 0); ?></span>
                    </div>
                    <div class="progress-bar" style="margin-top: 0.8rem;">
                        <?php 
                            $totalAssets = $userAsset->total_assets ?? 0;
                            $usedAssets = $userAsset->used_assets ?? 0;
                            $usagePercent = $totalAssets > 0 ? ($usedAssets / $totalAssets) * 100 : 0;
                        ?>
                        <div class="progress-fill" style="width: <?php echo $usagePercent; ?>%;"></div>
                    </div>
                </div>
                
                <!-- Active Plans Card -->
                <div class="stat-card">
                    <div class="card-header-custom">
                        <div class="card-icon-wrapper">
                            <span class="card-icon">📦</span>
                        </div>
                        <div class="trend-badge" style="background: rgba(33, 150, 243, 0.15); color: #2196F3; border-color: rgba(33, 150, 243, 0.3);">
                            <span>Active</span>
                        </div>
                    </div>
                    <div class="card-title-custom">Your Plans</div>
                    <div class="card-value-custom"><?php echo $activePlans->count(); ?></div>
                    <div class="card-footer-custom">
                        <?php if($activePlans->count() > 0): ?>
                            <?php 
                                $totalDays = 0;
                                $completedDays = 0;
                                foreach($activePlans as $p) {
                                    $totalDays += $p->duration_days;
                                    $completedDays += $p->days_completed;
                                }
                                $progressPercent = $totalDays > 0 ? round(($completedDays / $totalDays) * 100) : 0;
                            ?>
                            <span>Completion: <?php echo $progressPercent; ?>%</span>
                        <?php endif; ?>
                    </div>
                    <?php if($activePlans->count() > 0): ?>
                    <div style="margin-top: 0.8rem; display: flex; gap: 0.3rem; flex-wrap: wrap;">
                        <?php foreach($activePlans as $index => $plan): ?>
                            <?php if($index < 3): ?>
                            <div style="background: rgba(255,255,255,0.03); border-radius: 4px; padding: 0.2rem 0.5rem; border-left: 2px solid <?php echo ['#4CAF50', '#2196F3', '#9C27B0'][$index % 3]; ?>">
                                <span style="color: white; font-size: 0.7rem;">Plan <?php echo $plan->plan_id; ?></span>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if($activePlans->count() > 3): ?>
                            <div style="background: rgba(255,255,255,0.03); border-radius: 4px; padding: 0.2rem 0.5rem;">
                                <span style="color: rgba(255,255,255,0.5);">+<?php echo $activePlans->count() - 3; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Daily Income Card -->
                <div class="stat-card">
                    <div class="card-header-custom">
                        <div class="card-icon-wrapper">
                            <span class="card-icon">⚡</span>
                        </div>
                        <div class="trend-badge" style="background: rgba(156, 39, 176, 0.15); color: #9C27B0; border-color: rgba(156, 39, 176, 0.3);">
                            <span>Daily</span>
                        </div>
                    </div>
                    <div class="card-title-custom">Daily Income</div>
                    <div class="card-value-custom">₹<?php echo number_format($totalDailyIncome); ?></div>
                    <div class="card-footer-custom">
                        <span>Monthly: ₹<?php echo number_format($totalDailyIncome * 30); ?></span>
                    </div>
                    <div class="mini-chart">
                        <?php for($i = 0; $i < 7; $i++): ?>
                            <div class="chart-bar">
                                <div class="chart-fill" style="height: <?php echo rand(30, 100); ?>%;"></div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- REFERRAL EARNINGS CARD -->
                <div class="stat-card">
                    <div class="card-header-custom">
                        <div class="card-icon-wrapper">
                            <span class="card-icon">👥</span>
                        </div>
                        <div class="trend-badge" style="background: rgba(255, 193, 7, 0.15); color: #ffc107; border-color: rgba(255, 193, 7, 0.3);">
                            <span>Referral</span>
                        </div>
                    </div>
                    <div class="card-title-custom">Referral Earnings</div>
                    <div class="card-value-custom">₹<?php 
                        $userId = session('user_id');
                        $totalReferralEarnings = DB::table('referral_relationships')
                            ->where('referrer_id', $userId)
                            ->where('bonus_paid', 1)
                            ->sum('bonus_amount') ?? 0;
                        echo number_format($totalReferralEarnings); 
                    ?></div>
                    <div class="card-footer-custom">
                        <?php
                            $downlineCount = DB::table('referral_relationships')
                                ->where('referrer_id', $userId)
                                ->distinct('referred_id')
                                ->count('referred_id');
                        ?>
                        <div class="stat-change positive">
                            <span>👥</span>
                            <span><?php echo $downlineCount; ?> Downline</span>
                        </div>
                        <?php
                            $monthlyReferral = DB::table('referral_relationships')
                                ->where('referrer_id', $userId)
                                ->where('bonus_paid', 1)
                                ->whereMonth('updated_at', date('m'))
                                ->whereYear('updated_at', date('Y'))
                                ->sum('bonus_amount') ?? 0;
                        ?>
                        <span>This Month: ₹<?php echo number_format($monthlyReferral); ?></span>
                    </div>
                </div>
            </div>

            <!-- ===== FIXED REFERRAL LINK SECTION - FULLY WORKING ===== -->
            <div class="stat-card" style="margin-top: 1.5rem; padding: 1.5rem; background: linear-gradient(135deg, rgba(76, 175, 80, 0.15), rgba(33, 150, 243, 0.15)); border: 1px solid rgba(76, 175, 80, 0.3);">
                <h3 style="color: white; font-size: 1.3rem; margin-bottom: 1.2rem; display: flex; align-items: center;">
                    <i class="fas fa-gift" style="color: #4CAF50; margin-right: 12px; font-size: 1.6rem;"></i>
                    Your Referral Link
                </h3>
                
                <div style="background: rgba(0, 0, 0, 0.3); border-radius: 16px; padding: 1.5rem; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.1);">
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: 1rem; font-size: 1rem;">Share this link with friends:</p>
                    
                    @php
                        $refCode = session('user_referral_code');
                        $fullUrl = url('register?ref=' . $refCode);
                    @endphp
                    
                    <!-- CLICKABLE LINK - Full URL displayed and clickable -->
                    <div style="display: flex; gap: 12px; align-items: center; margin-bottom: 1.2rem; flex-wrap: wrap;">
                        <!-- Clickable link container with full URL -->
                        <a href="{{ $fullUrl }}" 
                           target="_blank"
                           style="flex: 2; min-width: 250px; padding: 14px 18px; background: rgba(255,255,255,0.1); border: 2px solid #4CAF50; border-radius: 12px; color: #4CAF50; font-size: 0.9rem; text-decoration: none; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; transition: all 0.3s; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 15px rgba(76, 175, 80, 0.2);"
                           onmouseover="this.style.background='rgba(76, 175, 80, 0.2)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(76, 175, 80, 0.4)';"
                           onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(76, 175, 80, 0.2)';">
                            <i class="fas fa-link" style="color: #4CAF50;"></i>
                            <span style="color: #4CAF50; font-weight: 500;">{{ $fullUrl }}</span>
                        </a>
                        
                        <!-- Copy button -->
                        <button onclick="copyReferralLink()" 
                                style="flex: 1; min-width: 120px; padding: 14px 20px; background: linear-gradient(135deg, #4CAF50, #2196F3); border: none; border-radius: 12px; color: white; cursor: pointer; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 8px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3); font-size: 1rem;"
                                onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(76, 175, 80, 0.5)';"
                                onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(76, 175, 80, 0.3)';">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                    </div>
                    
                    <!-- VISIBLE INPUT FIELD for copying - THIS FIXES THE EMPTY PASTE ISSUE -->
                    <div style="margin-top: 15px;">
                        <label style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 5px; display: block;">Or copy directly:</label>
                        <input type="text" id="referralLinkInput" value="{{ $fullUrl }}" 
                               style="width: 100%; padding: 12px; background: rgba(255,255,255,0.1); border: 2px solid #4CAF50; border-radius: 12px; color: white; font-size: 0.9rem; cursor: text;" 
                               readonly onclick="this.select()">
                    </div>
                    
                    <!-- Info text with badges -->
                    <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 15px; padding: 12px; background: rgba(76, 175, 80, 0.1); border-radius: 10px; align-items: center;">
                        <span style="background: #4CAF50; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold;">10%</span>
                        <span style="color: white;">on first deposit</span>
                        <span style="color: #4CAF50; font-weight: bold;">•</span>
                        <span style="background: #2196F3; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold;">5% / 3% / 1%</span>
                        <span style="color: white;">on all withdrawals</span>
                    </div>
                </div>
                
                <!-- Stats Grid -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <!-- Direct Referrals Card -->
                    <div style="background: rgba(33, 150, 243, 0.2); border-radius: 16px; padding: 1.2rem; text-align: center; border: 1px solid rgba(33, 150, 243, 0.4);">
                        <i class="fas fa-users" style="color: #2196F3; font-size: 2rem; margin-bottom: 10px;"></i>
                        <div style="color: #2196F3; font-size: 2.5rem; font-weight: bold;"><?php 
                            $level1Count = DB::table('referral_relationships')
                                ->where('referrer_id', session('user_id'))
                                ->where('level', 1)
                                ->count();
                            echo $level1Count; 
                        ?></div>
                        <div style="color: rgba(255,255,255,0.8);">Direct Referrals</div>
                    </div>
                    
                    <!-- Total Earned Card -->
                    <div style="background: rgba(255, 193, 7, 0.2); border-radius: 16px; padding: 1.2rem; text-align: center; border: 1px solid rgba(255, 193, 7, 0.4);">
                        <i class="fas fa-coins" style="color: #ffc107; font-size: 2rem; margin-bottom: 10px;"></i>
                        <div style="color: #ffc107; font-size: 2.5rem; font-weight: bold;">₹<?php 
                            $totalEarned = DB::table('referral_relationships')
                                ->where('referrer_id', session('user_id'))
                                ->where('bonus_paid', 1)
                                ->sum('bonus_amount') ?? 0;
                            echo number_format($totalEarned);
                        ?></div>
                        <div style="color: rgba(255,255,255,0.8);">Total Earned</div>
                    </div>
                </div>
            </div>
            
            <!-- Two Column Layout -->
            <div class="two-column">
                <!-- Recent Activity -->
                <div class="stat-card" style="padding: 1.2rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3 style="color: white; font-size: 1.1rem;">Recent Activity</h3>
                        <span style="color: rgba(255,255,255,0.3); font-size: 0.8rem;">Last 7 days</span>
                    </div>
                    <div>
                        <div class="activity-item">
                            <div><span style="color: #4CAF50;">⬆️</span> Daily credit received</div>
                            <span style="color: #4CAF50;">+₹<?php echo number_format($todayCredit); ?></span>
                        </div>
                        <div class="activity-item">
                            <div><span style="color: #2196F3;">📊</span> Active plans running</div>
                            <span><?php echo $activePlans->count(); ?> plans</span>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="stat-card" style="padding: 1.2rem; background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(33, 150, 243, 0.1));">
                    <h3 style="color: white; font-size: 1.1rem; margin-bottom: 1rem;">Quick Actions</h3>
                    <div class="action-buttons">
                        <a href="{{ url('/') }}#payment-verify" class="action-btn">
                            <i class="fas fa-credit-card"></i>
                            <span>Add Funds</span>
                        </a>
                        <a href="{{ url('/') }}#plans" class="action-btn">
                            <i class="fas fa-chart-line"></i>
                            <span>Buy Plan</span>
                        </a>
                        <a href="javascript:void(0)" onclick="window.openWithdrawModal(); return false;" class="action-btn">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span>Withdraw</span>
                        </a>
                        <a href="javascript:void(0)" onclick="window.openReferralModal(); return false;" class="action-btn">
                            <i class="fas fa-user-friends"></i>
                            <span>Referral</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Active Plans List -->
            <?php if($activePlans->count() > 0): ?>
            <div class="stat-card" style="margin-top: 1.5rem; padding: 1.2rem;">
                <h3 style="color: white; font-size: 1.1rem; margin-bottom: 1rem;">Your Active Plans</h3>
                <div class="plans-grid">
                    <?php foreach($activePlans as $plan): 
                        $planDetails = DB::table('plans')->where('id', $plan->plan_id)->first();
                    ?>
                    <div class="plan-item">
                        <h4 style="color: #4CAF50; margin-bottom: 0.3rem; font-size: 1rem;"><?php echo $planDetails->name ?? 'Plan'; ?></h4>
                        <p style="color: white; margin-bottom: 0.2rem; font-size: 0.9rem;">Daily: ₹<?php echo number_format($plan->daily_income); ?></p>
                        <p style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">Progress: <?php echo $plan->days_completed; ?>/<?php echo $plan->duration_days; ?> days</p>
                        <div class="progress-bar" style="margin-top: 0.5rem;">
                            <?php $progress = ($plan->days_completed / $plan->duration_days) * 100; ?>
                            <div class="progress-fill" style="width: <?php echo $progress; ?>%;"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php else: ?>
            <div class="empty-state" style="margin-top: 1.5rem;">
                <i class="fas fa-box-open"></i>
                <h3>No Active Plans</h3>
                <p>You haven't purchased any plans yet.</p>
                <a href="{{ url('/') }}#plans" class="btn btn-primary">Browse Plans</a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Withdrawal Modal -->
    <div id="withdrawModal">
        <div style="background: linear-gradient(135deg, #0a0f1e 0%, #1a1f32 100%); border-radius: 20px; padding: 25px; max-width: 450px; width: 90%; border: 1px solid rgba(255,255,255,0.1);">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="color: white; font-size: 1.3rem;">Withdraw Funds</h3>
                <button onclick="window.closeWithdrawModal()" style="background: none; border: none; color: white; font-size: 24px; cursor: pointer;">&times;</button>
            </div>
            
            <!-- User Asset Info -->
            <div style="background: rgba(76, 175, 80, 0.1); border-radius: 10px; padding: 15px; margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; color: white;">
                    <span>Available Assets:</span>
                    <span style="color: #4CAF50; font-weight: bold; font-size: 1.2rem;">₹<?php echo number_format($userAsset->remaining_assets ?? 0); ?></span>
                </div>
            </div>
            
            <form id="withdrawForm" onsubmit="window.submitWithdraw(event)">
                @csrf
                
                <!-- Amount -->
                <div style="margin-bottom: 15px;">
                    <label style="color: rgba(255,255,255,0.7); display: block; margin-bottom: 5px;">Withdrawal Amount *</label>
                    <input type="number" id="withdrawAmount" name="amount" required min="150" max="<?php echo $userAsset->remaining_assets ?? 0; ?>" step="1" 
                           style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white;">
                    <small style="color: rgba(255,255,255,0.4);">Minimum: ₹150</small>
                </div>
                
                <!-- Payment Method Tabs -->
                <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                    <button type="button" onclick="window.showBankForm()" id="bankTab" style="flex: 1; padding: 10px; background: rgba(33, 150, 243, 0.2); border: 1px solid #2196F3; border-radius: 8px; color: white; cursor: pointer;">Bank</button>
                    <button type="button" onclick="window.showUPIForm()" id="upiTab" style="flex: 1; padding: 10px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white; cursor: pointer;">UPI</button>
                </div>
                
                <!-- Bank Form (shown by default) -->
                <div id="bankForm">
                    <div style="margin-bottom: 15px;">
                        <label style="color: rgba(255,255,255,0.7); display: block; margin-bottom: 5px;">Account Holder Name *</label>
                        <input type="text" name="account_holder" placeholder="Enter account holder name" 
                               style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white;">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="color: rgba(255,255,255,0.7); display: block; margin-bottom: 5px;">Account Number *</label>
                        <input type="text" name="account_number" placeholder="Enter account number" 
                               style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white;">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="color: rgba(255,255,255,0.7); display: block; margin-bottom: 5px;">IFSC Code *</label>
                        <input type="text" name="ifsc_code" placeholder="Enter IFSC code" 
                               style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white;">
                    </div>
                </div>
                
                <!-- UPI Form (hidden by default) -->
                <div id="upiForm" style="display: none;">
                    <div style="margin-bottom: 15px;">
                        <label style="color: rgba(255,255,255,0.7); display: block; margin-bottom: 5px;">UPI ID *</label>
                        <input type="text" name="upi_id" placeholder="Enter UPI ID (e.g., name@okhdfcbank)" 
                               style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white;">
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" style="width: 100%; padding: 14px; background: linear-gradient(135deg, #4CAF50, #2196F3); border: none; border-radius: 10px; color: white; font-weight: bold; font-size: 1rem; cursor: pointer; margin-top: 10px;">
                    Request Withdrawal
                </button>
            </form>
            
            <p style="color: rgba(255,255,255,0.4); font-size: 0.8rem; text-align: center; margin-top: 15px;">
                Withdrawals are processed within 24-48 hours after admin approval.
            </p>
        </div>
    </div>

    <!-- Referral Modal -->
    <div id="referralModal">
        <div style="background: linear-gradient(135deg, #0a0f1e 0%, #1a1f32 100%); border-radius: 20px; padding: 25px; max-width: 500px; width: 90%; border: 1px solid rgba(255,255,255,0.1); max-height: 90vh; overflow-y: auto;">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="color: white; font-size: 1.3rem;">Referral Program</h3>
                <button onclick="window.closeReferralModal()" style="background: none; border: none; color: white; font-size: 24px; cursor: pointer;">&times;</button>
            </div>
            
            @php
                $userPhone = session('user_phone');
                $userId = session('user_id');
                $user = DB::table('users_auth_tables')->where('id', $userId)->first();
                
                // Get referral stats
                $level1Count = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 1)->count();
                $level2Count = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 2)->count();
                $level3Count = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 3)->count();
                $level4PlusCount = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', '>=', 4)->count();
                
                $level1Earnings = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 1)->where('bonus_paid', 1)->sum('bonus_amount');
                $level2Earnings = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 2)->where('bonus_paid', 1)->sum('bonus_amount');
                $level3Earnings = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 3)->where('bonus_paid', 1)->sum('bonus_amount');
                $level4PlusEarnings = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', '>=', 4)->where('bonus_paid', 1)->sum('bonus_amount');
                
                $totalEarnings = $level1Earnings + $level2Earnings + $level3Earnings + $level4PlusEarnings;
                
                // Get recent commissions
                $recentCommissions = DB::table('referral_relationships')
                    ->where('referrer_id', $userId)
                    ->where('bonus_paid', 1)
                    ->orderBy('updated_at', 'desc')
                    ->limit(5)
                    ->get();
            @endphp
            
            <!-- Referral Code -->
            <div style="background: rgba(76, 175, 80, 0.1); border-radius: 10px; padding: 20px; margin-bottom: 20px; text-align: center;">
                <p style="color: rgba(255,255,255,0.7); margin-bottom: 10px;">Your Referral Code</p>
                <div style="display: flex; gap: 10px;">
                    <input type="text" id="referralCode" value="{{ $user->referral_code }}" readonly style="flex: 1; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white; text-align: center; font-size: 1.2rem; font-weight: bold;">
                    <button onclick="copyReferralCode()" style="padding: 12px 20px; background: linear-gradient(135deg, #4CAF50, #2196F3); border: none; border-radius: 8px; color: white; cursor: pointer;">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
            </div>
            
            <!-- Total Stats -->
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 10px; padding: 15px; margin-bottom: 20px; text-align: center;">
                <span style="color: white; font-size: 1.2rem;">Total Referral Earnings</span>
                <h2 style="color: white; font-size: 2rem; margin-top: 5px;">₹{{ number_format($totalEarnings) }}</h2>
            </div>
            
            <!-- Commission Structure Banner -->
            <div style="background: rgba(255,255,255,0.03); border-radius: 10px; padding: 15px; margin-bottom: 20px;">
                <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 5px; text-align: center;">
                    <div>
                        <div style="color: #2196F3; font-size: 1.2rem; font-weight: bold;">5%</div>
                        <div style="color: rgba(255,255,255,0.7); font-size: 0.8rem;">Level 1</div>
                    </div>
                    <div>
                        <div style="color: #ff9f43; font-size: 1.2rem; font-weight: bold;">3%</div>
                        <div style="color: rgba(255,255,255,0.7); font-size: 0.8rem;">Level 2</div>
                    </div>
                    <div>
                        <div style="color: #9C27B0; font-size: 1.2rem; font-weight: bold;">2%</div>
                        <div style="color: rgba(255,255,255,0.7); font-size: 0.8rem;">Level 3</div>
                    </div>
                    <div>
                        <div style="color: #4CAF50; font-size: 1.2rem; font-weight: bold;">1%</div>
                        <div style="color: rgba(255,255,255,0.7); font-size: 0.8rem;">Level 4+</div>
                    </div>
                </div>
                <p style="color: rgba(255,255,255,0.5); text-align: center; margin-top: 10px; font-size: 0.8rem;">
                    Earn commissions on EVERY withdrawal from your downline!
                </p>
            </div>
            
            <!-- Level-wise Stats -->
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; margin-bottom: 20px;">
                <div style="background: rgba(33, 150, 243, 0.1); border-radius: 10px; padding: 10px; text-align: center;">
                    <span style="color: #2196F3; font-size: 1rem; font-weight: bold;">5%</span>
                    <p style="color: white; font-size: 1.2rem; margin: 5px 0;">{{ $level1Count }}</p>
                    <p style="color: rgba(255,255,255,0.5); font-size: 0.7rem;">Level 1</p>
                    <p style="color: #4CAF50; font-weight: bold; font-size: 0.9rem;">₹{{ number_format($level1Earnings) }}</p>
                </div>
                <div style="background: rgba(255, 159, 67, 0.1); border-radius: 10px; padding: 10px; text-align: center;">
                    <span style="color: #ff9f43; font-size: 1rem; font-weight: bold;">3%</span>
                    <p style="color: white; font-size: 1.2rem; margin: 5px 0;">{{ $level2Count }}</p>
                    <p style="color: rgba(255,255,255,0.5); font-size: 0.7rem;">Level 2</p>
                    <p style="color: #4CAF50; font-weight: bold; font-size: 0.9rem;">₹{{ number_format($level2Earnings) }}</p>
                </div>
                <div style="background: rgba(156, 39, 176, 0.1); border-radius: 10px; padding: 10px; text-align: center;">
                    <span style="color: #9C27B0; font-size: 1rem; font-weight: bold;">2%</span>
                    <p style="color: white; font-size: 1.2rem; margin: 5px 0;">{{ $level3Count }}</p>
                    <p style="color: rgba(255,255,255,0.5); font-size: 0.7rem;">Level 3</p>
                    <p style="color: #4CAF50; font-weight: bold; font-size: 0.9rem;">₹{{ number_format($level3Earnings) }}</p>
                </div>
                <div style="background: rgba(76, 175, 80, 0.1); border-radius: 10px; padding: 10px; text-align: center;">
                    <span style="color: #4CAF50; font-size: 1rem; font-weight: bold;">1%</span>
                    <p style="color: white; font-size: 1.2rem; margin: 5px 0;">{{ $level4PlusCount }}</p>
                    <p style="color: rgba(255,255,255,0.5); font-size: 0.7rem;">Level 4+</p>
                    <p style="color: #4CAF50; font-weight: bold; font-size: 0.9rem;">₹{{ number_format($level4PlusEarnings) }}</p>
                </div>
            </div>
            
            <!-- How it works -->
            <div style="margin-bottom: 20px;">
                <h4 style="color: white; font-size: 1rem; margin-bottom: 10px;">How it works:</h4>
                <ul style="color: rgba(255,255,255,0.7); font-size: 0.85rem; padding-left: 20px;">
                    <li><strong style="color: #2196F3;">Level 1 (5%):</strong> Direct referrals - earn 5% of every withdrawal they make</li>
                    <li><strong style="color: #ff9f43;">Level 2 (3%):</strong> People referred by your direct referrals - earn 3%</li>
                    <li><strong style="color: #9C27B0;">Level 3 (2%):</strong> People referred by your level 2 - earn 2%</li>
                    <li><strong style="color: #4CAF50;">Level 4+ (1%):</strong> All deeper levels - earn 1%</li>
                    <li>Commissions are added to your assets automatically when downline users withdraw</li>
                </ul>
            </div>
            
            <!-- Referral Link -->
            <div style="margin-bottom: 20px;">
                <p style="color: rgba(255,255,255,0.7); margin-bottom: 5px;">Your Referral Link:</p>
                <div style="display: flex; gap: 10px;">
                    <input type="text" id="referralLink" value="{{ url('register?ref=' . $user->referral_code) }}" readonly style="flex: 1; padding: 10px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white; font-size: 0.8rem;">
                    <button onclick="copyReferralLink()" style="padding: 10px 15px; background: linear-gradient(135deg, #4CAF50, #2196F3); border: none; border-radius: 8px; color: white; cursor: pointer;">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
            </div>
            
            <!-- Recent Commissions -->
            @if($recentCommissions->count() > 0)
            <div style="margin-bottom: 20px;">
                <h4 style="color: white; font-size: 1rem; margin-bottom: 10px;">Recent Commission Earnings</h4>
                @foreach($recentCommissions as $commission)
                <div style="background: rgba(255,255,255,0.03); border-radius: 8px; padding: 10px; margin-bottom: 5px; display: flex; justify-content: space-between;">
                    <div>
                        <span style="color: white;">Level {{ $commission->level }} Commission</span>
                        <span style="color: rgba(255,255,255,0.5); font-size: 0.7rem; margin-left: 8px;">
                            {{ \Carbon\Carbon::parse($commission->updated_at)->diffForHumans() }}
                        </span>
                    </div>
                    <span style="color: #4CAF50; font-weight: bold;">+₹{{ number_format($commission->bonus_amount) }}</span>
                </div>
                @endforeach
            </div>
            @endif
            
            <!-- Recent Referrals List -->
            <div>
                <h4 style="color: white; font-size: 1rem; margin-bottom: 10px;">Recent Referrals</h4>
                @php
                    $recentReferrals = DB::table('referral_relationships')
                        ->where('referrer_id', $userId)
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();
                @endphp
                
                @if($recentReferrals->count() > 0)
                    @foreach($recentReferrals as $ref)
                    <div style="background: rgba(255,255,255,0.03); border-radius: 8px; padding: 10px; margin-bottom: 8px; display: flex; justify-content: space-between;">
                        <div>
                            <span style="color: white;">{{ substr($ref->referred_phone, 0, 4) }}****</span>
                            <span style="color: rgba(255,255,255,0.5); font-size: 0.8rem; margin-left: 10px;">Level {{ $ref->level }}</span>
                        </div>
                        @if($ref->bonus_paid)
                        <span style="color: #4CAF50;">+₹{{ number_format($ref->bonus_amount) }}</span>
                        @else
                        <span style="color: rgba(255,255,255,0.3);">Pending</span>
                        @endif
                    </div>
                    @endforeach
                @else
                    <p style="color: rgba(255,255,255,0.5); text-align: center;">No referrals yet. Share your code to start earning!</p>
                @endif
            </div>
            
            <button onclick="window.closeReferralModal()" style="width: 100%; padding: 12px; margin-top: 20px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white; cursor: pointer;">
                Close
            </button>
        </div>
    </div>

    <script>
        // Make sure functions are globally available
        window.openWithdrawModal = function() {
            console.log('Opening withdraw modal');
            document.getElementById('withdrawModal').style.display = 'flex';
        }
        
        window.closeWithdrawModal = function() {
            document.getElementById('withdrawModal').style.display = 'none';
        }
        
        window.openReferralModal = function() {
            console.log('Opening referral modal');
            document.getElementById('referralModal').style.display = 'flex';
        }
        
        window.closeReferralModal = function() {
            document.getElementById('referralModal').style.display = 'none';
        }
        
        window.showBankForm = function() {
            document.getElementById('bankForm').style.display = 'block';
            document.getElementById('upiForm').style.display = 'none';
            document.getElementById('bankTab').style.background = 'rgba(33, 150, 243, 0.2)';
            document.getElementById('bankTab').style.border = '1px solid #2196F3';
            document.getElementById('upiTab').style.background = 'rgba(255,255,255,0.05)';
            document.getElementById('upiTab').style.border = '1px solid rgba(255,255,255,0.1)';
        }
        
        window.showUPIForm = function() {
            document.getElementById('bankForm').style.display = 'none';
            document.getElementById('upiForm').style.display = 'block';
            document.getElementById('upiTab').style.background = 'rgba(33, 150, 243, 0.2)';
            document.getElementById('upiTab').style.border = '1px solid #2196F3';
            document.getElementById('bankTab').style.background = 'rgba(255,255,255,0.05)';
            document.getElementById('bankTab').style.border = '1px solid rgba(255,255,255,0.1)';
        }
        
        window.submitWithdraw = function(event) {
            event.preventDefault();
            
            let formData = new FormData(document.getElementById('withdrawForm'));
            
            // Show loading
            let btn = event.target.querySelector('button[type="submit"]');
            let originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            btn.disabled = true;
            
            fetch('{{ url("user/withdraw-request") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('✅ ' + data.message);
                    window.closeWithdrawModal();
                    location.reload();
                } else {
                    alert('❌ ' + data.message);
                }
            })
            .catch(error => {
                alert('Something went wrong! Please try again.');
                console.error('Error:', error);
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }
        
        function copyReferralCode() {
            let code = document.getElementById('referralCode');
            code.select();
            code.setSelectionRange(0, 99999);
            document.execCommand('copy');
            alert('Referral code copied to clipboard!');
        }
        
        function copyReferralLink() {
            let link = document.getElementById('referralLinkInput');
            link.select();
            link.setSelectionRange(0, 99999);
            document.execCommand('copy');
            alert('✅ Referral link copied to clipboard!\n\n' + link.value);
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            let withdrawModal = document.getElementById('withdrawModal');
            let referralModal = document.getElementById('referralModal');
            if (event.target == withdrawModal) {
                window.closeWithdrawModal();
            }
            if (event.target == referralModal) {
                window.closeReferralModal();
            }
        }

        // Initialize bank form as default
        document.addEventListener('DOMContentLoaded', function() {
            // Make sure bank form is visible by default
            if(document.getElementById('bankForm')) {
                document.getElementById('bankForm').style.display = 'block';
            }
            if(document.getElementById('upiForm')) {
                document.getElementById('upiForm').style.display = 'none';
            }
        });
    </script>

    <script>
        // Generate floating particles (only on desktop)
        function createParticles() {
            if (window.innerWidth < 768) return;
            
            const container = document.getElementById('particles-container');
            if (!container) return;
            
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 10 + 's';
                particle.style.animationDuration = 10 + Math.random() * 20 + 's';
                particle.style.background = `rgba(${Math.random() * 100 + 155}, ${Math.random() * 100 + 155}, ${Math.random() * 100 + 155}, 0.5)`;
                container.appendChild(particle);
            }
        }
        
        document.addEventListener('DOMContentLoaded', createParticles);
        
        // Refresh on resize to adjust particles
        window.addEventListener('resize', function() {
            const container = document.getElementById('particles-container');
            if (container) {
                container.innerHTML = '';
                createParticles();
            }
        });
    </script>
</body>
</html>