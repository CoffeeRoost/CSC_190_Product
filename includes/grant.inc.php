<?php

session_start();

if(isset($_POST['grant-initial-submit'])){

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

        if(!empty($_POST['shared_grant_ID'])){
            $stmt2 = $conn->prepare("SELECT userID FROM GRANT_PARTICIPATION WHERE userID=? AND shared_grant_ID=?;");
		    $stmt2 ->bind_param("ii",$userID,$_POST['shared_grant_ID']);

            if(!$stmt2 ->execute()){
			    session_unset();
                session_destroy();
                header ("Location: ../loginAd.php?error=sqlerror1");
                exit();
		    }

		    $result = $stmt2->get_result();

            if($result->num_rows >0){
                $_SESSION['shared_grant_ID'] = $_POST['shared_grant_ID'];
                $_SESSION['userID'] = $userID;
                header("Location: ../grantReportChar.php");
                exit();
            }
            else{
                $stmt2 ->close();
            
                $stmt3 = $conn->prepare("INSERT INTO GRANT_PARTICIPATION (shared_grant_ID,userID) VALUES(?,?);");
		        $stmt3 ->bind_param("ii",$_POST['shared_grant_ID'],$userID);
		        if(!$stmt3 ->execute()){
			        session_unset();
                    session_destroy();
                    header ("Location: ../loginAd.php?error=sqlerror");
                    exit();
		        }
                $stmt3 ->close();

                $_SESSION['shared_grant_ID'] = $_POST['shared_grant_ID'];
                $_SESSION['userID'] = $userID;
                header("Location: ../grantReportChar.php");
                exit();
            }
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

  $grant_name               =$_POST['grant_name'];
  $grantID                  =$_POST['grantID'];
  $startDate                =$_POST['startDate'];
  $endDate                  =$_POST['endDate'];
  $supporting_organization  =$_POST['supporting_organization'];
  $personal_contact         =$_POST['personal_contact'];

  if(empty($grant_name)||empty($supporting_organization)||empty($personal_contact)||empty($grantID)||empty($startDate)||empty($endDate)){
    header ("Location: ../grantReport.php?error=emptyfields");
    exit();
  }

  $stmt4 = $conn->prepare("SELECT adminID FROM ADMIN WHERE employeeID=?;");
  $stmt4 ->bind_param("i",$id);

  if(!$stmt4 ->execute()){
    session_unset();
    session_destroy();
    header ("Location: ../loginAd.php?error=sqlerror4");
    exit();
  }

  $result = $stmt4->get_result();

  if($result->num_rows >0){
    $row = $result->fetch_assoc();
    $admin = $row['adminID'];
  }
  else{
      session_unset();
      session_destroy();
      header ("Location: ../loginAd.php?error=NotAnAdmin");
      exit();
  }
  $stmt4 ->close();

  $stmt5 = $conn->prepare("INSERT INTO GRANT_MAIN (adminID,grant_name,grantID,startDate,endDate,personal_contact,supporting_organization) VALUES(?,?,?,?,?,?,?);");
  $stmt5 ->bind_param("isiiiis",$admin,$grant_name,$grantID,$startDate,$endDate,$personal_contact,$supporting_organization);
  if(!$stmt5 ->execute()){
    session_unset();
    session_destroy();
    header ("Location: ../loginAd.php?error=sqlerror5");
    exit();
  }
  $stmt5 ->close();

  $stmt6 = $conn->prepare("SELECT shared_grant_ID FROM GRANT_MAIN WHERE supporting_organization=? AND grantID=?;");
  $stmt6 ->bind_param("si",$supporting_organization,$grantID);
  if(!$stmt6 ->execute()){
    session_unset();
    session_destroy();
    header ("Location: ../loginAd.php?error=sqlerror6");
    exit();
  }

  $result = $stmt6->get_result();

  if($result->num_rows >0){
    $row = $result->fetch_assoc();
    $shared = $row['shared_grant_ID'];
  }
  else{
      session_unset();
      session_destroy();
      header ("Location: ../loginAd.php?error=NoGrantEntry");
      exit();
  }
  $stmt6 ->close();

  $stmt7 = $conn->prepare("INSERT INTO GRANT_PARTICIPATION (shared_grant_ID,userID) VALUES(?,?);");
  $stmt7 ->bind_param("ii",$shared,$userID);
  if(!$stmt7 ->execute()){
    session_unset();
    session_destroy();
    header ("Location: ../loginAd.php?error=sqlerror7");
    exit();
  }
  $stmt7 ->close();

  $_SESSION['shared_grant_ID'] = $shared;
  $_SESSION['userID'] = $userID;
  header ("Location: ../grantReportChar.php");
  exit();

}
else
{
  //send back to login page
  session_unset();
  session_destroy();
  header ("Location: ../loginAd.php");
  exit();
}