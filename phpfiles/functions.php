<?php

function getAllContents() {
    include "connect.php";
    $contents = array(); // Initialize an empty array

    $query = "SELECT * FROM class";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        while ($row = $result->fetch_assoc()) { //or $row = mysqli_fetch_assoc($query);
            $contents[] = $row;
        }
    } else {
        // Handle the query error, e.g., log an error message or return false
        // You can also add more specific error handling if needed.
        die("Query failed: " . $db->error);
    }

    return $contents;
}


    function getContentByFormat($format){
        include "connect.php";
        $query = $db->query("SELECT * FROM class WHERE format = '$format'");
      

        //loop through the result
        while($row = $query->fetch_assoc()){
            $contents[] = $row;
        }

        return $contents;

    }

    function pagination($page, $total_pages){
        
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
    <?php
    }
?>