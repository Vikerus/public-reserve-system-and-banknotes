<?php
//echo "ran, ";
require_once 'pdo_connect.php';
require_once 'functions.php';
require_once 'db_connect.php';
sec_session_start();
$q=$_GET["apps"];
if ($_SERVER['REQUEST_METHOD'] === "POST"){
if($_SESSION['secaddy'] === "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){
$appid = $_POST["appid"];
$answer = $_POST["answer"];
$ayenay = $_POST["ayenay"];
if($ayenay === "yes"){
$count = $dbh->exec("UPDATE applications SET answer='$answer', ayenay='$ayenay', rank=(rankrequest) WHERE appid='$appid'");
}else{$count = $dbh->exec("UPDATE applications SET answer='$answer', ayenay='$ayenay' WHERE appid='$appid'");}
$query = "SELECT rankrequest, rank, signature, ign, server FROM applications WHERE appid='$appid'";
foreach ($dbh->query($query) as $row) {
	$ranked = $row['rank'];
	$server = $row['server'];
	$sign = $row['signature'];
	$username = $row['ign'];
	$ranking = $row['rankrequest'];
}
if($ranked == "new"){ $countie = $dbh->exec("INSERT INTO donor (signature, title) VALUES ('$sign', '$ranking')"); }else {$countie = $dbh->exec("UPDATE donor SET title='$ranking' WHERE appid='$appid' AND rank='$ranked'");
}
//Start Rcon
//require_once('../rconsend/rcon.php');
if($server = "justiscraft.com"){
$port = 1;
}
if($server = "archway.io"){
$port = 2;
}
//$password = "TripleTrouble56";
//$timeout = 3;
//$rcon = new Rcon($server,$port,$password,$timeout);

//if ($rcon->connect())
//{
  //$rcon->send_command("manuadd $username $ranking");
//}
//End Rcon
//echo "answered ". $appid . $answer . $ayeney . $ranked;
 }else{
require_once 'verifyme.php';
$appsub = hash('sha1', $_POST["username"] . $_POST["rankrequest"] . $_POST["server"]);
$server = $_POST["server"];
$ingamename = $_POST["username"];
$rankrequested = $_POST["rankrequest"];
$rank = $_POST["rank"];
$why = $_POST["why"];
$cause = $_POST["cause"];
$ideas = $_POST["ideas"];

$firstname = $_SESSION['username'];

$query = "SELECT hashid, friendcode FROM members WHERE username='$firstname'";
foreach ($dbh->query($query) as $row) {
	$hashid = $row['hashid'];
	$friendcode = $row['friendcode'];
}

$signaturev = hash('sha256', $hashid.$friendcode);
$pinv = hash('sha256', $_POST["pin"]);
$sighmacv = hash_hmac('sha256', $signaturev, $pinv);

$_SESSION["sig"] = $sighmacv;

require_once 'verify-hmac.php';
echo "Verifing user: $firstname ...";
if ($sqlhmac === $sighmacv){
$count = $dbh->exec("INSERT INTO applications (signature, appid, server, ign, rankrequest, rank, why, cause, ideas)
VALUES ('$sighmacv', '$appsub', '$server', '$ingamename', '$rankrequested', '$rank', '$why', '$cause', '$ideas')");
header('Location: ../application.html');
}
}
}else{
if ($q === "applications"){
$query = "SELECT appid, ign, rankrequest, rank, timestamp FROM applications";
echo '<tr>
		<th>Username</th>
		<th>Applied For</th>
		<th>Rank</th>
		<th>StaffOnly</th>
		<th>Timestamp</th>
		</tr>';
foreach ($dbh->query($query) as $row) {
    $app = $row['appid'];
	echo '<tr onclick="'.'readApp('. "'" . $row['appid'] . "'" . ')">';
    echo "<td>" . $row['ign'] . "</td>";
    echo "<td>" . $row['rankrequest'] . "</td>";
    echo "<td>" . $row['rank'] . "</td>";
	$stringthrow1 = '<td>';
$stringthrow1 .= '<p class="pull-right"><a href="" data-toggle="modal" data-target="#';
$stringthrow1 .= $app;
$stringthrow1 .= '"><span class="label label-default">';
$stringthrow1 .= " Answer</span></a></p>";
$stringthrow1 .= '<div class="modal fade" id="';
$stringthrow1 .= $app;
$stringthrow1 .= '" tabindex="-1" role="dialog" aria-labelledby="';
$stringthrow1 .= $app;
$stringthrow1 .= '" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel5">Answer Application: Staff Only</h4>
      </div>
      <div class="modal-body">
    <form style="width:100% !important;" class="form-group" action="" method="post" enctype="multipart/form-data">
	<input class="form-control" name="appid" id="appid" type="text" value="';
	$stringthrow1 .= $app;
	$stringthrow1 .= '" readonly>';
    $stringthrow1 .= 'Full Answer:
    <textarea class="form-control" value="answer" type="text" name="answer" id="answer" placeholder="Comment may be no longer then 1200 characters!" required></textarea>
	<label>Accepted: yes or no?</label>
	<input class="form-control" value="ayenay" id="ayenay" type="ayenay" required>
	<input class="btn btn-danger" value="Publish" type="button" onclick="answerApp()" name="appid"/>
        </form>
				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>';
$stringthrow1 .= '</td>';
echo $stringthrow1;
	echo "<td>" . $row['timestamp'] . "</td>";
    echo "</tr>";
}
}
}
?> 