<?php
echo "Item Value: ";
ini_set("auto_detect_line_endings", true);
require_once 'functions.php';
require_once 'db_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
require_once 'pdo_connect.php';
$timechecker = $_SERVER['REQUEST_TIME_FLOAT']-1.000;
$timesession = $_SESSION['timecheck'];
if($timesession >= $timechecker){echo "There is a 1 second wait between queries!";}else{
$qr = $_POST['itemid'];

$query = "SELECT point, gold, exp, skillpoint, btc FROM market WHERE itemid='$qr'";

echo '<table class="table table-bordered table-striped table-hover" style="margin-bottom: 0px;">
    <tr>
    <th>Worth in points</th>
    <th>Worth in Gold</th>
    <th>Exp needed to Buy</th>
    <th>Skillpoint Cost</th>
    <th>Bitcoin Value</th>
	</tr>';
foreach ($dbh->query($query) as $row) {
    echo "<tr>";
    echo "<td>" . $row['point'] . "</td>";
    echo "<td>" . $row['gold'] . "</td>";
    echo "<td>" . $row['exp'] . "</td>";
    echo "<td>" . $row['skillpoint'] . "</td>";
    echo "<td>" . $row['btc'] . "</td>";
    echo "</tr>";
}
echo '</table>';
$_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];
}
}else{echo "Login to query the marketplace."; }
?>