 <?php
session_start();
require_once("config.php");

//void comment 
?> 


<!DOCTYPE html>
<html>
<head>
    <!-- inbuilt css files  -->
    <link rel="stylesheet" href="../css/pmt.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- Javascript link -->
    <script src="../js/PostAD.js">
    </script>
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.html"><img class="logoicon" src="../images/logo_png.png"></a>
            <div class="nav-links" id="nav_links">
                <ul>
                <li><a href="../php/homepage.php">HOME</a></li>
                    <li><a href="../html/Team.html">ABOUT</a></li>
                    <li><a href="../php/ProductList.php">SHOP</a></li>
                    <li><a href="../html/feedback.html">HELP</a></li>
                    <li><a href="../php/dashboard.php">ACCOUNT</a></li>
                </ul>
              </nav>  
            </div>
    </section>
              <div class="adTopContainer">
            <div class="adTop_child_left">
                <h1 class="welcomeAD"></h1>
                <h1>ONE STOP FOR ALL YOUR NEEDS 
                </h1>
            </div>
            <div class="adTop_child_right">
                <img class="adimage" src="../images/contactus.png">
            </div>
        </div> 
<div class="pmtform">
    <form class="pmtform1" method="POST" action="../php/pmt.php">
        <center>
                    <H1 class="heading">Payment Gateway</H1>
                    <br><br><br><br><br><br><br>
                    <p>TOTAL <?php
                    global $conn;
                    $email = $_SESSION["email"];
                    
                    echo "<script>alert('$email')</script>";
                    $sql = "SELECT CartFinalPrice FROM cart WHERE mail = '$email'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0)
                    {
                      while($row  = $result->fetch_assoc())
                      {
                          
                          $finalval = $row["CartFinalPrice"];
                          echo number_format($finalval,2);
                      }

                    }
                    else
                    {
                      echo "Error".$conn->error;
                    }
                    ?></p>
                    <label for="category" class="labels">Please select your card type</label><br><br>
                    <select name="category" id="category" class="selection" required>
                        <option id="category">None</option>
                        <option id="category" value="MasterCard">MasterCard</option>
                        <option id="category" value="VISA">VISA</option>
                        <option id="category" value="Amex">American Express</option>
                    </select>

                    <br><br><br><label for="Number" class="labels">Cardholder's Name</label><br>
                    <input name="CardName" type="text" class="formtext" id="CardName" required>
                     <br><br><br>
                    <label for="CardNo" class="labels">Input Card Number</label><br>
                    <input name="CardNo" type="text" class="formtext" id="CardNo">

            
           
                <br><br><br>
                <label for="CVV" class="labels">CVV</label><br>
                <input name="CVV" type="number" class="formtext" id="CVV"><br><br><br>
                <label for="carddate" class="labels">Card expiry date</label><br><br><br>
                <input type="date" class="carddate" name="carddate"><br><br><br><br>

                 <input type="submit" name="pmtbtn" id="pmtbtn" class="submit" value="Pay">
    
                </center>
      </form>
</div>
<!---------------------Footer----------------------->
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
                <span><i class="fas fa-map-pin"></i>&nbsp;   199, La Catalogue, Wakanda, Outerspace.</span>
                <span><i class="fas fa-envelope"></i>&nbsp; la Catalogue@Wakanda.com</span>
                <span><i class="fas fa-phone"></i>&nbsp;  +94 71 2456786</span>
              </div>
              <br>
              <div class="socials">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
              </div>
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
                <li><a href="html\Contact.html">TEAM</a></li>
              </ul>
            </div>
          </div>
  
          <div class="footer-bottom">
            &copy; 2021 La Catalogue, All rights reserved.
          </div>
        </div>
      </footer>
</body>
</html>