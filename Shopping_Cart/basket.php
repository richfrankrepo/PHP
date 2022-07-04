<?php
    include_once 'scripts/dbConn.php';
    include "./Scripts/cartFunctions.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/shopping_cart.css"/> 
    <title>CSS Pizzas - Basket</title>
</head>
<header></header>
<body>
    <div style="font: 40px Arial;padding-left:50px;padding-top:50px;"><img src="images/Shopping_Cart_128x128.png">Your Cart</div>
    <br><br>
        <div style="padding-left: 50px">
        <?php

            $totalPrice = 0;
            echo "<hr><table style=\"padding-top: 50px; padding-bottom: 50px; width: 50%;\">";

            // if shopping cart has been initiated, populate table with cart items
            if (isset($_SESSION['shopCartID'])) {
                $shopCartID = $_SESSION['shopCartID'];

                $sql = "SELECT Product.productName, Product.productPrice, shopping_cart_details.prodAddedQty, shopping_cart_details.shopCartID, shopping_cart_details.shopCartDetID 
                FROM PRODUCT 
                Inner JOIN shopping_cart_details 
                ON Product.productID=shopping_cart_details.productID 
                WHERE shopping_cart_details.shopCartID = $shopCartID;";
                $result = mysqli_query($conn,$sql);

                if ( mysqli_num_rows($result) != 0 ) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td><img src=\"images/pizza-logo-small.png\"></td><td>".$row['productName']."</td><td>£".$row['productPrice'].
                            "</td><td><a href=\"./Scripts/do_removeItem.php?id=".$row['shopCartDetID']."\">Remove</a></td></tr>";
                        $totalPrice = $totalPrice + $row['productPrice'];
                    }
                }
            }
            else {
                echo "<tr><td>Thankyou for your custom.</td></tr>";
                echo "<tr><td>Our expert pizza chefs are currently preparing your order, which will be delivered to you shortly.</td>
                <td><img src=\"images/delivery-medium.png\"></td></tr>";
                
            }
            
            echo "</table><hr>";
            echo "<div style=\"display:flex;justify-content: center;font: 25px Arial; padding-top:50px;\">Total (inc VAT) £".$totalPrice;
            if ($totalPrice != 0) {
                echo "<a href=\"./Scripts/do_checkout.php\">Checkout Now</a>";
            }
            echo "</div>";
        ?>
        </div>
    <br><br>
    <a style="font: 25px Arial" href="./index.php">Continue Shopping</a>


 </body>
</html>