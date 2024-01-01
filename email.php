<?php
session_start();
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$full_name = $_SESSION['full_name'];
$department = $_SESSION['department'];

include "connect.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
// ../ means up 1 level

$due_date_threshold = date('Y-m-d', strtotime('+2 days')); // Get the current date + 2 days in the same 'YYYY-MM-DD' format
//echo $due_date_threshold;
$subject = "New Notification";
$message = "You have new notifications. Check your inbox in KMS4MAE for details.";

//selecting the content's of this user punya department that is near the due date
//find due dates that are within 2 days from now
// $query = "SELECT * FROM class WHERE department = '$department' AND due <= '$due_date_threshold'"; 
// $result = mysqli_query($db, $query);

    // while($row = mysqli_fetch_assoc($result)){
        // echo $row['title'];
        // echo $email;

            $mail = new PHPMailer(true);
            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth = true;
            $mail -> Username = 'kms4mabes@gmail.com';
            $mail -> Password = 'fvsx gmwr jbso eqnd';
            $mail -> Port = 465;
            $mail -> SMTPSecure = 'ssl';
            $mail -> isHTML(true);
            $mail -> setFrom('kms4mabes@gmail.com');
            $mail -> addAddress($email);
            $mail -> Subject = $subject;
            $mail -> Body = $message;
           
            try {
                $mail->send();
                // Email sent successfully
                // You can add additional logic or logging here if needed
    
                // Set the email_sent flag to true
                // $_SESSION['email_sent'] = true;
    
            } catch (Exception $e) {
                // An error occurred while sending the email
                // Handle the error as needed (e.g., log it, display an error message)
                error_log('Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
                
            }
    
        
    // }


?>