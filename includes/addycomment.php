<?php
ini_set("auto_detect_line_endings", true);
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(empty($_SESSION['secaddy'])){header('Location: ../index.php');}elseif($_SESSION['secaddy'] === "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){ }else{header('Location: ../index.php');}
if(login_check($mysqli) == true) {
	$sql = "SELECT post, id FROM userposts ORDER BY id DESC";
  foreach ($dbh->query($sql) as $row) {
	$texti = base64_decode($row['post']);
	$text = gzuncompress($texti);
	$idee = $row['id'];
$stringthrow1 = '<table class="table table-responsive"><tr>';
$stringthrow1 .= "<td>$text</td>";
$stringthrow1 .= "<td>$idee</td>";
$stringthrow1 .= '</tr></table>';

echo $stringthrow1;
unset($text,$stringthrow1);
    }
}
}

?> 