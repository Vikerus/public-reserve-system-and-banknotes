<?php
require_once 'pdo_connect.php';
$query2 = "SELECT id, title, signature, timestamp FROM leaderposts";
  foreach ($dbh->query($query2) as $row) {
	$idA = $row['id'];
	$idB = $row['title'];
	$idC = $row['signature'];
	$idD = $row['timestamp'];
	
	$id = '<tr><td>';
	$id .= "$idA";
	$id .= '</td><td>';
	$id .= "$idC";
	$id .= '</td><td>';
	$id .= "$idB";
	$id .= '</td><td>';
	$id .= "$idD";
	$id .= '</td></tr>';
	echo $id;
    }
?>