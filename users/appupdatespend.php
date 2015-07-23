<pre class="showcase">
<?php
 ini_set("auto_detect_line_endings", true);
?><center><script type="text/javascript"><!--
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
</pre>
<?php
require_once('../rconsend/rcon.php');
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

// Include database connection and functions here.  See 3.1. 
sec_session_start();
if(login_check($mysqli) == true) {
$dbhost = 'localhost';
$dbuser = 'phpmate';
$dbpass = 'freeagent7';

if($_POST['srv'] == "adv.justiscraft.com") {
	$_SESSION["portcon"] = '2';
} 
elseif($_POST['srv'] == "sur.justiscraft.com") {
	$_SESSION["portcon"] = '1';
}

$sender = $_POST['sendto'];
$amount = $_POST['cmddo'];
$subtractedtot = $_SESSION["apptrans"] - $amount;
if ($amount >= 0){
// ?
}else if (0 >= $amount){
die('value must be larger then zero');
}

if ($subtractedtot >= $amount) {

print("You have enough points!");

}
else if($amount > $_SESSION["apptrans"]) {
echo $_SESSION["apptrans"];
die('You have no points to spend!');
}
$_SESSION["subapp"] = $subtractedtot;
echo "$subtractedtot";
//Encryption and Decryption should be used to protect COOKIES
//cookie*
	$host = "localhost"; // Server host name or IP
//Encryption and Decryption should be used to protect COOKIES
//cookie*
	$port = $_SESSION["portcon"]; // Port rcon is listening on
//Encryption and Decryption should be used to protect COOKIES
//cookie*
	$password = "TripleTrouble56"; // rcon.password setting set in server.properties

$timeout = 3;                       // How long to timeout.

$rcon = new Rcon($host,$port,$password,$timeout);

if ($rcon->connect())
{
  $rcon->send_command("cp give $sender $amount hi");

}

$APPtotal = $_SESSION['subapp'];
$UUser = $_COOKIE['UID'];
	//Update the APPPurse in DB
$connn=mysqli_connect("localhost","phpmate","freeagent7","_datatrap");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
mysqli_query($connn,"UPDATE members SET points='$APPtotal'
WHERE uid='$UUser'");
echo "Connected";
}
unset ($_POST['sendto']);
unset ($_POST['cmddo']);
mysqli_close($connn);
header('Location: ../rconsend/index.php');
//
//
}else{die('Error: Serving Ad. . .');}
?>
