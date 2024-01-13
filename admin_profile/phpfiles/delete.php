<?php
include "connect.php";
// include "./admin_profile/edit-course.php";
// if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    // $department = $_GET['department'];
   

    // $sql = "SELECT * FROM class WHERE id=$id";
    // $result = mysqli_query($db, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $title = $row['title'];
    
    //delete first all the content_record that has this id and which department
    $query = "SELECT * FROM class WHERE id = $id";
    $result_outer = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result_outer);
    $department = $row['department']; //retrieving the department to track user with the same department
    $class_id = $row['class_id'];
        // Check for errors

        // Continue with processing the result set
        $fetch_username = "SELECT * FROM users WHERE department = '$department'";
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

    if ($result) {

 
        header("Location: ../courses.php?alert=deletesuccess");
    } else {
        echo "Connection failed";
    }

    
// } else {
//     echo "Hello";
// }

      
?>