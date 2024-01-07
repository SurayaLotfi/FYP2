<?php
session_start();
include "connect.php";

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


    $pdf_name = $_FILES['my_pdf']['name'];
    $pdf_size = $_FILES['my_pdf']['size'];
    $tmp_name = $_FILES['my_pdf']['tmp_name'];
    $error = $_FILES['my_pdf']['error'];
    $content_format = "PDF";
    $username = $_SESSION['username'];
    $validity = $_POST['validity'];
    $minimum_time = $_POST['minimum_time'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $status = "Pending";
    $department = $_SESSION['department'];
    $post_to = $_POST['department'];
    $knowledge_id = $_POST['knowledge_id'];
    

    if ($error === 0) {
        if ($pdf_size > 12500000) {
            echo 'Sorry, file is too large';
        } else {
            $pdf_ex = pathinfo($pdf_name, PATHINFO_EXTENSION);
            $pdf_ex_lc = strtolower($pdf_ex);
            $allowed_exs = array("pdf");

            if (in_array($pdf_ex_lc, $allowed_exs)) {
                $new_pdf_name = uniqid("PDF-", true) . '.' . $pdf_ex_lc;

                if (!file_exists('pdf/')) {
                    mkdir('pdf/');
                }

                $pdf_upload_path = 'pdf/' . $new_pdf_name;
                move_uploaded_file($tmp_name, $pdf_upload_path);

                // Use prepared statements to prevent SQL injection
                // Use prepared statements to prevent SQL injection
                $stmt = $db->prepare("UPDATE knowledge_sharing SET username=?, title=?, department=?, post_to=?, content=?, validity=?, minimum_time=?, message=?, format=?, status=?, time_added=CURRENT_TIMESTAMP WHERE knowledge_id = ?");
                $stmt->bind_param("ssssssssssi", $username, $title, $department, $post_to, $new_pdf_name, $validity, $minimum_time, $message, $content_format, $status, $knowledge_id);
                
                if ($stmt->execute()) {
                    echo '<script type="text/javascript">
                            window.location = "tq_ks.php";
                        </script>';
                } else {
                    echo "
                    <script type='text/javascript'>
                    alert( Error: " . $stmt->error . ");
                    window.location = 'knowledge_share.php';
                    </script>";
                    
                   
                }
            } else {
                echo '<script type="text/javascript">
                    alert("Wrong Format");
                    window.location = "knowledge_share.php";
                </script>';
            }
        }
    } else {
        echo '<script type="text/javascript">
                    alert("Please insert a new file");
                    window.location = "knowledge_share.php";
                </script>';
    }

?>