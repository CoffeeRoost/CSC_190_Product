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
$empDOB=$_POST['empDOB'];
$empGender= $_POST['empGender'];
$empRaces= $_POST['empRaces'];


// Update the database with the new personal information
$sql = "UPDATE EMPLOYEE
    SET empfname = ?,
        emplname = ?,
        empMI = ?,
        empDOB = ?,
        empGender = ?,
        empRaces = ?

    WHERE employeeID = ?";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("ssssssi" ,$empfname, $emplname, $empMI, $empDOB,
                              $empGender, $empRaces, $employeeID);
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
