<?php
	/**
	* Includes all the files:- controllers, models and views
	*/
	require("app/models/Model.php");
	require_once ("Toro.php");
	require_once ("password.php");
	require_once ("config/bootstrap.php");
	foreach (glob("app/models/*.php") as $filename)
	{
    require_once ($filename);
	}
	foreach (glob("app/controllers/*.php") as $filename)
	{
    require_once ($filename);
	}
	/**
	* Writing the necessary routes for the website
	*/
	Toro::serve(array(
		''=> 'LandingController',
		'/'=>'LandingController',

		'/register'=>'RegisterController',

		'/login'=>'LoginController',

		'/profile' => 'ProfileController',
		'/profile/:number' =>'ProfileController',
		'/uploadprofile' => 'UploadProfileController',

		'/course' => 'CourseController',
		'/course/([\w\s]*)' => 'CourseController',
		'/course/([\w\s]*)/:number' => 'CourseController',

		'/posts' => 'PostController',

		'/home' => 'HomeController',
		'/logout' => 'LogoutController',
		'/search' => 'SearchController'
	));
?>
