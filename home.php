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
    <header class="header rs-nav header-transparent">
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
							<li><a href="logout.php">Logout</a></li>
							
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
						<a href="index.html"><img src="assets/images/Malaysia_Airlines_Logo.svg.png" alt=""></a>
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
									
									<li><a href="home.php">Home</a></li>
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
    <!-- Header Top END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Main Slider -->
        <div class="rev-slider">
			<div id="rev_slider_486_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery36" data-source="gallery" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
				<!-- START REVOLUTION SLIDER 5.3.0.2 fullwidth mode -->
				<div id="rev_slider_486_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
					<ul>	<!-- SLIDE  -->
						<li data-index="rs-100" 
						data-transition="parallaxvertical" 
						data-slotamount="default" 
						data-hideafterloop="0" 
						data-hideslideonmobile="off" 
						data-easein="default" 
						data-easeout="default" 
						data-masterspeed="default" 
						data-thumb="error-404.html" 
						data-rotate="0" 
						data-fstransition="fade" 
						data-fsmasterspeed="1500" 
						data-fsslotamount="7" 
						data-saveperformance="off" 
						data-title="A STUDY ON HAPPINESS" 
						data-param1="" data-param2="" 
						data-param3="" data-param4="" 
						data-param5="" data-param6="" 
						data-param7="" data-param8="" 
						data-param9="" data-param10="" 
						data-description="Science says that Women are generally happier">
							<!-- MAIN IMAGE -->
							<img src="assets/images/home_MAS.jpg" alt="" 
								data-bgposition="center center" 
								data-bgfit="cover" 
								data-bgrepeat="no-repeat" 
								data-bgparallax="10" 
								class="rev-slidebg" 
								data-no-retina />
								
							<!-- LAYER NR. 1 -->
							<div class="tp-caption tp-shape tp-shapewrapper " 
								id="slide-100-layer-1" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								data-width="full"
								data-height="full"
								data-whitespace="nowrap"
								data-type="shape" 
								data-basealign="slide" 
								data-responsive_offset="off" 
								data-responsive="off"
								data-frames='[{"from":"opacity:0;","speed":1,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1,"to":"opacity:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['left','left','left','left']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 5;background-color:rgba(2, 0, 11, 0.80);border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>	
							<!-- LAYER NR. 2 -->
							<div class="tp-caption Newspaper-Title   tp-resizeme" 
								id="slide-100-layer-2" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['250','250','250','240']" 
								data-fontsize="['50','50','50','30']"
								data-lineheight="['55','55','55','35']"
								data-width="full"
								data-height="none"
								data-whitespace="normal"
								data-type="text" 
								data-responsive_offset="on" 
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[10,10,10,10]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 6; font-family:rubik; font-weight:700; text-align:center; white-space: normal;">
									Welcome To KMS4MAE, <?php echo $username ?>
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
								id="slide-100-layer-3" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['210','210','210','210']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-type="text" 
								data-responsive_offset="on"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['left','left','left','left']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 7; white-space: nowrap; color:#fff; font-family:rubik; font-size:18px; font-weight:400;">
									Knowledge is one of our most valuable asset
							</div>
							
							<!-- LAYER NR. 3 -->
							<div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
								id="slide-100-layer-4" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['320','320','320','290']" 
								data-width="['800','800','700','420']"
								data-height="['100','100','100','120']"
								data-whitespace="unset"
								data-type="text" 
								data-responsive_offset="on"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 7; text-transform:capitalize; white-space: unset; color:#fff; font-family:rubik; font-size:18px; line-height:28px; font-weight:400;">
						
								
								
								You have <?php echo $total_inbox ?> notifications
								
								</div>
							<!-- LAYER NR. 4 -->
							<!-- <div class="tp-caption Newspaper-Button rev-btn " 
								id="slide-100-layer-5" 
								data-x="['center','center','center','center']" 
								data-hoffset="['90','80','75','90']" 
								data-y="['top','top','top','top']" 
								data-voffset="['400','400','400','420']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-type="button" 
								data-responsive_offset="on" 
								data-responsive="off"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[12,12,12,12]"
								data-paddingright="[30,35,35,15]"
								data-paddingbottom="[12,12,12,12]"
								data-paddingleft="[30,35,35,15]"
								style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; background-color:var(--primary) !important; border:0; border-radius:30px; margin-right:5px;">READ MORE </div> -->
								<a href = "inbox.php">
								<div class="tp-caption Newspaper-Button rev-btn" 
									id="slide-100-layer-6" 
									data-x="['center','center','center','center']" 
									data-hoffset="['0','0','0','0']" 
									data-y="['top','top','top','top']" 
									data-voffset="['400','400','400','420']" 
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-type="button" 
									data-responsive_offset="on" 
									data-responsive="off"
									data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
									data-textAlign="['center','center','center','center']"
									data-paddingtop="[12,12,12,12]"
									data-paddingright="[30,35,35,15]"
									data-paddingbottom="[12,12,12,12]"
									data-paddingleft="[30,35,35,15]"
									style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; border-radius:30px;">Check Inbox
								</div>
								</a>

						<!-- <li data-index="rs-200" 
						data-transition="parallaxvertical" 
						data-slotamount="default" 
						data-hideafterloop="0" 
						data-hideslideonmobile="off" 
						data-easein="default" 
						data-easeout="default" 
						data-masterspeed="default" 
						data-thumb="assets/images/slider/slide1.jpg" 
						data-rotate="0" 
						data-fstransition="fade" 
						data-fsmasterspeed="1500" 
						data-fsslotamount="7" 
						data-saveperformance="off" 
						data-title="A STUDY ON HAPPINESS" 
						data-param1="" data-param2="" 
						data-param3="" data-param4="" 
						data-param5="" data-param6="" 
						data-param7="" data-param8="" 
						data-param9="" data-param10="" 
						data-description="Science says that Women are generally happier"> -->
							<!-- MAIN IMAGE -->
							<!-- <img src="assets/images/slider/slide2.jpg" alt="" 
								data-bgposition="center center" 
								data-bgfit="cover" 
								data-bgrepeat="no-repeat" 
								data-bgparallax="10" 
								class="rev-slidebg" 
								data-no-retina /> -->
								
							<!-- LAYER NR. 1 -->
							<!-- <div class="tp-caption tp-shape tp-shapewrapper " 
								id="slide-200-layer-1" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								data-width="full"
								data-height="full"
								data-whitespace="nowrap"
								data-type="shape" 
								data-basealign="slide" 
								data-responsive_offset="off" 
								data-responsive="off"
								data-frames='[{"from":"opacity:0;","speed":1,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:1;","ease":"Power4.easeOut"}]'
								data-textAlign="['left','left','left','left']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 5;background-color:rgba(2, 0, 11, 0.80);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
							</div> -->

							<!-- LAYER NR. 2 -->
							<!-- <div class="tp-caption Newspaper-Title   tp-resizeme" 
								id="slide-200-layer-2" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['250','250','250','240']" 
								data-fontsize="['50','50','50','30']"
								data-lineheight="['55','55','55','35']"
								data-width="full"
								data-height="none"
								data-whitespace="normal"
								data-type="text" 
								data-responsive_offset="on" 
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[10,10,10,10]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 6; font-family:rubik; font-weight:700; text-align:center; white-space: normal;text-transform:uppercase;">
									Welcome To University
							</div> -->

							<!-- LAYER NR. 3 -->
							<!-- <div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
								id="slide-200-layer-3" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['210','210','210','210']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-type="text" 
								data-responsive_offset="on"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['left','left','left','left']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 7; white-space: nowrap;text-transform:uppercase; color:#fff; font-family:rubik; font-size:18px; font-weight:400;">
									Batter Education For A Better 
							</div>
							 -->
							<!-- LAYER NR. 3 -->
							<!-- <div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
								id="slide-200-layer-4" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['320','320','320','290']" 
								data-width="['800','800','700','420']"
								data-height="['100','100','100','120']"
								data-whitespace="unset"
								data-type="text" 
								data-responsive_offset="on"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 7; text-transform:capitalize; white-space: unset; color:#fff; font-family:rubik; font-size:18px; line-height:28px; font-weight:400;">
									 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
							</div> -->
							<!-- LAYER NR. 4 -->
							<!-- <div class="tp-caption Newspaper-Button rev-btn " 
								id="slide-200-layer-5" 
								data-x="['center','center','center','center']" 
								data-hoffset="['90','80','75','90']" 
								data-y="['top','top','top','top']" 
								data-voffset="['400','400','400','420']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-type="button" 
								data-responsive_offset="on" 
								data-responsive="off"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[12,12,12,12]"
								data-paddingright="[30,35,35,15]"
								data-paddingbottom="[12,12,12,12]"
								data-paddingleft="[30,35,35,15]"
								style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; background-color:var(--primary) !important; border:0; border-radius:30px; margin-right:5px;">READ MORE </div>
							<div class="tp-caption Newspaper-Button rev-btn" 
								id="slide-200-layer-6" 
								data-x="['center','center','center','center']" 
								data-hoffset="['-90','-80','-75','-90']" 
								data-y="['top','top','top','top']" 
								data-voffset="['400','400','400','420']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-type="button" 
								data-responsive_offset="on" 
								data-responsive="off"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[12,12,12,12]"
								data-paddingright="[30,35,35,15]"
								data-paddingbottom="[12,12,12,12]"
								data-paddingleft="[30,35,35,15]"
								style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; border-radius:30px;">CONTACT US</div>
						</li> -->
						<!-- SLIDE  -->
					</ul>
				</div><!-- END REVOLUTION SLIDER -->  
			</div>  
		</div>  
        <!-- Main Slider -->
		<div class="content-block">
            
			<!-- Our Services -->
			<div class="section-area content-inner service-info-bx">
                <div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="service-bx">
								<div class="action-box">
									<img src="assets/images/view-dashboard.jpg" alt="" style="height: 250px; width: 100%; object-fit: cover;">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-bank text-primary"></i>
									</div>
									<h4><a href="#">Dashboard</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="service-bx">
								<div class="action-box">
									<img src="assets/images/training.png" alt="" style="height: 250px; width: 100%; object-fit: cover;">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-book text-primary"></i>
									</div>
									<h4><a href="#">Knowledge Base</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="service-bx m-b0">
								<div class="action-box">
									<img src="assets/images/library.jpg" alt="" style="height: 250px; width: 100%; object-fit: cover;">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-file-text-o text-primary"></i>
									</div>
									<h4><a href="#">Library</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
            </div>
            <!-- Our Services END -->
			
			<!-- Popular Courses -->
			<!-- <div class="section-area section-sp2 popular-courses-bx">
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Popular <span>Courses</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="row">
					<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item">
							<div class="cours-bx">
								<div class="action-box">
									<img src="assets/images/courses/pic1.jpg" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Introduction EduChamp – LMS plugin</a></h5>
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
										<del>$190</del>
										<h5>$120</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="cours-bx">
								<div class="action-box">
									<img src="assets/images/courses/pic2.jpg" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Introduction EduChamp – LMS plugin</a></h5>
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
										<del>$190</del>
										<h5>$120</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="cours-bx">
								<div class="action-box">
									<img src="assets/images/courses/pic3.jpg" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Introduction EduChamp – LMS plugin</a></h5>
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
										<del>$190</del>
										<h5>$120</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="cours-bx">
								<div class="action-box">
									<img src="assets/images/courses/pic4.jpg" alt="">
									<a href="#" class="btn">Read More</a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Introduction EduChamp – LMS plugin</a></h5>
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
										<del>$190</del>
										<h5>$120</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div> -->
			<!-- Popular Courses END -->
			
			<!-- Form -->
			<!-- <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(assets/images/background/bg1.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center text-white">
							<h2>Online Courses To Learn</h2>
							<h5>Own Your Feature Learning New Skills Online</h5>
							<form class="cours-search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="What do you want to learn today?	">
									<div class="input-group-append">
										<button class="btn" type="submit">Search</button> 
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="mw800 m-auto">
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
					</div>
				</div>
			</div> -->
			<!-- Form END -->
			<!-- <div class="section-area section-sp2">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center heading-bx">
							<h2 class="title-head m-b0">Upcoming <span>Events</span></h2>
							<p class="m-b0">Upcoming Education Events To Feed Brain. </p>
						</div>
					</div>
					<div class="row">
					<div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30">
						<div class="item">
							<div class="event-bx">
								<div class="action-box">
									<img src="assets/images/event/pic4.jpg" alt="">
								</div>
								<div class="info-bx d-flex">
									<div>
										<div class="event-time">
											<div class="event-date">29</div>
											<div class="event-month">October</div>
										</div>
									</div>
									<div class="event-info">
										<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
										<ul class="media-post">
											<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
											<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
										</ul>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="event-bx">
								<div class="action-box">
									<img src="assets/images/event/pic3.jpg" alt="">
								</div>
								<div class="info-bx d-flex">
									<div>
										<div class="event-time">
											<div class="event-date">29</div>
											<div class="event-month">October</div>
										</div>
									</div>
									<div class="event-info">
										<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
										<ul class="media-post">
											<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
											<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
										</ul>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="event-bx">
								<div class="action-box">
									<img src="assets/images/event/pic2.jpg" alt="">
								</div>
								<div class="info-bx d-flex">
									<div>
										<div class="event-time">
											<div class="event-date">29</div>
											<div class="event-month">October</div>
										</div>
									</div>
									<div class="event-info">
										<h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
										<ul class="media-post">
											<li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
											<li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
										</ul>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="text-center">
						<a href="#" class="btn">View All Event</a>
					</div>
				</div>
			</div> -->
			
			<!-- Testimonials -->
			<!-- <div class="section-area section-sp2 bg-fix ovbl-dark" style="background-image:url(assets/images/background/bg1.jpg);">
                <div class="container">
					<div class="row">
						<div class="col-md-12 text-white heading-bx left">
							<h2 class="title-head text-uppercase">what people <span>say</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="assets/images/testimonials/pic1.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name">Peter Packer</h5>
									<p>-Art Director</p>
								</div>
								<div class="testimonial-content">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type...</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="assets/images/testimonials/pic2.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name">Peter Packer</h5>
									<p>-Art Director</p>
								</div>
								<div class="testimonial-content">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type...</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!-- Testimonials END -->
			<br>
			<!-- Recent News -->
			<!-- <div class="section-area section-sp2">
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Recent <span>News</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="recent-news-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item">
							<div class="recent-news">
								<div class="action-box">
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
						<div class="item">
							<div class="recent-news">
								<div class="action-box">
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
						<div class="item">
							<div class="recent-news">
								<div class="action-box">
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
					</div>
				</div>
			</div> -->
			<!-- Recent News End -->
			
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
							<a href="index.html"><img src="" alt="" style="height: 50px; ;"></a>
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
										<li><a href="courses.php">Courses</a></li>
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
<!-- Revolution JavaScripts Files -->
<script src="assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script>
jQuery(document).ready(function() {
	var ttrevapi;
	var tpj =jQuery;
	if(tpj("#rev_slider_486_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_486_1");
	}else{
		ttrevapi = tpj("#rev_slider_486_1").show().revolution({
			sliderType:"standard",
			jsFileLocation:"assets/vendors/revolution/js/",
			sliderLayout:"fullwidth",
			dottedOverlay:"none",
			delay:9000,
			navigation: {
				keyboardNavigation:"on",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
				mouseScrollReverse:"default",
				onHoverStop:"on",
				touch:{
					touchenabled:"on",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style: "uranus",
					enable: true,
					hide_onmobile: false,
					hide_onleave: false,
					tmp: '',
					left: {
						h_align: "left",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					},
					right: {
						h_align: "right",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					}
				},
				
			},
			viewPort: {
				enable:true,
				outof:"pause",
				visible_area:"80%",
				presize:false
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[768,600,600,600],
			lazyType:"none",
			parallax: {
				type:"scroll",
				origo:"enterpoint",
				speed:400,
				levels:[5,10,15,20,25,30,35,40,45,50,46,47,48,49,50,55],
				type:"scroll",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
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
