<?php $us_al_map_ii = $this->options; ?>

var us_al_config_ii = {
	'default':{
		'borderclr':'<?php echo $us_al_map_ii['borderclr']; ?>',
		'visnames':'<?php echo $us_al_map_ii['visnames']; ?>',
	}<?php echo (isset($us_al_map_ii['url_1']))?',':''; ?><?php $i = 1; 	while (isset($us_al_map_ii['url_'.$i])) { ?>'us_al_<?php echo $i; ?>':{
		'hover': '<?php echo str_replace(array("\n","\r","\r\n","'"),array('','','','’'), is_array($us_al_map_ii['info_'.$i]) ?
				array_map('stripslashes_deep', $us_al_map_ii['info_'.$i]) : stripslashes($us_al_map_ii['info_'.$i])); ?>',
		'url':'<?php echo $us_al_map_ii['url_'.$i]; ?>',
		'targt':'<?php echo $us_al_map_ii['turl_'.$i]; ?>',
		'upclr':'<?php echo $us_al_map_ii['upclr_'.$i]; ?>',
		'ovrclr':'<?php echo $us_al_map_ii['ovrclr_'.$i]; ?>',
		'dwnclr':'<?php echo $us_al_map_ii['dwnclr_'.$i]; ?>',
		'enbl':<?php echo $us_al_map_ii['enbl_'.$i]=='1'?'true':'false'; ?>,
		'visnames':'us_al_vn<?php echo $i; ?>',
		}
		<?php echo (isset($us_al_map_ii['url_'.($i+1)]))?',':''; ?><?php $i++;} ?>
}