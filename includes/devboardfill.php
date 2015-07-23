<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$error_msg = "";
$uid = $_COOKIE["UID"];
$github = $_POST["github"];
$board = $_POST["boards"];
$languages = $_POST["languages"];
$crypto = $_POST["crypto"];
$secclean = $board.$languages.$crypto;
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

    $prep_stmt = "SELECT signature FROM devboard WHERE signature = ? LIMIT 1";
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
        if ($insert_stmt = $mysqli->prepare("INSERT INTO devboard (signature) VALUES (?)")) {
            $insert_stmt->bind_param('s', $sighmac);

            if (! $insert_stmt->execute()) {
                header('Location: ./error.php?err=Registration failure: INSERT');
            }
        }
if(!empty($github)){
	$count = $dbh->exec("UPDATE devboard SET github='$github'
WHERE signature='$sighmac'");}
if(!empty($board)){
	$count = $dbh->exec("UPDATE devboard SET boards='$board'
WHERE signature='$sighmac'");}
if(!empty($languages)){
	$count = $dbh->exec("UPDATE devboard SET languages='$languages'
WHERE signature='$sighmac'");}
if(!empty($crypto)){
	$count = $dbh->exec("UPDATE devboard SET crypto='$crypto'
WHERE signature='$sighmac'");}

        header('Location: ../index.php');
    }
}
}
}
}
?>