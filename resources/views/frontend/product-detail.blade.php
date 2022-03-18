@include('frontend.includes.css')
@include('frontend.includes.header')

    <div class="clearfix"></div>
    <!-- Banner -->
    <section class="sub-banner">
      <h2 class="sr-only">Banner</h2>
      <img class="banner" src="{{asset('public/frontend/images/productbanner.jpg')}}" alt="banner" />
    </section>
    <!-- /Banner -->
    <!-- Bredcrumb -->
    <section class="breadcrumb-section">
      <div class="container">
        <div class="breadcrumb">
          <ul class="list-inline">
            <li><a href="index.html">Home</a></li>
            <li>{{ $post['name'] }}</li>
          </ul>
          <h1 class="page-tit">{{ $post['name'] }}</h1>
        </div>
      </div>
    </section>
    <!-- /Bredcrumb -->
    <!-- Content -->
    <div class="content-part detail-page">
      <div class="container">
        <div class="row">
   <section class="single-post-section">

              <!-- product -->
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="sp-wrap">
                <?php $j=0; ?>
                @foreach ($post['product_images'] as $product)
                  <a href="{{asset('storage/product')}}/{{$product['images']}}"><img src="{{asset('storage/product')}}/{{$product['images']}}" alt=""></a>
                  @endforeach
                <?php $j++; ?>
                </div>
              </div>
              <!-- /product -->
              <!-- product discription -->
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="product-single-meta">
                  <h3 class="product-name">{{ $post['name'] }}</h3>

                  <div class="price">
                    <div class="new-price">&#x20b9;{{ $post['price'] }}</div>

                  </div>
                  <div class="availablity">
                    <?php
                    // get the product and stock level
                    if($post->quantity > 0) {
                        echo'Available : <span>In Stock</span>';
                    } else {
                        echo 'vailable : <span>In Stock</span>';
                    }
                    ?>
                     </div>
                  <p class="product-information">{!! (strip_tags( $post['description'] ))!!}</p>
                  <div class="cart-process">

                    <div class="qty">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" id="quantity" disabled="disabled" data-type="minus" data-field="quant[1]"> - </button>
                      </span>
                      <input type="text" name="quant[1]" class="quantity form-control input-number" value="1" min="1" max="1000">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" id="quantity" data-type="plus" data-field="quant[1]"> + </button>
                      </span>
                    </div>
                    <div class="cart">
                        <input type="hidden" id="slug" value="<?=$post['slug']?>" />
                        <button class="cart-btn btn-cart" id="btn-cart"> Add to cart</button>
                    </div>
                    <!--<div class="extra">-->
                    <!--  <ul class="list-inline">-->
                    <!--    <li><a href="#"><i class="icon-favorite-heart-button"></i></a></li>-->
                    <!--    <li><a href="#"><i class="icon-line-menu"></i></a></li>-->
                    <!--  </ul>-->
                    <!--</div>-->
                  </div>
                  <div class="tag-box">
                    <div class="tag-row">
                      <span class="tag-label sku">SKU</span><span class="dots">:</span><div class="tag-label-value sku-value">{{ $post['sku'] }}</div>
                    </div>
                    <div class="tag-row">
                      <span class="tag-label category">Category</span><span class="dots">:</span><div class="tag-label-value category-value">{{ $post['name'] }}</div>
                    </div>
             
                    <div class="tag-row">
                      <span class="tag-label">Share</span><span class="dots">:</span>
                      <div class="tag-label-value">
                        &nbsp;
                        <ul class="social">
                          <li><a href="#" target="_blank"><i class="icon-facebook"></i></a></li>
                          <li><a href="#" target="_blank"><i class="icon-twitter"></i></a></li>
                          <li><a href="#" target="_blank"><i class="icon-google-plus"></i></a></li>
                          <li><a href="#" target="_blank"><i class="icon-pinterest"></i></a></li>
                          <li><a href="#" target="_blank"><i class="icon-youtube"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- /product discription -->

          </section>

          <!-- Related Products -->
          <section class="related-products">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-xs-12">
                  <div class="tit">
                    <h2>Related Products</h2>
                  </div>
                  <div class="owl-carousel owl-theme related-product-slider">
                  @foreach($realated_products as $values)
                    <div class="item">
                      <div class="wrapper">
                        <div class="pro-img">
                        <img src="{{asset('storage/product')}}/{{$values['single_product_image']['images']}}" class="img-responsive" alt="a" />
                        </div>
                        <div class="contain-wrapper">
                          <div class="tit">{{$values['name']}} </div>
                          <div class="price">
                            <div class="new-price">&#x20b9;{{$values['price']}} </div>

                          </div>
                          <div class="btn-part">  <a href="#" class="cart-btn">buy now</a>
                            <i class="icon-basket-supermarket"></i>
                          </div>
                        </div>
                        <div class="wrapper-box-hover">
                          <div class="text">
                            <ul>
                              <li><a href="whishlist.html"></a></li>
                              <li><a href="{{route('product',$values['slug'])}}"></a></li>

                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
         @endforeach
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Related Products  -->
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
  <style>
    @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}

  </style>

<script type="text/javascript">
		$(document).on('click','#btn-cart',function(e)
		{
            var quantity = $(".quantity").val();
			var slug = $("#slug").val();
			var token = "{{csrf_token()}}";
			$.ajax({
				type:'POST',
				url:"{{url('/')}}/addToCart",
			    data:{'_token':token,'slug':slug,'quantity':quantity},

				success:function(response)
				{

                    swal("Good job!", "product added successfully !", "success");
                      window.location = '/category';

				},
				error:function(xhr,resp,text)
				{
					console.log(xhr,resp,text);
				}
			})
		});


</script>
