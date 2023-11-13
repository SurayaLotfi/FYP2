<?php
include "connect.php";
// include "./admin_profile/edit-course.php";
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "SELECT * FROM class WHERE id=$id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];

    // JavaScript confirmation dialog
    echo '<script>';
    echo 'var confirmed = confirm("Are you sure you want to delete \"' . $title . '\" ?");';
    echo 'if (confirmed) {';
    echo '   window.location.href = "delete.php?confirm=1&id=' . $id . '";';
    echo '} else {';
    echo '   window.location.href = "../edit-course.php?course_id='. $id . '";'; // Redirect to EDIT-COURSE if deletion is canceled
    echo '}';
    echo '</script>';

} elseif (isset($_GET['confirm']) && $_GET['confirm'] == 1) {
    $id = $_GET['id'];

    $sql = "DELETE FROM class WHERE id=$id";
    $result = mysqli_query($db, $sql);

    if ($result) {
        echo '<script>';
        echo 'alert("Deleted successfully");';
        echo 'window.location.href = "../courses.php";'; // Redirect after the alert
        echo '</script>';
    } else {
        echo "Connection failed";
    }

    
} else {
    echo "Hello";
}

      
?>