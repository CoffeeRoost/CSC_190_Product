<?php
	session_start();

	if (isset($_POST["submit"])) {
 
		/* Connect to Database */
		require 'dbh.inc.php';
	
		//Gets user input
		$coachID = $_POST['coachID'];
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

		$sql = "SELECT employeeID FROM employee WHERE employeeID = $coachID";
		$sql2 = "SELECT userID, fname, lname FROM participation WHERE userID = $clientID";

		$checkEmployeeID = $conn->query($sql);
		$checkuserID = $conn->query($sql2);

		// Check if the inputted 'coachID' exists in 'Employee' table
		if (mysqli_num_rows($checkEmployeeID) == 0) {
			header("Location: ../employeeDash.php?savingReportActivityForm=fail;CoachIDDoesNotExist");
		} 
		// Check if the inputted 'userID' exists in 'Participation' table
		else if (mysqli_num_rows($checkuserID) == 0) {
			header("Location: ../employeeDash.php?savingReportActivityForm=fail;ClientIDDoesNotExist");
		}
		else if ($checkuserID->num_rows > 0) {
			while ($row = $checkuserID->fetch_assoc()) {
				// Check if the inputted client's name match with the name in database
				if ($row["fname"] != $clientFName) {
					header("Location: ../employeeDash.php?savingReportActivityForm=fail;ClientFirstNameDoesNotMatch");
				}
				else if ($row["lname"] != $clientLName) {
					header("Location: ../employeeDash.php?savingReportActivityForm=fail;ClientLastNameDoesNotMatch");
				}
				else {
					$stmt = $conn->prepare("INSERT INTO PARTICIPATIONREPORTACTIVITY (userID,employeeID,coach,clientLName,clientFName,activityCode,trainingProgram,startDate,endDate,
					minutes,notes) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
					$stmt->bind_param("iisssssssis",$clientID,$coachID,$coachName,$clientLName,$clientFName,$trainingCode,$trainingProgram,$startDate,$endDate,
					$timeSpent,$notes);
					
					if (!$stmt ->execute()) {
						echo "<script>alert('Query Error 1');</script>";
						echo "<script>setTimeout(function(){window.location.href='../reportActivity.php'}, 0);</script>";
						$stmt->close();
						exit();
					}
					else {
						header("Location: ../employeeDash.php?savingReportActivityForm=success");
						$stmt->close();
						exit();
					}
				}
			}
		}
		mysqli_close($conn);
	}
?>