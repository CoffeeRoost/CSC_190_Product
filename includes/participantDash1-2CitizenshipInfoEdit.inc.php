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

$citizenship	                =$_POST['citizenship'];
$uscisNumber                    =$_POST['uscisNumber'];
$uscisExpired                   =$_POST['uscisExpired'];

if(empty($uscisNumber)){
    $uscisNumber = NULL;
}
if(empty($uscisExpired)){
    $uscisExpired = NULL;
}

if(empty($citizenship))
{
    // check empty fields
    // redirect to participant dashboard page
    header ("Location: ../participantDash1-2.php?error=emptyfields");
    // stop the code to run
    exit();
}

$sql = "UPDATE citizen c
        SET c.usCitizenshipStatus = ?,
            c.alienRegistrationCode = ?,
            c.alienRegistrationCodeEXP = ?
        WHERE userID = ?";

// Prepare and bind for 'Citizen' table
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sisi", $citizenship, $uscisNumber, $uscisExpired, $userID);
    $stmt->execute();
    header("Location: ../participantDash1-2.php?saveUpdatingRecord=success");
    exit();
} else {
    echo "Error updating record: " . $conn->error();
    header("Location: ../participantDash1-2.php?ErrorUpdatingRecord=fail");
    exit();
}
?>
