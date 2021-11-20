<?php 
session_start();
require "function.php";

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil usernamer berdasarkan id

   $result = mysqli_query($conn,"SELECT user FROM admin WHERE id = $id"); 

   $row = mysqli_fetch_assoc($result);

   //cek coockie dan username

   if ($key === hash('sha256', $row['user'])) {
       $_SESSION['login'] = true;
   }

}

if ( isset($_POST["login"])) {
	

	$user = $_POST["user"];
	$pass = $_POST["pass"];

	$cek = mysqli_query($conn, "SELECT * FROM admin WHERE user = '$user'");

	//kalau tidak ada nilai 0 (cek username)
	if( mysqli_num_rows($cek) === 1) {

		//cek password
		$row = mysqli_fetch_assoc($cek);
		if ($pass === $row["pass"] ) {

			$_SESSION["login"] = true;
			header("Location: index.php");
			
			if (isset($_POST['remember'])) {

				setcookie('id',$row['id'], time()+120);
				setcookie('key',hash('sha256', $row['user']),time()+120);
				
			 }

		  header("Location: index.php");
		  exit;
	  }
		}
		
	} else {

	$error = true;}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V10</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action = "" method = "post"  class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="user" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
					<button type="submit" name="login" value="submit"class="login100-form-btn" >Login</button>

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