<?php
session_start();
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "fyp";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the activity ID and end time from the AJAX request
//$activity_id = $_POST['activity_id'];
$end_time_utc = $_POST['end_time'];
$content_id = $_POST['content_id'];
$username = $_SESSION['username'];
$status = "Completed";

//echo $content_id;
// Convert UTC time to your local time zone (replace 'YourTimeZone' with the desired time zone)
$local_timezone = new DateTimeZone('Asia/Kuala_Lumpur');
$end_time = new DateTime($end_time_utc);
$end_time->setTimezone($local_timezone);
$end_time = $end_time->format('Y-m-d H:i:s');

//retrieve the start time
$sql = "SELECT * FROM content_record WHERE content_id = '$content_id' AND username = '$username'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$start_time = $row['start_time'];

// Convert the timestamps to DateTime objects
$start_timestamp = new DateTime($start_time);
$end_timestamp = new DateTime($end_time);

// Calculate the difference
$time_difference = $start_timestamp->diff($end_timestamp);

// Extract days, hours, minutes, and seconds
$days = $time_difference->d;
$hours = $time_difference->h;
$minutes = $time_difference->i;
$seconds = $time_difference->s;

// Output the result
$duration = "$days days, $hours hours, $minutes minutes, $seconds seconds";

// Perform the database update (update the activity with end time)
$sql = "UPDATE content_record SET end_time = ?, duration = ?, status = ? WHERE content_id = ? AND username = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("sssss", $end_time, $duration, $status, $content_id, $username);

if ($stmt->execute()) {
  echo "Activity updated successfully";
} else {
  echo "Error updating activity: " . $stmt->error;
}

?>