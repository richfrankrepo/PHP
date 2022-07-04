<?php
    require "Header.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<div><form action=\"Scripts/dologin.php\" method=\"POST\"><input type=\"text\" name=\"uname\" placeholder=\"Username\"><input type=\"password\" name=\"pwd\" placeholder=\"Password\"><button type=\"submit\" name=\"login-submit\">Login</button></form></div>"; 
    ?>
</body>
</html>