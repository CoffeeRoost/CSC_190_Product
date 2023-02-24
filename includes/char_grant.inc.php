<?php

session_start();

if(isset($_POST['grant-characteristic-submit'])){

  //connection to database
  require 'dbh.inc.php';

  //Grab relevant Session variables
  $email = $_SESSION['email'];
  $id = $_SESSION["employeeID"];
  $client = $_SESSION['userID'];
  $shared_grant = $_SESSION['shared_grant_ID'];

  //make sure session varialbes exist
  if(isset($_SESSION['shared_grant_ID']) || isset($_SESSION['userID']) || isset($_SESSION['employeeID']) || isset($_SESSION['email'])){

      //Compare the employeeID and the email to make sure they match
      $sql = "SELECT employeeID FROM EMPLOYEE WHERE email=?";
      $stmt= mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
          //if error, force a logout
          session_unset();
          session_destroy();
          header ("Location: ../loginAd.php?error=sqlerror");
          exit();
      }
      else{
          //execute sql
          mysqli_stmt_bind_param($stmt,'s',$email);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

          if($row = mysqli_fetch_assoc($result)){

              //checks if the provided employeeID matches with the email checked employeeID
              if($id !== $row['employeeID']){
                  //if not matching, force a logout
                  session_unset();
                  session_destroy();
                  header ("Location: ../loginAd.php?error=Not_Logged_In");
                  exit();
              }//TODO: create another frontend page
          }
          else{
              //if error, force a logout
                session_unset();
                session_destroy();
                header ("Location: ../loginAd.php?error=nouseremail");
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

  
  $char_title   =$_POST['char_title'];
  $char_status  =$_POST['char_status'];

  //TODO: change redirection
  //Make sure they're not empty
  if(empty(char_status)||empty(char_title)){
    header ("Location: ../loginAd.php?error=emptyfields");
    exit();
  }
  else
  {
    //get adminID
    //This is subject to change if we decide to store the adminID at login (aka: this will become unneccessary)
    $sql="SELECT characteristic_grant_ID FROM GRANT_PARTICIPATION WHERE userID=? AND shared_grant_ID=?";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      //if error, force a logout
      session_unset();
      session_destroy();
      header ("Location: ../loginAd.php?error=sqlerror");
      exit();
    }
    else{
      //get AdminID
      mysqli_stmt_bind_param($stmt,'ii',$client,$shared_grant);
      //get result from database
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      //check if we exactly get result from database
      if($row = mysqli_fetch_assoc($result)){

        $char_grant_ID = $row['characteristic_grant_ID'];

        //Insert into Grant_Main
        $sql="INSERT INTO GRANT_CHARACTERISTICS (characteristic_grant_ID,char_title,char_status)
	        VALUES(?,?,?)";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ../loginAd.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,'iss',$char_grant_ID,$char_title,$char_status);
            mysqli_stmt_execute($stmt);
    	    
            //TODO: Reload the page to grab more characteristics for grant
            header("Location: ../checkEmail.php?error=success")

        }
      }
      else{
        //if error, force a logout
        session_unset();
        session_destroy();
        header ("Location: ../loginAd.php?error=noAssociatedEntry");
        exit();
      }

    }
  }

}
else
{
  //send back to login page
  header ("Location: ../loginAd.php");
  exit();
}
