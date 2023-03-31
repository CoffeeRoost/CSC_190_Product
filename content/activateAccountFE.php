<div class="d-flex justify-content-center my-5">
        <div class="boxContent my-1">
        <h3 class="text-center fw-bold my-5">Activate Account</h3>
                <div class="fw-bold">
                <form class="mx-5 mb-5" action="includes/activateAccountBE.php" method="post"> 
                    <label  class="form-label" for="email">Email</label><br>
                    <input class="form-control" type="email" name="email" id="email" required><br>
                    <label class="form-label" for="activateCode">Activate Code</label><br>
                    <input type="password" name="activateCode" id="activateCode" class="form-control" required><br>
                    <button type="submit" name="activateBoxSubmit" class="btn btn-primary">Submit</button><br>
                </form> 
            </div>
        </div>
    </div>