<?php
	session_start();
	if($_SESSION['role'] == 'admin'){
        $username = $_SESSION['username'];
    }else{
        header("Location: ../logout.php");
    }

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
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
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">


	<!--Sweet Alert-->
	<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

	
</head>



<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			<!--logo start -->
			<div class="ttr-logo-box">
				<div>
					<a href="index.php" class="ttr-logo">
						<h3 style="color: white; margin: auto;">KMS4MAE</h3>
					</a>
				</div>
			</div>
			<!--logo end -->
			<div class="ttr-header-menu">
				<!-- header left menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle">ADMIN PAGE</a>
					</li>
					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle">Welcome, <?php echo $username?></a>
						<!-- <a href="#" class="ttr-material-button ttr-submenu-toggle">QUICK MENU <i class="fa fa-angle-down"></i></a>
						<div class="ttr-header-submenu">
							<ul>
								<li><a href="../courses.html">Our Courses</a></li>
								<li><a href="../event.html">New Event</a></li>
								<li><a href="../membership.html">Membership</a></li>
							</ul>
						</div> -->
					</li>
				</ul>
				<!-- header left menu end -->
			</div>
			<div class="ttr-header-right ttr-with-seperator">
				<!-- header right menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
					</li>
					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-bell"></i></a>
						<div class="ttr-header-submenu noti-menu">
							<div class="ttr-notify-header">
								<span class="ttr-notify-text-top">9 New</span>
								<span class="ttr-notify-text">User Notifications</span>
							</div>
							<div class="noti-box-list">
								<ul>
									<li>
										<span class="notification-icon dashbg-gray">
											<i class="fa fa-check"></i>
										</span>
										<span class="notification-text">
											<span>Sneha Jogi</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 02:14</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-yellow">
											<i class="fa fa-shopping-cart"></i>
										</span>
										<span class="notification-text">
											<a href="#">Your order is placed</a> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 7 Min</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-red">
											<i class="fa fa-bullhorn"></i>
										</span>
										<span class="notification-text">
											<span>Your item is shipped</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 2 May</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-green">
											<i class="fa fa-comments-o"></i>
										</span>
										<span class="notification-text">
											<a href="#">Sneha Jogi</a> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 14 July</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-primary">
											<i class="fa fa-file-word-o"></i>
										</span>
										<span class="notification-text">
											<span>Sneha Jogi</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 15 Min</span>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li>
					<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="assets/images/pp.png" width="32" height="32"></span></a>
						<div class="ttr-header-submenu">
							<ul>
								<li><a href="user-profile.php">My profile</a></li>
								<li><a href="list-view-calendar.html">Activity</a></li>
								<li><a href="mailbox.html">Messages</a></li>
								<li><a href="../login.html">Logout</a></li>
							</ul>
						</div>
					</li>
					<li class="ttr-hide-on-mobile">
						<a href="#" class="ttr-material-button"><i class="ti-layout-grid3-alt"></i></a>
						<div class="ttr-header-submenu ttr-extra-menu">
							<a href="#">
								<i class="fa fa-music"></i>
								<span>Musics</span>
							</a>
							<a href="#">
								<i class="fa fa-youtube-play"></i>
								<span>Videos</span>
							</a>
							<a href="#">
								<i class="fa fa-envelope"></i>
								<span>Emails</span>
							</a>
							<a href="#">
								<i class="fa fa-book"></i>
								<span>Reports</span>
							</a>
							<a href="#">
								<i class="fa fa-smile-o"></i>
								<span>Persons</span>
							</a>
							<a href="#">
								<i class="fa fa-picture-o"></i>
								<span>Pictures</span>
							</a>
						</div>
					</li>
				</ul>
				<!-- header right menu end -->
			</div>
			<!--header search panel start -->
			<div class="ttr-search-bar">
				<form class="ttr-search-form">
					<div class="ttr-search-input-wrapper">
						<input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
						<button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
					</div>
					<span class="ttr-search-close ttr-search-toggle">
						<i class="ti-close"></i>
					</span>
				</form>
			</div>
			<!--header search panel end -->
		</div>
	</header>
	<!-- header end -->
	<!-- Left sidebar menu start -->
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">
			<!-- side menu logo start -->
			<div class="ttr-sidebar-logo">
				<a href="#"><img alt="" src="assets/images/Malaysia_Airlines_Logo.svg.png" width="122" height="27"></a>
				<!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
					<i class="material-icons ttr-fixed-icon">gps_fixed</i>
					<i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
				</div> -->
				<div class="ttr-sidebar-toggle-button">
					<i class="ti-arrow-left"></i>
				</div>
			</div>
			<!-- side menu logo end -->
			<!-- sidebar menu start -->
			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="index.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashboard</span>
		                </a>
		            </li>
					<li>
						<a href="courses.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-book"></i></span>
		                	<span class="ttr-label">Knowledge Base</span>
		                </a>
		            </li>
					
					<?php
						include "./phpfiles/connect.php";
						$query = "SELECT * FROM knowledge_sharing WHERE status = 'Pending' ORDER BY knowledge_id";
						$result = mysqli_query($db,$query);
					?>
					<li>
						<a href="k-request.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-comments"></i></span>
		                	<span class="ttr-label">Knowledge Shared ( <?php echo mysqli_num_rows($result)?> )</span>
		                </a>
		            </li> 
					<li>
						<a href="add-listing.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-layout-accordion-list"></i></span>
		                	<span class="ttr-label">Add Knowledge</span>
		                </a>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-user"></i></span>
		                	<span class="ttr-label">Add User</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="user-profile.php" class="ttr-material-button"><span class="ttr-label">Add User</span></a>
		                	</li>
		                	<li>
		                		<a href="manage-user.php" class="ttr-material-button"><span class="ttr-label">Manage User</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="../logout.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="fa fa-sign-out"></i></span>
		                	<span class="ttr-label">Logout</span>
		                </a>
		            </li>
		            <li class="ttr-seperate"></li>
				</ul>
				<!-- sidebar menu end -->
			</nav>
			<!-- sidebar menu end -->
		</div>
	</div>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Add Knowledge</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Add Knowledge</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Add Knowledge</h4>
						</div>
						<?php
							
						?>
						<div class="widget-inner">
							<form id="uploadForm" class="edit-profile m-b30" action="./phpfiles/upload.php" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Basic info</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Knowledge title</label>
										<div>
										<input class="form-control" type="text" id="title" name="title" required>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Validity</label>
										<div>
										<input class="form-control" type="date" id="validity" name="dateValid" required>
										</div>
									</div>

									<div class="form-group col-6">
										<label class="col-form-label">Estimated time completion (Eg: 6 hours 30 minutes)</label>
										<div>
										<input class="form-control" type="text" id="minimum_time" name="minimum_time" required>
										</div>
									</div>
<!-- 
									<div class="form-group col-6">
										<label class="col-form-label" for="content-type-select">Estimated time completion</label>
										<select class="form-control" id="minimum_time" name="minimum_time" required>
											<option value="30 minutes">30 minutes</option>
											<option value="1 hours">1 hours</option>
											<option value="1 hours 30 minutes">1 hours 30 minutes</option>
											<option value="2 hours">2 hours</option>
											<option value="2 hours 30 minutes">2 hours 30 minutes</option>
											<option value="3 hours">3 hours</option>
											<option value="3 hours 30 minutes">3 hours 30 minutes</option>
										</select>
									</div> -->

									<div class="form-group col-6">
										<label class="col-form-label" for="content-type-select">Knowledge Format</label>
										<select class="form-control" id="format" name="format" required>
											<option value="Video">Video</option>
											<option value="PDF">PDF</option>
											<option value="Image">Image</option>
											<option value="Others">Others</option>
						
										</select>
									</div>

									<div class="form-group col-6">
										<label class="col-form-label" for="content-type-select">For which Department</label>
										<select class="form-control" id="department" name="department" required>
											<option value="Training">Training</option>
											<option value="Engineering">Engineering</option>
											<option value="IT">IT</option>
											<option value="Business">Business</option>
											<option value="Maintenance">Maintenance</option>
											<option value="Security">Security</option>
											<option value="All">All</option>
										</select>
									</div>
									
									<!-- <div class="form-group col-12">
										<label class="col-form-label">Course description</label>
										<div>
											<textarea class="form-control"> </textarea>
										</div>
									</div> -->
									<br>
									<div class="seperator"></div>
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Knowledge Upload</h3>
										</div>
									</div>
									<style>
										/* Add your CSS styles here */
										.content-select {
											padding: 10px;
											font-size: 16px;
											border: 1px solid #ccc;
											border-radius: 5px;
										}

										/* Optional: Style the options */
										.content-select option {
											background-color: #449461;
											color: #333;
										}
									</style>

									<div class="form-group col-6">
									<label class="col-form-label" for="folder-select">Choose Folder from Server</label>
										<select  name="content" class="folder-select" id="content-select" > 
										<option value="">Click Here</option>
											<?php	
											error_reporting(E_ALL);
											ini_set('display_errors', 1);

											$directory = "C:\Users\ASUS\OneDrive\Documents\GitHub\KMS4MAE\EduChamp-Education-HTML-Template-Admin-Dashboard\admin\FTP Server\Files"; // Path to your local directory where the FTP Server is located
											$files = scandir($directory);
		
											if ($files) {
												// Loop through the directory and add each folder as an option
												foreach ($files as $file) {
													if ($file != "." && $file != "..") {
														echo '<option value="'  . $file . '">' . $file . '</option>';
													}
												}
											} else {
												echo '<option value="">No folders found</option>';
											}

											
											?>
										</select>
									</div>

							
									
									<div class="col-12">
									<button type="submit" class="btn btn-info" id="uploadButton" >UPLOAD</button>
									

									
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>



<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<!-- <script src="assets/js/functions.js"></script> -->
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>

<!-- Bootstrap CSS -->
<!-- <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" /> -->
<script src="library/bootstrap-5/bootstrap.bundle.min.js"></script> 
<script src="library/dselect.js"></script>

<script>
// Pricing add
	function newMenuItem() {
		var newElem = $('tr.list-item').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#item-add');
	}
	if ($("table#item-add").is('*')) {
		$('.add-item').on('click', function (e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#item-add .delete", function (e) {
			e.preventDefault();
			$(this).parent().parent().parent().parent().remove();
		});
	}
</script>

<script>

	var select_box_element = document.querySelector('#content-select');

	dselect(select_box_element, {
		search: true
	});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const uploadButton = document.getElementById("uploadButton");
        const uploadForm = document.getElementById("uploadForm");

        uploadButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default form submission behavior

			const validationResult = validateForm();

            // Validate all fields before allowing the upload
            if (validationResult.isValid) {
                Swal.fire({
                    title: "Are you sure you want to upload this?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks "Yes, upload it!", submit the form
                        HTMLFormElement.prototype.submit.call(uploadForm);
                    }
                });
            } else {
                // Show an alert or perform any other action if validation fails
                Swal.fire({
				title: validationResult.errorMessage,
                icon: "error",
                confirmButtonText: "OK",
                });
            }
        });

		function validateForm() {
        // Add validation logic for each field
        const title = document.getElementById("title").value;
        const dateValid = document.getElementById("validity").value;
        const minimumTime = document.getElementById("minimum_time").value;
        // const message = document.getElementById("message").value;
		const file = document.getElementById("content-select").value;

        // Check for missing values in required fields
        if (title.trim() === "" || dateValid === "" ||  minimumTime.trim() === "" || file.trim() === "") {
            return {
                isValid: false,
                errorMessage: "Please fill in all required fields before uploading.",
            };
        }

        // Validate minimumTime format
        const timeRegex = /^(\d+\s*(hours?|hrs?)\s*)?(\d+\s*minutes?)?$/i;

        if (!timeRegex.test(minimumTime)) {
            return {
                isValid: false,
                errorMessage: "Invalid format for estimated time completion.",
            };
        }

        return {
            isValid: true,
        };
    }
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const alertType = "<?php echo isset($_GET['alert']) ? $_GET['alert'] : '' ?>";

        if (alertType === "knowledge_exists") {
            Swal.fire("Knowledge already exist in the system");
        } else if (alertType === "success") {
            Swal.fire("Success", "Knowledge has been successfully uploaded.", "success");
        }
    });
</script>




</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>