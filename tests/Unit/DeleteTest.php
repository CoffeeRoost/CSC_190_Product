<?php

use PHPUnit\Framework\TestCase;

class DeleteTest extends TestCase {
    public function testSqlQuery() {
        // Arrange
        $expectedData = array(
            array(
		        'userID'=> '777',
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

        $testSTMT = $conn->prepare("DELETE FROM PARTICIPATION WHERE userID=?;");
		$testSTMT ->bind_param("i",$userID);

        $userID = 777;

		$testSTMT ->execute();
        $testSTMT ->close();

        // Act
        $actualData = array();
        $query = "SELECT userID, fname, lname, email, programPartnerReference, last4SSN FROM PARTICIPATION WHERE userID=$userID";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $actualData[] = $row;
        }

        mysqli_close($conn);

        // Assert

        $this->assertNotEquals($expectedData, $actualData);
    }
}
?>