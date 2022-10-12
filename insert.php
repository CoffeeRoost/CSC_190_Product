<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => csc190
        $conn = mysqli_connect("localhost", "root", "", "csc190");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
	  $confirmPassword = $_REQUEST['confirmPassword'];
        $fname = $_REQUEST['fname'];
        $mname = $_REQUEST['mname'];
        $lname = $_REQUEST['lname'];
	  $bday = $_REQUEST['bday'];
        $gender = $_REQUEST['gender'];
        $address = $_REQUEST['address'];
	  $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $zip = $_REQUEST['zip'];
        $phone = $_REQUEST['phone'];
         
        // Performing insert query execution
        // here our table name is college
	  $sql = "INSERT INTO usertab (userID, fname, lname, MI, DOB, gender, address, city, state, zipcode, email, phone) 
		VALUES ('two','$fname','$lname','$mname','$bday','$gender','$address','$city','$state','$zip','email','phone');";

	  $sql2 = "INSERT INTO employee (userID, EmployeeID) VALUES('two','two2');";
	  
	  $sql3 = "INSERT INTO participation (userID, ParticipationID) VALUES ('two','two22');";

	  $sql4 = "INSERT INTO admin (userID, AdminID) VALUES('two','two222');";
	  
	  $sql5 = "INSERT INTO account (loginRoleID) VALUES ('three');";

	  $sql6 = "INSERT INTO login (loginRoleID, userID, loginEmail, loginPassword) 
		VALUES ('three','two','$email','$password');";
         
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5) && mysqli_query($conn, $sql6)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
 
            echo nl2br("\n$fname\n $lname\n "
                . "$gender\n $address\n $email");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>