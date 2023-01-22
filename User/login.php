<!DOCTYPE html>

<html lang="en">
<head>
	<title>Shoppy</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="util.css">
	<link rel="stylesheet" type="text/css" href="main.css">
<!--===============================================================================================-->

<style>
.fnt{
	font-family: 'Roboto Condensed';
}
</style>

</head>
<body>
	<?php include 'header.php' ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" action="log.php" method="post">
					<span class="login100-form-title p-b-53 fnt">
						Sign In
					</span>

					<div class="p-t-31 p-b-9">
						<span class="txt1 fnt">
							Email
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input  class="input100" type="email" name="username" >
						<?php
						  session_start();
							$_SESSION['email'];?>
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
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
				 	<button  class="login100-form-btn fnt">
							Sign In
						</button>
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

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
