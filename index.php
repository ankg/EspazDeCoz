<?php
		
	require ("Toro.php");
	require ("config/bootstrap.php");
	Toro::serve(array(
		'/'=>'HomeController',
		'/login'=>'LoginController',
		'/register'=>'RegisterController'
		));
?>
