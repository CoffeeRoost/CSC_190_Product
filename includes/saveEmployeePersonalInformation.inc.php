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
$empfname = $_POST['empfname'];
$emplname = $_POST['emplname'];
$empMI = $_POST['empMI'];
$email= $_POST['email'];
$empDOB=$_POST['empDOB'];
$empStreet=$_POST['empStreet'];
$empCity=$_POST['empCity'];
$empState=$_POST['empState'];
$empZipcode=$_POST['empZipcode'];
$empPhone= $_POST['empPhone'];
$empGender= $_POST['empGender'];
$empRaces= $_POST['empRaces'];
$employeeRole=$_POST['employeeRole'];
$userPassword=$_POST['userPassword'];
$programMember=$_POST['programMember'];

// Update the database with the new personal information
$sql = "UPDATE employee 
    SET empfname = ?,
        emplname = ?,
        empMI = ?,
        email = ?,
        empDOB = ?,
        empStreet = ?,
        empCity = ?,
        empState = ?,
        empZipcode = ?,
        empPhone = ?,
        empGender = ?,
        empRaces = ?,
        employeeRole = ?,
        userPassword = ?,
        programMember = ?
    WHERE employeeID = ?";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("sssssssssssssssi" ,$empfname, $emplname, $empMI, $email, $empDOB, $empStreet, $empCity, $empState, $empZipcode, $empPhone, 
                              $empGender, $empRaces, $employeeRole, $userPassword, $programMember, $employeeID);
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
