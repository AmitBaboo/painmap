<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PainMap | Forgot Password</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- Custom Font: CeraFont -->
    <link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>
    <style>
        body {
            font-family: CeraPro;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo mb-0">
            <img src="{{ asset('assets/front/images/pain_map_logo_back.png') }}" width="120px" class="brand-image img-circle" alt="PainMap" alt="User Image">
        </div>
        <div class="card card-outline card-primary mt-n3">
            <div class="card-body">

                @if (session('status'))
                <p class="login-box-msg text-success">
                    {{ __('An email has been sent to the address provided. Please check your email to continue the reset process.') }}
                </p>
                @else
                <p class="login-box-msg">
                    {{ __('Forgot your password? No problem. Just let us know the email address you used to register and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
                @endif

                <form action="{{ route('password.request') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder=" Email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback is-invalid" role="alert">
                            <strong class="font-weight-light">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="{{ url('login') }}">Login</a>
                </p>
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
</body>

</html>