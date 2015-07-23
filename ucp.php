<?php
 ini_set("auto_detect_line_endings", true);

require_once './includes/functions.php';
require_once './includes/verifyme.php';
sec_session_start();

if(login_check($mysqli) == true) {
}else{header('Location: ./login.php');}

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

    <title>User Control Panel</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link rel="alternate" hreflang="en-US" href="http://www.mozilla.org/en-US/firefox/new/" title="English (US)">
<link rel="alternate" hreflang="fr" href="http://www.mozilla.org/fr/firefox/new/" title="Français">

        <!-- Custom styles for this template -->
    <link href="assets/css/webstyle.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css" /> 
	<link href="assets/css/styleacc.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<!-- These two javascripts' below are needed for the form to work!
		 Extended Use: These are Required. -->
		 
		
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/jquery.nicescroll.min.js"></script>
		<script src="assets/js/jquery.scrollTo.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.nicescroll.js" ></script>
		<script>
$(document).ready(function(){
<!-- IF MBRN_SCROLL_CUSTOM == null || MBRN_SCROLL_CUSTOM -->
  // jQuery Nicescroll 
  if( jQuery().niceScroll ) {
  	var params = { <!-- IF not MBRN_SCROLL_SMOOTH && MBRN_SCROLL_SMOOTH != null -->scrollspeed:2000,mousescrollstep:8*4,smoothscroll:false <!-- ENDIF --> };
    $("html").niceScroll(params);
  }
<!-- ENDIF -->
});
</script>
		<style type="text/css">
#boxscroll {
	 width: auto;

	 background-color: #ffffff;
padding: 0px;
background-repeat: repeat-x;
border-color: #DCDCDC;
box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.05) inset, 0px 1px 0px rgba(255, 255, 255, 0.1);
border: 1px solid #E3E3E3;
max-width:auto;
overflow: auto;
  margin-bottom:1px;
  background: #e3e3e3; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMTAwJSIgeDI9IjEwMCUiIHkyPSIwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjZTNlM2UzIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNDclIiBzdG9wLWNvbG9yPSIjZWFlYWVhIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2YyZjJmMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
background: -moz-linear-gradient(45deg, #e3e3e3 0%, #eaeaea 47%, #f2f2f2 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#e3e3e3), color-stop(47%,#eaeaea), color-stop(100%,#f2f2f2)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(45deg, #e3e3e3 0%,#eaeaea 47%,#f2f2f2 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(45deg, #e3e3e3 0%,#eaeaea 47%,#f2f2f2 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(45deg, #e3e3e3 0%,#eaeaea 47%,#f2f2f2 100%); /* IE10+ */
background: linear-gradient(45deg, #e3e3e3 0%,#eaeaea 47%,#f2f2f2 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e3e3e3', endColorstr='#f2f2f2',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */

}
#boxscroll2 {
	padding: 40px;
	height: 120px;
	width: 730px;
	border: 2px solid #F00;
	overflow: auto;
}
#boxscroll4 {
	height: 300px;
	margin-top: 40px;
	background-color: #00FF66;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 18px;
	padding: 20px;
	color: #006633;
	overflow: auto;
}
</style>
<script>
$(function () {
  var nua = navigator.userAgent
  var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
  if (isAndroid) {
    $('select.form-control').removeClass('form-control').css('width', '100%')
  }
})
</script>

	<style>
.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}    
</style>
		
  </head>

  <body>
  
    <!-- Fixed navbar -->
<nav class="navbar navbar-trans navbar-fixed-top" role="navigation" style="height: 1px ! important; margin:0px; margin-right:4px;">
  <div class="container" style="height: 1px ! important; width:auto !important;">
  	<button type="button" class="navbar-toggle pull-left glyphicon glyphicon-log-in" data-toggle="collapse" data-target="#navbar-collapsible" style="color:#4A9759; top:-5px;"></button>
    <div class="navbar-header pull-right" style="height: 34px ! important;">
	
	          <a href="#" style="margin:0px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle pull-right" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Legend <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
          <ul class="nav dropdown-menu pull-right" style="margin:0px;">
              <li><a href="./#"><i class="glyphicon glyphicon-dashboard" style="color:#1111dd;"></i> Dashboard</a></li>
			  <li><a href="./forum"><i class="glyphicon glyphicon-list-alt" style="color:#ee1111;"></i> Forum</a></li>
              <li><a href="profile.html"><i class="glyphicon glyphicon-user" style="color:#0000aa;"></i> Profile</a></li>
              <li><a href="inbox.php"><i class="glyphicon glyphicon-inbox" style="color:#11dd11;"></i> PM Inbox</a></li>
              <li class="nav-divider"></li>
              <li><a href="./ucp.php"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> UCP</a></li>
			  <li><a href="./forum/ucp.php"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Forum UCP</a></li>
			  <li><a href="./includes/logout.php"><i class="glyphicon glyphicon-logout" style="color:#dd1111;"></i> Logout</a></li>
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
					
					<span class="form-inline" ><h2 class="subtitle" style="margin-top:-1px !important;"><a href="#"><h1 style="margin-top:10px !important; margin-bottom:-15px !important; ">Public Reserves</h1></a>A Powerful tool for freedom.</h2></span>
					
					<!-- This <form> reloads the page using entered values as the variables that make the script function.
						 Extended Use: The action="", method="". and name="" are Required as is shown below! -->
						     <div class="navbar-collapse collapse" id="navbar-collapsible" style="height: 34px ! important; border-top: 0px !important; box-shadow: none !important;">
							 <a href="login.php"><button type="submit" style="float:left; display:inline;" action="login.php" class="btn btn-warning">Login</button></a>
							 <a href="register.php"><button type="submit" style="float:left; display:inline;" action="login.php" class="btn btn-success">Register</button></a>

    </div>				
				</div>			
				
			</div>

		</div>
	</div>

	<!-- The php snip-it below will show an error message if the variable $error_msg is set.
		 Extended Use: This is Required. -->
		 
		<?php
		
		
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
	
<div class="container" style="height: auto !important; margin-bottom: -17px !important;" >
		   <div class="panel panel-default" style="z-index: 1000 ! important; position: relative; background-color: rgb(192, 192, 192) ! important; border-color: transparent; margin-bottom: 0px;">
				<div class="panel-heading">
					<h3 class="panel-title"></h3>
					<span class="pull-right clickable" style="top: 11px !important;"><i class="glyphicon glyphicon-chevron-up" style="top: 11px !important;"></i></span>
				</div>
  <!--left-->
  <div style=" padding: 0px ! important; z-index: 1;" class="col-sm-4">
    	<div class="panel panel-default">
         	<div class="panel-heading">			<h3 style="margin-top:5px !important;">
			<div class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div onclick="rotateYDIV()" id="rotatey1" style="transform: rotateY(360deg);"  class="avatar">
										<img src="/assets/img/favicon.png" class="img-rounded" alt="avatar">
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right" style="margin-top:-10px;">
										<span class="welcome" style="font-size:14px;">Welcome,</span>
										<span style="font-size:14px;" ><?php 
																				if($_SESSION['active'] == true)
																				{
																				echo $_POST["useractive"];
																				}
																				else
																				{
																				$_POST["useractive"] = "Friend";
																				echo $_POST["useractive"];
																				} 
																		?>
										</span>
									</div>
								</a>
								<ul class="dropdown-menu" style="z-index:100000; visibility:visible;">
									<li>
										<a href="./profile.html">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>
									<li>
										<a href="inbox.php">
											<i class="fa fa-envelope"></i>
											<span>Messages</span>
										</a>
									</li>
									<li>
										<a href="RSSfeeds.php">
											<i class="fa fa-picture-o"></i>
											<span>RSS</span>
										</a>
									</li>
									<li>
										<a href="./ucp.php">
											<i class="fa fa-cog"></i>
											<span>User Control Panel</span>
										</a>
									</li>
									<li>
										<a href="includes/logout.php">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</div>
			</h3></div>
         	<div class="panel-body" style="height: 340px;">
             			<h3 style="margin-top:5px !important;">
			<div class="form-group">
						<form class="form-horizontal" method="post" enctype="multipart/form-data" action="includes/pin.php">
				<label><p>Create a Public Usermask:</p></label>
				<p>Enter a PIN you can remember:</p>
				<input class="form-control" type="text" name="pin">	
				<input class="btn btn-success pull-right" type="submit" name="submit" value="Submit"></form>
			<p>You can't update any of your user settings without first adding a PIN to your account!</p>
            	</div>
			</h3>
				
		</div>
        </div>

  </div><!--/left-->

  <!--center-->
    <div class="col-sm-8" style="padding: 0px ! important;">
	 <div class="panel default-panel" style="padding:0px !important; border: 1px solid;">
	  <div class="panel-heading">User Control Panel <p class="pull-right"><a href="http://www.justiscraft.com/profile.html"><button class="btn btn-default" style="padding:0px !important; color:black;">User Profile</button></a></p></div>
      <ul class="nav nav-tabs">
        <li class="active"><a title="User Profile Info" href="#A" data-toggle="tab">Profile info</a></li>
        <li><a title="Avatar and Comment Signature" alt="upload an image and change your signature" href="#B" data-toggle="tab">Avatar & Signature</a></li>
		        <li><a title="You in other Games" alt="other accounts in games played" href="#C" data-toggle="tab">Users</a></li>
						<li><a title="Developer Connections" alt="meet new people with big ideas" href="#E" data-toggle="tab">Developer Info</a></li>
						<li><a title="Computer Profiler" alt="boast an awesome rig" href="#F" data-toggle="tab">PC Profile</a></li>
						<li><a title="Site Settings" alt="customize your experience" href="#G" data-toggle="tab">Site Settings</a></li>
      </ul>
      <div class="tabbable">
        <div class="tab-content" id="boxscroll" style="height:800px;">
<div class="tab-pane active" id="A">
<h2 title="Update User Info" alt="create a personalized user account for yourself" class="label label-primary" style="width:auto;">Optional User Profile Info</h2>
<div class="panel-footer panel-primary" style="height:100%; " id="">
<h2 title="Friendly Profile Creator" alt="a public profile for the world to discover you" style="margin-top:0px;">Profile Info:</h2>
								<form class="form-horizontal" method="post" enctype="multipart/form-data" action="includes/profilefill.php">
								<textarea class="form-control" style="padding-right:12px;" name="pets" rows="3" cols="30" placeholder="What kind of pets do you own?"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="food" rows="3" cols="30" placeholder="What kind of food do you like?"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="games" rows="3" cols="30" placeholder="What games do you play?"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="websites" rows="3" cols="30" placeholder="Have any favourite websites?"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="wish" rows="3" cols="30" placeholder="What do you wish for?"></textarea>
								Confirm Pin<input class="form-control" type="text" name="pin">
				<input class="btn btn-success pull-right" type="submit" name="submit9" value="Submit"></form>
		</div></div>
<div class="tab-pane" id="B">
<h2 title="Avatar and Signature Creation" alt="upload an image and change your signature" class="label label-primary" style="width:auto;">User Customizations</h2>
<div class="panel-footer panel-primary" style="height:100%; " id="">
<h2 title="Create a Persona" alt="get noticed by the people around you, make friends" style="margin-top:0px;">Avatar and Signature:</h2>
								<form class="form-horizontal" method="post" enctype="multipart/form-data" action="includes/pubfill.php">
								<textarea class="form-control" style="padding-right:12px;" name="image" rows="2" cols="30" placeholder="Avatar image, Link only"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="header" rows="2" cols="30" placeholder="Signature Header"></textarea>
								Confirm Pin<input class="form-control" type="text" name="pin">
				<input class="btn btn-success pull-right" type="submit" name="submit9" value="Submit"></form>
		</div></div>
<div class="tab-pane" id="C">
<h2 title="Gamer Accounts Around the Net" alt="fillout the gamer accounts section so people can find you" class="label label-primary" style="width:auto;">Your Other IGNs'</h2>
<div class="panel-footer panel-primary" style="height:100%; " id="">
<h2 title="Other IGNs" alt="add other ign you might have" style="margin-top:0px;">Game Characters:</h2>
								<form class="form-horizontal" method="post" enctype="multipart/form-data" action="includes/gamecharsfill.php">
								<textarea class="form-control" style="padding-right:12px;" name="Minecraft" rows="1" cols="30" placeholder="Minecraft IGN"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="LoL" rows="1" cols="30" placeholder="LoL IGN"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="steam" rows="1" cols="30" placeholder="Steam IGN"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="WoW" rows="1" cols="30" placeholder="WoW IGN"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="wurm" rows="1" cols="30" placeholder="Wurm IGN"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="runescape" rows="1" cols="30" placeholder="Runescape IGN"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="pokeshowdown" rows="1" cols="30" placeholder="PokemonShowdown IGN"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="3ds" rows="1" cols="30" placeholder="3DS Friendcode"></textarea>
								Confirm Pin<input class="form-control" type="text" name="pin">
				<input class="btn btn-success pull-right" type="submit" name="submit9" value="Submit"></form>
		</div></div>
		<div class="tab-pane" id="E">
<h2 title="Developer Connections" alt="get your project out into the public domain" class="label label-primary" style="width:auto;">Development Links</h2>
<div class="panel-footer panel-primary" style="height:100%;" id="">
<h2 title="Build a Better Network" alt="join others who can help see projects get done faster, smarter, and cheaper" style="margin-top:0px;">Developer Profile:</h2>
						<form class="form-horizontal" method="post" enctype="multipart/form-data" action="includes/devboardfill.php">
								Github URL: <textarea class="form-control" style="padding-right:12px;" name="github" rows="1" cols="30"></textarea>
								Arduino, RaspPI, Beagleboard? <textarea class="form-control" style="padding-right:12px;" name="boards" rows="1" cols="30"></textarea>
								Languages: <textarea class="form-control" style="padding-right:12px;" name="languages" rows="1" cols="30" placeholder="php,java,spanish, or sign-language?"></textarea>
								Cryptocurrency Address: <textarea class="form-control" style="padding-right:12px;" name="crypto" rows="1" cols="30"></textarea>
								Confirm Pin<input class="form-control" type="text" name="pin">
				<input class="btn btn-success pull-right" type="submit" name="submit9" value="Submit"></form>
		</div></div>
				<div class="tab-pane" id="F">
<h2 title="PC Profile" alt="customize the pc profile" class="label label-primary" style="width:auto;">Computer Profile</h2>
<div class="panel-footer panel-primary" style="height:100%;" id="">
<h2 title="Share Your Rig" alt="help others understand the various configurations computers might have, for science and economy" style="margin-top:0px;">No Consoles... Yet?</h2>
								<form class="form-horizontal" method="post" enctype="multipart/form-data" action="includes/pcfill.php">
								<textarea class="form-control" style="padding-right:12px;" name="cpu" rows="2" cols="30" placeholder="Describe your CPU"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="gpu" rows="2" cols="30" placeholder="Describe your GPU"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="psu" rows="2" cols="30" placeholder="Describe your PSU"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="mobo" rows="2" cols="30" placeholder="Describe your Motherboard"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="memory" rows="2" cols="30" placeholder="Describe your Memory"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="hood" rows="2" cols="30" placeholder="Describe your Case"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="screen" rows="2" cols="30" placeholder="Describe your Screen(s)"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="keyboard" rows="2" cols="30" placeholder="Describe your Keyboard"></textarea>
								<textarea class="form-control" style="padding-right:12px;" name="mouse" rows="2" cols="30" placeholder="Describe your Mouse"></textarea>
								Confirm Pin<input class="form-control" type="text" name="pin">
				<input class="btn btn-success pull-right" type="submit" name="submit9" value="Submit"></form>
		</div></div>
		
						<div class="tab-pane" id="G">
<h2 title="Change the way the site Works" alt="setup the site the way you want" class="label label-primary" style="width:auto;">Site Settings</h2>
<div class="panel-footer panel-primary" style="height:100%;" id="">
<h2 title="Custom User Settings" alt="make the site act the way you want" style="margin-top:0px;">Personal Content Settings</h2>
								<form class="form-horizontal" method="post" enctype="multipart/form-data" action="includes/settingsfill.php">
				<label><p>Comment tolerance level: won't load comments below your tolerance selection.(default is 5)</p></label>
				<select class="form-control" name="tolerance" required>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				</select>
								Confirm Pin<input class="form-control" type="text" name="pin">
				<input class="btn btn-success pull-right" type="submit" name="submit10" value="Submit"></form>
		</div></div></div></div></div>

  </div>
<!--/center-->
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
    <script src="assets/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="assets/js/jquery.sparkline.js" ></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	    <!--common script for all pages-->
	<script type="text/javascript">
    jQuery(function ($) {
        $('.panel-heading span.clickable').on("click", function (e) {
            if ($(this).hasClass('panel-collapsed')) {
                // expand the panel
                $(this).parents('.panel').find('.panel-body').slideDown();
                $(this).removeClass('panel-collapsed');
                $(this).find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            }
            else {
                // collapse the panel
                $(this).parents('.panel').find('.panel-body').slideUp();
                $(this).addClass('panel-collapsed');
                $(this).find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            }
        });
    });
</script>
  </body>
</html>