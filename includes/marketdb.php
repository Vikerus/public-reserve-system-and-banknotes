<?php
require_once '../includes/verifyme.php';
sec_session_start();
if(login_check($mysqli) == true) {
if(empty($_SESSION['secaddy'])){header('Location: ../index.php');}elseif($_SESSION['secaddy'] === "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){ }else{header('Location: ../index.php');}

$xml=simplexml_load_file("vault.xml") or die("Error: Cannot create object");
foreach($xml->children() as $items) {
	$conv=mysqli_connect("localhost","phpmate","freeagent7","_datatrap");
		if (mysqli_connect_errno()) {
		mysqli_close($conv);
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	$a = mysqli_real_escape_string($conv,$items->itemid);
	$b = mysqli_real_escape_string($conv,$items->costpoints);
	$c = mysqli_real_escape_string($conv,$items->costgold);
	$d = mysqli_real_escape_string($conv,$items->command);
	$e = mysqli_real_escape_string($conv,$items->exp);
	$f = mysqli_real_escape_string($conv,$items->skillpoints);
	$g = mysqli_real_escape_string($conv,$items->btc);
	echo $a.$b.$c.$d.$e.$f.$g;
	$sql="INSERT INTO market (itemid, point, gold, command, exp, skillpoint, btc)
		VALUES ('$a','$b','$c','$d','$e','$f','$g')";
		if (!mysqli_query($conv,$sql)) {
  die('Error: ' . mysqli_error($conv));
}
		Echo "Completed INSERT";
		mysqli_close($conv);
}

}
?>