@extends('layouts.front')
@section('content')
<link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>
<style>
    @font-face {
        font-family: Montserrat;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        font-family: "Montserrat", sans-serif;
    }
</style>
<section class="content contact-pg clearfix">



    <!-- Inner Pages Start -->
    <div class="inner-content clearfix">

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-title clearfix  hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="breadcrumb-left">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/home">Home</a>
                                </li>
                                <li class="active">Contact Us</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="breadcrumb-right">
                            <h5>Contact Us</h5>
                        </div>
                    </div>
                    <!--/.col-sm-6 col-md-6-->
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div><!-- Breadcrumb End -->



        <div class="container">
            <div class="inner-content clearfix">
                <div class="row">

                    {{-- <div class="col hidden-sm hidden-xs">
                        @foreach ($pages as $item)
                                @if ( isset($item->level) && $item->level == 1)
                                    <div class="banner inner-banner clearfix">
                                        <img alt="BANNER" class="img-responsive" src="{{ url('/').$item->file_path }}" style="height: 45rem;">
                </div><!-- Banner End -->
                @break
                @endif
                @endforeach
            </div> --}}

            <div class="content-desc">
                <!-- Appointment Form Start -->
                <div class="appointment-form white-bg clearfix" style="margin-top: 5em">
                    <div class=" blog-lists clearfix" style="width: 95%; line-height: 1.5rem;">
                        <h6>Got A Question About Pain Map Or Is Something Not Working? Get In Touch.</h6>
                        <p>
                            Please note, we are not able to answer questions about your pain.  Please go through our
                            Symptom checker and follow the advice and speak to the recommended Therapist or the Therapist online for pain related questions.
                        </p>

                        <p>
                            <span id="csuccessmessage"></span>
                        </p>
                        <div class="">
                            <form action="{{ url('/contact-us') }}" class="md__contactForm" method="post">
                                @csrf

                                <div class="col">
                                    <div class="form-group">
                                        <label>Name</label> <input class=" md__input form-control" name="name" id="contact_name" type="text">
                                    </div>
                                    <span id="cname"></span>
                                    <!--/.form-group-->
                                </div>
                                <!--/.col-sm-6 col-md-6-->

                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label> <input class=" md__input form-control" id="contact_email" name="email" type="email">
                                    </div>
                                    <span id="cemail"></span>
                                    <!--/.form-group-->
                                </div>
                                <!--/.col-sm-6 col-md-6-->

                                <div class="col">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="md__input form-control" id="contact_message" name="message"></textarea>
                                    </div>
                                    <span id="cmessage"></span>
                                    <!--/.form-group-->
                                </div>
                                <!--/.col-sm-6 col-md-6-->

                                <div class="modal-footer justify-content-between">
                                    <div class="g-recaptcha brochure__form__captcha" data-sitekey="{{ config('app.site_key') }}"></div>
                                    <button class="btn btn-default appointment-button md__submitBtn" type="submit">Submit</button>
                                </div>
                                <!-- <button class="btn btn-default appointment-button md__submitBtn g-recaptcha" data-sitekey="{{ config('app.site_key') }}" data-callback='medlife.initContactForm' data-action='submit'>Submit</button> -->


                            </form>
                        </div>
                    </div>
                </div><!-- Appointment Form End -->
            </div>
            <!--/.content-desc-->
        </div>
        <!--/.col-sm-12 col-md-8 col-lg-9-->

    </div>
    <!--/.row-->
    </div>
    <!--/.container-->
    </div><!-- Inner Pages End -->
</section><!-- Content End -->

@endsection