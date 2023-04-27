<?php
    session_start();
if (isset($_SESSION['adminLogin'])){       
  
    require './dbh.inc.php';

    $id = $_GET['id'];
    $_SESSION['role'] = 'New Client';//Using separate new client and client
    $admin = $_SESSION['adminLogin'];

    $stmt = $conn -> prepare("SELECT * FROM PARTICIPATION AS client JOIN ADDRESS AS addr ON client.userID = addr.userID JOIN CITIZEN AS citizen ON addr.userID = citizen.userID JOIN ETHNICITY AS races ON citizen.userID = races.userID JOIN EDUCATION AS edu ON races.userID = edu.userID JOIN EMPLOYMENT AS emp ON edu.userID = emp.userID JOIN SERVICES AS serv ON emp.userID = serv.userID JOIN HARDSHIP AS hard ON serv.userID = hard.userID WHERE client.userID = ?;");

    
    $stmt -> bind_param("i", $id);
    
    if($stmt ->execute()){
        $result = $stmt -> get_result();
        
        if($result -> num_rows > 0){
            while($rows = $result ->fetch_assoc()){
            /****************For demographic view*******************/
                $_SESSION['viewID'] = $rows['userID'];
                $_SESSION['clientStatus'] = $rows['status'];
                $_SESSION['viewFname'] = $rows['fname'];
                $_SESSION['viewMI'] = $rows['MI'];
                $_SESSION['viewLname'] = $rows['lname'];
                $_SESSION['DOB'] = $rows['DOB'];
                $_SESSION['viewDOB'] = date('m-d-Y', strtotime($rows['DOB']));
                $_SESSION['view4SSN'] = $rows['last4SSN'];
                $_SESSION['asian'] = $rows['asian'];
                $_SESSION['hispanic'] = $rows['hispanicHeritage'];
                $_SESSION['black'] = $rows['africanAmercian_black'];
                $_SESSION['native'] = $rows['americanIndian_alaskanNative'];
                $_SESSION['hawaiian'] = $rows['hawaiian_other'];
                $_SESSION['white'] = $rows['white'];
                $_SESSION['noRaces'] = $rows['noAnswer'];

                //Get gender and convert to title string for display
                $_SESSION['viewGender'] = ucwords($rows['gender']);
    
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
                    $_SESSION['viewRaces'] = "N/A";
                }
                $_SESSION['viewRaces'] = implode(", ", $ethnicity);
                /*************************************/
                $_SESSION['viewProgram'] = $rows['programPartnerReference'];
                $_SESSION['viewLanguage'] = $rows['primaryLanguage'];
                $_SESSION['viewProficiency'] = $rows['englishProficiency'];
            /********************************************************/

            /****************For address view*******************/
            $_SESSION['viewStreet'] = $rows['street'];
            $_SESSION['viewCity'] = $rows['city'];
            $_SESSION['viewCounty'] = $rows['county'];
            $_SESSION['viewState'] = $rows['state'];
            $_SESSION['viewZipcode'] = $rows['zipcode'];
            $_SESSION['viewPhone'] = $rows['primaryPhone'];
            $_SESSION['viewPhoneType'] = $rows['phoneNumType'];
            $_SESSION['viewAltPhone'] = $rows['altPhone'];
            $_SESSION['viewEmail'] = $rows['email'];
            $_SESSION['mailingStreet'] = $rows['mailingStreet'];
            $_SESSION['mailingCity'] = $rows['mailingCity'];
            $_SESSION['mailingState'] = $rows['mailingState'];
            $_SESSION['mailingZipcode'] = $rows['mailingZipcode'];
            $_SESSION['mailingCounty'] = $rows['mailingCounty'];
            /********************************************************/
            
            /****************For citizenship view*******************/
            $_SESSION['usCitizenshipStatus'] = $rows['usCitizenshipStatus'];
            $_SESSION['alienRegistrationCode'] = $rows['alienRegistrationCode'];
            $_SESSION['alienRegistrationCodeEXP'] = $rows['alienRegistrationCodeEXP'];
            /********************************************************/  

            /****************For education view*******************/
            $_SESSION['inSchool'] = $rows['inSchool'];
            $_SESSION['highSchoolStatus'] = $rows['highSchoolStatus'];
            $_SESSION['highSchooolDiplomaOrEquil'] = $rows['highSchooolDiplomaOrEquil'];
            $_SESSION['highestGradeComplete'] = $rows['highestGradeComplete'];
            /********************************************************/

            /****************For military information view*******************/
            $_SESSION['currentMilitaryOrVet'] = $rows['currentMilitaryOrVet'];
            $_SESSION['militarySpouse'] = $rows['militarySpouse'];
            $_SESSION['selectiveService'] = $rows['selectiveService'];
            /********************************************************/

            /****************For employment information view*******************/
            $_SESSION['employmentStatus'] = $rows['employmentStatus'];
            $_SESSION['viewPayrate'] = $rows['payRate'];
            $_SESSION['unemployemntInsurance'] = $rows['unemployemntInsurance'];
            $_SESSION['unemploymentWeeks'] = $rows['unemploymentWeeks'];
            $_SESSION['farmworker12Months'] = $rows['farmworker12Months'];
            $_SESSION['desiredJobTitle'] = $rows['desiredJobTitle'];
            $_SESSION['techExperience'] = $rows['techExperience'];

            /********************************************************/

            /****************For household and Income information view*******************/
            $_SESSION['familySize'] = $rows['familySize'];
            $_SESSION['annualizedFamilyIncome'] = $rows['annualizedFamilyIncome'];
            /********************************************************/

            /****************For service information view*******************/
            $_SESSION['fosterCare'] = $rows['fosterCare'];
            $_SESSION['adultEducationWIOATittleII'] = $rows['adultEducationWIOATittleII'];
            $_SESSION['youthBuild'] = $rows['youthBuild'];
            $_SESSION['youthBuildGrant'] = $rows['youthBuildGrant'];
            $_SESSION['jobCorps'] = $rows['jobCorps'];
            $_SESSION['vocationalEducationCarlPerkins'] = $rows['vocationalEducationCarlPerkins'];
            $_SESSION['tanfRecipient'] = $rows['tanfRecipient'];
            $_SESSION['ssiRecipient'] = $rows['ssiRecipient'];
            $_SESSION['gaRecipient'] = $rows['gaRecipient'];
            $_SESSION['snapRecipientCalFresh'] = $rows['snapRecipientCalFresh'];
            $_SESSION['rcaRecipient'] = $rows['rcaRecipient'];
            $_SESSION['ssdiRecipient'] = $rows['ssdiRecipient'];
            $_SESSION['snapEmploymentAndTrainingProgram'] = $rows['snapEmploymentAndTrainingProgram'];
            $_SESSION['pellGrant'] = $rows['pellGrant'];

            
            /********************************************************/

            /****************For hardship information view*******************/
            $_SESSION['ticketToWork'] = $rows['ticketToWork'];
            $_SESSION['homelessStatus'] = $rows['homelessStatus'];
            $_SESSION['exOffender'] = $rows['exOffender'];
            $_SESSION['displacedHomemaker'] = $rows['displacedHomemaker'];
            $_SESSION['IsDisability'] = $rows['IsDisability'];
            $_SESSION['disabilityDescription'] = $rows['disabilityDescription'];
            $_SESSION['singleParent'] = $rows['singleParent'];
            $_SESSION['culturalBarriers'] = $rows['culturalBarriers'];
            /********************************************************/

            }
            $stmt -> close();
        }
        /*echo $_SESSION['viewID'];
        echo $_SESSION['viewMI'];
        echo $_SESSION['viewLname'];
        echo $_SESSION['viewDOB'];
        echo $_SESSION['view4SSN'];
        echo $_SESSION['viewGender'];
        echo $_SESSION['viewProgram'];
        echo $_SESSION['viewLanguage'];
        echo $_SESSION['viewProficiency'];*/
    }

    else{
        header("Location: ../Administration1-3.php");
        exit();
    }

    if($_GET['role'] === 'client'){
        $stmt = $conn -> prepare("SELECT * FROM PARTICIPATION AS P JOIN COACH AS co ON P.userID = co.userID JOIN EMPLOYEE AS E ON co.employeeID = E.employeeID WHERE P.userID = ?;");
        
        $stmt -> bind_param("i", $id);

        if($stmt ->execute()){
            $result = $stmt -> get_result();
            $_SESSION['role'] = 'Client';
            if($result -> num_rows > 0){
                while($rows = $result ->fetch_assoc()){
                    $_SESSION['coachID'] = $rows['employeeID'];
                    $_SESSION['coachName'] = $rows['empfname']." ".$rows['empMI']." ".$rows['emplname'];
                }
            }
            $stmt -> close();
        }
        else {
            header("Location: ../Administration1-3.php");
            exit();
        }  
    }
    $conn -> close();
    
    header("Location: ../clientInfoView.php");
    
    
}
else {
     //if error, force a logout
     session_unset();
     session_destroy();
     if($admin){
        header ("Location: ./LoginAd.php");
        exit();
     }
     else {
        header ("Location: ./Login.php");
        exit();
     }
     
}
?>