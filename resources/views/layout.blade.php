<?php
if (!isset($page_uri)) {
    $page_uri = 'empty';
}
if (!isset($parent)) {
    $parent = 'empty';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PainMap Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- pace-progress -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

    @stack('layout-css')

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

</head>
<style>
    body {
        height: auto;
        font-family: CeraPro;
    }

    label.error {
        color: #F0E68C;
        font-size: 0.9rem;
        font-weight: 100;
        display: block;
        margin-top: 5px;
    }

    input.error {
        border: 1px dashed red;
        font-weight: 300;
        color: red;
    }
</style>
<!-- <body class="hold-transition sidebar-mini"> -->

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed hold-transition pace-primary">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/profile') }}" class="nav-link">Profile</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->

            <!-- Right navbar links -->
            <ul class="ml-auto navbar-nav">
                @if (auth()->user()->account_type == 1)
                <li class="nav-itemn">
                    <a href="#" class="nav-link" data-target="#register-modal" data-toggle="modal" data-tooltip="tooltip" title="Add New User">
                        <!-- <i class="fas fa-user-plus"></i> -->
                        <i class="fas fa-user-plus" style="font-size:18px"></i>
                    </a>
                </li>
                @endif
                <!-- Messages Dropdown Menu -->
                <li class="nav-itemn">

                    <a class="nav-link" id="logout" href="/logout-user" data-tooltip="tooltip" title="Log Out">
                        <i class="fas fa-sign-out-alt" style="font-size:18px"></i>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!-- <a href="{{-- url('dashboard') --}}" class="brand-link">
        <img src="{{-- asset('assets/front/images/pain_map_logo.png') --}}" alt="PainMap" class="brand-image img-circle elevation-3" style="opacity: .95">
        <span class="brand-text font-weight-light">PainMap</span>
      </a> -->

            <div class="mt-2 login-logo">
                <img src="{{ asset('assets/front/images/pain_map_logo_back_white.png') }}" width="60px" class="brand-image img-circle elevation-3" alt="PainMap" alt="User Image">
            </div>

            <!-- Sidebar -->
            <div class="sidebar mt-n2">
                <!-- Sidebar user (optional) -->
                <div class="pb-3 mt-3 mb-3 user-panel d-flex">
                    <div class="image">
                        <img class="brand-image img-circle elevation-2" src="{{ auth()->user()->profilePhoto }}" alt="{{ auth()->user()->full_name }}">
                    </div>
                    <div class="info">
                        <a href="{{ url('/profile') }}" class="d-block">{{ auth()->user()->full_name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ URL::to('/dashboard') }}" class="nav-link {{ $page_uri == 'dashboard' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        @if (auth()->user()->account_type == 1)
                        <li class="nav-item has-treeview {{ $parent == 'features' ? 'menu-open' : 'xmenu-open' }}">
                            <a href="#" class="nav-link {{ $parent == 'features' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Features
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/make-symptoms-checker') }}" class="nav-link {{ $page_uri == 'symptons_checker' ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-diagnoses"></i>
                                        <p>Symptoms Checker</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/customers') }}" class="nav-link {{ $page_uri == 'customers' ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user-injured"></i>
                                        <p>Customers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/therapists') }}" class="nav-link {{ $page_uri == 'therapists' ? 'active' : '' }}">
                                        <i class="fas fa-user-md nav-icon"></i>
                                        <p>Therapists</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/resources') }}" class="nav-link {{ $page_uri == 'resources' ? 'active' : '' }}">
                                        <i class="fas fa-th-list nav-icon"></i>
                                        <p>Resources</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/plans') }}" class="nav-link {{ $page_uri == 'plans' ? 'active' : '' }}">
                                        <i class="fab fa-cc-stripe nav-icon"></i>
                                        <p>Plans</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/email-subscription') }}" class="nav-link {{ $page_uri == 'email' ? 'active' : '' }}">
                                        <i class="fas fa-mail-bulk nav-icon"></i>
                                        <p>Email Subscription</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/contact-us') }}" class="nav-link {{ $page_uri == 'contact_us' ? 'active' : '' }}">
                                        <i class="fas fa-mail-bulk nav-icon"></i>
                                        <p>Contact Us</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if (auth()->user()->account_type == 2)

                        <li class="nav-item">
                            <a href="{{ url('/assigned-customers') }}" class="nav-link {{ $page_uri == 'therapist_customers' ? 'active' : '' }} ">
                                <i class="fas fa-user-injured nav-icon"></i>
                                <p>Customers Assigned</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{-- url('/user-subscription') --}}" class="nav-link {{-- $page_uri == 'subscription' ? 'active' : '' --}}">
                                <i class="far fa-address-card nav-icon"></i>
                                <p>Subscription Info</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ url('/therapist-resources') }}" class="nav-link {{ $page_uri == 'therapist_resources' ? 'active' : '' }}">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Resources</p>
                            </a>
                        </li>

                        @endif

                        @if (auth()->user()->account_type == 1)
                        <li class="nav-item has-treeview {{ $parent == 'pages' ? 'menu-open' : 'xmenu-open' }}">
                            <a href="#" class="nav-link {{ $parent == 'pages' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Pages
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin-home') }}" class="nav-link {{ $page_uri == 'admin-home' ? 'active' : '' }}">
                                        <i class="fas fa-home nav-icon"></i>
                                        <p>Home</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin-about') }}" class="nav-link {{ $page_uri == 'admin-about' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin-contact" class="nav-link {{ $page_uri == 'admin-contact' ? 'active' : '' }}">
                                        <i class="far fa-address-book nav-icon"></i>
                                        <p>Contact</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin-product" class="nav-link {{ $page_uri == 'admin-product' ? 'active' : '' }}">
                                        <i class="fas fa-shopping-cart nav-icon"></i>
                                        <p>Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin-advice') }}" class="nav-link {{ $page_uri == 'admin-advice' ? 'active' : '' }}">
                                        <i class="fas fa-comment-medical nav-icon"></i>
                                        <p>Advice</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin-faq" class="nav-link {{ $page_uri == 'admin-faq' ? 'active' : '' }}">
                                        <i class="far fa-question-circle nav-icon"></i>
                                        <p>FAQs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin-blog" class="nav-link {{ $page_uri == 'admin-blog' ? 'active' : '' }}">
                                        <i class="fas fa-user-md nav-icon"></i>
                                        <p>Therapist</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin-painmap" class="nav-link {{ $page_uri == 'admin-painmap' ? 'active' : '' }}">
                                        <i class="fas fa-user-md nav-icon"></i>
                                        <p>Pain Map</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin-landing" class="nav-link {{ $page_uri == 'admin-painmap' ? 'active' : '' }}">
                                        <i class="fas fa-user-md nav-icon"></i>
                                        <p>Landing Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if (auth()->user()->account_type == 2 || auth()->user()->account_type == 1)
                        <!-- <li class="nav-item has-treeview {{ $parent == 'stripe' ? 'menu-open' : 'xmenu-open' }}">
              <a href="#" class="nav-link {{ $parent == 'stripe' ? 'active' : '' }}">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Stripe
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/plans') }}" class="nav-link {{ $page_uri == 'plans' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Plans</p>
                  </a>
                </li>
              </ul>
            </li> -->
                        @endif

                        @if (auth()->user()->account_type == 1)
                        <li class="nav-item has-treeview {{ $parent == 'setups' ? 'menu-open' : 'xmenu-open' }}">
                            <a href="#" class="nav-link {{ $parent == 'setups' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Setups
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/categories') }}" class="nav-link {{ $page_uri == 'categories' ? 'active' : '' }}">
                                        <i class="fas fa-wrench nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/sub-categories') }}" class="nav-link {{ $page_uri == 'sub_categories' ? 'active' : '' }}">
                                        <i class="fas fa-screwdriver nav-icon"></i>
                                        <p>Sub-Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Main content -->
        @yield("content")

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                Powered by: <a href="https://shrinqghana.com/"><strong>ShrinQ Ltd</strong></a>
            </div>
            <strong>Copyright</strong> &copy; 2020 - {{ date('Y') }} <a href="https://www.truephysio.co.uk/"><strong>TruePhysio</strong></a>. All rights
            reserved.
        </footer>

        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Sign Up Modal -->
    <div aria-hidden="true" class="modal fade" role="dialog" id="register-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #4ba1e2;">
                <div class="modal-header">
                    <h4 class="modal-title">Add New User</h4>
                </div>
                <!-- Close Start -->
                <div class="modal-body">
                    <form id="internalSignUp">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-white" for="fullName">Full Name</label>
                                    <input class="form-control" name="full_name" id="fullName" placeholder="eg: James" type="text" :value="old('full_name')" autofocus autocomplete="full_name">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-white" for="contactNumber">Contact Number</label>
                                    <input class="form-control" name="contact_number" id="contactNumber" placeholder="eg: +44 7911 123456" type="text" autocomplete="contact_number">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-white" for="emailAddress">Email Address</label>
                            <input class="form-control" name="email" id="emailAddress" placeholder="eg: jamessmith@domain.com" type="text" autocomplete="email">
                        </div>

                        <!--/.form-group-->
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-white" for="userpassword">Password</label>
                                    <input class="form-control" name="userpassword" id="userpassword" placeholder="Type your password" type="password" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-white" for="passwordconfirmation">Confirm Password</label>
                                    <input class="form-control" name="passwordconfirmation" id="passwordconfirmation" placeholder="Confirm password" type="password" autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                    </form>
                </div><!-- Register Section End -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light" form="internalSignUp"><i class="fa fa-plus-circle"></i> Add User</button>
                </div>
            </div>
            <!-- Forgot Password Section Start -->
            <!--/.modal-content-->
        </div>
        <!--/.modal-dialog-->
    </div><!-- Login Modal End -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- reCAPTCHA script loding -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- pace-progress -->
    <script src="{{ asset('assets/plugins/pace-progress/pace.min.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>

    <script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-tooltip="tooltip"]').tooltip();
            $.validator.addMethod(
                "postcode",
                function(value) {
                    return /^[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}$/.test(
                        value
                    );
                },
                "Please enter a valid UK postal code."
            );

            $.validator.addMethod(
                "stripe_id",
                (value) => {
                    return /^price_/i.test(value);
                },
                "Stripe ID must start with 'price_'."
            );

            $.validator.addMethod(
                "stripe_plan",
                (value) => {
                    return /^prod_/i.test(value);
                },
                "Stripe plan must start with 'prod_'."
            )

            $("#internalSignUp").validate({
                rules: {
                    full_name: "required",
                    contact_number: {
                        required: true,
                        maxlength: 14,
                        minlength: 11,
                        digits: true
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: "/check-email",
                    },
                    userpassword: {
                        required: true,
                        minlength: 8,
                    },
                    passwordconfirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#userpassword",
                    },
                },

                messages: {
                    full_name: "Please enter your first name.",
                    contact_number: {
                        required: "Please enter your contact number.",
                        minlength: "Contact number cannot be less that 11 digits.",
                        maxlength: "Contact number cannot be more that 14 digits.",
                    },
                    email: {
                        required: "Please enter your email.",
                        email: "Email entered is not valid.",
                        remote: "Email is being used by another user"
                    },
                    userpassword: {
                        required: "Please enter a suitable password for security.",
                        minlength: "Password length cannot be less than 8 characters.",
                    },
                    passwordconfirmation: {
                        required: "Please confirm your password.",
                        minlength: "Password length cannot be less than 8 characters.",
                        equalTo: "Password confirmation must equal what you typed above.",
                    },
                },

                submitHandler: (form) => {
                    const post_data = {
                        _token: $("input[name=_token]").val(),
                        email: $("#emailAddress").val(),
                        full_name: $("#fullName").val(),
                        contact_number: $("#contactNumber").val(),
                        password: $("#userpassword").val(),
                        password_confirmation: $("#passwordconfirmation").val()
                    }

                    const formData = JSON.stringify(post_data);

                    $.ajax({
                        url: "/register-user",
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        contentType: "application/json",
                        success: (responseData) => {
                            console.log(responseData);
                            if (responseData.response_code == 200) {
                                toastr.success(responseData.response_message);
                                $("#register-modal").modal("hide");
                            } else {
                                toastr.error(responseData.response_message);
                                $("#register-modal").modal("hide");
                            }
                        },
                        error: (xhr, status, error) => {
                            const message = xhr.responseText;
                            toastr.error(message);
                        }
                    });
                },
                errorClass: "invalid font-weight-light",
            });
        });

        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $("#logout").on("click", (e) => {
            e.preventDefault();
            logOutUser();
        })

        const logOutUser = () => {
            const post_data = {
                _token: $("input[name=_token]").val(),
            }

            const postData = JSON.stringify(post_data);

            $.ajax({
                url: "/logout-user",
                method: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: (response) => {
                    if (response.status == 200) {
                        location.href = "/";
                    }
                },
                error: (error) => {
                    const message = error.responseJSON.message;
                    toastr.error(message);
                }
            });

        }
    </script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function showSuccessMessage() {
            Toast.fire({
                icon: 'success',
                title: 'The record was saved successfully'
            })
        }
    </script>

    @stack('layout-js')

</body>

</html>