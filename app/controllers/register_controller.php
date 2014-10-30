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
			//$confpass_input  = $_POST['confpassword'];
			//$uid = MySQL::getInstance()->lastInsertId() + 1;
			/**
			*Creates the hash of Timestamp, takes it's first half and stores it in the db
			*and also stores the password by adding the hash to it.
			*/
			$date = new DateTime();
			$time = $date->getTimestamp();
			$timehash = crypt($time);
			$salt = substr($timehash, 0, floor(strlen($timehash) / 2)+1);
			$password_input = password_hash($password_input.$salt , PASSWORD_DEFAULT);
			/**
			*Insert the values into the DB
			*/
			$query1 = MySQL::getInstance()->prepare("SELECT * FROM `users` where `username` = `$username_input`");
			$query1->execute();
			$data = $query1->fetch(PDO::FETCH_ASSOC);
			
			if($data!=NULL)
			{
				$_SESSION['message'] = 'Username Already Taken';
				//echo "{error:'Username Already Taken'}";
				header("Location: /register");
			}

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