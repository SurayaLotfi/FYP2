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
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	
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
							<?php 
								if(!empty($_SESSION["id"])){ //if a user is still in a session and wants to login, we won't allow them.
									?><li><a href="logout.php">Logout</a></li><?php
								}else{
									header("Location: logout.php");
								}
							?>
							
							
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
						<li class="active"><a href="javascript:;">Home<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									
									<li><a href="home.php">Home</a></li>
								</ul>
							</li>
							<li class="active"><a href="javascript:;">Library<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									
									<li><a href="ai.php">Library</a></li>
								</ul>
							</li>
							
							<li class="active"><a href="javascript:;">Knowledge Base<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
										<li><a href="courses.php">Knowledge Base</a></li>
										<li><a href="history.php">History</a></li>
										<li><a href="inbox.php">Inbox</a></li>
									</ul>	
							</li>
							<!-- <li><a href="javascript:;">Blog <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="blog-classic-grid.html">Blog Classic</a></li>
									<li><a href="blog-classic-sidebar.html">Blog Classic Sidebar</a></li>
									<li><a href="blog-list-sidebar.html">Blog List Sidebar</a></li>
									<li><a href="blog-standard-sidebar.html">Blog Standard Sidebar</a></li>
									<li><a href="blog-details.html">Blog Details</a></li>
								</ul>
							</li> -->
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
        <!-- <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Profile</h1>
				 </div>
            </div>
        </div> -->
		<!-- Breadcrumb row -->
		<!-- <div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Profile</li>
				</ul>
			</div>
		</div> -->
		<!-- Breadcrumb row END -->
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="profile-bx text-center">
								<div class="user-profile-thumb">
									<img src="assets/images/pp.png" alt=""/>
								</div>
								<div class="profile-info">
									<h4><?php echo $username ?></h4>
									<span><?php echo $email?></span>
								</div>
								<div class="profile-social">
									<ul class="list-inline m-a0">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<div class="profile-tabnav">
									<ul class="nav nav-tabs">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#courses"><i class="ti-book"></i>Progress</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#quiz-results"><i class="fa fa-trophy"></i>Leaderboard</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#edit-profile"><i class="ti-pencil-alt"></i>Edit Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#change-password"><i class="ti-lock"></i>Change Password</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12 m-b30">
							<div class="profile-content-bx">
								<div class="tab-content">
									<div class="tab-pane active" id="courses">
										
										<?php
											$query = "SELECT * FROM content_record WHERE username = ?";
											$statusCounts = array(
												'completed' => 0,
												'in_progress' => 0,
												'not_started' => 0
											);
											
											if ($stmt = mysqli_prepare($db, $query)) {
												mysqli_stmt_bind_param($stmt, "s", $username);
												mysqli_stmt_execute($stmt);
												$result = mysqli_stmt_get_result($stmt);
											
												while ($row = mysqli_fetch_array($result)) {
													$status = $row["status"];
											
													// Increment the corresponding count based on the status
													if ($status === 'Completed') {
														$statusCounts['completed']++;
													} elseif ($status === 'In Progress') {
														$statusCounts['in_progress']++;
													} elseif ($status === 'Not yet started') {
														$statusCounts['not_started']++;
													}
												}
											
												mysqli_stmt_close($stmt);
											} else {
												echo "Error in the query: " . mysqli_error($db);
											}
										?>

										
		<div class="profile-head">
			<h3>My Progress</h3>
			<div class="feature-filters style1 ml-auto">
				<ul class="filters" data-toggle="buttons">
					<li data-filter="" class="btn active">
						<input type="radio">
						<a href="#"><span>All</span></a> 
					</li>
					<li data-filter="publish" class="btn">
						<input type="radio">
						<a href="#"><span>Publish</span></a> 
					</li>
					<li data-filter="pending" class="btn">
						<input type="radio">
						<a href="#"><span>Pending</span></a> 
					</li>
				</ul>
			</div>
		</div>

		
		<?php
		//RETRIEVING TOTAL TIME SPENT ON MODULES
				include "phpfiles/convertTime.php";

				$query = "SELECT * FROM content_record WHERE username = '$username'";
				$result = mysqli_query($db, $query);
				$total_time_spent = 0;
				

				while($row = mysqli_fetch_assoc($result)){
					if($row['duration'] != null){
					$totalSeconds = convertToSeconds($row['duration']);
					$totalHours = $totalSeconds / 3600;
					$total_time_spent += $totalHours;
					}
				}

				$total_time_spent = number_format($total_time_spent,2);
				
		//RETRIEVING TOTAL KNOWLEDGE SHARED
				$query = "SELECT * FROM knowledge_sharing WHERE username = '$username' AND status = 'Accepted'";
				$result = mysqli_query($db, $query);
				$total_knowledge_accepted = mysqli_num_rows($result);

				$query = "SELECT * FROM knowledge_sharing WHERE username = '$username'";
				$result = mysqli_query($db, $query);

				$total_knowledge_shared = mysqli_num_rows($result);

				$on_time_query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
				WHERE class.department = '$department'
				AND username = '$username'
				AND content_record.due = 'true'";
				$result_on_time = mysqli_query($db, $on_time_query);
				$total_exceed = mysqli_num_rows($result_on_time);
			?>
		
		<div class="courses-filter">
			<div class="clearfix">
			<div class="row">
				<div class="column" style="width: 250px; margin: 10px; ">
					<div class="card">
						<div class="card-header text-center">
							Time Spent On Knowledge
						</div>
						<div class="card-body text-center">
							<h3 class="card-title"><?php echo $total_time_spent?> H</h3>
							<a href="history.php" class='btn-secondry' style=" width: auto">View History</a>
						</div>
					</div>
				</div>
				<div class="column" style="width: 250px; margin: 10px; ">
					<div class="card">
						<div class="card-header text-center">
							Total Knowledge Shared 
						</div>
						<div class="card-body text-center">
							<h3 class="card-title"><?php echo $total_knowledge_shared ?></h3>
							<a href="knowledge_shared.php" class='btn-secondry' style=" width: auto">View Knowledge</a>
					</div>
						</div>
				</div>
				<div class="column" style="width: 250px; margin: 10px; ">
					<div class="card">
						<div class="card-header text-center">
							Exceeded Knowledge Due
						</div>
						<div class="card-body text-center">
							<h3 class="card-title text-center" ><?php echo $total_exceed?></h3>
							<a href="k-exceeded.php" class='btn-secondry' style="width: auto">View Exceeded</Em></a>
						</div>
					</div>
				</div>

		</div>
			

			<div class="row">
				<div class="column" style="width: 370px; margin: 10px;">
				<div class="card">
						<div class="card-header text-center">
							Knowledge Completion Status
						</div>
						<div class="card-body text-center">
							<div style="width: 300px; height: 300px;">
								<canvas id="doughnutChart"></canvas>
							</div>
						</div>
					</div>
				</div>
			
				<div class="column" style="width: 400px; margin: 10px;">
				<div class="card">
						<div class="card-header text-center">
							Percentage of Performance
						</div>
						<div class="card-body text-center">
						<div style="width: 300px; height: 300px; margin-left: 30px">
							<canvas id="doughnutChart2"></canvas>
						</div>
						</div>
					</div>
				</div>
			</div>

				
				
			
				<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
				<script>
					//setup block
					console.log("Hi!")
					const statusCounts = <?php echo json_encode($statusCounts); ?>;
					console.log(statusCounts);
					const data = {
						labels: ['Completed', 'In Progress', 'Not Yet Started'],
						datasets: [{
							label: 'Sum of Status for each module',
							data: [statusCounts['completed'], statusCounts['in_progress'], statusCounts['not_started']],
							backgroundColor: ['rgba(100, 200, 100, 0.8)', 'rgba(135, 183, 200, 0.5)', 'rgba(220, 100, 80, 0.8)'], // Set colors for each segment
							borderWidth: 1
							
							}]
					};
				//config block
					const config = {
						type: 'doughnut',
						data, //data from setup block
						options: {
							
						}
					};

					//render block
					const myChart = new Chart(
						document.getElementById('doughnutChart'),
						config
					);	

					const ctx = document.getElementById('doughnutChart2').getContext('2d');
					const gradientSegment = ctx.createLinearGradient(0,0,400,0);
					gradientSegment.addColorStop(0, 'red');
					gradientSegment.addColorStop(0.4, 'yellow');
					gradientSegment.addColorStop(1, 'green');
					//setup block
					const statusCounts2 = <?php echo json_encode($statusCounts); ?>;
					console.log(statusCounts2);
					
					const data2 = {
						labels: ['Completed', 'In Progress', 'Not Yet Started'],
						datasets: [{
							label: 'Sum of Status for each module',
							data: [statusCounts2['completed'], statusCounts2['in_progress'], statusCounts2['not_started']],
							backgroundColor: [gradientSegment], // Set colors for each segment
							borderWidth: 1,
							circumference: 180,
							rotation: 270,
							cutout: 100,
							needleValue: statusCounts2['completed']

							}]
					};

					const gaugeNeedle = {
						id: 'gaugeNeedle',
						afterDatasetsDraw(chart, args, plugins){
							const { ctx, data } = chart;

							ctx.save();
							
							const xCenter = chart.getDatasetMeta(0).data[0].x;
							const yCenter = chart.getDatasetMeta(0).data[0].y;
							const outerRadius = chart.getDatasetMeta(0).data[0].outerRadius;
							const innerRadius = chart.getDatasetMeta(0).data[0].innerRadius;
							const widthSlice = (outerRadius - innerRadius)/2;
							const radius = 7;
							const angle = Math.PI / 180;

							const needleValue = data.datasets[0].needleValue;

							const dataTotal = data.datasets[0].data.reduce((a, b) => a+b, 0);
							const circumference = ((chart.getDatasetMeta(0).data[0].circumference / Math.PI) / data.datasets[0].data[0]) * needleValue;
							

							ctx.translate(xCenter, yCenter);
							ctx.rotate(Math.PI * (circumference + 1.5))

							//needle
							ctx.beginPath();
							ctx.strokeStyle = 'grey';
							ctx.fillStyle = 'grey';
							ctx.lineWidth = 1;
							ctx.moveTo(0 - radius, 0);
							ctx.lineTo(0, 0 - innerRadius - widthSlice);
							ctx.lineTo(0 + radius,0);
							ctx.closePath();
							ctx.stroke();
							ctx.fill();

							//dot
							ctx.beginPath();
							ctx.arc(0, 0, radius, 0, angle * 360, false);
							ctx.fill();

							ctx.restore();
						}
					}

						const gaugeFlowMeter = {
							id: 'gaugeFlowMeter',
							afterDatasetsDraw(chart, args, plugins){
								const { ctx, data } = chart;
								ctx.save();
								const needleValue = data.datasets[0].needleValue;
								const xCenter = chart.getDatasetMeta(0).data[0].x;
								const yCenter = chart.getDatasetMeta(0).data[0].y;

								const circumference = ((chart.getDatasetMeta(0).data[0].circumference / Math.PI) / data.datasets[0].data[0]) * needleValue;
								const totalTask = statusCounts2['completed'] + statusCounts2['in_progress'] + statusCounts['not_started'];
								const percentageValue = ((statusCounts2['completed']/totalTask) * 100).toFixed(1);
								//flowMeter
								ctx.font = 'bold 25px sans-serif';
								ctx.fillStyle = 'grey';
								ctx.textAlign = 'center';
								ctx.fillText(`${percentageValue}%`, xCenter, yCenter + 45);

							}
						}
					
					//gaugeLabels plugin block
					const gaugeLabels = {
						id: 'gaugeLabels',
						afterDatasetsDraw(chart, args, plugins){
							const { ctx, chartArea:  {left, right}} = chart;
							const xCenter = chart.getDatasetMeta(0).data[0].x;
							const yCenter = chart.getDatasetMeta(0).data[0].y;

							const outerRadius = chart.getDatasetMeta(0).data[0].outerRadius;
							const innerRadius = chart.getDatasetMeta(0).data[0].innerRadius;
							const widthSlice = (outerRadius - innerRadius)/2;

							ctx.translate(xCenter, yCenter);
							ctx.font = 'bold 15px sans-serif';
							ctx.fillStyle = 'Black';
							ctx.textAlign = 'center';
							ctx.fillText('Bad', 0 - innerRadius - widthSlice, 0 + 20);
							ctx.fillText('Good', 0 + innerRadius + widthSlice, 0 + 20);

							ctx.restore();
						}
					}
					//config block
					const config2 = {
						type: 'doughnut',
						data: data2, //data from setup block
						options: {
							aspectRatio: 1.0,
							plugins: {
								legend: {
									display: false
								},
								
							}
						},
						plugins: [gaugeNeedle, gaugeFlowMeter, gaugeLabels], 
					};

					//render block
					const myChart2 = new Chart(
						document.getElementById('doughnutChart2'),
						config2
					);	


				</script>
				
				</div>
			</div>
		</div>

		<?php

			$score = $total_knowledge_accepted  + $statusCounts['completed'] - $total_exceed;
			$totalCompleted = $statusCounts['completed'];

			$query = "SELECT * FROM achievements WHERE username = '$username'";
			$result = mysqli_query($db, $query);
			
			if ($result) {
				
				// Check if any rows were returned
				if (mysqli_num_rows($result) > 0) {
					// Username exists, update the score
					$update_score = "UPDATE achievements  SET score = $score,  exceeded= $total_exceed, completed = $totalCompleted, knowledge_shared = $total_knowledge_accepted WHERE username = '$username'";
					$result_score = mysqli_query($db, $update_score);
				} else {
					// Username does not exist, insert a new record
					$insert_query = "INSERT INTO achievements (username, knowledge_shared, completed, exceeded, score) VALUES ('$username', $total_knowledge_accepted , $totalCompleted, $total_exceed, $score)";
					$result_insert = mysqli_query($db, $insert_query);
			
					if (!$result_insert) {
						echo "Error: " . mysqli_error($db);
					}
				}
			} else {
				echo "Error: " . mysqli_error($db);
			}
			
			

			$query = "SELECT * FROM achievements WHERE role = 'user' ORDER BY score DESC";
			$result = mysqli_query($db, $query);

		?>
									<div class="tab-pane" id="quiz-results">
										<div class="profile-head">
											<h3> Leaderboard</h3>
										</div>
										<div class="courses-filter">
										<h6>Score are based on total completed knowledge, amount of successful knowledge shared and amount of exceeded tasks</h6>
											<div class="row">
											<table class="table">
												<thead>
													<tr>
													<th scope="col">Rank <i class="fa fa-trophy" aria-hidden="true"></i> </th>
													<th scope="col">Username</th>
													<th scope="col">Knowledge Shared</th>
													<th scope="col">Completed Knowledge</th>
													<th scope="col" style="color: red">Exceeded Tasks</th>
													<th scope="col">Score</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$i = 1;
														while($row = mysqli_fetch_assoc($result)){
														?>
															<tr>
																<th scope="row"><?php echo $i ?></th>
																<td><?php echo $row['username']?></td>
																<td><?php echo $row['knowledge_shared']?></td>
																<td><?php echo $row['completed']?></td>
																<td><?php echo $row['exceeded']?></td>
																<td><?php echo $row['score']?></td>
															</tr>
														<?php $i++;}
													?>
												</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="edit-profile">
										<div class="profile-head">
											<h3>Edit Profile</h3>
										</div>
										<form class="edit-profile">
											<div class="">
												
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Full Name</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<input class="form-control" type="text" value= '<?php echo $full_name ?>'>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Email</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<input class="form-control" type="text" value="<?php echo $email?>" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Username</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<input class="form-control" type="text" value="<?php echo $username?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Department</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<input class="form-control" type="text" value="<?php echo $department?>" disabled>
													</div>
												</div>
												
												
											</div>
											<div class="">
												<div class="">
													<div class="row">
														<div class="col-12 col-sm-3 col-md-3 col-lg-2">
														</div>
														<div class="col-12 col-sm-9 col-md-9 col-lg-7">
															<button type="reset" class="btn">Save changes</button>
															<button type="reset" class="btn-secondry">Cancel</button>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="tab-pane" id="change-password">
										<div class="profile-head">
											<h3>Change Password</h3>
										</div>
										<form class="edit-profile">
											<div class="">
												<div class="form-group row">
													<div class="col-12 col-sm-8 col-md-8 col-lg-9 ml-auto">
														<h3>Password</h3>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Current Password</label>
													<div class="col-12 col-sm-8 col-md-8 col-lg-7">
														<input class="form-control" type="password" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">New Password</label>
													<div class="col-12 col-sm-8 col-md-8 col-lg-7">
														<input class="form-control" type="password" value="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Re Type New Password</label>
													<div class="col-12 col-sm-8 col-md-8 col-lg-7">
														<input class="form-control" type="password" value="">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-12 col-sm-4 col-md-4 col-lg-3">
												</div>
												<div class="col-12 col-sm-8 col-md-8 col-lg-7">
													<button type="reset" class="btn">Save changes</button>
													<button type="reset" class="btn-secondry">Cancel</button>
												</div>
											</div>
												
										</form>
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
							<a href="index.html"><img src="assets/images/Malaysia-Airlines-Logo.png" alt=""/></a>
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
</body>

</html>
