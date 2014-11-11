<!DOCTYPE html>
<html lang="en">
	<head>
		<title>EspazDeCoz | Course</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/default.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/headerFooter.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/course.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/post.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/input.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/sidebar.css">
	</head>
	<body class="courseF">
		<?php require 'header.php';?>
		<?php require 'footer.php';?>
		<?php require 'courseSidebar.php';?>

		<div id="container">
			<div class="courseReg dialog hidden">
			</div>
			<? if($param==NULL && $id==NULL){ ?>
			<div class="catalog">
				<h3 class="headingC"><a class="refDept" href="/course">Departments</a> <!--<a class="refBranch" href="">/Computer Science and Engineering</a>--></h3>
				<div class="catalogData">
					<ol class="deptData">
					<?php foreach($data_branch as $branch){

						$val = "/course/".rawurlencode($branch["branch_name"]);
					?>
						<li><a href=<?="$val"?>><? echo $branch["branch_name"];?></a></li>
					<? } ?>
					</ol>
				</div>
			</div>
			<? } 
			 elseif($param!=NULL && $id==NULL){ ?>
			 	<div class="branchCourse">.
			 		<h3 class="headingC"><a class="refDept" href="/course">Departments</a> <a class="refBranch" href=<?php echo "/course/".rawurlencode($param);?>>/<?php echo $param;?></a></h3>
			 		<div class="catalogData">
			 			<ol class="deptData">
			 				<?php 
			 					$branch_id = Branch::getBranchIdByName($param);

			 					$branch_id = $branch_id[0]['branch_id'];
			 					//var_dump($branch_id);
			 					$all_course_of_branch = Branch::getCoursesByBranch($branch_id);
			 					//var_dump($all_course_of_branch);
			 					foreach($all_course_of_branch as $course)
			 					{
			 						

								$val = "/course/".rawurlencode($param)."/".($course["course_id"]);
							
							?>
								<li><a href=<?="$val"?>><? echo $course["course_name"]."(".$course["course_title"].")";?></a></li>
							<? } ?>
			 			</ol>

			 		</div>
			 	</div>
			<? } 
			 elseif($param!=NULL && $id!=NULL){ ?>
			<div class="singleCourse">
				<h3 class="headingC"><a class="refDept" href="/course">Departments</a> <a class="refBranch" href=<?php echo "/course/".rawurlencode($param).">/$param</a>";?></h3>
				<h4 class="courseName" data-course=<? echo $data_course[0]["course_id"]; ?>><span >Course : </span><? echo $data_course[0]["course_name"]; ?>/<? echo $data_course[0]["course_title"];?></h4>
				<div class="registerCourse">
					<?php 
						$all_course_of_user = Course::getCoursesByUid($_COOKIE["uid"]);
						$is_register = false;
						
						foreach ($all_course_of_user as $user_course) 
						{
							$user_course = $user_course[0];
						
							$current_course_id = $data_course[0]["course_id"];
							$current_course_id = (int)$current_course_id;
							$user_course_id = $user_course["course_id"];
							$user_course_id = (int)$user_course_id;

							if($current_course_id == $user_course_id)
							{
								$is_register = true;
								break;
							}
							//var_dump($user_course);
						}
						
						if($is_register)
						{
							echo "<p>You are registered for this course</p>";
						}
						else
						{
							echo "<p>You are not registered for this course <a href=\"\">Register</a></p>";
						}
					?>
				</div>
				<div class="pdfDisplay">
					<h3 class="detail"><a class="courseDetail" href="">Show Course Detail</a> <a download href=<? echo "/files/other_files/course/".$data_course[0]["course_title"].".pdf";?>>Download PDF</a></h3>
					<div class="pdfContainer">
						<object class="pdf" data=<? echo "/files/other_files/course/".$data_course[0]["course_title"].".pdf";?> type="application/pdf">	  
						</object>
					</div>
				</div>
			</div>
			</div>
			<div class="posts">
				<div class="postMid afterClear">
				
					<div class="left leftPosts">
					<?php include 'inputPost.php';?>
						<?
							$total = count($course_posts);
							for($i=$total-1;$i>=0;$i=$i-2) { ?>
							<?php 
							 $user = new User();
							 $data = $user->getUserDataByUid($course_posts[$i]["uid"]);
							 include 'postTemplate.php';?>
						<? } ?>
					</div>
					<div class="right rightPosts">
						<?
							$total = count($course_posts); 
						for($i=$total-2;$i>=0;$i=$i-2) { ?>
						<?php 
						$user = new User();
						$data = $user->getUserDataByUid($course_posts[$i]["uid"]);
						include 'postTemplate.php';?>
						<? } ?>
					</div>
				
				</div>
			</div>
			<? } ?>
		

		

		<script type="text/javascript" src="/app/assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="/app/assets/js/jquery.autosize.min.js"></script>
		<script type="text/javascript" src="/app/assets/js/postHandle.js"></script>
		<script type="text/javascript" src="/app/assets/js/sidebar.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('.commentArea .commentBody, .inputText').autosize();
				$('textarea.text').autosize();
				$('#sidebar .button').on('click',slideSidebar);

				$('.detail .courseDetail').on('click', coursePdfDisplayHandler)
				function coursePdfDisplayHandler(e)
				{
					e.preventDefault();
					console.log($('.pdfContainer').hasClass('shown'));
					if($('.pdfContainer').hasClass('shown'))
					{
						$('.pdfContainer').removeClass('shown');
						$(this).text('Show Course Detail');
						$('.pdfContainer').slideUp(300);
					}
					else
					{	
						$('.pdfContainer').addClass('shown');
						$(this).text('Hide Course Detail');
						$('.pdfContainer').slideDown(300);	
					}	
				}

				$('.registerCourse a').on('click',registerCourse);
				function registerCourse(e)
				{
					e.preventDefault();
					var course = $('.courseName').attr('data-course');

					$.ajax('/course',
					{
						type : 'POST',
						data : { 'course_id' : course },
						dataType : 'json',
						success : courseRegisterSuccess,
						error : courseRegisterError
					});

					function showSuccess(msg)
					{
						var dialog = $('.courseReg'); 
						$(dialog).text(msg);
						$(dialog).addClass('success');
						$(dialog).fadeIn(600);
						setInterval(function()
						{
							$(dialog).fadeOut(3000);
						},2000);
					}

					function showError(msg)
					{
						var dialog = $('.courseReg'); 
						$(dialog).text(msg);
						$(dialog).addClass('err');
						$(dialog).fadeIn(600);
						setInterval(function()
						{
							$(dialog).fadeOut(3000);
						},2000);
					}

					function courseRegisterSuccess(data)
					{
						if(data.success)
						{
							//registered succesfully
							showSuccess('Registered succesfully');
							var absUrl = document.location.href;
							var courseTitle = $('.singleCourse .courseName').text();
							courseTitle = courseTitle.split('/')[1];
							var url = "/course/" + absUrl.split('course/')[1];

							$('#sidebar .course ul').append('<li><a href="'+url+'">'+courseTitle+'</li>');
							$('.registerCourse p').text('You are registered for this course');
							$('.registerCourse p a').remove();
						}
						else
						{
							// could not registered
							showError('Could not register');
						}
					}

					function courseRegisterError(e)
					{
						showError('Could not register');
						console.log('Something went wrong');
					}

				}

				if($('body').height() < $(window).height())
				{
					$('body').addClass('footBot');
				}
			});
		</script>

	</body>
</html>