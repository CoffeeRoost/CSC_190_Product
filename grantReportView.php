<?php
 session_start();
 if (!isset($_SESSION['adminLogin'])){
      //if error, force a logout
     session_unset();
     session_destroy();
     header ("Location: ./LoginAd.php");
     exit();
 }

 require 'includes/dbh.inc.php';

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
     header ("Location: ./LoginAd.php");
     exit();
   }
 }

 if (!isset($_SESSION['adminID'])) {
   // adminID not set
   header ("Location: ./LoginAd.php");
   exit();
 }


include_once('content/header4.php');
?>

<div class="d-flex">
    <?php
        include_once('content/sideBar1-1&1-2.php');
        include_once('content/grantReportAdminView.php');
    ?>
</div>