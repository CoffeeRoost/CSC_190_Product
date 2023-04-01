<?php

//connect to database
require_once ('includes/dbh.inc.php');

// Get the user ID from the session variable
$employeeID = $_SESSION['employeeID'];

// Prepare the SQL query
$query = "SELECT employeeID, empfname, emplname, empMI, email, empDOB, empStreet, empCity, empState,
          empZipcode, empPhone, empGender, empRaces, employeeRole, userPassword, programMember FROM employee WHERE employeeID = ?";

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
$email= $row['email'];
$empDOB=$row['empDOB'];
$empStreet=$row['empStreet'];
$empCity=$row['empCity'];
$empState=$row['empState'];
$empZipcode=$row['empZipcode'];
$empPhone= $row['empPhone'];
$empGender= $row['empGender'];
$empRaces= $row['empRaces'];
$employeeRole=$row['employeeRole'];
$userPassword=$row['userPassword'];
$programMember=$row['programMember'];


?>

<!--Participant information-->
<div class="d-flex flex-column align-items-center mx-5">
              <div class="d-flex justify-center">
                 <div id="employee_Info" style="width: 1000px; height:auto; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse show">
                        <div  class="row mx-3 my-2">
                            <div class="col-3 fw-bold">ID</div>
                            <div class="col-6 text-center"><?php echo $employeeID?></div>
                            <div class="col-1 ms-5">
                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#employee_edit,#employee_Info">Edit</a>
                            </div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">First Name</div>
                            <div class="col-7"><?php echo $empfname?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Last Name</div>
                            <div class="col-7"><?php echo $emplname?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Middle Name (MI)</div>
                            <div class="col-7"><?php echo $empMI?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Email</div>
                            <div class="col-7"><?php echo $email?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Date of Birth</div>
                            <div class="col-7"><?php echo $empDOB?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Street</div>
                            <div class="col-7"><?php echo $empStreet?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">City</div>
                            <div class="col-7"><?php echo $empCity?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">State</div>
                            <div class="col-7"><?php echo $empState?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Zip Code</div>
                            <div class="col-7"><?php echo $empZipcode?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Phone</div>
                            <div class="col-7"><?php echo $empPhone?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Gender</div>
                            <div class="col-7"><?php echo $empGender?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Race</div>
                            <div class="col-7"><?php echo $empRaces?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Role</div>
                            <div class="col-7"><?php echo $employeeRole?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Password</div>
                            <div class="col-7"><?php echo $userPassword?></div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Program Member</div>
                            <div class="col-7"><?php echo $programMember?></div>
                        </div>
                    </div>
                     <!-- employee information Edit-->
                     <div id="employee_edit" style="width: 1000px ; height:auto; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse">
                        <form method="POST" action="includes/saveEmployeePersonalInformation.inc.php">
                            <div class="row mx-3 my-2">
                                <div class="col-3 fw-bold">ID</div>
                                <div class="col-6 text-center"><?php echo $employeeID?></div>
                                <div class="col-1 ms-5">
                                    <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#employee_Info,#employee_edit">Save</button>
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">First Name</div>
                                <div class="col-7">
                                    <input type="text" name="empfname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empfname?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Last Name</div>
                                <div class="col-7">
                                    <input type="text" name="emplname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $emplname?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Middle Name (MI)</div>
                                <div class="col-7">
                                    <input type="text" name="empMI" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empMI?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Email</div>
                                <div class="col-7">
                                    <input type="email" name="email" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $email?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Date of Birth</div>
                                <div class="col-7">
                                    <input type="date" name="empDOB" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empDOB?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Street</div>
                                <div class="col-7">
                                    <input type="text" name="empStreet" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empStreet?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">City</div>
                                <div class="col-7">
                                    <input type="text" name="empCity" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empCity?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">State</div>
                                <div class="col-7">
                                    <input type="text" name="empState" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empState?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Zip Code</div>
                                <div class="col-7">
                                    <input type="text" name="empZipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empZipcode?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Phone</div>
                                <div class="col-7">
                                    <input type="text" name="empPhone" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empPhone?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Gender</div>
                                <div class="col-7">
                                    <input type="text" name="empGender" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empGender?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Race</div>
                                <div class="col-7">
                                    <input type="text" name="empRaces" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $empRaces?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Role</div>
                                <div class="col-7">
                                    <input type="text" name="employeeRole" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $employeeRole?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Password</div>
                                <div class="col-7">
                                    <input type="text" name="userPassword" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $userPassword?>">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Program Member</div>
                                <div class="col-7">
                                    <input type="text" name="programMember" id="" class="input-underline bg-lightBlue" style="width:75%;" value="<?php echo $programMember?>">
                                </div>
                            </div>
                         </form>
                      </div>
                </div>
              </div>
            </div>


