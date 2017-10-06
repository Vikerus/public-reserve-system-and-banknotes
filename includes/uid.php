<?php
require_once 'pdo_connect.php';
	$UIDbbit = $_SERVER['HTTP_REFERER'];
	$UIDebit = $_SERVER['HTTP_USER_AGENT'];
	$UIDgbit = $_SERVER['REQUEST_TIME_FLOAT'];
	$Cbitvalue = "$UIDbbit $UIDebit $UIDgbit";
	$CookieToEncrypt = $Cbitvalue;
	$encryptionMethodE = "AES-256-CBC";
	$secretHashE = "25c6c7ff35b9979b151f2136cd13b0ee";

	$iv_sizeE = MCRYPT_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	$ivE = MCRYPT_create_iv($iv_sizeE, _RAND);

	$encryptedMessageE = openssl_encrypt($CookieToEncrypt, $encryptionMethodE, $secretHashE, 0, $ivE);
	
	$UIDsec = $encryptedMessageE;
	$UIDabit = $_SERVER['REMOTE_ADDR'];
	$UIDcbit = $UIDsec;
	$UIDdbit = date(DATE_RFC2822);
	$UIDfbit = $_SERVER['SERVER_PROTOCOL'];
	$UUID = "$UIDabit $UIDcbit $UIDdbit $UIDfbit";
	$CookieToEncrypt5 = $UUID;
	$encryptionMethod5 = "AES-256-CBC";
	$secretHash5 = "25c6c7ff35b9979b151f2136cd13b0ee";

	$iv_size5 = MCRYPT_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	$iv5 = MCRYPT_create_iv($iv_size5, MCRYPT_RAND);

	$encryptedMessage5 = openssl_encrypt($CookieToEncrypt5, $encryptionMethod5, $secretHashE, 0, $ivE);

	$expire = time() + 12600;
	setcookie("UID",$encryptedMessage5,$expire,"/","localhost", true);
	$UID = $encryptedMessage5;
	$email = $_POST['email'];
    $count = $dbh->exec("UPDATE members SET UID='$UID'
WHERE email='$email'");

?>
