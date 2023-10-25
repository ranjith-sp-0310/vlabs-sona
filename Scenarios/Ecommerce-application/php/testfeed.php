<?php
//Linking the configuration file

require_once 'config.php';

    $firstname =$_POST["firstName"];
    $lastname  =$_POST["lastName"];
    $email =$_POST["email"];
    $message =$_POST["message"];

    $sql = "INSERT INTO feedback(firstName,lastName,email,comment)VALUES('$firstname','$lastname','$email','$message')";
    if($conn->query($sql)){
        echo "Inserted successfully";
    }else{
        echo "Error:".$conn->error;
    }    

    $conn->close();
?>
    

