<?php
	/**
	* handles what to open on landing
	*/
	class LandingController
	{
		public function get()
		{
			if(isset($_COOKIE['username']))
				header("Location: /home");
			else
				header("Location: /login");
		}
	}
?>