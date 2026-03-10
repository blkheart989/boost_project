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
    <title>Withdrawal Requests - Vuexy Admin</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

    <style>
        .badge-light-warning {
            background-color: rgba(255, 159, 67, 0.12);
            color: #ff9f43 !important;
        }
        .badge-light-success {
            background-color: rgba(40, 199, 111, 0.12);
            color: #28c76f !important;
        }
        .badge-light-danger {
            background-color: rgba(234, 84, 85, 0.12);
            color: #ea5455 !important;
        }
        .badge-light-info {
            background-color: rgba(0, 207, 232, 0.12);
            color: #00cfe8 !important;
        }
        .avatar.bg-light-warning {
            background-color: rgba(255, 159, 67, 0.12) !important;
        }
        .avatar.bg-light-success {
            background-color: rgba(40, 199, 111, 0.12) !important;
        }
        .avatar.bg-light-danger {
            background-color: rgba(234, 84, 85, 0.12) !important;
        }
        .avatar.bg-light-info {
            background-color: rgba(0, 207, 232, 0.12) !important;
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
                            <h2 class="content-header-title float-left mb-0">Withdrawal Requests</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Withdrawals</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{ session('error') }}
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @php
                    $pendingCount = DB::table('withdrawals')->where('status', 'pending')->count();
                    $approvedCount = DB::table('withdrawals')->where('status', 'approved')->count();
                    $rejectedCount = DB::table('withdrawals')->where('status', 'rejected')->count();
                    $totalAmount = DB::table('withdrawals')->where('status', 'approved')->sum('amount');
                @endphp

                <!-- Statistics Cards -->
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $pendingCount }}</h3>
                                    <span>Pending Requests</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                    <span class="avatar-content">
                                        <i data-feather="clock" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $approvedCount }}</h3>
                                    <span>Approved</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content">
                                        <i data-feather="check-circle" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $rejectedCount }}</h3>
                                    <span>Rejected</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <i data-feather="x-circle" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">₹{{ number_format($totalAmount) }}</h3>
                                    <span>Total Paid</span>
                                </div>
                                <div class="avatar bg-light-info p-50">
                                    <span class="avatar-content">
                                        <i data-feather="dollar-sign" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Withdrawals Table Card -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Withdrawal Requests Management</h4>
                    </div>
                    <div class="card-body">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" aria-controls="pending" role="tab" aria-selected="true">
                                    Pending <span class="badge badge-light-warning badge-pill ml-1">{{ $pendingCount }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" aria-controls="approved" role="tab" aria-selected="false">
                                    Approved <span class="badge badge-light-success badge-pill ml-1">{{ $approvedCount }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" aria-controls="rejected" role="tab" aria-selected="false">
                                    Rejected <span class="badge badge-light-danger badge-pill ml-1">{{ $rejectedCount }}</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Pending Tab -->
                            <div class="tab-pane active" id="pending" aria-labelledby="pending-tab" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Method</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $pending = DB::table('withdrawals')->where('status', 'pending')->orderBy('created_at', 'desc')->get();
                                            @endphp
                                            @forelse($pending as $w)
                                            <tr>
                                                <td>#{{ $w->id }}</td>
                                                <td>{{ $w->user_name }}</td>
                                                <td>{{ $w->user_phone }}</td>
                                                <td><strong class="text-success">₹{{ number_format($w->amount) }}</strong></td>
                                                <td>
                                                    <span class="badge badge-light-info text-uppercase">{{ $w->payment_method }}</span>
                                                </td>
                                                <td>
                                                    @if($w->payment_method == 'bank')
                                                        <small>
                                                            <strong>{{ $w->account_holder }}</strong><br>
                                                            A/C: {{ substr($w->account_number, -4) }}<br>
                                                            IFSC: {{ $w->ifsc_code }}
                                                        </small>
                                                    @else
                                                        <small>UPI: {{ $w->upi_id }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime($w->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/withdraw/approve/' . $w->id) }}" class="btn btn-success btn-sm" onclick="return confirm('Approve withdrawal of ₹{{ number_format($w->amount) }}?')">
                                                        <i data-feather="check-circle" class="mr-25"></i> Approve
                                                    </a>
                                                    <a href="{{ url('admin/withdraw/reject/' . $w->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Reject this withdrawal?')">
                                                        <i data-feather="x-circle" class="mr-25"></i> Reject
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center p-3">
                                                    <i data-feather="inbox" style="width: 50px; height: 50px; color: #ccc;"></i>
                                                    <p class="mt-2">No pending withdrawal requests</p>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Approved Tab -->
                            <div class="tab-pane" id="approved" aria-labelledby="approved-tab" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Method</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                                <th>Approved</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $approved = DB::table('withdrawals')->where('status', 'approved')->orderBy('approved_at', 'desc')->get();
                                            @endphp
                                            @forelse($approved as $w)
                                            <tr>
                                                <td>#{{ $w->id }}</td>
                                                <td>{{ $w->user_name }}</td>
                                                <td>{{ $w->user_phone }}</td>
                                                <td><strong class="text-success">₹{{ number_format($w->amount) }}</strong></td>
                                                <td>
                                                    <span class="badge badge-light-info text-uppercase">{{ $w->payment_method }}</span>
                                                </td>
                                                <td>
                                                    @if($w->payment_method == 'bank')
                                                        <small>{{ $w->account_holder }}</small>
                                                    @else
                                                        <small>{{ $w->upi_id }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime($w->created_at)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($w->approved_at)) }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center p-3">
                                                    <i data-feather="check-circle" style="width: 50px; height: 50px; color: #ccc;"></i>
                                                    <p class="mt-2">No approved withdrawals</p>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Rejected Tab -->
                            <div class="tab-pane" id="rejected" aria-labelledby="rejected-tab" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Method</th>
                                                <th>Reason</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $rejected = DB::table('withdrawals')->where('status', 'rejected')->orderBy('updated_at', 'desc')->get();
                                            @endphp
                                            @forelse($rejected as $w)
                                            <tr>
                                                <td>#{{ $w->id }}</td>
                                                <td>{{ $w->user_name }}</td>
                                                <td>{{ $w->user_phone }}</td>
                                                <td><strong class="text-danger">₹{{ number_format($w->amount) }}</strong></td>
                                                <td>
                                                    <span class="badge badge-light-info text-uppercase">{{ $w->payment_method }}</span>
                                                </td>
                                                <td>{{ $w->remarks ?? 'No reason provided' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($w->updated_at)) }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center p-3">
                                                    <i data-feather="x-circle" style="width: 50px; height: 50px; color: #ccc;"></i>
                                                    <p class="mt-2">No rejected withdrawals</p>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021</span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/forms/form-validation.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>