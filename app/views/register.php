<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SAKS | Register</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" type="text/css" href="css/headerFooter.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>

	<body>
		<div id="container">
			<?php include_once 'header.php'; ?>
			<div id="registerMid" class="mid afterClear">
				<div id="register" class="left">
					<h3 class="heading">Register</h3>
					<div id="registerForm">
						<form action="" method="POST">
							<label class="secInput"><input name="status" checked type="radio" ><span class="styleCheckbox"></span>Student</label>
							<label class="secInput"><input name="status" type="radio" ><span class="styleCheckbox"></span>Professor</label>
							<div class="inputField">
								<input id="username" maxlength="15" class="borderBox" type="text" spellcheck="false" />
								<label class="fieldLabel" for="username">Username</label>
							</div>
							<div class="inputField">
								<input id="fullname" maxlength="30" class="borderBox" type="text" spellcheck="false" />
								<label class="fieldLabel" for="fullname">Full Name</label>
							</div>
							<div class="inputField">
								<input id="email" class="borderBox" type="text" spellcheck="false" />
								<label class="fieldLabel" for="email">IITR Mail</label>
							</div>
							<div class="inputField">
								<input id="password" class="borderBox" type="password" spellcheck="false" />
								<label class="fieldLabel" for="password">Password</label>
							</div>
							<input class="borderBox" type="submit" value="Register">
						</form>
					</div>
				</div>
				<div id="randomImage" class="right"></div>
			</div>
			<?php include_once 'footer.php'; ?>
		</div>

		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/validation.js"></script>
	</body>
</html>