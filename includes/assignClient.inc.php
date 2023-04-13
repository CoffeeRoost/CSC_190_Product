<?php

session_start();

if(isset($_POST['assign-employee-client'])){

  //connection to database
  require 'dbh.inc.php';

  //Grab relevant Session variables
  $email = $_SESSION['email'];
  $id = $_SESSION["adminLogin"];
  $userID = $_POST['userID'];

  //make sure session varialbes exist
  if(isset($_SESSION['adminLogin']) || isset($_SESSION['email'])){

        $stmt = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
		$stmt ->bind_param("s",$email);
		if(!$stmt ->execute()){
			session_unset();
            session_destroy();
            header ("Location: ../LoginAd.php?error=sqlerror1");
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
            header ("Location: ../LoginAd.php?error=NoUserEmail");
            exit();
        }

        $stmt ->close();

        if($id !== $employeeID){
            session_unset();
            session_destroy();
            header ("Location: ../LoginAd.php?error=Not_Logged_In");
            exit();
        }
  }
  else{
      //if error, force a logout
      session_unset();
      session_destroy();
      header ("Location: ../LoginAd.php?error=Not_Logged_In");
      exit();
  }

  //If everything works out, grab the grant general variables

  $employeeID               =$_POST['employeeID'];
  $employeeEmail            =$_POST['employeeEmail'];

  $stmt4 = $conn->prepare("SELECT userID FROM PARTICIPATION WHERE userID=?;");
  $stmt4 ->bind_param("i",$userID);
  if(!$stmt4 ->execute()){
      session_unset();
      session_destroy();
      header("Location: ../LoginAd.php?error=sqlerror2");
      exit();
  }
  $result = $stmt4->get_result();

  if(!($result->num_rows >0)){
      header("Location: ../ClientEmployee.php?error=NotAnAcceptableClientID");
      exit();
  }
  $stmt4 ->close();


  if(empty($employeeID)){
      if(empty($employeeEmail)){
          header("Location: ../ClientEmployee.php?error=MissingFields");
          exit();
      }

      $stmt2 = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
      $stmt2 ->bind_param("s",$employeeEmail);
      if(!$stmt2 ->execute()){
          session_unset();
          session_destroy();
          header("Location: ../LoginAd.php?error=sqlerror2");
          exit();
      }
      $result = $stmt2->get_result();

      if($result->num_rows >0){
          $row = $result->fetch_assoc();
          $employeeID = $row['employeeID'];
      }
      else{
          header("Location: ../ClientEmployee.php?error=MissingFields");
          exit();
      }
      $stmt2 ->close();
  }
  else{
	$stmt2 = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE employeeID=?;");
      $stmt2 ->bind_param("i",$employeeID);
      if(!$stmt2 ->execute()){
          session_unset();
          session_destroy();
          header("Location: ../LoginAd.php?error=sqlerror2");
          exit();
      }
      $result = $stmt2->get_result();

      if($result->num_rows >0){
          $row = $result->fetch_assoc();
          $employeeID = $row['employeeID'];
      }
      else{
          header("Location: ../ClientEmployee.php?error=MissingFields");
          exit();
      }
      $stmt2 ->close();
  }


  $stmt5 = $conn->prepare("SELECT userID FROM COACH WHERE userID=?;");
  $stmt5 ->bind_param("i",$userID);
  if(!$stmt5 ->execute()){
      session_unset();
      session_destroy();
      header("Location: ../LoginAd.php?error=sqlerror5");
      exit();
  }
  $result = $stmt5->get_result();

  if($result->num_rows >0){
      $stmt6 = $conn->prepare("DELETE FROM COACH WHERE userID=?;");
      $stmt6 ->bind_param("i",$userID);
      if(!$stmt6 ->execute()){
          session_unset();
          session_destroy();
          header("Location: ../LoginAd.php?error=sqlerror6");
          exit();
      }
      $stmt6 ->close();
  }
  $stmt5 ->close();


  $stmt3 = $conn->prepare("INSERT INTO COACH (userID,employeeID) VALUES (?,?);");
  $stmt3 ->bind_param("ii",$userID,$employeeID);
  if(!$stmt3 ->execute()){
    session_unset();
    session_destroy();
    header ("Location: ../LoginAd.php?error=sqlerror3");
    exit();
  }
  $stmt3 ->close();

  header ("Location: ../ClientEmployee.php?error=Success");
  exit();

}
else
{
  //send back to login page
  session_unset();
  session_destroy();
  header ("Location: ../LoginAd.php");
  exit();
}