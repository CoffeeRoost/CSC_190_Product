<?php

        if (!isset($_SESSION['userID'])){
             //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ./Login.php");
            exit();
        }
                /****************For demographic view*******************/
                        $userID = $_SESSION['clientViewID'];
                        $status = $_SESSION['clientViewStatus'];
                        $fname = $_SESSION['clientViewFname'];
                        $middle= $_SESSION['clientViewMI'];
                        $lname = $_SESSION['clientViewLname'];
                        $convertDate = $_SESSION['convertViewDOB'];
                        $date = $_SESSION['clientViewDOB'];
                        $last4SSN = $_SESSION['clientView4SSN'];
                        $asian = $_SESSION['clientAsian'];
                        $hispanic = $_SESSION['ClientHispanic'];
                        $black = $_SESSION['ClientBlack'];
                        $native = $_SESSION['ClientNative'];
                        $hawaiian = $_SESSION['ClientHawaiian'];
                        $white = $_SESSION['ClientWhite'];
                        $noAnswer = $_SESSION['ClientNoRaces'];
                        $gender = $_SESSION['ClientViewGender'];
                        $races = $_SESSION['ClientViewRaces'];
                        $program = $_SESSION['ClientViewProgram'];
                        $language = $_SESSION['ClientViewLanguage'];
                        $proficiency = $_SESSION['ClientViewProficiency'];
                /********************************************************/

                /****************For address view*******************/
                        $street = $_SESSION['ClientViewStreet'];
                        $city = $_SESSION['ClientViewCity'];
                        $county = $_SESSION['ClientViewCounty'];
                        $state = $_SESSION['ClientViewState'];
                        $zipcode = $_SESSION['ClientViewZipcode'];
                        $phone = $_SESSION['ClientViewPhone'];
                        $phoneType= $_SESSION['ClientViewPhoneType'];
                        $altPhone = $_SESSION['ClientViewAltPhone'];
                        $email = $_SESSION['ClientViewEmail'];
                        $mailStreet = $_SESSION['ClientMailingStreet'];
                        $mailCity = $_SESSION['ClientMailingCity'];
                        $mailState = $_SESSION['ClientMailingState'];
                        $mailZip = $_SESSION['ClientMailingZipcode'];
                        $mailCounty = $_SESSION['ClientMailingCounty'];
                /********************************************************/

                /****************For citizenship view*******************/
                        $citizenship = $_SESSION['ClientCitizenship'];
                        $alienCode = $_SESSION['greenCard'];
                        $alienCodeExp = $_SESSION['greenCardExp'];
                /********************************************************/

                /****************For education view*******************/
                        $schoolStatus = $_SESSION['ClientSchoolStatus'];
                        $highSchool = $_SESSION['ClientHighSchool'];
                        $diploma = $_SESSION['ClientDiploma'];
                        $highestGrade = $_SESSION['ClientHighestGrade'];
                /********************************************************/

                /****************For military information view*******************/
                        $militaryStatus = $_SESSION['ClientMilitary'];
                        $militarySpouse = $_SESSION['ClientMilitarySpouse'];
                        $electiveService = $_SESSION['ClientSelective'];
                /********************************************************/

                /****************For employment information view*******************/
                        $employeeStatus = $_SESSION['ClientEmployment'];
                        $payRate = $_SESSION['ClientPayrate'];
                        $unemployee = $_SESSION['ClientUI'];
                        $unemployeeWeek = $_SESSION['ClientUIWeeks'];
                        $farmerWorker = $_SESSION['ClientFarmWorker'];
                        $jobTitle = $_SESSION['ClientJobTitle'];
                        $techExperience = $_SESSION['ClientTechExperience'];
                /****************************************************************/

                /****************For household and Income information view*******************/
                        $familySize = $_SESSION['ClientFamilySize'];
                        $income = $_SESSION['ClientFamilyIncome'];
                /********************************************************/

                /****************For Service information view*******************/
                        $fosterCare = $_SESSION['ClientFosterCare'];
                        $adultEducation = $_SESSION['ClientAdultEdu'];
                        $youthBuilt = $_SESSION['ClientYouthBuild'];
                        $youthBuiltNum = $_SESSION['ClientYouthBuildNum'];
                        $jobCorp = $_SESSION['ClientJobCorps'];
                        $carlPerkins = $_SESSION['ClientCarlPerkins'];
                        $tanf = $_SESSION['ClientTANF'];
                        $ssi = $_SESSION['ClientSSI'];
                        $ga = $_SESSION['ClientGA'];
                        $snap = $_SESSION['ClientSNAP'];
                        $rca = $_SESSION['ClientRCA'];
                        $ssdi = $_SESSION['ClientSSDI'];
                        $snapTraining = $_SESSION['ClientTrainingProgram'];
                        $pellGrant = $_SESSION['ClientPellGrant'];
                /********************************************************/

                /****************For hardship information view*******************/
                        $ticket = $_SESSION['ClientTicket'];
                        $homeless = $_SESSION['ClientHomeless'];
                        $exOffender = $_SESSION['ClientExOffender'];
                        $displace = $_SESSION['ClientDisplace'];
                        $disability = $_SESSION['ClientDisability'];
                        $disabilityType = $_SESSION['ClientDisabilityDes'];
                        $singleParent = $_SESSION['ClientSingleParent'];
                        $culturalBarrier = $_SESSION['ClientCulturalBarriers'];
                /********************************************************/

?>
<div class="container-fluid">
        <div class="mb-5 sticky-lg-top p-2">
                <div  class="row bg-lightBlue">
                <a class="col nav-link border p-3 text-center" href="#Demographic">Demographic</a>
                        <a class="col nav-link border p-3 text-center" href="#Address">Address</a>
                        <a class="col nav-link border p-3 text-center" href="#Mailing">Mailing</a>
                        <a class="col nav-link border p-3 text-center" href="#Citizenship">Citizenship</a>
                        <a class="col nav-link border p-3 text-center" href="#Education">Education</a>
                        <a class="col nav-link border p-3 text-center" href="#Military">Military</a>
                        <a class="col nav-link border p-3 text-center" href="#Employment">Employment</a>
                        <a class="col nav-link border p-3 text-center" href="#Income">Income</a>
                        <a class="col nav-link border p-3 text-center" href="#Service">Service</a>
                        <a class="col nav-link border p-3 text-center" href="#Hardship">Hardship</a>
                </div>
        </div>
        <div class="mb-5" id = "Demographic">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Demographic Information</legend>
                        <div id ="clientNameShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Client ID</div>
                                        <div class="col-7"><?php echo $userID?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#clientNameShow,#clientNameEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">First Name</div>
                                        <div class="col-7"><?php echo $fname;?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Middle Name</div>
                                        <div class="col-7"><?php echo $middle?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Last Name</div>
                                        <div class="col-7"><?php echo $lname?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Date of Birth</div>
                                        <div class="col-7"><?php echo $convertDate ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Last four SSN</div>
                                        <div class="col-7"><?php
                                        echo $last4SSN; ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Gender</div>
                                        <div class="col-7"><?php echo $gender?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Ethnicity</div>
                                        <div class="col-7"><?php echo $races ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Program Partner Reference</div>
                                        <div class="col-7"><?php echo $program?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Primary Language</div>
                                        <div class="col-7"><?php echo $language?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">English Proficiency</div>
                                        <div class="col-7"><?php echo $proficiency?></div>
                                </div>

                        </div>

                        <div id ="clientNameEdit" style="transition:1ms;" class ="collapse collapse">

                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">ID</div>
                                                <div class="col-7"><?php echo $userID?></div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="clientDemographicEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#clientNameEdit,#clientNameShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">First Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="fname" class="col input-underline" value ="<?php echo $fname?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Middle Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="MI" class="col input-underline" value ="<?php echo $middle?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Last Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="lname" class="col input-underline" value ="<?php echo $lname?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Date of Birth</div>
                                                <div class="col-7">
                                                        <input type="date" name="DOB" class="col input-underline" value ="<?php echo $date ?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Last four SSN</div>
                                                <div class="col-7">
                                                        <input type="number" name="last4SSN" class="col input-underline"  value ="<?php echo $last4SSN ?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Gender</div>
                                                <div class="col-7">
                                                        <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male"<?php
                                                                echo ($gender === "Male")? 'checked' : ''?>>
                                                                <label class="form-check-label" for="male">
                                                                        Male
                                                                </label>
                                                        </div>
                                                        <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php
                                                                echo ($gender === "Female")? 'checked' : ''?>>
                                                                <label class="form-check-label" for="female">
                                                                        Female
                                                                </label>
                                                        </div>
                                                        <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="notSay" value="Not Say" <?php
                                                                echo ($gender === "Not Say")? 'checked' : ''?>>
                                                                <label class="form-check-label" for="notSay">
                                                                        Prefer not to say
                                                                </label>
                                                        </div>
                                                        <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="other" value="Other"<?php
                                                                echo ($gender !== "Male" && $gender !== "Female" && $gender !== "Not say" )? "checked" : ''?>>
                                                                <label class="form-check-label" for="other">
                                                                        Other
                                                                </label>
                                                                <input type="text" name="otherAns" id="otherAns" class="m-2 input-underline" value="<?php
                                                                echo ($gender !== "Male" && $gender !== "Female" && $gender !== "Not say" )? $gender : ''?>"/>
                                                        </div>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Ethnicity</div>
                                                <div class="col-7">

                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="africanAmerican_black" name="africanAmerican_black" value="Yes"
                                                                <?php
                                                                echo ($black === "Yes")? 'checked' : ''?>>
                                                                <label for="africanAmerican_black">African American/Black</label><br>
                                                        </div>

                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="americanIndian_alaskanNative" name="americanIndian_alaskanNative" value="Yes" <?php
                                                                echo ($native === "Yes")? 'checked' : ''?>>
                                                                <label for="americanIndian_alaskanNative">American Indian/Alaskan Native</label><br>
                                                        </div>

                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="asian" name="asian" value="Yes" <?php
                                                                echo ($asian === "Yes")? 'checked' : ''?>>
                                                                <label for="asian">Asian</label><br>
                                                                </div>
                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="hawaiian_other" name="hawaiian_other" value="Yes" <?php
                                                                echo ($hawaiian === "Yes")? 'checked' : ''?>>
                                                                <label for="hawaiian_other">Hawaiian/Other Pacific Islander</label><br>
                                                        </div>
                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="Hispanic" name="hispanic" value="Yes" <?php
                                                                echo ($hispanic === "Yes")? 'checked' : ''?>>
                                                                <label for="hispanic">Hispanic Heritage</label><br>
                                                        </div>
                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="white" name="white" value="Yes" <?php
                                                                echo ($white === "Yes")? 'checked' : ''?>>
                                                                <label for="white">White</label><br>
                                                                </div>
                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="noAnswer" name="noAnswer" value="Yes" <?php
                                                                echo ($noAnswer === "Yes")? 'checked' : ''?>>
                                                                <label for="noAnswer">I do not wish to answer</label><br>
                                                        </div>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Program Partner Reference</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="programMember" id="programMember">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="Friend and Family"<?php echo ($program === 'Friend and Family') ? 'selected' : ''; ?>>Friend and Family</option>
                                                                <option value="Hiring Event or Career Fair"<?php echo ($program === 'Hiring Event or Career Fair') ? 'selected' : ''; ?>>Hiring Event or Career Fair</option>
                                                                <option value="Women's Empowerment"<?php echo ($program === 'Women\'s Empowerment') ? 'selected' : ''; ?>>Women's Empowerment</option>
                                                                <option value="Next Move"<?php echo ($program === 'Next Move') ? 'selected' : ''; ?>>Next Move</option>
                                                                <option value="Waking the Village"<?php echo ($program === 'Waking the Village') ? 'selected' : ''; ?>>Waking the Village</option>
                                                                <option value="Saint John's"<?php echo ($program === 'Saint John\'s') ? 'selected' : ''; ?>>Saint John's</option>
                                                                <option value="La Familia"<?php echo ($program === 'La Familia') ? 'selected' : ''; ?>>La Familia</option>
                                                                <option value="GS Urban League"<?php echo ($program === 'GS Urban League') ? 'selected' : ''; ?>>GS Urban League</option>
                                                                <option value="Asian Resources"<?php echo ($program === 'Asian Resources') ? 'selected' : ''; ?>>Asian Resources</option>
                                                                <option value="Folsom Cordova CP"<?php echo ($program === 'Folsom Cordova CP') ? 'selected' : ''; ?>>Folsom Cordova CP</option>
                                                                <option value="Lemon Hill"<?php echo ($program === 'Lemon Hill') ? 'selected' : ''; ?>>Lemon Hill</option>
                                                                <option value="Sac Job Corp"<?php echo ($program === 'Sac Job Corp') ? 'selected' : ''; ?>>Sac Job Corp</option>
                                                                <option value="Public/Aura Planning"<?php echo ($program === 'Public/Aura Planning') ? 'selected' : ''; ?>>Public/Aura Planning</option>
                                                                <option value="International Rescue Committee Sacramento"<?php echo ($program === 'International Rescue Committee Sacramento') ? 'selected' : ''; ?>>International Rescue Committee Sacramentog</option>
                                                                <option value="Community Resource Project"<?php echo ($program === 'Community Resource Project') ? 'selected' : ''; ?>>Community Resource Project</option>
                                                                <option value="Fellowship"<?php echo ($program === 'Fellowship') ? 'selected' : ''; ?>>Fellowship</option>
                                                                <option value="Other"<?php echo ($program === 'Other') ? 'selected' : ''; ?>>Other</option>
                                                        </select>

                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Primary Language</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="language" id="language">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="English"<?php echo ($language === 'English') ? ' selected' : ''; ?>>English</option>
                                                                <option value="Spanish"<?php echo ($language === 'Spanish') ? ' selected' : ''; ?>>Spanish</option>
                                                                <option value="Dari"<?php echo ($language === 'Dari') ? ' selected' : ''; ?>>Dari</option>
                                                                <option value="Pashto"<?php echo ($language === 'Pashto') ? ' selected' : ''; ?>>Pashto</option>
                                                                <option value="Russian"<?php echo ($language === 'Russian') ? ' selected' : ''; ?>>Russian</option>
                                                                <option value="Vietnamese"<?php echo ($language === 'Vietnamese') ? ' selected' : ''; ?>>Vietnamese</option>
                                                                <option value="Mandarin"<?php echo ($language === 'Mandarin') ? ' selected' : ''; ?>>Mandarin</option>
                                                                <option value="Arabic"<?php echo ($language === 'Arabic') ? ' selected' : ''; ?>>Arabic</option>
                                                                <option value="Farsi"<?php echo ($language === 'Farsi') ? ' selected' : ''; ?>>Farsi</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">English Proficiency</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="proficiency" id="proficiency">
                                                                <option value="Yes" <?php echo ($proficiency === 'Yes') ? ' selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($proficiency === 'No') ? ' selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>
                </fieldset>
        </div>

        <div class="mb-5" id="Address">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Address</legend>
                        <div id ="clientAddressShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Street</div>
                                        <div class="col-7"><?php echo $street?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#clientAddressShow,#clientAddressEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">City</div>
                                        <div class="col-7"><?php echo $city?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">County</div>
                                        <div class="col-7"><?php echo $county?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">State</div>
                                        <div class="col-7"><?php echo $state?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Zip Code</div>
                                        <div class="col-7"><?php echo $zipcode?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Primary Phone Number</div>
                                        <div class="col-2"><?php echo $phone?></div>
                                        <div class="col-2 fw-bold">Type</div>
                                        <div class="col-2"><?php echo $phoneType?></div>

                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Alternative Phone Number</div>
                                        <div class="col-7"><?php echo (!empty($altPhone))? $altPhone: "N/A" ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Email</div>
                                        <div class="col-7"><?php echo $email?></div>
                                </div>

                        </div>

                        <div id ="clientAddressEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Street</div>
                                                <div class="col-7">
                                                        <input type="text" name="street" class="col input-underline" value ="<?php echo $street?>">
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="clientAddEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#clientAddressEdit,#clientAddressShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">City</div>
                                                <div class="col-7">
                                                        <input type="text" name="city" class="col input-underline" value ="<?php echo $city?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">County</div>
                                                <div class="col-7">
                                                        <input type="text" name="county" class="col input-underline" value ="<?php echo $county?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">State</div>
                                                <div class="col-7">
                                                <select class="form-select-SM m-2 border rounded-2" name="state" id="state">
                                                        <option value="" disabled selected hidden>Choose</option>
                                                        <option value="Alabama"<?php echo ($state === 'Alabama') ? ' selected' : ''; ?>>Alabama</option>
                                                        <option value="Alaska"<?php echo ($state === 'Alaska') ? ' selected' : ''; ?>>Alaska</option>
                                                        <option value="Arizona"<?php echo ($state === 'Arizona') ? ' selected' : ''; ?>>Arizona</option>
                                                        <option value="Arkansas"<?php echo ($state === 'Arkansas') ? ' selected' : ''; ?>>Arkansas</option>
                                                        <option value="California"<?php echo ($state === 'California') ? ' selected' : ''; ?>>California</option>
                                                        <option value="Colorado"<?php echo ($state === 'Colorado') ? ' selected' : ''; ?>>Colorado</option>
                                                        <option value="Connecticut"<?php echo ($state === 'Connecticut') ? ' selected' : ''; ?>>Connecticut</option>
                                                        <option value="Delaware"<?php echo ($state === 'Delaware') ? ' selected' : ''; ?>>Delaware</option>
                                                        <option value="Florida"<?php echo ($state === 'Florida') ? ' selected' : ''; ?>>Florida</option>
                                                        <option value="Georgia"<?php echo ($state === 'Georgia') ? ' selected' : ''; ?>>Georgia</option>
                                                        <option value="Hawaii"<?php echo ($state === 'Hawaii') ? ' selected' : ''; ?>>Hawaii</option>
                                                        <option value="Idaho"<?php echo ($state === 'Idaho') ? ' selected' : ''; ?>>Idaho</option>
                                                        <option value="Illinois"<?php echo ($state === 'Illinois') ? ' selected' : ''; ?>>Illinois</option>
                                                        <option value="Indiana"<?php echo ($state === 'Indiana') ? ' selected' : ''; ?>>Indiana</option>
                                                        <option value="Iowa"<?php echo ($state === 'Iowa') ? ' selected' : ''; ?>>Iowa</option>
                                                        <option value="Kansas"<?php echo ($state === 'Kansas') ? ' selected' : ''; ?>>Kansas</option>
                                                        <option value="Kentucky"<?php echo ($state === 'Kentucky') ? ' selected' : ''; ?>>Kentucky</option>
                                                        <option value="Louisiana"<?php echo ($state === 'Louisiana') ? ' selected' : ''; ?>>Louisiana</option>
                                                        <option value="Maine"<?php echo ($state === 'Maine') ? ' selected' : ''; ?>>Maine</option>
                                                        <option value="Maryland"<?php echo ($state === 'Maryland') ? ' selected' : ''; ?>>Maryland</option>
                                                        <option value="Massachusetts"<?php echo ($state === 'Massachusetts') ? ' selected' : ''; ?>>Massachusetts</option>
                                                        <option value="Michigan"<?php echo ($state === 'Michigan') ? ' selected' : ''; ?>>Michigan</option>
                                                        <option value="Minnesota"<?php echo ($state === 'Minnesota') ? ' selected' : ''; ?>>Minnesota</option><option value="Mississippi"<?php echo ($state === 'Mississippi') ? ' selected' : ''; ?>>Mississippi</option>
                                                        <option value="Missouri"<?php echo ($state === 'Missouri') ? ' selected' : ''; ?>>Missouri</option>
                                                        <option value="Montana"<?php echo ($state === 'Montana') ? ' selected' : ''; ?>>Montana</option>
                                                        <option value="Nebraska"<?php echo ($state === 'Nebraska') ? ' selected' : ''; ?>>Nebraska</option>
                                                        <option value="Nevada"<?php echo ($state === 'Nevada') ? ' selected' : ''; ?>>Nevada</option>
                                                        <option value="New Hampshire"<?php echo ($state === 'New Hampshire') ? ' selected' : ''; ?>>New Hampshire</option>
                                                        <option value="New Jersey"<?php echo ($state === 'New Jersey') ? ' selected' : ''; ?>>New Jersey</option>
                                                        <option value="New Mexico"<?php echo ($state === 'New Mexico') ? ' selected' : ''; ?>>New Mexico</option>
                                                        <option value="New York"<?php echo ($state === 'New York') ? ' selected' : ''; ?>>New York</option>
                                                        <option value="North Carolina"<?php echo ($state === 'North Carolina') ? ' selected' : ''; ?>>North Carolina</option>
                                                        <option value="North Dakota"<?php echo ($state === 'North Dakota') ? ' selected' : ''; ?>>North Dakota</option>
                                                        <option value="Ohio"<?php echo ($state === 'Ohio') ? ' selected' : ''; ?>>Ohio</option>
                                                        <option value="Oklahoma"<?php echo ($state === 'Oklahoma') ? ' selected' : ''; ?>>Oklahoma</option>
                                                        <option value="Oregon"<?php echo ($state === 'Oregon') ? ' selected' : ''; ?>>Oregon</option>
                                                        <option value="Pennsylvania"<?php echo ($state === 'Pennsylvania') ? ' selected' : ''; ?>>Pennsylvania</option>
                                                        <option value="Rhode Island"<?php echo ($state === 'Rhode Island') ? ' selected' : ''; ?>>Rhode Island</option>
                                                        <option value="South Carolina"<?php echo ($state === 'South Carolina') ? ' selected' : ''; ?>>South Carolina</option>
                                                        <option value="South Dakota"<?php echo ($state === 'South Dakota') ? ' selected' : ''; ?>>South Dakota</option>
                                                        <option value="Tennessee"<?php echo ($state === 'Tennessee') ? ' selected' : ''; ?>>Tennessee</option>
                                                        <option value="Texas"<?php echo ($state === 'Texas') ? ' selected' : ''; ?>>Texas</option>
                                                        <option value="Utah"<?php echo ($state === 'Utah') ? ' selected' : ''; ?>>Utah</option>
                                                        <option value="Vermont"<?php echo ($state === 'Vermont') ? ' selected' : ''; ?>>Vermont</option>
                                                        <option value="Virginia"<?php echo ($state === 'Virginia') ? ' selected' : ''; ?>>Virginia</option>
                                                        <option value="Washington"<?php echo ($state === 'Washington') ? ' selected' : ''; ?>>Washington</option>
                                                        <option value="West Virginia"<?php echo ($state === 'West Virginia') ? ' selected' : ''; ?>>West Virginia</option>
                                                        <option value="Wisconsin"<?php echo ($state === 'Wisconsin') ? ' selected' : ''; ?>>Wisconsin</option>
                                                        <option value="Wyoming"<?php echo ($state === 'Wyoming') ? ' selected' : ''; ?>>Wyoming</option>
                                                </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Zip Code</div>
                                                <div class="col-7">
                                                        <input type="text" name="zipcode" class="col input-underline" value ="<?php echo $zipcode?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Phone</div>
                                                <div class="col-7">
                                                        <input type="text" name="phone" class="col input-underline" value ="<?php echo $phone?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Alternative Phone Number</div>
                                                <div class="col-7">
                                                        <input type="text" name="altPhone" class="col input-underline" value ="<?php echo (!empty($altPhone))? $altPhone: "" ?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Email</div>
                                                <div class="col-7">
                                                        <input type="email" name="email" class="col input-underline" value ="">
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5" id="Mailing">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Mailing Address</legend>
                        <div id ="mailingAddressShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Mailing Street</div>
                                        <div class="col-7"><?php echo $mailStreet?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#mailingAddressShow,#mailingAddressEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Mailing City</div>
                                        <div class="col-7"><?php echo $mailCity?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Mailing County</div>
                                        <div class="col-7"><?php echo $mailCounty?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Mailing State</div>
                                        <div class="col-7"><?php echo $mailState?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Mailing Zip Code</div>
                                        <div class="col-7"><?php echo $mailZip?></div>
                                </div>
                        </div>

                        <div id ="mailingAddressEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Mailing Street</div>
                                                <div class="col-7">
                                                        <input type="text" name="mailingStreet" class="col input-underline" value ="<?php echo $mailStreet?>">
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="mailAddEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#mailingAddressEdit,#mailingAddressShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Mailing City</div>
                                                <div class="col-7">
                                                        <input type="text" name="mailingCity" class="col input-underline" value ="<?php echo $mailCity?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Mailing County</div>
                                                <div class="col-7">
                                                        <input type="text" name="mailingCounty" class="col input-underline" value ="<?php echo $mailCounty?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Mailing State</div>
                                                <div class="col-7">
                                                <select class="form-select-SM m-2 border rounded-2" name="mailingState" id="state">
                                                <option value="" disabled selected hidden>Choose</option>
                                                        <option value="Alabama"<?php echo ($mailState === 'Alabama') ? ' selected' : ''; ?>>Alabama</option>
                                                        <option value="Alaska"<?php echo ($mailState === 'Alaska') ? ' selected' : ''; ?>>Alaska</option>
                                                        <option value="Arizona"<?php echo ($mailState === 'Arizona') ? ' selected' : ''; ?>>Arizona</option>
                                                        <option value="Arkansas"<?php echo ($mailState === 'Arkansas') ? ' selected' : ''; ?>>Arkansas</option>
                                                        <option value="California"<?php echo ($mailState === 'California') ? ' selected' : ''; ?>>California</option>
                                                        <option value="Colorado"<?php echo ($mailState === 'Colorado') ? ' selected' : ''; ?>>Colorado</option>
                                                        <option value="Connecticut"<?php echo ($mailState === 'Connecticut') ? ' selected' : ''; ?>>Connecticut</option>
                                                        <option value="Delaware"<?php echo ($mailState === 'Delaware') ? ' selected' : ''; ?>>Delaware</option>
                                                        <option value="Florida"<?php echo ($mailState === 'Florida') ? ' selected' : ''; ?>>Florida</option>
                                                        <option value="Georgia"<?php echo ($mailState === 'Georgia') ? ' selected' : ''; ?>>Georgia</option>
                                                        <option value="Hawaii"<?php echo ($mailState === 'Hawaii') ? ' selected' : ''; ?>>Hawaii</option>
                                                        <option value="Idaho"<?php echo ($mailState === 'Idaho') ? ' selected' : ''; ?>>Idaho</option>
                                                        <option value="Illinois"<?php echo ($mailState === 'Illinois') ? ' selected' : ''; ?>>Illinois</option>
                                                        <option value="Indiana"<?php echo ($mailState === 'Indiana') ? ' selected' : ''; ?>>Indiana</option>
                                                        <option value="Iowa"<?php echo ($mailState === 'Iowa') ? ' selected' : ''; ?>>Iowa</option>
                                                        <option value="Kansas"<?php echo ($mailState === 'Kansas') ? ' selected' : ''; ?>>Kansas</option>
                                                        <option value="Kentucky"<?php echo ($mailState === 'Kentucky') ? ' selected' : ''; ?>>Kentucky</option>
                                                        <option value="Louisiana"<?php echo ($mailState === 'Louisiana') ? ' selected' : ''; ?>>Louisiana</option>
                                                        <option value="Maine"<?php echo ($mailState === 'Maine') ? ' selected' : ''; ?>>Maine</option>
                                                        <option value="Maryland"<?php echo ($mailState === 'Maryland') ? ' selected' : ''; ?>>Maryland</option>
                                                        <option value="Massachusetts"<?php echo ($mailState === 'Massachusetts') ? ' selected' : ''; ?>>Massachusetts</option>
                                                        <option value="Michigan"<?php echo ($mailState === 'Michigan') ? ' selected' : ''; ?>>
                                                        <option value="Minnesota"<?php echo ($mailState === 'Minnesota') ? ' selected' : ''; ?>>Minnesota</option>
                                                        <option value="Mississippi"<?php echo ($mailState === 'Mississippi') ? ' selected' : ''; ?>>Mississippi</option>
                                                        <option value="Missouri"<?php echo ($mailState === 'Missouri') ? ' selected' : ''; ?>>Missouri</option>
                                                        <option value="Montana"<?php echo ($mailState === 'Montana') ? ' selected' : ''; ?>>Montana</option>
                                                        <option value="Nebraska"<?php echo ($mailState === 'Nebraska') ? ' selected' : ''; ?>>Nebraska</option>
                                                        <option value="Nevada"<?php echo ($mailState === 'Nevada') ? ' selected' : ''; ?>>Nevada</option>
                                                        <option value="New Hampshire"<?php echo ($mailState === 'New Hampshire') ? ' selected' : ''; ?>>New Hampshire</option>
                                                        <option value="New Jersey"<?php echo ($mailState === 'New Jersey') ? ' selected' : ''; ?>>New Jersey</option>
                                                        <option value="New Mexico"<?php echo ($mailState === 'New Mexico') ? ' selected' : ''; ?>>New Mexico</option>
                                                        <option value="New York"<?php echo ($mailState === 'New York') ? ' selected' : ''; ?>>New York</option>
                                                        <option value="North Carolina"<?php echo ($mailState === 'North Carolina') ? ' selected' : ''; ?>>North Carolina</option>
                                                        <option value="North Dakota"<?php echo ($mailState === 'North Dakota') ? ' selected' : ''; ?>>North Dakota</option>
                                                        <option value="Ohio"<?php echo ($mailState === 'Ohio') ? ' selected' : ''; ?>>Ohio</option>
                                                        <option value="Oklahoma"<?php echo ($mailState === 'Oklahoma') ? ' selected' : ''; ?>>Oklahoma</option>
                                                        <option value="Oregon"<?php echo ($mailState === 'Oregon') ? ' selected' : ''; ?>>Oregon</option>
                                                        <option value="Pennsylvania"<?php echo ($mailState === 'Pennsylvania') ? ' selected' : ''; ?>>Pennsylvania</option>
                                                        <option value="Rhode Island"<?php echo ($mailState === 'Rhode Island') ? ' selected' : ''; ?>>Rhode Island</option>
                                                        <option value="South Carolina"<?php echo ($mailState === 'South Carolina') ? ' selected' : ''; ?>>South Carolina</option>
                                                        <option value="South Dakota"<?php echo ($mailState === 'South Dakota') ? ' selected' : ''; ?>>South Dakota</option>
                                                        <option value="Tennessee"<?php echo ($mailState === 'Tennessee') ? ' selected' : ''; ?>>Tennessee</option>
                                                        <option value="Texas"<?php echo ($mailState === 'Texas') ? ' selected' : ''; ?>>Texas</option>
                                                        <option value="Utah"<?php echo ($mailState === 'Utah') ? ' selected' : ''; ?>>Utah</option>
                                                        <option value="Vermont"<?php echo ($mailState === 'Vermont') ? ' selected' : ''; ?>>Vermont</option>
                                                        <option value="Virginia"<?php echo ($mailState === 'Virginia') ? ' selected' : ''; ?>>Virginia</option>
                                                        <option value="Washington"<?php echo ($mailState === 'Washington') ? ' selected' : ''; ?>>Washington</option>
                                                        <option value="West Virginia"<?php echo ($mailState === 'West Virginia') ? ' selected' : ''; ?>>West Virginia</option>
                                                        <option value="Wisconsin"<?php echo ($mailState === 'Wisconsin') ? ' selected' : ''; ?>>Wisconsin</option>
                                                        <option value="Wyoming"<?php echo ($mailState === 'Wyoming') ? ' selected' : ''; ?>>Wyoming</option>

                                                </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Zip Code</div>
                                                <div class="col-7">
                                                        <input type="text" name="mailingZipcode" class="col input-underline" value ="<?php echo $mailZip?>">
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5" id="Citizenship">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Citizenship Information</legend>
                        <div id ="citizenShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Citizenship Status</div>
                                        <div class="col-7"><?php echo $citizenship?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#citizenShow,#citizenEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Alien Registration Code</div>
                                        <div class="col-7"><?php echo (!empty($alienCode)) ? $alienCode :"N/A"?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Alien Registration Code Expired Date</div>
                                        <div class="col-7"><?php echo (!empty($alienCodeExp)) ? $alienCodeExp :"N/A"?></div>
                                </div>
                        </div>

                        <div id ="citizenEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Citizenship Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" style="max-width:75%;" name="citizenship" id="citizenship">
                                                                <option value="" disabled>Choose</option>
                                                                <option value="Citizen" <?php echo ($citizenship === 'Citizen') ? 'selected' : ''; ?>>Citizen of US or US Territory</option>
                                                                <option value="US Permanent Resident" <?php echo ($citizenship === 'US Permanent Resident') ? 'selected' : ''; ?>>US Permanent Resident</option>
                                                                <option value="Alien/Refugee Lawfully Admitted to the US" <?php echo ($citizenship === 'Alien/Refugee Lawfully Admitted to the US') ? 'selected' : ''; ?>>Alien/Refugee Lawfully Admitted to the US</option>
                                                                <option value="None Citizen" <?php echo ($citizenship === 'None Citizen') ? 'selected' : ''; ?>>None of the above</option>
                                                        </select>

                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="citizenEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#citizenEdit,#citizenShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Alien Registration Code</div>
                                                <div class="col-7">
                                                        <input type="text" name="alienCode" class="col input-underline" value ="<?php echo (!empty($alienCode)) ? $alienCode :"N/A"?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Alien Registration Code Expired Date</div>
                                                <div class="col-7">
                                                        <input type="date" name="alienCodeEXP" class="col input-underline" value ="<?php echo (!empty($alienCodeExp)) ? $alienCodeExp :""?>">
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5" id="Education">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Education Information</legend>
                        <div id ="educationShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">School Status</div>
                                        <div class="col-7"><?php echo ($schoolStatus === "Yes") ? "In school" : "Not in school" ?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#educationShow,#educationEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">High School Status</div>
                                        <div class="col-7"><?php echo $highSchool?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Diploma and Equivalent</div>
                                        <div class="col-7"><?php echo $diploma?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Highest School Grade Completed</div>
                                        <div class="col-7"><?php echo $highestGrade?></div>
                                </div>
                        </div>

                        <div id ="educationEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">School Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="schoolStatus" id="notInschool" >
                                                                <option value="Yes" <?php echo ($schoolStatus === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($schoolStatus === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                                <div class="col-1 text-end">
                                                                <button type="submit" name ="educationEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#educationEdit,#educationShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">High School Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="schoolLevel" id="schoolLevel">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="9th" <?php echo ($highSchool === '9th') ? 'selected' : ''; ?>>9th grade</option>
                                                                <option value="10th" <?php echo ($highSchool === '10th') ? 'selected' : ''; ?>>10th grade</option>
                                                                <option value="11th" <?php echo ($highSchool === '11th') ? 'selected' : ''; ?>>11th grade</option>
                                                                <option value="12th" <?php echo ($highSchool === '12th') ? 'selected' : ''; ?>>12th grade</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Diploma and Equivalent</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="diploma" id="diploma" >
                                                                <option value="Yes" <?php echo ($diploma === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($diploma === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Highest School Grade Completed</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="highestSchool" id="highestSchool">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="High School" <?php echo ($highestGrade === 'High School') ? 'selected' : ''; ?>>High School Diploma</option>
                                                                <option value="GED" <?php echo ($highestGrade === 'GED') ? 'selected' : ''; ?>>High School Equivalent Diploma (GED)</option>
                                                                <option value="Certificate of Attendance/Completion" <?php echo ($highestGrade === 'Certificate of Attendance/Completion') ? 'selected' : ''; ?>>Certificate of Attendance/Completion (Disabled Individuales)</option>
                                                                <option value="Vocational School Certificate" <?php echo ($highestGrade === 'Vocational School Certificate') ? 'selected' : ''; ?>>Vocational School Certificate</option>
                                                                <option value="College or Technical or Vocational School" <?php echo ($highestGrade === 'College or Technical or Vocational School') ? 'selected' : ''; ?>>College or Technical or Vocational School</option>
                                                                <option value="AA/AS" <?php echo ($highestGrade === 'AA/AS') ? 'selected' : ''; ?>>AA/AS</option>
                                                                <option value="BA/BS" <?php echo ($highestGrade === 'BA/BS') ? 'selected' : ''; ?>>BA/BS</option>
                                                                <option value="Master's Degree" <?php echo ($highestGrade === "Master's Degree") ? 'selected' : ''; ?>>Master's Degree</option>
                                                                <option value="Doctor's Degree" <?php echo ($highestGrade === "Doctor's Degree") ? 'selected' : ''; ?>>Doctorate Degree</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5" id="Military">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Military Information</legend>
                        <div id ="militaryShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Military/Veteran Status</div>
                                        <div class="col-7"><?php echo $militaryStatus?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#militaryShow,#militaryEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Military Spouse</div>
                                        <div class="col-7"><?php echo $militarySpouse?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Selective Service</div>
                                        <div class="col-7"><?php echo $electiveService?></div>
                                </div>
                        </div>

                        <div id ="militaryEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Military/Veteran Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="military" id="military" >
                                                                <option value="Yes" <?php echo ($militaryStatus === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($militaryStatus === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="militaryEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#militaryEdit,#militaryShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Military Spouse</div>
                                                <div class="col-7">

                                                        <select class="form-select-SM m-2 border rounded-2" name="militarySpouse" id="militarySpouse" >
                                                                <option value="Yes" <?php echo ($militarySpouse === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($militarySpouse === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Selective Service</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="selective" id="highestSchool">
                                                                <option value="Yes" <?php echo ($electiveService === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($electiveService === 'No') ? 'selected' : ''; ?>>No</option>
                                                                <option value="Documented exemption" <?php echo ($electiveService === 'Documented exemption') ? 'selected' : ''; ?>>Documented exemption</option>
                                                                <option value="No" <?php echo ($electiveService === 'Not applicable') ? 'selected' : ''; ?>>Not applicable</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5" id="Employment">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Employment Information</legend>
                        <div id ="employmentShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Employment Status</div>
                                        <div class="col-7"><?php echo $employeeStatus?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#employmentShow,#employmentEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Pay Rate</div>
                                        <div class="col-7"><?php echo $payRate?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Unemployment Insurance</div>
                                        <div class="col-7"><?php echo $unemployee?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Number of Week Unemployment</div>
                                        <div class="col-7"><?php echo $unemployeeWeek?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Farm Worker in Last 12 months</div>
                                        <div class="col-7"><?php echo $farmerWorker?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Job Title</div>
                                        <div class="col-7"><?php echo $jobTitle?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Technical Experience</div>
                                        <div class="col-7"><?php echo $techExperience?></div>
                                </div>
                        </div>

                        <div id ="employmentEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Employment Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" style="max-width:75%;" name="employment" id="employment" >
                                                                <option value="Yes" <?php echo ($employeeStatus === 'Employed') ? 'selected' : ''; ?>>Employed</option>
                                                                <option value="Not Employed" <?php echo ($employeeStatus === 'Not Employed') ? 'selected' : ''; ?>>Not Employed</option>
                                                                <option value="Employed but received notice of termination or separation from military service" <?php echo ($employeeStatus === 'Employed but received notice of termination or separation from military service') ? 'selected' : ''; ?>>Employed but received notice of termination or separation from military service</option>
                                                        </select>
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="employmentEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#militaryEdit,#militaryShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Pay Rate</div>
                                                <div class="col-7">
                                                        <input type="number" name="payRate" class="col input-underline" value ="<?php echo $payRate?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Unemployment Insurance</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="ui" id="ui" >
                                                                <option value="Claimant" <?php echo ($unemployee === 'Claimant') ? 'selected' : ''; ?>>Claimant</option>
                                                                <option value="Exhaustee" <?php echo ($unemployee === 'Exhaustee') ? 'selected' : ''; ?>>Exhaustee</option>
                                                                <option value="Neither" <?php echo ($unemployee === 'Neither') ? 'selected' : ''; ?>>Neither</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Number of Week Unemployment</div>
                                                <div class="col-7">
                                                        <input type="number" name="uiWeek" class="col input-underline" value ="<?php echo $unemployeeWeek?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Farm Worker in Last 12 months</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="farmworker" id="farmworker" >
                                                        <option value="Yes" <?php echo ($farmerWorker === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                        <option value="Yes" <?php echo ($farmerWorker === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Job Title</div>
                                                <div class="col-7">
                                                        <input type="text" name="jobTitle" class="col input-underline" value ="<?php echo $jobTitle?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Technical Experience</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="techExp" id="techExp" >
                                                                <option value="Yes" <?php echo ($techExperience === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="Yes" <?php echo ($techExperience === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5" id="Income">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">household and Income</legend>
                        <div id ="incomeShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Family Size</div>
                                        <div class="col-7"><?php echo $familySize?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#incomeShow,#incomeEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Annualized Family Income (last 6 months X2)</div>
                                        <div class="col-7"><?php echo $income?></div>
                                </div>
                        </div>

                        <div id ="incomeEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">familySize</div>
                                                <div class="col-7">
                                                        <input type="number" name="familySize" class="col input-underline" value ="<?php echo $familySize?>">
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="incomeEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#incomeEdit,#incomeShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Annualized Family Income (last 6 months X2)</div>
                                                <div class="col-7">
                                                        <input type="text" name="income" class="col input-underline" value ="<?php echo $income?>">
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5" id="Service">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Service Receiving</legend>
                        <div id ="serviceShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Foster Care</div>
                                        <div class="col-7"><?php echo $fosterCare?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#serviceShow,#serviceEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Adult Education WIOA Title II</div>
                                        <div class="col-7"><?php echo $adultEducation?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Youth Build</div>
                                        <div class="col-1"><?php echo $youthBuilt?></div>
                                        <div class="col-2 fw-bold">Youth Build Grant Number</div>
                                        <div class="col-3"><?php echo (!empty($youthBuiltNum))? $youthBuiltNum : "N/A"?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Job Corps</div>
                                        <div class="col-7"><?php echo $jobCorp?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Vocational Education (Carl Perkins)</div>
                                        <div class="col-7"><?php echo $carlPerkins?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Temporary Assistance for Needy Families (TANF)</div>
                                        <div class="col-7"><?php echo $tanf?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Supplemental Security Income (SSI)</div>
                                        <div class="col-7"><?php echo $ssi?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">General Assistance (GA)</div>
                                        <div class="col-7"><?php echo $ga?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Supplemental Nutrition Assistance Program (SNAP/Cal Fresh)</div>
                                        <div class="col-7"><?php echo $snap?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Refugee Cash Assistance (RCA)</div>
                                        <div class="col-7"><?php echo $rca?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Social Security Disability Insurance (SSDI)</div>
                                        <div class="col-7"><?php echo $ssdi?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Services under SNAP Employment and Training Program</div>
                                        <div class="col-7"><?php echo $snapTraining?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Pell Grant</div>
                                        <div class="col-7"><?php echo $pellGrant?></div>
                                </div>

                        </div>

                        <div id ="serviceEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Foster Care</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="foster" id="foster" >
                                                        <option value="Yes" <?php echo ($fosterCare === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($fosterCare === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="serviceEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#serviceEdit,#serviceShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Adult Education WIOA Title II</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="adultEdu" id="adultEdu" >
                                                        <option value="Yes" <?php echo ($adultEducation === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($adultEducation === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Youth Build</div>
                                                <div class="col-1">
                                                        <select class="form-select-SM m-2 border rounded-2" name="youthBuild" id="youthBuild" >
                                                        <option value="Yes" <?php echo ($youthBuilt === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($youthBuilt === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                                <div class="col-2 fw-bold">Youth Build Grant Number</div>
                                                <div class="col-3">
                                                        <input type="text" name="youthGrantNum" class="col input-underline" value ="<?php echo (!empty($youthBuiltNum))?$youthBuiltNum:""?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Job Corps</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="jobCorp" id="jobCorp" >
                                                        <option value="Yes" <?php echo ($jobCorp === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($jobCorp === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Vocational Education (Carl Perkins)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="carlPerkins" id="carlPerkins" >
                                                        <option value="Yes" <?php echo ($carlPerkins === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($carlPerkins === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Temporary Assistance for Needy Families (TANF)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="tanf" id="tanf" >
                                                        <option value="Yes" <?php echo ($tanf === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($tanf === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Supplemental Security Income (SSI)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="ssi" id="ssi" >
                                                        <option value="Yes" <?php echo ($ssi === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($ssi === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">General Assistance (GA)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="generalAssist" id="generalAssist" >
                                                        <option value="Yes" <?php echo ($ga === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($ga === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Supplemental Nutrition Assistance Program (SNAP/Cal Fresh)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="calFresh" id="calFresh" >
                                                        <option value="Yes" <?php echo ($snap === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($snap === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Refugee Cash Assistance (RCA)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="refugeeAssist" id="refugeeAssist" >
                                                        <option value="Yes" <?php echo ($rca === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($rca === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Social Security Disability Insurance (SSDI)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="ssdi" id="ssdi" >
                                                        <option value="Yes" <?php echo ($ssdi === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($ssdi === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Services under SNAP Employment and Training Program</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="snapTraining" id="snapTraining" >
                                                        <option value="Yes" <?php echo ($snapTraining === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($snapTraining === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Pell Grant</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="pellGrant" id="pellGrant" >
                                                        <option value="Yes" <?php echo ($pellGrant === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($pellGrant === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5" id="Hardship">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Hardship</legend>
                        <div id ="hardshipShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Disability</div>
                                        <div class="col-7"><?php echo $disability?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#hardshipShow,#hardshipEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Disability Description</div>
                                        <div class="col-7"><?php echo $disabilityType?></div>
                                </div>
                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Ticket-to-Work Holder issued by Social Security Administration</div>
                                        <div class="col-7"><?php echo $ticket?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Homeless</div>
                                        <div class="col-7"><?php echo $homeless?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Ex-Offender</div>
                                        <div class="col-7"><?php echo $exOffender?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Displaced Homemaker</div>
                                        <div class="col-7"><?php echo $displace?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Single Parent (including single pregnant women)</div>
                                        <div class="col-7"><?php echo $singleParent?></div>
                                </div>


                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Cultural Barriers</div>
                                        <div class="col-7"><?php echo $culturalBarrier?></div>
                                </div>

                        </div>

                        <div id ="hardshipEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $userID?>&role=personal">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Disability</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="disability" id="disability" >
                                                        <option value="Yes" <?php echo ($disability === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($disability === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="hardshipEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#hardshipEdit,#hardshipShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Disability Description</div>
                                                <div class="col-7">
                                                        <input type="text" name="disabilityDes" class="col input-underline" value ="<?php echo ($disabilityType)? $disabilityType:"N/A"?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Ticket-to-Work Holder issued by Social Security Administration</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="ticketToWork" id="ticketToWork" >
                                                        <option value="Yes" <?php echo ($ticket) ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($ticket === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Homeless</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="homeless" id="homeless" >
                                                        <option value="Yes" <?php echo ($homeless === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($homeless === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Ex-Offender</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="exOffender" id="exOffender" >
                                                        <option value="Yes" <?php echo ($exOffender === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($exOffender === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Displaced Homemaker</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="displacedHomemaker" id="displacedHomemaker" >
                                                        <option value="Yes" <?php echo ($displace === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($displace === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Single Parent (including single pregnant women)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="singleParent" id="singleParent" >
                                                        <option value="Yes" <?php echo ($singleParent === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($singleParent === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Cultural Barriers</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="culturalBarriers" id="culturalBarriers" >
                                                        <option value="Yes" <?php echo ($culturalBarrier === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($culturalBarrier === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>
</div>
