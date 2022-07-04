<?php

    /* if (!isset($_POST['logout-submit'])) {
        // user did not arrive at this script from 'logout-submit' so kick them back to the home page
        header("Location: ../index.php");
        exit;
    } */
    // desstroy session variables to end login session
    session_start();
    session_unset();
    session_destroy();
    
    // redirect back to main page
    header("Location: ../index.php?");
?>