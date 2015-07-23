<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
if(empty($_POST['post'])){die('ERROR: Empty Request');}
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(empty($_SESSION['secaddy'])){header('Location: ../index.php');}elseif($_SESSION['secaddy'] === "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){ }else{header('Location: ../index.php');}

if(login_check($mysqli) == true) {
$userposter = $_POST['username'];
$postie = $_POST['post'];

$stripA = stripcslashes("$postie");
$stripC = stripslashes("$stripA");
$postia = strip_tags("$stripC");
$timew = date("M, jS g:i a");
$postib = "<b>[[$timew]$userposter]: <br>-</b>";

$posto = gzcompress("$postib.$postia", 1);
$post = base64_encode($posto);

if($postia === $_POST['post']){

$firstname = $_SESSION['username'];
$query = "SELECT hashid, friendcode, pin FROM members WHERE username='$firstname'";
foreach ($dbh->query($query) as $row) {
	$hashid = $row['hashid'];
	$friendcode = $row['friendcode'];
	$pin = $row['pin'];
}

$signaturev = hash('sha256', $hashid.$friendcode);
$sighmacv = hash_hmac('sha256', $signaturev, $pin);
$time = $_SERVER['REQUEST_TIME_FLOAT'];
$hash = hash("crc32", $time.$userposter);
$_SESSION["sig"] = $sighmacv;

$count = $dbh->exec("INSERT INTO userposts (signature, post, updatequick)
VALUES ('$sighmacv', '$post', '$hash')");

header('Location: ../-adminX-\/');

}else{header('Location: http://justiscraft.com#failed');}
}
else
{
header('Location: logout.php');
}
}
?>