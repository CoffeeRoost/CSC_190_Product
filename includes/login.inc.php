<?php
session_start();
if (isset($_POST['login-submit'])) {
  require 'dbh.inc.php';
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
  
  if (empty($email)) {
    $_SESSION['error'] = 'Please enter your email.';
    header("Location: ../login.php");
    exit();
  } else if(empty($password)){
    $_SESSION['error'] = 'Please enter your password.';
    header("Location: ../login.php");
    exit();
  } else {
    $sql = "SELECT userID, email FROM PARTICIPATION WHERE email=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      $_SESSION['error'] = 'Internal server error. Please try again later!';
      header("Location: ../login.php");
      exit();
    } else {
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['newUserPassword'])) {
          $_SESSION['userID'] = $row['userID'];
          header("Location: ../participantDash1-2.php?login=success");
          exit();
        } else {
          $_SESSION['error'] = 'Incorrect password. Please try again!';
          header("Location: ../login.php");
          exit();
        }
      } else {
        $_SESSION['error'] = 'Email address not found. Please try again!';
        header("Location: ../login.php");
        exit();
      }
    }
    $stmt->close(); // close the prepared statement
  }
  $conn->close(); // close the database connection
} else {
  header("Location: ../login.php");
  exit();
}
