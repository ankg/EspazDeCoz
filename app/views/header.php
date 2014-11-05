
<div id="header">
	<div class="mid">
		<div id="logo" class="left"></div>
		<div id="searchBox" class="left sWidth1">
			<form class="searchForm block" action="main_search.php" method="GET">
				<input class="borderBox" type="text" spellcheck="false" autocomplete="off" name="main_search" placeholder="Search friend and professor">
			</form>
			<div id="suggestion"></div>
		</div>
		<?php
	if(isset($_COOKIE))
	{ $source = $_COOKIE["uid"];
		if(is_file($source."jpg"))
			$src = $source."jpg";
		if(is_file($source."png"))
			$src = $source."png";
		if(is_file($source."gif"))
			$src = $source."gif";
		?>
	<div id="profile" class="left"><img src="<?=$src?>"></div>
	<a href="/logout" id="logout" class="right"></a>
	<?
	}
	?>
		
	</div>
</div>