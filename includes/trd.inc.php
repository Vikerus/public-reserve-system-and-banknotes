<?php
require_once 'pdo_connect.php';
if($_POST['count'] <= 0){die('Cannot be less then 1!');}
ini_set("auto_detect_line_endings", true);
if(login_check($mysqli) == true) {
$query = "SELECT points, friendcode, hashid, pin FROM members WHERE username='$tradeuser'";
foreach ($dbh->query($query) as $row) {
	$hashiduser = $row['hashid'];
	$fcodeuser = $row['friendcode'];
	$pinuser = $row['pin'];
	$pointsuser = $row['points']+$tradecount;
}

$signatureU = hash('sha256', $hashiduser.$fcodeuser);
$sighmacU = hash_hmac('sha256', $signatureU, $pinuser);

$query = "SELECT sighmac FROM usermask WHERE sighmac='$sighmacU'";
foreach ($dbh->query($query) as $row) {
	$usernewgold = $row['donorgold']+$tradecount;
	$usernewtokens = $row['donortokens']+$tradecount;
	$usernewexp = $row['exp']+$tradecount;
	$usernewskpoints = $row['skillpoints']+$tradecount;
}

$query = "SELECT donorgold, donortokens, exp, skillpoints FROM donor 
    WHERE signature='$sigcheck'";
foreach ($dbh->query($query) as $row) {
	$sigcheck = $row['sighmac'];
}
}
else
{
header('Location: ../logout.php');
}

?>