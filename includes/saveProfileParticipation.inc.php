<?php

    session_start();
    // Include database connection
    // Start session and check if user is logged in
if (!isset($_SESSION['userID'])) {
     //if error, force a logout
     session_unset();
     session_destroy();
    //Redirect user to login page if not logged in
    header("Location:../Login.php");
    exit();
}
    require_once 'dbh.inc.php';

    // Get the updated personal information from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $city   = $_POST['city'];
    $state  = $_POST['state'];
    $userID = $_SESSION['userID'];

    // Update the database with the new personal information
    $sql = "UPDATE PARTICIPATION p
        INNER JOIN ADDRESS a ON p.userID = a.userID
        SET p.fname = ?,
            p.lname = ?,
            p.email = ?,
            a.street = ?,
            a.city = ?,
            a.state = ?
        WHERE p.userID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssi", $fname, $lname, $email, $street, $city, $state, $userID);
        $stmt->execute();
        header("Location: ../participantDash1-2.php?saveUpdatingRecord=success");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
        header("Location: ../participantDash1-2.php?ErrorUpdatingRecord=fail");
        exit();
    }

  $conn->close();
?>

