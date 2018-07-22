<?php $usr_map = $this->options; ?>
var usr_config = {
	'default':{
		'borderclr':'<?php echo $usr_map['borderclr']; ?>',
		'visnames':'<?php echo $usr_map['visnames']; ?>',
		'lakesfill':'<?php echo $usr_map['lakesfill']; ?>',
		'lakesoutline':'<?php echo $usr_map['lakesoutline']; ?>'
	}<?php echo (isset($usr_map['url_1']))?',':''; ?><?php $i = 1; 	while (isset($usr_map['url_'.$i])) { ?>'usr_<?php echo $i; ?>':{
		'hover': '<?php echo str_replace(array("\n","\r","\r\n","'"),array('','','','’'), is_array($usr_map['info_'.$i]) ?
				array_map('stripslashes_deep', $usr_map['info_'.$i]) : stripslashes($usr_map['info_'.$i])); ?>',
		'url':'<?php echo $usr_map['url_'.$i]; ?>',
		'targt':'<?php echo $usr_map['turl_'.$i]; ?>',
		'upclr':'<?php echo $usr_map['upclr_'.$i]; ?>',
		'ovrclr':'<?php echo $usr_map['ovrclr_'.$i]; ?>',
		'dwnclr':'<?php echo $usr_map['dwnclr_'.$i]; ?>',
		'enbl':<?php echo $usr_map['enbl_'.$i]=='1'?'true':'false'; ?>,
		'visnames':'usr_vn<?php echo $i; ?>',
		}
		<?php echo (isset($usr_map['url_'.($i+1)]))?',':''; ?><?php $i++;} ?>
}