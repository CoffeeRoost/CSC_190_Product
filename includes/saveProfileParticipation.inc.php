<?php 
    
    
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
        echo "Participation information saved successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

  $conn->close();
?>

