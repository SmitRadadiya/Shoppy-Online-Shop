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
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">

<main>
	<?php include 'header.php';
	//include 'connection.php';
 ?>

	<br><br>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('bg-01.jpg');"><br><br><br>
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" action="reg_ins.php" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title p-b-53 fnt">
						Sign Up
					</span>

					<div class="p-t-31 p-b-9">
						<span class="txt1 fnt">
							Name
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100 fnt" type="text" name="name" required >
						<span class="focus-input100"></span>
					</div>
					<div class="p-t-13 p-b-9">
						<span class="txt1 fnt">
							Mobile No.
						</span>
                    </div>
					<div class="wrap-input100 validate-input" data-validate = "Mobile no. is required">
						<input class="input100 fnt" type="number" name="mob" maxlength="10" required >
						<span class="focus-input100"></span>
					</div>
					<div class="p-t-13 p-b-9">
						<span class="txt1 fnt">
							E-Mail
						</span>
</div>
					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100 fnt" type="email" name="email" required >
						<span class="focus-input100"></span>
					</div>
					<div class="p-t-31 p-b-9">
						<span class="txt1 fnt">
							Address
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Address is required">
						<textarea class="input100 fnt" name="add"  rows="5" cols="30" required></textarea>
						<span class="focus-input100"></span>
					</div>
					<div class="p-t-13 p-b-9">
						<span class="txt1 fnt">
							Pincode
						</span>
                    </div>
					<div class="wrap-input100 validate-input" data-validate = "Pincode is required">
						<input class="input100 fnt" type="number" name="pin" required>
						<span class="focus-input100"></span>
					</div>


					<div class="p-t-13 p-b-9">
						<span class="txt1 fnt">
							Password
						</span>
</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 fnt" type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
									 title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1 fnt">
                            Confirm Password
                        </span>
											</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 fnt" type="password" name="cnfpass" required >
						<span class="focus-input100"></span>
					</div>
					<div class="p-t-13 p-b-9">
						<span class="txt1 fnt">
                            Profile Picture
                        </span>
											</div>
					<div class="wrap-input100 validate-input">
						<input type="file" name="fileToUpload" id="fileToUpload">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<input class="login100-form-btn" type="submit" name="signup" value="Sign Up">
					</div>
					</form>

					<div class="w-full text-center p-t-55">
						<span class="txt2 fnt">
							Already Member?
						</span>

						<a href="login.php" class="txt2 bo1 fnt">
							Sign In
						</a>
					</div>

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
</main>
</body>
</html>
<?php mysqli_close($conn); ?>
