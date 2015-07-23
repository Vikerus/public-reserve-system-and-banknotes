<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$error_msg = "";
$uid = $_COOKIE["UID"];
$minecraft = $_POST["Minecraft"];
$lol = $_POST["LoL"];
$steam = $_POST["steam"];
$wow = $_POST["WoW"];
$wurm = $_POST["wurm"];
$runescape = $_POST["runescape"];
$pokeshowdown = $_POST["pokeshowdown"];
$ds = $_POST["3ds"];
$secclean = $minecraft.$lol.$steam.$wow.$wurm.$runescape.$pokeshowdown.$ds;
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

    $prep_stmt = "SELECT signature FROM gamechars WHERE signature = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $sighmac);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $error_msg .= "";
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= "";
                $stmt->close();
    }

    if (empty($error_msg)) {
        if ($insert_stmt = $mysqli->prepare("INSERT INTO gamechars (signature) VALUES (?)")) {
            $insert_stmt->bind_param('s', $sighmac);

            if (! $insert_stmt->execute()) {
                header('Location: ./error.php?err=Registration failure: INSERT');
            }
        }
if(!empty($minecraft)){
	$count = $dbh->exec("UPDATE gamechars SET Minecraft='$minecraft'
WHERE signature='$sighmac'");}
if(!empty($lol)){
	$count = $dbh->exec("UPDATE gamechars SET LoL='$lol'
WHERE signature='$sighmac'");}
if(!empty($steam)){
	$count = $dbh->exec("UPDATE gamechars SET Steam='$steam'
WHERE signature='$sighmac'");}
if(!empty($wow)){
	$count = $dbh->exec("UPDATE gamechars SET WoW='$wow'
WHERE signature='$sighmac'");}
if(!empty($wurm)){
	$count = $dbh->exec("UPDATE gamechars SET wurm='$wurm'
WHERE signature='$sighmac'");}
if(!empty($runescape)){
	$count = $dbh->exec("UPDATE gamechars SET runescape='$runescape'
WHERE signature='$sighmac'");}
if(!empty($pokeshowdown)){
	$count = $dbh->exec("UPDATE gamechars SET pokeshowdown='$pokeshowdown'
WHERE signature='$sighmac'");}
if(!empty($ds)){
	$count = $dbh->exec("UPDATE gamechars SET 3ds='$ds'
WHERE signature='$sighmac'");}


        header('Location: ../index.php');
    }
}
}
}
}
?>