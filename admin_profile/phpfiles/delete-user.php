<?php

include "connect.php";
// if (isset($_GET['user_id'])) {

    $id = $_GET['user_id'];
    echo $id;
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];

    // JavaScript confirmation dialog
//     echo '<script>';
//     echo 'var confirmed = confirm("Are you sure you want to delete \"' . $username . '\" ?");';
//     echo 'if (confirmed) {';
//     echo '   window.location.href = "delete-user.php?confirm=1&id=' . $id . '";';
//     echo '} else {';
//     echo '   window.location.href = "../manage-user.php?course_id='. $id . '";'; // Redirect to EDIT-COURSE if deletion is canceled
//     echo '}';
//     echo '</script>';

// } elseif (isset($_GET['confirm']) && $_GET['confirm'] == 1) {
//     $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($db, $sql);

    if ($result) {
        header("Location: ../manage-user.php?alert=deletesuccess");
    } else {
        echo "Connection failed";
    }

    
// } else {
//     echo "Hello";
// }

?>