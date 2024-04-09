<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PainMap | Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">

    <!-- Custom Font: CeraFont -->
    <link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>
</head>

<body style="font-family:CeraPro;">
    <div class="container">

        <div class="login-logo mb-0">
            <img src="{{ asset('assets/front/images/pain_map_logo_back.png') }}" width="120px" class="brand-image img-circle" alt="PainMap" alt="User Image">
        </div>
        <!-- /.login-logo -->
        <div class="card card-outline card-primary mt-n3">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign up or return <a href="/">Home</a></p>

                <form id="register-form" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input class="form-control" name="full_name" id="companyName" placeholder="eg: TruePhysio" type="text" :value="old('full_name')" required autofocus autocomplete="full_name" />
                    </div>
                    <span></span>


                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="contactNumber">Contact Number</label>
                                <input class="form-control" name="contact_number" id="contactNumber" placeholder="eg: +44 7911 123456" type="text" required autocomplete="contact_number">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="postCode">Post Code</label>
                                <input class="form-control" name="post_code" id="postCode" placeholder="eg: SW1W 0NY" type="text" required autocomplete="post_code">
                                <span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input class="form-control" name="email" id="emailAddress" placeholder="eg: jamessmith@domain.com" type="text" required autocomplete="email">
                        <span></span>
                    </div>

                    <!--/.form-group-->
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" name="password" id="password" placeholder="Type your password" type="password" required autocomplete="new-password">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" id="confirmPassword" placeholder="Confirm password" type="password" required autocomplete="new-password">
                                <span></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 mb-2">
                            <div class="g-recaptcha brochure__form__captcha" data-sitekey="{{ config('app.site_key') }}"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 mb-2 auto">
                            <span id='robot'></span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <button class="btn btn-block btn-primary" form="register-form" type="submit">Sign Up</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>

    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- <script src="{{ asset('assets/back/login.js') }}"></script> -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

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
                                    window.location.href = "/";
                                } else {
                                    $('#robot').text(responseData.response_message).css(
                                        'color', 'red')
                                }
                            },
                            error: (xhr, status, error) => {
                                console.log(xhr);
                                $('#robot').text(xhr.responseJSON.response_message).css('color', 'red')

                            }
                        });
                    } else {
                        $('#robot').text("Please indicate you are not a robot.").css('color', 'red')
                    }
                },

                errorClass: "invalid text-danger font-weight-light",
                errorElement: 'span'
            });
        });
    </script>

</body>

</html>