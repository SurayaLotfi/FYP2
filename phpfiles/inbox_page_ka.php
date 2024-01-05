<?php
    session_start();
    include "connect.php";
    $department = $_SESSION['department'];
    $username = $_SESSION['username'];
    
    $limit = 3;

	

       //for main page, no filter applied

    if(isset($_GET["page"])){ //if another page is chosen
        $page = $_GET["page"];
       
    }else{
        $page = 1;
    }
    
    $start_from = ($page - 1) *$limit; //getting the range
    
    
    //to get the total of pages
    ?>

    <div style="margin-left: 50px;">
    </div>
    <div class="pagination-bx rounded-sm gray clearfix" id="get_pagination">
    <?php
  
  $due_date_threshold = date('Y-m-d', strtotime('+10 days')); 
  $query = "SELECT * FROM class JOIN knowledge_sharing ON class.class_id = knowledge_sharing.class_id
            WHERE source = '$username'
            AND status = 'Accepted' 
            AND viewed = 0";

    $result= mysqli_query($db, $query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records/$limit);

    ?>
    
    <h4> You have <?php echo mysqli_num_rows($result) ?> accepted knowledge.<br></h4>
    <?php
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
        
        
    </div>
    
    <?php

    //fetch courses
    //to show result within the setted limit
    $query_paged = "SELECT * FROM class JOIN knowledge_sharing ON class.class_id = knowledge_sharing.class_id
    WHERE class.source = '$username'
    AND status = 'Accepted' 
    AND viewed = 0
    ORDER BY class.time_added DESC
    LIMIT $start_from, $limit";

        $resulttemp = mysqli_query($db, $query);
        if(mysqli_num_rows($resulttemp) == 0){
            echo " 
            <div class='cours-bx' style='padding: 50px; text-align: center; border-radius: 50px; '> 
            <h5><p>View Your Knowledge Shared Status <a href='knowledge_shared.php' style='text-decoration: underline;'>Here</a></p></h5>        
            </div>
            ";
        }
           
    $result = mysqli_query($db, $query_paged);
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
            <?php
                $knowledge = $row['content'];
                $folderPath = 'pdf/'. $knowledge;
                $folder = $folderPath . '/' . $knowledge;
                if (empty($folderPath)) {
                    // $htmlFile = reset($files); // Get the first element of the array
        
                    //echo '<a href="' . $htmlFile . '" target="_blank" class="btn radius-xl text-uppercase" id="startLink">Go To Content</a>';
                    echo 'Not Found';
                    
                } else {
                    //$pdfFile = reset($pdf);
                    echo '<a href="' . $folder . '" target="_blank"  class="btn" >View Your Knowledge</a>';
                }
            ?>
                <!-- <a href="courses-details.php?course_id=<?php echo $row['class_id'];?>&ks=1" class="btn">View</a> -->
            </div>
                <div class="info-bx text-center">
                        <h5><a href="#"><?php echo $row['title'] ?></a></h5>
                        <span><?php echo $row['class_id'] ?></span>
                </div>
                <div class="cours-more-info">
                        <div class="review">
                            <span>Format: <?php echo $row['format']?></span>
                            <br>
                            <span>Date Posted: <?php echo $date_posted?></span>
                            
                        </div>
                        <div class="price">
                            <h7 style="font-size: 12px;">Class ID<h7>
                                <h5 style="font-size: 15px;"><?php echo $row['class_id'] ?></h5>
                            <h7 style="font-size: 12px;">Approved By<h7>
                            <h5 style="font-size: 12px;"> <?php
                            
                                echo $row['admin'];
                                
                                ?>
                            </h5>
                        </div>
            </div>

            <?php 
            //update knowledge_sharing table, viewed = 1 once clicked
            
                $class_id = $row['class_id'];
                $query_viewed = "UPDATE knowledge_sharing SET viewed = 1 WHERE class_id = '$class_id'";
                $result_query_viewed = mysqli_query($db, $query_viewed);
            ?>
        </div>
       
    
<br>
<br>
        <?php
      }


?>