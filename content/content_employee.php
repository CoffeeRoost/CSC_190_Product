<div class="d-flex">
    <div class="d-flex flex-column align-items-center mx-5">
                    <div class="d-flex m-5  border border-info rounded-pill w-search-cover">
                        <img src="./image/seachIcon.png" alt="search icon" class="search-icon m-2" >
                        <form class="my-1" action="">
                            <input type="text" placeholder="Client Name" class="w-search-bar m-1">
                        </form>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column me-5 my-5">
                            <div class="header-client">
                                <h3 class="fw-bold text-center text-Blue my-1">New Client</h3>
                            </div>
                            <div class="box-client text-center overflow-scroll">
    <?php
                        /* Display information of new client. New Clients have not been coach*/
                        $newClient = "SELECT P.userID, P.fname, P.lname, P.email, P.DOB, P.primaryPhone,
                        Addr.street, Addr.city, Addr.state, Addr.zipcode
                        FROM PARTICIPATION AS P JOIN ADDRESS AS Addr ON P.userID = Addr.userID
                        WHERE P.userID NOT IN (SELECT co.userID FROM COACH AS co);";
                        $newClientList = mysqli_query($conn, $newClient);
                        $newClientResult = mysqli_num_rows($newClientList);

                        if($newClientResult > 0){
                            while($row = mysqli_fetch_assoc($newClientList)) {
                                echo"<div class=\"dropdown-center\">";
                                echo"<p class=\"btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">";
                                echo $row['fname']. " ". $row['lname'];
                                echo"</p>";
                                echo"<div class=\"dropdown-menu\" style=\"width:300px;\">";
                                    echo"<p class=\"dropdown-item\">ID: ".$row['userID']."</p>";
                                    echo"<p class=\"dropdown-item\">Last Name: ".$row['lname']."</p>";
                                    echo"<p class=\"dropdown-item\">First Name: ".$row['fname']."</p>";
                                    echo"<p class=\"dropdown-item\">DOB: ".$row['DOB']."</p>";
                                    echo"<p class=\"dropdown-item\">Street: ".$row['street'].", ".$row['city']."</p>";
                                    echo"<p class=\"dropdown-item\">State: ".$row['state']."</p>";
                                    echo"<p class=\"dropdown-item\">Zipcode: ".$row['zipcode']."</p>";
                                    echo"<p class=\"dropdown-item\">Phone: ".$row['primaryPhone']."</p>";
                                    echo"<p class=\"dropdown-item\">Email: ".$row['email']."</p>";
                            echo "</div>";
                            echo"</div>";
                            }}

                    echo "</div>";
                    echo"</div>";
                    /********************************END NEW CLIENT BLOCK *********************************/
    ?>

                        <div class="d-flex flex-column my-5">
                            <div class="header-client-list">
                                <h3 class="fw-bold text-center text-Blue my-1">Client list</h3>
                            </div>
                            <div class="box-client-list text-center overflow-scroll">

                                <div class="dropdown-center">
                                    <p class="btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Client A
                                    </p>
                                    <div class="dropdown-menu " style="width:300px;">
                                        <p class="dropdown-item">ID: #2022</p>
                                        <p class="dropdown-item">Last Name: A</p>
                                        <p class="dropdown-item">First Name: Client</p>
                                        <p class="dropdown-item">DOB: 06/19/1973</p>
                                        <p class="dropdown-item">Address: 123 Main Street</p>
                                        <p class="dropdown-item">Phone 916-111-222</p>
                                        <p class="dropdown-item">Email: clientA@cmc.com</p>
                                    </div>
                                </div>

                                <div class="dropdown-center">
                                    <p class="btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Client B
                                    </p>
                                    <div class="dropdown-menu " style="width:300px;">
                                        <p class="dropdown-item">ID: #2023</p>
                                        <p class="dropdown-item">Last Name: B</p>
                                        <p class="dropdown-item">First Name: Client</p>
                                        <p class="dropdown-item">DOB: 11/22/1958</p>
                                        <p class="dropdown-item">Address: 146 S Street</p>
                                        <p class="dropdown-item">Phone 916-333-444</p>
                                        <p class="dropdown-item">Email: clientB@cmc.com</p>
                                    </div>
                                </div>

                                <div class="dropdown-center">
                                    <p class="btn-newClient dropdown-toggle rounded-pill  text-white my-1 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Client C
                                    </p>
                                    <div class="dropdown-menu " style="width:300px;">
                                        <p class="dropdown-item">ID: #2024</p>
                                        <p class="dropdown-item">Last Name: C</p>
                                        <p class="dropdown-item">First Name: Client</p>
                                        <p class="dropdown-item">DOB: 01/11/1968</p>
                                        <p class="dropdown-item">Address: 100 N Street</p>
                                        <p class="dropdown-item">Phone 916-555-666</p>
                                        <p class="dropdown-item">Email: clientC@cmc.com</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
</div>