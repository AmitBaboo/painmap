@extends('layouts.front')
@section('content')

    <style>
        .blog-lists a {
            color: #4096ee !important;
            font-size: 16px !important
        }

    </style>

    <!-- Content Start -->
    <section class="content inner-pg blog-pg clearfix" style="font-family:CeraPro;"> 
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
                                <li class="active">Advice</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="breadcrumb-right">
                            <h5>Advice</h5>
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



                                <!-- Blog Post Start -->
                                @foreach ($pages as $item)
                                    <div class="blog-post clearfix">
                                        <!-- Blog Image Start -->
                                        <div class="blog-image clearfix">
                                            <a class="image clearfix" href="/article-details/{{ $item->id }}">
                                                <img alt="IMAGE" class="img-responsive"
                                                    src="{{ url('/') . $item->file_path }}"
                                                    style="width: 878px; height: 430px">
                                                <div class="xoverlay"></div>
                                            </a> <!-- Employee Detail Start -->

                                        </div><!-- Blog Image End -->
                                        <!-- Blog Detail Start -->
                                        <div class="blog-detail clearfix">
                                            <div>
                                                Views <span class="badge badge-info">{{ $item->views }}</span>
                                            </div>
                                            <a href="/article-details/{{ $item->id }}">{{ $item->title }}</a>
                                            {{-- <p style="font-family:CeraPro;">{!! substr($item->body,0,300) !!}...</p><!-- Read More SVG Start --> --}}
                                            <pre class="bodytext pre"
                                                style="height: 10em; margin: auto 0; color: #000; margin-left: -0.5em; word-break:keep-all !important; overflow:hidden">{!! substr($item->body, 0, 300) !!}...</pre>


                                            <a class="read-more" href="/article-details/{{ $item->id }}"
                                                title="Read more"><svg height="57px" version="1.1" viewbox="0 0 59 57"
                                                    width="59px" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M23,35 C23.5522847,35 24,35.4477153 24,36 C24,36.5522847 23.5522847,37 23,37 C22.4477153,37 22,36.5522847 22,36 C22,35.4477153 22.4477153,35 23,35 L23,35 Z M28,36 C28,36.5522847 27.5522847,37 27,37 C26.4477153,37 26,36.5522847 26,36 C26,35.4477153 26.4477153,35 27,35 C27.5522847,35 28,35.4477153 28,36 L28,36 Z M31,35 C31.5522847,35 32,35.4477153 32,36 C32,36.5522847 31.5522847,37 31,37 C30.4477153,37 30,36.5522847 30,36 C30,35.4477153 30.4477153,35 31,35 L31,35 Z"
                                                        fill="#333333"></path>
                                                    <rect class="svg-more-l1" fill="#333333" height="2" width="16" x="22"
                                                        y="21"></rect>
                                                    <rect class="svg-more-l2" fill="#333333" height="2" width="10" x="22"
                                                        y="25"></rect>
                                                    <rect class="svg-more-l3" fill="#333333" height="2" width="16" x="22"
                                                        y="29"></rect>
                                                    <rect class="svg-more-bg" fill="none" height="49" rx="5"
                                                        stroke="#333333" stroke-width="2" width="51" x="4" y="4"></rect>
                                                </svg></a> <!-- Read More SVG End -->
                                        </div><!-- Blog Detail End -->
                                    </div><!-- Blog Post End -->
                                @endforeach
                                {{ $pages->render('pagination::bootstrap-4') }}


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
                                        <input class="form-control" placeholder="SEARCH..." type="text"> <a href="#"><i
                                                aria-hidden="true" class="fa fa-search"></i></a>
                                    </div>
                                </div><!-- Widget Detail End -->
                            </div><!-- Widget Block End -->
                            <!-- Widget Block Start -->
                            <div class="widget-block">
                                <div class="widget-title">
                                    <h6>RECENT POSTS</h6>
                                </div><!-- Widget Detail Start -->
                                <div class="widget-detail">
                                    <div class="recent-posts clearfix">

                                        <!-- Post Block Start -->
                                        <div class="post-block clearfix">
                                            @foreach ($mostViewed as $item)

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
                                        <!-- Post Block End -->



                                    </div>
                                    <!--/.recent-posts clearfix-->
                                </div><!-- Widget Detail End -->
                            </div><!-- Widget Block End -->




                            <!-- Widget Block Start -->
                            {{-- <div class="widget-block">
                            <div class="widget-title">
                                <h6>CATEGORIES</h6>
                            </div><!-- Widget Detail Start -->
                            <div class="widget-detail">
                                <div class="categories clearfix">
                                    <ul>
                                        <li>
                                            <a href="blog.html">Uncategorized</a>
                                        </li>
                                    </ul>
                                </div><!--/.categories-->
                            </div><!-- Widget Detail End -->
                        </div><!-- Widget Block End --> --}}
                            <!-- Widget Block Start -->



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
