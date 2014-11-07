<?php
	
	class Course
	{
		private $course_id;
		private $course_name;
		private $course_title;

		public static function getCoursesByUid($uid)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM users_courses_map WHERE uid = \"$uid\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getCourseDetails($course_id)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM courses WHERE course_id = \"$course_id\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getPostByCourse($course_id)
		{
			$post = new Post();
			return $post->getPostByCourse($course_id);
		}
		public static function getCoursesByBranch($branch_id)
		{
			$branch = new Branch();
			$data = $branch->getCoursesByBranch($branch_id);
			return $data;
		}
	}
?>