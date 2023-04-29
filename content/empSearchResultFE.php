<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (!isset($_SESSION['adminLogin'])){
             //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php");
            exit();
    }
    require './includes/dbh.inc.php';
?>

<div class="container-fluid">
<h3 class="d-flex justify-content-center text-info mb-3">LIST OF EMPLOYEE</h3>
<div class="d-flex flex-row-reverse my-3"><a href="./adminSearchOption.php" class="nav-link text-white border rounded-pill bg-Blue p-2">New search</a></div>
    <div class="table-responsive border" style="max-height: 1000px; overflow-y: auto;">
        <table class="table table-info table-hover">
            <thead class="sticky-top">
                <tr>
                <th scope="col" class="col-1 text-center">ID</th>
                <th scope="col" class="col-2 text-center">Name</th>
                <th scope="col" class="col-4 text-center">Address</th>
                <th scope="col" class="col-1 text-center">Phone</th>
                <th scope="col" class="col-2 text-center">Email</th>
                <?php
                    if(!empty($_SESSION['empSearchRace'])){
                        echo "<th scope=\"col\" class=\"col-1 text-center\">Ethnicity</th>";
        
                    }
        
                    if(!empty($_SESSION['empSearchGender'])){
                        echo "<th scope=\"col\" class=\"col-1 text-center\">Gender</th>";
                    }
        
                    if(!empty($_SESSION['empSearchProgramMember'])){
                        echo "<th scope=\"col\" class=\"col-2 text-center\">Program Member</th>";
                    } 
                ?>
                </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_SESSION['searchingQuery'])){

                    $stmt = $conn -> prepare($_SESSION['searchingQuery']);
                    $stmt -> bind_param($_SESSION['prepareTypes'], ...$_SESSION['param']);

                    if($stmt->execute()){
                        $result = $stmt -> get_result();
                        if($result -> num_rows > 0){
                            while($row = $result -> fetch_assoc()){
                                $empViewID = $row['employeeID'];
                                echo "<tr>";
                                    echo "<th class =\"col-1 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['employeeID']."</a></th>";
                
                                    echo "<td class=\"col-2 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empfname']. " " . $row['empMI'] . " " . $row['emplname']."</a></td>";
                
                                    echo "<td class=\"col-3 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empStreet']. " " . $row['empCity'] . ", " . $row['empCounty'].", ".$row['empState']." ". $row['empZipcode']."</a></td>";
                
                                    echo "<td class=\"col-1 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empPhone']."</a></td>";
                
                                    echo "<td class=\"col-2 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['email']."</a></td>";
        
                                    if(!empty($_SESSION['empSearchRace'])){
                                        echo "<td class=\"col-1 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empRaces']."</a></td>";
                        
                                    }
                        
                                    if(!empty($_SESSION['empSearchGender'])){
                                        echo "<td class=\"col-1 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['empGender']."</a></td>";
                                    }
                        
                                    if(!empty($_SESSION['empSearchProgramMember'])){
                                        echo "<td class=\"col-1 text-center\"><a href = \"./includes/employeeViewBE.php?id=$empViewID\" class= \"nav-link\">".$row['programMember']."</a></td>";
                                    } 
                                echo "</tr>";
                            }
                            $stmt -> close();
                            $conn -> close();
                        }
                        else {
                            echo '<tr>';
                            echo '<td colspan="6" class ="text-center"><h2>Employee Not Found</h2></td>';
                            echo '</tr>';
                            $stmt -> close();
                            $conn -> close();
                        }
                    }

                    else{
                        header("Location ../adminSearchOption.php");
                        exit();
                    }
                   
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
