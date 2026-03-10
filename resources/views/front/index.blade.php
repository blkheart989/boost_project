<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SolarPanel – Smart Investment</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Font Awesome for stars & icons (Amazon/Flipkart style) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  .thumb-item {
    transition: all 0.2s ease;
    opacity: 0.8;
  }
  .thumb-item:hover {
    opacity: 1;
    border-color: #ff9f00 !important;
    transform: scale(1.08);
  }
  .video-wrapper button:hover {
    background: white !important;
    color: #ff9f00 !important;
  }
  /* responsive height for mobile */
  @media (max-width: 768px) {
    .video-display video {
      height: 260px !important;
    }
    .video-thumbnails {
      gap: 8px;
    }
    .thumb-item {
      width: 80px;
      height: 45px;
    }
  }
</style>

<style>
/* ---------- RESET & BASE (Flipkart/Amazon inspired) ---------- */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
}

body {
  background-color: #f1f3f6;  /* Amazon/Flipkart light grey */
  color: #0f1111;
}

/* section spacing */
.section {
  padding: 50px 20px;
  max-width: 1500px;
  margin: 0 auto;
}

.section-title {
  font-size: 2.2rem;
  font-weight: 600;
  margin-bottom: 30px;
  padding-left: 15px;
  border-left: 6px solid #ff9f00;  /* Flipkart orange touch */
  color: #1a1a1a;
}

/* cards grid (product style) */
.grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
}

.card {
  background: white;
  border-radius: 12px;
  padding: 25px 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  flex: 1 1 260px;
  max-width: 280px;
  text-align: center;
  transition: all 0.2s ease;
  border: 1px solid #f0f0f0;
}

.card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 24px rgba(0,0,0,0.1);
  border-color: #ff9f00;
}

.card h3 {
  font-size: 1.6rem;
  font-weight: 600;
  color: #232f3e;  /* amazon navy */
  margin-bottom: 12px;
}

.plan-price {
  font-size: 2rem;
  font-weight: 700;
  color: #b12704;  /* amazon price red */
  margin: 12px 0 5px;
}

.card p {
  color: #565656;
  margin: 8px 0;
}

.card button {
  background: #fb641b; /* flipkart orange */
  border: none;
  color: white;
  font-weight: 600;
  font-size: 1.1rem;
  padding: 12px 20px;
  border-radius: 8px;
  width: 100%;
  cursor: pointer;
  transition: 0.2s;
  margin-top: 15px;
  box-shadow: 0 2px 8px rgba(251,100,27,0.3);
}

.card button:hover {
  background: #ff811b;
}

/* hero (like amazon banner) */
.hero {
  background: linear-gradient(145deg, #041e42, #0b2b4f); /* amazon navy */
  color: white;
  text-align: center;
  padding: 70px 20px;
  margin-bottom: 20px;
}

.hero h1 {
  font-size: 3.2rem;
  font-weight: 700;
  margin-bottom: 12px;
}

.hero p {
  font-size: 1.4rem;
  opacity: 0.95;
}

.hero button {
  background: #ffd814;  /* amazon yellow */
  border: none;
  color: #0f1111;
  padding: 16px 48px;
  font-size: 1.2rem;
  font-weight: 600;
  border-radius: 40px;
  margin-top: 30px;
  cursor: pointer;
  transition: 0.2s;
  box-shadow: 0 2px 10px rgba(0,0,0,0.2);
}

.hero button:hover {
  background: #f7ca00;
}

/* testimonials section (amazon review style) */
#testimonials {
  background: white;
  padding: 50px 20px;
}

.testimonial-viewport {
  overflow: hidden;
  max-width: 1300px;
  margin: 0 auto;
}

.testimonial-track {
  display: flex;
  transition: transform 0.8s ease;
}

.testimonial-card {
  min-width: 33.333%;
  padding: 20px;
  background: #fff;
  border-right: 1px solid #eaeaea;
}

.testimonial-card:last-child {
  border-right: none;
}

.testimonial-card img {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #ff9f00;
}

.stars {
  color: #ffa41c; /* amazon star */
  margin: 8px 0;
}

.stars .filled {
  color: #ffa41c;
}

.stars i {
  margin-right: 2px;
}

/* blog cards */
.blog-grid {
  display: flex;
  gap: 30px;
  flex-wrap: wrap;
  justify-content: center;
}

.blog-card {
  background: white;
  border-radius: 16px;
  overflow: hidden;
  max-width: 550px;
  width: 100%;
  display: flex;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  border: 1px solid #e0e0e0;
}

.blog-card img {
  width: 200px;
  object-fit: cover;
}

.blog-content {
  padding: 22px;
  text-align: left;
}

.blog-content h3 {
  margin-bottom: 5px;
  color: #0f1111;
}

.blog-content small {
  color: #565656;
}

.blog-content p {
  margin: 12px 0;
  color: #2e2e2e;
}

.blog-content a {
  color: #007185;
  font-weight: 600;
  text-decoration: none;
}

/* contact (like amazon footer block) */
.contact-section {
  background: #232f3e;  /* amazon dark */
  color: white;
}

.contact-container {
  display: flex;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
  gap: 40px;
}

.contact-info {
  flex: 1 1 300px;
}

.contact-info ul {
  list-style: none;
  margin-top: 20px;
}

.contact-info li {
  margin: 10px 0;
  font-size: 1.1rem;
}

.contact-form {
  flex: 2 1 400px;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.contact-form input, 
.contact-form textarea {
  padding: 14px 18px;
  border-radius: 10px;
  border: none;
  font-size: 1rem;
  background: #f0f2f5;
}

.contact-form button {
  background: #ffd814;
  border: none;
  padding: 16px;
  font-weight: 700;
  font-size: 1.2rem;
  border-radius: 40px;
  cursor: pointer;
  width: 200px;
}

/* Why choose us (flipkart style highlights) */
.why-choose-us {
  background: white;
  padding: 50px 20px;
}

.why-cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
}

.why-card {
  background: #f9fafc;
  border-radius: 20px;
  padding: 30px 20px;
  max-width: 330px;
  text-align: center;
  border: 1px solid #eaeef2;
}

.why-card h3 {
  margin-bottom: 15px;
  color: #232f3e;
}

/* video section (clean like product video) */
.intro-video {
  background: #ffffff;
  padding: 50px 20px;
  text-align: center;
}

.video-wrapper {
  max-width: 1100px;
  margin: 30px auto;
  border-radius: 28px;
  overflow: hidden;
  box-shadow: 0 18px 36px rgba(0,0,0,0.1);
}

.video-wrapper video {
  width: 100%;
  height: 520px;
  object-fit: cover;
  background: #0f1111;
  display: block;
}

/* partners slider (amazon/Flipkart partner strip) */
.partners-slider-section {
  background: #ffffff;
  padding: 50px 0;
  border-top: 1px solid #e4e6e8;
  border-bottom: 1px solid #e4e6e8;
}

.slider {
  overflow: hidden;
  position: relative;
  width: 100%;
}

.slide-track {
  display: flex;
  gap: 60px;
  width: calc(200px * 16);
  animation: scroll 25s linear infinite;
}

.slide-track:hover {
  animation-play-state: paused;
}

.slide {
  width: 200px;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.slide img {
  width: 140px;
  height: 70px;
  object-fit: contain;
  filter: grayscale(20%) brightness(1.02);
  transition: 0.3s;
}

.slide img:hover {
  filter: grayscale(0%);
  transform: scale(1.08);
}

@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(calc(-200px * 8)); }
}

/* modal (floating cart style) */
.modal {
  display: none;
  position: fixed;
  top: 0; left: 0; width: 100%; height: 100%;
  background: rgba(0,0,0,0.5);
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.modal-box {
  background: white;
  padding: 40px;
  border-radius: 30px;
  max-width: 400px;
  width: 90%;
  text-align: center;
  box-shadow: 0 30px 50px rgba(0,0,0,0.5);
}

.modal-box button {
  background: #fb641b;
  color: white;
  border: none;
  padding: 14px 28px;
  margin: 12px 10px;
  border-radius: 40px;
  font-weight: 600;
  cursor: pointer;
  min-width: 120px;
}

/* mobile adjustments */
@media (max-width: 768px) {
  .hero h1 { font-size: 2.4rem; }
  .testimonial-card { min-width: 100%; }
  .blog-card { flex-direction: column; }
  .blog-card img { width: 100%; height: 200px; }
  .video-wrapper video { height: 260px; }
}
</style>

</head>
<body>

<!-- HEADER (simulated) -->
@include('front.layouts.header')  <!-- kept as per original; will render if Laravel, else ignored -->
<!-- but we show a simple top bar (amazon style) -->
<div style="background:#131921; color:white; padding:10px 30px; display:flex; align-items:center; gap:20px; flex-wrap:wrap;">
  <h2 style="color:#ff9f00;">SolarPanel.in</h2>
  <span style="flex:1; max-width:600px;"><input type="text" placeholder=" Search solar plans..." style="width:100%; padding:12px; border-radius:8px; border:none;"></span>
  <span><i class="fas fa-user"></i> Account</span>
  <span><i class="fas fa-shopping-cart"></i> Investment</span>
</div>

<!-- HERO -->
<section class="hero">
  <h1>Invest Once. Generate Daily.</h1>
  <p>Daily solar returns credited to your wallet automatically</p>
  <button onclick="document.getElementById('plans').scrollIntoView()">Explore Plans →</button>
</section>

<!-- ABOUT -->
<section class="section" id="about">
  <h2 class="section-title">Why SolarPanel?</h2>
  <div class="grid">
    <div class="card"><i class="fas fa-sun fa-3x" style="color:#ff9f00;"></i><h3 style="margin-top:15px;">100% Green Energy</h3><p>Backed by virtual solar assets</p></div>
    <div class="card"><i class="fas fa-lock fa-3x" style="color:#ff9f00;"></i><h3 style="margin-top:15px;">Secure & Insured</h3><p>Protected transactions</p></div>
    <div class="card"><i class="fas fa-wallet fa-3x" style="color:#ff9f00;"></i><h3 style="margin-top:15px;">Daily Auto Credit</h3><p>No manual claims</p></div>
  </div>
</section>
<section class="intro-video">

    <div style="position:relative; max-width:1000px; margin:50px auto;">

        <video id="mainVideoPlayer" controls
            style="width:100%; height:500px; object-fit:cover; border-radius:20px;">
        </video>

        <!-- Prev Button -->
        <button id="prevBtn"
            style="position:absolute; left:20px; top:50%; transform:translateY(-50%);
                   width:50px; height:50px; border-radius:50%; border:none;
                   background:white; font-size:24px; cursor:pointer;">
            ‹
        </button>

        <!-- Next Button -->
        <button id="nextBtn"
            style="position:absolute; right:20px; top:50%; transform:translateY(-50%);
                   width:50px; height:50px; border-radius:50%; border:none;
                   background:white; font-size:24px; cursor:pointer;">
            ›
        </button>

    </div>
    
<script>
    const videos = [
        @foreach($video as $v)
            "{{ asset('videos/'.$v->video) }}",
        @endforeach
    ];
</script>

</section>
<!-- HOW IT WORKS -->
<section class="section">
  <h2 class="section-title">Simple 3-Step Investment</h2>
  <div class="grid">
    <div class="card"><span style="font-size:3rem;">1️⃣</span><h3>Select Wattage</h3><p>Choose 1W, 2W, 5W plans</p></div>
    <div class="card"><span style="font-size:3rem;">2️⃣</span><h3>Pay securely</h3><p>UPI / Card / NetBanking</p></div>
    <div class="card"><span style="font-size:3rem;">3️⃣</span><h3>Daily earnings</h3><p>Auto credit starts next day</p></div>
  </div>
</section>
<!-- PLANS (SOLAR WATTAGE) -->
<section class="section" id="plans">
  <h2 class="section-title">Solar Investment Plans (in Watts)</h2>

  <!-- Show User Assets if logged in -->
  @if(session('user_id'))
  <?php
  $userPhone = session('user_phone');
  $userAsset = DB::table('user_assets')->where('phone', $userPhone)->first();
  ?>
    @if($userAsset)
    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 15px 20px; border-radius: 12px; margin-bottom: 25px; color: white; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <i class="fas fa-wallet" style="margin-right: 10px; font-size: 1.2rem;"></i>
            <strong>Your Assets Balance:</strong> 
            <span style="font-size: 1.8rem; font-weight: 700; margin-left: 10px; background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 50px;">₹{{ number_format($userAsset->remaining_assets) }}</span>
        </div>
        <div>
            <a href="{{ url('user/dashboard') }}" style="background: white; color: #764ba2; padding: 10px 20px; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-block;">
                <i class="fas fa-tachometer-alt"></i> My Dashboard
            </a>
        </div>
    </div>
    @else
    <div style="background: rgba(255, 193, 7, 0.1); border: 1px solid #ffc107; border-radius: 12px; padding: 15px 20px; margin-bottom: 25px; color: #ffc107; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <i class="fas fa-info-circle"></i>
            <strong>No assets found.</strong> Please make a payment first to buy plans.
        </div>
        <div>
            <a href="#payment-verify" style="background: #ffc107; color: #000; padding: 8px 15px; border-radius: 50px; text-decoration: none; font-weight: 600;">Make Payment</a>
        </div>
    </div>
    @endif
  @else
  <div style="background: rgba(33, 150, 243, 0.1); border: 1px solid #2196F3; border-radius: 12px; padding: 15px 20px; margin-bottom: 25px; color: #2196F3; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
      <div>
          <i class="fas fa-lock"></i>
          <strong>Please login to buy plans using your assets.</strong>
      </div>
      <div>
          <a href="{{ url('login') }}" style="background: #2196F3; color: white; padding: 8px 15px; border-radius: 50px; text-decoration: none; font-weight: 600;">Login</a>
          <a href="{{ url('login?form=register') }}" style="background: transparent; color: #2196F3; border: 1px solid #2196F3; padding: 8px 15px; border-radius: 50px; text-decoration: none; font-weight: 600; margin-left: 10px;">Register</a>
      </div>
  </div>
  @endif

  <div class="grid">
    @foreach($plans as $plan)
      <div class="card">
        <h3>{{ $plan->name }}</h3>

        <p class="plan-price">
          ₹{{ number_format($plan->daily_income) }}/day
        </p>

        <p>
          {{ $plan->duration_days }} days • 
          total ₹{{ number_format($plan->daily_income * $plan->duration_days) }}
        </p>

        <p style="font-size:0.9rem; margin-bottom: 15px;">
          Investment: ₹{{ number_format($plan->price) }}
        </p>

        @if(session('user_id'))
          @php
            $canBuy = ($userAsset && $userAsset->remaining_assets >= $plan->price);
          @endphp
          
          @if($canBuy)
            <button onclick="buyWithAssets({{ $plan->id }}, {{ $plan->price }}, '{{ $plan->name }}', {{ $plan->daily_income }}, {{ $plan->duration_days }})" 
                    style="background: #4CAF50; border: none; color: white; font-weight: 600; font-size: 1.1rem; padding: 12px 20px; border-radius: 8px; width: 100%; cursor: pointer; transition: 0.2s; box-shadow: 0 2px 8px rgba(76,175,80,0.3);">
              <i class="fas fa-shopping-cart"></i> Buy with Assets
            </button>
          @else
            <button disabled style="background: #ccc; border: none; color: #666; font-weight: 600; font-size: 1.1rem; padding: 12px 20px; border-radius: 8px; width: 100%; cursor: not-allowed;">
              <i class="fas fa-ban"></i> Insufficient Assets
            </button>
            @if($userAsset)
              <small style="color: #ff4444; display: block; margin-top: 8px;">
                Need ₹{{ number_format($plan->price - $userAsset->remaining_assets) }} more
              </small>
            @endif
          @endif
        @else
          <button onclick="window.location.href='{{ url('login') }}'" 
                  style="background: #2196F3; border: none; color: white; font-weight: 600; font-size: 1.1rem; padding: 12px 20px; border-radius: 8px; width: 100%; cursor: pointer;">
            <i class="fas fa-sign-in-alt"></i> Login to Buy
          </button>
        @endif
      </div>
    @endforeach
  </div>
</section>
<!-- TESTIMONIALS (dynamic) -->
<section id="testimonials">
  <h2 class="section-title">Investor Reviews</h2>
  <div class="testimonial-viewport">
    <div class="testimonial-track" id="testimonialTrack">
      @forelse($testimonials ?? [] as $testimonial)
        <div class="testimonial-card">
          <img src="{{ asset('show_testimonial/'.$testimonial->image) }}" onerror="this.src='https://via.placeholder.com/70'" alt="{{ $testimonial->name }}">
          <h4>{{ $testimonial->name }}</h4>
          <small>{{ $testimonial->designation }}</small>
          <div class="stars">
            @for($i = 1; $i <= 5; $i++)
              <i class="fa fa-star {{ $i <= $testimonial->rating ? 'filled' : '' }}"></i>
            @endfor
          </div>
          <p>{{ $testimonial->description }}</p>
        </div>
      @empty
        <!-- fallback static reviews (amazon style) -->
        <div class="testimonial-card"><img src="https://i.pravatar.cc/70?img=1"><h4>Rajesh Kumar</h4><small>Solar Investor</small><div class="stars"><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i></div><p>“Earning daily from 10W plan, absolutely seamless!”</p></div>
        <div class="testimonial-card"><img src="https://i.pravatar.cc/70?img=2"><h4>Priya Sharma</h4><small>Green Energy Advocate</small><div class="stars"><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star"></i></div><p>“Trusted platform, credits hit wallet at 7am daily.”</p></div>
        <div class="testimonial-card"><img src="https://i.pravatar.cc/70?img=3"><h4>Amit Verma</h4><small>First time investor</small><div class="stars"><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i></div><p>“Better than fixed deposits, and solar feels good.”</p></div>
        <div class="testimonial-card"><img src="https://i.pravatar.cc/70?img=4"><h4>Neha Gupta</h4><small>5W plan holder</small><div class="stars"><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i></div><p>“Withdrew returns instantly, no hidden fees.”</p></div>
      @endforelse
    </div>
  </div>
</section>

<!-- MISSION & VISION -->
<section class="mission-vision" style="background:#e6f2f2; padding:50px 20px;">
  <h2 class="section-title" style="text-align:center; border-left: none;">Our Mission & Vision</h2>
  <p style="max-width:900px; margin:auto; font-size:1.2rem; text-align:center;">
    <strong>Mission:</strong> Democratize solar energy investment – let every individual own virtual watts and earn daily.<br><br>
    <strong>Vision:</strong> Power a million households with clean energy credits by 2030.
  </p>
</section>

<!-- BLOG -->
<section class="section" id="blog">
  <h2 class="section-title">Solar Insights</h2>
  <div class="blog-grid">
    <div class="blog-card">
      <img src="https://picsum.photos/600/400?1" alt="solar blog">
      <div class="blog-content">
        <h3>Why watt-based investing is future</h3>
        <small>By SolarPanel • 15 Feb 2026</small>
        <p>You don't need roof, just buy watts and earn daily from solar yield...</p>
        <a href="#">Read →</a>
      </div>
    </div>
    <div class="blog-card">
      <img src="https://picsum.photos/600/400?2" alt="solar blog">
      <div class="blog-content">
        <h3>Daily vs Monthly: solar income</h3>
        <small>By Research team • 10 Feb 2026</small>
        <p>Daily compounding can boost overall returns, we explain with data.</p>
        <a href="#">Read →</a>
      </div>
    </div>
  </div>
</section>

<!-- PAYMENT VERIFICATION SECTION -->
<section class="section contact-section" id="payment-verify">
    <h2 class="section-title" style="color:white;">Payment Verification</h2>
    
    <!-- Success Message -->
    @if(session('success'))
    <div style="background: rgba(0,255,0,0.1); color: #00ff00; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-size: 1.1rem;">
        <i class="fas fa-check-circle" style="margin-right: 10px;"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Error Messages -->
    @if(session('error'))
    <div style="background: rgba(255,0,0,0.1); color: #ff4444; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
        <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i>
        {{ session('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div style="background: rgba(255,0,0,0.1); color: #ff4444; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        <ul style="padding-left:15px; margin-bottom:0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="contact-container">
        <div class="contact-info">
            <h3 style="color:#ff9f00;">Bank Transfer Details</h3>
            <p style="opacity:0.8;">Complete your payment and share the details below.</p>
            
            <div style="background: rgba(255,159,0,0.1); padding: 1.5rem; border-radius: 8px; margin: 1.5rem 0;">
                <p style="margin:0.8rem 0;"><strong>Bank Name:</strong> Indian Bank</p>
                <p style="margin:0.8rem 0;"><strong>ACCOUNT NO:</strong>8050556414</p>
                <p style="margin:0.8rem 0;"><strong>IFSC Code:</strong>IDFC0000C157 </p>
                <p style="margin:0.8rem 0;"><strong>Account Holder:</strong> Rakesh Yadav</p>
                <p style="margin:0.8rem 0;"><strong>OR:</strong>MAKE PAYMENT ON UPI</p>
                <p style="margin:0.8rem 0;"><strong>UPI ID:</strong>vrpso26@ptaxis</p>
                
            </div>
            
            <!-- Telegram Contact -->
            <div style="background: rgba(0, 136, 204, 0.1); padding: 1rem; border-radius: 8px; margin: 1.5rem 0; border-left: 3px solid #0088cc;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0088cc">
                        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.248l-1.885 8.873c-.14.654-.487.81-1.014.502l-2.802-2.064-1.35 1.298c-.15.149-.276.276-.565.276l.2-2.85 5.194-4.695c.227-.2-.05-.312-.352-.112l-6.42 4.04-2.77-.922c-.602-.192-.615-.602.126-.89l10.828-4.174c.502-.184.94.11.78.89z"/>
                    </svg>
                    <span style="color:#0088cc; font-weight: bold;">Quick Support on Telegram</span>
                </div>
                <p style="margin: 0.3rem 0;">Having payment issues? Message us instantly:</p>
                <div style="display: flex; gap: 10px; margin-top: 0.5rem;">
                    <!-- Corrected admin link -->
                    <a href="https://t.me/solar_earn" target="_blank" style="background: #0088cc; color: white; padding: 0.3rem 1rem; border-radius: 5px; text-decoration: none; font-size: 0.9rem;">@solarpaneladmin</a>
                    
                    <!-- Corrected support link -->
                    <a href="https://t.me/+_PVubJPTYek3MzU1" target="_blank" style="background: #0088cc; color: white; padding: 0.3rem 1rem; border-radius: 5px; text-decoration: none; font-size: 0.9rem;">@solarpanelsupport</a>
                </div>
            </div>
            
            <ul style="list-style: none; margin-top: 20px;">
                <li style="margin: 10px 0;"><i class="fas fa-envelope" style="color:#ff9f00; margin-right: 10px;"></i> solar@panel.in</li>
                <li style="margin: 10px 0;"><i class="fas fa-clock" style="color:#ff9f00; margin-right: 10px;"></i> 1 PM – 4 PM (all days)</li>
            </ul>
        </div>

        <form class="contact-form"
              id="paymentForm"
              action="{{ url('admin/payment_verification/store') }}"
              method="POST"
              enctype="multipart/form-data">
            
            @csrf
            <input type="hidden" name="plan_id" id="plan_id">

            <h3 style="color:#ff9f00;">Submit Payment Details</h3>

            <!-- Email -->
            <input type="email"
                   name="email"
                   placeholder="Your Email *"
                   value="{{ old('email') }}"
                   required>

            <!-- Phone -->
            <input type="tel"
                   name="number"
                   placeholder="Your Phone Number *"
                   value="{{ old('number') }}"
                   required>

            <!-- Amount -->
            <input type="number"
                   name="rupees"
                   placeholder="Enter Amount *"
                   value="{{ old('rupees') }}"
                   min="1"
                   required>

            <!-- UTR -->
            <input type="text"
                   name="utr_number"
                   placeholder="UTR Number *"
                   value="{{ old('utr_number') }}"
                   required>

            <!-- Screenshot -->
            <input type="file"
                   name="image"
                   accept="image/jpeg,image/png,image/jpg"
                   required
                   style="color:white;">

            <!-- Message -->
            <textarea name="message"
                      placeholder="Additional notes (optional)"
                      rows="4">{{ old('message') }}</textarea>

            <button type="submit">Submit for Verification</button>
        </form>
    </div>
</section>

<!-- ===== NEW PARTNERS SLIDER SECTION ===== -->
<!-- ===== FIXED PARTNERS SLIDER SECTION WITH WORKING IMAGES ===== -->
<!-- ===== PARTNERS SLIDER SECTION WITH LOCAL IMAGES ===== -->
<!-- ===== PARTNERS SLIDER WITH WORKING URLS ===== -->
<section class="partners-slider-section" style="background: #ffffff; padding: 50px 0; border-top: 1px solid #e4e6e8; border-bottom: 1px solid #e4e6e8;">
    <div style="max-width: 1400px; margin: 0 auto; padding: 0 20px;">
        <h2 class="section-title" style="margin-bottom: 40px; font-size: 2.2rem; font-weight: 600; border-left: 6px solid #ff9f00; padding-left: 15px;">Our Payment Partners</h2>
        
        <div class="slider" style="overflow: hidden; position: relative; width: 100%;">
            <div class="slide-track" style="display: flex; gap: 60px; width: calc(200px * 16); animation: scroll 25s linear infinite;">
                
                <!-- Paytm -->
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://assetscdn1.paytm.com/images/catalog/category/5165/paytm_logo.png" alt="Paytm" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                
                <!-- Google Pay -->
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://pay.google.com/about/static/images/logos/google-pay-logo.svg" alt="Google Pay" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                
                <!-- PhonePe -->
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://download.logo.wine/logo/PhonePe/PhonePe-Logo.wine.png" alt="PhonePe" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                
                <!-- Amazon Pay -->
                {{-- <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_Pay_logo.svg" alt="Amazon Pay" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                 --}}
                <!-- BHIM UPI -->
                {{-- <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/94/BHIM_Logo.svg" alt="BHIM UPI" style="width: 120px; height: auto; object-fit: contain;">
                </div> --}}
                
                <!-- Visa -->
                {{-- <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" style="width: 120px; height: auto; object-fit: contain;">
                </div> --}}
                
                <!-- Mastercard -->
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                
                <!-- RuPay -->
                {{-- <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/7a/RuPay.svg" alt="RuPay" style="width: 120px; height: auto; object-fit: contain;">
                </div> --}}
                
                <!-- Duplicate for seamless loop -->
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://assetscdn1.paytm.com/images/catalog/category/5165/paytm_logo.png" alt="Paytm" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://pay.google.com/about/static/images/logos/google-pay-logo.svg" alt="Google Pay" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://download.logo.wine/logo/PhonePe/PhonePe-Logo.wine.png" alt="PhonePe" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_Pay_logo.svg" alt="Amazon Pay" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/94/BHIM_Logo.svg" alt="BHIM UPI" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" style="width: 120px; height: auto; object-fit: contain;">
                </div>
                <div class="slide" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/7a/RuPay.svg" alt="RuPay" style="width: 120px; height: auto; object-fit: contain;">
                </div>
            </div>
        </div>
        
        <!-- Trust badges under slider -->
        <div style="display: flex; justify-content: center; gap: 40px; margin-top: 40px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-shield-alt" style="color: #ff9f00; font-size: 1.5rem;"></i>
                <span style="color: #333; font-weight: 500;">100% Secure Payments</span>
            </div>
            <div style="display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-lock" style="color: #ff9f00; font-size: 1.5rem;"></i>
                <span style="color: #333; font-weight: 500;">256-bit SSL Encryption</span>
            </div>
            <div style="display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-clock" style="color: #ff9f00; font-size: 1.5rem;"></i>
                <span style="color: #333; font-weight: 500;">Instant Verification</span>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-200px * 8)); }
}

.slide-track:hover {
    animation-play-state: paused;
}

.slide img {
    filter: grayscale(20%);
    transition: all 0.3s ease;
    max-width: 120px;
    max-height: 70px;
}

.slide img:hover {
    filter: grayscale(0%);
    transform: scale(1.1);
}
</style>


        <!-- Trust badges under slider -->
       
</section>


<!-- FOOTER (include) -->
@include('front.layouts.footer')

<!-- MODAL -->
<div class="modal" id="modal">
  <div class="modal-box">
    <h3>Secure Checkout</h3>

    <p>
      Invest in <span id="planName"></span> :
      ₹<span id="pay"></span>
    </p>

    <input type="hidden" id="plan_id">

    <!-- Payment Section -->
    <div id="upiSection" style="display:none; margin-top:15px;">
        <p><strong>Send Payment To:</strong></p>
        <p style="font-size:18px; color:green;">
            yourname@upi
        </p>

        <p>Amount: ₹<span id="upiAmount"></span></p>

        <p style="color:red;">
            After payment, send screenshot to admin.
        </p>
    </div>

    <button onclick="showUPI()">UPI</button>
    <button onclick="document.getElementById('modal').style.display='none'">Close</button>
  </div>
</div>
</div>

<script>
  // buy function (modal)
  window.buyPlan = function(plan, amount) {
    document.getElementById('planName').innerText = plan;
    document.getElementById('pay').innerText = amount;
    document.getElementById('modal').style.display = 'flex';
  };
  window.completePayment = function() {
    alert('Payment simulation: redirect to gateway. (demo)');
    document.getElementById('modal').style.display = 'none';
  };

  // testimonial auto slide
  document.addEventListener("DOMContentLoaded", function() {
    let index = 0;
    const track = document.querySelector('.testimonial-track');
    if (!track) return;
    const cards = document.querySelectorAll('.testimonial-card');
    if (cards.length === 0) return;
    const visible = window.innerWidth < 768 ? 1 : 3;
    const total = cards.length;
    if (total <= visible) return;
    setInterval(() => {
      index = (index + 1) > (total - visible) ? 0 : index + 1;
      let cardWidth = cards[0].offsetWidth;
      track.style.transform = `translateX(-${index * cardWidth}px)`;
    }, 3800);
  });
</script>


<!-- JavaScript to handle dynamic video switching -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const player = document.getElementById("mainVideoPlayer");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    if (videos.length === 0) {
        console.log("No videos found");
        return;
    }

    let currentIndex = 0;

    function loadVideo(index) {
        if (index < 0) index = videos.length - 1;
        if (index >= videos.length) index = 0;

        currentIndex = index;
        player.src = videos[currentIndex];
        player.load();
        player.play().catch(()=>{});
    }

    prevBtn.addEventListener("click", function () {
        loadVideo(currentIndex - 1);
    });

    nextBtn.addEventListener("click", function () {
        loadVideo(currentIndex + 1);
    });

    player.addEventListener("ended", function () {
        loadVideo(currentIndex + 1);
    });

    loadVideo(0);
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const player = document.getElementById("mainVideoPlayer");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    if (videos.length === 0) {
        alert("No videos available");
        return;
    }

    let currentIndex = 0;

    function loadVideo(index) {
        if (index < 0) index = videos.length - 1;
        if (index >= videos.length) index = 0;

        currentIndex = index;
        player.src = videos[currentIndex];
        player.load();
        player.play().catch(()=>{});
    }

    prevBtn.addEventListener("click", function () {
        loadVideo(currentIndex - 1);
    });

    nextBtn.addEventListener("click", function () {
        loadVideo(currentIndex + 1);
    });

    // Auto load first video
    loadVideo(0);

    // Optional: auto next when video ends
    player.addEventListener("ended", function () {
        loadVideo(currentIndex + 1);
    });

});
</script>
{{-- <!-- small style for existing @include --> --}}
<style>
  .footer { background: #131A22; color: #ddd; padding: 30px; text-align: center; margin-top: 20px; }
</style>


<script>
function buyPlan(id, price, name) {

    document.getElementById("planName").innerText = name;
    document.getElementById("pay").innerText = price;
    document.getElementById("upiAmount").innerText = price;

    document.getElementById("plan_id").value = id;

    document.getElementById("modal").style.display = "block";
}

function showUPI() {
    document.getElementById("upiSection").style.display = "block";
}
</script>
<script>
function buyWithAssets(planId, price, planName, dailyIncome, durationDays) {
    // Show confirmation modal
    if(confirm(`Buy ${planName} for ₹${price} using your assets?\n\n` +
               `📊 Daily Income: ₹${dailyIncome}\n` +
               `⏱️ Duration: ${durationDays} days\n` +
               `💰 Total Return: ₹${dailyIncome * durationDays}\n\n` +
               `Click OK to confirm purchase`)) {
        
        // Show loading state
        let btn = event.target;
        let originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        btn.disabled = true;
        
        // Send AJAX request to purchase
        $.ajax({
            url: '{{ url("user/buy-plan-assets") }}',
            type: 'POST',
            data: {
                plan_id: planId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.success) {
                    alert('✅ ' + response.message);
                    location.reload(); // Refresh to show updated balance
                } else {
                    alert('❌ ' + response.message);
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }
            },
            error: function(xhr) {
                let message = 'Something went wrong';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                alert('❌ ' + message);
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        });
    }
}
</script>
</body>
</html>