<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
if(login_check($mysqli) == true) {

$UID = $_SESSION['username'];

$query = "SELECT hashid, friendcode, points FROM members WHERE username='$UID'";
foreach ($dbh->query($query) as $row) {
	$hashid = $row['hashid'];
	$friendcode = $row['friendcode'];
	$pointtotal = $row['points'];
}

$signaturev = hash('sha256', $hashid.$friendcode);
$pinv = hash('sha256', $_POST['pin']);
$sighmacv = hash_hmac('sha256', $signaturev, $pinv);


$_SESSION["sig"] = $sighmacv;
require_once 'verify-hmac.php';

if($sighmacv === $sqlhmac){

$result = mysqli_query($conv,"SELECT itemid, amount FROM vault WHERE signature='$sighmacv'");
$result2 = mysqli_query($conv,"SELECT donorgold, donortokens, exp, skillpoints FROM donor WHERE signature='$sighmacv'");
$userkeep = $_SESSION['username'];
while($row = mysqli_fetch_array($result2)) {
	
$goldtotal = $row['donorgold'];
$tokentotal = $row['donortokens'];
$exptotal = $row['exp'];
$skilltotal = $row['skillpoints'];

	}

	echo "$note </br>";
//second
while($row2 = mysqli_fetch_array($result)) {
$itemkeep = $row2['itemid'];
$itemnum = $row2['amount'];
}
	echo "$note2 </br>";
$_SESSION['xmlkeep'] = $note;
$_SESSION['xmlkeepb'] = $note2;
mysqli_free_result($result);
mysqli_free_result($result2);
}else{die('._.');}
}
mysqli_close($conv);
}
?>