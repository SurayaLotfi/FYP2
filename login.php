<?php
session_start();
require "connect.php";

if(!empty($_SESSION["id"])){ //if a user is still in a session and wants to login, we won't allow them.
    header("Location: profile.php");
}

if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username . "<br>";
	echo $password;

    $query = "SELECT * FROM users WHERE username = '$username'"; //retrieve dulu row yang ada same username
    $result = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result); //get the row
    if(mysqli_num_rows($result) > 0){ //check whether the result exists or not
        if($password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["role"] = $row["role"];
            $_SESSION["full_name"] = $row["full_name"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["department"] = $row["department"];
            $_SESSION["email"] = $row["email"];
			//send notification email
			include "email.php";
			// $_SESSION["password"] = $row["password"];
            echo "<script> alert('Success!'); </script>";
            if($_SESSION["role"] == "admin")
                header("Location: admin_profile/index.php"); //login successful, set the session id and navigate user to the homepage.
            else 
                header("Location: home.php");
        }
        else{
			header("Location: login.php?alert=wrongpassword");
			//echo mysqli_error($db);
        }
    }else{
        header("Location: login.php?alert=wrongusername");
    }
}
?>

<style>
.swal2-select {
    display: none !important;
}

</style>


<!DOCTYPE html>
<html lang="en">


<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />
	
	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">


	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>KMS4MAE</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">


	
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/background_MAS.webp);">
			<a href="index.html"><img src="assets/images/Malaysia_Airlines_Logo.svg.png" alt="" style="padding:50px"></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Login to your <span>Account</span></h2>
					<p>Welcome to  <a href="register.html">KMS4MAE</a></p> 
				</div>	
				<form class="contact-bx" action="" method="POST">
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Username</label>
									<input name="username" type="text" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Password</label>
									<input name="password" id="password" type="password" class="form-control" required="">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<!-- <div class="form-group form-forget">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
									<label class="custom-control-label" for="customControlAutosizing">Remember me</label>
								</div>
								<a href="forget-password.html" class="ml-auto">Forgot Password?</a>
							</div> -->
						</div>
						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
						</div>
						<div class="col-lg-12">
							<!-- <h6>Login with Social media</h6> -->
							<!-- <div class="d-flex">
								<a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
								<a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
							</div> -->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<script>
    var swal = Swal.noConflict();
</script>
<script src="assets/js/jquery.min.js"></script>
<!-- <script src="assets/vendors/bootstrap/js/popper.min.js"></script> -->
<!-- <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script> -->
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<!-- <script src="assets/vendors/magnific-popup/magnific-popup.js"></script> -->
<!-- <script src="assets/vendors/counter/waypoints-min.js"></script> -->
<!-- <script src="assets/vendors/counter/counterup.min.js"></script> -->
<!-- <script src="assets/vendors/imagesloaded/imagesloaded.js"></script> -->
<!-- <script src="assets/vendors/masonry/masonry.js"></script> -->
<!-- <script src="assets/vendors/masonry/filter.js"></script> -->
<!-- <script src="assets/vendors/owl-carousel/owl.carousel.js"></script> -->
<script src="assets/js/functions.js"></script>
<!-- <script src="assets/js/contact.js"></script> -->
<!-- <script src='assets/vendors/switcher/switcher.js'></script> -->

		<!--Sweet Alert-->
		<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

	

<script>
	
    document.addEventListener("DOMContentLoaded", function () {
        const alertType = "<?php echo isset($_GET['alert']) ? $_GET['alert'] : '' ?>";
		
        if (alertType === "wrongusername") {
            Swal.fire("Error", "User does not exist.", "error");
        } else if (alertType === "wrongpassword") {
            Swal.fire("Error", "Wrong password entered.", "error");
        }
    });
</script>
</body>

</html>
