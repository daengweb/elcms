$(document).ready(function () {
	"use strict"; // start of use strict

	/*==============================
	Preloader
	==============================*/
	$(window).load(function(){
		$('body').imagesLoaded(function(){
			$('.preloader').fadeOut();
		});
	});

	/*==============================
	Mobile navigation
	==============================*/
	$('.navigation-button').on('click', function() {
		$(this).toggleClass('active');
		$('.mobile-navigation').toggleClass('active');
	});

	/*==============================
	Navigation dropdown
	==============================*/
	$('.desktop-navigation .dropdown').hover(
		function() {
			$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true);
			$(this).toggleClass('open');
		},
		function() {
			$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true);
			$(this).toggleClass('open');
	});

	/*==============================
	Filter
	==============================*/
	$('.filter__search input').on('click', function(){
		$('.filter__search').toggleClass('focus');
	});
	$(document).on('click', function(e) {
		if (!$(e.target).closest('.filter__search.focus').length) {
			$('.filter__search').removeClass('focus');
		}
		e.stopPropagation();
	});

	/*==============================
	Home slider
	==============================*/
	$('.home-carousel').owlCarousel({
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		mouseDrag: false,
		dots: false,
		items: 1,
		loop: true,
		autoplay: true,
		autoplayTimeout: 5000
	});

	$('.slideshow-item').each(function(){
		if ($(this).attr("data-bg")){
			$(this).css({
				'background': 'url(' + $(this).data('bg') + ')',
				'background-position': 'center center',
				'background-repeat': 'no-repeat',
				'background-size': 'cover'
			});
		}
	});

	/*==============================
	Card slider
	==============================*/
	$('.card-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayTimeout: 6000,
		responsive:{
			0:{
				items:1
			},
			360:{
				items:1
			},
			768:{
				items:2
			},
			992:{
				items:3
			},
			1200:{
				items:4
			}
		}
	});

	/*==============================
	Img slider
	==============================*/
	$('.img-carousel').owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		autoplayTimeout: 6000
	});

	/*==============================
	Back to top
	==============================*/
	$('.back-to-top').on('click', function() {
		$('body,html').animate({
			scrollTop: 0 ,
			}, 700 // - duration of the top scrolling animation (in ms)
		);
	});

	/*==============================
	Chat
	==============================*/
	$('.chat-button').on('click', function(e) {
		$('.chat-button--fixed').toggleClass('active');
		$('.chat').toggleClass('active');
		e.preventDefault();
	});

	/*==============================
	Map
	==============================*/
	var myCenter=new google.maps.LatLng(53.902242, 27.559726);
	
	function initialize() {
		if ($('.map').length) {
			var mapProp = {
				center:myCenter,
				scrollwheel: false,
				zoom:14,
				mapTypeControl:false,
				streetViewControl:false,
				mapTypeId:google.maps.MapTypeId.ROADMAP,
				styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{ "color": "#ffffff" }, {"visibility": "on"} ]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{ "color": "#ffffff" },{"visibility":"off"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{ "color": "#ffffff" }]},{"featureType":"water","elementType":"geometry","stylers":[{ "color": "#bababa" }, {"visibility": "on"} ]}],
			};
				
			var map=new google.maps.Map(document.getElementById("map"),mapProp);
				
			var marker=new google.maps.Marker({
				position:myCenter,
				icon:'img/marker.png',
			});
				
			marker.setMap(map);
		} else {
			return false;
		}
		return false;
	}

	google.maps.event.addDomListener(window, 'load', initialize);

	/*==============================
	Switcher
	==============================*/
	$('.picker').on('click', function() {
		$('.color-switcher').toggleClass('open');
	});
	$('#color-red').on('click', function() {
		$('#switch-color').attr('href','css/red.css');
	});
	$('#color-indigo').on('click', function() {
		$('#switch-color').attr('href','css/indigo.css');
	});
	$('#color-blue-grey').on('click', function() {
		$('#switch-color').attr('href','css/blue-grey.css');
	});
	$('#color-teal').on('click', function() {
		$('#switch-color').attr('href','css/teal.css');
	});
	$('#color-dark').on('click', function() {
		$('#switch-color').attr('href','css/dark.css');
	});

});