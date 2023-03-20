<?php
    session_start();

    require 'includes/dbh.inc.php';

    if(isset($_SESSION['employeeID']) || isset($_SESSION['email'])){
        
        $stmt = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
		$stmt ->bind_param("s",$_SESSION['email']);
		if(!$stmt ->execute()){
			session_unset();
            session_destroy();
            header ("Location: ./loginAd.php?error=sqlerror");
            exit();
		}

		$result = $stmt->get_result();

		if($result->num_rows >0){
            $row = $result->fetch_assoc();
            $employeeID = $row['employeeID'];
        }
        else{
            session_unset();
            session_destroy();
            header ("Location: ./loginAd.php?error=NoUserEmail");
            exit();
        }

        $stmt ->close();

        if($_SESSION['employeeID'] !== $employeeID){
            session_unset();
            session_destroy();
            header ("Location: ./loginAd.php?error=Not_Logged_In");
            exit();
        }
    }
    else{
        //if error, force a logout
        session_unset();
        session_destroy();
        header ("Location: ./loginAd.php?error=Not_Logged_In");
        exit();
    }
?>

<div class="container-fluid">
    <form action="includes/accRejClient.inc.php" method="post">

    <h4 class="d-flex justify-content-center text-info mb-5">Reject or Accept a Client Page</h5>

    <h6>User ID (required) </h6>
    <div class="col-6 my-3">
    <input type="text" name="userID" id="userID" class="input-underline" placeholder="Your answer" required>
    </div>

                        <label for="decision" class="form-label fs-5 m-2">
                            For the Given Client, will you except to be their Coach or not? (required)
                        </label>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="decision" id="accept" value="y">
                            <label class="form-check-label" for="accept">
                              Accept
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="decision" id="reject" value="n">
                            <label class="form-check-label" for="reject">
                              Reject
                            </label>
                        </div>


    <div class="col-6 my-3">
      <button name="accept-reject-client" class="btn btn-info btn-shadow my-3 " type="submit">Next</button>
    </div>


   </form>
  </div>