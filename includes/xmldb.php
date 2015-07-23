<?php
session_start();
$timechecker = $_SERVER['REQUEST_TIME_FLOAT']-2.000;
$timesession = $_SESSION['timecheck'];
if($timesession >= $timechecker){echo "There is a 2 second wait between queries!";}else{
$_SESSION['timecheck'] = $_SERVER['REQUEST_TIME_FLOAT'];
$q=$_GET["itemname"];

if ($q === "memberships"){
	$strmast = "storage/memberships.xml";
	$xml=simplexml_load_file("$strmast") or die("Error: Cannot create object");
	echo '<tr>
	<th>Item Id</th>
    <th>Name</th>
    <th colspan="2">Cost in points <i>or</i> gold</th>
  </tr>';
foreach($xml->children() as $items) {
	echo '<tr onclick="'.'inspectId('. "'" . $items->itemid . "'" . ')">';
	echo '<td>'; 
    echo $items->itemid . " ";
	echo "</td><td>";
    echo $items->itemname . " ";
	echo "</td><td>";
    echo $items->costpoints . " ";
	echo "</td><td>";
    echo $items->costreserves . "</td></tr>";
}
}
if ($q === "cannabis"){
	$strmast = "storage/cannabis.xml";
	$xml=simplexml_load_file("$strmast") or die("Error: Cannot create object");
	echo '<tr>
	<th>Item Id</th>
    <th>Name</th>
    <th colspan="2">Cost in points <i>or</i> gold</th>
  </tr>';
foreach($xml->children() as $items) {
	echo '<tr onclick="'.'inspectId('. "'" . $items->itemid . "'" . ')">';
	echo "<td>";
    echo $items->itemid . " ";
	echo "</td><td>";
    echo $items->itemname . " ";
	echo "</td><td>";
    echo $items->costpoints . " ";
	echo "</td><td>";
    echo $items->costreserves . "</td></tr>";
}
}
if ($q === "thc"){
	$strmast = "storage/thc.xml";
	$xml=simplexml_load_file("$strmast") or die("Error: Cannot create object");
	echo '<tr>
	<th>Item Id</th>
    <th>Name</th>
    <th colspan="2">Cost in points <i>or</i> gold</th>
  </tr>';
foreach($xml->children() as $items) {
	echo '<tr onclick="'.'inspectId('. "'" . $items->itemid . "'" . ')">';
	echo "<td>";
    echo $items->itemid . " ";
	echo "</td><td>";
    echo $items->itemname . " ";
	echo "</td><td>";
    echo $items->costpoints . " ";
	echo "</td><td>";
    echo $items->costreserves . "</td></tr>";
}
}
if ($q === "cbd"){
	$strmast = "storage/cbd.xml";
	$xml=simplexml_load_file("$strmast") or die("Error: Cannot create object");
	echo '<tr>
	<th>Item Id</th>
    <th>Name</th>
    <th colspan="2">Cost in points <i>or</i> gold</th>
  </tr>';
foreach($xml->children() as $items) {
	echo '<tr onclick="'.'inspectId('. "'" . $items->itemid . "'" . ')">';
	echo "<td>";
    echo $items->itemid . " ";
	echo "</td><td>";
    echo $items->itemname . " ";
	echo "</td><td>";
    echo $items->costpoints . " ";
	echo "</td><td>";
    echo $items->costreserves . "</td></tr>";
}
}
if ($q === "listings"){
	require_once 'pdo_connect.php';
$query = "SELECT aid, itemid, reservevalue, description, title, amount FROM listings";
	echo '<tr>
	<th>Listing Id</th>
    <th colspan="2">Description</th>
	<th>Amount</th>
	<th>Offer in Reserves</th>
  </tr>';
foreach ($dbh->query($query) as $row) {
	echo '<tr onclick="'.'inspectId('. "'" . $row['itemid'] . "'" . ')">';
    echo "<td>" . $row['aid'] . "</td>";
    echo "<td>" . $row['itemid'] . " : " . $row['title'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
	echo "<td>" . $row['amount'] . "</td>";
    echo "<td>" . $row['reservevalue'] . "</td>";
    echo "</tr>";
}
}
}
?> 