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
                        JOIN ADDRESS AS Addr
                        ON P.userID = Addr.userID
                        JOIN EMPLOYMENT AS Emp
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
                                echo"<div class=\"dropdown-center\">";
                                    echo"<p class=\"btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">";
                                    echo $row['fname']." ". $row['lname'];
                                    echo"</p>";
                                    echo"<div class=\"dropdown-menu\" style=\"width:300px;\">";
                                        echo"<p class=\"dropdown-item\">ID: ".$row['userID']."</p>";
                                        echo"<p class=\"dropdown-item\">Last Name: ".$row['lname']."</p>";
                                        echo"<p class=\"dropdown-item\">First Name: ".$row['fname']."</p>";
                                        echo"<p class=\"dropdown-item\">DOB: ".$row['DOB']."</p>";
                                        echo"<p class=\"dropdown-item\">Street: ".$row['street'].", ".$row['city']."</p>";
                                        echo"<p class=\"dropdown-item\">State: ".$row['state']."</p>";
                                        echo"<p class=\"dropdown-item\">Zipcode: ".$row['zipcode']."</p>";
                                        echo"<p class=\"dropdown-item\">Phone: ".$row['primaryPhone']."</p>";
                                        echo"<p class=\"dropdown-item\">Email: ".$row['email']."</p>";
                                        echo"<p class=\"dropdown-item\">Desired Job Title: ".$row['desiredJobTitle']."</p>";

                                    echo "</div>";
                                echo"</div>";
                            }} else {
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

                                        echo '<div id="client_Info" class="dropdown-menu collapse" style="width:300px;height:auto; transition:1ms;" >';
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



                                }
                            } else {
                                echo 'No client found.';
                            }





                        /****************************END OF DISPLAY CLIENT LIST******************/
                        ?>

                            <!-- // Edit participation report activity information -->


                        <div id="report_edit" class="dropdown-menu collapse" style="width:100%; height:auto; transition:1ms; padding: left 3px; word-wrap: break-word;">
                            <form method="post" action="includes/updateReportActivity.inc.php">

                                <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
                                <div class="form-group">
                                    <div class="col fw-bold">Activity Code:</div>
                                    <div class="mt-1">
                                        <select class="form-control" name="activityCode">
                                            <option value="Code">Please choose best code that fits for activity.</option>
                                            <option value="101 Orientation" <?php if(isset($row['activityCode']) && !empty($row['activityCode']) && $row['activityCode'] == "101 Orientation") echo "selected"; ?>>101 Orientation</option>
                                            <option value="102 Initial Assessment" <?php if(isset($row['activityCode']) && !empty($row['activityCode']) && $row['activityCode'] == "102 Initial Assessment") echo "selected"; ?>>102 Initial Assessment</option>
                                            <option value="103 Provision of Information on Training Providers/Performance Outcomes" <?php if(isset($row['activityCode']) && !empty($row['activityCode']) && $row['activityCode'] == "103 Provision of Information on Training Providers/Performance Outcomes") echo "selected"; ?>>103 Provision of Information on Training Providers/Performance Outcomes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col fw-bold mt-2">Training Program:</div>
                                    <div class="mt-1">

                                        <select class="form-control" name="trainingProgram">
                                            <option value="Training Program">Please choose training program.</option>
                                            <option value="CMC - Essential Skills (5 hours)" <?php if(isset($row['trainingProgram']) && !empty($row['trainingProgram']) && $row['trainingProgram'] == "CMC - Essential Skills (5 hours)") echo "selected"; ?>>CMC - Essential Skills (5 hours)</option>
                                            <option value="CMC - Intro to Assembler (5 hours)" <?php if(isset($row['trainingProgram']) && !empty($row['trainingProgram']) && $row['trainingProgram'] == "CMC - Intro to Assembler (5 hours)") echo "selected"; ?>>CMC - Intro to Assembler (5 hours)</option>
                                            <option value="CMC - Assembler (30 hours)" <?php if(isset($row['trainingProgram']) && !empty($row['trainingProgram']) && $row['trainingProgram'] == "CMC - Assembler (30 hours)") echo "selected"; ?>>CMC - Assembler (30 hours)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col fw-bold mt-2">Start Date:</div>
                                    <div class="mt-1">
                                    <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $row['startDate']; ?>">
                                </div>
                                <div class="form-group">

                                    <div class="col fw-bold mt-2">End Date:</div>
                                    <div class="mt-1">
                                        <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $row['endDate']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">


                                    <div class="col fw-bold mt-2">Minutes Spent:</div>
                                    <div class="mt-1">
                                       <input type="number" class="form-control" id="minutes" name="minutes" value="<?php echo $row['minutes']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">


                                    <div class="col fw-bold mt-2">Notes:</div>
                                    <div class="mt-1">
                                    <textarea type = "text" class="form-control border border-info" rows="4" placeholder="Notes" required=""id="notes" name="notes" value="<?php echo $row['notes']; ?>"></textarea>

                                    </div>
                                </div>
                                <div class="dropdown-item text-end mt-2 ">
                                    <button type="submit" class="text-decoration-none text-white btn btn-primary  btn-sm" data-bs-toggle="collapse" data-bs-target="#client_Info,#report_edit">Save</button>
                                    <button type="button" class="text-decoration-none text-white btn btn-danger  btn-sm" onclick="closeDropdown()">Cancel</button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
     </div>
</div>
<!-- Javascript for the cancle button -->
<script>
function closeDropdown() {
    document.getElementById("report_edit").classList.remove("show");

}

function submitSearch() {
  document.getElementById("searchForm").submit();
}

</script>