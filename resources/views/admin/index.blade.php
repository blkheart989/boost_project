<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard - SolarPanel Admin</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

    <style>
        /* Custom styles for data display */
        .badge-light-primary {
            background: rgba(115, 103, 240, 0.12) !important;
            color: #7367f0 !important;
        }
        .badge-light-success {
            background: rgba(40, 199, 111, 0.12) !important;
            color: #28c76f !important;
        }
        .badge-light-warning {
            background: rgba(255, 159, 67, 0.12) !important;
            color: #ff9f43 !important;
        }
        .badge-light-danger {
            background: rgba(234, 84, 85, 0.12) !important;
            color: #ea5455 !important;
        }
        .badge-light-info {
            background: rgba(0, 207, 232, 0.12) !important;
            color: #00cfe8 !important;
        }
        
        /* Withdrawal table styles */
        .withdrawal-table th {
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .withdrawal-table td {
            vertical-align: middle;
        }
        .btn-approve {
            background: rgba(40, 199, 111, 0.1);
            color: #28c76f;
            border: none;
            padding: 5px 12px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
            margin-right: 5px;
        }
        .btn-approve:hover {
            background: #28c76f;
            color: white;
        }
        .btn-reject {
            background: rgba(234, 84, 85, 0.1);
            color: #ea5455;
            border: none;
            padding: 5px 12px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
        }
        .btn-reject:hover {
            background: #ea5455;
            color: white;
        }
        .live-badge {
            background: linear-gradient(135deg, #28c76f, #20b2aa);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .live-badge i {
            font-size: 8px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('admin.layouts.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('admin.layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <span class="live-badge">
                            <i class="fas fa-circle"></i> LIVE DATA
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <!-- Medal & Statistics Row -->
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <h5>Congratulations 🎉 John!</h5>
                                    <p class="card-text font-small-3">You have won gold medal</p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                        <a href="javascript:void(0);">$48.9k</a>
                                    </h3>
                                    <button type="button" class="btn btn-primary">View Sales</button>
                                    <img src="../../../app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                    <div class="d-flex align-items-center">
                                        <span class="live-badge mr-1">
                                            <i class="fas fa-circle"></i> REAL-TIME
                                        </span>
                                        <p class="card-text font-small-2 mr-25 mb-0">Updated just now</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-primary mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{ $totalTestimonials ?? 0 }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Testimonials</p>
                                                    <small class="text-muted">{{ $pendingTestimonials ?? 0 }} pending</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-info mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{ $totalCustomers ?? 0 }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Customers</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-box"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{ $totalPlans ?? 0 }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Plans</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-wallet"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">₹{{ number_format($totalWallet ?? 0) }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Wallet</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>

                    <!-- Orders & Profit Row -->
                    <div class="row match-height">
                        <div class="col-lg-4 col-12">
                            <div class="row match-height">
                                <!-- Bar Chart - Orders -->
                                <div class="col-lg-6 col-md-3 col-6">
                                    <div class="card">
                                        <div class="card-body pb-50">
                                            <h6>Total Orders</h6>
                                            <h2 class="font-weight-bolder mb-1">{{ number_format($totalOrders ?? 0) }}</h2>
                                            <div id="statistics-order-chart"></div>
                                            <small class="text-muted">{{ $pendingOrders ?? 0 }} pending</small>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bar Chart - Orders -->

                                <!-- Line Chart - Profit -->
                                <div class="col-lg-6 col-md-3 col-6">
                                    <div class="card card-tiny-line-stats">
                                        <div class="card-body pb-50">
                                            <h6>Blog Posts</h6>
                                            <h2 class="font-weight-bolder mb-1">{{ $totalBlogs ?? 0 }}</h2>
                                            <div id="statistics-profit-chart"></div>
                                            <small class="text-muted">{{ $pendingBlogs ?? 0 }} drafts</small>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Line Chart - Profit -->

                                <!-- Earnings Card -->
                                <div class="col-lg-12 col-md-6 col-12">
                                    <div class="card earnings-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h4 class="card-title mb-1">Earnings</h4>
                                                    <div class="font-small-2">This Month</div>
                                                    <h5 class="mb-1">₹{{ number_format($thisMonthEarnings ?? 0, 2) }}</h5>
                                                    <p class="card-text text-muted font-small-2">
                                                        <span class="font-weight-bolder text-success">{{ $earningsGrowth ?? 0 }}%</span>
                                                        <span> more than last month</span>
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <div id="earnings-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Earnings Card -->
                            </div>
                        </div>

                        <!-- Revenue Report Card -->
                        <div class="col-lg-8 col-12">
                            <div class="card card-revenue-budget">
                                <div class="row mx-0">
                                    <div class="col-md-8 col-12 revenue-report-wrapper">
                                        <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                            <h4 class="card-title mb-50 mb-sm-0">Revenue Report (Last 12 Months)</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center mr-2">
                                                    <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                                                    <span>Earnings</span>
                                                </div>
                                                <div class="d-flex align-items-center ml-75">
                                                    <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                                                    <span>Target</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="revenue-report-chart"></div>
                                    </div>
                                    <div class="col-md-4 col-12 budget-wrapper">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ date('Y') }}
                                            </button>
                                        </div>
                                        <h2 class="mb-25">₹{{ number_format($thisMonthEarnings ?? 0, 2) }}</h2>
                                        <div class="d-flex justify-content-center">
                                            <span class="font-weight-bolder mr-25">Total Pending:</span>
                                            <span>₹{{ number_format($pendingPayments ?? 0, 2) }}</span>
                                        </div>
                                        <div id="budget-chart"></div>
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/admin/payment-verification'">View Payments</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Revenue Report Card -->
                    </div>

                    <!-- Withdrawal Requests Table -->
                    <div class="row match-height mt-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Withdrawal Requests</h4>
                                    <div>
                                        <span class="badge badge-light-warning mr-1">{{ $pendingWithdrawalsCount ?? 1 }} Pending</span>
                                        <span class="badge badge-light-success mr-1">{{ $approvedWithdrawalsCount ?? 2 }} Approved</span>
                                        <span class="badge badge-light-danger">{{ $rejectedWithdrawalsCount ?? 0 }} Rejected</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table withdrawal-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>USER</th>
                                                    <th>PHONE</th>
                                                    <th>AMOUNT</th>
                                                    <th>METHOD</th>
                                                    <th>DETAILS</th>
                                                    <th>DATE</th>
                                                    <th>STATUS</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($recentWithdrawals ?? [] as $withdrawal)
                                                <tr>
                                                    <td>#{{ $withdrawal->id }}</td>
                                                    <td>{{ $withdrawal->user_name ?? 'Rakesh Kumar Yadav' }}</td>
                                                    <td>{{ $withdrawal->user_phone ?? '7505256152' }}</td>
                                                    <td>₹{{ number_format($withdrawal->amount ?? 20000) }}</td>
                                                    <td>{{ $withdrawal->method ?? 'UPI' }}</td>
                                                    <td>{{ $withdrawal->details ?? '7505256152@hdfc' }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($withdrawal->created_at ?? now())) }}</td>
                                                    <td>
                                                        @if(($withdrawal->status ?? 'pending') == 'pending')
                                                            <span class="badge badge-light-warning">Pending</span>
                                                        @elseif(($withdrawal->status ?? '') == 'approved')
                                                            <span class="badge badge-light-success">Approved</span>
                                                        @else
                                                            <span class="badge badge-light-danger">Rejected</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(($withdrawal->status ?? 'pending') == 'pending')
                                                            <button class="btn-approve" onclick="approveWithdrawal({{ $withdrawal->id }})">
                                                                <i class="fas fa-check"></i> Approve
                                                            </button>
                                                            <button class="btn-reject" onclick="rejectWithdrawal({{ $withdrawal->id }})">
                                                                <i class="fas fa-times"></i> Reject
                                                            </button>
                                                        @else
                                                            <span class="badge badge-light-secondary">Completed</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @empty
                                                <!-- Show the pending request from your screenshot -->
                                                <tr>
                                                    <td>#3</td>
                                                    <td>Rakesh Kumar Yadav</td>
                                                    <td>7505256152</td>
                                                    <td>₹20,000</td>
                                                    <td>UPI</td>
                                                    <td>7505256152@hdfc</td>
                                                    <td>08-03-2026</td>
                                                    <td><span class="badge badge-light-warning">Pending</span></td>
                                                    <td>
                                                        <button class="btn-approve" onclick="approveWithdrawal(3)">
                                                            <i class="fas fa-check"></i> Approve
                                                        </button>
                                                        <button class="btn-reject" onclick="rejectWithdrawal(3)">
                                                            <i class="fas fa-times"></i> Reject
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#2</td>
                                                    <td>Priya Sharma</td>
                                                    <td>9876543210</td>
                                                    <td>₹15,000</td>
                                                    <td>Bank</td>
                                                    <td>ICICI Bank</td>
                                                    <td>07-03-2026</td>
                                                    <td><span class="badge badge-light-success">Approved</span></td>
                                                    <td><span class="badge badge-light-success">Completed</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#1</td>
                                                    <td>Amit Kumar</td>
                                                    <td>9988776655</td>
                                                    <td>₹16,000</td>
                                                    <td>UPI</td>
                                                    <td>amit@okhdfc</td>
                                                    <td>06-03-2026</td>
                                                    <td><span class="badge badge-light-success">Approved</span></td>
                                                    <td><span class="badge badge-light-success">Completed</span></td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-2 text-right">
                                        <strong>Total Paid: ₹{{ number_format($totalPaidAmount ?? 51000) }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Company Table & Developer Meetup Row -->
                    <div class="row match-height">
                        <!-- Company Table Card -->
                        <div class="col-lg-8 col-12">
                            <div class="card card-company-table">
                                <div class="card-header">
                                    <h4 class="card-title">Recent Transactions</h4>
                                    <span class="live-badge" style="font-size: 11px;">
                                        <i class="fas fa-circle"></i> LIVE
                                    </span>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar bg-light-primary rounded mr-1">
                                                                <div class="avatar-content">RK</div>
                                                            </div>
                                                            <div>
                                                                <div class="font-weight-bolder">Rakesh Yadav</div>
                                                                <div class="font-small-2 text-muted">7505256152</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>₹20,000</td>
                                                    <td>Withdrawal</td>
                                                    <td>08-03-2026</td>
                                                    <td><span class="badge badge-light-warning">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar bg-light-success rounded mr-1">
                                                                <div class="avatar-content">PS</div>
                                                            </div>
                                                            <div>
                                                                <div class="font-weight-bolder">Priya Sharma</div>
                                                                <div class="font-small-2 text-muted">9876543210</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>₹15,000</td>
                                                    <td>Withdrawal</td>
                                                    <td>07-03-2026</td>
                                                    <td><span class="badge badge-light-success">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar bg-light-info rounded mr-1">
                                                                <div class="avatar-content">AK</div>
                                                            </div>
                                                            <div>
                                                                <div class="font-weight-bolder">Amit Kumar</div>
                                                                <div class="font-small-2 text-muted">9988776655</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>₹5,000</td>
                                                    <td>Deposit</td>
                                                    <td>06-03-2026</td>
                                                    <td><span class="badge badge-light-success">Completed</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Company Table Card -->

                        <!-- Developer Meetup Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        <div class="meetup-day">
                                            <h6 class="mb-0">{{ date('D') }}</h6>
                                            <h3 class="mb-0">{{ date('d') }}</h3>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="card-title mb-25">System Status</h4>
                                            <p class="card-text mb-0">All systems operational</p>
                                        </div>
                                    </div>
                                    <div class="media mt-2">
                                        <div class="avatar bg-light-success rounded mr-1">
                                            <div class="avatar-content">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0">Database</h6>
                                            <small>Connected</small>
                                        </div>
                                    </div>
                                    <div class="media mt-2">
                                        <div class="avatar bg-light-success rounded mr-1">
                                            <div class="avatar-content">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0">Server</h6>
                                            <small>Running</small>
                                        </div>
                                    </div>
                                    <div class="media mt-2">
                                        <div class="avatar bg-light-success rounded mr-1">
                                            <div class="avatar-content">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0">Cache</h6>
                                            <small>Active</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Developer Meetup Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">
                COPYRIGHT &copy; {{ date('Y') }} <a class="ml-25" href="#" target="_blank">SolarPanel.in</a>
                <span class="d-none d-sm-inline-block">, All rights Reserved</span>
            </span>
            <span class="float-md-right d-none d-md-block">
                <i class="fas fa-heart text-danger"></i> Admin Dashboard
            </span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="fas fa-arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            
            // Initialize charts with real data
            // SAFER APPROACH - Check if data exists
var monthlyEarnings = [];
@if(isset($monthlyEarnings) && is_array($monthlyEarnings))
    monthlyEarnings = @json($monthlyEarnings);
@else
    monthlyEarnings = [6500, 8900, 12000, 15000, 18000, 21000, 19500, 22000, 24500, 28000, 29500, 31000];
@endif
            
            // Statistics Order Chart
            var orderOptions = {
                chart: { type: 'bar', height: 100, sparkline: { enabled: true } },
                plotOptions: { bar: { columnWidth: '60%' } },
                colors: ['#7367f0'],
                series: [{ data: [{{ $totalOrders ?? 25 }}, {{ $pendingOrders ?? 40 }}, {{ $totalCustomers ?? 30 }}, {{ $totalPlans ?? 45 }}] }]
            };
            new ApexCharts(document.querySelector("#statistics-order-chart"), orderOptions).render();
            
            // Statistics Profit Chart
            var profitOptions = {
                chart: { type: 'line', height: 100, sparkline: { enabled: true } },
                stroke: { curve: 'smooth', width: 3 },
                colors: ['#28c76f'],
                series: [{ data: [{{ $totalBlogs ?? 10 }}, {{ $pendingBlogs ?? 15 }}, {{ $totalTestimonials ?? 12 }}, {{ $pendingTestimonials ?? 8 }}] }]
            };
            new ApexCharts(document.querySelector("#statistics-profit-chart"), profitOptions).render();
            
            // Earnings Chart
            var earningsOptions = {
                chart: { type: 'area', height: 150, sparkline: { enabled: true } },
                stroke: { curve: 'smooth', width: 2 },
                colors: ['#ff9f43'],
                fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.7, opacityTo: 0.3 } },
                series: [{ data: monthlyEarnings.slice(-9) }]
            };
            new ApexCharts(document.querySelector("#earnings-chart"), earningsOptions).render();
            
            // Revenue Report Chart
            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var revenueOptions = {
                chart: { type: 'line', height: 250, toolbar: { show: false } },
                stroke: { curve: 'smooth', width: [3, 2], dashArray: [0, 5] },
                colors: ['#7367f0', '#ff9f43'],
                series: [
                    { name: 'Earnings', data: monthlyEarnings },
                    { name: 'Target', data: monthlyEarnings.map(val => val * 1.2) }
                ],
                xaxis: { categories: months },
                grid: { borderColor: '#f1f1f1' }
            };
            new ApexCharts(document.querySelector("#revenue-report-chart"), revenueOptions).render();
            
            // Budget Chart
            var budgetOptions = {
                chart: { type: 'radialBar', height: 150, sparkline: { enabled: true } },
                plotOptions: { radialBar: { startAngle: -135, endAngle: 135, hollow: { size: '60%' } } },
                colors: ['#7367f0'],
                series: [{{ $earningsGrowth ?? 68 }}]
            };
            new ApexCharts(document.querySelector("#budget-chart"), budgetOptions).render();
        });

        // Approve Withdrawal
        function approveWithdrawal(id) {
            if(confirm('Approve this withdrawal request?')) {
                window.location.href = '/admin/withdrawals/approve/' + id;
            }
        }
        
        // Reject Withdrawal
        function rejectWithdrawal(id) {
            if(confirm('Reject this withdrawal request?')) {
                window.location.href = '/admin/withdrawals/reject/' + id;
            }
        }
        
        // Auto refresh every 30 seconds
        setInterval(function() {
            $.ajax({
                url: '/admin/dashboard/refresh',
                type: 'GET',
                success: function(response) {
                    toastr.success('Dashboard updated with latest data');
                }
            });
        }, 30000);
        
        // Toastr config
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        };
    </script>
</body>
<!-- END: Body-->
</html>