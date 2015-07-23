<?php
if(login_check($mysqli) == true) {

$checkhmac = $_SESSION["sig"];

$sql5 = "SELECT plain, water, rock, ice, ground, psychic, sky, fire, electric, fighting, poison, bug, steel, grass, dark, fossil, dragon, rainbow FROM badges WHERE signature='$checkhmac'";
foreach ($dbh->query($sql5) as $row) {
	$plain = $row['plain'];

	$water = $row['water'];

	$rock = $row['rock'];

	$ice = $row['ice'];
	
	$ground = $row['ground'];
	
	$psychic = $row['psychic'];
	
	$sky = $row['sky'];
	
	$fire = $row['fire'];
	
	$electric = $row['electric'];
	
	$fighting = $row['fighting'];
	
	$poison = $row['poison'];
	
	$bug = $row['bug'];
	
	$steel = $row['steel'];
	
	$grass = $row['grass'];
	
	$dark = $row['dark'];
	
	$fossil = $row['fossil'];
	
	$dragon = $row['dragon'];
	
	$rainbow = $row['rainbow'];
  }
	  $tmppro = fopen($tmpfname, "a");
	  fwrite($tmppro, "<plain>$plain</plain><water>$water</water><rock>$rock</rock><ice>$ice</ice><ground>$ground</ground><psychic>$psychic</psychic><sky>$sky</sky><fire>$fire</fire><electric>$electric</electric><fighting>$fighting</fighting><poison>$poison</poison><bug>$bug</bug><steel>$steel</steel><grass>$grass</grass><dark>$dark</dark><fossil>$fossil</fossil><dragon>$dragon</dragon><rainbow>$rainbow</rainbow>");
		fclose($tmppro);
}
?>