<?php
    session_start();
    $_SESSION['userID'] = 7;
    $_SESSION['employeeID'] = 2;
    $_SESSION['email'] = "gabcocke@gmail.com";
?>
<!DOCTYPE html>
<html lang="en">
<body>
<div class="d-flex justify-content-center my-5">
        <div class="boxContent my-1">
            <h1 class="text-center fw-bold my-5">Grant Test</h1>
            <div class="fw-bold">
                <form class="mx-5 mb-5" action="includes/grant.inc.php" method="post">
                <label  class="form-label" for="gname">Grant Name</label><br>
                <input class="form-control" type="text" name="grant_name" id="grant_name"><br>
                <label class="form-label" for="grantID">Grant ID</label><br>
                <input class="form-control" type="text" name="grantID" id="grantID"><br>
                <label class="form-label" for="startDate">Start Date</label><br>
                <input class="form-control" type="date" name="startDate" id="startDate"><br>
                <label class="form-label" for="endDate">End Date</label><br>
                <input class="form-control" type="date" name="endDate" id="endDate"><br>
                <label  class="form-label" for="supporting_organization">Supporting Organization</label><br>
                <input class="form-control" type="text" id="supporting_organization" name="supporting_organization"><br>
                <label class="form-label" for="personal_contact">Personal Contact</label><br>
                <input class="form-control" type="text" name="personal_contact" id="personal_contact"><br>
                <input type="checkbox" name="rememberMe" id="rememberMe">
                <label class="form-label" for="rememberMe">Remember me</label><br><br>
                <button type="submit" class="btn btn-primary" name="grant-initial-submit" id>Login</button><br>
                <a class="text-decoration-none text-Blue" style="margin-left: 135px ;" href="./forgotPass.php">Forgot Password</a>
                </form>
                <p class="text-center">Don't have an account?<span><a class="text-decoration-none text-Blue fs-4" href="./survey.php"> Start Here </a></span></p>
            </div>
        </div>
</div>
</body>