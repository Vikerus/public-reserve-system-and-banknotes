<?php
$bsh = hash('ripemd320', uniqid(mt_rand(1, mt_getrandmax()), true));
$userhmac = "dsf32rff4a5f5";
$pay = $_POST['pay'];
$longa = hash('sha512', $userhmac);
$longb = $_SERVER['REQUEST_TIME_FLOAT'];
 $timestamphash = hash('sha256', $longb);
$longc = hash('whirlpool', $pay);

$longkeyhash = hash('sha512', $bsh.$longa.$longc)."$timestamphash";

$buildkeya = hash_file('sha256','pad.a.php');
$buildkeyb = hash_file('sha256','pad.b.php');
$buildkeyc = hash_file('sha256','pad.c.php');

if($buildkeya === "fb08b8b4b4abc94fe140f5a04d590d51c024049b6e4b1295623b52cde388f17c" and $buildkeyb === "b4feee71695fb66ec0c14694c06a07d020d4b4176049e8437cc86de80d043128" and $buildkeyc === "c65e71750dd3fb65ec57f6f9b2e67af5a6a8a03786477dbb308b1ed020e9faca"){
	$longkeymaster = hash('sha256', $bsh.$longa.$timestamphash.$longc.$longkeyhash);
	$longkeymastera = hash('sha256', $longa.$timestamphash.$longc.$longkeyhash.$bsh);
	$longkeymasterb = hash('sha512', $timestamphash.$longc.$longkeyhash.$bsh.$longa);
	$armora = hash('ripemd256', $buildkeya.$buildkeyb.$buildkeyc);
	$armorb = hash('ripemd320', $buildkeyc.$buildkeya.$buildkeyb);
	$sage = $armora.$longkeymaster.$longkeymastera.$longkeymasterb.$armorb;
}
if(!empty($sage)){
	unset($longa,$longb,$longc,$longkeyhash,$buildkeya,$buildkeyb,$buildkeyc,$longkeymaster,$longkeymastera,$longkeymasterb,$armora,$armorb);
	$banknote = '<cratenote>';
	$banknote .= "<sig>$bsh</sig>";
	$banknote .= "<amount>$pay</amount>";
	$banknote .= "<key>";
	$banknote .= "$sage";
	$banknote .= "</key></cratenote>";
	$banknoteencoded = gzdeflate("$banknote", 9);
	$deflate = base64_encode($banknoteencoded);
	$to = $_POST['email'];
	$subject = "EBank Note Enclosed!";
	$body = "___BEGIN_CRATE_NOTE___ [ $deflate ] ___END_CRATE_NOTE___ To use this note please copy only the text within the brackets, no whitespaces on the ends. This note's store of value is equal to: $pay .";
}
$aifaultcatch = hash('ripemd320', $banknote);
