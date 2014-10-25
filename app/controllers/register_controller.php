<?php
	class RegisterController
	{
		public static function get()
		{
			require_once('app/views/register.php');
		}
		public static function post()
		{
			/**
			*Stores the $_POST values in respective variables
			*/
			$designation    = $_POST['status']; 
			$username_input = $_POST['username'];
			$password_input = $_POST['password'];
			$fullname_input = $_POST['fullname'];
			$email_input    = $_POST['email'];
			//$cnfpass_input  = $_POST['cnfpassword'];
			$uid = MySQL::getInstance()->lastInsertId() + 1;
			/**
			*Creates the hash of Timestamp, takes it's first half and stores it in the db
			*and also stores the password by adding the hash to it.
			*/
			//ToDO:- Add code for password confirmation
			$date = new DateTime();
			$time = $date->getTimestamp();
			$timehash = crypt($time);
			$salt = substr($timehash, 0, floor(strlen($timehash) / 2)+1);
			$password_input = password_hash($password_input.$salt , PASSWORD_DEFAULT);
			/**
			*Insert the values into the DB
			*/
			

			
			$query = MySQL::getInstance()->prepare("INSERT INTO users(username, fullname, password, email, salt,designation) VALUES ('$username_input','$fullname_input','$password_input','$email_input','$salt','$designation')");
			$val = $query->execute();

			if($val==TRUE)
			{	
				$_SESSION['message'] = 'Successfully Registered';
				header("Location: /login");
			}
			else
			{
				$_SESSION['message'] = 'Could not Register,Server Error';
				header("Location: /register");
			}
		}
	}
?>