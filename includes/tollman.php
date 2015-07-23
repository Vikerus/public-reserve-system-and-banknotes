<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once '../includes/verifyme.php' ;
require_once '../includes/pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
echo "Start . ";
if(!empty($_POST['itemid'])){
$msgrun = $_POST['itemid'];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$itemin = strip_tags("$stripC");
unset($StripC);
}else{header('Location: ../index.php');}
echo "item passed .";
if(!empty($_POST['count'])){
$msgrun = $_POST['count'];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$inputcounted = strip_tags("$stripC");
unset($StripC);
}else{header('Location: ../index.php');}
echo "count passed .";
if(!empty($_POST['method'])){
$msgrun = $_POST['method'];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$inputpayed = strip_tags("$stripC");
unset($StripC);
}else{header('Location: ../index.php');}
echo "method passed .";
if($itemin == $_POST['itemid'] and $inputcounted == $_POST['count'] and $inputpayed == $_POST['method']){
echo "equal .";
$cokkie = $_COOKIE["UID"];
$query = "SELECT friendcode, hashid, points FROM members WHERE UID='$cokkie'";
foreach ($dbh->query($query) as $row) {
	$friendcode = $row['friendcode'];
	$hashid = $row['hashid'];
	$points = $row['points'];
}
echo "ran to here. $friendcode ";

$signaturev = hash('sha256', $hashid.$friendcode);
$pinv = hash('sha256', $_POST["pin"]);
$sighmacv = hash_hmac('sha256', $signaturev, $pinv);
$namehash = hash('sha256', $_SESSION['username']);
$_SESSION["sig"] = $sighmacv;
require_once 'verify-hmac.php';
echo "ran to here 2. hmac1= $sighmacv . hmac2= $sqlhmac ";
if ($sighmacv === $sqlhmac){
	echo "ran to here 3. ";
	$_SESSION['itemid'] = $itemin;
	$_SESSION['count'] = $inputcounted;
$query = "SELECT donortokens, skillpoints, donorgold, exp FROM donor WHERE signature='$sighmacv'";
foreach ($dbh->query($query) as $row) {
	$tokens = $row['donortokens'];
	$skill = $row['skillpoints'];
	$gold = $row['donorgold'];
	$exp = $row['exp'];
}

if($inputpayed == "points"){

$query = "SELECT point, command FROM market WHERE itemid='$itemin'";
foreach ($dbh->query($query) as $row) {
	$_SESSION['cmd'] = $row['command'];
	$pointcost_ = $row['point'];
}
$pointcostT = $pointcost_*$inputcounted;
$toll = $points - $pointcostT;
$_SESSION["itemidd"] = $itemin;
if($toll >= "0"){
$count = $dbh->exec("UPDATE members SET points='$toll'
WHERE friendcode='$friendcode'");
$_SESSION['verify'] = true;
header('Location: saveitem.php');
}else{
	echo "$toll </br>";
	echo "$points </br>";
	echo "$pointcost_ </br>";
	die('Not enough points 1');
}
}
if($inputpayed == "reserves"){
$query = "SELECT reservevalue, amount, signature, itemid, postinguser FROM listings WHERE aid='$itemin'";
foreach ($dbh->query($query) as $row) {
	$reservecost_ = $row['reservevalue'];
	$amountleft_ = $row['amount'];
	$_SESSION['sig2'] = $row['signature'];
	$sig2 = $row['postinguser'];
	$_SESSION["itemidd"] = $row['itemid'];
}
require_once 'pdo_bk_connect.php';
$query = "SELECT free FROM reserves WHERE signature='$namehash'";
foreach ($dbhi->query($query) as $row) {
	$reservehand_ = $row['free'];
}
$pointcostT = $reservecost_ * $inputcounted;
$toll = $reservehand_ - $pointcostT;
$amountis = $amountleft_ - $inputcounted;
if($amountis < 0){die('Not enough items listed to fulfil your request. Try a lower number.');}
if($toll >= 0){
$count = $dbhi->exec("UPDATE reserves SET free='$toll' WHERE signature='$namehash'");
$count = $dbhi->exec("UPDATE reserves SET free=(free+$pointcostT) WHERE signature='$sig2'");
$_SESSION['verify'] = true;
$_SESSION["trade"] = $amountis;
header('Location: saveitem.php');
}else{
	echo "$toll </br>";
	echo "$points </br>";
	echo "$pointcost_ </br>";
	die('Not enough reserves 1');
}
}
if($inputpayed == "gold"){

$query = "SELECT gold, command FROM market WHERE itemid='$itemin'";
foreach ($dbh->query($query) as $row) {
	$_SESSION['cmd'] = $row['command'];
	$goldcost_ = $row['gold'];
}
$goldcostT = $goldcost_*$inputcounted;
$toll = $gold - $goldcostT;
if($toll <= "0"){
$count = $dbh->exec("UPDATE donor SET donorgold='$toll'
WHERE signature='$sighmacv'");
$_SESSION['verify'] = true;
header('Location saveitem.php');
}else{
	die('Not enough points 2');
}
}
if($inputpayed == "exp"){
	header('Location: ../index.php');
}
if($inputpayed == "btc"){
	header('Location: ../index.php');
}
}
}else{
	header('Location ../index.php?error=failed-to-login');
}
}else{header('Location ../index.php?error=failed-to-login');}
}
?>