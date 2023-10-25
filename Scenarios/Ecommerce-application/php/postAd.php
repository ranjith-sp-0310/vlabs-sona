<?php
    require_once 'config.php';
    session_start();
    
    if(isset($_POST["submit"]))
    {
        $itemName = $_POST["Brand"];
        $filename = $_FILES["upload"]["name"];
       // $filename3 = $_SESSION["Imgfile"];
        itemAdd();
        fileupload($itemName);
       // readthefile($itemName,$filename3);
                                
        $conn->close();
    }
    $filename3 = $_FILES["upload"]["name"];

    function itemAdd()
    {   global $conn;
        $itemName = $_POST["Brand"];
       // $filename3 = $_SESSION["Imgfile"];
        $itemDescription = $_POST["Description"];
        $itemPrice = $_POST["Price"];
        $email = $_POST["Email"];
        $Contact = $_POST["Number"];
        
        $itemSql = "INSERT INTO items(ItemName,ItemDescription,ItemPrice,Email,Contact_No,ItemImage) values ('$itemName','$itemDescription','$itemPrice','$email','$Contact','Null')";
        if($conn->query($itemSql))
        {

            echo "<script> alert('insertion Succesfull')</script>";
            header("Location:./dashboard.php");

            
           $_SESSION["itemname"] = $itemName;
        }
        else
        {
            echo "<script> alert('insertion Failed')</script>".$conn->error;
        }
    }
    
    function fileupload($itemName)
    {
        global $conn;

        if(isset($_POST["submit"]))
        {
            $filename = $_FILES["upload"]["name"];

            //select file type
            $imgType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

            //valid file extension
            $acceptedExt = array("jpg","jpeg","png");

            //checking if the extensions are right 
            if(in_array($imgType,$acceptedExt))
            {
                $fileDestination = '../uploads/'.$filename;
                //Upload files and store in database
                if(move_uploaded_file($_FILES["upload"]["tmp_name"],$fileDestination))
                {
                    //Update database with images 
                    $imgsql = " UPDATE items set ItemImgString = '$fileDestination' where itemName = '$itemName'" ;
                    if($conn->query($imgsql))
                    {
                        $_SESSION["Imgfile"] = $filename;
                        echo "Data Inserted Succesfully";
                        
                    }
                    else
                    {
                        echo "Error: ".$conn->error;
                    }
                }
                else
                {
                    echo "Error: ".mysqli_error($conn);
                }
            }
        }
    }
    
// function readthefile($itemName,$filename3)
// {
//     global $conn;
//     $sql = "select itemID,ItemImage from items where itemName = '$itemName'";
//      $result = $conn->query($sql);


    
//     if($result->num_rows > 0)
//     {
//         //read data
//         while($row=$result->fetch_assoc())
//         {
//            echo $row["ItemImage"]."   ";
//            echo "<img src='../uploads/".$filename3."'/>";

//            echo "<br><img src='data:image/jpeg;base64,".base64_encode($row["ItemImage"])."'/>";   
//         } 
//     }
//     else
//     {
//         echo "no Results";
//     }
        
// }
?>
