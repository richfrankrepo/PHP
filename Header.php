<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./stylesheets/shopping_cart.css"/>
</head>
<body>
    <header>
            <nav>


                <?php
                    echo "<div class=logInOut>";
                    //if (isset($_GET['error'])) { if ($_GET['error'] == "loginfailed") { echo "Login Failed!"; } }
                    if (isset($_SESSION['customerID'])) {
                        echo "Welcome back ".$_SESSION['firstName']."!   ";
                        //echo "<div class=loggedIn>Welcome back ".$_SESSION['firstName']."<form action=\"scripts/dologout.php\" method=\"POST\"><button type=\"submit\"name=\"logout-submit\">Logout</button></form></div>";
                        echo "<a href=\"scripts/dologout.php\">Sign Out</a>";
                    }
                    else {
                        //echo "<div class=loggedOut>";
                        //echo "<p>You are logged out!</p>";

                        //echo "<form action=\"Scripts/login.php\" method=\"POST\"><input type=\"text\" name=\"uname\" placeholder=\"Username\"><input type=\"password\" name=\"pwd\" placeholder=\"Password\"><button type=\"submit\" name=\"login-submit\">Login</button></form><div>New Customer? <a href=\"signup.php\">Regiser here</a></div>"; 
                        echo "<a href=\"login.php\">Sign In</a><br>";echo "<a href=\"signup.php\">Register</a>";
                    }
                    echo "</div>";
                ?>
            </nav>
    </header>
</body>
</html>