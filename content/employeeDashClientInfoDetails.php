<?php
// Start session and check if user is logged in
if (!isset($_SESSION['employeeID'])) {
  // If error, force a logout
  session_unset();
  session_destroy();
  // Redirect user to Admin login page if not logged in
  header("Location:LoginAd.php");
  exit();
}
// Get the userID parameter from the URL

if (isset($_GET['userID'])) {
  $userID = $_GET['userID'];
} else {
  echo "Error: User ID parameter missing.";
  exit();
}

// Get the user ID from the session variable
$employeeID = $_SESSION['employeeID'];






?>
<div class="container-fluid">
        <!--Demographic Information of Client Section-->
        <div class="mb-5">

          <?php
              $clientInfo = "SELECT DISTINCT *
                            FROM  PARTICIPATION

                            WHERE userID = ?";


              // Create a prepared statement
              $stmt = $conn->prepare($clientInfo);

              // Bind the parameter to the statement
              $stmt->bind_param("i", $userID);

              // Execute the statement
              $stmt->execute();

              // Get the results
              $result = $stmt->get_result();
              if ($result->num_rows > 0) {
                //Display client list
                while($row = $result->fetch_assoc()){
                  // Extract the values from the array
                    $userFname = $row['fname'];
                    $userLname = $row['lname'];
                    $userEmail = $row['email'];
                    $userPhone = $row['primaryPhone'];
                    $userDOB = $row['DOB'];

          ?>
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Demographic Information</legend>
                        <div id ="empNameShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">ID</div>
                                        <div class="col-7"><?php echo $userID?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">First Name</div>
                                        <div class="col-7"><?php echo $userFname?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Last Name</div>
                                        <div class="col-7"><?php echo $userLname?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Date of Birth</div>
                                        <div class="col-7"><?php
                                        $userDOBConvert = date('m-d-Y', strtotime($userDOB)) ;
                                        echo $userDOBConvert; ?></div>
                                </div>

                               <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Phone</div>
                                        <div class="col-7"><?php echo $userPhone?></div>
                              </div>
                              <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Email</div>
                                        <div class="col-7"><?php echo $userEmail?></div>
                              </div>

                        </div>



                </fieldset>

                <?php }}?>
        </div>

        <!--Address of  Client Section-->
        <div class="mb-5">


                <?php
                      $clientAddressInfo ="SELECT DISTINCT *
                                          FROM  PARTICIPATION P
                                          JOIN ADDRESS AS Addr
                                          ON P.userID = Addr.userID
                                          WHERE P.userID = ?";

                      // Create a prepared statement
                      $stmt = $conn->prepare($clientAddressInfo);

                      // Bind the parameter to the statement
                      $stmt->bind_param("i", $userID);

                      // Execute the statement
                      $stmt->execute();

                      // Get the results
                      $result = $stmt->get_result();
                      if ($result->num_rows > 0) {
                        //Display client list
                        while($row = $result->fetch_assoc()){
                          // Extract the values from the array
                          $userStreet = $row['street'];
                          $userCity = $row['city'];
                          $userState = $row['state'];
                          $userZipcode = $row['zipcode'];
                  ?>

                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Address</legend>
                        <div id ="empAddressShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Street</div>
                                        <div class="col-7"><?php echo $userStreet?></div>

                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">City</div>
                                        <div class="col-7"><?php echo $userCity?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">State</div>
                                        <div class="col-7"><?php echo $userState?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Zip Code</div>
                                        <div class="col-7"><?php echo $userZipcode?></div>
                                </div>




                        </div>


                  </fieldset>
                <?php
                        }}
                ?>
        </div>

        <!--Client Report Activity Section-->
        <div class="mb-5">
          <?php
                  $clientActivityReport = "SELECT DISTINCT PRA.reportActID, PRA.employeeID, PRA.userID,
                                                PRA.activityCode, PRA.trainingProgram, PRA.startDate,
                                                PRA.endDate, PRA.minutes, PRA.notes
                                        FROM participationReportActivity PRA
                                        INNER JOIN COACH C ON C.employeeID = PRA.employeeID
                                        INNER JOIN PARTICIPATION P ON P.userID = PRA.userID
                                        WHERE P.userID = ? AND PRA.employeeID = ?
                                        ORDER BY PRA.reportActID DESC";

                        // Create a prepared statement
                        $stmt = $conn->prepare($clientActivityReport);

                        // Bind the parameters to the statement
                        $stmt->bind_param("ii", $userID, $employeeID);


                      // Execute the statement
                      $stmt->execute();

                      // Get the results
                      $result = $stmt->get_result();
                      if ($result->num_rows > 0) {
                        //Display client list
                        while($row = $result->fetch_assoc()){
                          // Extract the values from the array
                          $userActivityCode= $row['activityCode'];
                          $userTrainingProgram = $row['trainingProgram'];
                          $userStartDate = $row['startDate'];
                          $userEndDate = $row['endDate'];
                          $userMinutes = $row['minutes'];
                          $userNotes =$row['notes'];

                          $userReportActID=$row['reportActID'];
                  ?>

                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Client Report Activity</legend>
                        <div id ="clientReportActivityShow" style="transition:1ms;" class ="collapse show">


                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Client Report Activity ID</div>
                                        <div class="col-7"><?php echo $userReportActID?></div>
                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#clientReportActivityShow,#clientReportActivityEdit">Edit</a>
                                        </div>
                                </div>
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Activity Code</div>
                                        <div class="col-7"><?php echo $userActivityCode?></div>


                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Training Program</div>
                                        <div class="col-7"><?php echo $userTrainingProgram?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Start Date</div>
                                        <div class="col-7"><?php
                                        $userStartDateConvert = date('m-d-Y', strtotime($userStartDate)) ;
                                        echo $userStartDateConvert
                                        ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">End Date</div>
                                        <div class="col-7"><?php
                                        $userEndDateConvert = date('m-d-Y', strtotime($userEndDate)) ;
                                        echo $userEndDateConvert
                                        ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Time (Specify in minutes) </div>
                                        <div class="col-7"><?php echo $userMinutes?></div>
                                </div>
                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Notes </div>
                                        <div class="col-7"><?php echo $userNotes?></div>
                                </div>
                        </div>

        <!--Client Report Activity Edit Section-->
                        <div id ="clientReportActivityEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/updateReportActivity.inc.php">
                                          <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                                          <input type="hidden" name="reportActID" value="<?php echo $userReportActID; ?>">

                                          <div  class="row my-2">
                                            <div class="col-4 fw-bold"></div>
                                            <div class="col-7"></div>

                                            <div class="col-1 d-flex justify-content-end">
                                                <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#clientReportActivityShow,#clientReportActivityEdit">Save</button>
                                            </div>
                                        </div>

                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Activity Code</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="activityCode" id="activityCode">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="101 Orientation" <?php echo ($userActivityCode === '101 Orientation') ? 'selected' : ''; ?>>101 Orientation</option>
                                                                <option value="102 Initial Assessment" <?php echo ($userActivityCode === '102 Initial Assessment') ? 'selected' : ''; ?>>102 Initial Assessment</option>
                                                                <option value="103 Provision of Information on Training Providers/Performance Outcomes" <?php echo ($userActivityCode === '103 Provision of Information on Training Providers/Performance Outcomes') ? 'selected' : ''; ?>>103 Provision of Information on Training Providers/Performance Outcomes</option>
                                                                <option value="105 Job Finding Club" <?php echo ($userActivityCode === '105 Job Finding Club') ? 'selected' : ''; ?>>105 Job Finding Club</option>
                                                                <option value="106 In Program Follow-Up" <?php echo ($userActivityCode === '106 In Program Follow-Up') ? 'selected' : ''; ?>>106 In Program Follow-Up</option>
                                                                <option value="107 Provision of Labor Market Research" <?php echo ($userActivityCode === '107 Provision of Labor Market Research') ? 'selected' : ''; ?>>107 Provision of Labor Market Research</option>
                                                                <option value="108 Referred to WIOA Services (not training)" <?php echo ($userActivityCode === '108 Referred to WIOA Services (not training)') ? 'selected' : ''; ?>>108 Referred to WIOA Services (not training)</option>
                                                                <option value="109 Referred to Community Resource" <?php echo ($userActivityCode === '109 Referred to Community Resource') ? 'selected' : ''; ?>>109 Referred to Community Resource</option>
                                                                <option value="112 Job Fair" <?php echo ($userActivityCode === '112 Job Fair') ? 'selected' : ''; ?>>112 Job Fair</option>
                                                                <option value="115 Resume Preparation Assistance" <?php echo ($userActivityCode === '115 Resume Preparation Assistance') ? 'selected' : ''; ?>>115 Resume Preparation Assistance</option>
                                                                <option value="120 Use of AJCC Resource Room" <?php echo ($userActivityCode === '120 Use of AJCC Resource Room') ? 'selected' : ''; ?>>120 Use of AJCC Resource Room</option>
                                                                <option value="121 Job Referral: Job Outside CalJOBS (non-Federal)" <?php echo ($userActivityCode === '121 Job Referral: Job Outside CalJOBS (non-Federal)') ? 'selected' : ''; ?>>121 Job Referral: Job Outside CalJOBS (non-Federal)</option>
                                                                <option value="123 Job Development Contacts" <?php echo ($userActivityCode === '123 Job Development Contacts') ? 'selected' : ''; ?>>123 Job Development Contacts</option>
                                                                <option value="125 Job Search and Placement Assistance" <?php echo ($userActivityCode === '125 Job Search and Placement Assistance') ? 'selected' : ''; ?>>125 Job Search and Placement Assistance</option>
                                                                <option value="130 Proficiency Testing" <?php echo ($userActivityCode === '130 Proficiency Testing') ? 'selected' : ''; ?>>130 Proficiency Testing</option>
                                                                <option value="132 Resume Writing Workshop" <?php echo ($userActivityCode === '132 Resume Writing Workshop') ? 'selected' : ''; ?>>132 Resume Writing Workshop</option>
                                                                <option value="133 Job Search Workshop" <?php echo ($userActivityCode === '133 Job Search Workshop') ? 'selected' : ''; ?>>133 Job Search Workshop</option>
                                                                <option value="134 Workshop" <?php echo ($userActivityCode === '134 Workshop') ? 'selected' : ''; ?>>134 Workshop</option>
                                                                <option value="140 Referred to other Federal/State Assistance" <?php echo ($userActivityCode === '140 Referred to other Federal/State Assistance') ? 'selected' : ''; ?>>140 Referred to other Federal/State Assistance</option>
                                                                <option value="147 Personalized Job Search Assistance Workshop (PJSA)" <?php echo ($userActivityCode === '147 Personalized Job Search Assistance Workshop (PJSA)') ? 'selected' : ''; ?>>147 Personalized Job Search Assistance Workshop (PJSA)</option>
                                                                <option value="180 Supportive Service: Child/Dependent Care" <?php echo ($userActivityCode === '180 Supportive Service: Child/Dependent Care') ? 'selected' : ''; ?>>180 Supportive Service: Child/Dependent Care</option>
                                                                <option value="181 Supportive Service: Transportation Assistance" <?php echo ($userActivityCode === '181 Supportive Service: Transportation Assistance') ? 'selected' : ''; ?>>181 Supportive Service: Transportation Assistance</option>
                                                                <option value="183 Supportive Service: Incentives/Bonuses" <?php echo ($userActivityCode === '183 Supportive Service: Incentives/Bonuses') ? 'selected' : ''; ?>>183 Supportive Service: Incentives/Bonuses</option>
                                                                <option value="184 Supportive Service: Temporary Shelter" <?php echo ($userActivityCode === '184 Supportive Service: Temporary Shelter') ? 'selected' : ''; ?>>184 Supportive Service: Temporary Shelter</option>
                                                                <option value="185 Supportive Service: Other" <?php echo ($userActivityCode === '185 Supportive Service: Other') ? 'selected' : ''; ?>>185 Supportive Service: Other</option>
                                                                <option value="186 Supportive Service: Seminar/Workshop Allowance" <?php echo ($userActivityCode === '186 Supportive Service: Seminar/Workshop Allowance') ? 'selected' : ''; ?>>186 Supportive Service: Seminar/Workshop Allowance</option>
                                                                <option value="187 Supportive Service: Job Search Allowance" <?php echo ($userActivityCode === '187 Supportive Service: Job Search Allowance') ? 'selected' : ''; ?>>187 Supportive Service: Job Search Allowance</option>
                                                                <option value="188 Supportive Service: Tools/Clothing" <?php echo ($userActivityCode === '188 Supportive Service: Tools/Clothing') ? 'selected' : ''; ?>>188 Supportive Service: Tools/Clothing</option>
                                                                <option value="189 Supportive Service: Housing Assistance" <?php echo ($userActivityCode === '189 Supportive Service: Housing Assistance') ? 'selected' : ''; ?>>189 Supportive Service: Housing Assistance</option>
                                                                <option value="190 Supportive Service: Utilities" <?php echo ($userActivityCode === '190 Supportive Service: Utilities') ? 'selected' : ''; ?>>190 Supportive Service: Utilities</option>
                                                                <option value="191 Supportive Service: Educational Testing" <?php echo ($userActivityCode === '191 Supportive Service: Educational Testing') ? 'selected' : ''; ?>>191 Supportive Service: Educational Testing</option>
                                                                <option value="192 Supportive Service: Post-Secondary Academic Materials" <?php echo ($userActivityCode === '192 Supportive Service: Post-Secondary Academic Materials') ? 'selected' : ''; ?>>192 Supportive Service: Post-Secondary Academic Materials</option>
                                                                <option value="200 Individual Counseling" <?php echo ($userActivityCode === '200 Individual Counseling') ? 'selected' : ''; ?>>200 Individual Counseling</option>
                                                                <option value="202 Career Guidance/Planning" <?php echo ($userActivityCode === '202 Career Guidance/Planning') ? 'selected' : ''; ?>>202 Career Guidance/Planning</option>
                                                                <option value="203 Objective Assessment" <?php echo ($userActivityCode === '203 Objective Assessment') ? 'selected' : ''; ?>>203 Objective Assessment</option>
                                                                <option value="204 Interest And Aptitude Testing" <?php echo ($userActivityCode === '204 Interest And Aptitude Testing') ? 'selected' : ''; ?>>204 Interest And Aptitude Testing</option>
                                                                <option value="205 Development of IEP/ISS/EDP" <?php echo ($userActivityCode === '205 Development of IEP/ISS/EDP') ? 'selected' : ''; ?>>205 Development of IEP/ISS/EDP</option>
                                                                <option value="206 Referred to Register Apprenticeship Program" <?php echo ($userActivityCode === '206 Referred to Register Apprenticeship Program') ? 'selected' : ''; ?>>206 Referred to Register Apprenticeship Program</option>
                                                                <option value="209 Referred to State and Local Training (non-WIOA)" <?php echo ($userActivityCode === '209 Referred to State and Local Training (non-WIOA)') ? 'selected' : ''; ?>>209 Referred to State and Local Training (non-WIOA)</option>
                                                                <option value="210 Referred to Education Services (non-Federal/State/Local)" <?php echo ($userActivityCode === '210 Referred to Education Services (non-Federal/State/Local)') ? 'selected' : ''; ?>>210 Referred to Education Services (non-Federal/State/Local)</option>
                                                                <option value="213 Mentorship" <?php echo ($userActivityCode === '213 Mentorship') ? 'selected' : ''; ?>>213 Mentorship</option>
                                                                <option value="214 Adult Literacy, Basic Skills or GED Preparation" <?php echo ($userActivityCode === '214 Adult Literacy, Basic Skills or GED Preparation') ? 'selected' : ''; ?>>214 Adult Literacy, Basic Skills or GED Preparation</option>
                                                                <option value="215 Short-Term Prevocational Services" <?php echo ($userActivityCode === '215 Short-Term Prevocational Services') ? 'selected' : ''; ?>>215 Short-Term Prevocational Services</option>
                                                                <option value="217 Relocation Assistance" <?php echo ($userActivityCode === '217 Relocation Assistance') ? 'selected' : ''; ?>>217 Relocation Assistance</option>
                                                                <option value="218 Referred to Internship" <?php echo ($userActivityCode === '218 Referred to Internship') ? 'selected' : ''; ?>>218 Referred to Internship</option>
                                                                <option value="219 Work Experience" <?php echo ($userActivityCode === '219 Work Experience') ? 'selected' : ''; ?>>219 Work Experience</option>
                                                                <option value="221 Financial Literacy Education" <?php echo ($userActivityCode === '221 Financial Literacy Education') ? 'selected' : ''; ?>>221 Financial Literacy Education</option>
                                                                <option value="222 English Language Learner (ELL)" <?php echo ($userActivityCode === '222 English Language Learner (ELL)') ? 'selected' : ''; ?>>222 English Language Learner (ELL)</option>
                                                                <option value="224 Pre-Apprenticeship Training" <?php echo ($userActivityCode === '224 Pre-Apprenticeship Training') ? 'selected' : ''; ?>>224 Pre-Apprenticeship Training</option>
                                                                <option value="226 Reading and/or Math Testing" <?php echo ($userActivityCode === '226 Reading and/or Math Testing') ? 'selected' : ''; ?>>226 Reading and/or Math Testing</option>
                                                                <option value="300 Occupational Skills Training" <?php echo ($userActivityCode === '300 Occupational Skills Training') ? 'selected' : ''; ?>>300 Occupational Skills Training</option>
                                                                <option value="301 On-the-job Training" <?php echo ($userActivityCode === '301 On-the-job Training') ? 'selected' : ''; ?>>301 On-the-job Training</option>
                                                                <option value="302 Entrepreneurial Training" <?php echo ($userActivityCode === '302 Entrepreneurial Training') ? 'selected' : ''; ?>>302 Entrepreneurial Training</option>
                                                                <option value="304 Customized Training" <?php echo ($userActivityCode === '304 Customized Training') ? 'selected' : ''; ?>>304 Customized Training</option>
                                                                <option value="305 Skills Upgrading and Retraining" <?php echo ($userActivityCode === '305 Skills Upgrading and Retraining') ? 'selected' : ''; ?>>305 Skills Upgrading and Retraining</option>
                                                                <option value="306 WIOA Prerequisite Trainings" <?php echo ($userActivityCode === '306 WIOA Prerequisite Trainings') ? 'selected' : ''; ?>>306 WIOA Prerequisite Trainings</option>
                                                                <option value="307 Pre-Apprenticeship Program w/Occupational Skill Training (ITA)" <?php echo ($userActivityCode === '307 Pre-Apprenticeship Program w/Occupational Skill Training (ITA)') ? 'selected' : ''; ?>>307 Pre-Apprenticeship Program w/Occupational Skill Training (ITA)</option>
                                                                <option value="308 Incumbent Worker Training" <?php echo ($userActivityCode === '308 Incumbent Worker Training') ? 'selected' : ''; ?>>308 Incumbent Worker Training</option>
                                                                <option value="311 Placed in Job Corps" <?php echo ($userActivityCode === '311 Placed in Job Corps') ? 'selected' : ''; ?>>311 Placed in Job Corps</option>
                                                                <option value="313 Placed in State and Local Trainings (non-TAA, non-WIOA)" <?php echo ($userActivityCode === '313 Placed in State and Local Trainings (non-TAA, non-WIOA)') ? 'selected' : ''; ?>>313 Placed in State and Local Trainings (non-TAA, non-WIOA)</option>
                                                                <option value="320 Private Sector Training" <?php echo ($userActivityCode === '320 Private Sector Training') ? 'selected' : ''; ?>>320 Private Sector Training</option>
                                                                <option value="321 Transitional Job" <?php echo ($userActivityCode === '321 Transitional Job') ? 'selected' : ''; ?>>321 Transitional Job</option>
                                                                <option value="322 Job Readiness Training" <?php echo ($userActivityCode === '322 Job Readiness Training') ? 'selected' : ''; ?>>322 Job Readiness Training</option>
                                                                <option value="323 Workplace Training & Cooperative Education" <?php echo ($userActivityCode === '323 Workplace Training & Cooperative Education') ? 'selected' : ''; ?>>323 Workplace Training & Cooperative Education</option>
                                                                <option value="324 Adult Education with Training Services" <?php echo ($userActivityCode === '324 Adult Education with Training Services') ? 'selected' : ''; ?>>324 Adult Education with Training Services</option>
                                                                <option value="325 Apprenticeship Training" <?php echo ($userActivityCode === '325 Apprenticeship Training') ? 'selected' : ''; ?>>325 Apprenticeship Training</option>
                                                                <option value="327 Supportive Service: Training Allowance" <?php echo ($userActivityCode === '327 Supportive Service: Training Allowance') ? 'selected' : ''; ?>>327 Supportive Service: Training Allowance</option>
                                                                <option value="400 Youth Summer Employment" <?php echo ($userActivityCode === '400 Youth Summer Employment') ? 'selected' : ''; ?>>400 Youth Summer Employment</option>
                                                                <option value="406 Tutoring, Study Skills Training & Instruction" <?php echo ($userActivityCode === '406 Tutoring, Study Skills Training & Instruction') ? 'selected' : ''; ?>>406 Tutoring, Study Skills Training & Instruction</option>
                                                                <option value="407 Financial Literacy Education" <?php echo ($userActivityCode === '407 Financial Literacy Education') ? 'selected' : ''; ?>>407 Financial Literacy Education</option>
                                                                <option value="408 Youth Internship (Unpaid)" <?php echo ($userActivityCode === '408 Youth Internship (Unpaid)') ? 'selected' : ''; ?>>408 Youth Internship (Unpaid)</option>
                                                                <option value="409 Youth Job Shadowing" <?php echo ($userActivityCode === '409 Youth Job Shadowing') ? 'selected' : ''; ?>>409 Youth Job Shadowing</option>

                                                                <option value="410 Leadership Development Services" <?php echo ($userActivityCode === '410 Leadership Development Services') ? 'selected' : ''; ?>>410 Leadership Development Services</option>
                                                                <option value="411 Adult Mentoring" <?php echo ($userActivityCode === '411 Adult Mentoring') ? 'selected' : ''; ?>>411 Adult Mentoring</option>
                                                                <option value="412 Objective Assessment" <?php echo ($userActivityCode === '412 Objective Assessment') ? 'selected' : ''; ?>>412 Objective Assessment</option>
                                                                <option value="413 Develop Service Strategies (IEP/ISS/EDP)" <?php echo ($userActivityCode === '413 Develop Service Strategies (IEP/ISS/EDP)') ? 'selected' : ''; ?>>413 Develop Service Strategies (IEP/ISS/EDP)</option>
                                                                <option value="414 Basic Skills Training" <?php echo ($userActivityCode === '414 Basic Skills Training') ? 'selected' : ''; ?>>414 Basic Skills Training</option>
                                                                <option value="416 Occupational Skills Training (Approved ETPL Provider)" <?php echo ($userActivityCode === '416 Occupational Skills Training (Approved ETPL Provider)') ? 'selected' : ''; ?>>416 Occupational Skills Training (Approved ETPL Provider)</option>
                                                                <option value="417 Comprehensive Guidance and Counseling" <?php echo ($userActivityCode === '417 Comprehensive Guidance and Counseling') ? 'selected' : ''; ?>>417 Comprehensive Guidance and Counseling</option>
                                                                <option value="418 Adult Education (GED)" <?php echo ($userActivityCode === '418 Adult Education (GED)') ? 'selected' : ''; ?>>418 Adult Education (GED)</option>
                                                                <option value="421 Enrolled in Post Secondary Education" <?php echo ($userActivityCode === '421 Enrolled in Post Secondary Education') ? 'selected' : ''; ?>>421 Enrolled in Post Secondary Education</option>
                                                                <option value="424 Entrepreneurial Skills Training" <?php echo ($userActivityCode === '424 Entrepreneurial Skills Training') ? 'selected' : ''; ?>>424 Entrepreneurial Skills Training</option>
                                                                <option value="425 Work Experience (Paid)" <?php echo ($userActivityCode === '425 Work Experience (Paid)') ? 'selected' : ''; ?>>425 Work Experience (Paid)</option>
                                                                <option value="426 Work Experience (Unpaid)" <?php echo ($userActivityCode === '426 Work Experience (Unpaid)') ? 'selected' : ''; ?>>426 Work Experience (Unpaid)</option>
                                                                <option value="421 On-the-Job Training (OJT)" <?php echo ($userActivityCode == "421 On-the-Job Training (OJT)") ? "selected" : ""; ?>>421 On-the-Job Training (OJT)</option>
                                                                <option value="422 Customized Training" <?php echo ($userActivityCode == "422 Customized Training") ? "selected" : ""; ?>>422 Customized Training</option>
                                                                <option value="423 Apprenticeship Training" <?php echo ($userActivityCode == "423 Apprenticeship Training") ? "selected" : ""; ?>>423 Apprenticeship Training</option>
                                                                <option value="424 Work Experience" <?php echo ($userActivityCode == "424 Work Experience") ? "selected" : ""; ?>>424 Work Experience</option>
                                                                <option value="425 Supportive Services Only" <?php echo ($userActivityCode == "425 Supportive Services Only") ? "selected" : ""; ?>>425 Supportive Services Only</option>
                                                                <option value="426 Adult Basic Education" <?php echo ($userActivityCode == "426 Adult Basic Education") ? "selected" : ""; ?>>426 Adult Basic Education</option>
                                                                <option value="427 Internship (Paid)" <?php echo ($userActivityCode == "427 Internship (Paid)") ? "selected" : ""; ?>>427 Internship (Paid)</option>
                                                                <option value="428 Youth On-the-Job Training" <?php echo ($userActivityCode == "428 Youth On-the-Job Training") ? "selected" : ""; ?>>428 Youth On-the-Job Training</option>
                                                                <option value="429 Enrolled in Secondary Education Program" <?php echo ($userActivityCode == "429 Enrolled in Secondary Education Program") ? "selected" : ""; ?>>429 Enrolled in Secondary Education Program</option>
                                                                <option value="430 Youth Occupational Skills Training (Youth Service Eligible Provider List)" <?php echo ($userActivityCode == "430 Youth Occupational Skills Training (Youth Service Eligible Provider List)") ? "selected" : ""; ?>>430 Youth Occupational Skills Training (Youth Service Eligible Provider List)</option>
                                                                <option value="431 Enrolled in Pre Apprenticeship Training" <?php echo ($userActivityCode == "431 Enrolled in Pre Apprenticeship Training") ? "selected" : ""; ?>>431 Enrolled in Pre Apprenticeship Training</option>
                                                                <option value="432 Enrolled in Apprenticeship Training" <?php echo ($userActivityCode == "432 Enrolled in Apprenticeship Training") ? "selected" : ""; ?>>432 Enrolled in Apprenticeship Training</option>
                                                                <option value="433 Career Awareness" <?php echo ($userActivityCode == "433 Career Awareness") ? "selected" : ""; ?>>433 Career Awareness</option>
                                                                <option value="434 Career Exploration" <?php echo ($userActivityCode == "434 Career Exploration") ? "selected" : ""; ?>>434 Career Exploration</option>
                                                                <option value="435 Career Counseling/planning" <?php echo ($userActivityCode == "435 Career Counseling/planning") ? "selected" : ""; ?>>435 Career Counseling/planning</option>
                                                                <option value="436 Post-Secondary Transition Services" <?php echo ($userActivityCode == "436 Post-Secondary Transition Services") ? "selected" : ""; ?>>436 Post-Secondary Transition Services</option>
                                                                <option value="427 Internship (Paid)" <?php if($userActivityCode=="427 Internship (Paid)") echo "selected='selected'"; ?>>427 Internship (Paid)</option>
                                                                <option value="428 Youth On-the-Job Training" <?php if($userActivityCode=="428 Youth On-the-Job Training") echo "selected='selected'"; ?>>428 Youth On-the-Job Training</option>
                                                                <option value="429 Enrolled in Secondary Education Program" <?php if($userActivityCode=="429 Enrolled in Secondary Education Program") echo "selected='selected'"; ?>>429 Enrolled in Secondary Education Program</option>
                                                                <option value="430 Youth Occupational Skills Training (Youth Service Eligible Provider List)" <?php if($userActivityCode=="430 Youth Occupational Skills Training (Youth Service Eligible Provider List)") echo "selected='selected'"; ?>>430 Youth Occupational Skills Training (Youth Service Eligible Provider List)</option>
                                                                <option value="431 Enrolled in Pre Apprenticeship Training" <?php if($userActivityCode=="431 Enrolled in Pre Apprenticeship Training") echo "selected='selected'"; ?>>431 Enrolled in Pre Apprenticeship Training</option>
                                                                <option value="432 Enrolled in Apprenticeship Training" <?php if($userActivityCode=="432 Enrolled in Apprenticeship Training") echo "selected='selected'"; ?>>432 Enrolled in Apprenticeship Training</option>
                                                                <option value="433 Career Awareness" <?php if($userActivityCode=="433 Career Awareness") echo "selected='selected'"; ?>>433 Career Awareness</option>
                                                                <option value="434 Career Exploration" <?php if($userActivityCode=="434 Career Exploration") echo "selected='selected'"; ?>>434 Career Exploration</option>
                                                                <option value="435 Career Counseling/planning" <?php if($userActivityCode=="435 Career Counseling/planning") echo "selected='selected'"; ?>>435 Career Counseling/planning</option>
                                                                <option value="436 Post-Secondary Transition Services" <?php if($userActivityCode=="436 Post-Secondary Transition Services") echo "selected='selected'"; ?>>436 Post-Secondary Transition Services</option>
                                                                <option value="437 Pre-Apprenticeship Program with Occupational Skills Training (ITA)" <?php if($userActivityCode=="437 Pre-Apprenticeship Program with Occupational Skills Training (ITA)") echo "selected='selected'"; ?>>437 Pre-Apprenticeship Program with Occupational Skills Training (ITA)</option>
                                                                <option value="438 Occupational Skills Training (non-WIOA Funds)" <?php if($userActivityCode=="438 Occupational Skills Training (non-WIOA Funds)") echo "selected='selected'"; ?>>438 Occupational Skills Training (non-WIOA Funds)</option>
                                                                <option value="439 Education Offered Concurrently w/Workforce Prep and Training" <?php if($userActivityCode=="439 Education Offered Concurrently w/Workforce Prep and Training") echo "selected='selected'"; ?>>439 Education Offered Concurrently w/Workforce Prep and Training</option>
                                                                <option value="480 Supportive Service: Child/Dependent Care" <?php if($userActivityCode=="480 Supportive Service: Child/Dependent Care") echo "selected='selected'"; ?>>480 Supportive Service: Child/Dependent Care</option>
                                                                <option value="481 Supportive Service: Transportation Assistance" <?php if($userActivityCode=="481 Supportive Service: Transportation Assistance") echo "selected='selected'"; ?>>481 Supportive Service: Transportation Assistance</option>
                                                                <option value="483 Supportive Service: Temporary Shelter" <?php echo ($userActivityCode == "483 Supportive Service: Temporary Shelter") ? "selected" : ""; ?>>483 Supportive Service: Temporary Shelter</option>
                                                                <option value="485 Supportive Service: Other" <?php echo ($userActivityCode == "485 Supportive Service: Other") ? "selected" : ""; ?>>485 Supportive Service: Other</option>
                                                                <option value="487 Supportive Service: Tools/Clothing" <?php echo ($userActivityCode == "487 Supportive Service: Tools/Clothing") ? "selected" : ""; ?>>487 Supportive Service: Tools/Clothing</option>
                                                                <option value="488 Supportive Service: Housing Assistance" <?php echo ($userActivityCode == "488 Supportive Service: Housing Assistance") ? "selected" : ""; ?>>488 Supportive Service: Housing Assistance</option>
                                                                <option value="489 Supportive Service: Utilities" <?php echo ($userActivityCode == "489 Supportive Service: Utilities") ? "selected" : ""; ?>>489 Supportive Service: Utilities</option>
                                                                <option value="490 Supportive Service: Educational Testing" <?php echo ($userActivityCode == "490 Supportive Service: Educational Testing") ? "selected" : ""; ?>>490 Supportive Service: Educational Testing</option>
                                                                <option value="493 Supportive Service: Post-Secondary Educational Materials" <?php echo ($userActivityCode == "493 Supportive Service: Post-Secondary Educational Materials") ? "selected" : ""; ?>>493 Supportive Service: Post-Secondary Educational Materials</option>
                                                                <option value="Follow Up Services" <?php echo ($userActivityCode == "Follow Up Services") ? "selected" : ""; ?>>Follow Up Services</option>
                                                                <option value="F01 Referral to Community Resources" <?php echo ($userActivityCode == "F01 Referral to Community Resources") ? "selected" : ""; ?>>F01 Referral to Community Resources</option>
                                                                <option value="F03 Tracking Progress on the Job" <?php echo ($userActivityCode == "F03 Tracking Progress on the Job") ? "selected" : ""; ?>>F03 Tracking Progress on the Job</option>
                                                                <option value="F04 Work-Related Peer Support Group" <?php echo ($userActivityCode == "F04 Work-Related Peer Support Group") ? "selected" : ""; ?>>F04 Work-Related Peer Support Group</option>
                                                                <option value="F05 Assistance Securing Better Paying Job" <?php echo ($userActivityCode == "F05 Assistance Securing Better Paying Job") ? "selected" : ""; ?>>F05 Assistance Securing Better Paying Job</option>
                                                                <option value="F06 Career Development and Further Education Planning" <?php echo ($userActivityCode == "F06 Career Development and Further Education Planning") ? "selected" : ""; ?>>F06 Career Development and Further Education Planning</option>
                                                                <option value="F07 Assistance with Work-Related Problems" <?php echo ($userActivityCode == "F07 Assistance with Work-Related Problems") ? "selected" : ""; ?>>F07 Assistance with Work-Related Problems</option>
                                                                <option value="F08 Adult Mentoring" <?php echo ($userActivityCode == "F08 Adult Mentoring") ? "selected" : ""; ?>>F08 Adult Mentoring</option>
                                                                <option value="F09 Tutoring" <?php echo ($userActivityCode == "F09 Tutoring") ? "selected" : ""; ?>>F09 Tutoring</option>
                                                                <option value="F10 Leadership Development" <?php echo ($userActivityCode == "F10 Leadership Development") ? "selected" : ""; ?>>F10 Leadership Development</option>
                                                                <option value="F12 Supportive Service: Transportation" <?php echo ($userActivityCode == "F12 Supportive Service: Transportation") ? "selected" : ""; ?>>F12 Supportive Service: Transportation</option>
                                                                <option value="F13 Supportive Service: Purchase Work-Related Uniform/Attire" <?php echo ($userActivityCode == "F13 Supportive Service: Purchase Work-Related Uniform/Attire") ? "selected" : ""; ?>>F13 Supportive Service: Purchase Work-Related Uniform/Attire</option>
                                                                <option value="F14 Supportive Service: Purchase Work-Related Tools" <?php echo ($userActivityCode == "F14 Supportive Service: Purchase Work-Related Tools") ? "selected" : ""; ?>>F14 Supportive Service: Purchase Work-Related Tools</option>
                                                                <option value="F15 Supportive Service: Housing Assistance" <?php echo ($userActivityCode == "F15 Supportive Service: Housing Assistance") ? "selected" : ""; ?>>F15 Supportive Service: Housing Assistance</option>
                                                                <option value="F16 Supportive Service: Utilities" <?php echo ($userActivityCode == "F16 Supportive Service: Utilities") ? "selected" : ""; ?>>F16 Supportive Service: Utilities</option>
                                                                <option value="F17 Supportive Service: Dependent Care" <?php echo ($userActivityCode == "F17 Supportive Service: Dependent Care") ? "selected" : ""; ?>>F17 Supportive Service: Dependent Care</option>
                                                                <option value="F19 Supportive Service: Incentives/Bonus" <?php echo ($userActivityCode == "F19 Supportive Service: Incentives/Bonus") ? "selected" : ""; ?>>F19 Supportive Service: Incentives/Bonus</option>
                                                                <option value="F21 Supportive Service: Educational Testing" <?php echo ($userActivityCode == "F21 Supportive Service: Educational Testing") ? "selected" : ""; ?>>F21 Supportive Service: Educational Testing</option>
                                                                <option value="F22 Supportive Service: Post-Secondary Educational Materials" <?php echo ($userActivityCode == "F22 Supportive Service: Post-Secondary Educational Materials") ? "selected" : ""; ?>>F22 Supportive Service: Post-Secondary Educational Materials</option>


                                                        </select>
                                                </div>


                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Training Program</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="trainingProgram" id="trainingProgram">
                                                                <option value="" disabled selected hidden>Choose</option>

                                                                <option value="essential skills" <?php echo ($userTrainingProgram === 'essential skills') ? 'selected' : ''; ?>>CMC - Essential Skills (5 hours)</option>
                                                                <option value="Intro Assembler" <?php echo ($userTrainingProgram === 'Intro Assembler') ? 'selected' : ''; ?>>CMC - Intro to Assembler (5 hours)</option>
                                                                <option value="Assembler" <?php echo ($userTrainingProgram === 'Assembler') ? 'selected' : ''; ?>>CMC - Assembler (30 hours)</option>
                                                                <option value=" Intro Sewn Products" <?php echo ($userTrainingProgram === ' Intro Sewn Products') ? 'selected' : ''; ?>>CMC - Intro to Sewn Products (5 hours)</option>
                                                                <option value="Sewn Product" <?php echo ($userTrainingProgram === 'Sewn Product') ? 'selected' : ''; ?>>CMC - Sewn Products (30 hours)</option>
                                                                <option value="Math Tutoring" <?php echo ($userTrainingProgram === 'Math Tutoring') ? 'selected' : ''; ?>>Math Tutoring</option>
                                                                <option value="Forklift" <?php echo ($userTrainingProgram === 'Forklift') ? 'selected' : ''; ?>>CAJ - Forklift (6 hours)</option>
                                                                <option value="Intro Welding" <?php echo ($userTrainingProgram === 'Intro Welding') ? 'selected' : ''; ?>>CAJ - Intro to Welding (90 hours)</option>
                                                                <option value="Intro Manufacturing" <?php echo ($userTrainingProgram === 'Intro Manufacturing') ? 'selected' : ''; ?>>CAJ - Intro to Manufacturing (90 hours)</option>
                                                                <option value="Manufacturing Technician" <?php echo ($userTrainingProgram === 'Manufacturing Technician') ? 'selected' : ''; ?>>CAJ - Manufacturing Technician(900 hours)</option>

                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Start Date</div>
                                                <div class="col-7">
                                                        <input type="date" name="startDate" class="col input-underline" value ="<?php echo $userStartDate?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">End Date</div>
                                                <div class="col-7">
                                                        <input type="date" name="endDate" class="col input-underline" value ="<?php echo $userEndDate?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Minutes</div>
                                                <div class="col-7">
                                                        <input type="number" name="minutes" class="col input-underline" value ="<?php echo $userMinutes?>">
                                                </div>
                                        </div>
                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Notes</div>
                                                <div class="col-7">
                                                    <textarea type="text" class="form-control border border-info" rows="4" placeholder="Notes" required="" id="notes" name="notes"><?php echo $userNotes?></textarea>

                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
                <?php }}?>
        </div>


</div>

