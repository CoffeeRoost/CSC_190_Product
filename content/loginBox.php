

<div class="d-flex justify-content-center my-5">
  <div class="boxContent my-1">

  <?php if ($errorMessage) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $errorMessage; ?>
      </div>
    <?php } ?>
    
    <h1 class="text-center fw-bold my-5">Login</h1>
    <div class="fw-bold">
      <form class="mx-5 mb-5" action="includes/login.inc.php" method="post">
        <label class="form-label" for="email">Email</label><br>
        <input class="form-control" type="email" name="email"><br>
        <label class="form-label" for="password">Password</label><br>
        <input class="form-control" type="password" name="password"><br>
        <input type="checkbox" name="rememberMe" id="rememberMe">
        <label class="form-label" for="rememberMe">Remember me</label><br><br>
        <button type="submit" class="btn btn-primary" name="login-submit">Login</button><br>
        <a class="text-decoration-none text-Blue" style="margin-left: 135px ;" href="./forgotPass.php">Forgot Password</a>
      </form>
      
      <p class="text-center">Don't have an account?<span><a class="text-decoration-none text-Blue fs-4" href="./survey.php"> Start Here </a></span></p>
    </div>
  </div>
</div>
<?php
        if(isset($_GET["emailSent"])){
            if($_GET["emailSent"] == true){
                echo '<script>alert("Email Sent! Please check your inbox for instructions on how to reset your password.")</script>';
            }
        }
        if(isset($_GET["newpass"])){
          if($_GET["newpass"] = "passwordupdated"){
              echo '<script>alert("Password Reset successful!.")</script>';
          }
      }
    ?>