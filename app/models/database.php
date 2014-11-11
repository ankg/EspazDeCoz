<?php
	
	/**
	* Class that instantiates the creation of a PDO object, for DB insertions, retrievals and updates
	*/
	class MySQL
	{
		private static $instance=NULL;	
		public static function getInstance()
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