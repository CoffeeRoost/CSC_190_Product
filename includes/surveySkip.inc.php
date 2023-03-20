<?php
require 'dbh.inc.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO participation (email, fname, newUserPassword, status) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $email, $fname, $hashed_password, $status);

// Set variables with values from form submission
$email = $_POST["email"];
$fname = $_POST["fname"];
$password = $_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$status = 1;
// Execute the statement and check for errors
if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
