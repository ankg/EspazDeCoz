<?php
	/**
	* handles what to open on landing
	*/
	class LandingController
	{
		public function get()
		{
			if(isset($_COOKIE['username']))
				header("Location: /profile");
			else
				header("Location: /login");
		}
	}
?>