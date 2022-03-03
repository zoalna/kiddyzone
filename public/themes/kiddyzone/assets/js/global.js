
jQuery(document).ready(function($) {
 $("#menu .navbar-toggle").click(function(){
  $(".navbar-collapse").toggleClass("show");
});
	$('#main-banner,.gellery').owlCarousel({		
		autoPlay: 5000,
		singleItem: true,
		navigation: true,
		pagination: true,
		transitionStyle : "fade"
	});
		$('#latestblog').owlCarousel({		
		autoPlay: 5000,
		singleItem: true,
		navigation: false,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,


	});
	
	$('.content #special-slider').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [979, 2],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});


	$('#latest-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	$('#special-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,		
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	$('#related-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 3],
		itemsTabletSmall : false,
		itemsMobile : [479, 2]
	});
	$('#bestseller-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,		
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});	
	$('#bathroom-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	$('#outdoor-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});	
	$('#kitchen-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	
	 $('#brand_carouse').owlCarousel({
        items: 6,
        navigation: false,
        pagination: false,
		loop:true,
		itemsDesktop : [1199, 6],
		itemsDesktopSmall : [979, 6],
		itemsTablet : [768, 4],
		itemsMobile : [479, 3]
    });
	
	$('#testimonial').owlCarousel({
		items: 1,
		autoPlay: true,
		navigation: false,
		pagination: true,
		
		itemsDesktop : [1199, 1],
		itemsDesktopSmall : [979, 1],
		itemsTablet : [768, 1]
	});
	$('.content #latest-blog').owlCarousel({
		items: 3,
		navigation: false,
		pagination: false,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [979, 2],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	
	$('#latestblog').owlCarousel({		
		autoPlay: 5000,
		singleItem: true,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,


	});

	$('#related-slider').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [979, 2],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	$('#product-thumbnail').owlCarousel({
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 4],
		itemsTabletSmall : false,
		itemsMobile : [479, 3]
	});

	
	
});
$(window).load(function() {
$(".preloader").removeClass("loader");
$(".preloader").css("display","none");
});
	
$.fn.tabs = function() {
	var selector = this;
	this.each(function() {
		var obj = $(this);
		$(obj.attr('href')).hide();
		obj.click(function() {
			$(selector).removeClass('selected');
			$(this).addClass('selected');
			$($(this).attr('href')).fadeIn();
			$(selector).not(this).each(function(i, element) {
					$($(element).attr('href')).hide();
			});
			return false;
		});
	});
	$(this).show();
	$(this).first().click();
};



// jQuery( function($) {
//     $( "#slider-range" ).slider({
//       range: true,
//       min: 0,
//       max: 3000,
//       values: [ 0, 3000 ],
//       slide: function( event, ui ) {
//         $( "#min-amount" ).val( "$" + ui.values[ 0 ]  );
// 		$( "#max-amount" ).val( "$" + ui.values[ 1 ] );
//       }
//     });
//     //$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
//      // " - $" + $( "#slider-range" ).slider( "values", 1 ) );
// 	  $( "#min-amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) );
// 	   $( "#max-amount" ).val( "$" + $( "#slider-range" ).slider( "values", 1 ) );
//   } );

var deadline = new Date("Feb 10, 2023 18:37:25").getTime();             
var x = setInterval(function() {
   var currentTime = new Date().getTime();                
   var t = deadline - currentTime; 
   var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
   var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
   var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
   var seconds = Math.floor((t % (1000 * 60)) / 1000); 
   document.getElementById("day").innerHTML =days; 
   document.getElementById("hour").innerHTML =hours; 
   document.getElementById("minute").innerHTML = minutes; 
   document.getElementById("second").innerHTML =seconds; 
   if (t < 0) {
      clearInterval(x); 
      document.getElementById("time-up").innerHTML = "TIME UP"; 
      document.getElementById("day").innerHTML ='0'; 
      document.getElementById("hour").innerHTML ='0'; 
      document.getElementById("minute").innerHTML ='0' ; 
      document.getElementById("second").innerHTML = '0'; 
   } 
}, 1000); 