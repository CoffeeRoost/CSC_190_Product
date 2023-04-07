<div class="d-flex justify-content-center my-5">
        <div class="boxContent my-1">
            <h1 class="text-center fw-bold my-5">Admin Login</h1>
            <div class="fw-bold">
                <form class="mx-5 mb-5" action="includes/loginAd.inc.php" method="post">
                <label  class="form-label" for="email">Email</label><br>
                <input class="form-control" name="email" type="email" id="email"><br>
                <label class="form-label" for="password">Password</label><br>
                <input class="form-control" name="password" type="password" id="password"><br>
                <label  class="form-label" for="select user type">Select User Type</label><br>
                <select class="form-select mb-5"
                aria-label="Default select example" name="role">
                <option selected value="Employee">Employee</option>
                <option selected value="Admin">Admin</option>
                </select>
                <input type="checkbox" name="rememberMe" id="rememberMe">
                <label class="form-label" for="rememberMe">Remember me</label><br><br>
                <button name="login-submit" type="submit" class="btn btn-primary">Login</button><br>
                <a class="text-decoration-none text-Blue" style="margin-left: 135px ;" href="./forgotPassAd.php">Forgot Password</a>
                </form>  
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