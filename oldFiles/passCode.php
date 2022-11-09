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
         
        // Taking email value from input
        $email = $_REQUEST['email'];
		
	  $sql = "SELECT loginEmail FROM login";
	  $result = $conn->query($sql);

	  if (mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()){
			if($row["loginEmail"] == $email){
				$to = $email;
				$subject = "Hello world";
				$txt = "You forgot";
				$headers = "From: yourdatabase@example.com"."\r\n".
						"CC: bob@example.com";
				mail($to,$subject,$txt,$headers);
			}
		}
	} else{
		echo "0 results";
	}		
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>