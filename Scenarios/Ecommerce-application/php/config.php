<?php

    $servername = "localhost";
    $username = "root";
    $PW = "";
    $DB = "ecom";

    $conn = new mysqli($servername, $username, $PW, $DB);

    //check connection

    if($conn -> connect_error)
    {
        die("Connection Faliure: " . $conn -> connect_error);
    }
    
?>

