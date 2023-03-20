<?php
    //REQUIRE CONNECTION
    require_once "../../core/connection.php";
    try {
        //Recieves the data from the request and puts it in variables
        $name       = $_POST['name'];
        $position   = $_POST['position'];
        $office     = $_POST['office'];
        $age        = $_POST['age'];
        $startDate  = $_POST['startDate'];
        $salary     = $_POST['salary'];
    
        //sends an SQL Insert requests with all the parameters
        $sql = "INSERT INTO testTable (Name, Position, Office, Age, StartDate, Salary) VALUES (?, ?, ?, ?, ?, ?)";
        $params = array($name, $position, $office, $age, $startDate, $salary);
        $stmt = sqlsrv_query($conn, $sql, $params);
    
        //handles erros on SQL side
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    
        echo 'user inserted succesfully';
        
        //free the statement and close the connection
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);

    } catch (\Throwable $th) { //error handling on PHP side
        throw new Exception("Error Processing Request", 1);

    }

?>