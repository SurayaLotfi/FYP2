<?php
include "connect.php";
// include "./admin_profile/edit-course.php";
// if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
   

    $sql = "SELECT * FROM class WHERE id=$id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];

    // JavaScript confirmation dialog
//     echo '<script>';
//     echo 'var confirmed = confirm("Are you sure you want to delete \"' . $title . '\" ?");';
//     echo 'if (confirmed) {';
//     echo '   window.location.href = "delete.php?confirm=1&id=' . $id . '";';
//     echo '} else {';
//     echo '   window.location.href = "../edit-course.php?course_id='. $id . '";'; // Redirect to EDIT-COURSE if deletion is canceled
//     echo '}';
//     echo '</script>';

// } elseif (isset($_GET['confirm']) && $_GET['confirm'] == 1) {
    // $id = $_GET['id'];

    
    // $query_source = "SELECT * FROM class WHERE id=$id";
    // $result_source = mysqli_query($db, $sql);
    // $row = mysqli_fetch_assoc($result_source);
    // $source = $row['source'];
    
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