<?php
/*Secure session*/
    session_start();
    if (!isset($_SESSION['adminLogin'])){
          //if error, force a logout
         session_unset();
         session_destroy();
         header ("Location: ./LoginAd.php");
         exit();
     }

    require './dbh.inc.php';

    /*Get employee ID from the link on dashboard*/
     $id = $_GET['id'];

//Checks to see which name of employee is selected
$sql = $conn -> prepare("SELECT * FROM employee WHERE employeeID = ?;"); //*****Modify this so to select an employee********
$sql -> bind_param("i", $id);
$sql -> execute();
$empViewResult = $sql->get_result();

if($empViewResult -> num_rows > 0){
    $row = $empViewResult -> fetch_assoc();
    $_SESSION['empViewID'] = $row['employeeID'];
    $_SESSION['empViewfname'] = $row['empfname'];
    $_SESSION['empViewlname'] = $row['emplname'];
    $_SESSION['empViewMI'] = $row['empMI'];
    $_SESSION['empViewDOB'] = $row['empDOB'];
    $_SESSION['empViewStreet'] = $row['empStreet'];
    $_SESSION['empViewCity'] = $row['empCity'];
    $_SESSION['empViewState'] = $row['empState'];
    $_SESSION['empViewCounty'] = $row['empCounty'];
    $_SESSION['empViewZipcode'] = $row['empZipcode'];
    $_SESSION['empViewPhone'] = $row['empPhone'];
    $_SESSION['empViewGender'] = $row['empGender'];
    $_SESSION['empViewRaces'] = $row['empRaces'];
    $_SESSION['empViewEmail'] = $row['email'];
    $_SESSION['empViewRole'] = $row['employeeRole'];
    $_SESSION['empViewProgram'] = $row['programMember'];
    header("Location: /CSC_190_Product/empInfoView.php");
    /*echo $_SESSION['empViewID'];
    echo $_SESSION['empViewfname'];
    echo $_SESSION['empViewlname'];
    echo $_SESSION['empViewMI'];
    echo$_SESSION['empViewDOB'];
    echo $_SESSION['empViewStreet'];
    echo $_SESSION['empViewCity'];
    echo $_SESSION['empViewState']; 
    echo $_SESSION['empViewCounty'];
    echo $_SESSION['empViewZipcode'];
    echo $_SESSION['empViewPhone'];
    echo $_SESSION['empViewGender'];
    echo $_SESSION['empViewRaces'];
    echo $_SESSION['empViewEmail'];
    echo $_SESSION['empViewRole'];
echo $_SESSION['empViewProgram'];*/
}

else {
    echo "<script>alert('Fetching Error.');</script>";
    echo "<script>setTimeout(function(){window.location.href='../Administration1-3.php'}, 300);</script>";
    exit();
    header("Location ./Administration1-3.php");
}

/*$result = mysqli_query($conn, $sql);

//Checks to see if name matches on database
if (mysqli_num_rows($result) > 0) {
	//Retrieve the data of employee 

    //<-- Demographic Information -->
	$row = mysqli_fetch_assoc($result);
    $employee_id = $row["employeeID"];
    $first_name = $row["empfname"];
    $middle_name = $row["empMI"];
    $last_name = $row["emplname"];
    $date_of_birth = $row["empDOB"];
    $gender = $row["empGender"];
    $race = $row["empRaces"];

    //<-- Address -->
    $street = $row["empStreet"];
    $city = $row["empCity"];
    $country = $row["empCountry"];
    $state = $row["empState"];
    $zipcode = $row["empZipcode"];
    $phone = $row["empPhone"];
    $email = $row["email"];

    //<-- Role and Program Member -->
    $role = $row["employeeRole"];
    $programMember = $row["programMember"];

} else {
    echo "Employee not found.";
}*/

?>