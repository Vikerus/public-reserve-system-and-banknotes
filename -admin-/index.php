<?php
 ini_set("auto_detect_line_endings", true);
// Here we have to call the required functions and ready the user creation with a secure session.
// Extended Use : This entire block of php is required. And must be at the top of your page.
include_once '../includes/functions.php';
include_once '../includes/db_connect.php';
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'i';
	if($_SESSION['secaddy'] == "ru4L8oew84ur0rju2rjrpwJDal4r8Kwqp3498uLSD384uty3t8ry949Wewr8u340tujPre3"){
		$logged .= 'n';
	}else{
		$logged ='out';
	}
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Admin Control Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<script type="text/JavaScript" src="../js/sha512.js"></script> 
        <script type="text/JavaScript" src="../js/forms.js"></script>
        <!-- css for custom changes -->
        
        <style type="text/css">
body {
  padding-top: 70px;
  background-image: url('../assets/img/xbg.jpg');
  background-size: 100% auto;
}
.panel-body {
  background: url("../assets/img/xpane.jpg") center center repeat;
  border-bottom-left-radius: 3px;
}
#boxscroll {
	 width: auto;
	 background-color: #EEE;
	 max-height:300px;
padding: 0px;
background-repeat: repeat-x;
border-color: #DCDCDC;
border: 1px solid #E3E3E3;
max-width:auto;
overflow: auto;
  margin-bottom:1px;

}
        </style>
		
		
		<!--- Custom Scripts, pos worthy --->
		
<script >
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","../includes/articlepreview.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script >
function showUser2(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint2").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","../includes/addycomment.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script >
function showUser3(str) {
    if (str == "") {
        document.getElementById("txtHint3").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint3").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","../includes/commentorigin.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body onload="showUser()">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
        <a class="navbar-brand" rel="home" href="#">AdminX - Generic Handcrafted Administration Panel</a>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="../">Back to Homepage</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">AdminX Tools<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a data-toggle="modal" data-target="#modal03a">Manage Artcles</a></li>
                <li><a data-toggle="modal" data-target="#modal04a">Manage Users</a></li>
                <li><a data-toggle="modal" data-target="#modal05a">Manage Shoutbox</a></li>
				<li><a onclick="showUser2()">Load Comments</a></li>
              </ul>
            </li>
		</ul>
		<div class="col-sm-3 col-md-3 pull-right">
		</div>
	</div>
</nav>
<div class="container-fluid">

<?php if ($logged == "out"): ?>
   <div class="row">				
  	<div class="col-md-4 col-sm-6" style="width:100% !important;">
      	 <div class="panel panel-danger">
           <div class="panel-heading"><h4>Login</h4></div>
   			<div class="panel-body">                 
      <ul class="nav nav-tabs">
        <li class="active"><a href="#A" data-toggle="tab">Main</a></li>
      </ul>
      <div class="tabbable">
        <div class="tab-content">
          <div class="tab-pane active" id="A">
                        <h2>Admin Page, Please clear your cookies on each exit.</h2>
	<p>Use the Article form for making new posts, they are pulled from the database and shown in order of most recent timestamp, there are only 30 post spaces on the front page and the limit in size is 60,000 characters per Article. Until I have pagination down we'll have to delete the oldest posts via their ids.</p>
    <p>I can nearly make anything we could want for the web end of things, focusing on some basic social stuff like leaderboards, posting, and action rewards. The idea I have so far is to award users a base amount of exp points for making a single post on any article we put out. This way it's impossible to cheat. We get to set how much a post on any given article is worth as well =] (I really want to get this right and replace the forums.) 
	
	I can make an xml database that will function for both a wiki and exchange, all the items/bosses/other info. will be stored there with descriptions for easy lookup. Won't see this for a while. It's a pain and a half to write the xml out p-p</p>
          </div>
        </div>
      </div> <!-- /tabbable -->
    </div>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
		<hr>
        <form style="width:100% !important;" class="form-group" action="../includes/process_login.php" method="post" name="login_form">                      
            Email: <input class="form-control" type="text" name="email" required>
            Password: <input class="form-control" type="password" 
                             name="password" 
                             id="password" required>
            <input class="btn btn-danger" type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);"> 
        </form>
        <p>If you don't have a login, please <a href="../register.php">register</a></p>
        <p>If you are done, please <a href="../includes/logout.php">log out</a>.</p>
        <p>You are currently logged <?php echo $logged ?>.</p>
		
        </div>
        </div>
      
  	</div>
	
<?php else: ?>
<div class="row panel-body">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a  data-toggle="modal" data-target="#modal03a" class="active ajax-link">
						<i class="glyphicon glyphicon-file"></i>
						<span class="hidden-xs">Manage Articles</span>
					</a>
				</li>
				<li>
					<a  data-toggle="modal" data-target="#modal04a" class="active ajax-link">
						<i class="glyphicon glyphicon-user"></i>
						<span class="hidden-xs">Manage Users</span>
					</a>
				</li>
				<li>
					<a  data-toggle="modal" data-target="#modal05a" class="active ajax-link">
						<i class="glyphicon glyphicon-bullhorn"></i>
						<span class="hidden-xs">Manage Shoutbox</span>
					</a>
				</li>
			</ul>	
</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div id="ajax-content"><!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="../#">Home</a></li>
			<li><a class="active" href="#">Dashboard</a></li>
		</ol>
	</div>
	<div id="boxscroll">
		<span class="container-fluid col-sm-12" id="txtHint2">
			<button class="btn btn-success" onclick="showUser2()">Load Comments</button> 
		</span>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<div id="dashboard-header" class="row">
	<div class="col-xs-10 col-sm-2">
		<h3>ADMINISTRATION, DASHBOARD!</h3>
	</div>
	<div class="col-xs-2 col-sm-1 col-sm-offset-1">
		<div id="social" class="row">
		</div>
	</div>
	<div class="clearfix visible-xs"></div>
	<div class="col-xs-12 col-sm-8 col-md-7 pull-right">
		<div class="row">
			<div class="col-xs-4">
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal00a">Compose</button>
			</div>
			<div class="col-xs-4">
				<button type="button"  class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal01a">Admin Shout</button>
			</div>
			<div class="col-xs-4">
		<button type="button"  class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal02a">Upload Image</button>
			</div>
		</div>
	</div>
</div>
<!--End Dashboard 1-->
<!--Start Dashboard 2-->
<div class="row-fluid">
	<div id="dashboard_links" class="col-xs-12 col-sm-2 pull-right">
		<ul class="nav nav-pills nav-stacked">
			<li><a  data-toggle="modal" data-target="#modal07a" class="tab-link" id="clients">Delete all Comments</a></li>
			<li><a  data-toggle="modal" data-target="#modal08a" class="tab-link" id="graph">Delete all Articles</a></li>
		</ul>
	</div>
	<div id="dashboard_tabs" class="col-xs-12 col-sm-10">
		<!--Start Dashboard Tab 1-->
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-6">
				<h4 class="page-header">Articles</h4>
				<table id="boxscroll" class="table m-table table-bordered table-hover table-heading">
					<thead>
						<tr>
							<th>Id</th>
							<th>Author</th>
							<th>Title</th>
							<th>Timestamp</th>
						</tr>
					</thead>
					<tbody id="txtHint">
						<tr>
							<td class="m-ticker"><b>#</b><span> 9.</span></td>
							<td class="m-price">[ScrubLord]Vikerus</td>
							<td class="m-change"><i class="glyphicon glyphicon-text-color"></i> Titlebrah.</td>
							<td class="m-change"><i class="fa fa-angle-up"></i> 2015-05-20 21:50:38 </td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-xs-12 col-md-6">
				<div id="ow-activity" class="row">
					<div class="col-xs-2 col-sm-1 col-md-2">
						<h4 class="v-txt label label-primary">ACTIVITY</h4>
					</div>
					<div class="col-xs-7 col-sm-5 col-md-6">
						<div class="row"><i class="fa fa-code"></i> User login attempt <span class="label label-default pull-right">01:17:34</span></div>
						<div class="row"><i class="fa fa-cloud-upload"></i> User login attempt <span class="label label-default pull-right">03:23:34</span></div>
						<div class="row"><i class="fa fa-camera"></i> User login attempt <span class="label label-default pull-right">04:22:11</span></div>
						<div class="row"><i class="fa fa fa-money"></i> User login attempt <span class="label label-default pull-right">05:11:51</span></div>
						<div class="row"><i class="fa fa-briefcase"></i> User login attempt <span class="label label-default pull-right">04:52:23</span></div>
						<div class="row"><i class="fa fa-floppy-o"></i> User login attempt <span class="label label-default pull-right">07:11:01</span></div>
						<div class="row"><i class="fa fa-bug"></i> User login attempt <span class="label label-default pull-right">09:10:31</span></div>
					</div>
				</div>
				<div id="ow-summary" class="row">
					<div class="col-xs-12">
						<h4 class="page-header">SUMMARY</h4>
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-6">Total login attempts: <b>1245634</b></div>
									<div class="col-xs-6">Total page views: <b>227000005</b></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End Dashboard Tab 1-->
		<!--Start Dashboard Tab 2-->

	<div class="clearfix"></div>
</div>
<!--End Dashboard 2 -->

</div>
		</div>
		<!--End Content-->
	</div>



</div><!--/container-fluid-->
  <!-- Modal -->
<div class="modal fade" id="modal00a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Compose a New Article</h4>
      </div>
      <div class="modal-body">
                <form style="width:100% !important;" class="form-group" action="../includes/savearticle.php" method="post" name="login_form">       
            Author: <input class="form-control" type="text" 
                             name="username" 
                             id="author" required>
            Left-Top Image: <input class="form-control" type="text" 
                             name="imagea" 
                             id="image" />
			Middle-Top Image: <input class="form-control" type="text" 
                             name="imageb" 
                             id="image" />
			Right-Top Image: <input class="form-control" type="text" 
                             name="imagec" 
                             id="image" />
            Comment Value: <input class="form-control" type="number" 
                             name="exp" 
                             id="author" />
			Title: <input class="form-control" type="text" 
                             name="title" 
                             id="author" />
            Text Body: <hr><textarea class="" rows="26" cols="70" name="text" placeholder="max. 60000 chars"></textarea>
			<input class="btn btn-danger" name="submit" type="submit" value="Publish"/>
        </form>

				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
  <!--next modal -->
  
  <!-- Modal -->
<div class="modal fade" id="modal01a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel1">Comment in Shoutbox as Administrator</h4>
      </div>
      <div class="modal-body">
        <form style="width:100% !important;" class="form-group" action="../includes/useraddypost.php" method="post" name="login_form">       
            Author: <input class="form-control" type="text" 
                             name="username" 
                             id="author" required>
            Post Body: <hr><textarea class="" rows="4" cols="70" name="post" placeholder="max. 300 chars"></textarea>
			<input class="btn btn-danger" name="submit" type="submit" value="Publish"/>
        </form>

				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
  <!--next modal -->

  <!-- Modal -->
<div class="modal fade" id="modal02a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel2">Upload an Image</h4>
      </div>
      <div class="modal-body">
                <form style="width:100% !important;" class="form-group" action="../includes/upload_file.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required>
	<input class="btn btn-danger" name="submit" type="submit" value="Upload"/>
        </form>

				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

  <!--next modal -->

  <!-- Modal -->
<div class="modal fade" id="modal03a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel3">Manage Articles</h4>
      </div>
      <div class="modal-body">
                <form style="width:100% !important;" class="form-group" action="../includes/removemsg.php" method="post" enctype="multipart/form-data">
    Select Article by ID to Delete:
    <input type="number" name="id" required>
	<input class="btn btn-danger" name="submit" type="submit" value="Delete"/>
        </form>
				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

  <!--next modal -->

  <!-- Modal -->
<div class="modal fade" id="modal04a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel4">Manage Users</h4>
      </div>
      <div class="modal-body">
	  		<div id="sidebar-left" class="col-xs-3 col-sm-3" style="padding:0px;">
			<ul class="nav main-menu">
	  				<li id="boxscroll" style="width:100%;">
					<table class="table table-responsive"><tr><th>ID</th><th>#</th></tr></table><span id="txtHint3">
					 <button class="btn btn-success" onclick="showUser3()">Unmask Comment Owners</button>
					 </span>
				</li>
			</ul>
	  </div>
	  <div class="col-sm-9 col-xs-9">
    <form style="width:100% !important;" class="form-group" action="../includes/rmvuser.php" method="post" enctype="multipart/form-data">
    Select User by ID to Delete:
    <input type="text" name="username" required>
	<input class="btn btn-danger" name="submit" type="submit" value="Delete"/>
        </form>
		<hr>
	<form style="width:100% !important;" class="form-group" action="../includes/giveuserexp.php" method="post" enctype="multipart/form-data">
    Select User to Give Exp: <input type="text" name="username" required><br>
	Amount: <input type="number" name="expval" required>
	<input class="btn btn-danger" name="submit" type="submit" value="Give"/>
        </form>
		</div>
				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

  <!--next modal -->

  <!-- Modal -->
<div class="modal fade" id="modal05a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel5">Manage Shoutbox</h4>
      </div>
      <div class="modal-body">
    <form style="width:100% !important;" class="form-group" action="../includes/pruneshouts.php" method="post" enctype="multipart/form-data">
    Prune posts - Oldest to Newest:
    <input type="number" name="id" required>
	<input class="btn btn-danger" name="submit" type="submit" value="Delete"/>
        </form>
				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

  <!--next modal -->

  <!-- Modal -->
<div class="modal fade" id="modal07a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel7" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel7">Delete all Comments</h4>
      </div>
      <div class="modal-body">
    <form style="width:100% !important;" class="form-group" action="../includes/purgecomments.php" method="post" enctype="multipart/form-data">
    Verify:
    <input type="text" name="validate" placeholder="true or false" required>
	<input class="btn btn-danger" name="submit" type="submit" value="Delete"/>
        </form>
				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

  <!--next modal -->

  <!-- Modal -->
<div class="modal fade" id="modal08a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel8">Delete all Articles</h4>
      </div>
      <div class="modal-body">
    <form style="width:100% !important;" class="form-group" action="../includes/purgearticles.php" method="post" enctype="multipart/form-data">
    Verify:
    <input type="text" name="validate" placeholder="true or false" required>
	<input class="btn btn-danger" name="submit" type="submit" value="Delete"/>
        </form>
				 <div class="modal-footer pull-left" style="width: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php endif ?>        
        <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


        <script type='text/javascript' src="../assets/js/bootstrap.min.js"></script>
        
    </body>
</html>