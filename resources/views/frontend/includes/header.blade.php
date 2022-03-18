<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Oganic - Organic Food Responsive Store Template for HTML5 and Bootstrap 3">
    <meta name="author" content="">
    <title>Oganic - Organic Food Responsive Store Template for HTML5 and Bootstrap 3</title>
    <!-- Bootstrap v3.3.7 Style -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Icons Style -->
    <link href="css/fontello.css" rel="stylesheet" />
    <!-- Carousel Style -->
    <link href="css/responsive-slider.css" rel="stylesheet" />
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <!-- Value Slider Style -->
    <link href="css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- Smooth Product Style -->
	<link rel="stylesheet" href="css/smoothproducts.css">
    <!-- Responsive Tab Style -->
    <link href="css/responsive-tabs.css" rel="stylesheet">
    <!-- Gallery with tab Style -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- Custom Style -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Custom Responsive Style -->
    <link href="css/query.css" rel="stylesheet" />
    <!-- Google Font Style -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Favicon and touch icons  -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    EXTERNAL CSS
        https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css
        https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css
        EXTERNAL JAVASCRIPT
        https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js
        https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js
        https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js
    <![endif]-->
  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  </head>
  <style>
      span.displayname {
    padding-left: 21px;
}
  </style>
  <body>
  	<!-- Loader -->
  	<div id="loading">
            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
  	</div>
    <!-- /Loader -->
    <!-- Header -->
    <header>
      <div class="top-header">
        <div class="lpart">

          <div class="tel-and-email">
            <p class="tel">Phone : <a href="tel:+91123456789">(+91) 123456789</a></p>
            <p class="mail">Email : <a href="mailto:inquiry@organicfoodstroe.com">inquiry@organicfoodstroe.com</a></p>
             <p> <span class="displayname" style="color:white;"><span style="color:#e0b861;">Hi : </span>{{ Auth::user()->f_name ?? ""}}{{ Auth::user()->l_name ?? ""}}<a href="#" class="display-username" ></a> </span></p>
        </div>
        </div>
        <div class="rpart">
            <div class="social">
                <ul class="social-widget" style="margin-right:87px;">
                  <li><a href="#" target="_blank"><i class="icon-facebook"></i></a></li>
                  <li><a href="#" target="_blank"><i class="icon-twitter"></i></a></li>
                  <li><a href="#" target="_blank"><i class="icon-google-plus"></i></a></li>
                  <li><a href="#" target="_blank"><i class="icon-pinterest"></i></a></li>
                  <li><a href="#" target="_blank"><i class="icon-youtube"></i></a></li>
                </ul>
              </div>

      <?php
            if(isset(Auth::user()->id)){
              $basket_count = App\Model\User::where('id',Auth()->user()->id);
              echo "<div class='account'>
            <div class='btn dropdown-toggle' data-toggle='dropdown'><i class='icon-avatar'></i>My Account<i class='icon-angle-down'></i></div>
            <ul class='dropdown-menu'>
              <li><a href=".url('/myprofile').">myprofile</a></li>
              <li><a href=".url('/logout').">Logout</a></li>
            </ul>
          </div>";
            }else 
            {
         
              echo "<div class='account'>
            <div class='btn dropdown-toggle' data-toggle='dropdown'><i class='icon-avatar'></i>My Account <i class='icon-angle-down'></i></div>
            <ul class='dropdown-menu'>
                <li><a href=".url('/register').">Register</a></li>
                <li><a href=".url('/login').">login</a></li>

            </ul>
          </div>";
      }
            ?>
        </div>
      </div>
      <div class="bottom-header">
        <div class="container">
          <div class="vishlist">

            <!--<div class="vishlist-inner">-->
            <!--  <a href="whishlist.html"><i class="icon-heart"></i></a>-->
            <!--  <div class="vishlist-counter">01</div>-->
            <!--</div>-->

            {{-- <div class="vishlist-inner">
              <a href="whishlist.html"><i class="icon-heart"></i></a>
              <div class="vishlist-counter">01</div>
            </div> --}}

          </div>
          <nav class="navbar" id="navbar">
            <div class="nav-header">
              <button type="button" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <div class="logo" ><a href="{{route('index')}}"><img id="logo" src="{{asset('public/frontend/images/logo_winner.png')}}"   height="300px" width="400px" alt="logo" /style="padding-left:30%;"></a></div>
            </div>
            <div class="collapse" id="organic-food-navigation">
              <div class="remove"><i class="icon-cancel-music"></i></div>
              <div class="menu-logo"><a href="{{route('index')}}"><img src="images/logo.png" alt="logo" /style=""></a></div>
              <ul class="nav navbar-nav" id="myDIV">
                <li class="btn_avt active"><a href="{{route('index')}}" style="font-weight:500;font-size:2.5rem;font-family:serif";>Home</a></li>
                <li class="btn_avt "><a href="{{route('about')}}" style="font-weight:500;font-size:2.5rem;font-family:serif";>About</a></li>
                <li class="megamenu-li btn_avt">
                  <a href="{{route('category')}}" style="font-weight:500;font-size:2.5rem;font-family:serif";>Shop</a><span class="icon-angle-down"></span>

                </li>

                <li class="btn_avt "><a href="{{route('contact')}}" style="font-weight:500;font-size:2.5rem;font-family:serif";>Contact</a></li>
              </ul>
            </div>
          </nav>
           <div class="search-and-cart">
            <div class="search">
              <div class="search-inner"><a href="#"><i class="icon-magnifying-glass"></i></a></div>
            </div>
        
            <div class="cart">
            <?php
            if(isset(Auth::user()->id)){
              $basket_count =  App\Model\Cart::where('user_id',Auth()->user()->id)->count();
           }
           elseif(!isset(Auth::user()->id) && isset($_COOKIE['ecom_prod'])) {
               $cookie_value = Cookie::get('ecom_prod');
                $basket_count = App\Model\Cart::where('cookies_id',$cookie_value)->count();
           }
else{
    $basket_count = 0;

}

            ?>
              <div class="cart-inner">
                <a href="{{url('cart')}}"><i class="icon-shopping-bag"></i></a>
                <div class="cart-counter">{{$basket_count}}</div>
              </div>

              <?php
              ?>
            </div>
          </div>
          <div class="searchbox">
            <div class="inner">
              <div class="container-1">
                <form class ="input" method="GET" action="{{url('/category')}}">
                 <div class="pos-rel">
                   <input class="input-serch" type="text" name="search" placeholder="Search our store" />
                  <div class="cross"><i class="icon-magnifying-glass"></i></div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
