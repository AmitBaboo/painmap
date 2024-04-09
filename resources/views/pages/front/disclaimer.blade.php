@extends('layouts.front')
@section('content')

    <style>
        html {
            scroll-behavior: smooth;
        }

    </style>
    <style>
        .introcontent {
            color: #4096ee;
            width: 34%;
            height: 49%;
            position: absolute;
            top: 30%;
            left: 25%;
            text-align: left;
            background-color: aqua;
        }

        .introcontent .intro1content .intro1content p {
            color: #4096ee;
            line-height: 1.5vh;
        }

        .introBox .intro1,
        .intro2 {
            position: absolute;
            top: 84%;
            left: 79.12%;
            width: 8em;
            height: 5em;
            border-radius: 50%;
            text-align: center;
            padding-top: .6em;
        }

        .backbtn {
            position: absolute;
            top: 85%;
            left: 13.12%;
            width: 8em;
            height: 5em;
            border-radius: 50%;
            text-align: center;
            padding-top: .6em;
        }

        .introBox #introback {
            position: absolute;
            top: 84%;
            left: 5.12%;
            width: 10.8%;
            height: 10%;
            border-radius: 50%;
            text-align: center;
            padding-top: .6em;
        }

        .img-responsive {
            display: inline-block;
            max-width: 100%;
            height: auto;
        }

        .inner-pg {
            background: #e1f0f9;
        }

        .content img {
            margin-top: -3em;
        }

    </style>

    <!-- Content Start -->
    <section class="content inner-pg shop-pg clearfix">
        <div class="container">
            <!-- Inner Pages Start -->
            <div class="inner-content clearfix">
                <div class="row">
                    <div class="">
                        <!-- Content Description Start -->
                        <div class="content-desc clearfix">
                            <!-- Section Title Start 
                                                                                                                                        <div class="section-title"  style="margin: 0; padding-bottom: 1em">
                                                                                                                                            <h4>Disclaimer</h4>
                                                                                                                                        </div>Section Title End -->

                            <!-- Shop Items List Start -->
                            <div class="shop-products-list clearfix">
                                <div class="" xstyle="width: 120vh; margin: 0 auto">



                                    <div class="disclaimerbody hidden-sm hidden-xs" style="width: 100%;"
                                        class="img-responsive">




                                        <div class="introBox"
                                            style="xdisplay: none; text-align: center !important; position: relative">
                                            <div class="intro1content" style="margin: 0 auto">
                                                <img src="{{ asset('assets/front/images/front/disclaimer1.png') }}" alt=""
                                                    style="width: 80%;" class="img-responsive">
                                                <a href="#" class="backbtn" style=""
                                                    onclick="$('.intro1').show();$('.intro2').hide();$('.intro1content').show();$('.intro2content').hide(); $('.iagreebtn').hide()"></a>
                                                <a href="/symptoms-checker" class="intro2" style="display: none"></a>
                                                <a href="#1" class="intro1"
                                                    onclick="$('.intro1').hide();$('.intro2').show();$('.intro1content').hide();$('.intro2content').show(); $('.iagreebtn').hide()"></a>
                                            </div>

                                            <div class="intro2content" style="display: none">
                                                <img src="{{ asset('assets/front/images/front/disclaimer2.png') }}" alt=""
                                                    style="width: 80%" class="img-responsive">
                                                <a href="#" class="backbtn" style=""
                                                    onclick="$('.intro1').show();$('.intro2').hide();$('.intro1content').show();$('.intro2content').hide(); $('.iagreebtn').hide()"></a>
                                                <a href="/symptoms-checker" class="intro2" style="display: none"></a>
                                                <a href="#1" class="intro1"
                                                    onclick="$('.intro1').hide();$('.intro2').show();$('.intro1content').hide();$('.intro2content').show(); $('.iagreebtn').hide()"></a>
                                            </div>
                                            {{-- <a href="#1" id="intro1"  onclick="intro"></a> --}}

                                            {{-- <a href="/symptoms-checker"> next xx</a> --}}
                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                    </div>

                                    <div class="hidden-lg hidden-md" style="margin-top: -4em">
                                        <div id="disc1" style="padding: 1em;">
                                            <h2 style="color: #4096ee">Welcome to Pain Map Symptoms Checker</h2>
                                            <div>
                                                Work through the questions and in a few minutes, you'll have a likely
                                                diagnosis for your problem.
                                                <br>
                                                <br>
                                                You'll also have advice, exercises and recommendations for products that can
                                                start to help relieve your pain instantly.
                                                <br>
                                                <br>
                                                Finally, we'll recommend a Therapist in your area who can help you get back
                                                to normal as quickly as possible and give you the option to arrange an
                                                online session with a Therapist.
                                            </div>
                                        </div>
                                        <div id="disc2" style="display: none; padding: 1em;">
                                            <h2 style="color: #4096ee">Important Information</h2>
                                            <div>
                                                The intention of the Pain Map Symptom Checker is to help you find
                                                information more specific to your condition and advice relevant to that. Our
                                                aim is to assist you in relieving your pain as quickly and safely as
                                                possible.
                                                <br>
                                                <br>
                                                It is designed to act as a general guide and does not claim to be fully
                                                accurate. You will need to undergo a full medical examination for a fully
                                                accurate diagnosis.
                                                <br>
                                                <br>
                                                The information provided is not designed to replace diagnosis or treatment
                                                prescribed by a physician or competent healthcare professional.
                                                By clicking next you are agreeing to the above.
                                            </div>
                                        </div>
                                        <div style="padding: 1em;">
                                            <a href="#" class="btn btn-info" id="disc1btn">Prev</a>
                                            <a href="#" class="btn btn-success" id="disc2btn">Next</a>
                                            <a href="/symptoms-checker" class="btn btn-success" id="disc3btn"
                                                style="display: none">Next</a>
                                        </div>
                                    </div>




                                </div>
                                <!--/.row-->
                            </div><!-- Shop Items List End -->
                            <!-- Page List Start -->

                        </div><!-- Content Description End -->
                    </div>
                    <!--/.col-sm-12 col-md-8 col-lg-9-->

                </div>
                <!--/.row-->
            </div><!-- Inner Pages End -->
        </div>
        <!--/.container-->
    </section><!-- Content End -->

    <script src="{{ asset('assets/front/js/jquery-3.1.1.min.js') }}"></script>
    <script>
        $('.disclaimerbody span').css({
            'fontSize': '15px',
            'lineHeight': '1.5em'
        })

        $('#disc2btn').click(() => {
            $('#disc1').hide('slow')
            $('#disc2').show('slow')

            $('#disc2btn').hide('slow')
            $('#disc3btn').show('slow')
        })
        $('#disc1btn').click(() => {
            $('#disc2').hide('slow')
            $('#disc1').show('slow')

            $('#disc2btn').show('slow')
            $('#disc3btn').hide('slow')
        })

    </script>

@endsection
