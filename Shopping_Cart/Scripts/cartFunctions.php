<?php

    function getTotalAmount($shopCartID) {
        // get total cost of items currently in shopping cart 
        include "dbConn.php";

        $totalAmount = 0;
        $sql = "SELECT SUM(productPrice * prodAddedQty) as cost 
                FROM PRODUCT 
                Inner JOIN shopping_cart_details ON Product.productID=shopping_cart_details.productID WHERE shopping_cart_details.shopCartID = $shopCartID
                GROUP BY shopCartID";

        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) != 0 ) {
            $row = mysqli_fetch_assoc($result);
            $totalAmount = $row['cost'];
        }
        return $totalAmount;  

    }



?>