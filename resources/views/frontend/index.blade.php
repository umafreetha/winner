@include('frontend.includes.css')
@include('frontend.includes.header')
<style>
.border_bg{
        border: 2px #8a6d3b solid;
    padding-bottom: 10%;
    padding-top: 5%;
}
#bg_back
{
        position: relative;
    top: -10px;
    background-image:url('public/frontend/images/2a18faed815464204743d7c7dd7b1a25-removebg-preview.png');
    padding-left:0px;
    padding-right:0px;
}
#bg_arrival{
    /*background-image:url('public/frontend/images/new-arrivals-bg.jpg')center center no-repeat;*/
    padding-left:0px;
    padding-right:0px;
}
#bg_color{
    background-image:url('public/frontend/images/new-arrivals-bg.jpg') center center no-repeat!important;
}
.content_count{
    padding-bottom:5%;
    font-family: serif;
    font-size: 30px;
        color: #2c2721;
}
.content_sec{
    /*padding-top:1%;*/
    background: url(../images/stroke.png)left center no-repeat;
}
.carousel {
    position: relative;
    height: 400px;
    width: 100%;
    max-width:100%;
    margin: 0 auto;
}

.btn_prt:hover .cart-btn{
   color: #000 !important; 
}
.carousel__slide {
   width: 800px;
}

.carousel__image {
   height: 100%;
   width: 100%;
   object-fit: cover;
}

.school-talks-img-6 {
    object-position: 50% 5%;
}

.carousel__track-container {
    height: 100%;
    position: relative;
    overflow: hidden;
    border-radius: 5px;
}

.carousel__track {
    padding: 0;
    margin: 0;
    list-style: none;
    position: relative;
    height: 100%;
    transition: transform 700ms ease-in;
}

.carousel__slide {
    position: absolute; /* stack images on top of each other */
    top: 0;
    bottom: 0;
    height: 400px;
    width: 100%;
}

.carousel__button {
       position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: 0;
    cursor: pointer;
    z-index: 9;
}

.carousel__button img:hover, .carousel__nav button:hover {
    transform: scale(1.2);
    transition: all ease-in 0.2s;
}


.carousel__button--left {
    left:0px; /* position away from image */
}

.carousel__button--right {
    right:0px;
}

.carousel__button img {
    width: 30px;
}

.carousel__button:focus, .carousel__indicator:focus {
  outline: none;
}

.carousel__nav {
    display: none;
    justify-content: center;
    padding: 10px 0;
}

.carousel__indicator {
    border: 0;
    border-radius: 50px;
    width: 15px;
    height: 15px;
    background: rgba(0,0,0,.3);
    margin: 0 12px;
    cursor: pointer;
}

.carousel__indicator.current-slide {
    background: rgba(0,0,0,.75);
}


/* resize images for different screen sizes */
@media all and (max-width: 900px) {
    .carousel {
        height: 300px;
        max-width: 600px;
    }
    .carousel__slide {
       width: 600px;
       height: 300px;
    }    
} 

@media all and (max-width: 720px) {
    .carousel {
        height: 250px;
        max-width: 500px;
    }
    .carousel__slide {
       width: 500px;
       height: 250px;
    }    
} 

@media all and (max-width: 600px) {
    .carousel {
        height: 200px;
        max-width: 400px;
    }
    .carousel__slide {
       width: 400px;
       height: 200px;
    }    
} 

@media all and (max-width: 485px) {
    .carousel {
        height: 150px;
        max-width: 350px;
    }
    .carousel__slide {
       width: 350px;
       height: 150px;
    }    
} 

@media all and (max-width: 400px) {
    .carousel {
        height: 120px;
        max-width: 300px;
    }
    .carousel__slide {
       width: 300px;
       height: 120px;
    }    
} 

.cur_sec{
   padding:0 0;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    background: rgb(44 39 33);
}
.con-sec{
   padding:0% 0 0 0;
}

/* Phone Button Markup  */

.phone {
  background: #333;
}
.phone:hover {
  background: #111;
}
.phone:active,
.phone:focus {
  background: #3c3b6e;
}

/* Entity Icon   */
.phone:after {
  content: "\260E";
}
/* Set Phone Icon Wiggle Animation   */
.phone:hover:after {
  -webkit-animation: wiggle 0.05s alternate ease infinite;
  animation: wiggle 0.05s alternate ease infinite;
}

/* Animations  */

@-webkit-keyframes bounceright {
  from {
    -webkit-transform: translateX(0);
  }
  to {
    -webkit-transform: translateX(3px);
  }
}
@-webkit-keyframes wiggle {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(30deg);
  }
}
@keyframes bounceright {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(3px);
  }
}
@keyframes wiggle {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(30deg);
  }
}


.button {
  margin: 25px;
}


</style>
    <div class="clearfix"></div>
    <!-- Banner Carousel -->
    <div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
      <div class="slides" data-group="slides">
        <ul>
        <?php ?>
            @foreach ($banner as $productbanner)
          <li>

            <div class="slide-body" data-group="slide">

              <img src="{{asset('storage/banner')}}/{{$productbanner['image']}}" alt="banner">

            </div>

          </li>
          @endforeach
              <?php ?>
        </ul>
      </div>
    </div>
  <!--happy clients start-->
<div class="container-fluid" id="bg_back">
    <section id="counter-stats" class="wow fadeInRight border_bg" data-wow-duration="1.4s">
         <!--about sec start-->
    <div class="container con-sec">
        <div class="row cur_sec">
           
    <div class="col-lg-8 cur_sec_8">
        <div class="carousel">
            <button class="carousel__button carousel__button--left"> <!-- __ means child-->
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Chevron_left.svg/768px-Chevron_left.svg.png">
            </button>
            <div class="carousel__track-container">
                <ul class="carousel__track">
                    <li class="carousel__slide current-slide">
                        <img class="carousel__image" src="{{asset('public/frontend/images/DS_1.jpg')}}" alt="Image 1">
                    </li>
                    <li class="carousel__slide">
                        <img class="carousel__image" src="{{asset('public/frontend/images/DS_2.jpg')}}" alt="Image 2">
                    </li>
                    <li class="carousel__slide">
                        <img class="carousel__image" src="{{asset('public/frontend/images/DS_3.jpg')}}" alt="Image 3">
                    </li>
                    <li class="carousel__slide">
                        <img class="carousel__image" src="{{asset('public/frontend/images/DS_4.jpg')}}" alt="Image 4">
                    </li>
                   
                </ul>
            </div>
            <button class="carousel__button carousel__button--right"> <!-- -- means modifier-->
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Chevron_right.svg/1024px-Chevron_right.svg.png" alt="right icon">
            </button>
    
            <div class="carousel__nav">  
                <button class="carousel__indicator current-slide"></button>
                <button class="carousel__indicator"></button>
                <button class="carousel__indicator"></button>
                <button class="carousel__indicator"></button>
                <button class="carousel__indicator"></button>
                <button class="carousel__indicator"></button>
            </div>
        </div>
        </div>
        <div class="col-lg-4 cur_sec_4">
            <h4 >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            </h4>
            <a href="http://winner.seyasoftech.com/contact" title="Catchy Title" role="button" class="">Store Locator</a>
        </div>
    </div>
    
    </div>
    <!--about sec end-->
    	<div class="container cnt_5">
    	       
    		<div class="row">
              <h2 class="content_count">
                  <strong>With blessings of the almighty and the ever-lasting trust of our customers ...<br><h2 class="content_sec" style="background: url(../images/stroke.png)left center no-repeat;">WE ARE HERE TODAY !!!</h2></strong></h2>
    			<div class="col-lg-3 stats">
    			<i class="fa fa-home" aria-hidden="true"></i>
    				<div class="counting" data-count="2">0</div>
    				<h3>No.Of.Stores</h3>
    			
    			</div>
    
    			<div class="col-lg-3 stats">
    				<i class="fa fa-user" aria-hidden="true"></i>
    				<div class="counting" data-count="3000">0</div>
    				<h3><span>No.Of.Customers</h3>
    			</div>
    
    			<div class="col-lg-3 stats">
    		<i class="fa fa-shopping-cart" aria-hidden="true"></i>
    				<div class="counting" data-count="1000">0</div>
    				<h3>Our Products</h3>
    			</div>
    
    			<div class="col-lg-3 stats">
    	<i class="fa fa-star" aria-hidden="true"></i>
    				<div class="counting" data-count="200">0</div>
    				<h3>Premium Products</h3>
    			</div>
    
    
    		</div>
    		<!-- end row -->
    	</div>
    	<!-- end container -->
    
    </section>
</div>
<!-- end cont stats -->
<!--happy clients end-->
 <!-- /Best Deal -->
 <div class="container-fluid" id="bg_color" style="
    background: url(../public/frontend/images/hand-painted-watercolor-abstract-watercolor-background_23-2149001486.jpg)center center;
margin-top:-10px;background-size:cover;">
      <section class="deal-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <div class="section-tit">
              <div class="inner">
                <h2><span>deal of</span> the day</h2>
              </div>
            </div>
            <div class="filter-part">
              <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12 center-part hidden-lg">
                <div class="slider-bg">
                  <img src="{{asset('public/frontend/images/circle centre1 (3).png')}}" alt="slider-back" class="img-responsive bg" />
                  <div class="pos-abs">
                    <div class="owl-carousel owl-theme deal-slider">
                    @for ($i = 0; $i < 3; $i++)
                        @if(isset($product[$i]['single_product_image']['images']))
                      <div class="item " style="box-shadow: rgb(224 184 97) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                        <div class="pro-img"> <img src="{{asset('storage/product')}}/{{$product[$i]['single_product_image']['images']}}" alt="Kensie Fruit" class="img-responsive" /> </div>
                        <div class="contain-wrapper">
                          <div class="tit">{{$product[$i]['name']}}</div>
                          <div class="price">
                            <div class="new-price">&#x20b9;{{$product[$i]['price']}}</div>
                            <div class="old-price"><del>$33.00</del></div>
                          </div>
                          <div class="btn-part"> <a href="{{route('product',$product[$i]['slug'])}}" class="cart-btn"> <i class="icon-basket-supermarket"></i> buy now</a> </div>
                        </div>
                      </div>
                        @endif
                      @endfor

                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-sm-12 col-xs-12">u899
                <div id="myBtnContainer">

                  <button class="btn active" onclick="filterSelection('all')">all</button>
                  /
                  <?php ?>
                 @foreach ($category as $productcategory)
                  <button class="btn" onclick="filterSelection('{{$productcategory['name']}}')"> {{$productcategory['name']}}</button>
                  /
                  @endforeach
                  <?php ?>
                </div>
              </div> -->
              <div class="col-lg-4 col-md-6 col-sm-6  col-xs-12 pull-left">
              @for ($i = 0; $i < 3; $i++)
                @if(isset($product[$i]['single_product_image']['images']))
                    <div class="filterDiv {{$productcategory['name']}}">
                    <div class="img-part"> <img src="{{asset('storage/product')}}/{{$product[$i]['single_product_image']['images']}}" alt="Jessica Simpson Fruit" class="img-responsive" /> </div>
                    <div class="text-part">
                        <div class="box-tit">{{$product[$i]['name']}}</div>
                        <div class="price">
                        <div class="new-price">&#x20b9;{{$product[$i]['price']}}</div>
                        <div class="old-price"><del>$33.00</del></div>
                        </div>
                        <div class="btn-part"> <a href="{{route('product',$product[$i]['slug'])}}" class="cart-btn"><i class="icon-basket-supermarket" style=""></i> buy now</a>  </div>
                    </div>
                    </div>
                @endif
             @endfor

              </div>
              <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12 center-part hidden-xs hidden-sm hidden-md">

                <div class="slider-bg">
                  <img src="{{asset('public/frontend/images/circle centre1 (3).png')}}" alt="slider-back" class="img-responsive bg" />
                  <div class="pos-abs">
                    <div class="owl-carousel owl-theme deal-slider">
                    @for ($i = 0; $i < 6; $i++)
                        @if(isset($product[$i]['single_product_image']['images']))
                      <div class="item item_shdw">
                        <div class="pro-img"> <img src="{{asset('storage/product')}}/{{$product[$i]['single_product_image']['images']}}" alt="Kensie Fruit" class="img-responsive" /> </div>
                        <div class="contain-wrapper">
                          <div class="tit">{{$product[$i]['name']}}</div>
                          <div class="price">
                            <div class="new-price">&#x20b9;{{$product[$i]['price']}}</div>
                              <div class="old-price"><del>$33.00</del></div>
                          </div>
                          <div class="btn-part btn_prt"> <a href="{{route('product',$product[$i]['slug'])}}" class="cart-btn"><i class="icon-basket-supermarket"></i>  buy now</a> </div>
                        </div>
                       </div>
                       @endif
                       @endfor
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 pull-right">
              @for ($i = 3; $i < 6; $i++)
              @if(isset($product[$i]['single_product_image']['images']))
                <div class="filterDiv {{$productcategory['name']}} " >
                <div class="img-part"> <img src="{{asset('storage/product')}}/{{$product[$i]['single_product_image']['images']}}" alt="Jessica Simpson Fruit" class="img-responsive" /> </div>
                  <div class="text-part">
                    <div class="box-tit">{{$product[$i]['name']}}</div>
                    <div class="price">
                        
                      <div class="new-price">&#x20b9;{{$product[$i]['price']}}</div>
                       <div class="old-price"><del>$33.00</del></div>
                    </div>
                    <div class="btn-part"> <a href="{{route('product',$product[$i]['slug'])}}" class="cart-btn"> <i class="icon-basket-supermarket" style=""></i> buy now</a> </div>
                  </div>
                </div>
                @endif
                @endfor
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
   <div class="clearfix"></div>

    
    <!-- New Arrival  style="
    background: url(../public/frontend/images/new-arrivals-bg.jpg)center center;" -->
   <div class="container-fluid" id="bg_arrival">
    <section class="new-arrivals-section section-padding" >
     
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <div class="section-tit">
              <div class="inner">
                <h2><span>New  arrivals</span></h2>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-xs-12">
            <div class="owl-carousel owl-theme new-arrivals-slider">
            <?php ?>
            @foreach ($newarreival as $productnewarrival)
              <div class="item"style="box-shadow: rgb(224 184 97) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;">
                <div class="wrapper">
                 <div class="pro-img"> <img src="{{asset('storage/product')}}/{{$productnewarrival['single_product_image']['images']}}" alt="new arrival" class="img-responsive"  style="height:40%;"/> </div>
                  <div class="contain-wrapper">
                    <div class="tit">{{$productnewarrival['name']}}</div>
                    <div class="price">
                      <div class="new-price">&#x20b9;{{$productnewarrival['price']}}</div>
                      <div class="old-price"></div>

                    </div>
                    <div class="btn-part" > <a href="cart.html" class="cart-btn"><i class="icon-basket-supermarket"></i> buy now</a></div>
                  </div>
                  <div class="wrapper-box-hover">
                    <div class="text">
                      <ul>

                         @if(isset($productnewarrival['slug']))
                            <li><a href="{{route('product',$productnewarrival['slug'])}}"></a></li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              <?php ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- /New Arrival -->
    <div class="clearfix"></div>

</div>
   
    <!-- Best Deal -->
  
    <!-- Delivery Process -->
    <div class="container-fluid" id="bg_color" style="
    background: url(../public/frontend/images/hand-painted-watercolor-abstract-watercolor-background_23-2149001486.jpg)center center;
background-size:cover;">
    <section class="delivery-process">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 ">
            <div class="section-tit">
              <div class="inner">
                <h2><span>delivery</span> process</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12 first">
            <div class="icon-part"> <img src="{{asset('public/frontend/images/step-1.png')}}" alt="step-1" class="img-responsive center-block" /> <i class="icon-carrot"></i> </div>
            <div class="process-name">
              <div class="step">step 01</div>
              <p>Choose one or more products</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12 second">
            <div class="icon-part"> <img src="{{asset('public/frontend/images/step-2.png')}}" alt="step-2" class="img-responsive center-block" /> <i class="icon-warehouse"></i> </div>
            <div class="process-name">
              <div class="step">step 02</div>
              <p>Determine our Farm</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12 third">
            <div class="icon-part"> <img src="{{asset('public/frontend/images/step-3.png')}}" alt="step-3" class="img-responsive center-block" /> <i class="icon-placeholder-filled-point"></i> </div>
            <div class="process-name">
              <div class="step">step 03</div>
              <p>Write Your Location</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12 fourth">
            <div class="icon-part"> <img src="{{asset('public/frontend/images/step-4.png')}}" alt="step-4" class="img-responsive center-block" /> <i class="icon-package"></i> </div>
            <div class="process-name">
              <div class="step">step 04</div>
              <p>Fast Delivery</p>
            </div>
          </div>
        </div>
      </div>
    </section>
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
    </div>
        <!-- /Delivery Process -->
   

   
   
    <!-- Services provide -->
      
 
    </div><script>
           // // Modified from: How to code a carousel by Kevin Powell https://www.youtube.com/watch?v=gBzsE0oieio
const track = document.querySelector('.carousel__track');  // select the ul
const slides = Array.from(track.children);
const slidesLength = slides.length; // get length of array (number of images)
var counter = 0; // check postion in slides 
const nextButton = document.querySelector('.carousel__button--right');
const prevButton = document.querySelector('.carousel__button--left');
const dotsNav = document.querySelector('.carousel__nav');
const dots = Array.from(dotsNav.children);
const slideWidth= slides[0].getBoundingClientRect().width; // get size of the first slide (same for all slides),  get only width of the first slide

const totalWidth = slideWidth * (slidesLength -1) + 'px'; // get total width of all images (when placed next to each other)
// arrange the slides next to one another
// make a function
const setSlidePosition = (slide, index) => {
    slide.style.left = slideWidth * index + 'px';  // change style --> move slide from the left (shift from absolute pos.)
}

slides.forEach(setSlidePosition); // call function for each slide

const moveToSlide = (track, currentSlide, targetSlide) => {
    track.style.transform = 'translateX(-' + targetSlide.style.left + ')'; // shift ul
    currentSlide.classList.remove('current-slide'); // remove .current-slide CSS on current slide
    targetSlide.classList.add('current-slide'); // add .current-slide CSS on next slide 
}

const updateDots = (currentDot, targetDot) => {
    currentDot.classList.remove('current-slide');
    targetDot.classList.add('current-slide');
}

// When prev clicked, move to slide on the left
prevButton.addEventListener('click', e => {
    counter --; // decr counter (for checking slide pos)
    const currentSlide = track.querySelector('.current-slide');
    const prevSlide = currentSlide.previousElementSibling;
    const currentDot = dotsNav.querySelector('.current-slide');
    const prevDot = currentDot.previousElementSibling;

    // if prev clicked when on the first slide 
    if ((counter) == -1) {
        const lastSlide = slides[slidesLength - 1];
        const lastDot = dots[slidesLength - 1];
        counter = slidesLength - 1;  // set counter to last slide index
        track.style.transform = 'translateX(-' + totalWidth + ')'; // shift ul to the last slide
        currentSlide.classList.remove('current-slide'); // remove .current-slide CSS on current slide
        lastSlide.classList.add('current-slide'); // add .current-slide CSS on the last slide
        currentDot.classList.remove('current-slide');
        lastDot.classList.add('current-slide');
        
        slideResize(); // call resize function (shifts track correctly)

    } else {
        // not the first slide
        moveToSlide(track, currentSlide, prevSlide);
        updateDots(currentDot, prevDot);
    }
});


// When next clicked, move to slide on the right
nextButton.addEventListener('click', e => {  // track the event (click)
    counter ++; // incr counter for tracking index pos
    const currentSlide = track.querySelector('.current-slide');  
    const nextSlide = currentSlide.nextElementSibling;
    const currentDot = dotsNav.querySelector('.current-slide')
    const nextDot = currentDot.nextElementSibling;

    // if the next button is clicked when the current-slide is the last slide...
    if ((counter) == slidesLength) {
        const firstSlide = slides[0];
        const firstDot = dots[0];
        counter = 0;
        track.style.transform = 'translateX(-' + 0 + 'px' + ')'; // shift ul to first slide
        currentSlide.classList.remove('current-slide'); // remove .current-slide CSS on current slide
        firstSlide.classList.add('current-slide'); // add .current-slide CSS on the first slide

        currentDot.classList.remove('current-slide');
        firstDot.classList.add('current-slide');

    } else {
        // not the last slide...
        moveToSlide(track, currentSlide, nextSlide);
        updateDots(currentDot, nextDot);
    }
})

// When I click the nav indicators, move to that slide
dotsNav.addEventListener('click', e => {
    // which indicator was clicked on?
    const targetDot = e.target.closest('button'); // prevents event when carousel__nav clicked (not near carousel__nav buttons)
    if (!targetDot) return; // if !targetDot... exit function

    const currentSlide = track.querySelector('.current-slide');
    const currentDot  = dotsNav.querySelector('.current-slide');
    const targetIndex = dots.findIndex(dot => dot === targetDot); // get index of dot clicked on
    counter = targetIndex;
    const targetSlide = slides[targetIndex];

    moveToSlide(track, currentSlide, targetSlide);
    updateDots(currentDot, targetDot);
})


// when window is resized --> get new carousel slide length and total width then reset track pos so that only the current slide is seen
window.addEventListener('resize', slideResize);

function slideResize(){
    var newSlideWidth = slides[0].getBoundingClientRect().width; // get size of the first slide (same for all slides),  get only width of the first slide
    var totalWidth = slideWidth * (slidesLength - 1) + 'px'; // get total length of all slides next to each other
    // arrange the slides next to one another
    // make a function
    const setSlidePosition = (slide, index) => { // reset slide positions for new window size
        slide.style.left = newSlideWidth * index + 'px';  // change style --> move slide from the left (shift from absolute pos.)
    }
    
    slides.forEach(setSlidePosition); // call function for each slide
    
    const currentSlide = track.querySelector('.current-slide');
    var currentIndex = slides.indexOf(currentSlide);
    var currentTrackPos = newSlideWidth * currentIndex + 'px';
    track.style.transform = 'translateX(-' + currentTrackPos + ')'; // shift ul
}    






</script>
    <!-- /Services provide -->
  @include('frontend.includes.script')
  @include('frontend.includes.footer')
