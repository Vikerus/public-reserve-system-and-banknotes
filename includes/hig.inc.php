<?php
ini_set("auto_detect_line_endings", true);
require_once 'pdo_connect.php';
require_once 'functions.php';
sec_session_start();
if(login_check($mysqli) == true) {
	$firstname = $_POST["friendid"];
	$sql = "SELECT hashid FROM members 
    WHERE friendcode='$firstname'";
  foreach ($dbh->query($sql) as $row) {
	$hashid_sentto = $row['hashid'];
    }
}
else{
header('Location: ../logout.php');
}
