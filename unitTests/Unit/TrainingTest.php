<?php

use PHPUnit\Framework\TestCase;

class TrainingTest extends TestCase {
    public function testSqlQuery() {
        // Arrange
        $expectedData = array(
            array(
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'johndoe@example.com',
                'coach' => 'Jane',
                'activityCode' => '123',
                'trainingProgram' => 'Training',
                'startDate' => '2022-01-01',
                'endDate' => '2022-01-31',
                'notes' => 'Some notes'
            ),
            // add more expected data rows here
        );

        $conn = mysqli_connect("localhost", "root", "", "csc190");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Act
        $actualData = array();
        $query = "SELECT part.fname,part.lname,part.email,t.coach,t.activityCode,t.trainingProgram, t.startDate,t.endDate,t.notes
                  FROM participation part
                  JOIN participationReportActivity t
                  ON part.userID=t.userID";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $actualData[] = $row;
        }

        mysqli_close($conn);

        // Assert

        $this->assertEquals($expectedData, $actualData);
    }
}