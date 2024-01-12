<?php
include "connect.php";
// include "./admin_profile/edit-course.php";
// if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
   

    $sql = "SELECT * FROM class WHERE id=$id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    
    //delete knowledge that was shared by admin
    $sql = "DELETE FROM class WHERE id=$id";
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