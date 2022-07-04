<?php

        // get total cost of items currently in shopping cart 
        include "dbConn.php";
        session_start();
        
        $shopCartID = $_SESSION['shopCartID'];
        $shopCartDetID = $_GET['id'];


        $sql = "DELETE from `shopping_cart_details` 
                WHERE shopCartID = $shopCartID
                AND shopCartDetID = $shopCartDetID";

        $result = mysqli_query($conn,$sql);

        
        header("Location: ../basket.php");

        
?>