<?php
    session_start();
    if (!isset($_SESSION['userID'])){
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
        include_once('content/sideBar.php');
        include_once('content/clientPersonalViewFE.php');
    ?>
</div>