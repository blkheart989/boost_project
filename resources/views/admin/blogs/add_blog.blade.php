<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Blog | Admin</title>
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
</head>

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
                <h2 class="content-header-title mb-0">Add Blog</h2>
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
                                <h4 class="card-title">Blog Details</h4>
                            </div>

                            <div class="card-body">
                                <form method="post"
                                      action="{{ URL::to('admin/blogs/add_blogs') }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <!-- BLOG TITLE -->
                                        <div class="col-md-6 mb-1">
                                            <label>Blog Title</label>
                                            <input type="text" class="form-control"
                                                   name="title"
                                                   placeholder="Enter blog title"
                                                   required>
                                        </div>

                                        <!-- BLOG SLUG -->
                                        <div class="col-md-6 mb-1">
                                            <label>Blog Slug (SEO URL)</label>
                                            <input type="text" class="form-control"
                                                   name="slug"
                                                   placeholder="how-daily-recharge-income-works">
                                        </div>

                                        <!-- AUTHOR NAME -->
                                        <div class="col-md-6 mb-1">
                                            <label>Author Name</label>
                                            <input type="text" class="form-control"
                                                   name="author_name"
                                                   placeholder="Admin / Team DailyBoost">
                                        </div>

                                        <!-- PUBLISHED DATE -->
                                        <div class="col-md-6 mb-1">
                                            <label>Publish Date</label>
                                            <input type="date" class="form-control"
                                                   name="published_date">
                                        </div>

                                        <!-- BLOG IMAGE -->
                                        <div class="col-md-6 mb-1">
                                            <label>Blog Thumbnail Image</label>
                                            <input type="file" class="form-control"
                                                   name="image" required>
                                        </div>

                                        <!-- STATUS -->
                                        <div class="col-md-3 mb-1">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Publish</option>
                                                <option value="0">Draft</option>
                                            </select>
                                        </div>

                                        <!-- FEATURED -->
                                        {{-- <div class="col-md-3 mb-1">
                                            <label>Featured</label>
                                            <select class="form-control" name="is_featured">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div> --}}

                                        <!-- SHORT DESCRIPTION -->
                                        <div class="col-12 mb-1">
                                            <label>Short Description (Blog Preview)</label>
                                            <textarea class="form-control"
                                                      name="short_description"
                                                      rows="3"
                                                      placeholder="Short summary shown on blog listing"></textarea>
                                        </div>

                                        <!-- FULL CONTENT -->
                                        <div class="col-12 mb-1">
                                            <label>Blog Content</label>
                                            <textarea class="form-control"
                                                      name="content"
                                                      rows="6"
                                                      placeholder="Write full blog content here..."></textarea>
                                        </div>

                                        <!-- SEO META TITLE -->
                                        <div class="col-md-6 mb-1">
                                            <label>Meta Title (SEO)</label>
                                            <input type="text" class="form-control"
                                                   name="meta_title"
                                                   placeholder="SEO meta title">
                                        </div>

                                        <!-- SEO META DESCRIPTION -->
                                        <div class="col-md-6 mb-1">
                                            <label>Meta Description (SEO)</label>
                                            <textarea class="form-control"
                                                      name="meta_description"
                                                      rows="2"
                                                      placeholder="SEO meta description"></textarea>
                                        </div>

                                    </div>

                                    <button class="btn btn-primary mt-2">
                                        Save Blog
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
