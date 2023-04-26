<?php

session_start();
if (!isset($_SESSION['adminLogin'])){
     //if error, force a logout
    session_unset();
    session_destroy();
    header ("Location: ../LoginAd.php");
    exit();
}

require 'dbh.inc.php';

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
// Check if the delete button was clicked
if(isset($_POST['delete'])) {
  // Get the shared grant ID from the form
  $sharedGrantID = $_POST['sharedGrantID'];
  echo "sharedGrantID: " . $sharedGrantID; // Debugging statement

  // Prepare a DELETE statement
  $sql = "DELETE FROM GRANT_MAIN WHERE shared_grant_ID=?";

  // Bind the parameters and execute the statement
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
      // Handle any errors with the query
      header("Location: ../grantReportView.php?error=sqlerror");
      exit();
  }
  else {
      mysqli_stmt_bind_param($stmt, "i", $sharedGrantID);
      mysqli_stmt_execute($stmt);

      // Redirect back to the grant activity view page with a success message
      header("Location: ../grantReportView.php?delete=success");
      exit();
  }

  // Close the statement and connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the delete button was not clicked, redirect back to the grant activity view page
  header("Location: ../grantReportView.php?error=issetondelete");
  exit();
}
