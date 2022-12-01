<div class="d-flex justify-content-center my-5">
        <div class="boxContent my-1">
            <h1 class="text-center fw-bold my-5">Admin Login</h1>
            <div class="fw-bold">
                <form class="mx-5 mb-5" action="includes/loginAd.inc.php" method="post">
                <label  class="form-label" for="email">Email</label><br>
                <input class="form-control" name="email" type="email" id="email"><br>
                <label class="form-label" for="password">Password</label><br>
                <input class="form-control" name="password" type="password" id="password"><br>
                <input type="checkbox" name="rememberMe" id="rememberMe">
                <label class="form-label" for="rememberMe">Remember me</label><br><br>
                <button name="login-submit" type="submit" class="btn btn-primary">Login</button><br>
                <a class="text-decoration-none text-Blue" style="margin-left: 135px ;" href="./forgotPass.php">Forgot Password</a>
                </form>  
            </div>
        </div>
    </div>