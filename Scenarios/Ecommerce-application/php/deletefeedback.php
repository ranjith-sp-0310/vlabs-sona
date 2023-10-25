<?php

require_once "config.php";

session_start();

$email2 = $_SESSION["email"];
if (isset($_POST["deletebtn"])) {
    
    
    

    $sql = "DELETE FROM feedback WHERE email= '$email2' ";

    // $result = mysqli_query($conn, $sql);
    if($conn->query($sql))
    {
        echo "<script>alert('Record deleted successfully')</script>";

        header("location:./dashboard.php");

    
    }
    //if ($result) {
    else {
        echo "<script>alert('Error deleting record: " . mysqli_error($conn) . "')</script>";

    }


    $conn->close();
}
