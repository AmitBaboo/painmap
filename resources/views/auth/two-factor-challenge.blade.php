<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PainMap | Two Factor Authentication</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- Custom Font: CeraFont -->

    <link rel="stylesheet" href="{{asset('assets')}}/plugins/toastr/toastr.min.css">

    <link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo mb-0">
            <img src="{{ asset('assets/front/images/pain_map_logo_back.png') }}" width="120px" class="brand-image img-circle" alt="PainMap" alt="User Image">
        </div>
        <div class="card card-outline card-primary mt-n3">
            <div class="card-body">

                <p class="login-box-msg" id="code_p_message">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </p>

                <p class="login-box-msg d-none" id="rec_p_message">
                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                </p>

                <form id="challenge" method="POST" action="/two-factor-challenge">
                    @csrf

                    <div class="form-group">
                        <input class="form-control" name="code" id="code" placeholder="Authenticator Code" type="text" autofocus />
                        <input class="form-control d-none" name="recovery_code" id="recovery_code" placeholder="Recovery Code" type="text" autofocus />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                        <!-- /.col -->
                    </div>
                </form>
                <button id="rec_code_btn" class="btn btn-outline-danger btn-block mt-2 mb-1">
                    Use Recovery Code
                </button>

                <button id="code_btn" class="btn btn-outline-danger btn-block mt-2 mb-1 d-none">
                    Use Authentication Code</a>
                </button>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>

    <script src="{{asset('assets')}}/plugins/toastr/toastr.min.js"></script>

    <script src="{{ asset('assets/back/login.js') }}"></script>
</body>

</html>