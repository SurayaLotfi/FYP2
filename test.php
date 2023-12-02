<?php
$url = "http://127.0.0.1:8001/api/query"; // Replace with the actual URL

$data = array("message" => "User input");

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

// Check if the request was successful before decoding the JSON
if ($result === FALSE) {
    die('Error occurred while fetching Gradio data');
}

echo "Response from Gradio Server:\n";
var_dump($result);

$response = json_decode($result, true);

echo "Result from Gradio UI: " . $response["result"];
?>
