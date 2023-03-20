<?php
  //REQUIRE CONNECTION
  require_once "../../core/connection.php";

  try {
    //Recieves variables for delete request and sends the delete request
    $id     =$_GET['id'];
    $params = array($id);
    $query  = "DELETE FROM testTable WHERE ID = ?";  
    $stmt   = sqlsrv_query($conn, $query, $params);
		
    //handles erros on SQL side
    if ($stmt === false) {
      die(print_r(sqlsrv_errors(), true));
    }

    echo "deleted";

    //free the statement and close the connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

  } catch (\Throwable $th) { //error handling on PHP side
    throw new Exception("Error Processing Request", 1);
  }
?>