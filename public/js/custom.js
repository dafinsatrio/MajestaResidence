/*
	Author: BestPixels
	Template: Home | Single Property HTML Template
	Version: 1.0
*/
	
"use strict";

/*global jQuery, $*/
jQuery(document).ready(function(){
	
	// Smooth scrolling using jQuery easing
	jQuery('a.nav-item[href*="#"]:not([href="#"])').on("click", function() {
		if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
		  var toHash = $(this.hash), toHashN = (this.hash.slice(1)) ? $('[name=' + this.hash.slice(1) + ']') : false;
		  toHash = toHash.length ? toHash : toHashN;
		  if (toHash.length) {
			$('html, body').animate({
			  scrollTop: (toHash.offset().top - 70)
			}, 1000, "easeInOutExpo");
			return false;
		  }
		}
	});
	
	// navigation collapse
	jQuery('.navbar-collapse').on("click", 'li', function() {
        jQuery('.navbar-collapse').collapse('hide');
    });
	
	// header slider
	jQuery('.header-slider').bxSlider({
		mode:'fade',
		pager: false,
		prevText: "",   
		nextText: "",
		onSliderLoad: function(currentIndex) {     
			$('.header-slider').children().eq(currentIndex + 0).addClass('active-slide');
		  },
		  onSlideAfter: function($slideElement){
			$('.header-slider').children().removeClass('active-slide');
			$slideElement.addClass('active-slide');
		}
	});
	
	//magnificPopup	Video
	jQuery('.embaded-popup').magnificPopup({
		type: 'iframe',
		removalDelay: 160,
		preloader: true,
		fixedContentPos: false,
		callbacks: {
		beforeOpen: function() {
			  // just a hack that adds mfp-anim class to markup 
			  this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
			  this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
	});
	
	jQuery('.large-view').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside:true,
		image: {
			verticalFit: false
		},			
		removalDelay: 500, //delay removal by X to allow out-animation
		callbacks: {
			beforeOpen: function() {
		  // just a hack that adds mfp-anim class to markup 
			this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
			this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
		midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.		
	});	
	
	// Item Sliders
	jQuery('.testimonials-list').slick({
		dots: true,
		fade: true,
		adaptiveHeight: true,
		autoplay: true,
		arrows: false,
	});
	
	jQuery('.floor-list').slick({
		dots: true,
		adaptiveHeight: true,
		autoplay: true,
		arrows: false,
	});
	
	
});

