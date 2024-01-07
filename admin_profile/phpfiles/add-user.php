<?php
    include "connect.php";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $query = "INSERT INTO users (username, full_name, email, department, role, password) 
                  VALUES ('$username', '$full_name', '$email', '$department', '$role', '$password')";
        $result = mysqli_query($db, $query);

        if($result){
            header("Location: ../manage-user.php?alert=success");
        }else{
            echo "Query error: " . mysqli_error($db);
        }
    }

?>