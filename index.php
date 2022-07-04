<?php

    include_once 'scripts/dbConn.php';
    require "Header.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Pizzas</title>
</head>
<body>
    <form action="index.php" method="post">
        <br>
        <!-- <label form="ingredent" >Search by ingredient: </label> -->
        <input type="input" id="ingredient" name="ingredient" placeholder="search by ingredient">
        <input type="submit" value="Go" name="searchingingredient">
    </form>

    <table style="padding-top: 50px; width: 75%">
        <?php
            $sql = "SELECT * FROM PRODUCT";

            // if ingredient has been searched for, add to SQL statement
            if(isset($_POST['ingredient'])) {
                $ingredient = $_POST['ingredient'];
                $sql = $sql." Where productDesc LIKE '%$ingredient%'";
            }


            // execute sql query and store results
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td><img src=\"images/pizza-logo-small.png\"></td><td> </td><td>".$row["productName"]."</td><td> </td><td>".$row["productDesc"]."</td><td>£".$row["productPrice"].".00</td>
                <td><a href=\"scripts/do_addItem.php?productID=".$row["productID"]."\">Add to Cart</a></td></tr>";
            };
            
            
        ?>
    </table>
    
</body>
</html>