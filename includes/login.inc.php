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
  }else if(empty($password)){
    $_SESSION['error'] = 'Please enter your password.';
    header("Location: ../login.php");
    exit();

  
  } else {
    $sql = "SELECT userID, newUserPassword, email, status FROM PARTICIPATION  WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      $_SESSION['error'] = 'Internal server error. Please try again later.';
      header("Location: ../login.php");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, 's', $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['newUserPassword'])) {
          if ($row['status'] == 0) {
            $_SESSION['error'] = 'Your account is inactive. Please contact support.';
            header("Location: ../login.php");
            exit();
          } else {
            $_SESSION['userID'] = $row['userID'];
            header("Location: ../participantDash1-2.php?login=success");
            exit();
          }
        } else {
          $_SESSION['error'] = 'Incorrect password. Please try again.';
          header("Location: ../login.php");
          exit();
        }
      } else {
        $_SESSION['error'] = 'Email address not found. Please try again.';
        header("Location: ../login.php");
        exit();
      }
    }
    mysqli_stmt_close($stmt); // close the prepared statement
  }
  mysqli_close($conn); // close the database connection
} else {
  header("Location: ../login.php");
  exit();
}
