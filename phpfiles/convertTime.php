<?php
// Function to convert time duration to seconds
function convertToSeconds($timeString) {
    $timeArray = explode(", ", $timeString);
    $seconds = 0;

    foreach ($timeArray as $value) {
        list($number, $unit) = explode(" ", $value);
        $seconds += convertToSecondsUnit($number, $unit);
    }

    return $seconds;
}

// Function to convert individual time units to seconds
function convertToSecondsUnit($number, $unit) {
    switch ($unit) {
        case 'days':
            return $number * 86400; // 1 day = 24 hours * 60 minutes * 60 seconds
        case 'hours':
            return $number * 3600; // 1 hour = 60 minutes * 60 seconds
        case 'minutes':
            return $number * 60; // 1 minute = 60 seconds
        case 'seconds':
            return $number;
        default:
            return 0;
    }
}


?>