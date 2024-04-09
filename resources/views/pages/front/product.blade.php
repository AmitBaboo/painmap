@extends('layouts.front')
@section('content')
    <style>
        @font-face {
            font-family: CeraPro;
        }

    </style>
    <!-- Content Start -->
    <section class="content inner-pg shop-pg clearfix">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-title clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="breadcrumb-left">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="active">Shop</li>
                            </ol>
                            <!--/.breadcrumb-->
                        </div>
                        <!--/.breadcrumb-left-->
                    </div>
                    <!--/.col-sm-6 col-md-6-->
                    <div class="col-sm-6 col-md-6">
                        <div class="breadcrumb-right">
                            <h5>Shop</h5>
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
                    <div class="">
                        <!-- Content Description Start -->
                        <div class="xcontent-desc clearfix">
                            <!-- Section Title Start -->
                            <div class="section-title" style="padding-left: 1.5rem">
                                <h1>SHOP</h1>
                            </div><!-- Section Title End -->

                            <!-- Shop Items List Start -->
                            <div class="shop-products-list clearfix">
                                <div class="row">

                                    @foreach ($pages as $item)

                                        <div class="col-lg-4">
                                            <a href="/article-details/{{ $item->id }}">
                                                <div class="product-block">
                                                    <div class="image">
                                                        <img alt="IMAGE" class="img-responsive"
                                                            src="{{ url('/') . $item->file_path }}"
                                                            style="height: 20em; margin: auto 0">
                                                    </div>
                                                    <div class="product-detail" style="padding: 1em; color: #ddd">
                                                        <h4 style="color:#3695eb;">{{ trim($item->title) }}</h4>
                                                        <pre class="bodytext pre-shop"
                                                            style="height: 10em; margin: auto 0; color: #000; margin-left: -0.5em; word-break:keep-all !important; overflow:hidden">{!! substr($item->body, 0, 200) !!}...</pre>
                                                        <h4>
                                                            <b>Read More</b>
                                                        </h4>
                                                        <br>
                                                        <div class="badge badge-info"
                                                            style="padding: 1em; background: #3695eb">
                                                            {{ $item->sub_title }}</div>
                                                        <br>
                                                        <br>
                                                        <a href="/article-details/{{ $item->id }}"> Buy Now</a>
                                                    </div>

                                                </div>
                                                <!--/.product-block-->
                                            </a>
                                        </div>
                                        <!--/.col-xs-6 col-sm-6 col-md-6 col-lg-4-->

                                    @endforeach
                                    {{ $pages->render('pagination::bootstrap-4') }}





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
        $('.bodytext p').removeAttr('style');
        // $(".bodytext").css({"color": "gray", "font-size": "16px", "font-family":"CeraPro;line-height:  1.5em;"});

    </script>

@endsection
