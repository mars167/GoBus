<?php
require_once 'header.php';
?>

<nav class="fh5co-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo">
						<a href="#">
							Go<span>Bus</span>
						</a>
					</div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="active">
							<a href="#">
								换乘查询
							</a>
						</li>
						<li>
							<a href="busLine.php">
								公交线路
							</a>
						</li>
						<li>
							<a href="map.php">
								百度地图
							</a>
						</li>
						<li class="btn-cta">
							<?php echo "<a href=\"$dir\"><span><i class=\"icon-user\"></i>$user</span></a>"; ?>
						</li>
						<li class="btn-cta">
							<?php echo "<a $show class=\" \" href=\"logout.php\"> <span>注销</span> </a>"; ?>
						</li>

					</ul>
				</div>
			</div>

		</div>
	</div>
</nav>
<?php
//if (empty($_SESSION['username'])) {
//	header("Location:login.php");
//	exit();
//}
?>
<div class="overlay"></div>
<div class="container">
	<div id="map" class="row " style="margin:0px;">
		<div class="container " style="margin-bottom: 20px; ">
			<div id="allmap" class="col-sm-12 col-md-8 col-xs-12 col-lg-8 col-lg-offset-2 col-md-offset-2" style="border-radius:20px;height: 200px;   border:solid #6495ED"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 ">
			<div id="start" class=" col-xs-11  col-sm-11 col-md-11 col-lg-11 pull-left " style="padding-right: 0;margin-bottom: 20px;">
				<label class="control-label hidden-xs"> 起点站 </label>
				<div class="input-group">
					<input id="suggestId1" class="form-control " placeholder="起点站" type="text" />
					<span class="input-group-btn">
						<button id="location" class="addon-btn btn-default btn-sm " type="button"><i class="icon-location22"></i></button> 
					</span>
				</div>
			</div>

			<div class="serchResultPanel" class=" " tyle="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>

			<div id="terminal" class=" col-xs-11  col-sm-11 col-md-11 col-lg-11 " style="padding-right: 0; margin-bottom:10px">
				<label class="control-label hidden-xs"> 终点站 </label>
				<input id="suggestId2" class="form-control" placeholder="终点站" type="text" />
			</div>

			<div class="serchResultPanel" class=" " tyle="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>

			<div id="driving_way" class=" form-group col-sm-6 col-md-6 col-xs-6 " style=" margin-bottom: 10px">
				<select class="form-group " style="height: 30px;">
					<option value="2">最少步行</option>
					<option value="1">最少换乘</option>
					<option value="0">最少时间</option>
					<option value="3">不乘地铁</option>
				</select>
			</div>
			<div class=" pull-left form-group col-lg-5 col-sm-5 col-md-5 col-xs-12">
				<input id="result" class="result btn  btn-primary  col-lg-7 col-sm-7 col-md-7 col-xs-7 pull-left " type="button" value="查询" " />
				<input id="switch" class="result btn btn-default btn-xs col-lg-4 col-sm-4 col-md-4 col-xs-4 pull-right" value="返程"  >
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div id="r-result" class="col-sm-12 col-md-8 col-xs-12 col-lg-8 col-lg-offset-2 col-md-offset-2">
	</div>
	<div id="message" ></div>
	
</div>
<footer id="fh5co-footer" role="contentinfo">
	<div class="container">
		<div class="row copyright">
			<div class="col-md-12 text-center">
				<p>
					<small class="block">鲁ICP备17034510号</small>
				</p>
			</div>
		</div>

	</div>
</footer>
</div>

<div class="gototop js-top ">
	<a href="#" class="js-gotop">
		<i class="icon-arrow-up22"></i>
	</a>
</div>

<script src="js/road.js" ></script>
<!--<script>alert("为了保证定位准确，请各位评委老师尽量使用手机评审，允许网站获取位置信息。");</script>-->

</body>

</html>
