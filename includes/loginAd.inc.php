<?php
if(isset($_POST['login-submit'])){

  //connection to database
  require 'dbh.inc.php';

 if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
      $email         = $_POST['email'];
      $empPassword   = $_POST['password'];
      $role          = $_POST['role'];
    

     if (empty($email) || empty($empPassword)){
        header ("Location: ../loginAd.php?error=emptyfields");
        exit();
      }

     else {
          if($role === "Admin"){
              $stmt = $conn -> prepare("SELECT * FROM EMPLOYEE AS E JOIN ADMIN AS A ON E.employeeID = A.employeeID WHERE email = ? AND userPassword = ? ;");
              $stmt -> bind_param("ss", $email, $empPassword);
              $stmt -> execute();
              $adminResult = $stmt->get_result();

              if ($adminResult->num_rows > 0){
                $row = $adminResult -> fetch_assoc();

                if($row['userPassword'] === $empPassword){
                    session_start();
                    $_SESSION['employeeID'] = $row['employeeID'];
                    header("Location: ../Administration1-3.php");
                    exit();
                }
                else {
                   /* Alert incorrect password and return to Admin login after 0.3s(300 mean 300ms)*/
                  echo "<script>alert('Incorrect Password. Please try again.');</script>";
                  echo "<script>setTimeout(function(){window.location.href='../LoginAd.php'}, 300);</script>";
                  exit();
                }
              }

              else {
                   /* Alert incorrect password and return to Admin login after 0.3s(300 mean 300ms)*/  
                  echo "<script>alert('Incorrect Password or Email. Please try again.');</script>";
                  echo "<script>setTimeout(function(){window.location.href='../LoginAd.php'}, 300);</script>";
                  exit();
                }
              

            }
          else {
            $stmt = $conn -> prepare("SELECT * FROM EMPLOYEE WHERE email = ? AND userPassword = ? ;");
              $stmt -> bind_param("ss", $email, $empPassword);
              $stmt -> execute();
              $empResult = $stmt->get_result();

              if ($empResult->num_rows > 0){
                $row = $empResult -> fetch_assoc();

                if($row['userPassword'] === $empPassword){
                    session_start();
                    $_SESSION['employeeID'] = $row['employeeID'];
                    header("Location: ../employeeDash.php");
                    exit();
                }
                else {
                    /* Alert incorrect password and return to Admin login after 0.3s(300 mean 300ms)*/
                    echo "<script>alert('Incorrect Password or Email. Please try again.');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../LoginAd.php'}, 300);</script>";
                    exit();
                }
            }

             else {
                    /* Alert incorrect password or email and return to Admin login after 0.3s(300 mean 300ms)*/
                    echo "<script>alert('Incorrect Password or Email. Please try again.');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../LoginAd.php'}, 300);</script>";
                    exit();
                }

            $stmt ->close();
            $conn -> close();

          }
          
     }
 }
}


       


/*  $email      =$_POST['email'];
  $password   =$_POST['password'];
  $role		  =$_POST['role'];

      if(empty($email)||empty($password)){
        header ("Location: ../loginAd.php?error=emptyfields");
        exit();
      }
      else
      {
        //inner join select statement
        //$sql="SELECT * FROM USERTAB u,ACCOUNT a, LOGIN l WHERE u.userID=l.user
        //$sql= "SELECT * FROM USERTAB u INNER JOIN LOGIN l ON u.userID=l.user I
        
      //select query based on the role
      if (strcasecmp($role, "Admin") == 0)
        $sql= "SELECT userPassword FROM EMPLOYEE INNER JOIN ADMIN ON EMPLOYEE.em
      else
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
          $pwdCheck= password_verify($password,$row['userPassword']);
      
          if($pwdCheck==false){
                header ("Location: ../loginAd.php?error=wrongPassword");
                exit();
          }
            else{
                session_start();
                $_SESSION['userID']=$row['userID'];
      
                header ("Location: ../employeeDash.php?login=success");
                exit();
            }
        
      }
      else{
        header ("Location: ../loginAd.php?error=nouseremail");
        exit();
      }

    }
  }

}*/
?>