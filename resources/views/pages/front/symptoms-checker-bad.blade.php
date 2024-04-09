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
      <div class="container hidden-xs imgBoxLg" style="margin-top: 11em">
          
          <div class="row nospace">
              
           <div  style="height: 100vh; padding:0">
                <div style="background-color:#fff padding: 1em; margin-left: 4em;  postion: absolute;  height:  100%">

                  <div style="float: left; position: absolute;top:50px; margin-left: 1em; z-index: 999; margin-top: 11em">
                    <button onclick="btnBack()" id="btn-back" class="badge badge-info" style="background-color: #fff; opacity: 0.7;color: rgb(35, 137, 168);height:7em;width:7em; border-radius: 50%">
                      Back <i class="fa fa-rotate-left fa-2x"></i>
                    </button>
                    <button onclick="btnFront()" id="btn-front" class="badge badge-info" style="display: none; background-color: #fff; opacity: 0.7; color: rgb(35, 137, 168);height:7em;width:7em; border-radius: 50%">
                      Front <i class="fa fa-rotate-left fa-2x"></i>
                    </button>
                  </div>
                  <div style="float: left; position: absolute;top:6%; right: 20%; z-index: 999; margin-top: 11em">
                    <div class="badge badge-info" style="background-color: rgb(102, 204, 102); font-size: 30px">
                      <i class="fa fa-hand-point-left"></i> Click where it hurts the most
                    </div>
                  </div>
                  <div style="float: left; position: absolute;top:12%; right: 20%; z-index: 999; margin-top: 11em">
                      <div style="width: 20em; color:#777;font-size: 15px">
                        Answer a series of specific questions to quickly find out what’s causing your pain and what you can do to reduce it
                      </div> 
                  </div>
      
                  <div id="imgfront" style="background-color: #fff;  padding:0% ">
                        <div class="map" style="margin: 0px; padding: 0px;  position: fix">
                          <img src="{{asset('assets/front/images/front/pain-front.jpg')}}" style="width: 80%; height: 90vh;padding:0" />
                          <a href="#1" id="head"  onclick="setPainArea('Head',2)">head</a><!--Head-->
                          <a href="#1" id="tricep"  onclick="setPainArea('Bicep / tricep muscle strains / Pulls',4)">tricep</a><!--tricep-->
                          <a href="#1" id="shoulder"  onclick="setPainArea('Shoulder',1)">shoulder</a><!--shoulder-->
                          <a href="#1" id="ankle"  onclick="setPainArea('Ankle',3)">ankle</a><!--Ankle-->

                          <a href="#1" id="Elbow"  onclick="setPainArea('Elbow: Tenis Elbow, Golfers elbow, Post Elbow fracture',5)">elbow</a><!--Elbow-->
                          <a href="#1" id="Bicep"  onclick="setPainArea('Bicep / tricep muscle strains / Pulls',4)">bicep</a><!--Bicep-->
                          <a href="#1" id="Wrist"  onclick="setPainArea('Wrist / Hand',6)">wrist</a><!--Wrist-->
                          <a href="#1" id="Knee"  onclick="setPainArea('Knee',7)">knee</a><!--Knee-->
                          <a href="#1" id="Foot"  onclick="setPainArea('Foot',8)">foot</a><!--Foot-->
                          <a href="#1" id="Calf"  onclick="setPainArea('Calf strain or tear, Shin splints',12)">calf</a><!--Calf-->
                          <a href="#1" id="Hip"  onclick="setPainArea('Hip',10)">hip</a><!--Hip-->
                          <a href="#1" id="Thoracic"  onclick="setPainArea('Thoracic',11)" title="Thoracic: Facet, Rib Pain, Muscular, Lumber, Disc,Sciatica/ Nueral Pain/ Numbness">Thoracic / Lumber</a><!--Thoracic-->
                          <a href="#1" id="Quad"  onclick="setPainArea('Quad or Hamstring / Strain',13)">quad</a><!--Quad-->
                          <a href="#1" id="Neck"  onclick="setPainArea('Neck',13)">Neck</a><!--Neck-->
                        </div>
                  </div>
                  <div id="imgback"  style="xbackground-color: #fff; padding:0%; display: none ">
                      <div class="map" style="margin: 0px; padding: 0px;  position: fix">
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
      
      <div class="container hidden-xs">
        
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



    {{-- visible to xl --}}
    <div class="row visible-xs visible-sm">
          
      <div class="col-md-5 nospace  img-sm">
          
       <div  style="height: 100vh; padding:0">
            <div style="background-color:#fff padding: 1em;  postion: absolute;  height:  100%">
              
              <div style="float: left; position: absolute;top:50px; margin-left: 1em; z-index: 999">
                <button onclick="btnBack2()" id="btn-back2" class="badge badge-info" style="background-color: #fff; opacity: 0.7;color: rgb(35, 137, 168);height:7em;width:7em; border-radius: 50%">
                  Back <i class="fa fa-rotate-left fa-2x"></i>
                </button>
                <button onclick="btnFront2()" id="btn-front2" class="badge badge-info" style="display: none; background-color: #fff; opacity: 0.7; color: rgb(35, 137, 168);height:7em;width:7em; border-radius: 50%">
                  Front <i class="fa fa-rotate-left fa-2x"></i>
                </button>
              </div>
  
              <div id="imgfront2" style="background-color: #fff;  padding:0% ">
                    <div class="map" style="margin: 0px; padding: 0px;  position: fix">
                      <img src="{{asset('assets/front/images/front/pain-front.jpg')}}" style="width: 80%; height: 80vh;padding:0" />
                      <a href="#1" id="head"  onclick="setPainArea('Head',2,'sm')">head</a><!--Head-->
                      <a href="#1" id="tricep"  onclick="setPainArea('Bicep / tricep muscle strains / Pulls',4,'sm')">tricep</a><!--tricep-->
                      <a href="#1" id="shoulder"  onclick="setPainArea('Shoulder',1,'sm')">shoulder</a><!--shoulder-->
                      <a href="#1" id="ankle"  onclick="setPainArea('Ankle',3,'sm')">ankle</a><!--Ankle-->

                      <a href="#1" id="Elbow"  onclick="setPainArea('Elbow: Tenis Elbow, Golfers elbow, Post Elbow fracture',5,'sm')">elbow</a><!--Elbow-->
                      <a href="#1" id="Bicep"  onclick="setPainArea('Bicep / tricep muscle strains / Pulls',4,'sm')">bicep</a><!--Bicep-->
                      <a href="#1" id="Wrist"  onclick="setPainArea('Wrist / Hand',6,'sm')">wrist</a><!--Wrist-->
                      <a href="#1" id="Knee"  onclick="setPainArea('Knee',7,'sm')">knee</a><!--Knee-->
                      <a href="#1" id="Foot"  onclick="setPainArea('Foot',8,'sm')">foot</a><!--Foot-->
                      <a href="#1" id="Calf"  onclick="setPainArea('Calf strain or tear, Shin splints',12,'sm')">calf</a><!--Calf-->
                      <a href="#1" id="Hip"  onclick="setPainArea('Hip',10,'sm')">hip</a><!--Hip-->
                      <a href="#1" id="Thoracic"  onclick="setPainArea('Thoracic',11,'sm')" title="Thoracic: Facet, Rib Pain, Muscular, Lumber, Disc,Sciatica/ Nueral Pain/ Numbness">Thoracic / Lumber</a><!--Thoracic-->
                      <a href="#1" id="Quad"  onclick="setPainArea('Quad or Hamstring / Strain',13,'sm')">quad</a><!--Quad-->
                      <a href="#1" id="Neck"  onclick="setPainArea('Neck',13,'sm')">Neck</a><!--Neck-->
                    </div>
              </div>
              <div id="imgback2"  style="xbackground-color: #fff; padding:0%; display: none ">
                  <div class="map" style="margin: 0px; padding: 0px;  position: fix">
                    <img src="{{asset('assets/front/images/front/pain-back.jpg')}}" style="width: 80%; height: 80vh;padding:0" />
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
          
      

    <div class="col-md-7 nospace">
      <div style="height: 100vh; padding:1em">
        <div class="bg-imagex"></div>
          <div class="bg-textx" style="padding: 1em; ">
              <div style="position: absolute; height: 100vh; width:100%; overflow: scroll">
                <a href="#" class="btn btn-info" id="show-img">show Image</a>
                  <form id="regForm2" action="#/action_page.php" classx="md__contactForm">

                    <h3>  <span style="font-size: 60px; transform: rotate(0deg);" id="selectedPainAreaBox"> Click where it hurts the most</span></h3>
                    <br>
                    <div class="questionArea" style="display: none;">
                      Loading...
                  </div> <!--end init hide-->
                </form>
              </div>
          </div>
      </div>
    </div><!--/.row-->

  </div>

</div>

 @include('pages.front.footer') 
	
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
