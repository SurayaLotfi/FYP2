<?php

    session_start();
    include "connect.php";

    if(isset($_POST['share'])){
        $knowledge_id = $_POST['shareid'];
        $message = $_POST['message'];
        $content = $_POST['content'];

        

        $query = "UPDATE knowledge_sharing SET status = 'Declined' WHERE knowledge_id = $knowledge_id";
        $result = mysqli_query($db, $query);

        if($result){
            
            // search whether the knowledge was once sent or not
            $query = "SELECT * FROM ks_declined WHERE ks_id = $knowledge_id";
            $result = mysqli_query($db, $query);
           
           
           if(mysqli_num_rows($result)> 0){
            // update the ks_declined database
            $query = "UPDATE ks_declined SET message_admin = '$message', content_declined = '$content' WHERE ks_id = $knowledge_id";
            $result = mysqli_query($db, $query);

           }else{
             // insert message into ks_declined database
             $query = "INSERT INTO ks_declined(ks_id, message_admin, content_declined) VALUES('$knowledge_id', '$message', '$content')";
             $result = mysqli_query($db, $query);
           }


           ;

            if($result){
                echo "<script> 
                alert('Knowledge has been declined.');
                window.location.href = '../k-request.php';
                </script>";
            }else{
                echo "problem";
            }

        }
    }

?>