
<div id="header">
	<div class="mid">
		<div id="logo" class="left"></div>
		<div id="searchBox" class="left sWidth1">
			<form class="searchForm block" action="main_search.php" method="GET">
				<input class="borderBox" type="text" spellcheck="false" autocomplete="off" name="main_search" placeholder="Search friend, professor and courses">
			</form>
			<div id="suggestion"></div>
		</div>
		<?php

	if(isset($_COOKIE["uid"]))
	{ 

			$uid = $_COOKIE["uid"];
			$user = new User();
			$data = $user->getUserDataByUid($uid);
			$index = $data["profile_image"];
			$src = "/files/profile_pics/". $uid. "_".$index."." . $data["ext"];
		?>
	<div id="username" class="left"><a href="/profile"><? echo $data["username"]; ?></a></div>
	<div id="profile" class="left"><a href="/profile" style=<? echo "background-image:url('$src');";?>></a></div>
	<a href="/logout" id="logout" class="right"></a>
	<?
	}
	?>
		
	</div>
</div>