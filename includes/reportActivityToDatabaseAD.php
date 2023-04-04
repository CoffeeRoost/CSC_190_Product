<?php
	session_start();

	if (isset($_POST["submitActivityAdmin"])) {

		/* Connect to Database */
		require 'dbh.inc.php';

		$coachID = $_SESSION['adminLogin'];

		if(isset($_SESSION['adminLogin']) || isset($_SESSION['email'])){

			$stmt = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
			$stmt ->bind_param("s",$_SESSION['email']);
			if(!$stmt ->execute()){
				session_unset();
				session_destroy();
				header ("Location: ../loginAd.php?error=sqlerror1");
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
	            header ("Location: ../loginAd.php?error=NoUserEmail");
		        exit();
			}

			$stmt ->close();

			if($coachID !== $employeeID){
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
			header ("Location: ../loginAd.php?error=Not_Logged_In");
			exit();
		}
	
		//Gets user input
		//$coachID = $_POST['coachID'];
		$coachName = $_POST['coachName'];
		$clientID = $_POST['clientID'];
		$clientLName = $_POST['clientLName'];
		$clientFName = $_POST['clientFName'];
		$trainingCode = $_POST['trainingCode'];
		$trainingProgram = $_POST['trainingProgram'];
		$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];
		$timeSpent = $_POST['timeSpent'];
		$notes = $_POST['notes'];


		//Check if given userID exists
		$conn->prepare("SELECT userID, fname, lname FROM PARTICIPATION WHERE userID=?;");

		$stmt = $conn->prepare("SELECT userID, fname, lname FROM PARTICIPATION WHERE userID=?;");
		$stmt ->bind_param("i",$clientID);

		if(!$stmt ->execute()){
			session_unset();
			session_destroy();
			header ("Location: ../loginAd.php?error=sqlerror");
			exit();
		}
		$result = $stmt->get_result();

		if($result->num_rows >0){
			$row = $result->fetch_assoc();
			$checkUser = $row['userID'];
			$checkFname = $row['fname'];
			$checkLname = $row['lname'];
		}
		else{
			header ("Location: ../reportActivity.php?error=NotAValidClientID");
			exit();
		}
		$stmt ->close();

		//checks to see if given employeeID is associated with the given client
		$stmt = $conn->prepare("SELECT userID FROM COACH WHERE userID=? AND employeeID=?;");
		$stmt ->bind_param("ii",$clientID,$coachID);

		if(!$stmt ->execute()){
			session_unset();
			session_destroy();
			header ("Location: ../loginAd.php?error=sqlerror");
			exit();
		}
		$result = $stmt->get_result();

		if($result->num_rows <= 0){
			header ("Location: ../reportActivity.php?error=NotAnAssociatedClient");
			exit();
		}
		$stmt ->close();

		if ($checkFname != $clientFName) {
			header("Location: ../reportActivity.php?error=ClientFirstNameDoesNotMatch");
			exit();
		}
		else if ($checkLname != $clientLName) {
			header("Location: ../reportActivity.php?error=ClientLastNameDoesNotMatch");
			exit();
		}

		$stmt = $conn->prepare("INSERT INTO PARTICIPATIONREPORTACTIVITY (userID,employeeID,coach,clientLName,clientFName,activityCode,trainingProgram,startDate,endDate,
			minutes,notes) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
		$stmt->bind_param("iisssssssis",$clientID,$coachID,$coachName,$clientLName,$clientFName,$trainingCode,$trainingProgram,$startDate,$endDate,
			$timeSpent,$notes);
					
		if (!$stmt ->execute()) {
			session_unset();
			session_destroy();
			header ("Location: ../loginAd.php?error=sqlerror1");
			exit();
		}
		$stmt ->close();
		header("Location: ../reportActivity.php?savingReportActivityForm=success");
		exit();


		mysqli_close($conn);
	}
	else{
		//send back to login page
		session_unset();
		session_destroy();
		header ("Location: ../loginAd.php");
		exit();
	}
?>