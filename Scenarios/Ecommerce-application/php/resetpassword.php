<?php
    require "config.php";
    session_start();

    $resemail = $_POST["email"];
    $newpass = $_POST["Password"];
    $repass = $_POST["respassword"];
    $resetSql = "UPDATE registration set UserPassword = '$newpass' where UserEmail = '$resemail'";

    if($conn->query($resetSql))
    {
        if(isset($repass))
        {
            if($repass == $newpass)
            {
                
               header("Location: ../html/Login.html");
               echo "<script> alert('Reset Successful')</script>";
            }
            else
            {
                echo "<script> alert('Re-entered password does not match with new password')</script>";
                header("Location: ../php/Forgotpassword.php");
    
            }
        }
        

    }
    else
    {
        echo "Error".$conn->error;
    }

    $conn->close();
//void comment
    
