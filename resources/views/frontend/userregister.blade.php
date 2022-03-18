@include('frontend.includes.css')
@include('frontend.includes.header')

<style>
    img.d-block.img-fluid{
    border-radius: 9px;
    margin-top: 13px;
    width: 100%;  
    }
    #cont_bg{
         background-image:url('public/frontend/images/Optimized-Blue Clean Graphic Welcome Message Elementary Back to School Banner (2).png');
         background-size: cover;
         	 padding-left:0px;
    padding-right:0px;
    }
    #input_sec{
    border-radius: 30px 28px 28px 30px;
    background-color: #f5e3af;
    }
    #log_frm{
            float: right;
    display: inline-block;
    text-align: center;
    }
    #log_1{
            /* padding-left: 17%; */
    /* padding-right: 4%; */
    float: none !important;
    display: inline-block;
    margin: 0 auto;
    text-align: center;
    }
    #frm_acc{
            margin: 0;
    padding: 0;
    display: inline-block;
    float: none;
    }
</style>
    <!-- /Header -->
    <div class="clearfix"></div>
    <!-- Banner -->

    <!-- /Banner -->
    <!-- Breadcrumb -->
 
    <!-- /Breadcrumb -->
    <!-- Content -->
   
    <div class="container-fluid" id="cont_bg">
        <div class="col-lg-12">
    <div class="content-part account-page" >
      <div class="col-lg-12" id="frm_acc">
        <div class="myaccount-form text-left col-lg-5" id="log_frm">
          <div class="row">
            
              <div class="carousel-item">
          <!--<img class="d-block img-fluid" src="../public/frontend/images/Blue Clean Graphic Welcome Message Elementary Back to School Banner (2).png" alt="First slide">-->
         </div>
         </div>
            <div class="col-lg-10" id="log_1">
              <form class="account-form-login" method="POST"  action="{{route('login')}}" id= "register_form">
                         @csrf
                        @if(count($errors) > 0)
                        @foreach( $errors->all() as $message )
                       <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>{{ $message }}</span>
                       </div>
                        @endforeach
                        @endif
                <h2 class="text-left text-capitalize">Sign In</h2>
                <input type="text" name="email" class="form-control" placeholder="Username" / id="input_sec">
                <input type="text" name="password" class="form-control" placeholder="Password" /id="input_sec">
                
                <label class="pull-right" style="float: left!important;padding-left: 30%;padding-top: 10%;">
                <!--<input name="forgot pass" type="checkbox">-->
                <a  href="{{route('forgetpassword')}}" style="color:#f5e3af;font-size:20px;font-family:serif"> Forgot your Password</a></label>
                <input type="submit" value="LOGIN" />
                 
                <label style="padding-top: 10%;padding-top: 10%;font-family: serif;font-size: 20px;">
                <!--<input name="remember" type="checkbox">-->
               
                <label style="color: #652f17;font-size: 15px;text-align: center;">Are you new here ?</label><br>
                 <a href="{{ route('register') }}" style="color:#f5e3af;">Create a new account</a></label>
              </form>
            </div>
           </div>
            </div>
          </div>
        </div>
      </div>

    <!-- /Content -->
   
    <!-- Footer -->
   
    @include('frontend.includes.script')
    @include('frontend.includes.footer')
    <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
