<?php

use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase {
    public function testSqlQuery() {
        // Arrange
        $expectedData = array(
            array(
                'IntegerTest' => '0',
                'VarCharTestPK' => 'TestV',
                'DateTest' => '2023-03-02',
                'CharTest' => 'TestC',
            ),
            // add more expected data rows here
        );

        $conn = mysqli_connect("localhost", "root", "", "csc190");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $VarCharTestPK = "TestV";

        // Act
        $actualData = array();
        $query = "SELECT IntegerTest,VarCharTestPK,DateTest,CharTest FROM TESTING WHERE VarCharTestPK='$VarCharTestPK'";
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
