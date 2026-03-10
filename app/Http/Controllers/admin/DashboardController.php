<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        /* ===============================
        TESTIMONIALS
        =============================== */

        $totalTestimonials = DB::table('testimonials')->count();

        $pendingTestimonials = DB::table('testimonials')
            ->where('status',0)
            ->count();


        /* ===============================
        USERS
        =============================== */

        $totalCustomers = DB::table('users_auth_tables')->count();


        /* ===============================
        PLANS / PRODUCTS
        =============================== */

        $totalPlans = DB::table('plans')->count();


        /* ===============================
        USER PURCHASES (ORDERS)
        =============================== */

        $totalOrders = DB::table('user_plans')->count();

        $pendingOrders = DB::table('user_plans')
            ->where('status','pending')
            ->count();


        /* ===============================
        WALLET / PAYMENTS
        =============================== */

        $totalWallet = DB::table('daily_wallet')->sum('amount') ?? 0;

        $pendingPayments = DB::table('daily_wallet')
            ->where('status','pending')
            ->sum('amount') ?? 0;

        $pendingPaymentsCount = DB::table('daily_wallet')
            ->where('status','pending')
            ->count();


        /* ===============================
        BLOGS
        =============================== */

        $totalBlogs = DB::table('blogs_tables')->count();

        $pendingBlogs = DB::table('blogs_tables')
            ->where('status','draft')
            ->count();


        /* ===============================
        REFERRALS
        =============================== */

        $totalReferrals = DB::table('referral_relationships')->count();


        /* ===============================
        MONTHLY EARNINGS
        =============================== */

        $thisMonthEarnings = DB::table('daily_wallet')
            ->whereMonth('created_at',now()->month)
            ->whereYear('created_at',now()->year)
            ->sum('amount') ?? 0;


        $lastMonthEarnings = DB::table('daily_wallet')
            ->whereMonth('created_at',now()->subMonth()->month)
            ->whereYear('created_at',now()->subMonth()->year)
            ->sum('amount') ?? 0;


        $earningsGrowth = 0;

        if($lastMonthEarnings > 0)
        {
            $earningsGrowth = round((($thisMonthEarnings - $lastMonthEarnings) / $lastMonthEarnings) * 100 ,1);
        }


        /* ===============================
        MONTHLY CHART
        =============================== */

        $monthlyEarnings = [];

        for($i=11;$i>=0;$i--)
        {
            $month = now()->subMonths($i);

            $earning = DB::table('daily_wallet')
                ->whereMonth('created_at',$month->month)
                ->whereYear('created_at',$month->year)
                ->sum('amount') ?? 0;

            $monthlyEarnings[] = $earning;
        }


        /* ===============================
        TOTAL PENDING ITEMS
        =============================== */

        $totalPendingItems =
            $pendingTestimonials +
            $pendingPaymentsCount +
            $pendingBlogs +
            $pendingOrders;


        return view('admin.dashboard', compact(

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
}