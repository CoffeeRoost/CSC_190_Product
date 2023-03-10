<?php
/**********Using for mail function******/

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

/***************************************/

session_start();

if (isset($_SESSION['adminLogin'])){
    /* fecth employee from form*/
    if(isset($_POST['add-employee'])){
        //connection to database
        require 'dbh.inc.php';

/**********Using for mail function******/
        require_once './email_config.inc.php';
        require './PHPMailer.php';
        require './SMTP.php';
        require './Exception.php';
/***************************************/
       


        $empfname = $_POST['empfname'];
        $empMI = $_POST['empMI'];
        $emplname = $_POST['emplname'];
        $empDOB = $_POST['empDOB'];
        $empStreet = $_POST['empstreet'];
        $empCity = $_POST['empCity'];
        $empState = $_POST['empState'];
        $empZipCode = $_POST['empZipCode'];
        $empPhone = $_POST['empPhone'];
        $email = $_POST['email'];
        $empGender = $_POST['empGender'];
        $empEthnicity = $_POST['empEthnicity'];
        $empRole = $_POST['empRole'];
        $programMember = $_POST['programMember'];
        $userPassword = $_POST['userPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        
        $empDOB_mysql = date('Y-m-d', strtotime($empDOB));
       
        
        
        /*Check empty field*/
        if(empty($empfname) || empty($emplname) || empty($empDOB) || empty($empStreet)
        || empty($empCity) || empty($empState) || empty($empZipCode) || empty($empPhone) 
        || empty($email) || empty($empGender) || empty($empEthnicity) || empty($empRole)
        || empty($programMember) || empty($userPassword) || empty($confirmPassword)){
            echo "<script>alert('Please fill out the required field.');</script>";
            echo "<script>setTimeout(function(){window.location.href='../addingEmployee.php'}, 300);</script>";
            exit();
        }

       /*If employee does not have middle --> set NULL for mySQL*/
        if(empty($empMI)){
            $empMI = NULL;
        }

        /*Check correct email form*/
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Email error. Please try again.');</script>";
            echo "<script>setTimeout(function(){window.location.href='../addingEmployee.php'}, 300);</script>";
            exit();
        }

        /*Check password and confirm password and then insert information*/
        if($userPassword === $confirmPassword){

            $stmt = $conn->prepare("SELECT email FROM EMPLOYEE WHERE email = ?;");
            $stmt ->bind_param('s', $email);
            $stmt ->execute();
            $check_email = $stmt ->get_result();

            if ($check_email ->num_rows > 0){
                echo "<script>alert('Your email is already used, please use another email.');</script>";
                echo "<script>setTimeout(function(){window.location.href='../addingEmployee.php'}, 300);</script>";
                exit();
            }
            else {

                /*hash password before insert*/
                $userPassword_hash = password_hash($userPassword, PASSWORD_DEFAULT);

                $stmt1 = $conn->prepare("INSERT INTO EMPLOYEE(empfname,emplname,empMI,empDOB,empStreet,empCity,
                empState,empZipcode,empPhone,empGender,empRaces,email,employeeRole,userPassword,programMember)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
                $stmt1 -> bind_param("sssssssssssssss", $empfname,$emplname,$empMI,$empDOB_mysql,$empStreet,$empCity,
                $empState,$empZipCode,$empPhone,$empGender,$empEthnicity,$email,$empRole, $userPassword_hash,$programMember);

                /*If insert successlly pop up arlet and return to adding Employee page*/
                /*Set timeout is 300 mean page will wait 0.3s then return to employee adding page*/
                if($stmt1 ->execute()){
                    echo "<script>alert('Employee is added.');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../addingEmployee.php'}, 300);</script>";

                /*if root user choose new employee as administrator admin system role. insert employeeID to admin table*/
                    if($empRole === "admin"){
                    $stmt2 = $conn->prepare("SELECT employeeID FROM EMPLOYEE WHERE empfname = ? AND emplname = ? 
                    AND empDOB = ? AND email = ? ;");
                    $stmt2 ->bind_param("ssss",$empfname,$emplname,$empDOB_mysql,$email);
                    $stmt2 ->execute();
                    $result = $stmt2->get_result();
                    if($result ->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $employeeID = $row['employeeID'];
                        
                        $stmt3 = $conn->prepare("INSERT INTO ADMIN(employeeID) VALUE(?);");
                        $stmt3 ->bind_param('i', $employeeID);
                        $stmt3 ->execute();
                        $stmt3->close();
                    }
                    $stmt2->close();
                    }
                    $stmt1->close();
                    $conn->close();

                    /* ---------------Send Welcome Mail to new employee-----------------*/
                        // Create a new PHPMailer instance
                        $welcomeMail = new PHPMailer(true);

                        // Set up SMTP connection
                        /*$welcomeMail->SMTPDebug = SMTP::DEBUG_SERVER; --> using for debug only*/   
                        $welcomeMail->isSMTP();
                        $welcomeMail->Host = SMTP_HOST;
                        $welcomeMail->Port = SMTP_PORT;
                        $welcomeMail->SMTPAuth = true;
                        $welcomeMail->Username = SMTP_USERNAME;
                        $welcomeMail->Password = SMTP_PASSWORD;

                        // Set up email content
                        $welcomeMail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
                        $welcomeMail->addAddress($email, $empfname." ".$emplname);
                        $welcomeMail->Subject = 'Welcome to CMC';
                        $welcomeMail->Body = "Welcome ".$empfname." ".$emplname." to California Mobility Center\n\n".
                                      "This is your information\n".
                                      "Email: ".$email. "\n".
                                      "Password: ".$userPassword."\n".
                                      "This is your temporary password. Please change your password after first log in.";
                        $welcomeMail -> send();
                    /* ---------------End Welcome Mail----------------------------*/

                    exit();
                }
                else {
                    echo "<script>alert('Fail to add employee.');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../addingEmployee.php'}, 300);</script>";
                    exit();
                }

            }
        }
        else {
            echo "<script>alert('Password not match. Please try again.');</script>";
            echo "<script>setTimeout(function(){window.location.href='../addingEmployee.php'}, 300);</script>";
            exit();
        }
    }
}
else {
    //if error, force a logout
     session_unset();
     session_destroy();
     header ("Location: ./loginAd.php?error=LoginRequirement");
     exit(); 
}

?>