<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Verification - Admin</title>
    
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <style>
        /* Responsive Table Styles */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }
            
            .btn-group-sm {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }
            
            .btn-group-sm .btn {
                margin: 2px;
                padding: 0.25rem 0.4rem;
                font-size: 0.875rem;
            }
            
            .card-header {
                flex-direction: column;
                align-items: flex-start !important;
            }
            
            .card-header .btn {
                margin-top: 10px;
            }
            
            .statistics-cards .card-body {
                padding: 1rem;
            }
            
            .statistics-cards h3 {
                font-size: 1.2rem;
            }
        }
        
        /* Improved Button Styles */
        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            min-width: 200px;
        }
        
        .action-buttons .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            min-width: 70px;
        }
        
        .action-buttons .btn i {
            width: 14px;
            height: 14px;
        }
        
        .btn-approve {
            background-color: #28c76f;
            border-color: #28c76f;
            color: white;
        }
        
        .btn-approve:hover {
            background-color: #1e9e5a;
            border-color: #1e9e5a;
            color: white;
        }
        
        .btn-reject {
            background-color: #ea5455;
            border-color: #ea5455;
            color: white;
        }
        
        .btn-reject:hover {
            background-color: #d63a3a;
            border-color: #d63a3a;
            color: white;
        }
        
        .btn-view {
            background-color: #7367f0;
            border-color: #7367f0;
            color: white;
        }
        
        .btn-view:hover {
            background-color: #5e50ee;
            border-color: #5e50ee;
            color: white;
        }
        
        .btn-delete {
            background-color: #b9b9b9;
            border-color: #b9b9b9;
            color: white;
        }
        
        .btn-delete:hover {
            background-color: #a0a0a0;
            border-color: #a0a0a0;
            color: white;
        }
        
        /* Filter Section Styles */
        .filter-section {
            background-color: #f8f8f8;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .filter-section .form-group {
            margin-bottom: 0;
        }
        
        @media (max-width: 768px) {
            .filter-section .form-group {
                margin-bottom: 1rem;
            }
        }
        
        /* Badge Styles */
        .badge {
            padding: 0.5rem 0.8rem;
            font-weight: 500;
            font-size: 0.85rem;
        }
        
        .badge-warning {
            background-color: #ff9f43;
            color: white;
        }
        
        .badge-success {
            background-color: #28c76f;
            color: white;
        }
        
        .badge-danger {
            background-color: #ea5455;
            color: white;
        }
        
        /* Image Preview Styles */
        .payment-image-preview {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .payment-image-preview:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        /* Statistics Cards */
        .stat-card {
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        /* Pagination Styles */
        .pagination {
            margin-top: 20px;
            justify-content: center;
        }
        
        .pagination .page-item .page-link {
            color: #7367f0;
            border-radius: 4px;
            margin: 0 2px;
        }
        
        .pagination .page-item.active .page-link {
            background-color: #7367f0;
            border-color: #7367f0;
            color: white;
        }
        
        /* Search Box Styles */
        .search-box {
            position: relative;
            max-width: 300px;
        }
        
        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #b9b9b9;
        }
        
        .search-box input {
            padding-left: 35px;
            border-radius: 20px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .search-box input:focus {
            border-color: #7367f0;
            box-shadow: 0 0 0 0.2rem rgba(115, 103, 240, 0.25);
        }
    </style>
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
                            <h2 class="content-header-title float-left mb-0">Payment Verification</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Payment Verification</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <a href="{{ url('admin/payment_verification') }}" class="btn btn-primary">
                            <i data-feather="plus"></i> Add New Payment
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

                <!-- Statistics Cards -->
                <div class="row statistics-cards">
                    @php
                        use Illuminate\Support\Facades\DB;
                        $pendingCount = DB::table('verification_payment_tables')->where('status', 'pending')->count();
                        $approvedCount = DB::table('verification_payment_tables')->where('status', 'approved')->count();
                        $rejectedCount = DB::table('verification_payment_tables')->where('status', 'rejected')->count();
                        $totalAmount = DB::table('verification_payment_tables')->where('status', 'approved')->sum('rupees');
                    @endphp
                    
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $pendingCount }}</h3>
                                    <span>Pending Payments</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                    <span class="avatar-content">
                                        <i data-feather="clock" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $approvedCount }}</h3>
                                    <span>Approved Payments</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content">
                                        <i data-feather="check-circle" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $rejectedCount }}</h3>
                                    <span>Rejected Payments</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <i data-feather="x-circle" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">₹{{ number_format($totalAmount) }}</h3>
                                    <span>Total Amount</span>
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

                <!-- Filter and Search Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Filter Payments</h4>
                    </div>
                    <div class="card-body">
                        <div class="filter-section">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="status-filter">Status</label>
                                        <select class="form-control" id="status-filter">
                                            <option value="">All Status</option>
                                            <option value="pending">Pending</option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date-filter">Date Range</label>
                                        <select class="form-control" id="date-filter">
                                            <option value="">All Dates</option>
                                            <option value="today">Today</option>
                                            <option value="week">This Week</option>
                                            <option value="month">This Month</option>
                                            <option value="year">This Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="search-box">Search</label>
                                        <div class="search-box">
                                            <i data-feather="search"></i>
                                            <input type="text" class="form-control" id="search-box" placeholder="Search by Phone, UTR, Amount...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-primary btn-block" id="clear-filters">
                                            <i data-feather="x-circle"></i> Clear Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Transaction List</h4>
                        <div class="d-flex">
                            <button class="btn btn-outline-primary mr-1" onclick="exportToExcel()">
                                <i data-feather="download"></i> Export
                            </button>
                            <button class="btn btn-outline-success" onclick="printTable()">
                                <i data-feather="printer"></i> Print
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="payment-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>UTR</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $payments = DB::table('verification_payment_tables')->orderBy('created_at', 'desc')->paginate(10);
                                    @endphp
                                    
                                    @forelse($payments as $payment)
                                    <tr>
                                        <td>#{{ $payment->id }}</td>
                                        <td>{{ $payment->number }}</td>
                                        <td><strong>₹{{ number_format($payment->rupees) }}</strong></td>
                                        <td><code>{{ $payment->utr_number }}</code></td>
                                        <td>
                                            @if($payment->image)
                                                <a href="{{ asset('/payment_verification_images/' . $payment->image) }}" target="_blank">
                                                    <img src="{{ asset('/payment_verification_images/' . $payment->image) }}" 
                                                         class="payment-image-preview"
                                                         alt="screenshot">
                                                </a>
                                            @else
                                                <span class="badge badge-secondary">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($payment->status == 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($payment->status == 'approved')
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($payment->status == 'rejected')
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-secondary">{{ $payment->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($payment->created_at)) }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <!-- Details Button -->
                                                <a href="{{ url('admin/payment_verification/edit/'. $payment->id) }}" 
                                                   class="btn btn-view" title="View Details">
                                                    <i data-feather="eye"></i> View
                                                </a>

                                                @if($payment->status == 'pending')
                                                    <!-- Approve Button -->
                                                    <form action="{{ url('admin/payment/approve/' . $payment->id) }}" 
                                                          method="POST" 
                                                          style="display: inline;">
                                                        @csrf
                                                        <button type="submit" 
                                                                class="btn btn-approve"
                                                                onclick="return confirm('Are you sure you want to approve this payment?')"
                                                                title="Approve Payment">
                                                            <i data-feather="check-circle"></i> Approve
                                                        </button>
                                                    </form>

                                                    <!-- Reject Button -->
                                                    <form action="{{ url('admin/payment/reject/' . $payment->id) }}" 
                                                          method="POST" 
                                                          style="display: inline;">
                                                        @csrf
                                                        <button type="submit" 
                                                                class="btn btn-reject"
                                                                onclick="return confirm('Are you sure you want to reject this payment?')"
                                                                title="Reject Payment">
                                                            <i data-feather="x-circle"></i> Reject
                                                        </button>
                                                    </form>
                                                @endif

                                                <!-- Delete Button -->
                                                <form action="{{ url('admin/payment_verification/delete/'. $payment->id) }}"  
                                                      method="POST" 
                                                      style="display: inline;">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="btn btn-delete"
                                                            onclick="return confirm('Are you sure you want to delete this payment? This action cannot be undone.')"
                                                            title="Delete Payment">
                                                        <i data-feather="trash-2"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="p-3">
                                                <i data-feather="inbox" style="width: 50px; height: 50px; color: #ccc;"></i>
                                                <p class="mt-2">No payment records found</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    {{ $payments->links() }}
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
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
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

        // Initialize DataTable with filters
        $(document).ready(function() {
            var table = $('#payment-table').DataTable({
                responsive: true,
                ordering: true,
                pageLength: 10,
                lengthChange: false,
                searching: true,
                info: true,
                autoWidth: false,
                columnDefs: [
                    { orderable: false, targets: [4, 7] } // Disable ordering on image and actions columns
                ],
                language: {
                    emptyTable: "No payment records found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });

            // Status filter
            $('#status-filter').on('change', function() {
                var status = $(this).val();
                if(status) {
                    table.column(5).search('\\b' + status + '\\b', true, false).draw();
                } else {
                    table.column(5).search('').draw();
                }
            });

            // Search box
            $('#search-box').on('keyup', function() {
                table.search($(this).val()).draw();
            });

            // Clear filters
            $('#clear-filters').on('click', function() {
                $('#status-filter').val('');
                $('#date-filter').val('');
                $('#search-box').val('');
                table.search('').draw();
                table.column(5).search('').draw();
            });

            // Date filter (custom implementation)
            $('#date-filter').on('change', function() {
                var dateRange = $(this).val();
                var today = new Date();
                var startDate, endDate;
                
                switch(dateRange) {
                    case 'today':
                        startDate = new Date(today.setHours(0,0,0,0));
                        endDate = new Date(today.setHours(23,59,59,999));
                        break;
                    case 'week':
                        startDate = new Date(today.setDate(today.getDate() - today.getDay()));
                        startDate.setHours(0,0,0,0);
                        endDate = new Date(today.setDate(today.getDate() - today.getDay() + 6));
                        endDate.setHours(23,59,59,999);
                        break;
                    case 'month':
                        startDate = new Date(today.getFullYear(), today.getMonth(), 1);
                        endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0, 23, 59, 59, 999);
                        break;
                    case 'year':
                        startDate = new Date(today.getFullYear(), 0, 1);
                        endDate = new Date(today.getFullYear(), 11, 31, 23, 59, 59, 999);
                        break;
                    default:
                        startDate = null;
                        endDate = null;
                }
                
                if(startDate && endDate) {
                    $.fn.dataTable.ext.search.push(
                        function(settings, data, dataIndex) {
                            var date = new Date(data[6].split('-').reverse().join('-')); // Convert dd-mm-yyyy to yyyy-mm-dd
                            return date >= startDate && date <= endDate;
                        }
                    );
                    table.draw();
                    $.fn.dataTable.ext.search.pop();
                } else {
                    table.draw();
                }
            });
        });

        // Export to Excel function
        function exportToExcel() {
            var table = document.getElementById('payment-table');
            var rows = table.getElementsByTagName('tr');
            var csv = [];
            
            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll('td, th');
                
                for (var j = 0; j < cols.length; j++) {
                    // Skip image column (index 4) and actions column (index 7) for export
                    if(j !== 4 && j !== 7) {
                        var data = cols[j].innerText.replace(/,/g, ' '); // Remove commas to avoid CSV issues
                        row.push('"' + data + '"');
                    }
                }
                csv.push(row.join(','));
            }
            
            var csvContent = csv.join('\n');
            var blob = new Blob([csvContent], { type: 'text/csv' });
            var url = window.URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'payment_verification_export.csv';
            a.click();
        }

        // Print table function
        function printTable() {
            var printContent = document.getElementById('payment-table').cloneNode(true);
            var images = printContent.getElementsByTagName('img');
            
            // Convert image URLs to text for printing
            for (var i = 0; i < images.length; i++) {
                images[i].outerHTML = 'Image Available';
            }
            
            var win = window.open('', '', 'height=700,width=700');
            win.document.write('<html><head><title>Payment Verification Report</title>');
            win.document.write('<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #ddd; padding: 8px; text-align: left; } th { background-color: #f2f2f2; }</style>');
            win.document.write('</head><body>');
            win.document.write('<h1>Payment Verification Report</h1>');
            win.document.write('<p>Generated on: ' + new Date().toLocaleString() + '</p>');
            win.document.write(printContent.outerHTML);
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
</body>
</html>