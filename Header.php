<?php
    session_start();
    require "./Scripts/cartFunctions.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Pizzas</title>
    <link rel="stylesheet" href="./stylesheets/shopping_cart.css"/>
</head>
<body>
    <header>
            <nav>
            
                <?php
                    echo "<div class=\"flex-container\">";
                    echo "<div class=\"leftContainer\"><img src=\"images/Logo.png\"></div>";
                    echo "<div class=\"middleContainer\">";
                    if (isset($_SESSION['status'])) {
                        if ($_SESSION['status']==9) {
                            echo "<a href=\"admin.php\">Admin</a>";
                        }
                    }
                    echo "</div>";
                    echo "<div class=\"rightContainer\">";
                    if (isset($_SESSION['customerID'])) {

                        echo "<a href=\"scripts/dologout.php\">Sign Out</a>";
                        echo "<a href=\"./basket.php\"><img class=\"basketimg\" src=\"images/Shopping_Cart_128x128.png\"></a>";
                        
                        if (isset($_SESSION['shopCartID'])) {
                            $total = getTotalAmount($_SESSION['shopCartID']);
                            if ($total != 0) {
                                echo "£".$total.".00";
                            }
                        }
//                        if ($_SESSION['status']==9) {
//                            echo "<a href=\"admin.php\">Admin</a>";
//                        }
                    }
                    else {
                        echo "<a href=\"login.php\">Sign In</a><br>";echo "<a href=\"signup.php\">Register</a>";
                    }
                    echo "</div></div>";
                ?>
            </nav>
    </header>
</body>
</html>