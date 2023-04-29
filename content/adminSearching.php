<?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }

        if (!isset($_SESSION['adminLogin'])){
             //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php");
            exit();
        }
    require 'includes/dbh.inc.php';

?>

<div class = "container-fluid">
    <form method="POST" action="./includes/adminSearchBE.php">
        <div class="mb-5">
            <fieldset class="border rounded-3 p-3">
                    <div  class="row my-2">
                        <div class="col-4 fw-bold">Search for</div>
                        <div class="col-7">
                                <select class="form-select-SM border rounded-2" style ="width:65%;" name="SearchingRole" id="SearchingRole">
                                    <option class = "text-center" value ="employee">Employee</option>
                                    <option class = "text-center" value ="client">Client</option>
                                </select>
                        </div>
                    </div>
            </fieldset>
        </div>

        <div class="mb-5">
             <fieldset class="border rounded-3 p-3">
                    <div  class="row my-2">
                        <div class="col-2 fw-bold">ID number</div>
                        <div class="col-7">
                                <input type="number" name="searchID" class="col input-underline" placeholder="ID number" >
                        </div>
                    </div>
            </fieldset>  
        </div>

        <div class="mb-5">
             <fieldset class="border rounded-3 p-3">
                <legend class="float-none w-auto px-3">Names</legend>
                    <div  class="row my-2">
                        <div class="col-2 fw-bold">First Name</div>
                        <div class="col-4">
                                <input type="text" name="searchFname" class="col input-underline"
                                style ="width:65%;" placeholder="First Name" >
                        </div>

                        <div class="col-2 fw-bold">Middle Name</div>
                        <div class="col-4">
                                <input type="text" name="searchMI" class="col input-underline" style ="width:65%;" placeholder="Middle Name" >
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-2 fw-bold">Last Name</div>
                        <div class="col-4">
                                <input type="text" name="searchLname" class="col input-underline" style ="width:65%;" placeholder="Last Name" >
                        </div>
                    </div>
            </fieldset>  
        </div>

        <div class="mb-5">
             <fieldset class="border rounded-3 p-3">
                <legend class="float-none w-auto px-3">Address</legend>
                    <div  class="row my-2">
                        <div class="col-2 fw-bold">Street</div>
                        <div class="col-7">
                                <input type="text" name="searchStreet" class="col input-underline" style ="width:65%;" placeholder="Street" >
                        </div>
                    </div>

                    <div  class="row my-2">
                        <div class="col-2 fw-bold">City</div>
                        <div class="col-4">
                                <input type="text" name="searchCity" class="col input-underline" style ="width:65%;" placeholder="City" >
                        </div>

                        <div class="col-2 fw-bold">County</div>
                        <div class="col-4">
                                <input type="text" name="searchCounty" class="col input-underline" style ="width:65%;" placeholder="County" >
                        </div>   
                    </div>

                    <div class="row my-2">
                    <div class="col-2 fw-bold">State</div>
                        <div class="col-4">
                            <select class="form-select-SM border rounded-2" style ="width:65%;" name="searchState">
                                <option value="" disabled selected hidden>Choose</option>
                                <option value="Alabama">AL</option>
                                <option value="Alaska">AK</option>
                                <option value="Arizona">AZ</option>
                                <option value="Arkansas">AR</option>
                                <option value="California">CA</option>
                                <option value="Colorado">CO</option>
                                <option value="Connecticut">CT</option>
                                <option value="Delaware">DE</option>
                                <option value="District of Columbia">DC</option>
                                <option value="Florida">FL</option>
                                <option value="Georgia">GA</option>
                                <option value="Hawaii">HI</option>
                                <option value="Idaho">ID</option>
                                <option value="Illinois">IL</option>
                                <option value="Indiana">IN</option>
                                <option value="Iowa">IA</option>
                                <option value="Kansas">KS</option>
                                <option value="Kentucky">KY</option>
                                <option value="Louisiana">LA</option>
                                <option value="Maine">ME</option>
                                <option value="Maryland">MD</option>
                                <option value="Massachusetts">MA</option>
                                <option value="Michigan">MI</option>
                                <option value="Minnesota">MN</option>
                                <option value="Mississippi">MS</option>
                                <option value="Missouri">MO</option>
                                <option value="Montana">MT</option>
                                <option value="Nebraska">NE</option>
                                <option value="Nevada">NV</option>
                                <option value="New Hampshire">NH</option>
                                <option value="New Jersey">NJ</option>
                                <option value="New Mexico">NM</option>
                                <option value="New York">NY</option>
                                <option value="North Carolina">NC</option>
                                <option value="North Dakota">ND</option>
                                <option value="Ohio">OH</option>
                                <option value="Oklahoma">OK</option>
                                <option value="Oregon">OR</option>
                                <option value="Pennsylvania">PA</option>
                                <option value="Rhode Island">RI</option>
                                <option value="South Carolina">SC</option>
                                <option value="South Dakota">SD</option>
                                <option value="Tennessee">TN</option>
                                <option value="Texas">TX</option>
                                <option value="Utah">UT</option>
                                <option value="Vermont">VT</option>
                                <option value="Virginia">VA</option>
                                <option value="Washington">WA</option>
                                <option value="West Virginia">WV</option>
                                <option value="Wisconsin">WI</option>
                                <option value="Wyoming">WY</option>
                            </select>
                        </div>

                        <div class="col-2 fw-bold">Code</div>
                        <div class="col-4">
                                <input type="text" name="searchZip" class="col input-underline" style ="width:65%;" placeholder="Zip Code" >
                        </div>
                    </div>

                    <div  class="row my-2">
                        <div class="col-2 fw-bold">Phone</div>
                        <div class="col-7">
                                <input type="text" name="searchPhone" class="col input-underline" style ="width:65%;" placeholder="Phone number" >
                        </div>
                    </div>

                    <div  class="row my-2">
                        <div class="col-2 fw-bold">Email</div>
                        <div class="col-7">
                                <input type="email" name="searchEmail" class="col input-underline" style ="width:65%;" placeholder="Email" >
                        </div>
                    </div>
            </fieldset>  
        </div>

        <div class="mb-5">
             <fieldset class="border rounded-3 p-3">
                <legend class="float-none w-auto px-3">Other</legend>
                    <div  class="row my-2">
                        <div class="col-2 fw-bold">Races</div>
                        <div class="col-4">
                                <input type="text" name="searchRace" class="col input-underline"
                                style ="width:65%;" placeholder="Races" >
                        </div>

                        <div class="col-2 fw-bold">Gender</div>
                        <div class="col-4">
                                <input type="text" name="searchGender" class="col input-underline" style ="width:65%;" placeholder="Gender" >
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-2 fw-bold">Program Member</div>
                        <div class="col-7">
                            <select class="form-select-SM border rounded-2" name="searchProgramMember" id="programMember">
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
                                <option value="International Rescue Committee Sacramento">International Rescue Committee Sacramento</option>
                                <option value="Community Resource Project">Community Resource Project</option>
                                <option value="Fellowship">Fellowship</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
            </fieldset>  
        </div>       
        <div class="row">
                <div class="col text-end">
                    <a href="./Administration1-3.php" class="btn text-white">Back</a>
                    <button name="Searching" id="Searching" type = "submit" class="btn btn-primary">Search</button>
                </div>
        </div>
    </form> 
</div>