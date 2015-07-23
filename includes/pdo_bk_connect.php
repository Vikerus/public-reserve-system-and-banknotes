<?php

/* Connect to an ODBC database using driver invocation */
$dsni = 'mysql:dbname=phpbank;host=127.0.0.1';
$user = 'phpmate';
$password = 'freeagent7';

try {
    $dbhi = new PDO($dsni, $user, $password);
} catch (PDOException $ei) {
    echo 'Connection failed: ' . $ei->getMessage();
}
