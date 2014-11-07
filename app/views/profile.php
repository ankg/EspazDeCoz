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
	<body>
		<?php require 'header.php';?>
		<?php require 'footer.php';?>

		<div id="container">
			<div class="profileMid">
				<div class="profile student">
					<div class="pic left">
						<div class="loading hidden"></div>
						<div class="aniContainer">
							<div class="picContainer">
								<img src=<?="$src2"?>>
							</div>
							<? if($param==$_COOKIE["uid"]){ ?>
							<div class="picEdit">
								<label class="edit">Change Photo<input type="file" accept="image/*"></label>
							</div>
							<? } ?>
						</div>
					</div>
					<div class="details right">
						<h3 class="name"><? echo $data["fullname"];?></h3>
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
							<h3 class="type" data-type="academic">Academic<span class="right edit">Edit</span></h3>
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
							<textarea spellcheck="false" autocorrect="off" readonly class="text"><? echo $data_extra["quote"];?></textarea>
							<!--<div class="hidden text">Make so many girlfriends knjkvs ksjdvks dvkjsndvk skjdvnks kvjns</div>-->
						</div>
						<div class="academic">
							<h3 class="type" data-type="academic">Academic</h3>
								<p class="hidden text"><?php echo $data_extra["branch"];?></p>
								<p class="text hidden"><?php echo $data_extra["year"];?></p>
						</div>
					</div>
					<div class="right lane">
						<div class="work">
							<h3 class="type" data-type="work">Work & Experience</h3>
							<? foreach ($work as $val){ ?>
								<textarea spellcheck="false" autocorrect="off" readonly class="text"><? echo $val;?></textarea>
							<? } ?>
						</div>
						<div class="skills">
							<h3 class="type" data-type="skills">Skills</h3>
							<? foreach($skills as $val) {?>
							<textarea spellcheck="false" autocorrect="off" readonly class="text"><? echo $val; ?></textarea>
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
							<li><a href="">Kapil Kumar Singh</a></li>
							<li><a href="">Aniket Gupta</a></li>
							<li><a href="">Avinash Duddu</a></li>
						</ul>
					</div>
				</div>
				
				<div class="courses hidden"></div>
				<div class="files hidden"></div>
			</div>
			<div class="posts hidden">
				<div class="postMid afterClear">
					<div class="left leftPosts">
						<?php include 'postTemplate.php';?>
					</div>
					<div class="right rightPosts">
						<?php include 'postTemplate.php';?>
						<?php include 'postTemplate.php';?>
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