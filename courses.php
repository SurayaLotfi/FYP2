
<?php 
	session_start();
	include "connect.php";

	if($_SESSION['role'] == 'user'){
		
        $id = $_SESSION["id"];
        $full_name = $_SESSION["full_name"];
        $username = $_SESSION["username"];
        $department = $_SESSION["department"];
        $email = $_SESSION["email"];
        $query = "SELECT * from class where user_id = $id";
        $result = mysqli_query($db,$query);
	}else{
		header("Location: logout.php");
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
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">

	<!--jQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	
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
							<!-- <li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li> -->
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>KMS4MAE</a></li>
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
							<?php if(!empty($_SESSION['id'])){?>
								<li><a href="logout.php">Logout</a></li>
							<?php }else{?>
								<li><a href="login.php">Login</a></li>
							<?php } ?>
							<li><a href="#"><?php echo $username?></a></li>
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
                            <ul>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<!-- Search Button ==== -->
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <!-- <form action="#">
                            <input name="search" value="" type="text" class="form-control"  placeholder="Type to searc">
                            <span><i class="ti-search"></i></span>
                        </form> -->
						
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
									
									<li><a href="index-2.html">Library</a></li>
								</ul>
							</li>
				
							<li class="active"><a href="javascript:;">Classes<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
										<li><a href="courses.php">Classes</a></li>
										<li><a href="history.php">History</a></li>
										<li><a href="inbox.php">Inbox</a></li>
									</ul>	
							</li>

							<li class="nav-dashboard"><a href="javascript:;">Dashboard <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="profile.php">Dashboard</a></li>
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
    <!-- header END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/malaysia-airlines-bg.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Knowledge Base</h1>
					
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Knowledge Base</li>
					<li>Inbox</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="widget courses-search-bx placeani">
								<div class="form-group">
									<div class="input-group">
										<label>Search Courses</label>
										<input name="dzName" type="text" id="live-search" required class="form-control">
									</div>
								</div>
							</div>
							<div class="widget widget_archive">
                                <h5 class="widget-title style-1">Filter By</h5>
                                <ul>
                                    <li class="select_format"><a href="fetch_courses.php?contents=Validity">Validity Date</a></li>
                                    <li class="select_format"><a href="fetch_courses.php?contents=Due">Due Date</a></li>
									<li class="select_format"><a href="fetch_courses.php?contents=NYS">Not Yet Started</a></li>
									<li class="select_format"><a href="fetch_courses.php?contents=IP">In Progress</a></li>
									<li class="select_format"><a href="fetch_courses.php?contents=reset">Reset</a></li>
                                </ul>
							</div>
							<div class="widget widget_archive">
								<h5 class="widget-title style-1">Choose Format</h5>
								<ul>
									<li class="select_format"><a href="fetch_courses.php?contents=All">All</a></li>
									<li class="select_format"><a href="fetch_courses.php?contents=PDF">PDF</a></li>
                                    <li class="select_format"><a href="fetch_courses.php?contents=Video">Video</a></li>	
									<li class="select_format"><a href="fetch_courses.php?contents=Images">Images</a></li>	
									<li class="select_format"><a href="fetch_courses.php?contents=Others">Others</a></li>	
									
								</ul>
								</div>
							<div class="widget recent-posts-entry widget-courses">
                                <h5 class="widget-title style-1">Recent Courses</h5>
                                <div class="widget-post-bx">
                                    <?php
										$query = "SELECT * FROM class WHERE department = '$department' ORDER BY id DESC LIMIT 2";
										$result = mysqli_query($db, $query);
										while($row = mysqli_fetch_assoc($result)){
	
										
									?>
                                    <div class="widget-post clearfix">
                                        <!-- <div class="ttr-post-media"> <img src="assets/images/blog/recent-blog/pic3.jpg" width="200" height="160" alt=""> </div> -->
                                        <div class="ttr-post-info">
                                            <div class="ttr-post-header">
                                                <h6 class="post-title"><a href="#"><?php echo $row['title']?></a></h6>
                                            </div>
                                            <div class="ttr-post-meta">
                                                <ul>
                                                    <li class="price">
														<h5 class="free"><?php echo $row['class_id'] ?></h5>
													</li>
                                                    <li class="review"><?php echo $row['format']?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

									<?php 
										}
									?>
                                </div>
                            </div>
							

							<div class="widget widget_archive">
                                <h5 class="widget-title style-1">Create Knowledge</h5>
								<a href="knowledge_share.php" class="btn">Click Here</a>
                            </div>
							<?php
										
								$due_date_threshold = date('Y-m-d', strtotime('+10 days')); // Get the current date + 2 days in the same 'YYYY-MM-DD' format
											
								$query = "SELECT class.*, content_record.status AS content_record_status
								FROM class
								LEFT JOIN content_record ON class.id = content_record.content_id
								WHERE class.department = '$department'
								AND (content_record.status = 'In progress' OR content_record.content_id IS NULL)
								AND validity <= '$due_date_threshold'";
								
								$result = mysqli_query($db, $query);
							?>

							<!-- <div class="widget widget_archive">
                                <h5 class="widget-title style-1">INBOX (<?php echo mysqli_num_rows($result)?>)</h5>
								<a href="contact-1.html" class="btn">Click Here</a>
                            </div> -->
						</div>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
						 
						<div class="row " id="posts-container">	
							<div style="margin-left: 50px;">				
							<h4> All Contents <br></h4>
							<div class="col-lg-12 m-b20" >
									<div class="pagination-bx rounded-sm gray clearfix" id="get_pagination">
										<?php
											$due_date_threshold = date('Y-m-d');
											$limit = 3; 
											$output = '';
											$page = 1;
										
											$start_from = ($page - 1)*$limit; //getting the range
										 	//getting the total pages for pagination display
											$query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
																		WHERE class.department = '$department'
																		AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
																		AND username = '$username'";
											$result = mysqli_query($db, $query);
											$total_records = mysqli_num_rows($result);
											$total_pages = ceil($total_records/$limit);
											
											//pagination code
											//button to update the number is page-item
											
											?> <ul class = "pagination"><?php
										
											if($page > 1){ //if page is not at page 1, it was clicked
												$previous = $page - 1;
												?><li class="page-item" id="1"><span class="page-link">First Page</span></li>
												  <li class="page-item" id=<?php echo $previous ?> ><span class="page-link">Prev <i class="fa fa-arrow-left"></i></span></li>
												  
												<?php    
											}
										
											for($i=1; $i<=$total_pages; $i++){ //showing the index numbers
												$active_class = "";
												if($i == $page){
													$active_class = "active";
												}
										
												?><li class = "page-item <?php echo $active_class?>" id = <?php $i ?>><span class="page-link"><?php echo $i ?></span></li>
												<?php
											}
										
											if($page < $total_pages){ //first page
												$page++;
												?>
												
												<li class="page-item " id=<?php echo $page ?>><span class="page-link">Next <i class="fa fa-arrow-right"></i></span></li>
												<li class="page-item " id=<?php echo $total_pages ?>><span class="page-link">Last Page</span></li> <!--if the page > total_pages, we reached the last page-->
												<?php
											} 
											?>
										
											   </ul>
											
										
										<!-- <ul class="pagination">
											<li class="previous"><a href="#"><i class="ti-arrow-left"></i> Previous</a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
										</ul> -->
									</div>
								</div>
							</div>
						
                        <?php
								$due_date_threshold = date('Y-m-d');
								$limit = 3; 
   								
								//echo $due_date_threshold;
								$today = new DateTime();
								$query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
								WHERE class.department = '$department'
								AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
								AND validity >= $due_date_threshold
								AND username = '$username'
								ORDER BY class.id DESC";

								$result = mysqli_query($db, $query);
										
									while($row = mysqli_fetch_assoc($result)){
												//retrieving data that we want
											
                                            $class_id = $row['class_id'];
                                            $validity = $row['validity'];
                                            $due = $row['due'];
												
											$today = new DateTime();
											$validity = new DateTime($validity);
											//S$due = new DateTime($due);
											
									
											// Calculate days left
											if ($today <= $validity) { //if on time
												$days_left = $today->diff($validity);
												$exceed_due = "UPDATE content_record SET due = 'false' WHERE username = '$username' AND content_id = '$class_id'";
												$result_due = mysqli_query($db, $exceed_due); 
											} else { //if exceeded
												$days_left = $validity->diff($today);
												$exceed_due = "UPDATE content_record SET due = 'true' WHERE username = '$username' AND content_id = '$class_id'";
												$result_due = mysqli_query($db, $exceed_due); 
												
											}

											
											$remainingDays_valid = $days_left->format('%a'); // Number of days remaining										
											$remainingDays_due = $days_left->format('%a');
											$date_posted = $row['time_added'];
											$date_posted = date('d-m-Y', strtotime($date_posted));
											
											?>
						
                        <div class="cours-bx" >
							<div class="action-box">
								<img src="" alt="">
									<a href="courses-details.php?course_id=<?php echo $row['class_id'] ?>" class="btn">Read More</a>
								</div>
									<div class="info-bx text-center">
											<h5><a href="#"><?php echo $row['title'] ?></a></h5>
											<span><?php echo $row['class_id'] ?></span>
									</div>
									<div class="cours-more-info">
											<div class="review">
												<?php if($today <= $validity){?>
												<span>Validity: <?php echo $remainingDays_valid?> days</span>
												
												<!-- <span>Due (Exceeded days): <?php echo $remainingDays_due?> days</span> -->
												<?php }else{?>
												<span style="color: red;">Validity: 0 days</span>
												<br>
												<span style="color: red;">Due (Exceeded Days): <?php echo $remainingDays_due?> days</span>
												<?php
												} ?>
												<br>
												<span>Format: <?php echo $row['format']?></span>
												<br>
												<span>Date Posted: <?php echo $date_posted?></span>
												
											</div>
											<div class="price">
												<h7 style="font-size: 12px;">Class ID<h7>
													<h5 style="font-size: 15px;"><?php echo $row['class_id'] ?></h5>
												<h7 style="font-size: 12px;">Status<h7>
												<h5 style="font-size: 12px;"> <?php
													echo $row['status'];
													?>
												</h5>
											</div>
								</div>
							</div>
						
									<br>
									<br>
									<?php
										}
									


								?>
									
								<br>
								<div class="col-lg-12 m-b20">
									<div class="pagination-bx rounded-sm gray clearfix">
										<ul class="pagination">
											<li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
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
							<a href="index.html"><img src="assets/images/logo-white.png" alt=""/></a>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank" href="https://www.templateshub.net">Templates Hub</a></div>
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
<script src='filter.js'></script>

       <!--Filter Page-->
	   <!-- <script>
            $(document).ready(function() {
                $('.select_format').click(function(e) {
                e.preventDefault();
                var category = $(this).text().trim();

                $.ajax({
                    url: 'fetch_courses.php',
                    method: 'GET',
                    data: { contents: category },
                    success: function(response) {
                    // Update the content in the #posts-container div
                    $('#posts-container').html(response);
                    },
                    error: function(xhr, status, error) {
                    console.log(error);
                    }
                });

				function fetch_data(page) {
					$.ajax({
						url: "fetch_courses.php",
						method: "POST",
						data: {
							page: page
						},
						success: function (data) {
							$("#posts-container").html(data);
						}
					});
				}

				fetch_data();

				$(document).on("click", ".page-item", function () {
					var page = $(this).attr("id");
					fetch_data(page);
				});
                });
            });
            </script> -->

<script>
    $(document).ready(function() {
		var selectedCategory;

			$('.select_format').click(function (e) {
				e.preventDefault();

				// Check if it's a .select_format element
				
					selectedCategory = $(this).text().trim();

					// Perform the code for '.select_format' selection
					$.ajax({
						url: 'fetch_courses.php',
						method: 'GET',
						data: {
							contents: selectedCategory,
						},
						success: function (response) {
							// Update the content in the #posts-container div
							$('#posts-container').html(response);
						},
						error: function (xhr, status, error) {
							console.log(error);
						}
					});
				
			});

			
			function fetch_data2(page) {
				// Check if selectedCategory is defined
				if (selectedCategory !== undefined) {
					$.ajax({
						url: "fetch_courses.php",
						method: "GET",
						data: {
							page: page,
							contents: selectedCategory
						},
						success: function (data) {
							$("#posts-container").html(data);
						}
					});
				}
			}



			fetch_data(1);

			$(document).on("click", ".page-item", function () {
				var page = $(this).attr("id");
				fetch_data2(page);
			});
    });
</script>

		
			<!-- Pagination -->
			<script type="text/javascript">
				function fetch_data(page) {
					$.ajax({
						url: "phpfiles/pagination.php",
						method: "GET",
						data: {
							page: page
						},
						success: function (data) {
							$("#posts-container").html(data);
						}
					});
				}

				fetch_data();

				$(document).on("click", ".page-item", function () {
					var page = $(this).attr("id");
					fetch_data(page);
				});
			</script>

			<!-- Pagination for filtered content -->
			<!-- <script type="text/javascript">
				function fetch_data_filtered(page) {
					$.ajax({
						url: "phpfiles/fetch_courses.php",
						method: "POST",
						data: {
							page: page
						},
						success: function (data) {
							$("#posts-container").html(data);
						}
					});
				}

				fetch_data_filtered();

				$(document).on("click", ".page-item2", function () {
					var page = $(this).attr("id");
					console.log("Clicked page:", page);
					fetch_data_filtered(page);
				});
			</script> -->


		</script>
		<!--Live Search-->
		<script type="text/javascript">
			$(document).ready(function(){
				$("#live-search").keyup(function(){
					var input = $(this).val();

					if (input !== "") {
						// Perform the search when the input is not empty
						$.ajax({
							url: "phpfiles/livesearch.php",
							method: "POST",
							data: { input: input },
							success: function(data) {
								$("#posts-container").html(data);
							}
						});
					} else {
						// Load the full list when the input is empty
						$.ajax({
							url: "phpfiles/full_list.php", // Adjust the URL to fetch the full list
							method: "POST", // Use GET or POST, depending on your server-side code
							data: { input: input },
							success: function(data) {
								$("#posts-container").html(data);
							}
						});
					}
				});
			});

		</script>




	
</body>

</html>
