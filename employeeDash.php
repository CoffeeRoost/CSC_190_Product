<?php


    session_start();
    if (!isset($_SESSION['employeeID'])){
         //if error, force a logout
        session_unset();
        session_destroy();
        header ("Location: ./LoginAd.php");
        exit();
    }


require 'includes/dbh.inc.php';

include_once('content/header4.php');
?>

<div class="d-flex">
    <?php
        include_once('content/sideBar1.php');
        include_once('content/content_employee.php');
    ?>
</div>