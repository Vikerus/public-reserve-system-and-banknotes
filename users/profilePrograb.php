<?php
if(login_check($mysqli) == true) {

$checkhmac = $_SESSION["sig"];
$sql1 = "SELECT pets, food, games, websites, wishfor, siga, image FROM profiles WHERE signature='$checkhmac'";
foreach ($dbh->query($sql1) as $row) {
	$pets = $row['pets'];

	$food = $row['food'];

	$games = $row['games'];
	
	$websites = $row['websites'];
	
	$wish = $row['wishfor'];
	
	$signature = $row['siga'];

	$image = $row['image'];
  }
	  $tmppro = fopen($tmpfname, "a");
	  fwrite($tmppro, "<pets>$pets</pets><foods>$food</foods><games>$games</games><websites>$websites</websites><wish>$wish</wish><signature>$signature</signature><image>$image</image>");
		fclose($tmppro);
}
?>