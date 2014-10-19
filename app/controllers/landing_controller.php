<?php
	class LandingController
	{
	public function get()
	{
	if(isset($_COOKIE['user']))
		header("Location: /home");
		//require_once('app/views/home.php');
	else
		header("Location: /login");
	}
	

	}
?>