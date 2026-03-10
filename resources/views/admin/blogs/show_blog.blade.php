<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
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

    <!-- Vendor CSS -->
   
    <style>
        td { color: #000; vertical-align: middle; }
        img { object-fit: cover; border-radius: 6px; }
    </style>
</head>

<body>
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<div class="app-content content">
    <div class="content-wrapper">

        <!-- PAGE HEADER -->
        <div class="content-header row mb-2">
            <div class="col-12">
                <h2 class="content-header-title">Blogs</h2>
            </div>
        </div>

        <!-- ALERTS -->
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @elseif(session('failed'))
            <div class="alert alert-danger">{{ session('failed') }}</div>
        @endif

        <!-- TABLE -->
        <section id="blog-table">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Blog List</h4>
                        </div>

                        <div class="card-body table-responsive">
                            <table class="table table-striped dataex-html5-selectors">

                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>

                                        <!-- IMAGE -->
                                        <td>
                                            <img src="{{ asset('show_blogs/'.$blog->image) }}"
                                                 width="90" height="60">
                                        </td>

                                        <!-- TITLE -->
                                        <td>{{Str::limit( $blog->title,40) }}</td>

                                        <!-- DESCRIPTION -->
                                        <td>{{ Str::limit($blog->short_description, 60) }}</td>

                                        <!-- DATE -->
                                        <td>{{ date('d M Y', strtotime($blog->created_at)) }}</td>

                                        <!-- STATUS -->
                                        <td>
                                            @if($blog->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </td>

                                        <!-- ACTION -->
                                        <td class="text-center">
                                            <a href="{{ url('admin/blogs/edit/'.$blog->id) }}"
                                               class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <a href="{{ url('admin/blogs/delete/'.$blog->id) }}"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are you sure?')">
                                                Delete
                                            </a>
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
<script src="../../../app-assets/js/scripts/datatables/datatable.js"></script>

</body>
</html>
