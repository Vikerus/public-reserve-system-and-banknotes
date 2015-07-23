<?php
// Here we have to call the required functions and ready the user creation with a secure session.
// Extended Use : This entire block of php is required. And must be at the top of your page.
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
sec_session_start();
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

    <title>DataTrap - Bootstrap powered info collection</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">

        <!-- Custom styles for this template -->
    
    <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<!-- These two javascripts' below are needed for the form to work!
		 Extended Use: These are Required. -->
	    <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		
		<script async="" src="//www.google-analytics.com/analytics.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"> 
	<style>
.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.clickable {
    cursor: pointer;
}    
</style>
		
  </head>

  <body>

    <!-- Fixed navbar -->
	
<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
	
	          <a href="#" style="margin-left:20px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Home <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
          <ul class="nav dropdown-menu">
              <li><a href="#"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> Profile</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-dashboard" style="color:#0000aa;"></i> Dashboard</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-inbox" style="color:#11dd11;"></i> Pages</a></li>
              <li class="nav-divider"></li>
              <li><a href="#"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Settings</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-plus"></i> More..</a></li>
          </ul>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
	                <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
    </div>
    <div class="navbar-collapse collapse" id="navbar-collapsible">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#section1">What</a></li>
        <li><a href="#section2">When</a></li>
        <li><a href="#section3">How</a></li>
        <li><a href="#section4">Four</a></li>
        <li><a href="#section5">Five</a></li>
        <li><a href="#section6">Why</a></li>
        <li><a href="#section7">Who</a></li>
        <li>&nbsp;</li>
      </ul>
      <form class="navbar-form">
        <div class="form-group" style="display:inline;">
          <div class="input-group"> 
            <div class="input-group-btn">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">Category 1</a></li>
                <li><a href="#">Category 2</a></li>
                <li><a href="#">Category 3</a></li>
                <li><a href="#">Category 4</a></li>
                <li><a href="#">Category 5</a></li> 
              </ul>
            </div>
                <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                  <button class="btn btn-default btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</nav>

	<!-- The php snip-it below will show an error message if the variable $error_msg is set.
		 Extended Use: This is Required. -->
		 
		<?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
		
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>DataTrap</h1>
					<h2 class="subtitle">Remember to respect privacy! If you want to be secure don't abuse others security!</h2>
					
					<!-- This <form> reloads the page using entered values as the variables that make the script function.
						 Extended Use: The action="", method="". and name="" are Required as is shown below! -->
						 
					<form class="form-inline signup" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">
					  <div class="form-group
					  
					<!-- Here we have the <input> for email collection.
						 Extended Use: The type="". id="", and name="" are Required as is shown below! -->
						 
					    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email address" />
					  </div>
					  
					<!-- This is the <input> which allows Javascript to verify there is an email to submit.
						 Extended Use: The type="", value="", and onclick="" are Required as is shown below! -->
						 
				   <input class="btn btn-theme" type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.email);" />
					</form>					
				</div>
				<div class="col-lg-4 col-lg-offset-2">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					  </ol>					
					  <!-- slides -->
					  <div class="carousel-inner">
						<div class="item active">
						  <img src="http://placehold.it/300" alt="">
						</div>
						<div class="item">
						  <img src="http://placehold.it/300" alt="">
						</div>
						<div class="item">
						  <img src="http://placehold.it/300" alt="">
						</div>
					  </div>
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
                    <li class="twitter-follow"><a href="https://twitter.com/3rdwave_themes" class="twitter-follow-button" data-show-count="false">Follow @3rdwave_themes</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </li><!--//twitter-follow-->
                    <li class="twitter-tweet">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="3rdwave_themes" data-hashtags="bootstrap">Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </li><!--//twitter-tweet-->
                    <li class="facebook-like">
                         <div class="fb-like" data-href="http://themes.3rdwavemedia.com/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    </li><!--//facebook-like-->
                    <!--// Generate github buttons: https://github.com/mdo/github-buttons -->
                    <li class="github-star"><iframe src="http://ghbtns.com/github-btn.html?user=mdo&repo=github-buttons&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe></li>
                    <li class="github-fork"><iframe src="http://ghbtns.com/github-btn.html?user=mdo&repo=github-buttons&type=fork" allowtransparency="true" frameborder="0" scrolling="0" width="53" height="20"></iframe></li>
                    <!--//
                    <li class="github-follow"><iframe src="http://ghbtns.com/github-btn.html?user=mdo&type=follow&count=true"
  allowtransparency="true" frameborder="0" scrolling="0" width="165" height="20"></iframe></li>
                    -->
                </ul>
            </div>
        </div>
    </section><!--dev-->
<div class="container">
  
  <!--left-->
  <div class="col-sm-3">
        <h2>Side</h2>
    	<div class="panel panel-default">
         	<div class="panel-heading">Title</div>
         	<div class="panel-body">Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.</div>
        </div>
        <hr>

  </div><!--/left-->
  
  <!--center-->
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-12">
        <h2>Article Heading</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
          Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
          dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
          Aliquam in felis sit amet augue.</p>
        <p class="lead"><button class="btn btn-default">Read More</button></p>
        <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
        <ul class="list-inline"><li><a href="#">2 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>
      </div>
    </div>
    <hr>
  </div><!--/center-->

  <!--right-->
  <div class="col-sm-3">
        <h2>Side</h2>
    	<div class="panel panel-default">
         	<div class="panel-heading">Title</div>
         	<div class="panel-body">Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.</div>
        </div>
        <hr>
  </div><!--/right-->
</div><!--/container-fluid-->

<!--main-->
	
<div class="container" id="main">
   <div class="row">				
   <div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel 1</h3>
					<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
				</div>
   <div class="col-md-4 col-sm-6">
        <div class="well"> 
             <form class="form-horizontal" role="form">
              <h4>What's New</h4>
               <div class="form-group" style="padding:14px;">
                <textarea class="form-control" placeholder="Update your status"></textarea>
              </div>
              <button class="btn btn-success pull-right" type="button">Post</button><ul class="list-inline"><li><a href="#"><i class="glyphicon glyphicon-align-left"></i></a></li><li><a href="#"><i class="glyphicon glyphicon-align-center"></i></a></li><li><a href="#"><i class="glyphicon glyphicon-align-right"></i></a></li></ul>
            </form>
        </div>

	</div>
  	<div class="col-md-4 col-sm-6">

      	 <div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
   			<div class="panel-body">
              <p><img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">The Bootstrap Playground</a></p>
              <div class="clearfix"></div>
              <hr>
              Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.
            </div>
         </div>
      
  	</div>
  	<div class="col-md-4 col-sm-6">
        
        <div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
   			<div class="panel-body">
              <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
              <div class="clearfix"></div>
              <hr>
              
              <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>
              
              <hr>
              <form>
              <div class="input-group">
                <div class="input-group-btn">
                <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                </div>
                <input class="form-control" placeholder="Add a comment.." type="text">
              </div>
          	  </form>
			  </div>
			  </div>
		</div>
	</div>
</div>
</div>

        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="products-slider">
							<!-- Products Slider Item -->
							<div class="shop-item">
								<!-- Product Image -->
								<div class="image">
									<a href="page-product-details.html"><img src="http://placehold.it/300" alt="Item Name"></a>
								</div>
								<!-- Product Title -->
								<div class="title">
									<h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
								</div>
								<!-- Product Price -->
								<div class="price">
									$999.99
								</div>
								<!-- Buy Button -->
								<div class="actions">
									<a href="page-product-details.html" class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Buy</a>
								</div>
							</div>
							<!-- End Products Slider Item -->
							<div class="shop-item">
								<div class="image">
									<a href="page-product-details.html"><img src="http://placehold.it/300" alt="Item Name"></a>
								</div>
								<div class="title">
									<h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
								</div>
								<div class="price">
									$999.99
								</div>
								<div class="actions">
									<a href="page-product-details.html" class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Buy</a>
								</div>
							</div>
							<div class="shop-item">
								<div class="image">
									<a href="page-product-details.html"><img src="http://placehold.it/300" alt="Item Name"></a>
								</div>
								<div class="title">
									<h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
								</div>
								<div class="price">
									$999.99
								</div>
								<div class="actions">
									<a href="page-product-details.html" class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Buy</a>
								</div>
							</div>
							<div class="shop-item">
								<div class="image">
									<a href="page-product-details.html"><img src="http://placehold.it/300" alt="Item Name"></a>
								</div>
								<div class="title">
									<h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
								</div>
								<div class="price">
									$999.99
								</div>
								<div class="actions">
									<a href="page-product-details.html" class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Buy</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>


	
	        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-3 col-sm-6">
	        			<div class="service-wrapper">
		        			<img src="img/service-icon/diamond.png" alt="Service Name">
		        			<h3>Brilliant Look</h3>
		        			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames. <a href="#">Read more...</a></p>
	        			</div>
	        		</div>
	        		<div class="col-md-3 col-sm-6">
	        			<div class="service-wrapper">
		        			<img src="img/service-icon/ruler.png" alt="Service Name">
		        			<h3>Themeable</h3>
		        			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames. <a href="#">Read more...</a></p>
		        		</div>
	        		</div>
	        		<div class="col-md-3 col-sm-6">
	        			<div class="service-wrapper">
		        			<img src="img/service-icon/box.png" alt="Service Name">
		        			<h3>Features Rich</h3>
		        			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames. <a href="#">Read more...</a></p>
		        		</div>
	        		</div>
	        		<div class="col-md-3 col-sm-6">
	        			<div class="service-wrapper">
		        			<img src="img/service-icon/diamond.png" alt="Service Name">
		        			<h3>Brilliant Look</h3>
		        			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames. <a href="#">Read more...</a></p>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	
	<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
					<p class="copyright">Copyright &copy; 2014-2015 - Vikerus</p>
			</div>
		</div>		
	</div>	
	</div>
	<script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.nicescroll.js" ></script>
		<script type="text/javascript" src="assets/js/jquery.sparkline.js" ></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	    <!--common script for all pages-->
		 <script type="text/javascript" src="assets/js/scripts.js"></script>
    <script type="text/javascript" src="assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
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
