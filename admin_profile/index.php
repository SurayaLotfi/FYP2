<?php
	session_start();
	include "phpfiles/connect.php";
	if($_SESSION['role'] == 'admin'){
        $username = $_SESSION['username'];
    }else{
        header("Location: ../logout.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->
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
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="assets/images/pp.png" width="32" height="32"></span></a>
						<div class="ttr-header-submenu">
							<ul>
								<li><a href="user-profile.php">My profile</a></li>
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
		            </li> -->
					<!-- <li>
						<a href="bookmark.html" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
		                	<span class="ttr-label">Bookmarks</span>
		                </a>
		            </li> -->



					
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
				<h4 class="breadcrumb-title">Dashboard</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Dashboard</li>
				</ul>
			</div>	
			<?php 
				$query = "SELECT * FROM class";
				$result = mysqli_query($db, $query);

				$total_knowledge = mysqli_num_rows($result);

				$query_users = "SELECT * FROM users";
				$result_users = mysqli_query($db, $query_users);

				$total_users = mysqli_num_rows($result_users);

				$query_posted = "SELECT * FROM class WHERE admin = '$username'";
				$result_posted = mysqli_query($db, $query_posted);

				$total_posted = mysqli_num_rows($result_posted);

				$query_shared = "SELECT * FROM class WHERE source != 'Admin'";
				$result_shared = mysqli_query($db, $query_shared);

				$total_shared = mysqli_num_rows($result_shared);
			?>
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Knowledge
							</h4>
							<span class="wc-des">
								Inside KMS4MAE
							</span>
							<span class="wc-stats">
								<span class="counter"><?php echo $total_knowledge?></span>
							</span>		
							<div class="">
								<!-- <div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div> -->
							</div>
							<span class="wc-progress-bx">
								
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Employees
							</h4>
							<span class="wc-des">
								of MABES
							</span>
							<span class="wc-stats counter">
								<?php echo $total_users ?>
							</span>		
							<!-- <div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									88%
								</span>
							</span> -->
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
							Knowledge Shared  
							</h4>
							<span class="wc-des">
								by Employees
							</span>
							<span class="wc-stats counter">
							<?php echo $total_shared ?> 
							</span>		
							<!--<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									65%
								</span>
							</span> -->
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Knowledge Posted
							</h4>
							<span class="wc-des">
							by Admin: <?php echo $username?>
							</span>
							<span class="wc-stats counter">
							<?php echo $total_posted ?>
							
							</span>		
							<!-- <div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									90%
								</span>
							</span> -->
						</div>				      
					</div>
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<!-- <div class="col-lg-8 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Knowledge per Departm</h4>
						</div>
						<div class="widget-inner">
							<canvas id="chart" width="100" height="45"></canvas>
						</div>
					</div>
				</div> -->
				<!-- Your Profile Views Chart END-->
				
				<div class="col-lg-8 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Employees</h4>
						</div>
						<div class="widget-inner">
						<table border="1" id="dataTableid" class="display">
							<thead>
								<tr>
									<th>No</th>
									<th>Full Name</th>
									<th>Username</th>
									<th>Department</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php 
							$i = 1;
							
							$query = "SELECT * FROM users WHERE role='user'";
							$result = mysqli_query($db,$query);

							if($result){
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];		
																			
						   ?>

							
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row['full_name'] ?></td>
									<td><?php echo $row['username'] ?></td>
									<td><?php echo $row['department'] ?></td>
									<td style="display: flex; justify-content: center;"><a href="../admin_view_profile.php?user_id=<?php echo $id?>" class='btn-secondry'>View Dashboard</a></td>
								</tr>
							<?php
							$i++;
								}
							}
							?>
							</tbody>
						</table>
						</div>
					</div>
				</div>

				<div class="col-lg-4 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Knowledge per Department</h4>
						</div>
						<div class="widget-inner">
							<!-- Chart -->
							<div style="width: 300px; height: 400px;">
								<canvas id="barChart"></canvas>
							</div>
				<?php
					$query = "SELECT * FROM class";
					$result = mysqli_query($db, $query);
					$departmentCounts = array(
						'Training' => 0,
						'Engineering' => 0,
						'IT' => 0
						
					);
					
					if ($result) {

						while ($row = mysqli_fetch_array($result)) {
							$department = $row["department"];
					
							// Increment the corresponding count based on the status
							if ($department === 'Training') {
								$departmentCounts['Training']++;
							} elseif ($department === 'Engineering') {
								$departmentCounts['Engineering']++;
							} elseif ($department === 'IT') {
								$departmentCounts['IT']++;
							}
						}
					
						
					} else {
						echo "Error in the query: " . mysqli_error($db);
					}
				?>
				<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
				<script>
					//setup block
					console.log("Hi!")
					const departmentCounts = <?php echo json_encode($departmentCounts); ?>;
					console.log(departmentCounts);

					
					const data = {
						labels: ['Training', 'Engineering', 'IT'],
						datasets: [{
							label: 'Total Knowledge Posted per Dept',
							data: [departmentCounts['Training'], departmentCounts['Engineering'], departmentCounts['IT']],
							backgroundColor: ['rgba(100, 200, 100, 0.8)', 'rgba(135, 183, 200, 0.5)', 'rgba(220, 100, 80, 0.8)'], // Set colors for each segment
							borderWidth: 1
							
								}]
						};
					//config block
					const config = {
							type: 'bar',
							data, // data from setup block
							options: {
								scales: {
									y: {
										beginAtZero: true
									}
								},
								responsive: true, // Enable responsiveness
								maintainAspectRatio: false, // Allow chart to ignore aspect ratio
								width: 100, // Set the width in pixels
							}
						};

						//render block
						const myChart = new Chart(
							document.getElementById('barChart'),
							config
						);	
					</script>
						</div>
					</div>
				</div>
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Knowledge Posted by <?php echo $username?></h4>
						</div>
						<div class="widget-inner">
						<table border="1" id="dataTableid2" class="display">
							<thead>
								<tr>
									<th>No</th>
									<th>Title</th>
									<th>Format</th>
									<th>Class ID</th>
									<th>Department</th>
									<th>Validity</th>
									<th>Time added</th>
									<th>Time to complete</th>
									
								</tr>
							</thead>
							<tbody>
							
							<?php 
							$i = 1;
							
							$query = "SELECT * FROM class WHERE admin = '$username'";
							$result = mysqli_query($db,$query);

							if($result){
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];		
																			
						   ?>

							
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row['title'] ?></td>
									<td><?php echo $row['format'] ?></td>
									<td><?php echo $row['class_id'] ?></td>
									<td><?php echo $row['department'] ?></td>
									<td><?php echo $row['validity'] ?></td>
									<td><?php echo $row['time_added'] ?></td>
									<td><?php echo $row['minimum_time'] ?></td>
									<!-- <td style="display: flex; justify-content: center;"><a href="../admin_view_profile.php?user_id=<?php echo $id?>" class='btn-secondry'>View Dashboard</a></td> -->
								</tr>
							<?php
							$i++;
								}
							}
							?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Knowledge Shared by Employees</h4>
						</div>
						<div class="widget-inner">
						<table border="1" id="dataTableid3" class="display">
							<thead>
								<tr>
									<th>No</th>
									<th>Title</th>
									<th>Format</th>
									<th>Class ID</th>
									<th>Department</th>
									<th>Validity</th>
									<th>Time added</th>
									<th>Posted By</th>
									<th>Approved By</th>
									
								</tr>
							</thead>
							<tbody>
							
							<?php 
							$i = 1;
							
							$query = "SELECT * FROM class WHERE source != 'Admin'";
							$result = mysqli_query($db,$query);

							if($result){
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];		
																			
						   ?>

							
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row['title'] ?></td>
									<td><?php echo $row['format'] ?></td>
									<td><?php echo $row['class_id'] ?></td>
									<td><?php echo $row['department'] ?></td>
									<td><?php echo $row['validity'] ?></td>
									<td>Date: <?php echo date("d/m/Y", strtotime($row['time_added'])); ?><br>
										Time: <?php echo date("H:i:s", strtotime($row['time_added'])); ?></td>
									<td><?php echo $row['source'] ?></td>
									<td><?php echo $row['admin'] ?></td>
									<!-- <td style="display: flex; justify-content: center;"><a href="../admin_view_profile.php?user_id=<?php echo $id?>" class='btn-secondry'>View Dashboard</a></td> -->
								</tr>
							<?php
							$i++;
								}
							}
							?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
				<!-- <div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Basic Calendar</h4>
						</div>
						<div class="widget-inner">
							<div id="calendar"></div>
						</div>
					</div>
				</div> -->
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
<script src='assets/vendors/calendar/moment.min.js'></script>
<script src='assets/vendors/calendar/fullcalendar.js'></script>
<script src='assets/vendors/switcher/switcher.js'></script>
						
						<!-- jQuery -->
						<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
						<!-- DataTables CSS and JS -->
						<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
						<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

						

				<script>
							
							var $j = jQuery.noConflict();
							$j(document).ready(function() {
								console.log("Document ready");
							
								var table = $j('#dataTableid').DataTable({
									// DataTables options
									"pagingType": "full_numbers",
									"lengthMenu": [
										[5, 10, 15, 50, -1],
										[5, 10, 15, 50, "All"]
									],
								});
							
							});

							var $j = jQuery.noConflict();
							$j(document).ready(function() {
								console.log("Document ready");
							
								var table = $j('#dataTableid2').DataTable({
									// DataTables options
									"pagingType": "full_numbers",
									"lengthMenu": [
										[5, 10, 15, 50, -1],
										[5, 10, 15, 50, "All"]
									],
								});
							
							});

							var $j = jQuery.noConflict();
							$j(document).ready(function() {
								console.log("Document ready");
							
								var table = $j('#dataTableid3').DataTable({
									// DataTables options
									"pagingType": "full_numbers",
									"lengthMenu": [
										[5, 10, 15, 50, -1],
										[5, 10, 15, 50, "All"]
									],
								});
							
							});
							
								</script>
<script>
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2019-03-12',
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2019-03-01'
        },
        {
          title: 'Long Event',
          start: '2019-03-07',
          end: '2019-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-03-11',
          end: '2019-03-13'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T10:30:00',
          end: '2019-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-03-28'
        }
      ]
    });

  });

</script>



</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>