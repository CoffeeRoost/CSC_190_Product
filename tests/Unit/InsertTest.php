<?php

use PHPUnit\Framework\TestCase;

//to make sure it commits
class InsertTest extends TestCase {
    public function testSqlQuery() {
        // Arrange
        $expectedData = array(
            array(
		        'userID'=> '0',
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'johndoe@example.com',
                'programPartnerReference' => 'Testing Organization',
                'last4SSN' => '7777',
            ),
            // add more expected data rows here
        );

        $conn = mysqli_connect("localhost", "root", "", "csc190");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $testSTMT = $conn-> prepare("INSERT INTO PARTICIPATION (userID,fname,lname,email,newUserPassword,programPartnerReference,
                        last4SSN,DOB,gender,primaryPhone,phoneNumType,activation_code,activation_expiry) 
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");
        $testSTMT->bind_param("isssssissssss",$userID,$partFname,$partLname,$partEmail,$participationPassword_hash,$partner,
                                $SSN,$partDOB_mysql,$gender,$phone,$phoneType,$hashedCode,$expirary);
        
        $userID = 0;
        $partFname = "John";
        $partLname = "Doe";
        $partEmail = "johndoe@example.com";

        $password_unhashed = "43^@Hello2#%1Goodbye";
        $participationPassword_hash = password_hash($password_unhashed,PASSWORD_DEFAULT);

        $partner = "Testing Organization";
        $SSN = "7777";
        $partDOB_mysql = "2023-03-02";
        $gender = "Other";
        $phone = "5306708989";
        $phoneType = "cellphone";

        $activationCode = bin2hex(random_bytes(16));
        $hashedCode=password_hash($activationCode,PASSWORD_DEFAULT);

        $expirary = "2077-03-02";
        
        $testSTMT->execute();
        $testSTMT->close();

        // Act
        $actualData = array();
        $query = "SELECT userID, fname, lname, email, programPartnerReference, last4SSN FROM PARTICIPATION WHERE userID=$userID";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $actualData[] = $row;
        }

        mysqli_close($conn);

        // Assert

        $this->assertEquals($expectedData, $actualData);
    }
}
?>