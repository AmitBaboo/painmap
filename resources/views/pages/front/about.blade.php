@extends('layouts.front')

@section('content')
<section class="content inner-content doctor-pg clearfix">
	<!-- Banner Start -->
	@foreach ($pages as $item)
	@if ( $item->level == 1)
	<div class="banner inner-banner clearfix">
		<img alt="BANNER" class="img-responsive" src="{{ url('/').$item->file_path }}" style="max-width: 1920px !important; max-height: 920px !important">
		<div class="banner-overlay"></div><!-- Banner Detail Start -->
		<div class="banner-desc clearfix">
			<div class="container">
				<h1>{{ $item->title }}</h1>
				<h4>{{ $item->sub_title }}</h4>
			</div>
		</div><!-- Banner Detail End -->
	</div>

	<!-- Scroll To Section Start -->
	<div class="scroll-to-section clearfix">
		<div class="container">
			<a href="#"><span><i aria-hidden="true" class="fa fa-angle-down"></i></span></a>
		</div>
	</div><!-- Scroll To Section End -->
	  @break
	 @endif
	@endforeach
	<!-- Banner End -->

	<!-- Phisician Md Start -->
	@foreach ($pages as $item)
	@if ( isset($item->level) && $item->level == 2)
	<div class="phisician-md clearfix">
		<div class="container">
			<div class="col-sm-7 col-md-7">
				<div class="phisician-left rellax" data-rellax-speed="-2">
					<h5>{{ $item->title }}</h5>
					<h5><span>{{ $item->sub_title }}</span></h5>
					<p>{!! $item->body !!}</p>
				</div>
				<!--/.phisician-left-->
			</div>
			<!--/.col-sm-7 col-md-7-->
			<div class="col-sm-5 col-md-5">
				<div class="phisician-right">
					<div class="image rellax" data-rellax-speed="-2"><img alt="IMAGE" class="img-responsive" src="{{ url('/').$item->file_path }}"></div><!-- Join Our Team Start -->
					<div class="join-our-team rellax clearfix" data-rellax-speed="-1.5">
						{{-- <a class="btn btn-default" href="#" role="button">JOIN OUR TEAM</a> --}}
					</div><!-- Join Our Team End -->
					<div class="silver-squar rellax" data-rellax-speed="-1.8"></div>
				</div>
				<!--/.phisician-right-->
			</div>
			<!--/.col-sm-5 col-md-5-->
		</div>
		<!--/.container-->
	</div>
	@endif
	@endforeach
	<!-- Phisician Md End -->

	<!-- Nurse Practice Start -->
	@foreach ($pages as $item)
	@if ( isset($item->level) && $item->level == 3)
	<div class="nurse-practice clearfix">
		<div class="container">
			<!-- Section Title Start -->
			<div class="section-title">
				<h2>NURSE PRACTITIONER</h2>
			</div><!-- Section Title End -->
			<div class="row">
				@foreach ($pages as $item)
				@if ( $item->level == 3)
				<div class="col-sm-6 col-md-6 col-lg-3" style="margin-bottom: 3em">
					<div class="practice-block">
						<img alt="NURSE" class="img-responsive" src="{{ url('/').$item->file_path }}" style="width: 344px; height: 341px">
						<div class="nurse-detail">
							<h6>{{$item->file_caption}}</h6>
							<h6><span>{{$item->sub_title}}</span></h6>
							<p style="max-height: 10em; overflow: hidden">{!! $item->body !!}</p>
						</div>
						<!--/.nurse-detail"-->
					</div>
					<!--/.practice-block-->
				</div>
				<!--/.col-sm-6 col-md-6 col-lg-3-->
				@endif
				@endforeach
			</div>
			<!--/.row-->
		</div>
		<!--/.container-->
	</div>
	@break
	@endif
	@endforeach
	<!-- Nurse Practice End -->
</section><!-- Content End -->

@endsection