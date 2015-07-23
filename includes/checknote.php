<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
Echo "ran 1 ";
sec_session_start();
if(login_check($mysqli) == true) {
	Echo "ran 2 ";
$uid = $_COOKIE["UID"];
$query = "SELECT hashid, friendcode FROM members WHERE UID='$uid'";
foreach ($dbh->query($query) as $row) {
$hashidv = $row['hashid'];
$friendcodev = $row['friendcode'];
}
Echo "ran 3 ";
$signature = hash('sha256', $hashidv.$friendcodev);
$pin = hash('sha256', $_POST["pin"]);
$sighmac = hash_hmac('sha256', $signature, $pin);
$_SESSION['sig'] = $sighmac;
require_once 'verify-hmac.php';
$_SESSION["sigsql"] = $sqlhmac;
Echo "ran 4 ";
if ($sighmac === $sqlhmac) {
	Echo "ran 5 ";
require_once 'querynote.inc.php';
Echo "ran 6 ";
}
}else{header('Location: ../login.php');}
}
?>