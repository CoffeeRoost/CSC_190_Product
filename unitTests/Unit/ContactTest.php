<?php

use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase {
    public function testSqlQuery() {
        include_once("includes/dbh.inc.php");

        // Arrange
        $expectedData = array(
            array(
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'johndoe@example.com',
                'street' => '123 Main St',
                'city' => 'Anytown',
                'state' => 'CA',
                'zipcode' => '12345'
            ),
            // add more expected data rows here
        );

        // Act
        $actualData = array();
        $query = "SELECT part.fname,part.lname,part.email,a.street,a.city,a.state,a.zipcode
                  FROM participation part
                  JOIN address a
                  ON part.userID=a.userID";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $actualData[] = $row;
        }

        // Assert
        $this->assertEquals($expectedData, $actualData);
    }
}
