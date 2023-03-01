<?php
session_start();
if (isset($_POST['login-submit'])) {
  require 'dbh.inc.php';
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  if (empty($email) || empty($password)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
  } else {
    $sql = "SELECT userID, newUserPassword, email, status FROM PARTICIPATION  WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, 's', $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['newUserPassword'])) {
          if ($row['status'] == 0) {
            header("Location: ../login.php?error=inactiveAccount");
            exit();
          } else {
            $_SESSION['userID'] = $row['userID'];
            header("Location: ../participantDash1-2.php?login=success");
            exit();
          }
        } else {
          header("Location: ../login.php?error=wrongPassword&email=" . urlencode($email));
          exit();
        }
      } else {
        header("Location: ../login.php?error=nouseremail");
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
