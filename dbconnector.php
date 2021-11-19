<?php
	require "sqlConnection.php";
	class dbConnection {

		// Since the dbConnection instance is initially set to null this means
		// that there is no current database connection
		private static $instance = null;

		private $newSQLConnection;

		//constructor we only want accessed once to create an sql connection
		private function __construct(){
		    $newSQLConnection = new sqlConnection();//create new object of sqlConnection class
			$newSQLConnection->connectToDatabase();
		}

		public static function getdbConnection(){
			if(self::$instance == null) $instance = new dbConnection();
			
			return $instance;
		}
		
	}
	
?>
