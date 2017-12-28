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
} else {
	$dir = "signin.html";
	$user = "未登录";
}
echo <<<END
		<head>
		<title>$appname$userstr</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="validator/dist/jquery.validator.css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">

		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Flexslider  -->
		<link rel="stylesheet" href="css/flexslider.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style_lr.css">
		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="validator/dist/jquery.validator.js"></script>
		<script src="validator/dist/local/zh-CN.js"></script>
		
		<script src="js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Flexslider -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Main -->
		<script src="js/main.js"></script>
		<style>
			.col-center-block {
				float: none;
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
		</style>
		<script>
		
			$(function() {
				// Custom theme
				$.validator.setTheme('bootstrap', {
					validClass: 'has-success',
					invalidClass: 'has-error',
					bindClassTo: '.form-group',
					formClass: 'n-default n-bootstrap',
					msgClass: 'n-right'
				});
			});
        </script>
		
	</head>

	<body>
	    <div class="fh5co-loader"></div>

	
	
            <nav class="fh5co-nav" role="navigation">
                    <div class="top-menu">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-2">
                                    <div id="fh5co-logo">
                                        <a href="index.php">Go<span>Bus</span></a>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </nav>
END;
?>