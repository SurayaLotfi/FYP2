<?php 
    session_start();
    include "connect.php";
    $department = $_SESSION['department'];
    $username = $_SESSION['username'];

    if(isset($_POST['input'])){
        $input = $_POST['input'];
        $sql = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
        WHERE class.department = '$department'
        AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
        AND username = '$username'
        AND (title LIKE '%$input%' OR class_code LIKE '%$input%' OR class_id LIKE '%$input%')
       ";
    
$result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $validity = $row['validity'];
            
                
            $today = new DateTime();
            $validity = new DateTime($validity);
           
    
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
                        <span><?php echo $row['class_code'] ?></span>
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
    }else{
        echo "<h3> No data found";
    }
}
?>