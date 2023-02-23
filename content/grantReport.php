<?php
    session_start();

    //For Testing Purposes, Remove later
    //$_SESSION['userID'] = 7;
    //$_SESSION['employeeID'] = 2;
    //$_SESSION['email'] = "gabcocke@gmail.com";

    require 'includes/dbh.inc.php';

    if(isset($_SESSION['userID']) || isset($_SESSION['employeeID']) || isset($_SESSION['email'])){

      //Compare the employeeID and the email to make sure they match
      $sql = "SELECT employeeID FROM EMPLOYEE WHERE email=?";
      $stmt= mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
          //if error, force a logout
          session_unset();
          session_destroy();
          header ("Location: ./loginAd.php?error=sqlerror");
          exit();
      }
      else{
          //execute sql
          mysqli_stmt_bind_param($stmt,'s',$_SESSION['email']);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

          if($row = mysqli_fetch_assoc($result)){

              //checks if the provided employeeID matches with the email checked employeeID
              if($_SESSION['employeeID'] !== $row['employeeID']){
                  //if not matching, force a logout
                  session_unset();
                  session_destroy();
                  header ("Location: ./loginAd.php?error=Not_Logged_In");
                  exit();
              }//TODO: create another frontend page
          }
          else{
              //if error, force a logout
                session_unset();
                session_destroy();
                header ("Location: ./loginAd.php?error=nouseremail");
                exit();
          }

      }
  }
  else{
      //if error, force a logout
      session_unset();
      session_destroy();
      header ("Location: ./loginAd.php?error=Not_Logged_In");
      exit();
  }
?>

<div class="container-fluid">
    <form action="includes/grant.inc.php" method="post">

    <h5 class="d-flex justify-content-center text-info mb-5">Grant Report</h5>

    <h6>Pre-established Grant Form? </h6>
    <input type="text" name="shared_grant_ID" id="shared_grant_ID" class="input-underline" placeholder="Your answer" >

    <div class="col-6 my-3">
      <button name="grant-initial-submit" class="btn btn-info btn-shadow my-3 " type="submit">Next</button>
    </div>

    <h6 class="mt-5">Basic Info (Required if not above)</h6>

    <h6 class="mt-5">Grant ID <span class="text-danger">*</span></h6>
    <input type="text" name="grantID" id="grantID" class="input-underline" placeholder="Your answer" >

    <h6 class="mt-5">Start Date <span class="text-danger">*</span></h6>
    <input type="date" name="startDate" id="startDate" class="input-underline" placeholder="" >

    <h6 class="mt-5">End Date <span class="text-danger">*</span></h6>
    <input type="date" name="endDate" id="endDate" class="input-underline" placeholder="" >

    <h6 class="mt-5">Grant Name <span class="text-danger">*</span></h6>
    <input type="text" name="grant_name" id="grant_name" class="input-underline" placeholder="Your answer" >

    <h6 class="mt-5">Support Organization <span class="text-danger">*</span></h6>
    <input type="text" name="supporting_organization" id="supporting_organization" class="input-underline" placeholder="Your answer" >

    <h6 class="mt-5">Personal Contact <span class="text-danger">*</span></h6>
    <input type="text" name="personal_contact" id="personal_contact" class="input-underline" placeholder="Your answer" >

    <div class="col-6 my-3">
      <button type="submit" name="grant-initial-submit" class="btn btn-info btn-shadow my-3">Next</button>
    </div>

    </form>
  </div>