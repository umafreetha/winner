@include('frontend.includes.css')
@include('frontend.includes.header')
    <div class="clearfix"></div>
    <!-- Banner -->
    <section class="sub-banner">
      <h2 class="sr-only">Banner</h2>
      <img src="{{asset('public/frontend/images/aboutbanner.jpg')}}" alt="banner" class="banner" />
    </section>
    <!-- /Banner -->
    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
      <div class="container">
        <div class="breadcrumb">
          <ul class="list-inline">
            <li><a href="index.html">Home</a></li>
            <li>Checkout</li>
          </ul>
          <h1 class="page-tit">Checkout</h1>
        </div>
      </div>
    </section>
    <!-- /Breadcrumb -->
    <!-- Content -->
    <div class="content-part checkout-page">
      <div class="container">

        <div class="checkout-step-two text-left">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <h2 class="checkout-head">01 / Billing & Shipping details</h2>
              <div class="row">
                <div class="checkout-two-form text-left">
                  <form id="checkout-user-form">

                    @csrf
                    <input type="hidden" name="txn_id"  value="{{$txn_id}}" />
                    <div class="col-md-6 col-sm-6 col-xs-12" style="font-family:serif;">
                      <input type="text" name="f_name" class="form-control" placeholder="first name" required / >
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12" >
                      <input type="text" name="l_name" class="form-control" placeholder="last name"required />
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-12">
                      <input type="text" name="address" class="form-control" placeholder="Address" required />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="state" class="form-control" placeholder="state" required/>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="country" class="form-control" placeholder="country" required/>
                      </div>
                      <div class="col-md-12 col-sm-6 col-xs-12">
                        <input type="text" name="city" class="form-control" placeholder="city" required/>
                      </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <input type="text" name="pincode" class="form-control" placeholder="Postcode / ZIP" required/>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="phone" class="form-control" placeholder="phone" required />
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="email" class="form-control" placeholder="email" required />
                    </div>

                    <input type="button" class="btn btn-info submit" value="Submit" style="margin-left:18px;
                        background-color: green;
                        border-color: green; width:100px;">


                  </form>
                 
                  <form action="{{ route('razorpay.payment.store') }}" method="POST" id="payment-form" style="display:none;">
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ config('app.RAZORPAY_KEY') }}"
                                data-amount="{{ $subtotal}}"
                                data-buttontext="Pay 10000 INR"
                                data-name="seyasoftech.com"
                                data-description="{{$txn_id}}"
                                data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                data-prefill.name="devi"
                                data-prefill.email="devipriya.b@seyasoftech.com"
                                data-theme.color="#ff7529">
                        </script>
                    </form>
                
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <h2 class="checkout-head">Your Order</h2>
              <div class="checkout-order-table text-left">
                <table class="table-responsive">
                  <thead>
                    <tr class="th-head">
                      <th scope="col" width="68%">PRODCUT</th>
                      <th scope="col" width="42%">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  ?>
                    @foreach ($cart_val as $cartlist)
                    <tr>
                      <td>{{ $cartlist['product_name']}}</td>
                      <td>&#x20b9;{{ $cartlist['product_total_price']}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>

                    <tr class="cart-total">
                      <td>TOTAL</td>
                      <td>&#x20b9;{{ $subtotal}}</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="checkout-step-three text-left">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="center row">
                <div class="checkout-three-form text-left">
                  <form>
                    <div class="row">


                      <div class="col-md-12 col-sm-12 col-xs-12">


                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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
