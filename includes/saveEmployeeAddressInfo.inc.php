<?php

session_start();
// Include database connection
// Start session and check if user is logged in
if (!isset($_SESSION['employeeID'])) {
 //if error, force a logout
 session_unset();
 session_destroy();
//Redirect user to login page if not logged in
header("Location:../LoginAd.php");
exit();
}

require_once 'dbh.inc.php';

// Get the updated personal information from the form
$employeeID=$_SESSION['employeeID'];


$email= $_POST['email'];

$empStreet=$_POST['empStreet'];
$empCity=$_POST['empCity'];
$empState=$_POST['empState'];
$empZipcode=$_POST['empZipcode'];
$empCounty =$_POST['empCounty'];
$empPhone= $_POST['empPhone'];

// Update the database with the new personal information
$sql = "UPDATE EMPLOYEE
    SET email = ?,

        empStreet = ?,
        empCity = ?,
        empState = ?,
        empZipcode = ?,
        empCounty =?,
        empPhone = ?


    WHERE employeeID = ?";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("sssssssi" , $email, $empStreet, $empCity, $empState, $empZipcode, $empCounty,$empPhone, $employeeID);
    $stmt->execute();
    header("Location: ../employeePersonalInformationView.php?saveUpdatingRecord=success");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
    header("Location: ../employeePersonalInformationView.php?ErrorUpdatingRecord=fail");
    exit();
}

$conn->close();
?>
