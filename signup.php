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
    <link rel="stylesheet" href="css/shopping_cart.css"/> 
    <title>Document</title>
</head>
<body>

    <div class=loginHeader>
        <img src="images/lock-logo.png" style="width:5%;height:5%">Sign In
        <?php
            // if any error messages returned from doregister.php then display on screen
            if(isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo " - Please fill in all the required fields!";
                }
                else if ($_GET['error'] == "existingemail") {
                    echo " - Email address already in use!";
                }
                else if ($_GET['error'] == "invalidemail") {
                    echo " - Email address is not valid!";
                }
                else if ($_GET['error'] == "passwordnotmatch") {
                    echo " - The passwords do not match!";
                }
            }
        ?>
        <br><br>
    </div>
    <hr>
    <div class=loginForm>
    <form action="scripts/doregister.php" method="POST">
        <label for="firstName">First name:</label>
        <input type="text" id="firstName" name="firstName" value="" placeholder="Required"><br><br>
        <label for="secondName">Second name:</label>
        <input type="text" id="secondName" name="secondName" value="" placeholder="Optional"><br>   <br>     
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="" placeholder="Required"><br><br>
        <label for="houseNumName">House number or name:</label>
        <input type="text" id="houseNumName" name="houseNumName" value="" placeholder="Required"><br><br>
        <label for="addressTwo">Street Name:</label>
        <input type="text" id="addressTwo" name="addressTwo" value="" placeholder="Required"><br><br>
        <label for="townCity">Town or city:</label>
        <input type="text" id="townCity" name="townCity" value="" placeholder="Required"><br><br>
        <label for="postCode">Postcode:</label>
        <input type="text" id="postCode" name="postCode" value="" placeholder="Required"><br><br>
        <label for="emailAddress">E-mail:</label>
        <input type="text" id="emailAddress" name="emailAddress" value="" placeholder="Required"><br><br>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <label for="pwd2">Password:</label>
        <input type="password" name="pwd2" placeholder="Re-enter password"><br><br>        
        <button type="submit" name="signup">Sign up</button>
    </form></div>
</body>
</html>