<?php
	
	class LogoutController
	{
		function get()
		{
			unset($_COOKIE['username']);
			unset($_COOKIE['uid']);
			header("Location: /");
		}
	}
?>