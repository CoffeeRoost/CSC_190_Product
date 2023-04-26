<?php
        session_start();
        if (!isset($_SESSION['adminLogin'])){
             //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php");
            exit();
        }
    require 'includes/dbh.inc.php';

?>
<div class="container-fluid">
<h3 class="d-flex justify-content-center text-info mb-3">LIST OF EMPLOYEE</h3>
    <div class="table-responsive border" style="max-height: 1000px; overflow-y: auto;">
        <table class="table table-info table-hover">
            <thead class="sticky-top">
                <tr>
                <th scope="col" class="col-1 text-center">ID</th>
                <th scope="col" class="col-2 text-center">Name</th>
                <th scope="col" class="col-4 text-center">Address</th>
                <th scope="col" class="col-1 text-center">Phone</th>
                <th scope="col" class="col-2 text-center">Email</th>
                <th scope="col" class="col-2 text-center">
                </th>
                </tr>
            </thead>
            <tbody>
            <?php
                            $employeeQuerry = "SELECT * FROM EMPLOYEE ;" ;
                            $employeeList = mysqli_query($conn, $employeeQuerry);
                            $employeeResult = mysqli_num_rows($employeeList);
                            if($employeeResult > 0){
                                while($row = mysqli_fetch_assoc($employeeList)) {
                                    $empViewID = $row['employeeID'];
                                    $status = $row['empStatus'];
                                
                echo "<tr>";
                    echo "<th class =\"col-1 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['employeeID']."</a></th>";

                    echo "<td class=\"col-2 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empfname']. " " . $row['empMI'] . " " . $row['emplname']."</a></td>";

                    echo "<td class=\"col-4 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empStreet']. " " . $row['empCity'] . ", " . $row['empCounty'].", ".$row['empState']." ". $row['empZipcode']."</a></td>";

                    echo "<td class=\"col-1 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empPhone']."</a></td>";

                    echo "<td class=\"col-2 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['email']."</a></td>";
    
                    echo "<td class=\"col-2\">";
                    echo "<div class =\"d-flex\">";
                        echo "<form method=\"POST\" action=\"./includes/employeeModifyFunction.inc.php?id=$empViewID&status=$status\">";
                            if($status == 1){
                                echo "<button type=\"submit\" name=\"deactivate_table\" class=\"bg-success text-white me-1 rounded\" style=\"width:100px\">Deactivate</button>";
                            }
                            else {
                                echo "<button type=\"submit\" name=\"deactivate_table\" class=\"bg-secondary text-white me-1 rounded\" style=\"width:100px\">Activate</button>";      
                            }
                        echo "</form>";
                            echo "<button class=\"bg-danger text-white ms-1 rounded\" onclick=\"confirmDelete(".$empViewID.")\" style=\"width:100px\">Delete</button>";
                    echo "</div>";    
                        
                    echo "</td>";
                echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmDelete(empID) {
  if (confirm("Account cannot be recovery after delete.\nIf you are not sure. Please using deactivate.\nDo you want to continue delete?")) {
        window.location.href = "./includes/employeeModifyFunction.inc.php?action=deleteAtTable&id=" + empID ;
  } else {
    // do nothing
  }
}
</script>