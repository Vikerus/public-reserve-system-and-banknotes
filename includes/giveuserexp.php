<?php
if(empty($_POST['username'])){die('ERROR: Empty Request');}
require_once 'verifyme.php';
require_once 'pdo_connect.php';
sec_session_start();
if(empty($_SESSION['secaddy'])){header('Location: ../index.php');}elseif($_SESSION['secaddy'] === "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){ }else{header('Location: ../index.php');}
if(login_check($mysqli) == true) {
$user = $_POST['username'];
$expvalinput = $_POST['expval'];
	$sql = "SELECT exp FROM members 
    WHERE username='$user'";
  foreach ($dbh->query($sql) as $row) {
	$expvalinput2 = $row['exp'];
    }
if(!empty($expvalinput)){
	$expvalinput += $expvalinput2;
	echo $expvalinput;
	$count = $dbh->exec("UPDATE members SET exp='$expvalinput' WHERE username='$user'");
}
}
?>

