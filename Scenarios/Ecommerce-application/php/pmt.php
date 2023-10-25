<?php 
    require_once 'config.php';
    session_start();

    // if(isset($_POST["pmtbtn"]))
    // {
    //     echo $_SESSION["itemname"];
    // }

    if(isset($_POST["pmtbtn"]))
    {
        $email = $_SESSION["email"];
        $itemName = $_SESSION["CName"];
        $cardno = $_POST["CardNo"];
        $cardname = $_POST["CardName"];
        $pmttype = $_POST["category"];
        $email = $_SESSION['email'];

        $sqlpayment= "UPDATE cart set cardno = '$cardno' , cardname='$cardname', cardtype = '$pmttype' where mail ='$email'";
        if($conn->query($sqlpayment))
        {
            
            echo "<script> alert('Payment Successful')</script>";
            header("Location:../html/Shippingdetails.html"); // Change of directory needed 
            //void comment
        }
        else 
        {
            echo "<script> alert('Payment Failed')</script>.$conn->error";
            //header("Location:./pmtgateway.php");
            
        }
    }
    $conn->close();
    
?>

