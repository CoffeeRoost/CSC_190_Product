<?php
 require_once ('includes/dbh.inc.php');
 //   write a query to retrieve data
$query = "SELECT part.fname,part.lname,part.email,a.street,a.city,a.state,a.zipcode,
                 t.coach,t.activityCode,t.trainingProgram, t.startDate, t.endDate,t.notes,
                 
                 e.currentMilitaryOrVet,e.militarySpouse,e.selectiveService,e.employmentStatus,
                 e.payRate,e.unemployemntInsurance,e.unemploymentWeeks,e.farmworker12Months,
                 e.desiredJobTitle,e.techExperience,

                 s.fosterCare,s.adultEducationWIOATittleII,s.youthBuild,s.youthBuildGrant,
                 s.jobCorps,s.vocationalEducationCarlPerkins,s.tanfRecipient,s.ssiRecipient,
                 s.gaRecipient,s.snapRecipientCalFresh,s.rcaRecipient,s.ssdiRecipient,
                 s.snapEmploymentAndTrainingProgram,
                 s.pellGrant

           FROM participation part
           JOIN address a
           ON part.userID=a.userID
           JOIN task t
           On part.userID=t.userID
           JOIN employment e
           ON part.userID=e.userID
           JOIN services s
           ON part.userID=s.userID";
//    execute the query
$select_user_information_query= mysqli_query($conn,$query);

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
                            Dashboard
                        </a>
                    </li>
                          <li class="nav-item bg-Blue mb-md-1">
                            <a href="#" class="nav-link text-white">
                              Personal Information
                            </a>
                          </li>
                          <li class="nav-item bg-Blue mb-md-1">
                            <a href="#" class="nav-link text-white">
                              Feature 3
                            </a>
                          </li>
                      </ul>
                </div>
            </div>

            <div class="d-flex flex-column align-items-center mx-5">
                <div class="d-flex justify-center">
                    <!--Participant information-->
                    <div id="participant_Info" style="width:400px; height:230px; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse show">
                        <div  class="row mx-3 my-2">
                            <div class="col-3 fw-bold">ID</div>
                            <div class="col-6 text-center">1234</div>
                            <div class="col-1 ms-5">
                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#participant_edit,#participant_Info">Edit</a>
                            </div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">First Name</div>
                            <div class="col-7">Patrick</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Last Name</div>
                            <div class="col-7">Star</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Email</div>
                            <div class="col-7">PatrickS@cmc.com</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Address</div>
                            <div class="col-7">1234 Main street, San Francisco, CA</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Zip Code</div>
                            <div class="col-7">95112</div>
                        </div>
                    </div>

                    <!--Participant information Edit-->
                        <div  id="participant_edit" style="width:400px; height:230px; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse">
                            <div  class="row mx-3 my-2">
                                <div class="col-3 fw-bold">ID</div>
                                <div class="col-6 text-center">1234</div>
                                <div class="col-1 ms-5">
                                    <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#participant_Info,#participant_edit">Save</a>
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">First Name</div>
                                <div class="col-7">
                                    <input type="text" name="firstName" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="Patrick">
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Last Name</div>
                                <div class="col-7">
                                    <input type="text" name="lastName" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="Star">
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Email</div>
                                <div class="col-7">
                                    <input type="text" name="email" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="PatrickS@cmc.com">
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Address</div>
                                <div class="col-7">
                                    <input type="text" name="address" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="1234 Main street, San Francisco, CA">
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Zip Code</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="95112">
                                </div>
                            </div>
                        </div>

                    <!-- Participant File Submit -->
                    <div style="width:300px;" class="bg-lightBlue my-5 mx-3 d-flex justify-content-center">
                        <div class="file-upload my-4 p-4">
                            <label for="file-submit"><img src="./image/file.png" alt="file upload" style="width:75px; height:75px;"></label>
                            <input type="file" id="file-submit"/>
                            <p>Submit File</p>
                        </div>
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


                         <!-- Display some personal information from the database tables using php -->


                          <?php


                        // Fetch the data
                          while($row=mysqli_fetch_assoc($select_user_information_query)){
                            $fname= $row['fname'];
                            $lname=$row['lname'];
                            $email= $row['email'];
                            $street= $row['street'];
                            $city= $row['city'];
                            $state= $row['state'];
                            $zipcode=$row['zipcode'];
                            $coachName= $row ['coach'];
                            $codeActivity= $row ['activityCode'];
                            $trainingProgram= $row ['trainingProgram'];
                            $startDate= $row ['startDate'];
                            $endDate=$row['endDate'];
                            $reportNote= $row['notes'];

                            // Fetch data from Employment table for Employment/Career tab
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

                            // Fetch data from Services table for Services tab
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
                                <div class="col fw-bold">Address</div>
                                <div class="col-7"><?php echo $street?>,<?php echo $city?>,<?php echo $state?></div>
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

                        </div>



                         <?php }



                          ?>
                </div>


            </div>
</body>
</html>