<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {

$error_msg = "";
$uid = $_COOKIE["UID"];
echo "$uid";
if(!empty($_POST['pin'])){
$msgrun = $_POST['pin'];
$trimit = trim($msgrun);
unset($msgrun);
$stripA = stripcslashes("$trimit");
unset($trimit);
$stripC = stripslashes("$stripA");
unset($StripA);
$pinpost = strip_tags("$stripC");
unset($StripC);
}else{die('Forbidden Input.');}

$query = "SELECT pin, hashid, friendcode FROM members WHERE UID='$uid'";
foreach ($dbh->query($query) as $row) {
$pincheck = $row['pin'];
$hashidv = $row['hashid'];
$friendcodev = $row['friendcode'];
}

$signature = hash('sha256', $hashidv.$friendcodev);
$pin = hash('sha256', $_POST["pin"]);
$sighmac = hash_hmac('sha256', $signature, $pin);
 
if (!empty($_POST['pin'])) {

    $prep_stmt = "SELECT signature FROM usermask WHERE signature = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $signature);
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

	    $prep_stmt = "SELECT sighmac FROM usermask WHERE sighmac = ? LIMIT 1";
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

 	    $prep_stmt = "SELECT pin FROM usermask WHERE pin = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $pin);
        $stmt->execute();
        $stmt->store_result();
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }

    if (empty($error_msg)) {
	$count = $dbh->exec("UPDATE members SET pin='$pin'
WHERE UID='$uid'");
	$count = $dbh->exec("UPDATE usermask SET pin='$pin'
WHERE signature='$signature'");

        if ($insert_stmt = $mysqli->prepare("INSERT INTO usermask (pin, signature, sighmac) VALUES (?, ?, ?)")) {
            $insert_stmt->bind_param('sss', $pin, $signature, $sighmac);
			require_once 'pdo_bk_connect.php';
			$userhmac = hash('sha256', $_SESSION['username']);
			$count = $dbhi->exec("INSERT INTO usermasks (userhandlehash,userpinhmac) VALUES ('$userhmac','$sighmac')");
            if (! $insert_stmt->execute()) {
            }
        }
        header('Location: ../ucp.php');
    }
}
}else{
	header('Location: ../index.php');
}
}
?>
