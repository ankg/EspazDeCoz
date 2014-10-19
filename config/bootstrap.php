<?php
	global $CONFIG;
	$CONFIG = json_decode(file_get_contents('config/config.json'),true);
	if($CONFIG['environment']=='development')
		{
			error_reporting('-1');
			ini_set('display_errors','On');
		}
	session_start();

?>