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

$hispanic                       =$_POST['hispanic'];

isset($_POST['americanIndian_alaskanNative']) ? 'Yes' : 'No';
isset($_POST['americanIndian_alaskanNative']) ? 'Yes' : 'No';

isset($_POST['hawaiian_other']) ? 'Yes' : 'No';
isset($_POST['noAnswer']) ? 'Yes' : 'No';

$americanIndian_alaskanNative   =isset($_POST['americanIndian_alaskanNative']) ? 'Yes' : 'No';
$africanAmerican_black          =isset($_POST['africanAmerican_black']) ? 'Yes' : 'No';
$asian                          =isset($_POST['asian']) ? 'Yes' : 'No';
$hawaiian_other                 =isset($_POST['hawaiian_other']) ? 'Yes' : 'No';
$white                          =isset($_POST['whitle']) ? 'Yes' : 'No';
$noAnswer                       =isset($_POST['noAnswer']) ? 'Yes' : 'No';

if($americanIndian_alaskanNative == 'No' && $africanAmerican_black == 'No' && $asian == 'No' && $hawaiian_other == 'No' && $white == "No"){
    $noAnswer = 'Yes';
}
if(empty($africanAmerican_black)){
    $africanAmerican_black = NULL;
}
if(empty($americanIndian_alaskanNative)){
    $americanIndian_alaskanNative = NULL;
}
if(empty($asian)){
    $asian = NULL;
}
if(empty($hawaiian_other)){
    $hawaiian_other = NULL;
}
if(empty($white)){
    $white = NULL;
}

$language                =$_POST['language'];
$proficiency             =$_POST['proficiency'];

if(empty($proficiency)){
    $proficiency = NULL;
}

if(empty($hispanic)||empty($language)||empty($proficiency))
{
    // check empty fields
    // redirect to participant dashboard page
    header ("Location: ../participantDash1-2.php?error=emptyfields");
    // stop the code to run
    exit();
}

$sql = "UPDATE ethnicity eth
        SET eth.hispanicHeritage = ?,
            eth.africanAmercian_black = ?,
            eth.americanIndian_alaskanNative = ?,
            eth.asian = ?,
            eth.hawaiian_other = ?,
            eth.white = ?,
            eth.noAnswer = ?,
            eth.primaryLanguage = ?,
            eth.englishProficiency = ?
        WHERE userID = ?";

// Prepare and bind for 'Ethnicity' table
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssssssssi", $hispanic, $africanAmercian_black, $americanIndian_alaskanNative, $asian, $hawaiian_other, $white, $noAnswer, $language, $proficiency, $userID);
    $stmt->execute();
    header("Location: ../participantDash1-2.php?saveUpdatingRecord=success");
    exit();
} else {
    echo "Error updating record: " . $conn->error();
    header("Location: ../participantDash1-2.php?ErrorUpdatingRecord=fail");
    exit();
}
?>
