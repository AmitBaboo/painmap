@extends('layouts.front')

@section('content')

{{-- sliders --}}
<div class="main-slider clearfix"> 
	<div id="cxlouds">
		<img alt="" class="rev-slidebg cloud x1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('assets/front/images/front/banner.png') }}" title="Home" style="margin-top: 3em !important"> <!-- LAYERS 1-->
	</div>
	{{-- <div class="rev_slider fullscreen" data-version="5.3.0.2" id="rev_slider_1_1" style="display:none;">
		 <ul>
			
						<!-- SLIDE  -->
		<li data-description="" data-easein="default" data-easeout="default" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1" data-masterspeed="300" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-title="Slide" data-transition="slotzoom-horizontal">
					<!-- MAIN IMAGE -->
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('assets/front/images/front/banner.png') }}" title="Home" style="margin-top: 6em !important"> <!-- LAYERS 1-->
					<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme" data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:10,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:2260,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;nothing&quot;}]" data-height="4000" data-hoffset="['0','0','0','0']" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-textalign="['left','left','left','left']" data-type="shape" data-voffset="['0','0','0','0']" data-whitespace="nowrap" data-width="4000" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" id="slide-1-layer-1" style="z-index: 5;background-color:rgb(67 71 193 / 25%);border-color:rgba(0, 0, 0, 0);"></div><!-- LAYER NR. 2 -->
					<div class="tp-caption" data-fontsize="['72','62','50','28']" data-frames="[{&quot;delay&quot;:500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;&quot;,&quot;mask&quot;:&quot;x:[-100%];y:0;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;nothing&quot;}]" data-height="['81','66','61','36']" data-hoffset="['29','21','-4','-3']" data-lineheight="['80','65','60','34']" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive="off" data-responsive_offset="off" data-textalign="['left','left','left','left']" data-type="text" data-voffset="['392','386','-110','-64']" data-whitespace="nowrap" data-width="['1500','333','271','152']" data-x="['left','left','center','center']" data-y="['bottom','bottom','middle','middle']" id="slide-1-layer-2" style="z-index: 6; min-width: 385px; max-width: 385px; max-width: 81px; max-width: 81px; white-space: nowrap; font-size: 72px; line-height: 80px; font-weight: 400; color: rgba(255, 255, 255, 1.00);font-family: 'latoregular';">
						
					</div><!-- LAYER NR. 3 -->
					<div class="tp-caption" data-fontsize="['30','26','22','16']" data-frames="[{&quot;delay&quot;:500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;nothing&quot;}]" data-height="['73','none','57','41']" data-hoffset="['30','24','-3','-4']" data-lineheight="['36','30','28','20']" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive="off" data-responsive_offset="off" data-textalign="['left','left','center','center']" data-type="text" data-voffset="['315','315','-46','-24']" data-whitespace="nowrap" data-width="['922','none','307','225']" data-x="['left','left','center','center']" data-y="['bottom','bottom','middle','middle']" id="slide-1-layer-3" style="z-index: 7; min-width: 422px; max-width: 422px; max-width: 73px; max-width: 73px; white-space: nowrap; font-size: 30px; line-height: 36px; font-weight: 300; color: rgba(255, 255, 255, 1.00);font-family: 'latolight';">
				        
					</div>
				</li><!-- SLIDE  -->
			
		</ul> 
		
	</div> --}}
	{{--<div class="rev_slider fullscreen" data-version="5.3.0.2" id="rev_slider_1_1" style="display:none;">
		<img alt="" class="img-responsive" src="{{ asset('assets/front/images/front/banner.jpeg') }}"  xstyle="width:73px; height:40px">
		 <ul>
			@foreach ($pages as $k => $item)
				@if ( isset($item->level) && $item->level == 1)
						<!-- SLIDE  -->
		<li data-description="" data-easein="default" data-easeout="default" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-{{ $k }}" data-masterspeed="300" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-title="Slide" data-transition="slotzoom-horizontal">
					<!-- MAIN IMAGE -->
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ url('/').$item->file_path }}" title="Home"> <!-- LAYERS 1-->
					<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme" data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:10,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:2260,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;nothing&quot;}]" data-height="4000" data-hoffset="['0','0','0','0']" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-textalign="['left','left','left','left']" data-type="shape" data-voffset="['0','0','0','0']" data-whitespace="nowrap" data-width="4000" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" id="slide-1-layer-1" style="z-index: 5;background-color:rgb(67 71 193 / 25%);border-color:rgba(0, 0, 0, 0);"></div><!-- LAYER NR. 2 -->
					<div class="tp-caption" data-fontsize="['72','62','50','28']" data-frames="[{&quot;delay&quot;:500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;&quot;,&quot;mask&quot;:&quot;x:[-100%];y:0;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;nothing&quot;}]" data-height="['81','66','61','36']" data-hoffset="['29','21','-4','-3']" data-lineheight="['80','65','60','34']" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive="off" data-responsive_offset="off" data-textalign="['left','left','left','left']" data-type="text" data-voffset="['392','386','-110','-64']" data-whitespace="nowrap" data-width="['1500','333','271','152']" data-x="['left','left','center','center']" data-y="['bottom','bottom','middle','middle']" id="slide-1-layer-2" style="z-index: 6; min-width: 385px; max-width: 385px; max-width: 81px; max-width: 81px; white-space: nowrap; font-size: 72px; line-height: 80px; font-weight: 400; color: rgba(255, 255, 255, 1.00);font-family: 'latoregular';">
						{{$item->title}}
					</div><!-- LAYER NR. 3 -->
					<div class="tp-caption" data-fontsize="['30','26','22','16']" data-frames="[{&quot;delay&quot;:500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;nothing&quot;}]" data-height="['73','none','57','41']" data-hoffset="['30','24','-3','-4']" data-lineheight="['36','30','28','20']" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive="off" data-responsive_offset="off" data-textalign="['left','left','center','center']" data-type="text" data-voffset="['315','315','-46','-24']" data-whitespace="nowrap" data-width="['922','none','307','225']" data-x="['left','left','center','center']" data-y="['bottom','bottom','middle','middle']" id="slide-1-layer-3" style="z-index: 7; min-width: 422px; max-width: 422px; max-width: 73px; max-width: 73px; white-space: nowrap; font-size: 30px; line-height: 36px; font-weight: 300; color: rgba(255, 255, 255, 1.00);font-family: 'latolight';">
				        {{$item->sub_title}}
					</div>
					<a class="tp-caption rev-btn" data-actions="" 
					data-frames="[{&quot;delay&quot;:500,&quot;speed&quot;:300,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;nothing&quot;},{&quot;frame&quot;:&quot;hover&quot;,&quot;speed&quot;:&quot;0&quot;,&quot;ease&quot;:&quot;Linear.easeNone&quot;,&quot;force&quot;:true,&quot;to&quot;:&quot;o:1;rX:0;rY:0;rZ:0;z:0;&quot;,&quot;style&quot;:&quot;c:rgba(255, 255, 255, 1.00);bg:rgba(76, 171, 76, 1.00);bs:solid;bw:0 0 0 0;&quot;}]" 
					data-height="['53','53','54','42']" data-hoffset="['31','26','-2','-2']" data-lineheight="['28','28','28','16']" data-paddingbottom="[12,12,12,12]" data-paddingleft="[35,35,35,35]" 
					data-paddingright="[35,35,35,35]" data-paddingtop="[12,12,12,12]" data-responsive="off" data-responsive_offset="off" data-textalign="['left','left','center','center']" 
					data-type="button" data-voffset="['241','241','27','27']" data-whitespace="nowrap" data-width="['148','148','210','151']" 
					data-x="['left','left','center','center']" data-y="['bottom','bottom','middle','middle']" href="{{ $item->file_caption }}" id="slide-1-layer-4" 
					style="z-index: 8; min-width: 274px; max-width: 274px; max-width: 274px; max-width: 274px; white-space: nowrap; font-size: 14px; line-height: 28px; font-weight: 900; color: rgba(255, 255, 255, 1.00);font-family: 'latoregular';background-color:rgba(102, 204, 102, 1.00);border-color:rgba(0, 0, 0, 1.00);border-radius:3px 3px 3px 3px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;" 
					target="_self">
						Start Here
					</a>
				</li><!-- SLIDE  -->
				@endif
			@endforeach
			
		</ul> 
		
	</div>--}}
</div><!-- Slider End --> 

<!-- Services-section Start -->
<div class="services-section">
	<div class="container">
		<div class="services-main-blocks">
			@foreach ($pages as $k => $item)
				@if ( isset($item->level) && $item->level == 2)
					<div class="services-box">
						<div class="grid-box-inner">
							<a href="/symptoms-checker">
								<div class="item-title">
									<div class="icon-wrp" style="margin-bottom: .4em; margin-top: 1em">
										@if($item->title  == 'Pain Map')
										   <img alt="" class="img-responsive" src="{{ asset('assets/front/images/pain_map_logo.png') }}"  style="width:73px; height:40px">
										@else
										   <i class="fa {{ $item->file_caption }} fa-1x" style="color: #fff" ></i>
										@endif
									</div>
									<br>
									<div class="title-wrp" style="padding-left: 0;">
									  <h3  style="font-size: 27px; font-weight: bold; line-height: 10px">{{ $item->title }}</h3>
									</div>
								</div>
								<!--/.item-title-->
								<div class="description clearfix" style="height: 4em;">
									<p style="font-size: 16px"> {!! $item->body !!}</p>
								</div>
							</a>
						</div>
						<!--/.grid-box-inner-->
					</div>
					@endif
			@endforeach

		</div>
		<!--/.services-main-blocks-->
	</div>
	<!--/.container-->
</div><!-- Services-section End -->
<!-- Who-We-Are Start -->
<div class="who-we-are">
	@foreach ($pages as $item)
	@if ( isset($item->level) && $item->level == 3)
	<div class="container">
		
		<div class="our-health-mission clearfix">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<div class="section-title clearfix">
						<h3>{{ $item->title }}</h3>
						</div>
					<div style="white-space: pre-wrap; overflow-wrap: break-word;"><h3>{{ trim($item->sub_title) }}</h3></div>
					<div style="line-height: 2em; font-size: 14px">{!! $item->body !!}</div>
				</div>
				<!--/.col-sm-6 col-md-3-->
				<div class="col-sm-6 col-md-6" style="background-color: #37a8ec; margin-top: 3em">
					<div>
						<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
					    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_jfynisum.json"  background="transparent"  speed="1"  style="width: 700px; height: 400px; margin-left: -4em"  loop  autoplay></lottie-player>
					</div>
					<!--/.health-block-->
				</div>
			</div>
		</div>
	</div>
	@endif
	@endforeach
	<!--/.container-->
</div><!-- Who-We-Are End -->

<div class="container-fluid" style="background: #37a8ec; color: #fff; height: 40em">
		<div class="row">
			<div class="col-md-6" style="padding-top: 10em; padding-left: 3em;padding-right: 3em">
				<h3>Check Demonstration video bellow</h3>
				<div style="line-height: 2em; font-size: 14px; margin-top: 2em; margin-bottom: 2em">
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque ipsum placeat nesciunt asperiores ipsam, natus omnis recusandae pariatur et architecto quasi
					praesentium ipsa odio sapiente exercitationem ut aperiam consequatur tenetur?
				</div>
			</div>
			<div class="col-md-6" style="margin: 0; padding: 0">
				@foreach ($pages as $item)
				   @if ( isset($item->level) && $item->level == 3)
							@if($item->file_caption != '')
								<iframe width="100%" height="560em"
									src="{{ $item->file_caption }}">
								</iframe>
							@endif
				   @endif
				@endforeach
			</div>
	</div>
</div>




@push('js-scripts')
<script src="{{ asset('assets/front/js/welcome.js') }}"></script>
@endpush

@endsection