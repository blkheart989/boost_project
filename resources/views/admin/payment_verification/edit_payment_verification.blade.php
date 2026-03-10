<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>View Payment - Payment Verification</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->
    
    <style>
        .readonly-field {
            background-color: #f8f8f8 !important;
            cursor: not-allowed;
        }
        .info-label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }
        .info-value {
            padding: 0.5rem 0;
            border-bottom: 1px dashed #dee2e6;
            margin-bottom: 0.75rem;
        }
        .detail-card {
            background-color: #fafafa;
            border-left: 4px solid #7367f0;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern">

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
                            <h2 class="content-header-title float-left mb-0">Payment Details</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('admin/payment_verification') }}">Payment Verification</a></li>
                                    <li class="breadcrumb-item active">View Payment #{{ $payment->id }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <a href="{{ url('admin/payment_verification/show_payment') }}" class="btn btn-outline-secondary">
                            <i data-feather="arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>

            <div class="content-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Payment Status Banner -->
                <div class="card bg-transparent shadow-none border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">Payment #{{ $payment->id }}</h4>
                                <span>Submitted on {{ date('d M Y, h:i A', strtotime($payment->created_at)) }}</span>
                            </div>
                            <div>
                                @if($payment->status == 'pending')
                                    <span class="badge badge-warning badge-glow p-2" style="font-size: 1rem;">PENDING VERIFICATION</span>
                                @elseif($payment->status == 'approved')
                                    <span class="badge badge-success badge-glow p-2" style="font-size: 1rem;">APPROVED</span>
                                @elseif($payment->status == 'rejected')
                                    <span class="badge badge-danger badge-glow p-2" style="font-size: 1rem;">REJECTED</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Read-only Details View -->
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title mb-0">
                            <i data-feather="info" class="mr-50"></i>
                            Payment Information
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="info-label">Payment ID</div>
                                <div class="info-value"><strong>#{{ $payment->id }}</strong></div>
                                
                                <div class="info-label">User ID</div>
                                <div class="info-value">{{ $payment->user_id ?? 'N/A' }}</div>
                                
                                <div class="info-label">Phone Number</div>
                                <div class="info-value">{{ $payment->number }}</div>
                                
                                <div class="info-label">Amount</div>
                                <div class="info-value"><span class="text-success font-weight-bold">₹{{ number_format($payment->rupees) }}</span></div>
                            </div>
                            
                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="info-label">UTR Number</div>
                                <div class="info-value"><code>{{ $payment->utr_number }}</code></div>
                                
                                <div class="info-label">Status</div>
                                <div class="info-value">
                                    @if($payment->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($payment->status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @elseif($payment->status == 'rejected')
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </div>
                                
                                <div class="info-label">Transaction Date</div>
                                <div class="info-value">{{ date('d-m-Y', strtotime($payment->created_at)) }}</div>
                                
                                <div class="info-label">Transaction Time</div>
                                <div class="info-value">{{ date('h:i:s A', strtotime($payment->created_at)) }}</div>
                            </div>
                        </div>

                        <!-- Payment Screenshot -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="info-label">Payment Screenshot</div>
                                <div class="info-value">
                                    @if($payment->image)
                                        <div class="text-center border rounded p-3">
                                            <a href="{{ asset('/payment_verification_images/' . $payment->image) }}" target="_blank">
                                                <img src="{{ asset('/payment_verification_images/' . $payment->image) }}" 
                                                     class="img-fluid" 
                                                     style="max-height: 300px; border-radius: 8px;"
                                                     alt="payment screenshot">
                                            </a>
                                            <div class="mt-2">
                                                <a href="{{ asset('/payment_verification_images/' . $payment->image) }}" 
                                                   class="btn btn-sm btn-primary" 
                                                   download>
                                                    <i data-feather="download"></i> Download Screenshot
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="py-3 text-center">
                                            <i data-feather="image" style="width: 50px; height: 50px; color: #ccc;"></i>
                                            <p class="mt-1 text-muted">No screenshot uploaded</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Information Card (if you want to show user details) -->
                @if(isset($userDetails) || isset($userPayments))
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title mb-0">
                            <i data-feather="user" class="mr-50"></i>
                            User Information
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-label">Username</div>
                                <div class="info-value">{{ $userDetails->name ?? 'Not Registered' }}</div>
                                
                                <div class="info-label">Email</div>
                                <div class="info-value">{{ $userDetails->email ?? 'No email provided' }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-label">Total Transactions</div>
                                <div class="info-value">{{ $userPayments->count() ?? 0 }}</div>
                                
                                <div class="info-label">Total Amount Paid</div>
                                <div class="info-value text-success">₹{{ number_format($totalUserAmount ?? 0) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Action Buttons (only for pending payments) -->
                @if($payment->status == 'pending')
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-2">Verification Actions</h5>
                        <div class="d-flex gap-1">
                            <form action="{{ url('admin/payment/approve/' . $payment->id) }}" method="POST" class="mr-1">
                                @csrf
                                <button type="submit" class="btn btn-success" onclick="return confirm('Approve this payment? This will credit the amount to user\'s wallet.')">
                                    <i data-feather="check-circle"></i> Approve Payment
                                </button>
                            </form>
                            <form action="{{ url('admin/payment/reject/' . $payment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Reject this payment?')">
                                    <i data-feather="x-circle"></i> Reject Payment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Alternative: Display as read-only form fields (if you prefer that look) -->
                <!--
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Details (Read Only)</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User ID</label>
                                        <input type="text" class="form-control readonly-field" value="{{ $payment->user_id ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control readonly-field" value="{{ $payment->number }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Amount (₹)</label>
                                        <input type="text" class="form-control readonly-field" value="₹{{ number_format($payment->rupees) }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>UTR Number</label>
                                        <input type="text" class="form-control readonly-field" value="{{ $payment->utr_number }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control readonly-field" value="{{ ucfirst($payment->status) }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" class="form-control readonly-field" value="{{ date('d-m-Y', strtotime($payment->created_at)) }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                -->
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
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

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
</html>