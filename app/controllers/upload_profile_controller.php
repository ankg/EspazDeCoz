<?php

	class UploadProfileController
	{
		public static function post()
		{
			
			$name = $_FILES["image"]["name"];
			$temp = $_FILES['image']['tmp_name'];
			$ext = pathinfo($name,PATHINFO_EXTENSION);
			$username = $_COOKIE["username"];
			$query = MySQL::getInstance()->prepare("SELECT profile_image FROM users WHERE username = \"$username\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			$index=1;
			if($data==NULL)
			{
				$destination = "files/profile_pics/". $_COOKIE["uid"]. "_1." . $ext;
			}
			else
			{
				/*$x = strpos($data["profile_image"], '.');
				$x--;
				$index = substr($data["profile_image"], $x, 1);
				$index = (int)$index;
				$index++;*/
				$index = $data["profile_image"];
				$index++;
				$destination = "files/profile_pics/". $_COOKIE["uid"]. "_".$index."." . $ext;
			}
			move_uploaded_file($temp, $destination);
			$query = MySQL::getInstance()->prepare("UPDATE users SET profile_image=\"$index\", ext=\"$ext\" WHERE username=\"$username\"");
			$query->execute();
			echo "{\"url\":\"$destination\"}";
		}
	}
?>