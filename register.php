<?php
// Here we have to call the required functions and ready the user creation with a secure session.
// Extended Use : This entire block of php is required. And must be at the top of your page.
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
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

    <title>Register with us! Accounts come with extra features!</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">

        <!-- Custom styles for this template -->
    <link href="assets/css/webstyle.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
    
	
	<!-- These two javascripts' below are needed for the form to work!
		 Extended Use: These are Required. -->
	    <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<script src="assets/js/jquery.js"></script>
<script>
$(function () {
  var nua = navigator.userAgent
  var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
  if (isAndroid) {
    $('select.form-control').removeClass('form-control').css('width', '100%')
  }
})
</script>
		
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"></link>
		
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

<div class="container">
   <div class="row">				
  	<div class="col-md-4 col-sm-6" style="width:100% !important;">

      	 <div class="panel panel-default">
           <div class="panel-heading"><h4>Register a User Account</h4></div>
   			<div class="panel-body">
              <p><img src="//placehold.it/90x90" class="img-circle pull-right"> <a href="login.php">Login</a></p>
      <ul class="nav nav-tabs">
        <li class="active"><li><a href="#B" data-toggle="tab">Signing up</a></li></li>
        <li><a href="#C" data-toggle="tab">TOS</a></li>
		<li><a href="#D" data-toggle="tab">SP-PP</a></li>
      </ul>
      <div class="tabbable">
        <div class="tab-content">
          <div class="tab-pane" id="B">
            <p><h2>Registration Requirements</h2>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one upper case letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </p>
          </div>
          <div class="tab-pane" id="C">
            <h2>Terms of Use.</h2>
	<p>Please read and understand how you're expected to act decently on the network.</p>
    <p>Welcome to the network! Here are your details we collect(ed) for login verification. 
	IP, Email, Browser, Language, Time, last page referrer, and server served. By
	signing up with the network you agree that collection of this data was intended, permitted,
	and understood before submitting registration. Privacy is a real concern and precautions are 
	taken to ensure a level of competent security and privacy. Though with this being true no system
	is 100% secure. Be mindful of the content you submit and audience that may receive it.
	
	There are some basic guidelines to follow. No adult/graphic content is allowed in the public
	groups or comments or bulletins and will result in an IP ban.
	All parties are encouraged to pursue all forms of communication on our network but there are actions that 
	are prohibited. Exploiting the site is not allowed in any form. The network will reserve it's right to pursue legal 
	action of the highest form in the event user data or meta data is targeted or stolen. Harassment of persons or 
	sects of humankind will result in permanent ip ban. Discrimination of any kind is subject to review in the 
	event of abuse or complaint. Distribution of malicious code or software/hardware is prohibited in all forms on the 
	network. 
	
	By signing up with the network you agree to follow the mentioned guidelines. It's in the public 
	interest that we as people are excellent to one another. Thank you.</p>
          </div>
		  <div class="tab-pane" id="D">
            <p><h2>Security Policy, Privacy Practices</h2>
            <p>Please read and understand how your data is respected.</p>
- The practices and policies herein are under development. All items marked with an "*" are not yet
made a part of the -SP,PP- but are rather the planned implementations for this site. I the webmaster for this
site take the subject of security and privacy seriously. To the best of my own abilities all data stored or
transferred will be made as confidential as possible. While in development I ask that users use extreme prejudice
in trusting this site with any personally identifiable information.
<br>
- Cookie/Session encryption. All data stored in the PID cookie for this site is encrypted. The session is made secure using
a method of obfuscation so that session highjacking is made more difficult. Though it is entirely possible that this
can still happen. As always use caution with information submitted.
<br>
- Message and Image encryption. The messages and images sent with each message are encrypted and stored that way until requested, but the file is theoretically impossible to open without the correct user.
<br>
*- Site wide encryption. Currently the site hosting this beta version of DataStrap is secured with a trusted 2048bit certificate.(Having issues with https and the forum, we will see.)
<br>
*- Disk, Database, Data-set Transparent Encryption.
<br>
*- Data Anonymization, Minimization, and Fracturing. A practice of striping data or dumping bits randomly is used to
create safe verification. While this helps ensure that if an attacker gains information what they can decrypt is not useful.
To make sure that as little is truly known of the users identity as possible I only collect what information is needed for
authentication. Once this is done the data is then fractured to make it as secure as possible. The less we store as a
whole the less risk of intersection of cross reference there is. Don't submit your age, gender, location or personal preferences.
<br>
*- Open sourced site code, once the site features have been completed the site's source code shall be free to public
scrutiny so that all bugs, errors, and insecure practices can be fixed and then verified as corrected.
<br>
<br>
        </p>
          </div>
        </div>
      </div> <!-- /tabbable -->
      
    </div>
<hr>
			  		<?php
		
		
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
<hr>
        <form class="form-group" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
            Username: <input class="form-control" type='text' 
                name='username' 
                id='username' required><br>
            Email: <input class="form-control" type="text" name="email" id="email" required><br>
            Password: <input class="form-control" type="password"
                             name="password" 
                             id="password"/><br>
            Confirm password: <input class="form-control" type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" required><br>
            <input class="btn btn-success" type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" required> 
        </form>
		
        </div>
        </div>
      
  	</div>
	</div>
</div>

	
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
  </body>
</html>
