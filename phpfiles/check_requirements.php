<?php
include "connect.php";

// Check requirements on the server-side
$content_id = $_POST['content_id'];
$end_time_utc = $_POST['end_time'];

$sql = "SELECT * FROM content_record WHERE content_id = '$content_id'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql = "SELECT * FROM class WHERE class_id = '$content_id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $min_time = $row['minimum_time']; //required minimum time 
    // Convert UTC time to your local time zone (replace 'YourTimeZone' with the desired time zone)
    $local_timezone = new DateTimeZone('Asia/Kuala_Lumpur');
    $end_time = new DateTime($end_time_utc);
    $end_time->setTimezone($local_timezone);
    $end_time = $end_time->format('Y-m-d H:i:s');

    // Retrieve the start time
    $sql = "SELECT * FROM content_record WHERE content_id = '$content_id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $start_time = $row['start_time'];

    // Convert the timestamps to DateTime objects
    $start_timestamp = new DateTime($start_time);
    $end_timestamp = new DateTime($end_time);

    // Calculate the difference
    $time_difference = $start_timestamp->diff($end_timestamp);

    $days = $time_difference->d;
    $hours = $time_difference->h;
    $minutes = $time_difference->i;
    $seconds = $time_difference->s;

    // Output the result
    $duration = "$days days, $hours hours, $minutes minutes"; //actual duration taken by user

    // Function to convert a time string to seconds
    function timeStringToSeconds($timeStr) {
        $days = 0;
        $hours = 0;
        $minutes = 0;

        if (preg_match('/(\d+)\s*day?s?/i', $timeStr, $dayMatches)) {
            $days = (int)$dayMatches[1];
        }

        if (preg_match('/(\d+)\s*hour?s?/i', $timeStr, $hourMatches)) {
            $hours = (int)$hourMatches[1];
        }

        if (preg_match('/(\d+)\s*minute?s?/i', $timeStr, $minuteMatches)) {
            $minutes = (int)$minuteMatches[1];
        }

        return ($days * 86400) + ($hours * 3600) + ($minutes * 60);
    }

    $minimum_time = timeStringToSeconds($min_time);
    $duration = timeStringToSeconds($duration);

    if ($minimum_time > $duration) {
        echo 'You must spend at least ' . $min_time;
    } else {
        echo 'requirement';
    }
} else {
    // Requirements not met, return an appropriate message
    echo 'You have not yet started the class';
}
?>
