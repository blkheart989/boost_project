<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Testimonials - Admin</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/select.dataTables.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">

    <!-- Page CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/data-list-view.css">

    <style>
        td { 
            color: #000; 
            vertical-align: middle; 
        }
        .rating i { 
            color: #f4c150; 
        }
        img { 
            object-fit: cover; 
        }
        
        /* Toggle Switch Styles */
        .custom-switch {
            padding-left: 0;
        }
        
        .custom-control-input:checked ~ .custom-control-label::before {
            border-color: #28c76f;
            background-color: #28c76f;
        }
        
        .custom-control-input:checked:disabled ~ .custom-control-label::before {
            background-color: rgba(40, 199, 111, 0.5);
            border-color: rgba(40, 199, 111, 0.5);
        }
        
        .custom-control-input:not(:checked) ~ .custom-control-label::before {
            border-color: #ea5455;
            background-color: #ea5455;
        }
        
        .custom-control-input:not(:checked):disabled ~ .custom-control-label::before {
            background-color: rgba(234, 84, 85, 0.5);
            border-color: rgba(234, 84, 85, 0.5);
        }
        
        .custom-switch .custom-control-label::after {
            background-color: white;
        }
        
        .custom-control-label {
            cursor: pointer;
            min-width: 50px;
            padding-left: 10px;
            color: #6b6f82;
        }
        
        .custom-control-label::before {
            box-shadow: none;
        }
        
        /* Loading spinner */
        .fa-spinner {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Responsive fixes */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        @media (max-width: 768px) {
            .content-header-title {
                font-size: 1.5rem;
            }
            
            .card-header {
                flex-direction: column;
                align-items: flex-start !important;
            }
            
            .card-header .btn {
                margin-top: 10px;
                width: 100%;
            }
            
            .dt-buttons {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                margin-bottom: 10px;
            }
            
            .dt-buttons .btn {
                flex: 1;
                min-width: 70px;
                font-size: 0.8rem;
                padding: 0.5rem;
            }
            
            .dataTables_filter {
                margin-bottom: 10px;
            }
            
            .dataTables_filter input {
                width: 100% !important;
            }
            
            .dataTables_length {
                margin-bottom: 10px;
            }
        }
        
        /* Fix for datatable buttons */
        .dt-buttons {
            margin-right: 10px;
        }
        
        .buttons-copy, .buttons-excel, .buttons-pdf, .buttons-print {
            background: #f8f8f8 !important;
            border: 1px solid #ddd !important;
            color: #333 !important;
            border-radius: 5px !important;
            padding: 5px 12px !important;
            margin-right: 5px !important;
        }
        
        .buttons-copy:hover, .buttons-excel:hover, .buttons-pdf:hover, .buttons-print:hover {
            background: #7367f0 !important;
            color: white !important;
            border-color: #7367f0 !important;
        }
        
        /* Clickable link styles */
        .clickable-row {
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .clickable-row:hover {
            background-color: #f8f9fa !important;
        }
        
        .clickable-link {
            color: #7367f0;
            text-decoration: none;
            font-weight: 500;
            position: relative;
        }
        
        .clickable-link:hover {
            color: #5e50ee;
            text-decoration: underline;
        }
        
        .clickable-link::after {
            content: '\f0c1';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 12px;
            margin-left: 5px;
            opacity: 0;
            transition: opacity 0.2s;
        }
        
        .clickable-link:hover::after {
            opacity: 1;
        }
        
        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
        
        .btn-sm {
            padding: 5px 10px;
            border-radius: 5px;
            transition: all 0.2s;
        }
        
        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
    </style>
</head>

<body>
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<div class="app-content content">
    <div class="content-wrapper">

        <!-- PAGE HEADER -->
       <div class="content-header row mb-2">
    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
        <h2 class="content-header-title mb-2 mb-sm-0">Testimonials Management</h2>

        <a href="{{ URL::to('admin/testimonial') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Testimonial
        </a>
        
    </div>
</div>

        <!-- ALERTS -->
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('failed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- TABLE -->
        <section id="testimonial-table">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Testimonials List</h4>
                        </div>

                        <div class="card-body table-responsive">
                            <table class="table table-striped datatable" id="testimonialDatatable">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Message</th>
                                        <th>Rating</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr class="clickable-row" data-href="{{ URL::to('admin/testimonial/view/'.$testimonial->id) }}">
                                        <td style="text-align: center; vertical-align: middle;">
                                            <!-- Toggle Switch -->
                                            <div class="custom-control custom-switch custom-control-inline" onclick="event.stopPropagation();">
                                                <input type="checkbox" 
                                                       class="custom-control-input toggle-status" 
                                                       id="toggle-{{ $testimonial->id }}" 
                                                       data-id="{{ $testimonial->id }}"
                                                       data-status="{{ $testimonial->status }}"
                                                       {{ $testimonial->status == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="toggle-{{ $testimonial->id }}">
                                                    <span class="status-text">{{ $testimonial->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                </label>
                                            </div>
                                        </td>

                                        <td onclick="event.stopPropagation();">
                                            <img src="{{ asset('show_testimonial/'.$testimonial->image) }}"
                                                 width="80" height="80" class="rounded-circle">
                                        </td>

                                        <td>
                                            <a href="{{ URL::to('admin/testimonial/view/'.$testimonial->id) }}" 
                                               class="clickable-link" 
                                               onclick="event.stopPropagation();">
                                                {{ $testimonial->name }}
                                            </a>
                                        </td>

                                        <td>{{ $testimonial->designation }}</td>

                                        <td>
                                            <a href="{{ URL::to('admin/testimonial/view/'.$testimonial->id) }}" 
                                               class="clickable-link" 
                                               onclick="event.stopPropagation();">
                                                {{ Str::limit($testimonial->description, 10) }}
                                            </a>
                                        </td>

                                        <td class="rating" onclick="event.stopPropagation();">
                                            @for($i=1; $i<=5; $i++)
                                                <i class="fa{{ $i <= $testimonial->rating ? 's' : 'r' }} fa-star"></i>
                                            @endfor
                                        </td>

                                        <td style="text-align:center" onclick="event.stopPropagation();">
                                            <div class="action-buttons">
                                                <a href="{{ URL::to('admin/testimonial/edit/'.$testimonial->id) }}"
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                               <form action="{{ url('admin/testimonials/delete/'.$testimonial->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
        <i class="fas fa-trash"></i>
    </button>
</form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<!-- JS -->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="../../../app-assets/js/scripts/datatables/datatable.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Toggle and Click Script -->
<script>
$(document).ready(function() {
    
    // Initialize DataTable with export buttons
    $('#testimonialDatatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copy',
                className: 'btn btn-sm btn-outline-primary'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-sm btn-outline-success'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-sm btn-outline-danger'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Print',
                className: 'btn btn-sm btn-outline-secondary'
            }
        ],
        responsive: true,
        pageLength: 10,
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                previous: "<",
                next: ">"
            }
        }
    });
    
    // Make entire row clickable
    $('.clickable-row').click(function() {
        window.location = $(this).data('href');
    });
    
    // Handle toggle switch change
    $('.toggle-status').change(function() {
        var $toggle = $(this);
        var testimonialId = $toggle.data('id');
        var newStatus = $toggle.is(':checked') ? 1 : 0;
        var $label = $toggle.closest('td').find('.status-text');
        
        // Disable toggle while processing
        $toggle.prop('disabled', true);
        $label.html('<i class="fas fa-spinner fa-spin"></i>');
        
        // Send AJAX request
        $.ajax({
            url: '{{ url("admin/testimonial/toggle-status") }}',
            type: 'POST',
            data: {
                id: testimonialId,
                status: newStatus,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.success) {
                    // Update status text
                    $label.text(newStatus == 1 ? 'Active' : 'Inactive');
                    toastr.success(response.message);
                } else {
                    // Revert toggle if failed
                    $toggle.prop('checked', !$toggle.is(':checked'));
                    $label.text($toggle.is(':checked') ? 'Active' : 'Inactive');
                    toastr.error(response.message || 'Error updating status');
                }
            },
            error: function(xhr) {
                // Revert toggle on error
                $toggle.prop('checked', !$toggle.is(':checked'));
                $label.text($toggle.is(':checked') ? 'Active' : 'Inactive');
                toastr.error('Something went wrong!');
                console.error(xhr.responseText);
            },
            complete: function() {
                // Re-enable toggle
                $toggle.prop('disabled', false);
            }
        });
    });
    
    // Initialize toastr
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right"
    };
});
</script>

</body>
</html>