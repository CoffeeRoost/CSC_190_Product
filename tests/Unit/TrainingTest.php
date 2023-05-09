<?php

use PHPUnit\Framework\TestCase;

class TrainingTest extends TestCase {
    public function testSqlQuery() {
        // Arrange
        $expectedData = array(
            array(
                'clientLName' => 'Duong',
                'clientFName' => 'Thuy',
                'coach' => 'Cindy Duong',
                'employeeID' => '2',
                'userID' => '2',
                'activityCode' => '102 Initial Assessment',
                'trainingProgram' => 'essential skills',
                'startDate' => '2023-04-07',
                'endDate' => '2023-04-30',
                'minutes' =>'1234',
                'notes' => 'Some notes'
            ),
            // add more expected data rows here
        );

        $conn = mysqli_connect("127.0.0.1", "root", "", "csc190");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Act
        $actualData = array();
        $query = "SELECT t.coach,t.activityCode,t.trainingProgram, t.startDate,t.endDate,t.notes, t.minutes, t.employeeID, t.userID, t.clientLName,t.clientFName
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
?>
