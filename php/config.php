<?php
    $dbHost = "dbgotogro.cmibhz6gn2ip.us-east-1.rds.amazonaws.com";
    $dbUsername = "DB_CL4_T2";
    $dbPassword = ".Hy-x6BomrTe-aXMArWh";
    $dbName = "dbgotogro";
    $dbPort = 3306;

   /// new connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die('Connection failure: ' . $conn->connect_error);
    }

?>
