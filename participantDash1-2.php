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
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <title>California Mobility Center</title>
</head>
<body>
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
                            <a href="#" class="nav-link text-white">
                              Feature 3
                            </a>
                          </li>
                      </ul>
                </div>
            </div>

            <div class="d-flex flex-column align-items-center mx-5">
                <div class="d-flex justify-center">
                    <!--Participant information-->
                    <div id="participant_Info" style="width:400px; height:230px; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse show">
                        <div  class="row mx-3 my-2">
                            <div class="col-3 fw-bold">ID</div>
                            <div class="col-6 text-center">1234</div>
                            <div class="col-1 ms-5">
                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#participant_edit,#participant_Info">Edit</a>
                            </div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">First Name</div>
                            <div class="col-7">Patrick</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Last Name</div>
                            <div class="col-7">Star</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Email</div>
                            <div class="col-7">PatrickS@cmc.com</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Address</div>
                            <div class="col-7">1234 Main street, San Francisco, CA</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Zip Code</div>
                            <div class="col-7">95112</div>
                        </div>
                    </div>

                    <!--Participant information Edit-->
                        <div  id="participant_edit" style="width:400px; height:230px; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse">
                            <div  class="row mx-3 my-2">
                                <div class="col-3 fw-bold">ID</div>
                                <div class="col-6 text-center">1234</div>
                                <div class="col-1 ms-5">
                                    <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#participant_Info,#participant_edit">Save</a>
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">First Name</div>
                                <div class="col-7">
                                    <input type="text" name="firstName" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="Patrick">
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Last Name</div>
                                <div class="col-7">
                                    <input type="text" name="lastName" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="Star">
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Email</div>
                                <div class="col-7">
                                    <input type="text" name="email" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="PatrickS@cmc.com">
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Address</div>
                                <div class="col-7">
                                    <input type="text" name="address" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="1234 Main street, San Francisco, CA">
                                </div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Zip Code</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" placeholder="95112">
                                </div>
                            </div>
                        </div>

                    <!-- Participant File Submit -->
                    <div style="width:300px;" class="bg-lightBlue my-5 mx-3 d-flex justify-content-center">
                        <div class="file-upload my-4 p-4">
                            <label for="file-submit"><img src="./image/file.png" alt="file upload" style="width:75px; height:75px;"></label>
                            <input type="file" id="file-submit"/>
                            <p>Submit File</p>
                        </div>
                    </div>
                </div>

                <!--Information Tab-->
                <div style="width:95%;">
                    <ul class="nav nav-tabs">
                        <li class="nav-item rounded-top border border-info">
                          <button class="nav-link active text-Blue" id="" data-bs-toggle="tab" data-bs-target="#contact-tab" type="button">Contact/Demographics</button>
                        </li>
                        <li class="nav-item rounded-top border border-info">
                            <button class="nav-link text-Blue" id="" data-bs-toggle="tab" data-bs-target="#training-tab" type="button">Training</button>
                        </li>
                        <li class="nav-item rounded-top border border-info">
                            <button class="nav-link text-Blue" id="" data-bs-toggle="tab" data-bs-target="#career-tab" type="button">Employee/Career</button>
                        </li>
                        <li class="nav-item rounded-top border border-info">
                            <button class="nav-link text-Blue" id="" data-bs-toggle="tab" data-bs-target="#supportService-tab" type="button">Support Services</button>
                        </li>
                    </ul>
                      <div class="tab-content border border-info bg-lightBlue">

                        <!-- Contact/Demographics Tab  -->
                        <div class="tab-pane fade show active" id="contact-tab" aria-labelledby="contact-tab" tabindex="0">

                         <!-- Display some personal information from the database tables using php -->
                          <?php
                          require_once ('includes/dbh.inc.php');
                        //   write a query to retrieve data
                          $query = "SELECT part.fname,part.lname,part.email,a.street,a.city,a.state,a.zipcode
                           FROM participation part, address a where part.userID=a.userID";
                        //    execute the query
                          $select_user_information_query= mysqli_query($conn,$query);

                        // Fetch the data
                          while($row=mysqli_fetch_assoc($select_user_information_query)){
                            $fname= $row['fname'];
                            $lname=$row['lname'];
                            $email= $row['email'];
                            $street= $row['street'];
                            $city= $row['city'];
                            $state= $row['state'];
                            $zipcode=$row['zipcode'];
                            ?>
                           <!-- Display the data -->
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">First Name</div>
                                <div class="col-7"><?php echo $fname?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Last Name</div>
                                <div class="col-7"><?php echo $lname?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Email</div>
                                <div class="col-7"><?php echo $email?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Address</div>
                                <div class="col-7"><?php echo $street?>,<?php echo $city?>,<?php echo $state?></div>
                            </div>
                            <div  class="row mx-3 my-2">
                                <div class="col fw-bold">Zip Code</div>
                                <div class="col-7"><?php echo $zipcode?></div>
                            </div>
                            <br>
                            <br>


                         <?php }



                          ?>


                        </div>

                        <!-- Training Tab  -->

                        <div class="tab-pane fade" id="training-tab" tabindex="0">
                            <p class="mx-5 my-1">Training 1</p>
                            <p class="mx-5 my-1">Training 2</p>
                            <p class="mx-5 my-1">Training 3</p>
                        </div>
                        <div class="tab-pane fade" id="career-tab"   tabindex="0">
                            <p class="mx-5 my-1">Engineering</p>
                            <p class="mx-5 my-1">Developer</p>
                            <p class="mx-5 my-1">Data Scientist</p>
                        </div>

                        <div class="tab-pane fade" id="supportService-tab"   tabindex="0">
                            <p class="mx-5 my-1">STEM</p>
                            <p class="mx-5 my-1">Cal Fresh</p>
                            <p class="mx-5 my-1">Medi-Cal</p>
                        </div>
                      </div>
                </div>

                <div class="border border-top-0 border-info" style="width:95%;">
                    <p class="m-1">Notes</p>
                    <textarea style="width:100%; height:100px;" class="border border-0 p-1 outline-none" ></textarea>
                </div>
            </div>
</body>
</html>