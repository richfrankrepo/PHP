<?php
    include "dbConn.php";

    if (!isset($_POST['login-submit'])) {
        // user did not arrive at this script from 'login-submit' so kick them back to the home page
        header("Location: ../index.php");
        exit;
    }

            
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * FROM CUSTOMER
            WHERE emailAddress = '$uname'
            AND pwd = '$pwd';";

    $result = mysqli_query($conn,$sql);

    echo $uname;
    
    // check if supplied uname/pwd combo exists in user table
    if ( mysqli_num_rows($result) == 0 ) {
        // username & password combo is invalid so redirect  to index page with error message
        header("Location: ../login.php?error=loginfailed");
        //echo "<br>computer says no!";
    }
    else {
        // username and pwd is valid so create session
        session_start();

        // store user details in session variables
        $row = mysqli_fetch_assoc($result);
        $_SESSION['customerID'] = $row['customerID'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['emailAddress'] = $row['emailAddress'];
        $_SESSION['status'] = $row['status'];
        

        $customerID = $_SESSION['customerID'];
        // get existing (open) cart
        $sql = "SELECT shopCartID FROM `shopping_cart` WHERE customerID = $customerID AND status = 1";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['shopCartID'] = $row['shopCartID'];
        
        
        // redirect back to index page with success message
        header("Location: ../index.php?login=success");
        
    }


  
    
?>