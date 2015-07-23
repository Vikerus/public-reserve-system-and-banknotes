<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$error_msg = "";
$uid = $_COOKIE["UID"];
$siga = $_POST["header"];
$sigb = $_POST["body"];
$sigc = $_POST["footer"];
$avatarlocation = $_POST["image"];
$secclean = $siga.$sigb.$sigc;
$stripA = stripcslashes("$secclean");
$stripC = stripslashes("$stripA");
$seccleaner = strip_tags("$stripC");

if("$secclean"==="$seccleaner"){

$query = "SELECT hashid, friendcode FROM members WHERE UID='$uid'";
foreach ($dbh->query($query) as $row) {
$hashidv = $row['hashid'];
$friendcodev = $row['friendcode'];
}

$signature = hash('sha256', $hashidv.$friendcodev);
$pin = hash('sha256', $_POST["pin"]);
$sighmac = hash_hmac('sha256', $signature, $pin);

$_SESSION["sig"] = $sighmac;
require_once 'verify-hmac.php';

if ($sighmac === $sqlhmac) {
 echo "Hmac match";
    $prep_stmt = "SELECT signature FROM profiles WHERE signature = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $sighmac);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $error_msg .= "update";
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= "";
                $stmt->close();
    }

    if (empty($error_msg)) {
        if ($insert_stmt = $mysqli->prepare("INSERT INTO profile (signature) VALUES (?)")) {
            $insert_stmt->bind_param('s', $sighmac);
        }
	}
if(!empty($siga)){
	$count = $dbh->exec("UPDATE profiles SET siga='$siga'
WHERE signature='$sighmac'");}
if(!empty($sigb)){
	$count = $dbh->exec("UPDATE profiles SET sigb='$sigb'
WHERE signature='$sighmac'");}
if(!empty($sigc)){
	$count = $dbh->exec("UPDATE profiles SET sigc='$sigc'
WHERE signature='$sighmac'");}
if(!empty($avatarlocation)){
	$count = $dbh->exec("UPDATE profiles SET image='$avatarlocation'
WHERE signature='$sighmac'");}

        header('Location: ../index.php');
    }
}
}
}
?>