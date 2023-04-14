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

$phone            =$_POST['phone'];
$phoneType        =$_POST['phoneType'];
$alPhone          =$_POST['alPhone'];

if(empty($alPhone)){
    $alPhone = NULL;
}

$email            =$_POST['email'];

if(empty($phone)||empty($phoneType)||empty($email))
{
    // check empty fields
    // redirect to participant dashboard page
    header ("Location: ../participantDash1-2.php?error=emptyfields");
    // stop the code to run
    exit();
}

$sql = "UPDATE participation p
        SET p.email = ?,
            p.primaryPhone = ?,
            p.phoneNumType = ?,
            p.altPhone = ?
        WHERE userID = ?";

// Prepare and bind for 'Participation' table
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssssi", $email, $phone, $phoneType, $alPhone, $userID);
    $stmt->execute();
    header("Location: ../participantDash1-2.php?saveUpdatingRecord=success");
    exit();
} else {
    echo "Error updating record: " . $conn->error();
    header("Location: ../participantDash1-2.php?ErrorUpdatingRecord=fail");
    exit();
}
?>
