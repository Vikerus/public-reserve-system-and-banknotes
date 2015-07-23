<?php
require_once 'pdo_connect.php';
$userhmac = "dsf32rff4a5f5";
$post = $_POST['note'];
$decode = base64_decode($post);
$note = gzinflate("$decode");
$hashnote = hash('ripemd320', $note);
//echo "$note <br><br>";
$query2 = "SELECT xmlnest FROM hashtable WHERE xmlnest='$hashnote'";
  foreach ($dbh->query($query2) as $row) {
	$notehash = $row['xmlnest'];
	echo "notehashsql: $notehash <br><br>";
	echo "notehash: $hashnote <br><br>";
	if(empty($notehash) xor empty($row['xmlnest'])){header('Location: ../index.php');}
	if(empty($notehash) and empty($row['xmlnest'])){header('Location: ../index.php');}
	$expected = hash('sha256', $notehash);
	$built = hash('sha256', $hashnote);
    }

if($expected===$built){

libxml_use_internal_errors(true);

$xml1=simplexml_load_string($note)->sig[0];
$xml2=simplexml_load_string($note)->amount[0];
$xml3=simplexml_load_string($note)->key[0];
foreach( libxml_get_errors() as $error ) {

    print_r($error);

}
$bsh = ((string) $xml1);
$pay = ((string) $xml2);
$longkey = ((string) $xml3);

echo "bsh : $bsh <br>";
echo "store of value : $pay <br>";
echo "long key : $longkey <br>";
$query2 = "SELECT bsh, timestamphash FROM dex WHERE bsh='$bsh'";
  foreach ($dbh->query($query2) as $row) {
	$sqlbsh = $row['bsh'];
	$sqltime = $row['timestamphash'];
	if(empty($sqlbsh) xor empty($row['bsh'])){header('Location: ../index.php');}
	if(empty($sqltime) and empty($row['timestamphash'])){header('Location: ../index.php');}
    }
	if($bsh===$sqlbsh){
	$longa = hash('sha512', $userhmac);
	$longc = hash('whirlpool', $pay);
	$longkeyhashsec = hash('sha512', $bsh.$longa.$longc)."$sqltime";
	
	$buildkeya = hash_file('sha256','pad.a.php');
	$buildkeyb = hash_file('sha256','pad.b.php');
	$buildkeyc = hash_file('sha256','pad.c.php');
	echo "hashes made...";
	if($buildkeya === "fb08b8b4b4abc94fe140f5a04d590d51c024049b6e4b1295623b52cde388f17c" and $buildkeyb === "b4feee71695fb66ec0c14694c06a07d020d4b4176049e8437cc86de80d043128" and $buildkeyc === "c65e71750dd3fb65ec57f6f9b2e67af5a6a8a03786477dbb308b1ed020e9faca"){
	$longkeymaster = hash('sha256', $bsh.$longa.$sqltime.$longc.$longkeyhashsec);
	$longkeymastera = hash('sha256', $longa.$sqltime.$longc.$longkeyhashsec.$bsh);
	$longkeymasterb = hash('sha512', $sqltime.$longc.$longkeyhashsec.$bsh.$longa);
	$armora = hash('ripemd256', $buildkeya.$buildkeyb.$buildkeyc);
	$armorb = hash('ripemd320', $buildkeyc.$buildkeya.$buildkeyb);
	$sage = $armora.$longkeymaster.$longkeymastera.$longkeymasterb.$armorb;
	echo "sage: $sage ... sage2: $longkey";
	if($sage===$longkey){
	$count = $dbh->exec("UPDATE reserves SET free=(free+$pay) WHERE signature='$userhmac'");
	$count = $dbh->exec("UPDATE reserves SET public=(public-$pay) WHERE signature='bankStore10101010'");
	$count = $dbh->exec("DELETE FROM hashtable WHERE xmlnest='$notehash'");
	$count = $dbh->exec("DELETE FROM dex WHERE timestamphash='$sqltime'");
	echo "success";
	}
}

	}else{header('Location: ../index.php');}

}
