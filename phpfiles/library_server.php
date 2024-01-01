<?php
    //RETRIEVING KNOWLEDGE FROM DATABASE
    session_start();
    include "connect.php";

    //if search OR filter is inserted
    if(isset($_POST['searchText']) || $_POST['dropdownValue']){

        
        $input = $_POST['searchText'];
        $department = $_POST['dropdownValue'];

        

        //if there's no search, only filter
        if($input === ''){
            if($department === 'All'){
                $query = "SELECT * FROM class ORDER BY id";
            }else{
                $query = "SELECT * FROM class
                WHERE department = '$department'
                ORDER BY id
                ";
            }
       

        $result = mysqli_query($db, $query);
      

        while($row = mysqli_fetch_assoc($result)){  

            $dbTime_added = $row['time_added'];
            $dateTime = new DateTime($dbTime_added);
            $formattedDate = $dateTime->format("M d Y");
    ?>
   
        <div class="post action-card col-xl-6 col-lg-6 col-md-12 col-xs-12 m-b40">
            <div class="recent-news">
                <div class="action-box">	
                </div>
                <div class="info-bx">
                    <ul class="media-post">
                        <li><a href="library_view.php?course_id=<?php echo $row['class_id']?>"><i class="fa fa-calendar"></i><?php echo $formattedDate?></a></li>
                        <li><a href="library_view.php?course_id=<?php echo $row['class_id']?>"><i class="fa fa-user"></i>By <?php echo $row['source']?></a></li>
                    </ul>
                    <h5 class="post-title"><a href="blog-details.html"><?php echo $row['title']?></a></h5>
                    <p>Knowing that, you’ve optimised your pages countless amount of times, written tons.</p>
                    <div class="post-extra">
                        <a href="library_view.php?course_id=<?php echo $row['class_id']?>" class="btn-link">VIEW</a>
                        <a href="library_view.php?course_id=<?php echo $row['class_id']?>" class="comments-bx"><i class="fa fa-building" aria-hidden="true"></i><?php echo $row['department']?></a>	
                    </div>
                </div>
            </div>
        </div>
    
    

<?php
            }
        }else{

            if($department === 'All'){
                $query_search = "SELECT * FROM class
                WHERE (title LIKE '%$input%'  OR class_id LIKE '%$input%')
                ORDER BY id
                ";
            }else{
                $query_search = "SELECT * FROM class
                WHERE department = '$department'
                AND (title LIKE '%$input%'  OR class_id LIKE '%$input%')
                ORDER BY id
                ";
            }
           

        $result_search = mysqli_query($db, $query_search);
        while($row = mysqli_fetch_assoc($result_search)){  

            $dbTime_added = $row['time_added'];
            $dateTime = new DateTime($dbTime_added);
            $formattedDate = $dateTime->format("M d Y");
    ?>
    
    <div class="post action-card col-xl-6 col-lg-6 col-md-12 col-xs-12 m-b40">
            <div class="recent-news">
                <div class="action-box">	
                </div>
                <div class="info-bx">
                    <ul class="media-post">
                        <li><a href="library_view.php?course_id=<?php echo $row['class_id']?>"><i class="fa fa-calendar"></i><?php echo $formattedDate?></a></li>
                        <li><a href="library_view.php?course_id=<?php echo $row['class_id']?>"><i class="fa fa-user"></i>By <?php echo $row['source']?></a></li>
                    </ul>
                    <h5 class="post-title"><a href="blog-details.html"><?php echo $row['title']?></a></h5>
                    <p>Knowing that, you’ve optimised your pages countless amount of times, written tons.</p>
                    <div class="post-extra">
                        <a href="library_view.php?course_id=<?php echo $row['class_id']?>" class="btn-link">VIEW</a>
                        <a href="library_view.php?course_id=<?php echo $row['class_id']?>" class="comments-bx"><i class="fa fa-building" aria-hidden="true"></i><?php echo $row['department']?></a>	
                    </div>
                </div>
            </div>
        </div>
    

<?php

             }
         }
    }else{
        echo '';

    }
?>