<?php

    // Start session and check if user is logged in
    session_start();
    if (!isset($_SESSION['userID'])) {
        //if error, force a logout
     session_unset();
     session_destroy();
        // Redirect user to login page if not logged in
       header("Location: ../Login.php");
       exit();
    }


    // Include database connection
    require_once 'dbh.inc.php';

    $userID = $_SESSION['userID'];

    /* survey1 */
    $partner          =$_POST['partner'];
    $fname	          =$_POST['fname'];
    $mname		      =$_POST['mname'];

    if(empty($mname)){
        $mname = NULL;
    }

    $lname            =$_POST['lname'];
    $SSN          	  =$_POST['SSN'];
    $street           =$_POST['street'];
    $city             =$_POST['city'];
    $state            =$_POST['state'];
    $zip		      =$_POST['zip'];
    $county           =$_POST['county'];
    $sameAdd          =$_POST['sameAdd'];

    $mailStreet	      =$_POST['mailStreet'];
    $mailCity		  =$_POST['mailCity'];
    $mailState	      =$_POST['mailState'];
    $mailZip  	      =$_POST['mailZip'];
    $mailCounty  	  =$_POST['mailCounty'];

    $phone            =$_POST['phone'];
    $phoneType        =$_POST['phoneType'];
    $alPhone          =$_POST['alPhone'];

    if(empty($alPhone)){
        $alPhone = NULL;
    }

    $email            =$_POST['email'];
    $bthday           =$_POST['bthday'];
    $gender           =$_POST['gender'];
    $otherAns		  =$_POST['otherAns'];

    if($sameAdd === 'No'){
        if(empty($mailStreet)||empty($mailCity)||empty($mailState)||empty($mailZip)||empty($mailCounty)){
            header ("Location: ../participantDash1-2.php?error=mandatoryMailing");
            //stop the code to run
            exit();
        }
    }

    if($gender === 'other'){
        if(empty($otherAns)){
            header("Location: ../participantDash1-2?error=mandatoryGenderDescription");
        }
        $gender = $otherAns;
    }

    /* survey 2 */
    $citizenship	                =$_POST['citizenship'];

    $uscisNumber                    =$_POST['uscisNumber'];
    $uscisExpired                   =$_POST['uscisExpired'];

    if(empty($uscisNumber)){
        $uscisNumber = NULL;
    }
    if(empty($uscisExpired)){
        $uscisExpired = NULL;
    }

    $selective                      =$_POST['selective'];
    $hispanic                       =$_POST['hispanic'];

    isset($_POST['americanIndian_alaskanNative']) ? 'Yes' : 'No';
    isset($_POST['americanIndian_alaskanNative']) ? 'Yes' : 'No';

    isset($_POST['hawaiian_other']) ? 'Yes' : 'No';
    isset($_POST['noAnswer']) ? 'Yes' : 'No';


    $americanIndian_alaskanNative   =isset($_POST['americanIndian_alaskanNative']) ? 'Yes' : 'No';
    $africanAmerican_black         =isset($_POST['africanAmerican_black']) ? 'Yes' : 'No';
    $asian                          =isset($_POST['asian']) ? 'Yes' : 'No';
    $hawaiian_other                 =isset($_POST['hawaiian_other']) ? 'Yes' : 'No';
    $white                          =isset($_POST['whitle']) ? 'Yes' : 'No';
    $noAnswer                       =isset($_POST['noAnswer']) ? 'Yes' : 'No';

    if($americanIndian_alaskanNative == 'No' && $africanAmerican_black == 'No' && $asian == 'No' && $hawaiian_other == 'No' && $white == "No"){
        $noAnswer = 'Yes';
    }

    if(empty($africanAmerican_black)){
        $africanAmerican_black = NULL;
    }
    if(empty($americanIndian_alaskanNative)){
        $americanIndian_alaskanNative = NULL;
    }
    if(empty($asian)){
        $asian = NULL;
    }
    if(empty($hawaiian_other)){
        $hawaiian_other = NULL;
    }
    if(empty($white)){
        $white = NULL;
    }

    $language                =$_POST['language'];
    $proficiency             =$_POST['proficiency'];

    if(empty($proficiency)){
        $proficiency = NULL;
    }

    $disability              =$_POST['disability'];
    $typeDisability          =$_POST['typeDisability'];

    if(empty($typeDisability)){
        $typeDisability = NULL;
    }

    $schoolLevel             =$_POST['schoolLevel'];
    $diploma                 =$_POST['diploma'];
    $highestSchool           =$_POST['highestSchool'];
    $schoolStatus            =$_POST['schoolStatus'];

    /* survey 3 */
    $currentMilitaryOrVet    =$_POST['military'];
    $militarySpouse          =$_POST['militarySpouse'];
    $employment              =$_POST['employment'];
    $payRate                 =$_POST['payRate'];

    if(empty($payRate)){
        $payRate = NULL;
    }

    $ui                      =$_POST['ui'];
    $uiWeek                  =$_POST['uiWeek'];

    if(empty($uiWeek)){
        $uiWeek = NULL;
    }

    $farmworker              =$_POST['farmworker'];
    $jobTitle                =$_POST['jobTitle'];

    /* survey 4 */
    $foster                  =$_POST['foster'];
    $adultEdu                =$_POST['adultEdu'];
    $youthBuild              =$_POST['youthBuild'];
    $youthGrantNum           =$_POST['youthGrantNum'];

    if(empty($youthGrantNum)){
        $youthGrantNum = NULL;
    }

    $jobCorp                 =$_POST['jobCorp'];
    $carlPerkins             =$_POST['carlPerkins'];
    $tanf                    =$_POST['tanf'];
    $ssi                     =$_POST['ssi'];
    $generalAssist           =$_POST['generalAssist'];
    $calFresh                =$_POST['calFresh'];
    $refugeeAssist           =$_POST['refugeeAssist'];
    $ssdi                    =$_POST['ssdi'];
    $snapTraining            =$_POST['snapTraining'];
    $pellGrant               =$_POST['pellGrant'];

    /* survey 5 */
    $workTicket              =$_POST['workTicket'];
    $homeless                =$_POST['homeless'];
    $exOffer                 =$_POST['exOffer'];
    $displace                =$_POST['displace'];
    $singleParent            =$_POST['singleParent'];
    $culBarrier              =$_POST['culBarrier'];
    $familySize              =$_POST['familySize'];
    $annualIncome            =$_POST['annualIncome'];
    $techExp                 =$_POST['techExp'];

    if(empty($partner)||empty($fname)||empty($lname)||empty($SSN)||empty($street)||empty($city)||empty($state)||empty($zip)||empty($county)||empty($phone)||empty($phoneType)||empty($email)||empty($bthday)||empty($gender)
        ||empty($citizenship)||empty($selective)||empty($hispanic)||empty($language)||empty($proficiency)||empty($disability)||empty($schoolLevel)||empty($diploma)||empty($highestSchool)||empty($schoolStatus)
        ||empty($currentMilitaryOrVet)||empty($militarySpouse)||empty($employment)||empty($ui)||empty($farmworker)||empty($jobTitle)
        ||empty($foster)||empty($adultEdu)||empty($youthBuild)||empty($jobCorp)||empty($carlPerkins)||empty($tanf)||empty($ssi)||empty($generalAssist)||empty($calFresh)||empty($refugeeAssist)||empty($ssdi)||empty($snapTraining)
        ||empty($pellGrant)||empty($workTicket)||empty($homeless)||empty($exOffer)||empty($displace)||empty($singleParent)||empty($culBarrier)||empty($familySize)||empty($annualIncome)||empty($techExp))
    {
        //check empty fields
        // redirect to surveyTest page
        header ("Location: ../participantDash1-2.php?error=emptyfields");
        // //stop the code to run
        exit();
    }

    $sqlPart = "UPDATE participation p
                SET p.fname = ?,
                    p.lname = ?,
                    p.MI = ?,
                    p.email = ?,
                    p.programPartnerReference = ?,
                    p.last4SSN = ?,
                    p.DOB = ?,
                    p.gender = ?,
                    p.primaryPhone = ?,
                    p.phoneNumType = ?,
                    p.altPhone = ?
                WHERE userID = ?";

    $sqlAddress = "UPDATE address a
                SET a.street = ?,
                a.city = ?,
                a.state = ?,
                a.zipcode = ?,
                a.county = ?,
                a.mailingStreet = ?,
                a.mailingCity = ?,
                a.mailingState = ?,
                a.mailingZipcode = ?,
                a.mailingCounty = ?
                WHERE userID = ?";

    $sqlCitizen = "UPDATE citizen c
                SET c.usCitizenshipStatus = ?,
                c.alienRegistrationCode = ?,
                c.alienRegistrationCodeEXP = ?
                WHERE userID = ?";

    $sqlEthnicity = "UPDATE ethnicity eth
                SET eth.hispanicHeritage = ?,
                eth.africanAmercian_black = ?,
                eth.americanIndian_alaskanNative = ?,
                eth.asian = ?,
                eth.hawaiian_other = ?,
                eth.white = ?,
                eth.noAnswer = ?,
                eth.primaryLanguage = ?,
                eth.englishProficiency = ?

                WHERE userID = ?";

    $sqlEducation = "UPDATE education edu
                SET edu.highSchoolStatus = ?,
                edu.highSchooolDiplomaOrEquil = ?,
                edu.highestGradeComplete = ?,
                edu.inSchool = ?
                WHERE userID = ?";

    $sqlEmployment = "UPDATE employment e
                SET e.currentMilitaryOrVet = ?,
                e.militarySpouse = ?,
                e.selectiveService = ?,
                e.employmentStatus = ?,
                e.payRate = ?,
                e.unemployemntInsurance = ?,
                e.unemploymentWeeks = ?,
                e.farmworker12Months = ?,
                e.desiredJobTitle = ?,
                e.techExperience = ?
                WHERE userID = ?";

    $sqlServices = "UPDATE services s
                SET s.fosterCare = ?,
                s.adultEducationWIOATittleII = ?,
                s.youthBuild = ?,
                s.youthBuildGrant = ?,
                s.jobCorps = ?,
                s.vocationalEducationCarlPerkins = ?,
                s.tanfRecipient = ?,
                s.ssiRecipient = ?,
                s.gaRecipient = ?,
                s.snapRecipientCalFresh = ?,
                s.rcaRecipient = ?,
                s.ssdiRecipient = ?,
                s.snapEmploymentAndTrainingProgram = ?,
                s.pellGrant = ?
                WHERE userID = ?";

    $sqlHardship = "UPDATE hardship h
                SET h.ticketToWork = ?,
                h.homelessStatus = ?,
                h.exOffender = ?,
                h.displacedHomemaker = ?,
                h.IsDisability = ?,
                h.disabilityDescription = ?,
                h.singleParent = ?,
                h.culturalBarriers = ?,
                h.familySize = ?,
                h.annualizedFamilyIncome = ?
                WHERE userID = ?";

                //WHERE p.userID = '$userID'";


    // Prepare and bind for 'Participation' table
    $stmtPart = $conn->prepare($sqlPart);
    $stmtPart->bind_param("sssssisssssi", $fname, $lname, $mname, $email, $partner, $SSN, $bthday, $gender, $phone, $phoneType, $alPhone, $userID);
    $stmtPart->execute();

    // Prepare and bind for 'Address' table
    $stmtAddress = $conn->prepare($sqlAddress);
    $stmtAddress->bind_param("sssissssisi", $street, $city, $state, $zip, $county, $mailStreet, $mailCity, $mailState, $mailZip, $mailCounty, $userID);
    $stmtAddress->execute();

    // Prepare and bind for 'Citizen' table
    $stmtCitizen = $conn->prepare($sqlCitizen);
    $stmtCitizen->bind_param("sisi", $citizenship, $uscisNumber, $uscisExpired, $userID);
    $stmtCitizen->execute();

    // Prepare and bind for 'Ethnicity' table
    $stmtEthnicity = $conn->prepare($sqlEthnicity);
    $stmtEthnicity->bind_param("sssssssssi", $hispanic, $africanAmercian_black, $americanIndian_alaskanNative, $asian, $hawaiian_other, $white, $noAnswer, $language, $proficiency, $userID);
    $stmtEthnicity->execute();

    // Prepare and bind for 'Education' table
    $stmtEducation = $conn->prepare($sqlEducation);
    $stmtEducation->bind_param("ssssi", $schoolLevel, $diploma, $highestSchool, $schoolStatus, $userID);
    $stmtEducation->execute();

    // Prepare and bind for 'Employment' table
    $stmtEmployment = $conn->prepare($sqlEmployment);
    $stmtEmployment->bind_param("ssssisisssi", $currentMilitaryOrVet, $militarySpouse, $selective, $employment, $payRate, $ui, $uiWeek, $farmworker, $jobTitle, $techExp, $userID);
    $stmtEmployment->execute();

    // Prepare and bind for 'Services' table
    $stmtServices = $conn->prepare($sqlServices);
    $stmtServices->bind_param("ssssssssssssssi", $foster, $adultEdu, $youthBuild, $youthGrantNum, $jobCorp, $carlPerkins, $tanf, $ssi, $generalAssist, $calFresh, $refugeeAssist, $ssdi, $snapTraining, $pellGrant, $userID);
    $stmtServices->execute();

    // Prepare and bind for 'Services' table
    $stmtHardship = $conn->prepare($sqlHardship);
    $stmtHardship->bind_param("ssssssssiii", $workTicket, $homeless, $exOffer, $displace, $disability, $typeDisability, $singleParent, $culBarrier, $familySize, $annualIncome, $userID);
    $stmtHardship->execute();

    if (!$stmtPart->error && !$stmtAddress->error && !$stmtCitizen->error && !$stmtEthnicity->error && !$stmtEducation->error && !$stmtEmployment->error && !$stmtServices->error && !$stmtHardship->error) {
        header("Location: ../participantDash1-2.php?saveUpdatingRecord=success");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);

        header("Location: ../participantDash1-2.php?ErrorUpdatingRecord=fail");
        exit();
    }

    $stmtPart->close();
    $stmtAddress->close();
    $stmtCitizen->close();
    $stmtEthnicity->close();
    $stmtEducation->close();
    $stmtEmployment->close();
    $stmtServices->close();
    $stmtHardship->close();
?>
