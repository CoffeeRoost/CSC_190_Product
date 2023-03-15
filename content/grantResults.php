<?php
//connection to database
$conn = mysqli_connect("localhost", "root", "", "test");

//search table columns
if(isset($_POST["search"])) {
    if ($_POST["query"] == "default") {
        $stmt = $conn->prepare("SELECT * FROM grant_main");
    }

    if ($_POST["query"] == "expireSoon") {
        $stmt = $conn->prepare("SELECT * FROM grant_main ORDER BY endDate ASC");
    }
    
    if ($_POST["query"] == "expireLatest") {
        $stmt = $conn->prepare("SELECT * FROM grant_main ORDER BY endDate DESC");
    }

    if ($_POST["query"] == "createRecent") {
        $stmt = $conn->prepare("SELECT * FROM grant_main ORDER BY startDate DESC");
    }

    if ($_POST["query"] == "createOldest") {
        $stmt = $conn->prepare("SELECT * FROM grant_main ORDER BY startDate ASC");
    }

    if ($_POST["query"] == "expire3Months") {
        $stmt = $conn->prepare("SELECT * FROM grant_main WHERE endDate <= NOW() + INTERVAL 3 MONTH");
    }
    
    $result = filterTable($stmt);
}
else {
    $stmt = $conn->prepare("SELECT * FROM grant_main");
    $result = filterTable($stmt);
}

//query execution
function filterTable($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

?>

<!DOCTYPE html>
<html>
    <div class="container-fluid">
    <h5 class="d-flex justify-content-center text-info mb-5">Grant Results</h5>
    <h6 class="mt-5">How do you want to filter the grants by?</h6>
        <form action="grantResults.php" method="post">
            <select name="query">
                <option value="default" hidden selected></option>
                <option value="expireSoon">Grants expiring the soonest</option>
                <option value="expireLatest">Grants expiring the latest</option>
                <option value="createRecent">Grants recently created</option>
                <option value="createOldest">Oldest grants created</option>
                <option value="expire3Months">Grants expiring within 3 months</option>
            </select>
            
            <h6 class="mt-5">Want to unfilter the results? Submit without anything selected.</h6>

            <div class="col-6 my-3">
                <button class="btn btn-info btn-shadow my-3" name="search" type="submit">Submit</button>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>Grant ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Grant Name</th>
                    <th>Support Organization</th>
                    <th>Number of Characteristics</th>
                </tr>
                <?php while($row = $result->fetch_assoc()):?>
                    <tr>
                        <td><?php echo $row['grantId'];?></td>
                        <td><?php echo $row['startDate'];?></td>
                        <td><?php echo $row['endDate'];?></td>
                        <td><?php echo $row['grantName'];?></td>
                        <td><?php echo $row['suppOrg'];?></td>
                        <td><?php echo $row['numOfChar'];?></td>
                    </tr>
                <?php endwhile;?>
            </table>
        </form>
    </div>
</html>