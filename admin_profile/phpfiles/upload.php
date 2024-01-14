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
              
        $check = "SELECT * FROM class WHERE class_id = '$class_id' AND (department = '$department' || department = 'All')"; //only applicable if one dept is picked
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
            //if the knowledge other than 'All' already within the class, delete the record, delete the content_record too
                $check_knowledge = "SELECT * FROM class WHERE class_id = '$class_id' AND department != 'All'";
                $result_check_knowledge = mysqli_query($db, $check_knowledge);
                
                while($row = mysqli_fetch_assoc($result_check_knowledge)){
                    $id = $row['id'];
                        $query = "SELECT * FROM class WHERE id = $id";
                        $result_outer = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result_outer);
                        $department_user = $row['department']; //retrieving the department to track user with the same department
                        $class_id = $row['class_id'];
                            // Check for errors

                            // Continue with processing the result set
                            $fetch_username = "SELECT * FROM users WHERE department = '$department_user'";
                            $result_username = mysqli_query($db, $fetch_username);

                            while ($row = mysqli_fetch_assoc($result_username)) {
                                $username = $row['username'];
                                //fetch content_record that has the class_id and username
                                // $fetch_content_record = "SELECT * FROM content_record WHERE username = '$username' AND content_id = '$class_id'";
                                $delete_query = "DELETE FROM content_record WHERE username = '$username' AND content_id = '$class_id'";
                                $result_inner = mysqli_query($db, $delete_query);

                            // Check for errors in the inner query
                            if (!$result_inner) {
                                // Handle errors
                                echo "Error deleting record: " . mysqli_error($db);
                            }
                        }


                        
                        //delete knowledge that was shared by admin
                        $sql = "DELETE FROM class WHERE id='$id'";
                        $result = mysqli_query($db, $sql);
                }

            $query = "SELECT * FROM users WHERE role = 'user'";
            $result = mysqli_query($db, $query);
        
            while($row = mysqli_fetch_assoc($result)){
                $username = $row['username'];
                $query2 = "SELECT * FROM class WHERE department = '$department'"; //choose class db where the department equals to 'All'
                $result2 = mysqli_query($db, $query2);
                $row = mysqli_fetch_assoc($result2); //tak guna ?? lol
                 //should check if the knowledge is already in the db for a particular department, so we don't enter the knowledge into the content_record

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

