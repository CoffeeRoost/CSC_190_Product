<?php

session_start();

if(isset($_POST['grant-characteristic-submit'])){


  //connection to database
  require 'dbh.inc.php';

  //Grab relevant Session variables
  $email = $_SESSION['email'];
  $id = $_SESSION["adminLogin"];
  $client = $_SESSION['userID'];
  $shared_grant = $_SESSION['shared_grant_ID'];

  //make sure session varialbes exist
  if(isset($_SESSION['shared_grant_ID']) || isset($_SESSION['userID']) || isset($_SESSION['adminLogin']) || isset($_SESSION['email'])){

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
  else{
      //if error, force a logout
      session_unset();
      session_destroy();
      header ("Location: ../loginAd.php?error=Not_Logged_In");
      exit();
  }

  //If everything works out, grab the grant general variables

  
  $char_title   =$_POST['char_title'];


  if(empty($char_title)){
      header ("Location: ../grantReportChar.php?error=emptytitle");
      exit();
  }

  //the sql statement container if pre_status is not empty
  $stmt_value             = "";

  //the resulting char_status from $stmt_value statement
  $result_from_stmt_value = "";

  $pre_status   =$_POST['pre_status'];

  //check if pre_status has a value
  if(!empty($pre_status)){
      //Depending on the value, make a SELECT statement matching the given entry
      switch ($pre_status){
          case "1":
            $stmt_value= "SELECT DOB as result_value FROM PARTICIPATION WHERE userID=?";
            break;
          case "2":
            $stmt_value= "SELECT gender as result_value FROM PARTICIPATION WHERE userID=?";
            break;
          case "3":
            $stmt_value= "SELECT primaryPhone as result_value FROM PARTICIPATION WHERE userID=?";
            break;
          case "4":
            $stmt_value= "SELECT email as result_value FROM PARTICIPATION WHERE userID=?";
            break;
          case "5":
            $stmt_value= "SELECT street as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "6":
            $stmt_value= "SELECT city as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "7":
            $stmt_value= "SELECT state as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "8":
            $stmt_value= "SELECT zipcode as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "9":
            $stmt_value= "SELECT country as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "10":
            $stmt_value= "SELECT mailingStreet as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "11":
            $stmt_value= "SELECT mailingCity as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "12":
            $stmt_value= "SELECT mailingState as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "13":
            $stmt_value= "SELECT mailingZipcode as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "14":
            $stmt_value= "SELECT mailingCountry as result_value FROM ADDRESS WHERE userID=?";
            break;
          case "15":
            $stmt_value= "SELECT usCitizenshipStatus as result_value FROM CITIZEN WHERE userID=?";
            break;
          case "16":
            $stmt_value= "SELECT alienRegistrationCode as result_value FROM CITIZEN WHERE userID=?";
            break;
          case "17":
            $stmt_value= "SELECT alienRegistrationCodeEXP as result_value FROM CITIZEN WHERE userID=?";
            break;
          case "18":
            $stmt_value= "SELECT hispanicHeritage as result_value FROM ETHNICITY WHERE userID=?";
            break;
          case "19":
            $stmt_value= "SELECT IsDisability as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "20":
            $stmt_value= "SELECT primaryLanguage as result_value FROM ETHNICITY WHERE userID=?";
            break;
          case "21":
            $stmt_value= "SELECT englishProficiency as result_value FROM ETHNICITY WHERE userID=?";
            break;
          case "22":
            $stmt_value= "SELECT highSchoolStatus as result_value FROM EDUCATION WHERE userID=?";
            break;
          case "23":
            $stmt_value= "SELECT highSchoolDiplomaOREquil as result_value FROM EDUCATION WHERE userID=?";
            break;
          case "24":
            $stmt_value= "SELECT highestGradeComplete as result_value FROM EDUCATION WHERE userID=?";
            break;
          case "25":
            $stmt_value= "SELECT inSchool as result_value FROM EDUCATION WHERE userID=?";
            break;
          case "26":
            $stmt_value= "SELECT currentMilitaryOrVet as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "27":
            $stmt_value= "SELECT militarySpouse as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "28":
            $stmt_value= "SELECT selectiveService as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "29":
            $stmt_value= "SELECT employmentStatus as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "30":
            $stmt_value= "SELECT payRate as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "31":
            $stmt_value= "SELECT unemployemntInsurance as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "32":
            $stmt_value= "SELECT unemploymentWeeks as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "33":
            $stmt_value= "SELECT farmworker12Months as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "34":
            $stmt_value= "SELECT techExperience as result_value FROM EMPLOYMENT WHERE userID=?";
            break;
          case "35":
            $stmt_value= "SELECT fosterCare as result_value FROM SERVICES WHERE userID=?";
            break;
          case "36":
            $stmt_value= "SELECT adultEducationWIOATittleII as result_value FROM SERVICES WHERE userID=?";
            break;
          case "37":
            $stmt_value= "SELECT youthBuild as result_value FROM SERVICES WHERE userID=?";
            break;
          case "38":
            $stmt_value= "SELECT youthBuildGrant as result_value FROM SERVICES WHERE userID=?";
            break;
          case "39":
            $stmt_value= "SELECT jobCorps as result_value FROM SERVICES WHERE userID=?";
            break;
          case "40":
            $stmt_value= "SELECT vocationalEducationCarlPerkins as result_value FROM SERVICES WHERE userID=?";
            break;
          case "41":
            $stmt_value= "SELECT tanfRecipient as result_value FROM SERVICES WHERE userID=?";
            break;
          case "42":
            $stmt_value= "SELECT ssiRecipient as result_value FROM SERVICES WHERE userID=?";
            break;
          case "43":
            $stmt_value= "SELECT gaRecipient as result_value FROM SERVICES WHERE userID=?";
            break;
          case "44":
            $stmt_value= "SELECT snapRecipientCalFresh as result_value FROM SERVICES WHERE userID=?";
            break;
          case "45":
            $stmt_value= "SELECT rcaRecipient as result_value FROM SERVICES WHERE userID=?";
            break;
          case "46":
            $stmt_value= "SELECT ssdiRecipient as result_value FROM SERVICES WHERE userID=?";
            break;
          case "47":
            $stmt_value= "SELECT snapEmploymentAndTrainingProgram as result_value FROM SERVICES WHERE userID=?";
            break;
          case "48":
            $stmt_value= "SELECT pellGrant as result_value FROM SERVICES WHERE userID=?";
            break;
          case "49":
            $stmt_value= "SELECT ticketToWork as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "50":
            $stmt_value= "SELECT homelessStatus as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "51":
            $stmt_value= "SELECT exOffender as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "52":
            $stmt_value= "SELECT displacedHomemaker as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "53":
            $stmt_value= "SELECT singleParent as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "54":
            $stmt_value= "SELECT culturalBarriers as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "55":
            $stmt_value= "SELECT familySize as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "56":
            $stmt_value= "SELECT annualizedFamilyIncome as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "57":
            $stmt_value= "SELECT disabilityDescription as result_value FROM HARDSHIP WHERE userID=?";
            break;
          case "58":
            $stmt_value= "SELECT africanAmercian_black as result_value FROM ETHNICITY WHERE userID=?";
            break;
          case "59":
            $stmt_value= "SELECT americanIndian_alaskanNative as result_value FROM ETHNICITY WHERE userID=?";
            break;
          case "60":
            $stmt_value= "SELECT asian as result_value FROM ETHNICITY WHERE userID=?";
            break;
          case "61":
            $stmt_value= "SELECT hawaiian_other as result_value FROM ETHNICITY WHERE userID=?";
            break;
          case "62":
            $stmt_value= "SELECT white as result_value FROM ETHNICITY WHERE userID=?";
            break;
          case "63":
            $stmt_value= "SELECT noAnswer as result_value FROM ETHNICITY WHERE userID=?";
            break;
          default:
            $stmt_value= "";
      }

      //if the SELECT STATEMENT contains something, prepare to execute it
      if($stmt_value != ""){
          $stmt= mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt,$stmt_value)){
              session_unset();
              session_destroy();
              header ("Location: ../loginAd.php?error=sqlerror");
              exit();
          }
          else{
              mysqli_stmt_bind_param($stmt,'i',$client);
              mysqli_stmt_execute($stmt);

              //get resulting row
              $result = mysqli_stmt_get_result($stmt);

              //check if it's empty
              if($row = mysqli_fetch_assoc($result)){
                  //place value into result
                  $result_from_stmt_value = $row['result_value'];
              }
              else{
                  session_unset();
                  session_destroy();
                  header ("Location: ../grantReportChar.php?error=noAssociatedEntry");
                  exit();
              }
          }
      }
  }
 
  $char_status  =$_POST['char_status'];

  //if char_status is empty, override with $result_from_stmt_value
  if(empty($char_status)){
      $char_status = $result_from_stmt_value;
  }


  //Make sure they're not empty
  if(empty($char_status)||empty($char_title)){
    header ("Location: ../grantReportChar.php?error=emptyfields");
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
            header("Location: ../grantReportChar.php");
            exit();

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
