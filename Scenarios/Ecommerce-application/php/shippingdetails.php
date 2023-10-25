<?php
  session_start();
  include_once "config.php";

        $name = $_POST["Name"];
        $phone = $_POST["Phone_number"];
        $address = $_POST["Address"];
        $city = $_POST["City"];
        $District = $_POST["District"];
        $email = $_SESSION['email'];
        
        $shippingSql = "INSERT INTO shippingdetails(SName,SNo,SAddress,SCity,SDistrict, email) values ('$name','$phone','$address','$city','$District', '$email')";

        if($conn->query($shippingSql))
        {
            header("Location: ./dashboard.php?success");
        }
        else
        {
            echo "<script> alert('insertion Failed')</script>".$conn->error;
        }

?>

