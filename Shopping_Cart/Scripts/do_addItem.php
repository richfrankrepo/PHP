<?php
    session_start();
    include "dbConn.php";
    
    if (!isset($_SESSION['customerID'])) {
            // force user to log in first
        header("Location: ../login.php?warning=addcartlogin");
        exit;
    }
    else if(!isset($_GET['productID'])) {
        // no product id passed so redirect to home page
        header("Location: ../index.php");
        exit;
    }
    

    $productID = $_GET['productID'];
    
    // if new shopping cart, create shpping cart record
    if (!isset($_SESSION['shopCartID'])) {
        
        $customerID = $_SESSION['customerID'];
        $orderDate = date("Y-m-d");
        $orderStatus = 1;
        
        $sql = "INSERT INTO shopping_cart (storeID, customerID, shopping_cart.date, orderStatus ) 
                VALUES (2, '$customerID','$orderDate',1)";

        mysqli_query($conn, $sql);

        //retrieve shopCartID
        $shopCartID = mysqli_insert_id($conn);
        $_SESSION['shopCartID'] = $shopCartID;
    }
    else{
        // retrieve shopping cart ID
        $shopCartID = $_SESSION['shopCartID'];
    }


    // Create shopping_cart_details record
    $sql = "INSERT INTO shopping_cart_details (shopCartID, productID,prodAddedQty ) 
    VALUES ('$shopCartID', '$productID',1)";
    mysqli_query($conn, $sql);
    
    // redirect back to home page
    header("Location: ../index.php");
?>