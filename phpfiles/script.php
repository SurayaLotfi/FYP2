<?php

    require "functions.php";

    if(isset($_POST['format'])){

        $format = $_POST['format'];

        if($format === ""){
            $format = getAllContents();
        }else{
            $format = getContentByFormat($format);
        }

        echo json_encode($format); //to allow javascript to catch the response
    }


?>