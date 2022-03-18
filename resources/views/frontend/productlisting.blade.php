@include('frontend.includes.css')
@include('frontend.includes.header')
    <!-- /Breadcrumb -->
    <!-- /Header -->
    <div class="clearfix"></div>
    <!-- Banner -->
    <!--<section class="sub-banner">-->
    <!--<h2 class="sr-only">Banner</h2>-->
    <!--  <img class="banner" src="{{asset('../public/frontend/images/contactbanner.jpg')}}" alt="Banner" />-->
    <!--</section>-->
    <!-- /Banner -->
        <!-- Breadcrumb -->
        <!--<section class="breadcrumb-section">-->
        <!--  <div class="container">-->
        <!--    <div class="breadcrumb">-->
        <!--      <ul class="list-inline">-->
        <!--        <li><a href="index.html">Home</a></li>-->
        <!--        <li>Vegetables</li>-->
        <!--      </ul>-->
        <!--      <h1 class="page-tit">Vegetables</h1>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</section>-->
        <!-- /Breadcrumb -->
    <!-- Content -->
       <div class="content-part listing-page content_part_top ">
      <div class="container">
        <div class="row">
        <!-- Content left -->
          <aside class="col-md-4 col-sm-12 col-xs-12">
            <div id="sidebar">
              <div class="widget categories-widget">
                <div class="widget-tit">
                  <h2>Categories</h2>
                  <div class="button" data-toggle="collapse" data-target="#categories">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </div>
                </div>
                <div class="widget-contian" id="categories">
                  <ul class="level-1 open">
                    <?php ?>
                    @foreach ($post as $productlistingcategory)
                    <li class="catmenu">
                      <a data-id="{{$productlistingcategory['id']}}">{{$productlistingcategory['name']}}</a><span class="icon-add" ></span>

                    </li>
                  @endforeach
              <?php ?>
                    </li>
                  </ul>
                </div>
              </div>
              <!--<div class="widget top-seller-widget" data-toggle="collapse" data-target="#top-seller">-->
              <!--  <div class="widget-tit">-->
              <!--    <h2>top seller</h2>-->
              <!--    <div class="button">-->
              <!--      <span class="icon-bar"></span>-->
              <!--      <span class="icon-bar"></span>-->
              <!--      <span class="icon-bar"></span>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--  <div class="widget-contian" id="top-seller">-->
              <!--    <div class="seller-box">-->
              <!--      <div class="seller-img">-->
              <!--        <img src="{{asset('../public/frontend/images/productcard.jpg')}}" alt="top seller" class="img-responsive" />-->
              <!--      </div>-->
              <!--      <div class="seller-text">-->
              <!--        <a class="seller-name" href="#">Raddish Chits</a>-->
              <!--        <div class="ratting">-->
              <!--          <ul>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--        <div class="price">$19.00</div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="seller-box">-->
              <!--      <div class="seller-img">-->
              <!--        <img src="{{asset('../public/frontend/images/productcard.jpg')}}" alt="top seller" class="img-responsive" />-->
              <!--      </div>-->
              <!--      <div class="seller-text">-->
              <!--        <a class="seller-name" href="#">Raddish Chits</a>-->
              <!--        <div class="ratting">-->
              <!--          <ul>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--        <div class="price">$19.00</div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="seller-box">-->
              <!--      <div class="seller-img">-->
              <!--        <img src="{{asset('../public/frontend/images/productcard.jpg')}}" alt="top seller" class="img-responsive" />-->
              <!--      </div>-->
              <!--      <div class="seller-text">-->
              <!--        <a class="seller-name" href="#">Raddish Chits</a>-->
              <!--        <div class="ratting">-->
              <!--          <ul>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--            <li><a href="#"><img src="{{asset('../public/frontend/images/star.png')}}" alt="star" class="img-responsive"></a></li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--        <div class="price">$19.00</div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="widget tag-widgwet">-->
              <!--  <div class="widget-tit">-->
              <!--    <h2>Popular tags</h2>-->
              <!--    <div class="button" data-toggle="collapse" data-target="#tag">-->
              <!--      <span class="icon-bar"></span>-->
              <!--      <span class="icon-bar"></span>-->
              <!--      <span class="icon-bar"></span>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--  <div class="widget-contian" id="tag">-->
              <!--    <div class="tag-div">-->
              <!--      <a class="tag-btn" href="#">Cucumber</a>-->
              <!--      <a class="tag-btn" href="#">Vegetables</a>-->
              <!--      <a class="tag-btn" href="#">Fruits</a>-->
              <!--      <a class="tag-btn" href="#">Organic Food</a>-->
              <!--      <a class="tag-btn" href="#">Food</a>-->
              <!--      <a class="tag-btn" href="#">True Natural</a>-->
              <!--      <a class="tag-btn" href="#">Garden</a>-->
              <!--      <a class="tag-btn" href="#">Green</a>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
            </div>
          </aside>
        <!-- /Content left -->
        <!-- Content Right-->
          <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <div class="filter">
                  <div class="r-part">


                    <div class="grid-short">
                      <div class="grid-layout"><a class="active" href="#" id="grid"><i class="icon-grid-layout"></i></a></div>
                      <!--<div class="list-grid"><a href="#" id="list-btn"><i class="icon-list-grid"></i></a></div>-->
                    </div>
                  </div>

                </div>
              </div>
             
         <div id="products" class="product-list list-group">
                <?php ?>

                @foreach($product_display as $values)
                <div class="col-sm-4 col-xs-12 item">
                  <div class="wrapper">
                    <div class="pro-img pro_img_shop">
                      <img src="{{asset('storage/product')}}/{{$values['singleProductImage']['images']}}" alt="product" class="img-responsive" style=""/>
                    </div>
                    <div class="contain-wrapper ctn_wrapper">
                      <div class="tit">{{$values['name']}}</div>
                      <div class="price">
                        <div class="new-price">&#x20b9;{{$values['price']}}</div>

                      </div>
                      <div class="btn-part">  <a href="{{route('product',$values['slug'])}}" class="cart-btn">  <i class="icon-basket-supermarket"></i> buy now</a>
                      
                      </div>
                    </div>
                    <!--<div class="wrapper-box-hover">-->
                    <!--  <div class="text">-->
                    <!--    <ul>-->
                    <!-- <li><a href="{{route('product',$values['slug'])}}"></a></li>-->

                    <!--    </ul>-->
                    <!--  </div>-->
                    <!--</div>-->

                  </div>

                </div>
                @endforeach
                <?php ?>
                <div class="col-sm-12 col-xs-12">
             {{ $product_display->render("pagination::bootstrap-4") }}
                </div>
              </div>
           
          </div>
        <!-- /Content Right-->
        </div>
      </div>
    </div>
    </div>
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
		$(document).on('click','.catmenu',function(e)
		{
            var id = $(this).find('a').data('id');
            
			var token = "{{csrf_token()}}";
                $.ajax({
				type:'Post',
				url:"{{url('/')}}/categoryfilter/"+id,
			    data:{'id':id ,'_token':token},
            
				success:function(data)
				{
				    
				    
                    console.log(data);
                    $("#products").html(data);
                
				},
				error:function(xhr,resp,text)
				{
					console.log(xhr,resp,text);
					
				}
			    })
            


		});

     $(function(){
       $(document).on('click','.cancel-cart', function (e) {
           e.preventDefault();

      var id = $(this).attr('id');
      var token = "{{csrf_token()}}";
      $.ajax({
             type: 'POST',
             url:"{{url('/')}}/deletecart",
             data: {'_token': token ,'id':id},
             success: function (data) {

             }
        });
       });
     });
</script>
