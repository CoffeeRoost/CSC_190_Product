<?php
    /**********Using for mail function******/

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

    /***************************************/

    session_start();
    if (!isset($_SESSION['adminLogin'])){
          //if error, force a logout
         session_unset();
         session_destroy();
         header ("Location: ./LoginAd.php");
         exit();
     }
    require './dbh.inc.php';

    

    /*********************Edit Employee Demographic*********************/
    if(isset($_POST['empDemographicEdit'])){
        $empfnameEdit = $_POST['empfname'];
        $empMI_Edit = $_POST['empMI'];
        $emplnameEdit = $_POST['emplname'];
        $empDOB = $_POST['empDOB'];
        $empGenderEdit = $_POST['empGender'];
        $empRacesEdit = $_POST['empRaces'];
        $empDOB_Edit = date('Y-m-d', strtotime($empDOB)) ;

        $stmt = $conn -> prepare("UPDATE EMPLOYEE SET empfname = ?, emplname = ?, empMI = ?, 
        empDOB = ?, empGender = ?, empRaces = ? WHERE employeeID = ? ;");
        $stmt -> bind_param("ssssssi",$empfnameEdit, $empMI_Edit, $emplnameEdit, $empDOB_Edit, $empGenderEdit, $empRacesEdit, $_SESSION['empViewID']);
        if($stmt -> execute()){
            echo "<script>alert('Employeed Demographic is modified');</script>";
            echo "<script>setTimeout(function(){window.location.href='./employeeViewBE.php?id=".$_SESSION['empViewID']."'}, 300);</script>";
            exit();
        }
        else {
            echo "<script>alert('Modify Failed');</script>";
            echo "<script>setTimeout(function(){window.location.href='../empInfoView.php'}, 300);</script>";
            exit();
        }
        $stmt -> close();
        $conn -> close();
    }
    /******************************************************************/

    /***********************Edit Employee Address**********************/
    if(isset($_POST['empAddEdit'])){

        $empStreet = $_POST['empStreet'];
        $empCity = $_POST['empCity'];
        $empCounty = $_POST['empCounty'];
        $empState = $_POST['empState'];
        $empZip = $_POST['empZip'];
        $empPhone = $_POST['empPhone'];
        $empEmail = $_POST['empEmail'];
        
        /*Check valid email form*/
        if(!filter_var($empEmail,FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Email error. Please try again.');</script>";
            echo "<script>setTimeout(function(){window.location.href='../empInfoView.php'}, 300);script>";
            exit();
        }
        /*************************/
        
        /*Check mail already used*/
        if($empEmail !== $_SESSION['empViewEmail']){
            $stmt1 = $conn->prepare("SELECT email FROM EMPLOYEE WHERE email = ?;");
            $stmt1 ->bind_param('s', $empEmail);
            $stmt1 ->execute();
            $check_email = $stmt1 ->get_result();
            if ($check_email ->num_rows > 0){
                    echo "<script>alert('Your email is already used, please use another email.');</script>";
                    echo "<script>setTimeout(function(){window.location.href='./employeeViewBE.php?id=".$_SESSION['empViewID']."'}, 300);</script>";
                    exit();
                }
            $stmt1 -> close();
        }
        
        /*************************/

        $stmt2 = $conn -> prepare("UPDATE EMPLOYEE SET empStreet = ?, empCity = ?, empState = ?, empZipcode = ?, empPhone = ?, email = ?, empCounty = ? WHERE employeeID = ? ;");
        $stmt2 -> bind_param("sssssssi", $empStreet, $empCity, $empState,$empZip, $empPhone, $empEmail, $empCounty, $_SESSION['empViewID']);

        if($stmt2 ->execute()){
            echo "<script>alert('Employeed Address is modified');</script>";
            echo "<script>setTimeout(function(){window.location.href='./employeeViewBE.php?id=".$_SESSION['empViewID']."'}, 300);</script>";
            exit();
        }
        else {
            echo "<script>alert('Modify Failed');</script>";
            echo "<script>setTimeout(function(){window.location.href='../empInfoView.php'}, 300);</script>";
            exit();
        }
        $stmt2 -> close();
        $conn -> close();    
    }
    /******************************************************************/

    /***********************Edit Employee Role**********************/
    if(isset($_POST['empRoleEdit'])){
        
        $empRole = $_POST['empRole'];
        $programMember = $_POST['programMember']; 

        $stmt = $conn -> prepare("UPDATE EMPLOYEE SET employeeRole = ?, programMember = ? WHERE employeeID = ?;");
        $stmt -> bind_param("ssi", $empRole, $programMember,$_SESSION['empViewID']);
        
        if($stmt ->execute()){
            echo "<script>alert('Employeed Role and Program Member is modified');</script>";
            echo "<script>setTimeout(function(){window.location.href='./employeeViewBE.php?id=".$_SESSION['empViewID']."'}, 300);</script>";
            exit();
        }
        else {
            echo "<script>alert('Modify Failed');</script>";
            echo "<script>setTimeout(function(){window.location.href='../empInfoView.php'}, 300);</script>";
            exit();
        }
        $stmt -> close();
        $conn -> close();    
    }
    /******************************************************************/

    /****************Change password with auto generation**************/
    if(isset($_POST['generate'])){
        $password = generatePassword();
        $userPassword_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn ->prepare("UPDATE EMPLOYEE SET userPassword = ? WHERE employeeID = ?;"); 
        $stmt ->bind_param("si", $userPassword_hash, $_SESSION['empViewID']);

        if($stmt ->execute()){
            echo "<script>alert('Employeed Password has been changed');</script>";
            echo "<script>setTimeout(function(){window.location.href='./employeeViewBE.php?id=".$_SESSION['empViewID']."'}, 300);</script>";

            /*Sent an confirm for employee new password*/
            sent_mail($_SESSION['empViewfname'], $_SESSION['empViewlname'], $_SESSION['empViewEmail'], $password);

            exit();
        }
        else {
            echo "<script>alert('Modify Failed');</script>";
            echo "<script>setTimeout(function(){window.location.href='../empInfoView.php'}, 300);</script>";
            exit();
        }
        $stmt -> close();
        $conn -> close();  
    }
    /******************************************************************/

     /****************Change password with input password**************/
    if(isset($_POST['inputPass'])){
        $password = $_POST['newPassword'];
        $userPassword_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn ->prepare("UPDATE EMPLOYEE SET userPassword = ? WHERE employeeID = ?;"); 
        $stmt ->bind_param("si", $userPassword_hash, $_SESSION['empViewID']);

        if($stmt ->execute()){
            echo "<script>alert('Employeed Password has been changed');</script>";
            echo "<script>setTimeout(function(){window.location.href='./employeeViewBE.php?id=".$_SESSION['empViewID']."'}, 300);</script>";

            /*Sent an confirm for employee new password*/
           sent_mail($_SESSION['empViewfname'], $_SESSION['empViewlname'], $_SESSION['empViewEmail'], $password);

            exit();
        }
        else {
            echo "<script>alert('Modify Failed');</script>";
            echo "<script>setTimeout(function(){window.location.href='../empInfoView.php'}, 300);</script>";
            exit();
        }
        $stmt -> close();
        $conn -> close();
    }
    /******************************************************************/

     /************************DEACTIVATED ACCOUNT**********************/
     if(isset($_POST['deactivate'])){
        $pages = "infoView";
        deactivate_account($conn, $_SESSION['empViewID'], $_SESSION['empStatus'],$pages);
     }

    if(isset($_POST['deactivate_table'])){
        $pages = "employeetable";
        deactivate_account($conn, $_GET['id'], $_GET['status'],$pages);
     }
    /******************************************************************/
    

    /***************************DELETE ACCOUNT*************************/
    if(isset($_GET['action'])){
        if($_GET['action'] === "delete"){
            delete_account($conn, $_SESSION['empViewID'],$_GET['action'] );
        }

        if($_GET['action'] === "deleteAtTable"){
            delete_account($conn, $_GET['id'],$_GET['action']);
        }
        
    }

  
    /******************************************************************/




function generatePassword() {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
    $length = 8;
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $password;
}
function deactivate_account($connection, $deactivate_id, $status, $pages){
    if($status == 1){
            $changeStatus = 0;
            $stmt = $connection ->prepare("UPDATE EMPLOYEE SET empStatus = ? WHERE employeeID = ?;");
            $stmt -> bind_param("ii", $changeStatus , $deactivate_id);
            if($stmt -> execute()){

                if($pages === "infoView" ){
                    echo "<script>alert('Employeed Account is deactivated');</script>";
                    echo "<script>setTimeout(function(){window.location.href='./employeeViewBE.php?id=".$deactivate_id."'}, 300);</script>";
                    exit();
                }
                
                if($pages === "employeetable"){
                    echo "<script>alert('Employeed Account is deactivated');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../employeeTable.php'}, 300);</script>";
                    exit();
                }
            }
        }
            else {
                    $changeStatus = 1;
                    $stmt = $connection ->prepare("UPDATE EMPLOYEE SET empStatus = ? WHERE employeeID = ?;");
                    $stmt -> bind_param("ii", $changeStatus , $deactivate_id);
                    if($stmt -> execute()){
                        if($pages === "infoView" ){
                            echo "<script>alert('Employeed Account is activated');</script>";
                            echo "<script>setTimeout(function(){window.location.href='./employeeViewBE.php?id=".$deactivate_id."'}, 300);</script>";
                            exit();
                        }
                        
                        if($pages === "employeetable"){
                            echo "<script>alert('Employeed Account is activated');</script>";
                            echo "<script>setTimeout(function(){window.location.href='../employeeTable.php'}, 300);</script>";
                            exit();
                        }

                    }
                }

        $stmt -> close();
        $connection -> close();
}

function delete_account($connection ,$delete_id, $pages){
    $stmt = $connection -> prepare("DELETE FROM EMPLOYEE WHERE employeeID = ?;");
    $stmt -> bind_param("i",$delete_id);
    if($stmt -> execute()){
        if($pages === "delete"){
            echo "<script>alert('Employeed Account is delete');</script>";
            echo "<script>setTimeout(function(){window.location.href='../Administration1-3.php'}, 300);</script>";
            exit();
        }

        if($pages === "deleteAtTable"){
            echo "<script>alert('Employeed Account is delete');</script>";
            echo "<script>setTimeout(function(){window.location.href='../employeeTable.php'}, 300);</script>";
            exit();
        }
        
    }
    $stmt -> close();
    $connection -> close();
} 

function sent_mail($empfname,$emplname,$email,$newPassword){
     /**********Using for mail function******/
        require_once './email_config.inc.php';
        require './PHPMailer.php';
        require './SMTP.php';
        require './Exception.php';
     /***************************************/
     /* ---------------Send Welcome Mail to new employee-----------------*/
                        // Create a new PHPMailer instance
                        $passwordMail = new PHPMailer(true);

                        // Set up SMTP connection
                        /*$welcomeMail->SMTPDebug = SMTP::DEBUG_SERVER; --> using for debug only*/   
                        $passwordMail->isSMTP();
                        $passwordMail->Host = SMTP_HOST;
                        $passwordMail->Port = SMTP_PORT;
                        $passwordMail->SMTPAuth = true;
                        $passwordMail->Username = SMTP_USERNAME;
                        $passwordMail->Password = SMTP_PASSWORD;

                        // Set up email content
                        $passwordMail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
                        $passwordMail->addAddress($email, $empfname." ".$emplname);
                        $passwordMail->Subject = 'CMC Password Reset';
                        $passwordMail->Body = "Hi ".$empfname." ".$emplname."\n\n".
                                      "This is your new password\n".
                                      "Email: ".$email. "\n".
                                      "Password: ".$newPassword."\n".
                                      "This is your temporary password. You can change it later";
                        $passwordMail -> send();
                    /* ---------------End Welcome Mail----------------------------*/
}
 
?>

