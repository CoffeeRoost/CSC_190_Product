<?php

    if(!isset($_SESSION)) { 
            session_start(); 
    }

    //session_start();
    if (!isset($_SESSION['userID'])){
          //if error, force a logout
         session_unset();
         session_destroy();
         header ("Location: ../Login.php");
         exit();
     }

    require 'dbh.inc.php';

    $id = $_GET['id'];
    
    $stmt = $conn -> prepare("SELECT * FROM PARTICIPATION AS client JOIN ADDRESS AS addr ON client.userID = addr.userID JOIN CITIZEN AS citizen ON addr.userID = citizen.userID JOIN ETHNICITY AS races ON citizen.userID = races.userID JOIN EDUCATION AS edu ON races.userID = edu.userID JOIN EMPLOYMENT AS emp ON edu.userID = emp.userID JOIN SERVICES AS serv ON emp.userID = serv.userID JOIN HARDSHIP AS hard ON serv.userID = hard.userID WHERE client.userID = ?;");

    
    $stmt -> bind_param("i", $id);
    
    if($stmt ->execute()){
        $result = $stmt -> get_result();
        
        if($result -> num_rows > 0){
            while($rows = $result ->fetch_assoc()){
            /****************For demographic view*******************/
                $_SESSION['clientViewID'] = $rows['userID'];
                $_SESSION['clientViewStatus'] = $rows['status'];
                $_SESSION['clientViewFname'] = $rows['fname'];
                $_SESSION['clientViewMI'] = $rows['MI'];
                $_SESSION['clientViewLname'] = $rows['lname'];
                $_SESSION['clientViewDOB'] = $rows['DOB'];
                $_SESSION['convertViewDOB'] = date('m-d-Y', strtotime($rows['DOB']));
                $_SESSION['clientView4SSN'] = $rows['last4SSN'];
                $_SESSION['clientAsian'] = $rows['asian'];
                $_SESSION['ClientHispanic'] = $rows['hispanicHeritage'];
                $_SESSION['ClientBlack'] = $rows['africanAmercian_black'];
                $_SESSION['ClientNative'] = $rows['americanIndian_alaskanNative'];
                $_SESSION['ClientHawaiian'] = $rows['hawaiian_other'];
                $_SESSION['ClientWhite'] = $rows['white'];
                $_SESSION['ClientNoRaces'] = $rows['noAnswer'];

                //Get gender and convert to title string for display
                $_SESSION['ClientViewGender'] = ucwords($rows['gender']);
    
                //To get multiple ethnicity of client
                $ethnicity = array();
                if($rows['hispanicHeritage'] === "Yes"){
                    $ethnicity[] = "Hispanic";
                }
                if($rows['africanAmercian_black'] === "Yes"){
                    $ethnicity[] = "African American/Black";
                }
                if($rows['americanIndian_alaskanNative'] === "Yes"){
                    $ethnicity[] = "American Indian/Alaskan Native";
                }
                if($rows['asian'] === "Yes"){
                    $ethnicity[] = "Asian";
                }
                if($rows['hawaiian_other'] === "Yes"){
                    $ethnicity[] = "Hawaiian/Pacific Islander";
                }
                if($rows['white'] === "Yes"){
                    $ethnicity[] = "White";
                }
                if($rows['noAnswer'] === "Yes"){
                    $_SESSION['ClientViewRaces'] = "N/A";
                }
                $_SESSION['ClientViewRaces'] = implode(", ", $ethnicity);
                /*************************************/
                $_SESSION['ClientViewProgram'] = $rows['programPartnerReference'];
                $_SESSION['ClientViewLanguage'] = $rows['primaryLanguage'];
                $_SESSION['ClientViewProficiency'] = $rows['englishProficiency'];
            /********************************************************/

            /****************For address view*******************/
            $_SESSION['ClientViewStreet'] = $rows['street'];
            $_SESSION['ClientViewCity'] = $rows['city'];
            $_SESSION['ClientViewCounty'] = $rows['county'];
            $_SESSION['ClientViewState'] = $rows['state'];
            $_SESSION['ClientViewZipcode'] = $rows['zipcode'];
            $_SESSION['ClientViewPhone'] = $rows['primaryPhone'];
            $_SESSION['ClientViewPhoneType'] = $rows['phoneNumType'];
            $_SESSION['ClientViewAltPhone'] = $rows['altPhone'];
            $_SESSION['ClientViewEmail'] = $rows['email'];
            $_SESSION['ClientMailingStreet'] = $rows['mailingStreet'];
            $_SESSION['ClientMailingCity'] = $rows['mailingCity'];
            $_SESSION['ClientMailingState'] = $rows['mailingState'];
            $_SESSION['ClientMailingZipcode'] = $rows['mailingZipcode'];
            $_SESSION['ClientMailingCounty'] = $rows['mailingCounty'];
            /********************************************************/
            
            /****************For citizenship view*******************/
            $_SESSION['ClientCitizenship'] = $rows['usCitizenshipStatus'];
            $_SESSION['greenCard'] = $rows['alienRegistrationCode'];
            $_SESSION['greenCardExp'] = $rows['alienRegistrationCodeEXP'];
            /********************************************************/  

            /****************For education view*******************/
            $_SESSION['ClientSchoolStatus'] = $rows['inSchool'];
            $_SESSION['ClientHighSchool'] = $rows['highSchoolStatus'];
            $_SESSION['ClientDiploma'] = $rows['highSchooolDiplomaOrEquil'];
            $_SESSION['ClientHighestGrade'] = $rows['highestGradeComplete'];
            /********************************************************/

            /****************For military information view*******************/
            $_SESSION['ClientMilitary'] = $rows['currentMilitaryOrVet'];
            $_SESSION['ClientMilitarySpouse'] = $rows['militarySpouse'];
            $_SESSION['ClientSelective'] = $rows['selectiveService'];
            /********************************************************/

            /****************For employment information view*******************/
            $_SESSION['ClientEmployment'] = $rows['employmentStatus'];
            $_SESSION['ClientPayrate'] = $rows['payRate'];
            $_SESSION['ClientUI'] = $rows['unemployemntInsurance'];
            $_SESSION['ClientUIWeeks'] = $rows['unemploymentWeeks'];
            $_SESSION['ClientFarmWorker'] = $rows['farmworker12Months'];
            $_SESSION['ClientJobTitle'] = $rows['desiredJobTitle'];
            $_SESSION['ClientTechExperience'] = $rows['techExperience'];

            /********************************************************/

            /****************For household and Income information view*******************/
            $_SESSION['ClientFamilySize'] = $rows['familySize'];
            $_SESSION['ClientFamilyIncome'] = $rows['annualizedFamilyIncome'];
            /********************************************************/

            /****************For service information view*******************/
            $_SESSION['ClientFosterCare'] = $rows['fosterCare'];
            $_SESSION['ClientAdultEdu'] = $rows['adultEducationWIOATittleII'];
            $_SESSION['ClientYouthBuild'] = $rows['youthBuild'];
            $_SESSION['ClientYouthBuildNum'] = $rows['youthBuildGrant'];
            $_SESSION['ClientJobCorps'] = $rows['jobCorps'];
            $_SESSION['ClientCarlPerkins'] = $rows['vocationalEducationCarlPerkins'];
            $_SESSION['ClientTANF'] = $rows['tanfRecipient'];
            $_SESSION['ClientSSI'] = $rows['ssiRecipient'];
            $_SESSION['ClientGA'] = $rows['gaRecipient'];
            $_SESSION['ClientSNAP'] = $rows['snapRecipientCalFresh'];
            $_SESSION['ClientRCA'] = $rows['rcaRecipient'];
            $_SESSION['ClientSSDI'] = $rows['ssdiRecipient'];
            $_SESSION['ClientTrainingProgram'] = $rows['snapEmploymentAndTrainingProgram'];
            $_SESSION['ClientPellGrant'] = $rows['pellGrant'];
            /********************************************************/

            /****************For hardship information view*******************/
            $_SESSION['ClientTicket'] = $rows['ticketToWork'];
            $_SESSION['ClientHomeless'] = $rows['homelessStatus'];
            $_SESSION['ClientExOffender'] = $rows['exOffender'];
            $_SESSION['ClientDisplace'] = $rows['displacedHomemaker'];
            $_SESSION['ClientDisability'] = $rows['IsDisability'];
            $_SESSION['ClientDisabilityDes'] = $rows['disabilityDescription'];
            $_SESSION['ClientSingleParent'] = $rows['singleParent'];
            $_SESSION['ClientCulturalBarriers'] = $rows['culturalBarriers'];
            /********************************************************/
            }
            $stmt -> close();
            $conn -> close();  
        }
    }
    else{
        header("Location: ../participantDash1-2.php");
        exit();
    }

    header("Location: ../clientPersonalView.php");
    exit();
?>