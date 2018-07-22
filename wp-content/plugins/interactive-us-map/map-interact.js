﻿// Quick feature detection
function isTouchEnabled() {
 	return (('ontouchstart' in window)
      	|| (navigator.MaxTouchPoints > 0)
      	|| (navigator.msMaxTouchPoints > 0));
}
jQuery(function(){
	jQuery("path[id^=\"usr_\"]").each(function (i, e) {
		addEvent( jQuery(e).attr('id') );
	});
})
jQuery(function(){
	jQuery('#lakes').find('path').attr({'fill':usr_config['default']['lakesfill']}).css({'stroke':usr_config['default']['lakesoutline']});
});
function addEvent(id,relationId){
	var _obj = jQuery('#'+id);
	var _Textobj = jQuery('#'+id+','+'#'+usr_config[id]['visnames']);
	var _h = jQuery('#map').height();

	jQuery('#'+['visnames']).attr({'fill':usr_config['default']['visnames']});

		_obj.attr({'fill':usr_config[id]['upclr'],'stroke':usr_config['default']['borderclr']});
		_Textobj.attr({'cursor':'default'});
		if(usr_config[id]['enbl'] == true){
			if (isTouchEnabled()) {
				_Textobj.on('touchstart', function(e){
					var touch = e.originalEvent.touches[0];
					var x=touch.pageX-10, y=touch.pageY+(-15);
					var maptipw=jQuery('#tipusr').outerWidth(), maptiph=jQuery('#tipusr').outerHeight(), 
					x=(x+maptipw>jQuery(document).scrollLeft()+jQuery(window).width())? x-maptipw-(20*2) : x
					y=(y+maptiph>jQuery(document).scrollTop()+jQuery(window).height())? jQuery(document).scrollTop()+jQuery(window).height()-maptiph-10 : y
					if(usr_config[id]['targt'] != 'none'){
						jQuery('#'+id).css({'fill':usr_config[id]['dwnclr']});
					}
					jQuery('#tipusr').show().html(usr_config[id]['hover']);
					jQuery('#tipusr').css({left:x, top:y})
				})
				_Textobj.on('touchend', function(){
					jQuery('#'+id).css({'fill':usr_config[id]['upclr']});
					if(usr_config[id]['targt'] == '_blank'){
						window.open(usr_config[id]['url']);	
					}else if(usr_config[id]['targt'] == '_self'){
						window.parent.location.href=usr_config[id]['url'];
					}
					jQuery('#tipusr').hide();
				})
			}
			_Textobj.attr({'cursor':'pointer'});
			_Textobj.hover(function(){
				//moving in/out effect
				jQuery('#tipusr').show().html(usr_config[id]['hover']);
				_obj.css({'fill':usr_config[id]['ovrclr']})
			},function(){
				jQuery('#tipusr').hide();
				jQuery('#'+id).css({'fill':usr_config[id]['upclr']});
			})
			if(usr_config[id]['targt'] != 'none'){
				//clicking effect
				_Textobj.mousedown(function(){
					jQuery('#'+id).css({'fill':usr_config[id]['dwnclr']});
				})
			}
			_Textobj.mouseup(function(){
				jQuery('#'+id).css({'fill':usr_config[id]['ovrclr']});
				if(usr_config[id]['targt'] == '_blank'){
					window.open(usr_config[id]['url']);	
				}else if(usr_config[id]['targt'] == '_self'){
					window.parent.location.href=usr_config[id]['url'];
				}
			})
			_Textobj.mousemove(function(e){
				var x=e.pageX+10, y=e.pageY+15;
				var maptipw=jQuery('#tipusr').outerWidth(), maptiph=jQuery('#tipusr').outerHeight(), 
				x=(x+maptipw>jQuery(document).scrollLeft()+jQuery(window).width())? x-maptipw-(20*2) : x
				y=(y+maptiph>jQuery(document).scrollTop()+jQuery(window).height())? jQuery(document).scrollTop()+jQuery(window).height()-maptiph-10 : y
				jQuery('#tipusr').css({left:x, top:y})
			})
		}	
}