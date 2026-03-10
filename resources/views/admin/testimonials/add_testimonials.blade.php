<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Testimonial | Admin</title>
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

    <!-- Favicon -->
    

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static"
      data-open="click" data-menu="vertical-menu-modern">

<!-- HEADER -->
@include('admin.layouts.header')

<!-- SIDEBAR -->
@include('admin.layouts.sidebar')

<!-- CONTENT -->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        <!-- PAGE HEADER -->
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <h2 class="content-header-title mb-0">Add Testimonial</h2>
            </div>
        </div>

        <!-- FLASH MESSAGE -->
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <!-- FORM -->
        <div class="content-body">
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Testimonial Details</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST"
                                      action="{{ URL::to('admin/testimonial/add') }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <!-- NAME -->
                                        <div class="col-md-6 mb-1">
                                            <label>Name</label>
                                            <input type="text" class="form-control"
                                                   name="name" placeholder="User name" required>
                                        </div>

                                        <!-- ROLE -->
                                        <div class="col-md-6 mb-1">
                                            <label>Designation / Role</label>
                                            <input type="text" class="form-control"
                                                   name="designation" placeholder="User / Investor / Client" required>
                                        </div>

                                        <!-- TITLE -->
                                        <div class="col-12 mb-1">
                                            <label>Highlight Title</label>
                                            <input type="text" class="form-control"
                                                   name="title" placeholder="Short highlighted line">
                                        </div>

                                        <!-- MESSAGE -->
                                        <div class="col-12 mb-1">
                                            <label>Testimonial Message</label>
                                            <textarea class="form-control" name="message"
                                                      rows="4" placeholder="User feedback..."></textarea>
                                        </div>

                                        <!-- IMAGE -->
                                        <div class="col-md-6 mb-1">
                                            <label>User Image</label>
                                            <input type="file" class="form-control"
                                                   name="image" required>
                                        </div>

                                        <!-- RATING -->
                                        <div class="col-md-3 mb-1">
                                            <label>Rating</label>
                                            <select class="form-control" name="rating">
                                                <option value="5">★★★★★ (5)</option>
                                                <option value="4">★★★★ (4)</option>
                                                <option value="3">★★★ (3)</option>
                                                <option value="2">★★ (2)</option>
                                                <option value="1">★ (1)</option>
                                            </select>
                                        </div>

                                        <!-- STATUS -->
                                        <div class="col-md-3 mb-1">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>

                                    </div>

                                    <button class="btn btn-primary mt-2">
                                        Save Testimonial
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0 text-center">
        © {{ date('Y') }} DailyBoost. All rights reserved.
    </p>
</footer>

<!-- JS -->
<script src="../../../admin/vendors/js/vendors.min.js"></script>
<script src="../../../admin/js/core/app-menu.js"></script>
<script src="../../../admin/js/core/app.js"></script>

</body>
</html>
