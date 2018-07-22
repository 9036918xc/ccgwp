<?php $us_ca_map = $this->options; ?>

var us_ca_config = {
	'default':{
		'borderclr':'<?php echo $us_ca_map['borderclr']; ?>',
		'visnames':'<?php echo $us_ca_map['visnames']; ?>',
	}<?php echo (isset($us_ca_map['url_1']))?',':''; ?><?php $i = 1; 	while (isset($us_ca_map['url_'.$i])) { ?>'us_ca_<?php echo $i; ?>':{
		'hover': '<?php echo str_replace(array("\n","\r","\r\n","'"),array('','','','’'), is_array($us_ca_map['info_'.$i]) ?
				array_map('stripslashes_deep', $us_ca_map['info_'.$i]) : stripslashes($us_ca_map['info_'.$i])); ?>',
		'url':'<?php echo $us_ca_map['url_'.$i]; ?>',
		'targt':'<?php echo $us_ca_map['turl_'.$i]; ?>',
		'upclr':'<?php echo $us_ca_map['upclr_'.$i]; ?>',
		'ovrclr':'<?php echo $us_ca_map['ovrclr_'.$i]; ?>',
		'dwnclr':'<?php echo $us_ca_map['dwnclr_'.$i]; ?>',
		'enbl':<?php echo $us_ca_map['enbl_'.$i]=='1'?'true':'false'; ?>,
		'visnames':'us_ca_vn<?php echo $i; ?>',
		}
		<?php echo (isset($us_ca_map['url_'.($i+1)]))?',':''; ?><?php $i++;} ?>
}