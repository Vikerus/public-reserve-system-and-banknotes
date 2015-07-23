<?php
session_start();
$timechecker = $_SERVER['REQUEST_TIME_FLOAT']-2.100;
$timesession = $_SESSION['timecheck'];
if($timesession >= $timechecker){echo "There is a 2 second wait between queries!";}else{
$_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];
require_once 'pdo_connect.php';
$query = "SELECT post FROM userposts ORDER BY id DESC LIMIT 0, 30";
foreach ($dbh->query($query) as $row) {
$texti = base64_decode($row['post']);
$text = gzuncompress($texti);
$stringthrow1 = "$text";
echo $stringthrow1;
unset($text,$stringthrow1);
}
}
?> 