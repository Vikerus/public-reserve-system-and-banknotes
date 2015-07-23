<?php
if(login_check($mysqli) == true) {

$checkhmac = $_SESSION["sig"];

$sql6 = "SELECT boards, languages, github, crypto FROM devboard WHERE signature='$checkhmac'";
foreach ($dbh->query($sql6) as $row) {
	$github = $row['github'];

	$board = $row['boards'];

	$languages = $row['languages'];
	
	$crypto = $row['crypto'];
  }
	  $tmppro = fopen($tmpfname, "a");
	  fwrite($tmppro, "<github>$github</github><languages>$languages</languages><board>$board</board><crypto>$crypto</crypto></profile></profilestorage>");
		fclose($tmppro);
}
?>