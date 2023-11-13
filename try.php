<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <a href="admin/FTP Server/Files/E978TU/E978TU_SAFA_RAMP_INSPECTION.html" target="_blank" >Click</a><br>
	<a href="admin/FTP Server/Files/E978TU/E978TU_SAFA_RAMP_INSPECTION.html" target="_blank" id="startLink">Go to Content</a><br>
	<a href="#" id="stopLink">Done</a><br>


    <?php
		// include "connect.php";

        // $query = "SELECT * from class";
        // $result = mysqli_query($db,$query);
        // //get all wanted data
        // //getting class data
  		
      
        // $folderPath = 'admin/FTP Server/Files'; // Replace with the actual folder path
        // $content = 'E978TU';
        // // Use glob to get a list of files with the .html extension in the folder
        // $folder = $folderPath . '/' . $content;
        // echo $folder;
        // $files = glob($folder . '/*.html');
        // echo "<br>";
        
        // if (!empty($files)) {
        //     $htmlFile = reset($files); // Get the first element of the array

        //     echo '<a href="' . $htmlFile . '" class="btn radius-xl text-uppercase">Go To Content</a>';
        // } else {
        //     echo "No HTML files found in the folder.";
        // }
        // include "phpfiles/functions.php";
        // $contents = getAllContents();
        // echo "<br>";
        // foreach($contents as $rows){
        //     echo $rows['title'] . "<br>";
        //     echo $rows['format'] . "<br>";
        // }

		$start_time = '2023-10-29 10:32:52.000000';
		$end_time = '2023-10-29 10:33:20.00000';



// Convert the timestamps to DateTime objects
$start_timestamp = new DateTime($start_time);
$end_timestamp = new DateTime($end_time);

// Calculate the difference
$time_difference = $start_timestamp->diff($end_timestamp);

// Extract hours, minutes, and seconds
$hours = $time_difference->h;
$minutes = $time_difference->i;
$seconds = $time_difference->s;

// Output the result
echo "Hours: $hours, Minutes: $minutes, Seconds: $seconds";
echo "<br>";
// Original time duration string
$timeString = "2 hour 3 Minutes";

// Use regular expressions to extract the numeric parts and units
$hours = 0;
$minutes = 0;

if (preg_match('/(\d+)\s*hours?/i', $timeString, $hourMatches)) {
    $hours = (int)$hourMatches[1];
}

if (preg_match('/(\d+)\s*minutes?/i', $timeString, $minuteMatches)) {
    $minutes = (int)$minuteMatches[1];
}

// Convert hours and minutes to seconds
$timeInSeconds = ($hours * 3600) + ($minutes * 60);

// Use date to format the time in hours, minutes, and seconds
$hours = floor($timeInSeconds / 3600);
$minutes = floor(($timeInSeconds % 3600) / 60);
$seconds = $timeInSeconds % 60;

// Display the formatted time
echo "Hours: $hours, Minutes: $minutes, Seconds: $seconds";


     
    ?>
    <br>

	

	
	<script>
	$(document).ready(function() {
		$("#startLink").click(function(event) {
	

		// Send an AJAX request to insert the start time
		$.ajax({
			type: "POST",
			url: "phpfiles/insert_start_time.php", // Your server-side script to insert the start time
			data: {
			start_time: new Date().toISOString()
			},
			success: function(response) {
			// Handle the server's response, if needed
			console.log(response);
			}
		});
		});

		$("#stopLink").click(function(event) {
		event.preventDefault();

		// Send an AJAX request to update the existing record with the stop time
		$.ajax({
			type: "POST",
			url: "phpfiles/update_stop_time.php", // Your server-side script to update the stop time
			data: {
			end_time: new Date().toISOString()
			},
			success: function(response) {
			// Handle the server's response, if needed
			console.log(response);
			}
		});
		});
	});
	</script>
									
</body>
</html>