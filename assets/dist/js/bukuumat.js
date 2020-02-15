$(document).ready(function(){
	$(".slider-utama").owlCarousel({
		items:1,
		loop:true,
	});

	$(".owlCarousel").owlCarousel({
		navContainer: "#letaknavsemuaproduk",
	})

	$(".owlCarousel").owlCarousel({
		forminput: "#hpotongan",
	})		


	$(".slider-produk").owlCarousel({
		items:4,
		margin:10,
		nav:true,
		navContainer: "#letaknavproduk",
		navText:["<i class='fa fa-chevron-left'></i></a>", "<i class='fa fa-chevron-right'></i></a>"],
		dots:false,

		responsiveClass:true,
	    responsive:{
	        0:{
	            items:1,
	            
	        },
	        600:{
	            items:1,
	            
	        },
	        1000:{
	            items:4,
	            
	        }
	    }
	});

	$(".slider-blog").owlCarousel({
		items:2,
		margin:10,
		nav:true,
		navContainer: "#letaknavblog",
		navText:["<i class='fa fa-chevron-left'></i></a>", "<i class='fa fa-chevron-right'></i></a>"],
		dots:false,


	});


	$(".slider-terlaris").owlCarousel({
		items:1,
		nav:true,
		navContainer: "#letaknavterlaris",
		navText:["<i class='fa fa-chevron-left'></i></a>", "<i class='fa fa-chevron-right'></i></a>"],
		dots:false,
	});

	$(".slider-testimoni").owlCarousel({
		items:1,
		dots:true,
	});

	$(".slider-produk-detail").owlCarousel({
		items:1,
		dots:true,
	})
});