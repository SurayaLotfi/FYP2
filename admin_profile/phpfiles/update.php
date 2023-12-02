<?php

    include "connect.php";
    if (isset($_POST['update'])) {
        $id = $_POST['updateid'];

        $title = $_POST['title'];
        // $class_code = $_POST['class_code'];
        $validity = date('Y-m-d', strtotime($_POST['dateValid']));
        // $due = date('Y-m-d', strtotime($_POST['dateDue']));
        $class_id = $_POST['class_id'];
        $format = $_POST['format'];
        $department = $_POST['department'];
        $content = $_POST['content'];
        $status = 'Not yet started';
        $minimum_time = $_POST['minimum_time'];

    
            // JavaScript confirmation dialog
    echo '<script>';
    echo 'var confirmed = confirm("Are you sure you want to update \"' . $title . '\" ?");';
    echo 'if (confirmed) {';
        echo '   window.location.href = "update.php?confirm=1&id=' . $id .  '&class_id='  .$class_id . '&title='. $title .'&format='.$format.'&validity=' . $validity .  '&department=' . $department . '&content=' . $content . '&status=' . $status . '&minimum_time=' . $minimum_time . '";';
    echo '} else {';
    echo '   window.location.href = "../edit-course.php?course_id='. $id . '";'; // Redirect to EDIT-COURSE if deletion is canceled
    echo '}';
    echo '</script>';
    
    }elseif(isset($_GET['confirm']) && $_GET['confirm']==1){
        $id = $_GET['id'];
        $title = $_GET['title'];
        // $class_code = $_GET['class_code'];
        $class_id = $_GET['class_id'];
        $validity = $_GET['validity'];
        // $due = $_GET['due'];
        $department = $_GET['department'];
        $content = $_GET['content'];
        $status = $_GET['status'];
        $minimum_time = $_GET['minimum_time'];
        $format = $_GET['format'];

        //update database
        // $insert = $db->query("UPDATE class SET title='$title', format='$format', validity='$validity', due='$due', department='$department', content='$content', 
        //                  minimum_time='$minimum_time', class_code = '$class_code', class_id ='$class_id' WHERE id='$id'");
                         //update database
        // $insert = $db->query("UPDATE class SET title='$title', format='$format', validity='$validity', department='$department', content='$content', 
        // minimum_time='$minimum_time', class_id ='$class_id' WHERE id='$id'");

        // Update database using prepared statements
        $update = $db->prepare("UPDATE class SET title=?, format=?, validity=?, department=?, content=?, minimum_time=?, class_id=? WHERE id=?");

        // Bind parameters
        $update->bind_param("sssssssi", $title, $format, $validity, $department, $content, $minimum_time, $class_id, $id);

        // Execute the update
        $update_result = $update->execute();

        // Close the prepared statement
        $update->close();
    
        if($update){
            //find past rows that has the old department
            $search = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id 
            WHERE department != '$department'"; 
            $result = mysqli_query($db, $search);

                if(mysqli_num_rows($result)>0){ //if ada, then delete
                    $delete = "DELETE FROM content_record WHERE content_id = '$class_id'";
                    $delete_res = mysqli_query($db, $delete);

                     //delete yg lama, insert yang baruinsert in user's record
                    $query = "SELECT * FROM users WHERE department = '$department'";
                    $result = mysqli_query($db, $query);
                
                    while($row = mysqli_fetch_assoc($result)){
                        $username = $row['username'];
                        $query2 = "SELECT * FROM class WHERE department = '$department' ";
                        $result2 = mysqli_query($db, $query2);
                        $row = mysqli_fetch_assoc($result2);
                        
                        $insert_query = $db->query("INSERT INTO content_record (username, status, content_id) VALUES ('$username', '$status', '$class_id')");
                     } 
                }else{
                    $update = $db->query("UPDATE content_record SET content_id VALUES '$class_id'");
                }

                   
        
          

            echo '<script>';
            echo 'alert("Updated successfully");';
            echo 'window.location.href = "../courses.php";'; // Redirect after the alert
            echo '</script>';

            }else{
            echo "Query error: " . mysqli_error($db); // Display the error message
        }
    } else{
        echo "Query error: Cannot re-direct"; // Display the error message
    }
    ?>