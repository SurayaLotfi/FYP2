<?php
session_start();
include "connect.php";

$department = $_SESSION['department'];
$username = $_SESSION['username'];
$due_date_threshold = date('Y-m-d');
$limit = 3;

?>
<html>
    <head>
        <body>
        
            <?php

            include "connect.php";

            //pagination if-else
            if(isset($_GET["page"])){ //if another page is chosen
                $page = $_GET["page"];  
            }else{
                $page = 1;
                
            }
            $start_from = ($page - 1)*$limit; //getting the range
            //content if-else
            if(isset($_GET['contents'])){
                $content = $_GET['contents'];
                
                ?>

            <div style="margin-left: 50px;">
            <?php if($content == 'Reset'){?>
                <h4> All Contents <br></h4>
            <?php
            }else{
                ?><h4>Filtered by <?php echo $content?><br></h4> <?php
            }
            
            ?>				
            
            
            <div class="pagination-bx rounded-sm gray clearfix" id="get_pagination">
                <?php
                    // $due_date_threshold = date('Y-m-d');
                    // $limit = 3; 
                    
                    
                
                  
                

                if($content == "All"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
								WHERE class.department = '$department'
								AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
								AND username = '$username'
								ORDER BY class.id DESC";


                }elseif($content == "PDF"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND format = 'PDF'
                    ORDER BY class.id DESC";

            
                }elseif($content == "Others"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND format = 'Others'
                    ORDER BY class.id DESC";
                  
                }elseif($content == "Video"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND format = 'Video'
                    ORDER BY class.id DESC";
                    
                }elseif($content == "Images"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    AND format = 'Image'
                    ORDER BY class.id DESC";
                   
                }elseif($content == "Validity Date"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    ORDER BY class.validity";
                    
                    
                }elseif($content == "Due Date"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    ORDER BY class.due";

                }elseif($content == "Not Yet Started"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND content_record.status = 'Not yet started'
                    AND username = '$username'";
                    
                }elseif($content == "In Progress"){
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND content_record.status = 'In Progress'
                    AND username = '$username'";
                    
                }else{
                    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                    WHERE class.department = '$department'
                    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                    AND username = '$username'
                    ORDER BY class.id DESC";
                }
            

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
                    }?>

                    
                    <?php
                    
                    for($i=1; $i<=$total_pages; $i++){ //showing the index numbers
                        $active_class = "";
                        if($i == $page){
                            $active_class = "active";
                        }
                
                        ?><li class = "page-item <?php echo $active_class?>" id = <?php echo $i ?>><span class="page-link"><?php echo $i ?></span></li>
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
                    <br>
                    </div>
                    </div>
                    <?php
                            if($content == "All"){
                            $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                        WHERE class.department = '$department'
                                        AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                        AND username = '$username'
                                        ORDER BY class.id DESC";
            
            
                            }elseif($content == "PDF"){
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                AND username = '$username'
                                AND format = 'PDF'
                                ORDER BY class.id DESC";
            
                                $resulttemp = mysqli_query($db, $query);
                                if(mysqli_num_rows($resulttemp) == 0){
            
                                    echo "
                                    <div class='cours-bx' style='padding: 50px'>
                                    <h3>  No content yet. </h3>
                                    </div>";
                                }
                            }elseif($content == "Others"){
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                AND username = '$username'
                                AND format = 'Others'
                                ORDER BY class.id DESC
                                LIMIT $start_from, $limit";
                                $resulttemp = mysqli_query($db, $query);
                                if(mysqli_num_rows($resulttemp) == 0){
                                    echo "
                                    <div class='cours-bx' style='padding: 50px'>
                                    <h3>  No content yet. </h3>
                                    </div>";
                                }
                            }elseif($content == "Video"){
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                AND username = '$username'
                                AND format = 'Video'
                                ORDER BY class.id DESC
                                LIMIT $start_from, $limit";
                                $resulttemp = mysqli_query($db, $query);
                                if(mysqli_num_rows($resulttemp) == 0){
                                    echo "
                                    <div class='cours-bx' style='padding: 50px'>
                                    <h3>  No content yet. </h3>
                                    </div>";
                                }
                            }elseif($content == "Images"){
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                AND username = '$username'
                                AND format = 'Image'
                                ORDER BY class.id DESC
                                LIMIT $start_from, $limit";
                                $resulttemp = mysqli_query($db, $query);
                                if(mysqli_num_rows($resulttemp) == 0){
                                    echo "
                                    <div class='cours-bx' style='padding: 50px'>
                                    <h3>  No content yet. </h3>
                                    </div>";
                                }
                            }elseif($content == "Validity Date"){
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                AND username = '$username'
                                ORDER BY class.validity
                                LIMIT $start_from, $limit";
                                
                            }elseif($content == "Due Date"){
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                AND username = '$username'
                                ORDER BY class.due
                                LIMIT $start_from, $limit";
            
                            }elseif($content == "Not Yet Started"){
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND content_record.status = 'Not yet started'
                                AND username = '$username'
                                LIMIT $start_from, $limit";
                                
                            }elseif($content == "In Progress"){
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND content_record.status = 'In Progress'
                                AND username = '$username'
                                LIMIT $start_from, $limit";
                                
                            }else{
                                $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
                                WHERE class.department = '$department'
                                AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                AND username = '$username'
                                ORDER BY class.id DESC
                                LIMIT $start_from, $limit";
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