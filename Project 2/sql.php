<?php

    $servername = "localhost";
    $username = "fedbruno";
    $password = "";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());
    if (mysqli_query($conn,"use Project2") === TRUE) {
        $database_selected = true;
        //echo "Selected Project2 database\n<br>";
    } else {
        echo "something is wrong: ".mysqli_error($conn);
        die;
    }

?>