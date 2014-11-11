<?php
	
	/**
	* Class having functions for all branch related queries
	*/
	class Branch extends Model
	{
		public static function getBranches()
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM branches");
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getCoursesByBranch($branch_id)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM courses WHERE branch_id = \"$branch_id\"");
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getBranchIdByName($branch_name)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM branches WHERE branch_name = \"$branch_name\"");
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getBranchByCourse($course_id)
		{
			$query = MySQL::getInstance()->prepare("SELECT branch_name FROM branches WHERE branch_id = (SELECT branch_id FROM courses WHERE course_id = \"$course_id\")");
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getBranchById($branch_id)
		{
			$query = MySQL::getInstance()->prepare("SELECT branch_name FROM branches WHERE branch_id = \"$branch_id\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
	}
?>