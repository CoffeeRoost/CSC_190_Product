<?php

session_start();
// Start session and check if user is logged in
if (!isset($_SESSION['userID'])) {
     //if error, force a logout
     session_unset();
     session_destroy();
    //Redirect user to login page if not logged in
    header("Location:Login.php");
    exit();
}

//connect to database
require_once ('includes/dbh.inc.php');

// Get the user ID from the session variable
$userID = $_SESSION['userID'];

//  Prepare the query
//  Prepare the query
$query = "SELECT part.userID,part.fname,part.lname,part.MI,part.email,part.newUserPassword,part.last4SSN,part.programPartnerReference,
                 part.primaryPhone,part.phoneNumType,part.altPhone,part.DOB,part.gender,
                 a.street,a.city,a.state,a.zipcode,a.county,
                 a.mailingStreet,a.mailingCity,a.mailingState,a.mailingZipcode,a.mailingCounty,
                 c.usCitizenshipStatus,c.alienRegistrationCode,c.alienRegistrationCodeEXP,
                 eth.hispanicHeritage,eth.africanAmercian_black,eth.americanIndian_alaskanNative,
                 eth.asian,eth.hawaiian_other,eth.white,eth.noAnswer,eth.primaryLanguage,eth.englishProficiency

           FROM PARTICIPATION part
           JOIN ADDRESS a
           ON part.userID=a.userID
           JOIN CITIZEN c
           ON part.userID=c.userID
           JOIN ETHNICITY eth

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
        while($row=mysqli_fetch_assoc($result)){
        // data from 'Participation' table
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
        $country=$row['county'];
        $mailingStreet= $row['mailingStreet'];
        $mailingCity= $row['mailingCity'];
        $mailingState= $row['mailingState'];
        $mailingZipcode=$row['mailingZipcode'];
        $mailingCountry=$row['mailingCounty'];

        // data from 'Citizen' table
        $usCitizenshipStatus=$row['usCitizenshipStatus'];
        $alienRegistrationCode=$row['alienRegistrationCode'];
        $alienRegistrationCodeEXP=$row['alienRegistrationCodeEXP'];

        // data from 'Ethnicity' table
        $hispanicHeritage=$row['hispanicHeritage'];
        $africanAmercian_black=$row['africanAmercian_black'];
        $americanIndian_alaskanNative=$row['americanIndian_alaskanNative'];
        $asian=$row['asian'];
        $hawaiian_other=$row['hawaiian_other'];
        $white=$row['white'];
        $noAnswer=$row['noAnswer'];
        $primaryLanguage=$row['primaryLanguage'];
        $englishProficiency=$row['englishProficiency'];




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
    <!-- ************************************************Navbar for Logout******************************************************************************************************* -->
    <section id="title">
        <nav class="navbar navbar-expand-lg bg-Blue"style="width:100vw;>
            <a href="index.php" class="navbar-brand"><img class="logo" src="image/CMC-logo-horizontal(1).png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="includes/logout.inc.php" method="post">
                            <button type="submit" class="nav-link text-white fs-4 mx-4 btn btn-info" name="logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
<!-- *******************************************************Side Bar******************************************************************************************************* -->
	<div class="d-flex">
                <div class="d-flex flex-column flex-shrink-1 align-items-center bg-lightBlue w-300" style=" height: 250vh;" id="sideBar">
                <ul class="nav nav-tabs flex-column align-items-center text-center">
                        <li class="nav-item bg-Blue mt-1 mb-md-1">
                        <a href="./participantDash1-2.php" class="nav-link text-white" >

                                <?php
                                // Write a SQL query to retrieve the user's first name and last name from the PARTICIPATION table
                                $sql = "SELECT fname, lname FROM PARTICIPATION WHERE userID =". $_SESSION['userID'];

                                // Execute the query and fetch the results as an associative array
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);

                                // Output the user's name as a link

                                echo '<h6>' . $row['fname'] . ' ' . $row['lname'] . '\'s Dashboard!<br> ID: '. $_SESSION['userID'].'</h6>';

                        ?>
                        </a>
                        </li>
                        <li class="nav-item bg-Blue mb-md-1">
                        <a href="#participantPersonalInformationTab" class="nav-link text-white">
                                Personal Information
                        </a>
                        </li>
                        <li class="nav-item bg-Blue mb-md-1">
                        <a href="./participantEducationInfo.php" class="nav-link text-white" >
                        Education
                        </a>
                        </li>
                </ul>
                </div>

<div class="container-fluid">
    <!--Demographic Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Demographic Information</legend>
                <div id ="userDemoInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">First Name</div>
                        <div class="col-7"><?php echo $fname?></div>

                        <!--Edit Demographic Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userDemoInfoShow,#userDemoInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <!--Middle name can be null-->
                        <div class="col-4 fw-bold">Middle Name</div>
                        <div class="col-7"><?php if ($mname) { ?><?php echo $mname?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Last Name</div>
                        <div class="col-7"><?php echo $lname?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Date of Birth</div>
                        <div class="col-7"><?php echo $DOB?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Gender</div>
                        <div class="col-7">
                            <?php   if ($gender=='male')        { ?><?php echo 'Male'?>
                            <?php } else if ($gender=='female') { ?><?php echo 'Female'?>
                            <?php } else if ($gender=='notSay') { ?><?php echo 'Prefer Not to Say'?>
                            <?php } else { ?><?php echo $gender?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">SSN</div>
                        <div class="col-7"><?php echo $last4SSN?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Partner Organization</div>
                        <div class="col-7">
                            <?php if ($programPartnerReference=='Friend and Family') { ?>
                            <option value="Friend and Family" selected>Friend and Family</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Hiring Event or Career Fair') { ?>
                            <option value="Hiring Event or Career Fair" selected>Hiring Event or Career Fair</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=="Women's Empowerment") { ?>
                            <option value="Women's Empowerment" selected>Women's Empowerment</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Next Move') { ?>
                            <option value="Next Move" selected>Next Move</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Waking the Village') { ?>
                            <option value="Waking the Village" selected>Waking the Village</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=="Saint John's") { ?>
                            <option value="Saint John's" selected>Saint John's</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='La Familia') { ?>
                            <option value="La Familia" selected>La Familia</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='GS Urban League') { ?>
                            <option value="GS Urban League" selected>GS Urban League</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Asian Resources') { ?>
                            <option value="Asian Resources" selected>Asian Resources</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Folsom Cordova CP') { ?>
                            <option value="Folsom Cordova CP" selected>Folsom Cordova CP</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Lemon Hill') { ?>
                            <option value="Lemon Hill" selected>Lemon Hill</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Sac Job Corp') { ?>
                            <option value="Sac Job Corp" selected>Sac Job Corp</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Public/Aura Planning') { ?>
                            <option value="Public/Aura Planning" selected>Public/Aura Planning</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='International Rescue Committee Sacramento') { ?>
                            <option value="International Rescue Committee Sacramento" selected>International Rescue Committee Sacramento</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Community Resource Project') { ?>
                            <option value="Community Resource Project" selected>Community Resource Project</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Fellowship') { ?>
                            <option value="Fellowship" selected>Fellowship</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Other') { ?>
                            <option value="Other" selected>Other</option>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div id ="userDemoInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2DemographicInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">First Name</div>
                            <div class="col-7">
                                <input type="text" name="fname" class="col input-underline" value ="<?php echo $fname?>">
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#userDemoInfoEdit,#userDemoInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Middle Name</div>
                            <div class="col-7">
                                <?php if ($mname) { ?>
                                    <input type="text" name="mname" class="col input-underline" value ="<?php echo $mname?>">
                                <?php } else { ?>
                                    <input type="text" name="mname" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
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
                                <input type="date" name="bthday" class="col input-underline" value ="<?php echo $DOB?>">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Gender</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php if ($gender=='male') { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <?php } ?>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($gender=='female') { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <?php } ?>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($gender=='notSay') { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="notSay" value="notSay" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="notSay" value="notSay">
                                    <?php } ?>
                                    <label class="form-check-label" for="notSay">Prefer Not to Say</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($gender!='male' && $gender!='female' && $gender!='notSay') { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                    <?php } ?>
                                    <label class="form-check-label" for="other">
                                        Other
                                    </label>
                                    <?php if ($gender!='male' && $gender!='female' && $gender!='notSay') { ?>
                                        <input type="text" name="otherAns" id="otherAns" class="m-2 input-underline" value="<?php echo $gender?>">
                                    <?php } else { ?>
                                        <input type="text" name="otherAns" id="otherAns" class="m-2 input-underline" placeholder="Your answer">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">SSN</div>
                            <div class="col-7">
                            <input type="text" name="SSN" id="SSN" class="m-2 input-underline" value="<?php echo $last4SSN?>" maxlength="4">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Partner Organization</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="partner" id="partner">
                                    <?php if ($programPartnerReference=='Friend and Family') { ?>
                                    <option value="Friend and Family" selected>Friend and Family</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Hiring Event or Career Fair') { ?>
                                    <option value="Hiring Event or Career Fair" selected>Hiring Event or Career Fair</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=="Women's Empowerment") { ?>
                                    <option value="Women's Empowerment" selected>Women's Empowerment</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Next Move') { ?>
                                    <option value="Next Move" selected>Next Move</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Waking the Village') { ?>
                                    <option value="Waking the Village" selected>Waking the Village</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=="Saint John's") { ?>
                                    <option value="Saint John's" selected>Saint John's</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='La Familia') { ?>
                                    <option value="La Familia" selected>La Familia</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='GS Urban League') { ?>
                                    <option value="GS Urban League" selected>GS Urban League</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Asian Resources') { ?>
                                    <option value="Asian Resources" selected>Asian Resources</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Folsom Cordova CP') { ?>
                                    <option value="Folsom Cordova CP" selected>Folsom Cordova CP</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Lemon Hill') { ?>
                                    <option value="Lemon Hill" selected>Lemon Hill</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Sac Job Corp') { ?>
                                    <option value="Sac Job Corp" selected>Sac Job Corp</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Public/Aura Planning') { ?>
                                    <option value="Public/Aura Planning" selected>Public/Aura Planning</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='International Rescue Committee Sacramento') { ?>
                                    <option value="International Rescue Committee Sacramento" selected>International Rescue Committee Sacramento</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Community Resource Project') { ?>
                                    <option value="Community Resource Project" selected>Community Resource Project</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Fellowship') { ?>
                                    <option value="Fellowship" selected>Fellowship</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Other') { ?>
                                    <option value="Other" selected>Other</option>
                                    <?php } ?>

                                    <option value="Friend and Family">Friend and Family</option>
                                    <option value="Hiring Event or Career Fair">Hiring Event or Career Fair</option>
                                    <option value="Women's Empowerment">Women's Empowerment</option>
                                    <option value="Next Move">Next Move</option>
                                    <option value="Waking the Village">Waking the Village</option>
                                    <option value="Saint John's">Saint John's</option>
                                    <option value="La Familia">La Familia</option>
                                    <option value="GS Urban League">GS Urban League</option>
                                    <option value="Asian Resources">Asian Resources</option>
                                    <option value="Folsom Cordova CP">Folsom Cordova CP</option>
                                    <option value="Lemon Hill">Lemon Hill</option>
                                    <option value="Sac Job Corp">Sac Job Corp</option>
                                    <option value="Public/Aura Planning">Public/Aura Planning</option>
                                    <option value="International Rescue Committee Sacramento">International Rescue Committee Sacramento</option>
                                    <option value="Community Resource Project">Community Resource Project</option>
                                    <option value="Fellowship">Fellowship</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>

    <!--Address Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Address Information</legend>
                <div id ="userAddressInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address Street</div>
                        <div class="col-7"><?php echo $street?></div>

                        <!--Edit Address Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userAddressInfoShow,#userAddressInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address City</div>
                        <div class="col-7"><?php echo $city?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address State</div>
                        <div class="col-7"><?php echo $state?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address Zipcode</div>
                        <div class="col-7"><?php echo $zipcode?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address Country</div>
                        <div class="col-7"><?php echo $country?></div>
                    </div>
                <hr>
                    <!--Mailing Address-->
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address Street</div>
                        <div class="col-7"><?php if ($mailingStreet) { ?><?php echo $mailingStreet?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address City</div>
                        <div class="col-7"><?php if ($mailingCity) { ?><?php echo $mailingCity?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address State</div>
                        <div class="col-7"><?php if ($mailingState) { ?><?php echo $mailingState?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address Zipcode</div>
                        <div class="col-7"><?php if ($mailingZipcode) { ?><?php echo $mailingZipcode?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address Country</div>
                        <div class="col-7"><?php if ($mailingCountry) { ?><?php echo $mailingCountry?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>
                </div>

                <div id ="userAddressInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2AddressInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address Street</div>
                            <div class="col-7">
                                <input type="text" name="street" class="col input-underline" value ="<?php echo $street?>">
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#userAddressInfoEdit,#userAddressInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address City</div>
                            <div class="col-7">
                                <input type="text" name="city" class="col input-underline" value ="<?php echo $city?>">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address State</div>
                            <div class="col-7">
                                <input type="text" name="state" class="col input-underline" value ="<?php echo $state?>">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address Zipcode</div>
                            <div class="col-7">
                                <input type="text" name="zip" class="col input-underline" value ="<?php echo $zipcode?>">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address Country</div>
                            <div class="col-7">
                                <input type="text" name="county" class="col input-underline" value ="<?php echo $country?>">
                            </div>
                        </div>
                       <hr>
                        <!--Mailing Address-->
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address Street</div>
                            <div class="col-7">
                                <?php if ($mailingStreet) { ?>
                                    <input type="text" name="mailStreet" class="col input-underline" value="<?php echo $mailingStreet?>">
                                <?php } else { ?>
                                    <input type="text" name="mailStreet" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address City</div>
                            <div class="col-7">
                                <?php if ($mailingCity) { ?>
                                    <input type="text" name="mailCity" class="col input-underline" value="<?php echo $mailingCity?>">
                                <?php } else { ?>
                                    <input type="text" name="mailCity" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address State</div>
                            <div class="col-7">
                                <?php if ($mailingCountry) { ?>
                                    <input type="text" name="mailState" class="col input-underline" value="<?php echo $mailingCountry?>">
                                <?php } else { ?>
                                    <input type="text" name="mailState" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address Zipcode</div>
                            <div class="col-7">
                                <?php if ($mailingZipcode) { ?>
                                    <input type="text" name="mailZip" class="col input-underline" value="<?php echo $mailingZipcode?>">
                                <?php } else { ?>
                                    <input type="text" name="mailZip" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address Country</div>
                            <div class="col-7">
                                <?php if ($mailingCountry) { ?>
                                    <input type="text" name="mailCounty" class="col input-underline" value="<?php echo $mailingCountry?>">
                                <?php } else { ?>
                                    <input type="text" name="mailCounty" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>

    <!--Contact Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Contact Information</legend>
                <div id ="userContactInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Primary Phone Number</div>
                        <div class="col-7"><?php echo $primaryPhone?></div>

                        <!--Edit Contact Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userContactInfoShow,#userContactInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Phone Type</div>
                        <div class="col-7">
                            <?php if ($phoneNumType=='cellphone')      { ?><?php echo 'Cell Phone'?><?php } ?>
                            <?php if ($phoneNumType=='homePhone')      { ?><?php echo 'Home Phone'?><?php } ?>
                            <?php if ($phoneNumType=='relativesPhone') { ?><?php echo 'Relatives Phone'?><?php } ?>
                            <?php if ($phoneNumType=='workphone')      { ?><?php echo 'Work Phone'?><?php } ?>
                            <?php if ($phoneNumType=='otherphone')     { ?><?php echo 'Other'?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Alternative Phone Number</div>
                        <div class="col-7"><?php if ($altPhone) { ?><?php echo $altPhone?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Primary Email</div>
                        <div class="col-7"><?php echo $email?></div>
                    </div>
                </div>

                <div id ="userContactInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2ContactInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Primary Phone Number</div>
                            <div class="col-7">
                                <input type="phone" name="phone" class="col input-underline" value ="<?php echo $primaryPhone?>">
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#userContactInfoEdit,#userContactInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Phone Type</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="phoneType" id="phoneType" >
                                    <?php if ($phoneNumType=='cellphone')      { ?><option value="cellphone" selected>Cell Phone</option><?php } ?>
                                    <?php if ($phoneNumType=='homePhone')      { ?><option value="homePhone" selected>Home Phone</option><?php } ?>
                                    <?php if ($phoneNumType=='relativesPhone') { ?><option value="relativesPhone" selected>Relatives Phone</option><?php } ?>
                                    <?php if ($phoneNumType=='workphone')      { ?><option value="workphone" selected>Work Phone</option><?php } ?>
                                    <?php if ($phoneNumType=='otherphone')     { ?><option value="otherphone" selected>Other</option><?php } ?>

                                    <option value="cellphone">Cell Phone</option>
                                    <option value="homePhone">Home Phone</option>
                                    <option value="relativesPhone">Relatives Phone</option>
                                    <option value="workphone">Work Phone</option>
                                    <option value="otherphone">Other</option>
                                </select>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Alternative Phone Number</div>
                            <div class="col-7">
                                <?php if ($altPhone) { ?>
                                    <input type="phone" name="alPhone" class="col input-underline" value="<?php echo $altPhone?>">
                                <?php } else { ?>
                                    <input type="phone" name="alPhone" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Primary Email</div>
                            <div class="col-7">
                                <input type="email" name="email" class="col input-underline" value="<?php echo $email?>">
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>

    <!--Citizenship Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Citizenship Information</legend>
                <div id ="userCitizenshipInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">US Citizenship Status</div>
                        <div class="col-7">
                            <?php if ($usCitizenshipStatus=='citizen')     { ?><?php echo 'Citizen of US or US Territory'?><?php } ?>
                            <?php if ($usCitizenshipStatus=='greenCard')   { ?><?php echo 'US Permanent Resident'?><?php } ?>
                            <?php if ($usCitizenshipStatus=='alien')       { ?><?php echo 'Alien/Refugee Lawfully Admitted to the US'?><?php } ?>
                            <?php if ($usCitizenshipStatus=='noneCitizen') { ?><?php echo 'None of the above'?><?php } ?>
                        </div>

                        <!--Edit Citizenship Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userCitizenshipInfoShow,#userCitizenshipInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Alien Registration Code</div>
                        <div class="col-7"><?php if ($usCitizenshipStatus=='alien') { ?><?php echo $alienRegistrationCode?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Expired Date</div>
                        <div class="col-7"><?php if ($usCitizenshipStatus=='alien') { ?><?php echo $alienRegistrationCodeEXP?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>
                </div>

                <div id ="userCitizenshipInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2CitizenshipInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">US Citizenship Status</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="citizenship" id="citizenship" >
                                    <?php if ($usCitizenshipStatus=='citizen')     { ?><option value="citizen" selected>Citizen of US or US Territory</option><?php } ?>
                                    <?php if ($usCitizenshipStatus=='greenCard')   { ?><option value="greenCard" selected>US Permanent Resident</option><?php } ?>
                                    <?php if ($usCitizenshipStatus=='alien')       { ?><option value="alien" selected>Alien/Refugee Lawfully Admitted to the US</option><?php } ?>
                                    <?php if ($usCitizenshipStatus=='noneCitizen') { ?><option value="noneCitizen" selected>None of the above</option><?php } ?>

                                    <option value="citizen">Citizen of US or US Territory</option>
                                    <option value="greenCard">US Permanent Resident</option>
                                    <option value="alien">Alien/Refugee Lawfully Admitted to the US</option>
                                    <option value="noneCitizen">None of the above</option>
                                </select>
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#userCitizenshipInfoEdit,#userCitizenshipInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Alien Registration Code</div>
                            <div class="col-7">
                                <?php if ($usCitizenshipStatus=='alien') { ?>
                                    <input type="number" name="uscisNumber" class="col input-underline" value="<?php echo $alienRegistrationCode?>">
                                <?php } else { ?>
                                    <input type="number" name="uscisNumber" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Expired Date</div>
                            <div class="col-7">
                                <?php if ($usCitizenshipStatus=='alien') { ?>
                                    <input type="date" name="uscisExpired" class="col input-underline" value="<?php echo $alienRegistrationCodeEXP?>">
                                <?php } else { ?>
                                    <input type="date" name="uscisExpired" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>



    <!--Ethnicity Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Ethnicity Information</legend>
                <div id ="userEthnicityInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Hispanic/Latino Heritage</div>
                        <div class="col-7"><?php if ($hispanicHeritage=='Yes') { ?><?php echo 'Yes'?><?php } else { ?><?php echo 'No'?><?php } ?></div>

                        <!--Edit Ethnicity Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userEthnicityInfoShow,#userEthnicityInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Race</div>
                        <div class="col-7">
                            <?php   if ($africanAmercian_black=='Yes')        { ?><?php echo 'African American/Black<br>'?>
                            <?php } if ($americanIndian_alaskanNative=='Yes') { ?><?php echo 'American Indian/Alaskan Native<br>'?>
                            <?php } if ($asian=='Yes')                        { ?><?php echo 'Asian<br>'?>
                            <?php } if ($hawaiian_other=='Yes')               { ?><?php echo 'Hawaiian/Other Pacific Islander<br>'?>
                            <?php } if ($white=='Yes')                        { ?><?php echo 'White<br>'?>
                            <?php } if ($noAnswer=='Yes')                     { ?><?php echo 'I do not wish to answer<br>'?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Primary Language</div>
                        <div class="col-7">
                            <?php   if ($primaryLanguage=='eng')      { ?><?php echo 'English'?>
                            <?php } if ($primaryLanguage=='span')     { ?><?php echo 'Spanish'?>
                            <?php } if ($primaryLanguage=='dari')     { ?><?php echo 'Dari'?>
                            <?php } if ($primaryLanguage=='pashto')   { ?><?php echo 'Pashto'?>
                            <?php } if ($primaryLanguage=='rus')      { ?><?php echo 'Russian'?>
                            <?php } if ($primaryLanguage=='viet')     { ?><?php echo 'Vietnamese'?>
                            <?php } if ($primaryLanguage=='mandarin') { ?><?php echo 'Mandarin'?>
                            <?php } if ($primaryLanguage=='arabic')   { ?><?php echo 'Arabic'?>
                            <?php } if ($primaryLanguage=='farsi')    { ?><?php echo 'Farsi'?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">English Proficiency</div>
                        <div class="col-7"><?php if ($englishProficiency=='Yes') { ?><?php echo 'Yes'?><?php } else { ?><?php echo 'No'?><?php } ?></div>
                    </div>
                </div>

                <div id ="userEthnicityInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2EthnicityInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Hispanic/Latino Heritage</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php   if ($hispanicHeritage=='Yes') { ?><input class="form-check-input" type="radio" name="hispanic" id="yhispanic" value="Yes" checked="checked">
                                    <?php } else                          { ?><input class="form-check-input" type="radio" name="hispanic" id="yhispanic" value="Yes"><?php } ?>
                                    <label class="form-check-label" for="yhispanic">Yes</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php   if ($hispanicHeritage=='No') { ?><input class="form-check-input" type="radio" name="hispanic" id="nonhispanic" value="No" checked="checked">
                                    <?php } else                         { ?><input class="form-check-input" type="radio" name="hispanic" id="nonhispanic" value="No"><?php } ?>
                                    <label class="form-check-label" for="nonhispanic">No</label>
                                </div>
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#userEthnicityInfoEdit,#userEthnicityInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Race</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php if ($africanAmercian_black=='Yes') { ?>
                                        <input type="checkbox" id="africanAmerican_black" name="africanAmerican_black" value="Yes" checked="checked">
                                        <label for="africanAmerican_black">African American/Black</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="africanAmerican_black" name="africanAmerican_black" value="Yes">
                                        <label for="africanAmerican_black">African American/Black</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($americanIndian_alaskanNative=='Yes') { ?>
                                        <input type="checkbox" id="americanIndian_alaskanNative" name="americanIndian_alaskanNative" value="Yes" checked="checked">
                                        <label for="americanIndian_alaskanNative">American Indian/Alaskan Native</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="americanIndian_alaskanNative" name="americanIndian_alaskanNative" value="Yes">
                                        <label for="americanIndian_alaskanNative">American Indian/Alaskan Native</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($asian=='Yes') { ?>
                                        <input type="checkbox" id="asian" name="asian" value="Yes" checked="checked">
                                        <label for="asian">Asian</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="asian" name="asian" value="Yes">
                                        <label for="asian">Asian</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($hawaiian_other=='Yes') { ?>
                                        <input type="checkbox" id="hawaiian_other" name="hawaiian_other" value="Yes" checked="checked">
                                        <label for="hawaiian_other">Hawaiian/Other Pacific Islander</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="hawaiian_other" name="hawaiian_other" value="Yes">
                                        <label for="hawaiian_other">Hawaiian/Other Pacific Islander</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($white=='Yes') { ?>
                                        <input type="checkbox" id="white" name="white" value="Yes" checked="checked">
                                        <label for="white">White</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="white" name="white" value="Yes">
                                        <label for="white">White</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($noAnswer=='Yes') { ?>
                                        <input type="checkbox" id="noAnswer" name="noAnswer" value="Yes" checked="checked">
                                        <label for="noAnswer">I do not wish to answer</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="noAnswer" name="noAnswer" value="Yes">
                                        <label for="noAnswer">I do not wish to answer</label><br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Primary Language</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="language" id="language">
                                    <?php   if ($primaryLanguage=='eng')      { ?><option value="eng" selected>English</option>
                                    <?php } if ($primaryLanguage=='span')     { ?><option value="span" selected>Spanish</option>
                                    <?php } if ($primaryLanguage=='dari')     { ?><option value="dari" selected>Dari</option>
                                    <?php } if ($primaryLanguage=='pashto')   { ?><option value="pashto" selected>Pashto</option>
                                    <?php } if ($primaryLanguage=='rus')      { ?><option value="rus" selected>Russian</option>
                                    <?php } if ($primaryLanguage=='viet')     { ?><option value="viet" selected>Vietnamese</option>
                                    <?php } if ($primaryLanguage=='mandarin') { ?><option value="mandarin" selected>Mandarin</option>
                                    <?php } if ($primaryLanguage=='arabic')   { ?><option value="arabic" selected>Arabic</option>
                                    <?php } if ($primaryLanguage=='farsi')    { ?><option value="farsi" selected>Farsi</option><?php } ?>

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
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">English Proficiency</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php   if ($englishProficiency=='Yes') { ?><input class="form-check-input" type="radio" name="proficiency" id="yproficiency" value="Yes" checked="checked">
                                    <?php } else                            { ?><input class="form-check-input" type="radio" name="proficiency" id="yproficiency" value="Yes"><?php } ?>
                                    <label class="form-check-label" for="yproficiency">Yes</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php   if ($englishProficiency=='No') { ?><input class="form-check-input" type="radio" name="proficiency" id="nonProficiency" value="No" checked="checked">
                                    <?php } else                           { ?><input class="form-check-input" type="radio" name="proficiency" id="nonProficiency" value="No"><?php } ?>
                                    <label class="form-check-label" for="nonProficiency">No</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>
</div>
<?php }?>

</div>


</body>
</html>

