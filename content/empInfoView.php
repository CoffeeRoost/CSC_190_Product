<?php
        session_start();
        if (!isset($_SESSION['adminLogin'])){
             //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php");
            exit();
        }
?>
<div class="container-fluid">

        <div class="mb-5">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Demographic Information</legend>
                        <div id ="empNameShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">ID</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewID']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empNameShow,#empNameEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">First Name</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewfname']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Middle Name</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewMI']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Last Name</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewlname']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Date of Birth</div>
                                        <div class="col-7"><?php
                                        $empDOBConvert = date('m-d-Y', strtotime($_SESSION['empViewDOB'])) ;
                                        echo $empDOBConvert; ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Gender</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewGender']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Ethnicity</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewRaces']?></div>
                                </div>
                                
                        </div>

                        <div id ="empNameEdit" style="transition:1ms;" class ="collapse collapse">

                                <form method="POST" action="./includes/employeeModifyFunction.inc.php">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">ID</div>
                                                <div class="col-7"><?php echo $_SESSION['empViewID']?></div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="empDemographicEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#empNameEdit,#empNameShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">First Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="empfname" class="col input-underline" value ="<?php echo $_SESSION['empViewfname']?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Middle Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="empMI" class="col input-underline" value ="<?php echo $_SESSION['empViewMI']?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Last Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="emplname" class="col input-underline" value ="<?php echo $_SESSION['empViewlname']?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Date of Birth</div>
                                                <div class="col-7">
                                                        <input type="date" name="empDOB" class="col input-underline" value ="<?php echo $_SESSION['empViewDOB'];?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Gender</div>
                                                <div class="col-7">
                                                <select class="form-select-SM border rounded-2" name="empGender" id="empGender">
                                                        <option value="" selected disabled>Select your gender</option>
                                                        <option value="Male" <?php echo ($_SESSION['empViewGender'] === 'Male') ? 'selected' : ''?>>Male</option>
                                                        <option value="Female" <?php echo ($_SESSION['empViewGender'] === 'Female') ? 'selected' : ''?>>Female</option>
                                                        <option value="Non-binary" <?php echo ($_SESSION['empViewGender'] === 'Non-binary') ? 'selected' : ''?>>Non-binary</option>
                                                        <option value="Transgender" <?php echo ($_SESSION['empViewGender'] === 'Transgender') ? 'selected' : ''?>>Transgender</option>
                                                        <option value="Genderqueer" <?php echo ($_SESSION['empViewGender'] === 'Genderqueer') ? 'selected' : ''?>>Genderqueer</option>
                                                        <option value="Agender" <?php echo ($_SESSION['empViewGender'] === 'Agender') ? 'selected' : ''?>>Agender</option>
                                                        <option value="Two-spirit" <?php echo ($_SESSION['empViewGender'] === 'Two-spirit') ? 'selected' : ''?>>Two-spirit</option>
                                                        <option value="Other" <?php echo ($_SESSION['empViewGender'] === 'Other') ? 'selected' : ''?>>Prefer not to say</option>
                                                </select>
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Ethnicity</div>
                                                <div class="col-7">
                                                <select class="form-select-SM border rounded-2" name="empRaces" id="Ethnicity">
                                                        <option value="" selected disabled> Select an ethnicity</option>
                                                        <option value="Asian" <?php echo ($_SESSION['empViewRaces'] === 'Asian') ? 'selected' : ''?>>Asian</option>
                                                        <option value="Black"<?php echo ($_SESSION['empViewRaces'] === 'Black') ? 'selected' : ''?>>Black</option>
                                                        <option value="Hispanic"<?php echo ($_SESSION['empViewRaces'] === 'Hispanic') ? 'selected' : ''?>>Hispanic</option>
                                                        <option value="Native American"<?php echo ($_SESSION['empViewRaces'] === 'Native American') ? 'selected' : ''?>>Native American</option>
                                                        <option value="White"<?php echo ($_SESSION['empViewRaces'] === 'White') ? 'selected' : ''?>>White</option>
                                                        <option value="Other"<?php echo ($_SESSION['empViewRaces'] === 'Other') ? 'selected' : ''?>>Other</option>
                                                </select>
                                                </div>       
                                        </div>
                                </form>
                        </div>       
                </fieldset>
        </div>

        <div class="mb-5">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Address</legend>
                        <div id ="empAddressShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Street</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewStreet']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empAddressShow,#empAddressEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">City</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewCity']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">County</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewCounty']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">State</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewState']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Zip Code</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewZipcode']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Phone</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewPhone']?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Email</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewEmail']?></div>
                                </div>      
                        </div>

                        <div id ="empAddressEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/employeeModifyFunction.inc.php">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Street</div>
                                                <div class="col-7">
                                                        <input type="text" name="empStreet" class="col input-underline" value ="<?php echo $_SESSION['empViewStreet']?>">
                                                </div> 

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="empAddEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#empAddressEdit,#empAddressShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">City</div>
                                                <div class="col-7">
                                                        <input type="text" name="empCity" class="col input-underline" value ="<?php echo $_SESSION['empViewCity']?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">County</div>
                                                <div class="col-7">
                                                        <input type="text" name="empCounty" class="col input-underline" value ="<?php echo $_SESSION['empViewCounty']?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">State</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="empState" id="state">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="Alabama" <?php echo ($_SESSION['empViewState'] === 'Alabama') ? 'selected' : ''; ?>>Alabama</option>
                                                                <option value="Alaska" <?php echo ($_SESSION['empViewState'] === 'Alaska') ? 'selected' : ''; ?>>Alaska</option>
                                                                <option value="Arizona" <?php echo ($_SESSION['empViewState'] === 'Arizona') ? 'selected' : ''; ?>>Arizona</option>
                                                                <option value="Arkansas" <?php echo ($_SESSION['empViewState'] === 'Arkansas') ? 'selected' : ''; ?>>Arkansas</option>
                                                                <option value="California" <?php echo ($_SESSION['empViewState'] === 'California') ? 'selected' : ''; ?>>California</option>
                                                                <option value="Colorado" <?php echo ($_SESSION['empViewState'] === 'Colorado') ? 'selected' : ''; ?>>Colorado</option>
                                                                <option value="Connecticut" <?php echo ($_SESSION['empViewState'] === 'Connecticut') ? 'selected' : ''; ?>>Connecticut</option>
                                                                <option value="Delaware" <?php echo ($_SESSION['empViewState'] === 'Delaware') ? 'selected' : ''; ?>>Delaware</option>
                                                                <option value="Florida" <?php echo ($_SESSION['empViewState'] === 'Florida') ? 'selected' : ''; ?>>Florida</option>
                                                                <option value="Georgia" <?php echo ($_SESSION['empViewState'] === 'Georgia') ? 'selected' : ''; ?>>Georgia</option>
                                                                <option value="Hawaii" <?php echo ($_SESSION['empViewState'] === 'Hawaii') ? 'selected' : ''; ?>>Hawaii</option>
                                                                <option value="Idaho" <?php echo ($_SESSION['empViewState'] === 'Idaho') ? 'selected' : ''; ?>>Idaho</option>
                                                                <option value="Illinois" <?php echo ($_SESSION['empViewState'] === 'Illinois') ? 'selected' : ''; ?>>Illinois</option>
                                                                <option value="Indiana" <?php echo ($_SESSION['empViewState'] === 'Indiana') ? 'selected' : ''; ?>>Indiana</option>
                                                                <option value="Iowa" <?php echo ($_SESSION['empViewState'] === 'Iowa') ? 'selected' : ''; ?>>Iowa</option>
                                                                <option value="Kansas" <?php echo ($_SESSION['empViewState'] === 'Kansas') ? 'selected' : ''; ?>>Kansas</option>
                                                                <option value="Kentucky" <?php echo ($_SESSION['empViewState'] === 'Kentucky') ? 'selected' : ''; ?>>Kentucky</option>
                                                                <option value="Louisiana" <?php echo ($_SESSION['empViewState'] === 'Louisiana') ? 'selected' : ''; ?>>Louisiana</option>
                                                                <option value="Maine" <?php echo ($_SESSION['empViewState'] === 'Maine') ? 'selected' : ''; ?>>Maine</option>
                                                                <option value="Maryland" <?php echo ($_SESSION['empViewState'] === 'Maryland') ? 'selected' : ''; ?>>Maryland</option>
                                                                <option value="Massachusetts" <?php echo ($_SESSION['empViewState'] === 'Massachusetts') ? 'selected' : ''; ?>>Massachusetts</option>
                                                                <option value="Michigan" <?php echo ($_SESSION['empViewState'] === 'Michigan') ? 'selected' : ''; ?>>Michigan</option>
                                                                <option value="Minnesota" <?php echo ($_SESSION['empViewState'] === 'Minnesota') ? 'selected' : ''; ?>>Minnesota</option>
                                                                <option value="Mississippi" <?php echo ($_SESSION['empViewState'] === 'Mississippi') ? 'selected' : ''; ?>>Mississippi</option>
                                                                <option value="Missouri" <?php echo ($_SESSION['empViewState'] === 'Missouri') ? 'selected' : ''; ?>>Missouri</option>
                                                                <option value="Montana" <?php echo ($_SESSION['empViewState'] === 'Montana') ? 'selected' : ''; ?>>Montana</option>
                                                                <option value="Nebraska" <?php echo ($_SESSION['empViewState'] === 'Nebraska') ? 'selected' : ''; ?>>Nebraska</option>
                                                                <option value="Nevada" <?php echo ($_SESSION['empViewState'] === 'Nevada') ? 'selected' : ''; ?>>Nevada</option>
                                                                <option value="New Hampshire" <?php echo ($_SESSION['empViewState'] === 'New Hampshire') ? 'selected' : ''; ?>>New Hampshire</option>
                                                                <option value="New Jersey" <?php echo ($_SESSION['empViewState'] === 'New Jersey') ? 'selected' : ''; ?>>New Jersey</option>
                                                                <option value="New Mexico" <?php echo ($_SESSION['empViewState'] === 'New Mexico') ? 'selected' : ''; ?>>New Mexico</option>
                                                                <option value="New York" <?php echo ($_SESSION['empViewState'] === 'New York') ? 'selected' : ''; ?>>New York</option>
                                                                <option value="North Carolina" <?php echo ($_SESSION['empViewState'] === 'North Carolina') ? 'selected' : ''; ?>>North Carolina</option>
                                                                <option value="North Dakota" <?php echo ($_SESSION['empViewState'] === 'North Dakota') ? 'selected' : ''; ?>>North Dakota</option>
                                                                <option value="Ohio" <?php echo ($_SESSION['empViewState'] === 'Ohio') ? 'selected' : ''; ?>>Ohio</option>
                                                                <option value="Oklahoma" <?php echo ($_SESSION['empViewState'] === 'Oklahoma') ? 'selected' : ''; ?>>Oklahoma</option>
                                                                <option value="Oregon" <?php echo ($_SESSION['empViewState'] === 'Oregon') ? 'selected' : ''; ?>>Oregon</option>
                                                                <option value="Pennsylvania" <?php echo ($_SESSION['empViewState'] === 'Pennsylvania') ? 'selected' : ''; ?>>Pennsylvania</option>
                                                                <option value="Rhode Island" <?php echo ($_SESSION['empViewState'] === 'Rhode Island') ? 'selected' : ''; ?>>Rhode Island</option>
                                                                <option value="South Carolina" <?php echo ($_SESSION['empViewState'] === 'South Carolina') ? 'selected' : ''; ?>>South Carolina</option>
                                                                <option value="South Dakota" <?php echo ($_SESSION['empViewState'] === 'South Dakota') ? 'selected' : ''; ?>>South Dakota</option>
                                                                <option value="Tennessee" <?php echo ($_SESSION['empViewState'] === 'Tennessee') ? 'selected' : ''; ?>>Tennessee</option>
                                                                <option value="Texas" <?php echo ($_SESSION['empViewState'] === 'Texas') ? 'selected' : ''; ?>>Texas</option>
                                                                <option value="Utah" <?php echo ($_SESSION['empViewState'] === 'Utah') ? 'selected' : ''; ?>>Utah</option>
                                                                <option value="Vermont" <?php echo ($_SESSION['empViewState'] === 'Vermont') ? 'selected' : ''; ?>>Vermont</option>
                                                                <option value="Virginia" <?php echo ($_SESSION['empViewState'] === 'Virginia') ? 'selected' : ''; ?>>Virginia</option>
                                                                <option value="Washington" <?php echo ($_SESSION['empViewState'] === 'Washington') ? 'selected' : ''; ?>>Washington</option>
                                                                <option value="West Virginia" <?php echo ($_SESSION['empViewState'] === 'West Virginia') ? 'selected' : ''; ?>>West Virginia</option>
                                                                <option value="Wisconsin" <?php echo ($_SESSION['empViewState'] === 'Wisconsin') ? 'selected' : ''; ?>>Wisconsin</option>
                                                                <option value="Wyoming" <?php echo ($_SESSION['empViewState'] === 'Wyoming') ? 'selected' : ''; ?>>Wyoming</option>
                                                        </select>
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Zip Code</div>
                                                <div class="col-7">
                                                        <input type="text" name="empZip" class="col input-underline" value ="<?php echo $_SESSION['empViewZipcode']?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Phone</div>
                                                <div class="col-7">
                                                        <input type="text" name="empPhone" class="col input-underline" value ="<?php echo $_SESSION['empViewPhone']?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Email</div>
                                                <div class="col-7">
                                                        <input type="email" name="empEmail" class="col input-underline" value ="<?php echo $_SESSION['empViewEmail']?>">
                                                </div>       
                                        </div>
                                </form>
                        </div>       

                </fieldset>
        </div>

        <div class="mb-5">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Role and Program Member</legend>
                        <div id ="empRoleShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Role</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewRole']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empRoleShow,#empRoleEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Program Member</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewProgram']?></div>
                                </div>
                        </div>

                        <div id ="empRoleEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="./includes/employeeModifyFunction.inc.php">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Role</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="empRole" id="empRole">
                                                                <option value="Manager" <?php echo ($_SESSION['empViewRole'] === 'Manager') ? 'selected' : ''; ?>>Manager</option>
                                                                <option value="Supervisor"<?php echo ($_SESSION['empViewRole'] === 'Supervisor') ? 'selected' : ''; ?>>Supervisor</option>
                                                                <option value="Developer"<?php echo ($_SESSION['empViewRole'] === 'Developer') ? 'selected' : ''; ?>>Developer</option>
                                                                <option value="Designer"<?php echo ($_SESSION['empViewRole'] === 'Designer') ? 'selected' : ''; ?>>Designer</option>
                                                                <option value="Administrator"<?php echo ($_SESSION['empViewRole'] === 'Administrator') ? 'selected' : ''; ?>>Administrator</option>
                                                                <option value="Admin"<?php echo ($_SESSION['empViewRole'] === 'Admin') ? 'selected' : ''; ?>>Administrator (System Admin)*</option>
                                                                <option value="Analyst"<?php echo ($_SESSION['empViewRole'] === 'Analyst') ? 'selected' : ''; ?>>Analyst</option>
                                                                <option value="Consultant"<?php echo ($_SESSION['empViewRole'] === 'Consultant') ? 'selected' : ''; ?>>Consultant</option>
                                                                <option value="Salesperson"<?php echo ($_SESSION['empViewRole'] === 'Salesperson') ? 'selected' : ''; ?>>Salesperson</option>
                                                                <option value="Customer Service Representative"<?php echo ($_SESSION['empViewRole'] === 'Customer Service Representative') ? 'selected' : ''; ?>>Customer Service Representative</option>
                                                        </select>
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" name ="empRoleEdit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#empRoleEdit,#empRoleShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Program Member</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="programMember" id="programMember">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="Friend and Family"<?php echo ($_SESSION['empViewProgram'] === 'Friend and Family') ? 'selected' : ''; ?>>Friend and Family</option>
                                                                <option value="Hiring Event or Career Fair"<?php echo ($_SESSION['empViewProgram'] === 'Hiring Event or Career Fair') ? 'selected' : ''; ?>>Hiring Event or Career Fair</option>
                                                                <option value="Women's Empowerment"<?php echo ($_SESSION['empViewProgram'] === 'Women\'s Empowerment') ? 'selected' : ''; ?>>Women's Empowerment</option>
                                                                <option value="Next Move"<?php echo ($_SESSION['empViewProgram'] === 'Next Move') ? 'selected' : ''; ?>>Next Move</option>
                                                                <option value="Waking the Village"<?php echo ($_SESSION['empViewProgram'] === 'Waking the Village') ? 'selected' : ''; ?>>Waking the Village</option>
                                                                <option value="Saint John's"<?php echo ($_SESSION['empViewProgram'] === 'Saint John\'s') ? 'selected' : ''; ?>>Saint John's</option>
                                					    <option value="La Familia"<?php echo ($_SESSION['empViewProgram'] === 'La Familia') ? 'selected' : ''; ?>>La Familia</option>
                                                                <option value="GS Urban League"<?php echo ($_SESSION['empViewProgram'] === 'GS Urban League') ? 'selected' : ''; ?>>GS Urban League</option>
                                                                <option value="Asian Resources"<?php echo ($_SESSION['empViewProgram'] === 'Asian Resources') ? 'selected' : ''; ?>>Asian Resources</option>
                                                                <option value="Folsom Cordova CP"<?php echo ($_SESSION['empViewProgram'] === 'Folsom Cordova CP') ? 'selected' : ''; ?>>Folsom Cordova CP</option>
                                                                <option value="Lemon Hill"<?php echo ($_SESSION['empViewProgram'] === 'Lemon Hill') ? 'selected' : ''; ?>>Lemon Hill</option>
                                                                <option value="Sac Job Corp"<?php echo ($_SESSION['empViewProgram'] === 'Sac Job Corp') ? 'selected' : ''; ?>>Sac Job Corp</option>
                                                                <option value="Public/Aura Planning"<?php echo ($_SESSION['empViewProgram'] === 'Public/Aura Planning') ? 'selected' : ''; ?>>Public/Aura Planning</option>
                                                                <option value="International Rescue Committee Sacramento"<?php echo ($_SESSION['empViewProgram'] === 'International Rescue Committee Sacramento') ? 'selected' : ''; ?>>International Rescue Committee Sacramento</option>
										    <option value="Community Resource Project"<?php echo ($_SESSION['empViewProgram'] === 'Community Resource Project') ? 'selected' : ''; ?>>Community Resource Project</option>
										    <option value="Fellowship"<?php echo ($_SESSION['empViewProgram'] === 'Fellowship') ? 'selected' : ''; ?>>Fellowship</option>
										    <option value="Other"<?php echo ($_SESSION['empViewProgram'] === 'Other') ? 'selected' : ''; ?>>Other</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class="mb-5">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Reset Password</legend>
                                <form method="POST" action="./includes/employeeModifyFunction.inc.php">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">New Password</div>
                                                <div class="col-6">
                                                        <input type="text" name="newPassword" class="col input-underline">
                                                </div>

                                                <form method="POST" action="./includes/employeeModifyFunction.inc.php">
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
                        <form method="POST" action="./includes/employeeModifyFunction.inc.php">
                                <button type="submit" name="deactivate" 
                                        <?php if($_SESSION['empStatus'] == 1){
                                                echo "class=\"btn bg-success text-white\"";
                                                }
                                                else {
                                                echo "class=\"btn bg-secondary text-white\"";       
                                                }
                                        ?>
                                >
                                        <?php 
                                                if($_SESSION['empStatus'] == 1){
                                                        echo "Deactivate";
                                                        }
                                                else {
                                                        echo "Activate";       
                                                }
                                        ?>
                                </button>
                        </form>

                        <button onclick="confirmDelete()" class="btn bg-danger text-white ms-3">Delete</button>
                </div>
        </div>
        
</div>

<script>
function confirmDelete() {
  if (confirm("Account cannot be recovery after delete.\nIf you are not sure. Please using deactivate.\nDo you want to continue delete?")) {
        window.location.href = "./includes/employeeModifyFunction.inc.php?action=delete";
  } else {
    // do nothing
  }
}
</script>