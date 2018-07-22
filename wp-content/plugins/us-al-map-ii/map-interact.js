﻿// Quick feature detection
function isTouchEnabled() {
 	return (('ontouchstart' in window)
      	|| (navigator.MaxTouchPoints > 0)
      	|| (navigator.msMaxTouchPoints > 0));
}
jQuery(function(){
	jQuery("path[id^=\"us_al_\"]").each(function (i, e) {
		addEvent( jQuery(e).attr('id') );
	});
})
function addEvent(id,relationId){
	var _obj = jQuery('#'+id);
	var _Textobj = jQuery('#'+id+','+'#'+us_al_config_ii[id]['visnames']);
	var _h = jQuery('#map').height();

	jQuery('#'+['visnames']).attr({'fill':us_al_config_ii['default']['visnames']});

		_obj.attr({'fill':us_al_config_ii[id]['upclr'],'stroke':us_al_config_ii['default']['borderclr']});
		_Textobj.attr({'cursor':'default'});
		if(us_al_config_ii[id]['enbl'] == true){
			if (isTouchEnabled()) {
				_Textobj.on('touchstart', function(e){
					var touch = e.originalEvent.touches[0];
					var x=touch.pageX-10, y=touch.pageY+(-15);
					var maptipw=jQuery('#tipusal').outerWidth(), maptiph=jQuery('#tipusal').outerHeight(), 
					x=(x+maptipw>jQuery(document).scrollLeft()+jQuery(window).width())? x-maptipw-(20*2) : x
					y=(y+maptiph>jQuery(document).scrollTop()+jQuery(window).height())? jQuery(document).scrollTop()+jQuery(window).height()-maptiph-10 : y
					if(us_al_config_ii[id]['targt'] != 'none'){
						jQuery('#'+id).css({'fill':us_al_config_ii[id]['dwnclr']});
					}
					jQuery('#tipusal').show().html(us_al_config_ii[id]['hover']);
					jQuery('#tipusal').css({left:x, top:y})
				})
				_Textobj.on('touchend', function(){
					jQuery('#'+id).css({'fill':us_al_config_ii[id]['upclr']});
					if(us_al_config_ii[id]['targt'] == '_blank'){
						window.open(us_al_config_ii[id]['url']);	
					}else if(us_al_config_ii[id]['targt'] == '_self'){
						window.parent.location.href=us_al_config_ii[id]['url'];
					}
					jQuery('#tipusal').hide();
				})
			}
			_Textobj.attr({'cursor':'pointer'});
			_Textobj.hover(function(){
				//moving in/out effect
				jQuery('#tipusal').show().html(us_al_config_ii[id]['hover']);
				_obj.css({'fill':us_al_config_ii[id]['ovrclr']})
			},function(){
				jQuery('#tipusal').hide();
				jQuery('#'+id).css({'fill':us_al_config_ii[id]['upclr']});
			})
			if(us_al_config_ii[id]['targt'] != 'none'){
				//clicking effect
				_Textobj.mousedown(function(){
					jQuery('#'+id).css({'fill':us_al_config_ii[id]['dwnclr']});
				})
			}
			_Textobj.mouseup(function(){
				jQuery('#'+id).css({'fill':us_al_config_ii[id]['ovrclr']});
				if(us_al_config_ii[id]['targt'] == '_blank'){
					window.open(us_al_config_ii[id]['url']);	
				}else if(us_al_config_ii[id]['targt'] == '_self'){
					window.parent.location.href=us_al_config_ii[id]['url'];
				}
			})
			_Textobj.mousemove(function(e){
				var x=e.pageX+10, y=e.pageY+15;
				var maptipw=jQuery('#tipusal').outerWidth(), maptiph=jQuery('#tipusal').outerHeight(), 
				x=(x+maptipw>jQuery(document).scrollLeft()+jQuery(window).width())? x-maptipw-(20*2) : x
				y=(y+maptiph>jQuery(document).scrollTop()+jQuery(window).height())? jQuery(document).scrollTop()+jQuery(window).height()-maptiph-10 : y
				jQuery('#tipusal').css({left:x, top:y})
			})
		}	
}