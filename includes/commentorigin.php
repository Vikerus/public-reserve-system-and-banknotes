<?php
ini_set("auto_detect_line_endings", true);
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(empty($_SESSION['secaddy'])){header('Location: ../index.php');}elseif($_SESSION['secaddy'] === "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){ }else{header('Location: ../index.php');}
if(login_check($mysqli) == true) {

$query = "SELECT delid, id FROM userposts ORDER BY id DESC";
foreach ($dbh->query($query) as $row) {
	$delid = $row['delid'];
	$id = $row['id'];

$stringthrow1 = '<table class="table table-responsive">';
$stringthrow1 .= "<tr><td>$delid</td>";
$stringthrow1 .= "<td>$id</td>";
$stringthrow1 .= '</tr></table>';

echo $stringthrow1;
}
}
?> 