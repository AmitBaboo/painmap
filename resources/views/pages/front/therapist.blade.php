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
    {{-- <link href="{{asset('assets/front/css/selectric.css')}}" rel="stylesheet">
    <!-- Selectric End --> --}}
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

    <section class="content inner-content doctor-pg clearfix">
        <!-- Banner Start -->
        <div class="banner inner-banner clearfix">
            <img alt="BANNER" class="img-responsive" src="{{asset('assets/front/images/medibg.jpg')}}">
            <div class="banner-overlay"></div><!-- Banner Detail Start -->
            <div class="banner-desc clearfix">
                <div class="container">
                    <h1>Physicians</h1>
                    <h4>Meet our clinic staff</h4>
                </div>
            </div><!-- Banner Detail End -->
        </div><!-- Banner End -->
        <!-- Scroll To Section Start -->
        <div class="scroll-to-section clearfix">
            <div class="container">
                <a href="#"><span><i aria-hidden="true" class="fa fa-angle-down"></i></span></a>
            </div>
        </div><!-- Scroll To Section End -->
        <!-- Phisician Md Start -->
        <div class="phisician-md clearfix">
            <div class="container">
                <div class="col-sm-7 col-md-7">
                    <div class="phisician-left rellax" data-rellax-speed="-2">
                        <h5>JOHN WAITS, MD</h5>
                        <h5><span>Chief Executive Officer & Faculty Physician</span></h5>
                        <p>Dr. Waits is a practicing, board-certified Family Medicine / Obstetrician who serves as CEO of Cahaba Medical Care and the Program Director and DIO of the Cahaba Family Medicine Residency. He is an associate professor in the Department of Family Medicine and in the Department of Obstetrics and Gynecology at the College of Community Health Sciences at the University of Alabama School of Medicine in Tuscaloosa. He served as Program Director of the Tuscaloosa Family Medicine Residency in Tuscaloosa, Alabama for five years, and during this</p>
                    </div>
                    <!--/.phisician-left-->
                </div>
                <!--/.col-sm-7 col-md-7-->
                <div class="col-sm-5 col-md-5">
                    <div class="phisician-right">
                        <div class="image rellax" data-rellax-speed="-2">
                            <img alt="IMAGE" class="img-responsive" src="{{asset('assets/front/images')}}/physicians-md-img.jpg">
                        </div><!-- Join Our Team Start -->
                        <div class="join-our-team rellax clearfix" data-rellax-speed="-1.5">
                            <a class="btn btn-default" href="#" role="button">JOIN OUR TEAM</a>
                        </div><!-- Join Our Team End -->
                        <div class="silver-squar rellax" data-rellax-speed="-1.8"></div>
                    </div>
                    <!--/.phisician-right-->
                </div>
                <!--/.col-sm-5 col-md-5-->
            </div>
            <!--/.container-->
        </div><!-- Phisician Md End -->

        <!-- Nurse Practice Start -->
        <div class="nurse-practice light-gray-bg clearfix">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>NURSE PRACTITIONER</h2>
                </div><!-- Section Title End -->
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="practice-block">
                            <img alt="NURSE" class="img-responsive" src="{{asset('assets/front/images')}}/nurse-practice1.jpg">
                            <div class="nurse-detail">
                                <h6>Brian Wingate, CRNP</h6>
                                <h6><span>Nurse Anesthetist</span></h6>
                                <p>Mr. Wingate joined Cahaba Medical Care in April 2016. He holds degrees from Florida State University (BA), Chipola College (ASN), Jackson</p>
                            </div>
                            <!--/.nurse-detail"-->
                        </div>
                        <!--/.practice-block-->
                    </div>
                    <!--/.col-sm-6 col-md-6 col-lg-3-->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="practice-block">
                            <img alt="NURSE" class="img-responsive" src="{{asset('assets/front/images')}}/nurse-practice2.jpg">
                            <div class="nurse-detail">
                                <h6>Reatha Ballard, CRNA</h6>
                                <h6><span>Nurse Practitioner</span></h6>
                                <p>Mrs. Ballard stated, "First, let me say that I am so happy and blessed to be here at CMC. Everyone has been so kind and welcoming." Mrs.</p>
                            </div>
                            <!--/.nurse-detail"-->
                        </div>
                        <!--/.practice-block-->
                    </div>
                    <!--/.col-sm-6 col-md-6 col-lg-3-->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="practice-block">
                            <img alt="NURSE" class="img-responsive" src="{{asset('assets/front/images')}}/nurse-practice3.jpg">
                            <div class="nurse-detail">
                                <h6>Lacy Smith, MD</h6>
                                <h6><span>Nurse Anesthetist</span></h6>
                                <p>Dr. Smith joined Cahaba Medical Care in 2010 and worked with Dr. Waits to transition CMC into a FQHC as well as assisted in co-founding</p>
                            </div>
                            <!--/.nurse-detail"-->
                        </div>
                        <!--/.practice-block-->
                    </div>
                    <!--/.col-sm-6 col-md-6 col-lg-3-->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="practice-block">
                            <img alt="NURSE" class="img-responsive" src="{{asset('assets/front/images')}}/nurse-practice4.jpg">
                            <div class="nurse-detail">
                                <h6>Suzanne Tompkins, PA-C</h6>
                                <h6><span>Physician Assistant</span></h6>
                                <p>Dr. Waits joined Cahaba Medical Care in 2013 after graduating from Tuscaloosa Family Medicine Residency and completing</p>
                            </div>
                            <!--/.nurse-detail"-->
                        </div>
                        <!--/.practice-block-->
                    </div>
                    <!--/.col-sm-6 col-md-6 col-lg-3-->
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div><!-- Nurse Practice End -->
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
    {{-- <script src="{{asset('assets/front/js/jquery.selectric.js')}}"> --}}
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