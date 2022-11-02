jQuery(document).ready(function(){

	wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function( placement ) {

		var woo_slider_arr = [
		    'woo_slider_pages'
		];

		if( jQuery.inArray( placement.partial.id , woo_slider_arr ) !== -1 ){

	    	    var interleaveOffset = 0.5;
			    var swiperOptions = {
			        loop: true,
			        speed: 3000,
			        grabCursor: true,
			        SlidesPerView: 3,
			        watchSlidesProgress: true,
			        mousewheelControl: true,
			        keyboardControl: true,
			        navigation: {
			            nextEl: ".swiper-button-next",
			            prevEl: ".swiper-button-prev"
			        },
			        pagination: {
			            el: '.swiper-pagination',
			            clickable: true,
			          },
			        autoplay: {
			            delay: 3000,
			        },
			        fadeEffect: {
			            crossFade: true
			        },
			        on: {
			            progress: function() {
			                var swiper = this;
			                for (var i = 0; i < swiper.slides.length; i++) {
			                    var slideProgress = swiper.slides[i].progress;
			                    var innerOffset = swiper.width * interleaveOffset;
			                    var innerTranslate = slideProgress * innerOffset;
			                    swiper.slides[i].querySelector(".slide-inner").style.transform = "translate3d(" + innerTranslate + "px, 0, 0)";
			                } 
			            },
			            touchStart: function() {
			                var swiper = this;
			                for (var i = 0; i < swiper.slides.length; i++) {
			                    swiper.slides[i].style.transition = "";
			                }
			            },
			            setTransition: function(speed) {
			                var swiper = this;
			                for (var i = 0; i < swiper.slides.length; i++) {
			                    swiper.slides[i].style.transition = speed + "ms";
			                    swiper.slides[i].querySelector(".slide-inner").style.transition = speed + "ms";
			                }
			            }
			        }
			    };

			    var swiper = new Swiper(".swiper-main", swiperOptions);

	    }

	    var woo_banner_sale_arr = [
		    'number_setting_desktop_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show',
		    'number_setting_tablet_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show',
		    'number_setting_mobile_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show',
		    'woo_banner_sale_slider'
		];

		if( jQuery.inArray( placement.partial.id , woo_banner_sale_arr ) !== -1 ){

    	    jQuery('.listing-slider.banner_sale_slider').slick({
		         infinite: true,
		         slidesToShow: wp.customize( 'number_setting_desktop_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' ).get(),
		         slidesToScroll: 1,
		         swipeToSlide: true,
		         arrows: true,
		         dots: false,
		         autoplay: false,
		         speed: 500,
		         loop:true,
		         rows:0,
		         responsive: [{
		             breakpoint: 900,
		             settings: {
		                 slidesToShow: wp.customize( 'number_setting_tablet_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' ).get()
		             }
		         },
		         {
		             breakpoint: 500,
		             settings: {
		                 slidesToShow: wp.customize( 'number_setting_mobile_bizberg_shop_frontpage_woocommerce_sales_banner_slides_show' ).get()
		            }
		         }]
		     });

	    }

	    var woo_top_categories = [
		    'bs_top_categories_title',
		    'top_categories_cat'
		];

		if( jQuery.inArray( placement.partial.id , woo_top_categories ) !== -1 ){

    	    jQuery('.attract-slider').slick({
		         infinite: true,
		         slidesToShow: 7,
		         slidesToScroll: 1,
		         swipeToSlide: true,
		         arrows: true,
		         rows:0,
		         dots: false,
		         speed: 500,
		         rows:0,
		         autoplay: true,
		         draggable:true,
		         responsive: [{
		             breakpoint: 1000,
		             settings: {
		                 slidesToShow: 3
		             }
		         }, 
		         {
		             breakpoint: 600,
		             settings: {
		                 slidesToShow: 2
		            }
		         }, 
		         {
		             breakpoint: 500,
		             settings: {
		                 slidesToShow: 2
		             }
		         }]
		     });
    	    
	    }

	    var client_logos = [
		    'clients_logo'
		];

		if( jQuery.inArray( placement.partial.id , client_logos ) !== -1 ){

    	    jQuery('.bs_clients_logo').slick({
		         infinite: true,
		         slidesToShow: 6,
		         slidesToScroll: 1,
		         swipeToSlide: true,
		         arrows: false,
		         rows:0,
		         dots: false,
		         speed: 500,
		         rows:0,
		         autoplay: true,
		         draggable:true,
		         responsive: [{
		             breakpoint: 1000,
		             settings: {
		                 slidesToShow: 3
		             }
		         }, 
		         {
		             breakpoint: 600,
		             settings: {
		                 slidesToShow: 2
		            }
		         }, 
		         {
		             breakpoint: 500,
		             settings: {
		                 slidesToShow: 2
		             }
		         }]
		     });

	    }

	})

	wp.customize(
	    'woo_slider_pages', function( value ) {
	        value.bind(
	            function( to ) {
	            	var arr = '';
	                var string = JSON.parse(to);
	                jQuery.each( string , function( key, value1 ) {
	                	if( value1 != null ){
	                		arr += '.slide_id_' + value1.page + ' { transform : translate( ' + value1.translate_x + '%, -50% ) }';
	                	}					  	
					});
					jQuery('.bs_customizer_inline').remove();
					jQuery('.ecommerce-banner').append( '<div class="bs_customizer_inline"><style>' + arr + '</style><div>' );
	            }
	        );
	    }
	);

	wp.customize(
	    'repeater_products_frontpage', function( value ) {
	        value.bind(
	            function( to ) {
	            	var arr = '';
	                var string = JSON.parse(to);
	                jQuery.each( string , function( key, value1 ) {
	                	if( value1 != null ){
	                		arr += '.bs_repeater_product h3.product_title_' + key + '::before{background : ' + value1.title_color + '}';
	                	}					  	
					});
					jQuery('.bs_customizer_inline1').remove();
					jQuery('.bs_repeater_product_wrapper').append( '<div class="bs_customizer_inline1"><style>' + arr + '</style><div>' );
	            }
	        );
	    }
	);

	wp.customize(
	    'woocommerce_category_menu_width', function( value ) {
	        value.bind(
	            function( to ) {
					jQuery('.bs_customizer_inline2').remove();
					jQuery('body').append( '<div class="bs_customizer_inline2"><style>.navbar-nav .product_cats_menu ul{left:' + (to - 1) + 'px}</style><div>' );
	            }
	        );
	    }
	);

});

