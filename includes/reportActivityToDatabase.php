<?php
	
	//Gets user input
	$coachID = $POST['coachID'];
	$coachName = $POST['coachName'];
	$clientID = $POST['clientID'];
	$clientLName = $POST['clientLName'];
	$clientFName = $POST['clientFName'];
	$trainingCode = $POST['trainingCode'];
	$trainingProgram = $POST['trainingProgram'];
	$startDate = $POST['startDate'];
	$endDate = $POST['endDate'];
	$timeSpent = $POST['timeSpent'];
	$notes = $POST['notes'];

	//
	$sql = "INSERT INTO participationReportActivity (userID, coach, employeeID, clientLName, clientFName, activityCode, trainingProgram, startDate, endDate, minutes, notes) VALUES ('$coachID', '$coachName', '$clientID', '$clientLName', '$clientFName', '$trainingCode', '$trainingProgram', '$startDate', '$endDate', '$timeSpent', '$notes';)";

	mysqli_query($conn, $sql); //Connects to the database

?>