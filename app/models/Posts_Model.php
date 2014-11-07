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

		public static function getPostByCourse($course_id, $index=0, $limit=NULL)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM user_posts_courses WHERE course_id = \"$course_id\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
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
			return $time;
		}	
	}

?>