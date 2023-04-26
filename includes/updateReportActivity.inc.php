<?php
session_start();


// Include database connection
require_once 'dbh.inc.php';

// Check if user is logged in
if (!isset($_SESSION['employeeID'])) {
    // If error, force a logout
    session_unset();
    session_destroy();
    // Redirect user to login page if not logged in
    header("Location:../LoginAd.php");
    exit();
}

$reportActID = $_POST['reportActID'];

// Check if reportActID is empty
if (empty($reportActID)) {
    echo "Error: reportActID is empty.";
    exit();
}

$userID = $_POST['userID'];
// Get the form data
$activityCode = $_POST['activityCode'];
$trainingProgram = $_POST['trainingProgram'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$minutes = $_POST['minutes'];
$notes = $_POST['notes'];


$employeeID = $_SESSION['employeeID'];

// Check if record exists before updating
$checkQuery = "SELECT * FROM participationReportActivity WHERE reportActID=?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("i", $reportActID);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo "Error updating record: Record not found.";
    header("Location: ../employeeDashClientInfoDetailsView.php?userID=".$userID."&ErrorUpdatingRecord=Record not found.");
    exit();
}

$updateQuery = "UPDATE participationReportActivity
                SET activityCode=?, trainingProgram=?, startDate=?, endDate=?, minutes=?, notes=?
                WHERE reportActID=? AND userID=? AND employeeID=?";
$stmt = $conn->prepare($updateQuery);
if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
    exit();
}

if ($stmt) {
    $stmt->bind_param("ssssisiii", $activityCode, $trainingProgram, $startDate, $endDate, $minutes, $notes, $reportActID, $userID, $employeeID);
    if (!$stmt->execute()) {
        echo "Error updating record: " . $stmt->error;
        header("Location: ../employeeDashClientInfoDetailsView.php?userID=" . urlencode($userID) . "&ErrorUpdatingRecord=" . urlencode($stmt->error));

        exit();
    }
    header("Location: ../employeeDashClientInfoDetailsView.php?userID=$userID&saveUpdatingRecord=success&reportActivityID=$reportActID");


    exit();
} else {
    echo "Error updating record: " . $conn->error;
    header("Location: ../employeeDashClientInfoDetailsView.php?userID=$userID&ErrorUpdatingRecord=" . urlencode("Record not found.") . "&reportActID=$reportActID");


    exit();
}

$conn->close();
?>
