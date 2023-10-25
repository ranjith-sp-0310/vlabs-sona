<?php
//Linking the configuration file

require_once 'config.php';


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600&display=swap"
        rel="stylesheet"/>

        <link rel="stylesheet" href="../css/feedbackconfig.css"/>
    <title>La Catalogue</title>
    </head>
    <body>
        <?php

        if(isset($_POST['submit'])){
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $message = $_POST["message"];


            $sql = "INSERT INTO feedback(firstName,lastName,email,comment)VALUES('$firstName','$lastName','$email','$message')";
            if($conn->query($sql)){
                echo "";
            }else{
                echo "Error:".$conn->error;
            }    
            
            $feedbackReport = fopen("Feedback-Report.txt","a+") or die("File_Error!");

            $text = $firstName . "\n" . $lastName . "\n" . $email . "\n" . $message ."\n\n";
            
            fwrite($feedbackReport, $text);

            fclose($feedbackReport);
        }else{
            
            echo "we are here";
            
        } 


        ?>

        <div class = "message-div">
            <img src="../images/logo_png.png" style="padding:20px;width: 250px" alt="logo">
            <p>We've recieved your valueble Feedback!</p>
            <p>Thank you</p>
            <a href="../html/feedback.html"><button>Back</button></a>
        </div>
    </body>
</html>