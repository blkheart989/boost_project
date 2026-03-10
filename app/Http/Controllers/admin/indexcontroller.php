<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class indexcontroller extends Controller
{
    public function index_page()
    {

        // TESTIMONIALS
        $totalTestimonials = DB::table('testimonials')->count();
        $pendingTestimonials = DB::table('testimonials')->where('status',0)->count();

        // USERS
        $totalCustomers = DB::table('users_auth_tables')->count();

        // PLANS
        $totalPlans = DB::table('plans')->count();

        // ORDERS
        $totalOrders = DB::table('user_plans')->count();
        $pendingOrders = DB::table('user_plans')->where('status','pending')->count();

        // WALLET
        $totalWallet = DB::table('daily_wallet')->sum('amount_credited') ?? 0;

        $pendingPayments = DB::table('daily_wallet')
            ->where('status','credited')
            ->sum('amount_credited');

        $pendingPaymentsCount = DB::table('daily_wallet')
            ->where('status','credited')
            ->count();

        // BLOGS
        $totalBlogs = DB::table('blogs_tables')->count();
        $pendingBlogs = DB::table('blogs_tables')->where('status','draft')->count();

        // REFERRALS
        $totalReferrals = DB::table('referral_relationships')->count();

        // MONTHLY EARNINGS
        $thisMonthEarnings = DB::table('daily_wallet')
            ->whereMonth('created_at',now()->month)
            ->sum('amount_credited') ?? 0;

        $lastMonthEarnings = DB::table('daily_wallet')
            ->whereMonth('created_at',now()->subMonth()->month)
            ->sum('amount_credited') ?? 0;

        $earningsGrowth = 0;

        if($lastMonthEarnings > 0){
            $earningsGrowth = round((($thisMonthEarnings - $lastMonthEarnings) / $lastMonthEarnings) * 100,1);
        }

        // MONTHLY CHART
        $monthlyEarnings = [];

        for($i=11;$i>=0;$i--)
        {
            $month = now()->subMonths($i);

            $earning = DB::table('daily_wallet')
                ->whereMonth('created_at',$month->month)
                ->whereYear('created_at',$month->year)
                ->sum('amount_credited') ?? 0;

            $monthlyEarnings[] = $earning;
        }

        $totalPendingItems =
            $pendingTestimonials +
            $pendingPaymentsCount +
            $pendingBlogs +
            $pendingOrders;

        return view('admin.index', compact(

            'totalTestimonials',
            'pendingTestimonials',
            'totalCustomers',
            'totalPlans',
            'totalOrders',
            'pendingOrders',
            'totalWallet',
            'pendingPayments',
            'pendingPaymentsCount',
            'totalBlogs',
            'pendingBlogs',
            'totalReferrals',
            'thisMonthEarnings',
            'earningsGrowth',
            'monthlyEarnings',
            'totalPendingItems'
        ));
    }
    public function refresh()
{
    return response()->json([
        'totalTestimonials' => DB::table('testimonials')->count(),
        'pendingTestimonials' => DB::table('testimonials')->where('status',0)->count(),
        'pendingPayments' => DB::table('daily_wallet')->sum('amount_credited'),
        'pendingPaymentsCount' => DB::table('daily_wallet')->count(),
        'totalOrders' => DB::table('user_plans')->count(),
        'pendingOrders' => DB::table('user_plans')->where('status','pending')->count(),
        'totalBlogs' => DB::table('blogs_tables')->count(),
        'pendingBlogs' => DB::table('blogs_tables')->where('status','draft')->count()
    ]);
}
}