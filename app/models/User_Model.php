<?php
	
	class User extends Model
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
		
		function getUserDataByUid($uid)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM users WHERE uid = \"$uid\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC); 
			return $data;
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
		function getUserPosts($uid)
		{
			$post = new Post();
			return $post->getPostsByUid($uid);
		}
		function getUserCourses($uid)
		{
			$courses = new Course();
			return $courses->getCoursesByUid($uid);
		}
		function getUserExtraDetails($uid)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM users_extra WHERE uid = \"$uid\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC); 
			return $data;
		}
		function getProfilePic($uid)
		{
			$user = User::getUserDataByUid($uid);
			$index = $user["profile_image"];
			$src = "/files/profile_pics/". $uid. "_".$index."." . $user["ext"];
			return $src;
		}
	}
?>