<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<style>
		.fnt{
		font-family: 'Roboto Condensed';}
	</style>
</head>
<body>
	<?php include 'navigationbar.php' ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg-01.jpg'); min-height: 100vh">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" action="log.php" method="post">
					<span class="login100-form-title p-b-53 fnt">
						Sign In
					</span>

					<div class="p-t-31 p-b-9">
						<span class="txt1 fnt">
							E-mail
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "mail is required">
						<input class="input100 fnt" type="email" name="smail" >
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1 fnt">
							Password
						</span>

						<a href="#" class="txt2 bo1 m-l-5 fnt">
							Forgot?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 fnt" type="password" name="spwd" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<input type="submit" class="login100-form-btn fnt" name="signin" value="Sign In">
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2 fnt">
							Not a member?
						</span>

						<a href="register.php" class="txt2 bo1 fnt">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	<script src="assests/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assests/vendor/animsition/js/animsition.min.js"></script>
	<script src="assests/vendor/bootstrap/js/popper.js"></script>
	<script src="assests/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assests/vendor/select2/select2.min.js"></script>
	<script src="assests/vendor/daterangepicker/moment.min.js"></script>
	<script src="assests/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assests/vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
