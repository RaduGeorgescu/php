<?php
//REQUIRE CONNECTION
require_once "../../core/connection.php";
try {
    //Recieves the data from the request and puts it in variables
    // var_dump($_POST);
    $name = $_POST['Name_create'];
    $position = $_POST['Position_create'];
    $office = $_POST['office_create'];
    $age = $_POST['age_create'];
    $startDate = $_POST['startDate_create'];
    $salary = $_POST['salary_create'];

    //sends an SQL Insert requests with all the parameters
    $sql = "INSERT INTO testTable (Name, Position, Office, Age, StartDate, Salary) VALUES (?, ?, ?, ?, ?, ?)";
    $params = array($name, $position, $office, $age, $startDate, $salary);
    // var_dump($params);
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