<?php
$manifesto = $_POST['slate']
	//Turnicate the UID in DB
$con=mysqli_connect("localhost","root","iopkl4567945","_aio");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
mysqli_query($con,"UPDATE members SET slate='$manifesto'
WHERE uid='$_COOKIE['UID']'");
}
mysqli_close($con)
header(Location: ./index.php);
?>