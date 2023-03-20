<?php

    $serverName = "DESKTOP-E9OO5M6\\SQLEXPRESS"; //serverName\instanceName

    // Since UID and PWD are not specified in the $connectionInfo array,
    // The connection will be attempted using Windows Authentication.
    $connectionInfo = ["Database" => "testDb"];
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if($conn === false) {
        echo "Failed to connect to SQL Server.<br>";
        die(print_r(sqlsrv_errors(), true));
    }
?>