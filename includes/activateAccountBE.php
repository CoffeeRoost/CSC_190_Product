<?php
// part 2 of the password reset system. this script file will check the tokens and if confirmed, change the password to the new password entered by the user.

    if (isset($_POST["activateBoxSubmit"])){
        
        $email  = $_POST["email"];
        $code   = $_POST["activateCode"];

		if(empty($email) || empty($code)){
			header("Location:../index.php?error=InvalidEmail");
			exit();
		}
        
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("Location:../index.php?error=InvalidEmail");
			exit();
		}

		require 'dbh.inc.php';

        $stmt = $conn->prepare("SELECT activation_code,programPartnerReference,userID FROM PARTICIPATION WHERE email=?;");
		$stmt ->bind_param("s",$email);
		if(!$stmt ->execute()){
			echo "<script>alert('Query Error 1');</script>";
            echo "<script>setTimeout(function(){window.location.href='../Login.php'}, 0);</script>";
            exit();
		}

		$result = $stmt->get_result();

		if($result->num_rows >0){
            $row = $result->fetch_assoc();
            $userID = $row['userID'];
            $activation_codeCheck = $row['activation_code'];
            $programPartnerReference = $row['programPartnerReference'];
			$acceptance = 0;
        }
        $stmt ->close();

		$actCheck=password_verify($code,$activation_codeCheck);
		if($actCheck==false){
			header("Location: ../index.php?error=wrongActivationCode");
			exit();
		}

		$stmt2 = $conn->prepare("SELECT employeeID FROM EMPLOYEE e WHERE e.programMember=? ORDER BY RAND() LIMIT 1;");
		$stmt2 ->bind_param("s",$programPartnerReference);
		if(!$stmt2 ->execute()){
			echo "<script>alert('Query Error 2');</script>";
            echo "<script>setTimeout(function(){window.location.href='../Login.php'}, 0);</script>";
            exit();
		}
		
		$result = $stmt2->get_result();
		
		if($result->num_rows >0){
            $row = $result->fetch_assoc();
            $employeeID = $row['employeeID'];
        
			$stmt2 ->close();

			$stmt3 = $conn->prepare("INSERT INTO COACH (userID,employeeID,accepted) VALUES(?,?,?);");
			$stmt3 ->bind_param("iii",$userID,$employeeID,$acceptance);
			if(!$stmt3 ->execute()){
				echo "<script>alert('Query Error 3');</script>";
				echo "<script>setTimeout(function(){window.location.href='../Login.php'}, 0);</script>";
				exit();
			}
			$stmt3 ->close();
		}
		else{
			$stmt2 ->close();
		}


		$stmt4 = $conn->prepare("UPDATE PARTICIPATION SET status = 1, activated_at = CURRENT_TIMESTAMP WHERE email=?;");
		$stmt4 ->bind_param("s",$email);
		if(!$stmt4 ->execute()){
			echo "<script>alert('Query Error 4');</script>";
            echo "<script>setTimeout(function(){window.location.href='../Login.php'}, 0);</script>";
            exit();
		}

		$stmt4 -> close();

		header("Location: ../Login.php");
		exit();
    }
    else{
        header("Location:../index.php?error=InvalidActivationCode");
		exit();
    }
?>