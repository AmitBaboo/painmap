<style>
  .container {
    position: relative;
    text-align: left;
    color: #teal;
   
  } 

  .centered {
    width: 54%;
    position: absolute;
    top: 50%;
    left: 40%;
    transform: translate(-50%, -50%);
    color: #37a8ec;
  }

  .img-bg #nextbtn {
    position: absolute;
    top: 84%;
    left: 84.12%;
    width: 10.8%;
    height: 10%;
    border-radius: 50%;
    text-align: center;
    padding-top: .6em;
  }

  .img-bg #prevbtn {
    position: absolute;
    top: 84%;
    left: 5.12%;
    width: 10.8%;
    height: 10%;
    border-radius: 50%;
    text-align: center;
    padding-top: .6em;
  }

  .form-control {
    background-color: #ebebeb;
  }
  h1,h2,h3,h4,h5{ color: #37a8ec }

  * {
 font-family: CeraPro;
}

video {
  /* override other styles to make responsive */
  width: 100%    !important;
  height: auto   !important;
}
</style>


{{-- large screen --}}
<div class="container img-bg hidden-sm hidden-xs" id="qaBottons" xstyle="width:80vh">
  <img src="{{asset('assets/front/images/front/bg.png')}}" alt="Snow" class="img-responsive" style="width:100%; ">
  {{-- image map --}}
  <a href="#1" id="nextbtn" onclick="load_question();"></a>
  <a href="#1" id="prevbtn" onclick="load_question({{ $prev_id }})"></a>

  <div class="centered" style="width: 54%; height: 49%; overflow-y: scroll">

 
  @if(isset($notfound) && $notfound == 0)
    <h2>Ooops! Questions not Set</h2>
    <?php exit; ?>
  @endif


    @if($question[0]->answer != '0')
    <div class="form-check">
      <div class="alert" style="background-color: #fff; margin-top: -2em">
        <h2 style="line-height: 1.5em; font-weight: bolder; margin-left:0;font-size: 20px; padding-left: 0">{{ $question[0]->question }} </h2>
        @if($question[0]->video_path != '')
        <iframe width="600" height="150" allowfullscreen="allowfullscreen" src="{{ $question[0]->video_path }}" style="margin-bottom: -2em">
        </iframe>
        @endif
      </div>
    </div>
    @endif
    @foreach ($question as $item)
    @if($item->answer != '0')
    <div class="form-check qqbox" style="border-bottom: solid #ebebeb 1px; padding: .5em; padding-left: 1em">
      <?php
      session(['prev_id' => $question[0]->question_id]);
      ?>
      <div class="row">
        <div class="col-md-1">
          <label class="form-check-label" style="font-size: 13px;">
            <input style="width: 1em; height: 1em" type="radio" class="form-check-input" name="optradio" value="{{ $item->next_question_id }}">
          </label>
        </div>
        <div class="col-md-11" style="padding-left: 0; margin-left:0">
          <label class="form-check-label" style="font-size: 13px;">
            {{$item->answer}}
          </label>
        </div>
      </div>
    </div>
    {{-- <hr> --}}
    @endif
    @endforeach
  </div>
</div>
{{-- end large screen --}}



{{-- small screen --}}
<div class="container img-bg hidden-md hidden-lg smbtns" id="qaBottons_sm" style="background: #fff">
  <div class="centeredx" style="width: 100%;">
  
  @if(isset($notfound) && $notfound == 0)
    <h2>Ooops! Questions not Set</h2>
    <?php exit; ?>
  @endif

    @if($question[0]->answer != '0')
    <div class="form-check">
      <div class="alert" style=" margin-top: -2em">
        <h2 style="line-height: 1.5em; font-weight: bolder; margin-left:0;font-size: 20px; padding-left: 0">{{ $question[0]->question }} </h2>
        @if($question[0]->video_path != '')
        {{-- <iframe width="600" height="150" allowfullscreen="allowfullscreen" src="{{ $question[0]->video_path }}" style="margin-bottom: -2em"> --}}
          <iframe  allowfullscreen="allowfullscreen" src="{{ $question[0]->video_path }}" style="width:100% !important; height: 20em !important; margin-bottom: -2em">
        </iframe>
        @endif
      </div>
    </div>
    @endif
    @foreach ($question as $item)
    @if($item->answer != '0')
    <div class="form-check qqbox" style="border-bottom: solid #ebebeb 1px; padding: .5em; padding-left: 1em">
      <?php
      session(['prev_id' => $question[0]->question_id]);
      ?>
      <div class="row">
        <div class="col-xs-1">
          <label class="form-check-label" style="font-size: 13px;">
            <input style="width: 1em; height: 1em" type="radio" class="form-check-input" name="optradio" value="{{ $item->next_question_id }}">
          </label>
        </div>
        <div class="col-xs-10" style="padding-left: 0; margin-left:0">
          <label class="form-check-label" style="font-size: 13px;">
            {{$item->answer}}
          </label>
        </div>
      </div>
    </div>
    @endif
    @endforeach
    <br>
    <div class="smbtns">
      <span>
        <a href="#1"  class="btn btn-info-sm" id="prevbtnsm" onclick="load_question({{ $prev_id }})"> <i class="fa fa-chevron-circle-left"></i> Prev</a>
      </span>
      <span style="padding-right: 1rem ">
        <a href="#1" class="btn btn-info-sm" id="nextbtnsm" onclick="load_question();"> <i class="fa fa-chevron-circle-right"></i> Next</a>
      </span>
    </div>
    
  </div>
</div>
{{-- end small screen  --}}

{{-- <div style="z-index: 100; xposition: relative; ">
  <div style="position: absolute; left:-15%; top: 10%">
    <a href="">
      <i class="fa fa-refresh fa-3x"></i>
    </a>
  </div>
</div> --}}


{{-- Finale Page --}}

@foreach ($question as $item)
@if($item->answer == '0')
{{-- <div style="background-image: url({{asset('assets/front/images/front/bg2.png')}}); background-size: cover;background-repeat: no-repeat; padding: 2em;background-position: center; color: #fff"> --}}
<div class="container" style="background-color: #ebebeb;  xmax-width: 80%; padding: 2em; color: #333; margin: 0 auto">

  <div id="formBox" style="padding: 1em; margin-bottom: .5em; background-color:  #fff;">
    <h3 class=""> <i class="fas fa-map-marker-alt" style="color: green"></i> Nearly there</h3>
    @if($item->redflag == '1')
      {{-- red flag videos --}}
      
        <div id="videoBox" style="background-color:  #fff; padding: 1em; padding-top: 1em; margin-top: .5em">
          <h2 style="line-height: 1.5em; font-weight: bolder; margin-left:0;font-size: 20px; padding-left: 0">{{ $item->question }} </h2>
          <div class="emergency-image embed-responsive embed-responsive-16by9">
            @if($item->video_path != '')
            <iframe style="width:100% !important;" src="{{ $item->video_path }}" class="embed-responsive-item">
            </iframe>
            @endif
          </div>
        </div>

        <div id="videoText" style="background-color:  #fff; padding: 1em; padding-top: 1em; margin-top: .5em">
          <h4 class=""> <i class="fas fa-map-marker-alt " style="color: green"></i> Diagnosis, Advice</h4>
          <div style="width: 100%;word-wrap: break-word;overflow-wrap: break-word;">
              {!! $item->video_desc !!}
          </div>
        </div>
    @else
    
      <hr>
      <h4 class="text-blue">So that we can send you our recommendations, and give you the best advice, we need a few more bits of information:</h4>
      <br>
      <div id="frmCustomerBtndiv">
        <form id="frmCustomer" method="POST">
          @csrf
          <input type="text" class="form-control" name="full_name" placeholder="Full Name – We like to know who we’ve helped fix their pain" required>
          <span id="fullnamediv"></span>
          <input type="text" class="form-control" name="post_code" placeholder="Postcode – This is so that we can recommend an expert close to you that can help you" required>
          <input type="hidden" name="result" value="{{ $item->id }}">
          <span id="postcodediv"></span>
          <input type="text" class="form-control" name="email" placeholder="Email – So we can send you all our recommendations and you can access our advice anywhere and anytime">
          <span id="emaildiv"></span>
          <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Phone number – This is so that your local recommended expert can get in touch with you…but only if you say that’s ok">
          <span id="contact_numberdiv"></span>
  
  
          <h4>Are you happy for our recommended expert to contact you by email or phone</h4>
          <input type="checkbox" name="canEmail" value="1"> Email
          <input type="checkbox" name="canCall" value="1"> Phone
          <br>
          <br>
          <button type="submit" id="frmCustomerBtn" name="frmCustomerBtn" class="btn btn-success">Submit</button>
        </form>
      </div>
    @endif
  </div>

  {{-- final question --}}
  <div id="finalQuestion" style="background-color:  #fff; padding: 1em;display: none; paddin-bottom: 0;margin-top: 1em">
    <h3> <i class="fas fa-map-marker-alt" style="color: green"></i> {{ $question[0]->question }} </h3>
  </div>


  {{-- videos --}}
  <div id="videoBox" style="background-color:  #fff; padding: 1em;  display:none; padding-top: 1em; margin-top: .5em">
    <h4 class="">Watch the video to see what we think the problem is and what we'd recommend... or it's all written down below if you love a good read </h4>
    @if($item->video_path != '')
    <div class="emergency-image embed-responsive embed-responsive-16by9">
      <iframe style="width:100%;" src="{{ $item->video_path }}" class="embed-responsive-item">
      </iframe>
    </div>
     @endif
  </div>

  <div id="videoText" style="background-color:  #fff; padding: 1em;  display:none; padding-top: 1em; margin-top: .5em">
    <h4 class=""> <i class="fas fa-map-marker-alt " style="color: green"></i> Diagnosis, Advice, Exercises</h4>
    @if($item->video_desc != '') 
    <pre style="line-height:1.2em;font-family:CeraPro;background: white; border:  none
    ">{!! $item->video_desc !!}</pre>
    @else
    {{-- None for this selection --}}
    @endif 
  </div>

  {{-- products  AB10 6RN--}}
  <div id="productBox" style="background-color:  #fff; padding: 1em;  display:none; margin-top: .5em">
    <h4 class=""> <i class="fas fa-map-marker-alt " style="color: green"></i>  Here are the products we’d recommend for your problem. Watch the video to find out the best way to use them to relieve your pain</h4>
    <br>
    <div class="shop-products-list clearfix">
      <div class="row">
        @foreach ($products as $item)
        <div class="col-md-4">
          <div class="product-block">
            <a href="{{ trim($item->file_caption) }}" target="_blank">
              <div class="image">
                <img alt="IMAGE" class="img-responsive" src="{{ url('/').$item->file_path }}" style="width: 12em; height: 12em; overflow: hidden">
              </div>
              <style>
                .product-detail:hover{
                  overflow-y: scroll;
                }
              </style>
              <div class="product-detail" style="padding: 1em;max-height: 20em;overflow: hidden">
                <h6>{{ $item->title }}</h6>
                <p style="font-family:CeraPro">{!! $item->body !!}</p>
              </div>
              
            </a> <!-- Add Read More Icons Start -->
            <div style="padding: 1em">
              <span>{{ $item->sub_title }}...</span>
              <a href="{{ trim($item->file_caption) }}" target="_blank">Buy Now</a>
            </div>
          </div>
          <!--/.product-block-->
        </div>
        @endforeach
      </div>
    </div>
  </div>

  {{-- therapist --}}
  <div id="therapistBox" style="background-color:  #fff; padding: 1em; margin-bottom: .5em; display:none; margin-top: .5em">
    <h4 class=""><i class="fas fa-map-marker-alt " style="color: green"></i> Recommended Therapist</h4>
    

    <div id="therapist" class="xrow">
      <br>
    <p>Here is the Therapist we recommend seeing in your area</p>
    <br>
      <div class="row" style="text-align: center">
        <div class="col-md-2" style="padding: 0;
        padding-left: 6rem;
        padding-top: 0;
        margin-top: -3rem;">
          <div id="prifilePicture" style="height: 15rem; width: 15rem">
             {{-- <img alt="" class="hidden-xs hidden-sm img-responsive img-thumbnail"  src="{{ asset('assets/LOGOC.png') }}"  style="width:100%;  padding-top: .5em"/>  --}}
          </div>
        </div>
        <div class="col-md-9" style="text-align: left; xpadding-top: 1.2em">
          <div class="staff-detail clearfix ">
            <table class="tablex">
              <tr>
                <td>Name: </td>
                <td style="padding-left: 1rem"><span id="pname" style="color: black"></span></td>
              </tr>
              <tr>
                <td>Contact: </td>
                <td style="padding-left: 1rem"><span id="pphone" style="color: black"></span></td>
              </tr>
              <tr>
                <td>Email: </td>
                <td style="padding-left: 1rem"><span id="pemail" style="color: black"></span></td>
              </tr>
              <tr>
                <td>Website: </td>
                <td style="padding-left: 1rem"><span id="pwebsite" style="color: black"></span></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="row" style="padding: 1.5rem;">
        <h4>Company Biography</h4>
        <p id="pbio" style="line-height: 1.5em; font-family:CeraPro">
        </p>
      </div>
    </div>
  </div>

  {{-- ask again if the user wanted to be contacted --}}
  <div id="askToBeContacted" style="background-color:  #37a8ec; padding: 1em; margin-bottom: .5em;display: none">
    {{-- <h4>Now you know more, would you be happy for them to contact you to see how they can help further?” Tick box for email and one for phone too</h4>
            <input type="checkbox" name="canEmail" id="canEmail"> Email
            <input type="checkbox" name="canCall" id="canCall"> Phone --}}

    <div class="row" style="background-color:  #37a8ec; padding: 1em; margin-bottom: .5em; color: #fff;">
      <div class="col-md-10">
        OR - Book an online consultation with a Physiotherapist now to take the next step to pain relief now.  xx
        <hr>
        Please note, our Recommended Therapists are private healthcare practitioners and so treatment will have a fee.  The same is true for the online consultations
      </div>
      <div class="col-md-2">
        <div class="pull-right"><a href="https://www.truephysio.co.uk/clinics/online/" target="_blank" class="btn btn-success btn-sm" style="color: #fff"> Book Now</a></div>
      </div>
    </div>
  </div>








  <script>
    $('#qaBottons').hide('slow')
    $('#qaBottons_sm').hide('slow')
    $('.smbtns').hide('slow')
  </script>
</div>
@endif
@endforeach

</div>









<script>
  /*
  <h6 id="pname"></h6>
                <h6><span id="ptitle"></span></h6>
                <h6 id="pphone"></h6>
                <p id="pdesc"></p>
  */
  $('.imgBox').hide();
  $(document).ready(function() {
    
    $(document).on('click', '#frmCustomerBtn', function(e) {
    //$(document).on('click', 'input[name="frmCustomerBtn"]', function(e) {
      e.preventDefault()

      var phone = $('#contact_number').val()

      $('#contact_number').keyup(()=>{
        $('#contact_numberdiv').html('')
      })
      
    

      var FormData = $('#frmCustomer').serialize();
      $.ajax({
        type: "POST",
        url: "/customers",
        data: FormData,
        dataType: "json",
        success: function(response) {
          $('.imgBox').hide();
          // console.log(response.response_data.therapist);
          var data = response.response_data.therapist;

          $('#finalQuestion').show('slow')
          $('#therapistBox').show('slow')
          $('#formBox').hide('slow')
          $('#videoBox').show('slow')
          $('#videoText').show('slow')
          $('#productBox').show('slow')

          if ($('#canCall').is(":checked") || $('#canEmail').is(":checked")) {

          } else {
            $('#askToBeContacted').show('slow')
          }

          

          if (data?.full_name == undefined) {  //
            $('#therapist').html(`<p style="line-height: 1.5em; font-family:CeraPro "><br/>Unfortunately, we don’t have a Therapist that we would recommend in your area yet.  For now, we’d recommend making a start with the exercises, and 
                    products and you can book an online consultation below.  We are looking for someone brilliant in your area and will be in touch as soon as we find someone</p>`)
          } else {
            $('#pname').html(data?.full_name)
            $('#pphone').html(data.contact_number)
            $('#pemail').html(data.email)
            $('#pwebsite').html(data.website)
            $('#pbio').html(data.company_bio)
          }

          $('#ptitle').html('Physio Therapist')

          // $('#pdesc').html('')
          if (data?.profile_photo_path != undefined) {
            $('#prifilePicture').html(`<img alt="IMAGE" class="img-responsive img-circle" src="${data.profile_photo_path}" style="width:78%; height:8em; border-radius: 50%; padding-top: .5em">`)
          }

          
        },
        error: function(xhr, textStatus, error){
          console.log(xhr.responseJSON.errors.full_name);

          if(xhr.responseJSON.errors.email == undefined){ 
            $('#emaildiv').html('')
          }else{
            $('#emaildiv').html(`<b style="color: red">${xhr.responseJSON.errors?.email }</b>`)
          }
          if(xhr.responseJSON.errors.full_name == undefined){ 
            $('#fullnamediv').html('')
          }else{
            $('#fullnamediv').html(`<b style="color: red">${xhr.responseJSON.errors?.full_name }</b>`)
          }
          if(xhr.responseJSON.errors.contact_number == undefined){ 
            $('#contact_numberdiv').html('')
          }else{
            $('#contact_numberdiv').html(`<b style="color: red">${xhr.responseJSON.errors?.contact_number }</b>`)
          }
          if(xhr.responseJSON.errors.post_code == undefined){ 
            $('#postcodediv').html('')
          }else{
            $('#postcodediv').html(`<b style="color: red">${xhr.responseJSON.errors?.post_code }</b>`)
          }
      }
        
      });
      
      if(xhr.responseJSON.errors?.full_name != undefined){ 
        $("#frmCustomerBtndiv").empty();
      }
     

    })
    

  });
</script>