@include('frontend.includes.css')
@include('frontend.includes.header')
<style>
#bg_back
{
    background-image:url('public/frontend/images/hand-painted-watercolor-abstract-watercolor-background_23-2149001486.jpg');
    padding-left:0px;
    padding-right:0px;
        padding-top: 5%;
    text-align: justify;
    font-size: 60px;
    padding-bottom: 10%;
    	background-size: cover;
}
.abt_sec{
        text-align: center;
    /*padding-bottom: 5%;*/
    font-family: serif;
    color:#63301a;
}
.abt_sec7{
       text-align: center;
    font-family: serif;
    color: #63301a;
    margin: 0;
    position: relative;
    top: 0;
    display: inline-block;
    width: 100%;
    padding: 5% 0 0 0;
}
.card_sec {
      width: 100%;
    height: 50%;
    background: #e0b861;
    margin: 0 0;
    box-shadow: 0px 3px 15px #6a1513;
    transition: .3s;
    line-height: 1.5;
    padding: 2% 0;
 
}
.card_sec:hover {
 box-shadow: 0px 20px 40px rgba(0,0,0,0.4);
 transform: scale(1.05,1.05);
}
.card_sec3 {
      width: 100%;
    height: 50%;
    background: #e0b861;
    margin: 0 0;
    box-shadow: 0px 3px 15px #6a1513;
    transition: .3s;
    line-height: 1.5;
    padding: 2% 0;
 
}
.card_sec3:hover {
 box-shadow: 0px 20px 40px rgba(0,0,0,0.4);
 transform: scale(1.05,1.05);
}
#card_sec1{
   padding-top: 10%;
}
.cont_sec{
        padding-top: 10%;
    text-align: justify;
    padding-left: 5%;
    padding-right: 5%;
}
.cont_sec1{
        
      font-family: serif;
    font-size: 25px;
    padding-left: 20%;
    padding-right: 20%;
    text-align: center;
    padding-top:10%;
}
.cont_sec4{
        
      font-family: serif;
    font-size: 25px;
    padding-left: 20%;
    padding-right: 20%;
    text-align: center;
    padding-top:4%;
}
.cont_sec2{
        padding-top: 2%;
    font-size: 18px;
    font-family: serif;
    text-align: justify;
    padding-right: 5%;
    padding-left: 5%;
}
.cont_sec5{
        padding-top: 2%;
    font-size: 18px;
    font-family: serif;
    text-align: justify;
    padding-right: 5%;
    padding-left: 5%;
    padding-bottom:5%;
}
/*.abt_sec{*/
/*    padding-top:30%;*/
/*}*/
#bg_card{
     background-image:url('public/frontend/images/Blue Clean Graphic Welcome Message Elementary Back to School Banner (1).png');
         	background-size: cover;
         	 padding-left:0px;
    padding-right:0px;
}
#free_sec{
    padding-top:10%;
}



.test1 {
    /* position: relative; */
    /* width: 20em; */
    /* height: 20em; */
    display: inline-block;
    justify-content: center;
    align-items: center;
}

/*.image {*/
/*  width: 100%;*/
/*  height: 100%;*/
/*}*/

.test1:before {
  /*content: "";*/
  display: block;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 20em;
  height: 20em;
  /*background: rgba(250,140,50, 0.6);*/
}
.text1 {
  font-family: Arial;
  font-size: 2em;
  color: white;
  text-shadow: 0.1em 0.1em 0.5em rgba(0,0,0,0.5);
  margin: 0;
  position: absolute;
}
.text{
         color: #63301a;
    font-size: 26px;
    position: relative;
    top: 0;
    left: 0;
    right: 0;
    transform: none;
    text-align: center;
    font-family: serif;
    line-height: 1.5;
    display: inline-block;
    padding: 5% 0 0 0;
}
.about_top_bck{
    padding:15% 0 10% 0;
}
</style>
    <div class="clearfix"></div>
    <!-- Banner -->
    <!--<section class="sub-banner">-->
    <!--<h2 class="sr-only">Banner</h2>-->
    <!--  <img src="{{asset('public/frontend/images/aboutbanner.jpg')}}" alt="banner" class="banner" />-->
    <!--</section>-->
    <!-- /Banner -->
    <!-- Breadcrumb -->
    <!--<section class="breadcrumb-section">-->
    <!--  <div class="container">-->
    <!--    <div class="breadcrumb">-->
    <!--      <ul class="list-inline">-->
    <!--        <li><a href="index.html">Home</a></li>-->
    <!--        <li>About Us</li>-->
    <!--      </ul>-->
    <!--      <h1 class="page-tit">About Us</h1>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->
    <!-- /Breadcrumb -->
    <!-- Content -->
    

<!--bg_back-->
    <div class="container-fluid about_top_bck" id="">
        <div class="col-lg-12">
            <div class="container">
                <div>  
                    <h2 class="abt_sec7">WELCOME TO WINNER DATES</h2>
                    <div class="test1">
                        <!--<img src="{{asset('public/frontend/images/cup-with-nuts_1284-12752-removebg-preview.png')}}" style="opacity: 0.5;">-->
                        <h4 class="text abt_sec">Welcome to Winnner Dates and Nuts, your one stop source for top quality Dates , Nuts , Dry fruits and gourmet food products. <br>We're dedicated to giving you the very best of exotic products from around the world, with a focus on Quality and uniqueness.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-part about-page" id="cont_page">
      <section class="who-we-are" style="
    background: url(../public/frontend/images/FOUNDER.png)center center;">
        <div class="container">
          <div class="row" style="padding-top:10%;padding-bottom:10%;">
            <div class="col-md-6 col-sm-12 col-xs-12 img-part" style="display:none;">
              <figure><img src="{{asset('public/frontend/images/image1.jpg')}}" alt="organic" class="img-responsive"></figure>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 txt-part"  style="float:right;">
                <div class="txtpart_fndr">
                    <h3 class="abt_sec">FOUNDER</h3>
                     <p class="abt_sec1">Founded in 1980 by K.P Nazar, Winner group has come a long way from its humble  beginnings in the city of coimbatore. His focus has constantly been to make life easier for his customers. 
                     </p>
                </div>
            </div>
          </div>
        </div>
      </section>


    </div>
    <!-- /Content -->
    <!-- Our Farmer -->

    <!-- /Our Farmer -->
    <!-- Brand logo -->

    <!-- /Brand logo -->
    <div class="clearfix"></div>
<div class="container-fluid" id="bg_card">
<div class="container" id="card_sec1">
    <div class="row">
        <div class="col-lg-12">
            <!--<img src="{{asset('public/frontend/images/download-removebg-preview.png')}}" style="padding-left: 35%;padding-right: 35%;padding-bottom: 5%;/* width: 60%; */ ">-->
            <div class="col-lg-6" style="">
                <div class="card_sec">
                   <h1 class="cont_sec1">OUR MISSION </h1>
                   <p class="cont_sec2">Is to make the world of food products a much smaller place for our customers without making them pay exorbitant amounts, just because its imported from other countries.</p>
                </div>
            </div>
             <div class="col-lg-6">
                <div class="card_sec3">
                    <h1 class="cont_sec4">OUR VISION</h1>
                    <p class="cont_sec5">We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
                </div>
            </div>
        </div>
    </div>
     <section class="helpline" id="free_sec">
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
</div>
</div>

    <!-- Services provide -->
 

    <!-- /Services provide -->
    @include('frontend.includes.script')
    @include('frontend.includes.footer')
