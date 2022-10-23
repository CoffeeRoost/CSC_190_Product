<?php

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET'){

	require 'C:\xampp\htdocs\dashboard\csc190DBdemo\includes\dbh.inc.php';
	require 'C:\xampp\htdocs\dashboard\csc190DBdemo\filter.php';
	
	[$inputs, $errors] = filter($_GET,[
		'email' => 'string | required | email',
		'activation_code' => 'string | required'
	]);

	if(!$errors){
		$sql= "SELECT * FROM USERTAB u INNER JOIN LOGIN l ON u.userID=l.userID INNER JOIN ACCOUNT a ON a.loginRoleID=l.loginRoleID WHERE u.email=?";
    		$stmt= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
      		header ("Location: login.php?error=sqlerror");
      		exit();
    		}
		else{
			mysqli_stmt_bind_param($stmt,'s',$inputs['email']);
      		//get result from database
     			mysqli_stmt_execute($stmt);
      		$result = mysqli_stmt_get_result($stmt);
      		//check if we exactly get result from database
			if($row = mysqli_fetch_assoc($result)){
				$actCheck=password_verify($inputs['activation_code'],$row['activation_code']);
				if($actCheck==false){
					header("Location: index.php?error=wrongActivationCode");
					exit();
				}
				else{
					$sql= 'UPDATE USERTAB SET status = 1, activated_at = CURRENT_TIMESTAMP WHERE email=?';
					$stmt= mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: index.php?error=sqlerror");
						exit();
					}
					else{
						mysqli_stmt_bind_param($stmt,'s',$row['email']);
						mysqli_stmt_execute($stmt);
						
						header("Location: login.php");
						exit;
					}
				}	
			}
			else{
				header ("Location: login.php?error=nouseremail");
        			exit();
			}
		}
	}
	
	mysqli_stmt_close($stmt);
	//close database connection
	mysqli_close($conn);
}
else{
	//send back to newAccount page
	header ("Location: newAccount.php?error=invalidActivationLink");
 	exit();
}

