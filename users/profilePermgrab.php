<?php
if(login_check($mysqli) == true) {

$checkhmac = $_SESSION["sig"];

$sqlo = "SELECT trustpoints, permlevel, tags FROM permcert WHERE signature='$checkhmac'";
foreach ($dbh->query($sqlo) as $row) {
	$trustpoints = $row['trustpoints'];

	$permlevel = $row['permlevel'];
	
	$tags = $row['tags'];

  }
	  $tmppro = fopen($tmpfname, "a");
	  fwrite($tmppro, "<trustpoints>$trustpoints</trustpoints><permlevel>$permlevel</permlevel><tags>$tags</tags>");
		fclose($tmppro);
}
?>