<?php
require_once 'pdo_connect.php';
require_once 'buildnote.inc.php';
$userhmac = 'dsf32rff4a5f5';
   $count = $dbh->exec("INSERT INTO dex (bsh, timestamphash) VALUES ('$bsh', '$timestamphash')");
     $count = $dbh->exec("UPDATE reserves SET free=(free-$pay) WHERE signature='$userhmac'");
	   $count = $dbh->exec("UPDATE reserves SET public=(public+$pay) WHERE signature='bankStore10101010'");
		 $count = $dbh->exec("INSERT INTO hashtable (xmlnest) VALUES ('$aifaultcatch')");
	if (mail($to, $subject, $body)) {
    echo("<p>Email successfully sent!</p>");
	unset($bsh,$timestamphash,$userhmac,$pay,$body,$aifaultcatch);
    } else {
   echo("<p>Email delivery failed…</p>");
   unset($bsh,$timestamphash,$userhmac,$pay,$body,$aifaultcatch);
    }
?>
