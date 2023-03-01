<?php

	session_start();
    $errorMessage = "";
    if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
    }
    if(isset($_SESSION['userID'])) {
        // Redirect logged in user to dashboard
        header("Location:participantDash1-2.php");
        exit();
    }
	include_once('content/header2.php');
    include_once('content/loginBox.php');

	
?>