
<?php
    /**********Using for mail function******/

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    /***************************************/
    /* Start Session */

    session_start();

    /*check any mistake when we create new account*/
    if(isset($_POST["signup-submit"])){

        /* Connect to Database */
        require 'dbh.inc.php';

        /**********Using for mail function******/
        require_once './email_config.inc.php';
        require './PHPMailer.php';
        require './SMTP.php';
        require './Exception.php';
       /***************************************/

        //fetch info to the database form

        //survey1
        $partner          =$_POST['partner'];
        $partFname	          =$_POST['fname'];
        $partMname		      =$_POST['mname'];
        $partLname            =$_POST['lname'];
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
        $phoneType	      =$_POST['phoneType'];
        $alPhone          =$_POST['alPhone'];
        $partEmail            =$_POST['email'];
        $partBthday           =$_POST['bthday'];
        $gender           =$_POST['gender'];
        $otherAns = $_POST['otherAns'];
        $partDOB_mysql    = date('Y-m-d', strtotime($partBthday));



        //survey2
        $citizenship	                =$_POST['citizenship'];
        $uscisNumber                    =$_POST['uscisNumber'];
        $uscisExpired                   =$_POST['uscisExpired'];
        $selective                      =$_POST['selective'];
        $hispanic                       =$_POST['hispanic'];

        $americanIndian_alaskanNative   =isset($_POST['americanIndian_alaskanNative']) ? 'Yes' : 'No';
        $africanAmerican_black         =isset($_POST['africanAmerican_black']) ? 'Yes' : 'No';
        $asian                          =isset($_POST['asian']) ? 'Yes' : 'No';
        $hawaiian_other                 =isset($_POST['hawaiian_other']) ? 'Yes' : 'No';
        $white                          =isset($_POST['whitle']) ? 'Yes' : 'No';
        $noAnswer                       =isset($_POST['noAnswer']) ? 'Yes' : 'No';


        $language                       =$_POST['language'];
        $proficiency                    =$_POST['proficiency'];
        $disability                     =$_POST['disability'];
        $typeDisability                 =$_POST['typeDisability'];
        $schoolLevel                    =$_POST['schoolLevel'];
        $diploma                        =$_POST['diploma'];
        $highestSchool                  =$_POST['highestSchool'];
        $schoolStatus                   =$_POST['schoolStatus'];

        $uscisExpired_mysql    = date('Y-m-d', strtotime($uscisExpired));




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
        $partPassword         =$_POST['password'];
        $partConfirmPassword  =$_POST['confirmPassword'];

        /*echo "\n\nSurvey 1\n". PHP_EOL;
        echo "1partner: ". $partner.PHP_EOL;
        echo "2fname: ". $partFname.PHP_EOL;
        echo "3Mname: ". $partMname.PHP_EOL;
        echo "4Lname: ".$partLname.PHP_EOL;
        echo "5SSN: ".$SSN.PHP_EOL;
        echo "6street: ".$street.PHP_EOL;
        echo "7city: ".$city. PHP_EOL;
        echo "8state: ".$state.PHP_EOL;
        echo "9zip: ".$zip.PHP_EOL;
        echo "10county: ".$county.PHP_EOL;
        echo "11sameAdd: ".$sameAdd.PHP_EOL;
        echo "12mailstreet: ".$mailStreet.PHP_EOL;
        echo "13mailcity: ".$mailCity.PHP_EOL;
        echo "14mainstate: ".$mailState.PHP_EOL;
        echo "15mailzip: ".$mailZip.PHP_EOL;
        echo "16mailcounty: ".$mailCounty.PHP_EOL;
        echo "17phone: ".$phone.PHP_EOL;
        echo "18phoneType: ".$phoneType.PHP_EOL;
        echo "19alphone: ".$alPhone.PHP_EOL;
        echo "20email: ".$partEmail.PHP_EOL;
        echo "20DOB: ".$partBthday.PHP_EOL;
        echo "21gender: ".$gender.PHP_EOL;
        echo "22otherAns ".$otherAns.PHP_EOL;
        echo "23DOBSQL: ".$partDOB_mysql.PHP_EOL;

        echo "\n\nSurvey 2\n";
        echo "24citizen: ".$citizenship.PHP_EOL;
        echo "25#uscis: ".$uscisNumber.PHP_EOL;
        echo "26uscisExp: ".$uscisExpired.PHP_EOL;
        echo "27selective: ".$selective.PHP_EOL;
        echo "28hispannic: ".$hispanic.PHP_EOL;
        echo "29america/alaska: ".$americanIndian_alaskanNative.PHP_EOL;
        echo "30africa/black: ".$africanAmerican_black.PHP_EOL;
        echo "31asian: ".$asian.PHP_EOL;
        echo "32haiwain: ".$hawaiian_other.PHP_EOL;
        echo "33white: ".$white.PHP_EOL;
        echo "34noAns: ".$noAnswer.PHP_EOL;
        echo "35language: ".$language.PHP_EOL;
        echo "36proficiency: ".$proficiency.PHP_EOL;
        echo "37disability: ".$disability.PHP_EOL;
        echo "38typeDisability: ".$typeDisability.PHP_EOL;
        echo "39schoolLevel: ".$schoolLevel.PHP_EOL;
        echo "40diploma: ".$diploma.PHP_EOL;
        echo "41highest school: ".$highestSchool.PHP_EOL;
        echo "42school status: ".$schoolStatus.PHP_EOL;
        echo "43uscisEXP SQL: ".$uscisExpired_mysql.PHP_EOL;

        echo "\n\nSurvey 3\n".PHP_EOL;;
        echo "44military: ".$military.PHP_EOL;
        echo "45militarySpouce: ".$militarySpouse.PHP_EOL;
        echo "46employee: ".$employment.PHP_EOL;
        echo "47pay rate: ".$payRate.PHP_EOL;
        echo "48ui: ".$ui.PHP_EOL;
        echo "49uiweek: ".$uiWeek .PHP_EOL;
        echo "50farmworker: ".$farmworker.PHP_EOL;
        echo "51jobTitle: ".$jobTitle.PHP_EOL;

        echo "\n\nSurvey 4\n".PHP_EOL;;
        echo "52foster: ".$foster.PHP_EOL;
        echo "53adult Edu: ".$adultEdu.PHP_EOL;
        echo "54youndBuit: ".$youthBuild.PHP_EOL;
        echo "55youthGrantNum: ".$youthGrantNum.PHP_EOL;
        echo "56jobCopr: ".$jobCorp.PHP_EOL;
        echo "57carlPerkin: ".$carlPerkins.PHP_EOL;
        echo "58tanf: ".$tanf.PHP_EOL;
        echo "59ssi: ".$ssi.PHP_EOL;
        echo "60generalAssist: ".$generalAssist.PHP_EOL;
        echo "61calFresh: ".$calFresh.PHP_EOL;
        echo "62refugeeAssit: ".$refugeeAssist.PHP_EOL;
        echo "63ssdi: ".$ssdi.PHP_EOL;
        echo "64snapTraining: ".$snapTraining.PHP_EOL;
        echo "65pellGrant: ".$pellGrant.PHP_EOL;

        echo "\n\nSurvey 5\n";
        echo "66workTicket: ".$workTicket.PHP_EOL;
        echo "67homeless: ".$homeless.PHP_EOL;
        echo "68exOffer: ".$exOffer.PHP_EOL;
        echo "69displace: ".$displace.PHP_EOL;
        echo "70singleParent: ".$singleParent.PHP_EOL;
        echo "71culBarrier: ".$culBarrier.PHP_EOL;
        echo "72familySize: ".$familySize.PHP_EOL;
        echo "73annualIncome: ".$annualIncome.PHP_EOL;
        echo "74techExp: ".$techExp.PHP_EOL;
        echo "75password: ".$partPassword.PHP_EOL;
        echo "76confirmPassword: ".$partConfirmPassword.PHP_EOL;*/

        /******************************Check survey 1*********************************/
        if(empty($partner) || empty($partFname) || empty($partLname) || empty($SSN)
        || empty($street)|| empty($city)|| empty($state)|| empty($zip)|| empty($county)
        || empty($sameAdd) || empty($phone)|| empty($phoneType)
        || empty($partEmail)|| empty($partBthday) || empty($gender)){
            echo "<script>alert('Please fill out the empty field');</script>";
            echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 300);</script>";
            exit();
        }
        else {

            if(empty($partMname)){
                $partMname = NULL;
            }

            if(empty($alPhone)){
                $alPhone = NULL;
            }

            if(!filter_var($partEmail,FILTER_VALIDATE_EMAIL)){
                echo "<script>alert('Invalid Mail. Please try again');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 300);</script>";
                exit();
            }
            else{
                $checkMail_stmt = $conn -> prepare("SELECT email FROM PARTICIPATION WHERE email = ?;");
                $checkMail_stmt -> bind_param("s",$partEmail);
                $checkMail_stmt->execute();
                $mailCheck = $checkMail_stmt ->get_result();
                if($mailCheck->num_rows >0){
                    echo "<script>alert('Email already used. Please use other email');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 300);</script>";
                    exit();
                }
                $checkMail_stmt -> close();
            }

            if($sameAdd === "Yes"){
            $mailStreet	      = $street;
            $mailCity		  = $city;
            $mailState	      = $state;
            $mailZip  	      = $zip;
            $mailCounty  	  = $county;
            }
            else {
                if(empty($mailStreet) || empty($mailCity) || empty($mailState)
                || empty($mailZip) || empty($mailCounty)){
                    echo "<script>alert('Please fill out the empty field');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                    exit();
                }
            }

            if($gender === "other"){
                 if(empty($otherAns)){
                    echo "<script>alert('Please fill out the other answer');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                    exit();
                 }
                 $gender = $otherAns;
            }
            else {
                $otherAns = NULL;
            }
        }
        /****************************** End Check survey 1*********************************/


        /***********************************Check survey 2*********************************/
        if(empty($citizenship) || empty($selective) || empty($hispanic) || empty($language)
        || empty($proficiency) || empty($disability)|| empty($schoolLevel) || empty($diploma)
        || empty($highestSchool) || empty($schoolStatus)){
            echo "<script>alert('Please fill out the empty field');</script>";
            echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
            exit();
        }
        else {

            if($citizenship === "greenCard" || $citizenship === "alien"){
                if(empty($uscisNumber) || empty($uscisExpired)){
                    echo "<script>alert('Please fill out your uscis number and expired date');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                    exit();
                }
            }

            if($citizenship === "Citizen" ){
                 $uscisNumber = "N/A";
                 $uscisExpired = NULL;
                 $uscisExpired_mysql = NULL;
            }

            if(empty($americanIndian_alaskanNative) && empty($africanAmerican_black)&&empty($asian)
            && empty($hawaiian_other) && empty($white) && empty($noAnswer)){
                echo "<script>alert('Please choose your athnicity');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
            }

            if(empty($americanIndian_alaskanNative)){
                    $americanIndian_alaskanNative = "No";
                }

            if(empty($africanAmerican_black)){
                    $africanAmerican_black = "No";
                }

            if(empty($asian)){
                    $asian = "No";
                }

            if(empty($hawaiian_other)){
                    $hawaiian_other = "No";
                }

            if(empty($white)){
                    $white = "No";
                }

            if(empty($noAnswer)){
                $noAnswer = "No";
            }
            if($noAnswer === "Yes"){
                    $americanIndian_alaskanNative = "No";
                    $africanAmerican_black = "No";
                    $asian = "No";
                    $hawaiian_other = "No";
                    $white = "No";
                }

        }

            if($disability === "Yes"){
                if(empty($typeDisability)){
                    echo "<script>alert('Please fill out your disability type');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                    exit();
                }
            }
            else{
                $typeDisability = NULL;
            }

         /****************************** End Check survey 2*********************************/


         /********************************** Check survey 3*********************************/
        if(empty($military) || empty($militarySpouse) || empty($employment)||empty($ui)
        || empty($farmworker) || empty($jobTitle)){
            echo "<script>alert('Please fill out the empty field');</script>";
            echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
            exit();
        }
        else{

            if($employment === "Employed"){
                if(empty($payRate)){
                    echo "<script>alert('Please fill out your pay rate');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                    exit();
                }
            }
            else{
                $payRate = 0;
            }

            if($ui === "Claimant"){
                if(empty($uiWeek)){
                    echo "<script>alert('Please fill out number of week you claim unemployment insurance');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                    exit();
                }
            }
            else{
                $uiWeek = 0;
            }
        }
         /****************************** End Check survey 3*********************************/


         /****************************** End Check survey 4*********************************/
         if(empty($foster) || empty($adultEdu) || empty($youthBuild) || empty($jobCorp)
         || empty($carlPerkins) || empty($tanf) || empty($ssi) || empty($generalAssist)
         || empty($calFresh) || empty($refugeeAssist) || empty($ssdi) || empty($snapTraining)
         || empty($pellGrant)){
            echo "<script>alert('Please fill out the empty field');</script>";
            echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
            exit();
         }
         else {
            if($youthBuild === "Yes"){
                if(empty($youthGrantNum)){
                    echo "<script>alert('Please fill out Youth Build Grant Number');</script>";
                    echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                    exit();
                }
            }
            else {
                $youthGrantNum = NULL;
            }
         }
         /****************************** End Check survey 4*********************************/


         /****************************** End Check survey 5*********************************/
         if(empty($workTicket) || empty($homeless) || empty($exOffer) || empty($displace)
         || empty($singleParent) || empty($culBarrier) || empty($familySize)|| empty($annualIncome)
         || empty($techExp) || empty($partPassword) || empty($partConfirmPassword)){
            echo "<script>alert('Please fill out the empty field');</script>";
            echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
            exit();
         }
         else{
            if($partPassword !== $partConfirmPassword) {
                echo "<script>alert('Password not match');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
            }
         }
         /****************************** End Check survey 5*********************************/


         /****************************** INSERT INTO DATABASE*******************************/
        /***** Hashing Password *****/
         $participationPassword_hash = password_hash($partPassword,PASSWORD_DEFAULT);

         $activationCode = bin2hex(random_bytes(16));
         $hashedCode=password_hash($activationCode,PASSWORD_DEFAULT);
         $current_time = date('Y-m-d H:i:s');
         $expirary = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($current_time)));

         /***** Insert to PARTICIPATION *****/
         $stmt1 = $conn-> prepare("INSERT INTO PARTICIPATION (fname,lname,MI,email,newUserPassword,programPartnerReference,
         last4SSn,DOB,gender,primaryPhone,phoneNumType,altPhone,activation_code,activation_expiry) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
         $stmt1->bind_param("ssssssisssssss",$partFname,$partLname,$partMname,$partEmail,$participationPassword_hash,$partner,
         $SSN,$partDOB_mysql,$gender,$phone,$phoneType,$alPhone,$hashedCode,$expirary);
         if(!$stmt1 ->execute()){
                echo "<script>alert('Query Error 1');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt1 -> close();


          /***** Get user ID *****/
         $stmt2 = $conn->prepare("SELECT userID, email FROM PARTICIPATION WHERE email = ?; ");
         $stmt2 ->bind_param("s",$partEmail );
          if(!$stmt2 ->execute()){
                echo "<script>alert('Query Error 2');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }

         $result = $stmt2->get_result();

         if($result->num_rows >0){
            $row = $result->fetch_assoc();
            $userID = $row['userID'];
            $userEmail = $row['email'];
            $_SESSION['userID'] = $row['userID'];
         }
         $stmt2 ->close();

         /***** Adress table *****/
        $stmt3 = $conn->prepare("INSERT INTO ADDRESS (userID,street,city,state,zipcode,county,mailingStreet, mailingCity,
        mailingState, mailingZipcode, mailingCounty) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
        $stmt3 -> bind_param("issssssssss",$userID, $street,$city,$state,$zip,$county,
        $mailStreet,$mailCity,$mailState,$mailZip,$mailCounty);
        if(!$stmt3 ->execute()){
                echo "<script>alert('Query Error 3');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt3 -> close();

        /***** Citizen table *****/
        $stmt4 = $conn->prepare("INSERT INTO CITIZEN (userID,usCitizenshipStatus,alienRegistrationCode,alienRegistrationCodeEXP)
        VALUES (?,?,?,?);");
        $stmt4 -> bind_param("isss", $userID,$citizenship,$uscisNumber,$uscisExpired_mysql);
        if(!$stmt4 ->execute()){
                echo "<script>alert('Query Error 4');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt4 -> close();

         /***** Education table *****/
        $stmt5 = $conn->prepare("INSERT INTO EDUCATION (userID,highSchoolStatus,highSchooolDiplomaOrEquil,highestGradeComplete,inSchool)
        VALUES (?,?,?,?,?);");
        $stmt5 -> bind_param("issss", $userID,$schoolLevel,$diploma,$highestSchool,$schoolStatus);
        if(!$stmt5 ->execute()){
                echo "<script>alert('Query Error 5');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt5 -> close();

        /***** Ethnicity table *****/
        $stmt6 = $conn->prepare("INSERT INTO ETHNICITY (userID,hispanicHeritage,africanAmercian_black,americanIndian_alaskanNative,
        asian,hawaiian_other,white,noAnswer, primaryLanguage,englishProficiency)
        VALUES (?,?,?,?,?,?,?,?,?,?);");
        $stmt6 -> bind_param("isssssssss", $userID,$hispanic,$africanAmerican_black,$americanIndian_alaskanNative,$asian,
        $hawaiian_other,$white,$noAnswer,$language,$proficiency);
        if(!$stmt6 ->execute()){
                echo "<script>alert('Query Error 6');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt6 -> close();

        /***** Employment table *****/
        $stmt7 = $conn->prepare("INSERT INTO EMPLOYMENT (userID,currentMilitaryOrVet, militarySpouse, selectiveService,employmentStatus,
        payRate,unemployemntInsurance,unemploymentWeeks,farmworker12Months,desiredJobTitle,techExperience)
        VALUES (?,?,?,?,?,?,?,?,?,?,?);");
        $stmt7 -> bind_param("issssisisss", $userID,$military,$militarySpouse,$selective,$employment,
        $payRate,$ui,$uiWeek,$farmworker,$jobTitle,$techExp);
        if(!$stmt7 ->execute()){
                echo "<script>alert('Query Error 7');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt7 -> close();

        /***** Hardship table *****/
        $stmt8 = $conn->prepare("INSERT INTO HARDSHIP (userID,ticketToWork,homelessStatus,exOffender,displacedHomemaker,
        IsDisability,disabilityDescription,singleParent,culturalBarriers,familySize,annualizedFamilyIncome)
        VALUES (?,?,?,?,?,?,?,?,?,?,?);");
        $stmt8 -> bind_param("issssssssii", $userID,$workTicket,$homeless,$exOffer,$displace,$disability,
        $typeDisability,$singleParent,$culBarrier,$familySize,$annualIncome);
        if(!$stmt8 ->execute()){
                echo "<script>alert('Query Error 8');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt8 -> close();

        /***** Services table *****/
        $stmt9 = $conn->prepare("INSERT INTO SERVICES (userID,fosterCare,adultEducationWIOATittleII,youthBuild,youthBuildGrant,
        jobCorps,vocationalEducationCarlPerkins,tanfRecipient,ssiRecipient,gaRecipient,snapRecipientCalFresh,
        rcaRecipient,ssdiRecipient,snapEmploymentAndTrainingProgram,pellGrant)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
        $stmt9 -> bind_param("issssssssssssss", $userID,$foster,$adultEdu,$youthBuild,$youthGrantNum,$jobCorp,$carlPerkins,
        $tanf,$ssi,$generalAssist,$calFresh,$refugeeAssist,$ssdi,$snapTraining,$pellGrant);
        if(!$stmt9 ->execute()){
                echo "<script>alert('Query Error 9');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt9 -> close();


        /***** Login table *****/
        $stmt10 = $conn->prepare("INSERT INTO LOGIN (userID,loginEmail,loginPassword)
        VALUES (?,?,?);");
        $stmt10 -> bind_param("iss", $userID,$userEmail,$participationPassword_hash);
        if(!$stmt10 ->execute()){
                echo "<script>alert('Query Error 10');</script>";
                echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
                exit();
         }
         $stmt10 -> close();

        //$activation_link = "http://localhost/CSC_190_Product/includes/activate.php?email=$partEmail&activation_code=$activationCode";
        $activation_link = "http://localhost/CSC_190_Product/accountActivate.php";
        // Create a new PHPMailer instance
        $confirmMail = new PHPMailer;

        // Set up SMTP connection
        $confirmMail->isSMTP(true);
        $confirmMail->Host = SMTP_HOST;
        $confirmMail->Port = SMTP_PORT;
        $confirmMail->SMTPAuth = true;
        $confirmMail->Username = SMTP_USERNAME;
        $confirmMail->Password = SMTP_PASSWORD;

        // Set up email content
        $confirmMail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
        $confirmMail->addAddress($userEmail, $partFname." ".$partLname);
        $confirmMail->Subject = 'California Confirmation Link';
        //$confirmMail->Body = "Welcome ".$partFname." ".$partLname." to California Mobility Center\n\n".
        //                     "This is your confirmation link\n".$activation_link;
        $confirmMail->Body = "Welcome ".$partFname." ".$partLname." to California Mobility Center\n\n".
                             "Go to this page: \n".$activation_link."\n\nAnd use this code to activate your account: \n".$activationCode;

        if ($confirmMail->send()) {
            header("Location: ../checkEmail.php");
            exit();
        } else {
            echo "<script>alert('Confirmation Email error');</script>";
            echo "<script>setTimeout(function(){window.location.href='../survey.php'}, 0);</script>";
            exit();
        }

    }
?>

