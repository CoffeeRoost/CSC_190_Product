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

        $stmt = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
        $stmt ->bind_param("s",$email);
	    if(!$stmt ->execute()){
	        session_unset();
            session_destroy();
            header ("Location: ../LoginAd.php?error=sqlerror");
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
            $stmt_value = $conn->prepare("SELECT DOB as result_value FROM PARTICIPATION WHERE userID=?;");
            break;
          case "2":
            $stmt_value = $conn->prepare("SELECT gender as result_value FROM PARTICIPATION WHERE userID=?;");
            break;
          case "3":
            $stmt_value  = $conn->prepare("SELECT primaryPhone as result_value FROM PARTICIPATION WHERE userID=?;");
            break;
          case "4":
            $stmt_value = $conn->prepare("SELECT email as result_value FROM PARTICIPATION WHERE userID=?;");
            break;
          case "5":
            $stmt_value = $conn->prepare("SELECT street as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "6":
            $stmt_value = $conn->prepare("SELECT city as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "7":
            $stmt_value = $conn->prepare("SELECT state as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "8":
            $stmt_value = $conn->prepare("SELECT zipcode as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "9":
            $stmt_value = $conn->prepare("SELECT country as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "10":
            $stmt_value = $conn->prepare("SELECT mailingStreet as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "11":
            $stmt_value = $conn->prepare("SELECT mailingCity as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "12":
            $stmt_value = $conn->prepare("SELECT mailingState as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "13":
            $stmt_value = $conn->prepare("SELECT mailingZipcode as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "14":
            $stmt_value = $conn->prepare("SELECT mailingCountry as result_value FROM ADDRESS WHERE userID=?;");
            break;
          case "15":
            $stmt_value = $conn->prepare("SELECT usCitizenshipStatus as result_value FROM CITIZEN WHERE userID=?;");
            break;
          case "16":
            $stmt_value = $conn->prepare("SELECT alienRegistrationCode as result_value FROM CITIZEN WHERE userID=?;");
            break;
          case "17":
            $stmt_value = $conn->prepare("SELECT alienRegistrationCodeEXP as result_value FROM CITIZEN WHERE userID=?;");
            break;
          case "18":
            $stmt_value = $conn->prepare("SELECT hispanicHeritage as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          case "19":
            $stmt_value = $conn->prepare("SELECT IsDisability as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "20":
            $stmt_value = $conn->prepare("SELECT primaryLanguage as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          case "21":
            $stmt_value = $conn->prepare("SELECT englishProficiency as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          case "22":
            $stmt_value = $conn->prepare("SELECT highSchoolStatus as result_value FROM EDUCATION WHERE userID=?;");
            break;
          case "23":
            $stmt_value = $conn->prepare("SELECT highSchoolDiplomaOREquil as result_value FROM EDUCATION WHERE userID=?;");
            break;
          case "24":
            $stmt_value = $conn->prepare("SELECT highestGradeComplete as result_value FROM EDUCATION WHERE userID=?;");
            break;
          case "25":
            $stmt_value = $conn->prepare("SELECT inSchool as result_value FROM EDUCATION WHERE userID=?;");
            break;
          case "26":
            $stmt_value = $conn->prepare("SELECT currentMilitaryOrVet as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "27":
            $stmt_value = $conn->prepare("SELECT militarySpouse as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "28":
            $stmt_value = $conn->prepare("SELECT selectiveService as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "29":
            $stmt_value = $conn->prepare("SELECT employmentStatus as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "30":
            $stmt_value = $conn->prepare("SELECT payRate as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "31":
            $stmt_value = $conn->prepare("SELECT unemployemntInsurance as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "32":
            $stmt_value = $conn->prepare("SELECT unemploymentWeeks as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "33":
            $stmt_value = $conn->prepare("SELECT farmworker12Months as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "34":
            $stmt_value = $conn->prepare("SELECT techExperience as result_value FROM EMPLOYMENT WHERE userID=?;");
            break;
          case "35":
            $stmt_value = $conn->prepare("SELECT fosterCare as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "36":
            $stmt_value = $conn->prepare("SELECT adultEducationWIOATittleII as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "37":
            $stmt_value = $conn->prepare("SELECT youthBuild as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "38":
            $stmt_value = $conn->prepare("SELECT youthBuildGrant as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "39":
            $stmt_value = $conn->prepare("SELECT jobCorps as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "40":
            $stmt_value = $conn->prepare("SELECT vocationalEducationCarlPerkins as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "41":
            $stmt_value = $conn->prepare("SELECT tanfRecipient as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "42":
            $stmt_value = $conn->prepare("SELECT ssiRecipient as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "43":
            $stmt_value = $conn->prepare("SELECT gaRecipient as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "44":
            $stmt_value = $conn->prepare("SELECT snapRecipientCalFresh as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "45":
            $stmt_value = $conn->prepare("SELECT rcaRecipient as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "46":
            $stmt_value = $conn->prepare("SELECT ssdiRecipient as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "47":
            $stmt_value = $conn->prepare("SELECT snapEmploymentAndTrainingProgram as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "48":
            $stmt_value = $conn->prepare("SELECT pellGrant as result_value FROM SERVICES WHERE userID=?;");
            break;
          case "49":
            $stmt_value = $conn->prepare("SELECT ticketToWork as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "50":
            $stmt_value = $conn->prepare("SELECT homelessStatus as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "51":
            $stmt_value = $conn->prepare("SELECT exOffender as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "52":
            $stmt_value = $conn->prepare("SELECT displacedHomemaker as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "53":
            $stmt_value = $conn->prepare("SELECT singleParent as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "54":
            $stmt_value = $conn->prepare("SELECT culturalBarriers as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "55":
            $stmt_value = $conn->prepare("SELECT familySize as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "56":
            $stmt_value = $conn->prepare("SELECT annualizedFamilyIncome as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "57":
            $stmt_value = $conn->prepare("SELECT disabilityDescription as result_value FROM HARDSHIP WHERE userID=?;");
            break;
          case "58":
            $stmt_value = $conn->prepare("SELECT africanAmercian_black as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          case "59":
            $stmt_value = $conn->prepare("SELECT americanIndian_alaskanNative as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          case "60":
            $stmt_value = $conn->prepare("SELECT asian as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          case "61":
            $stmt_value = $conn->prepare("SELECT hawaiian_other as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          case "62":
            $stmt_value = $conn->prepare("SELECT white as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          case "63":
            $stmt_value = $conn->prepare("SELECT noAnswer as result_value FROM ETHNICITY WHERE userID=?;");
            break;
          default:
            $stmt_value= "";
      }

      //if the SELECT STATEMENT contains something, prepare to execute it
      if($stmt_value != ""){

          $stmt_value ->bind_param("i",$client);
          if(!$stmt_value ->execute()){
              session_unset();
              session_destroy();
              header ("Location: ../LoginAd.php?error=sqlerror1");
              exit();
	    }

	    $result = $stmt_value->get_result();

	    if($result->num_rows >0){
              $row = $result->fetch_assoc();
              $result_from_stmt_value = $row['result_value'];
          }
          else{
              session_unset();
              session_destroy();
              header ("Location: ../grantReportChar.php?error=noAssociatedEntry");
              exit();
          }

          $stmt_value ->close();
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

  $stmt2 = $conn->prepare("SELECT characteristic_grant_ID FROM GRANT_PARTICIPATION WHERE userID=? AND shared_grant_ID=?;");
  $stmt2 ->bind_param("ii",$client,$shared_grant);
  if(!$stmt2 ->execute()){
      session_unset();
      session_destroy();
      header("Location: ../LoginAd.php?error=sqlerror2");
      exit();
  }

  $result = $stmt2->get_result();
  if($result->num_rows >0){
      $row = $result->fetch_assoc();
      $char_grant_ID = $row['characteristic_grant_ID'];
  }
  else{
      session_unset();
      session_destroy();
      header ("Location: ../LoginAd.php?error=NoAssociatedEntry");
      exit();
  }
  $stmt2 ->close();

  $stmt3 = $conn->prepare("INSERT INTO GRANT_CHARACTERISTICS (characteristic_grant_ID,char_title,char_status) VALUES (?,?,?);");
  $stmt3 ->bind_param("iss",$char_grant_ID,$char_title,$char_status);
  if(!$stmt3 ->execute()){
      session_unset();
      session_destroy();
      header("Location: ../LoginAd.php?error=sqlerror2");
      exit();
  }
  $stmt3 ->close();

  header("Location: ../grantReportChar.php");
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
?>