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
                        <a class="nav-link text-white fs-4 mx-4" href="./login.php">Logout</a>
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
                    <a href="#" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>
                      <li class="nav-item bg-Blue mb-md-1">
                        <a href="#" class="nav-link text-white">
                            Personal Information
                        </a>
                      </li>
                      <li class="nav-item bg-Blue mb-md-1">
                        <a href="./reportActivity.php" class="nav-link text-white">
                            Activity Reporting
                        </a>
                      </li>
                      <li class="nav-item bg-Blue mb-md-1">
                        <a href="#" class="nav-link text-white">
                            Report Chart
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
                    <a href="#" class="btn btn-action btn-lg fs-6">Search</a>
                    <a href="#" class="btn btn-action btn-lg fs-6" data-bs-toggle="collapse" data-bs-target="#employee-table,#client-table">Employee</a>
                    <a href="#" class="btn btn-action btn-lg fs-6" data-bs-toggle="collapse" data-bs-target="#client-table,#employee-table">Client</a>
                    <a href="#" class="btn btn-action btn-lg fs-6">Schedule</a>
                </div>
        </div>

        <div class="d-flex">
            <div class="d-flex flex-column my-5 mx-5">
                <div class="header-client-list">
                    <h3 class="fw-bold text-center text-Blue my-1">New Client</h3>
                </div>
                <div class="box-client-list text-center overflow-scroll">
    
                    <div class="dropdown-center">
                        <p class="btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            New Client A
                        </p>
                        <div class="dropdown-menu " style="width:300px;">
                            <p class="dropdown-item">ID: #2022</p>
                            <p class="dropdown-item">Last Name: A</p>
                            <p class="dropdown-item">First Name: New Client</p>
                            <p class="dropdown-item">DOB: 06/19/1973</p>
                            <p class="dropdown-item">Address: 123 Main Street</p>
                            <p class="dropdown-item">Phone 916-111-222</p>
                            <p class="dropdown-item">Email: newclientA@cmc.com</p>
                        </div>
                    </div>
    
                    <div class="dropdown-center">
                        <p class="btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            New Client B
                        </p>
                        <div class="dropdown-menu " style="width:300px;">
                            <p class="dropdown-item">ID: #2023</p>
                            <p class="dropdown-item">Last Name: B</p>
                            <p class="dropdown-item">First Name: New Client</p>
                            <p class="dropdown-item">DOB: 11/22/1958</p>
                            <p class="dropdown-item">Address: 146 S Street</p>
                            <p class="dropdown-item">Phone 916-333-444</p>
                            <p class="dropdown-item">Email: newclientB@cmc.com</p>
                        </div>
                    </div>
    
                    <div class="dropdown-center">
                        <p class="btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             New Client C
                        </p>
                        <div class="dropdown-menu " style="width:300px;">
                            <p class="dropdown-item">ID: #2024</p>
                            <p class="dropdown-item">Last Name: C</p>
                            <p class="dropdown-item">First Name: New Client</p>
                            <p class="dropdown-item">DOB: 01/11/1968</p>
                            <p class="dropdown-item">Address: 100 N Street</p>
                            <p class="dropdown-item">Phone 916-555-666</p>
                            <p class="dropdown-item">Email: newclientC@cmc.com</p>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="d-flex flex-column my-5 me-5 border border-2 border-top-0 border-dark"  style="width:100%; background-color: #E4F5F8;">
                <div id="client-table" class="collapse show" style="transition:1ms;">
                    <div style="width:100%; border-top: 2px solid #000;">
                        <h3 class="fw-bold text-center text-Blue my-1">Client</h3>
                    </div>
                    <table class="table table-blue table-responsive text-center border border-1 border-start-0 border-end-0 border-dark">
                        <thead class="fs-5 text-Blue">
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Coach Name</th>
                        </thead>
                        <tbody>
                            <tr scope="row">
                                <th>1</th>
                                <th>John Cena</th>
                                <th>Steven M</th>
                            </tr>
    
                            <tr scope="row">
                                <th>2</th>
                                <th>Jame N</th>
                                <th>Michael K</th>
                            </tr>
    
                            <tr scope="row">
                                <th>3</th>
                                <th>Anna D</th>
                                <th>Jenna F</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="employee-table" class="collapse" style="transition:1ms;">
                    <div style="width:100%; border-top: 2px solid #000;">
                        <h3 class="fw-bold text-center text-Blue my-1">Employee</h3>
                    </div>
                    <table class="table table-blue table-responsive text-center border border-1 border-start-0 border-end-0 border-dark">
                        <thead class="fs-5 text-Blue">
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Role</th>
                        </thead>
                        <tbody>
                            <tr scope="row">
                                <th>1</th>
                                <th>Martin L</th>
                                <th>Manager</th>
                            </tr>
    
                            <tr scope="row">
                                <th>2</th>
                                <th>Alan</th>
                                <th>Engineer</th>
                            </tr>
    
                            <tr scope="row">
                                <th>3</th>
                                <th>Jame N</th>
                                <th>Supervisor</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
              
        </div>
        
</div>
   
</body>
</html>