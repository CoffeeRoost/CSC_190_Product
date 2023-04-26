
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

       if (!isset($_SESSION['adminLogin'])){
            //if error, force a logout
           session_unset();
           session_destroy();
           header ("Location: ./LoginAd.php");
           exit();
       }

       require 'includes/dbh.inc.php';

       if (isset($_SESSION['adminLogin'])) {
         $employeeID = $_SESSION['adminLogin'];
         $stmt = $conn->prepare("SELECT adminID FROM ADMIN WHERE employeeID = ?");
         $stmt->bind_param("i", $employeeID);
         $stmt->execute();
         $result = $stmt->get_result();
         if ($result->num_rows > 0) {
           $row = $result->fetch_assoc();
           $_SESSION['adminID'] = $row['adminID'];
         } else {
           // adminID not found in database
           header ("Location: ./LoginAd.php");
           exit();
         }
       }

       if (!isset($_SESSION['adminID'])) {
         // adminID not set
         header ("Location: ./LoginAd.php");
         exit();
       }



   $grantReportQuery="SELECT *
                      FROM GRANT_MAIN
                      JOIN GRANT_PARTICIPATION ON GRANT_MAIN.shared_grant_ID = GRANT_PARTICIPATION.shared_grant_ID
                      JOIN GRANT_CHARACTERISTICS ON GRANT_PARTICIPATION.characteristic_grant_ID = GRANT_CHARACTERISTICS.characteristic_grant_ID
                      WHERE GRANT_MAIN.adminID = ?";

  // Get the user ID from the session variable
    $adminID = $_SESSION['adminID'];


  // Create a prepared statement
  $stmt = $conn->prepare($grantReportQuery);

  // Bind the parameter to the statement
  $stmt->bind_param("i", $adminID);

  // Execute the statement
  $stmt->execute();

  // Get the results
  $result = $stmt->get_result();


?>
<div class="container" style="width:75vw;">
  <h3 class="d-flex justify-content-center text-info mb-3">Grant Activity Report</h3>
    <div class="table-responsive border" style="max-height: 1000px; overflow-y: auto;">
        <table class="table table-info table-hover">
            <thead class="sticky-top">


                  <thead>
                    <tr>
                      <th scope="col" class="col-4 text-center">Admin ID</th>
                      <th scope="col" class="col-4 text-center">User ID</th>
                      <th scope="col" class="col-4 text-center">Grant Name</th>
                      <th scope="col" class="col-4 text-center">Grant ID</th>
                      <th scope="col" class="col-4 text-center">Start Date</th>
                      <th scope="col" class="col-4 text-center">End Date</th>
                      <th scope="col" class="col-4 text-center">Personal Contact</th>
                      <th scope="col" class="col-4 text-center">Supporting Organization</th>
                      <th scope="col" class="col-4 text-center">Shared Grant ID</th>
                      <th scope="col" class="col-4 text-center">Characteristic Grant ID</th>
                      <th scope="col" class="col-4 text-center">Characteristic Title</th>
                      <th scope="col" class="col-4 text-center">Characteristic Status</th>
                      <th scope="col" class="col-4 text-center">Action</th>
                    </tr>
                  </thead>
            <tbody>
              <?php
                while($row = $result->fetch_assoc()){
                  // Extract the values from the array

                  $userID = $row['userID'];
                  $grantName = $row['grant_name'];
                  $grantID = $row['grantID'];
                  $startDate = $row['startDate'];
                  $endDate = $row['endDate'];
                  $personalContact = $row['personal_contact'];
                  $supportingOrganization = $row['supporting_organization'];
                  $sharedGrantID = $row['shared_grant_ID'];
                  $characteristicGrantID = $row['characteristic_grant_ID'];
                  $charTitle = $row['char_title'];
                  $charStatus = $row['char_status'];
              ?>
                <tr id ="grantReportShow_<?php echo $sharedGrantID?>" style="transition:1ms;" class ="collapse show" >
                      <td class ="col text-center"><?php  echo $adminID ?></td>
                      <td class ="col text-center"><?php  echo $userID ?></td>
                      <td class ="col text-center"><?php  echo $grantName ?></td>
                      <td class ="col text-center"><?php  echo $grantID ?></td>
                      <td class ="col text-center"><?php  echo $startDate ?></td>
                      <td class ="col text-center"><?php  echo $endDate ?></td>
                      <td class ="col text-center"><?php  echo $personalContact ?></td>
                      <td class ="col text-center"><?php  echo $supportingOrganization ?></td>
                      <td class ="col text-center"><?php echo $sharedGrantID ?></td>
                      <td class ="col text-center"><?php echo $characteristicGrantID?></td>
                      <td class="col text-center"><?php  echo $charTitle ?></td>
                      <td class="col text-center"><?php  echo $charStatus ?></td>
                      <td class="col">
                        <div class="d-flex">


                        <button type="submit" name="edit" class="bg-success text-white me-1 rounded" style="width:60px" data-bs-toggle="collapse" data-bs-target="#grantReportShow_<?php echo $sharedGrantID?>, #grantReportEdit_<?php echo $sharedGrantID ?>" aria-expanded="false" aria-controls="grantReportEdit_<?php echo $sharedGrantID ?>">Edit</button>




                          <form action="./includes/handleDeleteGrantActivity.inc.php" method="post">
                              <input type="hidden" name="sharedGrantID" value="<?php echo $sharedGrantID?>">
                              <button type="submit" name="delete" class="bg-danger text-white ms-1 rounded" style="width:60px" onclick="confirmDelete()" >Delete</button>
                          </form>

                        </div>

                      </td>

                      </tr>
                    <!-- Grant Report Activity Edit -->
                    <tr id ="grantReportEdit_<?php echo $sharedGrantID ?>" style="transition:1ms;" class ="collapse collapse">
                          <form action="./includes/handleSaveGrantActivity.inc.php" method="post">
                                  
                                      <td class="col text-center"> <input type="hidden" name="adminID" value="<?php echo $adminID ?>"></td>
                                      <td class="col text-center"> <input type="hidden" name="userID" value="<?php echo $userID ?>"></td>
                                      <td class="col text-center"><input type="text" class="border-0" name="grantName" value="<?php echo $grantName ?>"></td>
                                      <td class="col text-center"><input type="hidden" name="grantID" value="<?php echo $grantID ?>"></td>
                                      <td class="col text-center"><input type="text" class="border-0"  name="startDate" value="<?php echo $startDate ?>"></td>
                                      <td class="col text-center"><input type="text" class="border-0"  name="endDate" value="<?php echo $endDate ?>"></td>
                                      <td class="col text-center"><input type="number" class="border-0"  name="personalContact" value="<?php echo $personalContact ?>"></td>
                                      <td class="col text-center"><input type="text" class="border-0" name="supportingOrganization" value="<?php echo $supportingOrganization ?>"></td>
                                      <td class="col text-center"><input type="hidden" name="sharedGrantID" value="<?php echo $sharedGrantID ?>"></td>
                                      <td class="col text-center"><input type="hidden" name="characteristicGrantID" value="<?php echo $characteristicGrantID ?>"></td>
                                      <td class="col text-center"><input type="text" class="border-0"  name="charTitle" value="<?php echo $charTitle ?>"></td>
                                      <td class="col text-center"><input type="text" class="border-0"  name="charStatus" value="<?php echo $charStatus ?>"></td>

                                      <td class="col">
                                      <div class="d-flex">
                                          <button type="submit" name="save" class="bg-success text-white me-1 rounded" style="width:60px">Save</button>
                                          <button type="button" name="cancel" class="bg-danger text-white ms-1 rounded" style="width:60px" onclick="cancelGrantReportEdit('<?php echo $sharedGrantID ?>')">Cancel</button>
                                      </div>
                          </form>
                      </td>
                    </tr>
              <?php
                }
              ?>

            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this grant activity?")) {
          document.forms[1].submit();
      } else {
          event.preventDefault(); // prevent the default form submission behavior
      }
    }

function cancelGrantReportEdit(sharedGrantID) {
  //document.getElementById('grantReportEdit_' + sharedGrantID).classList.remove('show');
    window.location.href = "./grantReportView.php";
}


</script>


