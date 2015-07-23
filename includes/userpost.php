<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
if(empty($_POST['postid']) || empty($_POST['userid'])){die('Missing Username or Postbody.');}
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
$timechecker = $_SERVER['REQUEST_TIME_FLOAT']-6.000;
$timesession = $_SESSION['timecheck'];
//echo "Timenow: $timechecker Timethen: $timesession";
if($timesession >= $timechecker){echo "There is a 6 second wait between posts!";}else{
if(login_check($mysqli) == true) {
  $userposter = trim($_POST["userid"]);
  $posti = trim($_POST["postid"]);

$stripA = stripcslashes("$posti");
$stripC = stripslashes("$stripA");
$postia = strip_tags("$stripC");
$timew = date("M, jS g:i a");


if($postia == $_POST['postid']){

$firstname = $_SESSION['username'];
$queryi = "SELECT id, hashid, friendcode, pin FROM members WHERE username='$firstname'";
foreach ($dbh->query($queryi) as $row) {
	$hashid = $row['hashid'];
	$friendcode = $row['friendcode'];
	$pin = $row['pin'];
	$secid = $row['id'];
	}

$signaturev = hash('sha256', $hashid.$friendcode);
$sighmacv = hash_hmac('sha256', $signaturev, $pin);
$secauth = $_SERVER['REQUEST_TIME_FLOAT'];
$_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];
$_SESSION["sig"] = $sighmacv;
$updatequick = hash("crc32", "$secauth");
//require_once 'verify_hmac.php';

if ($sqlhmac <> $sighmacv){
$query = "SELECT image FROM profiles WHERE signature='$sighmacv'";
foreach ($dbh->query($query) as $row) {
	$image = $row['image'];
}
$query = "SELECT tmpprofile FROM usermask WHERE sighmac='$sighmacv'";
foreach ($dbh->query($query) as $row) {
	$profile = $row['tmpprofile'];
}
	$stringthrown = '<div style="border-radius: 2px; border: 1px solid; border-color: #6666EE;"><div style="border-radius: 2px; border: 1px solid; border-color: #6666EE;"><img style="float:left; max-width:40px; max-height:40px;" src="';
	$stringthrown .= $image . '"></img>';
	$stringthrown .= '<h4 style="font-size:18px !important;"><b><a href="'. $profile . '">' . $userposter . '</a><small> [' . $timew . ']</small></b></h4>';
	$stringthrown .= '</div><p class="container-fluid">';
	$stringthrown .= $postia;
	$stringthrown .= '</p></div>';

$posto = gzcompress("$stringthrown", 1);
$post = base64_encode($posto);
$count = $dbh->exec("INSERT INTO userposts (signature, post, delid, updatequick)
VALUES ('$sighmacv', '$post', '$secid', '$updatequick')");

$query = "SELECT post FROM userposts ORDER BY id DESC LIMIT 0, 30";
foreach ($dbh->query($query) as $row) {
	
	$texti = base64_decode($row['post']);
	$text = gzuncompress($texti);

echo $text;
unset($text);
}
}
}
}else{session_start(); $_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];}
}
}
?>