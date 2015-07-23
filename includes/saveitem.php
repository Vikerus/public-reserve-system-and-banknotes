<?php
ini_set("auto_detect_line_endings", true);
require_once 'verifyme.php';
	echo "logged in. 4";
require_once 'pdo_connect.php';
	echo "logged in. 5";
sec_session_start();
if(login_check($mysqli) == true) {
	echo "logged in. ";
		$sighmac = $_SESSION["sig"];
		$sighmac2 = $_SESSION['sig2'];
		$itemidre = $_SESSION["itemid"];
		$itemidspc = $_SESSION["itemidd"];
		$amountre = $_SESSION["count"];
		$cmd = $_SESSION["cmd"];
		$trade = $_SESSION["trade"];
		echo " . " . $trade . "<-trade";

if (empty($_SESSION['verify'])){die('no verify');}
if ($_SESSION['verify']==true)
{
	echo "verified.  1 sig: $sighmac . ";
	$query = "SELECT amount, listed FROM vault WHERE itemid='$itemidspc' AND signature='$sighmac'";
	foreach ($dbh->query($query) as $row) {
		$amountcheck = $row['amount'];
		$amountlisted = $row['listed'];
	}
	$query = "SELECT command FROM market WHERE itemid='$itemidspc'";
	foreach ($dbh->query($query) as $row) {
		$cmd = $row['command'];
	}
	if($amountcheck >= 0 and $amountlisted >= 1){$passcheck = 1;}
	if($amountcheck >= 1 and $amountlisted >= 0){$passcheck = 1;}
	if(empty($amountcheck) and empty($amountlisted)){$passcheck = 0;}
	if($sighmac === $sighmac2){
		if(isset($trade)){
			if($amountcheck >= 0 and $amountlisted-$amountre <= 0){
			$count = $dbh->exec("UPDATE vault SET listed=(listed-$amountre), amount=(amount+$amountre) WHERE itemid='$itemidspc' AND signature='$sighmac2'");
		if($trade >= 1){
		$count = $dbh->exec("UPDATE listings SET amount=(amount-$amountre) WHERE aid='$itemidre'");
			}
		if($trade <= 0){
		$count = $dbh->exec("DELETE FROM listings WHERE aid='$itemidre'");
			}
		}
		}
		}else{
	if($passcheck == "0"){
	echo "amount is 0. ";
		if($_SESSION['verify'] === true){
			echo "verify is equal! ";
		if(isset($trade)){
			echo "is a trade2. ";
		$query = "SELECT amount, listed FROM vault WHERE itemid='$itemidspc' AND signature='$sighmac2'";
	foreach ($dbh->query($query) as $row) {
		$listedcheck = $row['listed'];
		$lc = $row['listed'];
		$amountcheck2 = $row['amount'];
	}
		$listedcheck -= $amountre;
		echo "listedcheck: $listedcheck . amountcheck2: $amountcheck2 ";
	if($amountcheck2 >= "0"){
		if($listedcheck >= 1){
		$count = $dbh->exec("UPDATE vault SET listed=(listed-$amountre) WHERE itemid='$itemidspc' AND signature='$sighmac2'");
				$count = $dbh->exec("INSERT INTO vault (signature,itemid,amount,command) VALUES ('$sighmac','$itemidspc','$amountre','$cmd')");
		}
		if($listedcheck <= 0){
			
			if($lc == 0 and $amountcheck2 == 0){
		$count = $dbh->exec("DELETE FROM vault WHERE itemid='$itemidspc' AND signature='$sighmac2'");
			}elseif($listedcheck <= 0 and $amountcheck2 == 0){
				$count = $dbh->exec("DELETE FROM vault WHERE itemid='$itemidspc' AND signature='$sighmac2'");
			}else{
		$count = $dbh->exec("UPDATE vault SET listed=(listed-$amountre) WHERE itemid='$itemidspc' AND signature='$sighmac2'");}
				$count = $dbh->exec("INSERT INTO vault (signature,itemid,amount,command) VALUES ('$sighmac','$itemidspc','$amountre','$cmd')");
		}
		if($trade >= 1){
		$count = $dbh->exec("UPDATE listings SET amount=(amount-$amountre) WHERE aid='$itemidre'");
			}
		if($trade == 0){
		$count = $dbh->exec("DELETE FROM listings WHERE aid='$itemidre'");
			}
		}
		$_SESSION['verify'] = false;
		}else{		$count = $dbh->exec("INSERT INTO vault (signature,itemid,amount,command) VALUES ('$sighmac','$itemidspc','$amountre','$cmd')"); $_SESSION['verify'] = false;}
	}
	}
	if($passcheck >="1"){
		echo "amount is 1. ";
		if($_SESSION['verify'] === true){
			echo "verify is equal! ";
		$amountupdi = $amountcheck+$amountre;
		Echo "Success! Item count updated.";
		if(isset($trade)){
			echo "is a trade2. ";
		$query = "SELECT amount, listed FROM vault WHERE itemid='$itemidspc' AND signature='$sighmac2'";
	foreach ($dbh->query($query) as $row) {
		$listedcheck = $row['listed'];
		$lc = $row['listed'];
		$amountcheck2 = $row['amount'];
	}
		$listedcheck -= $amountre;
		$amountupd = $amountcheck+$amountre;
		echo "listedcheck: $listedcheck . amountcheck2: $amountcheck2";
		if($amountcheck2 >= "0"){
		if($listedcheck >= 1){
		$count = $dbh->exec("UPDATE vault SET listed=(listed-$amountre) WHERE itemid='$itemidspc' AND signature='$sighmac2'");
				$count = $dbh->exec("UPDATE vault SET amount='$amountupd' WHERE signature='$sighmac' AND itemid='$itemidspc'");
		}
		if($listedcheck <= 0){
			if($lc == 0 and $amountcheck2 == 0){
		$count = $dbh->exec("DELETE FROM vault WHERE itemid='$itemidspc' AND signature='$sighmac2'");
			}elseif($listedcheck <= 0 and $amountcheck2 == 0){
				$count = $dbh->exec("DELETE FROM vault WHERE itemid='$itemidspc' AND signature='$sighmac2'");
			}else{
		$count = $dbh->exec("UPDATE vault SET listed=(listed-$amountre) WHERE itemid='$itemidspc' AND signature='$sighmac2'");}
				$count = $dbh->exec("UPDATE vault SET amount='$amountupd' WHERE signature='$sighmac' AND itemid='$itemidspc'");
		}
		if($trade >= 1){
		$count = $dbh->exec("UPDATE listings SET amount=(amount-$amountre) WHERE aid='$itemidre'");
			}
		if($trade == 0){
		$count = $dbh->exec("DELETE FROM listings WHERE aid='$itemidre'");
			}
		}
		$_SESSION['verify'] = false;
		}else{	$count = $dbh->exec("UPDATE vault SET amount='$amountupdi' WHERE signature='$sighmac' AND itemid='$itemidspc'");}
	}
}

echo "Cleaned Spreadsheet." . $_SESSION['verify'] . $trade;
unset($_SESSION["sig"]);
unset($_SESSION["itemid"]);
unset($_SESSION["itemidd"]);
unset($_SESSION["count"]);
unset($_SESSION["cmd"]);
unset($_SESSION["trade"]);
unset($_POST["pin"]);
unset($sighmac, $itemidre, $amountre, $amountcheck, $cmd, $con);
}
}
} else {
	 echo "wat";
header('Location: ../login.php');
    }

?> 
