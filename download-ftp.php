<?php
$ftp_server = 'localhost';
$ftp_user = 'fyp';
$ftp_pass = 'Norezwannim2110';
$localdirectory = 'admin_profile/FTP-Server/'; // Replace with the local directory where you want to save the files

if (!file_exists($localdirectory)) {
    mkdir($localdirectory);
}

// Connect to the FTP server
$connection = ftp_connect($ftp_server);
if (!$connection) {
    die('Could not connect to the FTP server');
} else {
    echo 'Connected to FTP Server.';
}

// Login to the FTP server
$login = ftp_login($connection, $ftp_user, $ftp_pass);
if (!$login) {
    die('FTP login failed');
}

// Function to recursively download files and directories
function downloadDirectory($connection, $remote_dir, $local_dir) {
    // List files and directories in the remote directory
    $contents = ftp_nlist($connection, $remote_dir);

    foreach ($contents as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        // Check if the item is a directory
        if (ftp_size($connection, $item) == -1) {
            // This is a directory, create a local directory and download its contents
            $sub_dir = $local_dir . basename($item) . '/';
            if (!file_exists($sub_dir)) {
                mkdir($sub_dir);
            }
            downloadDirectory($connection, $remote_dir . '/' . basename($item), $sub_dir);
        } else {
            // This is a file, download it
            $local_file = $local_dir . basename($item);
            if (ftp_get($connection, $local_file, $item, FTP_BINARY)) {
                echo "Downloaded: $item\n";

                // Check if the downloaded file is a PDF
                if (pathinfo($local_file, PATHINFO_EXTENSION) === 'pdf') {
                    // Rename the PDF file to the standard format
                    $new_pdf_name = 'PDF-' . uniqid() . '.pdf';
                    $new_pdf_path = $local_dir . $new_pdf_name;
                    rename($local_file, $new_pdf_path);
                    echo "Renamed PDF to: $new_pdf_name\n";
                }
            } else {
                echo "Failed to download: $item\n";
            }
        }
    }
}

// Function to synchronize files and directories
function synchronizeDirectory($connection, $remote_dir, $local_dir) {
    downloadDirectory($connection, $remote_dir, $local_dir);
}

// Function to delete local files and directories not found on the FTP server
// function deleteLocalFilesNotOnFtp($local_dir, $ftp_files) {
//     $local_files = scandir($local_dir);
//     foreach ($local_files as $local_file) {
//         if ($local_file == '.' || $local_file == '..') {
//             continue;
//         }
//         $local_path = $local_dir . $local_file;
//         if (!in_array($local_file, $ftp_files)) {
//             // File or directory exists locally but not on the FTP server, delete it
//             if (is_dir($local_path)) {
//                 // Recursively delete directories
//                 deleteLocalFilesNotOnFtp($local_path . '/', $ftp_files);
//             } else {
//                 unlink($local_path);
//                 echo "Deleted: $local_path\n";
//             }
//         }
//     }
// }

// Example usage (call this to update the local directory)
synchronizeDirectory($connection, '/FTP Server/Files', $localdirectory);

// Get the list of files and directories on the FTP server
$ftp_files = ftp_nlist($connection, '/FTP Server/Files');

// Delete local files and directories not found on the FTP server
// deleteLocalFilesNotOnFtp($localdirectory, $ftp_files);

// Close the FTP connection when you're done
ftp_close($connection);
?>
