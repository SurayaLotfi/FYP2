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
	<title>KMS4MAE </title>
	
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
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/navigation.css">
	<!-- REVOLUTION SLIDER END -->	
	
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
						<ul>
							<li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							<li>
								<select class="header-lang-bx">
									<option data-icon="flag flag-uk">English UK</option>
									<option data-icon="flag flag-us">English US</option>
								</select>
							</li>
							<li><a href="login.html">Login</a></li>
							<li><a href="register.html">Register</a></li>
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
					<div class="secondary-menu">
						<div class="secondary-inner">
							<!-- <ul>
								<li class="notification-icon">
									<a href="javascript:;" class="btn-link">
										<i class="fa fa-bell"></i>
										<span class="notification-count">3</span>
									</a>
									
									<div class="notification-popup">
										
										<ul class="notification-list">
											<li><a href="inbox.php">You have a new message</a></li>
											<li>Meeting at 2 PM</li>
											<li>Task deadline approaching</li>
										</ul>
									</div>
								</li>
							</ul> -->
							<?php
							//Near Deadline
							$due_date_threshold = date('Y-m-d', strtotime('+10 days')); 

								$query_deadline = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
								WHERE class.department = '$department'
								AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
								AND username = '$username'
                                AND validity <= '$due_date_threshold'
                                AND content_record.due = 'false'
								ORDER BY class.id DESC";

								$result_deadline = mysqli_query($db, $query_deadline);
								$total_deadline = mysqli_num_rows($result_deadline);
							//exceeded knowledge
								$query_exceed = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
								WHERE class.department = '$department'
								AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
								AND username = '$username'
								AND validity <= '$due_date_threshold'
								AND content_record.due = 'true'
								ORDER BY class.id DESC";

								$result_exceed = mysqli_query($db, $query_exceed);
								$total_exceed = mysqli_num_rows($result_exceed);
							
							//knowledge that is successfully shared
								$query_ks = "SELECT * FROM knowledge_sharing WHERE status = 'Accepted' AND username = '$username' AND viewed = 0";

								$result_ks = mysqli_query($db, $query_ks);
								$total_ks = mysqli_num_rows($result_ks);

								

							//knowledge that is declined
								$query_declined = "SELECT * FROM knowledge_sharing WHERE status = 'Declined' AND username = '$username' AND viewed = 0";
								$result_declined = mysqli_query($db, $query_declined);

								$total_declined = mysqli_num_rows($result_declined);

								$total_inbox = $total_deadline + $total_exceed + $total_ks + $total_declined;
							?>

							
							
							
								<li class="notification-icon">
									<a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-bell" aria-hidden="true" id="noti_number"></i><span class="notification-count"><?php echo $total_inbox?></span></a>
									<div class="notification-popup ">
									
										<div class="ttr-notify-header" id="noti_number">
											<span class="ttr-notify-text-top"><a href="inbox.php"><?php  echo $total_inbox ?> New Notifications</a></span>
											<span class="ttr-notify-text"><a href="inbox.php"></a>View All</span>
										</div>
										<br>
										<div class="noti-box-list" >
											<ul>
												<li id="deadline">
													<span class="notification-icon dashbg-gray">
														<i class="fa fa-calendar"></i>
													</span>
													<span class="notification-text" >

														<a href="#" class="deadline">You have <?php echo $total_deadline ?></a> knowledge that is almost due
													</span>
													<span class="notification-time">
														<a href="#" class="fa fa-close"></a>
														<span> 02:14</span>
													</span>
												</li>
												<li id="exceed">
													<span class="notification-icon dashbg-gray">
													<i class="fa fa-exclamation"></i>
													</span>
													<span class="notification-text">
														<a href="#" class="exceed">You have <?php echo $total_exceed ?></a> exceeded knowledge.
													</span>
													<span class="notification-time">
														<a href="#" class="fa fa-close"></a>
														<span> 7 Min</span>
													</span>
												</li>
												<li id="accepted">
													<span class="notification-icon dashbg-gray">
														<i class="fa fa-check"></i>
													</span>
													<span class="notification-text">
														<a href="#" class="accepted">You have <?php echo $total_ks ?></a> new accepted knowledge.
													</span>
													<span class="notification-time">
														<a href="#" class="fa fa-close"></a>
														<span> 2 May</span>
													</span>
												</li>
												<li id="declined">
													<span class="notification-icon dashbg-gray">
														<i class="fa fa-times"></i>
													</span>
													<span class="notification-text">
														<a href="#" class="declined">You have <?php echo $total_declined ?></a> new declined knowledge.
													</span>
													<span class="notification-time">
														<a href="#" class="fa fa-close"></a>
														<span> 14 July</span>
													</span>
												</li>
												
									</ul>
								</div>
							</div>
						</li>
					
						</div>
					</div>
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
										<li><a href="history.php">History</a></li>
										<li><a href="inbox.php">Inbox</a></li>
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
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
		
    </header>
    <!-- Header Top END ==== -->
    <!-- Content -->
	<iframe src="http://127.0.0.1:8001/" width="2000" height="800"></iframe>
    <div class="page-content bg-white">
        <!-- Main Slider -->
        <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(assets/images/malaysia-airlines-bg.jpeg);">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center text-white">
							<h2>Welcome to Library</h2>
							<h5>Learn and Gain Knowledge About the whole organization</h5>
							<div class="cours-search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="What do you want to learn today?	">
									<div class="input-group-append">
										<button class="btn" type="submit">Search</button> 
									</div>
								</div>
							</div>
						</div>
					</div>
					
                    <div class="courses-post">
                        <div class="ttr-post-info">
                            <div class="ttr-post-title text-white">
                                <h2 class="post-title">Here's your answer</h2>
                            </div>
							
                            <div class="ttr-post-text text-white">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
							
                        </div>
                    </div>
					<!-- <div class="mw800 m-auto">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-user"></i><span class="counter">5</span>M</h3>
									</div>
									<span class="cours-search-text">Over 5 million student</span>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-book"></i><span class="counter">30</span>K</h3>
									</div>
									<span class="cours-search-text">30,000 Courses.</span>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-layout-list-post"></i><span class="counter">20</span>K</h3>
									</div>
									<span class="cours-search-text">Learn Anythink Online.</span>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
        <!-- Main Slider -->
		<div class="content-block">
            

                
            <!-- Popular Courses -->
			<div class="section-area section-sp2 popular-courses-bx">
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Contents<span> Referred</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="row">
					<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item">
							<div class="lib-cours-bx">
								<div class="lib-action-box">
									<img src="" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Why Malaysia Airlines is the right one</a></h5>
									<span>Programming</span>
								</div>
								<div class="cours-more-info">
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
									<div class="price">
										<h8>Created by</h8>
										<h5>Suraya</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="lib-cours-bx">
								<div class="lib-action-box">
									<img src="" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Why Malaysia Airlines is the right one</a></h5>
									<span>Programming</span>
								</div>
								<div class="cours-more-info">
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
									<div class="price">
										<h8>Created by</h8>
										<h5>Izzat</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="lib-cours-bx">
								<div class="lib-action-box">
									<img src="" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Why Malaysia Airlines is the right one</a></h5>
									<span>Programming</span>
								</div>
								<div class="cours-more-info">
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
									<div class="price">
										<h8>Created by</h8>
										<h5>Izzat</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="lib-cours-bx">
								<div class="lib-action-box">
									<img src="" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Why Malaysia Airlines is the right one</a></h5>
									<span>Programming</span>
								</div>
								<div class="cours-more-info">
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
									<div class="price">
										<h8>Created by</h8>
										<h5>Izzat</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<!-- Popular Courses END -->
			<hr style="border-width: 10px;">
			<!-- Recommended Courses -->
			<div class="section-area section-sp2 popular-courses-bx">
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Popular <span>Knowledge </span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="row">
					<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item">
							<div class="lib-cours-bx">
								<div class="lib-action-box">
									<img src="" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Why Malaysia Airlines is the right one</a></h5>
									<span>Programming</span>
								</div>
								<div class="cours-more-info">
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
									<div class="price">
										<h8>Created by</h8>
										<h5>Izzat</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="lib-cours-bx">
								<div class="lib-action-box">
									<img src="" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Why Malaysia Airlines is the right one</a></h5>
									<span>Programming</span>
								</div>
								<div class="cours-more-info">
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
									<div class="price">
										<h8>Created by</h8>
										<h5>Izzat</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="lib-cours-bx">
								<div class="lib-action-box">
									<img src="" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Why Malaysia Airlines is the right one</a></h5>
									<span>Programming</span>
								</div>
								<div class="cours-more-info">
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
									<div class="price">
										<h8>Created by</h8>
										<h5>Izzat</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="lib-cours-bx">
								<div class="lib-action-box">
									<img src="" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Why Malaysia Airlines is the right one</a></h5>
									<span>Programming</span>
								</div>
								<div class="cours-more-info">
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
									<div class="price">
										<h8>Created by</h8>
										<h5>Izzat</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
						<!-- Recommended Courses END -->
			<div class="section-area section-sp2 bg-fix ovbl-dark join-bx text-center" style="background-image:url(assets/images/background/bg1.jpg);">
                <!-- <div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="join-content-bx text-white">
								<h2>Learn a new skill online on <br> your time</h2>
								<h4><span class="counter">57,000</span> Online Courses</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<a href="#" class="btn button-md">Join Now</a>
							</div>
						</div>
					</div>
				</div> -->
				<div class="content-block">
					<!-- Blog Grid ==== -->
						<div class="container">
							<div class="join-content-bx text-white" style="padding-top: 0px;">
								<h2>See What Other's are saying<br> your time</h2>
								<h4><span class="counter">57,000</span> Online Courses</h4>
							</div>
							<div class="ttr-blog-grid-3 row" id="masonry">
								<div class="post action-card col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b40">
									<div class="recent-news">
										<div class="lib-action-box">
											<img src="assets/images/blog/latest-blog/pic1.jpg" alt="">
										</div>
										<div class="info-bx">
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-calendar"></i>Jan 02 2019</a></li>
												<li><a href="#"><i class="fa fa-user"></i>By William</a></li>
											</ul>
											<h5 class="post-title"><a href="blog-details.html">This Story Behind Education Will Haunt You Forever.</a></h5>
											<p>Knowing that, you’ve optimised your pages countless amount of times, written tons.</p>
											<div class="post-extra">
												<a href="#" class="btn-link">READ MORE</a>
												<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>20 Comment</a>
											</div>
										</div>
									</div>
								</div>
								<div class="post action-card col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b40">
									<div class="recent-news">
										<div class="lib-action-box">
											<img src="assets/images/blog/latest-blog/pic2.jpg" alt="">
										</div>
										<div class="info-bx">
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-calendar"></i>Feb 05 2019</a></li>
												<li><a href="#"><i class="fa fa-user"></i>By John</a></li>
											</ul>
											<h5 class="post-title"><a href="blog-details.html">What Will Education Be Like In The Next 50 Years?</a></h5>
											<p>As desperate as you are right now, you have done everything you can on your.</p>
											<div class="post-extra">
												<a href="#" class="btn-link">READ MORE</a>
												<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>14 Comment</a>
											</div>
										</div>
									</div>
								</div>
								<div class="post action-card col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b40">
									<div class="recent-news">
										<div class="lib-action-box">
											<img src="assets/images/blog/latest-blog/pic3.jpg" alt="">
										</div>
										<div class="info-bx">
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-calendar"></i>April 14 2019</a></li>
												<li><a href="#"><i class="fa fa-user"></i>By George</a></li>
											</ul>
											<h5 class="post-title"><a href="blog-details.html">Master The Skills Of Education And Be.</a></h5>
											<p>You will see in the guide all my years of valuable experience together with.</p>
											<div class="post-extra">
												<a href="#" class="btn-link">READ MORE</a>
												<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>23 Comment</a>
											</div>
										</div>
									</div>
								</div>
								<div class="post action-card col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b40">
									<div class="recent-news">
										<div class="lib-action-box">
											<img src="assets/images/blog/latest-blog/pic3.jpg" alt="">
										</div>
										<div class="info-bx">
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-calendar"></i>March 21 2019</a></li>
												<li><a href="#"><i class="fa fa-user"></i>By Thomas</a></li>
											</ul>
											<h5 class="post-title"><a href="blog-details.html">Eliminate Your Fears And Doubts About Education.</a></h5>
											<p>When I needed to start from scratch and figure out how things work. Getting people.</p>
											<div class="post-extra">
												<a href="#" class="btn-link">READ MORE</a>
												<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>28 Comment</a>
											</div>
										</div>
									</div>
								</div>
								<div class="post action-card col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b40">
									<div class="recent-news">
										<div class="lib-action-box">
											<img src="assets/images/blog/latest-blog/pic1.jpg" alt="">
										</div>
										<div class="info-bx">
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-calendar"></i>May 08 2019</a></li>
												<li><a href="#"><i class="fa fa-user"></i>By James</a></li>
											</ul>
											<h5 class="post-title"><a href="blog-details.html">Seven Reasons You Should Fall In Love With Education.</a></h5>
											<p>Honestly, I made ZERO money in the first year and I definitely do not want you to go.</p>
											<div class="post-extra">
												<a href="#" class="btn-link">READ MORE</a>
												<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>26 Comment</a>
											</div>
										</div>
									</div>
								</div>
								<div class="post action-card col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b40">
									<div class="recent-news">
										<div class="lib-action-box">
											<img src="assets/images/blog/latest-blog/pic2.jpg" alt="">
										</div>
										<div class="info-bx">
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-calendar"></i>June 19 2019</a></li>
												<li><a href="#"><i class="fa fa-user"></i>By Arthur</a></li>
											</ul>
											<h5 class="post-title"><a href="blog-details.html">The Biggest Contribution Of Education To Humanity.</a></h5>
											<p>You may have seen our tool that's been featured by many world-class SEO marketers.</p>
											<div class="post-extra">
												<a href="#" class="btn-link">READ MORE</a>
												<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>15 Comment</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Pagination ==== -->
							<div class="pagination-bx rounded-sm gray clearfix">
								<ul class="pagination">
									<li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
								</ul>
							</div>
							<!-- Pagination END ==== -->
						</div>
					
					<!-- Blog Grid END ==== -->
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
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
</body>

<!-- Live Notification -->
<script type="text/javascript">
    function loadDoc() {
        var previousTotalInbox = 0; // Variable to store the previous total inbox value

        // Fetch the initial value of total_inbox
        var initialXhttp = new XMLHttpRequest();
        initialXhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var initialResponse = JSON.parse(this.responseText);
                previousTotalInbox = initialResponse.total_inbox;
				console.log(previousTotalInbox);
            }
        };
        initialXhttp.open("GET", "phpfiles/notification.php", false);
        initialXhttp.send();

        setInterval(function () {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);

                    // Check if the total inbox value has changed
                    if (previousTotalInbox !== response.total_inbox) {
                        // Update the previous value
                        previousTotalInbox = response.total_inbox;

                        // Update the DOM elements
                        var notificationCount = document.getElementById("noti_number");
                        var deadline = document.getElementById("deadline");
                        var exceed = document.getElementById("exceed");
                        var accepted = document.getElementById("accepted");
                        var declined = document.getElementById("declined");

                        document.querySelector('.notification-count').innerHTML = response.total_inbox;
                        document.querySelector('.ttr-notify-text-top').innerHTML = response.new_noti;
                        document.querySelector('#deadline .deadline').innerHTML = response.notifications['deadline'].text;
                        document.querySelector('.exceed').innerHTML = response.notifications['exceed'].text;
                        document.querySelector('#accepted .accepted').innerHTML = response.notifications['accepted'].text;
                        document.querySelector('#declined .declined').innerHTML = response.notifications['declined'].text;

                        // Add AJAX request to send email
                        var emailRequest = new XMLHttpRequest();
                        emailRequest.open("GET", "email.php", true);
                        emailRequest.send();
                    }
                }
            };
            xhttp.open("GET", "phpfiles/notification.php", true);
            xhttp.send();
        }, 1000);
        console.log("loadDoc function called");
    }

    loadDoc();
</script>
</html>
