<?php
  session_start();
  if(!isset($_SESSION['adminLogin'])){
    //if error, force a logout
    session_unset();
    session_destroy();
    header ("Location: ./LoginAd.php");
    exit();
  }
?>
<div class="container-fluid">
  <form action="./includes/addEmployee.inc.php" method="post">
    <h5 class="d-flex justify-content-center text-info mb-5">EMPLOYEE INFORMATION</h5>

    <h6 class="mt-5">First Name <span class="text-danger">*</span></h6>
    <input type="text" name="empfname" id="empfname" class="input-underline" placeholder="Employee First Name" required>

    <h6 class="mt-5">Middle Name</h6>
    <input type="text" name="empMI" id="empMI" class="input-underline" placeholder="Employee Middle Name">

    <h6 class="mt-5">Last Name <span class="text-danger">*</span></h6>
    <input type="text" name="emplname" id="emplname" class="input-underline" placeholder="Employee Last Name" required>

    <h6 class="mt-5"> Date of Birth <span class="text-danger">*</span></h6>
    <input type="date" name="empDOB" id="empDOB" class="input-underline" placeholder="" required>

    <h6 class="mt-5">Street Address <span class="text-danger">*</span></h6>
    <input type="text" name="empstreet" id="empstreet" class="input-underline" placeholder="street Address" required>

    <h6 class="mt-5">City <span class="text-danger">*</span></h6>
    <input type="text" name="empCity" id="empCity" class="input-underline" placeholder="city" required>

    <h6 class="mt-5">County <span class="text-danger">*</span></h6>
    <input type="text" name="empCounty" id="empCounty" class="input-underline" placeholder="County" required>

    <h6 class="mt-5">State<span class="text-danger">*</span></h6>
    <select class="form-select-SM border rounded-2" name="empState" id="empState" required>
      <option value="" selected disabled>Select a state</option>
      <option value="Alabama">Alabama</option>
      <option value="Alaska">Alaska</option>
      <option value="Arizona">Arizona</option>
      <option value="Arkansas">Arkansas</option>
      <option value="California">California</option>
      <option value="Colorado">Colorado</option>
      <option value="Connecticut">Connecticut</option>
      <option value="Delaware">Delaware</option>
      <option value="District of Columbia">District of Columbia</option>
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
    
    <h6 class="mt-5"> Zip Code<span class="text-danger">*</span></h6>
    <input type="text" name="empZipCode" id="empZipCode" class="input-underline" placeholder="zip code" required>
    
    <h6 class="mt-5">Phone Number<span class="text-danger">*</span></h6>
    <input type="tel" name="empPhone" id="empPhone" class="input-underline" placeholder="phone number" required>

    <h6 class="mt-5">Email<span class="text-danger">*</span></h6>
    <input type="email" name="email" id="email" class="input-underline" placeholder="email" required>

    <h6 class="mt-5">Gender<span class="text-danger">*</span></h6>
    <select class="form-select-SM border rounded-2" name="empGender" id="empGender" required>
        <option value="" selected disabled>Select your gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="non-binary">Non-binary</option>
        <option value="transgender">Transgender</option>
        <option value="genderqueer">Genderqueer</option>
        <option value="agender">Agender</option>
        <option value="two-spirit">Two-spirit</option>
        <option value="notSay">Prefer not to say</option>
    </select>

    <h6 class="mt-5">Employee Ethnicity<span class="text-danger">*</span></h6>
    <select class="form-select-SM border rounded-2" name="empEthnicity" id="empEthnicity" required>
        <option value="" selected disabled>Select an employee ethnicity</option>
        <option value="Asian">Asian</option>
        <option value="Black">Black</option>
        <option value="Hispanic">Hispanic</option>
        <option value="Native American">Native American</option>
        <option value="White">White</option>
        <option value="Other">Other</option>
    </select>


    <h6 class="mt-5">Employee Role<span class="text-danger">*</span></h6>
    <select class="form-select-SM border rounded-2" name="empRole" id="empRole" required>
        <option value="" selected disabled>Select an employee role</option>
        <option value="manager">Manager</option>
        <option value="supervisor">Supervisor</option>
        <option value="developer">Developer</option>
        <option value="designer">Designer</option>
        <option value="administrator">Administrator</option>
        <option value="admin">Administrator (System Admin)*</option>
        <option value="analyst">Analyst</option>
        <option value="consultant">Consultant</option>
        <option value="salesperson">Salesperson</option>
        <option value="customer-service-rep">Customer Service Representative</option>
    </select>

    <h6 class="mt-5">Program Member<span class="text-danger">*</span></h6>
    <select class="form-select-SM border rounded-2" name="programMember" id="programMember" required>
        <option value="" disabled selected hidden>Choose</option>
        <option value="Friend and Family">Friend and Family</option>
        <option value="Hiring Event or Career Fair">Hiring Event or Career Fair</option>
        <option value="Wonmen's Empowerment">Women's Empowerment</option>
        <option value="Next Move">Next Move</option>
        <option value="Waking the Village">Waking the Village</option>
        <option value="Saint John's">Saint John's</option>
        <option value="La Familia">La Familia</option>
        <option value="GS Urban League">GS Urban League</option>
        <option value="Asian Resources">Asian Resources</option>
        <option value="Folsom Cordova">Folsom Cordova CP</option>
        <option value="Lemon Hill">Lemon Hill</option>
        <option value="Sac Job Corp">Sac Job Corp</option>
        <option value="Public/Aura Planning">Public/Aura Planning</option>
        <option value="International Rescue Committee Sacramento">International Rescue Committee Sacramento</option>
        <option value="Community Resource Project">Community Resource Project</option>
        <option value="Fellowship">Fellowship</option>
        <option value="Other">Other</option>
    </select>
    
    <h6 class="mt-5"> Password <span class="text-danger">*</span></h6>
    <input type="password" name="userPassword" id="userPassword" class="input-underline" placeholder="Password" required>
    
    <h6 class="mt-5"> Confirm Password <span class="text-danger">*</span></h6>
    <input type="password" name="confirmPassword" id="confirmPassword" class="input-underline" placeholder="Confirm Password" required>
    
      <div class="col-6 my-5">
        <button name="add-employee" type = "submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>
