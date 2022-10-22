<?php
//check any mistake when we create new account
if(isset($_POST['signup-submit'])){

  
  require 'dbh.inc.php';
  require 'gen_activeC.inc.php';

  //fetch info to the database form

  $email            =$_POST['email'];
  $password         =$_POST['password'];
  $passwordConfirm  =$_POST['confirmPassword'];
  $fname            =$_POST['fname'];
  $mname            =$_POST['mname'];
  $lname            =$_POST['lname'];
  $bday             =$_POST['bday'];
  $gender           =$_POST['gender'];
  $username         =$_POST['email'];
  $address          =$_POST['address'];
  $city             =$_POST['city'];
  $state            =$_POST['state'];
  $zip              =$_POST['zip'];
  $phone            =$_POST['phone'];
  $expiry = 1*24*60*60;


  //check error when users put some input
  if(empty($email) ||empty($password) ||empty($passwordConfirm)||empty($fname)
  ||empty($lname)||empty($bday)||empty($gender)||empty($address))
  {
    //check empty fields
    // redirect to newAccount page
    header ("Location: ../newAccount.php?error=emptyfields&email=".$email."&lname=".$lname);
    // //stop the code to run
     exit();
  }
  else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    // check email validation
    header ("Location: ../newAccount.php?error=invaidmail&email=".$email);
     exit();
  }
  else if ($password !== $passwordConfirm){
    // check password match with confirm password
    header ("Location: ../newAccount.php?error=passwordcheck&email=".$email);
     exit();
  }
  else
  {
    //check email have taken or not
    //prepared statement to secure database
    $sql="SELECT userID, email FROM USERTAB WHERE email=?";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header ("Location: ../newAccount.php?error=sqlerror");
      exit();
    }
    else{
      //bind info
      mysqli_stmt_bind_param($stmt,'s',$email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck=mysqli_stmt_num_rows($stmt);
      if($resultCheck>0){
        header ("Location: ../newAccount.php?error=emailtaken&mail=".$email);
        exit();
      }
      else{
        $sql="INSERT INTO USERTAB (fname,lname,MI,DOB,gender,address,city,state,zipcode,email,newUserPassword,phone,activation_code,activation_expiry)
	  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header ("Location: ../newAccount.php?error=sqlerror");
          exit();
        }
        else
        {
          //hash the password to make secure password
          $hashedPwd=password_hash($password,PASSWORD_DEFAULT);
	    $hashedCode=password_hash($activationCode,PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt,'ssssssssissssi',$fname,$lname,$mname,$bday,$gender,$address,$city,$state,$zip,$email,$hashedPwd,$phone,$hashedCode,$expiry);
          mysqli_stmt_execute($stmt);
	    
	    //Grab the userID associated with the information and insert into other tables

	    $sql="SELECT * FROM USERTAB WHERE email=?";
    	    $stmt= mysqli_stmt_init($conn);
    	    if(!mysqli_stmt_prepare($stmt,$sql)){
      		header ("Location: ../newAccount.php?error=sqlerror");
      		exit();
     	    }
          else{
     			//bind info
			//looks into db and sees if email is present
      		mysqli_stmt_bind_param($stmt,'s',$email);
      		mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			//check if we exactly get result from database
      		if($row = mysqli_fetch_assoc($result)){
        			$sql="INSERT INTO LOGIN (userID,loginEmail,loginPassword)
	  				VALUES(?,?,?);";
				$sql2="INSERT INTO PARTICIPATION (userID) 
					VALUES(?);";
        			$stmt=mysqli_stmt_init($conn);
				$stmt2=mysqli_stmt_init($conn);
        			if(!mysqli_stmt_prepare($stmt,$sql)){
          				header ("Location: ../newAccount.php?error=sqlerror");
          				exit();
        			}
        			else
        			{	
					if(!mysqli_stmt_prepare($stmt2,$sql2)){
          					header ("Location: ../newAccount.php?error=sqlerror");
          					exit();
        				}
					
					mysqli_stmt_bind_param($stmt,"iss",$row['userID'],$email,$row['newUserPassword']);
					mysqli_stmt_bind_param($stmt2,"i",$row['userID']);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_execute($stmt2);

					//create account entry
					$sql="SELECT * FROM LOGIN WHERE loginEmail=?";
    	    				$stmt= mysqli_stmt_init($conn);
					$stmt= mysqli_stmt_init($conn);
    	    				if(!mysqli_stmt_prepare($stmt,$sql)){
      					header ("Location: ../newAccount.php?error=sqlerror");
      					exit();
     	    				}
					else{
						//bind info
						//looks into db and sees if email is present
      					mysqli_stmt_bind_param($stmt,'s',$email);
      					mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						//check if we exactly get result from database
						if($row = mysqli_fetch_assoc($result)){
							$sql="INSERT INTO ACCOUNT(loginRoleID) VALUES (?)";
							$stmt=mysqli_stmt_init($conn);
							if(!mysqli_stmt_prepare($stmt,$sql)){
          							header ("Location: ../newAccount.php?error=sqlerror");
          							exit();
        						}
							else{
								mysqli_stmt_bind_param($stmt,"i",$row['loginRoleID']);
								mysqli_stmt_execute($stmt);

								$activation_link = "http://localhost/dashboard/csc190DBdemo/activate.php?email=$email&activation_code=$activationCode";
								$to = $email;
								$subject = "Please activate your account";
								$message = "Hi, Please click the following link to activate your account: 
										$activation_link";
								$headers = "From: emailchickennode@gmail.com\r\n";
								if(mail($to,$subject,$message,$headers)){
									header('Location: ../login.php');
									exit;
								}
								else{
									header("Location: ../newAccount.php?error=emailfail");
									exit();
								}

							}
						}
						else{
							header ("Location: ../newAccount.php?error=nouseremail");
        						exit();
						}
					}
				}
      		}
      		else{
				header ("Location: ../newAccount.php?error=nouseremail");
        			exit();
			}
		}
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  //close database connect tion
  mysqli_close($conn);

}
else{
  //send back to newAccount page
  header ("Location: ../newAccount.php");
  exit();
}