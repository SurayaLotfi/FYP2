<?php
	session_start();
	if($_SESSION['role'] == 'admin'){
        $username = $_SESSION['username'];
    }else{
        header("Location: ../logout.php");
	}

include "phpfiles/connect.php";
if(isset($_GET['knowledge_id'])){
    $knowledge_id = $_GET['knowledge_id'];

    $sql = "SELECT * FROM knowledge_sharing WHERE knowledge_id=$knowledge_id";
    $result=mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $content = $row["content"];
    $format = $row['format'];
    $title = $row['title'];
    $validity = $row['validity'];
    $post_to = $row['post_to'];
    $minimum_time = $row['minimum_time'];
    $message = $row['message'];
	$creator = $row['username'];
   
}

?>
<style>
    .message-box {
        border: 1px solid #ddd; /* You can adjust the border color and thickness */
        padding: 10px; /* You can adjust the padding inside the box */
        border-radius: 1px; /* You can adjust the border radius to round the corners */
        margin-top: 5px; /* You can adjust the margin if needed */
		font-size: 14px;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
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
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="assets/images/testimonials/pic3.jpg" width="32" height="32"></span></a>
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
						<a href="courses.html" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-book"></i></span>
		                	<span class="ttr-label">Knowledge Base</span>
		                </a>
		            </li>
					<!-- <li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-email"></i></span>
		                	<span class="ttr-label">Mailbox</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="mailbox.html" class="ttr-material-button"><span class="ttr-label">Mail Box</span></a>
		                	</li>
		                	<li>
		                		<a href="mailbox-compose.html" class="ttr-material-button"><span class="ttr-label">Compose</span></a>
		                	</li>
							<li>
		                		<a href="mailbox-read.html" class="ttr-material-button"><span class="ttr-label">Mail Read</span></a>
		                	</li>
		                </ul>
		            </li> -->
					<!-- <li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-calendar"></i></span>
		                	<span class="ttr-label">Calendar</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="basic-calendar.html" class="ttr-material-button"><span class="ttr-label">Basic Calendar</span></a>
		                	</li>
		                	<li>
		                		<a href="list-view-calendar.html" class="ttr-material-button"><span class="ttr-label">List View</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="bookmark.html" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
		                	<span class="ttr-label">Bookmarks</span>
		                </a>
		            </li>-->
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
		                		<a href="user-profile.php" class="ttr-material-button"><span class="ttr-label">User Profile</span></a>
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
				<h4 class="breadcrumb-title">Knowledge Sharing</h4>
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
							<h4>Add listing</h4>
						</div>
						<?php
							//$query = "SELECT * knowledge sharing WHERE "
						?>
						<div class="widget-inner">
							<form class="edit-profile m-b30" action="./phpfiles/k-upload.php" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Basic info</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Knowledge title</label>
										<div>
										<input class="form-control" type="text" id="title" name="title" value="<?php echo $title?>">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Creator</label>
										<div>
											<input type="hidden" name="creator" value="<?php echo $creator?>">
										<input class="form-control" type="text" id="creator" name="creator" value="<?php echo $creator?>" disabled>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Validity</label>
										<div>
										<input class="form-control" type="date" id="validity" name="dateValid" value="<?php echo $validity?>">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Knowledge ID</label>
										<div>
										<input class="form-control" type="text" id="knowledge_id" name="knowledge_id" value="<?php echo $knowledge_id?>">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Estimated time completion (Eg: 6 hours 30 minutes)</label>
										<div>
										<input class="form-control" type="text" id="minimum_time" name="minimum_time" value="<?php echo $minimum_time?>">
										</div>
									</div>
									<!--Commenting in case dr suruh allow other than PDF to show-->
									<!-- <div class="form-group col-6">
										<label class="col-form-label">Format</label>
										<div>
										<input class="form-control" type="text" id="minimum_time" name="minimum_time" value="<?php echo $format?>">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label" for="content-type-select">Content Format</label>
										<select class="form-control" id="format" name="format" >
											<option value="Video" <?php if ($format == 'Video') echo 'selected'?>>Video</option>
											<option value="PDF" <?php if ($format == 'PDF') echo 'selected'?>>PDF</option>
											<option value="Image" <?php if ($format == 'Image') echo 'selected'?>>Image</option>
											<option value="Others" <?php if ($format == 'Others') echo 'selected'?>>Others</option>
						
										</select>
									</div> -->

									<div class="form-group col-6">
										<label class="col-form-label" for="content-type-select">For which Department</label>
										<select class="form-control" id="department" name="department">
											<option value="Training" <?php if ($post_to == 'Training') echo 'selected'?>>Training</option>
											<option value="Engineering" <?php if ($post_to == 'Engineering') echo 'selected'?>>Engineering</option>
											<option value="IT" <?php if ($post_to == 'IT') echo 'selected'?>>IT</option>
											<option value="Business" <?php if ($post_to == 'Business') echo 'selected'?>>Business</option>
											<option value="All" <?php if ($post_to == 'All') echo 'selected'?>>All</option>
										</select>
									</div>

									<div class="seperator"></div>
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Message From Employee</h3>
										</div>
									</div>
									<div class="form-group col-12">
										<label class="col-form-label" for="message">Message</label>
										<div class="message-box">
											<?php echo $message ?>
										</div>
									</div>

									<div class="seperator"></div>
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>3. Knowledge Upload</h3>
										</div>
									</div>
											<?php 
												$query_decline = "SELECT * FROM ks_declined WHERE ks_id = $knowledge_id";
												$result_decline = mysqli_query($db, $query_decline);
												$row_decline = mysqli_fetch_assoc($result_decline);
												
												// if knowledge was once in ks_declined, display the previous declined knowledge

												if(mysqli_num_rows($result_decline) > 0){ 
													$declined_content = $row_decline['content_declined'];
													?>
												<div class="form-group col-6">
												<label class="col-form-label" for="folder-select">Previously declined knowledge</label>
												<div class="d-flex">
													<input class="form-control" type="text" id="content" name="content" value="<?php echo $declined_content?>">
												<?php
													
													//include "../pdf";
													$folderPath = '../pdf/'. $declined_content; // Replace with the actual folder path
													
													// Use glob to get a list of files with the .html extension in the folder
													$folder = $folderPath . '/' . $declined_content;
													//echo $folder;
													// $files = glob($folder . '/*.html');
													// $pdf = glob($folder . '/*.pdf');
													
													
													if (empty($folderPath)) {
														// $htmlFile = reset($files); // Get the first element of the array
											
														//echo '<a href="' . $htmlFile . '" target="_blank" class="btn radius-xl text-uppercase" id="startLink">Go To Content</a>';
														echo 'Not Found';
														
													} else {
														//$pdfFile = reset($pdf);
														echo '<a href="' . $folder . '" target="_blank" class="btn ml-2">View</a>';
													}


													?>
													</div>
												</div>
												<div class="form-group col-6">
															<label class="col-form-label" for="folder-select">Resubmitted Knowledge</label>
															<div class="d-flex">
																<input class="form-control" type="text" id="content" name="content" value="<?php echo $content?>">
														<?php
														
														//include "../pdf";
														$folderPath = '../pdf/'. $content; // Replace with the actual folder path
														
														// Use glob to get a list of files with the .html extension in the folder
														$folder = $folderPath . '/' . $content;
														//echo $folder;
														// $files = glob($folder . '/*.html');
														// $pdf = glob($folder . '/*.pdf');
														
														
														if (empty($folderPath)) {
															// $htmlFile = reset($files); // Get the first element of the array
												
															//echo '<a href="' . $htmlFile . '" target="_blank" class="btn radius-xl text-uppercase" id="startLink">Go To Content</a>';
															echo 'Not Found';
															
														} else {
															//$pdfFile = reset($pdf);
															echo '<a href="' . $folder . '" target="_blank" class="btn ml-2">View</a>';
														}
														
														
													?>
															<!-- <a href="knowledge_details.php?knowledge_id=<?php echo $id?>" class="btn ml-2">View</a> -->
														</div>
													</div>
												<?php
														
													}else{

														?> 
														<div class="form-group col-6">
															<label class="col-form-label" for="folder-select">Content</label>
															<div class="d-flex">
																<input class="form-control" type="text" id="content" name="content" value="<?php echo $content?>">
														<?php
														
														//include "../pdf";
														$folderPath = '../pdf/'. $content; // Replace with the actual folder path
														
														// Use glob to get a list of files with the .html extension in the folder
														$folder = $folderPath . '/' . $content;
														//echo $folder;
														// $files = glob($folder . '/*.html');
														// $pdf = glob($folder . '/*.pdf');
														
														
														if (empty($folderPath)) {
															// $htmlFile = reset($files); // Get the first element of the array
												
															//echo '<a href="' . $htmlFile . '" target="_blank" class="btn radius-xl text-uppercase" id="startLink">Go To Content</a>';
															echo 'Not Found';
															
														} else {
															//$pdfFile = reset($pdf);
															echo '<a href="' . $folder . '" target="_blank" class="btn ml-2">View</a>';
														}
														
														
													?>
															<!-- <a href="knowledge_details.php?knowledge_id=<?php echo $id?>" class="btn ml-2">View</a> -->
														</div>
													</div>
															
														<?php														
													}
												?>
												
										
										

									</div>
									<div class="col-12">
									
									<input type="hidden" name="shareid" value="<?php echo $knowledge_id ?>">
									<input type="hidden" name="admin_approved" value="<?php echo $username ?>">
    								<button type="submit" class="btn btn-info btn-rounded my-4" name="share">Approve</button>
									<a href = 'decline.php?knowledge_id=<?php echo $knowledge_id ?>' class ="btn btn-info btn-rounded my-4">Decline</a> <!--Just tukar status, not delete-->
									<!--<a href='submit.php?deleteid=<?php echo $id; ?>' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal'>Delete</a>-->
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
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
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
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>