<?php
ini_set("auto_detect_line_endings", true);
require_once 'pdo_connect.php';
require_once 'functions.php';
sec_session_start();
if(login_check($mysqli) == true){
	$firstname = $_SESSION['username'];
	$sql = "SELECT hashid, friendcode, points, exp FROM members 
    WHERE username='$firstname'";
  foreach ($dbh->query($sql) as $row) {
	$hashid_sentfrom = $row['hashid'];
	$_POST["hashid"] = $row['hashid'];
	$_POST["fcode"] = $row['friendcode'];
	$_SESSION['points'] = $row['points'];
	$_SESSION['exp'] = $row['exp'];
	$_SESSION["fcode"] = $row['friendcode'];
    }
}else{
header('Location: ../includes/logout.php');
}
