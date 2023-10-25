

<!DOCTYPE html>
<html>
<head>
  <!-- calling style sheets  -->
    <link rel="stylesheet" href="../css/Login.css"> 
    <script src="../js/resetpw.js">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600&display=swap"
        rel="stylesheet" />
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.html"><img class="logoicon" src="../images/logo_png.png"></a>
            <div class="nav-links" id="nav_links">
                <ul>
                <li><a href="../html/index.html">HOME</a></li>
                    <li><a href="../html/Team.html">ABOUT</a></li>
                    <li><a href="../html/Login.html">SHOP</a></li>
                    <li><a href="../html/feedback.html">HELP</a></li>
                </ul>
            </div>
        </nav>
        <!-- Forgot Password Division -->
        <div class="grid-container">


            <div class="grid-child-left ">
                <p class="Welcome">Reset Password</p>
                <form action="./resetpassword.php" method="POST" id="Form" class="Form-dets">
                    <div class="input_wrapper">
                        <p>Please enter your email</p>
                        <input type="email" id="email" name="email" onkeyup="enablebutton()" placeholder="E-mail Address" required/>
                    </div>
                    <div class="input_wrapper">
                        <p>Enter new password</p>
                        <input type="password" id="password" name="Password" placeholder="Password" required>
                    </div>
                    <div class="input_wrapper">
                    <p>Re-enter the new password</p>
                    <!-- <input type="password" id="respassword" name="resPassword" placeholder="Password" required/>  -->
                    <input type="password" id="respassword" name="respassword" placeholder="Re-enter Password" required>
                    </div>
                    <div class="logins">
                        <input class="LoginCheck" type="checkbox" id ="checkbox" required>Accept La catalogue <a href="../html/terms.html">terms and conditions</a><br><br>
                        <input type="submit" class="mysub" name="login" id="login" value="Reset Password" onclick="Checkpasswordreset()" disabled ="disabled"><br/><br/>
                    </div>
                    
                </form>

            </div>
            <div class="grid-child-right">
                <p class="alternate">Create an Account<br></p>
                <p id="alternate1">Create an Account and you will be able to<br></p>
                <ul class="exclusives">
                    <li class="exclusives">Start Posting your own Ads</li>
                    <li class="exclusives">Purchase Items easily</li>
                    <li class="exclusives">View and manage ADs at your convenience</li>
                </ul>
                <div class="createRoute">
                    <a href="./Register.html"><input type="submit" class="Register"  value="Register" ></a><br/><br/>
                </div>
            </div>
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
                <span><i class="fas fa-map-pin"></i>&nbsp;   199, La Catalogue, Wakanda, Outerspace.</span>
                <span><i class="fas fa-envelope"></i>&nbsp; la Catalogue@Wakanda.com</span>
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
                <li><a href="html\Contact.html">TEAM</a></li>
              </ul>
            </div>
          </div>
  
          <div class="footer-bottom">
            &copy; 2021 La Catalogue, All rights reserved.
          </div>
        </div>
      </footer>
        </section>
</body>
</html>