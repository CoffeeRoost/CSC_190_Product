<div class="d-flex justify-content-center my-5">
        <div class="boxContent my-1">
            <div class="fw-bold">
                <br><br><br>
                <form class="mx-5 mb-5" action="includes/forgotPass.inc.php" method="post">
                <label class="form-label" for="email">Enter your email</label><br>
                <input class="form-control" type="text" name="email" id="email" required><br><br>
                <button type="submit" name="passBoxSubmit" value="Enter" class="btn btn-primary">Submit</button><br>
                </form>  
                <?php
                    if(isset($_GET["reset"])){
                        if($_GET["reset"] == "success"){
                            echo '<p class="resetsuccess">Check Your e-mail</p>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>