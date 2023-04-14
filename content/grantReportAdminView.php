<?php
require 'includes/dbh.inc.php';

// Edit functionality
if (isset($_POST['edit'])) {
    $characteristic_grant_ID = $_POST['characteristic_grant_ID'];
    $sql = "SELECT * FROM GRANT_CHARACTERISTICS WHERE characteristic_grant_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $characteristic_grant_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $edit_row = $result->fetch_assoc();
        $edit_mode = true;
    }
}

// Update functionality
if (isset($_POST['update']) && isset($_POST['characteristic_grant_ID']) && isset($_POST['grantID'])) {
    $characteristic_grant_ID = $_POST['characteristic_grant_ID'];
    $char_title = $_POST['char_title'];
    $char_status = $_POST['char_status'];
    $grantID = $_POST['grantID'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $personal_contact = $_POST['personal_contact'];
    $supporting_organization = $_POST['supporting_organization'];
    $shared_grant_ID = $_POST['shared_grant_ID'];
    $userID = $_POST['userID'];
    $adminID = $_POST['adminID'];
    $grant_name = $_POST['grant_name'];

  // Update GRANT_MAIN table
  $sql1 = "UPDATE GRANT_MAIN SET adminID = ?, grant_name = ?, grantID = ?, startDate = ?, endDate = ?, personal_contact = ?, supporting_organization = ? WHERE shared_grant_ID = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("isissssi", $adminID, $grant_name, $grantID, $startDate, $endDate, $personal_contact, $supporting_organization, $shared_grant_ID);


  // Update GRANT_CHARACTERISTICS table
  $sql2 = "UPDATE GRANT_CHARACTERISTICS SET char_title = ?, char_status = ? WHERE characteristic_grant_ID = ?";
  $stmt2 = $conn->prepare($sql2);
  $stmt2->bind_param("ssi", $char_title, $char_status, $characteristic_grant_ID);

  // Update GRANT_PARTICIPATION table
$sql3 = "UPDATE GRANT_PARTICIPATION SET characteristic_grant_ID = ?, userID = ? WHERE shared_grant_ID = ?";
$stmt3 = $conn->prepare($sql3);
$stmt3->bind_param("iii", $characteristic_grant_ID, $userID, $shared_grant_ID);

    $stmt1->execute();
    $stmt2->execute();
    $stmt3->execute();
}

// Delete functionality
if (isset($_POST['delete'])) {
  $characteristic_grant_ID = $_POST['characteristic_grant_ID'];
  $sql = "DELETE FROM GRANT_CHARACTERISTICS WHERE characteristic_grant_ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $characteristic_grant_ID);
  if ($stmt->execute()) {
      header('Location: grantReportView.php');
      exit;
  } else {
      echo "Error: " . $conn->error;
  }
}

// Fetch data for the main table
$sql = "SELECT *
FROM GRANT_MAIN 
JOIN GRANT_PARTICIPATION ON GRANT_MAIN.shared_grant_ID = GRANT_PARTICIPATION.shared_grant_ID 
JOIN GRANT_CHARACTERISTICS ON GRANT_PARTICIPATION.characteristic_grant_ID = GRANT_CHARACTERISTICS.characteristic_grant_ID";

$result = $conn->query($sql);
?>

<script>
function submitUpdateForm() {
    document.getElementById('updateForm').submit();
}
</script>

<div class="container-fluid">
    <h5 class="d-flex justify-content-center text-info mb-5">Grant Activity Report</h5>

    <?php if (isset($error_message)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error_message; ?>
    </div>
    <?php endif; ?>

<table class="table table-bordered">
        <tr>
            <th>Admin ID</th>
            <th>User ID</th>
            <th>Grant Name</th>
            <th>Grant ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Personal Contact</th>
            <th>Supporting Organization</th>
            <th>Shared Grant ID</th>
            <th>Characteristic Grant ID</th>
            <th>Characteristic Title</th>
            <th>Characteristic Status</th>
            <th>Action</th>
        </tr>
    <tbody>
<?php while ($row = $result->fetch_assoc()) : ?>
<tr>
    <td><?php echo $row['adminID']; ?></td>
    <td><?php echo $row['userID']; ?></td>
    <td><?php echo $row['grant_name']; ?></td>
    <td><?php echo $row['grantID']; ?></td>
    <td><?php echo $row['startDate']; ?></td>
    <td><?php echo $row['endDate']; ?></td>
    <td><?php echo $row['personal_contact']; ?></td>
    <td><?php echo $row['supporting_organization']; ?></td>
    <td><?php echo $row['shared_grant_ID']; ?></td>
    <td><?php echo $row['characteristic_grant_ID']; ?></td>
    <td><?php echo $row['char_title']; ?></td>
    <td><?php echo $row['char_status']; ?></td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="characteristic_grant_ID" value="<?php echo $row['characteristic_grant_ID']; ?>">
            <button type="submit" name="edit" class="btn btn-warning btn-sm">Edit</button>
            <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </td>
</tr>
<?php
// Edit form for the current row
if (isset($edit_mode) && $edit_mode && $edit_row['characteristic_grant_ID'] == $row['characteristic_grant_ID']) {
?>
    <tr>
        <td colspan="13">
            <form id="updateForm" method="post">
                <input type="hidden" name="characteristic_grant_ID" value="<?php echo $row['characteristic_grant_ID']; ?>">
                <input type="hidden" name="old_adminID" value="<?php echo $row['adminID']; ?>">
                <input type="hidden" name="old_userID" value="<?php echo $row['userID']; ?>">
                <div class="form-group">
                    <label for="adminID">Admin ID</label>
                    <input type="number" class="form-control" name="adminID" id="adminID" value="<?php echo $row['adminID']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="userID">User ID</label>
                    <input type="number" class="form-control" name="userID" id="userID" value="<?php echo $row['userID']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="grant_name">Grant Name</label>
                    <input type="text" class="form-control" name="grant_name" id="grant_name" value="<?php echo $row['grant_name']; ?>" required>
                </div>
                <div class="form-group">
                <label for="grantID">Grant ID</label>
                    <input type="text" class="form-control" name="grantID" id="grantID" value="<?php echo $row['grantID']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" class="form-control" name="startDate" id="startDate" value="<?php echo $row['startDate']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="endDate">End Date</label>
                    <input type="date" class="form-control" name="endDate" id="endDate" value="<?php echo $row['endDate']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="personal_contact">Personal Contact</label>
                    <input type="text" class="form-control" name="personal_contact" id="personal_contact" value="<?php echo $row['personal_contact']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="supporting_organization">Supporting Organization</label>
                    <input type="text" class="form-control" name="supporting_organization" id="supporting_organization" value="<?php echo $row['supporting_organization']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="shared_grant_ID">Shared Grant ID</label>
                    <input type="number" class="form-control" name="shared_grant_ID" id="shared_grant_ID" value="<?php echo $row['shared_grant_ID']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="characteristic_grant_ID">Characteristic Grant ID</label>
                  <input type="number" class="form-control" name="characteristic_grant_ID" id="characteristic_grant_ID" value="<?php echo $edit_row['characteristic_grant_ID']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="char_title">Characteristic Title</label>
                    <input type="text" class="form-control" name="char_title" id="char_title" value="<?php echo $edit_row['char_title']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="char_status">Characteristic Status</label>
                    <input type="text" class="form-control" name="char_status" id="char_status" value="<?php echo $edit_row['char_status']; ?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </td>
    </tr>
<?php
    unset($edit_mode); // Unset the edit_mode to prevent duplicate forms
} ?>
<?php endwhile; ?>
</tbody>
</table>
