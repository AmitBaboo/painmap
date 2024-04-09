<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PainMap | Account Setup</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">

    @stack('css')

    <!-- Custom Font: CeraFont -->
    <link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/back/plans.css') }}" rel='stylesheet' type='text/css'>

</head>

<body class="hold-transition" style="font-family:CeraPro;">
    <nav class="navbar navbar-expand-md navbar-dark text-white">
        <div class="container">
            <a class="navbar-brand" href="/home" style="font-weight: 200;">
                <img src="{{ asset('assets/front/images/pain_map_logo_back.png') }}" width="80px" class="brand-image img-circle elevation-3" alt="PainMap" alt="User Image">
                Therapist Account Setup
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <form method="POST" action="/logout">
                            @csrf

                            <a class="nav-link" href="/logout" data-tooltip="tooltip" title="Log Out" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt" style="font-size:18px"></i> Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    @yield("content")

    <!-- /.content-wrapper
    <div class="footer bg-dark text-white">
        <div class="container">
            <div class="float-right d-none d-sm-block">
                Powered by: <a href="https://shrinqghana.com/"><strong>ShrinQ Ltd</strong></a>
            </div>
            <strong>Copyright</strong> &copy; 2020 - {{ date('Y') }} <a href="https://www.truephysio.co.uk/"><strong>TruePhysio</strong></a>. All rights
            reserved.
        </div>
    </div> -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>

    <script src="{{asset('assets')}}/plugins/toastr/toastr.min.js"></script>

    <script src="{{ asset('assets/back/plans.js') }}"></script>

    @stack('js')

</body>

</html>