jQuery(document).ready(function() {
	    jQuery('.venobox').venobox(); 

		jQuery('.testimonial-row').addClass("hidden").viewportChecker({
				classToAdd: 'visible animated fadeInUp',
				offset: 100
			 });

		jQuery('.branding-row-inner').addClass("hidden").viewportChecker({
				classToAdd: 'visible animated fadeInLeft',
				offset: 100
			 });
		jQuery('.team-row-img').addClass("hidden").viewportChecker({
				classToAdd: 'visible animated fadeIn',
				offset: 100
			 });
		jQuery('.join-row-img-container').addClass("hidden").viewportChecker({
				classToAdd: 'visible animated fadeInLeft',
				offset: 100
			 });
		jQuery('.front-icons-row').addClass("hidden").viewportChecker({
				classToAdd: 'visible animated fadeInUp',
				offset: 100
			 });

			jQuery('.video-row-rev').one('mouseover', function(ev) {

				jQuery("#video-rev")[0].src += "&autoplay=1";
				ev.preventDefault();

			});

			// Mobile Nav Click Functions
			jQuery('.nav-overlay-open').click(function() {
				jQuery('.nav-overlay').fadeIn(500);
			});
			jQuery('.nav-overlay-close').click(function() {
				jQuery('.nav-overlay').removeAttr( 'style' );
			});
			jQuery('.nav-overlay').click(function() {
				jQuery(this).removeAttr( 'style' );
			});


			// Mobile Nav Click Functions
//			jQuery('.bit-cart').click(function() {
//				jQuery('.shopping-cart').fadeIn(500);
//			});
//			jQuery('.shopping-cart-close').click(function() {
//				jQuery('.shopping-cart').removeAttr( 'style' );
//			});
//				jQuery('.nav-overlay').click(function() {
//					jQuery(this).removeAttr( 'style' );
//				});


			// Video Overlay
			jQuery('.video-overlay-open').click(function() {
				jQuery('.video-overlay').fadeIn(500);
				jQuery("#video-rev")[0].src += "&autoplay=1";
				ev.preventDefault();
			});
			jQuery('.video-overlay-close').click(function() {
				jQuery('.video-overlay').removeAttr( 'style' );
				jQuery("#video-rev")[0].src = "https://www.youtube.com/embed/YOlSfZJ-A28?showinfo=0&rel=0";
				ev.preventDefault();
			});
			jQuery('.video-overlay').click(function() {
				jQuery(this).removeAttr( 'style' );
				jQuery("#video-rev")[0].src = "https://www.youtube.com/embed/YOlSfZJ-A28?showinfo=0&rel=0";
				ev.preventDefault();
			});

			// Invoice Overlay
			jQuery('.invoice-overlay-one-open').click(function() {
				jQuery('.invoice-overlay-one').fadeIn(500);
			});
			jQuery('.invoice-overlay-one').click(function() {
				jQuery(this).removeAttr( 'style' );
			});

			// Invoice Overlay
			jQuery('.invoice-overlay-two-open').click(function() {
				jQuery('.invoice-overlay-two').fadeIn(500);
			});
			jQuery('.invoice-overlay-two').click(function() {
				jQuery(this).removeAttr( 'style' );
			});
	
	//Slick Sliders
	  jQuery('.cas-slider-body').slick({
			prevArrow: '.cas-slider-left',
			nextArrow: '.cas-slider-right'
		});
	//Accordion
  var allPanels = jQuery('.accordion > dd').hide();
    
  jQuery('.accordion > dt > a').click(function() {
    allPanels.slideUp();
    jQuery(this).parent().next().slideDown();
    return false;
  });
	
	//New Nav
	jQuery('.cn-search-mob-link').click(function(){
		jQuery('.cn-search-mob').slideToggle( "fast ", function(){
			if(jQuery('.cn-menu-mob').not(":hidden"))
			{
			 jQuery('.cn-menu-mob').hide();
			}
		});
	});
	jQuery('.cn-menu-mob-link').click(function(){
		jQuery('.cn-menu-mob').slideToggle( "fast ", function(){
			if(jQuery('.cn-search-mob').not(":hidden"))
			{
			 jQuery('.cn-search-mob').hide();
			}
		});
	});
});


jQuery('.cas-slider-body').on('beforeChange', function(event, slick, currentSlide, nextSlide){
	console.log(currentSlide);
	var beforeClass = '.cs-' + currentSlide;
	var nextClass = '.cs-' + nextSlide;
	jQuery(beforeClass).removeClass('cs-active');
	jQuery(nextClass).addClass('cs-active');
});

function goSlick(slide){
  jQuery('.cas-slider-body').slick('slickGoTo', slide);
}





function tlshow(i){
  jQuery('.tf').addClass('hide-from-cas');
  jQuery('.tl').removeClass('strong');
  var j = '.tf-' + i;
  var k = '.tl-' + i;
  jQuery(j).removeClass('hide-from-cas');
  jQuery(k).addClass('strong');
}