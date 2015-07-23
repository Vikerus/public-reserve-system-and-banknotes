<?php
if(empty($_POST['text'])){die('ERROR: Empty Request');}
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(empty($_SESSION['secaddy'])){header('Location: ../index.php');}elseif($_SESSION['secaddy'] === "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){ }else{header('Location: ../index.php');}
if(login_check($mysqli) == true) {
$username = $_POST['username'];
$postie = $_POST['text'];
$image1 = $_POST['imagea'];
$image2 = $_POST['imageb'];
$image3 = $_POST['imagec'];
$title = $_POST['title'];
$expvalue = $_POST['exp'];
$posti = gzcompress("$postie", 3);
$post = base64_encode($posti);
$count = $dbh->exec("INSERT INTO leaderposts (text, imagea, imageb, imagec, title, signature, expvalue)
VALUES ('$post','$image1','$image2','$image3','$title','$username','$expvalue')");
}
else
{
header('Location: ../logout.php');
}
header('Location: ../-admin-');
}
?>