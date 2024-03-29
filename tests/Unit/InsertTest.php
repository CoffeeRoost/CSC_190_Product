<?php

use PHPUnit\Framework\TestCase;

//to make sure it commits
class InsertTest extends TestCase {
    public function testSqlQuery() {
        // Arrange
        $expectedData = array(
            array(
                'IntegerTest' => '0',
		        'VarCharTestPK'=> 'TestV',
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

        $testSTMT = $conn-> prepare("INSERT INTO TESTING (IntegerTest,VarCharTestPK,DateTest,CharTest) 
                        VALUES (?,?,?,?);");
        $testSTMT->bind_param("isss",$IntegerTest,$VarCharTestPK,$DateTest,$CharTest);
        
        $IntegerTest = 0;
        $VarCharTestPK = "TestV";
        $DateTest = "2023-03-02";
        $CharTest = "TestC";
        
        $testSTMT->execute();
        $testSTMT->close();

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