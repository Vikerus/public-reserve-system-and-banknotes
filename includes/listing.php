<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$error_msg = "";
$uid = $_COOKIE["UID"];
$userhmac = hash('sha256', $_SESSION['username']);

if(!empty($_POST['reserves'])){
$msgrun = $_POST['reserves'];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$reserves = strip_tags("$stripC");
unset($StripC);
}else{header('Location: ../index.php#missing-reserves-value');}

if(!empty($_POST["desc"])){
$msgrun = $_POST["desc"];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$description = strip_tags("$stripC");
unset($StripC);
}else{header('Location: ../index.php#missing-description');}

if(!empty($_POST["title"])){
$msgrun = $_POST["title"];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$title = strip_tags("$stripC");
unset($StripC);
}else{header('Location: ../index.php#missing-title');}

if(!empty($_POST["itemid"])){
$msgrun = $_POST["itemid"];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$itemid = strip_tags("$stripC");
unset($StripC);
}else{header('Location: ../index.php#missing-itemid');}

if(!empty($_POST["image"])){
$msgrun = $_POST["image"];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$image = strip_tags("$stripC");
unset($StripC);
}

if(!empty($_POST["amount"])){
$msgrun = $_POST["amount"];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$amounti = strip_tags("$stripC");
unset($StripC);
}else{header('Location: ../index.php#missing-valid-amount');}
if($reserves === $_POST['reserves'] and $description === $_POST['desc'] and $title === $_POST['title'] and $itemid === $_POST['itemid'] and $image === $_POST['image'] and $amounti === $_POST['amount']){
$md5 = hash('ripemd128', $title.$userhmac.$reserves.$description.$image);

$query = "SELECT hashid, friendcode FROM members WHERE UID='$uid'";
foreach ($dbh->query($query) as $row) {
$hashidv = $row['hashid'];
$friendcodev = $row['friendcode'];
}

$signature = hash('sha256', $hashidv.$friendcodev);
$pin = hash('sha256', $_POST["pin"]);
$sighmac = hash_hmac('sha256', $signature, $pin);
$_SESSION["sig"] = $sighmac;
$aid = "listing_";
$aid .= hash('crc32', $itemid.$sighmac);
require_once 'verify-hmac.php';

if ($sighmac===$sqlhmac) {
if (empty($error_msg)) {
if(!empty($title)){

	$prep_stmt = "SELECT amount FROM listings WHERE mdid='$md5' LIMIT 1";
    foreach ($dbh->query($prep_stmt) as $row) {
$mdidv = $row['mdid'];
$amountv = $row['amount'];
}
        if ($amountv >= 1) {
        $count = $dbh->exec("UPDATE listings SET amount=(amount+$amounti) WHERE mdid='$md5'");
        $count = $dbh->exec("UPDATE vault SET listed=(listed+$amounti) WHERE signature='$sighmac' AND itemid='$itemid'");
		$count = $dbh->exec("UPDATE vault SET amount=(amount-$amounti) WHERE signature='$sighmac' AND itemid='$itemid'");
        //echo "ran A, $itemid . $reserves . $description . $title . $image . $amounti . $md5 . $sighmac . $sqlhmac";
		header('Location: ../index.php#success-updated');	
        }else{
		$count = $dbh->exec("INSERT INTO listings (postinguser, reservevalue, description, title, image, mdid, amount, itemid, aid, signature) VALUES ('$userhmac','$reserves','$description','$title','$image','$md5','$amounti','$itemid','$aid','$sighmac')");
        $count = $dbh->exec("UPDATE vault SET listed=(listed+$amounti) WHERE signature='$sighmac' AND itemid='$itemid'");
		$count = $dbh->exec("UPDATE vault SET amount=(amount-$amounti) WHERE signature='$sighmac' AND itemid='$itemid'");
		//echo "ran B, $itemid . $reserves . $description . $title . $image . $amounti . $md5 . $sighmac . $sqlhmac";
        header('Location: ../index.php#success-added');
		}
		//$stmt->close(); header('Location: ../index.php');

}
}
}
}
}
}
?>