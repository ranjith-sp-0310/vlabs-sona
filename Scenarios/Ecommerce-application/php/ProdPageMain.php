<?php
    session_start();
    include_once "config.php";

    $Name = $_GET['Name'];

    if(isset($Name))
    {

            $sql = "SELECT * FROM items WHERE ItemName = '$Name'";


            $itemlist = $conn->query($sql);
            $itemarray = $itemlist -> fetch_assoc();

                $_SESSION["Iname"] = $itemarray["ItemName"];
                $_SESSION["Iprice"] = $itemarray["ItemPrice"];
                $_SESSION["IMG"] = $itemarray["ItemImgString"];
                $_SESSION["Idesc"] = $itemarray["ItemDescription"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["Iname"] ?>  - La Catalogue</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/ProductPage.css">
</head>
<body>
    <!-- header -->
    <div class="product-page">
    
    <div class="product-page-navi">
            <nav>
                <a href="index.html"><img src="../images/logo_png.png"></a>

                <!-- <input type="text" placeholder="What Are You Looking For?" id="topnav"> -->



                <div class="nav-links" id="nav_links">
                    <ul>
                    <li><a href="../php/homepage.php">HOME</a></li>
                    <li><a href="../html/Team.html">ABOUT</a></li>
                    <li><a href="../php/ProductList.php">SHOP</a></li>
                    <li><a href="../html/feedback.html">HELP</a></li>
                    <li><a href="../php/dashboard.php">ACCOUNT</a></li>
                    </ul>
                </div>
            </nav>
    </div>
 

    <!-- body -->

            
            <nav>
                <div class="history-links">
                    <ul>
                        <li><a href="../php/homepage.php">Home</a></li>>
                        <li><a href="../php/ProductList.php">Product List</a></li>>
                        <li><a href="../php/ProdPageMain.php?Name=<?php echo $_SESSION['Iname']?>"><?php echo $_SESSION['Iname']?></a></li>
                    </ul>
                </div>
            </nav>
                `

        <div id="content-wrapper">

            <div class="column">
                <img id="featured" src=<?php echo " ".$_SESSION["IMG"] ." " ?>alt="All iPhone Colors" >
                <!-- <div id="slide-wrapper">
                    <img src="../images/product page/arrow.png" class = "arrow" alt="leftarrow" id="slideLeft">
                    <div id="slider">
            
                        <img src="../images/product page/apple-iphone-13-3.png"alt="iPhone 13 Blue" class="thumbnail active">
                        <img src="../images/product page/iphone-13-midnight-select-2021.png" alt="iPhone 13 Midnight" class="thumbnail ">
                        <img src="../images/product page/iphone-13-product-red-select-2021.png" alt="iPhone 13 Product Red" class="thumbnail">
                        <img src="../images/product page/iphone-13-starlight-select-2021.png" alt="iPhone 13 Starlight" class="thumbnail">
                        <img src="../images/product page/iphone-13-blue-select-2021.png"alt="iPhone 13 Blue" class="thumbnail">
                        <img src="../images/product page/iphone-13-pink-select-2021.png"alt="iPhone 13 Pink" class="thumbnail">
                    </div>
                    <img src="../images/product page/right-arrow.png" class = "arrow" alt="rightarrow" id="slideRight">
                </div>
             -->
            </div>
            <div class="column" id="textStuff">
            
            

                    <h1><?php echo " ".$_SESSION["Iname"] ." " ?></h1><br>
                    <h2>Rs. <?php $itemprice = $_SESSION["Iprice"]; echo number_format($itemprice,2);?></h2><br><br>
                    <a href="cart.php?Name=<?php echo $_SESSION['Iname']?>" class='buttons'>Add to Cart</a>

                    <?php

                     $name=$_SESSION['Iname'] ; 

                    if(isset($_SESSION['email']))
                    {
                        echo '<form method="POST" action="deleteProduct.php">

                        <input type="submit" class="buttons" name="delete" value="Delete" style="color: black;">

                        </form>';
                    }

                    

                    ?>
                    <p class="desc">EXTRA 5% OFF ON COMMERCIAL CREDIT CARDS AND DEBIT CARDS</p>
            
            
                    <h3>Color</h3>
                    <div class="checkboxes">
                        <label class="colorpick">Black
                            <input type="radio" name="radio" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                        <label class="colorpick">Red
                            <input type="radio" name="radio" >
                            <span class="checkmark"></span>
                        </label>
                        <label class="colorpick">White
                            <input type="radio" name="radio" >
                            <span class="checkmark"></span>
                        </label>
                        <label class="colorpick">Blue
                            <input type="radio" name="radio" >
                            <span class="checkmark"></span>
                        </label>
                        <label class="colorpick">Pink
                            <input type="radio" name="radio" >
                            <span class="checkmark"></span>
                        </label>
                    </div>
            
                <!-- <section class="sizes">
                </section> -->
                <div id="sub-details">
                    <br><br>
                    <section id="prod">
                        <h3>Product Information</h3>
                        <p id="prodText">
                            <?php echo $_SESSION['Idesc']?>
                        </p>
                    </section>
                    <section id="seller">
                        <h3>Seller Details</h3>
                        <p id="prodText">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, nemo eveniet cum alias facere beatae tenetur dolorum quas consequuntur porro.
                        </p>
                    </section>
                    <section id="warranty">
                        <h3>Warranty</h3>
                        <p id="prodText">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas repellat ad assumenda magnam culpa, natus quia ipsum nisi fugiat laborum modi architecto cumque dolore provident perferendis id, nobis recusandae! Quidem!
                        </p>
                    </section>
                </div>
            </div>
        </div>

        <!--Footer-->
     <footer style="margin-top: 300px">
        <div class="footer">
          <div class="footer-content">
            <div class="footer-section about">
              <div class="img-footer">
                <img src="../images/logo_png.png" style="width: 100px;">
              </div>
              <br />
              <hr />
              <div class ="contact">
                <span><i class="fas fa-map-pin"></i>&nbsp;   199, La Catalogue, Wakanda, Outerspace.</span><br>
                <span><i class="fas fa-envelope"></i>&nbsp; la Catalogue@Wakanda.com</span><br>
                <span><i class="fas fa-phone"></i>&nbsp;  +94 71 2456786</span><br>
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


        
    </div>

    <!-- javascript -->

        <!-- <script type="text/javascript">

            let thumbnails = document.getElementsByClassName('thumbnail')
            let activeImages = document.getElementsByClassName('active')

            for(var i=0; i < thumbnails.length; i++)
            {
                thumbnails[i].addEventListener('click', function()
                {

                    if(activeImages.length > 0)
                    {
                        activeImages[0].classList.remove('active')
                    }

                    this.classList.add('active')
                    document.getElementById('featured').src = this.src
                })
            }


            let buttonRight = document.getElementById('slideRight')
            let buttonLeft = document.getElementById('slideLeft')

            buttonLeft.addEventListener('click', function()
            {
                document.getElementById('slider').scrollLeft -= 180;
            })
            buttonRight.addEventListener('click', function()
            {
                document.getElementById('slider').scrollLeft += 180;
            })
        </script> -->




</body>
</html>