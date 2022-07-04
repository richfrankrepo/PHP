<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/shopping_cart.css"/> 
    <title>CSS Pizzas - Administrator</title>
</head>
<header></header>
<body>
<?php
    session_start();
    
    // redirect any tricky tricksters back to the index page :-)
    if (!isset($_SESSION['status']) OR  $_SESSION['status'] != 9)
    {
        header("Location: ./index.php");
        exit;
    }

    include_once 'scripts/dbConn.php';
?>
<table style="padding-top: 50px;">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
        </tr>
        <?php
            $sql = "SELECT * FROM PRODUCT";

            // execute sql query and store results
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["productName"]."</td><td>".$row["productDesc"]."</td><td>£".$row["productPrice"].".00</td></td></tr>";
            };
        ?>
    </table>
    <br>
    <br>
    
    <?php
        if(isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo "*** Please complete all requied fields***";
            }
        }
    ?>


    <form action="scripts/admin_createProduct.php" method="POST">
        <label for="productName">Product name:</label>
        <input type="text" id="productName" name="productName" value="" placeholder="Required"><br>
        <label for="productDesc">Product description:</label>
        <input type="text" id="productDesc" name="productDesc" value="" placeholder="Required"><br>    
        <label for="productPrice">Product price:</label>
        <input type="text" id="productPrice" name="productPrice" value="" placeholder="Required"><br>
        <button type="submit" name="createProduct">Create</button>
    </form>

    <br><br><br><br>
    <a href="./index.php">Go to home page</a>
    </body>