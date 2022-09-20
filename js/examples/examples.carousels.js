(function( $ ) {

	'use strict';

	/*
	Carousel
	*/
	$('#carousel').owlCarousel({
		loop: true,
		responsive: {
			0: {
				items: 1
			},
			479: {
				items: 1
			},
			768: {
				items: 2
			},
			979: {
				items: 3
			},
			1199: {
				items: 6
			}
		},
		navText: [],
		margin: 10,
		autoWidth: false,
		items: 6
	});
	/*
	Videos
	*/
	$('#videos').owlCarousel({
		items:2,
		merge:true,
		loop:true,
		autoplay: true,
		autoplayTimeout: 2000,
		dots: true,
		margin:10,
		video:true,
		lazyLoad:true,
		center:true,
		responsive:{
			480:{
				items:2
			},
			600:{
				items:4
			}
		}
	});

}).apply( this, [ jQuery ]);