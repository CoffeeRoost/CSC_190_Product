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
<h3 class="d-flex justify-content-center text-info mb-3">LIST OF CLIENT</h3>
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
                            $clientQuerry = "SELECT * FROM EMPLOYEE AS E JOIN COACH AS co ON co.employeeID = E.employeeID JOIN PARTICIPATION AS P ON co.userID = P.userID JOIN ADDRESS AS A ON P.userID = A.userID;";
                            $clientList = mysqli_query($conn, $clientQuerry);
                            $clientResult = mysqli_num_rows($clientList);
                            if($clientResult > 0){
                                while($row = mysqli_fetch_assoc($clientList)) {
                                    $clientViewID = $row['userID'];
                                    $status = $row['status'];
                                
                echo "<tr>";
                    echo "<th class =\"col-1 text-center\"><a href = \"./includes/clientViewBE.php?id=$clientViewID&role=client\" class= \"nav-link\">".$row['userID']."</a></th>";

                    echo "<td class=\"col-2 text-center\"><a href = \"./includes/clientViewBE.php?id=$clientViewID&role=client\" class= \"nav-link\">".$row['fname']. " " . $row['MI'] . " " . $row['lname']."</a></td>";

                    echo "<td class=\"col-4 text-center\"><a href = \"./includes/clientViewBE.php?id=$clientViewID&role=client\" class= \"nav-link\">".$row['street']. " " . $row['city'] . ", " . $row['county'].", ".$row['state']." ". $row['zipcode']."</a></td>";

                    echo "<td class=\"col-1 text-center\"><a href = \"./includes/clientViewBE.php?id=$clientViewID&role=client\" class= \"nav-link\">".$row['primaryPhone']."</a></td>";

                    echo "<td class=\"col-2 text-center\"><a href = \"./includes/clientViewBE.php?id=$clientViewID&role=client\" class= \"nav-link\">".$row['email']."</a></td>";
    
                    echo "<td class=\"col-2\">";
                    echo "<div class =\"d-flex\">";
                        echo "<form method=\"POST\" action=\"./includes/clientModifyFunction.inc.php?id=$clientViewID&status=$status$\">";
                            if($status == 1){
                                echo "<button type=\"submit\" name=\"deactivate_ClientTable\" class=\"bg-success text-white me-1 rounded\" style=\"width:100px\">Deactivate</button>";
                            }
                            else {
                                echo "<button type=\"submit\" name=\"deactivate_ClientTable\" class=\"bg-secondary text-white me-1 rounded\" style=\"width:100px\">Activate</button>";      
                            }
                        echo "</form>";
                            echo "<button class=\"bg-danger text-white ms-1 rounded\" onclick=\"confirmDelete(".$clientViewID.")\" style=\"width:100px\">Delete</button>";
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
function confirmDelete(userID) {
  if (confirm("Account cannot be recovery after delete.\nIf you are not sure. Please using deactivate.\nDo you want to continue delete?")) {
        window.location.href = "./includes/clientModifyFunction.inc.php?action=deleteClientTable&id=" + userID ;
  } else {
    // do nothing
  }
}
</script>