<!DOCTYPE html>
<?php
	if(isset($_SESSION["message"]))
		echo $_SESSION["message"];
?>
<html lang="en">
	<head>
		<title>SAKS | Register</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="app/assets/stylesheets/default.css">
		<link rel="stylesheet" type="text/css" href="app/assets/stylesheets/headerFooter.css">
		<link rel="stylesheet" type="text/css" href="app/assets/stylesheets/login.css">
	</head>

	<body>
		<div id="container">
			<?php require_once 'header.php'; ?>
			<div id="registerMid" class="mid afterClear">
				<div id="register" class="left">
					<h3 class="heading">Register</h3>
					<div id="registerForm">
						<form action="/register" method="POST">
							<label class="secInput"><input name="status" checked type="radio" value="0"><span class="styleCheckbox"></span>Student</label>
							<label class="secInput"><input name="status" type="radio" value="1" ><span class="styleCheckbox"></span>Professor</label>
							<div class="inputField">
								<input id="username" name="username" maxlength="15" class="borderBox" type="text" spellcheck="false" />
								<label class="fieldLabel" for="username">Username</label>
							</div>
							<div class="inputField">
								<input id="fullname" name="fullname" maxlength="30" class="borderBox" type="text" spellcheck="false" />
								<label class="fieldLabel" for="fullname">Full Name</label>
							</div>
							<div class="inputField">
								<input id="email" name="email" class="borderBox" type="text" spellcheck="false" />
								<label class="fieldLabel" for="email">IITR Mail</label>
							</div>
							<div class="inputField">
								<input id="password" name="password" class="borderBox" type="password" spellcheck="false" />
								<label class="fieldLabel" for="password">Password</label>
							</div>
							<!--<div class="inputField">
								<input id="confpassword" name="confpassword" class="borderBox" type="password" spellcheck="false" />
								<label class="fieldLabel" for="password">Confirm Password</label>
							</div>-->
							<input class="borderBox" type="submit" value="Register">
						</form>
					</div>
				</div>
				<div id="randomImage" class="right"></div>
			</div>
			<?php require_once 'footer.php'; ?>
		</div>

		<script type="text/javascript" src="app/assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="app/assets/js/validation.js"></script>
	</body>
</html>