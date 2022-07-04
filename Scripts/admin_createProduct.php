<?php

        // get total cost of items currently in shopping cart 
        include "dbConn.php";

        // only proceed if we are referred from the admin page
        if (!isset($_POST['createProduct'])) {
                header("Location: ../index.php");
                exit;
        }



        $productName=$_POST['productName'];
        $productDesc=$_POST['productDesc'];
        $productPrice=$_POST['productPrice'];

        if (empty($productName) or empty($productDesc) or empty($productPrice)) {
                header("Location: ../admin.php?error=emptyfields");
                exit;
        }

        $sql = "INSERT INTO PRODUCT (productName, productDesc, productPrice, productQty ) 
        VALUES ('$productName', '$productDesc',$productPrice,100)";

        mysqli_query($conn, $sql);

        header("Location: ../admin.php"); 


        




        
?>