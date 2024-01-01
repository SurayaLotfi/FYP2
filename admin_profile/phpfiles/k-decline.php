<?php
    session_start();
    include "connect.php";

   
        $knowledge_id = $_POST['shareid'];
        $message = $_POST['message'];
        $content = $_POST['content'];

        // Update knowledge_sharing status to 'Declined'

        $updateStatusQuery = "UPDATE knowledge_sharing SET status = 'Declined' WHERE knowledge_id = $knowledge_id";
        $updateStatusResult = mysqli_query($db, $updateStatusQuery);


        if($updateStatusResult){

            // Search whether the knowledge was once sent or not
            $searchDeclinedQuery = "SELECT * FROM ks_declined WHERE ks_id = $knowledge_id";
            $searchDeclinedResult = mysqli_query($db, $searchDeclinedQuery);

            if(mysqli_num_rows($searchDeclinedResult) > 0){
                // Update the ks_declined database
                $updateDeclinedQuery = "UPDATE ks_declined SET message_admin = '$message', content_declined = '$content' WHERE ks_id = $knowledge_id";
                $updateDeclinedResult = mysqli_query($db, $updateDeclinedQuery);


            } else {
                // Insert message into ks_declined database
                $insertDeclinedQuery = "INSERT INTO ks_declined(ks_id, message_admin, content_declined) VALUES('$knowledge_id', '$message', '$content')";
                $insertDeclinedResult = mysqli_query($db, $insertDeclinedQuery);


            }

                header("Location: ../k-request.php?alert=success");
            
            }          
    
?>
