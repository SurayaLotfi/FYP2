<?php

    include "connect.php";


        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $full_name = $_POST['full_name'];
        $department = $_POST['department'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        

        //update database
        $insert = $db->query("UPDATE users SET username='$username', full_name='$full_name', department='$department', email='$email', role='$role' WHERE id=$user_id");
    
        if($insert){

            header("Location: ../manage-user.php?alert=editsuccess");

            }else{
            echo "Query error:: " . mysqli_error($db); // Display the error message
        }
    




?>