<?php
	
	class Branch
	{
		public static function getBranches()
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM branches");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getCoursesByBranch($branch_id)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM courses WHERE branch_id = \"$branch_id\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
		public static function getBranchIdByName($branch_name)
		{
			$query = MySQL::getInstance()->prepare("SELECT * FROM branches WHERE branch_name = \"$branch_name\"");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
	}
?>