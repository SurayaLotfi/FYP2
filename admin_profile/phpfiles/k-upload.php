<?php
session_start();
include "connect.php";

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Upload PDF
if (isset($_POST['shareid'])) {
    $knowledge_id = $_POST['shareid'];
    $title = $_POST['title'];
    $validity = date('Y-m-d', strtotime($_POST['dateValid']));
    $class_id = $_POST['knowledge_id'];
    $department = $_POST['department'];
    $content = $_POST['content'];
    $status = 'Not yet started';
    $minimum_time = $_POST['minimum_time'];
    $username = $_SESSION['username'];
    $format = 'PDF';
    $source = $_POST['creator'];
    $admin_approved = $_POST['admin_approved'];

    //$knowledge_id = 'SK' . $knowledge_id;

    // Insert into database using prepared statements
    $insert = $db->prepare("INSERT INTO class (title, format, validity, class_id, department, content, minimum_time, admin, source) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insert->bind_param("sssssssss", $title, $format, $validity, $class_id, $department, $content, $minimum_time, $username, $source);
    $insert_result = $insert->execute();
    $insert->close();

    if ($insert_result) {
        // Update knowledge_sharing table
        $update_knowledge_table = $db->query("UPDATE knowledge_sharing SET status='Accepted' WHERE knowledge_id = $knowledge_id");

        // Insert in user's record
        $query = "SELECT * FROM users WHERE department = ?";
        $select_users = $db->prepare($query);
        $select_users->bind_param("s", $department);
        $select_users->execute();
        $result = $select_users->get_result();
        $select_users->close();

        while ($row = $result->fetch_assoc()) {
            $username = $row['username'];
            $insert_query = $db->query("INSERT INTO content_record (username, status, content_id) VALUES ('$username', '$status', '$class_id')");
        }

        header("Location: ../add-listing.php?alert=success");
        
    } else {
        echo "Query error: Unable to upload to db because: " . $db->error; // Display the error message
    }
} else {
    echo "Query error: No share id"; // Display the error message
}
?>
