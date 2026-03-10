<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Testimonial | Admin</title>
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


    <link rel="stylesheet" href="../../../app-assets/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .preview-img{
            width:100px;
            height:100px;
            object-fit:cover;
            border-radius:8px;
            border:1px solid #ddd;
            padding:3px;
            margin-top:8px;
        }
    </style>
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
                <h2 class="content-header-title mb-0">Edit Testimonial</h2>
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
                                      action="{{ URL::to('testimonial_update/'.$testimonial->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <!-- NAME -->
                                        <div class="col-md-6 mb-1">
                                            <label>Name</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="name"
                                                   value="{{ $testimonial->name }}"
                                                   required>
                                        </div>

                                        <!-- DESIGNATION -->
                                        <div class="col-md-6 mb-1">
                                            <label>Designation / Role</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="designation"
                                                   value="{{ $testimonial->designation }}"
                                                   required>
                                        </div>

                                        <!-- TITLE (OPTIONAL) -->
                                        {{-- <div class="col-12 mb-1">
                                            <label>Highlight Title</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="title"
                                                   value="{{ $testimonial->title }}"
                                                   placeholder="Short highlighted line">
                                        </div> --}}

                                        <!-- MESSAGE -->
                                        <div class="col-12 mb-1">
                                            <label>Testimonial Message</label>
                                            <textarea class="form-control"
                                                      name="description"
                                                      rows="4">{{ $testimonial->description }}</textarea>
                                        </div>

                                        <!-- IMAGE -->
                                        <div class="col-md-6 mb-1">
                                            <label>User Image</label>
                                            <input type="file"
                                                   class="form-control"
                                                   name="image"
                                                   id="imageInput">

                                            <img id="preview"
                                                 src="{{ asset('show_testimonial/'.$testimonial->image) }}"
                                                 class="preview-img">
                                        </div>

                                        <!-- RATING -->
                                        <div class="col-md-3 mb-1">
                                            <label>Rating</label>
                                            <select class="form-control" name="rating">
                                                @for($i=5; $i>=1; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ $testimonial->rating == $i ? 'selected' : '' }}>
                                                        {{ str_repeat('★', $i) }} ({{ $i }})
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>

                                        <!-- STATUS -->
                                        <div class="col-md-3 mb-1">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $testimonial->status == 1 ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>

                                    </div>

                                    <button class="btn btn-primary mt-2">
                                        Update Testimonial
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
<script>
    $('#imageInput').change(function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>

<script src="../../../admin/vendors/js/vendors.min.js"></script>
<script src="../../../admin/js/core/app-menu.js"></script>
<script src="../../../admin/js/core/app.js"></script>

</body>
</html>
