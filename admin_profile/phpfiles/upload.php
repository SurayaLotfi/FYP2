<?php
    session_start();

    include "connect.php";
    
    if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    }

    ?>
        <script>
            console.log("hello");
            </script>
        <?php
    
    //upload pdf
  
        ?>
        <script>
            console.log("hello");
            </script>
        <?php
        
        $title = $_POST['title'];
        // $class_code = $_POST['class_code'];
        $validity = date('Y-m-d', strtotime($_POST['dateValid']));
        // $due = date('Y-m-d', strtotime($_POST['dateDue']));
        $class_id = $_POST['content'];
        $format = $_POST['format'];
        $department = $_POST['department'];
        $content = $_POST['content'];
        $status = 'Not yet started';
        $minimum_time = $_POST['minimum_time'];
        $username = $_SESSION['username'];
        $source = 'Admin';
        $due = 'false';
        ?>

    <?php
              
        $check = "SELECT * FROM class WHERE class_id = '$class_id' AND department = '$department'";
        $result_check = mysqli_query($db, $check);

        if(mysqli_num_rows($result_check) > 0){
            header("Location: ../add-listing.php?alert=knowledge_exists");
            ?>
            <script>
                console.log("hello");
                </script>
            <?php
            exit();
        }else{

    //insert into database
    $insert = $db->query("INSERT INTO class(title, format,  validity,  class_id, department,content, minimum_time, admin, source)
    VALUES('$title', '$format',  '$validity','$class_id', '$department', '$content',  '$minimum_time', '$username', '$source')");
   
    if($insert){
        //insert in user's record
        if($department == "All"){
            $query = "SELECT * FROM users";
            $result = mysqli_query($db, $query);
        
            while($row = mysqli_fetch_assoc($result)){
                $username = $row['username'];
                $query2 = "SELECT * FROM class WHERE department = '$department'";
                $result2 = mysqli_query($db, $query2);
                $row = mysqli_fetch_assoc($result2); //tak guna ?? lol
                
                $insert_query = $db->query("INSERT INTO content_record (username, status, due, content_id) VALUES ('$username', '$status', '$due', '$class_id')");
                }
        }else{
        $query = "SELECT * FROM users WHERE department = '$department'";
        $result = mysqli_query($db, $query);
    
        while($row = mysqli_fetch_assoc($result)){
            $username = $row['username'];
            $query2 = "SELECT * FROM class WHERE department = '$department' ";
            $result2 = mysqli_query($db, $query2);
            $row = mysqli_fetch_assoc($result2);
            
            $insert_query = $db->query("INSERT INTO content_record (username, status, due, content_id) VALUES ('$username', '$status', '$due', '$class_id')");
            }
        }
        
        header("Location: ../add-listing.php?alert=success");

        }else{
        echo "Query error: " . mysqli_error($db); // Display the error message
    }

        }

       


  
    
    ?>

