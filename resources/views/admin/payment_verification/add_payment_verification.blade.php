<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

@include('admin.layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('admin.layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Form Layouts</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Form Layouts</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
               
                        <div class="col-md-12 col-12">
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Payment Transaction Verification</h4>
        </div>

        <div class="card-body">
            <form class="form form-horizontal" 
                  method="POST" 
                  action="{{ URL::to('admin/payment_verification/store') }}" 
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Email -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" 
                                   class="form-control" 
                                   name="email" 
                                   placeholder="Enter Email">
                                   
                        </div>
                    </div>

                    <!-- Mobile -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" 
                                   class="form-control" 
                                   name="number" 
                                   placeholder="Enter Mobile Number" 
                                   required>
                        </div>
                    </div>

                    <!-- Rupees -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>Amount (₹)</label>
                            <input type="number" 
                                   class="form-control" 
                                   name="rupees" 
                                   placeholder="Enter Amount" 
                                   required>
                        </div>
                    </div>

                    <!-- UTR Number -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>UTR Number</label>
                            <input type="text" 
                                   class="form-control" 
                                   name="utr_number" 
                                   placeholder="Enter UTR Number" 
                                   required>
                        </div>
                    </div>

                    <!-- Screenshot -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>Payment Screenshot</label>
                            <input type="file" 
                                   class="form-control" 
                                   name="image" 
                                   required>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" 
                                      name="message" 
                                      rows="3"
                                      placeholder="Optional message"></textarea>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary mr-1">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            Reset
                        </button>
                    </div>

                </div>
            </form>
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
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
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