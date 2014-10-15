<?php
	include 'Toro.php';
	Toro::serve(
	array(
		'/'=>'HomeController',
		'/login'=>'LoginController',
		'/register'=>'RegisterController'
		)
	)
?>
