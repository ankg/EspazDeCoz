<!DOCTYPE html>
<html lang="en">
	<head>
		<title>EspazDeCoz | Profile</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/default.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/headerFooter.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/profile.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/post.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/input.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/stylesheets/profileEdit.css">
	</head>
	<body class="profile">
		<?php require 'header.php';?>
		<?php require 'footer.php';?>

		<div id="container">
			<div class="profileMid">
				<div class="profile student">
					<div class="pic left">
						<div class="loading hidden"></div>
						<div class=<?php if($param==$_COOKIE["uid"]) echo "aniContainer";?>>
							
							<div class="picContainer" style=<?php echo "background-image:url('$src2');";?>>
							</div>
							<div class="picEdit">
								<label class="edit">Change Photo<input type="file" accept="image/*"></label>
							</div>
							
							
							<div class ="picContainer" onhover="none" style=<?php echo "background-image:url('$src2');";?>>
							</div>
							

						</div>
					</div>
					<div class="details right">
						<h3 class="name"><? echo $data_p["fullname"];?></h3>
						<h4 class="branch"><? echo $data_extra["branch"];?></h4>
						<h4 class="year">Year : <? echo $data_extra["year"];?></h5>
					</div>
					<div class="menu right">
						<ul>
							<li><a class="active" href="" data-menu="about">About</a></li>
							<li><a href="" data-menu="posts">Posts</a></li>
							<li><a href="" data-menu="classmate">Classmates</a></li>
							<li><a href="" data-menu="courses">Courses</a></li>
							<li><a href="" data-menu="files">Files</a></li>
						</ul>
					</div>
				</div>
			</div>

			<?php if($param==$_COOKIE['uid']){ ?>
			<div class="menuContent">
				<div class="about afterClear">
					<div class="left lane">
						<div class="quote">
							<h3 class="type" data-type="quote">Quote<span class="right edit">Edit</span></h3>
							<textarea spellcheck="false" autocorrect="off" readonly class="text"><? echo $data_extra["quote"];?></textarea>
							<!--<div class="hidden text">Make so many girlfriends knjkvs ksjdvks dvkjsndvk skjdvnks kvjns</div>-->
							<button class="hidden save">Save</button>
						</div>
						<div class="academic">
							<h3 class="type" data-type="academic">Academics<span class="right edit">Edit</span></h3>
							<input spellcheck="false" autocorrect="off" readonly class="text" value=<? echo "\"".$data_extra["branch"]."\""?> type="text" id="branchInput">
								<!--<p class="hidden text">Computer Science and Engineering</p>-->
							<input spellcheck="false" autocorrect="off" readonly class="text" value=<? echo "\"".$data_extra["year"]."\""?> type="text" id="yearInput">
								<!--<p class="text hidden">2nd Year</p>-->
							
							<button class="hidden save">Save</button>
						</div>
					</div>
					<div class="right lane">
						<div class="work">
							<h3 class="type" data-type="work">Work & Experience<span class="right edit">Edit</span></h3>
							<? foreach ($work as $val){ ?>
								<textarea spellcheck="false" autocorrect="off" readonly class="text"><? echo $val;?></textarea>
							<? } ?>
							<button class="hidden add">Add More</button>
							<button class="hidden save">Save</button>
						</div>
						<div class="skills">
							<h3 class="type" data-type="skills">Skills<span class="right edit">Edit</span></h3>
							<? foreach($skills as $val) {?>
							<textarea spellcheck="false" autocorrect="off" readonly class="text"><? echo $val; ?></textarea>
							<?
							}
							?>
							<button class="hidden add">Add More</button>
							<button class="hidden save">Save</button>
						</div>
					</div>
				</div>
				<? } 
					else{
				?>
					<div class="menuContent">
					<div class="about afterClear">
					<div class="left lane">
						<div class="quote">
							<h3 class="type" data-type="quote">Quote</h3>
							<!--<textarea spellcheck="false" autocorrect="off" readonly class="text"><?// echo $data_extra["quote"];?></textarea>-->
							<div class="text"><? echo $data_extra["quote"];?></div>
						</div>
						<div class="academic">
							<h3 class="type" data-type="academic">Academics</h3>
								<p class="text"><?php echo $data_extra["branch"];?></p>
								<p class="text"><?php echo $data_extra["year"];?></p>
						</div>
					</div>
					<div class="right lane">
						<div class="work">
							<h3 class="type" data-type="work">Work & Experience</h3>
							<? foreach ($work as $val){ ?>
								<!--<textarea spellcheck="false" autocorrect="off" readonly class="text"><? //echo $val;?></textarea>-->
								<div class="text"><? echo $val;?></div>
							<? } ?>
						</div>
						<div class="skills">
							<h3 class="type" data-type="skills">Skills</h3>
							<? foreach($skills as $val) {?>
							<!--<textarea spellcheck="false" autocorrect="off" readonly class="text"><? //echo $val; ?></textarea>-->
							<div class="text"><? echo $val;?></div>
							<?
							}
							?>
						</div>
					</div>
				</div>
				<?
				}
				?>
				<div class="classmate hidden">
					<h3 class="heading">Classmates</h3>
					<div class="list">
						<ul>
							<li><a href="/profile/42">Kapil Kumar Singh</a></li>
							<li><a href="/profile/37">Aniket Gupta</a></li>
							<li><a href="/profile/43">Saksham Arya</a></li>
							<li><a href="/profile/44">Samar Singh Holkar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="courses hidden">
					<a href="/course" style="text-decoration:underline" class="heading"><h3>All Departments</h3></a>
					<h3 class="heading">Registered Courses</h3>
					<div class="list">
						<ul>
					<? foreach ($data_courses_profile as $course) { 
						$data = $branches->getBranchByCourse($course[0]["course_id"]);
						?>

						<li><a href=<?php echo "/course/".rawurlencode($data[0]["branch_name"])."/".$course[0]["course_id"];?>><? echo $course[0]["course_title"]; ?></a></li>
					<? } ?>
					</ul>
				</div>
				<div class="files hidden"></div>
			</div>
			<!--<div class="posts hidden">
				<div class="postMid afterClear">
					<div class="left leftPosts">
						<?php //include 'postTemplate.php';?>
					</div>
					<div class="right rightPosts">
						<?php //include 'postTemplate.php';?>
						<?php //include 'postTemplate.php';?>
					</div>
				</div>
			</div>-->
			<div class="posts hidden">
				<div class="postMid afterClear">
					<?php 
					$course_posts = Post::getPostsByUid($param);
					//var_dump($course_posts);
					?>
					<div class="left leftPosts">
					<?php //include 'inputPost.php';?>
						<?
							$total = count($course_posts);
							for($i=$total-1;$i>=0;$i=$i-2) { ?>
							<?php 
							 $course_id = $course_posts[$i]["course_id"];
							 $data_course = Course::getCourseDetails($course_id);
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
						$course_id = $course_posts[$i]["course_id"];
						$data_course = Course::getCourseDetails($course_id);
						$user = new User();
						$data = $user->getUserDataByUid($course_posts[$i]["uid"]);
						include 'postTemplate.php';?>
						<? } ?>
					</div>
				
				</div>
			</div>

		</div>

		<script type="text/javascript" src="/app/assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="/app/assets/js/jquery.autosize.min.js"></script>
		<script type="text/javascript" src="/app/assets/js/postHandle.js"></script>
		<script type="text/javascript" src="/app/assets/js/profile.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('.commentArea .commentBody, .inputText').autosize();
				$('textarea.text').autosize();
			});
		</script>
	</body>
</html>