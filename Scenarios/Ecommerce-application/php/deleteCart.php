<?php

require_once "config.php";

session_start();

$email2 = $_SESSION["email"];
if (isset($_POST["delete"])) {
    
    
$sql = "DELETE FROM cart WHERE mail= '$email2' ";

    // $result = mysqli_query($conn, $sql);
    if($conn->query($sql))
    {
        header("location:ProductList.php");
    }


    $conn->close();
}
?>