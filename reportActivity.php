<?php
// Check if session exists
if (!isset($_SESSION['userID'])) {
  // Redirect to employeeDash screen
  header('Location: ../login.php');
  exit();
}

// Include header
include_once('content/header4.php');
?>

<div class="d-flex">
    <?php
        include_once('content/sideBar1.php');
        include_once('content/reportActivity.php');             //Frontend View
        include_once('includes/dbh.inc.php');                   //Connect to database
        include_once('includes/reportActivityToDatabase.php'); 
    ?>
</div>