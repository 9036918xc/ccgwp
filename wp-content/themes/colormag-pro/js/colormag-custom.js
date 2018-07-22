jQuery( document ).ready( function () {
	// Header Search Form
	jQuery( '.search-top' ).click( function () {
		jQuery( '#masthead .search-form-top' ).toggle();
	} );

	// Adds right icon to submenu
	jQuery( '.menu-primary-container .menu-item-has-children' ).append( '<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>' );

	// Adds down icon for menu with sub menu
	jQuery( '.menu-primary-container .sub-toggle' ).click( function () {
		jQuery( this ).parent( '.menu-item-has-children' ).children( 'ul.sub-menu' ).first().slideToggle( '1000' );
		jQuery( this ).children( '.fa-angle-right' ).first().toggleClass( 'fa-angle-down' );
	} );

	// Hides the scroll up button initially
	jQuery( '#scroll-up' ).hide();

	// Scroll up settings
	jQuery( window ).scroll( function () {
		if ( jQuery( this ).scrollTop() > 1000 ) {
			jQuery( '#scroll-up' ).fadeIn();
		} else {
			jQuery( '#scroll-up' ).fadeOut();
		}
	} );
	jQuery( 'a#scroll-up' ).click( function () {
		jQuery( 'body,html' ).animate( {
			scrollTop : 0
		}, 800 );
		return false;
	} );

	// Sticky Menu
	if ( typeof jQuery.fn.sticky !== 'undefined' ) {
		var wpAdminBar = jQuery( '#wpadminbar' );
		if ( wpAdminBar.length ) {
			jQuery( '#site-navigation' ).sticky( { topSpacing : wpAdminBar.height() } );
		} else {
			jQuery( '#site-navigation' ).sticky( { topSpacing : 0 } );
		}
	}

	// Tabbed widget
	if ( typeof jQuery.fn.easytabs !== 'undefined' ) {
		jQuery( '.tabbed-widget' ).easytabs();
	}

	// Fitvids setting
	if ( typeof jQuery.fn.fitVids !== 'undefined' ) {
		jQuery( '.fitvids-video' ).fitVids();
	}

	// Magnific Popup Setting
	if ( typeof jQuery.fn.magnificPopup !== 'undefined' ) {
		// Featured image popup
		jQuery( '.image-popup' ).magnificPopup( { type : 'image' } );

		// Magnific Popup for gallery
		jQuery( '.gallery' ).magnificPopup( {
			delegate : 'a',
			type     : 'image',
			gallery  : { enabled : true }
		} );

		// Ticker news popup
		jQuery( '.colormag-ticker-news-popup-link' ).magnificPopup( {
			type      : 'ajax',
			callbacks : {
				parseAjax : function ( mfpResponse ) {
					var setting      = jQuery.magnificPopup.instance,
						content      = jQuery( setting.currItem.el[ 0 ] ),
						fragment     = ( content.data( 'fragment' ) );
					mfpResponse.data = jQuery( mfpResponse.data ).find( fragment );
				}
			}
		} );
	}

	// Breaking News JS Settings
	/* global colormag_ticker_settings */
	if ( typeof jQuery.fn.newsTicker !== 'undefined' ) {
		// News Ticker Settings at header top
		var breaking_news_slide_effect = colormag_ticker_settings.breaking_news_slide_effect;
		var breaking_news_duration     = parseInt( colormag_ticker_settings.breaking_news_duration, 10 );
		var breaking_news_speed        = parseInt( colormag_ticker_settings.breaking_news_speed, 10 );

		jQuery( '.newsticker' ).newsTicker( {
			row_height   : 20,
			max_rows     : 1,
			direction    : breaking_news_slide_effect,
			speed        : breaking_news_speed,
			duration     : breaking_news_duration,
			autostart    : 1,
			pauseOnHover : 1,
			start        : function () {
				jQuery( '.newsticker' ).css( 'visibility', 'visible' );
			}
		} );

		// News Ticker in widget
		var breaking_news_widget_init = function ( breaking_news_slider, breaking_news_slider_up, breaking_news_slider_down, breaking_news_slider_direction, breaking_news_slider_duration, breaking_news_slider_row_height, breaking_news_slider_max_row ) {
			jQuery( breaking_news_slider ).newsTicker( {
				row_height : breaking_news_slider_row_height,
				max_rows   : breaking_news_slider_max_row,
				duration   : breaking_news_slider_duration,
				direction  : breaking_news_slider_direction,
				prevButton : jQuery( breaking_news_slider_up ),
				nextButton : jQuery( breaking_news_slider_down ),
				start      : function () {
					jQuery( '.breaking-news-widget-slide' ).css( 'visibility', 'visible' );
				}
			} );
		};

		var breaking_news_widget_wrapper = jQuery( '.breaking_news_widget_inner_wrap' );
		jQuery( breaking_news_widget_wrapper ).each( function () {
			var breaking_news_slider            = jQuery( this ).children( '.breaking-news-widget-slide' );
			var breaking_news_slider_up         = jQuery( this ).children( '.fa-arrow-up' );
			var breaking_news_slider_down       = jQuery( this ).children( '.fa-arrow-down' );
			var breaking_news_slider_direction  = jQuery( this ).children( '.breaking-news-widget-slide' ).data( 'direction' );
			var breaking_news_slider_duration   = jQuery( this ).children( '.breaking-news-widget-slide' ).data( 'duration' );
			var breaking_news_slider_row_height = jQuery( this ).children( '.breaking-news-widget-slide' ).data( 'rowheight' );
			var breaking_news_slider_max_row    = jQuery( this ).children( '.breaking-news-widget-slide' ).data( 'maxrows' );

			breaking_news_widget_init( breaking_news_slider, breaking_news_slider_up, breaking_news_slider_down, breaking_news_slider_direction, breaking_news_slider_duration, breaking_news_slider_row_height, breaking_news_slider_max_row );
		} );
	}

	// BxSlider JS Settings
	if ( typeof jQuery.fn.bxSlider !== 'undefined' ) {
		// Category Slider Widget
		var category_init = function ( category_slider, category_mode, category_speed, category_pause, category_auto, category_hover ) {
			jQuery( category_slider ).bxSlider( {
				mode           : category_mode,
				speed          : category_speed,
				auto           : category_auto,
				pause          : category_pause,
				autoHover      : category_hover,
				adaptiveHeight : true,
				nextText       : '<div class="category-slide-next"><i class="fa fa-angle-right"></i></div>',
				prevText       : '<div class="category-slide-prev"><i class="fa fa-angle-left"></i></div>',
				pager          : false,
				tickerHover    : true,
				onSliderLoad   : function () {
					jQuery( '.widget_slider_area_rotate' ).css( 'visibility', 'visible' );
					jQuery( '.widget_slider_area_rotate' ).css( 'height', 'auto' );
				}
			} );
		};

		var category_slider_wrapper = jQuery( '.widget_featured_slider_inner_wrap' );
		jQuery( category_slider_wrapper ).each( function () {
			var category_slider = jQuery( this ).children( '.widget_slider_area_rotate' );
			var category_mode   = jQuery( this ).children( '.widget_slider_area_rotate' ).data( 'mode' );
			var category_speed  = jQuery( this ).children( '.widget_slider_area_rotate' ).data( 'speed' );
			var category_pause  = jQuery( this ).children( '.widget_slider_area_rotate' ).data( 'pause' );
			var category_auto   = jQuery( this ).children( '.widget_slider_area_rotate' ).data( 'auto' );
			var category_hover  = jQuery( this ).children( '.widget_slider_area_rotate' ).data( 'hover' );

			category_init( category_slider, category_mode, category_speed, category_pause, category_auto, category_hover );
		} );

		// News in Picture/Highlighted Post Area Setting
		var style5_slider_init = function ( style5_slider, style5_speed, style5_pause, style5_auto, style5_hover ) {
			jQuery( style5_slider ).bxSlider( {
				minSlides      : 1,
				maxSlides      : 2,
				slideWidth     : 390,
				slideMargin    : 20,
				speed          : style5_speed,
				pause          : style5_pause,
				auto           : style5_auto,
				autoHover      : style5_hover,
				adaptiveHeight : true,
				nextText       : '<div class="slide-next"><i class="fa fa-angle-right"></i></div>',
				prevText       : '<div class="slide-prev"><i class="fa fa-angle-left"></i></div>',
				pager          : false,
				captions       : false,
				onSliderLoad   : function () {
					jQuery( '.widget_block_picture_news .widget_highlighted_post_area' ).css( 'visibility', 'visible' );
					jQuery( '.widget_block_picture_news .widget_highlighted_post_area' ).css( 'height', 'auto' );
				}
			} );
		};

		var style5_slider_wrapper = jQuery( '.widget_block_picture_news_inner_wrap' );
		jQuery( style5_slider_wrapper ).each( function () {
			var style5_slider = jQuery( this ).children( '.widget_block_picture_news .widget_highlighted_post_area' );
			var style5_speed  = jQuery( this ).children( '.widget_block_picture_news .widget_highlighted_post_area' ).data( 'speed' );
			var style5_pause  = jQuery( this ).children( '.widget_block_picture_news .widget_highlighted_post_area' ).data( 'pause' );
			var style5_auto   = jQuery( this ).children( '.widget_block_picture_news .widget_highlighted_post_area' ).data( 'auto' );
			var style5_hover  = jQuery( this ).children( '.widget_block_picture_news .widget_highlighted_post_area' ).data( 'hover' );

			style5_slider_init( style5_slider, style5_speed, style5_pause, style5_auto, style5_hover );
		} );

		// Image Slider with pager
		var style6_slider_init = function ( style6_slider_class, style6_pager_class, style6_mode, style6_speed, style6_pause, style6_auto, style6_hover ) {
			jQuery( style6_slider_class ).bxSlider( {
				mode         : style6_mode,
				speed        : style6_speed,
				pause        : style6_pause,
				auto         : style6_auto,
				pagerCustom  : style6_pager_class,
				autoHover    : style6_hover,
				controls     : false,
				nextText     : '',
				prevText     : '',
				nextSelector : '',
				prevSelector : '',
				captions     : false,
				onSliderLoad : function () {
					jQuery( '.thumbnail-big-sliders' ).css( 'visibility', 'visible' );
					jQuery( '.thumbnail-big-sliders' ).css( 'height', 'auto' );
				}
			} );
		};

		var style6_slider_wrapper = jQuery( '.thumbnail-slider-news' );
		jQuery( style6_slider_wrapper ).each( function () {
			var style6_slider_class = jQuery( this ).children( '.thumbnail-big-sliders' );
			var style6_pager_class  = jQuery( this ).children( '.thumbnail-slider' );
			var style6_mode         = jQuery( this ).children( '.thumbnail-big-sliders' ).data( 'mode' );
			var style6_speed        = jQuery( this ).children( '.thumbnail-big-sliders' ).data( 'speed' );
			var style6_pause        = jQuery( this ).children( '.thumbnail-big-sliders' ).data( 'pause' );
			var style6_auto         = jQuery( this ).children( '.thumbnail-big-sliders' ).data( 'auto' );
			var style6_hover        = jQuery( this ).children( '.thumbnail-big-sliders' ).data( 'hover' );

			style6_slider_init( style6_slider_class, style6_pager_class, style6_mode, style6_speed, style6_pause, style6_auto, style6_hover );
		} );

		// Ticker image settings
		var style7_slider_init = function ( style7_slider, style7_speed ) {
			jQuery( style7_slider ).bxSlider( {
				minSlides    : 5,
				maxSlides    : 8,
				slideWidth   : 150,
				slideMargin  : 12,
				ticker       : true,
				speed        : style7_speed,
				tickerHover  : true,
				useCSS       : false,
				onSliderLoad : function () {
					jQuery( '.image-ticker-news' ).css( 'visibility', 'visible' );
					jQuery( '.image-ticker-news' ).css( 'height', 'auto' );
				}
			} );
		};

		var style7_slider_wrapper = jQuery( '.widget_ticker_news_colormag' );
		jQuery( style7_slider_wrapper ).each( function () {
			var style7_slider = jQuery( this ).children( '.image-ticker-news' );
			var style7_speed  = jQuery( this ).children( '.image-ticker-news' ).data( 'speed' );

			style7_slider_init( style7_slider, style7_speed );
		} );

		// Gallery Post
		jQuery( '.blog .gallery-images, .archive .gallery-images, .search .gallery-images, .single-post .gallery-images' ).bxSlider( {
			mode           : 'fade',
			speed          : 1500,
			auto           : true,
			pause          : 3000,
			adaptiveHeight : true,
			nextText       : '',
			prevText       : '',
			nextSelector   : '.slide-next',
			prevSelector   : '.slide-prev',
			pager          : false
		} );
	}

	if ( ( typeof jQuery.fn.theiaStickySidebar !== 'undefined' ) && ( typeof ResizeSensor !== 'undefined' ) ) {
		// Calculate the whole height of sticky menu
		var height = jQuery( '#site-navigation-sticky-wrapper' ).outerHeight();

		// Assign height value to 0 if it returns null
		if ( height === null ) {
			height = 0;
		}

		// Apply sticky sidebar/content area feature
		jQuery( '#primary, #secondary' ).theiaStickySidebar( {
			additionalMarginTop : 40 + height
		} );
	}

	// Menu reveal on scroll
	if ( typeof jQuery.fn.headroom !== 'undefined' ) {
		var offset_value;
		var wpAdminBar = jQuery( '#wpadminbar' );
		var menuwidth  = jQuery( '.main-navigation' ).width();

		if ( wpAdminBar.length ) {
			offset_value = wpAdminBar.height() + jQuery( '#site-navigation' ).offset().top;
		} else {
			offset_value = jQuery( '#site-navigation' ).offset().top;
		}

		jQuery( '.main-navigation' ).headroom( {
			'offset'    : offset_value,
			'tolerance' : 0,
			onPin       : function () {
				if ( wpAdminBar.length ) {
					jQuery( '.main-navigation' ).css( {
						'top'      : wpAdminBar.height(),
						'position' : 'fixed',
						'width'    : menuwidth
					} );
				} else {
					jQuery( '.main-navigation' ).css( {
						'top'      : 0,
						'position' : 'fixed',
						'width'    : menuwidth
					} );
				}
			},
			onTop       : function () {
				jQuery( '.main-navigation' ).css( {
					'top'      : 0,
					'position' : 'relative'
				} );
			}
		} );
	}

	jQuery( '.video-player' ).each( function ( index ) {

		var playercontainer = jQuery( this );
		var itemid          = 'video-playlist-item-' + index;
		var playerframe     = jQuery( this ).find( '.player-frame' );

		playercontainer.attr( 'id', itemid );

		playerframe.video();

		update_video_status( playercontainer );

		playerframe.addVideoEvent( 'ready', function () {
			playerframe.css( 'visibility', 'visible' ).fadeIn();
		} );

		playercontainer.on( 'click', '.video-playlist-item', function () {

			var item             = jQuery( this );
			var iframe_id        = item.data( 'id' );
			var current_video_id = jQuery( '#' + iframe_id );
			var src              = item.data( 'src' );

			//Pause all videos if a item is clicked
			playercontainer.find( '.player-frame' ).each( function () {
				jQuery( this ).pauseVideo().hide();
			} );

			if ( ! current_video_id.length ) {

				playercontainer.find( '.video-frame' ).append( '<iframe id="' + iframe_id + '" class="player-frame" src="' + src + '" frameborder="0" width="100%" height="434" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' );
				current_video_id = jQuery( '#' + iframe_id );
				current_video_id.video();

				current_video_id.addVideoEvent( 'ready', function ( e, $current_video_id, video_type ) {
					current_video_id.playVideo();
				} );
			} else {
				current_video_id.playVideo();
			}

			current_video_id.css( 'visibility', 'visible' ).fadeIn();

			update_video_status( playercontainer );
		} );
	} );

	// Update Video status ----------
	function update_video_status( $playercontainer ) {
		$playercontainer.find( '.player-frame' ).each( function () {

			var $frame = jQuery( this ),
				$item  = jQuery( "[data-id='" + $frame.attr( 'id' ) + "']" );

			$frame.addVideoEvent( 'play', function ( e, $video, video_type ) {
				$item.removeClass( 'is-paused' ).addClass( 'is-playing' );
			} );

			$frame.addVideoEvent( 'pause', function ( e, $video, video_type ) {
				$item.removeClass( 'is-playing' ).addClass( 'is-paused' );
			} );

			$frame.addVideoEvent( 'finish', function ( e, $video, video_type ) {
				$item.removeClass( 'is-paused is-playing' );
			} );
		} );
	}

	if ( typeof jQuery.fn.prognroll !== 'undefined' ) {
		// Scroll Reading Progress JS Setting
		jQuery( "body" ).prognroll( {
			height : 5,
			color  : "#222",
			custom : false,
		} );
	}

	// Google Maps Settings
	if ( typeof google !== 'undefined' && typeof colormag_google_maps_widget_settings !== 'undefined' ) {

		// Create function to initialize Google Maps
		function initMap() {
			// Float the value coming from wp_localize_script to be used for JS
			var longitude = parseFloat( colormag_google_maps_widget_settings.longitude );
			var latitude  = parseFloat( colormag_google_maps_widget_settings.latitude );
			var zoom_size = parseInt( colormag_google_maps_widget_settings.zoom_size );

			// Add latitude and longitude to variable
			var latitudelongitude = {
				lat : latitude,
				lng : longitude
			};

			var map = new google.maps.Map( document.getElementById( "GoogleMaps" ), {
				zoom   : zoom_size,
				center : latitudelongitude
			} );

			var marker = new google.maps.Marker( {
				position : latitudelongitude,
				map      : map
			} );

		}

		// Call the function to display the Google Maps
		initMap();

		// Add the dynamic width and height set in widget options
		jQuery( '#GoogleMaps' ).css( {
			height : colormag_google_maps_widget_settings.height
		} );
	}

	/**
	 * Scrollbar on fixed responsive menu
	 *
	 */
	jQuery( window ).load( function () {
		if ( window.matchMedia( "(max-width: 768px)" ).matches && jQuery( '#masthead .sticky-wrapper, #masthead .headroom' ).length >= 1 ) {
			var screenHeight        = jQuery( window ).height();
			var availableMenuHeight = screenHeight - 88;
			var menu                = jQuery( '#site-navigation' ).find( 'ul' ).first();

			menu.css( 'max-height', availableMenuHeight )
			menu.addClass( 'menu-scrollbar' );
		}
	} );

	if ( typeof jQuery.fn.readingTime !== 'undefined' ) {
		// Settings to display the reading time.
		jQuery( '.readingtime' ).each( function() {
			jQuery( this ).readingTime( {
				readingTimeAsNumber : true,
				wordsPerMinute      : 200,
				round               : true,
				remotePath          : jQuery( this ).attr( 'data-file' ),
				remoteTarget        : jQuery( this ).attr( 'data-target' ),
				readingTimeTarget   : jQuery( this ).find( '.eta' ),
			} );
		} );
	}

} );

jQuery( document ).on( 'click', '#site-navigation ul li.menu-item-has-children > a', function ( event ) {
	var menuClass = jQuery( this ).parent( '.menu-item-has-children' );
	if ( ! menuClass.hasClass( 'focus' ) && jQuery( window ).width() <= 768 ) {
		menuClass.addClass( 'focus' );
		event.preventDefault();
		menuClass.children( '.sub-menu' ).css( {
			'display' : 'block'
		} );
	}
} );

jQuery( function() {
	// Flyout related post
	var related_posts_flyout_wrapper = jQuery( '#related-posts-wrapper-flyout' );
	function colormag_flyout_posts_window_scroll() {
		var primary_height = jQuery( '#primary' ).outerHeight();
		var window_height  = jQuery( this ).scrollTop() + jQuery( this ).height();
		var window_bottom  = jQuery( document ).height() - window_height;

		if ( window_height > window_bottom ) {
			related_posts_flyout_wrapper.addClass( 'flyout' );
		} else {
			related_posts_flyout_wrapper.removeClass( 'flyout' );
		}
	}

	jQuery( window ).on( 'scroll', colormag_flyout_posts_window_scroll );

	jQuery( '#flyout-related-post-close' ).click( function() {
		related_posts_flyout_wrapper.removeClass( 'flyout' );

		jQuery( window ).off( 'scroll', colormag_flyout_posts_window_scroll );
	});
} );
