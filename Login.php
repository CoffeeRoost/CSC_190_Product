<?php
	session_start();
    if(isset($_SESSION['userID'])) {
        // Redirect logged in user to dashboard
        header("Location:participantDash1-2.php");
        exit();
    }
	include_once('content/header2.php');
    include_once('content/loginBox.php');
	
?>