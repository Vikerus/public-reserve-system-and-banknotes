<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$error_msg = "";
$uid = $_COOKIE["UID"];
$plain = $_POST["plain"];
$water = $_POST["water"];
$rock = $_POST["rock"];
$ice = $_POST["ice"];
$ground = $_POST["ground"];
$psychic = $_POST["psychic"];
$sky = $_POST["sky"];
$fire = $_POST["fire"];
$electric = $_POST["electric"];
$fighting = $_POST["fighting"];
$poison = $_POST["poison"];
$bug = $_POST["bug"];
$steel = $_POST["steel"];
$grass = $_POST["grass"];
$dark = $_POST["dark"];
$fossil = $_POST["fossil"];
$dragon = $_POST["dragon"];
$rainbow = $_POST["rainbow"];
$secclean = $plain.$water.$rock.$ice.$ground.$psychic.$sky.$fire.$electric.$fighting.$poison.$bug.$steel.$grass.$dark.$fossil.$dragon.$rainbow;
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
    $prep_stmt = "SELECT signature FROM badges WHERE signature = ? LIMIT 1";
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
        if ($insert_stmt = $mysqli->prepare("INSERT INTO badges (signature) VALUES (?)")) {
            $insert_stmt->bind_param('s', $sighmac);
            if (! $insert_stmt->execute()) {
                header('Location: ./error.php?err=Registration failure: INSERT');
            }
        }
if($plain === "true" or $plain === "false"){
	$count = $dbh->exec("UPDATE badges SET plain='$plain'
WHERE signature='$sighmac'");}
if($water === "true" or $water === "false"){
	$count = $dbh->exec("UPDATE badges SET water='$water'
WHERE signature='$sighmac'");}
if($rock === "true" or $rock === "false"){
	$count = $dbh->exec("UPDATE badges SET rock='$rock'
WHERE signature='$sighmac'");}
if($ice === "true" or $ice === "false"){
	$count = $dbh->exec("UPDATE badges SET ice='$ice'
WHERE signature='$sighmac'");}
if($ground === "true" or $ground === "false"){
	$count = $dbh->exec("UPDATE badges SET ground='$ground'
WHERE signature='$sighmac'");}
if($psychic === "true" or $psychic === "false"){
	$count = $dbh->exec("UPDATE badges SET psychic='$psychic'
WHERE signature='$sighmac'");}
if($sky === "true" or $sky === "false"){
	$count = $dbh->exec("UPDATE badges SET sky='$sky'
WHERE signature='$sighmac'");}
if($fire === "true" or $fire === "false"){
	$count = $dbh->exec("UPDATE badges SET fire='$fire'
WHERE signature='$sighmac'");}
if($electric === "true" or $electric === "false"){
	$count = $dbh->exec("UPDATE badges SET electric='$electric'
WHERE signature='$sighmac'");}
if($fighting === "true" or $fighting === "false"){
	$count = $dbh->exec("UPDATE badges SET fighting='$fighting'
WHERE signature='$sighmac'");}
if($poison === "true" or $poison === "false"){
	$count = $dbh->exec("UPDATE badges SET poison='$poison'
WHERE signature='$sighmac'");}
if($bug === "true" or $bug === "false"){
	$count = $dbh->exec("UPDATE badges SET bug='$bug'
WHERE signature='$sighmac'");}
if($steel === "true" or $steel === "false"){
	$count = $dbh->exec("UPDATE badges SET steel='$steel'
WHERE signature='$sighmac'");}
if($grass === "true" or $grass === "false"){
	$count = $dbh->exec("UPDATE badges SET grass='$grass'
WHERE signature='$sighmac'");}
if($dark === "true" or $dark === "false"){
	$count = $dbh->exec("UPDATE badges SET dark='$dark'
WHERE signature='$sighmac'");}
if($fossil === "true" or $fossil === "false"){
	$count = $dbh->exec("UPDATE badges SET fossil='$fossil'
WHERE signature='$sighmac'");}
if($dragon === "true" or $dragon === "false"){
	$count = $dbh->exec("UPDATE badges SET dragon='$dragon'
WHERE signature='$sighmac'");}
if($rainbow === "true" or $rainbow === "false"){
	$count = $dbh->exec("UPDATE badges SET rainbow='$rainbow'
WHERE signature='$sighmac'");}

        header('Location: ../index.php');
    }
}
}
}
}
?>