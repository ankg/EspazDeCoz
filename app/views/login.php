<!DOCTYPE html>
<html lang="en">
	<head>
		<title>EspazDeCoz | Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="app/assets/stylesheets/default.css">
		<link rel="stylesheet" type="text/css" href="app/assets/stylesheets/headerFooter.css">
		<link rel="stylesheet" type="text/css" href="app/assets/stylesheets/login.css">
	</head>

	<body class="footBot">
		<div id="container">
			<?php require_once 'header.php'; ?>
			<div id="loginMid" class="mid afterClear">
				<div id="logIn" class="left">
					<h3 class="heading">Log In</h3>
					<div id="loginForm">
						<form action="" method="POST">
							<div class="inputField">
								<input id="username" name="username" class="borderBox" type="text" spellcheck="false" />
								<label class="fieldLabel" for="username">Username</label>
							</div>
							<div class="inputField">
								<input id="password" name="password" class="borderBox" type="password" spellcheck="false" />
								<label class="fieldLabel" for="password">Password</label>
							</div>
							<div class="hidden error"></div>
							<label class="secInput"><input type="checkbox" id="remember" ><span class="styleCheckbox"></span>Remember me?</label>
							<label class="secInput"><a href="forgot.php">Forgot password?</a></label>
							<div class="registerLink"><a href="/register">Register?</a></div>
							<input class="borderBox" type="submit" value="Log In">
						</form>
					</div>
				</div>
				<div id="randomImage" class="right"><img src="/app/assets/images/poster.png"></div>
			</div>
			<?php require_once 'footer.php'; ?>
		</div>

		<script type="text/javascript" src="app/assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="app/assets/js/loginConfirm.js"></script>
	</body>
</html>
