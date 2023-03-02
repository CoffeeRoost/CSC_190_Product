<?php
session_start();
 // Start session and check if user is logged in
if (!isset($_SESSION['userID'])) {
     //Redirect user to login page if not logged in
    header("Location:Login.php");
    exit();
}
 //connect to database
 require_once ('includes/dbh.inc.php');

 // Get the user ID from the session variable
$userID = $_SESSION['userID'];

 //  Prepare the query
$query = "SELECT part.userID,part.fname,part.lname,part.MI,part.email,part.newUserPassword,part.last4SSN,part.programPartnerReference,
                 part.primaryPhone,part.phoneNumType,part.altPhone,part.DOB,part.gender,
                 
                 a.street,a.city,a.state,a.zipcode,a.country,
                 a.mailingStreet,a.mailingCity,a.mailingState,a.mailingZipcode,a.mailingCountry,

                 c.usCitizenshipStatus,c.alienRegistrationCode,c.alienRegistrationCodeEXP,

                 eth.hispanicHeritage,eth.race,eth.primaryLanguage,eth.englishProficiency,

                 edu.highSchoolStatus,edu.highSchooolDiplomaOrEquil,edu.highestGradeComplete,edu.inSchool,
                 
                 t.coach,t.activityCode,t.trainingProgram, t.startDate, t.endDate,t.notes,

                 e.currentMilitaryOrVet,e.militarySpouse,e.selectiveService,e.employmentStatus,
                 e.payRate,e.unemployemntInsurance,e.unemploymentWeeks,e.farmworker12Months,
                 e.desiredJobTitle,e.techExperience,

                 s.fosterCare,s.adultEducationWIOATittleII,s.youthBuild,s.youthBuildGrant,
                 s.jobCorps,s.vocationalEducationCarlPerkins,s.tanfRecipient,s.ssiRecipient,
                 s.gaRecipient,s.snapRecipientCalFresh,s.rcaRecipient,s.ssdiRecipient,
                 s.snapEmploymentAndTrainingProgram,s.pellGrant,

                 h.ticketToWork,h.homelessStatus,h.exOffender,h.displacedHomemaker,h.singleParent,
                 h.culturalBarriers,h.familySize,h.annualizedFamilyIncome

           FROM participation part
           JOIN address a
           ON part.userID=a.userID
           JOIN citizen c
           ON part.userID=c.userID
           JOIN ethnicity eth
           ON part.userID=eth.userID
           JOIN education edu
           ON part.userID=edu.userID
           JOIN participationReportActivity t
           On part.userID=t.userID
           JOIN employment e
           ON part.userID=e.userID
           JOIN services s
           ON part.userID=s.userID
           JOIN hardship h
           ON part.userID=h.userID

           WHERE part.userID = ?";

// Create a prepared statement
$stmt = $conn->prepare($query);

// Bind the parameter to the statement
$stmt->bind_param("i", $userID);

// Execute the statement
$stmt->execute();
// Get the results
$result = $stmt->get_result();



//  Display some personal information from the database tables using php 
                      // Fetch the data
                          while($row=mysqli_fetch_assoc($select_user_information_query)){
                            //data from participation survey
                            $userID=$row['userID'];
                            $last4SSN= $row['last4SSN'];
                            $programPartnerReference= $row['programPartnerReference'];
                            $fname= $row['fname'];
                            $mname=$row['MI'];
                            $lname=$row['lname'];
                            $email= $row['email'];
                            $primaryPhone=$row['primaryPhone'];
                            $phoneNumType=$row['phoneNumType'];
                            $altPhone=$row['altPhone'];
                            $DOB=$row['DOB'];
                            $gender=$row['gender'];

                            // data from 'Address' table
                            $street= $row['street'];
                            $city= $row['city'];
                            $state= $row['state'];
                            $zipcode=$row['zipcode'];
                            $country=$row['country'];
                            $mailingStreet= $row['mailingStreet'];
                            $mailingCity= $row['mailingCity'];
                            $mailingState= $row['mailingState'];
                            $mailingZipcode=$row['mailingZipcode'];
                            $mailingCountry=$row['mailingCountry'];

                            // data from 'Citizen' table
                            $usCitizenshipStatus=$row['usCitizenshipStatus'];
                            $alienRegistrationCode=$row['alienRegistrationCode'];
                            $alienRegistrationCodeEXP=$row['alienRegistrationCodeEXP'];
                            
                            // data from 'Ethnicity' table
                            $hispanicHeritage=$row['hispanicHeritage'];
                            $race=$row['race'];
                            $primaryLanguage=$row['primaryLanguage'];
                            $englishProficiency=$row['englishProficiency'];

                            // data from 'Education' table
                            $highSchoolStatus=$row['highSchoolStatus'];
                            $highSchooolDiplomaOrEquil=$row['highSchooolDiplomaOrEquil'];
                            $highestGradeComplete=$row['highestGradeComplete'];
                            $inSchool=$row['inSchool'];

                            // data from participation report activity form
                            $coachName= $row ['coach'];
                            $codeActivity= $row ['activityCode'];
                            $trainingProgram= $row ['trainingProgram'];
                            $startDate= $row ['startDate'];
                            $endDate=$row['endDate'];
                            $reportNote= $row['notes'];

                            // data from 'Employment' table
                            $currentMilitaryOrVet= $row['currentMilitaryOrVet'];
                            $militarySpouse= $row['militarySpouse'];
                            $selectiveService= $row['selectiveService'];
                            $employmentStatus= $row['employmentStatus'];
                            $payRate= $row['payRate'];
                            $unemployemntInsurance= $row['unemployemntInsurance'];
                            $unemploymentWeeks= $row['unemploymentWeeks'];
                            $farmworker12Months= $row['farmworker12Months'];
                            $desiredJobTitle= $row['desiredJobTitle'];
                            $techExperience= $row['techExperience'];

                            // data from 'Services' table
                            $fosterCare= $row['fosterCare'];
                            $adultEducationWIOATittleII= $row['adultEducationWIOATittleII'];
                            $youthBuild= $row['youthBuild'];
                            $youthBuildGrant= $row['youthBuildGrant'];
                            $jobCorps= $row['jobCorps'];
                            $vocationalEducationCarlPerkins= $row['vocationalEducationCarlPerkins'];
                            $tanfRecipient= $row['tanfRecipient'];
                            $ssiRecipient= $row['ssiRecipient'];
                            $gaRecipient= $row['gaRecipient'];
                            $snapRecipientCalFresh= $row['snapRecipientCalFresh'];
                            $rcaRecipient= $row['rcaRecipient'];
                            $ssdiRecipient= $row['ssdiRecipient'];
                            $snapEmploymentAndTrainingProgram= $row['snapEmploymentAndTrainingProgram'];
                            $pellGrant= $row['pellGrant'];

                            //data from 'Hardship' table
                            $ticketToWork  =$row['ticketToWork'];
                            $homelessStatus =$row['homelessStatus'];
                            $exOffender =$row['exOffender'];
                            $displacedHomemaker =$row['displacedHomemaker'];
                            $singleParent =$row['singleParent'];
                            $culturalBarriers =$row['culturalBarriers'];
                            $familySize =$row['familySize'];
                            $annualizedFamilyIncome =$row['annualizedFamilyIncome'];
                            $newUserPassword =$row['newUserPassword'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <title>California Mobility Center</title>
</head>
<body>
    <section id = "title">
        <nav class = "navbar navbar-expand-lg bg-Blue">
            <a href="index.php" class = "navbar-brand"><img class="logo" src="image/CMC-logo-horizontal(1).png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fs-4 mx-4" href="./login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
</section>
	<div class="d-flex">
            <div class="d-flex flex-column flex-shrink-1 align-items-center bg-lightBlue w-300" id="sideBar">
               <div>
                    <ul class="nav nav-tabs flex-column align-items-center text-center">
                        <li class="nav-item bg-Blue mt-1 mb-md-1">
                            <a href="#" class="nav-link text-white">
                            <?php
               
                              echo "<h4>Welcome, $fname $lname !</h4>";
                              ?>
                            </a>
                        </li>
                        <li class="nav-item bg-Blue mb-md-1">
                            <a href="#personalInfoTab" class="nav-link text-white" onclick="personalInfoTab()">
                                Personal Information
                             </a>
                        </li>
                        <li class="nav-item bg-Blue mb-md-1">
                            <a href="#editTab" class="nav-link text-white" onclick="editTab()">
                                Edit
                             </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Edit Tab -->
        <div id="editTab" style="display:none;">
            <div class="d-flex flex-column align-items-center mx-5">
            <div class="d-flex justify-center">
            <div class="boxSurvey my-1">
                <form action="includes/editParticipantInfo.inc.php" method="post">
                    <div id="survey1" style="transition: 1ms" class="collapse show">
                        <p class="text-center fs-2">Career Pathways Program</p>
                        <div class="bg-white my-3 border rounded-3">
                            <label for="partner-organization" class="form-label fs-5 m-2">
                                Who referred you to our program or what partner organization are you from?
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select-SM m-2 border rounded-2" name="partner" id="partner">
                                <?php if ($programPartnerReference=='friend&fam') { ?>
                                <option value="friend&fam" selected>Friend and Family</option>
                                <?php } ?>  
                                <?php if ($programPartnerReference=='Hiring_event') { ?>
                                <option value="Hiring_event" selected>Hiring Event or Career Fair</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='Women_Emp') { ?>
                                <option value="Women_Emp" selected>Women's Empowerment</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='NextMove') { ?>
                                <option value="NextMove" selected>Next Move</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='Waking_Village') { ?>
                                <option value="Waking_Village" selected>Waking the Village</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='SaintJ') { ?>
                                <option value="SaintJ" selected>Saint John's</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='LaFam') { ?>
                                <option value="LaFam" selected>La Familia</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='GSU') { ?>
                                <option value="GSU" selected>GS Urban League</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='AsianRe') { ?>
                                <option value="AsianRe" selected>Asian Resources</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='FolsomCP') { ?>
                                <option value="FolsomCP" selected>Folsom Cordova CP</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='LemonH') { ?>
                                <option value="LemonH" selected>Lemon Hill</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='SacJ') { ?>
                                <option value="SacJ" selected>Sac Job Corp</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='Public') { ?>
                                <option value="Public" selected>Public/Aura Planning</option>
                                <?php } ?>
                                <?php if ($programPartnerReference=='International') { ?>
                                <option value="International" selected>International Rescue Committee Sacramento</option>
                                <?php } ?>

                                <option value="friend&fam">Friend and Family</option>
                                <option value="Hiring_event">Hiring Event or Career Fair</option>
                                <option value="Women_Emp">Women's Empowerment</option>
                                <option value="NextMove">Next Move</option>
                                <option value="Waking_Village">Waking the Village</option>
                                <option value="SaintJ">Saint John's</option>
                                <option value="LaFam">La Familia</option>
                                <option value="GSU">GS Urban League</option>
                                <option value="AsianRe">Asian Resources</option>
                                <option value="FolsomCP">Folsom Cordova CP</option>
                                <option value="LemonH">Lemon Hill</option>
                                <option value="SacJ">Sac Job Corp</option>
                                <option value="Public">Public/Aura Planning</option>
                                <option value="International">International Rescue Committee Sacramento</option>
                            </select>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="fname" class="form-label fs-5 m-2">
                                First Name
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="fname" id="fname" class="m-2 input-underline" value="<?php echo $fname?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="mname" class="form-label fs-5 m-2">
                                Middle Name
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="mname" id="mname" class="m-2 input-underline" value="<?php echo $mname?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="lname" class="form-label fs-5 m-2">
                                Last Name
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="lname" id="lname" class="m-2 input-underline" value="<?php echo $lname?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="SSN" class="form-label fs-5 m-2">
                                Last four numbers of your Social Security Number
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="SSN" id="SSN" class="m-2 input-underline" value="<?php echo $last4SSN?>" maxlength="4">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="street" class="form-label fs-5 m-2">
                                Address: Street & Number
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="street" id="street" class="m-2 input-underline" value="<?php echo $street?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="city" class="form-label fs-5 m-2">
                                Address: City
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="city" id="city" class="m-2 input-underline" value="<?php echo $city?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="state" class="form-label fs-5 m-2">
                                Address: State
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="state" id="state" class="m-2 input-underline" value="<?php echo $state?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="zip" class="form-label fs-5 m-2">
                                Address: Zip Code
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="zip" id="zip" class="m-2 input-underline" value="<?php echo $zipcode?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="county" class="form-label fs-5 m-2">
                                Address: County
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="county" id="county" class="m-2 input-underline" value="<?php echo $country?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="sameAdd" class="form-label fs-5 m-2">
                                Is your mailing address information the same as your address information above?
                            </label>
                            <br>
                            <div class="form-check m-2">
                                <?php if (($mailingStreet != null && $mailingCity != null && $mailingCountry != null && $mailingState != null && $mailingZipcode != null ) || 
                                        ($mailingStreet != '' && $mailingCity != '' && $mailingCountry != '' && $mailingState != '' && $mailingZipcode != '')) { ?>
                                    <input class="form-check-input" type="radio" name="sameAdd" id="ysameAdd" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="sameAdd" id="ysameAdd" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ysameAdd">
                                Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($mailingStreet == null || $mailingCity == null || $mailingCountry == null || $mailingState == null || $mailingZipcode == null || 
                                        $mailingStreet == '' || $mailingCity == '' || $mailingCountry == '' || $mailingState == '' || $mailingZipcode == '') { ?>
                                    <input class="form-check-input" type="radio" name="sameAdd" id="difAdd" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="sameAdd" id="difAdd" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="difAdd">
                                No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="mailStreet" class="form-label fs-5 m-2">
                                (If above was No) Mailing Address: Street & Number
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="mailStreet" id="mailStreet" class="m-2 input-underline" value="<?php echo $mailingStreet?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="mailCity" class="form-label fs-5 m-2">
                                Mailing Address: City
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="mailCity" id="mailCity" class="m-2 input-underline" value="<?php echo $mailingCity?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="mailState" class="form-label fs-5 m-2">
                                Mailing Address: State
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="mailState" id="mailState" class="m-2 input-underline" value="<?php echo $mailingCountry?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="mailZip" class="form-label fs-5 m-2">
                                Mailing Address: Zip Code
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="mailZip" id="mailZip" class="m-2 input-underline" value="<?php echo $mailingZipcode?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="mailCounty" class="form-label fs-5 m-2">
                                Mailing Address: County
                                <span class="text-danger">*</span>
                            </label>
                            <br>
                            <input type="text" name="mailCounty" id="mailCounty" class="m-2 input-underline" value="<?php echo $mailingCountry?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="phone" class="form-label fs-5 m-2">
                                Primary Phone Number
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <input type="phone" name="phone" id="phone" class="m-2 input-underline" value="<?php echo $primaryPhone?>">
                            <select class="form-select-SM m-2 border rounded-2" name="phoneType" id="phoneType" >
                                <?php if ($phoneNumType=='cellphone') { ?>
                                    <option value="cellphone" selected>Cell Phone</option>
                                <?php } ?>
                                <?php if ($phoneNumType=='homePhone') { ?>
                                    <option value="homePhone" selected>Home Phone</option>
                                <?php } ?>
                                <?php if ($phoneNumType=='relativesPhone') { ?>
                                    <option value="relativesPhone" selected>Relatives Phone</option>
                                <?php } ?>
                                <?php if ($phoneNumType=='workphone') { ?>
                                    <option value="workphone" selected>Work Phone</option>
                                <?php } ?>
                                <?php if ($phoneNumType=='otherphone') { ?>
                                    <option value="otherphone" selected>Other</option>
                                <?php } ?>
                                
                                <option value="cellphone">Cell Phone</option>
                                <option value="homePhone">Home Phone</option>
                                <option value="relativesPhone">Relatives Phone</option>
                                <option value="workphone">Work Phone</option>
                                <option value="otherphone">Other</option>
                            </select>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="alPhone" class="form-label fs-5 m-2">
                                Alternative Phone Number
                            </label>
                            <br>
                            <input type="phone" name="alPhone" id="alPhone" class="m-2 input-underline" value="<?php echo $altPhone?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="email" class="form-label fs-5 m-2">
                                Primary Email
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <input type="email" name="email" id="email" class="m-2 input-underline" value="<?php echo $email?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="bthday" class="form-label fs-5 m-2">
                                Birthday
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <input type="date" name="bthday" id="bthday" class="m-2 input-underline" value="<?php echo $DOB?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="gender" class="form-label fs-5 m-2">
                                Gender
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($gender=='male') { ?>
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <?php } ?>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($gender=='female') { ?>
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <?php } ?>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($gender=='notSay') { ?>
                                    <input class="form-check-input" type="radio" name="gender" id="notSay" value="notSay" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="gender" id="notSay" value="notSay">
                                <?php } ?>   
                                <label class="form-check-label" for="notSay">
                                    Prefer not to say
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($gender=='other') { ?>
                                    <input class="form-check-input" type="radio" name="gender" id="other" value="other" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                <?php } ?>  
                                <label class="form-check-label" for="other">
                                    Other
                                </label>
                                <input type="text" name="otherAns" id="otherAns" class="m-2 input-underline">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between m-1">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey1" style="border:none;"></button>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey1,#survey2" class="btn btn-primary">Next</button>
                        </div>
                    </div>

                    <!--*************************************************************************************-->

                    <div id="survey2" style="transition: 1ms" class="collapse">
                        <p class="text-center fs-2">Career Pathways Program</p>
                        <div class="bg-white my-3 border rounded-3">
                            <label for="citizenship" class="form-label fs-5 m-2">
                                US Citizenship Status
                                <span class="text-danger">*</span>
                            </label><br>
                            <select class="form-select-SM m-2 border rounded-2" name="citizenship" id="citizenship" >
                                <?php if ($usCitizenshipStatus=='citizen') { ?>
                                <option value="citizen" selected>Citizen of US or US Territory</option>
                                <?php } ?>  
                                <?php if ($usCitizenshipStatus=='greenCard') { ?>
                                <option value="greenCard" selected>US Permanent Resident</option>
                                <?php } ?>  
                                <?php if ($usCitizenshipStatus=='alien') { ?>
                                <option value="alien" selected>Alien/Refugee Lawfully Admitted to the US</option>
                                <?php } ?>  
                                <?php if ($usCitizenshipStatus=='noneCitizen') { ?>
                                <option value="noneCitizen" selected>None of the above</option>
                                <?php } ?>  

                                <option value="citizen">Citizen of US or US Territory</option>
                                <option value="greenCard">US Permanent Resident</option>
                                <option value="alien">Alien/Refugee Lawfully Admitted to the US</option>
                                <option value="noneCitizen">None of the above</option>
                            </select>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="uscisNumber" class="form-label fs-5 m-2">
                                If a U.S. Permanent Resident or an Alien/Refugee lawfully admitted to the U.S., please provide your:
                            </label>
                            <br>
                            <input type="number" name="uscisNumber" id="uscisNumber" class="m-2 input-underline" value="<?php echo $alienRegistrationCode?>">
                            <label for="uscisExpired" class="form-label m-2">
                                Expired Date
                            </label>
                            <input type="date" id="uscisExpired" name="uscisExpired" class="m-2 input-underline" value="<?php echo $alienRegistrationCodeEXP?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="selective" class="form-label fs-5 m-2">
                                Have you registered with the Selective Service? Only applicable for men ages 18 to 25
                            </label>
                            <br>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="selective" id="yselective" value="Yes">
                                <label class="form-check-label" for="yselective">
                                Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="selective" id="nonSelective" value="No">
                                <label class="form-check-label" for="nonSelective">
                                No
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="selective" id="docExemption" value="Documented exemption">
                                <label class="form-check-label" for="docExemption">
                                Documented exemption
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="selective" id="notApplicable" value="Not applicable">
                                <label class="form-check-label" for="notApplicable">
                                Not applicable
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="hispanic" class="form-label fs-5 m-2">
                                Hispanic/Latino Heritage
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($hispanicHeritage=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="hispanic" id="yhispanic" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="hispanic" id="yhispanic" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yhispanic">
                                Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($hispanicHeritage=='No') { ?>
                                    <input class="form-check-input" type="radio" name="hispanic" id="nonhispanic" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="hispanic" id="nonhispanic" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonhispanic">
                                No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="race" class="form-label fs-5 m-2">
                                Race (Ethnicity) check all that apply
                                <span class="text-danger">*</span>
                            </label><br>
                            <select class="form-select-SM m-2 border rounded-2" name="race" id="race">
                                <?php if ($race=='black') { ?>
                                <option value="black" selected>African American/Black</option>
                                <?php } ?>
                                <?php if ($race=='native') { ?>
                                <option value="native" selected>American Indian/Alaskan Native</option>
                                <?php } ?>
                                <?php if ($race=='asian') { ?>
                                <option value="asian" selected>Asian</option>
                                <?php } ?>
                                <?php if ($race=='islander') { ?>
                                <option value="islander" selected>Hawaiian/Other Pacific Islander</option>
                                <?php } ?>
                                <?php if ($race=='white') { ?>
                                <option value="white" selected>White</option>
                                <?php } ?>
                                <?php if ($race=='notAnswer') { ?>
                                <option value="notAnswer" selected>I do not wish to answer</option>
                                <?php } ?>

                                <option value="black">African American/Black</option>
                                <option value="native">American Indian/Alaskan Native</option>
                                <option value="asian">Asian</option>
                                <option value="islander">Hawaiian/Other Pacific Islander</option>
                                <option value="white">White</option>
                                <option value="notAnswer">I do not wish to answer</option>
                            </select>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="language" class="form-label fs-5 m-2">
                                What is your primary language?
                                <span class="text-danger">*</span>
                            </label><br>
                            <select class="form-select-SM m-2 border rounded-2" name="language" id="language">
                                <?php if ($primaryLanguage=='eng') { ?>
                                <option value="eng" selected>English</option>
                                <?php } ?>
                                <?php if ($primaryLanguage=='span') { ?>
                                <option value="span" selected>Spanish</option>
                                <?php } ?>
                                <?php if ($primaryLanguage=='dari') { ?>
                                <option value="dari" selected>Dari</option>
                                <?php } ?>
                                <?php if ($primaryLanguage=='pashto') { ?>
                                <option value="pashto" selected>Pashto</option>
                                <?php } ?>
                                <?php if ($primaryLanguage=='rus') { ?>
                                <option value="rus" selected>Russian</option>
                                <?php } ?>
                                <?php if ($primaryLanguage=='viet') { ?>
                                <option value="viet" selected>Vietnamese</option>
                                <?php } ?>
                                <?php if ($primaryLanguage=='mandarin') { ?>
                                <option value="mandarin" selected>Mandarin</option>
                                <?php } ?>
                                <?php if ($primaryLanguage=='arabic') { ?>
                                <option value="arabic" selected>Arabic</option>
                                <?php } ?>
                                <?php if ($primaryLanguage=='farsi') { ?>
                                <option value="farsi" selected>Farsi</option>
                                <?php } ?>

                                <option value="eng">English</option>
                                <option value="span">Spanish</option>
                                <option value="dari">Dari</option>
                                <option value="pashto">Pashto</option>
                                <option value="rus">Russian</option>
                                <option value="viet">Vietnamese</option>
                                <option value="mandarin">Mandarin</option>
                                <option value="arabic">Arabic</option>
                                <option value="farsi">Farsi</option>
                            </select>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="proficiency" class="form-label fs-5 m-2">
                                Do you have limited proficiency in speaking, writing, reading, or understanding English?
                                or Do you have difficulty in speaking, writing, reading, or understanding English?
                            </label>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($englishProficiency=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="proficiency" id="yproficiency" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="proficiency" id="yproficiency" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yproficiency">
                                Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($englishProficiency=='No') { ?>
                                    <input class="form-check-input" type="radio" name="proficiency" id="nonProficiency" value="No" checked="checked"> 
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="proficiency" id="nonProficiency" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonProficiency">
                                No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="disability" class="form-label fs-5 m-2">
                                Do you have a disability?
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="disability" id="ydisability" value="Yes">
                                <label class="form-check-label" for="ydisability">
                                Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="disability" id="nonDisability" value="No">
                                <label class="form-check-label" for="nonDisability">
                                No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="typeDisability" class="form-label fs-5 m-2">
                                Please use the following space to indicate your disability.
                            </label>
                            <br>
                            <input type="text" name="typeDisability" id="typeDisability" class="m-2 input-underline" placeholder="Your answer">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="schoolLevel" class="form-label fs-5 m-2">
                                Highest school grade completed?
                                <span class="text-danger">*</span>
                            </label><br>
                            <select class="form-select-SM m-2 border rounded-2" name="schoolLevel" id="schoolLevel" >
                                <?php if ($highSchoolStatus=='9th') { ?>
                                <option value="9th" selected>9th grade</option>
                                <?php } ?>
                                <?php if ($highSchoolStatus=='10th') { ?>
                                <option value="10th" selected>10th grade</option>
                                <?php } ?>
                                <?php if ($highSchoolStatus=='11th') { ?>
                                <option value="11th" selected>11th grade</option>
                                <?php } ?>
                                <?php if ($highSchoolStatus=='12th') { ?>
                                <option value="12th" selected>12th grade</option>
                                <?php } ?>

                                <option value="9th">9th grade</option>
                                <option value="10th">10th grade</option>
                                <option value="11th">11th grade</option>
                                <option value="12th">12th grade</option>
                            </select>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="diploma" class="form-label fs-5 m-2">
                                High school diploma or equivalent received
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($highSchooolDiplomaOrEquil=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="diploma" id="ydiploma" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="diploma" id="ydiploma" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ydiploma">
                                Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($highSchooolDiplomaOrEquil=='No') { ?>
                                    <input class="form-check-input" type="radio" name="diploma" id="nonDiploma" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="diploma" id="nonDiploma" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonDiploma">
                                No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="highestSchool" class="form-label fs-5 m-2">
                                Highest school grade completed?
                                <span class="text-danger">*</span>
                            </label><br>
                            <select class="form-select-SM m-2 border rounded-2" name="highestSchool" id="highestSchool" >
                                <?php if ($highestGradeComplete=='highschool') { ?>
                                <option value="highschool" selected>High School Diploma</option>
                                <?php } ?>
                                <?php if ($highestGradeComplete=='ged') { ?>
                                <option value="ged" selected>High School Equivalent Diploma (GED)</option>
                                <?php } ?>
                                <?php if ($highestGradeComplete=='certificate') { ?>
                                <option value="certificate" selected>Certificate of Attendance/Completion (Disabled Individuales)</option>
                                <?php } ?>
                                <?php if ($highestGradeComplete=='schoolCertificate') { ?>
                                <option value="schoolCertificate" selected>Vocational School Certificate</option>
                                <?php } ?>
                                <?php if ($highestGradeComplete=='technical') { ?>
                                <option value="technical" selected>Colllege or Technical or Vocational School</option>
                                <?php } ?>
                                <?php if ($highestGradeComplete=='aa') { ?>
                                <option value="aa" selected>AA</option>
                                <?php } ?>
                                <?php if ($highestGradeComplete=='baAndbs') { ?>
                                <option value="baAndbs" selected>BA/BS</option>
                                <?php } ?>
                                <?php if ($highestGradeComplete=='master') { ?>
                                <option value="master" selected>Master's Degree</option>
                                <?php } ?>
                                <?php if ($highestGradeComplete=='doctor') { ?>
                                <option value="doctor" selected>Doctorate Degree</option>
                                <?php } ?>

                                <option value="highschool">High School Diploma</option>
                                <option value="ged">High School Equivalent Diploma (GED)</option>
                                <option value="certificate">Certificate of Attendance/Completion (Disabled Individuales)</option>
                                <option value="schoolCertificate">Vocational School Certificate</option>
                                <option value="technical">Colllege or Technical or Vocational School</option>
                                <option value="aa">AA</option>
                                <option value="baAndbs">BA/BS</option>
                                <option value="master">Master's Degree</option>
                                <option value="doctor">Doctorate Degree</option>
                            </select>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="schoolStatus" class="form-label fs-5 m-2">
                                School Status
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($inSchool=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="schoolStatus" id="inSchool" value="Yes" checked="checked">
                                <?php } else { ?>
                                <label class="form-check-label" for="inSchool">
                                    <input class="form-check-input" type="radio" name="schoolStatus" id="inSchool" value="Yes">
                                <?php } ?>
                                Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($inSchool=='No') { ?>
                                    <input class="form-check-input" type="radio" name="schoolStatus" id="notInschool" value="No" checked="checked">
                                <?php } else { ?>
                                <label class="form-check-label" for="notInschool">
                                    <input class="form-check-input" type="radio" name="schoolStatus" id="notInschool" value="No">
                                <?php } ?>
                                No
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between m-1">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey1" class="btn btn-primary">Back</button>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey3" class="btn btn-primary">Next</button>
                        </div>
                    </div>
        
                    <!--*************************************************************************************-->
                    
                    <div id="survey3" style="transition: 1ms" class="collapse">
                        <p class="text-center fs-2">Career Pathways Program</p>
                        <div class="bg-white my-3 border rounded-3">
                            <label for="military" class="form-label fs-5 m-2">
                                Are you currently in the U.S. Military or a Veteran?
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($currentMilitaryOrVet=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="military" id="ymilitary" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="military" id="ymilitary" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ymilitary">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($currentMilitaryOrVet=='No') { ?>
                                    <input class="form-check-input" type="radio" name="military" id="nonMilitary" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="military" id="nonMilitary" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonMilitary">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                            <label for="militarySpouse" class="form-label fs-5 m-2">
                                Are you the spouse of a member of the armed forces who is on active duty?
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($militarySpouse=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="militarySpouse" id="ymilitarySpouse" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="militarySpouse" id="ymilitarySpouse" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ymilitarySpouse">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($militarySpouse=='No') { ?>
                                    <input class="form-check-input" type="radio" name="militarySpouse" id="nonMilitarySpouse" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="militarySpouse" id="nonMilitarySpouse" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonMilitarySpouse">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                        <label for="employment" class="form-label fs-5 m-2">
                            Employment Status
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <?php if ($employmentStatus=='Employed') { ?>
                                <input class="form-check-input" type="radio" name="employment" id="yemployment" value="Employed" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="employment" id="yemployment" value="Employed">
                            <?php } ?>
                                <label class="form-check-label" for="yemployment">
                                Employed
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <?php if ($employmentStatus=='Not Employed') { ?>
                                <input class="form-check-input" type="radio" name="employment" id="nonEmployment" value="Not Employed" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="employment" id="nonEmployment" value="Not Employed">
                            <?php } ?>
                            <label class="form-check-label" for="nonEmployment">
                              Not Employed
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <?php if ($employmentStatus=='Employed but received notice of termination or separation from military service') { ?>
                                <input class="form-check-input" type="radio" name="employment" id="termination" value="Employed but received notice of termination or separation from military service" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="employment" id="termination" value="Employed but received notice of termination or separation from military service">
                            <?php } ?>
                                <label class="form-check-label" for="termination">
                                Employed but received notice of termination or separation from military service
                            </label>
                        </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                        <label for="payRate" class="form-label fs-5 m-2">
                            If you are employed, what is your current rate of pay?
                        </label>
                        <br>
                        <input type="number" name="payRate" id="payRate" class="m-2 input-underline" placeholder="Your answer" value="<?php echo $payRate?>">
                        </div>


                        <div class="bg-white my-3 border rounded-3">
                        <label for="ui" class="form-label fs-5 m-2">
                            Are you receiving Unemployment Insurance?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <?php if ($unemployemntInsurance=='Claimant') { ?>
                                <input class="form-check-input" type="radio" name="ui" id="claimant" value="Claimant" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="ui" id="claimant" value="Claimant">
                            <?php } ?>
                                <label class="form-check-label" for="claimant">
                                Claimant
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <?php if ($unemployemntInsurance=='Exhaustee') { ?>
                                <input class="form-check-input" type="radio" name="ui" id="exhaustee" value="Exhaustee" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="ui" id="exhaustee" value="Exhaustee">
                            <?php } ?>
                            <label class="form-check-label" for="exhaustee">
                                Exhaustee
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <?php if ($unemployemntInsurance=='Neither') { ?>
                                <input class="form-check-input" type="radio" name="ui" id="neither" value="Neither" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="ui" id="neither" value="Neither">
                            <?php } ?>
                                <label class="form-check-label" for="neither">
                                Neither
                            </label>
                        </div>
                        </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="uiWeek" class="form-label fs-5 m-2">
                            If you are unemployed, how many weeks have you been unemployed?
                        </label>
                        <br>
                        <input type="number" name="uiWeek" id="uiWeek" class="m-2 input-underline" placeholder="Your answer" value="<?php echo $unemploymentWeeks?>">
                    </div>


                    <div class="bg-white my-3 border rounded-3">
                            <label for="farmworker" class="form-label fs-5 m-2">
                                Have you worked as farmworker in the last 12 months?
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($farmworker12Months=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="farmworker" id="yfarmworker" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="farmworker" id="yfarmworker" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yfarmworker">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($farmworker12Months=='No') { ?>
                                    <input class="form-check-input" type="radio" name="farmworker" id="nonFarmworker" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="farmworker" id="nonFarmworker" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonFarmworker">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                        <label for="jobTitle" class="form-label fs-5 m-2">
                            What is your desired job title?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <input type="text" name="jobTitle" id="jobTitle" class="m-2 input-underline" placeholder="Your answer">
                    </div>

                    <div class="d-flex justify-content-between m-1">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey1" class="btn btn-primary">Back</button>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey3" class="btn btn-primary">Next</button>
                        </div>
                    </div>

                    <!--*************************************************************************************-->

                    <div id="survey3" style="transition: 1ms" class="collapse">
                        <p class="text-center fs-2">Career Pathways Program</p>
                        <div class="bg-white my-3 border rounded-3">
                            <label for="foster" class="form-label fs-5 m-2">
                                Have you been supported through the State's Foster Care System?
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($fosterCare=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="foster" id="yfoster" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="foster" id="yfoster" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yfoster">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($fosterCare=='No') { ?>
                                    <input class="form-check-input" type="radio" name="foster" id="nonFoster" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="foster" id="nonFoster" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonFoster">
                                    No
                                </label>
                            </div>
                        </div>


                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="adultEdu" class="form-label fs-5 m-2">
                                Receiving services from Adult Education (WIOA Title II)
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($adultEducationWIOATittleII=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="adultEdu" id="yadultEdu" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="adultEdu" id="yadultEdu" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yadultEdu">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($adultEducationWIOATittleII=='No') { ?>
                                    <input class="form-check-input" type="radio" name="adultEdu" id="nonAdultEdu" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="adultEdu" id="nonAdultEdu" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonAdultEdu">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="youthBuild" class="form-label fs-5 m-2">
                                Receiving services from Youth Build
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($youthBuild=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="youthBuild" id="yyouthBuild" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="youthBuild" id="yyouthBuild" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yyouthBuild">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($youthBuild=='No') { ?>
                                    <input class="form-check-input" type="radio" name="youthBuild" id="nonYouthBuild" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="youthBuild" id="nonYouthBuild" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonYouthBuild">
                                    No
                                </label>
                            </div>
                        </div>
                        

                    <div class="bg-white my-3 border rounded-3">
                        <label for="youthGrantNum" class="form-label fs-5 m-2">
                            Youth Build Grant Number
                        </label>
                        <br>
                        <input type="text" name="youthGrantNum" id="youthGrantNum" class="m-2 input-underline" placeholder="AA-99999-99-99-A-99" maxlength="19" value="<?php echo $youthBuildGrant?>">
                    </div>


                    <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="jobCorp" class="form-label fs-5 m-2">
                                Receiving services from Job Corps
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($jobCorps=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="jobCorp" id="yjobCorp" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="jobCorp" id="yjobCorp" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yjobCorp">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($jobCorps=='No') { ?>
                                    <input class="form-check-input" type="radio" name="jobCorp" id="nonJobCorp" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="jobCorp" id="nonJobCorp" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonJobCorp">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="carlPerkins" class="form-label fs-5 m-2">
                                Receiving services from Vocational Education (Carl Perkins)
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($vocationalEducationCarlPerkins=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="carlPerkins" id="ycarlPerkins" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="carlPerkins" id="ycarlPerkins" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ycarlPerkins">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($vocationalEducationCarlPerkins=='No') { ?>
                                    <input class="form-check-input" type="radio" name="carlPerkins" id="nonCarl" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="carlPerkins" id="nonCarl" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonCarl">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="tanf" class="form-label fs-5 m-2">
                                Temporary Assistance for Needy Families (TANF) recipient
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($tanfRecipient=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="tanf" id="ytanf" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="tanf" id="ytanf" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ytanf">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($tanfRecipient=='No') { ?>
                                    <input class="form-check-input" type="radio" name="tanf" id="nonTANF" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="tanf" id="nonTANF" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonTANF">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="ssi" class="form-label fs-5 m-2">
                                Supplemental Security Income (SSI) recipient
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($ssiRecipient=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="ssi" id="yssi" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="ssi" id="yssi" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yssi">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($ssiRecipient=='No') { ?>
                                    <input class="form-check-input" type="radio" name="ssi" id="nonSSI" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="ssi" id="nonSSI" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonSSI">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="generalAssist" class="form-label fs-5 m-2">
                                General Assistance (GA) recipient
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($gaRecipient=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="generalAssist" id="ygeneralAssist" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="generalAssist" id="ygeneralAssist" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ygeneralAssist">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($gaRecipient=='No') { ?>
                                    <input class="form-check-input" type="radio" name="generalAssist" id="nonGA" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="generalAssist" id="nonGA" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonGA">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="calFresh" class="form-label fs-5 m-2">
                                Supplemental Nutrition Assistance Program (SNAP) recipient (Cal Fresh)
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($snapRecipientCalFresh=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="calFresh" id="ycalFresh" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="calFresh" id="ycalFresh" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ycalFresh">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($snapRecipientCalFresh=='No') { ?>
                                    <input class="form-check-input" type="radio" name="calFresh" id="nonCalFresh" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="calFresh" id="nonCalFresh" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonCalFresh">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="refugeeAssist" class="form-label fs-5 m-2">
                                Refugee Cash Assistance (RCA) recipient
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($rcaRecipient=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="refugeeAssist" id="yrefugeeAssist" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="refugeeAssist" id="yrefugeeAssist" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yrefugeeAssist">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($rcaRecipient=='No') { ?>
                                    <input class="form-check-input" type="radio" name="refugeeAssist" id="nonRCA" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="refugeeAssist" id="nonRCA" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonRCA">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="ssdi" class="form-label fs-5 m-2">
                                Social Security Disability Insurance (SSDI) recipient
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($ssdiRecipient=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="ssdi" id="yssdi" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="ssdi" id="yssdi" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yssdi">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($ssdiRecipient=='No') { ?>
                                    <input class="form-check-input" type="radio" name="ssdi" id="nonSSDI" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="ssdi" id="nonSSDI" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonSSDI">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="snapTraining" class="form-label fs-5 m-2">
                                Receiving Services under SNAP Employment and Training Program
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($snapEmploymentAndTrainingProgram=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="snapTraining" id="ysnapTraining" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="snapTraining" id="ysnapTraining" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ysnapTraining">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($snapEmploymentAndTrainingProgram=='No') { ?>
                                    <input class="form-check-input" type="radio" name="snapTraining" id="nonSnapTraining" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="snapTraining" id="nonSnapTraining" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonSnapTraining">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="pellGrant" class="form-label fs-5 m-2">
                                Receiving, or has been notified will receive, Pell Grant
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($pellGrant=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="pellGrant" id="ypellGrant" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="pellGrant" id="ypellGrant" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ypellGrant">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($pellGrant=='No') { ?>
                                    <input class="form-check-input" type="radio" name="pellGrant" id="nonPellGrant" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="pellGrant" id="nonPellGrant" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonPellGrant">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between m-1">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey1" class="btn btn-primary">Back</button>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey3" class="btn btn-primary">Next</button>
                        </div>
                    </div>
        
                    <!--*************************************************************************************-->

                    <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="workTicket" class="form-label fs-5 m-2">
                                Ticket-to-Work Holder issued by Social Security Administration
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($ticketToWork=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="workTicket" id="yworkTicket" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="workTicket" id="yworkTicket" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yworkTicket">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($ticketToWork=='No') { ?>
                                    <input class="form-check-input" type="radio" name="workTicket" id="nonwWorkTicket" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="workTicket" id="nonwWorkTicket" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonwWorkTicket">
                                    No
                                </label>
                            </div>
                        </div>
                    
                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="homeless" class="form-label fs-5 m-2"> 
                                Homeless
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($homelessStatus=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="homeless" id="yhomeless" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="homeless" id="yhomeless" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yhomeless">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($homelessStatus=='No') { ?>
                                    <input class="form-check-input" type="radio" name="homeless" id="unhomeless" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="homeless" id="unhomeless" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="unhomeless">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="exOffer" class="form-label fs-5 m-2"> 
                                Ex-Offender
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($exOffender=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="exOffer" id="yExOffer" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="exOffer" id="yExOffer" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yExOffer">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($exOffender=='No') { ?>
                                    <input class="form-check-input" type="radio" name="exOffer" id="nonExOffer" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="exOffer" id="nonExOffer" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonExOffer">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="displace" class="form-label fs-5 m-2"> 
                                Displaced Homemaker
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($displacedHomemaker=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="displace" id="ydisplace" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="displace" id="ydisplace" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ydisplace">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($displacedHomemaker=='No') { ?>
                                    <input class="form-check-input" type="radio" name="displace" id="nonDisplace" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="displace" id="nonDisplace" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonDisplace">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="singleParent" class="form-label fs-5 m-2"> 
                                Single Parent (including single pregnant women)
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($singleParent=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="singleParent" id="ysingleParent" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="singleParent" id="ysingleParent" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="ysingleParent">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($singleParent=='No') { ?>
                                    <input class="form-check-input" type="radio" name="singleParent" id="nonSingle" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="singleParent" id="nonSingle" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="nonSingle">
                                    No
                                </label>
                            </div>
                        </div>

                        <div id="survey3" style="transition: 1ms" class="collapse">
                        <div class="bg-white my-3 border rounded-3">
                            <label for="culBarrier" class="form-label fs-5 m-2"> 
                                Cultural Barriers
                            </label>
                            <span class="text-danger">*</span>
                            <br>
                            <div class="form-check m-2">
                                <?php if ($culturalBarriers=='Yes') { ?>
                                    <input class="form-check-input" type="radio" name="culBarrier" id="yculBarrier" value="Yes" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="culBarrier" id="yculBarrier" value="Yes">
                                <?php } ?>
                                <label class="form-check-label" for="yculBarrier">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <?php if ($culturalBarriers=='No') { ?>
                                    <input class="form-check-input" type="radio" name="culBarrier" id="noBarrier" value="No" checked="checked">
                                <?php } else { ?>
                                    <input class="form-check-input" type="radio" name="culBarrier" id="noBarrier" value="No">
                                <?php } ?>
                                <label class="form-check-label" for="noBarrier">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                        <label for="familySize" class="form-label fs-5 m-2">
                            Family Size
                        </label>
                        <br>
                        <input type="number" name="familySize" id="familySize" class="m-2 input-underline" placeholder="Your answer" value="<?php echo $familySize?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                        <label for="annualIncome" class="form-label fs-5 m-2">
                            Annualized Family Income (last 6 months X2):
                        </label>
                        <br>
                        <input type="number" name="annualIncome" id="annualIncome" class="m-2 input-underline" placeholder="Your answer" value="<?php echo $annualizedFamilyIncome?>">
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                        <label for="techExp" class="form-label fs-5 m-2">
                            Do you have previous technical experience (hobbies, employment, volunteer, personal projects, home improvement, working on vehicle, taking things apart)? Examples of technical experience include knowing how to read blueprints, using hand tools, using power tools, organizing (logistics), and safety
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <?php if ($techExperience=='Yes') { ?>
                                <input class="form-check-input" type="radio" name="techExp" id="ytechExp" value="Yes" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="techExp" id="ytechExp" value="Yes">
                            <?php } ?>
                                <label class="form-check-label" for="ytechExp">
                                Yes
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <?php if ($techExperience=='No') { ?>
                                <input class="form-check-input" type="radio" name="techExp" id="nonTechExp" value="No" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="techExp" id="nonTechExp" value="No">
                            <?php } ?>
                            <label class="form-check-label" for="nonTechExp">
                              No
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <?php if ($techExperience=='Not Sure') { ?>
                                <input class="form-check-input" type="radio" name="techExp" id="notSureTechExp" value="Not Sure" checked="checked">
                            <?php } else { ?>
                                <input class="form-check-input" type="radio" name="techExp" id="notSureTechExp" value="Not Sure">
                            <?php } ?>
                            <label class="form-check-label" for="notSureTechExp">
                                Not Sure
                            </label>
                        </div>
                        </div>

                        <div class="bg-white my-3 border rounded-3">
                              <label for="password" class="form-label fs-5 m-2">
                                  Account Password
                                  <span class="text-danger">*</span>
                              </label>
                              <br>
                              <input type="password" name="password" id="password" class="m-2 input-underline" placeholder="Your answer">
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="confirmPassword" class="form-label fs-5 m-2">
                                  Confirm Password
                                  <span class="text-danger">*</span>
                              </label>
                              <br>
                              <input type="password" name="confirmPassword" id="confirmPassword" class="m-2 input-underline" placeholder="Your answer" value="<?php echo$newUserPassword?>">
                          </div>

                          <div class="d-flex justify-content-between m-1">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#survey3,#survey2" class="btn btn-primary">Back</button>
                            <button name="signup-submit" type = "submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            </div>
        </div>
        
        <!-- Personal Information Tab -->
        <div id="personalInfoTab">
            <div class="d-flex flex-column align-items-center mx-5">
                
                <div class="d-flex justify-center">

                
                    <!--Participant information-->
                    <div id="participant_Info" style="width: 500px; height:auto; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse show">
                        <div  class="row mx-3 my-2">
                            <div class="col-3 fw-bold">ID</div>
                            <div class="col-6 text-center"><?php echo $userID?></div>
                            <div class="col-1 ms-5">
                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#participant_edit,#participant_Info">Edit</a>
                            </div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">First Name</div>
                            <div class="col-7"><?php echo $fname?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Last Name</div>
                            <div class="col-7"><?php echo $lname?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Email</div>
                            <div class="col-7"><?php echo $email?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Street</div>
                            <div class="col-7"><?php echo $street?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">City</div>
                            <div class="col-7"><?php echo $city?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">State</div>
                            <div class="col-7"><?php echo $state?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Zip Code</div>
                            <div class="col-7"><?php echo $zipcode?></div>
                        </div>
                    </div>  
                   

                      <!--Participant information Edit-->
                      <div id="participant_edit" style="width: 500px; height:auto; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse">
                            <form method="POST" action="includes/saveProfileParticipation.inc.php">
                                <div class="row mx-3 my-2">
                                    <div class="col-3 fw-bold">ID</div>
                                    <div class="col-6 text-center"><?php echo $userID?></div>
                                    <div class="col-1 ms-5">
                                        <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#participant_Info,#participant_edit">Save</button>
                                    </div>
                                </div>
                                <div class="row mx-3 my-2">
                                    <div class="col fw-bold">First Name</div>
                                    <div class="col-7">
                                        <input type="text" name="fname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $fname?>">
                                    </div>
                                </div>
                                <div class="row mx-3 my-2">
                                    <div class="col fw-bold">Last Name</div>
                                    <div class="col-7">
                                        <input type="text" name="lname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $lname?>">
                                    </div>
                                </div>
                                <div class="row mx-3 my-2">
                                    <div class="col fw-bold">Email</div>
                                    <div class="col-7">
                                        <input type="email" name="email" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $email?>">
                                    </div>
                                </div>
                                <div class="row mx-3 my-2">
                                    <div class="col fw-bold">Street</div>
                                    <div class="col-7">
                                        <input type="text" name="street" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $street?>">
                                    </div>
                                </div>
                                <div class="row mx-3 my-2">
                                    <div class="col fw-bold">City</div>
                                    <div class="col-7">
                                        <input type="text" name="city" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $city?>">
                                    </div>
                                </div>
                                <div class="row mx-3 my-2">
                                    <div class="col fw-bold">State</div>
                                    <div class="col-7">
                                        <input type="text" name="state" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $state?>">
                                    </div>
                                </div>
                                <div class="row mx-3 my-2">
                                    <div class="col fw-bold">Zip Code</div>
                                    <div class="col-7">
                                        <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $zipcode?>">
                                    </div>
                                </div>
                            </form>
                        </div>


                        <!-- Participant File Submit -->
                        <div class="bg-lightBlue my-5 mx-3 d-flex justify-content-center">
                            <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data" class="w-100">

                                <div class="form-group row justify-content-center">
                                <div class="col-12 col-md-6 ">

                                    <label for="fileToUpload" class="form-label my-2"><img src="./image/file.png" alt="file upload" style="width:75px; height:75px;"></label>
                                    <input type="file" class="form-control-file mt-2" name="fileToUpload" id="fileToUpload">
                                </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                <div class="col-12 col-md-6 my-4">
                                    <button type="submit" class="btn btn-sm btn-outline-primary py-0">Upload</button>
                                </div>
                                </div>

                            </form>
                        </div>

                </div>

                        <!--Information Tab-->
                        <div style="width:95%;">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="nav-item rounded-top border border-info">
                                <button class="nav-link active text-Blue" id="" data-bs-toggle="tab" data-bs-target="#contact-tab" type="button">Contact/Demographics</button>
                                </li>
                                <li class="nav-item rounded-top border border-info">
                                    <button class="nav-link text-Blue" id="" data-bs-toggle="tab" data-bs-target="#training-tab" type="button">Training</button>
                                </li>
                                <li class="nav-item rounded-top border border-info">
                                    <button class="nav-link text-Blue" id="" data-bs-toggle="tab" data-bs-target="#career-tab" type="button">Employee/Career</button>
                                </li>
                                <li class="nav-item rounded-top border border-info">
                                    <button class="nav-link text-Blue" id="" data-bs-toggle="tab" data-bs-target="#supportService-tab" type="button">Support Services</button>
                                </li>
                            </ul>
                        <div class="tab-content border border-info bg-lightBlue">


                       
                            <!-- Contact/Demographics Tab  -->
                        <div class="tab-pane fade show active" id="contact-tab" aria-labelledby="contact-tab" tabindex="0">

                           <!-- Display the data from participation survey ("participation table in database")-->
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">First Name</div>
                                <div class="col-7"><?php echo $fname?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Last Name</div>
                                <div class="col-7"><?php echo $lname?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Email</div>
                                <div class="col-7"><?php echo $email?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Street</div>
                                <div class="col-7"><?php echo $street?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">City</div>
                                <div class="col-7"><?php echo $city?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">State</div>
                                <div class="col-7"><?php echo $state?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Zip Code</div>
                                <div class="col-7"><?php echo $zipcode?></div>
                            </div>
                            <br>

                            <div class="border bg-white border-info" style="width:100%;">
                                <textarea placeholder="Notes" style="width:100%; height:100px;" class="border border-0 p-1 outline-none" ></textarea>
                            </div>
                        </div>

                         <!-- Training Tab  -->

                        <div class="tab-pane fade" id="training-tab" tabindex="0">
                            <!-- Display the data from Participant Activity Reporting Form "Task table in database" -->
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Coach Name</div>
                                    <div class="col-7"><?php echo $coachName?></div>
                            </div>

                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Activity Code</div>
                                    <div class="col-7"><?php echo $codeActivity?></div>
                            </div>

                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Training Code</div>
                                    <div class="col-7"><?php echo $trainingProgram?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Start Date</div>
                                    <div class="col-7"><?php echo $startDate?></div>
                            </div>

                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">End Date</div>
                                    <div class="col-7"><?php echo $endDate?></div>
                            </div>
                            <br>

                            <div class="border bg-white border-info" style="width:100%;">
                               <textarea placeholder="Notes" style="width:100%; height:100px;" class="border border-0 p-1 outline-none" ><?php echo $reportNote?></textarea>
                            </div>
                        </div>

                        <!-- Employment/Career Tab  -->
                        <div class="tab-pane fade" id="career-tab" tabindex="0">
                            <!-- Display the data from Intake Form from "Employment table in database" -->
                            <?php if ($currentMilitaryOrVet =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Currently in the U.S. Military or a Veteran</div>
                            </div>
                            <?php } ?>

                            <?php if ($militarySpouse == 'Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Spouse of a member of the armed forces who is on active duty</div>
                            </div>
                            <?php } ?>

                            <?php if ($selectiveService != 'No') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Registered with the Selective Service</div>
                                    <div class="col-7"><?php echo $selectiveService?></div>
                            </div>
                            <?php } ?>

                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Employment status</div>
                                    <div class="col-7"><?php echo $employmentStatus?></div>
                            </div>

                            <?php if ($employmentStatus != 'Not Employed') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Current rate of pay</div>
                                    <div class="col-7"><?php echo $payRate?></div>
                            </div>
                            <?php } ?>

                            <?php if ($unemployemntInsurance != 'Neither') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Receiving Unemployment Insurance</div>
                                    <div class="col-7"><?php echo $unemployemntInsurance?></div>
                            </div>
                            <?php } ?>

                            <?php if ($employmentStatus == 'Not Employed') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Weeks have been unemployed</div>
                                    <div class="col-7"><?php echo $unemploymentWeeks?></div>
                            </div>
                            <?php } ?>

                            <?php if ($farmworker12Months == 'Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Worked as farmworker in the last 12 months</div>
                            </div>
                            <?php } ?>

                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Desired job title</div>
                                    <div class="col-7"><?php echo $desiredJobTitle?></div>
                            </div>

                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Tech Experience</div>
                                    <div class="col-7"><?php echo $techExperience?></div>
                            </div>
                            <br>
                            

                            <div class="border bg-white border-info" style="width:100%;">
                                <textarea placeholder="Notes" style="width:100%; height:100px;" class="border border-0 p-1 outline-none" ></textarea>
                            </div>

                        </div>

                        <!-- Services Tab  -->
                        <div class="tab-pane fade" id="supportService-tab" tabindex="0">
                            <!-- Display the data from Intake Form from "Employment table in database" -->
                            <?php if ($fosterCare =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Supported through the State's Foster Care System</div>
                            </div>
                            <?php } ?>

                            <?php if ($adultEducationWIOATittleII =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Receiving services from Adult Education (WIOA Title II)</div>
                            </div>
                            <?php } ?>

                            <?php if ($youthBuild =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Youth Build Grant Number:</div>
                                    <div class="col-7"><?php echo $youthBuildGrant?></div>
                            </div>
                            <?php } ?>

                            <?php if ($jobCorps =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Receiving services from Job Corps</div>
                            </div>
                            <?php } ?>

                            <?php if ($vocationalEducationCarlPerkins =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Receiving services from Vocational Education (Carl Perkins)</div>
                            </div>
                            <?php } ?>

                            <?php if ($tanfRecipient =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Temporary Assistance for Needy Families (TANF) recipient</div>
                            </div>
                            <?php } ?>

                            <?php if ($ssiRecipient =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Supplemental Security Income (SSI) recipient</div>
                            </div>
                            <?php } ?>

                            <?php if ($gaRecipient =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">General Assistance (GA) recipient</div>
                            </div>
                            <?php } ?>

                            <?php if ($snapRecipientCalFresh =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Supplemental Nutrition Assistance Program (SNAP) recipient (Cal Fresh)</div>
                            </div>
                            <?php } ?>

                            <?php if ($rcaRecipient =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Refugee Cash Assistance (RCA) recipient</div>
                            </div>
                            <?php } ?>

                            <?php if ($ssdiRecipient =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Social Security Disability Insurance (SSDI) recipient</div>
                            </div>
                            <?php } ?>

                            <?php if ($snapEmploymentAndTrainingProgram =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Receiving Services under SNAP Employment and Training Program</div>
                            </div>
                            <?php } ?>

                            <?php if ($pellGrant =='Yes') { ?>
                            <div  class="row mx-3 my-2">
                                    <div class="col fw-bold">Receiving, or has been notified will receive, Pell Grant</div>
                            </div>
                            <?php } ?>
                            <br>
                           
                            <div class="border bg-white border-info" style="width:100%;">
                                <textarea placeholder="Notes" style="width:100%; height:100px;" class="border border-0 p-1 outline-none" ></textarea>
                            </div>
                        </div>



                        </div>


                      <?php }


                          ?>
            </div>
    </div>
    </div>

    <script>
        function editTab() {
            document.getElementById("personalInfoTab").style.display = "none";
            document.getElementById("editTab").style.display = "block";
        }

        function personalInfoTab() {
            document.getElementById("personalInfoTab").style.display = "block";
            document.getElementById("editTab").style.display = "none";
        }
    </script>

</body>
</html>
