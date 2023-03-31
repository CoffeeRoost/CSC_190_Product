<?php

// Get search query from form data
$searchTerm  = isset($_GET['searchResult']) ? '%' . $_GET['searchResult'] . '%' : '';

?>
<div class="d-flex">
    <div class="d-flex flex-column align-items-center mx-5">
        <div class="d-flex m-5 border border-info rounded-pill w-search-cover">
            <img src="./image/seachIcon.png" alt="search icon" class="search-icon m-2" onclick="submitSearch()">
            <form id="searchForm" class="my-1"  action="" method="GET">
                <input type="text" placeholder="Search Client" name="searchResult" class="w-search-bar m-1">
            </form>
        </div>
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column me-5 my-5">
                <div class="header-client">
                    <h3 class="fw-bold text-center text-Blue my-1">New Client</h3>
                </div>
                <div class="box-client text-center overflow-scroll">
                    <?php
                        /* Display information of new client. New Clients have not been coach*/

                        $newClient = "SELECT P.userID, P.fname, P.lname, P.email, P.DOB, P.primaryPhone,
                        Addr.street, Addr.city, Addr.state, Addr.zipcode,
                        Emp.desiredJobTitle
                        FROM PARTICIPATION
                        AS P
                        LEFT JOIN ADDRESS AS Addr
                        ON P.userID = Addr.userID
                        LEFT JOIN EMPLOYMENT AS Emp
                        ON P.userID = Emp.userID
                        WHERE P.userID NOT IN (SELECT co.userID FROM COACH AS co)
                        AND ((P.fname LIKE '%$searchTerm%' OR P.lname LIKE '%$searchTerm%') OR CONCAT(P.fname, ' ', P.lname) LIKE '%$searchTerm%' OR P.userID LIKE '%$searchTerm%'
                        OR P.email LIKE '%$searchTerm%' OR  P.DOB LIKE '%$searchTerm%' OR  P.primaryPhone LIKE '%$searchTerm%'
                        OR Addr.street LIKE '%$searchTerm%'OR Addr.city LIKE '%$searchTerm%' OR Addr.state LIKE '%$searchTerm%'
                        OR Addr.zipcode LIKE '%$searchTerm%'
                        OR Emp.desiredJobTitle LIKE '%$searchTerm%' );";

                        $newClientList = mysqli_query($conn, $newClient);
                        $newClientResult = mysqli_num_rows($newClientList);

                        if($newClientResult > 0){
                            while($row = mysqli_fetch_assoc($newClientList)) {
                                echo "<div class=\"dropdown-center\">";
                                echo "<p class=\"btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">";
                                echo (!empty($row['fname']) ? $row['fname'] : '') . (!empty($row['lname']) ? ' ' . $row['lname'] : '');
                                echo "</p>";
                                echo "<div class=\"dropdown-menu\" style=\"width:300px;\">";

                                echo "<p class=\"dropdown-item\">ID: " . $row['userID'] . "</p>";

                                if (!empty($row['lname'])) {
                                    echo "<p class=\"dropdown-item\">Last Name: " . $row['lname'] . "</p>";
                                } else {
                                    echo "<p class=\"dropdown-item\">Last Name: N/A</p>";
                                }

                                if (!empty($row['fname'])) {
                                     echo "<p class=\"dropdown-item\">First Name: " . $row['fname'] . "</p>";
                                } else {
                                     echo "<p class=\"dropdown-item\">First Name: N/A</p>";
                                }

                                // Check for empty values and show "N/A" if necessary
                                echo "<p class=\"dropdown-item\">DOB: " . (!empty($row['DOB']) ? $row['DOB'] : 'N/A') . "</p>";
                                echo "<p class=\"dropdown-item\">Street: " . (!empty($row['street']) && !empty($row['city']) ? $row['street'] . ", " . $row['city'] : 'N/A') . "</p>";
                                echo "<p class=\"dropdown-item\">State: " . (!empty($row['state']) ? $row['state'] : 'N/A') . "</p>";
                                echo "<p class=\"dropdown-item\">Zipcode: " . (!empty($row['zipcode']) ? $row['zipcode'] : 'N/A') . "</p>";
                                echo "<p class=\"dropdown-item\">Phone: " . (!empty($row['primaryPhone']) ? $row['primaryPhone'] : 'N/A') . "</p>";
                                echo "<p class=\"dropdown-item\">Email: " . (!empty($row['email']) ? $row['email'] : 'N/A') . "</p>";
                                echo "<p class=\"dropdown-item\">Desired Job Title: " . (!empty($row['desiredJobTitle']) ? $row['desiredJobTitle'] : 'N/A') . "</p>";

                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo 'No client found.';
                        }


                    /********************************END NEW CLIENT BLOCK *********************************/
                    ?>
                </div>
            </div>

            <div class="d-flex flex-column my-5">
                <div class="header-client-list">
                    <h3 class="fw-bold text-center text-Blue my-1">Client list</h3>
                </div>
                <div class="box-client-list text-center overflow-scroll">
                    <div class="dropdown-center">


                        <?php
                        /****************************DISPLAY CLIENT LIST WHO HAS BEEN COACH BY THE EMPLOYEE WHO ARE LOGIN ******************/


                            //Query to select clients who have been coahc by the logged-in employee
                            $clientQuery ="SELECT PRA.activityCode, PRA.trainingProgram, PRA.startDate,
                                                    PRA.endDate, PRA.minutes,  PRA.notes,P.userID,
                                                    P.fname, P.lname, P.email, P.DOB, P.primaryPhone,
                                                    Addr.street, Addr.city, Addr.state, Addr.zipcode,
                                                    Emp.desiredJobTitle
                                            FROM participationReportActivity PRA
                                            INNER JOIN COACH C ON C.employeeID = PRA.employeeID
                                            INNER JOIN PARTICIPATION P ON P.userID = PRA.userID
                                            JOIN ADDRESS AS Addr ON P.userID = Addr.userID
                                            JOIN EMPLOYMENT AS Emp ON P.userID = Emp.userID
                                            WHERE C.employeeID = ?
                                            AND ((P.fname LIKE '%$searchTerm%' OR P.lname LIKE '%$searchTerm%') OR CONCAT(P.fname, ' ', P.lname) LIKE '%$searchTerm%' OR P.userID LIKE '%$searchTerm%'
                                            OR P.email LIKE '%$searchTerm%' OR  P.DOB LIKE '%$searchTerm%' OR  P.primaryPhone LIKE '%$searchTerm%'
                                            OR Addr.street LIKE '%$searchTerm%'OR Addr.city LIKE '%$searchTerm%' OR Addr.state LIKE '%$searchTerm%'
                                            OR Addr.zipcode LIKE '%$searchTerm%'
                                            OR Emp.desiredJobTitle LIKE '%$searchTerm%'
                                            OR PRA.activityCode LIKE '%$searchTerm%'
                                            OR PRA.trainingProgram LIKE '%$searchTerm%'
                                            OR PRA.startDate LIKE '%$searchTerm%'
                                            OR PRA.endDate LIKE '%$searchTerm%'
                                            OR PRA.minutes LIKE '%$searchTerm%'
                                            OR PRA.notes LIKE '%$searchTerm%' );";



                            $stmt = $conn->prepare($clientQuery);
                            $stmt->bind_param("i", $_SESSION['employeeID']); //Bind the parameter to the statement
                            $stmt-> execute(); //Execute the prepared statement
                            $result = $stmt-> get_result();//Get the result set
                            //Check if any rows were returned
                            if ($result->num_rows > 0) {
                                //Display client list
                                while($row = $result->fetch_assoc()){

                                    echo '<p class="btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">';

                                       echo $row['fname']." ". $row['lname'];
                                    echo ' </p>';

                                        echo '<div id="client_Info" class="dropdown-menu collapse" style="width:100%;height:auto; transition:1ms; word-break: break-word;">';
                                        echo '<p class="dropdown-item">ID: ' . $row['userID'] . '</p>';
                                        echo '<p class="dropdown-item">Last Name: ' . $row['lname'] . '</p>';
                                        echo '<p class="dropdown-item">First Name: ' . $row['fname'] . '</p>';
                                        echo '<p class="dropdown-item">DOB: ' . $row['DOB'] . '</p>';
                                        echo '<p class="dropdown-item">Street: '.$row['street'].", ".$row['city']."</p>";
                                        echo '<p class="dropdown-item">State: '.$row['state']."</p>";
                                        echo '<p class="dropdown-item">Zipcode: '.$row['zipcode']."</p>";
                                        echo '<p class="dropdown-item">Email: ' . $row['email'] . '</p>';
                                        echo '<p class="dropdown-item">Phone: ' . $row['primaryPhone'] . '</p>';
                                        echo '<p class="dropdown-item">Activity Code: ' . $row['activityCode'] . '</p>';
                                        echo '<p class="dropdown-item">Training Code: ' . $row['trainingProgram'] . '</p>';
                                        echo '<p class="dropdown-item">Start Date: ' . $row['startDate'] . '</p>';
                                        echo '<p class="dropdown-item">End Date: ' . $row['endDate'] . '</p>';

                                        echo '<p class="dropdown-item">Time Spent with Participant: ' . $row['minutes'] . '</p>';
                                        echo '<p class="dropdown-item">Notes: ' . $row['notes'] . '</p>';

                                        echo '<div class="dropdown-item text-end">';
                                            echo '<a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#report_edit,#client_Info">Edit</a>';
                                        echo '</div>';

                                        echo '</div>';





                                    // Edit participation report activity information -->
                                    echo ' <div id="report_edit" class="dropdown-menu collapse" style="width:100%; height:auto; transition:1ms; padding: left 3px; word-wrap: break-word;">';

                                        echo '<form method="post" action="includes/updateReportActivity.inc.php">' ;

                                            echo '<input type="hidden" name="userID" value="' . $row['userID'] . '">';
                                            echo '<div class="form-group">';
                                                echo '<div class="col fw-bold">Activity Code:</div>';
                                                echo '<div class="mt-1">';
                                                    echo '<select class="form-control" name="activityCode">';
                                                        echo'<option value="Code">Please choose best code that fits for activity.</option>';
                                                        echo '<option value="101 Orientation"';
                                                            if (isset($row['activityCode']) && !empty($row['activityCode']) && $row['activityCode'] == '101 Orientation') {
                                                                echo 'selected';
                                                            }
                                                            echo '>101 Orientation</option>';
                                                        echo '<option value="102 Initial Assessment"';
                                                            if(isset($row['activityCode']) && !empty($row['activityCode']) && $row['activityCode'] == "102 Initial Assessment") {
                                                                echo "selected";
                                                            }
                                                            echo '>102 Initial Assessment</option>';
                                                        echo '<option value="103 Provision of Information on Training Providers/Performance Outcomes"';
                                                           if(isset($row['activityCode']) && !empty($row['activityCode']) && $row['activityCode'] == "103 Provision of Information on Training Providers/Performance Outcomes"){
                                                            echo "selected";
                                                           }
                                                           echo '>103 Provision of Information on Training Providers/Performance Outcomes</option>';
                                                    echo '</select>';
                                                echo '</div>';

                                            echo '</div>';

                                            echo '<div class="form-group">';
                                                echo '<div class="col fw-bold mt-2">Training Program:</div>';
                                                echo '<div class="mt-1">';
                                                    echo '<select class="form-control" name="trainingProgram">';
                                                        echo '<option value="Training Program">Please choose training program.</option>';
                                                        echo '<option value="CMC - Essential Skills (5 hours)"';
                                                            if(isset($row['trainingProgram']) && !empty($row['trainingProgram']) && $row['trainingProgram'] == "CMC - Essential Skills (5 hours)"){
                                                                echo "selected";
                                                            }
                                                            echo '>CMC - Essential Skills (5 hours)</option>';
                                                        echo '<option value="CMC - Intro to Assembler (5 hours)"';
                                                            if(isset($row['trainingProgram']) && !empty($row['trainingProgram']) && $row['trainingProgram'] == "CMC - Intro to Assembler (5 hours)"){
                                                               echo "selected";
                                                            }
                                                            echo '>CMC - Intro to Assembler (5 hours)</option>';
                                                        echo '<option value="CMC - Assembler (30 hours)"';
                                                            if(isset($row['trainingProgram']) && !empty($row['trainingProgram']) && $row['trainingProgram'] == "CMC - Assembler (30 hours)"){
                                                               echo "selected";
                                                            }
                                                            echo '>CMC - Assembler (30 hours)</option>';
                                                    echo '</select>';
                                                echo '</div>';
                                            echo '</div>';

                                            echo '<div class="form-group">';
                                                echo '<div class="col fw-bold mt-2">Start Date:</div>';
                                                echo '<div class="mt-1">';
                                                    echo '<input type="date" class="form-control" id="startDate" name="startDate" value="' . $row['startDate'] . '">';
                                                echo '</div>';
                                            echo '</div>';

                                            echo '<div class="form-group">';
                                                echo '<div class="col fw-bold mt-2">End Date:</div>';
                                                echo '<div class="mt-1">';

                                                    echo '<input type="date" class="form-control" id="endDate" name="endDate" value="'.$row['endDate'].'">';
                                                echo '</div>';
                                            echo '</div>';

                                            echo '<div class="form-group">';


                                                echo '<div class="col fw-bold mt-2">Minutes Spent:</div>';
                                                echo '<div class="mt-1">';
                                                    echo '<input type="number" class="form-control" id="minutes" name="minutes"  value="'.$row['minutes'].'">';
                                                echo '</div>';
                                            echo '</div>';

                                            echo '<div class="form-group">';


                                                echo '<div class="col fw-bold mt-2">Notes:</div>';
                                                echo '<div class="mt-1">';
                                                    echo '<textarea type="text" class="form-control border border-info" rows="4" placeholder="Notes" required="" id="notes" name="notes">' . $row['notes'] . '</textarea>';

                                                echo '</div>';
                                            echo '</div>';

                                            echo '<div class="dropdown-item text-end mt-2 ">';
                                                echo '<button type="submit" class="text-decoration-none text-white btn btn-primary  btn-sm" >Save</button>';
                                                echo '<button type="button" class="text-decoration-none text-white btn btn-danger  btn-sm" data-bs-toggle="collapse" data-bs-target="#client_Info,#report_edit" >Cancel</button>';
                                            echo '</div>';
                                        echo '</form>';

                                    echo '</div>';




                                }
                            } else {
                                echo 'No client found.';
                            }





                        /****************************END OF DISPLAY CLIENT LIST******************/
                        ?>


                    </div>

                </div>

            </div>

        </div>
     </div>
</div>
<!-- Javascript for the cancle button -->
<script>


function submitSearch() {
  document.getElementById("searchForm").submit();
}

</script>