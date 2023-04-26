<?php
    session_start();

    require 'includes/dbh.inc.php';

    if(isset($_SESSION['adminLogin']) || isset($_SESSION['email'])){
        
        $stmt = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
		$stmt ->bind_param("s",$_SESSION['email']);
		if(!$stmt ->execute()){
			session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php?error=sqlerror");
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
            header ("Location: ./LoginAd.php?error=NoUserEmail");
            exit();
        }

        $stmt ->close();

        if($_SESSION['adminLogin'] !== $employeeID){
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php?error=Not_Logged_In");
            exit();
        }
    }
    else{
        //if error, force a logout
        session_unset();
        session_destroy();
        header ("Location: ./LoginAd.php?error=Not_Logged_In");
        exit();
    }
?>

<div class="container-fluid">
    <form action="includes/assignClient.inc.php" method="post">

    <h4 class="d-flex justify-content-center text-info mb-5">Assign a Client to Employee Page</h5>

    <h6>User ID (required) </h6>
    <div class="col-6 my-3">
    <input type="text" name="userID" id="userID" class="input-underline" placeholder="Your answer" required>
    </div>


    <h5 class="d-flex justify-content-center text-info mb-5">Employee Assign Option (Required:Pick One)</h5>


    <h6>Employee ID (prioritized)</h6>
    <div class="col-6 my-3">
    <input type="text" name="employeeID" id="employeeID" class="input-underline" placeholder="Your answer" >
    </div>

    <h6>Employee Email (secondary)</h6>
    <div class="col-6 my-3">
    <input type="text" name="employeeEmail" id="employeeEmail" class="input-underline" placeholder="Your answer" >
    </div>

    <div class="col-6 my-3">
      <button name="assign-employee-client" class="btn btn-info btn-shadow my-3 " type="submit">Next</button>
    </div>


   </form>
  </div>