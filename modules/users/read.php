<?php
    //REQUIRE CONNECTION
    require_once "../../core/connection.php";

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
?>