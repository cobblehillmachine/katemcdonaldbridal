;(function($, window, undefined)
{
	
	$( document ).on( 'click', '.plus, .minus', function() {
	    var $qty        = $( this ).closest( '.quantity' ).find( '.qty' ),
	        currentVal  = parseFloat( $qty.val() ),
	        max         = parseFloat( $qty.attr( 'max' ) ),
	        min         = parseFloat( $qty.attr( 'min' ) ),
	        step        = $qty.attr( 'step' );
	    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
	    if ( max === '' || max === 'NaN' ) max = '';
	    if ( min === '' || min === 'NaN' ) min = 0;
	    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;
	    if ( $( this ).is( '.plus' ) ) {
	        if ( max && ( max == currentVal || currentVal > max ) ) {
	            $qty.val( max );
	        } else {
	            $qty.val( currentVal + parseFloat( step ) );
	        }
	    } else {
	        if ( min && ( min == currentVal || currentVal < min ) ) {
	            $qty.val( min );
	        } else if ( currentVal > 0 ) {
	            $qty.val( currentVal - parseFloat( step ) );
	        }
	    }
	    $qty.trigger( 'change' );
	});

  var collection_slider = home_slider = '',
      collection_item_cont = '';

	  

  // ON DOM READY
  $(document).ready(function() {
	$('#menu-item-2540 > a, #menu-item-81 > a').on('click', function(e) {
		e.preventDefault();
	})
  	splashCookie();
  	rushShipping();
//   	quantity();
  	productSlider();
  	legendHover();
  	columnizeStockists();
  	stockistDropdown()
  	$('#home-overlay .close').click(function(){
		$('#home-overlay').fadeOut();
		$('body').css({'overflow-y':'auto'});
	});
	// product image zoom




    var loader = $('#js-loader-gif'),
        nav = $("#js-main-nav"),
        header = $('#js-header'),
        main = $('#js-main'),
        window_height = $(window).height(),
        height = $(header).height();

    var container = $('[data-resize-grid]');

  	container.find('li').each(function()
  	{
  		var w = $(this).width(),
  			h = w/.6667;

  		$(this).height(h);
  	})

    // REMOVE LOADER
    setTimeout(function() {
      var loader = $('#js-loader-gif');
  		loader.fadeOut(500, function(){
    		$(this).remove();
  		});
  	}, 3000)


  	// HIT EM WITH DAT SLIDER
  	if( $('#js-home-slider')[0] != null )
  	{
	  	home_slider = $('#js-home-slider').bxSlider({
	  		pager: false,
	  		speed: 2000,
	  		auto:true,
	  		controls:false,
	  		mode:'fade',
	  		tickerHover: true,
	  		pause: 6000
	  	})
  	}

  	// DAT COLLECTION SLIDER, DOE
  	if( $('#js-collection-slider')[0] != null )
  	{
	  	collection_slider = $('#js-collection-slider').bxSlider({
			pager: false,
			speed: 1000,
			auto:true,
			controls:false,
			mode:'horizontal',
			pause: 6000
		})

		collection_slider.reloadSlider();
  	}



    // FIRE NAV DROP-UP
  	nav.find("li.menu-item-has-children").each(function()
  	{
    		if ( $(this).find("ul").length > 0 )
    		{
    		  $(this).mouseenter(function()
    		  {
    			  $(this).find(" > ul").slideDown();
    		  });
    		  $(this).mouseleave(function()
    		  {
    			  $(this).find(" > ul").slideUp();
    		  });
    		}

    });

  });


  $(window).resize(function()
  {

  	var container = $('[data-resize-grid]'),
  			main = $('#js-main');

  	container.find('li').each(function()
  	{
  		var w = $(this).width(),
  			h = w/.6667;

  		$(this).height(h);
  	})

  	if( collection_slider.length > 1 )
  	{
	  	collection_slider.reloadSlider();
  	}

  	if( home_slider.length > 1 )
  	{
	  	home_slider.reloadSlider();
  	}


  	$('[asddata-offset-img]').each(function()
  	{
    	var cont_width = $(this).width(),
    	    img = $(this).find('img'),
    	    img_width = img.width(),
    	    img_height = img.height();
    	    offset = img_width/4;

    	console.log( $(window).height(), img_height, offset);

    	if( $(window).height() == img_height)
    	{
      	img.css('margin-left',-offset);
    	}

  	})




  });



  $(document).on( 'click', '#js-mobile-nav-trigger', function(e)
  {
	  $('#js-body-wrap').removeClass('active');
	  $('body').addClass('lock');
	  $('#js-mobile-nav-container').addClass('active');

	  var nav_html = $('#js-main-nav').html();

	  $('#js-nav-container').html(nav_html);

	  $('#js-nav-container').find("li.menu-item-has-children").each(function()
		{
	  		if ( $(this).find("ul").length > 0 )
	  		{
	  		  $(this).mouseenter(function()
	  		  {
	  			  $(this).find("ul").stop(true, true).slideDown();
	  		  });

	  		  $(this).mouseleave(function()
	  		  {
	  			  $(this).find(" ul").stop(true, true).delay(500).slideUp();
	  		  });
	  		}
	  });

  })


  $(document).on( 'click', '#js-close-mobile-nav', function(e)
  {
	  $('#js-body-wrap').addClass('active');
	  $('body').removeClass('lock');
	  $('#js-mobile-nav-container').removeClass('active');
	  $('#js-nav-container').html('');
  })
  
function splashCookie() {

		var COOKIE_NAME = 'home-page-cookie';
		$go = $.cookie(COOKIE_NAME);
		if ($go == null) {
			$.cookie(COOKIE_NAME, 'test', { path: '/', expires: 6 });
			$('#home-overlay').fadeIn();
			$('body').css({'overflow-y':'hidden'});
		}
		else {
			$('#home-overlay').hide();
		}

	
}

function quantity() {
	$('input.plus').removeAttr('value');
}

function productSlider() {
	$('.product-flexslider').flexslider({
		slideshow: false,
		transition: 'slide',
		controlNav: false,
		directionNav: true,
		nextText: '<i class="fa fa-angle-right"></i>',
		prevText: '<i class="fa fa-angle-left"></i>',
		start: function() {
			if ($(window).width() > 769) {
				$('div.zoomContainer').hide().eq(0).show();
				var url = $('.single-product .images .product-flexslider .flex-active-slide img').attr('src');
				var theImage = new Image();
				theImage.src = url;
				var width = theImage.width;
				if (width > 750) {
					$('.single-product .images .product-flexslider .flex-active-slide img').elevateZoom({
						zoomType	: "lens",
						lensShape : "square",
						lensSize : 300,
						borderSize: 1,
						lensBorder: 1,
						containLensZoom: true,
						constrainType: "width",
						constrainSize: 300
					});
	
				}
			}
			
		},
		after: function(slider) {
			if ($(window).width() > 769) {
				$('div.zoomContainer').hide();
				$('div.zoomContainer').eq(slider.animatingTo).show();
				var url = $('.single-product .images .product-flexslider .flex-active-slide img').attr('src');
				var theImage = new Image();
				theImage.src = url;
				var width = theImage.width;
				if (width > 750) {
					$('.single-product .images .product-flexslider .flex-active-slide img').elevateZoom({
						zoomType	: "lens",
						lensShape : "square",
						lensSize : 300,
						borderSize: 1,
						lensBorder: 1,
						containLensZoom: true,
						constrainType: "width",
						constrainSize: 300
					});
	
				}
			}
		}
	})
}

function sliderNav() {
	var height = $('.images').css('height');
	var top = height / 2;
	$('ul.flex-direction-nav').css('top', top);
}

function rushShipping() {
	if ($('.product-addon-event-date').length > 0) {
		$('.single_add_to_cart_button').prop('disabled', true)
	}
	$('.product-addon-event-date input[type="text"]').keyup(validate);
	$('<p class="rush-shipping-toggle">Need Rush Shipping?</p>').appendTo($('.product-addon-rush-shipping .addon-description'));
	$('.product-addon-rush-shipping .addon-description').on("click", ".rush-shipping-toggle", function(){
	    $('.product-addon-rush-shipping select').slideDown();
	});
}

function validate(){
    if ($('.product-addon-event-date input[type="text"]').val().length   >   0) {
        $(".single_add_to_cart_button").prop("disabled", false);
    }
    else {
        $(".single_add_to_cart_button").prop("disabled", true);
    }
}

function legendHover() {
	$('.pricing-legend-wrapper span').on('mouseenter', function() {
		$(this).parent().find($('.pricing-legend')).css('opacity', 1);
	})
	$('.pricing-legend-wrapper span').on('mouseleave', function() {
		$(this).parent().find($('.pricing-legend')).css('opacity', 0);
	})
}

function stockistDropdown() {
	$('.stockist').hide();
	$('.stockist-list h3').hide();
	$('.stockist.170').show();
	$('.stockist.170').parent().find($('h3')).show();
	var dropdown = $('#cat');
	dropdown.on('change', function() {
		var value = $(this).val();
		if ( value > 0 ) {
			$('.stockist').hide();
			$('.stockist-list h3').hide();
			$('.stockist.' + value).show();
			$('.stockist.' + value).parent().find($('h3')).show();
		} else {
			$('.stockist, .stockist-list h3').show();
		}

		
	})


}

function columnizeStockists() {
	var columns;
  	if ($(window).width() > 1030) {
	  	columns = 3;
  	} else if ($(window).width() > 600) {
	  	columns = 2;
  	} else {
	  	columns = 1;
  	}
  	$('.stockist-list').columnize ({
	  	columns: columns
  	})
}

})(jQuery, window)















