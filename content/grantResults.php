<?php
//connection to database
$conn = mysqli_connect("localhost", "root", "", "test");

//search table columns
if(isset($_POST["search"])) {
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

    if ($_POST["query"] == "default") {
        $stmt = $conn->prepare("SELECT * FROM grant_main");
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
    <head>
        <title> </title>
    </head>
    <body> 
        <form action="grantResults.php" method="post">
            <input type="radio" name="query" value="expireSoon">
            <label for="expireSoon">Grants expiring the soonest</label><br>
            <input type="radio" name="query" value="expireLatest">
            <label for="expireLatest">Grants expiring the latest</label><br>
            <input type="radio" name="query" value="createRecent">
            <label for="createRecent">Grants recently created</label><br>
            <input type="radio" name="query" value="createOldest">
            <label for="createOldest">Oldest grants created</label><br>
            <input type="radio" name="query" value="expire3Months">
            <label for="expire3Months">Grants expiring within 3 months</label><br>
            <input type="radio" name="query" value="default">
            <label for="default">Unfilter</label><br>
            <input type="submit" name="search" value="Submit"><br><br>
            <table>
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
    </body>
</html>