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

$fname	          =$_POST['fname'];
$mname		      =$_POST['mname'];

if(empty($mname)){
    $mname = NULL;
}

$lname            =$_POST['lname'];
$bthday           =$_POST['bthday'];
$gender           =$_POST['gender'];
$otherAns		  =$_POST['otherAns'];


if($gender === 'other'){
    if(empty($otherAns)){
        header("Location: ../participantDash1-2?error=mandatoryGenderDescription");
    }
    $gender = $otherAns;
}

$partner          =$_POST['partner'];
$SSN          	  =$_POST['SSN'];

if(empty($partner)||empty($fname)||empty($lname)||empty($SSN)||empty($bthday)||empty($gender))
{
    // check empty fields
    // redirect to participation dashboard page
    header ("Location: ../participantDash1-2.php?error=emptyfields");
    // //stop the code to run
    exit();
}

$sql = "UPDATE participation p
        SET p.fname = ?,
            p.lname = ?,
            p.MI = ?,
            p.DOB = ?,
            p.gender = ?,
            p.programPartnerReference = ?,
            p.last4SSN = ?
        WHERE userID = ?";

// Prepare and bind for 'Participation' table
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssssssii", $fname, $lname, $mname, $bthday, $gender, $partner, $SSN, $userID);
    $stmt->execute();
    header("Location: ../participantDash1-2.php?saveUpdatingRecord=success");
    exit();
} else {
    echo "Error updating record: " . $conn->error();
    header("Location: ../participantDash1-2.php?ErrorUpdatingRecord=fail");
    exit();
}
?>
