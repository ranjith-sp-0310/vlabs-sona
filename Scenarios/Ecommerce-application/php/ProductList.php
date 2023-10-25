<?php
session_start();
include_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/prodList.css">
    <title>Product List</title>
</head>
<body>
    <!--Nav bar-->
    <section class="header">
            <nav>
                <a href="../html/index.html"><img src="../images/logo_png.png"></a>
                <div class="nav-links" id="nav_links">
                    <button class="btn1" onclick="hideMenu()" style="background-color: transparent; border: 0px;"><i class="fa fa-close"></i></button>
                    <ul>
                        <li><a href="../html/index.html">HOME</a></li>
                        <li><a href="../html/Team.html">ABOUT</a></li>
                        <li><a href="../php/ProductList.php">SHOP</a></li>
                        <li><a href="../html/feedback.html">HELP</a></li>
                    </ul>
                </div>
                <button class="btn1" onclick="showMenu()" style="background-color: transparent; border: 0px;"><i class="fa fa-bars"></i></button>
            </nav>
    </section>        
    <!--End of Nav bar-->

        <section class="product-list">
            <!-- Name can be shown within product page -->

            <h1 style="align-contents: center;"><?php
            
                if(isset($_SESSION['name'])){

                    $name = $_SESSION['name']??'';
                    
                    echo "Products for ". $name;
                
                }
                ?>
                </h1>

                <br><br><br>

            <?php
                
                $sql = "SELECT * FROM items";
                $itemlist = $conn->query($sql);
                $itemarray = $itemlist -> fetch_assoc();

                    $_SESSION["Iname"] = $itemarray["ItemName"];
                    $_SESSION["Iprice"] = $itemarray["ItemPrice"];
                    $_SESSION["IMG"] = $itemarray["ItemImgString"];
                    $_SESSION["Idesc"] = $itemarray["ItemDescription"];

            ?>


            
            <div class="product-container">

                <!-- Product 1 -->
                <div class="card">
                    <div class="title">iPhone 13</div>
                    <div class="image">
                        <img src="../images/productpage/iphone/apple-iphone-13-3.png" alt="">
                    </div>
                    <h3>Rs. 300,000</h3>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, libero!</div>
                    <button class="buy-button">
                        <a href="../php/ProdPageMain.php?Name=<?php echo $_SESSION['Iname']?>">Buy Now</a>
                    </button>
                    </div>
                

                <!-- Product 2 -->
                <div class="card">
                    <div class="title">Alienware X17</div>
                    <div class="image">
                        <img src="../images/productpage/laptop.png" alt="">
                    </div>
                    <h3>Rs. 400,000</h3>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, excepturi?</div>
                    <button class="buy-button">
                        <a href="../php/ProdPageMain.php? Name=Alienware X17">Buy Now</a>
                    </button>
                </div>
                
                <!-- Product 3 -->
                <div class="card">
                    <div class="title">Yamaha Guitar</div>
                    <div class="image">
                        <img src="../images/productpage/yamaha-semi-acoustic-guitar-fx370c.png" alt="">
                    </div>
                    <h3>Rs. 30,000</h3>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, excepturi?</div>
                    <button class="buy-button">
                        <a href="../php/ProdPageMain.php? Name=Guitar">Buy Now</a>
                    </button>
                
                </div>
                <!-- Product 4 -->
                <div class="card">
                    <div class="title">Ponds Face Cream</div>
                    <div class="image">
                        <img src="../images/productpage/ponds.png" alt="">
                    </div>
                    <h3>Rs. 5,000</h3>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, excepturi?</div>
                    <button class="buy-button">
                        <a href="../php/ProdPageMain.php? Name=Ponds Face Cream">Buy Now</a>
                    </button>
                    
                </div>

                <!-- Product 5 -->
                <div class="card">
                    <div class="title">T-Shirt</div>
                    <div class="image">
                        <img src="../images/productpage/tshirt.png" alt="">
                    </div>
                    <h3>Rs. 2,000</h3>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, excepturi?</div>
                    <button class="buy-button">
                        <a href="../php/ProdPageMain.php? Name=T-Shirt">Buy Now</a>
                    </button>
                    
                </div>

                <!-- Product 5 -->
                <div class="card">
                    <div class="title">Samsung Galaxy Watch</div>
                    <div class="image">
                        <img src="../images/productpage/galaxywatch.png" alt="" >
                    </div>
                    <h3>Rs. 40,000</h3>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, excepturi?</div>
                    <button class="buy-button">
                        <a href="../php/ProdPageMain.php? Name=Galaxy Watch">Buy Now</a>
                    </button>
                </div>
            </div>

        </section>
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
    </body>
</html>
