<?php
    
    include "dbConn.php";

    function getUser($emailAddress,$conn) {
        $sql = "SELECT * FROM CUSTOMER
            WHERE emailAddress = '$emailAddress';";

        $result = mysqli_query($conn,$sql);
        return $result;  
    }

    // only proceed if we are referred from the signup page
    if (!isset($_POST['signup'])) {
        // user did not arrive at this script from 'signup' so kick them back to the home page
        header("Location: ../index.php");
        exit;
    }

    // retrieve supplied values
    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $surname = $_POST['surname'];
    $houseNumName = $_POST['houseNumName'];
    $addressTwo = $_POST['addressTwo'];
    $townCity = $_POST['townCity'];
    $postCode = $_POST['postCode'];
    $emailAddress = $_POST['emailAddress'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    
    
    // validate form entries
    if (empty($firstName) || empty($surname) || empty($houseNumName) || empty($addressTwo) || empty($townCity) || empty($postCode) || empty($emailAddress) || empty($pwd)) {
        header("Location: ../signup.php?error=emptyfields");
        exit;
    }
    else if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail"); // Is e-mail valid format
        exit;        
    }
    else if ($pwd != $pwd2) {
        header("Location: ../signup.php?error=passwordnotmatch"); // Is e-mail valid format
        exit;  
    }
    else {
        // check if emailAddress supplied is already in the database
        //  $sql = "SELECT * FROM CUSTOMER
                //WHERE emailAddress = '$emailAddress';";
        
        //$result = mysqli_query($conn,$sql);

        $result = getUser($emailAddress,$conn);

        if ( mysqli_num_rows($result) != 0 ) {
            header("Location: ../signup.php?error=existingemail");
            exit;
        }    
    }
    
    // if we got this far then the supplied entries are valid and the user doesn't already exist
    //header("Location: ../index.php?message=registrationSuccess"); // Is e-mail valid format

    $sql = "INSERT INTO CUSTOMER 
            (firstName, secondName, surname, houseNumName, addressTwo, townCity, postCode, emailAddress, pwd) 
            VALUES ('$firstName', '$secondName', '$surname', '$houseNumName', '$addressTwo', '$townCity', '$postCode', '$emailAddress', '$pwd');";
    
    //exit;

    // https://youtu.be/LC9GaXkdxF8?list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&t=2954

    if(mysqli_query($conn,$sql))
    {   
        
        echo "Sucess";
        $userDetails = getUser($emailAddress,$conn);
        $row = mysqli_fetch_assoc($userDetails);
        echo $row['customerID'];

        session_start();

        // store user details in session variables
        $_SESSION['customerID'] = $row['customerID'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['emailAddress'] = $row['emailAddress'];
        // redirect back to home page
        header("Location: ../index.php?registration=success");

    }
    else {
        //header("Location: ../index.php?DoInsertMessage=NewPersonFailure");
        echo "Oh, crap!<br>";
        echo $sql;
    }
    
?>