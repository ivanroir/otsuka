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

    $sqlSelect = "SELECT * FROM registration WHERE fname = '" . $_POST["fname"] . "' AND specialist = '" . $_POST["specialist"] . "' AND clinic = '" . $_POST["clinic"] . "' AND email = '" . $_POST["email"] . "'";
    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0) {
        echo "exist";
        $sqlCheck = mysqli_query($conn, $sqlSelect) or die("Check query failed");
        $existingInfo = mysqli_fetch_assoc($sqlCheck);
        $mucosta = $existingInfo["mucosta"];
        $gfo = $existingInfo["gfo"];
        $bfluid = $existingInfo["bfluid"];
        $hinex = $existingInfo["hinex"];
        $neomune = $existingInfo["neomune"];
        $aminoleban = $existingInfo["aminoleban"];

        echo "\t" . $mucosta . "\t" . $gfo . "\t" . $bfluid. "\t" . $hinex . "\t" . $neomune . "\t" . $aminoleban;
    } else {
        echo "creating user\t";
        $sqlInsert = "INSERT INTO registration (fname, specialist, clinic, email, creation_date) 
        VALUES ('" . $_POST["fname"] . "', '" . $_POST["specialist"] . "', '" . $_POST["clinic"] . "', '" . $_POST["email"] . "', '" . $_POST["creationDate"] . "')";
        if ($conn->query($sqlInsert) === TRUE) {
            echo "success";            
        } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
?>