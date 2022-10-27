<?php
// part 2 of the password reset system. this script file will check the tokens and if confirmed, change the password to the new password entered by the user.

    if (isset($_POST["resetPassSubmit"])){
        
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["passRepeat"];

        //checking if the fields are empty, if not kick back to location
        if(empty($password) || empty($passwordRepeat)){
                header("Location:../login.php?newpassword=empty");
                exit();
        }
        // make sure passwords are the same, if not kick back to location
        else if( $password != $passwordRepeat) {
            header("Location:../login.php?newpassword=passnotsame");
            exit();
        }

        $currentDate = date("U");
        
        require 'dbh.inc.php';

        $sql = "SELECT * FROM passReset WHERE passResetSelector=? AND passResetExpires >=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error!";
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $selector);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)){
                echo "You need to re-submit your reset request.";
                exit();
            }
            //checking the tokens
            else{

                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["passResetToken"]);

                if($tokenCheck === false){
                    echo "Token check Failed.";
                    exit();
                }
                // when tokens check out, change the database information
                elseif($tokencheck === true){

                    $tokenEmail = $row['passResetEmail'];

                    $sql = "SELECT * FROM USERTAB WHERE email=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "There was an error!";
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)) {
                            echo "There was an error!";
                            exit();
                        }
                        //update the password to the new password in the usertab
                        else{

                            $sql = "UPDATE USERTAB SET newUserPassword=? WHERE email=?";
                            $stmt = mysqli_stmt_init($conn);
                             if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "There was an error!";
                                exit();
                            }
                            else{

                                $newPassHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newPassHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM passReset WHERE passResetEmail=?;";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo "There was an error!";
                                    exit();
                                }
                                else{
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../login.php?newpass=passwordupdated");
                                    // need to add a check in the login file to check success message... see forgotPass
                                }
                            }
                        }
                    }
                }
            }

        }

    }
    else{
        header("Location:.../login.php");
    }
?>