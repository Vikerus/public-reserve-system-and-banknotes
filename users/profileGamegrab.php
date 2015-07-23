<?php
if(login_check($mysqli) == true) {

$checkhmac = $_SESSION["sig"];

$sql4 = "SELECT Minecraft, LoL, Steam, WoW, wurm, runescape, pokeshowdown, 3ds FROM gamechars WHERE signature='$checkhmac'";
foreach ($dbh->query($sql4) as $row) {
	$minecraft = $row['Minecraft'];

	$lol = $row['LoL'];
	
	$steam = $row['Steam'];

	$wow = $row['WoW'];
	
	$wurm = $row['wurm'];
	
	$runescape = $row['runescape'];
	
	$pokeshowdown = $row['pokeshowdown'];

	$ds = $row['3ds'];
  }
	  $tmppro = fopen($tmpfname, "a");
	  fwrite($tmppro, "<minecraft>$minecraft</minecraft><lol>$lol</lol><steam>$steam</steam><wurm>$wurm</wurm><runescape>$runescape</runescape><pokeshowdown>$pokeshowdown</pokeshowdown><ds>$ds</ds>");
		fclose($tmppro);
}
?>