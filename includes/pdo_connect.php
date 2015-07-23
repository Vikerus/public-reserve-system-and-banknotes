<?php

/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=reservesphp;host=127.0.0.1';
$user = 'phpmate';
$password = 'freeagent7';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
