jQuery(function($) {
	var nav    = $('header'),
	    offset = nav.offset();
	  
	$(window).scroll(function () {
	  if($(window).scrollTop() > offset.top) {
	    nav.addClass('fixed');
	  } else {
	    nav.removeClass('fixed');
	  }
	});

	$('a[href^=#]').click(function() {
	    var speed = 2000; // ミリ秒
	    var href= $(this).attr("href");
	    var target = $(href == "#" || href == "" ? 'html' : href);
	    var position = target.offset().top;
	    $('body,html').animate({scrollTop:position}, speed, 'easeInOutQuint');
	    return false;
	 });

	$('#burger').click(function(){
	     $('#gnav, #burger').toggleClass('open');
	});
});