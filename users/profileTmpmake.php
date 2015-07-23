<?php
require_once '../includes/verifyme.php';
require_once '../includes/pdo_connect.php';
sec_session_start();
$hash = hash('md5', uniqid(mt_rand(1, mt_getrandmax()), true));
if(login_check($mysqli) == true) {
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
	echo $quicker;
	$content = $_SESSION['profileTmp'];
	$quicker = $_SESSION['cachey'];
	$timegate = $_SERVER['REQUEST_TIME_FLOAT']-20.100;
	//echo $_SESSION['tmpfname'];
	if($quicker <= $timegate){
	if(empty($quicker)){
	}
	$_SESSION['cachey'] = $_SERVER['REQUEST_TIME_FLOAT'];

$cokkie = $_COOKIE["UID"];


$sqlr = "SELECT friendcode, hashid FROM members WHERE UID='$cokkie'";

  foreach ($dbh->query($sqlr) as $row) {
	$friendcode = $row['friendcode'];
	$hashid = $row['hashid'];
    }

$signaturev = hash('sha256', $hashid.$friendcode);
$pinv = hash('sha256', $_POST["pin"]);
$sighmacv = hash_hmac('sha256', $signaturev, $pinv);

$_SESSION["sig"] = $sighmacv;
require_once '../includes/verify-hmac.php';

if ($sighmacv === $sqlhmac){
$sqlw = "SELECT sighmac, tmpprofile FROM usermask WHERE sighmac='$sighmacv'";
  foreach ($dbh->query($sqlw) as $row) {
		$sighmacsql = $row['sighmac'];
		$tmpprofiles = $row['tmpprofile'];
  }
  
if(!empty($tmpprofiles)){
$tmpfname = substr($tmpprofiles, -51);
$tmpcname = $tmpprofiles;	
$handle = fopen($tmpfname, "w");
fwrite($handle, "");
fclose($handle);

require_once 'profileMemgrab.php';

require_once 'profilePermgrab.php';

require_once 'profilePrograb.php';

require_once 'profileDonorgrab.php';

require_once 'profilePCgrab.php';

require_once 'profileGamegrab.php';

require_once 'profileBadgegrab.php';

require_once 'profileDevgrab.php';

	$_SESSION['profileTmp'] = $tmpcname;
	
	$stringthrown = 'Profile Link: '. $_SESSION['profileTmp'] .'<div class="container-fluid" style="border-radius: 2px; border: 1px solid; border-color: #6666EE;"><div style="border-radius: 2px; border: 1px solid; border-color: #6666EE;"><img style="float:left; max-width:120px; max-height:120px;" src="';
	$stringthrown .= $image. '"></img>';
	$stringthrown .= '<h3>' . $user . '</h3>';
	$stringthrown .= '</div><div class="row panel-body" style="margin:0px">';
	$stringthrown .= '<h4>Statement: </h4>' . $statement . '<br><b>Trust Points:</b> '. $trustpoints . '<br><b>Permlevel:</b> '. $permlevel .'<br><b>Tags:</b> '. $tags .'<hr style="color:#CCC;"><h2>Full Profile View</h2><hr style="color:#CCC;"></hr><b>Pets: </b>' . $pets . '</br><b>Favourite Foods: </b>' . $food . '</br><b>Plays: </b>' . $games . '</br><b>Websites liked: </b>' . $websites . '</br><b>Wishes for: </b>' . $wish . '<hr style="color:#CCC;"></hr><div class="col-xs-6 col-sm-4"><b>Title: </b>' . $title . '</br><b>Rank: </b>' . $rank . '</br><b>Companion: </b>' . $companion . '</br><b>Points: </b>' . $points . '</br><b>Exp: </b>' . $exp . '</br><b>Skillpoints: </b>' . $skillpoints . '</br><b>Tokens: </b>' . $tokens . '</br><b>Gold: </b>' . $gold . '</div><div class="col-xs-6 col-sm-4"><b>PC Case: </b>' . $hood . '</br><b>CPU: </b>' . $cpu . '</br><b>GPU: </b>' . $gpu . '</br><b>motherboard</b>' . $motherboard . '</br><b>Memory: </b>' . $memory . '</br><b>PSU: </b>' . $psu . '</br><b>Screen(s): </b>' . $screen . '</br><b>Keyboard: </b>' . $keyboard . '</br><b>Mouse: </b>' . $mouse . '</div><div class="col-xs-6 col-sm-4"><b>Minecraft IGN: </b>' . $minecraft . '</br><b>LeagueofLegends: </b>' . $lol . '<br><b>Steam: </b>' . $steam. '</br><b>Wurm: </b>' . $wurm . '</br><b>Runescape: </b>'. $runescape . '</br><b>PokeShowdown: </b>' . $pokeshowdown . '</br><b>Nintendo DS: </b>' . $ds . '</div></div>';
	$stringthrown .=  '<div class="panel-footer"><h4>Developer Profile</h4><b>Github: </b>'. $github . '</br><b>Languages: </b>' . $languages . '</br><b>Developer Boards: </b>' . $board . '</br><b>Crypto Address: </b>'. $crypto . '</div></div>';
	$stringthrown .= '<div class="alert alert-warning"><h2>Gaming Log</h2></div><div class="row" style="margin:0px"><h3>Justis Region Badge Completion:</h3><br><div class="col-md-1"><b>#1: </b>' . $plain . '</div><div class="col-md-1"><b>#2: </b>'. $water . '</div><div class="col-md-1"><b>#3: </b>'. $rock . '</div><div class="col-md-1"><b>#4: </b>' . $ice . '</div><div class="col-md-1"><b>#5: </b>' . $ground . '</div><div class="col-md-1"><b>#6: </b>' . $psychic . '</div><div class="col-md-1"><b>#7: </b>' . $sky . '</div><div class="col-md-1"><b>#8: </b>' . $fire . '</div><div class="col-md-1"><b>#9: </b>' . $electric . '</div><div class="col-md-1"><b>#10: </b>' . $fighting . '</div><div class="col-md-1"><b>#11: </b>' . $poison . '</div><div class="col-md-1"><b>#12: </b>' . $bug . '</div><div class="col-md-1"><b>#13: </b>' . $steel . '</div><div class="col-md-1"><b>#14: </b>' . $grass . '</div><div class="col-md-1"><b>#15: </b>' . $dark . '</div><div class="col-md-1"><b>#16: </b>' . $fossil . '</div><div class="col-md-1"><b>#17: </b>' . $dragon . '</div><div class="col-md-1"><b>#18: </b>' . $rainbow. '</div><hr></div></div>';
	echo $stringthrown;

	
	}else{

$tmpfname = tempnam(getcwd() ."/tmp","profile.$hash.");
$handle = fopen($tmpfname, "w");
fwrite($handle, "");
fclose($handle);
require_once 'profileMemgrab.php';

require_once 'profilePermgrab.php';

require_once 'profilePrograb.php';

require_once 'profileDonorgrab.php';

require_once 'profilePCgrab.php';

require_once 'profileGamegrab.php';

require_once 'profileBadgegrab.php';

require_once 'profileDevgrab.php';
	
	$trimmed = substr($tmpfname, -48);
	$tmpcname = "http://justiscraft.com/users/tmp$trimmed";
	$_SESSION['profileTmp'] = $tmpcname;
	$stringthrown = 'Profile Link: '. $_SESSION['profileTmp'] .'<div class="container-fluid" style="border-radius: 2px; border: 1px solid; border-color: #6666EE;"><div style="border-radius: 2px; border: 1px solid; border-color: #6666EE;"><img style="float:left; max-width:120px; max-height:120px;" src="';
	$stringthrown .= $image. '"></img>';
	$stringthrown .= '<h3>' . $user . '</h3>';
	$stringthrown .= '</div><div class="row panel-body" style="margin:0px">';
	$stringthrown .= '<h4>Statement: </h4>' . $statement . '<br><b>Trust Points:</b> '. $trustpoints . '<br><b>Permlevel:</b> '. $permlevel .'<br><b>Tags:</b> '. $tags .'<hr style="color:#CCC;"><h2>Full Profile View</h2><hr style="color:#CCC;"></hr><b>Pets: </b>' . $pets . '</br><b>Favourite Foods: </b>' . $food . '</br><b>Plays: </b>' . $games . '</br><b>Websites liked: </b>' . $websites . '</br><b>Wishes for: </b>' . $wish . '<hr style="color:#CCC;"></hr><div class="col-xs-6 col-sm-4"><b>Title: </b>' . $title . '</br><b>Rank: </b>' . $rank . '</br><b>Companion: </b>' . $companion . '</br><b>Points: </b>' . $points . '</br><b>Exp: </b>' . $exp . '</br><b>Skillpoints: </b>' . $skillpoints . '</br><b>Tokens: </b>' . $tokens . '</br><b>Gold: </b>' . $gold . '</div><div class="col-xs-6 col-sm-4"><b>PC Case: </b>' . $hood . '</br><b>CPU: </b>' . $cpu . '</br><b>GPU: </b>' . $gpu . '</br><b>motherboard</b>' . $motherboard . '</br><b>Memory: </b>' . $memory . '</br><b>PSU: </b>' . $psu . '</br><b>Screen(s): </b>' . $screen . '</br><b>Keyboard: </b>' . $keyboard . '</br><b>Mouse: </b>' . $mouse . '</div><div class="col-xs-6 col-sm-4"><b>Minecraft IGN: </b>' . $minecraft . '</br><b>LeagueofLegends: </b>' . $lol . '<br><b>Steam: </b>' . $steam. '</br><b>Wurm: </b>' . $wurm . '</br><b>Runescape: </b>'. $runescape . '</br><b>PokeShowdown: </b>' . $pokeshowdown . '</br><b>Nintendo DS: </b>' . $ds . '</div></div>';
	$stringthrown .=  '<div class="panel-footer"><h4>Developer Profile</h4><b>Github: </b>'. $github . '</br><b>Languages: </b>' . $languages . '</br><b>Developer Boards: </b>' . $board . '</br><b>Crypto Address: </b>'. $crypto . '</div></div>';
	$stringthrown .= '<div class="alert alert-warning"><h2>Gaming Log</h2></div><div class="row" style="margin:0px"><h3>Justis Region Badge Completion:</h3><br><div class="col-md-1"><b>#1: </b>' . $plain . '</div><div class="col-md-1"><b>#2: </b>'. $water . '</div><div class="col-md-1"><b>#3: </b>'. $rock . '</div><div class="col-md-1"><b>#4: </b>' . $ice . '</div><div class="col-md-1"><b>#5: </b>' . $ground . '</div><div class="col-md-1"><b>#6: </b>' . $psychic . '</div><div class="col-md-1"><b>#7: </b>' . $sky . '</div><div class="col-md-1"><b>#8: </b>' . $fire . '</div><div class="col-md-1"><b>#9: </b>' . $electric . '</div><div class="col-md-1"><b>#10: </b>' . $fighting . '</div><div class="col-md-1"><b>#11: </b>' . $poison . '</div><div class="col-md-1"><b>#12: </b>' . $bug . '</div><div class="col-md-1"><b>#13: </b>' . $steel . '</div><div class="col-md-1"><b>#14: </b>' . $grass . '</div><div class="col-md-1"><b>#15: </b>' . $dark . '</div><div class="col-md-1"><b>#16: </b>' . $fossil . '</div><div class="col-md-1"><b>#17: </b>' . $dragon . '</div><div class="col-md-1"><b>#18: </b>' . $rainbow. '</div><hr></div></div>';
	echo $stringthrown;

	$count = $dbh->exec("UPDATE usermask SET tmpprofile='$tmpcname'
WHERE sighmac='$sighmacv'");

	}

}
}else{echo "Please wait 20 seconds to reload, again.";}
}else{echo "Login.";}





?>