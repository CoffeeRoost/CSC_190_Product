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
        <div class="d-flex flex-column flex-shrink-1 align-items-center bg-lightBlue w-300" id="sideBar">
            <ul class="nav nav-tabs flex-column align-items-center text-center">
                <li class="nav-item bg-Blue mt-1 mb-md-1">
                    <a href="#personalInfoTab" class="nav-link text-white" >

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
                    <a href="./participantPersonalInformation.php" class="nav-link text-white" >
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
            <!-- ************************************************End of Side Bar********************************************************************************************************* -->


            <!-- **************************************************************************************************************************************************** -->
            <!--Participant information Edit-->

        <div id="personalInfoTab">
            <div class="d-flex flex-column align-items-center mx-5">
                <div class="d-flex justify-center">

                    <?php
                        $participantQuery = "SELECT part.userID,part.fname,part.lname,part.email,
                                a.street,a.city,a.state,a.zipcode,a.county,
                                a.mailingStreet,a.mailingCity,a.mailingState,a.mailingZipcode,a.mailingCounty
                        FROM PARTICIPATION part
                        JOIN ADDRESS a
                        ON part.userID=a.userID
                        WHERE part.userID = " . $_SESSION['userID'];
                            $result = $conn->query($participantQuery); // Execute the query
                            if ($result->num_rows > 0) {
                            // Display participation information
                            while ($row = $result->fetch_assoc()) {

                        //    <!--Participant information-->
                                echo '<div id="participant_Info" style="width: 600px; height:auto; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse show">';
                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col-3 fw-bold">ID</div>';
                                        echo '<div class="col-6 text-center">'. $row['userID'] .'</div>';
                                        echo '<div class="col-1 ms-5">';
                                            echo '<a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#participant_edit,#participant_Info">Edit</a>';
                                        echo '</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">First Name</div>';
                                        echo '<div class="col-7">'.$row['fname'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">Last Name</div>';
                                        echo '<div class="col-7">'.$row['lname'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">Email</div>';
                                        echo '<div class="col-7">'.$row['email'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">Street</div>';
                                        echo '<div class="col-7">'.$row['street'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">City</div>';
                                        echo '<div class="col-7">'.$row['city'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">State</div>';
                                        echo '<div class="col-7">'.$row['state'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">Zip Code</div>';
                                        echo '<div class="col-7">'.$row['zipcode'].'</div>';
                                    echo '</div>';
                                echo '</div>';

                                // <!--Participant information Edit-->
                                echo '<div id="participant_edit" style="width: 600px; height:auto; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse">';
                                    echo '<form method="POST" action="includes/saveProfileParticipation.inc.php">';
                                        echo '<div class="row mx-3 my-2">';
                                            echo '<div class="col-3 fw-bold">ID</div>';
                                            echo '<div class="col-6 text-center">'. $row['userID'] .'</div>';
                                            echo '<div class="col-1 ms-5">';
                                                echo '<button type="submit" class="text-decoration-none text-Blue border-0 bg-lightBlue" data-bs-toggle="collapse" data-bs-target="#participant_Info,#participant_edit">Save</button>';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="row mx-3 my-2">';
                                            echo '<div class="col fw-bold">First Name</div>';
                                            echo '<div class="col-7">';
                                                echo '<input type="text" name="fname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="' . $row['fname'] . '">';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="row mx-3 my-2">';
                                            echo '<div class="col fw-bold">Last Name</div>';
                                            echo '<div class="col-7">';
                                                echo '<input type="text" name="lname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="' . $row['lname'] . '">';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="row mx-3 my-2">';
                                            echo '<div class="col fw-bold">Email</div>';
                                            echo '<div class="col-7">';
                                                echo '<input type="text" name="email" id="" class="input-underline bg-lightBlue" style="width:75%;" value="' . $row['email'] . '">';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="row mx-3 my-2">';
                                            echo '<div class="col fw-bold">Street</div>';
                                            echo '<div class="col-7">';
                                                echo '<input type="text" name="street" id="" class="input-underline bg-lightBlue" style="width:75%;" value="' . $row['street'] . '">';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="row mx-3 my-2">';
                                            echo '<div class="col fw-bold">City</div>';
                                            echo '<div class="col-7">';
                                                echo '<input type="text" name="city" id="" class="input-underline bg-lightBlue" style="width:75%;" value="' . $row['city'] . '">';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="row mx-3 my-2">';
                                            echo '<div class="col fw-bold">State</div>';
                                            echo '<div class="col-7">';
                                                echo '<input type="text" name="state" id="" class="input-underline bg-lightBlue" style="width:75%;" value="' . $row['state'] . '">';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="row mx-3 my-2">';
                                            echo '<div class="col fw-bold">Zip Code</div>';
                                            echo '<div class="col-7">';
                                                echo '<input type="text" name="zipcode id="" class="input-underline bg-lightBlue" style="width:75%;" value="' . $row['zipcode'] . '">';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</form>';
                                    echo '</div>';





                            }
                        }


                    ?>

                    <!-- **************************************************************************************************************************************************************** -->
                    <!-- Participant File Submit -->
                    <div class="bg-lightBlue my-5 mx-3 d-flex justify-content-center">
                        <?php
                            echo '<form action="./includes/upload.inc.php" method="post" enctype="multipart/form-data" class="w-100">';

                                echo '<div class="form-group row justify-content-center">';
                                    echo '<div class="col-12 col-md-6 ">';
                                    echo '<label for="fileToUpload" class="form-label my-2"><img src="./image/file.png" alt="file upload" style="width:75px; height:75px;"></label>';
                                    echo '<input type="file" class="form-control-file mt-2" name="fileToUpload" id="fileToUpload">';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="form-group row justify-content-center">';
                                    echo '<div class="col-12 col-md-6 my-4">';
                                        echo '<button type="submit" name="submit" class="btn btn-sm btn-outline-primary py-0">Upload</button>';
                                    echo '</div>';
                                echo '</div>';

                        echo '</form>';
                        ?>

                        <div class="mt-1 row">
                            <h6 class="d-flex mt-4">Files Uploaded</h6>
                            <?php
                                // Retrieve file names and paths from the database for the current user
                                $sql = "SELECT file_name, file_path FROM FILES WHERE userID=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $_SESSION['userID']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                // Initialize $file_names as an empty array
                                $file_names = array();

                                // Check if any files were found
                                if ($result->num_rows > 0) {
                                    // Loop through each file and display a download link
                                    while ($row = $result->fetch_assoc()) {
                                        $file_name = $row['file_name'];
                                        $file_path = $row['file_path'];
                                        $url = 'http://54.67.115.77/includes/uploads/' . rawurlencode(basename($file_path));
                                        echo '<div class="my-4">
                                                <h6 class="d-flex"><a href="' . $url . '" download="' . $file_name . '">' . $file_name . '</a></h6>
                                            </div>';
                                    }
                                } else {
                                    echo '<p>No files uploaded.</p>';
                                }

                            ?>
                        </div>
                    </div>
                    <!-- *******************************End  Of  Upload and Display Upload Files***************************** -->
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
                        <?php
                            $participantQuery = "SELECT part.userID,part.fname,part.lname,part.email,
                                    a.street,a.city,a.state,a.zipcode,a.county,
                                    a.mailingStreet,a.mailingCity,a.mailingState,a.mailingZipcode,a.mailingCounty
                            FROM PARTICIPATION part
                            JOIN ADDRESS a
                            ON part.userID=a.userID
                            WHERE part.userID = " . $_SESSION['userID'];
                                $result = $conn->query($participantQuery); // Execute the query
                                if ($result->num_rows > 0) {
                                // Display participation information tab
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="tab-pane fade show active" id="contact-tab" aria-labelledby="contact-tab" tabindex="0">';
                                    // <!-- Display the data from participation survey ("participation table in database")-->
                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">First Name</div>';
                                        echo '<div class="col-7">'.$row['fname'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">Last Name</div>';
                                        echo '<div class="col-7">'.$row['lname'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">Email</div>';
                                        echo '<div class="col-7">'.$row['email'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">Street</div>';
                                        echo '<div class="col-7">'.$row['street'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">City</div>';
                                        echo '<div class="col-7">'.$row['city'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">State</div>';
                                        echo '<div class="col-7">'.$row['state'].'</div>';
                                    echo '</div>';

                                    echo '<div  class="row mx-3 my-2">';
                                        echo '<div class="col fw-bold">Zip Code</div>';
                                        echo '<div class="col-7">'.$row['zipcode'].'</div>';
                                    echo '</div>';

                                    echo '<div class="border bg-white border-info" style="width:100%;">';
                                        echo '<textarea placeholder="Notes" style="width:100%; height:100px;" class="border border-0 p-1 outline-none" ></textarea>';
                                    echo '</div>';
                                echo '</div>';


                                }
                            }
                        ?>
                    </div>



                    <div class="tab-content border border-info bg-lightBlue">
                        <!-- ********************************************************************************************************** -->
                        <!-- Training Tab  -->

                    <div class="tab-pane fade" id="training-tab" tabindex="0">
                        <?php
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);
                            // Check if training data is available in the database
                            $sql = "SELECT * FROM participationReportActivity WHERE userID=? ";
                            $stmt = $conn->prepare($sql);

                            $stmt->bind_param("i", $_SESSION['userID']);
                            $stmt->execute();
                            if ($stmt->error) {
                                echo $stmt->error;
                            }
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                // Display training data on the dashboard
                                while ($row = $result->fetch_assoc()) {

                                    // <!-- Display the data from Participant Activity Reporting Form "Task table in database" -->
                                    echo '<div class="row mx-3 my-2">';
                                    echo '<div class="col fw-bold">Report Activity ID</div>';
                                    echo '<div class="col-7">' . $row['reportActID'] . '</div>';
                                    echo '</div>';

                                    echo '<div class="row mx-3 my-2">';
                                    echo '<div class="col fw-bold">Coach Name</div>';
                                    echo '<div class="col-7">' . $row['coach'] . '</div>';
                                    echo '</div>';

                                    echo '<div class="row mx-3 my-2">';
                                    echo '<div class="col fw-bold">Activity Code</div>';
                                    echo '<div class="col-7">' . $row['activityCode'] . '</div>';
                                    echo '</div>';

                                    echo '<div class="row mx-3 my-2">';
                                    echo '<div class="col fw-bold">Training Code</div>';
                                    echo '<div class="col-7">' . $row['trainingProgram'] . '</div>';
                                    echo '</div>';

                                    echo '<div class="row mx-3 my-2">';
                                    echo '<div class="col fw-bold">Start Date</div>';
                                    echo '<div class="col-7">' . $row['startDate'] . '</div>';
                                    echo '</div>';

                                    echo '<div class="row mx-3 my-2">';
                                    echo '<div class="col fw-bold">End Date</div>';
                                    echo '<div class="col-7">' . $row['endDate'] . '</div>';
                                    echo '</div>';

                                    echo '<div class="row mx-3 my-2">';
                                    echo '<div class="col fw-bold">Minutes</div>';
                                    echo '<div class="col-7">' . $row['minutes'] . '</div>';
                                    echo '</div>';

                                    echo '<div class="row mx-3 my-2">';
                                    echo '<div class="col fw-bold">Notes</div>';
                                    echo '<div class="col-7">' . $row['notes']. '</div>';
                                    echo '</div>';
                                    echo '<hr>';



                                }

                                }else {
                                echo '<div class="tab-pane fade" id="training-tab" tabindex="0">';
                                    // <!-- Display the data from Participant Activity Reporting Form "Task table in database" -->
                                // Set default values if training data is not available
                                echo '<div class="row mx-3 my-2">';
                                echo '<div class="col fw-bold">Coach Name</div>';
                                echo '<div class="col-7">N/A</div>';
                                echo '</div>';

                                echo '<div class="row mx-3 my-2">';
                                echo '<div class="col fw-bold">Activity Code</div>';
                                echo '<div class="col-7">N/A</div>';
                                echo '</div>';

                                echo '<div class="row mx-3 my-2">';
                                echo '<div class="col fw-bold">Training Code</div>';
                                echo '<div class="col-7">N/A</div>';
                                echo '</div>';

                                echo '<div class="row mx-3 my-2">';
                                echo '<div class="col fw-bold">Start Date</div>';
                                echo '<div class="col-7">N/A</div>';
                                echo '</div>';

                                echo '<div class="row mx-3 my-2">';
                                echo '<div class="col fw-bold">End Date</div>';
                                echo '<div class="col-7">N/A</div>';
                                echo '</div>';

                                echo '<div class="row mx-3 my-2">';
                                echo '<div class="col fw-bold">Minutes</div>';
                                echo '<div class="col-7">N/A</div>';
                                echo '</div>';

                                echo '<br>';

                                echo '<div class="border bg-white border-info" style="width:100%;">';
                                    echo '<textarea placeholder="Notes" style="width:100%; height:100px;" class="border border-0 p-1 outline-none" >Notes</textarea>';
                                echo '</div>';
                            }

                        ?>
                        </div>
                    </div>
                        <!-- ********************END OF TRAINING TAB************************************* -->

                        <!-- *********************************************************************************************************************************** -->
                    <div class="tab-content border border-info bg-lightBlue">
                        <!-- Employment/Career Tab  -->
                        <?php
                            $employmentQuery ="SELECT * FROM EMPLOYMENT WHERE  userID= ? ";
                            $stmt = $conn->prepare($employmentQuery);
                            $stmt->bind_param("i", $_SESSION['userID']);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                // Display employment data on the dashboard
                                while ($row = $result->fetch_assoc()) {
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
                                    $selectiveService= $row['selectiveService'];


                        ?>

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
                            <?php if ($selectiveService) { ?>
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
                       <?php }}?>
                    </div>

                        <!-- ************************************************************************************************************************************************************** -->
                    <div class="tab-content border border-info bg-lightBlue">

                        <!-- Services Tab  -->
                        <?php
                            $servicesQuery ="SELECT * FROM SERVICES WHERE  userID= ? ";
                            $stmt = $conn->prepare($servicesQuery);
                            $stmt->bind_param("i", $_SESSION['userID']);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                // Display employment data on the dashboard
                                while ($row = $result->fetch_assoc()) {
                                    // Fetch data from the SERVICES table
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

                        ?>
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
                        <?php }}?>
                    </div>
                </div>

        </div>

    </div>


</body>
</html>
