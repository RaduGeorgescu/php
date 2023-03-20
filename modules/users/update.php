<?php
	//REQUIRE CONNECTION
	require_once "../../core/connection.php";

	// echo header("not-real.php", true, 404);

	try {
		
		//handles the JSON data and chages it into an array
		$json 		= file_get_contents('php://input');
		$decoded 	= json_decode($json, true);
		$total 		= count((array)$decoded) - 1; //number of std objects -1 for looping purposes
		$arr 			= array();

		//goes through the data data and createas it as an array from an stdObject
		for ($x = 0; $x <= $total; $x++) {

			$arr[$decoded[$x]["name"]] = $decoded[$x]["value"];

		}	

		//Gets through the array created with the for loop and adds each item as a variable
		$ID 				= $arr['id'];
		$name 			= $arr['name'] ?? '';
		$position 	= $arr['position'] ?? '';
		$office 		= $arr['office'] ?? '';
		$age 				= $arr['age'] ?? '';
		$startdate 	= $arr['startdate'] ?? '';
		$salary 		= $arr['salary'] ?? '';

		//sends an SQL Update requests with all the parameters
		$sql = "UPDATE testTable 
	          SET name      = '$name', 
	              position  = '$position', 
	              office    = '$office', 
	              age       = '$age', 
	              Startdate = '$startdate', 
	              salary    = '$salary'
	          WHERE ID = $ID";
		var_dump($sql);
		$stmt = sqlsrv_query($conn, $sql);

		//handles erros on SQL side
		if ($stmt === false) {
			die(print_r(sqlsrv_errors(), true));

		}
		
		echo "Record updated successfully";
		
		//free the statement and close the connection
		sqlsrv_free_stmt($stmt);
		sqlsrv_close($conn);

	} catch (\Throwable $th) { //error handling on PHP side
		throw new Exception("Error Processing Request", 1);

	}

?>