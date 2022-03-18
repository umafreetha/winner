<script src="{{asset('public/frontend/js/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap v3.3.7 -->
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- carousels -->
    <script src="{{asset('public/frontend/js/responsive-slider.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.event.move.js')}}"></script>
    <!-- Value Slider -->
    <script src="{{asset('public/frontend/js/bootstrap-slider.min.js')}}"></script>
    <!-- Responsive Tab -->
    <script src="{{asset('public/frontend/js/responsiveTabs.min.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- <script type="text/javascript">
		$(document).hover('.icon-shopping-bag',function(e)
		{
            alert("devi");
                $.ajax({

				url:"{{url('/')}}/cartlist",
			     success:function(response)
				{

              swal(response.msg, "",response.status);
                    // $('#main').html('<div class="alert alert-info col-ssm-12" >' + response.message + '</div>');
				},
				error:function(xhr,resp,text)
				{
					console.log(xhr,resp,text);
				}
			})
		});
</script> -->
<script>
    
// number count for stats, using jQuery animate

$('.counting').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 3000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
  

});
</script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <!-- Smoothproducts -->
    <script src="{{asset('public/frontend/js/smoothproducts.min.js')}}"></script>
    <!-- Sameheight -->
    <script src="{{asset('public/frontend/js/jquery.matchHeight-min.js')}}"></script>
    <!-- Gallery with tab  -->
    <script src="{{asset('public/frontend/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/isotope.pkgd.js')}}"></script>
    <!-- Custom Sripts -->
    <script src="{{asset('public/frontend/js/custom.js')}}"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script href="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn_avt");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "1% 0 0% 0";
    document.getElementById("navbar").style.background = "rgb(44 39 33)";
  
    document.getElementById("logo").style.width = "300px";
    
  } else {
    document.getElementById("navbar").style.padding = "1% 0 2% 0";
    document.getElementById("navbar").style.background = "rgb(44 39 33)";
     document.getElementById("logo").style.width = "400px";
    
  }
}


</script>
