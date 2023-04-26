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

$street           =$_POST['street'];
$city             =$_POST['city'];
$state            =$_POST['state'];
$zip		          =$_POST['zip'];
$county           =$_POST['county'];

$mailStreet	      =$_POST['mailStreet'];
$mailCity		      =$_POST['mailCity'];
$mailState	      =$_POST['mailState'];
$mailZip  	      =$_POST['mailZip'];
$mailCounty  	  =$_POST['mailCounty'];

if(empty($mailStreet)||empty($mailCity)||empty($mailState)||empty($mailZip)||empty($mailCounty)){
    $mailStreet = NULL;
    $$mailCity = NULL;
    $mailState = NULL;
    $mailZip = NULL;
    $mailCounty = NULL;
}

if(empty($street)||empty($city)||empty($state)||empty($zip)||empty($county))
{
    // check empty fields
    // redirect to participant dashboard page
    header ("Location: ../participantDash1-2.php?error=emptyfields");
    // stop the code to run
    exit();
}

$sql = "UPDATE ADDRESS a
        SET a.street = ?,
            a.city = ?,
            a.state = ?,
            a.zipcode = ?,
            a.county = ?,
            a.mailingStreet = ?,
            a.mailingCity = ?,
            a.mailingState = ?,
            a.mailingZipcode = ?,
            a.mailingCounty = ?
        WHERE userID = ?";

// Prepare and bind for 'Address' table
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssissssisi", $street, $city, $state, $zip, $county, $mailStreet, $mailCity, $mailState, $mailZip, $mailCounty, $userID);
    $stmt->execute();
    header("Location: ../participantPersonalInformation.php?saveUpdatingRecord=success");
    exit();
} else {
    echo "Error updating record: " . $conn->error();
    header("Location: ../participantPersonalInformation.php?ErrorUpdatingRecord=fail");
    exit();
}
?>
