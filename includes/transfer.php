<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
if(empty($_POST['pin'])){die('ERROR: Empty Request');}
if(empty($_POST['user'])){die('ERROR: Empty Request');}
if($_POST['count'] <= 0){die('Cannot be less then 1! Meteors are being placed in orbit. . .');}
if($_POST['count'] >= 11){die('Cannot be more then one Trillion! That is a lot!');}
ini_set("auto_detect_line_endings", true);
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$tradeuser = $_POST['user'];

$patterns = "/^[a-zA-Z0-9_]*$/";
$patterns2 = "/[^0-9]/";
$replacements = '';
$tradeitemR = preg_replace($patterns, $replacements, $_POST['itemid']);
$tradecountR = preg_replace($patterns2, $replacements, $_POST['count']);

$trimit = trim($tradecountR);
$stripE = stripcslashes("$trimit");
$stripF = stripslashes("$stripE");
$tradecount = strip_tags("$stripF");

$trimit = trim($tradeitemR);
$stripA = stripcslashes("$trimit");
$stripC = stripslashes("$stripA");
$tradeitem = strip_tags("$stripC");

if($tradecount === $_POST['count']){

require_once 'trans.inc.php';

$firstname = $_SESSION['username'];

$query = "SELECT hashid, friendcode FROM members 
    WHERE username='$firstname'";
foreach ($dbh->query($query) as $row) {
	$hashid = $row['hashid'];
	$friendcode = $row['friendcode'];
}

$signaturev = hash('sha256', $hashid.$friendcode);
$pinv = hash('sha256', $_POST["pin"]);
$sighmacv = hash_hmac('sha256', $signaturev, $pinv);

$_SESSION["sig"] = $sighmacv;

require_once 'verify-hmac.php';

if ($sqlhmac === $sighmacv){
	$query = "SELECT itemid, amount, command FROM vault 
    WHERE signature='$sighmacv' AND itemid='$tradeitem'";
foreach ($dbh->query($query) as $row) {
	$traderid= $row['itemid'];
	$tradercmd= $row['command'];
	$traderamount = $row['amount']-$tradecount;
}

if ($traderid === $tradeitem){

	if ($traderamount == 0 && $tradezero <= 0){

	$count = $dbh->exec("UPDATE vault SET signature='$sighmacU' WHERE signature='$sighmacv' AND itemid='$tradeitem'");

	header('Location: ../rconsend/');
}

if ($traderamount == 0 && $tradezero >= 1){
		
		if($itemcheck === $tradeitem){

	$count = $dbh->exec("DELETE FROM vault WHERE signature='$sighmacv' AND itemid='$tradeitem'");
	$count = $dbh->exec("UPDATE vault SET amount='$tradeupdate' WHERE signature='$sigcheck' AND itemid='$traderid'");
	
	header('Location: ../rconsend/');
		}
}

	if ($traderamount >= 1 && $tradezero >= 1){
		
		if($itemcheck == $tradeitem){

	$count = $dbh->exec("UPDATE vault SET amount='$traderamount' WHERE signature='$sighmacv' AND itemid='$tradeitem'");
	$count = $dbh->exec("UPDATE vault SET amount='$tradeupdate' WHERE signature='$sigcheck' AND itemid='$itemcheck'");

	header('Location: ../rconsend/');
		}
}

	if ($traderamount >= 0 && $tradezero <= 0){

	$count = $dbh->exec("UPDATE vault SET amount='$traderamount' WHERE signature='$sighmacv' AND itemid='$tradeitem'");
	$count = $dbh->exec("INSERT INTO vault (signature,itemid,amount,command) VALUES ('$sigcheck','$traderid','$tradecount','$tradercmd')");

	header('Location: ../rconsend/');

}
	if ($traderamount <= 0){
	die('You have no item to send!');
}
}
}
}else{header('Location: http://www.justiscraft.com/');}
}
else
{
header('Location: ../logout.php');
}
}

?>