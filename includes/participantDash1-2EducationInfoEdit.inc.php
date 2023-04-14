<?php

session_start();
// Include database connection
// Start session and check if user is logged in
if (!isset($_SESSION['userID'])) {
    //if error, force a logout
    session_unset();
    session_destroy();
    //Redirect user to login page if not logged in
    header("Location:../Login.php");
    exit();
}

require_once 'dbh.inc.php';

// Get the updated personal information from the form
$userID=$_SESSION['userID'];

$schoolLevel             =$_POST['schoolLevel'];
$diploma                 =$_POST['diploma'];
$highestSchool           =$_POST['highestSchool'];
$schoolStatus            =$_POST['schoolStatus'];

if(empty($schoolLevel)||empty($diploma)||empty($highestSchool)||empty($schoolStatus))
{
    // check empty fields
    // redirect to participant dashboard page
    header ("Location: ../participantDash1-2.php?error=emptyfields");
    // stop the code to run
    exit();
}

$sql = "UPDATE education edu
        SET edu.highSchoolStatus = ?,
            edu.highSchooolDiplomaOrEquil = ?,
            edu.highestGradeComplete = ?,
            edu.inSchool = ?
        WHERE userID = ?";

// Prepare and bind for 'Education' table
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssssi", $schoolLevel, $diploma, $highestSchool, $schoolStatus, $userID);
    $stmt->execute();
    header("Location: ../participantDash1-2.php?saveUpdatingRecord=success");
    exit();
} else {
    echo "Error updating record: " . $conn->error();
    header("Location: ../participantDash1-2.php?ErrorUpdatingRecord=fail");
    exit();
}
?>
