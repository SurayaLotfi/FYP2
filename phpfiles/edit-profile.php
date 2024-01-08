<?php
session_start();
include "connect.php";



if (isset($_FILES['my_image'])) {
 

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    $username = $_SESSION['username'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $department = $_SESSION['department'];
    

    if($error === 0){
        if($img_size > 12500000){
            $em = "Sorry, file too large";
           // header("Location: upload.php?error=$em");
        }else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //checking extension belakang.. .txt, .png etc. can echo $img_ex to try
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;

                if (!file_exists('img/')) {
                    mkdir('img/');
                }

                $img_upload_path = 'img/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                
                //update user
                $stmt = $db->prepare("UPDATE users SET username=?, full_name=?, email=?, department=?, profile_picture=? WHERE username = ?");
                $stmt->bind_param("ssssss", $username, $full_name, $email, $department, $new_img_name, $username);
   
               if($stmt->execute()){
                //header("Location: ../profile.php?alert=success");
                header("Location: ../profile.php?alert=success");
               }
               else{
                 echo "gambo ";
               }
            }else{
                header("Location: ../profile.php?alert=wrongformat");
            }
        }
    }else{

        $username = $_SESSION['username'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $department = $_SESSION['department'];

        $stmt = $db->prepare("UPDATE users SET username=?, full_name=?, email=?, department=? WHERE username = ?");
        $stmt->bind_param("sssss", $username, $full_name, $email, $department,  $username);
    
            if($stmt->execute()){
                header("Location: ../profile.php?alert=success");
                echo $full_name;
            }
            else{
                echo "problem kat sini";
            }
    }
}else{

  
}


?>