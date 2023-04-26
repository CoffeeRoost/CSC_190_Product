<?php
    session_start();
    if (!isset($_SESSION['adminLogin'])){
            //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ./Login.php");
            exit();
    }

    include_once('content/header4.php');

?>

<div class="d-flex">
    <?php
        include_once('content/sideBar1-1&1-2.php');
        include_once('content/clientSearchResultFE.php');
    ?>
</div>