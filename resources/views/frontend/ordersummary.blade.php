@include('frontend.includes.css')
@include('frontend.includes.header')
<html>
<head>
    
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css">-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <style>



body {
   /* background: rgb(213, 217, 233);*/
  /*  min-height: 100vh;
    vertical-align: middle;
    display: flex;*/
    font-family: Muli;
    font-size: 14px
}

.card {
    margin: auto;

    max-width: 600px;
    border-radius: 20px
}

.mt-50 {
    margin-top: 50px
}

.mb-50 {
    margin-bottom: 50px
}

@media(max-width:767px) {
    .card {
        width: 80%
    }
}

@media(height:1366px) {
    .card {
        width: 75%
    }
}

#orderno {
    padding: 1vh 2vh 0;
    font-size: smaller
}

.gap .col-2 {
    background-color: rgb(213, 217, 233);
    width: 1.2rem;
    padding: 1.2rem;
    margin-top: -2.5rem;
    border-radius: 1.2rem
}

.title {
    display: flex;
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
    padding: 12%
}

.main {
    padding: 0 2rem
}

.main img {
    border-radius: 7px
}

.main p {
    margin-bottom: 0;
    font-size: 0.75rem
}

#sub-title p {
    margin: 1vh 0 2vh 0;
    font-size: 1rem
}

.row-main {
    padding: 1.5vh 0;
    align-items: center
}

hr {
    margin: 1rem -1vh;
    border-top: 1px solid rgb(214, 214, 214)
}

.total {
    font-size: 1rem
}

@media(height: 1366px) {
    .main p {
        margin-bottom: 0;
        font-size: 1.2rem
    }

    .total {
        font-size: 1.5rem
    }
}

.card1 {
  width: 500px;
  height:280px;
  margin:50px auto 0;
  border:1px solid #ccc;
  background:lighten(#F0EAD6,5);
  text-shadow: 0px 1px rgba(0,0,0,.1), 0px -1px rgba(255,255,25,.1);
  text-align:center;
  font-variant:small-caps;
  padding: 1em;  
  position: relative;
  
  &:before {
    content:"";
    position:absolute;
    left:0;
    top:0;
    bottom:0;
    right:0;
    transform:rotate(-.5deg);
    opacity:.1;
    background:url(http://www.photos-public-domain.com/wp-content/uploads/2011/03/white-linen-paper-texture.jpg) no-repeat;
  }
  * {
  font-weight:normal !important;}

}
.card1-inner {
  content:"";
  width:100%;
  height:100%;
  padding:0 2em;
  border:3px solid lighten(#E3DAC9, 6);
  padding-top: 3em;
  font-size:1em;
  position: relative;
}
h3 {
  margin:.7em 0 1em;
}
p {
  margin:.4em 0;
}
.bottom {
  display:inline-block;
  margin-top: 4.9em;
  padding:0 1em;
  font-size:.9em;
  background:lighten(#F0EAD6,5);
  text-decoration:none;
  color:inherit;
  
  &:hover {text-decoration:underline;}
}

.tbl_sec{
    padding-top:10%;
    padding-bottom:10%;
}



</style>
</head>
<body>

<!--<div class="container-fluid tbl_sec">-->
<!--  <div class="container">-->
<!--    <div class="row">-->
<!--<table>-->
  
<!--  <thead>-->
<!--    <th>SI.NO</th>-->
<!--    <th>Product Name</th>-->
<!--    <th>Quantity</th>-->
<!--    <th>Price</th>-->
<!--    <th>Tax</th>-->
<!--  <th>Total</th>-->
<!--  </thead>-->
  
<!--  <tbody>-->
<!--    <tr>-->
<!--      <td data-label="si.no">1</td>-->
<!--      <td data-label="product-name">test</td>-->
<!--      <td data-label="quantity">2</td>-->
<!--      <td data-label="price">100</td>-->
<!--      <td data-label="tax">20</td>-->
<!--  <td data-label="total">120</td>-->
<!--    </tr>-->
      
<!--    <tr>-->
<!--      <td data-label="si.no">2</td>-->
<!--      <td data-label="product-name">test1</td>-->
<!--      <td data-label="quantity">2</td>-->
<!--      <td data-label="price">100</td>-->
<!--      <td data-label="tax">20</td>-->
<!--  <td data-label="total">120</td>-->
<!--    </tr>-->
      
<!--    <tr>-->
<!--      <td data-label="si.no">3</td>-->
<!--      <td data-label="product-name">test2</td>-->
<!--      <td data-label="quantity">2</td>-->
<!--      <td data-label="price">100</td>-->
<!--      <td data-label="tax">20</td>-->
<!--  <td data-label="total">120</td>-->
<!--    </tr>-->
      
<!--      <tr>-->
<!--      <td data-label="si.no">4</td>-->
<!--      <td data-label="product-name">test3</td>-->
<!--      <td data-label="quantity">2</td>-->
<!--      <td data-label="price">100</td>-->
<!--      <td data-label="tax">20</td>-->
<!--  <td data-label="total">120</td>-->
<!--    </tr>-->
<!--  </tbody>-->
  
<!--</table>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
<div class="card1">
  <div class="card1-inner">
    <h2>Adam Leith</h2>
    
    <p>Web Developer and Designer living in Montreal.</p>
    <p>Excited to meet and work with you.</p>
    <a href="mailto:adamleithp@me.com" target="_blank" class="bottom">Contact Me</a>
  </div>
</div>
</div>
      <div class="col-lg-6">
<div class="card1">
  <div class="card1-inner">
    <h2>Adam Leith</h2>
    
    <p>Web Developer and Designer living in Montreal.</p>
    <p>Excited to meet and work with you.</p>
    <a href="mailto:adamleithp@me.com" target="_blank" class="bottom">Contact Me</a>
  </div>
</div>
</div>
</div>
</div>
</div>

<div class="container tbl_sec">
    <div class="col-lg-12">
  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Product</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-th="Product">
          <div class="row">
            <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive" /></div>
            <div class="col-sm-10">
              <h4 class="nomargin">Product 1</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </td>
        <td data-th="Price">$5.11</td>
        <td data-th="Quantity">
          <input type="number" class="form-control text-center" value="1">
        </td>
        <td data-th="Subtotal" class="text-center">$5.11</td>
       
      </tr>
    </tbody>
    <tfoot>
      <tr class="visible-xs">
        <td class="text-center"><strong>Total $ 5.11</strong></td>
      </tr>
      <tr>
        <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Total $ 5.11</strong></td>
        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
      </tr>
    </tfoot>
  </table>
  </div>
</div>

</body>
</html>


@include('frontend.includes.script')
@include('frontend.includes.footer')