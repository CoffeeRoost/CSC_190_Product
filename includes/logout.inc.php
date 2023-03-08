<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    header("Location: ../login.php");
  exit();
}

// Check if logout button was clicked
if (isset($_POST['logout'])) {
  // Destroy session and redirect to login page
  session_destroy();
  header("Location: ../login.php");
  exit();
}
?>