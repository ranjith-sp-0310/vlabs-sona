<?php
require_once 'config.php';

    if (isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["Password"];
        $sqlRegistered = "SELECT * FROM registration WHERE UserEmail = '" . $email . "' AND UserPassword = '" . $password . "';";
        $sqlAdmins = "SELECT * FROM admins WHERE AdminEmail = '$email' AND AdminPass = '$password';";

        $ResultRegistered = $conn->query($sqlRegistered);
        $ResultAdmins = $conn->query($sqlAdmins);
        $ResultCheck = ((mysqli_num_rows($ResultRegistered) > 0) || (mysqli_num_rows($ResultAdmins) > 0));
        if ($ResultCheck) 
        {
            if (mysqli_num_rows($ResultRegistered) > 0) 
            {
                session_start();
                $rowRegistered = $ResultRegistered -> fetch_assoc();

                $_SESSION["email"] = $rowRegistered["UserEmail"];
                $_SESSION["UID"] = $rowRegistered["UserID"];
                $_SESSION["name"] = $rowRegistered["UserName"];
                $_SESSION["pass"] = $rowRegistered["UserPassword"];

                header("Location: ../php/homepage.php"); 
            }
           else if(mysqli_num_rows($ResultAdmins) > 0)
            {
                $rowAdmins = $ResultAdmins -> fetch_assoc();
                $_SESSION["AID"] = $rowAdmins["AdminID"];
                $_SESSION["name"] = $rowAdmins["AdminName"];
                header("Location: http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=la+catalogue&table=registration&pos=0"); 
            }
        }
        else
            {
                echo " <script>alert('Invalid User!')</script> ";
                header("Location:../html/login.html?InvalidUser");

            }
    }
    
    $conn -> close();
?>


