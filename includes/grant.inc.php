<?php

session_start();

if(isset($_POST['grant-initial-submit'])){

  //connection to database
  require 'dbh.inc.php';

  //Grab relevant Session variables
  $email = $_SESSION['email'];
  $id = $_SESSION["employeeID"];
  $userID = $_POST['userID'];

  //make sure session varialbes exist
  if(isset($_SESSION['employeeID']) || isset($_SESSION['email'])){

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
              else{

                  //If you get here, they match.
                  //Now it sees if the shared_grant_ID is already given
                  if(!empty($_POST['shared_grant_ID'])){

                      $sql = "SELECT userID FROM GRANT_PARTICIPATION WHERE userID=? AND shared_grant_ID=?";
                      $stmt= mysqli_stmt_init($conn);
                      if(!mysqli_stmt_prepare($stmt,$sql)){
                            //if error, force a logout
                            session_unset();
                            session_destroy();
                            header ("Location: ../loginAd.php?error=sqlerror");
                            exit();
                      }
                      else{
                          mysqli_stmt_bind_param($stmt,'ii',$userID,$_POST['shared_grant_ID']);
                          mysqli_stmt_execute($stmt);
                          $result = mysqli_stmt_get_result($stmt);
                          
                          if($row = mysqli_fetch_assoc($result)){
                              $_SESSION['shared_grant_ID'] = $_POST['shared_grant_ID'];
                              $_SESSION['userID'] = $userID;
                              header("Location: ../grantReportChar.php?error=MadeItHere");
                              exit();
                          }
                      }

                      //If it is, go to the next page for grant characteristics
                      $sql = "INSERT INTO GRANT_PARTICIPATION (shared_grant_ID,userID)
                                VALUES(?,?)";
                      $stmt= mysqli_stmt_init($conn);
                      if(!mysqli_stmt_prepare($stmt,$sql)){
                          session_unset();
                          session_destroy();
                          header("Location: ../loginAd.php?error=sqlerror");
                          exit();
                      }
                      else{
                          mysqli_stmt_bind_param($stmt,"ii",$_POST['shared_grant_ID'],$userID);
                          mysqli_stmt_execute($stmt);

                          $_SESSION['shared_grant_ID'] = $_POST['shared_grant_ID'];
                          $_SESSION['userID'] = $userID;
                          header("Location: ../grantReportChar.php");
                          exit();
                      }
                  }
              }
          }
          else{
              //if error, force a logout
                session_unset();
                session_destroy();
                header ("Location: ../loginAd.php?error=".$email);
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


  //TODO: change redirection
  //Make sure they're not empty
  if(empty($grant_name)||empty($supporting_organization)||empty($personal_contact)||empty($grantID)||empty($startDate)||empty($endDate)){
    header ("Location: ../grantReport.php?error=emptyfields");
    exit();
  }
  else
  {
    //get adminID
    //This is subject to change if we decide to store the adminID at login (aka: this will become unneccessary)
    $sql="SELECT adminID FROM ADMIN WHERE employeeID=?";
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
      mysqli_stmt_bind_param($stmt,'i',$id);
      //get result from database
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      //check if we exactly get result from database
      if($row = mysqli_fetch_assoc($result)){

        $admin = $row['adminID'];

        //Insert into Grant_Main
        $sql="INSERT INTO GRANT_MAIN (adminID,grant_name,grantID,startDate,endDate,personal_contact,supporting_organization)
	        VALUES(?,?,?,?,?,?,?)";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ../loginAd.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,'isiiiis',$admin,$grant_name,$grantID,$startDate,$endDate,$personal_contact,$supporting_organization);
            mysqli_stmt_execute($stmt);

            //We need to get the generated shared_grant_ID for next page
            $sql="SELECT shared_grant_ID FROM GRANT_MAIN WHERE supporting_organization=? AND grantID=?";
    	    $stmt= mysqli_stmt_init($conn);
    	    if(!mysqli_stmt_prepare($stmt,$sql)){

      	    	//if error, force a logout
                session_unset();
                session_destroy();
                header ("Location: ../loginAd.php?error=sqlerror");
                exit();
     	    }
            else{
                mysqli_stmt_bind_param($stmt,'si',$supporting_organization,$grantID);
      		    mysqli_stmt_execute($stmt);
			    $result = mysqli_stmt_get_result($stmt);
			    //check if we exactly get result from database
      		    if($row = mysqli_fetch_assoc($result)){

                    $shared = $row['shared_grant_ID'];
                    
                    $sql = "INSERT INTO GRANT_PARTICIPATION (shared_grant_ID,userID)
                            VALUES(?,?)";
                    $stmt= mysqli_stmt_init($conn);
                    
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        session_unset();
                        session_destroy();
                        header("Location: ../loginAd.php?error=sqlerror");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt,"ii",$shared,$userID);
                        mysqli_stmt_execute($stmt);

                        //Once the generated shared_grant_ID is found, we store it as a Session variable and go to next frontend page
                        $_SESSION['shared_grant_ID'] = $row['shared_grant_ID'];
                        $_SESSION['userID'] = $userID;
                        //TODO: create another frontend page
                        header ("Location: ../grantReportChar.php");
                        exit();
                    }
                }
                else{
                    session_unset();
                    session_destroy();
                    header ("Location: ../loginAd.php?error=nograntLookUp");
        			exit();
                }
            }

        }
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

}
else
{
  //send back to login page
  header ("Location: ../loginAd.php");
  exit();
}