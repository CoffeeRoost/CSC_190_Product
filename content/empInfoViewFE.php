
<?php
        /*Secure session*/
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
        <!--Demographic Information Section-->
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
                                        <div class="col-4 fw-bold">Race</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewRaces']?></div>
                                </div>
                                
                        </div>


        <!--Demographic Information Edit Section-->
                        <div id ="empNameEdit" style="transition:1ms;" class ="collapse collapse">
                                <div  class="row my-2">
                                        <div class="col-4 fw-bold">ID</div>
                                        <div class="col-7"><?php echo $_SESSION['empViewID']?></div>

                                        <div class="col-1 text-end">
                                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empNameEdit,#empNameShow">Submit</a>
                                        </div>
                                </div>
                                <form method="POST" action="#">
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
                                                        <input type="text" name="empGender" class="col input-underline" value ="<?php echo $_SESSION['empViewGender']?>">
                                                </div>       
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Race</div>
                                                <div class="col-7">
                                                        <input type="text" name="empRaces" class="col input-underline" value ="<?php echo $_SESSION['empViewRaces']?>">
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

        <!--Address Edit Section-->
                        <div id ="empAddressEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="POST" action="#">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Street</div>
                                                <div class="col-7">
                                                        <input type="text" name="empStreet" class="col input-underline" value ="<?php echo $_SESSION['empViewStreet']?>">
                                                </div> 

                                                <div class="col-1 text-end">
                                                        <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empAddressEdit,#empAddressShow">Submit</a>
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
                                                        <option value="Alabama">Alabama</option>
                                                        <option value="Alaska">Alaska</option>
                                                        <option value="Arizona">Arizona</option>
                                                        <option value="Arkansas">Arkansas</option>
                                                        <option value="California">California</option>
                                                        <option value="Colorado">Colorado</option>
                                                        <option value="Connecticut">Connecticut</option>
                                                        <option value="Delaware">Delaware</option>
                                                        <option value="Florida">Florida</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Hawaii">Hawaii</option>
                                                        <option value="Idaho">Idaho</option>
                                                        <option value="Illinois">Illinois</option>
                                                        <option value="Indiana">Indiana</option>
                                                        <option value="Iowa">Iowa</option>
                                                        <option value="Kansas">Kansas</option>
                                                        <option value="Kentucky">Kentucky</option>
                                                        <option value="Louisiana">Louisiana</option>
                                                        <option value="Maine">Maine</option>
                                                        <option value="Maryland">Maryland</option>
                                                        <option value="Massachusetts">Massachusetts</option>
                                                        <option value="Michigan">Michigan</option>
                                                        <option value="Minnesota">Minnesota</option>
                                                        <option value="Mississippi">Mississippi</option>
                                                        <option value="Missouri">Missouri</option>
                                                        <option value="Montana">Montana</option>
                                                        <option value="Nebraska">Nebraska</option>
                                                        <option value="Nevada">Nevada</option>
                                                        <option value="New Hampshire">New Hampshire</option>
                                                        <option value="New Jersey">New Jersey</option>
                                                        <option value="New Mexico">New Mexico</option>
                                                        <option value="New York">New York</option>
                                                        <option value="North Carolina">North Carolina</option>
                                                        <option value="North Dakota">North Dakota</option>
                                                        <option value="Ohio">Ohio</option>
                                                        <option value="Oklahoma">Oklahoma</option>
                                                        <option value="Oregon">Oregon</option>
                                                        <option value="Pennsylvania">Pennsylvania</option>
                                                        <option value="Rhode Island">Rhode Island</option>
                                                        <option value="South Carolina">South Carolina</option>
                                                        <option value="South Dakota">South Dakota</option>
                                                        <option value="Tennessee">Tennessee</option>
                                                        <option value="Texas">Texas</option>
                                                        <option value="Utah">Utah</option>
                                                        <option value="Vermont">Vermont</option>
                                                        <option value="Virginia">Virginia</option>
                                                        <option value="Washington">Washington</option>
                                                        <option value="West Virginia">West Virginia</option>
                                                        <option value="Wisconsin">Wisconsin</option>
                                                        <option value="Wyoming">Wyoming</option>
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

        <!--Role and Program Member Section-->
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

        <!--Role and Program Member Edit Section-->
                        <div id ="empRoleEdit" style="transition:1ms;" class ="collapse collapse">
                                <form method="post" action="#">
                                        <div  class="row my-2">
                                                <div class="col-4 fw-bold">Role</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="empRole" id="empRole">
                                                                <option value="Manager">Manager</option>
                                                                <option value="Supervisor">Supervisor</option>
                                                                <option value="Developer">Developer</option>
                                                                <option value="Designer">Designer</option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Admin">Administrator (System Admin)*</option>
                                                                <option value="Analyst">Analyst</option>
                                                                <option value="Consultant">Consultant</option>
                                                                <option value="Salesperson">Salesperson</option>
                                                                <option value="Customer Service Representative">Customer Service Representative</option>
                                                        </select>
                                                </div>

                                                <div class="col-1 text-end">
                                                        <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#empRoleEdit,#empRoleShow">Submit</a>
                                                </div>
                                        </div>

                                        <div  class="row mb-2">
                                                <div class="col-4 fw-bold">Program Member</div>
                                                <div class="col-7">
                                                        <select class="form-select-SM border rounded-2" name="programMember" id="programMember">
                                                                <option value="" disabled selected hidden>Choose</option>
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
                                                                <option value="Customer Service Representative">Customer Service Representative</option>
                                                        </select>
                                                </div>
                                        </div>
                                </form>
                        </div>

                </fieldset>
        </div>

        <div class = "row">
                <div class= "col">
                        <a href="./Administration1-3.php" class="btn text-white">Back</a>
                </div>
                
                <div class="col text-end">
                        <button class="btn bg-success text-white">Deactivate</button>
                        <button class="btn bg-danger text-white">Delete</button>
                </div>
        </div>
        
</div>