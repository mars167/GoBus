<!--初始化数据库页面-->
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style>.col-center-block {
	float: none;
	display: block;
	margin-left: auto;
	margin-right: auto;
}</style>
	</head>

	<body>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">
						GoBus
					</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="well col-md-10 col-xs-10 col-sm-10 col-center-block " style=" margin-top: 200px;">
					<h1>设置中,请稍等······</h1>
				</div>
				<div class="col-md-10 col-xs-10 col-sm-10 col-center-block bg-danger">
					<?php
					require_once 'function.php';

					createTable('member', 'user VARCHAR(16),
password  VARCHAR(32),
email VARCHAR(255),
INDEX(user(6))');
					header("refresh:3;url=login.php");
					?>
				</div>
			</div>
		</div>

		<footer class="py-5 " style="margin-top: 300px;">
			<div class="container ">
				<div class="row  bg-faded mx-auto">
					<div class="col-12 text-center  ">
						<small>
						<a class="text-info" href="http://icp.alexa.cn/qutbus.cn">
							鲁ICP备17034510号
						</a></small>
					</div>
				</div>
			</div>
		</footer>
	</body>

</html>
