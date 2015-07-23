<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$error_msg = "";
$uid = $_COOKIE["UID"];
$petpost = $_POST["pets"];
$foodpost = $_POST["food"];
$gamespost = $_POST["games"];
$websitespost = $_POST["websites"];
$wishpost = $_POST["wish"];
$secclean = $petpost.$foodpost.$gamespost.$wishpost;
$stripA = stripcslashes("$secclean");
$stripC = stripslashes("$stripA");
$seccleaner = strip_tags("$stripC");
echo "ran 1 0";
if("$secclean"==="$seccleaner"){
	echo "ran 2 0";
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
	echo "ran 3 0";
if ($sighmac === $sqlhmac) {
	echo "ran 4 0";
    $prep_stmt = "SELECT signature FROM profiles WHERE signature = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $sighmac);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $error_msg .= '<p class="error">A user with this usermask already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
	echo "ran 5 0 $error_msg";
    if (empty($error_msg)) {

        if ($insert_stmt = $mysqli->prepare("INSERT INTO profiles (signature) VALUES (?)")) {
            $insert_stmt->bind_param('s', $sighmac);
				echo "ran 5 1";
            if (! $insert_stmt->execute()) {
					echo "ran 5 2";
                header('Location: ./error.php?err=Registration failure: INSERT');
            }
        }}
		echo "ran 6 0";
if(!empty($petpost)){
	$count = $dbh->exec("UPDATE profiles SET pets='$petpost'
WHERE signature='$sighmac'");}
if(!empty($foodpost)){
	$count = $dbh->exec("UPDATE profiles SET food='$foodpost'
WHERE signature='$sighmac'");}
if(!empty($gamespost)){
	$count = $dbh->exec("UPDATE profiles SET games='$gamespost'
WHERE signature='$sighmac'");}
if(!empty($websitespost)){
	$count = $dbh->exec("UPDATE profiles SET websites='$websitespost'
WHERE signature='$sighmac'");}
if(!empty($wishpost)){
	$count = $dbh->exec("UPDATE profiles SET wishfor='$wishpost'
WHERE signature='$sighmac'");}
	echo "ran 7 0";

        header('Location: ../index.php');
    
}
}
}
}
?>