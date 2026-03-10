<?php

use Illuminate\Support\Facades\Route;

// ========== FRONTEND ROUTES (Public) ==========
Route::get('/', [App\Http\Controllers\Front\IndexController::class, 'home']);
Route::get('blogs', [App\Http\Controllers\Front\IndexController::class, 'blog']);
Route::get('faqs', [App\Http\Controllers\Front\IndexController::class, 'faq']);
Route::get('how_it_works', [App\Http\Controllers\Front\IndexController::class, 'how_it_works']);
Route::get('terms', [App\Http\Controllers\Front\IndexController::class, 'term']);
Route::get('testimonials', [App\Http\Controllers\Front\IndexController::class, 'testimonial']);
Route::get('/privacy-policy', [App\Http\Controllers\Front\IndexController::class, 'privacy_policy_page']);
Route::get('/refund-policy', [App\Http\Controllers\Front\IndexController::class, 'refund_policy_page']);
Route::get('/terms-of-service', [App\Http\Controllers\Front\IndexController::class, 'terms_of_service']);


// ========== USER AUTHENTICATION ROUTES ==========
Route::get('register', [App\Http\Controllers\authcontroller::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [App\Http\Controllers\authcontroller::class, 'auth_insert'])->name('register');
Route::get('login', [App\Http\Controllers\authcontroller::class, 'login_page'])->name('login');
Route::post('login', [App\Http\Controllers\authcontroller::class, 'login'])->name('login.submit');
Route::get('logout', [App\Http\Controllers\authcontroller::class, 'logout'])->name('logout');

// ========== ADMIN LOGIN/LOGOUT ROUTES ==========
Route::get('admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.submit');
Route::get('admin/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

// ========== PUBLIC PAYMENT VERIFICATION ROUTE (NO MIDDLEWARE) ==========
Route::post('admin/payment_verification/store', [App\Http\Controllers\admin\payment_verification_controller::class, 'store'])->name('payment_verification.store');

// ========== PROTECTED ADMIN ROUTES (Require Login) ==========
Route::middleware(['admin.auth'])->group(function () {
    
    // Admin Dashboard
    Route::get('admins', [App\Http\Controllers\admin\indexcontroller::class, 'index_page'])->name('admin.dashboard');
    Route::get('admin/dashboard/refresh', [App\Http\Controllers\admin\indexcontroller::class, 'refresh'])->name('admin.dashboard.refresh');
    
    // Admin Testimonials
    Route::get('admin/testimonial', [App\Http\Controllers\admin\testimonialcontroller::class, 'testimonial_page'])->name('admin.testimonial');
    Route::post('admin/testimonial/add', [App\Http\Controllers\admin\testimonialcontroller::class, 'testimonial_add'])->name('admin.testimonial.add');
    Route::get('admin/testimonials/show', [App\Http\Controllers\admin\testimonialcontroller::class, 'show_testimonial'])->name('admin.testimonials.show');
    Route::post('admin/testimonials/delete/{id}', [App\Http\Controllers\admin\testimonialcontroller::class, 'delete_testimonial'])->name('admin.testimonials.delete');
    Route::get('admin/testimonial/edit/{id}', [App\Http\Controllers\admin\testimonialcontroller::class, 'edit_testimonial'])->name('admin.testimonial.edit');
    Route::post('testimonial_update', [App\Http\Controllers\admin\testimonialcontroller::class, 'update_testimonial'])->name('admin.testimonial.update');
    
    // Admin Payment Verification (View/Edit/Delete only - Store is public)
    Route::get('admin/payment_verification', [App\Http\Controllers\admin\payment_verification_controller::class, 'payment_verification_page'])->name('admin.payment_verification');
    Route::get('admin/payment_verification/show_payment', [App\Http\Controllers\admin\payment_verification_controller::class, 'show_payment_verification'])->name('admin.payment_verification.show');
    Route::post('admin/payment_verification/delete/{id}', [App\Http\Controllers\admin\payment_verification_controller::class, 'delete_payment_verification'])->name('admin.payment_verification.delete');
    Route::get('admin/payment_verification/edit/{id}', [App\Http\Controllers\admin\payment_verification_controller::class, 'edit_payment_verification'])->name('admin.payment_verification.edit');
    Route::post('admin/payment/approve/{id}', [App\Http\Controllers\admin\payment_verification_controller::class, 'approve_payment'])->name('admin.payment.approve');
    Route::post('admin/payment/reject/{id}', [App\Http\Controllers\admin\payment_verification_controller::class, 'reject_payment'])->name('admin.payment.reject');
    
    // Admin Withdrawals
    Route::get('admin/withdrawals', [App\Http\Controllers\admin\payment_verification_controller::class, 'withdrawalsPage'])->name('admin.withdrawals');
    Route::get('admin/withdraw/approve/{id}', [App\Http\Controllers\admin\payment_verification_controller::class, 'approveWithdrawal'])->name('admin.withdraw.approve');
    Route::post('admin/withdraw/reject/{id}', [App\Http\Controllers\admin\payment_verification_controller::class, 'rejectWithdrawal'])->name('admin.withdraw.reject');
    
    // Admin Blogs
    Route::get('admin/blog', [App\Http\Controllers\admin\blogcontroller::class, 'blog_page'])->name('admin.blog');
    Route::post('admin/blogs/add_blogs', [App\Http\Controllers\admin\blogcontroller::class, 'blog_add'])->name('admin.blog.add');
    Route::get('admin/blogs/show_blogs', [App\Http\Controllers\admin\blogcontroller::class, 'show_blogs'])->name('admin.blog.show');
    Route::get('admin/blogs/delete{id}', [App\Http\Controllers\admin\blogcontroller::class, 'blog_delete'])->name('admin.blog.delete');
    Route::get('admin/blogs/edit/{id}', [App\Http\Controllers\admin\blogcontroller::class, 'blog_edit'])->name('admin.blog.edit');
    Route::post('admin/blogs/update/{id}', [App\Http\Controllers\admin\blogcontroller::class, 'blog_update'])->name('admin.blog.update');
    
    // Admin Video
    Route::get('admin/video', [App\Http\Controllers\videocontroller::class, 'video'])->name('admin.video');
    Route::post('admin/video/store', [App\Http\Controllers\videocontroller::class, 'store'])->name('admin.video.store');
    
    // Admin Testing
    Route::get('admin/test-daily-credit', [App\Http\Controllers\admin\payment_verification_controller::class, 'testDailyCredit'])->name('admin.test-daily-credit');
});

// ========== USER DASHBOARD ==========
Route::get('user/dashboard', function() {
    if(!session()->has('user_id')) {
        return redirect('login')->with('error', 'Please login first');
    }
    
    $userId = session('user_id');
    $userPhone = session('user_phone');
    
    $user = DB::table('users_auth_tables')->where('id', $userId)->first();
    $userAsset = DB::table('user_assets')->where('phone', $userPhone)->first();
    $activePlans = DB::table('user_plans')->where('phone', $userPhone)->where('status', 1)->get();
    $todayCredit = DB::table('daily_wallet')->where('user_id', $userId)->where('credit_date', date('Y-m-d'))->sum('amount_credited');
    $totalDailyIncome = DB::table('user_plans')->where('phone', $userPhone)->where('status', 1)->sum('daily_income');
    
    // Referral stats
    $totalReferralEarnings = DB::table('referral_relationships')->where('referrer_id', $userId)->where('bonus_paid', 1)->sum('bonus_amount') ?? 0;
    $monthlyReferralEarnings = DB::table('referral_relationships')->where('referrer_id', $userId)->where('bonus_paid', 1)->whereMonth('updated_at', date('m'))->whereYear('updated_at', date('Y'))->sum('bonus_amount') ?? 0;
    $totalDownline = DB::table('referral_relationships')->where('referrer_id', $userId)->distinct('referred_id')->count('referred_id');
    $recentCommissions = DB::table('referral_relationships')->where('referrer_id', $userId)->where('bonus_paid', 1)->orderBy('updated_at', 'desc')->limit(5)->get();
    
    $level1Count = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 1)->count();
    $level2Count = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 2)->count();
    $level3Count = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', 3)->count();
    $level4PlusCount = DB::table('referral_relationships')->where('referrer_id', $userId)->where('level', '>=', 4)->count();
    
    return view('front.dashboard', compact(
        'user', 'userAsset', 'activePlans', 'todayCredit', 'totalDailyIncome',
        'totalReferralEarnings', 'monthlyReferralEarnings', 'totalDownline', 'recentCommissions',
        'level1Count', 'level2Count', 'level3Count', 'level4PlusCount'
    ));
})->name('user.dashboard');

// ========== USER ACTIONS ==========
Route::post('user/buy-plan-assets', [App\Http\Controllers\authcontroller::class, 'buyPlanWithAssets'])->name('user.buy-plan');
Route::post('user/withdraw-request', [App\Http\Controllers\authcontroller::class, 'withdrawRequest'])->name('user.withdraw');

// ========== AJAX ==========
Route::get('ajax/testimonials', [App\Http\Controllers\front\indexcontroller::class, 'testimonial_ajax'])->name('ajax.testimonials');

// ========== CHECK DAILY CREDIT ==========
Route::get('/check-daily-credit', function() {
    $activePlans = DB::table('user_plans')->where('status', 1)->where('days_completed', '<', 'duration_days')->get();
    $totalDailyPayout = $activePlans->sum('daily_income');
    $processedToday = DB::table('daily_wallet')->whereDate('created_at', today())->count();
    
    return [
        'date' => now()->toDateString(),
        'active_plans_count' => $activePlans->count(),
        'total_daily_payout' => '₹' . number_format($totalDailyPayout, 2),
        'processed_today' => $processedToday,
        'auto_credit_status' => $processedToday > 0 ? 'WORKING ✅' : 'NOT RUNNING ❌'
    ];
})->name('check-daily-credit');