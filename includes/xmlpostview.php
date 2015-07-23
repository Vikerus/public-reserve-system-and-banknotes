<?php
require_once 'pdo_connect.php';

function getArticles($conn){
	session_start();
	echo $quicker;
	$quicker = $_SESSION['cachey'];
	$timegate = $_SERVER['REQUEST_TIME_FLOAT']-620.100;
	//echo $_SESSION['tmpfname'];
	if($quicker <= $timegate){
	$fil = "../config.cfg";
	unlink($_SESSION['tmpfname']);
	if(empty($quicker)){
	$tmpfname = file_get_contents($fil, true); $tempp = "boot";}else{
	$tmpfname = tempnam(getcwd() ."/tmp", "article.");}
	$_SESSION['cachey'] = $_SERVER['REQUEST_TIME_FLOAT'];
	$sql = 'SELECT title, text, signature, timestamp, expvalue, imagea, imageb, imagec FROM leaderposts ORDER BY timestamp DESC LIMIT 0, 30';
  foreach ($conn->query($sql) as $row) {
	$title = $row['title'];
	$texti = base64_decode($row['text']);
	$text = gzuncompress($texti);
	$image1 = $row['imagea'];
	$image2 = $row['imageb'];
	$image3 = $row['imagec'];
	$signature = $row['signature'];
	$timestamp = $row['timestamp'];
	$expvalue = $row['expvalue'];
	$hash = hash("crc32", $timestamp.$title);

$stringthrow1 = '<div class="row"><div class="col-xs-12"><h2 class="alert alert-warning">';
$stringthrow1 .= "$title</h2>";
if(!empty($image1)){
$stringthrow1 .= '<div class="col-sm-4 pull-left"><img height="auto" width="100%" src="';
$stringthrow1 .= "$image1";
$stringthrow1 .= '"></div>';
}
if(!empty($image2) && empty($image1) && empty($image3)){
$stringthrow1 .= '<div class="col-sm-4" style="padding-bottom:0px; padding-top:0px;"></div><div class="col-sm-4" style=""><img height="auto" width="100%" src="';
$stringthrow1 .= "$image2";
$stringthrow1 .= '"></div><div class="col-sm-4" style="padding-bottom:0px; padding-top:0px;"></div>';
}elseif(!empty($image2) && !empty($image1) && empty($image3)){
$stringthrow1 .= '<div class="col-sm-4" style=""><img height="auto" width="100%" src="';
$stringthrow1 .= "$image2";
$stringthrow1 .= '"></div>';	
}elseif(!empty($image2) && empty($image1) && !empty($image3)){
$stringthrow1 .= '<div class="col-sm-4" style="padding-bottom:0px; padding-top:0px;"></div><div class="col-sm-4" style=""><img height="auto" width="100%" src="';
$stringthrow1 .= "$image2";
$stringthrow1 .= '"></div>';
}elseif(!empty($image2) && !empty($image1) && !empty($image3)){
$stringthrow1 .= '<div class="col-sm-4" style=""><img height="auto" width="100%" src="';
$stringthrow1 .= "$image2";
$stringthrow1 .= '"></div>';
}
if(!empty($image3)){
$stringthrow1 .= '<div class="col-sm-4 pull-right"><img height="auto" width="100%" src="';
$stringthrow1 .= "$image3";
$stringthrow1 .= '"></div>';
}
$stringthrow1 .= '<p style="color: #f8f8f8; text-shadow: 1px 1px 1px #000;">'.$text.'</p>';
$stringthrow1 .= '<p class="pull-right"><a href="" data-toggle="modal" data-target="#';
$stringthrow1 .= hash("sha1", $timestamp);
$stringthrow1 .= '"><span class="label label-default">';
$stringthrow1 .= " Click to Comment, Exp: $expvalue</span></a></p>";
$stringthrow1 .= '<ul class="list-inline"><li><a href="#"><i class="glyphicon glyphicon-calendar"></i>';
$stringthrow1 .= " $timestamp</a></li>";
$stringthrow1 .= '</div><li><a href="#">';
$stringthrow1 .= '<i class="glyphicon glyphicon-comment"></i>';
$stringthrow1 .= " $signature</a></li></ul></div>";
$stringthrow1 .= '<hr>';

unset($image1,$image2,$image3);
echo "Updated: $quicker";
echo $stringthrow1;
if($tempp == "boot"){
}else{file_put_contents($tmpfname, $stringthrow1, FILE_APPEND | LOCK_EX); file_put_contents($fil, $tmpfname, LOCK_EX);}
$_SESSION['tmpfname'] = $tmpfname;
  }
    }else{
	$file = file_get_contents($_SESSION['tmpfname'], true);
	echo $file;}
}
$run = getArticles($dbh);
?> 