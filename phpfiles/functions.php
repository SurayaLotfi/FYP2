<?php

function getAllContents() {
    include "connect.php";
    $contents = array(); // Initialize an empty array

    $query = "SELECT * FROM class";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        while ($row = $result->fetch_assoc()) { //or $row = mysqli_fetch_assoc($query);
            $contents[] = $row;
        }
    } else {
        // Handle the query error, e.g., log an error message or return false
        // You can also add more specific error handling if needed.
        die("Query failed: " . $db->error);
    }

    return $contents;
}


    function getContentByFormat($format){
        include "connect.php";
        $query = $db->query("SELECT * FROM class WHERE format = '$format'");
      

        //loop through the result
        while($row = $query->fetch_assoc()){
            $contents[] = $row;
        }

        return $contents;

    }

?>