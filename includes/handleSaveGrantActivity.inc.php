<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'dbh.inc.php';
session_start();
if (!isset($_SESSION['adminLogin'])){
     //if error, force a logout
    session_unset();
    session_destroy();
    header ("Location: ../LoginAd.php");
    exit();
}


if (isset($_SESSION['adminLogin'])) {
  $employeeID = $_SESSION['adminLogin'];
  $stmt = $conn->prepare("SELECT adminID FROM ADMIN WHERE employeeID = ?");
  $stmt->bind_param("i", $employeeID);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['adminID'] = $row['adminID'];
  } else {
    // adminID not found in database
    header ("Location: ../LoginAd.php");
    exit();
  }
}

if (!isset($_SESSION['adminID'])) {
  // adminID not set
  header ("Location: ../LoginAd.php");
  exit();
}


if(isset($_POST['save']) && isset($_POST['characteristicGrantID']) && isset($_POST['sharedGrantID'])) {
  // Retrieve the values of the input elements
  $grantName = $_POST['grantName'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];

  $personalContact = $_POST['personalContact'];
  $supportingOrganization = $_POST['supportingOrganization'];
  $charTitle= $_POST['charTitle'];
  $charStatus= $_POST['charStatus'];

  $sharedGrantID = $_POST['sharedGrantID'];
  $characteristicGrantID = $_POST['characteristicGrantID'];

  // Update the values in the GRANT_MAIN table
  $updateGrantMain = "UPDATE GRANT_MAIN SET
    grant_name = ?,
    startDate = ?,
    endDate = ?,
    personal_contact = ?,
    supporting_organization = ?
    WHERE shared_grant_ID = ?";

  $stmtMain = $conn->prepare($updateGrantMain);
  $stmtMain->bind_param("sssisi", $grantName, $startDate, $endDate, $personalContact, $supportingOrganization, $sharedGrantID);
  $mainResult = $stmtMain->execute();

  // Update the values in the GRANT_CHARACTERISTICS table
  $updateGrantChar = "UPDATE GRANT_CHARACTERISTICS SET
    char_title = ?,
    char_status = ?
    WHERE characteristic_grant_ID = ?";

  $stmtChar = $conn->prepare($updateGrantChar);
  $stmtChar->bind_param("ssi", $charTitle, $charStatus, $characteristicGrantID);
  $charResult = $stmtChar->execute();

  // Check if both queries were executed successfully
  if ($mainResult && $charResult) {
    header("Location: ../grantReportView.php?saveUpdatingRecord=success");
  } else {
    header("Location: ../grantReportView.php?ErrorUpdatingRecord=fail");
  }

  $stmtMain->close();
  $stmtChar->close();
  $conn->close();
}

?>