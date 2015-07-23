<?php
include_once 'pdo_connect.php';
	$tmppro = fopen('tmp/xml_listings.xml', "w");
	fwrite($tmppro, "<?xml version='1.0' encoding='UTF-8'?><LISTINGS>");
	fclose($tmppro);
	$tmppro = fopen('tmp/xml_listings.xml', "a");
$sql5 = "SELECT reservevalue, description, title, image, itemid, amount, aid FROM listings ORDER BY id DESC";
$counter = "0";
foreach ($dbh->query($sql5) as $row) {
	$reserve = $row['reservevalue'];

	$desc = $row['description'];

	$title = $row['title'];

	$image = $row['image'];
	
	$itemid = $row['itemid'];
	
	$amount = $row['amount'];
	
	$aid = $row['aid'];
	fwrite($tmppro, "<LISTING><TITLE>$title</TITLE><AID>$aid</AID><ITEMID>$itemid</ITEMID><DESCRIPTION>$desc</DESCRIPTION><RESERVES>$reserve</RESERVES><AMOUNT>$amount</AMOUNT><IMAGE>$image</IMAGE></LISTING>");
	Echo $counter++;
  }
  	fwrite($tmppro, "</LISTINGS>");
		fclose($tmppro);

?>