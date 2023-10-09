<?php
    $DB_HOST="aws.connect.psdb.cloud";
    $DB_USERNAME="22htlxtybsgmxhicztkl";
    $DB_PASSWORD="pscale_pw_MeNGYcXnh0zq5AKeF7jwTThT6VvGaHWWQNF54OPAKOs";
    $DB_NAME="gotogrodb";
    $MYSQL_ATTR_SSL_CA="/etc/ssl/cert.pem";

    $conn = mysqli_init();
    $conn->ssl_set(NULL, NULL, $MYSQL_ATTR_SSL_CA, NULL, NULL);
    $conn->real_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
?>
