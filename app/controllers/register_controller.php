<?php
	class RegisterController
	{
		public static function get()
		{
			require_once('app/views/register.php');
		}
		public static function post_xhr()
		{
			//username existence check, echo JSON format
			//login check
			/**
			*Stores the $_POST values in respective variables
			*/
			$designation    = $_POST['status']; 
			$username_input = $_POST['username'];
			$password_input = $_POST['password'];
			$fullname_input = $_POST['fullname'];
			$email_input    = $_POST['email'];
			/**
			*Creates the hash of Timestamp, takes it's first half and stores it in the db
			*and also stores the password by adding the hash to it.
			*/
			$date = new DateTime();
			$time = $date->getTimestamp();
			$timehash = crypt($time);
			$salt = substr($timehash, 0, floor(strlen($timehash) / 2)+1);
			//$password_input = password_hash($password_input.$salt , PASSWORD_DEFAULT);
			$password_input = password_hash($password_input.$salt , PASSWORD_DEFAULT);
			/**
			*Insert the values into the DB
			*/
			$user = new User($username_input);
			$data = $user->getUserData($username_input);
			$val = $user->registerUser($username_input, $email_input, $password_input, $fullname_input, $designation, $salt);

			if($val==TRUE)
			{	
				echo "{\"register\":true}";
			}
			else
			{
				echo "{\"register\":false,\"msg\":\"Could not Register, Server Error\"}";
			}
		}
		public static function get_xhr()
		{
			$username_input = $_GET['username'];
			$user = new User($username_input);
			$data = $user->getUserData($username_input);
			if($data==NULL)
				echo "{\"valid\":\"true\"}";
			else
				echo "{\"valid\":false,\"msg\":\"Username is already taken.\"}";
		}
	}
?>