<?php
    $DB_HOST="aws.connect.psdb.cloud";
    $DB_USERNAME="j8lj4rxa0u1xgi2k2u7k";
    $DB_PASSWORD="pscale_pw_AWltbBtBzBRbTxoNRsr4Y8mC6aQ49dTtIvThpGABvnA";
    $DB_NAME="gotogrodb";
    $MYSQL_ATTR_SSL_CA="/etc/ssl/cert.pem";

    $conn = mysqli_init();
    $conn->ssl_set(NULL, NULL, $MYSQL_ATTR_SSL_CA, NULL, NULL);
    $conn->real_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    
?>
