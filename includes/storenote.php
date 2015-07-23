<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
echo "ran 1 ";
sec_session_start();
if(login_check($mysqli) == true) {
	echo "ran 2 ";
$userhmac = hash('sha256', $_SESSION['username']);
$uid = $_COOKIE["UID"];
$query = "SELECT hashid, friendcode FROM members WHERE UID='$uid'";
foreach ($dbh->query($query) as $row) {
$hashidv = $row['hashid'];
$friendcodev = $row['friendcode'];
}
echo "ran 3 ";
$signature = hash('sha256', $hashidv.$friendcodev);
$pin = hash('sha256', $_POST["pin"]);
$sighmac = hash_hmac('sha256', $signature, $pin);

$_SESSION["sig"] = $sighmac;
require_once 'verify-hmac.php';
$_SESSION["sigsql"] = $sqlhmac;
echo "ran 4 ";
if ($sighmac === $sqlhmac) {
	echo "ran 5 ";
require_once 'pdo_bk_connect.php';
echo "ran 5 ";
$query3 = "SELECT userpinhmac, userhandlehash FROM usermasks WHERE userpinhmac='$sighmac'";
  foreach ($dbhi->query($query3) as $row) {
	$banksig = $row['userpinhmac'];
	$usersig = $row['userhandlehash'];
    }
	echo "ran 6 ";
//if($sighmac === $banksig){
	echo "ran 7 ";
require_once 'buildnote.inc.php';
echo "ran 8 ";
   $count = $dbhi->exec("INSERT INTO dex (bsh, timestamphash) VALUES ('$bsh', '$timestamphash')");
     $count = $dbhi->exec("UPDATE reserves SET free=(free-$pay) WHERE signature='$userhmac'");
	   $count = $dbhi->exec("UPDATE reserves SET public=(public+$pay) WHERE signature='bankStore10101010'");
		 $count = $dbhi->exec("INSERT INTO hashtable (xmlnest) VALUES ('$aifaultcatch')");
	if (mail($to, $subject, $body)) {
    echo"<p>Email successfully sent!</p>";
	unset($bsh,$timestamphash,$userhmac,$pay,$body,$aifaultcatch);
	header('Location: ../index.php#success-reserves-transferred-to-note-and-emailed');
    } else {
   echo"<p>Email delivery failed…</p>";
   unset($bsh,$timestamphash,$userhmac,$pay,$body,$aifaultcatch);
   header('Location: ../bank/index.php#failed');
    }
}
}else{header('Location: ../login.php');}
}
//}
?>
