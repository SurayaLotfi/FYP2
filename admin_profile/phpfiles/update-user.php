<?php

    include "connect.php";

    if(isset($_POST['edit'])){
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $full_name = $_POST['full_name'];
        $department = $_POST['department'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        echo "hello";

    // JavaScript confirmation dialog
    echo '<script>';
    echo 'var confirmed = confirm("Are you sure you want to update \"' . $username . '\"\'s profile?");';
    echo 'if (confirmed) {';
        echo '   window.location.href = "update-user.php?confirm=1&user_id=' . $user_id . '&username='  .$username . '&full_name='  .$full_name . '&department='. $department .'&email='.$email.'&role=' . $role .'";';
    echo '} else {';
    echo '   window.location.href = "../edit-user.php?user_id='. $user_id . '";'; // Redirect to EDIT-COURSE if deletion is canceled
    echo '}';
    echo '</script>';
    }elseif(isset($_GET['confirm']) && $_GET['confirm']==1){
        $user_id = $_GET['user_id'];
        $username = $_GET['username'];
        $full_name = $_GET['full_name'];
        $department = $_GET['department'];
        $email = $_GET['email'];
        $role = $_GET['role'];

        //update database
        $insert = $db->query("UPDATE users SET username='$username', full_name='$full_name', department='$department', email='$email', role='$role' WHERE id=$user_id");
    
        if($insert){

            echo '<script>';
            echo 'alert("Updated successfully");';
            echo 'window.location.href = "../edit-user.php?&user_id=' . $user_id.'";'; // Redirect after the alert
            echo '</script>';

            }else{
            echo "Query error: " . mysqli_error($db); // Display the error message
        }
    } else{
        echo "Query error: " . mysqli_error($db); // Display the error message
    }




?>