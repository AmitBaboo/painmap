<style>
    .grid-box-inner a:hover {
        text-decoration: none;
        background-color: rgb(190, 28, 28);
    }

</style>
@extends('layouts.front')

@section('content')

    <style>
        .tp-bullets,
        .tp-tabs,
        .tp-thumbs {
            position: absolute;
            display: block;
            z-index: 1000;
            top: 0;
            left: 0;
            display: none !important
        }

        .start-now-btn {
            text-decoration: none;
            /* background-color: #65cc66; */
            padding: .3em;
            color: #fff;
            border-radius: 30px;
            padding-left: 2em;
            padding-right: 2em
        }

        video {
            width: 100%;
            height: auto;
        }

    </style>

    {{-- banner --}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="position: relative">
        <!-- Wrapper for slides -->
        {{-- <div class="carousel-inner">
            @foreach ($pages as $k => $item)
                @if (isset($item->level) && $item->level == 1)
                    <div class="item @if ($k == 0) active @endif">
                        <img src="{{ url('/') . $item->file_path }}">
                    </div>
                @endif
            @endforeach
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="padding-top: 20em">
            <i class="fa fa-arrow-left fa-2x"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next" style="padding-top: 20em">
            <i class="fa fa-arrow-right fa-2x"></i>
            <span class="sr-only">Next</span>
        </a>
        <div
            style="z-index: 2000; position: absolute; top: 60%; left: 37%;xwidth: 35%;xheight: 35em;border-radius: 20em; font-size:  2vw">
            <a href="/disclaimer" style="text-decoration: none;" class="start-now-btn">
                Start Your Journey
            </a>
        </div> --}}
        <div
            style="z-index: 2000; position: absolute; top: 50%; left: 37%;xwidth: 35%;xheight: 35em;border-radius: 20em; font-size:  2vw">
            <a href="/disclaimer" style="text-decoration: none; " class="start-now-btn">
                <div style="width:20em; height: 5em"></div>
            </a>
        </div>
        <video controls autoplay="autoplay" loop  playsinline muted class="hidden-sm hidden-xs">
            <source src=" {{ asset('pain.mp4') }}" type="video/mp4" class="embed-responsive-item">
            {{-- <source src=" {{ asset('PainMaphero.ogv') }}" type="video/ogv" class="embed-responsive-item"> --}}
        </video>
        <video controls autoplay="autoplay" loop muted  playsinline class="hidden-lg hidden-md">
            <source src=" {{ asset('pain.mp4') }}" type="video/mp4" class="embed-responsive-item">
            <source src=" {{ asset('PainMaphero.ogv') }}" type="video/ogv" class="embed-responsive-item">
            <source src=" {{ asset('pain.webm') }}" type="video/webm" class="embed-responsive-item">
        </video>
    </div>

    <!-- banner End -->



    <!-- Services-section Start -->
    <div class="xservices-section">
        <div class="xcontainer-fluid">
            <div class="services-main-blocks">
                <div class="row" style="background-color: #3695eb; color: #3695eb; text-align: center;">
                    {{-- <div class="row"  style="background-color: #fff; color: #fff;"> --}}
                    @foreach ($pages as $k => $item)
                        @if (isset($item->level) && $item->level == 2 && $item->title == 'Symptoms Checker')
                            <a href="{{ url('/disclaimer') }}">
                                <div class="col-lg-3"
                                    style="height: 20em; border-right: solid #fff .01em; padding: 1em; border-bottom: solid #fff .1em; padding: 1em; background:#66cc66">
                                    <div class="xservices-box">
                                        <div class="grid-box-inner">
                                            <div class="item-title" style="padding: : 2em; color: #fff">
                                                <div class="icon-wrp" style="margin-bottom: .4em; margin-top: 1em">
                                                    <i class="fa {{ $item->file_caption }} fa-3x" style="color: #fff"></i>
                                                </div>
                                                <br>
                                                <div class="title-wrp" sxtyle="padding-left: 0;"></div>
                                                <h3 style="color: #fff">{{ $item->title }}</h3>
                                            </div>
                                        </div>
                                        <!--/.item-title-->
                                        <div class="clearfix description" style="height: 4em;">
                                            <p
                                                style="font-size: 16px; color: #fff; line-height: 2em;  word-break:keep-all !important;">
                                                {!! $item->body !!}</p>
                                        </div>

                                    </div>
                                    <!--/.grid-box-inner-->
                                </div>
                            </a>
                        @endif
                    @endforeach
                    @foreach ($pages as $k => $item)
                        @if (isset($item->level) && $item->level == 2 && $item->title != 'Symptoms Checker')
                            <a href="{{ $item->sub_title }}">
                                <div class="col-lg-3"
                                    style="height: 20em; border-right: solid #fff .01em; padding: 1em; border-bottom: solid #fff .1em;">

                                    <div class="xservices-box">
                                        <div class="grid-box-inner">
                                            <div class="item-title" style="padding: : 2em; color: #fff">
                                                <div class="icon-wrp"
                                                    style="margin-bottom: .4em; margin-top: 1em; text-align: center">
                                                    @if ($item->title == 'Pain Map')
                                                        <img alt="" class="img-responsive"
                                                            src="{{ asset('assets/logo_raw.png') }}"
                                                            style="width: 5em; margin-left: 40%">

                                                    @else
                                                        <i class="fa {{ $item->file_caption }} fa-3x"
                                                            style="color: #fff"></i>
                                                    @endif
                                                </div>
                                                <br>
                                                <div class="title-wrp" sxtyle="padding-left: 0;">
                                                    <h3 style="color: #fff">{{ $item->title }}</h3>
                                                </div>
                                            </div>
                                            <!--/.item-title-->
                                            <div class="clearfix description" style="height: 4em;">
                                                <p
                                                    style="font-size: 16px; color: #fff; line-height: 2em;  word-break:keep-all !important;">
                                                    {!! $item->body !!}
                                                </p>
                                            </div>
                                        </div>
                                        <!--/.grid-box-inner-->
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>

            </div>
            <!--/.services-main-blocks-->
        </div>
        <!--/.container-->
    </div><!-- Services-section End -->

    <br />

    {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/0EWZOEf2K_A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

    <div class="clearfix emergency-services plastic-surgery"
        style="margin-top: -2em; margin-bottom: 0 !important;padding-bottom:0 !important">
        <div class="col-sm-12 col-md-12 col-lg-6 padding">
            <div class="emergency-imagex embed-responsive embed-responsive-16by9">
                @foreach ($pages as $item)
                    @if (isset($item->level) && $item->level == 3)
                        @if ($item->file_caption != '')
                            <iframe xstyle="width:100% !important; height:500px" src="{{ $item->file_caption }}"
                                class="embed-responsive-item"></iframe>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 paddingx"
            style="background-color:#F2F2F2 ;padding-top: 2em; height: 400px; overflow: scroll">
            <div class="clearfix emergency-detail" style=" color: #37a8ec;">
                @foreach ($pages as $item)
                    @if (isset($item->level) && $item->level == 3)
                        <h5 style=" color: #37a8ec">{{ $item->title }}</h5>
                        <pre class="bodytext pre"
                            style="height: 100%; margin: auto 0; color: #000; margin-left: -0.5em;  word-break:keep-all !important; background-color: #F2F2F2 !important">{!! $item->body !!}</pre>
                        {{-- <a class="btn btn-default" href="#" role="button">FIND MORE</a> --}}
                    @endif
                @endforeach
            </div>
        </div>
        <!--/.col-sm-12 col-md-12-->

    </div>


    @foreach ($pages as $item)
        @if (isset($item->level) && $item->level == 6)
            <div class="clearfix emergency-services plastic-surgery">
                <div class="col-sm-12 col-md-12 col-lg-6 padding"
                    style="background-color: #fff;padding: 1em; height: 540px">
                    <div class="xemergency-detail xclearfix" style="color: #37a8ec; ">
                        @foreach ($pages as $item)
                            @if (isset($item->level) && $item->level == 6)
                                <h5 style=" color: #37a8ec">{{ $item->title }}</h5>
                                <div style="word-wrap: break-word;  word-break:keep-all !important;">
                                    {!! $item->body !!}
                                </div>
                                {{-- <a class="btn btn-default" href="#" role="button">FIND MORE</a> --}}
                            @endif
                        @endforeach
                    </div>
                </div>
                <!--/.col-sm-12 col-md-12-->
                <div class="col-sm-12 col-md-12 col-lg-6 padding" data-example-id="responsive-embed-16by9-iframe-youtube">
                    <div class="emergency-image embed-responsive embed-responsive-16by9">
                        @foreach ($pages as $item)
                            @if (isset($item->level) && $item->level == 6)
                                @if ($item->file_caption != '')
                                    <iframe style="width:100% !important; height: auto !important"
                                        src="{{ $item->file_caption }}" class="embed-responsive-item">
                                    </iframe>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach


    @push('js-scripts')
        <script src="{{ asset('assets/front/js/welcome.js') }}"></script>
        <script src="{{ asset('assets') }}/gsap/minified/gsap.min.js"></script>
        <script>
            // const tl = gsap.timeline({defaults: {ease: "power2.inOut", duration: 1}})
            // //   tl.from('.startbtnlink', {x: '10%', opacity:0})
            // TweenMax.to('.startbtnlink', 0.1, {x:"+=5", yoyo:true, repeat:-2});
            // TweenMax.to('.startbtnlink', 0.1, {x:"-=5", yoyo:true, repeat:-2});  
            $('video').trigger('play');
        </script>
    @endpush

@endsection
