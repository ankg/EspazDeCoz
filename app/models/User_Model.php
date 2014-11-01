<?php
	
	class User
	{
		private $uid;
		private $username;
		private $email;
		private $alternate_email;
		private $password;
		private $enroll;
		private $fullname;
		private $branch;
		private $designation;
		private $courses;
		private $salt;
		function __construct($username_in=NULL)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM users WHERE username = \"$username_in\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			$uid = $data['uid'];
			$username =  $data['username'];
			$email = $data['email'];
			$alternate_email = $data['alternate_email'];
			$password = $data['password'];
			$enroll = $data['enroll'];
			$fullname = $data['fullname'];
			$branch = $data['branch'];
			$designation = $data['designation'];
			$courses = $data['courses'];
			$salt = $data['salt'];
		}
		function getUserData($username_input=NULL)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM users WHERE username = \"$username_input\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC); 
			return $data;
		}
		function registerUser($username, $email, $password, $fullname, $designation, $salt)
		{
			$query = MySQL::getInstance()->prepare("INSERT INTO users(username, fullname, password, email, salt,designation) VALUES ('$username','$fullname','$password','$email','$salt','$designation')");
			$val = $query->execute();
			return $val;
		}

	}
?>