<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>DataStrap - Bootstrap powered database</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/webstyle.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
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
</head>
<body><div>
<h3>Gallery
</h3></div>

<div class="main" style="background-image: linear-gradient(to bottom, #F5F5F5 0%, #E8E8E8 100%);
background-repeat: repeat-x;">
<?php
date_default_timezone_set("Europe/Copenhagen");
$folder = 'upload/';
$filetype = '*.*';
$files = glob($folder.$filetype);
$count = count($files);
 
$sortedArray = array();
for ($i = 0; $i < $count; $i++) {
    $sortedArray[date ('YmdHis', filemtime($files[$i])) . $i] = $files[$i];
}
 
krsort($sortedArray);
# krsort($sortedArray);

echo '<div class="row">';
foreach ($sortedArray as $filename) {
    echo '<div style="word-break: break-all;"  class="container col-md-4" id="main">
   <div class="row" style="margin-right: 0px; margin-left: 0px;">				
   <div class="panel panel-default" style="position: relative; margin-bottom:0px;">
				<div class="panel-heading">
					<h3 class="panel-title"></h3>
					<div class="badge badge-warning"><span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up" ></i></span></div>
				</div>
  	<div class="col-md-12" style="padding-right: 0px; padding-left: 0px;">
        
        <div class="panel panel-default" style="z-index: 1000 ! important; position: relative; margin-bottom:0px;">
           <div class="panel-heading" style="height:20px;"><a href="./'.$filename.'" class="pull-right">';
		echo '<div class="badge badge-warning">';
		echo "$filename";
		   echo "</div></a>";
		   echo'</div><div class="panel-body">';
    echo '<a name="'.$filename.'" href="./'.$filename.'"><img height="auto" width="100%" src="'.$filename.'" /></a>';
	echo '              <div class="clearfix"></div>
              <hr>';
	echo substr($filename,strlen($folder),strpos($filename, '.')-strlen($folder));
	echo		  '</div>
			  </div>
		</div>
	</div>
</div>
</div>';
}
echo '</div>';
?>
</div>
</body>
<footer>
    <script src="assets/js/bootstrap.min.js"></script>
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
</footer>
</html>
