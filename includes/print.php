<?php
require_once 'pdo_connect.php';

function getFreecomments($conn) {
	$q = $_REQUEST["q"];
   $sql = "SELECT text, author FROM comments WHERE articleid='$q' ORDER BY id DESC";
  foreach ($conn->query($sql) as $row) {
	$text = $row['text'];
	$author = $row['author'];
	
	$stringthrown = '<tr><td>';
	$stringthrown .= '['. $author. ']: ';
	$stringthrown .= '</td><td>';
	$stringthrown .= base64_decode($text);
	$stringthrown .= '</td></tr>';
	echo $stringthrown;
	unset($text,$author);
    }
}
$run = getFreecomments($dbh);
?>
