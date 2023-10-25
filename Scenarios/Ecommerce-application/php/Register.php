<?php

 include_once 'config.php';
?>

<?php

  $name = $_POST["UserName"];
  $mail = $_POST["UserEmail"];
  $password = $_POST["UserPassword"];

 $sql= "insert into registration(UserName, UserEmail, UserPassword ) values('$name','$mail','$password');";
 echo "we are in step 2";
 if (mysqli_query ($conn,$sql))
 {
	 echo "<script>alert('Records inserted successfully!!')</script>";
	 header("Location:../html/Login.html");
 }
 else{
      //void comment;
	 echo "<script>alert('Error!!')</script>";
 }
 echo "we are in step 3";
mysqli_close($conn);
?>

