<?php
session_start();
include "connect.php";


	//get all wanted data
	//getting class data
	if(isset($_GET['course_id']) && isset($_GET['department'])){
		$course_id = $_GET['course_id'];
		$department = $_GET['department'];
        
		$sql = "SELECT * FROM class WHERE class_id='$course_id' AND (department='$department' || department = 'All')";//need to include department since multiple departments can have the same knowledge id but different titles, so we need to grab the title or other details for that department
		$result=mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result);
		$content = $row["content"];
		$id = $row['id'];
		$format = $row['format'];
		$title = $row['title'];
		$class_code = $row['class_code'];
		$validity = $row['validity'];
		$due = $row['due'];
		$content_id = $row['class_id'];
		$department = $row['department'];
		$minimum_time = $row['minimum_time'];
		$source = $row['source'];
		$validity = $row['validity'];
		$due = $row['due'];
			
		$today = new DateTime();
		$validity_format = new DateTime($validity);
		$due_format = new DateTime($due);
		

		// Calculate days left
		if ($today <= $validity_format) {
			$days_left = $today->diff($validity_format);
			
		} else {
			$days_left = $validity_format->diff($today);
			
		}

		
		$remainingDays_valid = $days_left->format('%a'); // Number of days remaining										
		$remainingDays_due = $days_left->format('%a');
		$date_posted = $row['time_added'];
		$date_posted = date('d-m-Y', strtotime($date_posted));
		$val = $row['validity'];
		$deadline = date('d-m-Y', strtotime($val));

		
		// Assuming $date_posted and $deadline are in the format 'd-m-Y'
		$date_posted_obj = DateTime::createFromFormat('d-m-Y', $date_posted);
		$deadline_obj = DateTime::createFromFormat('d-m-Y', $deadline);

		// Calculate the difference
		$interval = $date_posted_obj->diff($deadline_obj);

		// Access the difference in days
		$days_difference = $interval->days;
	   
	   
	}
?>
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
	<link rel="stylesheet" type="text/css" href="assets/css/notification.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofFos+EQEL+5CI5tM1/48aih8eQZIWSJXl" crossorigin="anonymous">

	<!--JQUERY-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
	<!--Sweet Alert-->
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
<!-- Header Top ==== -->
    <header class="header rs-nav">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<!-- <ul>
							<li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
						</ul> -->
					</div>
					<div class="topbar-right">
						<ul>
							<!-- <li>
								<select class="header-lang-bx">
									<option data-icon="flag flag-uk">English UK</option>
									<option data-icon="flag flag-us">English US</option>
								</select>
							</li> -->
							
							
								<li><a href="admin_profile/courses.php">Back</a></li>
							
								
							
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo">
						<a href="index.html"><img src="assets/images/Malaysia-Airlines-Logo.png" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
					
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="index.html"><img src="assets/images/logo.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	
						<li><a href="javascript:;">Home<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									
									<li><a href="home.php">Home</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Library<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									
									<li><a href="library.php">Library</a></li>
									<li><a href="ai.php">Chatbot</a></li>
								</ul>
							</li>
							<li class="active"><a href="javascript:;">Knowledge Base<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
									<li><a href="courses.php">Knowledge Base</a></li>
									<li><a href="inbox.php">Inbox</a></li>
									<li><a href="history.php">History</a></li>
									<li><a href="knowledge_share.php">Create Knowledge</a></li>
									</ul>	
							</li>
							<li class="nav-dashboard"><a href="javascript:;">Dashboard <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="profile.php">Dashboard</a></li>
									<li><a href="knowledge_shared.php">Knowledge Shared Status</a></li>
									<li><a href="k-exceeded.php">Exceeded Knowledge</a></li>
								</ul>
							</li>
						</ul>
						<div class="nav-social-link">
							<a href="javascript:;"><i class="fa fa-facebook"></i></a>
							<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
							<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
						</div>
                    
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- header END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/malaysia-airlines-bg.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Knowledge Details</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li><a href="#">Knowledge Base</a></li>
					<li>Knowledge Details</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row d-flex flex-row-reverse">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="course-detail-bx">
								<div class="course-price">
									
									<h3><?php echo $title ?></h3>
								</div>	
								<div class="course-buy-now text-center">
									<?php
									if($source == 'Admin'){
										$folderPath = 'admin/FTP Server/Files'; // Replace with the actual folder path
										
										// Use glob to get a list of files with the .html extension in the folder
										$folder = $folderPath . '/' . $content;
										//echo $folder;
										$files = glob($folder . '/*.html');
										$pdf = glob($folder . '/*.pdf');
										
										
										
										if (!empty($files)) {
											$htmlFile = reset($files);
											echo '<a href="' . $htmlFile . '" target="_blank" class="btn radius-xl text-uppercase" onclick="openContentPage(\'' . $htmlFile . '\')">Go To Content</a>';
										} elseif (!empty($pdf)) {
											$pdfFile = reset($pdf);
											echo '<a href="' . $pdfFile . '" target="_blank" class="btn radius-xl text-uppercase"  onclick="openContentPage(\'' . $pdfFile . '\')">Go To Content</a>';
										} else {
											$pdfFile = reset($pdf);
											echo '<a href="' . $pdfFile . '" target="_blank" class="btn radius-xl text-uppercase"  onclick="openContentPage(\'' . $pdfFile . '\')">Go To Content</a>';
										}
									} else {
										$folderPath = 'pdf/' . $content;
										$folder = $folderPath . '/' . $content;
									
										if (empty($folderPath)) {
											echo 'Not Found';
										} else {
											echo '<a href="' . $folder . '" target="_blank" class="btn radius-xl text-uppercase"  onclick="openContentPage(\'' . $folder . '\')">Go To Content</a>';
										}
									}
									?>
									<br>
									<br>
								
							
                                    <button type="button" class="btn radius-xl text-uppercase">Finish</button>
									<!--the link should be filled with a variable, php will store the path-->
								</div>
								<div class="teacher-bx">
									<div class="teacher-info">
										 <div class="teacher-thumb">
											<img src="assets/images/testimonials/pic1.jp" alt=""/>
										</div>
										<div class="teacher-name" style="text-align: center;">
											<h5>Created By</h5>
											
											<?php 
											if($source == 'Admin'){
												$query_creator = "SELECT * FROM class JOIN users ON class.admin = users.username WHERE class_id = '$content_id'";
												$result_creator = mysqli_query($db, $query_creator);
												$row = mysqli_fetch_assoc($result_creator);

												?><span><?php echo $row['full_name'] ?></span> <?php
											}else{
												$query_creator = "SELECT * FROM class JOIN users ON class.source = users.username WHERE class_id = '$content_id'";
												$result_creator = mysqli_query($db, $query_creator);
												$row = mysqli_fetch_assoc($result_creator);

												?><span><?php echo $row['full_name'] ?></span> <?php

											}
											
											?>
											
										</div>
									</div>
								</div>
								<!-- <div class="cours-more-info">
									<div class="review">
										<span>3 Review</span>
										<ul class="cours-star">
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
									</div>
									<div class="price categories">
										<span>Type</span>
										<h5 class="text-primary"><? echo $format ?></h5>
									</div>
								</div>
								<div class="course-info-list scroll-page">
									<ul class="navbar">
										<li><a class="nav-link" href="#overview"><i class="ti-zip"></i>Overview</a></li>
										<li><a class="nav-link" href="#curriculum"><i class="ti-bookmark-alt"></i>Curriculum</a></li>
										<li><a class="nav-link" href="#instructor"><i class="ti-user"></i>Instructor</a></li>
										<li><a class="nav-link" href="#reviews"><i class="ti-comments"></i>Reviews</a></li>
									</ul>
								</div> -->
							</div>
						</div>
					
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="courses-post">
								<div class="ttr-post-media media-effect">
									<a href="#"><img src="assets/images/technician.jpeg" alt=""></a>
								</div>
								<div class="ttr-post-info">
									<div class="ttr-post-title ">
										<h2 class="post-title"><?php echo $title ?></h2>
									</div>
									<div class="ttr-post-text">
										<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> -->
									</div>
								</div>
							</div>
							<div class="courese-overview" id="overview">
								<br>
								
								
								<div class="row">
									<div class="col-md-12 col-lg-4">
									<h5 class="m-b5">Overview</h5>
										<ul class="course-features">
											<!-- <li><i class="ti-book"></i> <span class="label">Lectures</span> <span class="value">8</span></li> -->
											<!-- <li><i class="ti-help-alt"></i> <span class="label">Quizzes</span> <span class="value">1</span></li> -->
												<!-- <li><i class="ti-book"></i> <span class="label">Lectures</span> <span class="value">8</span></li> -->
											<!-- <li><i class="ti-help-alt"></i> <span class="label">Quizzes</span> <span class="value">1</span></li> -->
											<li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value"><?php echo $minimum_time?></span></li>
                                            <li><i class="ti-book"></i> <span class="label">Days given to complete</span> <span class="value"><?php echo $days_difference?> days</span></li>
											<!-- <li><i class="ti-stats-up"></i> <span class="label">Validity</span> <span class="value"><?php echo $remainingDays_valid?> days left</span></li> -->
											<li><i class="ti-calendar"></i> <span class="label">Date Posted</span> <span class="value"><?php echo $date_posted ?></span></li>
											<li><i class="ti-announcement"></i> <span class="label">Deadline</span> <span class="value"><?php echo $deadline?></span></li>
											
											
											
											<!-- <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span class="value">Yes</span></li> -->
										</ul>
									</div>
									<div class="col-md-12 col-lg-8">
									<h5 class="m-b5">Your Progress</h5>
									

                                        <p>Time start: Not yet started</p>
                                        <p>Time end: Not yet completed</p>
										
										
										<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> -->
										<!-- <h5 class="m-b5">Certification</h5>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
										<h5 class="m-b5">Learning Outcomes</h5>
										<ul class="list-checked primary">
											<li>Over 37 lectures and 55.5 hours of content!</li>
											<li>LIVE PROJECT End to End Software Testing Training Included.</li>
											<li>Learn Software Testing and Automation basics from a professional trainer from your own desk.</li>
											<li>Information packed practical training starting from basics to advanced testing techniques.</li>
											<li>Best suitable for beginners to advanced level users and who learn faster when demonstrated.</li>
											<li>Course content designed by considering current software testing technology and the job market.</li>
											<li>Practical assignments at the end of every session.</li>
											<li>Practical learning experience with live project work and examples.cv</li>
										</ul> -->
									</div>
								</div>
							</div>
							<!-- <div class="m-b30" id="curriculum">
								<h4>Curriculum</h4>
								<ul class="curriculum-list">
										<li>
											<h5>First Level</h5>
											<ul>
												<li>
													<div class="curriculum-list-box">
														<span>Lesson 1.</span> Introduction to UI Design
													</div>
													<span>120 minutes</span>
												</li>
												<li>
													<div class="curriculum-list-box">
														<span>Lesson 2.</span> User Research and Design
													</div>
													<span>60 minutes</span>
												</li>
												<li>
													<div class="curriculum-list-box">
														<span>Lesson 3.</span> Evaluating User Interfaces Part 1
													</div>
													<span>85 minutes</span>
												</li>
											</ul>
										</li>
										<li>
											<h5>Second Level</h5>
											<ul>
												<li>
													<div class="curriculum-list-box">
														<span>Lesson 1.</span> Prototyping and Design
													</div>
													<span>110 minutes</span>
												</li>
												<li>
													<div class="curriculum-list-box">
														<span>Lesson 2.</span> UI Design Capstone
													</div>
													<span>120 minutes</span>
												</li>
												<li>
													<div class="curriculum-list-box">
														<span>Lesson 3.</span> Evaluating User Interfaces Part 2
													</div>
													<span>120 minutes</span>
												</li>
											</ul>
										</li>
										<li>
											<h5>Final</h5>
											<ul>
												<li>
													<div class="curriculum-list-box">
														<span>Part 1.</span> Final Test
													</div>
													<span>120 minutes</span>
												</li>
												<li>
													<div class="curriculum-list-box">
														<span>Part 2.</span> Online Test
													</div>
													<span>120 minutes</span>
												</li>
											</ul>
										</li>
									</ul>
							</div> -->
							<!-- <div class="" id="instructor">
								<h4>Creator</h4>
								<div class="instructor-bx">
									<div class="instructor-author">
										<img src="assets/images/testimonials/pic1.jpg" alt="">
									</div>
									<div class="instructor-info">
										<h6>Keny White </h6>
										<span>Professor</span>
										<ul class="list-inline m-tb10">
											<li><a href="#" class="btn sharp-sm facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="btn sharp-sm twitter"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="btn sharp-sm linkedin"><i class="fa fa-linkedin"></i></a></li>
											<li><a href="#" class="btn sharp-sm google-plus"><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
									</div>
								</div>
								<div class="instructor-bx">
									<div class="instructor-author">
										<img src="assets/images/testimonials/pic2.jpg" alt="">
									</div>
									<div class="instructor-info">
										<h6>Keny White </h6>
										<span>Professor</span>
										<ul class="list-inline m-tb10">
											<li><a href="#" class="btn sharp-sm facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="btn sharp-sm twitter"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="btn sharp-sm linkedin"><i class="fa fa-linkedin"></i></a></li>
											<li><a href="#" class="btn sharp-sm google-plus"><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
									</div>
								</div>
							</div>
							<div class="" id="reviews">
								<h4>Reviews</h4>
								
								<div class="review-bx">
									<div class="all-review">
										<h2 class="rating-type">3</h2>
										<ul class="cours-star">
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
										<span>3 Rating</span>
									</div>
									<div class="review-bar">
										<div class="bar-bx">
											<div class="side">
												<div>5 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:90%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>150</div>
											</div>
										</div>
										<div class="bar-bx">
											<div class="side">
												<div>4 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:70%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>140</div>
											</div>
										</div>
										<div class="bar-bx">
											<div class="side">
												<div>3 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:50%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>120</div>
											</div>
										</div>
										<div class="bar-bx">
											<div class="side">
												<div>2 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:40%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>110</div>
											</div>
										</div>
										<div class="bar-bx">
											<div class="side">
												<div>1 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:20%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>80</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->
							
						</div>
						
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>
    <!-- Content END-->
	<!-- Footer ==== -->
    <footer>
        <div class="footer-top">
			<div class="pt-exebar">
				<div class="container">
					<div class="d-flex align-items-stretch">
						<div class="pt-logo mr-auto">
							<a href="index.html"><img src="" alt=""/></a>
						</div>
						<div class="pt-social-link">
							<ul class="list-inline m-a0">
								<li><a href="#" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<div class="pt-btn-join">
							<a href="#" class="btn ">Join Now</a>
						</div>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                            <h5 class="footer-title">Sign Up For A Newsletter</h5>
							<p class="text-capitalize m-b20">Weekly Breaking news analysis and cutting edge advices on job searching.</p>
                            <div class="subscribe-form m-b20">
								<form class="subscription-form" action="http://educhamp.themetrades.com/demo/assets/script/mailchamp.php" method="post">
									<div class="ajax-message"></div>
									<div class="input-group">
										<input name="email" required="required"  class="form-control" placeholder="Your Email Address" type="email">
										<span class="input-group-btn">
											<button name="submit" value="Submit" type="submit" class="btn"><i class="fa fa-arrow-right"></i></button>
										</span> 
									</div>
								</form>
							</div>
                        </div>
                    </div>
					<div class="col-12 col-lg-5 col-md-7 col-sm-12">
						<div class="row">
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Company</h5>
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="about-1.html">About</a></li>
										<li><a href="faq-1.html">FAQs</a></li>
										<li><a href="contact-1.html">Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Get In Touch</h5>
									<ul>
										<li><a href="http://educhamp.themetrades.com/admin/index.html">Dashboard</a></li>
										<li><a href="blog-classic-grid.html">Blog</a></li>
										<li><a href="portfolio.html">Portfolio</a></li>
										<li><a href="event.html">Event</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Courses</h5>
									<ul>
										<li><a href="courses.html">Courses</a></li>
										<li><a href="courses-details.html">Details</a></li>
										<li><a href="membership.html">Membership</a></li>
										<li><a href="profile.html">Profile</a></li>
									</ul>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                        <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="footer-title">Our Gallery</h5>
                            <ul class="magnific-image">
								<li><a href="assets/images/gallery/pic1.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic1.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic2.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic2.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic3.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic3.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic4.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic4.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic5.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic5.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic6.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic6.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic7.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic7.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic8.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic8.jpg" alt=""></a></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank" href="https://www.templateshub.net">Wan Suraya U2005345</a></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>
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
<script src="assets/js/jquery.scroller.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
<script src="assets/vendors/switcher/switcher.js"></script>

		<!--Time Tracker-->
		<script>
			// 	$(document).ready(function() {
			// 		$("#startLink").click(function(event) {
				

			// 		// Send an AJAX request to insert the start time
			// 		$.ajax({
			// 			type: "POST",
			// 			url: "phpfiles/insert_start_time.php", // Your server-side script to insert the start time
			// 			data: {
			// 			start_time: new Date().toISOString(),
			// 			content_id: '<?php echo $content_id; ?>'
						
			// 			},
			// 			success: function(response) {
			// 			// Handle the server's response, if needed
			// 			console.log(response);
			// 			}
			// 		});
			// 		});

			// 		$("#stopLink").click(function(event) {
			// 		event.preventDefault();

			// 		// Send an AJAX request to check requirements on the server
			// 		$.ajax({
			// 			type: "POST",
			// 			url: "phpfiles/check_requirements.php", // Your server-side script to check the requirements
			// 			data: {
			// 				end_time: new Date().toISOString(), //retrieving current timestamp
			// 				content_id: '<?php echo $content_id; ?>'
							
			// 			},
			// 			success: function(response) {
			// 				response = response.trim().toLowerCase();
			// 				console.log(response)
			// 				if (response === 'requirement') {
			// 					// Requirements are met, send an AJAX request to update the stop time
			// 					$.ajax({
			// 						type: "POST",
			// 						url: "phpfiles/update_stop_time.php", // Your server-side script to update the stop time
			// 						data: {
			// 							end_time: new Date().toISOString(),
			// 							content_id: '<?php echo $content_id; ?>'
			// 						},
			// 						success: function(response) {
			// 							// Handle the server's response, if needed
			// 							Swal.fire({
			// 							icon: 'success',
			// 							title: 'Success',
			// 							text: response
			// 						});
			// 						}
			// 					});
			// 				} else {
			// 					// Requirements not met, display an alert to the user
			// 					alert(response);
			// 				}
			// 			}
			// 		});
			// 	});

			// });
		</script>

		<script>
// 			$(document).ready(function() {
//     $("#startLink").click(function(event) {
//         // Send an AJAX request to insert the start time
//         $.ajax({
//             type: "POST",
//             url: "phpfiles/insert_start_time.php",
//             data: {
//                 start_time: new Date().toISOString(),
//                 content_id: '<?php echo $content_id; ?>'
//             },
//             success: function(response) {
//                 // Handle the server's response, if needed
//                 console.log(response);
//             }
//         });
//     });

//     $("#stopLink").click(function(event) {
//         event.preventDefault();

//         // Send an AJAX request to check requirements on the server
//         $.ajax({
//             type: "POST",
//             url: "phpfiles/check_requirements.php",
//             data: {
//                 end_time: new Date().toISOString(),
//                 content_id: '<?php echo $content_id; ?>'
//             },
//             success: function(response) {
//                 response = response.trim().toLowerCase();
//                 console.log(response);

//                 if (response === 'requirement') {
//                     // Requirements are met, show confirmation prompt
//                     Swal.fire({
//                         icon: 'question',
//                         title: 'Are you sure you want to finish this knowledge?',
//                         showCancelButton: true,
//                         confirmButtonText: 'Yes, finish it!',
//                         cancelButtonText: 'Cancel',
//                     }).then((result) => {
//                         if (result.isConfirmed) {
//                             // User clicked "Yes, finish it!" - send AJAX request to update stop time
//                             $.ajax({
//                                 type: "POST",
//                                 url: "phpfiles/update_stop_time.php",
//                                 data: {
//                                     end_time: new Date().toISOString(),
//                                     content_id: '<?php echo $content_id; ?>'
//                                 },
//                                 success: function(response) {
//                                     // Handle the server's response, if needed
//                                     Swal.fire({
//                                         icon: 'success',
//                                         title: 'Success',
//                                         text: response,
//                                         didClose: function() {
//                                             // Reload the page after the user clicks "OK"
//                                             location.reload();
//                                         }
//                                     });
//                                 }
//                             });
//                         } else {
//                             // User clicked "Cancel"
//                             Swal.fire({
//                                 icon: 'info',
//                                 title: 'Cancelled',
//                                 text: 'You can continue working on this knowledge.'
//                             });
//                         }
//                     });
//                 } else {
//                     // Requirements not met, display an alert to the user
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Time',
//                         text: response
//                     });
//                 }
//             }
//         });
//     });
// });

		</script>

<script>
//     function openContentPage(file) {
//         // Open the file in a new tab
//         window.open(file, '_blank');

//         // Reload the current page after a delay (adjust the delay as needed)
//         setTimeout(function () {
//             location.reload();
//         }, 1000); // Example delay: 1000 milliseconds (1 second)
//     }
// </script>

// <!-- Live Notification -->
// <script type="text/javascript">
//     function loadDoc() {
//         var previousTotalInbox = 0; // Variable to store the previous total inbox value

//         // Fetch the initial value of total_inbox
//         var initialXhttp = new XMLHttpRequest();
//         initialXhttp.onreadystatechange = function () {
//             if (this.readyState == 4 && this.status == 200) {
//                 var initialResponse = JSON.parse(this.responseText);
//                 previousTotalInbox = initialResponse.total_inbox;
// 				console.log(previousTotalInbox);
//             }
//         };
//         initialXhttp.open("GET", "phpfiles/notification.php", false);
//         initialXhttp.send();

//         setInterval(function () {
//             var xhttp = new XMLHttpRequest();
//             xhttp.onreadystatechange = function () {
//                 if (this.readyState == 4 && this.status == 200) {
//                     var response = JSON.parse(this.responseText);

//                     // Check if the total inbox value has changed
//                     if (previousTotalInbox !== response.total_inbox) {
//                         // Update the previous value
//                         previousTotalInbox = response.total_inbox;

//                         // Update the DOM elements
//                         var notificationCount = document.getElementById("noti_number");
//                         var deadline = document.getElementById("deadline");
//                         var exceed = document.getElementById("exceed");
//                         var accepted = document.getElementById("accepted");
//                         var declined = document.getElementById("declined");

//                         document.querySelector('.notification-count').innerHTML = response.total_inbox;
//                         document.querySelector('.ttr-notify-text-top').innerHTML = response.new_noti;
//                         document.querySelector('#deadline .deadline').innerHTML = response.notifications['deadline'].text;
//                         document.querySelector('.exceed').innerHTML = response.notifications['exceed'].text;
//                         document.querySelector('#accepted .accepted').innerHTML = response.notifications['accepted'].text;
//                         document.querySelector('#declined .declined').innerHTML = response.notifications['declined'].text;

//                         // Add AJAX request to send email
//                         var emailRequest = new XMLHttpRequest();
//                         emailRequest.open("GET", "email.php", true);
//                         emailRequest.send();
//                     }
//                 }
//             };
//             xhttp.open("GET", "phpfiles/notification.php", true);
//             xhttp.send();
//         }, 1000);
//         console.log("loadDoc function called");
//     }

//     loadDoc();
</script>

</body>

</html>
