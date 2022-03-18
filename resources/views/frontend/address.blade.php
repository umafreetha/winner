@include('frontend.includes.css')
@include('frontend.includes.header')

	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">-->
	<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css">-->
 	<!--<link rel="stylesheet" href="https://mdbootstrap.com/"> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
.sec_1{
	/*padding-top: 5%;*/
	background-color:#f1f1f1;
}
.card-body{
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
}


#MyForm{
	display: none;
    width: 100%;
    border: 1px solid #ccc;
    padding: 14px;
    background: #ececec;
}	
/*h2 {*/
/*	padding-top: 50px;*/
/*}*/

h3 {
	    color: #633031;
}



label {
    display: block;
    padding-bottom: 5px;
    float: left;
    font-family: serif;
    font-size: 20px;
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
    padding: 11px;
    cursor: pointer;
    outline: none;
   
}

button:hover {
	background-color: #cc8400;
}

.card-body{
    padding: 27px 27px 22px 27px;
    font-family: serif;
    font-size: 20px;

}
.form {
	background-color: white;
}

.row5 {	
    text-align: center;
    padding-top: 38px;
}

.row1 > *, .row2 > *, .row3 > *, .row4 > *, .row5 > * {
    padding: 10px 42px 42px 49px;
    /* display: inline-block; */
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

.button1 {
          background-color: #996515;
    border: none;
    color: white;
    padding: 23px 100px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 50px 50px 50px 50px;
    cursor: pointer;
    font-family: serif;
}
@media only screen and (min-width: 960px) {
         font-size: 30px;
    }
@media only screen and (max-width: 600px) {
  #card-section {
  margin-top:169px;
  }
}
/*.title{*/
/*    padding-top:10%;*/
/*}*/
.card-title{
       padding-top: 5%;
    font-family: serif;
    padding-bottom: 5%;
}
.btn-primary1{
          color: #fff;
    background-color: #996515;
    /* border-color: #2e6da4; */
    font-size: 20px;
    font-family: serif;
}
.edit_btn{
        padding-top: 9%;
    padding-bottom: 5%;
    
}
.btn_align{
        padding-top: 2%;
    padding-bottom: 5%;
}
.frm_align{
    padding-top:4%;
}
	</style>
	</head>
  <!--<section class="sub-banner">-->
  <!--  <h2 class="sr-only">Banner</h2>-->
  <!--    <img src="{{asset('public/frontend/images/aboutbanner.jpg')}}" alt="banner" class="banner" />-->
  <!--  </section>-->
		<div class="container-fluid sec_1">
		   <div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
					    <h3 class="card-title">BILLING ADDRESS</h3>
					    
                         <div class="card-body" id="card-section">
                                         <div class="row" style="padding-top: 5%;">
                                         <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;">First Name<span class="fname"> </div>
                                             <div class="col-md-1" >
                                                 <span style="padding-right: 80%;">:</span>
                                             </div>  
                                             <div class="col-md-5" style="text-align: left;">
                                             {{$user_details[0]['f_name']}}</span> </div> 
                                         </div>
                                        <div class="row">
                                         <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;">Last Name<span class="lname"></div>
                                          <div class="col-md-1">
                                                 <span style="padding-right: 80%;">:</span>
                                             </div>
                                             
                                             <div class="col-md-5" style="text-align: left;">
                                             {{$user_details[0]['l_name']}} </span></div>
                                             </div>
                                             <div class="row">
                                          <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;">Address<span class="address"></div> 
                                          <div class="col-md-1">
                                                 <span style="padding-right: 80%;">:</span>
                                             </div>
                                         
                                          <div class="col-md-5" style="text-align: left;">
                                          {{$user_details[0]['address']}}</span> </div>
                                            </div>
                                         
                                            <div class="row">
                                          <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;">Phone  <span class="phone"></div>
                                          <div class="col-md-1">
                                                 <span style="padding-right: 80%;">:</span>
                                             </div>
                                        
                                             <!--<div class="col-md-4" style="text-align: left;">-->
                                             <!-- {{$user_details[0]['phone']}}</span> </div>-->
                                     </div>
                                     <div class="edit_btn">
                                     <button id="Mybtn" class="btn-primary1">Edit Your Details</button>
                                     </div>
                                    </div>

                          <div class="frm_align">
                                   <form id="MyForm" name="MyForm" method="post" >
                                       	    {{csrf_field()}}
  	                         	<div class="title">
					          <h3 style="font-family: serif;">BILLING ADDRESS</h3>
			             	</div>
			             	<div class="shipping">
					        <div class="row1">
					<div class="first-name"><label for="">First Name</label>
					 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
					<input type="text" id="f_name" name="f_name" placeholder="First Name" required / style="font-family:serif;"></div>
					<div class="last-name"><label for="">Last Name</label><input type="text" id="l_name" name="l_name" placeholder="Last Name" style="font-family:serif;"></div>
			     	</div>
					<div class="row2">
					<div class="address"><label for="">Address</label>
					 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
					 <input type="text" id="address" name="address" placeholder="Address" required / style="font-family:serif;"></div>
					<div class="postal-code"><label for="">ZIP/Postal Code</label> <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
					
					<input type="text" id="zip_code" name="zip_code" placeholder="zip_code" required / style="font-family:serif;"></div>
				  </div>
				    <div class="row3">
					<div class="city"><label for="">City</label>
					 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
					<input type="text" id="city" name="city" placeholder="City" required / style="font-family:serif;"></div>
				    <div class="city"><label for="">Country</label>
				     <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
				    <input type="text"  id="country" name="country" placeholder="Country" required / style="font-family:serif;"></div>
					</div>
					<div class="row4">
				  <div class="state"><label for="">State</label>
				   <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
				  <input type="text"  id= "state" name="state" placeholder="State" required/ style="font-family:serif;"></div>
			 	<div class="phone"><label for="">Phone</label>
			 	 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
			 	<input type="text"  id= "phone" name="phone" placeholder="91+" required></div>
				</div>
		      
	             	<div class="row5 btn_align">
		            <button class="button" id="updateaddress" type="button" style="padding-top:2%;padding-bottom:2%;font-family: serif;">UPDATE</button>
		        	</div>
	            </form>
</div>   
</div>
</div>
</div>

				<div class="col-lg-6">
					<div class="card">
					      <h3 class="card-title">SHIPPING  ADDRESS</h3>
					    	 @foreach($shipping as $shipping_address)
                            <div class="card-body">
                                <div class="row" style="padding-top:5%;">
                                        <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;">First Name
                                        <span class="first_name">
                                           </div>
                                           <div class="col-md-1">
                                                 <span style="padding-right: 80%;">:</span>
                                             </div>
                                              <div class="col-md-5" style="text-align: left;">
                                          {{$shipping_address['first_name']}}</span></div> 
                                       </div>
                                       <div class="row">
                                        <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;">Last Name<span class="last_name">
                                         </div>
                                             <div class="col-md-1">
                                                 <span style="padding-right: 80%;">:</span>
                                             </div>
                                          <div class="col-md-5" style="text-align: left;">
                                               {{$shipping_address['last_name']}}</span></div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;">Address<span class="shipping_address">
                                           </div>
                                            <div class="col-md-1">
                                                 <span style="padding-right: 80%;">:</span>
                                             </div>
                                          <div class="col-md-5" style="text-align: left;">
                                               {{$shipping_address['shipping_address']}}</span></div>
                                        </div>
                                        <div class="row">
                                         <div class="col-md-6 card-text" style="text-align:right;font-size: 20px;color: #161108;font-weight: 500;">Phone No<span class="phone">
                                           </div> 
                                      <div class="col-md-1">
                                                 <span style="padding-right: 80%;">:</span>
                                             </div>
                                          <div class="col-md-5"style="text-align: left;">
                                               {{$shipping_address['phone']}}</span></div>
                                  </div>
                                  <div class="edit_btn">
                                   <button id="editdetail" class="btn-primary1">Edit Your Details</button>
                                   </div>
                            </div>
                     @endforeach
                    <?php
                     ?>
               <div class="form">                                
			  <form  id="myformdata" name="myformdata" method="post" action="#" novalidate style="background-color:#e0b861;">	
			    {{csrf_field()}}
					<div class="title">
					<h3 style="padding-top: 5%;font-family: serif;">ADD SHIPPING ADDRESS</h3>
				</div>
				
				
				<div class="row1">
					<div class="first-name"><label for="">First Name</label> <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span><input type="text" id= "first_name" name="first_name" placeholder="First Name" required/ style="font-family:serif;"></div>
					<div class="last-name"><label for="">Last Name</label><input type="text" id= "last_name" name="last_name" placeholder ="Last Name" style="font-family:serif;"></div>
				</div>
				
				<div class="row2">
					<div class="address"><label for="">Address</label>
					 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
					<input type="text"  id= "shipping_address" name="shipping_address" placeholder="Address" required/ style="font-family:serif;"></div>
					<div class="postal-code"><label for="">ZIP/Postal Code</label>
					 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
					<input type="text" id= "zip_code" name="zip_code" placeholder="zip_code" required/ style="font-family:serif;"></div>
				</div>
				
				<div class="row3">
					<div class="city"><label for="">City</label>
					 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
					<input type="text" id= "city"  name="city" placeholder="City" required/ style="font-family:serif;" ></div>
			     	<div class="city"><label for="">Country</label>
			     	 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
			     	<input type="text" id= "country"  name="country" placeholder="Country" required/ style="font-family:serif;"></div>
				</div>
				<div class="row4">
				  <div class="state"><label for="">State</label>
				   <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
				  <input type="text"  id= "state" name="state" placeholder="State" required/ style="font-family:serif;"></div>
			 	<div class="phone"><label for="">Phone</label>
			 	 <span style="color: red !important; display: inline; float: left;font-size:20px;">*</span>
			 	<input type="text"  id= "phone" name="phone" placeholder="91+" required/ style="font-family:serif;"></div>
				</div>
			</div>
			

		<div class="row5">

 <button class="button" id="updateshipping_address"  type="button" style="padding-top:2%;padding-bottom:2%;font-family: serif;">SAVE</button>  

 
			
		
		</div>
			  <span class="button1"> <a href="{{url('billingcheckout')}}">PROCEED TO PAYMENT</a></span>
	</form>

	</div>

				</div>
			</div>
	    </div>
</div>
		<script>
$(document).ready(function(){
	$('#Mybtn').click(function(){
  		$('#MyForm').toggle(500);
  		
  		var fname = $(this).parent().find(".fname").html();
  		$("#f_name").val(fname);
  		var lname = $(this).parent().find(".lname").html();
  		$("#l_name").val(lname);
  		 var address = $(this).parent().find(".address").html();
  		$("#address").val(address);
  	   var phone = $(this).parent().find(".phone").html();
  		$("#phone").val(phone);
  	
 
  });
});

$(document).ready(function(){
	$('#editdetail').click(function(){
  		$('#myformdata').toggle(500);
  		var first_name = $(this).parent().find(".first_name").html();
  		$("#first_name").val(first_name);
  		var last_name = $(this).parent().find(".last_name").html();
  		$("#last_name").val(last_name);
     	var shipping_address = $(this).parent().find(".shipping_address").html();
  		$("#shipping_address").val(shipping_address);
  	     var phone = $(this).parent().find(".phone").html();
  		$("#phone").val(phone);
  	
 
  });
});

</script>
<script type='text/javascript'>
 
     $("#updateaddress").click(function(e) {
      e.preventDefault();
       var name = $('#MyForm').serialize();
       console.log(name);
            $.ajax({
            url: "{{url('/')}}/editaddressform",
            method: 'post',
            data: name,
            success: function(data){
                window.location='address_checkout'
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        })
    });
      
      $("#updateshipping_address").click(function(e) {
      e.preventDefault();
      var name = $('#myformdata').serialize();
      console.log(name);
              $.ajax({
            url: "{{url('/')}}/edit_billing_address",
            method: 'post',
            data: name,
            success: function(data){
              window.location='address_checkout' 
            },
            error: function (data) {
                console.log('An error occurred.');
                +
                ++
                console.log(data);
            },
        })
    });   
</script>
  @include('frontend.includes.script')
    @include('frontend.includes.footer')
