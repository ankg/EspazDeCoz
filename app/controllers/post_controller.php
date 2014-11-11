<?php
	
	class PostController
	{
		public static function post()
		{
			//print_r("asda");
			//var_dump($_POST);
			$post=NULL;
			if(isset($_POST["postBody"]))
				$post = $_POST["postBody"];
			//var_dump($post);
			$post_image=NULL;$image="";
			if(isset($_FILES["image"]))
				{$post_image = $_FILES["image"];
				 $image = $post_image["name"];
				}
			$post_file=NULL;$file="";
			if(isset($_FILES["file"]))
				{$post_file = $_FILES["file"];
				 $file = $post_file["name"];
				}
			$uid = $_COOKIE["uid"];
			$username = $_COOKIE["username"];
			$course_id = $_POST["course_id"];
			$user_detail = new User();
			$user_data = $user_detail->getUserDataByUid($uid);
			$fullname = $user_data["fullname"];
			$postobj = new Post();
			$data = $postobj->InsertPost($uid,$course_id,$post,$image,$file);
			$course = new Course();
			$data_course = $course->getCourseDetails($course_id);
			
			$data_course = $data_course[0];
			$course_id = $data_course['course_id'];
			$branch = Branch::getBranchById($data_course['branch_id']);
			$branch = $branch['branch_name'];
			//var_dump($branch);
			$course_title = $data_course['course_title'];
			$latestPostId = Post::getLatestId();
			$latestPostId = $latestPostId['post_id'];
			//var_dump($latestPostId);

			$destination_image=NULL;
			if($post_image != NULL)
			{
				$ext =pathinfo($post_image['name'],PATHINFO_EXTENSION);
				$destination_image = "files/other_files/post_images/".$latestPostId."_image.".$ext;
				move_uploaded_file($post_image['tmp_name'], $destination_image);
			}
			$destination_file=NULL;
			if($post_file != NULL)
			{
				$ext =pathinfo($post_file['name'],PATHINFO_EXTENSION);
				$destination_file = "files/other_files/post_files/".$latestPostId."_file.".$ext ;
				move_uploaded_file($post_file['tmp_name'], $destination_file);
			}
			$post = urlencode($post);
			echo "{	
						\"username\":\"$fullname\",
						\"uid\":\"$uid\",
						\"post_id\": \"$latestPostId\",
						\"course_id\":\"$course_id\",
						\"course_title\":\"$course_title\",
						\"branch\":\"$branch\",
						\"post\":\"$post\",
						\"image_url\":\"$destination_image\",
						\"file_url\":\"$destination_file\"}";
		}
		public static function post_xhr()
		{
			
		}
	}
?>