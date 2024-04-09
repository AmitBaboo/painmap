<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Pain Map</title><!-- Favicon -->
    <link href="images/favicon.ico" rel="icon" type="image/x-icon"><!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!-- Bootstrap -->
    <link href="{{asset('assets/wizard/step.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/front/css/bootstrap.css')}}" rel="stylesheet">
    <!--=== Add By Designer ===-->
    <link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/fonts/fonts.css')}}" rel="stylesheet"><!-- Yamm Megamenu -->
    <link href="{{asset('assets/front/css/yamm.css')}}" rel="stylesheet"><!-- Animation -->
    <link href="{{asset('assets/front/css/animate.css')}}" rel="stylesheet"><!-- Animation -->
    <!-- Jquery Ui Date Picker -->
    <!-- Range Slider Start -->
    <link href="{{asset('assets/front/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/css/jquery-ui-slider-pips.css')}}" rel="stylesheet"><!-- Range Slider End -->
    <!-- Jquery Ui Date Picker -->
    <!-- Boostrap Time Picker -->
    <link href="{{asset('assets/front/css/jquery.timepicker.css')}}" rel="stylesheet"><!-- Boostrap Time Picker -->
    <!-- Selectric Start -->
    <link href="{{asset('assets/front/css/selectric.css')}}" rel="stylesheet">
    <!-- Selectric End -->
    <!-- Time Table Start -->
    <link href="{{asset('assets/front/css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/css/time-table.css')}}" rel="stylesheet"><!-- Time Table End -->
    <!-- Multi Level Push Menu -->
    <link href="{{asset('assets/front/css/normalize.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/css/component.css')}}" rel="stylesheet">
    <script src="{{asset('assets/front/js/modernizr.custom.js')}}">
    </script><!-- Multi Level Push Menu -->
</head>

<body>
    <!-- Header Start -->
    @include('pages.front.nav')

    <section class="content contact-pg clearfix">
        <!-- Banner Start -->
        <div class="banner inner-banner clearfix">
            <img alt="BANNER" class="img-responsive" src="{{ asset('assets/front/images/slider-img10.jpg') }}">
            <div class="banner-overlay"></div><!-- Banner Detail Start -->
            <div class="banner-desc clearfix">
                <div class="container">
                    <h1>Please provide your details below to sign up.</h1>
                </div>
            </div><!-- Banner Detail End -->
        </div><!-- Banner End -->
        <!-- Inner Pages Start -->
        <div class="inner-content clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <div class="content-desc">
                            <!-- Appointment Form Start -->
                            <div class="appointment-form white-bg clearfix">
                                <h6>Sign up</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="row">
                                    <form action="{{ url('/register') }}" class="md__contactForm" method="post">
                                        <!--/.col-sm-6 col-md-6 select-box-->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Name</label> <input class="form-control" id="exampleInputtext3" name="name" type="text">
                                            </div>
                                            <!--/.form-group-->
                                        </div>
                                        <!--/.col-sm-6 col-md-6-->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputtext4">Phone</label> <input class=" md__input form-control" id="exampleInputtext4" name="phone" type="text">
                                            </div>
                                            <!--/.form-group-->
                                        </div>
                                        <!--/.col-sm-6 col-md-6-->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label> <input class=" md__input form-control" id="exampleInputEmail1" name="email" type="email">
                                            </div>
                                            <!--/.form-group-->
                                        </div>
                                        <!--/.col-sm-6 col-md-6-->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group date">
                                                <label class="date">Date</label> <input class=" md__input form-control" id="datepicker" name="date" type="text">
                                            </div>
                                            <!--/.form-group-->
                                            <div class="form-group time">
                                                <label class="time">Pick Time</label> <input class=" md__input form-control" id="time" name="time" type="text">
                                            </div>
                                            <!--/.form-group-->
                                        </div>
                                        <!--/.col-sm-6 col-md-6-->
                                        <div class="col-sm-12">
                                            <div class="js-cf-message"></div><input name="cf_type" type="hidden" value="cf_1"> <input class="md__redirect-to" type="hidden" value="http://localhost/medlife-india/app/contact.html">
                                        </div>
                                        <!--/.col-sm-12-->
                                        <button class="btn btn-default appointment-button md__submitBtn" type="submit">Sign Up</button>
                                    </form>
                                </div>
                            </div><!-- Appointment Form End -->
                        </div>
                        <!--/.content-desc-->
                    </div>
                    <!--/.col-sm-12 col-md-8 col-lg-9-->
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget clearfix">
                            <!-- Widget Block Start -->
                            <div class="widget-block">
                                <!-- Opening Hover Start -->
                                <div class="opening-hours light-green-bg">
                                    <!-- Widget Title Start -->
                                    <div class="widget-title clearfix">
                                        <h6>Opening Hours</h6>
                                    </div><!-- Widget Title End -->
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Monday - Friday:</td>
                                                <td>8.30 - 18.30</td>
                                            </tr>
                                            <tr>
                                                <td>Saturday:</td>
                                                <td>10.30 - 16.30</td>
                                            </tr>
                                            <tr>
                                                <td>Sunday:</td>
                                                <td>10.30 - 16:30</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- Opening Hover End -->
                            </div><!-- Widget Block End -->
                            <!-- Widget Block Start -->
                            <div class="widget-block">
                                <!-- Map Block Start -->
                                <div class="map clearfix">
                                    <iframe allowfullscreen src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.509895529668!2d-72.8474816841276!3d41.44985497925848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e7ce55dd9d1353%3A0xeebd80135a356c3e!2sOakdale+Theatre!5e0!3m2!1sen!2sin!4v1507367244654" style="width: 100%; height: 262px; border:0;"></iframe>
                                </div><!-- Map Block End -->
                            </div><!-- Widget Block End -->
                        </div><!-- Sidebar Widget End -->
                    </div>
                    <!--/.col-sm-12 col-md-4 col-lg-3-->
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div><!-- Inner Pages End -->
    </section><!-- Content End -->

    @include('pages.front.footer')

    <!-- Footer Start -->

    <!-- Back To Top Start -->
    <div class="back-to-top clearfix">
        <a href="#"><span><i aria-hidden="true" class="fa fa-chevron-up"></i> Top</span></a>
    </div><!-- Back To Top End -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/front/js/jquery-3.1.1.min.js')}}">
    </script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/front/js/bootstrap.min.js')}}">
    </script> <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Jquery Ui Date Picker -->
    <!-- Range Slide -->
    <script src="{{asset('assets/front/js/jquery-ui.js')}}">
    </script> <!-- Range Slide -->
    <!-- Jquery Ui Date Picker -->
    <!-- Bootstrap Time Picker -->
    <script src="{{asset('assets/front/js/jquery.timepicker.js')}}">
    </script> <!-- Bootstrap Time Picker -->
    <!-- Selectric Start -->
    <script src="{{asset('assets/front/js/jquery.selectric.js')}}">
    </script> <!-- Selectric End -->
    <!-- Mobile Menu Js Start -->
    <script src="{{asset('assets/front/js/jquery.dlmenu.js')}}">
    </script> <!-- Mobile Menu Js End -->
    <!-- Time Table Start -->
    <script src="{{asset('assets/front/js/modernizr.js')}}">
    </script>
    <script src="{{asset('assets/front/js/main.js')}}">
    </script> <!-- Time Table End -->
    <!-- Ofi-Script -->
    <script src="{{asset('assets/front/js/ofi.js')}}">
    </script> <!-- Ofi-Script -->
    <!-- Extra Js -->
    <script src="{{asset('assets/front/js/jquery.ui.touch-punch.min.js')}}">
    </script> <!-- Extra Js -->
    <script src="{{asset('assets/front/js/slick.js')}}">
    </script> <!-- Slick Sider -->
    <script src="{{asset('assets/front/js/script.js')}}"></script>

    <script>
        // var currentTab = 0; // Current tab is set to be the first tab (0)
        // showTab(currentTab); // Display the current tab

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
</body>

</html>