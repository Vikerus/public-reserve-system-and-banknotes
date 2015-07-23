<?php
if(login_check($mysqli) == true) {

$checkhmac = $_SESSION["sig"];

$sql3 = "SELECT cpu, gpu, psu, mobo, memory, hood, screen, keyboard, mouse FROM pc WHERE signature='$checkhmac'";
foreach ($dbh->query($sql3) as $row) {
	$cpu = $row['cpu'];

	$gpu = $row['gpu'];

	$psu = $row['psu'];
	
	$mobo = $row['mobo'];
	
	$memory = $row['memory'];
	
	$hood = $row['hood'];
	
	$screen = $row['screen'];
	
	$keyboard = $row['keyboard'];
	
	$mouse = $row['mouse'];
  }
	  $tmppro = fopen($tmpfname, "a");
	  fwrite($tmppro, "<rig>$hood</rig><cpu>$cpu</cpu><gpu>$gpu</gpu><motherboard>$mobo</motherboard><memory>$memory</memory><psu>$psu</psu><screen>$screen</screen><keyboard>$keyboard</keyboard><mouse>$mouse</mouse>");
		fclose($tmppro);
}
?>