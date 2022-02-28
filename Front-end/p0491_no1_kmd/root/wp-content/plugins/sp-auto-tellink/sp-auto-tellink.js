if(navigator.userAgent.match(/(iPhone|Android)/)){
	jQuery(function($){
		$('.tel_link').each(function(){
			var str = $(this).html();
			if($(this).children().is('img')){
				$(this).html($('<a>').attr('href', 'tel:' + $(this).children().attr('alt').replace(/-|\s+/g, '')).append(str + '</a>'));
			}else{
				$(this).html($('<a>').attr('href', 'tel:' + $(this).text().replace(/-|\s+/g, '')).append(str + '</a>'));
			}
			$("a[href^='tel']").bind('click', function(){
				gtag('event', location.pathname, {'event_category':'tel','event_label':'tel_contact','value':0});
			});
		});
	});
}
