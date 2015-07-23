<?php
require_once 'db_connect.php';
require_once 'functions.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$signaturelookup = $_SESSION["sig"];
$query = "SELECT sighmac FROM usermask WHERE sighmac='$signaturelookup'";
foreach ($dbh->query($query) as $row) {
$sqlhmac = $row['sighmac'];
}
}
?>