<?php
	class HomeController
	{
		public static function get()
		{
			
			//get all courses in $courses
			$uid = $_COOKIE['uid'];
			$courses2 = new Course();
			$courses = $courses2->getCourseByUid($uid);
			$data_final = array();
			foreach($courses as $val)
			{
				$posts = new Posts();
				$data = $posts->getPostByCourseid($val);
				$data_final = array_push($data);
			}
			

			require_once('app/views/home.php');
		}

	}
?>