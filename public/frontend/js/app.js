/*!
 * VIS TV
 * Copyright 2017 VIS TV
 */
;(function($) {
	// side menu
	$('[data-toggle="show-aside-menu"]').on('click', function(e) {
		e.preventDefault();

		$('#sidebar-wrapper').toggleClass('open', 1000, "easeOutSine");

		// toggle navbar
		$(this).parents('#header').find('.navbar-toggle').click();
	});

	$('.sidebar-backdrop').click(function() {
		$('#sidebar-wrapper').removeClass('open');
	});

	// bootstrap carousel
	$('.carousel').swipe({
		swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
		    if (direction == 'left') $(this).carousel('next');
		    if (direction == 'right') $(this).carousel('prev');
		},
		allowPageScroll:'vertical'
	});

	$('.category__slider-video')
		.mousewheel(function(event, delta) {
		    event.preventDefault();
		    this.scrollLeft += (delta * 1500);
		})
		.swipe({
			allowPageScroll: 'horizontal',
			swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
				var $self = $(this);
				distance += 175 + duration + $self.scrollLeft();

				if ('left' === direction || 'up' === direction) {
					$self.stop().animate({scrollLeft: distance});
				} else {
					$self.stop().animate({scrollLeft: -1 * distance});
				}
	        },
	        allowPageScroll:'vertical'
		})
	;

	// sidebar menu scroll videos from categories list
	$(document).on('click', '.sidebar__menu .sidebar__menu-item a', function(event) {
		if ( $('.category__slider[data-genre]').length ) {
			event.preventDefault();

			var $self = $(this);

			if ( $self.data('genre') ) {
				var genre_elem = $('.category__slider[data-genre="'+ $self.data('genre') +'"]');
				var top = genre_elem.position().top;
				
				// scroll genre element
				$('#main-wrapper').stop().animate({scrollTop: top}, 1000);
			}

		}
		
	});

	
})(jQuery);