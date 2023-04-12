<?php

// Start session and check if employee is logged in
if (!isset($_SESSION['employeeID'])) {
     //if error, force a logout
     session_unset();
     session_destroy();
    //Redirect user to login page if not logged in
    header("Location: ./LoginAd.php");
    exit();
}

//connect to database
require_once ('includes/dbh.inc.php');

// Get the employee ID from the session variable
$employeeID = $_SESSION['employeeID'];

// Prepare the query
$query = "SELECT empfname, emplname
          FROM employee
          WHERE employeeID = ?";

// Create a prepared statement
$stmt = $conn->prepare($query);

// Bind the parameter to the statement
$stmt->bind_param("i", $employeeID);

// Execute the statement
$stmt->execute();
// Get the results
$result = $stmt->get_result();

// Display some personal information from the database tables using php
                    // Fetch the data
                    while($row=mysqli_fetch_assoc($result)) {
                        // data from 'Employee' table
                        $empId= $row['employeeID'];
                        $empfname= $row['empfname'];
                        $emplname= $row['emplname'];
?>

<div class="d-flex flex-column flex-shrink-1 align-items-center bg-lightBlue w-300" id="sideBar">
        <div>
            <ul class="nav nav-tabs flex-column align-items-center text-center">
                <?php
                    echo "<h6><br>$empfname $emplname<br>ID: $empId</h6>";
                ?>
                <li class="nav-item bg-Blue mb-md-1 mt-1">
                    <a href="employeeDash.php" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>
                    <li class="nav-item bg-Blue mb-md-1">
                        <a href="./employeePersonalInformationView.php" class="nav-link text-white">
                          Personal Information
                        </a>
                      </li>
                      <li class="nav-item bg-Blue mb-md-1">
                        <a href="reportActivity.php" class="nav-link text-white">
                          Report Activity
                        </a>
                      </li>
					  <li class="nav-item bg-Blue mb-md-1">
                        <a href="searchOption.php" class="nav-link text-white">
                          Participant Report
                        </a>
                      </li>
					  
                  </ul>
            </div>
        </div>
<?php
    }
?>