<?php

        if (!isset($_SESSION['adminLogin'])){
             //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php");
            exit();
        }
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
                        <?php
                                if($_SESSION['role'] === "Client"){
                                echo "<a class=\"col nav-link border p-3 text-center\" href=\"#Coach\">Coach</a>";
                                }  ?>
                        <a class="col-1 nav-link border p-3 text-center" href="#Reset">Reset</a>
                </div>
        </div>
        <div class="mb-5" id = "Demographic">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Demographic Information</legend>
                        <div id ="clientNameShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Client ID</div>
                                        <div class="col-7"><?php echo $_SESSION['viewID']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#clientNameShow,#clientNameEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">First Name</div>
                                        <div class="col-7"><?php echo $_SESSION['viewFname']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Middle Name</div>
                                        <div class="col-7"><?php echo $_SESSION['viewMI']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Last Name</div>
                                        <div class="col-7"><?php echo $_SESSION['viewLname']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Date of Birth</div>
                                        <div class="col-7"><?php echo $_SESSION['viewDOB'] ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Last four SSN</div>
                                        <div class="col-7"><?php
                                        echo $_SESSION['view4SSN']; ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Gender</div>
                                        <div class="col-7"><?php echo $_SESSION['viewGender']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Ethnicity</div>
                                        <div class="col-7"><?php echo $_SESSION['viewRaces']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Program Partner Reference</div>
                                        <div class="col-7"><?php echo $_SESSION['viewProgram']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Primary Language</div>
                                        <div class="col-7"><?php echo $_SESSION['viewLanguage']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">English Proficiency</div>
                                        <div class="col-7"><?php echo $_SESSION['viewProficiency']?></div>
                                </div>

                        </div>

                        <div id ="clientNameEdit" style="transition:1ms;" class ="collapse collapse">

                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">ID</div>
                                                <div class="col-7"><?php echo $_SESSION['viewID']?></div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="clientDemographicEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#clientNameEdit,#clientNameShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">First Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="fname" class="col input-underline" value ="<?php echo $_SESSION['viewFname']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Middle Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="MI" class="col input-underline" value ="<?php echo $_SESSION['viewMI']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Last Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="lname" class="col input-underline" value ="<?php echo $_SESSION['viewLname']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Date of Birth</div>
                                                <div class="col-7">
                                                        <input type="date" name="DOB" class="col input-underline" value ="<?php echo $_SESSION['DOB'] ?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Last four SSN</div>
                                                <div class="col-7">
                                                        <input type="number" name="last4SSN" class="col input-underline"  value ="<?php echo $_SESSION['view4SSN'] ?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Gender</div>
                                                <div class="col-7">
                                                        <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male"<?php
                                                                echo ($_SESSION['viewGender'] === "Male")? 'checked' : ''?>>
                                                                <label class="form-check-label" for="male">
                                                                        Male
                                                                </label>
                                                        </div>
                                                        <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php
                                                                echo ($_SESSION['viewGender'] === "Female")? 'checked' : ''?>>
                                                                <label class="form-check-label" for="female">
                                                                        Female
                                                                </label>
                                                        </div>
                                                        <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="notSay" value="Not Say" <?php
                                                                echo ($_SESSION['viewGender'] === "Not Say")? 'checked' : ''?>>
                                                                <label class="form-check-label" for="notSay">
                                                                        Prefer not to say
                                                                </label>
                                                        </div>
                                                        <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="other" value="Other"<?php
                                                                echo ($_SESSION['viewGender'] !== "Male" && $_SESSION['viewGender'] !== "Female" && $_SESSION['viewGender'] !== "Not say" )? "checked" : ''?>>
                                                                <label class="form-check-label" for="other">
                                                                        Other
                                                                </label>
                                                                <input type="text" name="otherAns" id="otherAns" class="m-2 input-underline" value="<?php
                                                                echo ($_SESSION['viewGender'] !== "Male" && $_SESSION['viewGender'] !== "Female" && $_SESSION['viewGender'] !== "Not say" )? $_SESSION['viewGender'] : ''?>"/>
                                                        </div>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Ethnicity</div>
                                                <div class="col-7">

                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="africanAmerican_black" name="africanAmerican_black" value="Yes"
                                                                <?php
                                                                echo ($_SESSION['black'] === "Yes")? 'checked' : ''?>>
                                                                <label for="africanAmerican_black">African American/Black</label><br>
                                                        </div>

                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="americanIndian_alaskanNative" name="americanIndian_alaskanNative" value="Yes" <?php
                                                                echo ($_SESSION['native'] === "Yes")? 'checked' : ''?>>
                                                                <label for="americanIndian_alaskanNative">American Indian/Alaskan Native</label><br>
                                                        </div>

                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="asian" name="asian" value="Yes" <?php
                                                                echo ($_SESSION['asian'] === "Yes")? 'checked' : ''?>>
                                                                <label for="asian">Asian</label><br>
                                                                </div>
                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="hawaiian_other" name="hawaiian_other" value="Yes" <?php
                                                                echo ($_SESSION['hawaiian'] === "Yes")? 'checked' : ''?>>
                                                                <label for="hawaiian_other">Hawaiian/Other Pacific Islander</label><br>
                                                        </div>
                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="Hispanic" name="hispanic" value="Yes" <?php
                                                                echo ($_SESSION['hispanic'] === "Yes")? 'checked' : ''?>>
                                                                <label for="hispanic">Hispanic Heritage</label><br>
                                                        </div>
                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="white" name="white" value="Yes" <?php
                                                                echo ($_SESSION['white'] === "Yes")? 'checked' : ''?>>
                                                                <label for="white">White</label><br>
                                                                </div>
                                                        <div class="form-check m-2 p-0">
                                                                <input type="checkbox" id="noAnswer" name="noAnswer" value="Yes" <?php
                                                                echo ($_SESSION['noRaces'] === "Yes")? 'checked' : ''?>>
                                                                <label for="noAnswer">I do not wish to answer</label><br>
                                                        </div>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Program Partner Reference</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="programMember" id="programMember">
                                                                <option value="Friend and Family"<?php echo ($_SESSION['viewProgram'] === 'Friend and Family') ? 'selected' : ''; ?>>Friend and Family</option>
                                                                <option value="Hiring Event or Career Fair"<?php echo ($_SESSION['viewProgram'] === 'Hiring Event or Career Fair') ? 'selected' : ''; ?>>Hiring Event or Career Fair</option>
                                                                <option value="Women's Empowerment"<?php echo ($_SESSION['viewProgram'] === 'Women\'s Empowerment') ? 'selected' : ''; ?>>Women's Empowerment</option>
                                                                <option value="Next Move"<?php echo ($_SESSION['viewProgram'] === 'Next Move') ? 'selected' : ''; ?>>Next Move</option>
                                                                <option value="Waking the Village"<?php echo ($_SESSION['viewProgram'] === 'Waking the Village') ? 'selected' : ''; ?>>Waking the Village</option>
                                                                <option value="Saint John's"<?php echo ($_SESSION['viewProgram'] === 'Saint John\'s') ? 'selected' : ''; ?>>Saint John's</option>
                                                                <option value="La Familia"<?php echo ($_SESSION['viewProgram'] === 'La Familia') ? 'selected' : ''; ?>>La Familia</option>
                                                                <option value="GS Urban League"<?php echo ($_SESSION['viewProgram'] === 'GS Urban League') ? 'selected' : ''; ?>>GS Urban League</option>
                                                                <option value="Asian Resources"<?php echo ($_SESSION['viewProgram'] === 'Asian Resources') ? 'selected' : ''; ?>>Asian Resources</option>
                                                                <option value="Folsom Cordova CP"<?php echo ($_SESSION['viewProgram'] === 'Folsom Cordova CP') ? 'selected' : ''; ?>>Folsom Cordova CP</option>
                                                                <option value="Lemon Hill"<?php echo ($_SESSION['viewProgram'] === 'Lemon Hill') ? 'selected' : ''; ?>>Lemon Hill</option>
                                                                <option value="Sac Job Corp"<?php echo ($_SESSION['viewProgram'] === 'Sac Job Corp') ? 'selected' : ''; ?>>Sac Job Corp</option>
                                                                <option value="Public/Aura Planning"<?php echo ($_SESSION['viewProgram'] === 'Public/Aura Planning') ? 'selected' : ''; ?>>Public/Aura Planning</option>
                                                                <option value="International Rescue Committee Sacramento"<?php echo ($_SESSION['viewProgram'] === 'International Rescue Committee Sacramento') ? 'selected' : ''; ?>>International Rescue Committee Sacramento</option>
                                                                <option value="Community Resource Project"<?php echo ($_SESSION['viewProgram'] === 'Community Resource Project') ? 'selected' : ''; ?>>Community Resource Project</option>
                                                                <option value="Fellowship"<?php echo ($_SESSION['viewProgram'] === 'Fellowship') ? 'selected' : ''; ?>>Fellowship</option>
                                                                <option value="Other"<?php echo ($_SESSION['viewProgram'] === 'Other') ? 'selected' : ''; ?>>Other</option>
                                                        </select>

                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Primary Language</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="language" id="language">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="English"<?php echo ($_SESSION['viewLanguage'] === 'English') ? ' selected' : ''; ?>>English</option>
                                                                <option value="Spanish"<?php echo ($_SESSION['viewLanguage'] === 'Spanish') ? ' selected' : ''; ?>>Spanish</option>
                                                                <option value="Dari"<?php echo ($_SESSION['viewLanguage'] === 'Dari') ? ' selected' : ''; ?>>Dari</option>
                                                                <option value="Pashto"<?php echo ($_SESSION['viewLanguage'] === 'Pashto') ? ' selected' : ''; ?>>Pashto</option>
                                                                <option value="Russian"<?php echo ($_SESSION['viewLanguage'] === 'Russian') ? ' selected' : ''; ?>>Russian</option>
                                                                <option value="Vietnamese"<?php echo ($_SESSION['viewLanguage'] === 'Vietnamese') ? ' selected' : ''; ?>>Vietnamese</option>
                                                                <option value="Mandarin"<?php echo ($_SESSION['viewLanguage'] === 'Mandarin') ? ' selected' : ''; ?>>Mandarin</option>
                                                                <option value="Arabic"<?php echo ($_SESSION['viewLanguage'] === 'Arabic') ? ' selected' : ''; ?>>Arabic</option>
                                                                <option value="Farsi"<?php echo ($_SESSION['viewLanguage'] === 'Farsi') ? ' selected' : ''; ?>>Farsi</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">English Proficiency</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="proficiency" id="proficiency">
                                                                <option value="Yes" <?php echo ($_SESSION['viewProficiency'] === 'Yes') ? ' selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['viewProficiency'] === 'No') ? ' selected' : ''; ?>>No</option>
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
                                        <div class="col-7"><?php echo $_SESSION['viewStreet']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#clientAddressShow,#clientAddressEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">City</div>
                                        <div class="col-7"><?php echo $_SESSION['viewCity']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">County</div>
                                        <div class="col-7"><?php echo $_SESSION['viewCounty']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">State</div>
                                        <div class="col-7"><?php echo $_SESSION['viewState']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Zip Code</div>
                                        <div class="col-7"><?php echo $_SESSION['viewZipcode']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Primary Phone Number</div>
                                        <div class="col-2"><?php echo $_SESSION['viewPhone']?></div>
                                        <div class="col-2 fw-bold">Type</div>
                                        <div class="col-2"><?php echo $_SESSION['viewPhoneType']?></div>

                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Alternative Phone Number</div>
                                        <div class="col-7"><?php echo (!empty($_SESSION['viewAltPhone']))? $_SESSION['viewAltPhone']: "N/A" ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Email</div>
                                        <div class="col-7"><?php echo $_SESSION['viewEmail']?></div>
                                </div>

                        </div>

                        <div id ="clientAddressEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Street</div>
                                                <div class="col-7">
                                                        <input type="text" name="street" class="col input-underline" value ="<?php echo $_SESSION['viewStreet']?>">
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="clientAddEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#clientAddressEdit,#clientAddressShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">City</div>
                                                <div class="col-7">
                                                        <input type="text" name="city" class="col input-underline" value ="<?php echo $_SESSION['viewCity']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">County</div>
                                                <div class="col-7">
                                                        <input type="text" name="county" class="col input-underline" value ="<?php echo $_SESSION['viewCounty']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">State</div>
                                                <div class="col-7">
                                                <select class="form-select-SM m-2 border rounded-2" name="state" id="state">
                                                        <option value="" disabled selected hidden>Choose</option>
                                                        <option value="Alabama"<?php echo ($_SESSION['viewState'] === 'Alabama') ? ' selected' : ''; ?>>Alabama</option>
                                                        <option value="Alaska"<?php echo ($_SESSION['viewState'] === 'Alaska') ? ' selected' : ''; ?>>Alaska</option>
                                                        <option value="Arizona"<?php echo ($_SESSION['viewState'] === 'Arizona') ? ' selected' : ''; ?>>Arizona</option>
                                                        <option value="Arkansas"<?php echo ($_SESSION['viewState'] === 'Arkansas') ? ' selected' : ''; ?>>Arkansas</option>
                                                        <option value="California"<?php echo ($_SESSION['viewState'] === 'California') ? ' selected' : ''; ?>>California</option>
                                                        <option value="Colorado"<?php echo ($_SESSION['viewState'] === 'Colorado') ? ' selected' : ''; ?>>Colorado</option>
                                                        <option value="Connecticut"<?php echo ($_SESSION['viewState'] === 'Connecticut') ? ' selected' : ''; ?>>Connecticut</option>
                                                        <option value="Delaware"<?php echo ($_SESSION['viewState'] === 'Delaware') ? ' selected' : ''; ?>>Delaware</option>
                                                        <option value="Florida"<?php echo ($_SESSION['viewState'] === 'Florida') ? ' selected' : ''; ?>>Florida</option>
                                                        <option value="Georgia"<?php echo ($_SESSION['viewState'] === 'Georgia') ? ' selected' : ''; ?>>Georgia</option>
                                                        <option value="Hawaii"<?php echo ($_SESSION['viewState'] === 'Hawaii') ? ' selected' : ''; ?>>Hawaii</option>
                                                        <option value="Idaho"<?php echo ($_SESSION['viewState'] === 'Idaho') ? ' selected' : ''; ?>>Idaho</option>
                                                        <option value="Illinois"<?php echo ($_SESSION['viewState'] === 'Illinois') ? ' selected' : ''; ?>>Illinois</option>
                                                        <option value="Indiana"<?php echo ($_SESSION['viewState'] === 'Indiana') ? ' selected' : ''; ?>>Indiana</option>
                                                        <option value="Iowa"<?php echo ($_SESSION['viewState'] === 'Iowa') ? ' selected' : ''; ?>>Iowa</option>
                                                        <option value="Kansas"<?php echo ($_SESSION['viewState'] === 'Kansas') ? ' selected' : ''; ?>>Kansas</option>
                                                        <option value="Kentucky"<?php echo ($_SESSION['viewState'] === 'Kentucky') ? ' selected' : ''; ?>>Kentucky</option>
                                                        <option value="Louisiana"<?php echo ($_SESSION['viewState'] === 'Louisiana') ? ' selected' : ''; ?>>Louisiana</option>
                                                        <option value="Maine"<?php echo ($_SESSION['viewState'] === 'Maine') ? ' selected' : ''; ?>>Maine</option>
                                                        <option value="Maryland"<?php echo ($_SESSION['viewState'] === 'Maryland') ? ' selected' : ''; ?>>Maryland</option>
                                                        <option value="Massachusetts"<?php echo ($_SESSION['viewState'] === 'Massachusetts') ? ' selected' : ''; ?>>Massachusetts</option>
                                                        <option value="Michigan"<?php echo ($_SESSION['viewState'] === 'Michigan') ? ' selected' : ''; ?>>Michigan</option>
                                                        <option value="Minnesota"<?php echo ($_SESSION['viewState'] === 'Minnesota') ? ' selected' : ''; ?>>Minnesota</option><option value="Mississippi"<?php echo ($_SESSION['viewState'] === 'Mississippi') ? ' selected' : ''; ?>>Mississippi</option>
                                                        <option value="Missouri"<?php echo ($_SESSION['viewState'] === 'Missouri') ? ' selected' : ''; ?>>Missouri</option>
                                                        <option value="Montana"<?php echo ($_SESSION['viewState'] === 'Montana') ? ' selected' : ''; ?>>Montana</option>
                                                        <option value="Nebraska"<?php echo ($_SESSION['viewState'] === 'Nebraska') ? ' selected' : ''; ?>>Nebraska</option>
                                                        <option value="Nevada"<?php echo ($_SESSION['viewState'] === 'Nevada') ? ' selected' : ''; ?>>Nevada</option>
                                                        <option value="New Hampshire"<?php echo ($_SESSION['viewState'] === 'New Hampshire') ? ' selected' : ''; ?>>New Hampshire</option>
                                                        <option value="New Jersey"<?php echo ($_SESSION['viewState'] === 'New Jersey') ? ' selected' : ''; ?>>New Jersey</option>
                                                        <option value="New Mexico"<?php echo ($_SESSION['viewState'] === 'New Mexico') ? ' selected' : ''; ?>>New Mexico</option>
                                                        <option value="New York"<?php echo ($_SESSION['viewState'] === 'New York') ? ' selected' : ''; ?>>New York</option>
                                                        <option value="North Carolina"<?php echo ($_SESSION['viewState'] === 'North Carolina') ? ' selected' : ''; ?>>North Carolina</option>
                                                        <option value="North Dakota"<?php echo ($_SESSION['viewState'] === 'North Dakota') ? ' selected' : ''; ?>>North Dakota</option>
                                                        <option value="Ohio"<?php echo ($_SESSION['viewState'] === 'Ohio') ? ' selected' : ''; ?>>Ohio</option>
                                                        <option value="Oklahoma"<?php echo ($_SESSION['viewState'] === 'Oklahoma') ? ' selected' : ''; ?>>Oklahoma</option>
                                                        <option value="Oregon"<?php echo ($_SESSION['viewState'] === 'Oregon') ? ' selected' : ''; ?>>Oregon</option>
                                                        <option value="Pennsylvania"<?php echo ($_SESSION['viewState'] === 'Pennsylvania') ? ' selected' : ''; ?>>Pennsylvania</option>
                                                        <option value="Rhode Island"<?php echo ($_SESSION['viewState'] === 'Rhode Island') ? ' selected' : ''; ?>>Rhode Island</option>
                                                        <option value="South Carolina"<?php echo ($_SESSION['viewState'] === 'South Carolina') ? ' selected' : ''; ?>>South Carolina</option>
                                                        <option value="South Dakota"<?php echo ($_SESSION['viewState'] === 'South Dakota') ? ' selected' : ''; ?>>South Dakota</option>
                                                        <option value="Tennessee"<?php echo ($_SESSION['viewState'] === 'Tennessee') ? ' selected' : ''; ?>>Tennessee</option>
                                                        <option value="Texas"<?php echo ($_SESSION['viewState'] === 'Texas') ? ' selected' : ''; ?>>Texas</option>
                                                        <option value="Utah"<?php echo ($_SESSION['viewState'] === 'Utah') ? ' selected' : ''; ?>>Utah</option>
                                                        <option value="Vermont"<?php echo ($_SESSION['viewState'] === 'Vermont') ? ' selected' : ''; ?>>Vermont</option>
                                                        <option value="Virginia"<?php echo ($_SESSION['viewState'] === 'Virginia') ? ' selected' : ''; ?>>Virginia</option>
                                                        <option value="Washington"<?php echo ($_SESSION['viewState'] === 'Washington') ? ' selected' : ''; ?>>Washington</option>
                                                        <option value="West Virginia"<?php echo ($_SESSION['viewState'] === 'West Virginia') ? ' selected' : ''; ?>>West Virginia</option>
                                                        <option value="Wisconsin"<?php echo ($_SESSION['viewState'] === 'Wisconsin') ? ' selected' : ''; ?>>Wisconsin</option>
                                                        <option value="Wyoming"<?php echo ($_SESSION['viewState'] === 'Wyoming') ? ' selected' : ''; ?>>Wyoming</option>
                                                </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Zip Code</div>
                                                <div class="col-7">
                                                        <input type="text" name="zipcode" class="col input-underline" value ="<?php echo $_SESSION['viewZipcode']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Phone</div>
                                                <div class="col-7">
                                                        <input type="text" name="phone" class="col input-underline" value ="<?php echo $_SESSION['viewPhone']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Alternative Phone Number</div>
                                                <div class="col-7">
                                                        <input type="text" name="altPhone" class="col input-underline" value ="<?php echo (!empty($_SESSION['viewAltPhone']))? $_SESSION['viewAltPhone']: "" ?>">
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
                                        <div class="col-7"><?php echo $_SESSION['mailingStreet']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#mailingAddressShow,#mailingAddressEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Mailing City</div>
                                        <div class="col-7"><?php echo $_SESSION['mailingCity']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Mailing County</div>
                                        <div class="col-7"><?php echo $_SESSION['mailingCounty']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Mailing State</div>
                                        <div class="col-7"><?php echo $_SESSION['mailingState']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Mailing Zip Code</div>
                                        <div class="col-7"><?php echo $_SESSION['mailingZipcode']?></div>
                                </div>
                        </div>

                        <div id ="mailingAddressEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Mailing Street</div>
                                                <div class="col-7">
                                                        <input type="text" name="mailingStreet" class="col input-underline" value ="<?php echo $_SESSION['mailingStreet']?>">
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="mailAddEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#mailingAddressEdit,#mailingAddressShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Mailing City</div>
                                                <div class="col-7">
                                                        <input type="text" name="mailingCity" class="col input-underline" value ="<?php echo $_SESSION['mailingCity']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Mailing County</div>
                                                <div class="col-7">
                                                        <input type="text" name="mailingCounty" class="col input-underline" value ="<?php echo $_SESSION['mailingCounty']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Mailing State</div>
                                                <div class="col-7">
                                                <select class="form-select-SM m-2 border rounded-2" name="mailingState" id="state">
                                                <option value="" disabled selected hidden>Choose</option>
                                                        <option value="Alabama"<?php echo ($_SESSION['mailingState'] === 'Alabama') ? ' selected' : ''; ?>>Alabama</option>
                                                        <option value="Alaska"<?php echo ($_SESSION['mailingState'] === 'Alaska') ? ' selected' : ''; ?>>Alaska</option>
                                                        <option value="Arizona"<?php echo ($_SESSION['mailingState'] === 'Arizona') ? ' selected' : ''; ?>>Arizona</option>
                                                        <option value="Arkansas"<?php echo ($_SESSION['mailingState'] === 'Arkansas') ? ' selected' : ''; ?>>Arkansas</option>
                                                        <option value="California"<?php echo ($_SESSION['mailingState'] === 'California') ? ' selected' : ''; ?>>California</option>
                                                        <option value="Colorado"<?php echo ($_SESSION['mailingState'] === 'Colorado') ? ' selected' : ''; ?>>Colorado</option>
                                                        <option value="Connecticut"<?php echo ($_SESSION['mailingState'] === 'Connecticut') ? ' selected' : ''; ?>>Connecticut</option>
                                                        <option value="Delaware"<?php echo ($_SESSION['mailingState'] === 'Delaware') ? ' selected' : ''; ?>>Delaware</option>
                                                        <option value="Florida"<?php echo ($_SESSION['mailingState'] === 'Florida') ? ' selected' : ''; ?>>Florida</option>
                                                        <option value="Georgia"<?php echo ($_SESSION['mailingState'] === 'Georgia') ? ' selected' : ''; ?>>Georgia</option>
                                                        <option value="Hawaii"<?php echo ($_SESSION['mailingState'] === 'Hawaii') ? ' selected' : ''; ?>>Hawaii</option>
                                                        <option value="Idaho"<?php echo ($_SESSION['mailingState'] === 'Idaho') ? ' selected' : ''; ?>>Idaho</option>
                                                        <option value="Illinois"<?php echo ($_SESSION['mailingState'] === 'Illinois') ? ' selected' : ''; ?>>Illinois</option>
                                                        <option value="Indiana"<?php echo ($_SESSION['mailingState'] === 'Indiana') ? ' selected' : ''; ?>>Indiana</option>
                                                        <option value="Iowa"<?php echo ($_SESSION['mailingState'] === 'Iowa') ? ' selected' : ''; ?>>Iowa</option>
                                                        <option value="Kansas"<?php echo ($_SESSION['mailingState'] === 'Kansas') ? ' selected' : ''; ?>>Kansas</option>
                                                        <option value="Kentucky"<?php echo ($_SESSION['mailingState'] === 'Kentucky') ? ' selected' : ''; ?>>Kentucky</option>
                                                        <option value="Louisiana"<?php echo ($_SESSION['mailingState'] === 'Louisiana') ? ' selected' : ''; ?>>Louisiana</option>
                                                        <option value="Maine"<?php echo ($_SESSION['mailingState'] === 'Maine') ? ' selected' : ''; ?>>Maine</option>
                                                        <option value="Maryland"<?php echo ($_SESSION['mailingState'] === 'Maryland') ? ' selected' : ''; ?>>Maryland</option>
                                                        <option value="Massachusetts"<?php echo ($_SESSION['mailingState'] === 'Massachusetts') ? ' selected' : ''; ?>>Massachusetts</option>
                                                        <option value="Michigan"<?php echo ($_SESSION['mailingState'] === 'Michigan') ? ' selected' : ''; ?>>
                                                        <option value="Minnesota"<?php echo ($_SESSION['mailingState'] === 'Minnesota') ? ' selected' : ''; ?>>Minnesota</option>
                                                        <option value="Mississippi"<?php echo ($_SESSION['mailingState'] === 'Mississippi') ? ' selected' : ''; ?>>Mississippi</option>
                                                        <option value="Missouri"<?php echo ($_SESSION['mailingState'] === 'Missouri') ? ' selected' : ''; ?>>Missouri</option>
                                                        <option value="Montana"<?php echo ($_SESSION['mailingState'] === 'Montana') ? ' selected' : ''; ?>>Montana</option>
                                                        <option value="Nebraska"<?php echo ($_SESSION['mailingState'] === 'Nebraska') ? ' selected' : ''; ?>>Nebraska</option>
                                                        <option value="Nevada"<?php echo ($_SESSION['mailingState'] === 'Nevada') ? ' selected' : ''; ?>>Nevada</option>
                                                        <option value="New Hampshire"<?php echo ($_SESSION['mailingState'] === 'New Hampshire') ? ' selected' : ''; ?>>New Hampshire</option>
                                                        <option value="New Jersey"<?php echo ($_SESSION['mailingState'] === 'New Jersey') ? ' selected' : ''; ?>>New Jersey</option>
                                                        <option value="New Mexico"<?php echo ($_SESSION['mailingState'] === 'New Mexico') ? ' selected' : ''; ?>>New Mexico</option>
                                                        <option value="New York"<?php echo ($_SESSION['mailingState'] === 'New York') ? ' selected' : ''; ?>>New York</option>
                                                        <option value="North Carolina"<?php echo ($_SESSION['mailingState'] === 'North Carolina') ? ' selected' : ''; ?>>North Carolina</option>
                                                        <option value="North Dakota"<?php echo ($_SESSION['mailingState'] === 'North Dakota') ? ' selected' : ''; ?>>North Dakota</option>
                                                        <option value="Ohio"<?php echo ($_SESSION['mailingState'] === 'Ohio') ? ' selected' : ''; ?>>Ohio</option>
                                                        <option value="Oklahoma"<?php echo ($_SESSION['mailingState'] === 'Oklahoma') ? ' selected' : ''; ?>>Oklahoma</option>
                                                        <option value="Oregon"<?php echo ($_SESSION['mailingState'] === 'Oregon') ? ' selected' : ''; ?>>Oregon</option>
                                                        <option value="Pennsylvania"<?php echo ($_SESSION['mailingState'] === 'Pennsylvania') ? ' selected' : ''; ?>>Pennsylvania</option>
                                                        <option value="Rhode Island"<?php echo ($_SESSION['mailingState'] === 'Rhode Island') ? ' selected' : ''; ?>>Rhode Island</option>
                                                        <option value="South Carolina"<?php echo ($_SESSION['mailingState'] === 'South Carolina') ? ' selected' : ''; ?>>South Carolina</option>
                                                        <option value="South Dakota"<?php echo ($_SESSION['mailingState'] === 'South Dakota') ? ' selected' : ''; ?>>South Dakota</option>
                                                        <option value="Tennessee"<?php echo ($_SESSION['mailingState'] === 'Tennessee') ? ' selected' : ''; ?>>Tennessee</option>
                                                        <option value="Texas"<?php echo ($_SESSION['mailingState'] === 'Texas') ? ' selected' : ''; ?>>Texas</option>
                                                        <option value="Utah"<?php echo ($_SESSION['mailingState'] === 'Utah') ? ' selected' : ''; ?>>Utah</option>
                                                        <option value="Vermont"<?php echo ($_SESSION['mailingState'] === 'Vermont') ? ' selected' : ''; ?>>Vermont</option>
                                                        <option value="Virginia"<?php echo ($_SESSION['mailingState'] === 'Virginia') ? ' selected' : ''; ?>>Virginia</option>
                                                        <option value="Washington"<?php echo ($_SESSION['mailingState'] === 'Washington') ? ' selected' : ''; ?>>Washington</option>
                                                        <option value="West Virginia"<?php echo ($_SESSION['mailingState'] === 'West Virginia') ? ' selected' : ''; ?>>West Virginia</option>
                                                        <option value="Wisconsin"<?php echo ($_SESSION['mailingState'] === 'Wisconsin') ? ' selected' : ''; ?>>Wisconsin</option>
                                                        <option value="Wyoming"<?php echo ($_SESSION['mailingState'] === 'Wyoming') ? ' selected' : ''; ?>>Wyoming</option>

                                                </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Zip Code</div>
                                                <div class="col-7">
                                                        <input type="text" name="mailingZipcode" class="col input-underline" value ="<?php echo $_SESSION['mailingZipcode']?>">
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
                                        <div class="col-7"><?php echo $_SESSION['usCitizenshipStatus']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#citizenShow,#citizenEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Alien Registration Code</div>
                                        <div class="col-7"><?php echo (!empty($_SESSION['alienRegistrationCode'])) ? $_SESSION['alienRegistrationCode'] :"N/A"?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Alien Registration Code Expired Date</div>
                                        <div class="col-7"><?php echo (!empty($_SESSION['alienRegistrationCodeEXP'])) ? $_SESSION['alienRegistrationCodeEXP'] :"N/A"?></div>
                                </div>
                        </div>

                        <div id ="citizenEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Citizenship Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" style="max-width:75%;" name="citizenship" id="citizenship">
                                                                <option value="" disabled>Choose</option>
                                                                <option value="Citizen" <?php echo ($_SESSION['usCitizenshipStatus'] === 'Citizen') ? 'selected' : ''; ?>>Citizen of US or US Territory</option>
                                                                <option value="US Permanent Resident" <?php echo ($_SESSION['usCitizenshipStatus'] === 'US Permanent Resident') ? 'selected' : ''; ?>>US Permanent Resident</option>
                                                                <option value="Alien/Refugee Lawfully Admitted to the US" <?php echo ($_SESSION['usCitizenshipStatus'] === 'Alien/Refugee Lawfully Admitted to the US') ? 'selected' : ''; ?>>Alien/Refugee Lawfully Admitted to the US</option>
                                                                <option value="None Citizen" <?php echo ($_SESSION['usCitizenshipStatus'] === 'None Citizen') ? 'selected' : ''; ?>>None of the above</option>
                                                        </select>

                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="citizenEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#citizenEdit,#citizenShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Alien Registration Code</div>
                                                <div class="col-7">
                                                        <input type="text" name="alienCode" class="col input-underline" value ="<?php echo (!empty($_SESSION['alienRegistrationCode'])) ? $_SESSION['alienRegistrationCode'] :""?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Alien Registration Code Expired Date</div>
                                                <div class="col-7">
                                                        <input type="date" name="alienCodeEXP" class="col input-underline" value ="<?php echo (!empty($_SESSION['alienRegistrationCodeEXP'])) ? $_SESSION['alienRegistrationCodeEXP'] :""?>">
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
                                        <div class="col-7"><?php echo ($_SESSION['inSchool'] === 'Yes')?"In school" : "Not in school";?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#educationShow,#educationEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">High School Status</div>
                                        <div class="col-7"><?php echo $_SESSION['highSchoolStatus']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Diploma and Equivalent</div>
                                        <div class="col-7"><?php echo $_SESSION['highSchooolDiplomaOrEquil']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Highest School Grade Completed</div>
                                        <div class="col-7"><?php echo $_SESSION['highestGradeComplete']?></div>
                                </div>
                        </div>

                        <div id ="educationEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">School Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="schoolStatus" id="notInschool" >
                                                                <option value="Yes" <?php echo ($_SESSION['inSchool'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['inSchool'] === 'No') ? 'selected' : ''; ?>>No</option>
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
                                                                <option value="9th" <?php echo ($_SESSION['highSchoolStatus'] === '9th') ? 'selected' : ''; ?>>9th grade</option>
                                                                <option value="10th" <?php echo ($_SESSION['highSchoolStatus'] === '10th') ? 'selected' : ''; ?>>10th grade</option>
                                                                <option value="11th" <?php echo ($_SESSION['highSchoolStatus'] === '11th') ? 'selected' : ''; ?>>11th grade</option>
                                                                <option value="12th" <?php echo ($_SESSION['highSchoolStatus'] === '12th') ? 'selected' : ''; ?>>12th grade</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Diploma and Equivalent</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="diploma" id="diploma" >
                                                                <option value="Yes" <?php echo ($_SESSION['highSchooolDiplomaOrEquil'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['highSchooolDiplomaOrEquil'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Highest School Grade Completed</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="highestSchool" id="highestSchool">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="High School" <?php echo ($_SESSION['highestGradeComplete'] === 'High School') ? 'selected' : ''; ?>>High School Diploma</option>
                                                                <option value="GED" <?php echo ($_SESSION['highestGradeComplete'] === 'GED') ? 'selected' : ''; ?>>High School Equivalent Diploma (GED)</option>
                                                                <option value="Certificate of Attendance/Completion" <?php echo ($_SESSION['highestGradeComplete'] === 'Certificate of Attendance/Completion') ? 'selected' : ''; ?>>Certificate of Attendance/Completion (Disabled Individuales)</option>
                                                                <option value="Vocational School Certificate" <?php echo ($_SESSION['highestGradeComplete'] === 'Vocational School Certificate') ? 'selected' : ''; ?>>Vocational School Certificate</option>
                                                                <option value="College or Technical or Vocational School" <?php echo ($_SESSION['highestGradeComplete'] === 'College or Technical or Vocational School') ? 'selected' : ''; ?>>College or Technical or Vocational School</option>
                                                                <option value="AA/AS" <?php echo ($_SESSION['highestGradeComplete'] === 'AA/AS') ? 'selected' : ''; ?>>AA/AS</option>
                                                                <option value="BA/BS" <?php echo ($_SESSION['highestGradeComplete'] === 'BA/BS') ? 'selected' : ''; ?>>BA/BS</option>
                                                                <option value="Master's Degree" <?php echo ($_SESSION['highestGradeComplete'] === "Master's Degree") ? 'selected' : ''; ?>>Master's Degree</option>
                                                                <option value="Doctor's Degree" <?php echo ($_SESSION['highestGradeComplete'] === "Doctor's Degree") ? 'selected' : ''; ?>>Doctorate Degree</option>
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
                                        <div class="col-7"><?php echo $_SESSION['currentMilitaryOrVet']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#militaryShow,#militaryEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Military Spouse</div>
                                        <div class="col-7"><?php echo $_SESSION['militarySpouse']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Selective Service</div>
                                        <div class="col-7"><?php echo $_SESSION['selectiveService']?></div>
                                </div>
                        </div>

                        <div id ="militaryEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Military/Veteran Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="military" id="military" >
                                                                <option value="Yes" <?php echo ($_SESSION['currentMilitaryOrVet'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['currentMilitaryOrVet'] === 'No') ? 'selected' : ''; ?>>No</option>
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
                                                                <option value="Yes" <?php echo ($_SESSION['militarySpouse'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['militarySpouse'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Selective Service</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="selective" id="highestSchool">
                                                                <option value="Yes" <?php echo ($_SESSION['selectiveService'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['selectiveService'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                                <option value="Documented exemption" <?php echo ($_SESSION['selectiveService'] === 'Documented exemption') ? 'selected' : ''; ?>>Documented exemption</option>
                                                                <option value="No" <?php echo ($_SESSION['selectiveService'] === 'Not applicable') ? 'selected' : ''; ?>>Not applicable</option>
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
                                        <div class="col-7"><?php echo $_SESSION['employmentStatus']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#employmentShow,#employmentEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Pay Rate</div>
                                        <div class="col-7"><?php echo $_SESSION['viewPayrate']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Unemployment Insurance</div>
                                        <div class="col-7"><?php echo $_SESSION['unemployemntInsurance']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Number of Week Unemployment</div>
                                        <div class="col-7"><?php echo $_SESSION['unemploymentWeeks']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Farm Worker in Last 12 months</div>
                                        <div class="col-7"><?php echo $_SESSION['farmworker12Months']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Job Title</div>
                                        <div class="col-7"><?php echo $_SESSION['desiredJobTitle']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Technical Experience</div>
                                        <div class="col-7"><?php echo $_SESSION['techExperience']?></div>
                                </div>
                        </div>

                        <div id ="employmentEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Employment Status</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" style="max-width:75%;" name="employment" id="employment" >
                                                                <option value="Yes" <?php echo ($_SESSION['employmentStatus'] === 'Employed') ? 'selected' : ''; ?>>Employed</option>
                                                                <option value="Not Employed" <?php echo ($_SESSION['employmentStatus'] === 'Not Employed') ? 'selected' : ''; ?>>Not Employed</option>
                                                                <option value="Employed but received notice of termination or separation from military service" <?php echo ($_SESSION['employmentStatus'] === 'Employed but received notice of termination or separation from military service') ? 'selected' : ''; ?>>Employed but received notice of termination or separation from military service</option>
                                                        </select>
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="employmentEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#employmentEdit,#employmentShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Pay Rate</div>
                                                <div class="col-7">
                                                        <input type="number" name="payRate" class="col input-underline" value ="<?php echo $_SESSION['viewPayrate']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Unemployment Insurance</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="ui" id="ui" >
                                                                <option value="Claimant" <?php echo ($_SESSION['unemployemntInsurance'] === 'Claimant') ? 'selected' : ''; ?>>Claimant</option>
                                                                <option value="Exhaustee" <?php echo ($_SESSION['unemployemntInsurance'] === 'Exhaustee') ? 'selected' : ''; ?>>Exhaustee</option>
                                                                <option value="Neither" <?php echo ($_SESSION['unemployemntInsurance'] === 'Neither') ? 'selected' : ''; ?>>Neither</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Number of Week Unemployment</div>
                                                <div class="col-7">
                                                        <input type="number" name="uiWeek" class="col input-underline" value ="<?php echo $_SESSION['unemploymentWeeks']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Farm Worker in Last 12 months</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="farmworker" id="farmworker" >
                                                        <option value="Yes" <?php echo ($_SESSION['farmworker12Months'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                        <option value="Yes" <?php echo ($_SESSION['farmworker12Months'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Job Title</div>
                                                <div class="col-7">
                                                        <input type="text" name="jobTitle" class="col input-underline" value ="<?php echo $_SESSION['desiredJobTitle']?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Technical Experience</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="techExp" id="techExp" >
                                                                <option value="Yes" <?php echo ($_SESSION['techExperience'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="Yes" <?php echo ($_SESSION['techExperience'] === 'No') ? 'selected' : ''; ?>>No</option>
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
                                        <div class="col-7"><?php echo $_SESSION['familySize']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#incomeShow,#incomeEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Annualized Family Income (last 6 months X2)</div>
                                        <div class="col-7"><?php echo $_SESSION['annualizedFamilyIncome']?></div>
                                </div>
                        </div>

                        <div id ="incomeEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">familySize</div>
                                                <div class="col-7">
                                                        <input type="number" name="familySize" class="col input-underline" value ="<?php echo $_SESSION['familySize']?>">
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="incomeEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#incomeEdit,#incomeShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Annualized Family Income (last 6 months X2)</div>
                                                <div class="col-7">
                                                        <input type="text" name="income" class="col input-underline" value ="<?php echo $_SESSION['annualizedFamilyIncome']?>">
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
                                        <div class="col-7"><?php echo $_SESSION['fosterCare']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#serviceShow,#serviceEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Adult Education WIOA Title II</div>
                                        <div class="col-7"><?php echo $_SESSION['adultEducationWIOATittleII']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Youth Build</div>
                                        <div class="col-1"><?php echo $_SESSION['youthBuild']?></div>
                                        <div class="col-2 fw-bold">Youth Build Grant Number</div>
                                        <div class="col-3"><?php echo (!empty($_SESSION['youthBuildGrant']))? $_SESSION['youthBuildGrant'] : "N/A"?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Job Corps</div>
                                        <div class="col-7"><?php echo $_SESSION['jobCorps']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Vocational Education (Carl Perkins)</div>
                                        <div class="col-7"><?php echo $_SESSION['vocationalEducationCarlPerkins']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Temporary Assistance for Needy Families (TANF)</div>
                                        <div class="col-7"><?php echo $_SESSION['tanfRecipient']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Supplemental Security Income (SSI)</div>
                                        <div class="col-7"><?php echo $_SESSION['ssiRecipient']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">General Assistance (GA)</div>
                                        <div class="col-7"><?php echo $_SESSION['gaRecipient']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Supplemental Nutrition Assistance Program (SNAP/Cal Fresh)</div>
                                        <div class="col-7"><?php echo $_SESSION['snapRecipientCalFresh']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Refugee Cash Assistance (RCA)</div>
                                        <div class="col-7"><?php echo $_SESSION['rcaRecipient']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Social Security Disability Insurance (SSDI)</div>
                                        <div class="col-7"><?php echo $_SESSION['ssdiRecipient']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Services under SNAP Employment and Training Program</div>
                                        <div class="col-7"><?php echo $_SESSION['snapEmploymentAndTrainingProgram']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Pell Grant</div>
                                        <div class="col-7"><?php echo $_SESSION['pellGrant']?></div>
                                </div>

                        </div>

                        <div id ="serviceEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Foster Care</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="foster" id="foster" >
                                                        <option value="Yes" <?php echo ($_SESSION['fosterCare'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['fosterCare'] === 'No') ? 'selected' : ''; ?>>No</option>
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
                                                        <option value="Yes" <?php echo ($_SESSION['adultEducationWIOATittleII'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['adultEducationWIOATittleII'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Youth Build</div>
                                                <div class="col-1">
                                                        <select class="form-select-SM m-2 border rounded-2" name="youthBuild" id="youthBuild" >
                                                        <option value="Yes" <?php echo ($_SESSION['youthBuild'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['youthBuild'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                                <div class="col-2 fw-bold">Youth Build Grant Number</div>
                                                <div class="col-3">
                                                        <input type="text" name="youthGrantNum" class="col input-underline" value ="<?php echo (!empty($_SESSION['youthBuildGrant']))?$_SESSION['youthBuildGrant']:""?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Job Corps</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="jobCorp" id="jobCorp" >
                                                        <option value="Yes" <?php echo ($_SESSION['jobCorps'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['jobCorps'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Vocational Education (Carl Perkins)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="carlPerkins" id="carlPerkins" >
                                                        <option value="Yes" <?php echo ($_SESSION['vocationalEducationCarlPerkins'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['vocationalEducationCarlPerkins'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Temporary Assistance for Needy Families (TANF)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="tanf" id="tanf" >
                                                        <option value="Yes" <?php echo ($_SESSION['tanfRecipient'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['tanfRecipient'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Supplemental Security Income (SSI)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="ssi" id="ssi" >
                                                        <option value="Yes" <?php echo ($_SESSION['ssiRecipient'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['ssiRecipient'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">General Assistance (GA)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="generalAssist" id="generalAssist" >
                                                        <option value="Yes" <?php echo ($_SESSION['gaRecipient'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['gaRecipient'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Supplemental Nutrition Assistance Program (SNAP/Cal Fresh)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="calFresh" id="calFresh" >
                                                        <option value="Yes" <?php echo ($_SESSION['snapRecipientCalFresh'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['snapRecipientCalFresh'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Refugee Cash Assistance (RCA)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="refugeeAssist" id="refugeeAssist" >
                                                        <option value="Yes" <?php echo ($_SESSION['rcaRecipient'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['rcaRecipient'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Social Security Disability Insurance (SSDI)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="ssdi" id="ssdi" >
                                                        <option value="Yes" <?php echo ($_SESSION['ssdiRecipient'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['ssdiRecipient'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Services under SNAP Employment and Training Program</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="snapTraining" id="snapTraining" >
                                                        <option value="Yes" <?php echo ($_SESSION['snapEmploymentAndTrainingProgram'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['snapEmploymentAndTrainingProgram'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Pell Grant</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="pellGrant" id="pellGrant" >
                                                        <option value="Yes" <?php echo ($_SESSION['pellGrant'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['pellGrant'] === 'No') ? 'selected' : ''; ?>>No</option>
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
                                        <div class="col-7"><?php echo $_SESSION['IsDisability']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#hardshipShow,#hardshipEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Disability Description</div>
                                        <div class="col-7"><?php echo $_SESSION['disabilityDescription']?></div>
                                </div>
                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Ticket-to-Work Holder issued by Social Security Administration</div>
                                        <div class="col-7"><?php echo $_SESSION['ticketToWork']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Homeless</div>
                                        <div class="col-7"><?php echo $_SESSION['homelessStatus']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Ex-Offender</div>
                                        <div class="col-7"><?php echo $_SESSION['exOffender']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Displaced Homemaker</div>
                                        <div class="col-7"><?php echo $_SESSION['displacedHomemaker']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Single Parent (including single pregnant women)</div>
                                        <div class="col-7"><?php echo $_SESSION['singleParent']?></div>
                                </div>


                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Cultural Barriers</div>
                                        <div class="col-7"><?php echo $_SESSION['culturalBarriers']?></div>
                                </div>

                        </div>

                        <div id ="hardshipEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Disability</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="disability" id="disability" >
                                                        <option value="Yes" <?php echo ($_SESSION['IsDisability'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['IsDisability'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="hardshipEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#hardshipEdit,#hardshipShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Disability Description</div>
                                                <div class="col-7">
                                                        <input type="text" name="disabilityDes" class="col input-underline" value ="<?php echo ($_SESSION['disabilityDescription'])?($_SESSION['disabilityDescription']):"N/A"?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Ticket-to-Work Holder issued by Social Security Administration</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="ticketToWork" id="ticketToWork" >
                                                        <option value="Yes" <?php echo ($_SESSION['ticketToWork'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['ticketToWork'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Homeless</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="homeless" id="homeless" >
                                                        <option value="Yes" <?php echo ($_SESSION['homelessStatus'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['homelessStatus'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Ex-Offender</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="exOffender" id="exOffender" >
                                                        <option value="Yes" <?php echo ($_SESSION['exOffender'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['exOffender'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Displaced Homemaker</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="displacedHomemaker" id="displacedHomemaker" >
                                                        <option value="Yes" <?php echo ($_SESSION['displacedHomemaker'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['displacedHomemaker'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Single Parent (including single pregnant women)</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="singleParent" id="singleParent" >
                                                        <option value="Yes" <?php echo ($_SESSION['singleParent'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['singleParent'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Cultural Barriers</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="culturalBarriers" id="culturalBarriers" >
                                                        <option value="Yes" <?php echo ($_SESSION['culturalBarriers'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo ($_SESSION['culturalBarriers'] === 'No') ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <?php
                if($_SESSION['role'] === "Client"){
                        echo "<div class=\"mb-5\" id =\"Coach\">";
                        echo "<fieldset class=\"border rounded-3 p-3\">";
                        echo "<legend class=\"float-none w-auto px-3\">Coach Information</legend>";
                        echo "<div id =\"coachInfo\">";
                        echo "<div  class=\"row my-2\">";
                        echo "<div class=\"col-4 fw-bold\">Coach ID</div>";
                        echo "<div class=\"col-7\">".$_SESSION['coachID']."</div></div>";
                        echo "<div  class=\"row my-2\">";
                        echo "<div class=\"col-4 fw-bold\">Coach Name</div>";
                        echo "<div class=\"col-7\">".$_SESSION['coachName']."</div>";
                        echo "</div></div></fieldset></div>";
                }
        ?>

        <div class="mb-5" id="Reset">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Reset Password</legend>
                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">New Password</div>
                                                <div class="col-6">
                                                        <input type="text" name="newPassword" class="col input-underline">
                                                </div>

                                                <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>">
                                                        <div class="col-1 text-end">
                                                                <button type="submit" name ="generate" class="text-decoration-none text-Blue border-0 bg-body">Auto Reset</button>
                                                        </div>
                                                </form>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="inputPass" class="text-decoration-none text-Blue border-0 bg-body">Reset</button>
                                                </div>
                                        </div>
                                </form>
                </fieldset>
        </div>


        <div class = "row">
                <div class= "col">
                        <a href="./Administration1-3.php" class="btn text-white">Back</a>
                </div>

                <div class="col d-flex justify-content-end">
                        <form method="POST" action="./includes/clientModifyFunction.inc.php?id=<?php echo $_SESSION['viewID']?>&status=<?php echo $_SESSION['clientStatus']?>">
                                <button type="submit" name="deactivate"
                                        <?php if($_SESSION['clientStatus'] == 1){
                                                echo "class=\"btn bg-success text-white\"";
                                                }
                                                else {
                                                echo "class=\"btn bg-secondary text-white\"";
                                                }
                                        ?>
                                >
                                        <?php
                                                if($_SESSION['clientStatus'] == 1){
                                                        echo "Deactivate";
                                                        }
                                                else {
                                                        echo "Activate";
                                                }
                                        ?>
                                </button>
                        </form>

                        <button onclick="confirmDelete(<?php echo $_SESSION['viewID']?>)" class="btn bg-danger text-white ms-3">Delete</button>
                </div>
        </div>

</div>

<script>
function confirmDelete(userID) {
  if (confirm("Account cannot be recovery after delete.\nIf you are not sure. Please using deactivate.\nDo you want to continue delete?")) {
        window.location.href = "./includes/clientModifyFunction.inc.php?action=delete&id=" + userID;
  } else {
    // do nothing
  }
}
</script>