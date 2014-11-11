<div class="singlePost" data-id=<? echo $course_posts[$i]["post_id"]; ?> data-load="true">
	<div class="head afterClear">
		<div class="vote">
			<div class="up"><button>20</button></div>
			<div class="down"><button>10</button></div>
		</div>
		<div class="left profilePic">
			<? $profile_src = $user->getProfilePic($course_posts[$i]["uid"]);?>
			<img src=<? echo $profile_src; ?>>
		</div>
		<div class="left heading">
			<p><a class="ref" href=<? echo "/profile/".$data["uid"]; ?>><? echo $data["fullname"]; ?></a> posted in <a class="ref" href=<? echo "/course/".rawurlencode($param)."/".$data_course[0]["course_id"]; ?> ><? echo $data_course[0]["course_title"];?></a></p>
			<h6 class="time"><? echo Post::getTime($course_posts[$i]["timestamp"]); ?></h6>
		</div>
	</div>
	<div class="postBody afterClear">
		<div class="textContent">
			<?php
			$post_body = $course_posts[$i]["post"];
			$post_body = explode("\n", $post_body);
			foreach ($post_body as $line) 
			{
				echo "<p>$line</p>";
			}
			?>
		</div>
		<? if($course_posts[$i]["post_image"]!=NULL){ ?>
		<div class="imageContent">
			<img src=<? echo "/files/other_files/post_images/".$course_posts[$i]["post_id"]."_image.".pathinfo($course_posts[$i]["post_image"],PATHINFO_EXTENSION); ?>>
		</div>
		<? } ?>
		<? if($course_posts[$i]["post_files"]!=NULl){ ?>
			<div class="fileContent afterClear">
				<div class="left thumbnail">
					<img data-type=<? echo pathinfo($course_posts[$i]["post_files"],PATHINFO_EXTENSION); ?> src=<? echo "/app/assets/images/fileicon/". strtolower(pathinfo($course_posts[$i]["post_files"],PATHINFO_EXTENSION)).".png"; ?>>
				</div>
				<div class="downloadLink left">
					<a href=<? echo "/files/other_files/post_files/".$course_posts[$i]["post_id"]."_file.".pathinfo($course_posts[$i]["post_files"],PATHINFO_EXTENSION); ?>>Download</a>
				</div>
			</div>
		<? } ?>
	</div>

	<div class="commentContainer">
		<div class="commentLink"><a href="">Comments <span>(1)</span></a></div>
		<div class="comments hidden">
			<div class="singleComment afterClear">
				<div class="profilePic left">
					<img src="/app/assets/images/me.jpg">
				</div>
				<div class="commentText left">
					<p class="time">1 min ago</p>
					<p>Thank You for the post!</p>
				</div>
			</div>
		</div>
		<div class="commentEditor afterClear">
			<div class="left profilePic">
				<img src=
				<?php $login_src = $user->getProfilePic($_COOKIE["uid"]);
						echo $login_src;
				?>>
			</div>
			<div class="left commentArea">
				<form>
					<textarea placeholder="Post a comment..." spellcheck="false" autocorrect="off" class="commentBody"></textarea>
					<input class="postComment" type="submit" value="Comment">
				</form>
			</div>
		</div>
	</div>
</div>