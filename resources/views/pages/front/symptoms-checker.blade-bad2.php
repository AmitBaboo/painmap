<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Pain Map</title><!-- Favicon -->
	<link href="images/favicon.ico" rel="icon" type="image/x-icon"><!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!-- Bootstrap -->
    {{-- <link href="{{asset('assets/wizard/step.css')}}" rel="stylesheet" type="text/css"> --}}
	<link href="{{asset('assets/front/css/bootstrap.css')}}" rel="stylesheet"><!--=== Add By Designer ===-->
	<link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('assets/front/fonts/fonts.css')}}" rel="stylesheet"><!-- Yamm Megamenu -->
	<link href="{{asset('assets/front/css/yamm.css')}}" rel="stylesheet"><!-- Animation -->
	<link href="{{asset('assets/front/css/animate.css')}}" rel="stylesheet"><!-- Animation -->
	<!-- Jquery Ui Date Picker -->
	<!-- Range Slider Start -->
	<link href="{{asset('assets/front/css/jquery-ui.css')}}" rel="stylesheet">
	<link href="{{asset('assets/front/css/jquery-ui-slider-pips.css')}}" rel="stylesheet"><!-- Range Slider End -->
	<!-- Jquery Ui Date Picker -->
	<!-- Boostrap Time Picker -->
	<link href="{{asset('assets/front/css/jquery.timepicker.css')}}" rel="stylesheet"><!-- Boostrap Time Picker -->
	<!-- Selectric Start -->
	{{-- <link href="{{asset('assets/front/css/selectric.css')}}" rel="stylesheet"><!-- Selectric End --> --}}
	<!-- Time Table Start -->
	<link href="{{asset('assets/front/css/reset.css')}}" rel="stylesheet">
  <link href="{{asset('assets/front/css/time-table.css')}}" rel="stylesheet"><!-- Time Table End -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	<!-- Multi Level Push Menu -->
	<link href="{{asset('assets/front/css/normalize.css')}}" rel="stylesheet">
	<link href="{{asset('assets/front/css/component.css')}}" rel="stylesheet">
	<script src="{{asset('assets/front/js/modernizr.custom.js')}}">
  </script><!-- Multi Level Push Menu -->
  <style type="text/css">
        .map {
          position: relative;
        }
      
      .map img {
          display: block;
          width: 100%;
        }
      
      .map  #head { 
        position: absolute;
        top: 2%;
    left: 32.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #Neck { 
        position: absolute;
        top: 12%;
        left: 33.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #tricep { 
        position: absolute;
        top: 411%;
        left: 265%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #shoulder { 
        position: absolute;
        top: 17.6%;
        left: 18.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #ankle { 
        position: absolute;
        top: 84.6%;
        left: 44.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #Elbow {
        position: absolute;
        top: 30.6%;
        left: 16.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #Bicep { 
        position: absolute;
        top: 25.6%;
        left: 52.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #Wrist { 
        position: absolute;
        top: 40.6%;
        left: 13.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #Knee { 
        position: absolute;
        top: 65.6%;
        left: 24.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #Foot { 
        position: absolute;
        top: 82.6%;
        left: 26.118%;
        width: 9.8%;
        height: 14%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em;
      }
      .map  #Calf { 
        position: absolute;
        top: 75%;
        left: 44.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      .map  #Hip { 
        position: absolute;
        top: 40.36%;
        left: 40.118%;
        width: 13.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: 1.2em; 
      }
      .map #Thoracic{
        position: absolute;
        top: 18.36%;
        left: 40.118%;
        width: 13.8%;
        height: 23%;
        border-radius: 0%;
        text-align: center;
        padding-top: 2em; 
      }
      .map  #Quad { 
        position: absolute;
        top: 53.6%;
        left: 24.118%;
        width: 9.8%;
        height: 10%;
        border-radius: 50%;
        text-align: center;
        padding-top: .6em; 
      }
      
      .map a + a {
        top: 38%;
        left: 70%;
        transform: rotate(0deg);
        transform-origin: bottom right
      }
      
      .map a:hover {
        color: white;
        background:linear-gradient(to bottom left, rgb(226 17 64 / 100%), transparent);
        text-shadow:2px 2px 2px black
      }

      html,body { height: 100%; margin: 0px; padding: 0px; }


      .target:hover{
          animation: shake 0.5s;
          animation-iteration-count:infinite;
        }

    @keyframes shake {
      0% { transform: translate(1px, 1px) rotate(0deg); }
      25% { transform: translate(-1px, -2px) rotate(-1deg); }
      50% { transform: translate(1px, -1px) rotate(1deg); }
      75% { transform: translate(3px, 1px) rotate(-1deg); }
      100% { transform: translate(1px, -2px) rotate(-1deg); }
    }
    .nospace{
      margin: 0; padding: 0;
    }
  </style>
{{-- <link href="{{asset('assets/front/fonts')}}?family=CeraPRO-Regular" rel="stylesheet" type="text/css"/>  --}}
<link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>
<style>
   @font-face { font-family:CeraPro; } 
</style>
</head>
<body style="background-color: #ddd; font-family:CeraPro;">
	<!-- Header Start -->
  
  @include('pages.front.nav')

<div class="container-fluid" style="background-color: #DDD; padding: 0; height:  100vh ">
    <!-- Appointment Form Start  lg-->
      <div class="container xhidden-xs imgBoxLg" style="margin-top: 11em">
          
          <div class="row nospace">
              
           <div  style="height: 100vh; padding:0">
                <div style="background-color:#fff padding: 1em; xmargin-left: 4em;  postion: absolute;  height:  100%">

                  <div style="float: left; position: absolute;top:50px; margin-left: 1em; z-index: 999; margin-top: 11em">
                    <button onclick="btnBack()" id="btn-back" class="badge badge-info" style="background-color: #fff; opacity: 0.7;color: rgb(35, 137, 168);height:7em;width:7em; border-radius: 50%">
                      Back <i class="fa fa-rotate-left fa-2x"></i>
                    </button>
                    <button onclick="btnFront()" id="btn-front" class="badge badge-info" style="display: none; background-color: #fff; opacity: 0.7; color: rgb(35, 137, 168);height:7em;width:7em; border-radius: 50%">
                      Front <i class="fa fa-rotate-left fa-2x"></i>
                    </button>
                  </div>
      
                  <div id="imgfront" style="background-color: #fff;  padding:0%;">
                          <!-- Image Map Generated by http://www.image-map.net/ -->
                          <div  style="width: 50%; text-align:center !important;  margin: 0 auto;">
                            <img id="img_ID" src="{{asset('assets/front/images/front/pain-front.jpg')}}" usemap="#map" class="map img-responsive"  style="width: 100%;  background-repeat: no-repeat !important;" />
                          </div>
                              <map  name="map">
                                  <area target="_self" alt="headaches" title="headaches" onclick="setPainArea('Head',2)" href="javascript:;" coords="678,257,724,366,788,414,870,403,918,355,933,229,914,114,846,66,769,65,698,130" shape="poly">
                                  <area target="_self" alt="neck" title="neck" onclick="setPainArea('Neck',13)" href="#neck" coords="736,412,925,490" shape="rect">
                                  <area target="_self" alt="shoulder" title="shoulder" onclick="setPainArea('Shoulder',1)" href="javascript:;" coords="576,546,486,618,465,747,599,799,655,601,652,530" shape="poly">
                                  <area target="_top" alt="shoulder" title="shoulder" onclick="setPainArea('Shoulder',1)" href="javascript:;" coords="1052,516,1106,784,1239,739,1214,628,1174,560,1111,529" shape="poly">
                                  <area target="" alt="bicep" title="bicep" onclick="setPainArea('Bicep / tricep muscle strains / Pulls',4)" href="javascript:;" coords="466,768,438,941,560,991,598,816" shape="poly">
                                  <area target="" alt="elbow" onclick="setPainArea('Elbow: Tenis Elbow, Golfers elbow, Post Elbow fracture',5)" title="elbow" href="javascript:;" coords="1154,915,1284,890,1329,1066,1191,1096" shape="poly">
                                  <area target="" alt="hand" title="hand" onclick="setPainArea('Wrist / Hand',6)" href="javascript:;" coords="1284,1318,1285,1349,1233,1420,1211,1505,1234,1516,1268,1445,1310,1471,1275,1535,1307,1595,1358,1546,1375,1476,1366,1379,1363,1337,1349,1260,1319,1283,1301,1287,1295,1301" shape="poly">
                                  <area target="" alt="Thoracic " title="Thoracic " onclick="setPainArea('Thoracic',11)" href="javascript:; " coords="679,535,1026,543,1095,810,1058,1108,819,1113,698,1105,658,1076,608,876" shape="poly">
                                  <area target="" alt="hip" title="hip" onclick="setPainArea('Hip',10)" href="javascript:;" coords="639,1153,596,1406,848,1474,1094,1393,1060,1170" shape="poly">
                                  <area target="" alt="quad" title="quad" onclick="setPainArea('Quad or Hamstring / Strain',13)" href="javascript:;" coords="582,1474,828,1526,812,1777,580,1774,567,1597" shape="poly">
                                  <area target="" alt="knee" title="knee" onclick="setPainArea('Knee',7)" href="javascript:;" coords="602,1883,798,1881,774,2090,785,2342,644,2386,618,2243" shape="poly">
                                  <area target="" alt="foot" title="foot" onclick="setPainArea('Foot',8)" href="javascript:;" coords="672,2506,770,2503,805,2682,774,2740,765,2846,712,2903,626,2873,632,2817,677,2703,686,2664" shape="poly">
                                  <area target="" alt="ankle" title="ankle" onclick="setPainArea('Ankle',3)" href="javascript:;" coords="986,2563,1084,2564,1081,2716,967,2717" shape="poly">
                                  <area target="" alt="calf" title="calf" onclick="setPainArea('Calf strain or tear, Shin splints',12)" href="javascript:;" coords="965,2325,1123,2334,1086,2529,992,2516" shape="poly">
                              </map>
                  </div>
                  <div id="imgback"  style="xbackground-color: #fff; padding:0%; display: none ">
                      <div classx="map" style="margin: 0px; padding: 0px;  position: fix">
                        <img src="{{asset('assets/front/images/front/pain-back.jpg')}}" style="width: 80%; height: 90vh;padding:0" />
                        <a href="#1" id="back_head"  onclick="setPainArea('Head',2)"></a><!--Head-->
                        <a href="#1" id="back_tricep"  onclick="setPainArea('Bicep / tricep muscle strains / Pulls',4)"></a><!--tricep-->
                        <a href="#1" id="back_shoulder"  onclick="setPainArea('Shoulder',1)"></a><!--shoulder-->
                        <a href="#1" id="back_ankle"  onclick="setPainArea('Ankle',3)"></a><!--Ankle-->

                        <a href="#1" id="back_Elbow"  onclick="setPainArea('Elbow: Tenis Elbow, Golfers elbow, Post Elbow fracture',5)"></a><!--Elbow-->
                        <a href="#1" id="back_Bicep"  onclick="setPainArea('Bicep / tricep muscle strains / Pulls',4)"></a><!--Bicep-->
                        <a href="#1" id="back_Wrist"  onclick="setPainArea('Wrist / Hadd',6)"></a><!--Wrist-->
                        <a href="#1" id="back_Knee"  onclick="setPainArea('Knee',7)"></a><!--Knee-->
                        <a href="#1" id="back_Foot"  onclick="setPainArea('Foot',8)"></a><!--Foot-->
                        <a href="#1" id="back_Calf"  onclick="setPainArea('Calf strain or tear, Shin splints',12)"></a><!--Calf-->
                        <a href="#1" id="back_Hip"  onclick="setPainArea('Hip',10)"></a><!--Hip-->
                        <a href="#1" id="back_Quad"  onclick="setPainArea('Quad or Hamstring / Strain',13)"></a><!--Quad-->
                      </div>
                  </div>
                  
                </div>
           </div>
            
          </div>
              
          

      </div>
      {{-- ////// --}}
      
      <div class="container hidden-xsx">
        
        <div class="qbox" style="color: #fff; margin-top: 11em; display: none">
          <a href="#" class="btn btn-info" id="show-big-img">show Image</a>
          <br>
          <br>
          <div style="background-image: url({{asset('assets/front/images/front/bg.jpg')}}); background-size: cover;background-repeat: no-repeat; padding: 2em;background-position: center;">
                    <form id="regForm" action="#/action_page.php" classx="md__contactForm">

                      <h3>  <span style="font-size: 60px; transform: rotate(0deg);" id="selectedPainAreaBox"> </span></h3>
                      <br>
                      <div class="questionArea" style="display: none;">
                        Loading...
                    </div> <!--end init hide-->
                  </form>
            </div>
        </div>
      </div><!--/.row-->
      {{-- ///// --}}



  

</div>



	<!-- Back To Top Start -->
	<div class="back-to-top clearfix">
		<a href="#"><span><i aria-hidden="true" class="fa fa-chevron-up"></i> Top</span></a>
	</div><!-- Back To Top End -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{asset('assets/front/js/jquery-3.1.1.min.js')}}">
	</script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	 <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{asset('assets/front/js/bootstrap.min.js')}}">
	</script> <!-- Include all compiled plugins (below), or include individual files as needed -->
	 <!-- Jquery Ui Date Picker -->
	<!-- Range Slide -->
	<script src="{{asset('assets/front/js/jquery-ui.js')}}">
	</script> <!-- Range Slide -->
	<!-- Jquery Ui Date Picker -->
	 <!-- Bootstrap Time Picker -->
	<script src="{{asset('assets/front/js/jquery.timepicker.js')}}">
	</script> <!-- Bootstrap Time Picker -->
	 <!-- Selectric Start -->
	<script src="{{asset('assets/front/js/jquery.selectric.js')}}"> 	</script>
 <!-- Selectric End -->
	 <!-- Mobile Menu Js Start -->
	<script src="{{asset('assets/front/js/jquery.dlmenu.js')}}">
	</script> <!-- Mobile Menu Js End -->
	 <!-- Time Table Start -->
	<script src="{{asset('assets/front/js/modernizr.js')}}">
	</script>
	<script src="{{asset('assets/front/js/main.js')}}">
	</script> <!-- Time Table End -->
	 <!-- Ofi-Script -->
	<script src="{{asset('assets/front/js/ofi.js')}}">
	</script> <!-- Ofi-Script -->
	 <!-- Extra Js -->
	<script src="{{asset('assets/front/js/jquery.ui.touch-punch.min.js')}}">
	</script> <!-- Extra Js -->
	<script src="{{asset('assets/front/js/slick.js')}}">
	</script> <!-- Slick Sider -->
    <script src="{{asset('assets/front/js/script.js')}}"></script>
    <script src="{{asset('assets/front/js/imagemap.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/maphilight/1.4.0/jquery.maphilight.min.js"></script>
	
     <script>
       $(function() {
              $('.map').maphilight({
                fill:true,
                fillColor:'0c12bf',
                fillOpacity: 0.7,
                stroke:true,
                strokeColor:'0c12bf',
                strokeOpacity: 0,
                strokeWidth: 0,
                fade:true,
                alwaysOn:false,
                neverOn:false,
                groupBy:false,
                shadow:false,
                shadowX: 0,
                shadowY: 0,
                shadowRadius: 6,
                shadowColor:'0c12bf',
                shadowOpacity: 0.1,
                shadowPosition:'outside',
                shadowFrom:true
              });
          });
          
          $(document).ready(function() {
              $('map').imageMapResize();
          });
     </script>
    

        <script>
          

         $('#show-img').click(function(){
          $('.img-sm').show()
         })
         $('#show-big-img').click(function(){
          $('.imgBoxLg').show();
          $('.qbox').hide();
         })
          // set pain area
          function setPainArea(selectedArea,id, sm = ''){ 
            $('.imgBoxLg').hide();
            $('.qbox').show();
            if(sm ==  'sm'){
              $('.img-sm').hide()
            }
            $('#selectedPainAreaBox').html('Symptoms on '+ selectedArea)
            $('.questionArea').hide()
            $('.questionArea').fadeIn(1500)
            load_init_question(id)
          }
          function load_init_question(id) { 
            $('.questionArea').html('loading...')
            $('.questionArea').load('/load_init_question/'+id);
          }
          function load_question(id='') { 
            

            if(id != ''){
              questionID = id
            }else{
              var selectedId = $("input[name='optradio']:checked").val(); 
              if (selectedId == undefined) {
                // alert('Choose your response')
                $('.qform').css({
                    'animation' : 'shake 8s',
                    'animation-iteration-count' : 'infinite',
                    'border': 'solid .05em red',
                    'padding': '1em',
                    'margin': '1em',
                }).on("mouseout", function(){
                  $(this).css({
                      'animation' : '',
                      'animation-iteration-count' : '',
                      'border': '0px',
                       'padding': '0px',
                       'margin': '.0px',
                  });
              });
                return
              } 
              questionID = selectedId
            }
            
            $('.questionArea').load('/load_question/'+questionID, function(){
              $('.questionArea').hide()
              $('.questionArea').fadeIn(1500)
            });
          }

          function btnBack() { 
            $('#imgfront').fadeOut()
            $('#btn-back').fadeOut()
            $('#btn-front').fadeIn()
            $('#imgback').fadeIn()
          }
      
          function btnFront () { 
            $('#imgback').fadeOut()
            $('#btn-back').fadeIn()
            $('#btn-front').fadeOut()
            $('#imgfront').fadeIn()
          }

          function btnBack2() { 
            $('#imgfront2').fadeOut()
            $('#btn-back2').fadeOut()
            $('#btn-front2').fadeIn()
            $('#imgback2').fadeIn()
          }
      
          function btnFront2 () { 
            $('#imgback2').fadeOut()
            $('#btn-back2').fadeIn()
            $('#btn-front2').fadeOut()
            $('#imgfront2').fadeIn()
          }


        </script>

</body>





</html>
