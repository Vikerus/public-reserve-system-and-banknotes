<?php
if(login_check($mysqli) == true) {

$checkhmac = $_SESSION["sig"];
$sql2 = "SELECT donorgold, rank, donortokens, exp, title, companion, skillpoints FROM donor WHERE signature='$checkhmac'";
foreach ($dbh->query($sql2) as $row) {
	$gold = $row['donorgold'];

	$rank = $row['rank'];

	$tokens = $row['donortokens'];
	
	$exp = $row['exp'];
	
	$title = $row['title'];
	
	$companion = $row['companion'];
	
	$skillpoints = $row['skillpoints'];
	
  }
	  $tmppro = fopen($tmpfname, "a");
	  fwrite($tmppro, "<title>$title</title><rank>$rank</rank><companion>$companions</companion><exp>$exp</exp><skillpoints>$skillpoints</skillpoints><tokens>$tokens</tokens><gold>$gold</gold>");
		fclose($tmppro);
}
?>