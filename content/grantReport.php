<?php
function grantReportRequired() {
  $estGrantForm = document.getElementById('estGrantForm').value;
  if (estGrantForm == null) {
    document.getElementById('grantId').required == true;
    document.getElementById('startDate').required == true;
    document.getElementById('endDate').required == true;
    document.getElementById('grantName').required == true;
    document.getElementById('suppOrg').required == true;
    document.getElementById('numOfChar').required == true;
  } else {
    document.getElementById('grantId').required == false;
    document.getElementById('startDate').required == false;
    document.getElementById('endDate').required == false;
    document.getElementById('grantName').required == false;
    document.getElementById('suppOrg').required == false;
    document.getElementById('numOfChar').required == false;
  }
}

function grantCharterRequired() {
  $charLocation = document.getElementById('charLocation').value;
  $userStatusString = document.getElementById('userStatusString').value;
  if (charLocation == null) {
    document.getElementById('charTitle').required == true;
  } else {
    document.getElementById('charTitle').required == false;
  }

  if (userStatusString == null) {
    document.getElementById('userStatusNum').required == true;
  } else {
    document.getElementById('userStatusNum').required == false;
  }
}
?>

<div class="container-fluid">
  <div id="grantReport1" style="transition: 1ms" class="collapse show">

    <h5 class="d-flex justify-content-center text-info mb-5">Grant Report</h5>

    <h6>Pre-established Grant Form? </h6>
    <input type="text" name="estGrantForm" id="estGrantForm" class="input-underline" placeholder="Your answer">

    <div class="col-6 my-3">
      <button class="btn btn-info btn-shadow my-3 " type="submit">Next</button>
    </div>

    <h6 class="mt-5">Basic Info (Required if not above)</h6>

    <h6 class="mt-5">Grant ID <span class="text-danger">*</span></h6>
    <input type="text" name="grantId" id="grantId" class="input-underline" placeholder="Your answer" onchange="grantReportRequired();">

    <h6 class="mt-5">Start Date <span class="text-danger">*</span></h6>
    <input type="date" name="startDate" id="startDate" class="input-underline" placeholder="" onchange="grantReportRequired();">

    <h6 class="mt-5">End Date <span class="text-danger">*</span></h6>
    <input type="date" name="endDate" id="endDate" class="input-underline" placeholder="" onchange="grantReportRequired();">

    <h6 class="mt-5">Grant Name <span class="text-danger">*</span></h6>
    <input type="text" name="grantName" id="grantName" class="input-underline" placeholder="Your answer" onchange="grantReportRequired();">

    <h6 class="mt-5">Support Organization <span class="text-danger">*</span></h6>
    <input type="text" name="suppOrg" id="suppOrg" class="input-underline" placeholder="Your answer" onchange="grantReportRequired();">

    <h6 class="mt-5">Number of Characters <span class="text-danger">*</span></h6>
    <input type="text" name="numOfChar" id="numOfChar" class="input-underline" placeholder="Your answer" onchange="grantReportRequired();">

    <div class="col-6 my-3">
      <button type="button" data-bs-toggle="collapse" data-bs-target="#grantReport2,#grantReport1" class="btn btn-info btn-shadow my-3">Next</button>
    </div>
  </div>

  <div id="grantReport2" style="transition: 1ms" class="collapse">
  <h5 class="d-flex justify-content-center text-info mb-5">Grant Charter</h5>

  <h6 class="mt-5">Charter located? <span class="text-danger">*</span></h6>
  <select class="form-select-SM border rounded-2" name="charLocation" id="charLocation">
		<option value="" disabled selected hidden>Choose</option>
      <option value="charLocation1">Test 1⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀</option><!--Made to look invisible-->
      <option value="charLocation2">Test 2⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀</option><!--so that everything is uniform-->
  </select>

  <h6 class="mt-5">Charter Title (Required if not above) <span class="text-danger">*</span></h6>
  <input type="text" name="charTitle" id="charTitle" class="input-underline" placeholder="Your answer" onchange="grantCharterRequired();">

  <h6 class="mt-5">Record user status pertaining to Charter <span class="text-danger">*</span></h6>
  <input type="text" name="userStatusString" id="userStatusString" class="input-underline" placeholder="Your answer in string">
  <h6 class="my-3">or </h6>
  <input type="text" name="userStatusNum" id="userStatusNum" class="input-underline" placeholder="Your answer in numbers" onchange="grantCharterRequired();">

  <div class="col-6 my-3">
      <button class="btn btn-info btn-shadow my-3 " type="submit">Next</button>
    </div>
</div>
