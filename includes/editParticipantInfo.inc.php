<?php 
    // Start session and check if user is logged in
    session_start();
    if (!isset($_SESSION['userID'])) {
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
    $lname            =$_POST['lname'];
    $password         =$_POST['password'];
    $confirmPassword  =$_POST['confirmPassword'];
    $SSN          	  =$_POST['SSN'];
    $street           =$_POST['street'];
    $city             =$_POST['city'];
    $state            =$_POST['state'];
    $zip		      =$_POST['zip'];
    $county           =$_POST['county'];
    //$sameAdd          =$_POST['sameAdd'];
    $mailStreet	      =$_POST['mailStreet'];
    $mailCity		  =$_POST['mailCity'];
    $mailState	      =$_POST['mailState'];
    $mailZip  	      =$_POST['mailZip'];
    $mailCounty  	  =$_POST['mailCounty'];
    $phone            =$_POST['phone'];
    $phoneType	      =$_POST['phoneType'];
    $alPhone          =$_POST['alPhone'];
    $email            =$_POST['email'];
    $bthday           =$_POST['bthday'];
    $gender           =$_POST['gender'];
    //$otherAns		  =$_POST['otherAns'];

    /* survey 2 */
    $citizenship	  =$_POST['citizenship'];
    $uscisNumber      =$_POST['uscisNumber'];
    $uscisExpired     =$_POST['uscisExpired'];
    //$selective        =$_POST['selective'];
    $hispanic         =$_POST['hispanic'];
    $race             =$_POST['race'];
    $language         =$_POST['language'];
    $proficiency      =$_POST['proficiency'];
    //$disability       =$_POST['disability'];
    //$typeDisability   =$_POST['typeDisability'];
    $schoolLevel      =$_POST['schoolLevel'];
    $diploma          =$_POST['diploma'];
    $highestSchool    =$_POST['highestSchool'];
    $schoolStatus     =$_POST['schoolStatus'];

    /* survey 3 */
    $currentMilitaryOrVet    =$_POST['military'];
    $militarySpouse          =$_POST['militarySpouse'];
    $employment              =$_POST['employment'];
    $payRate                 =$_POST['payRate'];
    $ui                      =$_POST['ui'];
    $uiWeek                  =$_POST['uiWeek'];
    $farmworker              =$_POST['farmworker'];
    $jobTitle                =$_POST['jobTitle'];
    $techExp                 =$_POST['techExp'];

    /* survey 4 */
    $foster                  =$_POST['foster'];
    $adultEdu                =$_POST['adultEdu'];
    $youthBuild              =$_POST['youthBuild'];
    $youthGrantNum           =$_POST['youthGrantNum'];
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



    // Update the database with the new personal information  
    $sql = "UPDATE participation p
            INNER JOIN address a ON p.userID = a.userID 
            INNER JOIN citizen c ON p.userID = c.userID
            INNER JOIN ethnicity eth ON p.userID = eth.userID
            INNER JOIN education edu ON p.userID = edu.userID
            INNER JOIN employment e ON p.userID = e.userID
            INNER JOIN services s ON p.userID = s.userID
            INNER JOIN hardship h ON p.userID = h.userID
            
            SET p.fname = '$fname',
                p.lname = '$lname',
                p.MI = '$mname',
                p.email = '$email',
                p.newUserPassword = '$password',
                p.newUserPassword = '$confirmPassword',
                p.programPartnerReference = '$partner',
                p.last4SSN = '$SSN',
                p.DOB = '$bthday',
                p.gender = '$gender',
                p.primaryPhone = '$phone',
                p.phoneNumType = '$phoneType',
                p.altPhone = '$alPhone',
                p.email = '$email',

                a.street = '$street',
                a.city = '$city',
                a.state = '$state',
                a.zipcode = '$zip',
                a.country = '$county',
                a.mailingStreet = '$mailStreet',
                a.mailingCity = '$mailCity',
                a.mailingState = '$mailState',
                a.mailingZipcode = '$mailZip',
                a.mailingCountry = '$mailCounty',

                c.usCitizenshipStatus = '$citizenship',
                c.alienRegistrationCode = '$uscisNumber',
                c.alienRegistrationCodeEXP = '$uscisExpired',

                eth.hispanicHeritage = '$hispanic',
                eth.race = '$race',
                eth.primaryLanguage = '$language',
                eth.englishProficiency = '$proficiency',

                edu.highSchoolStatus = '$schoolLevel',
                edu.highSchooolDiplomaOrEquil = '$diploma',
                edu.highestGradeComplete = '$highestSchool',
                edu.inSchool = '$schoolStatus',

                e.currentMilitaryOrVet = '$currentMilitaryOrVet',
                e.militarySpouse = '$militarySpouse',
                e.employmentStatus = '$employment',
                e.payRate = '$payRate',
                e.unemployemntInsurance = '$ui',
                e.unemploymentWeeks = '$uiWeek',
                e.farmworker12Months = '$farmworker',
                e.desiredJobTitle = '$jobTitle',
                e.techExperience ='$techExp',

                s.fosterCare = '$foster',
                s.adultEducationWIOATittleII = '$adultEdu',
                s.youthBuild = '$youthBuild',
                s.youthBuildGrant = '$youthGrantNum',
                s.jobCorps = '$jobCorp',
                s.vocationalEducationCarlPerkins = '$carlPerkins',
                s.tanfRecipient = '$tanf',
                s.ssiRecipient = '$ssi',
                s.gaRecipient = '$generalAssist',
                s.snapRecipientCalFresh = '$calFresh',
                s.rcaRecipient = '$refugeeAssist',
                s.ssdiRecipient = '$ssdi',
                s.snapEmploymentAndTrainingProgram = '$snapTraining',
                s.pellGrant = '$pellGrant',

                h.ticketToWork = '$workTicket',
                h.homelessStatus = '$homeless',
                h.exOffender = '$exOffer',
                h.displacedHomemaker = '$displace',
                h.singleParent = '$singleParent',
                h.culturalBarriers = '$culBarrier',
                h.familySize = '$familySize',
                h.annualizedFamilyIncome = '$annualIncome'

            WHERE p.userID = '$userID'";

    if (mysqli_query($conn, $sql)) {
        echo "Participation information saved successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
