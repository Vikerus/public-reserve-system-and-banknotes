<?php
//echo "Item Value: ";
ini_set("auto_detect_line_endings", true);
require_once 'functions.php';
require_once 'db_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
require_once 'pdo_connect.php';
$timechecker = $_SERVER['REQUEST_TIME_FLOAT']-1.000;
$timesession = $_SESSION['timecheck'];
if($timesession >= $timechecker){echo "There is a 1 second wait between queries!";}else{
$qr = $_POST['appid'];

$query = "SELECT appid, server, ign, rankrequest, why, cause, ideas, rank, ayenay, answer, rank FROM applications WHERE appid='$qr'";

echo '<table class="table table-bordered table-striped table-hover" style="margin-bottom: 0px;">
    <tr>
    <th>IGN</th>
	<th>Requested Rank</th>
	<th>Server</th>
    <th>Accepted</th>
    <th>Current Rank</th>
	</tr>';
foreach ($dbh->query($query) as $row) {
    echo "<tr>";
    echo "<td>" . $row['ign'] . "</td>";
	echo "<td>" . $row['rankrequest'] . "</td>";
    echo "<td>" . $row['server'] . "</td>";
    echo "<td>" . $row['ayenay'] . "</td>";
    echo "<td>" . $row['rank'] . "</td>";
    echo "</tr>";
	echo "<div><p><h3>Application Body</h3>If Accepted is empty then it hasn't been looked at yet!</p>Reason to accept: " . $row['why'] . "</br>Strengths: " . $row['cause'] . "</br>Ideas: " . $row['ideas'] ."</div>";
}
echo '</table>';
echo "Full Answer: ". $row['answer'];
$_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];
}
}else{echo "Login to query the application answers."; }
?>