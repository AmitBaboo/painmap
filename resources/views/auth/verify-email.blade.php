<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PainMap | Verify Email</title>

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

                @if (session('message'))
                <p class="login-box-msg text-success">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </p>
                @else
                <p class="login-box-msg">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>
                @endif

                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <form class="mt-2" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-secondary btn-block">
                        {{ __('Logout') }}
                    </button>
                </form>
                <!-- <p class="mt-3 mb-1">
                    <a href="{{ route('logout') }}">
                        {{-- __('Logout') --}}
                    </a>
                </p> -->
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