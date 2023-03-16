<div class="d-flex justify-content-center my-5">
        <div class="boxContent my-1">
        <h3 class="text-center fw-bold my-5">Reset Password</h3>
                <div class="fw-bold">
                <?php
                    $selector = $_GET["selector"];
                    $validator = $_GET["validator"];
                    if (empty($selector) || empty($validator)){
                        echo "selector or validator empty!";
                    }
                    else{
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                            ?>
                <form class="mx-5 mb-5" action="includes/resetPassAd.inc.php" method="post">
                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">   
                <label  class="form-label" for="resetPass">New Password</label><br>
                <input class="form-control" type="password" name="password" id="resetPass" required><br>
                <label class="form-label" for="ConfirmPassword">Confirm New Password</label><br>
                <input type="password" name="passRepeat" id="ConfirmPassword" class="form-control" required><br>
                <button type="submit" name="resetPassBoxSubmit" class="btn btn-primary">Submit</button><br>
                </form> 
                <?php
                        }
                    }
                    ?> 
            </div>
        </div>
    </div>