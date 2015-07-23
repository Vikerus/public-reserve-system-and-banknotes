<?php
ini_set("auto_detect_line_endings", true);
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
if(empty($_SESSION['secaddy'])){header('Location: ../index.php');}elseif($_SESSION['secaddy'] === "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){ }else{header('Location: ../index.php');}
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
$dbid = $_POST["id"];
if ($ownerbase == $ownercheck){
	$sqlo = "SELECT articleid FROM leaderposts WHERE id='$dbid'";
foreach ($dbh->query($sqlo) as $row) {
	$articleid = $row['articleid'];
  }
	
	
$count = $dbh->exec("DELETE FROM leaderposts WHERE id='$dbid'");
$count = $dbh->exec("DELETE * FROM comments WHERE articleid='$articleid'");
$count = $dbh->exec("DELETE * FROM trustdex WHERE id='$articleid'");
}
}else{header('Location: ../index.php');}
}
?> 