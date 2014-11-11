<?php
	
	/**
	* Class having all functionality relating to a course
	*/
	class Course extends Model
	{
		private $course_id;
		private $course_name;
		private $course_title;

		public static function getCoursesByUid($uid)
		{
			$query = MySQL::getInstance()->prepare("SELECT course_id FROM user_courses_map WHERE uid = \"$uid\"");
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
			$allCourse =  [];
			foreach ($data as $value) 
			{
				array_push($allCourse, Course::getCourseDetails($value['course_id']));
			}
			return $allCourse;
		}
		public static function getCourseDetails($course_id)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM courses WHERE course_id = \"$course_id\"");
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
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
		public static function registerUser($course_id)
		{
			$uid = $_COOKIE["uid"];
			$query = MYSQL::getInstance()->prepare("INSERT INTO user_courses_map(course_id,uid) VALUES ('$course_id','$uid') ");
			$bool = $query->execute();
			return $bool;
		}
	}
?>