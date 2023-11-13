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
$subject = "Due is in 2 days";
$message = "You have multiple classes where the due is near. Check your inbox in KMS4MAE to finish the classes before it is due.";

//selecting the content's of this user punya department that is near the due date
//find due dates that are within 2 days from now
$query = "SELECT * FROM class WHERE department = '$department' AND due <= '$due_date_threshold'"; 
$result = mysqli_query($db, $query);

    
if(mysqli_num_rows($result)>0){
   
    while($row = mysqli_fetch_assoc($result)){
        // echo $row['title'];
        // echo $email;

            $mail = new PHPMailer(true);
            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth = true;
            $mail -> Username = 'kms4mabes@gmail.com';
            $mail -> Password = 'pqpr eplz dyzn qffn';
            $mail -> Port = 465;
            $mail -> SMTPSecure = 'ssl';
            $mail -> isHTML(true);
            $mail -> setFrom('kms4mabes@gmail.com');
            $mail -> addAddress($email);
            $mail -> Subject = $subject;
            $mail -> Body = $message;
            $mail -> send();
    
            
            // echo "
            //     <script>
            //     alert('You have emails and notifications!');
               
    
            //     </script>
            // ";
            
        
    }
}else{
    echo "No due dates";
}


?>