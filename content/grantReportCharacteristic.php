<?php
    session_start();
    require 'includes/dbh.inc.php';

    if(isset($_SESSION['userID']) || isset($_SESSION['adminLogin']) || isset($_SESSION['email'])){
        
        $stmt = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE email=?;");
		$stmt ->bind_param("s",$_SESSION['email']);
		if(!$stmt ->execute()){
			session_unset();
            session_destroy();
            header ("Location: ./loginAd.php?error=sqlerror");
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
            header ("Location: ./loginAd.php?error=NoUserEmail");
            exit();
        }

        $stmt ->close();

        if($_SESSION['adminLogin'] !== $employeeID){
            session_unset();
            session_destroy();
            header ("Location: ./loginAd.php?error=Not_Logged_In");
            exit();
        }
  }
  else{
      //if error, force a logout
      session_unset();
      session_destroy();
      header ("Location: ./loginAd.php?error=Not_Logged_In");
      exit();
  }
?>


<div class="container-fluid">
    <form action="includes/char_grant.inc.php" method="post">

    <h5 class="d-flex justify-content-center text-info mb-5">Grant Characteristic Page</h5>

    <h6 class="mt-5">Characteristic Title <span class="text-danger">*</span></h6>
    <input type="text" name="char_title" id="char_title" class="input-underline" placeholder="Your answer" >

    <h6 class="mt-5">Choose Between Established Status or New Data</h6>

    <h6 class="mt-5">(Established) Please choose from the characteristic list and select best characteristic that that fits the title you provided. <span class="text-danger">*</span></h6>
    <select class="form-select-SM border rounded-2" name="pre_status" id="pre_status" >
				        <option value="" disabled selected hidden>Choose</option>
                        <option value="1">Date of Birth</option>
                        <option value="2">Gender</option>
                        <option value="3">Primary Phone Number</option>
                        <option value="4">Email</option>
                        <option value="5">Street</option>
                        <option value="6">City</option>
                        <option value="7">State</option>
                        <option value="8">Zipcode</option>
                        <option value="9">Country</option>
                        <option value="10">Mailing Street</option>
                        <option value="11">Mailing City</option>
                        <option value="12">Mailing State</option>
                        <option value="13">Mailing Zipcode</option>
                        <option value="14">Mailing Country</option>
                        <option value="15">US Citizenship Status</option>
                        <option value="16">Alien Registration Code</option>
                        <option value="17">Alient Registration Code Expiration Date</option>
                        <option value="18">Hispanic Heritage</option>
                        <option value="19">Disability (Y/N)</option>
                        <option value="20">Primary Language</option>
                        <option value="21">English Proficiency</option>
                        <option value="22">High School Status</option>
                        <option value="23">High School Diploma or Equivalent</option>
                        <option value="24">Highest Grade Completed</option>
                        <option value="25">In School Status</option>
                        <option value="26">Current Military Or Veteran Status</option>
                        <option value="27">Miliary Spouse</option>
                        <option value="28">Selective Service</option>
                        <option value="29">Employment Status</option>
                        <option value="30">Pay Rate</option>
                        <option value="31">Unemployment Insurance Status</option>
                        <option value="32">Unemployment Weeks</option>
                        <option value="33">Farmworker 12 Months</option>
                        <option value="34">Has any Previous Technical Experience</option>
                        <option value="35">Been Supported through the State's Foster Care System</option>
                        <option value="36">Receiving services from Adult Education (WIOA Title II)</option>
                        <option value="37">Receiving Services from Youth Build</option>
                        <option value="38">Youth Build Grant Number</option>
                        <option value="39">Receiving Services from Job Corps</option>
                        <option value="40">Receiving Services from Vocational Education (Carl Perkins)</option>
                        <option value="41">Temporary Assistance for Needy Families (TANF) Recipient</option>
                        <option value="42">Supplemental Security Income (SSI) Recipient</option>
                        <option value="43">General Assitance Recipient</option>
                        <option value="44">Supplemental Nutrition Assistance Program (SNAP) Recipient (Cal Fresh)</option>
                        <option value="45">Refugee Cash Assistance (RCA) Recipient</option>
                        <option value="46">Social Security Disability Insurance (SSDI) Recipient</option>
                        <option value="47">Receiving Services under SNAP Employment and Training Program</option>
                        <option value="48">Receiving, or Has Been Notified Will Receive, Pell Grant</option>
                        <option value="49">Ticket-to-Work Holder issued by Social Security Administration</option>
                        <option value="50">Homeless Status</option>
                        <option value="51">EX-Offender</option>
                        <option value="52">Displaced Homemaker</option>
                        <option value="53">Single Parent (including single pregnant women)</option>
                        <option value="54">Cultural Barriers</option>
                        <option value="55">Family Size</option>
                        <option value="56">Annualized Family Income (last 6 months X2)</option>
                        <option value="57">Type of Disability</option>
                        <option value="58">African American/Black</option>
                        <option value="59">American Indian/Alaskan Native</option>
                        <option value="60">Asian</option>
                        <option value="61">Hawaiian/Other Pacific Islander</option>
                        <option value="62">White</option>
                        <option value="63">Did Not Wish to Answer (Ethncity)</option>
    </select>

    <h6 class="mt-5">(New) Characteristic Status<span class="text-danger">*</span></h6>
    <input type="text" name="char_status" id="char_status" class="input-underline" placeholder="Your answer" >

    <div class="col-6 my-3">
      <button type="submit" name="grant-characteristic-submit" class="btn btn-info btn-shadow my-3">Next</button>
    </div>

    </form>
  </div>