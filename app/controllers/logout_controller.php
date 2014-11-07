<?php
	
	class LogoutController
	{
		function get()
		{
			setcookie('username', '', time()-3600);
			setcookie('uid', '', time()-3600);
			header("Location: /");
		}
	}
?>