<?php

session_start();  

    if(!isset($_SESSION['email'])){

      echo '<script>window.location.href = "../html/login.html";</script>';
  
  }




  require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <!-- inbuilt css files  -->
    <link rel="stylesheet" href="../css/PostAnAd.css">
    <link rel="stylesheet" href="../css/main.css">
    <!--Add on Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600&display=swap"
      rel="stylesheet"
    />
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
          <!-- <div class="adTopContainer">      // Code out of alignment after Main.css interverntion 
            <div class="adTop_child_left">
                <h1 class="welcomeAD">Welcome,</h1>
                <h1>Let's get your AD POSTED!
                </h1>
            </div>
            <div class="adTop_child_right">
                <img class="adimage" src="../images/contactus.png">
            </div>
        </div> -->
    </section>
    <form method="POST" action="../php/postAd.php" enctype="multipart/form-data">
    <div class="Adform">
      
        <div class="adformLeft">
                <br><br><br><br><br><br><br>
                <label for="category" class="labels">Please select your Category</label>
                <select name="category" id="category" class="selection" required>
                    <option id="category" value="None">None</option>
                    <option id="category" value="None">Electronics</option>
                    <option id="category" value="Yada">Musical Instrument</option>
                    <option id="category" value="Yada">Accessories</option>
                    <option id="category" value="Yada">Home decoration</option>
                </select><br><br><br>

                <!-- <label for="category" class="labels">Please select your stationed District</label>
                <select name="district" id="" class="selection" required>
                    <option id="category" value="None">None</option>
                    <option id="category" value="Yada"></option>
                    <option id="category" value="Yada">Yada</option>
                    <option id="category" value="Yada">Yada</option>
                </select> <br><br><br> -->
                <div class="condition_radio">
                    <label for="condition1" id="radio_condition"  class="labels">Please select the condition</label><br><br>
                    <label for="condition1">Brand New</label>
                    <input name="condition1" type="radio" class="radios" id="radio1"><br>
                    <label for="condition1">Used</label>
                    <input name="condition1" type="radio" class="radios" id="radio2">
                </div><br><br><br>
                
                <label for="Brand" class="labels">Brand</label><br>
                <input name="Brand" type="text" class="Adtexts" id="Brand" required>
                <br><br><br>
                <label for="Model" class="labels">Model(Optional)</label><br>
                <input name="Model" type="text" class="Adtexts" id="Model">
                <br><br><br>
                <label for="Description" class="labels ">Description</label><br>
                <textarea name="Description" rows="8" cols="30" class="text_area" id="Description" required></textarea>
                
        </div>
        <div class="adformRight">
            <br><br><br><br><br><br><br>
            <label for="Price" class="labels">Price</label><br>
            <span class="currencyinput">Rs.<input name="Price" type="text" class="Adtexts" id="Price"></span>
            <br><br>
            <p id="Ad_deets">Contact Details</p><br><br>
            <label for="EMail" class="labels">Contact E-mail</label><br>
            <input name="Email" type="email" class="Adtexts" id="E-Mail"><br><br><br>
            <label for="Number" class="labels">Contact Number</label><br>
            <input name="Number" type="number" class="Adtexts" id="Number"><br><br><br>
            
              <label for="file" class="labels">Add Photos</label><br>
              <input type="file" name="upload" id="image" value="upload Image" style="display: ruby;"><br>

            <input type="submit" name="submit" id="submit" class="submit" value="submit">

        </div>
            
    </div>
  </form>
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