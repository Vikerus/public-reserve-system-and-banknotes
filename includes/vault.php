<?php
ini_set("auto_detect_line_endings", true);
require_once 'functions.php';
require_once 'db_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
require_once 'higu.inc.php';
require_once 'pdo_bk_connect.php';
$timechecker = $_SERVER['REQUEST_TIME_FLOAT']-6.000;
$timesession = $_SESSION['timecheck'];
//echo "Timenow: $timechecker Timethen: $timesession";
if($timesession >= $timechecker){echo "There is a 6 second wait between queries!";}else{
$signaturev = hash('sha256', $hashid_sentfrom.$_POST["fcode"]);
$pinv = hash('sha256', $_GET['q']);
$qr = hash_hmac('sha256', $signaturev, $pinv);
$qq = hash('sha256',$_SESSION['username']);
$query2 = "SELECT free FROM reserves WHERE signature='$qq'";
$query = "SELECT public FROM reserves WHERE signature='bankStore10101010'";
echo '<table class="table table-bordered table-striped table-hover">
    <tr>
    <th>Economy Total</th>
    <th>Personal Reserves</th>
	</tr>';
foreach ($dbhi->query($query) as $row) {
    echo "<tr>";
    echo "<td>" . $row['public'] . "</td>";

}
foreach ($dbhi->query($query2) as $row) {

    echo "<td>" . $row['free'] . "</td>";
    echo "</tr>";
}
require_once 'pdo_connect.php';
$query3 = "SELECT donorgold, donortokens, skillpoints FROM donor WHERE signature='$qr'";

echo '<table class="table table-bordered table-striped table-hover">
    <tr>
    <th>Points</th>
    <th>Gold</th>
    <th>Tokens</th>
    <th>Exp</th>
    <th>Skillpoints</th>
	</tr>';
foreach ($dbh->query($query3) as $row) {
    echo "<tr>";
    echo "<td>" . $_SESSION['points'] . "</td>";
    echo "<td>" . $row['donorgold'] . "</td>";
    echo "<td>" . $row['donortokens'] . "</td>";
    echo "<td>" . $_SESSION['exp'] . "</td>";
    echo "<td>" . $row['skillpoints'] . "</td>";
    echo "</tr>";
}
if(empty($row['donorgold'])){
	echo "<tr>";
    echo "<td>" . $_SESSION['points'] . "</td>";
    echo "<td> empty </td>";
    echo "<td> empty </td>";
    echo "<td>" . $_SESSION['exp'] . "</td>";
    echo "<td> empty </td>";
    echo "</tr>";
}
echo '</table>';

$queryi = "SELECT * FROM vault WHERE signature='$qr'";

echo '<table class="table table-bordered table-striped table-hover">
<tr>
<th>Item ID</th>
<th>Amount</th>
<th>Listed</th>
</tr>';
foreach ($dbh->query($queryi) as $rowi) {
    echo "<tr>";
    echo "<td>" . $rowi['itemid'] . "</td>";
    echo "<td>" . $rowi['amount'] . "</td>";
    echo "<td>" . $rowi['listed'] . "</td>";
    echo "</tr>";
}
echo '</table>';
$_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];
}
}else{session_start(); $_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];}
?>