<?php
session_start();
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <!-- <link
      rel="stylesheet" 
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    /> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>User Page</title>
</head>
<body>

<!--Nav bar-->
    <section class="header">
            <nav>
                <a href="../html/index.html"><img src="../images/logo_png.png"></a>
                <div class="nav-links" id="nav_links">
                    <button class="btn1" onclick="hideMenu()" style="background-color: transparent; border: 0px;"><i class="fa fa-close"></i></button>
                    <ul>
                    <li><a href="../php/homepage.php">HOME</a></li>
                    <li><a href="../html/Team.html">ABOUT</a></li>
                    <li><a href="../php/ProductList.php">SHOP</a></li>
                    <li><a href="../html/feedback.html">HELP</a></li>
                    <li><a href="../php/logout.php">LOGOUT</a><img class="icon" src="../images/logout.svg"></li>
                    </ul>
                </div>
                <button class="btn1" onclick="showMenu()" style="background-color: transparent; border: 0px;"><i class="fa fa-bars"></i></button>
            </nav>
        </section>        
<!--End of Nav bar-->
<div class="page-wrapper">

    <?php
        echo("

            <!--content-->
            <style>
            .dash-container {
                width: 80%;
                margin: auto;
                margin-top: 30px;
                
                
              }
                
              .dash-title {
                font-size: 3rem;
                font-weight: 600;
              }
                
              .greet {
                font-size: 1.5rem;
                display: inline-block;
              }
              .user-icon img{
                  width:150px;

                  display:flex;
              }

              </style>

            <!--content-->
            <center>
            <div class='dash-container'>
                <div class='user-icon'><img src='../images/team/User-Icon.jpg'/></div><br<br><br>
                
                <div class='dash-title'>User Account</div>
                <div class='greet'>Welcome " .$_SESSION["name"]. " !</div>
                
                
            </div>"
        );
        echo "<br>";
        echo ("<div class='dash-container'><div class ='dash-subtitle'><i class='fas fa-map-pin'></i>");

        $email = $_SESSION["email"];
        $sql = "SELECT SAddress,SCity,SDistrict FROM shippingdetails WHERE email= '$email' ";
        $result = mysqli_query($conn,$sql);
        $checkResult = mysqli_num_rows($result)>0;

        if($checkResult){
            while($row = mysqli_fetch_assoc($result)){
                $Address = $row['SAddress'];
                $City = $row['SCity'];
                $District = $row['SDistrict'];

                echo ("&nbsp;&nbsp;".$Address." ".$City.", ".$District."<br>");

            }
        }else{
            echo "No results found";
        }
        echo("</div></div><center>");

        echo ("<center><div class='dash-container'><div class ='dash-subtitle'><i class='fas fa-credit-card'></i>");

        $email = $_SESSION["email"];
        $ba = "SELECT cardname,cardno,cardtype FROM cart WHERE mail='$email'";
        $ko=mysqli_query($conn,$ba);
        $check = mysqli_num_rows($ko)>0;

        if($checkResult){
            while($row = mysqli_fetch_assoc($ko)){
                $cardname = $row['cardname'];
                $cardno = $row['cardno'];
                $cardtype = $row['cardtype'];

                echo ("&nbsp;&nbsp;".$cardname.", ".$cardno.", ".$cardtype."<br>");

            }
        }else{
            echo "No results found";
        }
        echo("</div></div><center>");
        
        

    ?>
    
        <br><br><br><br>   
    
        <div class='heading'>Your Products</div>
        <div class='products-container'>
            <div class='product-card-container'>
                <?php
                    
                        $email = $_SESSION["email"];
                        $sql = "SELECT ItemImgString, ItemName FROM items WHERE email= '$email' ";
                        $result = mysqli_query($conn,$sql);
                        $checkResult = mysqli_num_rows($result)>0;

                        if($checkResult){
                            $a=1;
                            echo "<table><tr>";
                            while($row = mysqli_fetch_assoc($result)){
                                
                                $image = $row['ItemImgString'];
                                $Iname = $row['ItemName'];

                                if($a<mysqli_num_rows($result)){    
                                    echo("<td>
                                    
                                    
                                        
                                            <div class='product-card'>
                                                <div class='card-image' style='background-color: #fff1b3'><a href='ProdPageMain.php?Name=".$Iname."'><img src =".$image." style='width:150px; margin-top:22%; object-fit:contain;'/></a></div>
                                            </div>
                                        
                                    
                                    </td>
                                    ");
                                }else{
                                    echo ("</tr>\n<tr>"."<td>
                                    
                                        
                                            <div class='product-card'>
                                                <div class='card-image' style='background-color: lightcoral'><a href='ProdPageMain.php?Name=".$Iname."'><img src =".$image." style='width:150px'/></a></div>
                                            </div>
                                        
                                    
                                    </td>");

                                }

                            }
                            echo "</table>";
                        
                        }else{
                            echo("
                            <script>alert('Result not found');</script>
                            ");
                        }
                    ?>
            </div>
        </div>
    
    
    <br><br><br><br>
    <div class='heading'>Your feedback</div>
   

    <?php
        $email = $_SESSION["email"];
        $sql = "SELECT comment FROM feedback WHERE email= '$email' ";
        $result = mysqli_query($conn,$sql);
        $checkResult = mysqli_num_rows($result)>0;

        if($checkResult){
            while($row = mysqli_fetch_assoc($result)){
                $comment = $row['comment'];
                

                echo("

                <!--content-->
                <style>

                section {
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    }
                  
                    .box-container {
                    width: 100%;
                    max-width: 80rem;
                    margin: 0 auto;
                    padding: 0 1.5rem;
                    }
                  
                    .heading {
                    font-size: 60px;
                    margin-top: 25px;
                    margin-bottom: 30px;
                    font-weight:bold;
                    
                    }
                  
                    .feedback-card {
                    background-color: rgba(238, 238, 238, 0.884);
                    border-radius: 10px;
                    margin-bottom: 10px;
                    padding: 7px;
                    box-shadow: .5rem 2px .5rem rgb(0, 0, 0, .1);
                    }
                  
                    .quesion-link {
                    font-size: 20px;
                    color: rgb(32, 30, 30);
                    width: 100%;
                    text-decoration: none;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 15px 0;
                    }
                    
                    .delete-button {
                        color: #f00;
                        cursor: pointer;
                        border: none;
                        padding-top:30px;
                        
                    }
                  

                </style>
                    
                <section>
                    <div class='box-container'>
                    
                        <div class='box'>
                            <div class='feedback-card'>
                                <div class='quesion-link'>
                                ".$comment."
                                <i class='fas fa-comments'></i>
                                <div>
                                 <form method = 'POST' action = './deletefeedback.php'>

                                    <input type='submit' name ='deletebtn' class = 'delete-button' value='DELETE'>

                                 </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>");
            }
        
        }else{
            // echo("
            // <script>alert('Result not found');</script>
            // ");
        }

    ?>

</div>
<!--Footer-->
    <footer style="margin-top: 300px">
        <div class="footer">
        <div class="footer-content">
            <div class="footer-section about">
            <div class="img-footer">
                <img src="../images/logo_png.png" />
            </div>
            <br />
            <div class="line">
                <hr>
            </div>
            <div class ="contact">
                <span><i class="fas fa-map-pin"></i>&nbsp;&nbsp;199, LA CATALOGUE, WAKANDA, OUTERSPACE.</span>
                <span><i class="fas fa-envelope"></i>&nbsp; lacatalogue@wakanda.com</span>
                <span><i class="fas fa-phone"></i>&nbsp;  +94 71 2456786</span>
            </div>
            <br>
            </div>
            <div class="footer-section links">
            <h2>Main Menu</h2>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="#">HELP</a></li>
            </ul>
            </div>
            <div class="footer-section team-sec">
            <h2>Discover</h2>
            <ul>
                <li><a href="html\Team.html">TEAM</a></li>
            </ul>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; 2021 La Catalogue, All rights reserved.
        </div>
        </div>
    </footer>

    <script src="../js/dashboard.js"></script>
    </body>
</html>