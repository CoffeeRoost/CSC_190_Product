<?php

//Checks to see which name of employee is selected
$sql = "SELECT * FROM employee WHERE employeeID = '$employeeID'"; //*****Modify this so to select an employee********
$result = mysqli_query($conn, $sql);

//Checks to see if name matches on database
if (mysqli_num_rows($result) > 0) {
	//Retrieve the data of employee 

    //<-- Demographic Information -->
	$row = mysqli_fetch_assoc($result);
    $employee_id = $row["employeeID"];
    $first_name = $row["empfname"];
    $middle_name = $row["empMI"];
    $last_name = $row["emplname"];
    $date_of_birth = $row["empDOB"];
    $gender = $row["empGender"];
    $race = $row["empRaces"];

    //<-- Address -->
    $street = $row["empStreet"];
    $city = $row["empCity"];
    $country = $row["empCountry"];
    $state = $row["empState"];
    $zipcode = $row["empZipcode"];
    $phone = $row["empPhone"];
    $email = $row["email"];

    //<-- Role and Program Member -->
    $role = $row["employeeRole"];
    $programMember = $row["programMember"];

} else {
    echo "Employee not found.";
}

?>