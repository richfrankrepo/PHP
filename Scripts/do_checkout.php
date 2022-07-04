<?php
    session_start();
    include "dbConn.php";

    echo $_SESSION['shopCartID'];

    $shopCartID = $_SESSION['shopCartID'];
    $sql = "UPDATE shopping_cart 
            set status = 2
            WHERE shopCartID = $shopCartID";
    mysqli_query($conn, $sql);

    // set order status = 2 (received)
    unset($_SESSION['shopCartID']);
    header("Location: ../basket.php?status=success");
?>