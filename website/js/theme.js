(function($){
"use strict"; // Start of use strict
//Sidebar Fixed
function sidebar_fixed(){
	if($(window).width()>1300){
		if($('.content-full-sidebar').length>0){
			var ot = $('.content-full-sidebar').offset().top;
			var sh = $('.content-full-sidebar').height();
			var height = $('.sidebar-scroll').map(function (){
				return $(this).height();
			}).get();
			var dh = Math.max.apply(null, height);
			var st = $(window).scrollTop();
			var top = $(window).scrollTop() - ot;
			if(st>ot&&st<ot+sh-dh){
				$('.content-full-sidebar').addClass('onscroll');
				$('.onscroll .sidebar-scroll').css('top',top+'px');
			}else if(st<ot){
				$('.sidebar-scroll').css('top',0);
			}else{
				$('.content-full-sidebar').removeClass('onscroll');
			}
		}
	}else{
		$('.sidebar-scroll').css('top',0);
	}
}
//Menu Responsive
function rep_menu(){
	if($(window).width()<768){
		if($('.btn-toggle-mobile-menu').length>0){
			return false;
		}else{
			$('.main-nav li.menu-item-has-children,.main-nav li.has-mega-menu').append('<span class="btn-toggle-mobile-menu"></span>');
			$('.main-nav .btn-toggle-mobile-menu').on('click',function(event){
				$(this).toggleClass('active');
				$(this).prev().stop(true,false).slideToggle();
			});
		}
	}else{
		$('.btn-toggle-mobile-menu').remove();
		$('.main-nav .sub-menu,.main-nav .mega-menu').slideDown();
	}
}
//Offset Menu
function offset_menu(){
	if($(window).width()>767){
		$('.main-nav .sub-menu').each(function(){
			var wdm = $(window).width();
			var wde = $(this).width();
			var offset = $(this).offset().left;
			var tw = offset+wde;
			if(tw>wdm){
				$(this).addClass('offset-right');
			}
		});
	}
}
//Fixed Header
function fixed_header(){
	if($('.header-ontop').length>0){
		if($(window).width()>767){
			var ht = $('#header').height();
			var st = $(window).scrollTop();
			if(st>ht){
				$('.header-ontop').addClass('fixed-ontop');
			}else{
				$('.header-ontop').removeClass('fixed-ontop');
			}
		}
	}
} 
//Slider Background
function background(){
	$('.bg-slider .item-slider').each(function(){
		var src=$(this).find('.banner-thumb a img').attr('src');
		$(this).css('background-image','url("'+src+'")');
	});	
}
//After Action
function afterAction(){
	
	$('.banner-slider .owl-item').each(function(){
		var check = $(this).hasClass('active');
		if(check==true){
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).addClass(anime);
			});
		}else{
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).removeClass(anime);
			});
		}
	});
	
	var owl = this;
	var visible = this.owl.visibleItems;
	var first_item = visible[0];
	var last_item = visible[visible.length-1];
	this.$elem.find('.owl-item').removeClass('first-item');
	this.$elem.find('.owl-item').removeClass('last-item');
	this.$elem.find('.owl-item').eq(first_item).addClass('first-item');
	this.$elem.find('.owl-item').eq(last_item).addClass('last-item');
	
}
//Detail Gallery
function detail_gallery(){
	if($('.detail-gallery').length>0){
		$('.detail-gallery').each(function(){
			$(this).find(".carousel").jCarouselLite({
				btnNext: $(this).find(".gallery-control .next"),
				btnPrev: $(this).find(".gallery-control .prev"),
				speed: 800,
				visible:3,
			});
			//Elevate Zoom
			$(this).find('.mid img').elevateZoom({
				zoomType: "inner",
				cursor: "crosshair",
				zoomWindowFadeIn: 500,
				zoomWindowFadeOut: 750
			});
			$(this).find(".carousel a").on('click',function(event) {
				event.preventDefault();
				$(this).parents('.detail-gallery').find(".carousel a").removeClass('active');
				$(this).addClass('active');
				$(this).parents('.detail-gallery').find(".mid img").attr("src", $(this).find('img').attr("src"));
				var z_url = $(this).parents('.detail-gallery').find('.mid img').attr('src');
				$('.zoomWindow').css('background-image','url("'+z_url+'")');
			});
		});
	}
}
//Document Ready
$(document).ready(function(){	
	//Get Instagram
	var token = '3225616123.d90570a.92f2ff44795d4458926300c08c408ea6',
		num_photos = 6;
	$.ajax({
		url: 'https://api.instagram.com/v1/users/self/media/recent',
		dataType: 'jsonp',
		type: 'GET',
		data: {access_token: token, count: num_photos},
		success: function(data){
			var x;
			for( x in data.data ){
				$('ul.list-instagram').append('<li><a target="blank" href="'+data.data[x].link+'"><img src="'+data.data[x].images.low_resolution.url+'"></a></li>');
			}
		},
		error: function(data){
			console.log(data);
		}
	});
	
	//Animate
	if($('.wow').length>0){
		new WOW().init();
	}
	//Popup Wishlist
	$('.wishlist-link').on('click',function(event){
		event.preventDefault();
		$('.wishlist-mask').fadeIn();
		var counter = 10;
		var popup;
		popup = setInterval(function() {
			counter--;
			if(counter < 0) {
				clearInterval(popup);
				$('.wishlist-mask').hide();
			} else {
				$(".wishlist-countdown").text(counter.toString());
			}
		}, 1000);
	});
	//Search Ajax
	$('.ajax-search input[type="text"]').on('blur',function(){
		$('.list-product-search').removeClass('active');
	});
	$('.ajax-search input[type="text"]').on('keydown',function(){
		if($(this).val()==""){
			$('.list-product-search').removeClass('active');
		}else{
			$('.list-product-search').addClass('active');
		}
	});
	//Coupon Index
	$('.list-coupon li').each(function(){
		var index = $(this).index()+1;
		$(this).prepend('<span class="coupon-index">'+index+'</span>');		
	});
	//Control Category Banner
	if($('.cat-pro3').length>0){
		$('.cat-pro3').each(function(){
			$(this).find('.hide-cat-banner').on('click',function(event){
				event.preventDefault();
				$(this).parents('.cat-pro3').addClass('hidden-banner');
			});
			$(this).find('.show-cat-banner').on('click',function(event){
				event.preventDefault();
				$(this).parents('.cat-pro3').removeClass('hidden-banner');
			});
		});
	}
	//img Light Box
	$('.post-zoom-link').fancybox();
	//Product Quick View
	$('.quickview-link').fancybox({
		afterShow: detail_gallery
	});	
	$('.fancybox-media').fancybox({
		openEffect : 'none',
		closeEffect : 'none',
		prevEffect : 'none',
		nextEffect : 'none',

		arrows : false,
		helpers : {
			media : {},
			buttons : {}
		}
	});
	//Add Cart Special
	$('.addcart-special,.btn-get-coupon').fancybox({
		'closeBtn' : false 
	});
	$('.close-light-box').on('click',function(event){
		event.preventDefault();
		$.fancybox.close(); 
	})
	//Menu Responsive
	$('.toggle-mobile-menu').on('click',function(event){
		event.preventDefault();
		$(this).parents('.main-nav').toggleClass('active');
	});
	//Blog Masonry 
	if($('.list-post-masonry').length>0){
		$('.list-post-masonry').masonry({
			// options
			itemSelector: '.item-post-masonry',
		});
	}
	//Back To Top
	$('.scroll-top').on('click',function(event){
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow');
	});
	//Gallery Color
	$('.item-pro-color').each(function(){
		$(this).find('.list-color a').on('click',function(event){
			event.preventDefault();
			var data_color=$(this).attr('data-color');
			$(this).parents('.item-pro-color').find('.product-thumb-link img').each(function(){
				if($(this).attr('data-color')==data_color){
					$(this).addClass('active');
				}else{
					$(this).removeClass('active');
				}
			});
		});
	});
	//Widget Toggle
	$('.widget-title').on('click',function(){
		$(this).toggleClass('active');
		$(this).next().slideToggle();
	});
	//Tag Toggle
	if($('.toggle-tab').length>0){
		$('.toggle-tab').each(function(){
			$(this).find('.item-toggle-tab').first().find('.toggle-tab-content').show();
			$('.toggle-tab-title').on('click',function(){
				$(this).parent().siblings().removeClass('active');
				$(this).parent().toggleClass('active');
				$(this).parents('.toggle-tab').find('.toggle-tab-content').slideUp();
				$(this).next().stop(true,false).slideToggle();
			});
		});
	}
	//Widget Product Category
	$('.widget-product-cat li.has-sub-cat').first().find('ul').show();
	$('.widget-product-cat ul li.has-sub-cat>a').on('click',function(event){
		event.preventDefault();
		$(this).parent().toggleClass('active');
		$(this).next().slideToggle();
	});
	//Arrt Color
	$('.attr-detail.attr-color td a').on('click',function(event){
		event.preventDefault();
		$(this).toggleClass('active');
	});
	//Filter Price
	if($('.range-filter').length>0){
		$( ".range-filter #slider-range" ).slider({
			range: true,
			min: 0,
			max: 700,
			values: [ 50, 500 ],
			slide: function( event, ui ) {
			$( "#amount" ).html( "<span class='number'>" + ui.values[ 0 ] + "</span>" + "<span class='separate'> - </span>" + "<span class='number'>" + ui.values[ 1 ] + "</span>" );
			}
		});
		$( ".range-filter #amount" ).html( "<span class='number'>" + $( "#slider-range" ).slider( "values", 0 )+ "</span>" + " <span class='separate'> - </span> " + "<span class='number'>" + $( "#slider-range" ).slider( "values", 1 ) + "</span>" );
	}
	//Filter color/Size
	$('.list-filter').each(function(){
		$(this).find('a').on('click',function(event){
			event.preventDefault();
			$(this).parent().siblings().removeClass('active');
			$(this).parent().toggleClass('active');
			$(this).parents('.attr-detail').find('.current-size').text($(this).text());
			$(this).parents('.attr-detail').find('.current-color').text($(this).attr('data-color'));
		});
	});
	//Qty Up-Down
	$('.detail-qty').each(function(){
		$(this).find('.qty-up').on('click',function(event){
			event.preventDefault();
			var qtyval = parseInt($(this).parent().find('.qty-val').text(),10);
			qtyval=qtyval+1;
			$(this).parent().find('.qty-val').text(qtyval);
		});
		$(this).find('.qty-down').on('click',function(event){
			event.preventDefault();
			var qtyval = parseInt($(this).parent().find('.qty-val').text(),10);
			qtyval=qtyval-1;
			if(qtyval>1){
				$(this).parent().find('.qty-val').text(qtyval);
			}else{
				qtyval=1;
				$(this).parent().find('.qty-val').text(qtyval);
			}
		});
	});
	//Background Image
	if($('.adv-background').length>0){
		$('.adv-background').each(function(){
			var p_url = $(this).attr("data-image");
			$(this).css('background-image','url("'+p_url+'")');	
		});
	}
	//Tab Hover
	if($('.tab-hover').length>0){
		$('.list-tab-hover li a').on('click',function(event){
			event.preventDefault();
		});
		$('.list-tab-hover li a').on('mouseover',function(){
			var tab = $(this).attr('data-tab');
			$(this).parents('.list-tab-hover').find('a').removeClass('active');
			$(this).addClass('active');
			$(this).parents('.tab-hover').find('.content-tab-hover .item-tab-hover').each(function(){
				if($(this).attr('id') == tab){
					$(this).addClass('active');
				}else{
					$(this).removeClass('active');
				}
			});
		});
		
	
	};
	//Cat Brand
	if($('.brand-by-cat').length>0){
		$('.item-cat-brand').on('click',function(event){
			event.preventDefault();
			var tab = $(this).attr('data-brand');
			$(this).parents('.brand-cat-slider').find('.item-cat-brand').removeClass('active');
			$(this).addClass('active');
			$(this).parents('.brand-by-cat').find('.list-cat-brand .item-brand-slider').each(function(){
				if($(this).attr('id') == tab){
					$(this).addClass('active');
				}else{
					$(this).removeClass('active');
				}
			});
		});
	};	
	//Control Video
	$('.btn-video-control').on('click',function(event) {
		event.preventDefault();
		$(this).parents('.banner-video13').toggleClass('active');
		var video = $(this).parents('.banner-video13').find('video');
		video.fadeIn();
		if (video.get(0).paused) {
			video.get(0).play();
		}
		else {
			video.get(0).pause();
		}
    });
	//Tab Active
	if($('.item-collect11').length>0){
		$('.item-collect11 a').on('click',function(event){
			event.preventDefault();
			$(this).parents('.title-tab-collect11').find('.item-collect11').removeClass('active');
			$(this).parent().addClass('active');
		});
	}
	
	//Menu Responsive 
	rep_menu();
	//Offset Menu
	offset_menu();
	//Detail Gallery
	detail_gallery();
	//Fixed Sidebar
	sidebar_fixed();
	if($('.countdown-master').length>0){
		$('.countdown-master').each(function(){
			$(this).FlipClock(65100,{
		        clockFace: 'HourlyCounter',
		        countdown: true,
		        autoStart: true,
		    });
		});
	}
});
//Window Load
jQuery(window).on('load',function(){ 
	//Parallax Video
	if($(window).width()>1024){
		var scrolled = $(this).scrollTop();
		$('.banner-video-parallax video').css('transform', 'translate3d(0, ' + (scrolled * 0.5) + 'px, 0)');
	}
	//Toggle Nav Home 9
	$('.toggle-nav-button').on('click',function(event){
		event.preventDefault();
		$(this).parent().toggleClass('active');
	});
	$('.header-nav09').height($(window).height());
	//Custom ScrollBar
	if($('.custom-scroll').length>0){
		$('.custom-scroll').each(function(){
			$(this).mCustomScrollbar({
				scrollButtons:{
					enable:true
				}
			});
		});
	}
	//Owl Carousel
	if($('.wrap-item').length>0){
		$('.wrap-item').each(function(){
			var owl = $(this);
			var data = $(this).data();
			owl.owlCarousel({
				addClassActive:true,
				stopOnHover:true,
				itemsCustom:data.itemscustom,
				autoPlay:data.autoplay,
				transitionStyle:data.transition, 
				beforeInit:background,
				afterAction:afterAction,
				navigationText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			});
			owl.find('.owl-controls').css('left',data.control+'px');
		});
	}	
	
	//Change z-index
	$('.brand-slider10 .owl-wrapper-outer .item-brand10').on('mouseover',function(){
		$(this).parents('.brand-slider10 .owl-wrapper-outer').css('z-index',9999);
	});
	$('.brand-slider10 .owl-wrapper-outer .item-brand10').on('mouseout',function(){
		$(this).parents('.brand-slider10 .owl-wrapper-outer').css('z-index',0);
	});
	//Time Countdown
	if($('.time-countdown').length>0){
		$(".time-countdown").each(function(){
			var data = $(this).data(); 
			$(this).TimeCircles({
				fg_width: data.width,
				bg_width: 0,
				text_size: 0,
				circle_bg_color: data.bg,
				time: {
					Days: {
						show: data.day,
						text: data.text[0],
						color: data.color,
					},
					Hours: {
						show: data.hou,
						text: data.text[1],
						color: data.color,
					},
					Minutes: {
						show: data.min,
						text: data.text[2],
						color: data.color,
					},
					Seconds: {
						show: data.sec,
						text: data.text[3],
						color: data.color,
					}
				}
			}); 
		});
	}
	//BxSlider
	if($('.bxslider-banner').length>0){
		$('.bxslider-banner').each(function(){
			$(this).find('.bxslider').bxSlider({
				controls:false,
				pagerCustom: $(this).find('.bx-pager')
			});
		});
	}
	//Detail Gallery Widthout sidebar
	if($('.gallery-without-sidebar').length>0){
		$('.gallery-without-sidebar').each(function(){
			if($(window).width()>1200){
				$(this).find('.carousel').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					itemWidth: 80,
					minItems: 6,
					maxItems: 6,
					move: 1,
					direction: "vertical",
					directionNav: false,
					asNavFor: $(this).find('.slider')
				});
				$(this).find('.slider').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					prevText: '<i class="fa fa-angle-left"></i>',
					nextText: '<i class="fa fa-angle-right"></i>',
					sync: $(this).find('.carousel')
				});
			}else{
				$(this).find('.carousel').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					itemWidth: 80,
					minItems: 3,
					maxItems: 6,
					move: 1,
					direction: "horizontal",
					directionNav: false,
					asNavFor: $(this).find('.slider')
				});
				$(this).find('.slider').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					prevText: '<i class="fa fa-angle-left"></i>',
					nextText: '<i class="fa fa-angle-right"></i>',
					sync: $(this).find('.carousel')
				});
			}
		});
	}
});
//Window Resize
jQuery(window).on('resize',function(){
	offset_menu();
	rep_menu();
});
//Window Scroll
jQuery(window).on('scroll',function(){
	//Parallax Video
	if($(window).width()>1024){
		var scrolled = $(this).scrollTop();
		$('.banner-video-parallax video').css('transform', 'translate3d(0, ' + (scrolled * 0.5) + 'px, 0)');
	}
	//Scroll Top
	if($(this).scrollTop()>$(this).height()){
		$('.scroll-top').addClass('active');
	}else{
		$('.scroll-top').removeClass('active');
	}
	//Parallax Slider
	if($('.parallax-slider').length>0){
		var ot = $('.parallax-slider').offset().top;
		var sh = $('.parallax-slider').height();
		var st = $(window).scrollTop();
		var top = (($(window).scrollTop() - ot) * 0.5) + 'px';
		if(st>ot&&st<ot+sh){
			$('.parallax-slider .item-slider').css({
				'background-position': 'center ' + top
			});
		}else{
			$('.parallax-slider .item-slider').css({
				'background-position': 'center 0'
			});
		}
	}
	//Fixed Header
	fixed_header();
	//Fixed Sidebar
	sidebar_fixed();
});
})(jQuery); // End of use strict