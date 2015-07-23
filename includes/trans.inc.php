<?php
require_once 'pdo_connect.php';
if($_POST['count'] <= 0){die('Cannot be less then 1! Silly.');}
if($_POST['count'] >= 11){die('Cannot be more then 10 items! You can preform more then one trade. . .');}
ini_set("auto_detect_line_endings", true);
	//Turnicate the UID in DB
	echo 'opened include...';
if(login_check($mysqli) == true) {

$query = "SELECT friendcode, hashid, pin FROM members 
    WHERE username='$tradeuser'";
foreach ($dbh->query($query) as $row) {
	$hashiduser = $row['hashid'];
	$fcodeuser = $row['friendcode'];
	$pinuser = $row['pin'];
}

if(empty($pinuser)){die('ERROR: Empty Request')}

$signatureU = hash('sha256', $hashiduser.$fcodeuser);
$sighmacU = hash_hmac('sha256', $signatureU, $pinuser);

$query = "SELECT sighmac FROM usermask 
    WHERE sighmac='$sighmacU'";
foreach ($dbh->query($query) as $row) {
	$sigcheck = $row['sighmac'];
}

if (empty($pinuser)){
echo "error no pin recorded";
}else{
	
$query"SELECT itemid, amount FROM vault WHERE signature='$sighmacU' AND itemid='$tradeitem'";
foreach ($dbh->query($query) as $row) {
	$itemcheck = $row['itemid'];
	$tradezero = $row['amount'];
}

$tradeupdate = $tradezero+$tradecount;
$_SESSION['itemc'] = $tradezero;
}
}
else
{
header('Location: ../logout.php');
}

?>