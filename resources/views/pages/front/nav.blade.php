<!-- Header Start -->
<style>
    /* @font-face { font-family: CeraPro-Bold; src: url('{{ asset('assets/front/fonts/CeraPro-Bold.woff') }}'); }  */
    .inner-pg {
        padding-top: 51px;
        background-color: #f2f2f2;
    }

    @media only screen and (max-width: 600px) {
        .inner-pg {
            padding-top: 0px;
            background-color: #f2f2f2;
        }
    }

    @media only screen and (max-width: 767px) {
        .inner-pg {
            padding-top: 0px;
            background-color: #f2f2f2;
        }
    }

    li a {
        font-size: 13px !important
    }

    .pre-shop {
        color: gray;
        font-size: 16px;
        line-height: 1.5em;
        font-family: CeraPro;
        border: none;
        background: white !important
    }

    .pre {
        color: gray;
        font-size: 16px;
        line-height: 1.5em;
        font-family: CeraPro;
        border: none;
        background: white !important
    }
</style>
<header class="header clearfix">


    <div class="h-top clearfix visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="h-left">
                        <img alt="" class="" width="50" src="{{ asset('assets/LOGO2.png') }}" style="width: 100%; padding-top: .5em" />
                    </div>
                </div>
                <!--/.col-sm-4 col-md-4-->
                <div class="col-sm-8 col-md-8">

                </div>
                <!--/.col-sm-8 col-md-8-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div><!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="h-bottom clearfix" style="background-color: #37a8ec">
        <div class="container-fluid">
            <div class="navigation-menu">
                <div class="navbar yamm navbar-default">
                    <div class="navbar-header" style="width: 14em">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img alt="" class="hidden-xs hidden-sm" width="50" src="{{ asset('assets/LOGO2.png') }}" style="width: 100%; padding-top: .5em" />
                            {{-- <img style="margin-top:-3em; margin-right: 6.7em" alt="" class="visible-xs visible-sm" width="50" src="{{ asset('assets/LOGO2.png') }}" /> --}}
                        </a>
                    </div><!-- Desktop Navigation List Start -->
                    <div class="navbar-collapse collapse hidden-xs" id="navbar-collapse-1" style="float: right">
                        <div class="background"></div>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ url('/disclaimer') }}">Symptoms Checker</a>
                            </li>
                            <li>
                                <a href="{{ url('/painmap') }}">About Pain Map</a>
                            </li>
                            <li>
                                <a href="{{ url('product') }}">Shop</a>
                            </li>
                            <li>
                                <a href="{{ url('/faq') }}">FAQ's</a>
                            </li>
                            <li>
                                <a href="{{ url('/advice') }}">Advice</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="{{ url('/article') }}">Therapists</a>
                                <ul class="dropdown-menu sub-menu" style="margin-top:-1em">
                                    <li>
                                        <a class="hidden-xs" href="{{ url('/article') }}" style="text-transform: capitalize;">Therapists</a>
                                        <a href="#" data-toggle="modal" data-target="#register-modal">Therapists
                                            Sign
                                            Up</a>
                                        <a class="hidden-xs" href="{{ url('/login') }}" style="text-transform: capitalize;">Therapists Login</a>
                                    </li>
                                </ul>
                            </li>
                            <!--/.dropdown-->
                            <li>
                                <a href="{{ url('/contact') }}">Contact</a>
                            </li>
                            {{-- <li>
                                <a href="{{url('about')}}">About</a>
                            </li> --}}


                        </ul>
                        <!--/.nav navbar-nav-->
                    </div><!-- Desktop Navigation List End -->


                    <!-- Mobile Navigation List Start -->
                    {{-- <div class="dl-menuwrapper visible-xs" id="dl-menu">
                        <button class="dl-trigger">Open Menu</button>
                        <div class="background"></div>
                        <ul class="dl-menu">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{url('/disclaimer')}}">Symptoms Checker</a>
                    </li>
                    <li>
                        <a href="{{url('/product')}}">Shop</a>
                    </li>
                    <li>
                        <a href="{{url('/faq')}}">FAQ's</a>
                    </li>
                    <li>
                        <a href="{{url('/advice')}}">Advice</a>
                    </li>
                    <li class="activex">
                        <a href="{{url('/article')}}">Therapists</a>
                        <ul class="dl-submenu">
                            <li>
                                <a href="{{ url('/article') }}" style="text-transform: capitalize;">Therapists</a>
                            </li>
                            <li class="active">
                                <a href="{{ url('/login') }}" style="text-transform: capitalize;">Therapists Login</a>
                            </li>
                            <li class="h-login-register">
                                <div class="h-login-register">
                                    <a class="visible-xs xxxx" data-target=".login-modal" data-toggle="modal" href="#">Sign Up</a>

                                </div>
                            </li>
                        </ul>
                        <!--/.dl-submenu-->
                    </li>
                    <!--/.active-->
                    <li>
                        <a href="{{url('/contact')}}">Contact</a>
                    </li>

                    </ul>
                    <!--/.nav navbar-nav-->


                </div><!-- /dl-menuwrapper --> --}}
                <style>
                    .xx .nav li a {
                        padding: .5rem !important;
                        margin: 0 !important;
                    }

                    .h-bottom .navbar .navbar-collapse {
                        padding: 0rem !important;
                        margin: 0 !important;
                    }

                    .navbar-default .navbar-nav .open .dropdown-menu>li>a {
                        color: #fff;
                        padding: .5rem !important;
                        margin: 0 !important;
                    }

                    .xx li {
                        padding-bottom: .5rem;

                    }

                    .xx li a:hover {
                        font-size: 1.5em !important;
                    }
                </style>
                <nav class="navbar navbar-default xx  visible-xs">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="margin-left: 0">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" style="margin: 0; padding: 0">
                                <br>
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('/disclaimer') }}">Symptoms Checker</a>
                                </li>
                                <li>
                                    <a href="{{ url('/painmap') }}">About Pain Map</a>
                                </li>
                                <li>
                                    <a href="{{ url('/product') }}">Shop</a>
                                </li>
                                <li>
                                    <a href="{{ url('/faq') }}">FAQ's</a>
                                </li>
                                <li>
                                    <a href="{{ url('/advice') }}">Advice</a>
                                </li>
                                <li class="dropdown" style="color: white">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Therapists <span class="caret"></span></a>
                                    <ul class="dropdown-menu" style="box-shadow: none">
                                        <li>
                                            <a href="{{ url('/article') }}" style="text-transform: capitalize;">Therapists</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/registration-form') }}">Sign Up</a>
                                            {{-- <a class="visible-xs xxxx" data-target=".login-modal"
                                                    data-toggle="modal" href="#">Sign Up</a> --}}
                                        </li>
                                        <li class="">
                                            <a href="{{ url('/login') }}" style="text-transform: capitalize;">Therapists Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                </nav>


                <!-- Mobile Navigation List End -->
                <!-- Cart Right Start -->

            </div>
            <!--/.navbar yamm navbar-default-->
        </div>
        <!--/.navigation-menu-->
    </div>
    <!--/.container-->
    </div><!-- Header Bottom End -->
</header><!-- Header End -->