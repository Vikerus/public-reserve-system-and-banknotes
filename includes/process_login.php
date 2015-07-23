<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
require_once 'db_connect.php';
require_once 'functions.php';
sec_session_start(); 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p'];
    if (login($email, $password, $mysqli) == true) {
		include_once 'uid.php';
		$query3 = "SELECT tolerance FROM members WHERE email='$email'";
  foreach ($dbh->query($query3) as $row) {
	$_SESSION["tolerance"] = $row['tolerance'];
    }
	if($email === 'VikerusDemo@gmail.com' or $email === 'Vikerus@gmail.com'){
		$_SESSION['secaddy'] = "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3";
        header('Location: ../-admin-');
		}
	header('Location: ../index.php');
}else {
        header('Location: ../register.php');
}
}
}
?>