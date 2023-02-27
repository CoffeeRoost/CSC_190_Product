<?php
    $servername="localhost";
    $dBUsername="root";
    $dBPassword="";
    $dBName="csc190";

    // Create connection
    $conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>
