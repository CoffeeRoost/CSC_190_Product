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



                    ?>
                </div>
            </div>

                    <!-- /********************************END NEW CLIENT BLOCK *********************************/ -->



            <!-- /****************************DISPLAY CLIENT LIST WHO HAS BEEN COACH BY THE EMPLOYEE WHO ARE LOGIN ******************/ -->
            <div class="d-flex flex-column my-5 me-5 border border-2 border-top-0 border-dark"  style="width:100%; background-color: #E4F5F8;">
                <div id="client-table" class="collapse show" style="transition:1ms;">
                    <div style="width:100%; border-top: 2px solid #000;">
                        <h3 class="fw-bold text-center text-Blue my-1">Client</h3>
                    </div>
                    <table class="table table-blue table-responsive text-center border border-1 border-start-0 border-end-0 border-dark">
                        <thead class="fs-5 text-Blue">
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Coach Name</th>
                        </thead>
                        <tbody>

                            <?php
                                $clientQuerry = "SELECT P.userID, P.fname, P.lname, E.empfname, E.emplname
                                                 FROM PARTICIPATION AS P
                                                 JOIN COACH AS co
                                                 ON P.userID = co.userID
                                                 JOIN EMPLOYEE AS E
                                                 ON co.employeeID = E.employeeID;" ;

                                $clientList = mysqli_query($conn, $clientQuerry);
                                $clientResult = mysqli_num_rows($clientList);

                                if($clientResult > 0){
                                    while ($row = mysqli_fetch_assoc($clientList)) {
                                        echo"<tr scope=\"row\">";
                                        echo "<th><span class='clickable' onclick='window.location=\"./employeeDashClientInfoDetailsView.php?userID=".$row['userID']."\"'>".$row['userID']."</span></th>";
                                        echo "<th><span class='clickable' onclick='window.location=\"./employeeDashClientInfoDetailsView.php?userID=".$row['userID']."\"'>".$row['fname']." ".$row['lname']."</span></th>";
                                        echo "<th>".$row['empfname']." ".$row['emplname']."</th>";
                                        echo "</tr>";
                                    }
                                }

                            ?>

                        </tbody>
                    </table>
                </div>
                            <!-- /********************************END CLIENT BLOCK*********************************/ -->



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