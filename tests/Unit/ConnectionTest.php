<?php

use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase 
{

    public function testSqlConnection() 
	{

        $conn = mysqli_connect("localhost", "root", "", "csc190");

        $this->assertFalse(mysqli_connect_errno(), "Failed to connect to MySQL");
		
		mysqli_close($conn);
    }
}
?>