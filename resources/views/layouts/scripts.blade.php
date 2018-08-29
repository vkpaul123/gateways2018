<script src="{{ asset('nevada/nevada1/assets/js/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('nevada/nevada1/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('nevada/nevada1/assets/js/jquery.actual.min.js') }}"></script>
<script src="{{ asset('nevada/nevada1/assets/js/jquery.scrollTo.min.js') }}"></script>
{{-- <script src="{{ asset('nevada/nevada1/assets/js/contact.js') }}"></script> --}}
<script src="{{ asset('nevada/nevada1/assets/js/script.js') }}"></script>
<script src="{{ asset('nevada/nevada1/assets/js/smoothscroll.js') }}"></script>

<script type="text/javascript">
jQuery(document).ready(function($){
  	$(window).scroll(function() {
  		
  		console.log("asdf");

		if ($(window).scrollTop() > 25 ){
    
 		$('.top-header').addClass('shows');
    
  		} else {
    
   	 	$('.top-header').removeClass('shows');
    
 		};   	
	});

});

// jQuery(document).ready(function($) {
//   $('.top-header').addClass('shows')
// });

jQuery(document).ready(function () {
  jQuery('#registration1').click(function() {
    jQuery('html, body').animate({
      scrollTop: jQuery("#registration").offset().top
    }, 1000);
  });

  jQuery('#portfolio1').click(function() {
    jQuery('html, body').animate({
      scrollTop: jQuery("#portfolio").offset().top
    }, 1000);
  });

  jQuery('#services1').click(function() {
    jQuery('html, body').animate({
      scrollTop: jQuery("#services").offset().top
    }, 1000);
  });

  jQuery('#testimonials1').click(function() {
    jQuery('html, body').animate({
      scrollTop: jQuery("#testimonials").offset().top
    }, 1000);
  });

  jQuery('#about1').click(function() {
    jQuery('html, body').animate({
      scrollTop: jQuery("#about").offset().top
    }, 1000);
  });

   jQuery('#login').click(function() {
    jQuery('html, body').animate({
      scrollTop: jQuery("#login1").offset().top
    }, 1000);
  });

 jQuery('#registration2').click(function() {
    jQuery('html, body').animate({
      scrollTop: jQuery("#registration").offset().top
    }, 1000);
  });

});

jQuery('.scroll').on('click', function(e){		
		e.preventDefault()
    
  jQuery('html, body').animate({
      scrollTop : jQuery(this.hash).offset().top
    }, 1500);
});


</script>

@section('pageSpecificScripts')
	@show