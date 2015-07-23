<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$error_msg = "";
$uid = $_COOKIE["UID"];
$tolerance = $_POST["tolerance"];
$secclean = $tolerance;
$stripA = stripcslashes("$secclean");
$stripC = stripslashes("$stripA");
$seccleaner = strip_tags("$stripC");
//echo "ran 1 0";
if("$secclean"==="$seccleaner"){
	//echo "ran 2 0";
$query = "SELECT hashid, friendcode FROM members WHERE UID='$uid'";
foreach ($dbh->query($query) as $row) {
$hashidv = $row['hashid'];
$friendcodev = $row['friendcode'];
}

$signature = hash('sha256', $hashidv.$friendcodev);
$pin = hash('sha256', $_POST["pin"]);
$sighmac = hash_hmac('sha256', $signature, $pin);

$_SESSION["sig"] = $sighmac;
require_once 'verify-hmac.php';
	//echo "ran 3 0";
if ($sighmac === $sqlhmac) {
if(!empty($tolerance)){
	$count = $dbh->exec("UPDATE members SET tolerance='$tolerance' WHERE UID='$uid'");}
$_SESSION["tolerance"] = $tolerance;
    header('Location: ../index.php');
}
}
}
}
?>