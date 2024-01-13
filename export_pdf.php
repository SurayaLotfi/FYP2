<?php
session_start();
$full_name = $_SESSION['full_name'];
$department = $_SESSION['department'];
$username = $_SESSION['username'];
include("connect.php");
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;
extract($_POST);

if(isset($submit)){
    $query = "SELECT * FROM class JOIN content_record ON class.class_id = content_record.content_id 
                WHERE class.department = '$department'
                AND username = '$username'
                AND content_record.status != 'Not yet started'
                AND content_record.status != 'In Progress'
                ORDER BY timestamp DESC";
    $result = mysqli_query($db,$query);
    $html = '';
    $html .= '
    <h2 align="center">Report on Modules taken</h2>
    <p><strong>Employee Name:</strong> ' . $full_name . '</p>
    <p><strong>Department:</strong> ' . $department . '</p>
    <p><strong>Username:</strong> ' . $username . '</p>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">No</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Knowledge Title</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Date taken</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Duration taken to complete</th>    
        </tr>
    ';

    if (mysqli_num_rows($result) > 0) {
        $count = 1;
        $evenRowColor = '#ffffff';
        $oddRowColor = '#f9f9f9';

        foreach ($result as $data) {
            $html .= '
                <tr style="background-color: ' . (($count % 2 == 0) ? $evenRowColor : $oddRowColor) . ';">
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $count . '</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data['title'] . '</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"> 
                        Date: ' . date("d/m/Y", strtotime($data['start_time'])) . '<br>
                        Time: ' . date("H:i:s", strtotime($data['start_time'])) . '
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">' . $data['duration'] . '</td>
                </tr>
            ';
            $count++;
        }
    } else {
        $html .= '
            <tr>
                <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;"> No Data </td>
            </tr>
        ';
    }

    $html .= '</table>';

    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4", "portrait");
    $dompdf->render();
    $dompdf->stream($username . ".pdf");
}
?>
