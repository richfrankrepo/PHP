<?php
    require "Header.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Pizzas - Login</title>
</head>
<body>
    <div class=loginHeader>
        <img src="images/secure.png" style="width:5%;height:5%">Sign In
</div>
<br><br><br><hr>
    <div class=loginForm>
        <?php
            if(isset($_GET['warning'])) {
                if ($_GET['warning'] == "addcartlogin") {
                    echo "<br>Please log in before adding items to your cart.<br><br>";
                }
            }
            echo "<div><form action=\"Scripts/dologin.php\" method=\"POST\"><label for=\"uname\">Email Address:</label><br><input type=\"text\" name=\"uname\" placeholder=\"Email Address\"><br><br><label for=\"pwd\">Password:</label><br><input type=\"password\" name=\"pwd\" placeholder=\"Password\"><br><br><button type=\"submit\" name=\"login-submit\">Login</button></form></div>"; 
        ?>
    </div>
</body>
</html>