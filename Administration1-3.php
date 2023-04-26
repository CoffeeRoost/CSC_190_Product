<?php
    session_start();
    if (!isset($_SESSION['adminLogin'])){
         //if error, force a logout
        session_unset();
        session_destroy();
        header ("Location: ./LoginAd.php");
        exit();
    }
    require 'includes/dbh.inc.php';

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Latest compiled JavaScript -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="CSS/styles.css">
        <title>California Mobility Center</title>
    </head>
    <body>

        <!--Title-->
        <section id = "title">
            <nav class = "navbar navbar-expand-lg bg-Blue">
                <a href="index.php" class = "navbar-brand"><img class="logo" src="image/CMC-logo-horizontal(1).png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white fs-4 mx-4" href="./includes/logout.inc.php">Logout</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </section>
    <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-1 align-items-center bg-lightBlue w-300" id="sideBar">
            <div>
                <ul class="nav nav-tabs flex-column align-items-center text-center">
                    <li class="nav-item bg-Blue mt-1 mb-md-1">
                        <a href="./Administration1-3.php" class="nav-link text-white">
                            Dashboard
                        </a>
                    </li>
                          <li class="nav-item bg-Blue mb-md-1">
                            <a href="./includes/employeeViewBE.php?role=admin" class="nav-link text-white">
                                Personal Information
                            </a>
                          </li>

                          <li class="nav-item bg-Blue mb-md-1">
                            <a class="nav-link text-white" href="#" data-bs-toggle="collapse" data-bs-target="#e-form">
                                E-FORM
                            </a>
                          </li>

                          <li id = "e-form" class="nav-item bg-Blue mb-md-1 collapse" style="transition:1ms;" >
                            <a href="./reportActivityAD.php" class="nav-link bg-lightBlue text-Blue">
                                Activity Reporting Form
                            </a>
                            <a href="./grantReport.php" class="nav-link bg-lightBlue text-Blue">
                                Grant Report Form
                            </a>
                          </li>
                          <li class="nav-item bg-Blue mb-md-1">
                            <a href="./grantReportView.php" class="nav-link text-white">
                                Grant Report View
                            </a>
                          </li>

                      </ul>
                </div>
            </div>

            <div class="d-flex flex-column">
                <div class="d-flex flex-column bg-lightBlue mx-5 my-5">
                    <div class="text-center bg-Blue mb-4 pt-3 text-white">
                        <p>Take Action</p>
                    </div>
                    <div class="mb-5 mx-5">
                        <a href="adminSearchOption.php" class="btn btn-action btn-lg fs-6">Search</a>
                        <a href="#" class="btn btn-action btn-lg fs-6" data-bs-toggle="collapse" data-bs-target="#employee-table,#client-table">Employee/Client</a>
                        <a href="./ClientEmployee.php" class="btn btn-action btn-lg fs-6">Assign Client</a>
                        <a href="addingEmployee.php" class="btn btn-action btn-lg fs-6">Add Employee</a>
                    </div>
            </div>

            <div class="d-flex">
                <div class="d-flex flex-column my-5 mx-5">
                    <div class="header-client-list">
                        <a href="./newClientTable.php" class="nav-link"><h3 class="fw-bold text-center text-Blue my-1">New Client</h3></a>
                    </div>
                    <div class="box-client-list text-center overflow-scroll">

<?php
                    /* Display information of new client. New Clients have not been coach*/
                    $newClient = "SELECT * FROM PARTICIPATION AS P JOIN ADDRESS AS Addr ON P.userID = Addr.userID WHERE P.userID NOT IN (SELECT co.userID FROM COACH AS co);";
                    $newClientList = mysqli_query($conn, $newClient);
                    $newClientResult = mysqli_num_rows($newClientList);

                    if($newClientResult > 0){
                     while($row = mysqli_fetch_assoc($newClientList)) {
                         $newClientViewID = $row['userID'];
                         if($row['status'] == 1){
                             $convert_date = date('m-d-Y', strtotime($row['DOB']));
                             echo"<div class=\"dropdown-center\">";
                             echo"<p class=\"btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">";
                             echo $row['fname']. " ". $row['lname'];
                             echo"</p>";
                             echo"<div class=\"dropdown-menu\" style=\"width:300px;\">";
                             echo"<p class=\"dropdown-item\">ID: ".$row['userID']."</p>";
                             echo"<p class=\"dropdown-item\">Last Name: ".$row['lname']."</p>";
                             echo"<p class=\"dropdown-item\">First Name: ".$row['fname']."</p>";
                             echo"<p class=\"dropdown-item\">DOB: ".$convert_date."</p>";
                             echo"<p class=\"dropdown-item\">Street: ".$row['street']."</p>";
                             echo"<p class=\"dropdown-item\">City: ".$row['city']."</p>";
                             echo"<p class=\"dropdown-item\">State: ".$row['state']."</p>";
                             echo"<p class=\"dropdown-item\">Zipcode: ".$row['zipcode']."</p>";
                             echo"<p class=\"dropdown-item\">Phone: ".$row['primaryPhone']."</p>";
                             echo"<p class=\"dropdown-item\">Email: ".$row['email']."</p>";
                             echo"<a class=\"dropdown-item text-Blue\" href = \"./includes/clientViewBE.php?id=$newClientViewID\">Detail</a>";
                             echo "</div>";
                             echo"</div>";
                         }
                         
                     }}
                echo "</div>";
             echo"</div>";
             mysqli_free_result($newClientList);
                /********************************END NEW CLIENT BLOCK *********************************/
?>


                <div class="d-flex flex-column my-5 me-5 border border-2 border-top-0 border-dark"  style="width:100%; background-color: #E4F5F8;">
                    <div id="client-table" class="collapse show" style="transition:1ms;">
                        <div style="width:100%; border-top: 2px solid #000;">
                            <a href="./clientTable.php" class="nav-link"><h3 class="fw-bold text-center text-Blue my-1">Client</h3></a>
                        </div>
                        <table class="table table-blue table-responsive table-hover text-center border border-1 border-start-0 border-end-0 border-dark">
                            <thead class="fs-5 text-Blue">
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Coach Name</th>
                            </thead>
                            <tbody>
<?php
                        $clientQuerry = "SELECT * FROM PARTICIPATION AS P JOIN COACH AS co ON P.userID = co.userID JOIN EMPLOYEE AS E ON co.employeeID = E.employeeID;" ;
                        $clientList = mysqli_query($conn, $clientQuerry);
                        $clientResult = mysqli_num_rows($clientList);
                        if($clientResult > 0){
                            while($row = mysqli_fetch_assoc($clientList)) {
                                $clientViewID = $row['userID'];
                                echo"<tr scope=\"row\">";
                                echo "<th><a href = \"./includes/clientViewBE.php?id=$clientViewID&role=client\" class= \"nav-link\">".$row['userID']."</a></th>";
                                echo "<th><a href = \"./includes/clientViewBE.php?id=$clientViewID&role=client\" class= \"nav-link\">".$row['fname']." ".$row['lname']."</a></th>";
                                echo "<th><a href = \"./includes/clientViewBE.php?id=$clientViewID&role=client\" class= \"nav-link\">".$row['empfname']." ".$row['emplname']."</a></th>"."</tr>";
                            }}
                        echo "</tbody></table></div>" ;
                        mysqli_free_result($clientList);

                /********************************END CLIENT BLOCK*********************************/

?>



                    <div id="employee-table" class="collapse" style="transition:1ms;">
                        <div style="width:100%; border-top: 2px solid #000;">
                            <a href="./employeeTable.php" class="nav-link"><h3 class="fw-bold text-center text-Blue my-1">Employee</h3></a>
                        </div>
                        <table class="table table-blue table-responsive table-hover text-center border border-1 border-start-0 border-end-0 border-dark">
                            <thead class="fs-5 text-Blue">
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Role</th>
                            </thead>

<?php
                            $employeeQuerry = "SELECT * FROM EMPLOYEE ;" ;
                            $employeeList = mysqli_query($conn, $employeeQuerry);
                            $employeeResult = mysqli_num_rows($employeeList);
                            if($employeeResult > 0){
                                while($row = mysqli_fetch_assoc($employeeList)) {
                                    $empViewID = $row['employeeID'];
                            /* "./includes/employeeViewBE.php?id=$empViewID" will create link with unique employee ID for employeeViewBE.php*/
                            echo "<tbody>";
                                echo "<tr scope= \" row \">";
                                echo "<th><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['employeeID']."</a></th>";
                                echo "<th><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empfname']. " " . $row['empMI'] . " " . $row['emplname']."</a></th>";
                                echo "<th><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['employeeRole']."</a></th>\n";
                                echo "</tr>\n";
                                echo " </tbody>";

                                }}
                            echo "</table>";
                            echo "</div>\n</div>\n</div>\n</div>\n</body>\n</html> ";
                            mysqli_free_result($employeeList);
                /********************************END EMPLOYEE BLOCK*********************************/
?>