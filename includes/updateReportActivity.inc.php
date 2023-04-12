<?php
session_start();

// Include database connection
require_once 'dbh.inc.php';

// Start session and check if user is logged in
if (!isset($_SESSION['employeeID'])) {
    // If error, force a logout
    session_unset();
    session_destroy();
    // Redirect user to login page if not logged in
    header("Location:../LoginAd.php");
    exit();
}


// Get the form data
$activityCode = $_POST['activityCode'];
$trainingProgram = $_POST['trainingProgram'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$minutes = $_POST['minutes'];
$notes = $_POST['notes'];
$employeeID = $_SESSION['employeeID'];


// Update the database with the new personal information
$updateQuery = "UPDATE participationReportActivity
                SET activityCode=?, trainingProgram=?, startDate=?, endDate=?, minutes=?, notes=?
                WHERE employeeID=?";

$stmt = $conn->prepare($updateQuery);
if ($stmt) {
    $stmt->bind_param("ssssisi", $activityCode, $trainingProgram, $startDate, $endDate, $minutes, $notes, $employeeID);
    $stmt->execute();
    header("Location: ../employeeDash.php?saveUpdatingRecord=success");



    exit();
} else {
    echo "Error updating record: " . $conn->error;
    header("Location: ../employeeDash.php?ErrorUpdatingRecord=fail");


    exit();
}

$conn->close();
?>
