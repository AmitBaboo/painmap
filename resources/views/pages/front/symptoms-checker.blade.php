<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Pain Map</title><!-- Favicon -->
    <link href="images/favicon.ico" rel="icon" type="image/x-icon"><!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    {{-- <link href="{{asset('assets/wizard/step.css')}}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('assets/front/css/bootstrap.css') }}" rel="stylesheet">
    <!--=== Add By Designer ===-->
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/fonts/fonts.css') }}" rel="stylesheet"><!-- Yamm Megamenu -->
    <link href="{{ asset('assets/front/css/yamm.css') }}" rel="stylesheet"><!-- Animation -->
    <link href="{{ asset('assets/front/css/animate.css') }}" rel="stylesheet"><!-- Animation -->
    <!-- Jquery Ui Date Picker -->
    <!-- Range Slider Start -->
    <link href="{{ asset('assets/front/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/jquery-ui-slider-pips.css') }}" rel="stylesheet"><!-- Range Slider End -->
    <!-- Jquery Ui Date Picker -->
    <!-- Boostrap Time Picker -->
    <link href="{{ asset('assets/front/css/jquery.timepicker.css') }}" rel="stylesheet"><!-- Boostrap Time Picker -->
    <!-- Selectric Start -->
    {{-- <link href="{{asset('assets/front/css/selectric.css')}}" rel="stylesheet"><!-- Selectric End --> --}}
    <!-- Time Table Start -->
    <link href="{{ asset('assets/front/css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/time-table.css') }}" rel="stylesheet"><!-- Time Table End -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Multi Level Push Menu -->
    <link href="{{ asset('assets/front/css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/component.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/glass.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/front/js/modernizr.custom.js') }}"></script>
    

    <!-- Multi Level Push Menu -->
    <style type="text/css">
        html,
        body {
            height: 100%;
            margin: 0px;
            padding: 0px;
        }


        .target:hover {
            animation: shake 0.5s;
            animation-iteration-count: infinite;
        }

        @keyframes shake {
            0% {
                transform: translate(1px, 1px) rotate(0deg);
            }

            25% {
                transform: translate(-1px, -2px) rotate(-1deg);
            }

            50% {
                transform: translate(1px, -1px) rotate(1deg);
            }

            75% {
                transform: translate(3px, 1px) rotate(-1deg);
            }

            100% {
                transform: translate(1px, -2px) rotate(-1deg);
            }
        }

        .nospace {
            margin: 0;
            padding: 0;
        }

        .symptomImg {
            height: 80vh;
            background-repeat: no-repeat !important;
        }

        @media only screen and (max-width: 600px) {
            .symptomImg {
                max-width: 50vh;
                height: auto;
            }
        }

        @media only screen and (max-width: 767px) {
            .symptomImg {
                width: 50vh;
                height: auto;
            }
        }

        .mainbg {
            background: #e1f0f9
        }

        .introBox #intro1,
        #intro2 {
            position: absolute;
            top: 75%;
            left: 72.12%;
            width: 10.8%;
            height: 10%;
            border-radius: 50%;
            text-align: center;
            padding-top: .6em;
        }

        .introBox #introback {
            position: absolute;
            top: 84%;
            left: 5.12%;
            width: 10.8%;
            height: 10%;
            border-radius: 50%;
            text-align: center;
            padding-top: .6em;
        }


        area title {
            color: red
        }
    </style>
    {{-- <link href="{{asset('assets/front/fonts')}}?family=CeraPRO-Regular" rel="stylesheet" type="text/css"/> --}}
    <link href="{{ asset('assets/back/fonts.css') }}" rel='stylesheet' type='text/css'>
    <style>
        @font-face {
            font-family: CeraPro;
        }
    </style>
</head>

<body class="mainbg" style="font-family:CeraPro; height: 100vh; background-color: #e1f0f9; overflow-x: hidden">
    <!-- Header Start -->
    @include('pages.front.nav')

    <div class="container-fluid mainbg"
        style="background-color: #e1f0f9; padding: 0; xwidth:100%; xheight: 100vh; margin-top: 1em; overflow-x: hidden; ">
        <!-- Appointment Form Start  lg-->
        <div class="containerx xhidden-xs imgBoxLg" style="margin-top: 3.8em; width: 90vh; margin: 3em auto; ">

            <div class="row nospace">

                <div xstyle="height: 100vh; padding:0;">
                    <div
                        xstyle="background-color:#fff padding: 1em; xmargin-left: 4em;  postion: absolute;  height:  100%">



                        <div id="ximgfront" style="background-color: #fff; display:inline-block;">
                            <div class="simage" style="background-color: #E1F0F9; ">
                                <img id="img_ID" src="{{ asset('assets/front/images/front/pain.png') }}"
                                    usemap="#map" class="map img-responsive symptomImg" />
                            </div>




                            {{-- <map name="map1">
                               
                                <area onclick="setPainArea('Shoulder',1)" target="" alt="shoulder" title="shoulder"
                                    href="#" coords="836,874,107" shape="circle">
                                <area onclick="setPainArea('Shoulder',1)" target="" alt="shoulder" title="shoulder"
                                    href="#" coords="1200,874,107" shape="circle">
                                <area onclick="setPainArea('Elbow:',5)" target="" alt="elbow" title="elbow" href="#"
                                    coords="794,1194,88" shape="circle">
                                <area onclick="setPainArea('Elbow:',5)" target="" alt="elbow" title="elbow" href="#"
                                    coords="1250,1194,88" shape="circle">
                                <area onclick="setPainArea('Wrist / Hand',6)" target="" alt="wrist/hand"
                                    title="wrist/hand" href="#" coords="744,1525,79" shape="circle">
                                <area onclick="setPainArea('Wrist / Hand',6)" target="" alt="wrist/hand"
                                    title="wrist/hand" href="#" coords="1291,1525,79" shape="circle">

                                <area onclick="setPainArea('Elbow:',5)" target="" alt="elbow" title="elbow" href="#"
                                    coords="2200,1194,88" shape="circle">
                                <area onclick="setPainArea('Elbow:',5)" target="" alt="elbow" title="elbow" href="#"
                                    coords="1760,1194,88" shape="circle">
                                <area onclick="setPainArea('Wrist / Hand',6)" target="" alt="wrist/hand"
                                    title="wrist/hand" href="#" coords="2250,1525,79" shape="circle">
                                <area onclick="setPainArea('Wrist / Hand',6)" target="" alt="wrist/hand"
                                    title="wrist/hand" href="#" coords="1700,1525,79" shape="circle">

                                <area onclick="setPainArea('thigh',15)" target="" alt="thigh" title="Thigh" href="#"
                                    coords="917,1630,100" shape="circle">
                                <area onclick="setPainArea('thigh',15)" target="" alt="thigh" title="Thigh" href="#"
                                    coords="1140,1630,100" shape="circle">


                                <area onclick="setPainArea('shin',16)" target="" alt="shin" title="shin" href="#"
                                    coords="916,2081,87" shape="circle">
                                <area onclick="setPainArea('shin',16)" target="" alt="shin" title="shin" href="#"
                                    coords="1150,2081,87" shape="circle">


                                <area onclick="setPainArea('Foot/Ankle',8)" target="" alt="foot" title="Foot/Ankle"
                                    href="#" coords="835,2277,124" shape="circle">
                                <area onclick="setPainArea('Foot/Ankle',8)" target="" alt="foot" title="Foot/Ankle"
                                    href="#" coords="1200,2277,124" shape="circle">


                                <area onclick="setPainArea('Knee',7)" target="" alt="knee" title="knee" href="#"
                                    coords="1122,1813,99" shape="circle">
                                <area onclick="setPainArea('Knee',7)" target="" alt="knee" title="knee" href="#"
                                    coords="900,1813,99" shape="circle">
                                <area onclick="setPainArea('Knee',7)" target="" alt="knee" title="knee" href="#"
                                    coords="1882,1813,99" shape="circle">
                                <area onclick="setPainArea('Knee',7)" target="" alt="knee" title="knee" href="#"
                                    coords="2092,1813,99" shape="circle">

                                <area onclick="setPainArea('Hip',10)" target="" alt="hip" title="hip" href="#"
                                    coords="1094,1400,118" shape="circle">
                                <area onclick="setPainArea('Hip',10)" target="" alt="hip" title="hip" href="#"
                                    coords="950,1400,118" shape="circle">

                                <area onclick="setPainArea('Hip',10)" target="" alt="hamstring" title="hip" href="#"
                                    coords="1856,1413,97" shape="circle">

                                <area onclick="setPainArea('Hip',10)" target="" alt="hamstring" title="hip" href="#"
                                    coords="2116,1413,97" shape="circle">


                                <area onclick="setPainArea('forearm',17)" target="" alt="forearm" title="forearm"
                                    href="#" coords="1291,1397,73" shape="circle">
                                <area onclick="setPainArea('forearm',17)" target="" alt="forearm" title="forearm"
                                    href="#" coords="760,1397,73" shape="circle">

                                <area onclick="setPainArea('forearm',17)" target="" alt="forearm" title="forearm"
                                    href="#" coords="2220,1337,90" shape="circle">
                                <area onclick="setPainArea('forearm',17)" target="" alt="forearm" title="forearm"
                                    href="#" coords="1710,1337,90" shape="circle">

                                <area onclick="setPainArea('Upper Arm',4)" target="" alt="bicep" title="Upper Arm"
                                    href="#" coords="1237,1024,94" shape="circle">
                                <area onclick="setPainArea('Upper Arm',4)" target="" alt="bicep" title="Upper Arm"
                                    href="#" coords="807,1024,94" shape="circle">
                                <area onclick="setPainArea('Upper Arm',4)" target="" alt="bicep" title="Upper Arm"
                                    href="#" coords="2200,1024,94" shape="circle">
                                <area onclick="setPainArea('Upper Arm',4)" target="" alt="bicep" title="Upper Arm"
                                    href="#" coords="1760,1024,94" shape="circle">

                                <area onclick="setPainArea('cervical spine',18)" target="" alt="cervical spine"
                                    title="Neck" href="#" coords="1981,679,128" shape="circle">
                                <area onclick="setPainArea('Shoulder',1)" target="" alt="shoulder" title="shoulder"
                                    href="#" coords="1777,865,107" shape="circle">
                                <area onclick="setPainArea('Shoulder',1)" target="" alt="shoulder" title="shoulder"
                                    href="#" coords="2150,865,107" shape="circle">
                                <area onclick="setPainArea('Thoracic',11)" target="" alt="thoracic spine"
                                    title="Middle Back" href="#" coords="1997,970,160" shape="circle">
                                <area onclick="setPainArea('lumba spine',19)" target="" alt="lumba spine"
                                    title="Lower back and buttock" href="#" coords="1985,1316,180" shape="circle">
                                <area onclick="setPainArea('Quad or Hamstring / Strain',13)" target="" alt="hamstring"
                                    title="Back of thigh" href="#" coords="1856,1613,107" shape="circle">
                                <area onclick="setPainArea('Quad or Hamstring / Strain',13)" target="" alt="hamstring"
                                    title="Back of thigh" href="#" coords="2100,1613,107" shape="circle">
                                <area onclick="setPainArea('Calf strain or tear, Shin splints',12)" target="" alt="calf"
                                    title="Calf" href="#" coords="1845,2073,119" shape="circle">
                                <area onclick="setPainArea('Calf strain or tear, Shin splints',12)" target="" alt="calf"
                                    title="Calf" href="#" coords="2100,2073,119" shape="circle">
                                <area onclick="setPainArea('heel',8)" target="" alt="heel" title="Foot/Ankle" href="#"
                                    coords="2104,2319,107" shape="circle">
                                <area onclick="setPainArea('heel',8)" target="" alt="heel" title="Foot/Ankle" href="#"
                                    coords="1804,2319,107" shape="circle">
                            </map> --}}
                            {{-- <img src="Front&amp;Back No Logo NEW.jpg" usemap="#image-map"> --}}

                            <map name="map">
                                <area target="" onclick="setPainArea('Shoulder',1)" alt=" shoulder"
                                    title="Shoulder" href="#" coords="329,878,130" shape="circle">
                                <area target="" onclick="setPainArea('Shoulder',1)" alt=" shoulder"
                                    title="Shoulder" href="#" coords="894,811,124" shape="circle">
                                <area target="" onclick="setPainArea('Upper Arm',4)" alt="left upper arm"
                                    title="Upper arm" href="#" coords="248,1121,110" shape="circle">
                                <area target="" onclick="setPainArea('Upper Arm',4)" alt="right upper arm"
                                    title="Upper arm" href="#" coords="977,1053,123" shape="circle">
                                <area target="" onclick="setPainArea('Elbow:',5)" alt="left elbow" title="Elbow"
                                    href="#" coords="213,1374,130" shape="circle">
                                <area target="" onclick="setPainArea('Elbow:',5)" alt="right elbow"
                                    title="Elbow" href="#" coords="1018,1337,145" shape="circle">
                                <area target="" onclick="setPainArea('forearm',17)" alt="forearm "
                                    title="Forearm " href="#" coords="138,1667,103" shape="circle">
                                <area target="" onclick="setPainArea('forearm',17)" alt="right forearm"
                                    title="Forearm" href="#" coords="1092,1628,91" shape="circle">
                                <area target="" onclick="setPainArea('Wrist / Hand',6)" alt="left Wrist/Hand"
                                    title=" Wrist/Hand" href="#" coords="81,1897,104" shape="circle">
                                <area target="" onclick="setPainArea('Wrist / Hand',6)" alt="right wrist/hand"
                                    title=" Wrist/Hand" href="#" coords="1160,1903,109" shape="circle">
                                <area target="" onclick="setPainArea('Hip',10)" alt="left hip" title=" Hip"
                                    href="#" coords="467,1856,178" shape="circle">
                                <area target="" onclick="setPainArea('Hip',10)" alt="right hip" title=" Hip"
                                    href="#" coords="826,1852,170" shape="circle">
                                <area target="" onclick="setPainArea('thigh',15)" alt="left thigh"
                                    title=" Thigh" href="#" coords="448,2203,154" shape="circle">
                                <area target="" onclick="setPainArea('thigh',15)" alt="right thigh"
                                    title=" Thigh" href="#" coords="797,2204,151" shape="circle">
                                <area target="" onclick="setPainArea('Knee',7)" alt="left knee" title=" Knee"
                                    href="#" coords="448,2501,117" shape="circle">
                                <area target="" onclick="setPainArea('Knee',7)" alt="right knee" title=" Knee"
                                    href="#" coords="789,2507,116" shape="circle">
                                <area target="" onclick="setPainArea('shin',16)" alt="left shin" title=" Shin"
                                    href="#" coords="475,2894,158" shape="circle">
                                <area target="" onclick="setPainArea('shin',16)" alt="right shin"
                                    title=" Shin" href="#" coords="800,2891,152" shape="circle">
                                <area target="" onclick="setPainArea('Foot/Ankle',8)" alt="left foot/ankle"
                                    title=" Foot/Ankle" href="#" coords="477,3251,159" shape="circle">
                                <area target="" onclick="setPainArea('Foot/Ankle',8)" alt="right foot/ankle"
                                    title=" Foot/Ankle" href="#" coords="791,3260,145" shape="circle">
                                <area target="" onclick="setPainArea('cervical spine',18)" alt="neck"
                                    title="Neck" href="#" coords="2371,661,129" shape="circle">
                                <area target="" onclick="setPainArea('Thoracic',11)" alt="middle back"
                                    title="Middle back" href="#" coords="2383,1036,206" shape="circle">
                                <area target="" onclick="setPainArea('lumba spine',19)" alt="lower back"
                                    title="Lower back" href="#" coords="2387,1579,234" shape="circle">
                                <area target="" onclick="setPainArea('Shoulder',1)" alt="back left shoulder"
                                    title=" Shoulder" href="#" coords="2071,850,121" shape="circle">
                                <area target="" onclick="setPainArea('Shoulder',1)" alt="back right sholder"
                                    title=" Sholder" href="#" coords="2678,834,136" shape="circle">
                                <area target="" onclick="setPainArea('Upper Arm',4)" alt="back left upper arm"
                                    title="Upper Arm" href="#" coords="2021,1100,113" shape="circle">
                                <area target="" onclick="setPainArea('Upper Arm',4)" alt="back right upper arm"
                                    title="Upper Arm" href="#" coords="2746,1105,119" shape="circle">
                                <area target="" onclick="setPainArea('Elbow:',5)" alt="back left elbow"
                                    title=" Elbow" href="#" coords="1984,1358,127" shape="circle">
                                <area target="" onclick="setPainArea('Elbow:',5)" alt="back right elbow"
                                    title=" Elbow" href="#" coords="2807,1377,150" shape="circle">
                                <area target="" onclick="setPainArea('forearm',17)" alt="back left forearm "
                                    title=" Forearm " href="#" coords="1928,1619,98" shape="circle">
                                <area target="" onclick="setPainArea('forearm',17)" alt="back right forearm "
                                    title=" Forearm " href="#" coords="2869,1650,102" shape="circle">
                                <area target="" onclick="setPainArea('Wrist / Hand',6)"
                                    alt="back left Wrist/Hand" title=" Wrist/Hand" href="#"
                                    coords="1832,1896,135" shape="circle">
                                <area target="" onclick="setPainArea('Wrist / Hand',6)"
                                    alt="back right Wrist/Hand" title=" Wrist/Hand" href="#"
                                    coords="2911,1895,129" shape="circle">
                                <area target="" onclick="setPainArea('Hip',10)" alt="back left hip"
                                    title=" Hip" href="#" coords="2217,1951,160" shape="circle">
                                <area target="" onclick="setPainArea('Hip',10)" alt="back right hip"
                                    title=" Hip" href="#" coords="2572,1954,156" shape="circle">
                                <area target="" onclick="setPainArea('back of thigh',13)" alt="back left thigh"
                                    title="Back of Thigh" href="#" coords="2219,2281,143" shape="circle">
                                <area target="" onclick="setPainArea('back of thigh',13)" alt="back right thigh"
                                    title="Back of Thigh" href="#" coords="2561,2286,140" shape="circle">
                                <area target="" onclick="setPainArea('Knee',7)" alt="back left knee"
                                    title=" Knee" href="#" coords="2225,2562,115" shape="circle">
                                <area target="" onclick="setPainArea('Knee',7)" alt="back right knee"
                                    title=" Knee" href="#" coords="2564,2576,112" shape="circle">
                                <area target="" onclick="setPainArea('shin',12)" alt="Calf" title=" Calf"
                                    href="#" coords="2237,2922,162" shape="circle">
                                <area target="" onclick="setPainArea('shin',12)" alt="Calf" title=" Calf"
                                    href="#" coords="2571,2931,153" shape="circle">
                                <area target="" onclick="setPainArea('Foot/Ankle',8)" alt="back left foot/ankle"
                                    title=" Foot/Ankle" href="#" coords="2262,3281,137" shape="circle">
                                <area target="" onclick="setPainArea('Foot/Ankle',8)"
                                    alt="back right foot/ankle" title=" Foot/Ankle" href="#"
                                    coords="2550,3286,132" shape="circle">
                            </map>
                        </div>
                    </div>
                </div>

            </div>



        </div>







        {{-- Questions box --}}

        <div class="container">
            <div style="z-index: 100; xposition: relative;z-index: 1000 " class="hidden-sm hidden-md hidden-xs">
                <div style="position: absolute; left:-8%; top: 10%; color: white">
                    <a href="" style="color: white">
                        <i class="fa fa-refresh fa-3x"> </i> <br> Reload Image
                    </a>
                </div>
            </div>

            <form id="regForm" action="#/action_page.php" classx="md__contactForm">
                <div class="questionArea" style="display: none;">
                    Loading...
                </div>
                <!--end init hide-->
            </form>
        </div>



</body>





</div>






<!-- Back To Top Start -->
<div class="clearfix back-to-top">
    <a href="#"><span><i aria-hidden="true" class="fa fa-chevron-up"></i> Top</span></a>
</div><!-- Back To Top End -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('assets/front/js/jquery-3.1.1.min.js') }}"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Jquery Ui Date Picker -->
<!-- Range Slide -->
<script src="{{ asset('assets/front/js/jquery-ui.js') }}"></script>
<!-- Range Slide -->
<!-- Jquery Ui Date Picker -->
<!-- Bootstrap Time Picker -->
<script src="{{ asset('assets/front/js/jquery.timepicker.js') }}"></script>
<!-- Bootstrap Time Picker -->
<!-- Selectric Start -->
<script src="{{ asset('assets/front/js/jquery.selectric.js') }}"></script>
<!-- Selectric End -->
<!-- Mobile Menu Js Start -->
<script src="{{ asset('assets/front/js/jquery.dlmenu.js') }}"></script>
<!-- Mobile Menu Js End -->
<!-- Time Table Start -->
<script src="{{ asset('assets/front/js/modernizr.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
<!-- Time Table End -->
<!-- Ofi-Script -->
<script src="{{ asset('assets/front/js/ofi.js') }}"></script>
<!-- Ofi-Script -->
<!-- Extra Js -->
<script src="{{ asset('assets/front/js/jquery.ui.touch-punch.min.js') }}"></script>
<!-- Extra Js -->
<script src="{{ asset('assets/front/js/slick.js') }}"></script>
<!-- Slick Sider -->
<script src="{{ asset('assets/front/js/script.js') }}"></script>
<script src="{{ asset('assets/front/js/imagemap.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/maphilight/1.4.0/jquery.maphilight.min.js">
</script>
<script src="{{ asset('assets') }}/gsap/minified/gsap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(function() {
        $('.map').maphilight({
            fill: true,
            fillColor: '0c12bf',
            fillOpacity: 0.7,
            stroke: true,
            strokeColor: '0c12bf',
            strokeOpacity: 0,
            strokeWidth: 0,
            fade: true,
            alwaysOn: false,
            neverOn: false,
            groupBy: false,
            shadow: false,
            shadowX: 0,
            shadowY: 0,
            shadowRadius: 6,
            shadowColor: '0c12bf',
            shadowOpacity: 0.1,
            shadowPosition: 'outside',
            shadowFrom: true
        });
    });

    $(document).ready(function() {
        $('map').imageMapResize();
    });
</script>


<script>
    $('#show-img').click(function() {
        $('.img-sm').show()
    })
    $('#show-big-img').click(function() {
        $('.imgBoxLg').show();
        $('.qbox').hide();
    })
    // set pain area
    function setPainArea(selectedArea, id, sm = '') {
        $('.imgBoxLg').hide();
        $('.qbox').show();
        if (sm == 'sm') {
            $('.img-sm').hide()
        }
        $('#selectedPainAreaBox').html('Symptoms on ' + selectedArea)
        $('.questionArea').hide()
        $('.questionArea').fadeIn(1500)
        load_init_question(id)
    }

    function load_init_question(id) {
        $('.questionArea').html(`<div style=" margin-top: 10em; margin-left: 5em"> Creating your Pain Map...</div>`)
        $('.questionArea').load('/load_init_question/' + id);
    }

    function load_question(id = '') {
        //$("#questionArea").html('');

        if (id != '') {
            questionID = id
        } else {
            var selectedId = $("input[name='optradio']:checked").val();
            if (selectedId == undefined) {
                // Swal.fire({
                //   icon: 'error',
                //   title: 'Oops...',
                //   text: 'Please choose a corresponding answer to the question',
                //   footer: 'a selection is required before proceeding'
                // })
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                    title: 'Please choose a corresponding answer to the question',
                    showConfirmButton: false,
                    timer: 3000
                })
                return
            }
            questionID = selectedId
        }
        $('.questionArea').html(`<div style=" margin-top: 10em; margin-left: 5em"> Creating your Pain Map...</div>`)

        $('.questionArea').load('/load_question/' + questionID, function(val) {
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

    function btnFront() {
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

    function btnFront2() {
        $('#imgback2').fadeOut()
        $('#btn-back2').fadeIn()
        $('#btn-front2').fadeOut()
        $('#imgfront2').fadeIn()
    }
</script> 
</html>
