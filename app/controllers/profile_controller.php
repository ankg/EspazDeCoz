<?php
	
	class ProfileController
	{
		public static function get($param=NULL)
		{
			if($param==NULL)
				$param = $_COOKIE["uid"];
			$uid = $param;
			$user = new User();
			$data = $user->getUserDataByUid($uid);
			$data_extra = $user->getUserExtraDetails($uid);
			$index = $data["profile_image"];
			$src2 = $destination = "files/profile_pics/". $_COOKIE["uid"]. "_".$index."." . $data["ext"];
			require_once('app/views/profile.php');
		}
		public static function get_xhr()
		{
			$type = $_GET['type'];
			$uid = $_COOKIE['uid'];
			$user = new User();
			$data = $user->getUserExtraDetails($uid);
			if($data==NULL)
			{
				if($type=="quote")
				{
					$quote = $_GET['value'];
					$query = MySQL::getInstance()->prepare("INSERT INTO users_extra(uid,quote) VALUES (\"$uid\",\"$quote\")");
					$query->execute();
				}
				else if($type=="academic")
						{
							$branch = $_GET['branch'];
							$year   = $_GET['year'];
							$query = MySQL::getInstance()->prepare("INSERT INTO users_extra(uid,branch,year) VALUES (\"$uid\",\"$branch\",\"$year\")");
							$query->execute();
						}
				else if($type=="work")
						{
							$work = $_GET['workData'];
							$val = "";
							foreach($work as $var)
							{
								$val = $val . $var . "/";
							}
							$query = MySQL::getInstance()->prepare("INSERT INTO users_extra(uid,experience) VALUES (\"$uid\",\"$val\")");
							$query->execute();
						}
				else if($type=="skills")
						{
							$skills = $_GET['skillsData'];
							$val = "";
							foreach($work as $var)
							{
								$val = $val . $var . "/";
							}
							$query = MySQL::getInstance()->prepare("INSERT INTO users_extra(uid,skills) VALUES (\"$uid\",\"$val\")");
							$query->execute();
						}
			}
			else
			{
				if($type=="quote")
				{
					$quote = $_GET['value'];
					$query = MySQL::getInstance()->prepare("UPDATE users_extra SET quote=(\"$quote\") WHERE uid=\"$uid\"");
					$query->execute();
				}
				else if($type=="academic")
						{
							$branch = $_GET['branch'];
							$year   = $_GET['year'];
							$query = MySQL::getInstance()->prepare("UPDATE users_extra SET branch=\"$branch\", year=\"$year\" WHERE uid=\"$uid\"");
							$query->execute();
						}
				else if($type=="work")
						{
							$work = $_GET['workData'];
							$val = "";
							foreach($work as $var)
							{
								$val = $val . $var . "/";
							}
							$query = MySQL::getInstance()->prepare("UPDATE users_extra SET experience=(\"$val\") WHERE uid=\"$uid\"");
							$query->execute();
						}
				else if($type=="skills")
						{
							$skills = $_GET['skillsData'];
							$val = "";
							foreach($skills as $var)
							{
								$val = $val . $var . "/";
							}
							
							$query = MySQL::getInstance()->prepare("UPDATE users_extra SET skills=(\"$val\") WHERE uid=\"$uid\"");
							$query->execute();
						}
			}
		}
	}
?>