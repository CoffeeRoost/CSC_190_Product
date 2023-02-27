<?php 
    /*check any mistake when we create new account*/
    if(isset($_POST["signup-submit"])){
        require 'dbh.inc.php';
        require 'gen_activeC.inc.php';

        //fetch info to the database form

        //survey1
        $partner          =$_POST['partner'];
        $fname	          =$_POST['fname'];
        $mname		      =$_POST['mname'];
        $lname            =$_POST['lname'];
        $SSN          	  =$_POST['SSN'];
        $street           =$_POST['street'];
        $city             =$_POST['city'];
        $state            =$_POST['state'];
        $zip		      =$_POST['zip'];
        $county           =$_POST['county'];
        $sameAdd          =$_POST['sameAdd'];
        $mailStreet	      =$_POST['mailStreet'];
        $mailCity		  =$_POST['mailCity'];
        $mailState	      =$_POST['mailState'];
        $mailZip  	      =$_POST['mailZip'];
        $mailCounty  	  =$_POST['mailCounty'];
        $phone            =$_POST['phone'];
        $phoneType	  =$_POST['phoneType'];
        $alPhone          =$_POST['alPhone'];
        $email            =$_POST['email'];
        $bthday           =$_POST['bthday'];
        $gender           =$_POST['gender'];
        $otherAns		  =$_POST['otherAns'];

        if($sameAdd === 'No'){
            if(empty($mailStreet)||empty($mailCity)||empty($mailCity)||empty($mailState)||empty($mailZip)||empty($mailCounty)){
                header ("Location: ../survey.php?error=mandatoryMailing");
                //stop the code to run
                exit();
            }
        }

        if($gender === 'other'){
	        if(empty($otherAns)){
		    header("Location: ../survey.php?error=mandatoryGenderDescription");
	        }
        }

        //survey2
        $citizenship	  =$_POST['citizenship'];
        $uscisNumber      =$_POST['uscisNumber'];
        $uscisExpired     =$_POST['uscisExpired'];
        $selective        =$_POST['selective'];
        $hispanic         =$_POST['hispanic'];
        $race             =$_POST['race'];
        $language         =$_POST['language'];
        $proficiency      =$_POST['proficiency'];
        $disability       =$_POST['disability'];
        $typeDisability   =$_POST['typeDisability'];
        $schoolLevel      =$_POST['schoolLevel'];
        $diploma          =$_POST['diploma'];
        $highestSchool    =$_POST['highestSchool'];
        $schoolStatus     =$_POST['schoolStatus'];


        //survey3
        $military         =$_POST['military'];
        $militarySpouse   =$_POST['militarySpouse'];
        $employment       =$_POST['employment'];
        $payRate          =$_POST['payRate'];
        $ui               =$_POST['ui'];
        $uiWeek           =$_POST['uiWeek'];
        $farmworker       =$_POST['farmworker'];
        $jobTitle         =$_POST['jobTitle'];

        

        //survey4
        $foster           =$_POST['foster'];
        $adultEdu         =$_POST['adultEdu'];
        $youthBuild       =$_POST['youthBuild'];
        $youthGrantNum    =$_POST['youthGrantNum'];
        $jobCorp          =$_POST['jobCorp'];
        $carlPerkins      =$_POST['carlPerkins'];
        $tanf             =$_POST['tanf'];
        $ssi              =$_POST['ssi'];
        $generalAssist    =$_POST['generalAssist'];
        $calFresh         =$_POST['calFresh'];
        $refugeeAssist    =$_POST['refugeeAssist'];
        $ssdi             =$_POST['ssdi'];
        $snapTraining     =$_POST['snapTraining'];
        $pellGrant        =$_POST['pellGrant'];

        

        //survey5
        $workTicket       =$_POST['workTicket'];
        $homeless         =$_POST['homeless'];
        $exOffer          =$_POST['exOffer'];
        $displace         =$_POST['displace'];
        $singleParent     =$_POST['singleParent'];
        $culBarrier       =$_POST['culBarrier'];
        $familySize       =$_POST['familySize'];
        $annualIncome     =$_POST['annualIncome'];
        $techExp          =$_POST['techExp'];
        $password         =$_POST['password'];
        $confirmPassword  =$_POST['confirmPassword'];
        $expiry = 1*24*60*60;


        if(empty($partner)||empty($fname)||empty($lname)||empty($SSN)||empty($street)||empty($city)||empty($state)||empty($zip)||empty($county)||empty($phone)||empty($phoneType)||empty($email)||empty($bthday)||empty($gender)
        ||empty($citizenship)||empty($selective)||empty($hispanic)||empty($race)||empty($language)||empty($proficiency)||empty($disability)||empty($schoolLevel)||empty($diploma)||empty($highestSchool)||empty($schoolStatus)
        ||empty($military)||empty($militarySpouse)||empty($employment)||empty($ui)||empty($farmworker)||empty($jobTitle)
        ||empty($foster)||empty($adultEdu)||empty($youthBuild)||empty($jobCorp)||empty($carlPerkins)||empty($tanf)||empty($ssi)||empty($generalAssist)||empty($calFresh)||empty($refugeeAssist)||empty($ssdi)||empty($snapTraining)
        ||empty($pellGrant)||empty($workTicket)||empty($homeless)||empty($exOffer)||empty($displace)||empty($singleParent)||empty($culBarrier)||empty($familySize)||empty($annualIncome)||empty($techExp)||empty($password)||empty($confirmPassword))
        {
        //check empty fields
        // redirect to surveyTest page
        header ("Location: ../survey.php?error=emptyfields");
        // //stop the code to run
        exit();
        }

        else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        // check email validation
        header ("Location: ../survey.php?error=invaidmail&email=".$email);
        exit();
        }
        
        else if ($password !== $confirmPassword){
        // check password match with confirm password
        header ("Location: ../survey.php?error=passwordcheck&email=".$email);
        exit();
        }
        
        else {
        //check email have taken or not
        //prepared statement to secure database
        $sql="SELECT userID, email FROM PARTICIPATION WHERE email=?";
        $stmt= mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
            header ("Location: ../survey.php?error=sqlerror");
            exit();
            }
            else {
            //bind info
            mysqli_stmt_bind_param($stmt,'s',$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck=mysqli_stmt_num_rows($stmt);
                if($resultCheck>0){
                    header ("Location: ../survey.php?error=emailtaken&email=".$email);
                    exit();
                }
                else {
                    $sql="INSERT INTO PARTICIPATION (fname,lname,MI,email,newUserPassword,programPartnerReference,last4SSN,DOB,gender,genderDesc,primaryPhone,phoneNumType,altPhone,activation_code,activation_expiry)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt=mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                    header ("Location: ../survey.php?error=sqlerror");
                    exit();
                    }
                    else
                    {
                    //hash the password to make secure password
                    $hashedPwd=password_hash($password,PASSWORD_DEFAULT);
                    $hashedCode=password_hash($activationCode,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,'ssssssisssssssi',$fname,$lname,$mname,$email,$hashedPwd,$partner,$SSN,$bthday,$gender,$otherAns,$phone,$phoneType,$alPhone,$hashedCode,$expiry);
                    mysqli_stmt_execute($stmt);
            
                        //Grab the userID associated with the information and insert into other tables

                        $sql="SELECT * FROM PARTICIPATION WHERE email=?";
                        $stmt= mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: ../survey.php?error=sqlerror");
                            exit();
                        }
                        else {
                        //bind info
                            //looks into db and sees if email is present
                            mysqli_stmt_bind_param($stmt,'s',$email);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            //check if we exactly get result from database
                            if($row = mysqli_fetch_assoc($result)){
                                $sql="INSERT INTO LOGIN (userID,loginEmail,loginPassword)
                                    VALUES(?,?,?);";
                                $sql2="INSERT INTO ADDRESS (userID,street,city,state,zipcode,county,mailingStreet,mailingCity,mailingState,mailingZipcode,mailingCounty)
                                    VALUES(?,?,?,?,?,?,?,?,?,?,?);";
                                $sql3="INSERT INTO CITIZEN (userID,usCitizenshipStatus,alienRegistrationCode,alienRegistrationCodeEXP)
                                    VALUES(?,?,?,?);";
                                $sql4="INSERT INTO EDUCATION (userID,highSchoolStatus,highSchooolDiplomaOrEquil,highestGradeComplete,inSchool)
                                    VALUES(?,?,?,?,?);";
                                $sql5="INSERT INTO EMPLOYMENT (userID,currentMilitaryOrVet,militarySpouse,selectiveService,employmentStatus,payRate,unemployemntInsurance,unemploymentWeeks,farmworker12Months,desiredJobTitle,techExperience)
                                    VALUES(?,?,?,?,?,?,?,?,?,?,?);";
                                $sql6="INSERT INTO ETHNICITY (userID,hispanicHeritage,race,primaryLanguage,englishProficiency)
                                    VALUES(?,?,?,?,?);";
                                $sql7="INSERT INTO HARDSHIP (userID,ticketToWork,homelessStatus,exOffender,displacedHomemaker,singleParent,culturalBarriers,familySize,annualizedFamilyIncome)
                                    VALUES(?,?,?,?,?,?,?,?,?);";
                                $sql8="INSERT INTO SERVICES (userID,fosterCare,adultEducationWIOATittleII,youthBuild,youthBuildGrant,jobCorps,vocationalEducationCarlPerkins,tanfRecipient,ssiRecipient,gaRecipient,snapRecipientCalFresh,rcaRecipient,ssdiRecipient,snapEmploymentAndTrainingProgram,pellGrant)
                                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
                                $stmt=mysqli_stmt_init($conn);
                                $stmt2=mysqli_stmt_init($conn);
                                $stmt3=mysqli_stmt_init($conn);
                                $stmt4=mysqli_stmt_init($conn);
                                $stmt5=mysqli_stmt_init($conn);
                                $stmt6=mysqli_stmt_init($conn);
                                $stmt7=mysqli_stmt_init($conn);
                                $stmt8=mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                header ("Location: ../survey.php?error=sqlerror");
                                exit();
                            }
                            else
                            {	
                                if(!mysqli_stmt_prepare($stmt2,$sql2)){
                                        header ("Location: ../survey.php?error=sqlerror");
                                        exit();
                                    }
                                if(!mysqli_stmt_prepare($stmt3,$sql3)){
                                        header ("Location: ../survey.php?error=sqlerror");
                                        exit();
                                    }
                                if(!mysqli_stmt_prepare($stmt4,$sql4)){
                                        header ("Location: ../survey.php?error=sqlerror");
                                        exit();
                                    }
                                if(!mysqli_stmt_prepare($stmt5,$sql5)){
                                        header ("Location: ../survey.php?error=sqlerror");
                                        exit();
                                    }
                                if(!mysqli_stmt_prepare($stmt6,$sql6)){
                                        header ("Location: ../survey.php?error=sqlerror");
                                        exit();
                                    }
                                if(!mysqli_stmt_prepare($stmt7,$sql7)){
                                        header ("Location: ../survey.php?error=sqlerror");
                                        exit();
                                    }
                                if(!mysqli_stmt_prepare($stmt8,$sql8)){
                                        header ("Location: ../survey.php?error=sqlerror");
                                        exit();
                                    }
                        
                                mysqli_stmt_bind_param($stmt,"iss",$row['userID'],$email,$row['newUserPassword']);
                                mysqli_stmt_bind_param($stmt2,"isssissssis",$row['userID'],$steet,$city,$state,$zip,$county,$mailStreet,$mailCity,$mailState,$mailZip,$mailCounty);
                                mysqli_stmt_bind_param($stmt3,"isss",$row['userID'],$citizenship,$uscisNumber,$uscisExpired);
                                mysqli_stmt_bind_param($stmt4,"issss",$row['userID'],$schoolLevel,$diploma,$highestSchool,$schoolStatus);
                                mysqli_stmt_bind_param($stmt5,"issssisisss",$row['userID'],$military,$militarySpouse,$selective,$employment,$payRate,$ui,$uiWeek,$farmworker,$jobTitle,$techExp);
                                mysqli_stmt_bind_param($stmt6,"issss",$row['userID'],$hispanic,$race,$language,$proficiency);
                                mysqli_stmt_bind_param($stmt7,"issssssii",$row['userID'],$workTicket,$homeless,$exOffer,$displace,$singleParent,$culBarrier,$familySize,$annualIncome);
                                mysqli_stmt_bind_param($stmt8,"issssssssssssss",$row['userID'],$foster,$adultEdu,$youthBuild,$youthGrantNum,$jobCorp,$carlPerkins,$tanf,$ssi,$generalAssist,$calFresh,$refugeeAssist,$ssdi,$snapTraining,$pellGrant);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_execute($stmt2);
                                mysqli_stmt_execute($stmt3);
                                mysqli_stmt_execute($stmt4);
                                mysqli_stmt_execute($stmt5);
                                mysqli_stmt_execute($stmt6);
                                mysqli_stmt_execute($stmt7);
                                mysqli_stmt_execute($stmt8);

                                //create account entry
                                $sql="SELECT * FROM LOGIN WHERE loginEmail=?";
                                        $stmt= mysqli_stmt_init($conn);
                                $stmt= mysqli_stmt_init($conn);
                                        if(!mysqli_stmt_prepare($stmt,$sql)){
                                    header ("Location: ../survey.php?error=sqlerror");
                                    exit();
                                        }
                                        else {     
                                                $activation_link = "http://localhost/CSC_190_Product/includes/activate.php?email=$email&activation_code=$activationCode";
                                                $to = $email;
                                                $subject = "Please activate your account";
                                                $message = "Hi, Please click the following link to activate your account: 
                                                        $activation_link";
                                                $headers = "From: emailchickennode@gmail.com\r\n";
                                                if(mail($to,$subject,$message,$headers)){
                                                    header('Location: ../checkEmail.php');
                                                    exit;
                                                }
                                                else {
                                                    header("Location: ../survey.php?error=emailfail");
                                                    exit();
                                                }

                        }
                    }
                }
                else {
                    header ("Location: ../survey.php?error=nouseremail");
                        exit();
                }
            }
            }
        }
        }
    }
    mysqli_stmt_close($stmt);
    //close database connecttion
    mysqli_close($conn);
}

else{
  //send back to surveyTest page
  header ("Location: ../survey.php");
  exit();
}
?>