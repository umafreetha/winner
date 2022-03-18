@include('frontend.includes.css')
@include('frontend.includes.header')
<style>
.container-fluid{
 padding-left: 0px !important;
    padding-right: 0px !important;}
.map-form{
        background-image: url('public/frontend/images/Optimized-Blue Clean Graphic Welcome Message Elementary Back to School Banner (4).png');
    background-size: cover;
    padding-left: 0px !important;
    padding-right: 0px !important;
    background-repeat: no-repeat;
    height: auto;
    display: inline-block;
    width: 100%;
}
.contact_form{
 background: url('public/frontend/images/yellow-parchment_53876-91513.jpg')center center;
background-size:cover;
    
}
.address-part{
    border-bottom: 2px #161108 solid;
}
.get_touch{
    padding-top:5%;
}
.card {
 
         padding: 3%;
    color: #ffffff;
    border-radius: 16px;
    background-color: white;
    display: inline-block;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    box-shadow: -15px 15px 10px rgba(0,0,0,0.5), 0 1px 2px rgba(0,0,0,0.24);
    transition: all 0.5s cubic-bezier(.25,.8,.25,1);
    height: auto;
    background-color: #2c2721;
}
.card iframe{
      border: 0;
    border-radius: 8px;
    display: inline-block;
    width: 100%;  
}

.card:hover {
    box-shadow: -15px 15px 28px #171717, 0 10px 10px #171717;
    transform: translateY(-25px);;
}
.cur_sec{
        display: inline-block;
    width: 100%;
    padding: 10% 0 0 0;
}
.con-sec{
    margin-top: 10%;
    margin-bottom: 10%;
}
.phone_sec{
           font-size: 20px;
    font-family: sans-serif;
    font-weight: 600;
    display: inline-block;
    padding: 1% 0;
}
.phone_sec a{
    color:#fff;
}
.card_div {
    display:inline-block;
    width:100%;
}
.card_div p{
     padding: 2% 0 0% 0;
    font-size: 16px;
    line-height: normal;
}
.icon-part{
       display: inline-block;
    width: 100%;
    padding: 2% 0; 
}
.icon-part .center-block {
    display: inline-block;
    width: auto;
    margin: 0 0;
}
</style>
    <!-- /Header -->

 
    <!--<section class="sub-banner">-->
  
    <!--  <img class="banner" src="{{asset('public/frontend/images/conbanner.jfif')}}" alt="banner" />-->
    <!--</section>-->
    

    <div class="container con-sec ">
        <div class="row cur_sec">
           
    <section>
<div class="col-lg-6">
  <article class="card">
      <div class="card_div">
    <h1>Chennai Location</h1>
    <div class="icon-part">
        <img src="{{asset('public/frontend/images/location_edited-removebg-preview.png')}}" alt="location" class="img-responsive center-block" />
    </div>
    <p>Winner Dates and Nuts,<br>
      </p>
        <p>
       No.(42/1)66/1), Brindavan street,</p>
        <p>
       West Mambalam, Chennai - 600033</p>
       <span class="phone_sec"><a href="tel:+11233123223" > Phone : +1 123 312 32 23</a></span>
       <span class="phone_sec"><a href="mailto:info@company.com"> Email : inquiry@winnerdates.com</a></span>
       </div>
  </article>
  </div>
  <div class="col-lg-6">
  <article class="card">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.9087985728574!2d80.2257498141359!3d13.041476916871373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267ca4f2f0dc5%3A0x927d642dd5206634!2sWinner%20Dates%20and%20Nuts!5e0!3m2!1sen!2sin!4v1647237636971!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </article>
  </div>
</section>
</div>
</div>
</div>

    <div class="container-fluid contact_form">
    <div class="content-part contact-page">
      <section class="address-part">
        <div class="container">
          <div class="row">
            <div class="inner-part">
				<!--<div class="col-md-4 col-sm-12 col-xs-12">-->
    <!--          <div class="box address-box">-->
    <!--            <div class="icon-part">-->
    <!--              <img src="{{asset('public/frontend/images/location_edited-removebg-preview.png')}}" alt="location" class="img-responsive center-block" />-->
    <!--            </div>-->
    <!--            <div class="tit">-->
    <!--              <h3>address</h3>-->
    <!--              <p>Winner Dates and Nuts,<br/>No.(42/1)66/1), Brindavan street, West Mambalam, Chennai - 600033</p>-->
    <!--              <p>Winner Dates and Nuts Athipalayam Prithvi bus stop,<br/>Door no:18,Sathy main road,Ganapathy,Cbe -6.</p>-->
    <!--            </div>-->
    <!--          </div>-->
				<!--	</div>-->
				<!--<div class="col-md-4 col-sm-12 col-xs-12">-->
    <!--          <div class="box phone-box">-->
    <!--            <div class="icon-part">-->
    <!--              <img src="{{asset('public/frontend/images/phone icon final.png')}}" alt="phone" class="img-responsive center-block" />-->
    <!--            </div>-->
    <!--            <div class="tit">-->
    <!--              <h3>Phone</h3>-->
    <!--              <p><a href="tel:+11233123223">+1 123 312 32 23</a></p>-->
    <!--            </div>-->
    <!--          </div>-->
			 <!--</div>-->
			<!--<div class="col-md-4 col-sm-12 col-xs-12">-->
   <!--           <div class="box email-box">-->
   <!--             <div class="icon-part">-->
   <!--               <img src="{{asset('public/frontend/images/message_copy-removebg-preview.png')}}" alt="message" class="img-responsive center-block" />-->
   <!--             </div>-->
   <!--             <div class="tit">-->
   <!--               <h3>email</h3>-->
   <!--               <p><a href="mailto:info@company.com">inquiry@winnerdates.com</a></p>-->
   <!--             </div>-->
   <!--           </div>-->

			<!--			</div>-->
            </div>
          </div>
        </div>
      </section>
      <section class="container-fluid map-form">
        <div class="row no-gutter">
          <div class="col-sm-6 col-xs-12 form-part equal-height">
               <div class="tit get_touch">
                <h3><span>get in touch</span> with us</h3>
              </div>
            <div class="inner-part">
             
              <form method="POST" action="{{ route('comments') }}">
                @csrf
                <div class="form-group col-sm-12 col-xs-12">
                  <input type="text" class="form-control" placeholder="Name" name="name" />
                </div>
                <div class="form-group col-sm-12 col-xs-12">
                  <input type="text" class="form-control" placeholder="Email"  name="email"/>
                </div>
                <div class="form-group col-sm-12 col-xs-12">
                  <input type="text" class="form-control" placeholder="Phone" name="phone" />
                </div>
                <div class="form-group col-sm-12 col-xs-12">
                  <textarea class="form-control" placeholder="Comments" name="comments"></textarea>
                </div>
                <div class="form-group col-sm-12 col-xs-12">
                  <button class="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!--<div class="col-sm-6 col-xs-12 map-section equal-height googlemap">-->
          <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.8012130442257!2d72.55756651502764!3d23.03106998494874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84f53fffffff%3A0xa5680aa626bd4d43!2sNCode+Technologies%2C+Inc.!5e0!3m2!1sen!2sin!4v1537872305605" width="600" height="450" allowfullscreen></iframe>-->
          <!--</div>-->
        </div>
      </section>
    </div>
    <!-- /Content -->
</div>
    <!-- /Services provide -->
    @include('frontend.includes.script')
    @include('frontend.includes.footer')

