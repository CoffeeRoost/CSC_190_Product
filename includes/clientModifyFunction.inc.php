<?php

    /**********Using for mail function******/

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

    /***************************************/

    session_start();
    if(isset($_SESSION['adminLogin']) || isset($_SESSION['userID'])){
        require './dbh.inc.php';

        $id = $_GET['id'];
        $role = $_GET['role'];
        $action = $_GET['action'];
        $adminLink = "./clientViewBE.php?id=".$id;
        $personalLink = "./clientPersonalViewBE.php?id=".$id;
        $dashboardLink = "../Administration1-3.php";
        $clientTableLink = "../clientTable.php";
        $newClientTableLink = "../newClientTable.php";

        $stmt = $conn -> prepare("SELECT * FROM PARTICIPATION WHERE userID = ?;");
        $stmt -> bind_param("i", $id);
        if($stmt -> execute()){
            $result = $stmt -> get_result();
            if($result -> num_rows > 0){
                while ($rows = $result->fetch_assoc()){
                    $selectFname = $rows['fname'];
                    $selectLname = $rows['lname'];
                    $selectEmail = $rows['email'];
                    $selectStatus = $rows['status'];
                }
            }
        $stmt -> close();
        }

    /******************Client Demographic Edit*************************/
        if(isset($_POST['clientDemographicEdit'])){
            $fname = $_POST['fname'];
            $mI = $_POST['MI'];
            $lname = $_POST['lname'];
            $dOB = $_POST['DOB'];
            $last4SSN = $_POST['last4SSN'];
            $gender = $_POST['gender'];
            $otherAns = $_POST['otherAns'];
            $black = $_POST['africanAmerican_black'];
            $nativeAmerican = $_POST['americanIndian_alaskanNative'];
            $asian = $_POST['asian'];
            $hawaiian = $_POST['hawaiian_other'];
            $hispanic = $_POST['hispanic'];
            $white = $_POST['white'];
            $noAnswer = $_POST['noAnswer'];
            $language = $_POST['language'];
            $proficiency = $_POST['proficiency'];
            $program = $_POST['programMember'];

            

            if(empty($fname) || empty($lname)|| empty($dOB) || empty($last4SSN)){

                if($role === "personal"){
                    error_message("Please enter the empty field", $personalLink);
                }
                else {
                    error_message("Please enter the empty field", $adminLink);
                    
                }     
            }

            if(strlen($last4SSN) < 4 || strlen($last4SSN) > 4 || $last4SSN == '0' ){
                if($role === "personal"){
                    error_message("Invalid last four SSN", $personalLink);
                }
                else {
                    error_message("Invalid last four SSN", $adminLink);
                }     
            }

            if($gender === "Other" && empty($otherAns)){
                if($role === "personal"){
                    error_message("Please enter your gender", $personalLink);
                }
                else {
                    error_message("Please enter participation gender", $adminLink);
                }
            }     
            
            if($black !== "Yes" && $nativeAmerican !== "Yes" && $asian !== "Yes" && $hawaiian !== "Yes" && $hispanic !== "Yes" && $white !== "Yes" && $noAnswer !== "Yes"){
                if($role === "personal"){
                    error_message("Please check your ethnicity", $personalLink);
                    
                }
                else {
                    error_message("Please check participation ethinicity", $adminLink);
                    
                }     
            }

            if(empty($nativeAmerican)){
                    $nativeAmerican = "No";
                }

            if(empty($black)){
                    $black = "No";
                }

            if(empty($asian)){
                    $asian = "No";
                }

            if(empty($hawaiian)){
                    $hawaiian = "No";
                }
            if(empty($hispanic)){
                    $hispanic = "No";
                }

            if(empty($white)){
                    $white = "No";
                }

            if(empty($noAnswer)){
                $noAnswer = "No";
            }
            if($noAnswer === "Yes"){
                    $nativeAmerican = "No";
                    $black = "No";
                    $asian = "No";
                    $hawaiian = "No";
                    $hispanic = "No";
                    $white = "No";
                }

            $stmt1 = $conn -> prepare("UPDATE PARTICIPATION SET fname = ?, lname = ?, MI = ?, programPartnerReference = ?, last4SSN = ?, DOB = ?, gender = ? WHERE userID = ?;");

            $stmt2 = $conn -> prepare("UPDATE ETHNICITY SET hispanicHeritage = ?, africanAmercian_black = ?, americanIndian_alaskanNative = ?, asian = ?, hawaiian_other = ?, white = ?, noAnswer = ?, primaryLanguage = ?, englishProficiency = ? WHERE userID = ?;");

            if($gender === "Other"){
                $stmt1 -> bind_param("ssssissi", $fname, $lname, $mI, $program, $last4SSN, $dOB, $otherAns, $id);
            }
            else {
                $stmt1 -> bind_param("ssssissi", $fname, $lname, $mI, $program, $last4SSN, $dOB, $gender, $id);
            }

                $stmt2 -> bind_param("sssssssssi", $hispanic, $black, $nativeAmerican, $asian, $hawaiian, $white, $noAnswer, $language, $proficiency, $id);

            if($stmt1 -> execute() && $stmt2 -> execute()){
                if($role === "personal"){
                    error_message("Your information is updated", $personalLink);
                }
                else {
                    error_message("Participation is updated", $adminLink);
                }      
            }

            $stmt1 -> close();
            $stmt2 -> close();
        }
    }

    
/**********************************************************************/



/***********************Client Address Edit****************************/   
    if(isset($_POST['clientAddEdit'])){
        $street = $_POST['street'];
        $city = $_POST['city'];
        $county = $_POST['county'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $phone  = $_POST['phone'];
        $altPhone = $_POST['altPhone'];
        $email = $_POST['email'];

        if(empty($street) || empty($city) || empty($county) || empty($state) || empty($zipcode) || empty($phone)){
            if($role === "personal"){
                    error_message("Please enter the empty field", $personalLink);
                }
                else {
                    error_message("Please enter the empty field", $adminLink);
                    
                }     
        }

        if(!empty($email)){

            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            if($role === "personal"){
                    error_message("Invalid Email", $personalLink);
                }
                else {
                    error_message("Ivalid Email", $adminLink);
                    
                }    
            }
            
            $checkMail_stmt = $conn -> prepare("SELECT email FROM PARTICIPATION WHERE email = ?;");
            $checkMail_stmt -> bind_param("s",$email);
            $checkMail_stmt->execute();
            $mailCheck = $checkMail_stmt ->get_result();
                if($mailCheck->num_rows >0){
                   if($role === "personal"){
                        error_message("Email already used", $personalLink);
                    }
                    else {
                        error_message("Email already used", $adminLink);
                    }   
                }
            $checkMail_stmt -> close();

            $stmt1 = $conn -> prepare("UPDATE PARTICIPATION SET email = ? WHERE userID = ?;");
            $stmt1 -> bind_param("si", $email, $id);

            $stmt2 = $conn -> prepare("UPDATE ADDRESS SET street = ?, city = ?, state = ?, zipcode = ?, county = ? WHERE userID = ?;");
            $stmt2 -> bind_param("sssssi", $street, $city, $state, $zipcode, $county, $id);

            $stmt3 = $conn -> prepare("UPDATE PARTICIPATION SET primaryPhone = ?, altPhone = ? WHERE userID = ?;");
            $stmt3 -> bind_param("ssi", $phone, $altPhone, $id);

            if($stmt1 -> execute() && $stmt2 -> execute() && $stmt3 -> execute()){
              
              if($role === "personal"){
                    error_message("Your address is updated", $personalLink);
                }
                else {
                    error_message("Participation\'s address is updated", $adminLink);
                } 
            }

            $stmt1 -> close();
            $stmt2 -> close();
            $stmt3 -> close();          
        }

        else {

            $stmt2 = $conn -> prepare("UPDATE ADDRESS SET street = ?, city = ?, state = ?, zipcode = ?, county = ? WHERE userID = ?;");
            $stmt2 -> bind_param("sssssi", $street, $city, $state, $zipcode, $county, $id);

            $stmt3 = $conn -> prepare("UPDATE PARTICIPATION SET primaryPhone = ?, altPhone = ? WHERE userID = ?;");
            $stmt3 -> bind_param("ssi", $phone, $altPhone, $id);

            if($stmt2 -> execute() && $stmt3 -> execute()){
                if($role === "personal"){
                    error_message("Your address is updated", $personalLink);
                }
                else {
                    error_message("Participation\'s address is updated", $adminLink);
                } 
            }

            $stmt2 -> close();
            $stmt3 -> close();          
        }     
    }
/**********************************************************************/


/**********************Client Mailing Address Edit*********************/
    if(isset($_POST['mailAddEdit'])){
         $mailingStreet = $_POST['mailingStreet'];
         $mailingCity = $_POST['mailingCity'];
         $mailingCounty = $_POST['mailingCounty'];
         $mailingState = $_POST['mailingState'];
         $mailingZipcode = $_POST['mailingZipcode'];

        if(empty($mailingStreet) || empty($mailingCity) || empty($mailingCounty)
         || empty($mailingState) || empty($mailingZipcode)){
            
            if($role === "personal"){
                    error_message("Please enter the empty field", $personalLink);
                }
                else {
                    error_message("Please enter the empty field", $adminLink);
                    
                }     
         }

        $stmt = $conn -> prepare("UPDATE ADDRESS SET mailingStreet = ?,
          mailingCity = ?, mailingState = ?, mailingZipcode = ?, mailingCounty = ?
          WHERE userID = ?;");
        $stmt -> bind_param("sssssi", $mailingStreet, $mailingCity, $mailingState,
        $mailingZipcode, $mailingCounty, $id);

        if($stmt -> execute()){
            if($role === "personal"){
                    error_message("Your mailing address is updated", $personalLink);
                }
            else {
                    error_message("Participation\'s mailing address is updated", $adminLink);
                }

            $stmt -> close(); 
        } 
    }
   
/**********************************************************************/

/**********************Client Citizenship Edit*************************/
    if(isset($_POST['citizenEdit'])){
        $citizenship = $_POST['citizenship'];
        $alienCode = $_POST['alienCode'];
        $alienCodeEXP = $_POST['alienCodeEXP'];
        $uscisExpired_mysql = date('Y-m-d', strtotime($alienCodeEXP));

        if($citizenship !== "Citizen"){
            if(empty($alienCode) || empty($alienCodeEXP)){
                
                if($role === "personal"){
                    error_message("Please enter the empty field", $personalLink);
                }
                else {
                    error_message("Please enter the empty field", $adminLink);
                    
                }    
            } 
        }
        else {
            $alienCode = NULL;
            $uscisExpired_mysql = NULL;
        }

        $stmt = $conn -> prepare("UPDATE CITIZEN SET usCitizenshipStatus = ?, alienRegistrationCode = ?,
        alienRegistrationCodeEXP = ? WHERE userID = ?;");
        $stmt -> bind_param("sssi", $citizenship, $$alienCode, $uscisExpired_mysql, $id);
        if($stmt -> execute()){

            if($role === "personal"){
                    error_message("Your citizenship address is updated", $personalLink);
                }
            else {
                    error_message("Participation\'s citizenship address is updated", $adminLink);
                }
            
            $stmt -> close();
        }

    }
/**********************************************************************/

/************************Client Education Edit*************************/
    if(isset($_POST['educationEdit'])){
        $schoolStatus = $_POST['schoolStatus'];
        $schoolLevel = $_POST['schoolLevel'];
        $diploma = $_POST['diploma'];
        $highestSchool = $_POST['highestSchool'];
        
        $stmt = $conn -> prepare("UPDATE EDUCATION SET highSchoolStatus = ?, highSchooolDiplomaOrEquil = ?, highestGradeComplete = ?, inSchool = ? WHERE userID = ?;");
        $stmt -> bind_param("ssssi", $schoolLevel, $diploma, $highestSchool, $schoolStatus, $id);
        if($stmt -> execute()){

            if($role === "personal"){
                    error_message("Your education is updated", $personalLink);
                }
            else {
                    error_message("Participation\'s education is updated", $adminLink);
                }

            $stmt -> close();
        }
    }
/**********************************************************************/

/*************************Client Military Edit*************************/
    if(isset($_POST['militaryEdit'])){
        $military = $_POST['military'];
        $militarySpouse = $_POST['militarySpouse'];
        $selective = $_POST['selective'];

        $stmt = $conn -> prepare("UPDATE EMPLOYMENT SET currentMilitaryOrVet = ?, militarySpouse = ?, selectiveService = ? WHERE userID = ?;");
        $stmt -> bind_param("sssi", $military, $militarySpouse, $selective, $id);
        if($stmt -> execute()){

            if($role === "personal"){
                    error_message("Your military information is updated", $personalLink);
                }
            else {
                    error_message("Participation\'s military information is updated", $adminLink);
                }

            $stmt -> close();
        }

    }
/**********************************************************************/

/*************************Client Employment Edit***********************/
    if(isset($_POST['employmentEdit'])){
        $employment = $_POST['employment'];
        $payRate = $_POST['payRate'];
        $ui = $_POST['ui'];
        $uiWeek = $_POST['uiWeek'];
        $farmworker = $_POST['farmworker'];
        $jobTitle = $_POST['jobTitle'];
        $techExp = $_POST['techExp'];

        if($employment === 'Yes'){
            if(empty($payRate) || $payRate == '0'){
                if($role === "personal"){
                    error_message("Please enter your pay rate", $personalLink);
                }
            else {
                    error_message("Please enter participation\'s pay rate", $adminLink);
                }
            }
        }
        else {
            $payRate = 0;
        }

        if($ui === 'Claimant'){
            if(empty($uiWeek) || $uiWeek == '0'){
                if($role === "personal"){
                    error_message("Please enter your number of week receive UI", $personalLink);
                }
            else {
                    error_message("Please enter participation\'s number of week receive UI", $adminLink);
                }
            }
        }
        else {
            $uiWeek = 0;
        }

        $stmt = $conn -> prepare("UPDATE EMPLOYMENT SET employmentStatus = ?, payRate = ?, unemployemntInsurance = ?, unemploymentWeeks = ?, farmworker12Months = ?, desiredJobTitle = ?, techExperience = ? WHERE userID = ?;");
        $stmt -> bind_param("sisisssi", $employment, $payRate, $ui, $uiWeek, $farmworker, $jobTitle, $techExp, $id);
        if($stmt -> execute()){

            if($role === "personal"){
                    error_message("Your employment information is updated", $personalLink);
                }
            else {
                    error_message("Participation\'s employment information is updated", $adminLink);
                }

            $stmt -> close();
        }

    }
/**********************************************************************/

/*************************Client Employment Edit***********************/
    if(isset($_POST['incomeEdit'])){
        $familySize = $_POST['familySize'];
        $income = $_POST['income'];

        if(empty($familySize) || empty($income)){
            if($role === "personal"){
                    error_message("Please enter the empty field", $personalLink);
                }
                else {
                    error_message("Please enter the empty field", $adminLink);
                    
                }    
        }
        $stmt = $conn -> prepare("UPDATE HARDSHIP SET familySize = ?,annualizedFamilyIncome = ? WHERE userID = ?;");
        $stmt -> bind_param("iii", $familySize, $income, $id);

        if($stmt -> execute()){
            if($role === "personal"){
                    error_message("Your family size and income is updated", $personalLink);
                }
            else {
                    error_message("Participation\'s family size and income is updated", $adminLink);
                }

            $stmt -> close();
        }
    }
/**********************************************************************/


/*************************Client Services Edit*************************/
    if(isset($_POST['serviceEdit'])){
        $foster = $_POST['foster'];
        $adultEdu = $_POST['adultEdu'];
        $youthBuild = $_POST['youthBuild'];
        $youthGrantNum = $_POST['youthGrantNum'];
        $carlPerkins = $_POST['carlPerkins'];
        $jobCorp = $_POST['jobCorp'];
        $tanf = $_POST['tanf'];
        $ssi = $_POST['ssi'];
        $calFresh = $_POST['calFresh'];
        $generalAssist = $_POST['generalAssist'];
        $refugeeAssist = $_POST['refugeeAssist'];
        $ssdi = $_POST['ssdi'];
        $snapTraining = $_POST['snapTraining'];
        $pellGrant = $_POST['pellGrant'];

        if($youthBuild === 'Yes'){
            if(empty($youthGrantNum) || $youthGrantNum == '0'){
                if($role === "personal"){
                    error_message("Please enter your Grant Number", $personalLink);
                }
            else {
                    error_message(" Please enter Participation\'s Grant Number", $adminLink);
                }
            }
        }
        else {
            $youthGrantNum = "N/A";
        }

        $stmt = $conn -> prepare("UPDATE SERVICES SET fosterCare = ?, adultEducationWIOATittleII = ?, youthBuild = ?, youthBuildGrant = ?, jobCorps = ?, vocationalEducationCarlPerkins = ?, tanfRecipient = ?, ssiRecipient = ?, gaRecipient = ?, snapRecipientCalFresh = ?, rcaRecipient = ?, ssdiRecipient = ?, snapEmploymentAndTrainingProgram = ?, pellGrant = ? WHERE userID = ?;");
        $stmt -> bind_param("ssssssssssssssi", $foster, $adultEdu, $youthBuild, $youthGrantNum, $jobCorp, $carlPerkins, $tanf, $ssi, $generalAssist, $calFresh, $refugeeAssist, $ssdi, $snapTraining, $pellGrant, $id);

        if($stmt -> execute()){

            if($role === "personal"){
                    error_message("Your service information is updated", $personalLink);
                }
            else {
                    error_message("Participation\'s service information is updated", $adminLink);
                }

            $stmt -> close();
        }

    }
/**********************************************************************/

/*************************Client Services Edit*************************/
    if(isset($_POST['hardshipEdit'])){
        $disability = $_POST['disability'];
        $disabilityDes = $_POST['disabilityDes'];
        $ticketToWork = $_POST['ticketToWork'];
        $exOffender = $_POST['exOffender'];
        $homeless = $_POST['homeless'];
        $displacedHomemaker = $_POST['displacedHomemaker'];
        $singleParent = $_POST['singleParent'];
        $culturalBarriers = $_POST['culturalBarriers'];
        
        if($disability === "Yes"){
            if(empty($disabilityDes)){
                if($role === "personal"){
                    error_message("Please describe your disability", $personalLink);
                }
                else {
                    error_message(" Please describe Participation\'s disability", $adminLink);
                }
            }
        }
        else {
            $disabilityDes = "N/A";
        }

        $stmt = $conn -> prepare("UPDATE HARDSHIP SET IsDisability = ?, disabilityDescription = ?, ticketToWork = ?, homelessStatus = ?, exOffender = ?, displacedHomemaker = ?, singleParent = ?, culturalBarriers = ? WHERE userID = ?;");
        $stmt -> bind_param("ssssssssi", $disability, $disabilityDes, $ticketToWork, $homeless, $exOffender, $displacedHomemaker, $singleParent, $culturalBarriers, $id);

        if($stmt -> execute()){

            if($role === "personal"){
                    error_message("Your hardship information is updated", $personalLink);
                }
            else {
                    error_message("Participation\'s hardship information is updated", $adminLink);
                }

            $stmt -> close();
        }
        
    }
/**********************************************************************/

 /****************Change password with auto generation**************/
    if(isset($_POST['generate'])){
        $password = generatePassword();
        $userPassword_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt2 = $conn ->prepare("UPDATE PARTICIPATION SET newUserPassword = ? WHERE userID = ?;"); 
        $stmt2 -> bind_param("si", $userPassword_hash, $id);

        if($stmt2 ->execute()){
            /*Sent an confirm for employee new password*/
            sent_mail($selectFname, $selectLname, $selectEmail, $password);
            error_message("Participation\'s password is updated", $adminLink);
        }
        else {
           error_message("Password updated failed", $adminLink);
        }
        $stmt2 -> close();
        $conn -> close();
    }
    /******************************************************************/

     /****************Change password with input password**************/
    if(isset($_POST['inputPass'])){
        $password = $_POST['newPassword'];
        $userPassword_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt2 = $conn ->prepare("UPDATE PARTICIPATION SET newUserPassword = ? WHERE userID = ?;"); 
        $stmt2 -> bind_param("si", $userPassword_hash, $id);

        if($stmt2 ->execute()){
            /*Sent an confirm for employee new password*/
            sent_mail($selectFname, $selectLname, $selectEmail, $password);
            error_message("Participation\'s password is updated", $adminLink);
        }
        else {
           error_message("Password updated failed", $adminLink);
        }
        $stmt2 -> close();
        $conn -> close();
    }

/*************************ClientDeactivated****************************/
if(isset($_POST['deactivate'])){
        deactivate_account($conn, $id, $_GET['status'], $adminLink);
     }

if(isset($_POST['deactivate_ClientTable'])){
        deactivate_account($conn, $id, $_GET['status'], $clientTableLink);
     }
if(isset($_POST['deactivate_newClientTable'])){
        deactivate_account($conn, $id, $_GET['status'], $newClientTableLink);
     }
/**********************************************************************/

/******************************Client Delete***************************/
    if(isset($action)){
        if($action === "delete"){
            delete_account($conn, $id, $dashboardLink);

        }
        if($action === "deleteClientTable"){
            delete_account($conn, $id, $clientTableLink);
        }

        if($action === "deleteNewClient"){
            delete_account($conn, $id, $newClientTableLink);
        }
        
    }
/**********************************************************************/




function error_message ($message, $header){
        echo "<script>alert('".$message."');</script>";
        echo "<script>setTimeout(function(){window.location.href='".$header."'}, 300);</script>";
        exit();
    }

function generatePassword() {
    $password = '';
    $capital_letter = chr(rand(65, 90)); /*generates a random capital letter (ASCII code 65-90)*/
    $specific_letter = chr(rand(33, 47)); /* generates a random specific letter (ASCII code 33-47)*/

    /*add the capital letter and specific letter to the password*/
    $password .= $capital_letter . $specific_letter; 
    
    /*generate 10 more random characters*/
    for ($i = 0; $i < 10; $i++) { 
        $password .= chr(rand(97, 122)); /*lowercase letters (ASCII code 97-122)*/
    }
    
    /*shuffle the password to ensure the capital letter and specific letter are in random positions*/
    $password_array = str_split($password);
    shuffle($password_array);
    $password = implode('', $password_array);
    
    return $password;
}

function deactivate_account($connection, $deactivate_id, $status, $pagesLink){
    if($status == 1){
        $changeStatus = 0;
        
        $stmt = $connection ->prepare("UPDATE PARTICIPATION SET status = ? WHERE userID = ?;");
        $stmt -> bind_param("ii", $changeStatus , $deactivate_id);
        
        if($stmt -> execute()){
            error_message("Client Account is deactivated", $pagesLink);
        }          
    }
    else {
        $changeStatus = 1;
        $stmt = $connection ->prepare("UPDATE PARTICIPATION SET status = ? WHERE userID = ?;");
        $stmt -> bind_param("ii", $changeStatus , $deactivate_id);
        
        if($stmt -> execute()){
            error_message("Client Account is activated", $pagesLink);
        }   
    }

        $stmt -> close();
        $connection -> close();
}

function delete_account($connection ,$delete_id, $pagesLink){
    
    $stmt = $connection -> prepare("DELETE FROM PARTICIPATION WHERE userID = ?;");
    $stmt -> bind_param("i",$delete_id);

    if($stmt-> execute()){
        error_message("Client Account is deleted", $pagesLink);
    }
    $stmt -> close();
    $connection -> close();
} 

function sent_mail($firstname,$lastname,$sendEmail,$newPassword){
     /**********Using for mail function******/
        require_once './email_config.inc.php';
        require './PHPMailer.php';
        require './SMTP.php';
        require './Exception.php';
     /***************************************/
     /* ---------------Send Welcome Mail to new employee-----------------*/
                        // Create a new PHPMailer instance
                        $passwordMail = new PHPMailer(true);

                        // Set up SMTP connection
                        /*$welcomeMail->SMTPDebug = SMTP::DEBUG_SERVER; --> using for debug only*/   
                        $passwordMail->isSMTP();
                        $passwordMail->Host = SMTP_HOST;
                        $passwordMail->Port = SMTP_PORT;
                        $passwordMail->SMTPAuth = true;
                        $passwordMail->Username = SMTP_USERNAME;
                        $passwordMail->Password = SMTP_PASSWORD;

                        // Set up email content
                        $passwordMail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
                        $passwordMail->addAddress($sendEmail, $firstname." ".$lastname);
                        $passwordMail->Subject = 'CMC Password Reset';
                        $passwordMail->Body = "Hi ".$firstname." ".$lastname."\n\n".
                                      "This is your new password\n".
                                      "Email: ".$sendEmail. "\n".
                                      "Password: ".$newPassword."\n".
                                      "This is your temporary password. You can change it later";
                        $passwordMail -> send();
                    /* ---------------End Welcome Mail----------------------------*/
}
 
?>