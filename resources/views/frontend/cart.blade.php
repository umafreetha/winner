@include('frontend.includes.css')
@include('frontend.includes.header')

      <div class="clearfix"></div>
      <!-- Responsive slider - START -->
      <section class="sub-banner">
         <h2 class="sr-only">Banner</h2>
         <!--<img src="{{asset('public/frontend/images/cart.jpg')}}" alt="banner" class="banner" />-->
      </section>
      
      <section class="breadcrumb-section">
         <div class="container">
            <div class="breadcrumb">
               <!--<ul class="list-inline">-->
               <!--   <li><a href="index.html">Home</a></li>-->
               <!--   <li>Shopping Cart</li>-->
               <!--</ul>-->
               <h3 class="page-tit">SHOPPING CART</h3>
            </div>
         </div>
      </section>
      <!-- ============ Sub-Banner-End =============== -->
      <div class="container-fluid"style="background-color: #fff;">
      <div class="content-part cart-page">
         <div class="container">
            <div class="table-responsive" style="overflow-x: visible;">
               <table class="table table-hover table-responsive">
                  <thead>
                     <tr>
                        <th class="product">PRODUCT</th>
                        <th class="name">Description</th>
                        <th class="price">Price</th>
                        <th class="quantity">Quantity</th>
                        <th class="quantity">Gst</th>

                        <th class="total">Total</th>
                        <th class="cancle">&nbsp;</th>
                     </tr>
                  </thead>
                  <tbody>
                @foreach ($cart_val as $cartlist)
                <tr>
                        <td class="cart-image-wrapper">
                            <img src="{{asset('storage/product')}}/{{$cartlist['product_image']}}" alt="" style="width:33%"></a>
                        </td>
                        <td class="product-tit"> <a href="#">{{ $cartlist['product_name']}}</a></td>
                        <td id="product_price_{{$cartlist['cart_id']}}"> {{ $cartlist['product_price']}} </td>
                        <td>
                            <input type="text" name="quantity_{{$cartlist['cart_id']}}" class="quantity" data-id="{{$cartlist['cart_id']}}" value="{{ $cartlist['quantity']}}" class="form-control" placeholder="quantity" onkeypress="return validateNumber(event)" >
                        </td>
                        <td id="product_gst_{{$cartlist['cart_id']}}" ><a href="#">{{ $cartlist['gst']}}&#37;</a></td>

                        <td class="total"><a href="#" id="product_total_{{$cartlist['cart_id']}}">&#x20b9;{{ $cartlist['product_total_price']}}</td>
                        <td class="cancle"><a href="#" class="cancel-cart" id="<?=$cartlist['cart_id']?>"><i class="icon-cancel-music"></i></a>

                        </td>
                        </tr>
                        @endforeach
                        <?php ?>

                  </tbody>
                 <tfoot>
                     <tr>
                        <td colspan="8" style="background-color:#f1f1f1;">
                           <div class="l-part">
                              <a class="continue-shopping-btn" href="{{route('category')}}">Continue with Shopping<i class="icon-right-arrow-1"></i></a>
                           </div>
                        </td>
                     </tr>
                  </tfoot>
               </table>
            </div>

            <div class="row">
               <div class="col-md-5 col-sm-6 col-sm-12 pull-right">
                  <div class="total-box">
                     <div class="tit">Shopping Cart Total</div>
                     <div class="total-box-inner">
                        <!--<div class="sub-total"><span>subtotal </span><span class="price" id ="subtotal">{{ $subtotal}}</span></div>-->
                        <div class="grand-total" style="font-family: serif;"><span>Grand Total </span><span class="price" id ="subtotal">{{ $subtotal}}</span></div>
                        <!--<a class="checkout-btn" href="{{route('checkout')}}"><i class="icon-check-mark"></i>Proceed to checkout-->
                        <a class="checkout-btn" href="{{route('address_checkout')}}"><i class="icon-check-mark"></i>Proceed to checkout
                        {{-- <input type="hidden"  name ="user_id" value="{{ $cartlist['user_id']}}" class="form-control" placeholder="New Category" required> --}}
                    </a>
                    </div>
                    </div>
                  </div>
               </div>

            </div>
         </div>
    
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
      </div>
        </div>
      @include('frontend.includes.script')
  @include('frontend.includes.footer')

  <script type="text/javascript">
		$(document).on('keyup','.quantity',function(e)
		{
		  //  alert ("devi");
            var quantity = $(this).val();
            var cart_id = $(this).data('id');
			var token = "{{csrf_token()}}";
            if(quantity > 0 && cart_id > 0)
            {
                $.ajax({
				type:'POST',
				url:"{{url('/')}}/cartupdate",
			    data:{'_token':token,'quantity':quantity,'id':cart_id},
                dataType:'json',
				success:function(response)
				{
                    $('#product_price_'+cart_id).html('&#x20b9;'+response.product_price);
                    $('#product_gst_'+cart_id).html(response.gst+'%');
                    $('#product_total_'+cart_id).html('&#x20b9;'+response.product_total_price);
                    $("#subtotal").html(response.subtotal);
                    //swal(response.msg, "",response.status);
                    // $('#main').html('<div class="alert alert-info col-ssm-12" >' + response.message + '</div>');
				},
				error:function(xhr,resp,text)
				{
					console.log(xhr,resp,text);
				}
			    })
            }


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
              window.location='/cart'
             }
        });
       });
     });
     
     function validateNumber(e) {
            const pattern = /^[0-9]$/;

            return pattern.test(e.key )
        }
</script>

