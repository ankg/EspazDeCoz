<?php
	
	class CourseController
	{
		public static function post($param=NULL, $id=NULL)
		{
			if($param==NULL && $id==NULL)
			{
				$branches = new Branch();
				$data = $branches->getBranches();
				require_once("app/views/course.php");
			}
			elseif($param!=NULL && $id==NULL) {
				$branches = new Branch();
				$data = $branches->getBranchIdByName($param);
				$course = new Course();
				$data = $branches->getCoursesByBranch($data["branch_id"]);
				require_once("app/views/course.php");
			}
			elseif($param!=NULL && $id!=NULL) {
				$course = new Course();
				$data = $branches->getCourseDetails($id);
				require_once("app/views/course.php");
			}
		}
	}
?>