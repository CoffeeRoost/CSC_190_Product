<?php
if(!isset($_SESSION)) { 
        session_start(); 
}
// Include database connection
// Start session and check if user is logged in
if (!isset($_SESSION['employeeID'])) {
 //if error, force a logout
 session_unset();
 session_destroy();
//Redirect user to login page if not logged in
header("Location:../LoginAd.php");
exit();
}

//connect to database
require_once ('includes/dbh.inc.php');

// Get the user ID from the session variable
$employeeID = $_SESSION['employeeID'];

// Prepare the SQL query
$query = "SELECT * FROM EMPLOYEE WHERE employeeID = ?";

// Create a prepared statement
$stmt = $conn->prepare($query);

// Bind the parameter to the statement
$stmt->bind_param("i", $employeeID);

// Execute the statement
$stmt->execute();

// Get the results
$result = $stmt->get_result();

// Fetch the data as an associative array
$row = $result->fetch_assoc();

// Extract the values from the array
$employeeID = $row['employeeID'];
$empfname = $row['empfname'];
$emplname = $row['emplname'];
$empMI = $row['empMI'];
$email =$row['email'];
$empDOB=$row['empDOB'];
$empStreet=$row['empStreet'];
$empCity=$row['empCity'];
$empCounty =$row['empCounty'];
$empState=$row['empState'];
$empZipcode=$row['empZipcode'];
$empPhone= $row['empPhone'];
$empGender= $row['empGender'];
$empRaces= $row['empRaces'];
$employeeRole=$row['employeeRole'];

$programMember=$row['programMember'];



?>

<div class="container-fluid">
        <!--Demographic Information Section-->
        <div class="mb-5">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Demographic Information</legend>
                        <div id ="empNameShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">ID</div>
                                        <div class="col-7"><?php echo $employeeID?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empNameShow,#empNameEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">First Name</div>
                                        <div class="col-7"><?php echo $empfname?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Middle Name</div>
                                        <div class="col-7"><?php echo $empMI?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Last Name</div>
                                        <div class="col-7"><?php echo $emplname?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Date of Birth</div>
                                        <div class="col-7"><?php
                                        $empDOBConvert = date('m-d-Y', strtotime($empDOB)) ;
                                        echo $empDOBConvert; ?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Gender</div>
                                        <div class="col-7"><?php echo $empGender?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Race</div>
                                        <div class="col-7"><?php echo $empRaces?></div>
                                </div>

                        </div>


        <!--Demographic Information Edit Section-->
                        <div id ="empNameEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="includes/saveEmployeeDemographicInfor.inc.php">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">ID</div>
                                                <div class="col-7"><?php echo $employeeID?></div>

                                                <div class="col-1 text-end">

                                                        <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#empNameEdit,#empNameShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">First Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="empfname" class="col input-underline" value ="<?php echo $empfname?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Middle Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="empMI" class="col input-underline" value ="<?php echo $empMI?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Last Name</div>
                                                <div class="col-7">
                                                        <input type="text" name="emplname" class="col input-underline" value ="<?php echo $emplname?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Date of Birth</div>
                                                <div class="col-7">
                                                        <input type="date" name="empDOB" class="col input-underline" value ="<?php echo $empDOB;?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Gender</div>
                                                <div class="col-7">
                                                        <input type="text" name="empGender" class="col input-underline" value ="<?php echo $empGender?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Race</div>
                                                <div class="col-7">
                                                        <input type="text" name="empRaces" class="col input-underline" value ="<?php echo $empRaces?>">
                                                </div>
                                        </div>
                                </form>
                        </div>
                </fieldset>
        </div>

        <!--Address Section-->
        <div class="mb-5">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Address</legend>
                        <div id ="empAddressShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Street</div>
                                        <div class="col-7"><?php echo $empStreet?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empAddressShow,#empAddressEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">City</div>
                                        <div class="col-7"><?php echo $empCity?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">County</div>
                                        <div class="col-7"><?php echo $empCounty?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">State</div>
                                        <div class="col-7"><?php echo $empState?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Zip Code</div>
                                        <div class="col-7"><?php echo $empZipcode?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Phone</div>
                                        <div class="col-7"><?php echo $empPhone?></div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Email</div>
                                        <div class="col-7"><?php echo $email?></div>
                                </div>
                        </div>

        <!--Address Edit Section-->
                        <div id ="empAddressEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="includes/saveEmployeeAddressInfo.inc.php">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Street</div>
                                                <div class="col-7">
                                                        <input type="text" name="empStreet" class="col input-underline" value ="<?php echo $empStreet?>">
                                                </div>

                                                <div class="col-1 text-end">
                                                        <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#empAddressEdit,#empAddressShow">Save</button>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">City</div>
                                                <div class="col-7">
                                                        <input type="text" name="empCity" class="col input-underline" value ="<?php echo $empCity?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">County</div>
                                                <div class="col-7">
                                                        <input type="text" name="empCounty" class="col input-underline" value ="<?php echo $empCounty?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">State</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM m-2 border rounded-2" name="empState" id="state">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="Alabama" <?php echo ($empState === 'Alabama') ? 'selected' : ''; ?>>Alabama</option>
                                                                <option value="Alaska" <?php echo ($empState === 'Alaska') ? 'selected' : ''; ?>>Alaska</option>
                                                                <option value="Arizona" <?php echo ($empState === 'Arizona') ? 'selected' : ''; ?>>Arizona</option>
                                                                <option value="Arkansas" <?php echo ($empState === 'Arkansas') ? 'selected' : ''; ?>>Arkansas</option>
                                                                <option value="California" <?php echo ($empState === 'California') ? 'selected' : ''; ?>>California</option>
                                                                <option value="Colorado" <?php echo ($empState === 'Colorado') ? 'selected' : ''; ?>>Colorado</option>
                                                                <option value="Connecticut" <?php echo ($empState === 'Connecticut') ? 'selected' : ''; ?>>Connecticut</option>
                                                                <option value="Delaware" <?php echo ($empState === 'Delaware') ? 'selected' : ''; ?>>Delaware</option>
                                                                <option value="Florida" <?php echo ($empState === 'Florida') ? 'selected' : ''; ?>>Florida</option>
                                                                <option value="Georgia" <?php echo ($empState === 'Georgia') ? 'selected' : ''; ?>>Georgia</option>
                                                                <option value="Hawaii" <?php echo ($empState === 'Hawaii') ? 'selected' : ''; ?>>Hawaii</option>
                                                                <option value="Idaho" <?php echo ($empState === 'Idaho') ? 'selected' : ''; ?>>Idaho</option>
                                                                <option value="Illinois" <?php echo ($empState === 'Illinois') ? 'selected' : ''; ?>>Illinois</option>
                                                                <option value="Indiana" <?php echo ($empState === 'Indiana') ? 'selected' : ''; ?>>Indiana</option>
                                                                <option value="Iowa" <?php echo ($empState === 'Iowa') ? 'selected' : ''; ?>>Iowa</option>
                                                                <option value="Kansas" <?php echo ($empState === 'Kansas') ? 'selected' : ''; ?>>Kansas</option>
                                                                <option value="Kentucky" <?php echo ($empState === 'Kentucky') ? 'selected' : ''; ?>>Kentucky</option>
                                                                <option value="Louisiana" <?php echo ($empState === 'Louisiana') ? 'selected' : ''; ?>>Louisiana</option>
                                                                <option value="Maine" <?php echo ($empState === 'Maine') ? 'selected' : ''; ?>>Maine</option>
                                                                <option value="Maryland" <?php echo ($empState === 'Maryland') ? 'selected' : ''; ?>>Maryland</option>
                                                                <option value="Massachusetts" <?php echo ($empState === 'Massachusetts') ? 'selected' : ''; ?>>Massachusetts</option>
                                                                <option value="Michigan" <?php echo ($empState === 'Michigan') ? 'selected' : ''; ?>>Michigan</option>
                                                                <option value="Minnesota" <?php echo ($empState === 'Minnesota') ? 'selected' : ''; ?>>Minnesota</option>
                                                                <option value="Mississippi" <?php echo ($empState === 'Mississippi') ? 'selected' : ''; ?>>Mississippi</option>
                                                                <option value="Missouri" <?php echo ($empState === 'Missouri') ? 'selected' : ''; ?>>Missouri</option>
                                                                <option value="Montana" <?php echo ($empState === 'Montana') ? 'selected' : ''; ?>>Montana</option>
                                                                <option value="Nebraska" <?php echo ($empState === 'Nebraska') ? 'selected' : ''; ?>>Nebraska</option>
                                                                <option value="Nevada" <?php echo ($empState === 'Nevada') ? 'selected' : ''; ?>>Nevada</option>
                                                                <option value="New Hampshire" <?php echo ($empState === 'New Hampshire') ? 'selected' : ''; ?>>New Hampshire</option>
                                                                <option value="New Jersey" <?php echo ($empState === 'New Jersey') ? 'selected' : ''; ?>>New Jersey</option>
                                                                <option value="New Mexico" <?php echo ($empState === 'New Mexico') ? 'selected' : ''; ?>>New Mexico</option>
                                                                <option value="New York" <?php echo ($empState === 'New York') ? 'selected' : ''; ?>>New York</option>
                                                                <option value="North Carolina" <?php echo ($empState === 'North Carolina') ? 'selected' : ''; ?>>North Carolina</option>
                                                                <option value="North Dakota" <?php echo ($empState === 'North Dakota') ? 'selected' : ''; ?>>North Dakota</option>
                                                                <option value="Ohio" <?php echo ($empState === 'Ohio') ? 'selected' : ''; ?>>Ohio</option>
                                                                <option value="Oklahoma" <?php echo ($empState === 'Oklahoma') ? 'selected' : ''; ?>>Oklahoma</option>
                                                                <option value="Oregon" <?php echo ($empState === 'Oregon') ? 'selected' : ''; ?>>Oregon</option>
                                                                <option value="Pennsylvania" <?php echo ($empState === 'Pennsylvania') ? 'selected' : ''; ?>>Pennsylvania</option>
                                                                <option value="Rhode Island" <?php echo ($empState === 'Rhode Island') ? 'selected' : ''; ?>>Rhode Island</option>
                                                                <option value="South Carolina" <?php echo ($empState === 'South Carolina') ? 'selected' : ''; ?>>South Carolina</option>
                                                                <option value="South Dakota" <?php echo ($empState === 'South Dakota') ? 'selected' : ''; ?>>South Dakota</option>
                                                                <option value="Tennessee" <?php echo ($empState === 'Tennessee') ? 'selected' : ''; ?>>Tennessee</option>
                                                                <option value="Texas" <?php echo ($empState === 'Texas') ? 'selected' : ''; ?>>Texas</option>
                                                                <option value="Utah" <?php echo ($empState === 'Utah') ? 'selected' : ''; ?>>Utah</option>
                                                                <option value="Vermont" <?php echo ($empState === 'Vermont') ? 'selected' : ''; ?>>Vermont</option>
                                                                <option value="Virginia" <?php echo ($empState === 'Virginia') ? 'selected' : ''; ?>>Virginia</option>
                                                                <option value="Washington" <?php echo ($empState === 'Washington') ? 'selected' : ''; ?>>Washington</option>
                                                                <option value="West Virginia" <?php echo ($empState === 'West Virginia') ? 'selected' : ''; ?>>West Virginia</option>
                                                                <option value="Wisconsin" <?php echo ($empState === 'Wisconsin') ? 'selected' : ''; ?>>Wisconsin</option>
                                                                <option value="Wyoming" <?php echo ($empState === 'Wyoming') ? 'selected' : ''; ?>>Wyoming</option>

                                                        </select>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Zip Code</div>
                                                <div class="col-7">
                                                        <input type="text" name="empZipcode" class="col input-underline" value ="<?php echo $empZipcode?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Phone</div>
                                                <div class="col-7">
                                                        <input type="text" name="empPhone" class="col input-underline" value ="<?php echo $empPhone?>">
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Email</div>
                                                <div class="col-7">
                                                        <input type="email" name="email" class="col input-underline" value ="<?php echo $email?>">
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <!--Role and Program Member Section-->
        <div class="mb-5">
                <fieldset class="border rounded-3 p-3">
                        <legend class="float-none w-auto px-3">Role and Program Member</legend>
                        <div id ="empRoleShow" style="transition:1ms;" class ="collapse show">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">Role</div>
                                        <div class="col-7"><?php echo $employeeRole?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empRoleShow,#empRoleEdit">Edit</a>
                                        </div>
                                </div>

                                <div  class="row mb-2">
                                        <div class="col-4 fw-bold">Program Member</div>
                                        <div class="col-7"><?php echo $programMember?></div>
                                </div>
                        </div>

        <!--Role and Program Member Edit Section-->
                        <div id ="empRoleEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="post" action="includes/saveEmployeeRoleProgramInfo.inc.php">


                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Role</div>
                                                <div class="col-7"><?php echo $employeeRole?></div>
                                                <div class="col-1 text-end">
                                                        <button type="submit" class="text-decoration-none text-Blue border-0 bg-body" data-bs-toggle="collapse" data-bs-target="#empRoleEdit,#empRoleShow">Save</button>
                                                </div>

                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Program Member</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="programMember" id="programMember">
                                                                <option value="" disabled selected hidden>Choose</option>
                                                                <option value="Friend and Family" <?php echo ($programMember === 'Friend and Family') ? 'selected' : ''; ?>>Friend and Family</option>
                                                                <option value="Hiring Event or Career Fair" <?php echo ($programMember === 'Hiring Event or Career Fair') ? 'selected' : ''; ?>>Hiring Event or Career Fair</option>
                                                                <option value="Women's Empowerment" <?php echo ($programMember === "Women's Empowerment") ? 'selected' : ''; ?>>Women's Empowerment</option>
                                                                <option value="Next Move" <?php echo ($programMember === 'Next Move') ? 'selected' : ''; ?>>Next Move</option>
                                                                <option value="Waking the Village" <?php echo ($programMember === 'Waking the Village') ? 'selected' : ''; ?>>Waking the Village</option>
                                                                <option value="Saint John's" <?php echo ($programMember === "Saint John's") ? 'selected' : ''; ?>>Saint John's</option>
                                                                <option value="La Familia" <?php echo ($programMember === 'La Familia') ? 'selected' : ''; ?>>La Familia</option>
                                                                <option value="GS Urban League" <?php echo ($programMember === 'GS Urban League') ? 'selected' : ''; ?>>GS Urban League</option>
                                                                <option value="Asian Resources" <?php echo ($programMember === 'Asian Resources') ? 'selected' : ''; ?>>Asian Resources</option>
                                                                <option value="Folsom Cordova CP" <?php echo ($programMember === 'Folsom Cordova CP') ? 'selected' : ''; ?>>Folsom Cordova CP</option>
                                                                <option value="Lemon Hill" <?php echo ($programMember === 'Lemon Hill') ? 'selected' : ''; ?>>Lemon Hill</option>
                                                                <option value="Sac Job Corp" <?php echo ($programMember === 'Sac Job Corp') ? 'selected' : ''; ?>>Sac Job Corp</option>
                                                                <option value="Public/Aura Planning" <?php echo ($programMember === 'Public/Aura Planning') ? 'selected' : ''; ?>>Public/Aura Planning</option>
                                                                <option value="International Rescue Committee Sacramento" <?php echo ($programMember === 'International Rescue Committee Sacramento') ? 'selected' : ''; ?>>International Rescue Committee Sacramento</option>
                                                                <option value="Community Resource Project" <?php echo ($programMember === 'Community Resource Project') ? 'selected' : ''; ?>>Community Resource Project</option>
                                                                <option value="Fellowship" <?php echo ($programMember === 'Fellowship') ? 'selected' : ''; ?>>Fellowship</option>
                                                                <option value="Other" <?php echo ($programMember === 'Other') ? 'selected' : ''; ?>>Other</option> 
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>



</div>


