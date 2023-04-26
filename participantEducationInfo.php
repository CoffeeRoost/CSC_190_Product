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
$query = "SELECT *
           FROM EDUCATION edu

           WHERE edu.userID = ?";

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

        // data from 'Education' table
        $highSchoolStatus=$row['highSchoolStatus'];
        $highSchooolDiplomaOrEquil=$row['highSchooolDiplomaOrEquil'];
        $highestGradeComplete=$row['highestGradeComplete'];
        $inSchool=$row['inSchool'];










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
        <div class="d-flex flex-column flex-shrink-1 align-items-center bg-lightBlue w-300"  id="sideBar">
            <ul class="nav nav-tabs flex-column align-items-center text-center" >
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
            <div class="container-fluid">
              <!--Education Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Education Information</legend>
                <div id ="userEducationInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Highest School Grade Completed</div>
                        <div class="col-7">
                            <?php if ($highSchoolStatus=='9th')  { ?><?php echo '9th grade'?><?php } ?>
                            <?php if ($highSchoolStatus=='10th') { ?><?php echo '10th grade'?><?php } ?>
                            <?php if ($highSchoolStatus=='11th') { ?><?php echo '11th grade'?><?php } ?>
                            <?php if ($highSchoolStatus=='12th') { ?><?php echo '12th grade'?><?php } ?>
                        </div>

                        <!--Edit Citizenship Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userEducationInfoShow,#userEducationInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">High School Diploma or Equivalent Received</div>
                        <div class="col-7"><?php if ($highSchooolDiplomaOrEquil=='Yes') { ?><?php echo 'Yes'?><?php } else { ?><?php echo 'No'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Highest School Grade Completed</div>
                        <div class="col-7">
                            <?php if ($highestGradeComplete=='highschool')        { ?><?php echo 'High School Diploma'?><?php } ?>
                            <?php if ($highestGradeComplete=='ged')               { ?><?php echo 'High School Equivalent Diploma (GED)'?><?php } ?>
                            <?php if ($highestGradeComplete=='certificate')       { ?><?php echo 'Certificate of Attendance/Completion (Disabled Individuales)'?><?php } ?>
                            <?php if ($highestGradeComplete=='schoolCertificate') { ?><?php echo 'Vocational School Certificate'?><?php } ?>
                            <?php if ($highestGradeComplete=='technical')         { ?><?php echo 'Colllege or Technical or Vocational School'?><?php } ?>
                            <?php if ($highestGradeComplete=='aa')                { ?><?php echo 'AA'?><?php } ?>
                            <?php if ($highestGradeComplete=='baAndbs')           { ?><?php echo 'BA/BS'?><?php } ?>
                            <?php if ($highestGradeComplete=='master')            { ?><?php echo "Master's Degree"?><?php } ?>
                            <?php if ($highestGradeComplete=='doctor')            { ?><?php echo 'Doctorate Degree'?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">School Status</div>
                        <div class="col-7"><?php if ($inSchool=='Yes') { ?><?php echo 'Yes'?><?php } else { ?><?php echo 'No'?><?php } ?></div>
                    </div>
                </div>

                <div id ="userEducationInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2EducationInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Highest School Grade Completed</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="schoolLevel" id="schoolLevel">
                                    <?php if ($highSchoolStatus=='9th')  { ?><option value="9th" selected>9th grade</option><?php } ?>
                                    <?php if ($highSchoolStatus=='10th') { ?><option value="10th" selected>10th grade</option><?php } ?>
                                    <?php if ($highSchoolStatus=='11th') { ?><option value="11th" selected>11th grade</option><?php } ?>
                                    <?php if ($highSchoolStatus=='12th') { ?><option value="12th" selected>12th grade</option><?php } ?>

                                    <option value="9th">9th grade</option>
                                    <option value="10th">10th grade</option>
                                    <option value="11th">11th grade</option>
                                    <option value="12th">12th grade</option>
                                </select>
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#userEducationInfoEdit,#userEducationInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">High School Diploma or Equivalent Received</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php if ($highSchooolDiplomaOrEquil=='Yes') { ?>
                                        <input class="form-check-input" type="radio" name="diploma" id="ydiploma" value="Yes" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="diploma" id="ydiploma" value="Yes">
                                    <?php } ?>
                                    <label class="form-check-label" for="ydiploma">Yes</label>
                                </div>
                                <div class="form-check m-2">
                                    <?php if ($highSchooolDiplomaOrEquil=='No') { ?>
                                        <input class="form-check-input" type="radio" name="diploma" id="nonDiploma" value="No" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="diploma" id="nonDiploma" value="No">
                                    <?php } ?>
                                    <label class="form-check-label" for="nonDiploma">No</label>
                                </div>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Highest School Grade Completed</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="highestSchool" id="highestSchool">
                                    <?php if ($highestGradeComplete=='highschool')        { ?><option value="highschool" selected>High School Diploma</option><?php } ?>
                                    <?php if ($highestGradeComplete=='ged')               { ?><option value="ged" selected>High School Equivalent Diploma (GED)</option><?php } ?>
                                    <?php if ($highestGradeComplete=='certificate')       { ?><option value="certificate" selected>Certificate of Attendance/Completion (Disabled Individuales)</option><?php } ?>
                                    <?php if ($highestGradeComplete=='schoolCertificate') { ?><option value="schoolCertificate" selected>Vocational School Certificate</option><?php } ?>
                                    <?php if ($highestGradeComplete=='technical')         { ?><option value="technical" selected>Colllege or Technical or Vocational School</option><?php } ?>
                                    <?php if ($highestGradeComplete=='aa')                { ?><option value="aa" selected>AA</option><?php } ?>
                                    <?php if ($highestGradeComplete=='baAndbs')           { ?><option value="baAndbs" selected>BA/BS</option><?php } ?>
                                    <?php if ($highestGradeComplete=='master')            { ?><option value="master" selected>Master's Degree</option><?php } ?>
                                    <?php if ($highestGradeComplete=='doctor')            { ?><option value="doctor" selected>Doctorate Degree</option><?php } ?>

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
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">High School Diploma or Equivalent Received</div>
                            <div class="col-7">
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