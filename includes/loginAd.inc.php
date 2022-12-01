<?php
if(isset($_POST['login-submit'])){
  //connection to database
  require 'dbh.inc.php';

  $email      =$_POST['email'];
  $password   =$_POST['password'];

  if(empty($email)||empty($password)){
    header ("Location: ../loginAd.php?error=emptyfields");
    exit();
  }
  else
  {
    //inner join select statement
    //$sql="SELECT * FROM USERTAB u,ACCOUNT a, LOGIN l WHERE u.userID=l.userID AND l.loginRoleID =a.loginRoleID"
    //$sql= "SELECT * FROM USERTAB u INNER JOIN LOGIN l ON u.userID=l.user ID INNER JOIN ACCOUNT a ON a.loginRoleID=l.loginRoleID WHERE a.email=?";
    $sql= "SELECT userPassword FROM EMPLOYEE WHERE email=?";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header ("Location: ../loginAd.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt,'s',$email);
      //get result from database
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      //check if we exactly get result from databse
      if($row = mysqli_fetch_assoc($result)){
        //take password from databse  to login in the login page
	    $pwdCheck= password_verify($password,$row['newUserPassword']);
	
	    if($pwdCheck==false){
      	    header ("Location: ../loginAd.php?error=wrongPassword");
          	exit();
    	}
        else{
          	session_start();
          	$_SESSION['userID']=$row['userID'];
	
      	    header ("Location: ../loginAd.php?login=success");
          	exit();
        }
		
      }
      else{
        header ("Location: ../loginAd.php?error=nouseremail");
        exit();
      }

    }
  }

}
else
{
  //send back to login page
  header ("Location: ../loginAd.php");
  exit();
}