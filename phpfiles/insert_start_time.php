<?php
    session_start();
    include "connect.php";

  
    // Get the start time and content_id from the AJAX request
    $start_time_utc = $_POST['start_time'];
    $content_id = $_POST['content_id']; 
    $status = 'In Progress';
    echo "content id:" . $content_id;

    //retrieving data from content table
    $sql = "SELECT * FROM class WHERE class_id = '$content_id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $_SESSION['username'];
    $status = 'In Progress';
    $content_id = $row['class_id'];

    $sql = "SELECT * FROM content_record WHERE content_id = '$content_id' AND username = '$username'";
    $results = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($results);
    $starttime_indb = $row['start_time'];
    echo $starttime_indb;
    //if result correct, means there is a content_id in the db. so dont run it...
    if($starttime_indb != '0000-00-00 00:00:00.000000'){
        echo "Content already started";
    }else{
    
        // Convert UTC time to your local time zone (replace 'YourTimeZone' with the desired time zone)
        $local_timezone = new DateTimeZone('Asia/Kuala_Lumpur');
        $start_time = new DateTime($start_time_utc);
        $start_time->setTimezone($local_timezone);
        $start_time = $start_time->format('Y-m-d H:i:s');
    
        // Perform the database insert (create a new activity)
        $sql = "UPDATE content_record SET start_time = ?, status = ? WHERE content_id = ? AND username = ?";
        $stmt = $db->prepare($sql);
        $stmt-> bind_param("ssss", $start_time, $status, $content_id, $username);
    
        if ($stmt->execute()) {
        echo "success"; // Return the activity ID to the client
        } else {
        echo "Error creating activity: " . $db->error;
        }
     }

?>