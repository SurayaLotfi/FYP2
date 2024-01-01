<?php
	session_start();
	include "connect.php";
   // include "./email.php";

	if($_SESSION['role'] == 'user'){
		
        $id = $_SESSION["id"];
        $full_name = $_SESSION["full_name"];
        $username = $_SESSION["username"];
        $department = $_SESSION["department"];
        $email = $_SESSION["email"];
        $query = "SELECT * from class where user_id = $id";
        $result = mysqli_query($db,$query);
	}else{
		header("Location: logout.php");
	}

// Check if the email has already been sent for the current set of notifications
// if (!isset($_SESSION['email_sent']) || $_SESSION['email_sent'] === false) {
    //Near Deadline
    $due_date_threshold = date('Y-m-d', strtotime('+10 days')); 

    $query_deadline = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
    WHERE class.department = '$department'
    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
    AND username = '$username'
    AND validity <= '$due_date_threshold'
    AND content_record.due = 'false'
    ORDER BY class.id DESC";

    $result_deadline = mysqli_query($db, $query_deadline);
    $total_deadline = mysqli_num_rows($result_deadline);
   
    $notifications['deadline'] = array(
        'icon' => 'fa-calendar',
        'text' => 'You have ' . $total_deadline . '',
        'time' => '02:14'
    );
    
//exceeded knowledge
    $query_exceed = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id
    WHERE class.department = '$department'
    AND (content_record.status = 'In Progress' OR content_record.status = 'Not yet started')
    AND username = '$username'
    AND validity <= '$due_date_threshold'
    AND content_record.due = 'true'
    ORDER BY class.id DESC";

    $result_exceed = mysqli_query($db, $query_exceed);
    $total_exceed = mysqli_num_rows($result_exceed);
    $notifications['exceed'] = array(
        'icon' => 'fa-exclamation',
        'text' => 'You have ' . $total_exceed . '',
        'time' => '7 Min'
    );

//knowledge that is successfully shared
    $query_ks = "SELECT * FROM knowledge_sharing WHERE status = 'Accepted' AND username = '$username' AND viewed = 0";

    $result_ks = mysqli_query($db, $query_ks);
    $total_ks = mysqli_num_rows($result_ks);

    $notifications['accepted'] = array(
        'icon' => 'fa-check',
        'text' => 'You have ' . $total_ks . ' ',
        'time' => '2 May'
    );

//knowledge that is declined
    $query_declined = "SELECT * FROM knowledge_sharing WHERE status = 'Declined' AND username = '$username' AND viewed = 0";
    $result_declined = mysqli_query($db, $query_declined);

    $total_declined = mysqli_num_rows($result_declined);
    $notifications['declined'] = array(
        'icon' => 'fa-times',
        'text' => 'You have ' . $total_declined . '',
        'time' => '14 July'
    );

    $total_inbox = $total_deadline + $total_exceed + $total_ks + $total_declined;
    $new_noti = $total_inbox . ' New Notifications';
    //echo $total_inbox;
    // echo "running";
     // New notification detected, send email
    //  if ($response['new_noti'] > 0) {
    //     include "../emailphp";.
    //  }



    // }
  

    // Combine all notifications in a format suitable for JSON encoding
    $response = array('total_inbox' => $total_inbox, 'notifications' => $notifications, 'new_noti'=> $new_noti);
    echo json_encode($response);
?>

