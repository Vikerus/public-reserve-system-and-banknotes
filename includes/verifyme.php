<?php
ini_set("auto_detect_line_endings", true);
require_once 'pdo_connect.php';
require_once 'db_connect.php';
require_once 'functions.php';
sec_session_start();
if(login_check($mysqli) == true) {
	
	function getVerification($conn){
	$firstname = $_SESSION["username"];
	$sql = "SELECT UID FROM members 
    WHERE username='$firstname'";
  foreach ($conn->query($sql) as $row) {
	$UIDverify = $row['UID'];
    }
}
$run = getVerification($dbh);
$UIDcookie = $_COOKIE["UID"];

	if(empty($_COOKIE["UID"])){
	$sec = 2;
	$UIDcookie = "%20NULLIFIED%20";
	}
	if(empty($UIDverify)){
	$sec = 2;
	$UIDcookie = "%20NULLIFIED%20";
	}
	if($sec == 2){
	header('Location ./logout.php');
	}
	
$hashsec1 = hash('sha256', $UIDverify);
$hashsec2 = hash('sha256', $UIDcookie);

	if ($hashsec1 === $hashsec2){
	$sec = 1;
}	else{
	header('Location ./logout.php');
}
	if($sec == 1){
	$_SESSION['active'] = true;
}
} else { 
$_SESSION = array();
$params = session_get_cookie_params();
setrawcookie("UID",'xXLoggedOut%00x455',time() -42000,"/","justiscraft.com");		
setcookie(session_name(),
        '', time() -42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
session_destroy();
	header('Location ./logout.php');
}
?>