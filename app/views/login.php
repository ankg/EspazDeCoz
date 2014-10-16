<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SAKS | Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" type="text/css" href="css/headerFooter.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>

	<body>
		<div id="container">
			<?php include_once 'header.php'; ?>
			<div id="loginMid" class="mid afterClear">
				<div id="logIn" class="left">
					<h3 class="heading">Log In</h3>
					<div id="loginForm">
						<form action="" method="POST">
							<div class="inputField">
								<input id="username" class="borderBox" type="text" spellcheck="false" />
								<label class="fieldLabel" for="username">Username</label>
							</div>
							<div class="inputField">
								<input id="password" class="borderBox" type="password" spellcheck="false" />
								<label class="fieldLabel" for="password">Password</label>
							</div>
							<label class="secInput"><input type="checkbox" ><span class="styleCheckbox"></span>Remember me?</label>
							<label class="secInput"><input type="checkbox" ><span class="styleCheckbox"></span>Forgot password?</label>
							<div class="registerLink"><a href="register.php">Register?</a></div>
							<input class="borderBox" type="submit" value="Log In">
						</form>
					</div>
				</div>
				<div id="randomImage" class="right"></div>
			</div>
			<?php include_once 'footer.php'; ?>
		</div>

		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	</body>
</html>
