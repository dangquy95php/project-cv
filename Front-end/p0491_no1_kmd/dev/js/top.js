'use strict';

/**
 * Binds to the document ready event.
 *
 * @since 3.2.1
 *
 * @param {jQuery} $ The jQuery object.
 */
jQuery(document).ready(function ($) {

	$('.c-slider').bxSlider({
		auto: true,
		speed: 2000,
		pause: 3000,
		mode: 'fade',
		touchEnabled: true,
		infiniteLoop: true,
		controls: false,
		pager: false
	});

});
