<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>PainMap</title><!-- Favicon -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <style>

    </style>


    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src=https://www.googletagmanager.com/gtag/js?id=G-YMV01NTE77></script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NP82FV3');
    </script>
    <!-- End Google Tag Manager -->

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());



        gtag('config', 'G-YMV01NTE77');
    </script>

    <link href="images/favicon.ico" rel="icon" type="image/x-icon"><!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/wizard/step.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/front/css/bootstrap.css') }}" rel="stylesheet">
    <!--=== Add By Designer ===-->
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/fonts/fonts.css') }}" rel="stylesheet"><!-- Yamm Megamenu -->
    <link href="{{ asset('assets/front/css/yamm.css') }}" rel="stylesheet"><!-- Animation -->
    <link href="{{ asset('assets/front/css/animate.css') }}" rel="stylesheet"><!-- Animation -->
    <!-- Flat Icon -->
    <link href="{{ asset('assets/front/fonts/flaticon.css') }}" rel="stylesheet"><!-- Flat Icon -->
    <link href="{{ asset('assets/front/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/selectric.css') }}" rel="stylesheet"><!-- Selectric End -->
    <!-- Multi Level Push Menu -->
    <link href="{{ asset('assets/front/css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/component.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/front/js/modernizr.custom.js') }}"></script>
    <!-- Multi Level Push Menu -->
    <!-- REVOLUTION STYLE SHEETS -->
    {{-- <link href="{{asset('assets/front/js/revslider/settings.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/front/js/revslider/layers.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/front/js/revslider/navigation.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES --> --}}

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">


    <style>
        /* @font-face { font-family: CeraPro-Regular; src: url('{{ asset('assets/front/fonts/CeraPro-Regular.woff') }}'); }  */
        .services-section .services-box {
            padding-right: 20px;
            padding-left: 20px;
            background-color: #3695eb;
            height: 274px;
            -webkit-transition: 0.25s cubic-bezier(0.215, 0.61, 0.355, 1);
            transition: 0.25s cubic-bezier(0.215, 0.61, 0.355, 1);
            float: left;
            width: 25%;
            border-color: rgba(0, 0, 0, 0.1);
            border-style: solid;
            border-width: 0 1px 1px 0;
            text-align: left;
            font-size: 30px;
        }

        .grecaptcha-badge {
            z-index: 999;
        }
    </style>
    <link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>
    <style>
        @font-face {
            font-family: CeraPro !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        b,
        div,
        span {
            font-family: CeraPro !important;
        }
    </style>
</head>

<body style="font-family:CeraPro; word-break:keep-all !important;" id="body">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP82FV3" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) .-->

    @include('pages.front.nav')

    @yield('content')

    @include('pages.front.sign_up')
    <!-- Footer Start -->

    @if (Request::segment(1) != 'landing-page')
        @include('pages.front.footer')
    @endif


    <!-- Modal End -->
    <!-- Back To Top Start -->
    <div class="clearfix back-to-top">
        <a href="#"><span><i aria-hidden="true" class="fa fa-chevron-up"></i> Top</span></a>
    </div><!-- Back To Top End -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('assets/front/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- REVOLUTION JS FILES -->
    {{-- <script src="{{asset('assets/front/js/revslider/jquery.themepunch.tools.min.js')}}">
    </script>
    <script src="{{asset('assets/front/js/revslider/jquery.themepunch.revolution.min.js')}}"> </script> --}}
    <!-- REVOLUTION JS FILES -->
    <!-- SLIDER REVOLUTION -->
    {{-- <script src="{{asset('assets/front/js/revslider/revolution.extension.actions.min.js')}}">
    </script>
    <script src="{{asset('assets/front/js/revslider/revolution.extension.layeranimation.min.js')}}">
    </script>
    <script src="{{asset('assets/front/js/revslider/revolution.extension.navigation.min.js')}}">
    </script>
    <script src="{{asset('assets/front/js/revslider/revolution.extension.parallax.min.js')}}">
    </script>
    <script src="{{asset('assets/front/js/revslider/revolution.extension.video.min.js')}}">
    </script>
    <script src="{{asset('assets/front/js/revslider/revolution.extension.slideanims.min.js')}}"> </script> --}}
    <!-- SLIDER REVOLUTION -->
    <!-- Parallax Start -->
    <script src="{{ asset('assets/front/js/parallax.js') }}"></script>
    <!-- Parallax End -->
    <!-- Ofi-Script -->
    <script src="{{ asset('assets/front/js/ofi.js') }}"></script>
    <!-- Ofi-Script -->
    <!-- Mobile Menu Js Start -->
    <script src="{{ asset('assets/front/js/jquery.dlmenu.js') }}"></script>
    <!-- Mobile Menu Js End -->
    <script src="{{ asset('assets/front/js/slick.js') }}"></script>
    <!-- Slick Sider -->
    <!-- Selectric Start -->
    <script src="{{ asset('assets/front/js/jquery.selectric.js') }}"></script>
    <!-- Selectric End -->
    <script src="{{ asset('assets/front/js/jquery-ui.js') }}"></script>
    <!-- Range Slide -->
    <!-- Jquery Ui Date Picker -->
    <!-- Bootstrap Time Picker -->
    <script src="{{ asset('assets/front/js/jquery.timepicker.js') }}"></script>
    <!-- Bootstrap Time Picker -->

    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>


    @stack('js-scripts')

    <!-- reCAPTCHA script loading -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!-- {{-- {!! RecaptchaV3::initJs() !!} --}} -->

    <script src="{{ asset('assets/front/js/script.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.validator.addMethod(
                "postcode",
                function(value) {
                    return /^[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}$/.test(
                        value
                    );
                },
                "Please enter a valid UK postal code."
            );

            $('#subscribe_form').validate({
                rules: {
                    email_address: {
                        required: true,
                        email: true,
                    }
                },
                submitHandler: (form) => {
                    const formData = $("#subscribe_form").serialize();

                    $.ajax({
                        url: "/save-subscription",
                        method: "POST",
                        data: formData,
                        dataType: "json",
                        success: (responseData) => {
                            if (responseData.response_code == 200) {
                                toastr.success(responseData.response_message);
                                $("#email_address").val('');
                            } else {
                                toastr.error(responseData.response_message);
                                $("#email_address").val('');
                            }
                        },
                        error: (xhr, status, error) => {
                            let message = "";
                            if (xhr.status === 422) {
                                message =
                                    "It appears you have already subscribed with this email. If that's the case then you do not need to subscribe again. You can however subscribe with a new email.";
                            } else {
                                message =
                                    "There was an error submitting your request. Please try again in a few minutes.";
                            }
                            toastr.error(message);
                        }
                    });
                },
            });

            $("#register-form").validate({
                rules: {
                    full_name: {
                        required: true
                    },
                    // first_name: {
                    //     required: true,
                    // },
                    // last_name: {
                    //     required: true,
                    // },
                    contact_number: {
                        required: true,
                        maxlength: 14,
                        minlength: 11,
                        digits: true,
                    },
                    post_code: {
                        required: true,
                        // postcode: true,
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: "/check-email",
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password",
                    },
                },

                messages: {
                    full_name: {
                        required: "Please enter your company name."
                    },
                    first_name: {
                        required: "Please enter your first name."
                    },
                    last_name: {
                        required: "Please enter your last name."
                    },
                    contact_number: {
                        required: "Please enter your contact number.",
                        minlength: "Contact number cannot be less that 11 digits.",
                        maxlength: "Contact number cannot be more that 14 digits.",
                    },
                    post_code: {
                        required: "Please enter your postcode",
                    },
                    email: {
                        required: "Please enter your email.",
                        email: "Email entered is not valid.",
                        remote: jQuery.validator.format("Email is already taken."),
                    },
                    password: {
                        required: "Please enter a suitable password for security.",
                        minlength: "Password length cannot be less than 8 characters.",
                    },
                    password_confirmation: {
                        required: "Please confirm your password.",
                        minlength: "Password length cannot be less than 8 characters.",
                        equalTo: "Password confirmation must equal the password you have chosen.",
                    },
                },
                submitHandler: function(form) {
                    const fields = $("#register-form").find('input, textarea');

                    const postData = {
                        isAjaxForm: true,
                    }

                    for (const field of fields) {
                        postData[field.name] = $(field).val();
                    }

                    if (postData["g-recaptcha-response"].length > 0) {

                        $.ajax({
                            url: "/register-therapist",
                            method: "POST",
                            cache: false,
                            timeout: 20000,
                            async: true,
                            data: postData,
                            success: (responseData) => {
                                if (responseData.response_code == 200) {
                                    toastr.success(responseData.response_message);
                                    window.location.reload();
                                } else {
                                    $('#robot').text(responseData.response_message).css(
                                        'color', 'red')
                                }
                            },
                            error: (xhr, status, error) => {
                                $('#robot').text(error).css('color', 'red')

                            }
                        });
                    } else {
                        $('#robot').text("Please indicate you are not a robot.").css('color', 'red')
                    }
                },

                errorClass: "mt-n5 invalid text-danger font-weight-light",
                errorElement: 'span'
            });
        });
    </script>
    <script>
        //var currentTab = 0; // Current tab is set to be the first tab (0)
        //showTab(currentTab); // Display the current tab

        // function showTab(n) {
        //     // This function will display the specified tab of the form...
        //     var x = document.getElementsByClassName("tab");
        //     x[n].style.display = "block";
        //     //... and fix the Previous/Next buttons:
        //     if (n == 0) {
        //         document.getElementById("prevBtn").style.display = "none";
        //     } else {
        //         document.getElementById("prevBtn").style.display = "inline";
        //     }
        //     if (n == (x.length - 1)) {
        //         document.getElementById("nextBtn").innerHTML = "Continue"; //  submit
        //     } else {
        //         document.getElementById("nextBtn").innerHTML = "Next";
        //     }
        //     //... and run a function that will display the correct step indicator:
        //     fixStepIndicator(n)
        // }

        // function nextPrev(n) {
        //     // This function will figure out which tab to display
        //     var x = document.getElementsByClassName("tab");

        //     // Hide the current tab:
        //     x[currentTab].style.display = "none";
        //     // Increase or decrease the current tab by 1:
        //     currentTab = currentTab + n;
        //     // if you have reached the end of the form...
        //     if (currentTab >= x.length) {
        //         // ... the form gets submitted:
        //         document.getElementById("regForm").submit();
        //         return false;
        //     }
        //     // Otherwise, display the correct tab:
        //     showTab(currentTab);
        // }

        // function fixStepIndicator(n) {
        //     // This function removes the "active" class of all steps...
        //     var i, x = document.getElementsByClassName("step");
        //     for (i = 0; i < x.length; i++) {
        //         x[i].className = x[i].className.replace(" active", "");
        //     }
        //     //... and adds the "active" class on the current step:
        //     x[n].className += " active";
        // }
    </script>




    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        if (localStorage.getItem('usercookie') === null) {
            Swal.fire({
                position: 'bottom-end',
                title: '<strong>This site uses cookies</strong>',
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true
            })

            localStorage.setItem('usercookie', 1)
        }
    </script>




</body>

</html>
