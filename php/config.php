<?php
    $dbHost="aws.connect.psdb.cloud";
    $dbUsername="dwy9oxkxd97co32x0sod";
    $dbPassword="pscale_pw_uXJK1HpHjxBpItIWdbsKoEbWe27vY9uiFtj30QYGynf";
    $dbName="gotogrodb";

   /// new connection
   $conn = mysqli_init();
   $conn->ssl_set(NULL, NULL, "/etc/ssl/cert.pem", NULL, NULL);
   $conn->real_connect($dbHost, $dbUsername, $dbPassword, $dbName);
?>
