<?php

$tmpproz = fopen($tmpfname, "w");
	  fwrite($tmpproz, "bytessss");
		fclose($tmpproz);
if(login_check($mysqli) == true) {

$uidcode = $_COOKIE["UID"];

$sqli = "SELECT slate, points, username FROM members WHERE UID='$uidcode'";
  foreach ($dbh->query($sqli) as $row) {
	$statement = $row['slate'];

	$points = $row['points'];

	$user = $row['username'];
  }
	$tmppro = fopen($tmpfname, "w");
	fwrite($tmppro, "<?xml version='1.0' encoding='UTF-8'?><profilestorage><profile><user>$user</user><points>$points</points><statement>$statement</statement>");
	fclose($tmppro);
}
?>