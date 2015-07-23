<?php
 ini_set("auto_detect_line_endings", true);
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
unset($_SESSION["portcon"]);

// Include database connection and functions here.  See 3.1. 
sec_session_start();
if(login_check($mysqli) == true) {
$dbhost = 'localhost';
$dbuser = 'phpmate';
$dbpass = 'freeagent7';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
} else { header('Location: ../index.php');
        echo "You are not authorized to access this page, please login or register. " ."<url>login</url>" . "<br>";
}
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('_datatrap');

// This could be supplied by a user, for example
$safelookup = $_COOKIE["UID"];


// Formulate Query
// This is the best way to perform an SQL query
// For more examples, see mysql_real_escape_string()
$query = sprintf("SELECT id, points FROM members 
    WHERE uid='%s'",
    mysql_real_escape_string($safelookup));

// Perform Query
$result = mysql_query($query, $conn);

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

// Use result
// Attempting to print $result won't allow access to information in the resource
// One of the mysql result functions must be used
// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
while ($row = mysql_fetch_array($result)) {
	$_SESSION["apptrans"] = $row['points'];
	echo '<div class="label label-primary"><span href="#" class="badge badge-primary">';
	echo "Point total: ". $row['points'];
	echo '</span>';
	echo "Server Connected to: ". $_SESSION["portcon"] . "</div>";
    //echo $row['PID'] . "<br>";
}

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysql_free_result($result);
mysql_free_result($row);
//	session_start();   // Add your protected page content here!

?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>DataStrap - Bootstrap powered database</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">

        <!-- Custom styles for this template -->
    <link href="../assets/css/webstyle.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/main.css" rel="stylesheet">
    
	
	<!-- These two javascripts' below are needed for the form to work!
		 Extended Use: These are Required. -->
		<script src="../assets/js/jquery.js"></script>
<script>
$(function () {
  var nua = navigator.userAgent
  var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
  if (isAndroid) {
    $('select.form-control').removeClass('form-control').css('width', '100%')
  }
})
</script>
		
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css"></link>
		
  </head>

  <body>

    <!-- Fixed navbar -->
<nav class="navbar navbar-trans navbar-fixed-top" role="navigation" style="height: 34px ! important; margin:0px; margin-right:4px;">
  <div class="container" style="height: 34px ! important; width:auto !important;">
  	<button type="button" class="navbar-toggle pull-left glyphicon glyphicon-log-in" data-toggle="collapse" data-target="#navbar-collapsible" style="color:#4A9759; top:-5px;"></button>
    <div class="navbar-header pull-right" style="height: 34px ! important;">
	
	          <a href="#" style="margin:0px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle pull-right" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Legend <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
          <ul class="nav dropdown-menu pull-right" style="margin:0px;">
              <li><a href="./#"><i class="glyphicon glyphicon-dashboard" style="color:#1111dd;"></i> Dashboard</a></li>
			  <li><a href="../forum"><i class="glyphicon glyphicon-list-alt" style="color:#ee1111;"></i> Forum</a></li>
              <li><a href="../profile.php"><i class="glyphicon glyphicon-user" style="color:#0000aa;"></i> Profile</a></li>
              <li><a href="../inbox.php"><i class="glyphicon glyphicon-inbox" style="color:#11dd11;"></i> PM Inbox</a></li>
              <li class="nav-divider"></li>
              <li><a href="../ucp.php"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> UCP</a></li>
			  <li><a href="../forum/ucp.php"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Forum UCP</a></li>
			  <li><a href="../includes/logout.php"><i class="glyphicon glyphicon-logout" style="color:#dd1111;"></i> Logout</a></li>
          </ul>

      <a class="navbar-brand" href="#" style="margin-right: -30px;">						
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-left:0px  !important; margin-top:-15px !important;">				
					  <!-- slides -->
					  <div class="carousel-inner">
						<div class="item active">
						  <img src="images/datastrap.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastrapgrn.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastrappurp.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastrapred.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastraporng.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastrapylw.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastrapblu.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastrapwht.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastraprvs.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastrapblk.png" alt="">
						</div>
						<div class="item">
						  <img src="images/datastrapdrg.png" alt="">
						</div>
					  </div>
					</div></a>
	                <div class="sidebar-toggle-box pull-right">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
    </div>




  </div>

</nav>
	<div id="header">
		<div class="container-fluid" style="background-image:url('assets/img/bg-header.jpg'); height: 150px;">
			<div class="row">
				<div class="col-lg-6" style="margin-top:20px;">
					
					<span class="form-inline" ><h2 class="subtitle" style="margin-top:-1px !important;"><h1 style="margin-top:10px !important; margin-bottom:-15px !important; ">Public Reserves</h1></a>A Powerful tool for freedom.</h2></span>
					
					<!-- This <form> reloads the page using entered values as the variables that make the script function.
						 Extended Use: The action="", method="". and name="" are Required as is shown below! -->
						     <div class="navbar-collapse collapse" id="navbar-collapsible" style="height: 34px ! important; border-top: 0px !important; box-shadow: none !important;">
							 <a href="../login.php"><button type="submit" style="float:left; display:inline;" action="../login.php" class="btn btn-warning">Login</button></a>
							 <a href="../register.php"><button type="submit" style="float:left; display:inline;" action="../login.php" class="btn btn-success">Register</button></a>

    </div>				
				</div>			
				
			</div>

		</div>
	</div>
		 

	    <!-- Dev -->
    <section id="promo" class="promo section offset-header">
        <div class="social-media">
            <div class="social-media-inner container text-center">
                <ul class="list-inline">
                    <li class="twitter-follow"><a href="https://twitter.com/#" class="twitter-follow-button" data-show-count="false">Follow #</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </li><!--//twitter-follow-->
                    <li class="twitter-tweet">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="VikerusForrest" data-hashtags="bootstrap">Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </li><!--//twitter-tweet-->
                    <li class="facebook-like">
                         <div class="fb-like" data-href="#" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    </li><!--//facebook-like-->

				</ul>
				
            </div>
        </div>
    </section><!--dev-->
<!--main-->

	    	<div class="panel panel-default">
         	<div class="panel-heading">Transfers </div>
         	<div id="boxscroll" style="height: 600px;" class="panel panel-default">
				        <div class="section" style="background-image: linear-gradient(to bottom, #F5F5F5 0%, #E8E8E8 100%);background-repeat: repeat-x; position:relative !important; z-index:100 !important;">
	        <div class="container-fluid" style="margin:0px;">
	        	<div class="row">
	        		<div class="col-md-3 col-sm-6">
	        			<div class="form-group panel-body">
		        			<img src="img/service-icon/box.png" alt="Bank Transfer to User">
<form class="panel form-group" method="post" action="../includes/trade.php">
Points,Exp,Gold,Skillpoints,Tokens: <input class="form-control" type="text" name="bank" required>
<span class="error"> <?php  echo $nameErr;?></span>
<br><br>
Who are we sending to?: <input class="form-control" type="text" name="user" required>
<span class="error"><?php  echo $nameErr;?></span>
<br><br>
How much?: <input class="form-control" type="text" name="count" required>
<span class="error"><?php  echo $nameErr;?></span>
<br><br>
PIN: <input class="form-control" type="text" name="pin" required>
<span class="error"><?php  echo $nameErr;?></span>
<br><br>
<input class="btn btn-success" type="submit" name="submit" value="Submit"></form>
		        		</div>
	        		</div>
	        		<div class="col-md-3 col-sm-6">
	        			<div class="form-group panel-body">
		        			<img src="img/service-icon/diamond.png" alt="Item Transfer to User">
<form class="panel form-group" method="post" action="../includes/transfer.php">
Input the Itemid you want to send: <input class="form-control" type="text" name="itemid" required>
<span class="error"> <?php  echo $nameErr;?></span>
<br><br>
Who are we sending to?: <input class="form-control" type="text" name="user" required>
<span class="error"><?php  echo $nameErr;?></span>
<br><br>
How many?: <input class="form-control" type="text" name="count" required>
<span class="error"><?php  echo $nameErr;?></span>
<br><br>
PIN: <input class="form-control" type="text" name="pin" required>
<span class="error"><?php  echo $nameErr;?></span>
<br><br>
<input class="btn btn-success" type="submit" name="submit" value="Submit"></form>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
		</div>
<br>

<?php



?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6QAVK9PCWWC7N">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

			</div>
<!--main-->


	
	<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
					<p class="copyright">Open Sourced for a Better tomorrow, tomorrow. - Vikerus</p>
			</div>
		</div>		
	</div>	
	</div>

    <script src="../assets/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="../assets/js/jquery.sparkline.js" ></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	    <!--common script for all pages-->
  </body>
</html>