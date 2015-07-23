<?php
ini_set("auto_detect_line_endings", true);
require_once 'higu.inc.php';
require_once 'verifyme.php';
sec_session_start();
if(login_check($mysqli) == true) {
$encryptionMethod = "AES-256-CBC";
$secretHash = "$hashid_sentfrom";
$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
$encryptedMessage = $_SESSION["messagekey"];
$decryptedMessage = openssl_decrypt($encryptedMessage, $encryptionMethod, $secretHash, 0, $iv);
$data = $iv.$encryptedMessage;
$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
$iv = substr($data, 0, $iv_size);
$decryptedMessage = openssl_decrypt(substr($data, $iv_size), $encryptionMethod, $secretHash, 0, $iv);
$_SESSION["pubkey"] = "$decryptedMessage";
}
else
{
header('Location: ../logout.php');
}
?>