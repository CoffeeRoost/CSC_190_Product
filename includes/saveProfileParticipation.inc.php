<?php 
    // Start session and check if user is logged in
    session_start();
    if (!isset($_SESSION['userID'])) {
        // Redirect user to login page if not logged in
        header("Location: ../Login.php");
        exit();
    }

    // Include database connection
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
    $sql = "UPDATE participation p
            INNER JOIN address a ON p.userID = a.userID
            SET p.fname = '$fname',
                p.lname = '$lname',
                p.email = '$email',
                a.street = '$street',
                a.city = '$city',
                a.state = '$state'
            WHERE p.userID ='$userID'";

    if (mysqli_query($conn, $sql)) {
        echo "Participation information saved successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>

