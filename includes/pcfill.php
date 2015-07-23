<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$error_msg = "";
$uid = $_COOKIE["UID"];
$cpu = $_POST["cpu"];
$gpu = $_POST["gpu"];
$psu = $_POST["psu"];
$mobo = $_POST["mobo"];
$memory = $_POST["memory"];
$case = $_POST["hood"];
$screen = $_POST["screen"];
$keyboard = $_POST["keyboard"];
$mouse = $_POST["mouse"];
$secclean = $cpu.$gpu.$psu.$mobo.$memory.$case.$screen.$keyboard.$mouse;
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
    $prep_stmt = "SELECT signature FROM pc WHERE signature = ? LIMIT 1";
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
        if ($insert_stmt = $mysqli->prepare("INSERT INTO pc (signature) VALUES (?)")) {
            $insert_stmt->bind_param('s', $sighmac);

            if (! $insert_stmt->execute()) {
                header('Location: ./error.php?err=Registration failure: INSERT');
            }
        }
if(!empty($cpu)){
	$count = $dbh->exec("UPDATE pc SET cpu='$cpu'
WHERE signature='$sighmac'");}
if(!empty($gpu)){
	$count = $dbh->exec("UPDATE pc SET gpu='$gpu'
WHERE signature='$sighmac'");}
if(!empty($psu)){
	$count = $dbh->exec("UPDATE pc SET psu='$psu'
WHERE signature='$sighmac'");}
if(!empty($mobo)){
	$count = $dbh->exec("UPDATE pc SET mobo='$mobo'
WHERE signature='$sighmac'");}
if(!empty($memory)){
	$count = $dbh->exec("UPDATE pc SET memory='$memory'
WHERE signature='$sighmac'");}
if(!empty($case)){
	$count = $dbh->exec("UPDATE pc SET hood='$case'
WHERE signature='$sighmac'");}
if(!empty($screen)){
	$count = $dbh->exec("UPDATE pc SET screen='$screen'
WHERE signature='$sighmac'");}
if(!empty($keyboard)){
	$count = $dbh->exec("UPDATE pc SET keyboard='$keyboard'
WHERE signature='$sighmac'");}
if(!empty($mouse)){
	$count = $dbh->exec("UPDATE pc SET mouse='$mouse'
WHERE signature='$sighmac'");}

        header('Location: ../index.php');
    }
}
}
}
}
?>