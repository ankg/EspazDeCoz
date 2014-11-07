<?php
	$courses_me = new Course();
	$data_courses = $courses_me->getCoursesByUid($_COOKIE["uid"]);
	$branch = new Branch();
	$branch_me = $branch->getBranchByCourse($data_courses[0][0]["course_id"]);
	$branch_me = rawurlencode($branch_me[0]["branch_name"]);
	
	

?>
<div id="sidebar">
	<div class="button">
	</div>
	<div class="courseContainer">
		<h3>My Courses</h3>
		<div class="course">
			<ul>
				<? foreach($data_courses as $course){ ?>
				<li><a href=<? echo "/course/".$branch_me."/".$course[0]["course_id"] ?> ><? echo $course[0]["course_title"]; ?></a></li>
				<? } ?>
			</ul>
		</div>
	</div>
</div>