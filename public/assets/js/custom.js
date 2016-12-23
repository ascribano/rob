$(window).load(function() {
    "use strict";
	
	
    /*----------------------------- Scroll To Top -----------------------*/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#scrollup').fadeIn();
		} else {
			$('#scrollup').fadeOut();
		}
	});

	$('#scrollup').on('click',function(){
		$('html, body').animate({
		scrollTop: 0
	}, 2000);
	return false;
	});
	
	/*----------------------------- Revolution Slider -----------------------*/
	jQuery('#fullwidthbanner').revolution ({
		delay: 5000,
		startwidth: 940,
		startheight: 600,
		onHoverStop: 'on',            // Stop Banner Timet at Hover on Slide on/off
		thumbWidth: 100,            // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
		thumbHeight: 50,
		thumbAmount: 4,
		hideThumbs: 200,
		navigationType: 'none',         // Bullet, thumb, none, both   (No Shadow in Fullwidth Version !)
		navigationArrows: 'verticalcentered', // Nexttobullets, verticalcentered, none
		navigationStyle: 'round',       // Round,square,navbar
		touchenabled: 'on',           // Enable Swipe Function : on/off
		navOffsetHorizontal: 0,
		navOffsetVertical: 20,
		fullWidth: 'on',
		shadow: 0               //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
	});
	

	// Detecting IE
	var oldIE;
	if ($('html').is('.lt-ie7, .lt-ie8, .lt-ie9')) {
		oldIE = true;
	}

	if (oldIE) {
		// Here's your JS for IE..
	} else {
		// ..And here's the full-fat code for everyone else
	}



	/*----------------------------- Progress-bar -----------------------*/
	$('.progress .progress-bar').progressbar({display_text: 'top'});
	
	
	/*----------------------------- Gmaps -----------------------*/	
	  var map;
	  $('.ev-map-display').each(function() {
		  var myLatLng = {lat: -33.91411000, lng:151.2401000};

		  var map = new google.maps.Map(document.getElementById('map'), {
			  zoom: 15,
			  center: myLatLng
		  });

		  var marker = new google.maps.Marker({
			  position: myLatLng,
			  map: map,
			  title: 'Anytime Offices'
		  });

	  });
	
	/*------------------------------ Pre Loader ----------------------*/

	$('.loader').fadeOut();
	$('.preloader').delay(250).fadeOut('slow');
	$('body').delay(250).css({'overflow':'visible'});
   
   
    /*-------------------- For Isotope Image-loader ------------------*/
	$('#isotope').imagesLoaded( function() {
	   var $container = $('.isotope').isotope({
		itemSelector: '.element-item'
	  });
	});
}(jQuery));