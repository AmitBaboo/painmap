@extends('layouts.front')
@section('content')
    <style>
        .blog-post a {
            color: red !important
        }

        .pre {
            color: gray;
            font-size: 16px;
            line-height: 1em;
            font-family: CeraPro;
            border: none;
            background: white !important
        }

        .blog-lists a {
            color: #4096ee !important;
            font-size: 16px !important
        }

    </style>

    {{-- <link rel="stylesheet" href="{{asset('assets')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> --}}

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
                                <li class="active">{{ $page->name == 'advice' ? ucfirst($page->name) : 'Shop' }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="breadcrumb-right">
                            <h5>{{ $page->name == 'advice' ? ucfirst($page->name) : 'Shop' }} Details</h5>
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
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <!-- Content Description Start -->
                        <div class="content-desc clearfix">
                            <!-- Blog Lists Start -->
                            <div class="blog-lists clearfix">
                                <!-- Blog Post Start -->



                                <!-- Blog Post Start style="width: 878px; height: 430px"-->
                                <div class="blog-post clearfix">
                                    <!-- Blog Image Start -->
                                    <div class="blog-image clearfix">
                                        <a class="image clearfix" href="#"><img alt="IMAGE" class="img-responsive"
                                                src="{{ url('/') . $page->file_path }}" style="width: 100%; height: 100% ">
                                            <div class="overlayx"></div>
                                        </a> <!-- Employee Detail Start -->

                                    </div><!-- Blog Image End -->
                                    <!-- Blog Detail Start -->
                                    <div class="blog-detail clearfix">
                                        <div>
                                            Views <span class="badge badge-info">{{ $page->views }}</span>
                                        </div>
                                        <b style="font-size: 18px; color: rgb(24, 81, 146)">{{ $page->title }}</b>
                                        @if ($page->file_caption != '')
                                            <a href="{{ trim($page->file_caption) }}" target="_blank"
                                                style="font-size: 16px; color: red">
                                                <i class="fa fa-cart-plus"></i> Buy Now
                                            </a>
                                        @endif
                                        <pre class="bodytext pre"
                                            style="margin: auto 0;  word-break:keep-all !important;">{!! $page->body !!}</pre>
                                    </div><!-- Blog Detail End -->
                                </div><!-- Blog Post End -->



                            </div><!-- Blog Lists End -->
                        </div><!-- Content Description End -->
                    </div>
                    <!--/.col-sm-12 col-md-8 col-lg-9-->




                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <!-- Sidebar Widget Start -->
                        <div class="blog-sidebar-widget white-bg clearfix">
                            <!-- Widget Block Start -->
                            <div class="widget-block">
                                <!-- Widget Detail Start -->
                                <div class="widget-detail">
                                    <div class="search-box clearfix">
                                        {{-- <input class="form-control" placeholder="SEARCH..." type="text"> <a href="#"><i aria-hidden="true" class="fa fa-search"></i></a> --}}
                                    </div>
                                </div><!-- Widget Detail End -->
                            </div><!-- Widget Block End -->
                            <!-- Widget Block Start -->
                            <div class="widget-block">
                                <div class="widget-title">
                                    <h6>RECENT POSTS</h6>
                                </div><!-- Widget Detail Start -->
                                <div class="widget-detail">
                                    <!-- Post Block Start -->
                                    <div class="recent-posts clearfix">
                                        <div class="post-block clearfix">
                                            @foreach ($pages as $item)

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a class="image" href="/article-details/{{ $item->id }}"><img
                                                                alt="IMAGE" class="img-responsive"
                                                                src="{{ url('/') . $item->file_path }}"></a>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div>Views <span
                                                                class="badge badge-info">{{ $item->views }}</span></div>
                                                        <div class="post-desc">
                                                            <a
                                                                href="/article-details/{{ $item->id }}">{{ $item->title }}</a>
                                                        </div>
                                                    </div>
                                                    <!--/.col-xs-8 col-sm-8 col-md-8-->
                                                </div>
                                                <!--/.row-->

                                            @endforeach
                                        </div>
                                    </div>
                                    <!--/.recent-posts clearfix-->


                                </div><!-- Widget Detail End -->
                            </div><!-- Widget Block End -->





                        </div><!-- Sidebar Widget End -->
                    </div>
                    <!--/.col-sm-12 col-md-4 col-lg-3-->



                </div>
                <!--/.row-->
            </div><!-- Inner Pages End -->
        </div>
        <!--/.container-->
    </section><!-- Content End -->

@endsection
