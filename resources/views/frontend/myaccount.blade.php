@include('frontend.includes.css')
@include('frontend.includes.header')
<style>
   .btn_1roundedfull-widthadd_top_30submit_register_form {

}
#bg_back{
        background-image: url('public/frontend/images/Optimized-Blue Clean Graphic Welcome Message Elementary Back to School Banner (3) (1).png');
    background-size: cover;
    padding-left: 0px;
    padding-right: 0px;
    background-repeat: no-repeat;
    height: auto;
    display: inline-block;
    width: 100%;
}
#con_page{
            float: none !important;
    text-align: center;
    display: inline-block;
    padding: 0 0;
}
#acc-page{
        background: #16110838;
    padding: 15px 0;
    border-radius: 8px;
    margin: 4% 0;
    float: none;
    display: inline-block;
    position: relative;
    
}
    #acc_subsec{
     text-align: center;
    margin: 0 auto;
    display: inline-block;
    width: 100%;}
    #acc_subsec1{
        display: inline-block;
    margin: 0 auto;
    float: none;
    }
    .otp_text{
        font-family: serif;
    font-size: 18px;
    /* padding-bottom: 10%; */
    }
    .otp-text1{
        font-size:20px;
        padding-top:5%;
    }
</style>
<div class="container-fluid"id="bg_back">

         
    <!-- Content -->
    <div class="content-part account-page" id="con_page">
<div class="myaccount-form text-left">
          <div class="row" id="acc_subsec">
    
            <div class="col-lg-4" id="acc-page">
                   
            <div class="col-lg-12" id="acc_subsec1">
                <form method="post" class="account-form-reg" id="register_form"  style="padding-left:10px;">
                {{ csrf_field() }}
                   <input type="hidden" name="user_number" id="user_number" value=""/>
                  <input type="hidden" class="form-control" name="session_id" id="session_id" value="">
                  <h2 class="text-left text-capitalize">Register</h2>
                  <input type="text" name="f_name" class="form-control required f_name" placeholder="First name"  required="required" />
                  <span class="asterisk_input"> </span>
                  <input type="text" name="l_name" class="form-control required l_name" placeholder="Last name"  required="required" />
                  <span class="asterisk_input"> </span>
                  <input type="text" name="email" class="form-control required email" placeholder="email"  required="required" />
                  <span class="asterisk_input"> </span>
                  <input type="text" name="phone" class="form-control required phone" placeholder="Phonenumber"  required="required" />
                  <span class="asterisk_input"> </span>
                  <input type="text" name="password" class="form-control password" placeholder="Password"/>
                  <span class="asterisk_input"> </span>
                  <input type="text" name="otp" class="form-control otp" placeholder="Enter_otp" />
                  <label class="otp_text">
                            <button type="button" class="btn_1 rounded full-width add_top_30 submit_register_form" id="submit_without_otp" style="color: white;width: 103px;height: 34px;border-radius: 7px;background-color:#e0b861;font-family:serif;"> {{ __('Register') }}</button>
                  <div class="text-center otp-text1">
                      Didn't received otp? <a href="#" class="show_timer">  <span id="otp_timer"></span></a> <button type="button" class="btn_resend resend_otp" style="display:none;">Resend OTP</button>
                  </div>
                
                  <!--<span> Privacy Policy Agreement?</span>-->
                  </label>
                  <span class="otp_resp_details"></span>
            
                </form>
              </div>
              
          </div>
        </div>
      </div>
    </div>
    <!-- /Content -->
</div>

    @include('frontend.includes.script')
  @include('frontend.includes.footer')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(e)
    {
        $("#text-center,.otp").hide();
          function startTimer()
          {
                var presentTime = document.getElementById('otp_timer').innerHTML;
                var timeArray = presentTime.split(/[:]+/);
                var m = timeArray[0];
                var s = checkSecond((timeArray[1] - 1));
                if(s==12){m=m-1}
                if(m<0)
                {
                    $("#otp_timer").hide();
                    $(".resend_otp").show();
                }
                document.getElementById('otp_timer').innerHTML =m + ":" + s;
                setTimeout(startTimer, 1000);
          }
          function checkSecond(sec)
          {
              if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
              if (sec < 0) {sec = "30"};
              return sec;
          }
          $(document).on('click','.submit_register_form',function(event)
          {
                  event.preventDefault();
                  var form = $(this).attr('id');
                  var slug =  form == "submit_with_otp" ? 'register' : 'validate_data';
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
                               swal("Good job!", "Registered succesfully !", "success"); 
                                      if(data['register_step']=="first")
                                      {

                                        //   alert(data['details']);
                                          $("#session_id").val(data['details']);
                                          document.getElementById('otp_timer').innerHTML =01 + ":" + 00;
                                          startTimer();
                                          $(".submit_register_form").attr('id','submit_with_otp');
                                          $("#text-center,.otp").show();
                                           swal("Good job!", "OTP Sended succesfully !", "success");
                                         
                                      }
                                   
                                      else if(data['register_step']=="second")
                                      {

                                      }
                              
                          },
                          error :function( data )
                          {

                              if(data.status===422)
                              {
                                  alert(data);
                                  var errors = $.parseJSON(data.responseText);
                                  $.each(errors,function(key,value)
                                  {
                                      if($.isPlainObject(value))
                                      {
                                          $.each(value,function(key,value)
                                          {
                                              $("." + key).after('<label class="error">' + value + "</label>");
                                          });
                                      }
                                  })
                              }
                          }
                      });
                  }
              });
    });
    </script>
script>
@if (session('alert'))
    swal("{{ session('alert') }}");
@endif
</script>
