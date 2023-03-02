<?php
//connection to database
$conn = mysqli_connect("localhost", "root", "", "test");

//search table columns
if(isset($_POST["search"])) {
    if ($_POST["query"] == "expireSoon") {
        //$query = "SELECT * FROM grant_main ORDER BY endDate ASC";
        $stmt = $conn->prepare("SELECT * FROM grant_main ORDER BY endDate ASC");
    }
    
    if ($_POST["query"] == "expireLatest") {
        //$query = "SELECT * FROM grant_main ORDER BY endDate DESC";
        $stmt = $conn->prepare("SELECT * FROM grant_main ORDER BY endDate DESC");
    }

    if ($_POST["query"] == "createRecent") {
        //$query = "SELECT * FROM grant_main ORDER BY startDate DESC";
        $stmt = $conn->prepare("SELECT * FROM grant_main ORDER BY startDate DESC");
    }

    if ($_POST["query"] == "createOldest") {
        //$query = "SELECT * FROM grant_main ORDER BY startDate ASC";
        $stmt = $conn->prepare("SELECT * FROM grant_main ORDER BY startDate ASC");
    }

    if ($_POST["query"] == "expire3Months") {
        //$query = "SELECT * FROM grant_main WHERE endDate <= NOW() + INTERVAL 3 MONTH";
        $stmt = $conn->prepare("SELECT * FROM grant_main WHERE endDate <= NOW() + INTERVAL 3 MONTH");
    }

    if ($_POST["query"] == "default") {
        //$query = "SELECT * FROM grant_main";
        $stmt = $conn->prepare("SELECT * FROM grant_main");
    }
    //$search_result = filterTable($conn, $query);
    $result = filterTable($stmt);
}
else {
    //$query = "SELECT * FROM grant_main";
    //result = filterTable($conn, $query);
    $stmt = $conn->prepare("SELECT * FROM grant_main");
    $result = filterTable($stmt);
}

//query execution
function filterTable($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

//query execution
/*function filterTable($conn, $query) {
    $filter_result = mysqli_query($conn, $query);
    return $filter_result;
}*/
?>