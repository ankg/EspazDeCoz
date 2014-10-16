<?php

class MySQL
{
	$instance=NULL;	
	function getInstance()
	{
		if(!self::$instance)
		{
			global $CONFIG;
			self::$instance = new PDO("mysql:host=".$CONFIG["db_host"].";dbname={$CONFIG['db_name']}",$CONFIG['db_user'],$CONFIG['db_pass']);
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$instance;
	}

}
?>