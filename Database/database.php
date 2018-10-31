<?php
    $dsn = 'mysql:host=localhost;dbname=duhknow';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        die($error_message);
    }
?>