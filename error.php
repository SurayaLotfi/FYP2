<?php 
// Check if the cookie exists
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
	<link rel="stylesheet" type="text/css" href="assets/css/notification.css">

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rizalcss@2.1.0/css/cdn.rizal.css" integrity="sha256-pqCXaySV+OMUcpVQ0FeFtvz9VLMeI08z53Ar2a7QP5o=" crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script defer src="https://kit.fontawesome.com/1e8d61f212.js"></script> -->

	<!--Javascript-->
	<!DOCTYPE html>
<html>
<head>
    <!-- Your other head content -->


</head>
<body>
    <!-- Your HTML content -->
</body>
</html>

	
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
							<!-- <li>
								<select class="header-lang-bx">
									<option data-icon="flag flag-uk">English UK</option>
									<option data-icon="flag flag-us">English US</option>
								</select>
							</li> -->
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
									
										<div class="ttr-notify-header" id="link">
											<span class="ttr-notify-text-top"><a href="inbox.php" class="link-inbox"><?php  echo $total_inbox ?> New Notifications</a></span>
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

														<a href="inbox.php" class="deadline">You have <?php echo $total_deadline ?></a> knowledge that is almost due
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
														<a href="inbox_ke.php" class="exceed">You have <?php echo $total_exceed ?></a> exceeded knowledge.
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
														<a href="inbox_ka.php" class="accepted">You have <?php echo $total_ks ?></a> new accepted knowledge.
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
														<a href="inbox_kd.php" class="declined">You have <?php echo $total_declined ?></a> new declined knowledge.
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
							<a href="index.html"><img src="assets/images/Malaysia_Airlines_Logo.svg.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	
						<li class="active"><a href="javascript:;">Home<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									
									<li><a href="index-2.html">Home</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Library<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									
									<li><a href="library.php">Library</a></li>
									<li><a href="ai.php">Chatbot</a></li>
								</ul>
							</li>
						
							<li class="add-mega-menu"><a href="javascript:;">Knowledge Base<i class="fa fa-chevron-down"></i></a>
								
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
    <!-- header END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
		<!-- <div class="page-banner ovbl-dark" style="background-image:url(assets/images/malaysia-airlines-bg.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Knowledge Sharing</h1>
				 </div>
            </div>
        </div> -->
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Knowledge Sharing</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
	
        <!-- inner page banner -->
        <div class="page-banner contact-page section-sp2">
            <div class="container">
                <div class="row">
					<div class="col-lg-9 col-md-7">
						<!-- <form  action="sharing.php" method="post"> -->

                        <?php 
                         $content_id = $_GET['content'];
                         $query = "SELECT * FROM class WHERE class_id = '$content_id' AND department = '$department'";
                         $result = mysqli_query($db, $query);
                         $row = mysqli_fetch_assoc($result);
                         $title = $row['title'];
                        
                        ?> 
							<div class="heading-bx">
								<h2 class="title-head">Knowledge no longer <span>Exist in the FTP Server</span></h2>
								<p>Do contact the admin of this page along with the <u>Knowledge title</u> and <u>ID</u> to resolve this issue.</p>
                                <h6>Email: kms4mabes@gmail.com </h6>
                                <h6>Knowledge ID: <?php echo $content_id?> </h6>
                                <h6>Knowledge Title: '<?php echo $title?>'' </h6>
                                <br>
                                <a href="courses.php" class="btn m-r5">Go to Knowledge Base</a>
                                <a href="courses-details.php?course_id=<?php echo urlencode($content_id); ?>" class="btn outline black">Back</a>
								
							</div>	
						</div>
									</div>
								</div>

								<!-- <div class="col-lg-12">
									<div class="form-group">
										<div class="container">
											<div class="row">
												<div class="col"> -->
										<!--PDF-->
										<!-- <div class="card">
										<h5 class="card-header info-color white-text text-center py-4">
										<div class="col-12">
										<strong>Upload PDF Form</strong>
										</div>
										</h5>
										<div class="card-body  px-lg-5 pt-0">
											<div class="container" style="display: flex; justify-content: center; align-items: center">
											<div class="row" style="padding: 10px"><br><br>
												<form action="sharing.php" method="post" enctype="multipart/form-data" > -->
													<!--Document Title-->
													<!-- <div class="form-group col-6">
														<label for="Title">Title</label>
														<input type="text" class="form-control" id="content_name" name="content_name" placeholder="Enter Title">
													</div>
													<div class="form-group col-6">
														<label for="Name">Name</label>
														
														<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
													</div>
													<div class="form-group">
														<label for="Title">email</label>
														<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
													</div>
													<div class="form-group">
														<label for="Title">phone</label>
														<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Numbers">
													</div>
													<div class="form-group">
														<label for="Title">subject</label>
														<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Title">
													</div>
													<div class="form-group">
														<label for="Title">Message</label>
														<input type="text" class="form-control" id="message" name="message" placeholder="Enter Title">
													</div>
													
												<br>
												<input type="file" name="my_pdf"> 
												<button  type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0"  name="submit" type="submit">UPLOAD</button> 
												<br>
												<footer style="font-size: 12px"><b>File Type:</b><font color="red"><i> .pdf only</i></font></footer>
												</form>
												
											</div>
											</div>  
										</div>
										</div>
										</div>
									</div>
								</div> -->
								<!-- <div class="col-lg-12">
									<div class="form-group">
										
									</div>
								</div>
								<div class="col-lg-12">
									<button name="submit" type="submit" value="submit" class="btn button-md">Send Your Knowledge</button>
								</div> -->
							</div>
						<!-- </form> -->
					</div>
				</div>
            </div>
		</div>
        <!-- inner page banner END -->
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
							<div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank" href="https://www.templateshub.net">KMS4MAE</a></div>
						</div>
						
						<div class="pt-social-link">
							<!-- <ul class="list-inline m-a0"> -->
								<!-- <li><a href="#" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-google-plus"></i></a></li> -->
								<!-- <li><p>KMS4MAE</p></li>
							</ul> -->
							<div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank" href="https://www.templateshub.net">Wan Suraya U2005345</a></div>
						</div>
						<!-- <div class="pt-btn-join">
							<a href="home.php" class="btn ">Go To Home</a>
							
						</div> -->
					</div>
				</div>
			<!-- </div>
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
            </div> -->
        <!-- </div> -->
        <!-- <div class="footer-bottom">
            <div class="container">
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank" href="https://www.templateshub.net">Wan Suraya U2005345</a></div>
                </div>
            </div>
        </div> -->
    </footer>
    <!-- Footer END ==== -->
    <!-- scroll top button -->
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>
<script>
    // Get a reference to the select element
    const departmentSelect = document.getElementById("department");

    // Add an event listener to detect changes in the selection
    departmentSelect.addEventListener("change", function() {
        // Get the selected option value
        const selectedDepartment = departmentSelect.value;

        // Perform an action based on the selected department
        switch (selectedDepartment) {
            case "training":
                // Code to perform when Training is selected
                break;
            case "engineering":
                // Code to perform when Engineering is selected
                break;
            case "it":
                // Code to perform when IT is selected
                break;
            case "business":
                // Code to perform when Business is selected
                break;
            case "all":
                // Code to perform when All is selected
                break;
            default:
                // Handle any other cases here
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<script src='../../www.google.com/recaptcha/api.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var minimumTimeInput = document.getElementById('minimum_time');
        var form = document.querySelector('form');

        form.addEventListener('submit', function (e) {
            var enteredTime = minimumTimeInput.value.trim();

            if (!isValidTimeFormat(enteredTime)) {
                e.preventDefault(); // Prevent form submission
                alert("Please enter the time in the format 'X hours Y minutes', e.g., '6 hours 30 minutes'");
            }
        });

        function isValidTimeFormat(timeString) {
            // Regular expression to match the expected format, e.g., '6 hours 30 minutes'
            var timePattern = /^\d+ hours \d+ minutes$/;
            return timePattern.test(timeString);
        }
    });
    </script>

	<!-- Live Notification -->
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
</body>


</html>
