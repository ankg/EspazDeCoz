<?php
	
	class Post
	{
		private $post_id;
		private $course_id;
		private $post_files;
		private $post_images;
		private $uid;
		private $timestamp;
		private $comments;

		public static function InsertPost($uid,$course_id,$post=NULL,$post_image=NULL,$post_files=NULL)
		{
			$date = new DateTime();
			$timestampnow = $date->getTimestamp();
			$query = MySQL::getInstance()->prepare("INSERT INTO user_posts_courses(uid,post,course_id,post_image,post_files,`timestamp`) VALUES (\"$uid\",\"$post\",\"$course_id\",\"$post_image\",\"$post_files\",\"$timestampnow\")");
			$query->execute();
		}
		public static function getPostByCourse($course_id, $index=0, $limit=NULL)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM user_posts_courses WHERE course_id = \"$course_id\"");
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getPostsByUid($uid)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM user_posts_courses WHERE uid = \"$uid\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}	
		public static function getVotesByPost($post_id)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM votes WHERE post_id = \"$post_id\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getCommentsByPostid($post_id)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM comments WHERE post_id = \"$post_id\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getTime($timestamp)
		{
			$date = new DateTime();
			$timestampnow = $date->getTimestamp();
			$diff = $timestampnow-$timestamp;
			$seconds = $diff%60;
			$diff = $diff - $seconds;
			$minutes = ($diff%3600);
			$diff = $diff - $minutes;
			$minutes = $minutes/60;
			$hours   = $diff/3600;
			$time = "{\"hours\":\"$hours\",\"minutes\":\"$minutes\",\"seconds\":\"$seconds\"}";
			if($hours==0 && $minutes==0)
				$time = $seconds . " sec ago";
			elseif($hours==0 && $minutes!=0)
				$time = $minutes . " min ago";
			elseif($hours!=0)
				$time = $hours . " hours ago";
			return $time;
		}
		public static function getLatestId()
		{
			$query = MySQL::getInstance()->prepare("SELECT post_id FROM user_posts_courses ORDER BY post_id DESC LIMIT 1");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);

			return $data;
		}	
	}

?>