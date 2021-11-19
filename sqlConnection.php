<?php

class sqlConnection {
	
	private $hostName; 
	private $dbName; 
	private $userName;
	private $password;
	private $conn;

	function __construct(){
		$this->hostName = "localhost";
		$this->dbName = "id17843849_expensetrackerdb";
		$this->userName = "id17843849_expensetrackerdbuser";
		$this->password = "AVpczEYqz;*?[8/";
	}

	function connectToDatabase() {
		
		// Create connection
		$conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);

		// Check connection
		if ($conn->connect_error) {
			die("Connection to $this->dbName failed: " . $conn->connect_error);
		}
	}
}

?>