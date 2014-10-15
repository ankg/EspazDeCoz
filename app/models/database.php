<?php

class MySQL
{
	$instance=NULL;	
	function getInstance()
	{
		if(!self::$instance)
		{
			self::$instance = new PDO();

		}
		return self::$instance;
	}

}
?>