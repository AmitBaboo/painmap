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
                                <a href="/home">HOME</a>
                            </li>
                            <li class="active">FAQ</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="breadcrumb-right">
                        <h5>FAQ</h5>
                    </div>
                </div><!--/.col-sm-6 col-md-6-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!-- Breadcrumb End -->
    <div class="container">
        <!-- Inner Pages Start -->
        <div class="inner-content clearfix">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <!-- Content Description Start -->
                    <div class="content-desc clearfix">
                        <!-- Blog Lists Start -->
                        <div class="blog-lists clearfix">
                            <!-- Blog Post Start -->
                            

                            <h2>Frequently Asked Questions</h2>
                            @foreach ($pages as $k => $item)
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom: 2px;">

                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="heading{{$item->id}}">
                                    <h4 class="panel-title" style="background-color: #37a8ec; color: #fff; padding: 1em; margin-bottom: 0">
                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                        {{ $item->title }} 
                                      </a>

                                          <a style="float: right;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                              <span style="padding-bottom: 3em">
                                                <i class="fa fa-plus-circle fa-2x"></i>
                                              </span>
                                        </a>
                                    </h4>
                                  </div>
                                <div id="collapse{{$item->id}}" class="panel-collapse collapse @if($k == 0) {{ 'in'}} @endif" role="tabpanel" aria-labelledby="heading{{$item->id}}">
                                    <div class="panel-body">
                                        <h4>{{ $item->sub_title }}</h4>
                                        {!! $item->body !!}
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                              @endforeach
                            {{ $pages->render("pagination::bootstrap-4") }} 






                        </div><!-- Blog Lists End -->
                    </div><!-- Content Description End -->
                </div><!--/.col-sm-12 col-md-8 col-lg-9-->



{{-- 
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <!-- Sidebar Widget Start -->
                    <div class="blog-sidebar-widget white-bg clearfix">
                        <!-- Widget Block Start -->
                        <div class="widget-block">
                            <!-- Widget Detail Start -->
                            <div class="widget-detail">
                                <div class="search-box clearfix">
                                    <input class="form-control" placeholder="SEARCH..." type="text"> <a href="#"><i aria-hidden="true" class="fa fa-search"></i></a>
                                </div>
                            </div><!-- Widget Detail End -->
                        </div><!-- Widget Block End -->
                       
                        



                        


                    </div><!-- Sidebar Widget End -->
                </div><!--/.col-sm-12 col-md-4 col-lg-3--> --}}



            </div><!--/.row-->
        </div><!-- Inner Pages End -->
    </div><!--/.container-->
</section><!-- Content End -->

@endsection