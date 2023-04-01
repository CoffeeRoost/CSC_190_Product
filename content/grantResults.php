<?php
//connection to database
require 'includes/dbh.inc.php';

$search_terms = array(
    'grantID' => "",
    'startDate' => "",
    'endDate' => "",
    'grant_name' => "",
    'supporting_organization' => "",
    'personal_contact' => ""
);

$query = isset($_POST["query"]) ? $_POST["query"] : "default";

if (isset($_POST["search"])) {
    $search_terms = array(
        'grantID' => isset($_POST["grantID"]) ? $_POST["grantID"] : "",
        'startDate' => isset($_POST["startDate"]) ? $_POST["startDate"] : "",
        'endDate' => isset($_POST["endDate"]) ? $_POST["endDate"] : "",
        'grant_name' => isset($_POST["grant_name"]) ? $_POST["grant_name"] : "",
        'supporting_organization' => isset($_POST["supporting_organization"]) ? $_POST["supporting_organization"] : "",
        'personal_contact' => isset($_POST["personal_contact"]) ? $_POST["personal_contact"] : ""
    );
}

$base_query = "SELECT * FROM grant_main WHERE grantID LIKE ? AND startDate LIKE ? AND endDate LIKE ? AND grant_name LIKE ? AND supporting_organization LIKE ? AND personal_contact LIKE ?";

switch ($query) {
    case "expireSoon":
        $base_query .= " ORDER BY endDate ASC";
        break;
    case "expireLatest":
        $base_query .= " ORDER BY endDate DESC";
        break;
    case "createRecent":
        $base_query .= " ORDER BY startDate DESC";
        break;
    case "createOldest":
        $base_query .= " ORDER BY startDate ASC";
        break;
    case "expire3Months":
        $base_query .= " AND endDate <= NOW() + INTERVAL 3 MONTH";
        break;
}

$search_term = array_map(function ($term) {
    return "%" . $term . "%";
}, $search_terms);

$stmt = $conn->prepare($base_query);

$stmt->bind_param("ssssss", $search_term['grantID'], $search_term['startDate'], $search_term['endDate'], $search_term['grant_name'], $search_term['supporting_organization'], $search_term['personal_contact']);

$result = filterTable($stmt);

//query execution
function filterTable($stmt)
{
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

?>

<!DOCTYPE html>
<html>

<div class="container-fluid">
    <h5 class="d-flex justify-content-center text-info mb-5">Grant Results</h5>
    <h6 class="mt-5">Search by columns:</h6>
    <form action="grantResults.php" method="post">
        <h6 class="mt-5">How do you want to filter the grants by?</h6>
        <select name="query">
            <option value="default" hidden selected></option>
            <option value="expireSoon">Grants expiring the soonest</option>
            <option value="expireLatest">Grants expiring the latest</option>
            <option value="createRecent">Grants recently created</option>
            <option value="createOldest">Oldest grants created</option>
            <option value="expire3Months">Grants expiring within 3 months</option>
        </select>
        <table class="table table-bordered">
            <tr>
                <th>
                    Grant ID
                    <br>
                    <input type="text" name="grantID" placeholder="Grant ID" value="<?php echo $search_terms['grantID']; ?>">
                </th>
                <th>
                    Start Date
                    <br>
                    <input type="text" name="startDate" placeholder="Start Date" value="<?php echo $search_terms['startDate']; ?>">
                </th>
                <th>
                    End Date
                    <br>
                    <input type="text" name="endDate" placeholder="End Date" value="<?php echo $search_terms['endDate']; ?>">
                </th>
                <th>
                    Grant Name
                    <br>
                    <input type="text" name="grant_name" placeholder="Grant Name" value="<?php echo $search_terms['grant_name']; ?>">
                </th>
                <th>
                    Support Organization
                    <br>
                    <input type="text" name="supporting_organization" placeholder="Support Organization" value="<?php echo $search_terms['supporting_organization']; ?>">
                </th>
                <th>
                    Personal Contact
                    <br>
                    <input type="text" name="personal_contact" placeholder="Personal Contact" value="<?php echo $search_terms['personal_contact']; ?>">
                </th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['grantID']; ?></td>
                    <td><?php echo $row['startDate']; ?></td>
                    <td><?php echo $row['endDate']; ?></td>
                    <td><?php echo $row['grant_name']; ?></td>
                    <td><?php echo $row['supporting_organization']; ?></td>
                    <td><?php echo $row['personal_contact']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <div class="col-6 my-3">
            <button class="btn btn-info btn-shadow my-3" name="search" type="submit">Submit</button>
        </div>
    </form>
</div>
</html>
