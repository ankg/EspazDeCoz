<?php
	/*
		Includes all the files:- controllers, models and views
	*/
	require_once ("Toro.php");
	require_once ("config/bootstrap.php");
	foreach (glob("app/controllers/*.php") as $filename)
	{
    require_once ($filename);
	}
	/*
	Writing the necessary routes for the website
	*/
	Toro::serve(array(
		'/'=>'LandingController',
		'/login'=>'LoginController',
		'/login/:string'=>'LoginController',
		'/home' => 'HomeController',
		'/register'=>'RegisterController',

		));
?>
