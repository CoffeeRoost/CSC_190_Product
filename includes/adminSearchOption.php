<?php
    require 'dbh.inc.php';  
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
                            <a class="nav-link text-white fs-4 mx-4" href="./logout.inc.php">Logout</a>
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
                            <a href="#" class="nav-link text-white">
                                Personal Information
                            </a>
                          </li>
                          <li class="nav-item bg-Blue mb-md-1">
                            <a href="./reportActivityAD.php" class="nav-link text-white">
                                Activity Reporting
                            </a>
                          </li>
                          <li class="nav-item bg-Blue mb-md-1">
                            <a href="./grantReport.php" class="nav-link text-white">
                                Grant Report
                            </a>
                          </li>
                      </ul>
                </div> 
            </div>

    <!--Employee Search Option-->

    <div class="container my-5">
    <div style="text-align: center;">
    <form method="post">
        <input type="text" placehodler="Search data" name="search">
        <button class="btn btn-action btn-sm fs-6" name="submit">Enter Employee Name/ID</button>
    </form>
    <div class="container my-5">
        <table class="table">
            <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    
                    $sql="SELECT * from EMPLOYEE WHERE employeeID='$search' OR empfname='$search' OR emplname='$search'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    if(mysqli_num_rows($result)>0){
                    echo  '<thead>
                    <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Middle Name</th>
                    </tr>
                    </thead>';
                    $row=mysqli_fetch_assoc($result);
                    echo '<tbody>
                    <tr>
                    <td>'.$row['employeeID'].'</td>
                    <td>'.$row['empfname'].'</td>
                    <td>'.$row['emplname'].'</td>
                    <td>'.$row['empMI'].'</td>
                    </tr>
                    </tbody>';
                }else{
                    echo '<h2 class=text-danger>Data Not Found</h2>';
                }
                }

            }

            ?>
        </table>
    </div>
</div>