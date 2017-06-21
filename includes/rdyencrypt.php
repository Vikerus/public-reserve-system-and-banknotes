<?php
ini_set("auto_detect_line_endings", true);
require_once 'hig.inc.php';
require_once 'higu.inc.php';
require_once 'verifyme.php';
if(login_check($mysqli) == true) {
$messagekeyX = hash('sha256', uniqid(mt_rand(1, mt_getrandmax()), true));
$textToEncryptX = $hashid_sentfrom.$messagekeyX;
$encryptionMethodX = "AES-256-CBC";
$iv_sizeX = _get_iv_size(_RIJNDAEL_256, MCRYPT_MODE_CBC);
$iv = _create_iv($iv_sizeX, _RAND);
$encryptedMessageX = openssl_encrypt($textToEncryptX, $encryptionMethodX, $hashid_sentto, 0, $iv);
}
else{
header('Location: ../logout.php');
}
?>
