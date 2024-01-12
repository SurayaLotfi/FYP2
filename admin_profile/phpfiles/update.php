<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
    
</body>
</html>

<?php

    include "connect.php";
    // if (isset($_POST['update'])) {
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

    
    //         // JavaScript confirmation dialog
    // echo '<script>';
    // echo 'var confirmed = confirm("Are you sure you want to update \"' . $title . '\" ?");';
    // echo 'if (confirmed) {';
    //     echo '   window.location.href = "update.php?confirm=1&id=' . $id .  '&class_id='  .$class_id . '&title='. urlencode($title) .'&format='.$format.'&validity=' . $validity .  '&department=' . $department . '&content=' . $content . '&status=' . $status . '&minimum_time=' . $minimum_time . '";';
    // echo '} else {';
    // echo '   window.location.href = "../edit-course.php?course_id='. $id . '";'; // Redirect to EDIT-COURSE if deletion is canceled
    // echo '}';
    // echo '</script>';
    
    // }elseif(isset($_GET['confirm']) && $_GET['confirm']==1){
        // $id = $_GET['id'];
        // $title = $_GET['title'];
        // // $class_code = $_GET['class_code'];
        // $class_id = $_GET['class_id'];
        // $validity = $_GET['validity'];
        // // $due = $_GET['due'];
        // $department = $_GET['department'];
        // $content = $_GET['content'];
        // $status = $_GET['status'];
        // $minimum_time = $_GET['minimum_time'];
        // $format = $_GET['format'];

        //get the original department
        $search1 = "SELECT * FROM class WHERE class_id = '$class_id'";
        $result_search1 = mysqli_query($db, $search1);
        $row = mysqli_fetch_assoc($result_search1);
        $db_department = $row['department']; //original department

        // Update database using prepared statements
        $update = $db->prepare("UPDATE class SET title=?, format=?, validity=?, department=?, content=?, minimum_time=?, class_id=? WHERE id=?");

        // Bind parameters
        $update->bind_param("sssssssi", $title, $format, $validity, $department, $content, $minimum_time, $class_id, $id);

        // Execute the update
        $update_result = $update->execute();

        // Close the prepared statement
        $update->close();
    
        if($update){
            if($db_department != $department){ //if the original department is not the same with the new department, insert the knowledge to the users with the new department and delete the old
            //if the changing was department, remove the old ones and insert to the new ones
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

                header("Location: ../courses.php?alert=editsuccess");

           }else{

            header("Location: ../courses.php?alert=editsuccess");

           }
         }else{
            echo "Query error: " . mysqli_error($db); // Display the error message
        }
    // } else{
    //     echo "Query error: Cannot re-direct"; // Display the error message
    // }
    ?>