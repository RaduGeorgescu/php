<?php
class Users {
	public function __construct() {
		//
		
	}

	public static function read() {
		$serverName = "DESKTOP-E9OO5M6\\SQLEXPRESS"; //serverName\instanceName

		// Since UID and PWD are not specified in the $connectionInfo array,
		// The connection will be attempted using Windows Authentication.
		$connectionInfo = ["Database" => "testDb"];
		$conn = sqlsrv_connect($serverName, $connectionInfo);
	
		if($conn === false) {
			echo "Failed to connect to SQL Server.<br>";
			die(print_r(sqlsrv_errors(), true));
		}
	
		try {

			//Selects all from the SQL table
			$stmt = sqlsrv_query($conn, "SELECT * FROM testTable");
	
			//handles erros on SQL side
			if ($stmt === false) {
			  die(print_r(sqlsrv_errors(), true));
			}
	
			//adds every value to the rows array
			$rows = array();
			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
				$rows[] = $row;
			}
	
			//sends the rows array bakc
			echo json_encode($rows);
	
		} catch (\Throwable $th) { //error handling on PHP side
			throw new Exception("Error Processing Request", 1);
		}
	}

	public static function insert() {
		echo 'insert';
	}
}