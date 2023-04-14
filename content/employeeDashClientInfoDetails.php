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
                    $clientActivityReport = "SELECT PRA.employeeID, PRA.userID,
                                                    PRA.activityCode, PRA.trainingProgram, PRA.startDate,
                                                    PRA.endDate, PRA.minutes,  PRA.notes
                                              FROM participationReportActivity PRA
                                              INNER JOIN COACH C ON C.employeeID = PRA.employeeID
                                              INNER JOIN PARTICIPATION P ON P.userID = PRA.userID
                                              WHERE P.userID = ?
                                              GROUP BY PRA.employeeID, PRA.userID
                                              HAVING COUNT(*) > 1";

                      // Create a prepared statement
                      $stmt = $conn->prepare($clientActivityReport);

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
                          $userActivityCode= $row['activityCode'];
                          $userTrainingProgram = $row['trainingProgram'];
                          $userStartDate = $row['startDate'];
                          $userEndDate = $row['endDate'];
                          $userMinutes = $row['minutes'];
                          $userNotes =$row['notes'];
                  ?>

                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Client Report Activity</legend>
                        <div id ="clientReportActivityShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Activity Code</div>
                                        <div class="col-7"><?php echo $userActivityCode?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#clientReportActivityShow,#clientReportActivityEdit">Edit</a>
                                        </div>
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

        <!--Role and Program Member Edit Section-->
                        <div id ="clientReportActivityEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/updateReportActivity.inc.php">
                                          <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                                          <div  class="row my-2">
                                            <div class="col-4 fw-bold"></div>
                                            <div class="col-7"></div>

                                            <div class="col-1 d-flex justify-content-end">
                                                <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#clientReportActivityShow,#clientReportActivityEdit">Save</button>
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
                                                                <option value="109" <?php echo ($userActivityCode === '109') ? 'selected' : ''; ?>>109 Referred to Community Resource</option>
                                                                <option value="112" <?php echo ($userActivityCode === '112') ? 'selected' : ''; ?>>112 Job Fair</option>
                                                                <option value="115" <?php echo ($userActivityCode === '115') ? 'selected' : ''; ?>>115 Resume Preparation Assistance</option>
                                                                <option value="120" <?php echo ($userActivityCode === '120') ? 'selected' : ''; ?>>120 Use of AJCC Resource Room</option>
                                                                <option value="121" <?php echo ($userActivityCode === '121') ? 'selected' : ''; ?>>121 Job Referral: Job Outside CalJOBS (non-Federal)</option>
                                                                <option value="123" <?php echo ($userActivityCode === '123') ? 'selected' : ''; ?>>123 Job Development Contacts</option>
                                                                <option value="125" <?php echo ($userActivityCode === '125') ? 'selected' : ''; ?>>125 Job Search and Placement Assistance</option>
                                                                <option value="130" <?php echo ($userActivityCode === '130') ? 'selected' : ''; ?>>130 Proficiency Testing</option>
                                                                <option value="132" <?php echo ($userActivityCode === '132') ? 'selected' : ''; ?>>132 Resume Writing Workshop</option>
                                                                <option value="133" <?php echo ($userActivityCode === '133') ? 'selected' : ''; ?>>133 Job Search Workshop</option>
                                                                <option value="134" <?php echo ($userActivityCode === '134') ? 'selected' : ''; ?>>134 Workshop</option>
                                                                <option value="140" <?php echo ($userActivityCode === '140') ? 'selected' : ''; ?>>140 Referred to other Federal/State Assistance</option>
                                                                <option value="147" <?php echo ($userActivityCode === '147') ? 'selected' : ''; ?>>147 Personalized Job Search Assistance Workshop (PJSA)</option>
                                                                <option value="180" <?php echo ($userActivityCode === '180') ? 'selected' : ''; ?>>180 Supportive Service: Child/Dependent Care</option>
                                                                <option value="181" <?php echo ($userActivityCode === '181') ? 'selected' : ''; ?>>181 Supportive Service: Transportation Assistance</option>
                                                                <option value="183" <?php echo ($userActivityCode === '183') ? 'selected' : ''; ?>>183 Supportive Service: Incentives/Bonuses
                                                                <option value="184" <?php echo ($userActivityCode === '184') ? 'selected' : ''; ?>>184 Supportive Service: Temporary Shelter</option>
                                                                <option value="185" <?php echo ($userActivityCode === '185') ? 'selected' : ''; ?>>185 Supportive Service: Other</option>
                                                                <option value="186" <?php echo ($userActivityCode === '186') ? 'selected' : ''; ?>>186 Supportive Service: Seminar/Workshop Allowance</option>
                                                                <option value="187" <?php echo ($userActivityCode === '187') ? 'selected' : ''; ?>>187 Supportive Service: Job Search Allowance</option>
                                                                <option value="188" <?php echo ($userActivityCode === '188') ? 'selected' : ''; ?>>188 Supportive Service: Tools/Clothing</option>
                                                                <option value="189" <?php echo ($userActivityCode === '189') ? 'selected' : ''; ?>>189 Supportive Service: Housing Assistance</option>
                                                                <option value="190" <?php echo ($userActivityCode === '190') ? 'selected' : ''; ?>>190 Supportive Service: Utilities</option>
                                                                <option value="191" <?php echo ($userActivityCode === '191') ? 'selected' : ''; ?>>191 Supportive Service: Educational Testing</option>
                                                                <option value="192" <?php echo ($userActivityCode === '192') ? 'selected' : ''; ?>>192 Supportive Service: Post-Secondary Academic Materials</option>
                                                                <option value="200" <?php echo ($userActivityCode === '200') ? 'selected' : ''; ?>>200 Individual Counseling</option>
                                                                <option value="202" <?php echo ($userActivityCode === '202') ? 'selected' : ''; ?>>202 Career Guidance/Planning</option>
                                                                <option value="203" <?php echo ($userActivityCode === '203') ? 'selected' : ''; ?>>203 Objective Assessment</option>
                                                                <option value="204" <?php echo ($userActivityCode === '204') ? 'selected' : ''; ?>>204 Interest And Aptitude Testing</option>
                                                                <option value="205" <?php echo ($userActivityCode === '205') ? 'selected' : ''; ?>>205 Development of IEP/ISS/EDP</option>
                                                                <option value="206" <?php echo ($userActivityCode === '206') ? 'selected' : ''; ?>>206 Referred to Register Apprenticeship Program</option>
                                                                <option value="209" <?php echo ($userActivityCode === '209') ? 'selected' : ''; ?>>209 Referred to State and Local Training (non-WIOA)</option>
                                                                <option value="210" <?php echo ($userActivityCode === '210') ? 'selected' : ''; ?>>210 Referred to Education Services (non-Federal/State/Local)</option>
                                                                <option value="213" <?php echo ($userActivityCode === '213') ? 'selected' : ''; ?>>213 Mentorship</option>
                                                                <option value="214" <?php echo ($userActivityCode === '214') ? 'selected' : ''; ?>>214 Adult Literacy, Basic Skills or GED Preparation</option>
                                                                <option value="215" <?php echo ($userActivityCode === '215') ? 'selected' : ''; ?>>215 Short-Term Prevocational Services</option>
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

