
<div class="">
      @if($question[0]->answer != '0')
          <div class="form-check">
            <div class="alert" style="background-color: #ffffff33;font-size: 25px; font-family: Optima;display: inline-block;line-height: 2em;">
              <h2>{{ $question[0]->question }} </h2>
              @if($question[0]->video_path != '')
                <iframe width="420" height="315"
                  src="{{ $question[0]->video_path }}">
                </iframe>
              @endif
            </div>
          </div>
      @endif
       
      
      <div class="qform" style="xmargin-left: 2em">
      @foreach ($question as $item)
        @if($item->answer == '0')

        <div id="formBox" style="background-color:  #ffffff33; padding: 1em; margin-bottom: .5em">
          <h2 class="">Final Stage</h2>
          <hr>
          <br>
          <h4  class="text-blue">So that we can send you our recommendations, and give you the best advice, please can you give us some more information</h4>
          <br>
          <form id="frmCustomer" method="POST">
            @csrf
            <input type="text" class="form-control" name="full_name" placeholder="Full Name – We like to know who we’ve helped fix their pain" required>
            <input type="text" class="form-control" name="post_code" placeholder="Postcode – This is so that we can recommend an expert close to you that can help you" required>
            <input type="text" class="form-control" name="email" placeholder="Email – So we can send you all our recommendations and you can access our advice anywhere and anytime">
            <input type="text" class="form-control" name="contact_number" placeholder="Phone number – This is so that your local recommended expert can get in touch with you…but only if you say that’s ok">

           
            <h4>Are you happy for our recommended expert to contact you by email or phone</h4>
            <input type="checkbox" name="canEmail" value="1"> Email
            <input type="checkbox" name="canCall" value="1"> Phone
            <br>
            <br>
            <button id="frmCustomerBtn" name="frmCustomerBtn"  class="btn btn-success">Submit</button>
          </form>
      </div>

      {{-- final question --}}
      <div id="finalQuestion" style="background-color:  #ffffff33; padding: 1em; margin-bottom: .5em;display: none">
        <h2> <i class="fa fa-hand-point-right"></i> {{ $question[0]->question }} </h2>
        <hr>
      </div>
     
      
      {{-- videos --}}
      <div id="videoBox" style="background-color:  #ffffff33; padding: 1em; margin-bottom: .5em; display:none">
            <h3 class="">You May Watch This Video</h3>
            @if($item->video_path != '')
              <iframe width="420" height="315"
                src="{{ $item->video_path }}">
              </iframe>
            @endif
      </div>

      {{-- products --}}
      <div id="productBox" style="background-color:  #ffffff33; padding: 1em; margin-bottom: .5em; display:none">
        <h3 class="">Here are the product’s we’d recommend</h3>
        <div class="shop-products-list clearfix">
            <div class="row">
              @foreach ($products as $item)
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                <div class="product-block">
                  <a href="shop-detail.html">
                  <div class="image"><img alt="IMAGE" class="img-responsive" src="{{ url('/').$item->file_path }}"></div>
                  <div class="product-detail">
                    <h6>{{ $item->title }}</h6>
                    <p>{!! $item->body !!}</p><span>{{ $item->sub_title }}</span>
                  </div></a> <!-- Add Read More Icons Start -->
                  <div class="add-read-more-icons">
                    <a href="#"><svg class="svg-addCartIcon" height="27px" viewBox="0 0 24 27" width="24px">
                    <path class="addtocart_bag" d="M3.0518948,6.073 L0.623,6.073 C0.4443913,6.073064 0.2744004,6.1497833 0.1561911,6.2836773 C0.0379818,6.4175713 -0.0170752,6.5957608 0.005,6.773 L1.264,16.567 L0.006,26.079 C-0.0180763,26.2562394 0.0363321,26.4351665 0.155,26.569 C0.2731623,26.703804 0.4437392,26.7810739 0.623,26.781 L17.984,26.781 C18.1637357,26.7812017 18.3347719,26.7036446 18.4530474,26.5683084 C18.5713228,26.4329722 18.6252731,26.2530893 18.601,26.075 L18.489,25.233 C18.4652742,25.0082534 18.3215123,24.814059 18.1134843,24.7257511 C17.9054562,24.6374431 17.6658978,24.6689179 17.4877412,24.8079655 C17.3095847,24.947013 17.2208653,25.1717524 17.256,25.395 L17.274,25.534 L1.332,25.534 L2.509,16.646 C2.5159976,16.5925614 2.5159976,16.5384386 2.509,16.485 L1.33,7.312 L2.853102,7.312 C2.818066,7.6633881 2.8,8.0215244 2.8,8.385 C2.8,8.7285211 3.0784789,9.007 3.422,9.007 C3.7655211,9.007 4.044,8.7285211 4.044,8.385 C4.044,8.0203636 4.0642631,7.6620439 4.103343,7.312 L14.5126059,7.312 C14.5517192,7.6620679 14.572,8.02039 14.572,8.385 C14.571734,8.5500461 14.6371805,8.7084088 14.7538859,8.8251141 C14.8705912,8.9418195 15.0289539,9.007266 15.194,9.007 C15.3590461,9.007266 15.5174088,8.9418195 15.6341141,8.8251141 C15.7508195,8.7084088 15.816266,8.5500461 15.816,8.385 C15.816,8.0215244 15.797934,7.6633881 15.762898,7.312 L17.273,7.312 L16.264,15.148 C16.2418906,15.3122742 16.2862643,15.4785783 16.3872727,15.6100018 C16.4882811,15.7414254 16.6375681,15.8270962 16.802,15.848 C16.9668262,15.8735529 17.1349267,15.8304976 17.2671747,15.7288556 C17.3994227,15.6272135 17.4842817,15.4758514 17.502,15.31 L18.602,6.773 C18.6234087,6.5958949 18.5681158,6.4180821 18.4500484,6.2843487 C18.3319809,6.1506154 18.1623929,6.0737087 17.984,6.073 L15.5641052,6.073 C14.7827358,2.5731843 12.2735317,0.006 9.308,0.006 C6.3424683,0.006 3.8332642,2.5731843 3.0518948,6.073 Z M4.3273522,6.073 L14.2884507,6.073 C13.5783375,3.269785 11.6141971,1.249 9.308,1.249 C7.0015895,1.249 5.0372989,3.2688966 4.3273522,6.073 Z" fill="#141414" fill-rule="evenodd"></path>
                    <path class="addtocart_circle" d="M17.6892,25.874 C14.6135355,25.8713496 12.1220552,23.3764679 12.1236008,20.3008027 C12.1251465,17.2251374 14.6191332,14.7327611 17.6947988,14.7332021 C20.7704644,14.7336431 23.2637363,17.2267344 23.2644,20.3024 C23.2604263,23.3816113 20.7624135,25.8753272 17.6832,25.874 L17.6892,25.874 Z M17.6892,16.2248 C15.4358782,16.2248 13.6092,18.0514782 13.6092,20.3048 C13.6092,22.5581218 15.4358782,24.3848 17.6892,24.3848 C19.9425218,24.3848 21.7692,22.5581218 21.7692,20.3048 C21.7692012,19.2216763 21.3385217,18.1830021 20.5720751,17.4176809 C19.8056285,16.6523598 18.7663225,16.2232072 17.6832,16.2248 L17.6892,16.2248 Z" fill="#141414"></path>
                    <path class="addtocart_plus" d="M18.4356,21.0488 L19.6356,21.0488 L19.632,21.0488 C20.0442253,21.0497941 20.3792059,20.7164253 20.3802,20.3042 C20.3811941,19.8919747 20.0478253,19.5569941 19.6356,19.556 L18.4356,19.556 L18.4356,18.356 C18.419528,17.9550837 18.0898383,17.6383459 17.6886,17.6383459 C17.2873617,17.6383459 16.957672,17.9550837 16.9416,18.356 L16.9416,19.556 L15.7392,19.556 C15.3269747,19.556 14.9928,19.8901747 14.9928,20.3024 C14.9928,20.7146253 15.3269747,21.0488 15.7392,21.0488 L16.9416,21.0488 L16.9416,22.2488 C16.9415997,22.4469657 17.0204028,22.6369975 17.1606396,22.7770092 C17.3008764,22.9170209 17.4910346,22.9955186 17.6892,22.9952 L17.6856,22.9952 C17.8842778,22.99648 18.0752408,22.9183686 18.2160678,22.7782176 C18.3568947,22.6380666 18.4359241,22.4474817 18.4356,22.2488 L18.4356,21.0488 Z" fill="#141414"></path></svg></a> <a class="more-info" href="shop-detail.html"><svg class="svg-moreIcon" height="24px" width="50px">
                    <circle cx="12" cy="12" r="2"></circle>
                    <circle cx="20" cy="12" r="2"></circle>
                    <circle cx="28" cy="12" r="2"></circle></svg></a>
                  </div><!-- Add Read More Icons End -->
                </div><!--/.product-block-->
              </div>
              @endforeach
            </div>
          </div>
       </div>

       {{-- therapist --}}
      <div id="therapist" style="background-color:  #ffffff33; padding: 1em; margin-bottom: .5em; display:none">
          <h3 class="">Physio Therapist</h3>
          <h4>Here is your local recommended Therapist who will be able to help you with your problem, They would love to help</h4>
          
          <div class="xrow">

            <div class="">
              <div id="prifilePicture"></div>
              <div class="staff-detail clearfix">
                <h6 style="font-weight: bold; font-size: 28px">Name: <span id="pname"></span></h6>
                {{-- <h6><span id="ptitle"></span></h6> --}}
                <h6 style="font-weight: bold; font-size: 23px"> Contact Number: <span id="pphone"></span></h6>
                <p style="font-weight: bold; font-size: 23px" id="pdesc"></p>
              </div><!--/.staff-detail-->
            </div>
          </div>
      </div>

      {{-- ask again if the user wanted to be contacted --}}
      <div id="askToBeContacted" style="background-color:  #ffffff33; padding: 1em; margin-bottom: .5em;display: none">
            <h4>Now you know more, would you be happy for them to contact you to see how they can help further?” Tick box for email and one for phone too</h4>
            <input type="checkbox" name="canEmail" id="canEmail"> Email
            <input type="checkbox" name="canCall" id="canCall"> Phone
      </div>
       

      

         

         <script>
           $('#qaBottons').hide('slow')
         </script>
        @else
            <div class="form-check">
              <label class="form-check-label" style="font-size: 20px; font-family: roboto">
                <input style="width: 1em; height: 1em" type="radio" class="form-check-input" name="optradio" value="{{ $item->next_question_id }}" > {{$item->answer}}
              </label>
            </div>
            <hr>
        @endif
      @endforeach
    </div>
</div>
<div id="qaBottons" style="overflow:auto;">
  <div style="float:left;">
      <button style="height: 4em" type="button" class="prevBtn btn-default btn-lg" onclick="load_question({{ $question[0]->prev }})"> <i class="fa fa-arrow-left"></i> Prev</button>
      <button style="height: 4em" type="button" class="nextBtn btn-info btn-lg" onclick="load_question()"> <i class="fa fa-arrow-right"></i>Next</button>
  </div>
</div>

<script>
  /*
  <h6 id="pname"></h6>
                <h6><span id="ptitle"></span></h6>
                <h6 id="pphone"></h6>
                <p id="pdesc"></p>
  */
  $('.imgBox').hide();
  $(document).ready(function(){
    $(document).off().on('click', '#frmCustomerBtn', function (e) { 
              e.preventDefault()
              var FormData = $('#frmCustomer').serialize();
              console.log(FormData);
              $.ajax({
                type: "POST",
                url: "/customers",
                data: FormData,
                dataType: "json",
                success: function (response) {
                  $('.imgBox').hide();
                  console.log(response);
                  var data = response.response_data;
                  
                  $('#finalQuestion').show('slow')
                  $('#therapist').show('slow')
                  $('#formBox').hide('slow')
                  $('#videoBox').show('slow')
                  $('#productBox').show('slow')

                  if($('#canCall').is(":checked") || $('#canEmail').is(":checked")){
                    
                  }else{
                    $('#askToBeContacted').show('slow')
                  }
                  

                  $('#pname').html(data.first_name+' '+data.last_name)
                  $('#ptitle').html('Physio Therapist')
                  $('#pphone').html(data.contact_number)
                  $('#pdesc').html('...')
                  if(data.profile_photo_path != null){
                    $('#prifilePicture').html(`<img alt="IMAGE" class="img-responsive" src="`+data.profile_photo_path+`" style="width: 40%; height: 40%">`)
                  }
                }
              });
              return false

            })

  });
</script>