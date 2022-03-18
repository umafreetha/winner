@include('frontend.includes.css')
@include('frontend.includes.header')


<style>


.carousel-inner{border-radius:4px;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding:10px 30px; position:relative;background-color: whitesmoke;
}
form.login-form {
    font-size: 13px;
}
.col-md-8.banner-sec {
    padding-left: 2px;
}
.carousel-inner {
    width: 70%;
    height:447px;
}
input.form-check-input {

    margin-top: 11px;
    margin-left: -17px;
}
.form-check-label {
    margin-bottom: 0;
    font-size: 27px;
}
img.d-block.img-fluid{
    height:448;
}
.btn-login {
    background:green;
    color: #fff;
    font-weight: 600;
    width: 74px;
    font-size: 16px;
}
@-webkit-keyframes slide_animation {

  0% {left:0px;}
  10% {left:500px;}
  20% {left:500px;}
  30% {left:500px;}
  40% {left:500px;}
  50% {left:500px;}
  60% {left:500px;}
  70% {left:1000px;}
  80% {left:1000px;}
  90% {left:1000px;}
  100% {left:1000px;}


}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color:#e7c61e;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:green; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}

/* Smartphones (portrait and landscape) ----------- */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  .col-md-8.banner-sec {
    padding-left: 14px;
}
}
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  .login-block {
     margin-top:0px!important;

}
}
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  .carousel-inner {
     width:100%!important;
     height: 230px;

}
}
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  .login-block  {
 margin-left:0px!important;


}
}
</style>

    <div class="clearfix"></div>
    <!-- Banner -->
    <section class="sub-banner">
    <h2 class="sr-only">Banner</h2>
    <img class="banner" src="{{asset('public/frontend/images/productbanner.jpg')}}" alt="banner" />
    </section>
    <!-- /Banner -->
    <!-- Breadcrumb -->

    <!-- /Breadcrumb -->
    <!-- Content -->

    <section class="login-block" style="margin-top: 69px;
    margin-bottom:73px;margin-left:130px;">
    <div class="container">
	<div class="row">
		<div class="col-md-8 login-sec">

      @if($status == 0)

            <form class="account-form-login" method="POST" action="" id= "register_form">
                @csrf
        @if(count($errors) > 0)
        @foreach( $errors->all() as $message )
         <div class="alert alert-danger display-hide">
          <button class="close" data-close="alert"></button>
          <span>{{ $message }}</span>
         </div>
        @endforeach
        @endif
                <h2 class="text-left text-capitalize">Forget password    </h2>
             
                <div class="msgDiv"></div> 
               
                <input type="text" name="phone" class="form-control" placeholder="Your phone number" id="email" />
                <span class="otp_resp_details"></span>
                  <button type="button" class="btn_1 rounded full-width add_top_30 submit_register_form" id="submit_without_otp" style="    background-color: green;
                  color: white;
                  width: 103px;
                  height: 34px;
                  border-radius: 7px;"> {{ __('Send OTP') }}</button>
              </form>
      @else


                <form class="account-form-login" method="POST" action="" id= "verify_form">
                  @csrf
                  <h2 class="text-left text-capitalize">Reset Password    -- OTP Received Not Yet ? 
                     <a href="{{route('resent_otp')}}"><b style="color:red;">Resent OTP</b></a> 
                    </h2>
                  <div class="msgDiv"></div> 
                  <input type="hidden" name="user_id" value="{{$idd}}">
                  <input type="hidden" name="details" value="{{$details}}">
                  <input type="text" name="phone" class="form-control" placeholder="Your phone number" value="{{$mobile}}" readonly />
                  <input type="text" name="password" class="form-control" placeholder="create new password"  id= "password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                  <span class="asterisk_input"> </span>
                  <input type="text" name="otp" class="form-control otp" placeholder="Enter_otp" />
                  <div class="text-center">
                    <a href="#" class="show_timer">  <span id="otp_timer"></span></a> <button type="button" class="btn_resend resend_otp" style="display:none;">Resend OTP</button>
                  </div>
                  <span class="otp_resp_details"></span>
                    <button type="button" class="btn_1 rounded full-width add_top_30 submit_verify_form" id="submit_verify_form" style="    background-color: green;
                    color: white;
                    width: 103px;
                    height: 34px;
                    border-radius: 7px;"> {{ __('Reset') }}</button>
                </form>





      @endif






		</div>

</div>
</div>
</section>
    <!-- /Content -->
    <!-- Services provide -->
    <section class="helpline">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <div class="bgreen">
              <div class="inline">
                <div class="box">
                  <div class="icon"> <i class="icon-delivery-truck"></i> </div>
                  <div class="text-part">
                    <h3>Free Shipping</h3>
                    <p>Worldwide</p>
                  </div>
                </div>
                <div class="box">
                  <div class="icon"> <i class="icon-headphones"></i> </div>
                  <div class="text-part">
                    <h3>24X7</h3>
                    <p>Customer Support</p>
                  </div>
                </div>
                <div class="box">
                  <div class="icon"> <i class="icon-shuffle"></i> </div>
                  <div class="text-part">
                    <h3>Returns</h3>
                    <p>and Exchange</p>
                  </div>
                </div>
                <div class="box">
                  <div class="icon"> <i class="icon-phone-call"></i> </div>
                  <div class="text-part">
                    <h3>Hotline</h3>
                    <p><a href="tel:+8888888888">+(888) 888-8888</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Services provide -->
    @include('frontend.includes.script')
    @include('frontend.includes.footer')
    <script type="text/javascript">
  function plusSlides(n){
  clearInterval(myTimer);
  if (n < 0){
    showSlides(slideIndex -= 1);
  } else {
   showSlides(slideIndex += 1);
  }
  if (n === -1){
    myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
  } else {
    myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  }
  }

  $(document).on('click','.submit_register_form',function(event)
          {

              //alert("devi");

                  event.preventDefault();
                  var form = $(this).attr('id');
                  var slug =  form == "submit_with_otp" ? 'register' : 'forgetpassword_check'
                 // var slug = form == "submit_with_otp" ? 'register' : 'register';

                  if($('#register_form').valid())
                  {
                     // alert(slug+"-"+form);
                      var formData = new FormData($('#register_form')[0]);

                      var base_url = "{{ url('/') }}/"+slug;
                      $.ajax({
                          type    : 'POST',
                          url     : base_url,
                          data    : formData,
                          dataType:'json',
                          async: true,
                          processData: false,
                          contentType: false,
                          success : function(data)
                          {
                                   //console.log(data.status_code);
                                   if(data.status_code == 0)
                                   {
                                        $('.msgDiv').html(`<p class="alert alert-danger mg-b-4">Please Enter Valid Mobile Number</p>`);
                                        setTimeout(function() {
                                            $('.msgDiv').html(``);
                                            location.href = "{{route('forgetpassword')}}";
                                        }, 3000);
                                   }
                                   else if(data.status_code == 2)
                                    {
                                      $('.msgDiv').html(`<p class="alert alert-danger mg-b-4">Please Try Sometime</p>`);
                                        setTimeout(function() {
                                            $('.msgDiv').html(``);
                                            location.href = "{{route('forgetpassword')}}";
                                        }, 3000);
                                    }
                                    else
                                      {
                                          $('.msgDiv').html(`<p class="alert alert-success mg-b-4">Please Check Your Mobile to Get OTP</p>`);
                                          setTimeout(function() {
                                              $('.msgDiv').html(``);
                                              location.href = "{{route('forgetpassword2')}}";
                                          }, 3000);
                                      }
                                   
                                  
                          },
                         
                      });
                  }
              });



// OTP Verification Checking Process


$(document).on('click','.submit_verify_form',function(event)
          {

              //alert("devi");

                  event.preventDefault();
                  var form = $(this).attr('id');
                  var slug =  form == "submit_with_otp" ? 'register' : 'update_details'
                 // var slug = form == "submit_with_otp" ? 'register' : 'register';

                  if($('#verify_form').valid())
                  {
                     // alert(slug+"-"+form);
                      var formData = new FormData($('#verify_form')[0]);

                      var base_url = "{{ url('/') }}/"+slug;
                      $.ajax({
                          type    : 'POST',
                          url     : base_url,
                          data    : formData,
                          dataType:'json',
                          async: true,
                          processData: false,
                          contentType: false,
                          success : function(data)
                          {
                                   //console.log(data.status_code);
                                   if(data.status_code == 11)
                                   {
                                        $('.msgDiv').html(`<p class="alert alert-danger mg-b-4">Please Check OTP</p>`);
                                        setTimeout(function() {
                                            $('.msgDiv').html(``);
                                            location.href = "{{route('forgetpassword2')}}";
                                        }, 3000);
                                   }
                                    else
                                      {
                                          $('.msgDiv').html(`<p class="alert alert-success mg-b-4">Password Updated Successfully</p>`);
                                          setTimeout(function() {
                                              $('.msgDiv').html(``);
                                              location.href = "{{route('forgetpassword')}}";
                                          }, 3000);
                                      }
                                   
                                  
                          },
                         
                      });
                  }
              });







</script>

