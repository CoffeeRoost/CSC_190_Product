<?php


//Start session
session_start();
// Include database connection
require_once 'includes/dbh.inc.php';

// Start session and check if user is logged in
if (!isset($_SESSION['employeeID'])) {
    // If error, force a logout
    session_unset();
    session_destroy();
    // Redirect user to Admin login page if not logged in
    header("Location:LoginAd.php");
    exit();
}


require 'includes/dbh.inc.php';

include_once('content/header4.php');
?>

<div class="d-flex">
    <?php
        include_once('content/sideBar1.php');
        include_once('content/employeePersonalInformation.php');
    ?>
</div>