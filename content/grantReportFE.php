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

    <form action="/includes/grant.inc.php" method="post" class="container-fluid custom-container">

    <h4 class="d-flex justify-content-center text-info mt-5">Grant Report</h4>
    
    <h6 class="mt-5">Client ID<span class="text-danger">*</span></h6>
    <input type="text" name="userID" id="userID" class="input-underline" placeholder="Your answer" required>

    <h6 class="mt-5">Pre-established Grant Form?</h6>
    <input type="text" name="shared_grant_ID" id="shared_grant_ID" class="input-underline" placeholder="Your answer">

   <div class="col-6 my-3">
        <button name="grant-initial-submit" class="btn btn-info btn-shadow my-3" type="submit">Next</button>
   </div>

    <h5 class="d-flex justify-content-center text-info mt-5">Basic Info (Required, if Pre-established is not filled out above)</h5>

    <h6 class="mt-5">Grant ID</span></h6>
    <input type="text" name="grantID" id="grantID"  class="input-underline" placeholder="Your answer" >

    <h6 class="mt-5">Start Date</h6>
    <input type="date" name="startDate" id="startDate" class="input-underline" placeholder="" >

    <h6 class="mt-5">End Date</h6>
    <input type="date" name="endDate" id="endDate" class="input-underline" placeholder="" >

    <h6 class="mt-5">Grant Name</h6>
    <input type="text" name="grant_name" id="grant_name" class="input-underline" placeholder="Your answer" >

    <h6 class="mt-5">Support Organization</h6>
    <input type="text" name="supporting_organization" id="supporting_organization" class="input-underline" placeholder="Your answer" >

    <h6 class="mt-5">Personal Contact</h6>
    <input type="text" name="personal_contact" id="personal_contact" class="input-underline" placeholder="Your answer" >

    <div class="col-6 my-3">
      <button name="grant-initial-submit" class="btn btn-info btn-shadow my-3" type="submit">Next</button>
    </div>

    </form>
