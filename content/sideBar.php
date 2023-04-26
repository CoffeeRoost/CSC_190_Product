<?php

session_start();
// Start session and check if user is logged in
if (!isset($_SESSION['userID'])) {
     //if error, force a logout
     session_unset();
     session_destroy();
    //Redirect user to login page if not logged in
    header("Location:Login.php");
    exit();
}

//connect to database
require_once ('includes/dbh.inc.php');
?>

<div class="d-flex flex-column flex-shrink-1 align-items-center bg-lightBlue w-300" id="sideBar">
            <ul class="nav nav-tabs flex-column align-items-center text-center">
                <li class="nav-item bg-Blue mt-1 mb-md-1">
                    <a href="./participantDash1-2.php" class="nav-link text-white" >

                         <?php
                        // Write a SQL query to retrieve the user's first name and last name from the PARTICIPATION table
                        $sql = "SELECT fname, lname FROM PARTICIPATION WHERE userID =". $_SESSION['userID'];

                        // Execute the query and fetch the results as an associative array
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        // Output the user's name as a link

                        echo '<h6>' . $row['fname'] . ' ' . $row['lname'] . '\'s Dashboard!<br> ID: '. $_SESSION['userID'].'</h6>';

                    ?>
                    </a>
                </li>
                <li class="nav-item bg-Blue mb-md-1">
                    <a href="./includes/clientPersonalViewBE.php?id=<?php echo $_SESSION['userID']?>" class="nav-link text-white" >
                        Personal Information
                    </a>
                </li>
        </ul>
</div>