<?php
    session_start();

    require 'includes/dbh.inc.php';

    if(isset($_SESSION['adminLogin']) || isset($_SESSION['email'])){
        
        $stmt = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
		$stmt ->bind_param("s",$_SESSION['email']);
		if(!$stmt ->execute()){
			session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php?error=sqlerror");
            exit();
		}

		$result = $stmt->get_result();

		if($result->num_rows >0){
            $row = $result->fetch_assoc();
            $employeeID = $row['employeeID'];
        }
        else{
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php?error=NoUserEmail");
            exit();
        }

        $stmt ->close();

        if($_SESSION['adminLogin'] !== $employeeID){
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php?error=Not_Logged_In");
            exit();
        }
    }
    else{
        //if error, force a logout
        session_unset();
        session_destroy();
        header ("Location: ./LoginAd.php?error=Not_Logged_In");
        exit();
    }
?>


<form action="/includes/reportActivityToDatabaseAD.php" method="post" class="container-fluid custom-container">

    <h4 class="d-flex justify-content-center text-info mt-5">Participant Activity Reporting Form</h4>
    <h6 class="d-flex justify-content-center">CMC Career Pathways form to be used for capturing all activity with all participants</h6>
    <hr>

    <h6 class="mt-5">Coach Name <span class="text-danger">*</span></h6>
    <input type="text" name="coachName" id="coachName" class="input-underline" placeholder="Your answer" required>

    <h6 class="mt-5">Client ID <span class="text-danger">*</span></h6>
    <input type="text" name="clientID" id="clientID" class="input-underline" placeholder="Your answer" required>

    <h6 class="mt-5">Client Last Name <span class="text-danger">*</span></h6>
    <input type="text" name="clientLName" id="clientLName" class="input-underline" placeholder="Your answer" required>

    <h6 class="mt-5">Client First Name <span class="text-danger">*</span></h6>
    <input type="text" name="clientFName" id="clientFName" class="input-underline" placeholder="Your answer" required>

    <h6 class="mt-5">Please choose from the list code list and select best code that fits for activity. <span class="text-danger">*</span></h6>
    <select class="form-select-SM border rounded-2" name="trainingCode" id="" required>
                        <option value="" disabled selected hidden>Choose</option>
                        <option value="101">101 Orientation</option>
                        <option value="102">102 Initial Assessment</option>
                        <option value="103">103 Provision of Information on Training Providers/Performance Outcomes</option>
                        <option value="105">105 Job Finding Club</option>
                        <option value="106">106 In Program Follow-Up</option>
                        <option value="107">107 Provision of Labor Market Research</option>
                        <option value="108">108 Referred to WIOA Services (not training)</option>
                        <option value="109">109 Referred to Community Resource</option>
                        <option value="112">112 Job Fair</option>
                        <option value="115">115 Resume Preparation Assistance</option>
                        <option value="120">120 Use of AJCC Resource Room</option>
                        <option value="121">121 Job Referral: Job Outside CalJOBS (non-Federal)</option>
                        <option value="123">123 Job Development Contacts</option>
                        <option value="125">125 Job Search and Placement Assistance</option>
                        <option value="130">130 Proficiency Testing</option>
                        <option value="132">132 Resume Writing Workshop</option>
                        <option value="133">133 Job Search Workshop</option>
                        <option value="134">134 Workshop</option>
                        <option value="140">140 Referred to other Federal/State Assistance</option>
                        <option value="147">147 Personalized Job Search Assistance Workshop (PJSA)</option>
                        <option value="180">180 Supportive Service: Child/Dependent Care</option>
                        <option value="181">181 Supportive Service: Transportation Assistance</option>
                        <option value="183">183 Supportive Service: Incentives/Bonuses</option>
                        <option value="184">184 Supportive Service: Temporary Shelter</option>
                        <option value="185">185 Supportive Service: Other</option>
                        <option value="186">186 Supportive Service: Seminar/Workshop Allowance</option>
                        <option value="187">187 Supportive Service: Job Search Allowance</option>
                        <option value="188">188 Supportive Service: Tools/Clothing</option>
                        <option value="189">189 Supportive Service: Housing Assistance</option>
                        <option value="190">190 Supportive Service: Utilities</option>
                        <option value="191">191 Supportive Service: Educational Testing</option>
                        <option value="192">192 Supportive Service: Post-Secondary Academic Materials</option>
                        <option value="200">200 Individual Counseling</option>
                        <option value="202">202 Career Guidance/Planning</option>
                        <option value="203">203 Objective Assessment</option>
                        <option value="204">204 Interest And Aptitude Testing</option>
                        <option value="205">205 Development of IEP/ISS/EDP</option>
                        <option value="206">206 Referred to Register Apprenticeship Program</option>
                        <option value="209">209 Referred to State and Local Training (non-WIOA)</option>
                        <option value="210">210 Referred to Education Services (non-Federal/State/Local)</option>
                        <option value="213">213 Mentorship</option>
                        <option value="214">214 Adult Literacy, Basic Skills or GED Preparation</option>
                        <option value="215">215 Short-Term Prevocational Services</option>
                        <option value="217">217 Relocation Assistance</option>
                        <option value="218">218 Referred to Internship</option>
                        <option value="219">219 Work Experience</option>
                        <option value="221">221 Financial Literacy Education</option>
                        <option value="222">222 English Language Learner (ELL)</option>
                        <option value="224">224 Pre-Apprenticeship Training</option>
                        <option value="226">226 Reading and/or Math Testing</option>
                        <option value="300">300 Occupational Skills Training</option>
                        <option value="301">301 On-the-job Training</option>
                        <option value="302">302 Entrepreneurial Training</option>
                        <option value="304">304 Customized Training</option>
                        <option value="305">305 Skills Upgrading and Retraining</option>
                        <option value="306">306 WIOA Prerequisite Trainings</option>
                        <option value="307">307 Pre-Apprenticeship Program w/Occupational Skill Training (ITA)</option>
                        <option value="308">308 Incumbent Worker Training</option>
                        <option value="311">311 Placed in Job Corps</option>
                        <option value="313">313 Placed in State and Local Trainings (non-TAA, non-WIOA)</option>
                        <option value="320">320 Private Sector Training</option>
                        <option value="321">321 Transitional Job</option>
                        <option value="322">322 Job Readiness Training</option>
                        <option value="323">323 Workplace Training & Cooperative Education</option>
                        <option value="324">324 Adult Education with Training Services</option>
                        <option value="325">325 Apprenticeship Training</option>
                        <option value="327">327 Supportive Service: Training Allowance</option>
                        <option value="400">400 Youth Summer Employment</option>
                        <option value="406">406 Tutoring, Study Skills Training & Instruction</option>
                        <option value="407">407 Financial Literacy Education</option>
                        <option value="408">408 Youth Internship (Unpaid)</option>
                        <option value="409">409 Youth Job Shadowing</option>
                        <option value="410">410 Leadership Development Services</option>
                        <option value="411">411 Adult Mentoring</option>
                        <option value="412">412 Objective Assessment</option>
                        <option value="413">413 Develop Service Strategies (IEP/ISS/EDP)</option>
                        <option value="414">414 Basic Skills Training</option>
                        <option value="416">416 Occupational Skills Training (Approved ETPL Provider)</option>
                        <option value="417">417 Comprehensive Guidance and Counseling</option>
                        <option value="418">418 Adult Education (GED)</option>
                        <option value="421">421 Enrolled in Post Secondary Education</option>
                        <option value="424">424 Entrepreneurial Skills Training</option>
                        <option value="425">425 Work Experience (Paid)</option>
                        <option value="426">426 Work Experience (Unpaid)</option>
                        <option value="427">427 Internship (Paid)</option>
                        <option value="428">428 Youth On-the-Job Training</option>
                        <option value="429">429 Enrolled in Secondary Education Program</option>
                        <option value="430">430 Youth Occupational Skills Training (Youth Service Eligible Provider List)</option>
                        <option value="431">431 Enrolled in Pre Apprenticeship Training</option>
                        <option value="432">432 Enrolled in Apprenticeship Training</option>
                        <option value="433">433 Career Awareness</option>
                        <option value="434">434 Career Exploration</option>
                        <option value="435">435 Career Counseling/planning</option>
                        <option value="436">436 Post-Secondary Transition Services</option>
                        <option value="437">437 Pre-Apprenticeship Program with Occupational Skills Training (ITA)</option>
                        <option value="438">438 Occupational Skills Training (non-WIOA Funds)</option>
                        <option value="439">439 Education Offered Concurrently w/Workforce Prep and Training</option>
                        <option value="480">480 Supportive Service: Child/Dependent Care</option>
                        <option value="481">481 Supportive Service: Transportation Assistance</option>
                        <option value="483">483 Supportive Service: Temporary Shelter</option>
                        <option value="485">485 Supportive Service: Other</option>
                        <option value="487">487 Supportive Service: Tools/Clothing</option>
                        <option value="488">488 Supportive Service: Housing Assistance</option>
                        <option value="489">489 Supportive Service: Utilities</option>
                        <option value="490">490 Supportive Service: Educational Testing</option>
                        <option value="493">493 Supportive Service: Post-Secondary Educational Materials</option>
                        <option value="follow">Follow Up Services</option>
                        <option value="F01">F01 Referral to Community Resources</option>
                        <option value="F03">F03 Tracking Progress on the Job</option>
                        <option value="F04">F04 Work-Related Peer Support Group</option>
                        <option value="F05">F05 Assistance Securing Better Paying Job</option>
                        <option value="F06">F06 Career Development and Further Education Planning</option>
                        <option value="F07">F07 Assistance with Work-Related Problems</option>
                        <option value="F08">F08 Adult Mentoring</option>
                        <option value="F09">F09 Tutoring</option>
                        <option value="F10">F10 Leadership Development</option>
                        <option value="F12">F12 Supportive Service: Transportation</option>
                        <option value="F13">F13 Supportive Service: Purchase Work-Related Uniform/Attire</option>
                        <option value="F14">F14 Supportive Service: Purchase Work-Related Tools</option>
                        <option value="F15">F15 Supportive Service: Housing Assistance</option>
                        <option value="F16">F16 Supportive Service: Utilities</option>
                        <option value="F17">F17 Supportive Service: Dependent Care</option>
                        <option value="F19">F19 Supportive Service: Incentives/Bonus</option>
                        <option value="F21">F21 Supportive Service: Educational Testing</option>
                        <option value="F22">F22 Supportive Service: Post-Secondary Educational Materials</option>
    </select>


    <h6 class="mt-5">If Training Code was selected, specify the training program below</h6>
    <select class="form-select-SM border rounded-2" name="trainingProgram" id="" required>
                        <option value="" disabled selected hidden>Choose</option>
                        <option value="essential skills">CMC - Essential Skills (5 hours)</option>
                        <option value="Intro Assembler">CMC - Intro to Assembler (5 hours)</option>
                        <option value="Assembler">CMC - Assembler (30 hours)</option>
                        <option value=" Intro Sewn Products">CMC - Intro to Sewn Products (5 hours)</option>
                        <option value="Sewn Product">CMC - Sewn Products (30 hours)</option>
                        <option value="Math Tutoring">Math Tutoring</option>
                        <option value="Forklift">CAJ - Forklift (6 hours)</option>
                        <option value="Intro Welding">CAJ - Intro to Welding (90 hours)</option>
                        <option value="Intro Manufacturing">CAJ - Intro to Manufacturing (90 hours)</option>
                        <option value="Manufacturing Technician">CAJ - Manufacturing Technician(900 hours)</option>

      </select>

    <h6 class="mt-5">Start Date of Activity <span class="text-danger">*</span></h6>
    <input type="date" name="startDate" id="" class="input-underline" placeholder="" required>

    <h6 class="mt-5">End Date of Activity <span class="text-danger">*</span></h6>
    <input type="date" name="endDate" id="" class="input-underline" placeholder="" required>


    <h6 class="mt-5">How much time was spent with pariticipant? <span class="text-danger">*</span> Specify in minutes</h6>
    <input type="number" name="timeSpent" id="timeSpent" class="input-underline" placeholder="Your answer" required>

    <h6 class="mt-5">Notes <span class="text-danger">*</span></h6>
      <div class="col-6 my-3">
        <textarea class="form-control border border-info" name="notes" rows="4" placeholder="" required></textarea>
        <button name="submitActivityAdmin" class="btn btn-info btn-shadow my-3" type="submit">Submit</button>

      </div>



</form>