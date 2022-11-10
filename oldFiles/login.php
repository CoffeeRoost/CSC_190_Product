<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>California Mobility Center</title>
</head>
<body>
    <nav>
        <label class = "logo">
            <a href="index.php"><img src="/image/CMC-logo-horizontal.png" alt="logo" height="75px" width = "400px"/></a>
        </label>
    </nav>

    <div class="boxContent">
        <div class="question">
            <h1><strong>Login</strong></h1>
        </div>
        <div class="login">
            <form action="includes/login.inc.php" method="post">
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="Enter E-mail"><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Enter Password"><br><br>
            <input type="checkbox" name="rememberMe" id="rememberMe">
            <label for="rememberMe">Remember me</label><br><br>
            <!-- add name for login-submit -->
            <button type="submit" class="btn btn-primary" name="login-submit">Login</button><br>
            <a href="forgotPass.php">Forgot Password</a>
            </form>
        </div>
        <div class="account">
            <p>Don't have an account. <span><a href="survey.php">Let Start</a></span></p>
        </div>
    </div>
</body>
</html>