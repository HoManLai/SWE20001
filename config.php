<?php
    $dbHost = "dbgotogro.cmibhz6gn2ip.us-east-1.rds.amazonaws.com";
    $dbUsername = "DB_CL4_T2";
    $dbPassword = ".Hy-x6BomrTe-aXMArWh";
    $dbName = "dbgotogro";
    $dbPort = 3306;

   /// new connection
    $con = new mysqli($_SERVER[$dbHost], $_SERVER[$dbUsername], $_SERVER[$dbPassword], $_SERVER[$dbName], $_SERVER[$dbPort]);
?>
