<?php
    $conn_string = "host=localhost port=5432 dbname=duhknow user=postgres password=password";
    //Password is whatever you set you psql password to be
    $dbconn = pg_connect($conn_string);
?>