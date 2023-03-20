<?php
    require_once "../../core/connection.php";

    try {
        //recieves the id and sends a query to the sql server for that id
        $id     = $_POST['id'];
        $params = array($id);
        $query  = "SELECT * FROM testTable WHERE ID = ?";  
        $stmt   = sqlsrv_query($conn, $query, $params);
        
        //handles erros on SQL side
        if ($stmt === false) {
          die(print_r(sqlsrv_errors(), true));
        }
        
        //gets the data, puts it into an array and sends it back
        $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        echo json_encode($data);
        
        //free the statement and close the connection
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);

    } catch (\Throwable $th) { //error handling on PHP side
        throw new Exception("Error Processing Request", 1);
    }


?>