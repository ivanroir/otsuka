<?php 
    header("Access-Control-Allow-Origin: *");

    $servername = "localhost";
    $username = "u480472038_otsuka";
    $password = "RNJA@bcpi2021";
    $database = "u480472038_otsuka";

    //$conn = mysqli_connect('localhost', 'root', '', 'otsuka'); //dev
    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sqlUpdate = "UPDATE registration 
    SET neomune = '" . $_POST["neomune"] . "' 
    WHERE fname = '" . $_POST["fname"] . "' AND specialist = '" . $_POST["specialist"] . "' 
    AND clinic = '" . $_POST["clinic"] . "' AND  email = '" . $_POST["email"] . "'";
    
    if ($conn->query($sqlUpdate) === TRUE) {
        echo "Neomune Status";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
?>