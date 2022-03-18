@include('frontend.includes.css')
@include('frontend.includes.header')
	<style>
.sec_1{
	padding-top: 42%;
}
.card-body{
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
  width:67%;
}
input.razorpay-payment-button {
    visibility: hidden;
}
#MyForm{
	display: none;
    width: 100%;
    border: 1px solid #ccc;
    padding: 14px;
    background: #ececec;
}	
h2 {
	padding-top: 50px;
}

h3 {
	color: #633031;
}



label {
	display: block;
	padding-bottom: 5px;
	float:left;
}

input[type=text] {
	border: 1px solid gray;
	padding: 5px;
	width: 100%;
	font-size: 16px;
}

input[type=checkbox] + label {
	display: inline;
}

button {
	    background-color: #996515;
    border: none;
    font-size: 20px;
    color: white;
    padding: 12px;
    cursor: pointer;
    outline: none;
    /*border-radius: 5%;*/
}

button:hover {
	background-color: #cc8400;
}

.card-body{
    padding: 30px 33px 65px 27px;

}
.form {
	background-color: white;
}

.row5 {	
	text-align: center;
	padding:38px;
}

.row1 > *, .row2 > *, .row3 > *, .row4 > *, .row5 > * {
	padding: 10px 5px; 
/*	display: inline-block;*/
}

.billing .row2 {
	padding-top: 20px;
}

.checkbox label {
	vertical-align: middle;
}

.home-button {
	padding-top: 40px;
	text-align: center;
}

.home-button button {
	font-family: "Roboto Slab";
    background-color: orange;
    border-radius: 5px;
    border:none;
    padding: 10px;
    font-size: 20px;
    cursor: pointer;
    color: white;
}

.home-button button:hover {
    background-color: white;
    color: black;
    border: 1px solid black;
}

.button {
  background-color: #996515; /* Green */
  border: none;
  color: white;
  /*padding: 15px 32px;*/
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
@media only screen and (min-width: 960px) {
         font-size: 30px;
    }
@media only screen and (max-width: 600px) {
  #card-section {
  margin-top:169px;
  }
}
/*.edit-form{*/
    
/*}*/

	</style>
      <div class="clearfix"></div>
      <!-- Responsive slider - START -->
      <!--<section class="sub-banner">-->
      <!--   <h2 class="sr-only">Banner</h2>-->
      <!--   <img src="{{asset('public/frontend/images/cart.jpg')}}" alt="banner" class="banner" />-->
      <!--</section>-->
      <!--<section class="breadcrumb-section">-->
      <!--   <div class="container">-->
      <!--      <div class="breadcrumb">-->
      <!--         <ul class="list-inline">-->
      <!--            <li><a href="index.html">Home</a></li>-->
      <!--            <li>Checkout</li>-->
      <!--         </ul>-->
      <!--         <h1 class="page-tit">Checkout</h1>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</section>-->
      <!-- ============ Sub-Banner-End =============== -->
    <div class="container-fluid" style="background-color: #f1f1f1;">
    <div class="content-part cart-page">
         <div class="container">
        
            <form id="checkout-user-form">
                        @csrf
            <input type="hidden" name="txn_id"  value="{{$txn_id}}" />
            <input type="hidden" name="shippingaddress_id"  value="{{$shippingaddress_id}}" />
            </form>
            <div class="table-responsive"style="overflow-x:inherit;padding-top: 5%;">
               <table class="table table-hover table-responsive">
                  <thead>
                     <tr>
                        <th class="product" style="padding-left: 5%;">PRODUCT</th>
                        <th class="name" style="text-align:center;padding-right: 3%;">Name</th>
                        <th class="price" style="text-align:center;">Price</th>
                        <th class="quantity" style="text-align:center;">Quantity</th>
                        <th class="quantity" style="text-align:center;">Gst</th>

                        <th class="total" style="text-align:center;">Total</th>
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
                        <td  class="product-tit"> {{ $cartlist['quantity']}} </td>
                        <td id="product_gst_{{$cartlist['cart_id']}}" ><a href="#">{{ $cartlist['gst']}}&#37;</a></td>

                        <td class="total"><a href="#" id="product_total_{{$cartlist['cart_id']}}">&#x20b9;{{ $cartlist['product_total_price']}}</td>
                        <td class="cancle"><a href="#" class="cancel-cart" id="<?=$cartlist['cart_id']?>"></a>

                        </td>
                        </tr>
                        @endforeach
                        <?php ?>

                  </tbody>
 
               </table>
            </div>
          
            <div class="row">
               <div class="col-md-5 col-sm-6 col-sm-12 pull-right">
                  <div class="total-box">
                     <div class="tit">Shopping Cart Total</div>
                     <div class="total-box-inner"style="background-color: #f3c96dbd;">
                        <!--<div class="sub-total"><span style="font-family: serif;font-size: 20px;">subtotal </span><span class="price" id ="subtotal">{{ $subtotal}}</span></div>-->
                        <div class="grand-total"><span style="font-family: serif;font-size: 20px;">Grand Total </span><span class="price" id ="subtotal" style="font-family: serif;">{{ $subtotal}}</span></div>
                        <!--<a class="checkout-btn" href="{{route('checkout')}}"><i class="icon-check-mark"></i>Proceed to checkout-->
                        <a href="#"><input type="button" class="checkout-btn submit" value="Place Order">
    
                    </a>
                    </div>
                    </div>
                  
                  </div>
                 
                   <div class="col-md-7 col-sm-6 col-sm-12 pull-right">
                  	<div class="card">
					  
                    <div class="card-body">
                        <div class="row">
                             <h3 class="card-title" style="font-family: serif;padding-top:5%;padding-bottom:5%;text-align:center;">DELIVERY  ADDRESS</h3>
					    	 @foreach($shipping as $shipping_user)
					    	 
					    <div class="edit-form">
                         <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;font-family: serif;">First Name<span class="fname"> </div>
                            <div class="col-md-1" >
                                <span style="padding-right: 80%;">:</span>
                            </div>  
                            <div class="col-md-5" style="text-align: left;">
                              {{$shipping_user['first_name']}}</span></div>
                         <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;font-family: serif;">Last Name<span class="lname"> </div>
                            <div class="col-md-1" >
                                    <span style="padding-right: 80%;">:</span>
                            </div>  
                            <div class="col-md-5" style="text-align: left;">
                              {{$shipping_user['last_name']}}</span></div>
                         <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;font-family: serif;">Address<span class="address"> </div>
                      <div class="col-md-1" >
                                    <span style="padding-right: 80%;">:</span>
                            </div> 
                            <div class="col-md-5" style="text-align: left;">
                            {{$shipping_user['shipping_address']}}</span></div>
                             <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;font-family: serif;">Phone No<span class="phone_no"> </div>
                     <div class="col-md-1" >
                                    <span style="padding-right: 80%;">:</span>
                            </div> 
                             <div class="col-md-5" style="text-align: left;">
                                 {{$shipping_user['phone']}}</span></div></div>
                    <!--              <div class="edit_btn" style="padding:10%;font-family: serif;">-->
                    <!--   <a href ="{{url('address_checkout')}}"><button id="editdetail" type="button" class="btn-primary1">Edit Your Details</button></a>-->
                    <!--</div>-->
                    </div>
                      @endforeach
                    <?php
                     ?>
                 </div>
                 </div>
               </div>
               </div>
			 <form action="{{ route('razorpay.payment.store') }}" method="POST" id="payment-form" style="display:none;">
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ config('app.RAZORPAY_KEY') }}"
                                data-amount="{{ $subtotal}}"
                                data-name="seyasoftech.com"
                                data-description="{{$txn_id}}"
                               data-description="{{$shippingaddress_id}}"
                                data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                data-prefill.name="devi"
                                data-prefill.email="devipriya.b@seyasoftech.com"
                                data-theme.color="#ff7529">
                        </script>
                    </form>
                
                 
            </div> 
         </div>
 
 
                  <!--Razorpay form end-->
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
        $(document).ready(function(){
		$(document).on('keyup','.quantity',function(e)
		{
            var quantity = $(this).val();
            var id = $(this).data('id');
            var subtotal = $(this).data('subtotal');
			var token = "{{csrf_token()}}";
			$.ajax({
				type:'POST',
				url:"{{url('/')}}/cartupdate",
			    data:{'_token':token,'quantity':quantity,id:id},
                dataType:'json',
				success:function(response)
				{
                    $('#subtotal').html(response.subtotal);
                    swal(response.msg, "",response.status);
				},
				error:function(xhr,resp,text)
				{
					console.log(xhr,resp,text);
				}
			})
		});


       $(document).on('click','.cancel-cart', function (e)
       {
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

        $(document).on('click','.submit',function(e)
        {
             $('#payment-form').trigger('submit');
            e.preventDefault();
            var data = $("#checkout-user-form").serialize();
            var token = "{{csrf_token()}}";
            // alert ("devi")
            $.ajax({
                type:'POST',
                url:"{{url('/')}}/checkout_user",
                data:data,
                success:function(response)
                {

                swal(response.msg, "",response.status);
                },
                error:function(xhr,resp,text)
                {
                    console.log(xhr,resp,text);
                }
            })

        })


     });
</script>

