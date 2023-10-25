<?php

require_once "config.php";
session_start();

$name = $_SESSION["Iname"];

echo $name;

$sql = "DELETE FROM items WHERE ItemName = '$name' ";

    // $result = mysqli_query($conn, $sql);

    if($conn->query($sql))
    {
        header("location: ProductList.php");
    }

    $conn->close();


?>