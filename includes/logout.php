<center><script type="text/javascript"><!--
google_ad_client = "ca-pub-5438246597621570";
/* archheady */
google_ad_slot = "4166381246";
google_ad_width = 320;
google_ad_height = 50;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script><link rel="stylesheet" href="style/maincase.css" type="text/css" /></center>
<?php
require_once 'verifyme.php';
require_once 'pdo_connect.php';
require_once 'higu.inc.php';

sec_session_start();
echo "Hello";

$run = getHail($dbh);
// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params();
 
// Delete the actual cookie. 
setcookie("UID",'xXLoggedOut%00x455',time() -42000,"/","justiscraft.com");
		
setcookie(session_name(),
        '', time() -42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
// Destroy session 
mysql_free_result();
session_destroy();
header('Location: ../index.php');
?>