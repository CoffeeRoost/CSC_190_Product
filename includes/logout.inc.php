<?php
  // Start session
  session_start();

  //Unset all session varibales
  $_SESSION=array();

  //
  session_unset();

  // Destroy session and redirect to login page
  session_destroy();

  header("Location: ../index.php");
  exit();

?>