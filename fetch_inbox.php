<?php
session_start();
include "connect.php";

$department = $_SESSION['department'];
$username = $_SESSION['username'];
?>
<html>
    <head>
        <body>
        
            <?php

            include "connect.php";

            if(isset($_GET['contents'])){
                $content = $_GET['contents'];
                ?>

            <div style="margin-left: 50px;">
            <?php if($content == 'Reset'){
                $due_date_threshold = date('Y-m-d', strtotime('+10 days')); // Get the current date + 5 days in the same 'YYYY-MM-DD' format
						
						$query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
						WHERE class.department = '$department'
						AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
						AND username = '$username'
						AND validity <= '$due_date_threshold'
						ORDER BY class.id DESC;
						";
						
						$result = mysqli_query($db, $query);

							?>
				<h4> You have <?php echo mysqli_num_rows($result) ?> content that due is less than 10 days.<br></h4>
                
            <?php
            }else{
                ?><h4>Filtered by <?php echo $content?><br></h4> <?php
            }
            ?>				
            
            </div>
                <?php
                $due_date_threshold = date('Y-m-d', strtotime('+10 days')); 
                if($content == "All"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
								WHERE class.department = '$department'
								AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
								AND username = '$username'
                                AND validity <= '$due_date_threshold'
								ORDER BY class.id DESC";


                }elseif($content == "PDF"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'
                    AND format = 'PDF'
                    ORDER BY class.id DESC";
                    $resulttemp = mysqli_query($db, $query);
                    if(mysqli_num_rows($resulttemp) == 0){

                        echo "
                        <div class='cours-bx'>
                        <h3>  No content yet. </h3>
                        </div>";
                    }
                }elseif($content == "Others"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'
                    AND format = 'Others'
                    ORDER BY class.id DESC";
                    $resulttemp = mysqli_query($db, $query);
                    if(mysqli_num_rows($resulttemp) == 0){
                        echo "
                        <div class='cours-bx'>
                        <h3>  No content yet. </h3>
                        </div>";
                    }
                }elseif($content == "Video"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'
                    AND format = 'Video'
                    ORDER BY class.id DESC";
                    $resulttemp = mysqli_query($db, $query);
                    if(mysqli_num_rows($resulttemp) == 0){
                        echo "
                        <div class='cours-bx'>
                        <h3>  No content yet. </h3>
                        </div>";
                    }
                }elseif($content == "Images"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'
                    AND format = 'Image'
                    ORDER BY class.id DESC";
                    $resulttemp = mysqli_query($db, $query);
                    if(mysqli_num_rows($resulttemp) == 0){
                        echo "
                        <div class='cours-bx'>
                        <h3>  No content yet. </h3>
                        </div>";
                    }
                }elseif($content == "Validity Date"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'
                    ORDER BY class.validity";
                    
                    
                }elseif($content == "Due Date"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'
                    ORDER BY class.due";

                }elseif($content == "Not Yet Started"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND content_record.status = 'Not yet started'
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'";
                    
                }elseif($content == "In Progress"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND content_record.status = 'In Progress'
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'";
                    
                }else{
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND validity <= '$due_date_threshold'
                    ORDER BY class.id DESC";
                }
            

                $result = mysqli_query($db, $query);
										
                while($row = mysqli_fetch_assoc($result)){
                            //retrieving data that we want
                        
                        
                        $validity = $row['validity'];
                        $due = $row['due'];
                            
                        $today = new DateTime();
                        $validity = new DateTime($validity);
                       // $due = new DateTime($due);
                        
                
                        // Calculate days left
                        if ($today <= $validity) {
                            $days_left = $today->diff($validity);
                            
                        } else {
                            $days_left = $validity->diff($today);
                            
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
                
                }

            ?>
        </body>
    </head>
</html>