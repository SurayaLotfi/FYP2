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
  $query = "SELECT * FROM knowledge_sharing 
            WHERE status = 'Declined' 
            AND username = '$username'
            AND viewed = 0";

    $result= mysqli_query($db, $query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records/$limit);

    ?>
    
    <h4> You have <?php echo mysqli_num_rows($result) ?> declined knowledge.<br></h4>
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
    $query_paged = "SELECT * FROM knowledge_sharing
    WHERE status = 'Declined'
    AND username = '$username' 
    AND viewed = 0
    ORDER BY time_added DESC
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
        
        ?>
    <div class="cours-bx" >
        <div class="action-box">
            <img src="" alt="">
                <!-- <a href="declined_knowledge.php?knowledge_id=<?php echo $row['class_id'] ?>" class="btn">Read More</a> -->
            </div>
                <div class="info-bx text-center">
                        <h5><a href="#"><?php echo $row['title'] ?></a></h5>
                        <span><?php echo $row['class_id'] ?></span>
                </div>
                <div class="cours-more-info">
                        <div class="review">
                            
                            <span>Format: <?php echo $row['format']?></span>
                            <br>
                            <span>Date Declined: <?php echo $row['timestamp']?></span>
                            
                        </div>
                        <div class="price">
                            <h7 style="font-size: 12px;">Class ID<h7>
                                <h5 style="font-size: 15px;"><?php echo $row['class_id'] ?></h5>
                            <h7 style="font-size: 12px;">Status<h7>
                            <h5 style="font-size: 12px;"> <?php
                                // if($content == "Knowledge Shared"){
                                //     $query_ks = "SELECT * FROM class 
                                //         JOIN content_record ON class.class_id = content_record.content_id
                                //         WHERE class.department = ? 
                                //         AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
                                //         AND username = ? 
                                //         AND validity <= ? 
                                //         ORDER BY class.id DESC";

                                //         $stmt = mysqli_prepare($db, $query_ks);
                                //         mysqli_stmt_bind_param($stmt, "sss", $department, $username, $due_date_threshold);
                                //         mysqli_stmt_execute($stmt);
                                //         $result_ks = mysqli_stmt_get_result($stmt);

                                //         if ($result_ks) {
                                //             if (mysqli_num_rows($result_ks) > 0) {
                                //                 $row_ks = mysqli_fetch_assoc($result_ks);
                                //                 echo $row_ks['status'];
                                //             } else {
                                //                 echo "No results found.";
                                //             }
                                //         } else {
                                //             echo "Query failed: " . mysqli_error($db);
                                //         }
                                        
                                // }else{
                                echo $row['status'];
                                // }
                                ?>
                            </h5>
                        </div>
            </div>

            <?php 

                //update knowledge_sharing table, viewed = 1 once clicked
                
                // $class_id = $row['class_id'];
                // $query_viewed = "UPDATE knowledge_sharing SET viewed = 1 WHERE class_id = '$class_id'";
                // $result_query_viewed = mysqli_query($db, $query_viewed);
        ?>
        </div>
    
                <br>
                <br>
        <?php
      }


?>