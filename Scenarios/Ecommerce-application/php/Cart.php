<?php
    session_start();

    if(!isset($_SESSION['email'])){

        echo '<script>window.location.href = "../html/login.html";</script>';
    
    }

    include_once "config.php";

    //name variable is passed to the current script via the url
    $name = $_GET['Name']??'';

    //retrieve data from the items table when the person is selectuing the product
    $sqlQuery = "SELECT * FROM items WHERE ItemName = '$name'";

    //put the retrieved data into the cart table
    $cartList = $conn->query($sqlQuery);

    $results = mysqli_num_rows($cartList) > 0;

    if($results)
    {    
        $cartArray = $cartList -> fetch_assoc();
        $cartItem = $cartArray["ItemName"];
        $cartPrice = $cartArray["ItemPrice"];
        $mail = $_SESSION['email'];
        $sqlInsert = "INSERT into cart(CartIN, CartIP, mail) values('$cartItem', '$cartPrice', '$mail')";
        $sqlRun = $conn -> query($sqlInsert);

        $_SESSION['CName'] = $cartItem;
    }
    
    
?>

<?php
//checking wether the product is already in the cart if so display an alert 
    if (isset($_POST["add"])){
        if (isset($_SESSION["MyCart"])){
            $item_array_id = array_column($_SESSION["MyCart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["MyCart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["MyCart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Your Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
               'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["MyCart"][0] = $item_array;
        }
    }

    //if the customer wants to remove an item from the cart
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["MyCart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["MyCart"][$keys]);
                    echo '<script>alert("Your Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/Login.css">
    <link rel="stylesheet" href="../css/Cart.css">
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.html"><img class="logoicon" src="../images/logo_png.png"></a>
            <div class="nav-links" id="nav_links">
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="">ABOUT</a></li>
                    <li><a href="">CAREERS</a></li>
                    <li><a href="">CONTACT US</a></li>
                </ul>
            </div>
        </nav>
    
       
        <div class="grid-container">
            <div class="grid-child-left ">
               
            <h3 class="welcome"><img class="welcome" src="../images/carty.png"></h3>
                
                <?php
                global $email;
                $email = $_SESSION["email"];

               // echo "<script>alert('$email')</script>"; // test alert
                //retrieve data from the cart page to display 
            $query = "SELECT * FROM cart where mail = '$email'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["CartID"]; ?>">

                        <div class="product">
                               
                                <h5 class="text-info"><?php echo $row["CartIN"];?></h5></br>
                                <h5 class="text-qty"><?php echo "Quantity";?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["CartIN"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["CartIP"]; ?>">
                                
                                <input type="submit" name="add" style="margin-top: 5px;" class="submit"
                                       value="Buy now">
                            </div>
                        </form>
                    </div>
                   
                    <?php
                }
            }
        ?>
            </div>
            <!-----------------------------Displaying the shopping cart details-------------------------->
            <div class="grid-child-right">
            <h3 class="title2">Shopping Cart Details</h3>

                <div class="'table">


                    <table class="table1">
                        <thead>
                    <tr>
                        <th >Product</th>
                        <th >Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th >Remove Item</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //if the cart is not empty show the details in a table
                        if(!empty($_SESSION["MyCart"])){
                            $total = 0;
                            foreach ($_SESSION["MyCart"] as $key => $value) {
                                ?>
                                <tr>
                                <td><?php echo $value["item_name"]; ?></td>
                                <td><?php echo $value["item_quantity"]; ?></td>
                                <td><?php echo $value["product_price"]; ?></td>
                                <td> <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                                <td><a name="delete" style ="text-decoration: none;" href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-info">Remove</span></a></td>

                                </tr>
                                <?php
                                //calculating the total amount to be paid when the quantity and items are added
                                $total = $total + ($value["item_quantity"] * $value["product_price"]);
                                
                            }
                                ?>
                                <tr>
                                <td  colspan="2" align = "center">Total payment</td>
                                    <th  align="center">Rs.<?php echo number_format($total, 2);?></th>
                                    <td></td>
                                </tr>
                        </tbody>
                                <?php
                            }
                        ?>
                    </table>
                    
                    <!--Delete the items--->
                    <form method="POST" action="deleteCart.php">
                                <input type="submit" name="delete" style="margin-top:10px; margin-left:70%" class="sub"
                                       value="Delete & add new items">
                    </form>
                    <!--Directing to payment page--->
                    <form method= "POST" action="pmtgateway.php">
                                        <input type="submit" name="proceed" style="margin-top: 5px; margin-left:70%" class="sub" value="Proceed to payment" onclick="updateCart()">
                        
                    </form>
                </div>
               
            </div>
            

                
    
        <?php
        //updating the final price of the cart
            global $total;
            $email = $_SESSION["email"];
            $sqlInsert =   "UPDATE cart SET CartFinalPrice = $total WHERE mail ='$email'";
            $sqlRun = $conn -> query($sqlInsert);

            if($sqlRun)
            {
                echo "<script> alert('Total Passed to cart)</script>";
                
            }
            else
            {
                echo "<script> alert('Total NOT PASSED)</script>";
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







 



 