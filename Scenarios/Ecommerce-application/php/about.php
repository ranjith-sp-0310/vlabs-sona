<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shopping Cart</title>
</head>
<body>
    <img class="logo" src="images/cart.png" width="200px" height="200px">

    <h1 class="center">My Shopping Cart</h1>
    <h2 class="center">The Online Shopping Store</h2>
    <hr id="line">
    
    <ul class="xyz">
        <li class="inline" style="list-style-type: disc;"><a class="nav" href="../html/index.html">Home</a></li>
        <li class="inline" style="list-style-type: disc;"><a class="nav" href=""></a></li>
        <li class="inline" style="list-style-type: disc;"><a class="nav" href="../html/feedback.html">Contact</a></li>
        <li class="inline" style="list-style-type: disc;"><a class="nav" href="../php/about.php">About Us</a></li>
    </ul> 
    <br>

    <?php
        $CompanyName = "Phone Shop";
    ?>
    <h2>
    <?php 
        echo $CompanyName;
        ?>
        </h2>
    <?php
        echo "This page is mainly about ".$CompanyName." website";

        $sold = 75;
        $total = 100;
        echo "<br>";
        echo "The Shopping Cart <br>"
        ."No of Sold Items = " . $sold . "<br>" 
        ."No of Total Items = " . $total . "<br>";

        function findPercentage()
        {
            global $total, $sold, $percentage;

            $percentage = ($sold/$total) * 100;
            return $percentage;
        }

        echo "Total is = " . findPercentage() . "<br>";

        $today = date_create(date("l"));
        $shippedDate = date_create('2019-09-21');

        $today_string = $today ->  format ('d/m/y,');
        
        function dateDifference($differenceFormat = '%a')
            {
                global $today, $shippedDate;

                $difference = date_diff($shippedDate, $today);

                return $difference -> format($differenceFormat);

            }

        function shipped()
        {
            if(dateDifference() > 0)
            {
                return "shipped";
            }
            else
            {
                return "not shipped";
            }
            
        }

        $status = shipped();
        
        
        
        echo "For " . $today_string .  " 24 items has " . $status . ".";

        $phone  = array('iPhone XS' => 27, 'iPhone X' => 30, 'iPhone XS Max' => 12, 'iPhone XR' => 29);

        $len = count($phone);
        $i = 0;

        
        function loopUsingWhile($phone, $i)
        {
            echo "<h2> Output Using While Loop </h2><br>";
            echo "<h2><table border = '2' width = '75%'><tr><th><center>Item Name</center></th><th><center>Number of Items</center></th></tr>";

            $keys = array_keys($phone);

            while($i < count($keys))
            {
                echo "<tr><td><center>". $keys[$i] ."</center></td><td><center>". $phone[$keys[$i]] ."</center></td></tr>";
                $i++;
            }

            echo "</table></h2>";
    
        }

        //loopUsingWhile($phone, $i);

        function loopUsingDoWhile($phone, $i)
        {
            $keys = array_keys($phone);

            echo "<h2>Output using Do-While Loop </h2> <br>";
            echo "<h2><table border = '2' width = '75%'><tr><th><center>Item Name</center></th><th><center>Number Of Items</center></th></tr>";

            do
            {
               echo "<tr><td><center>". $keys[$i] ."</center></td><td><center>". $phone[$keys[$i]] ."</center></td></tr>";
                $i++;
            }
            while(($i < count($keys)));
                
            echo "</table></h2>";
        }

       // loopUsingDoWhile($phone, $i);


        function loopUsingFor($phone, $i)
        {
           echo "<h2>Table Using For Loop</h2>";
           echo "<h2><table border = '2' width = '75%'><tr><th><center>Item Name</center></th><th><center>No Of Items</center></th></tr>";   

            $keys = array_keys($phone);
            
            for($i; $i<count($keys); $i++)
            {
              echo  "<tr><td><center>". $keys[$i] ."</center></td><td><center>". $phone[$keys[$i]] ."</center></td></tr>";
            }

            echo "</table></h2>";
        }

       // loopUsingFor($phone, $i);

        function loopUsingForEach($array)
        {

            echo "<h2>Table Using ForEach Loop</h2>";
            echo "<h2><table border = '2' width = '75%'><tr><th><center>Item Name</center></th><th><center>Number of Items</center></th></tr>";

            foreach($array as $key => $value)
            {
                echo "<tr><td><center>". $key ."</center></td><td><center>". $value ."</center></td></tr> <br>";
            }

            echo "</table></h2>";
        }

        loopUsingForEach($phone);

    ?>

    <footer>
        <p>Created by Minod Perera</p>
        <a href="courseweb.lk">Visit Our Course</a>
    </footer>

</body>
</html>

