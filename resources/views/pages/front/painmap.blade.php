@extends('layouts.front')
@section('content')

    <!-- Content Start -->
    <section class="content inner-pg blog-pg clearfix">

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-title clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="breadcrumb-left">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/home">Home</a>
                                </li>
                                <li class="active">Pain Map</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="breadcrumb-right">
                            <h5>Pain Map</h5>
                        </div>
                    </div>
                    <!--/.col-sm-6 col-md-6-->
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div><!-- Breadcrumb End -->


        <div class="container">
            <!-- Inner Pages Start -->
            <div class="inner-content clearfix">
                <div class="row">
                    <div xclass="col-sm-12 col-md-8 col-lg-9">
                        <!-- Content Description Start -->

                        <!-- Banner Start -->
                        <div xclass="col">
                            @foreach ($pages as $item)
                                @if (isset($item->level) && $item->level == 1)
                                    <div xclass="banner inner-banner clearfix">
                                        <img alt="BANNER" src="{{ url('/') . $item->file_path }}"
                                            style="width: 100% !important;margin-top: -2em" xclass="img-responsive">
                                    </div><!-- Banner End -->
                                @break
                            @endif
                            @endforeach
                        </div>

                        <div class="content-desc clearfix">
                            <!-- Blog Lists Start -->
                            <div class="blog-lists clearfix">
                                <!-- Blog Post Start -->
                                @foreach ($pages as $k => $item)
                                    @if ($k != 0)
                                        <div class="blog-post clearfix">
                                            <!-- Blog Image Start -->
                                            <div class="blog-image clearfix">


                                            </div><!-- Blog Image End -->
                                            <!-- Blog Detail Start -->
                                            <div class="blog-detail clearfix">
                                                <a href="/article-details/{{ $item->id }}">{{ $item->title }}</a>
                                                <div><b>{{ $item->sub_title }}</b></div>
                                                <div style="word-wrap: break-word">{!! $item->body !!}</div>
                                                <!-- Read More SVG Start -->

                                            </div><!-- Blog Detail End -->
                                        </div><!-- Blog Post End -->
                                    @endif
                                @endforeach
                                {{ $pages->render('pagination::bootstrap-4') }}


                            </div><!-- Blog Lists End -->
                        </div><!-- Content Description End -->
                    </div>
                    <!--/.col-sm-12 col-md-8 col-lg-9-->








                </div>
                <!--/.row-->
            </div><!-- Inner Pages End -->
        </div>
        <!--/.container-->
    </section><!-- Content End -->

@endsection
