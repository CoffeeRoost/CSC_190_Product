<?php
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