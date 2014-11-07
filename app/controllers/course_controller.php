<?php
	class CourseController
	{
		public static function get($param=NULL, $id=NULL)
		{
			if($param==NULL && $id==NULL)
			{
				$branches = new Branch();
				$data_branch = $branches->getBranches();
				require_once("app/views/course.php");
			}
			elseif($param!=NULL && $id==NULL) {
				$param = rawurldecode($param);
				$branches = new Branch();
				$data = $branches->getBranchIdByName($param);
				$course = new Course();
				$data = $branches->getCoursesByBranch($data["branch_id"]);
				require_once("app/views/course.php");
			}
			elseif($param!=NULL && $id!=NULL) {
				$param = rawurldecode($param);
				$branches = new Branch();
				$data = $branches->getBranchIdByName($param);
				$course = new Course();
				$data_branch = $course->getCoursesByBranch($data[0]["branch_id"]);
				$course = new Course();
				$data_course = $course->getCourseDetails($id);
				$course_post = new Post();
				$course_posts = $course_post->getPostByCourse($id);
				//var_dump($data_course);
				require_once("app/views/course.php");
			}
		}
		public static function post_xhr()
		{
			$course_id = $_POST["course_id"];
			$course = new Course();
			$bool = $course->registerUser($course_id);
			echo "{\"success\":$bool}";
		}
	}
?>