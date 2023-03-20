<?php

session_start();

if(isset($_POST['accept-reject-client'])){

  //connection to database
  require 'dbh.inc.php';

  //Grab relevant Session variables
  $email = $_SESSION['email'];
  $id = $_SESSION['employeeID'];
  $userID = $_POST['userID'];

  //make sure session varialbes exist
  if(isset($_SESSION['employeeID']) || isset($_SESSION['email'])){

        $stmt = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
		$stmt ->bind_param("s",$email);
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

        if($id !== $employeeID){
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

  //If everything works out, grab the grant general variables

  $decision =$_POST['decision'];

  if(empty($decision)){
      header("Location: ../AcceptRejectClient.php?error=MissingDecision");
      exit();
  }

  $stmt4 = $conn->prepare("SELECT employeeID FROM COACH WHERE userID=?;");
  $stmt4 ->bind_param("i",$userID);
  if(!$stmt4 ->execute()){
      session_unset();
      session_destroy();
      header("Location: ../loginAd.php?error=sqlerror4");
      exit();
  }
  $result = $stmt4->get_result();

  if(!($result->num_rows >0)){
      header("Location: ../AcceptRejectClient.php?error=CurrentlyNotAssignedCoachOrNonexistentClientID");
      exit();
  }
  else{
      $row = $result->fetch_assoc();
      $coach = $row['employeeID'];
  }
  $stmt4 ->close();

  if($coach != $id){
      header("Location: ../AcceptRejectClient.php?error=NotAnAssociatedClient");
      exit();
  }

  if($decision == 'n'){
      $stmt6 = $conn->prepare("DELETE FROM COACH WHERE userID=?;");
      $stmt6 ->bind_param("i",$userID);
      if(!$stmt6 ->execute()){
          session_unset();
          session_destroy();
          header("Location: ../loginAd.php?error=sqlerror6");
          exit();
      }
      $stmt6 ->close();
      
      header("Location: ../AcceptRejectClient.php?error=RejectSuccess");
      exit();
  }

  $stmt5 = $conn->prepare("UPDATE COACH SET accepted = 1 WHERE userID=?;");
  $stmt5 ->bind_param("i",$userID);
  if(!$stmt5 ->execute()){
      header("Location: ../loginAd.php?error=sqlerror");
      exit();
  }
  $stmt5 -> close();
  header("Location: ../AcceptRejectClient.php?error=AcceptSuccess");
  exit();

}
else
{
  //send back to login page
  session_unset();
  session_destroy();
  header ("Location: ../loginAd.php?error=here");
  exit();
}