@extends('layouts.front')
@section('content')

<style>
  html {
  scroll-behavior: smooth;
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
                        <div class="section-title"  style="margin: 0; padding-bottom: 1em">
                        <h4>
                            @if(isset($policy->title))
                                {!! $policy->title !!}
                                @else
                                <h4>No Page Title found</h4>
                            @endif
                        </h4>
                        </div>
                        
                        <!-- Shop Items List Start -->
                        <div class="shop-products-list clearfix">
                            <div class="" style="width: 120vh; margin: 0 auto">

                                

                                <div class="disclaimerbody" >

                                    
                                    
                                    <style>
                                      
                                      </style>
                                      <div class="introBox">
                                          @if(isset($policy->body))
                                             {!! $policy->body !!}
                                          @else
                                             <h4>No Page Content found</h4>
                                          @endif
                                      </div>

                                 
                                



                            </div><!--/.row-->
                        </div><!-- Shop Items List End -->
                        <!-- Page List Start -->
                        
                    </div><!-- Content Description End -->
                </div><!--/.col-sm-12 col-md-8 col-lg-9-->
                
            </div><!--/.row-->
        </div><!-- Inner Pages End -->
    </div><!--/.container-->
</section><!-- Content End -->

<script src="{{asset('assets/front/js/jquery-3.1.1.min.js')}}"></script>
<script>
$('.disclaimerbody span').css({'fontSize': '15px', 'lineHeight': '1.5em'})
</script>

@endsection