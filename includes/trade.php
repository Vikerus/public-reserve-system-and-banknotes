<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
if(empty($_POST['pin'])){die('ERROR: Empty Request');}
if($_POST['count'] <= 0){die('Cannot be less then 1! What are you attempting to do? @-@ *stare. . .');}
if($_POST['count'] >= 1000000000){die('Cannot be more then one Trillion! That is a lot!');}
ini_set("auto_detect_line_endings", true);
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {

$tradetype = $_POST['bank'];
$tradeuser = $_POST['user'];
$_SESSION['trdtype'] = $tradetype;

$patterns = "/[^0-9]/";
$replacements = '';
$tradecountR = preg_replace($patterns, $replacements, $_POST['count']);

$trimit = trim($tradecountR);
$stripA = stripcslashes("$trimit");
$stripC = stripslashes("$stripA");
$tradecount = strip_tags("$stripC");

if($tradecount === $_POST['count']){
	
include_once 'trd.inc.php';


$firstname = $_SESSION['username'];

$query = "SELECT points, hashid, friendcode FROM members WHERE username='$firstname'";
foreach ($dbh->query($query) as $row) {
	$hashid = $row['hashid'];
	$friendcode = $row['friendcode'];
	$points = $row['points']-$tradecount;
}

$signaturev = hash('sha256', $hashid.$friendcode);
$pinv = hash('sha256', $_POST["pin"]);
$sighmacv = hash_hmac('sha256', $signaturev, $pinv);

$_SESSION["sig"] = $sighmacv;

require_once 'verify-hmac.php';

if ($sqlhmac === $sighmacv){
	$query = "SELECT donorgold, donortokens, exp, skillpoints FROM donor 
    WHERE signature='$sighmacv'";
foreach ($dbh->query($query) as $row) {
	$tradergold = $row['donorgold']-$tradecount;
	$tradertokens = $row['donortokens']-$tradecount;
	$traderexp = $row['exp']-$tradecount;
	$traderskpoints = $row['skillpoints']-$tradecount;
}

if ($tradetype == "g" || $tradetype =="gld" || $tradetype =="Gold" || $tradetype =="gold"){
	if ($tradergold >= 0){
	
	$count = $dbh->exec("UPDATE donor SET donorgold='$tradergold' WHERE signature='$sighmacv'");
	$count = $dbh->exec("UPDATE donor SET donorgold='$usernewgold' WHERE signature='$sigcheck'");

	header('Location: ../rconsend/');
	
}

	if ($tradergold <= 0){
	die('You are out of Experience to spend!');
	
}
}

if ($tradetype == "tkn"|| $tradetype == "Tkn"|| $tradetype == "Tokens"|| $tradetype == "tokens"){

	if ($tradertokens >= 0){
	
	$count = $dbh->exec("UPDATE donor SET donortokens='$tradertokens' WHERE signature='$sighmacv'");
	$count = $dbh->exec("UPDATE donor SET donortokens='$usernewtokens' WHERE signature='$sigcheck'");

	header('Location: ../rconsend/');
	
}
	if ($tradertokens <= 0){
	die('You are out of Experience to spend!');
	
}

}

if ($tradetype == "pts" || $tradetype == "Pts" || $tradetype == "Points" || $tradetype == "points"){
	
	if ($points >= 0){

	$count = $dbh->exec("UPDATE members SET points='$points' WHERE username='$firstname'");
	$count = $dbh->exec("UPDATE members SET points='$pointsuser' WHERE friendcode='$fcodeuser'");

	header('Location: ../rconsend/');
	
}
if ($points <= 0){
	die('You are out of Experience to spend!');
	
}
}

if ($tradetype == "skpoints" || $tradetype == "Skpoints" || $tradetype == "Skillpoints" || $tradetype == "skillpoints"){

	if ($traderskpoints >= 0){
	
	$count = $dbh->exec("UPDATE donor SET skillpoints='$traderskpoints' WHERE signature='$sighmacv'");
	$count = $dbh->exec("UPDATE donor SET skillpoints='$usernewskpoints' WHERE signature='$sigcheck'");

	header('Location: ../rconsend/');
}
	if ($traderskpoints <= 0){
	die('You are out of Skillpoints to spend!');
	
}


}

if ($tradetype == "exp" || $tradetype == "Exp" || $tradetype == "Experience" || $tradetype == "experience"){

	if ($traderexp >= 0){
	

	$count = $dbh->exec("UPDATE donor SET exp='$traderexp' WHERE signature='$sighmacv'");
	$count = $dbh->exec("UPDATE donor SET exp='$usernewexp' WHERE signature='$sigcheck'");

	header('Location: ../rconsend/');
}
	if ($traderexp <= 0){
	die('You are out of Experience to spend!');
	
}

}


}
}else{header('Location: http://www.justiscraft.com');}
}
else
{
header('Location: ../logout.php');
}
}
?>