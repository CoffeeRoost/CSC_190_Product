<?php
function required() {
  $estgrantId = document.getElementById('estGrantId').value;
  if (estgrantId != null) {
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
?>

<div class="container-fluid">
    <h5 class="d-flex justify-content-center text-info mb-5">Grant Report</h5>

    <h6>Pre-established Grant ID? <span class="text-danger">*</span></h6>
    <input type="text" name="estGrantId" id="estGrantId" class="input-underline" placeholder="Your answer">

    <h6 class="mt-5">Basic Info (Required if not above)</h6>

    <h6 class="mt-5">Grant ID <span class="text-danger">*</span></h6>
    <input type="text" name="grantId" id="grantId" class="input-underline" placeholder="Your answer" onchange="required();">

    <h6 class="mt-5">Start Date <span class="text-danger">*</span></h6>
    <input type="date" name="startDate" id="startDate" class="input-underline" placeholder="" onchange="required();">

    <h6 class="mt-5">End Date <span class="text-danger">*</span></h6>
    <input type="date" name="endDate" id="endDate" class="input-underline" placeholder="" onchange="required();">

    <h6 class="mt-5">Grant Name <span class="text-danger">*</span></h6>
    <input type="text" name="grantName" id="grantName" class="input-underline" placeholder="Your answer" onchange="required();">

    <h6 class="mt-5">Support Organization <span class="text-danger">*</span></h6>
    <input type="text" name="suppOrg" id="suppOrg" class="input-underline" placeholder="Your answer" onchange="required();">

    <h6 class="mt-5">Number of Characters <span class="text-danger">*</span></h6>
    <input type="text" name="numOfChar" id="numOfChar" class="input-underline" placeholder="Your answer" onchange="required();">

    <div class="col-6 my-3">
      <button class="btn btn-info btn-shadow my-3 " type="submit">Next</button>

    </div>


</div>
