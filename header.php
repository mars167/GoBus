<?php

session_start();
echo "<!DOCTYPE html> \n <html lang=\"zh-CN\"> <head>";

require_once 'function.php';

$userstr = '  (未登录)';
//未登录状态
if (isset($_SESSION['username'])) {
	$user = $_SESSION['username'];
	$userstr = "";
	$dir = "#";
	$show = "";
} else {
	$dir = "login.php";
	$user = "未登录";
	$userstr = "未登录";
	$show = "hidden";
}
?>

	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php  echo "<title>$appname$userstr</title> ";?>	
		<link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">

		<link rel="stylesheet" href="css/animate.css">
	
		<link rel="stylesheet" href="css/icomoon.css">
	
		<link rel="stylesheet" href="css/bootstrap.css">
		
		<link rel="stylesheet" href="css/flexslider.css">

		
		<link rel="stylesheet" href="css/style.css">

		
		<script src="js/modernizr-2.6.2.min.js"></script>
		
		<script src="js/jquery-3.1.1.min.js"></script>
		
		<script src="js/jquery.easing.1.3.js"></script>
		
		<script src="js/bootstrap.min.js"></script>
		
		<script src="js/jquery.waypoints.min.js"></script>
		
		<script src="js/jquery.flexslider-min.js"></script>
		
		
		<script src="js/main.js"></script>
		
		<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=dlHjsDiFbIOxn1eUvVUMGTZSE1uMjm3C&s=1"></script>
		
		<script src="js/common.js"></script>
		<style>
			.col-center-block {
				/*float: none;*/
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
			.sel_body_title .sel_body_name{
				height: 30px  !important;
			}
		</style>
	</head>

	<body id="body" >

		<div class="fh5co-loader"></div>

		<div id="page">
