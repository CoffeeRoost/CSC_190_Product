
<?php
session_start();

if (isset($_POST['login-submit'])) {
  require 'dbh.inc.php';
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $userpassword = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

  if (empty($email)) {
    $_SESSION['error'] = 'Please enter your email.';
    header("Location: ../Login.php");
    exit();
  } else if(empty($userpassword)){
    $_SESSION['error'] = 'Please enter your password.';
    header("Location: ../Login.php");
    exit();
  } else {
    $sql = "SELECT userID, email, newUserPassword, status FROM PARTICIPATION WHERE email=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      $_SESSION['error'] = 'Internal server error. Please try again later!';
      header("Location: ../Login.php");
      exit();
    } else {
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($row = $result->fetch_assoc()) {
        if ($row['status'] > 0 ) {
          if (password_verify($userpassword, $row['newUserPassword'])) {
            $_SESSION['userID'] = $row['userID'];
            header("Location: ../participantDash1-2.php?login=success");
            exit();
          } else {
            $_SESSION['error'] = 'Incorrect password. Please try again!';
            header("Location: ../Login.php");
            exit();
          }
        } else {
          $_SESSION['error'] = 'Your account is not activated yet. Please check your email to activate your account!';
          header("Location: ../Login.php");
          exit();
        }
      } else {
        $_SESSION['error'] = 'Email address not found. Please try again!';
        header("Location: ../Login.php");
        exit();
      }
    }
    $stmt->close(); // close the prepared statement
  }
  $conn->close(); // close the database connection
} else {
  header("Location: ../Login.php");
  exit();
}
