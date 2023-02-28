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
    $currentMilitaryOrVet     =$_POST['military'];
    $militarySpouse           =$_POST['militarySpouse'];

    // Update the database with the new personal information  
    $sql = "UPDATE participation p
            INNER JOIN address a ON p.userID = a.userID 
            INNER JOIN citizen c ON p.userID = c.userID
            INNER JOIN ethnicity eth ON p.userID = eth.userID
            INNER JOIN education edu ON p.userID = edu.userID
            INNER JOIN employment e ON p.userID = e.userID
            
            SET p.fname = '$fname',
                p.lname = '$lname',
                p.MI = '$mname',
                p.email = '$email',
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
                e.militarySpouse = '$militarySpouse'

            WHERE p.userID = '$userID'";

    if (mysqli_query($conn, $sql)) {
        echo "Participation information saved successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>