<?php
require_once 'header.php';
?>
<nav class="fh5co-nav" role="navigation">
				<div class="top-menu">
					<div class="container">
						<div class="row">
							<div class="col-xs-2">
								<div id="fh5co-logo">
									<a href="#">Go<span>Bus</span></a>
								</div>
							</div>
							<div class="col-xs-10 text-right menu-1">
								<ul>
									<li >
										<a href="index.php">换乘查询</a>
									</li>
									<li class="active">
										<a href="#">公交线路</a>
									</li>
									<li>
										<a href="map.php">百度地图</a>
									</li>
									<li class="btn-cta">
									<?php   echo "<a href=\"$dir\"><span><i class=\"icon-user\"></i>$user</span></a>"; ?>
									</li>
									<li class="btn-cta">
										<?php echo"<a $show class=\" \" href=\"logout.php\"><i class=\"icon-user\"></i> <span>注销</span> </a>" ?>
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
            <div id="allmap" class="col-sm-12 col-md-8 col-xs-12 col-lg-8 col-lg-offset-2 col-md-offset-2" style="border-radius:20px;height: 200px;  box-shadow: 5px 5px 5px #ccc; border: ridge;">
            </div>
        </div>
    </div>
    <div id="form" class="row" style="margin: 0px;">
        <div class="col-md-8 col-md-offset-2">
            <div class=" col-xs-12 col-sm-12 col-md-8 col-lg-8 " >
                <label class="control-label">查询公交线路</label>
                <input id="bus" class="form-control clearfix " type="text"  placeholder="公交车次"/> <br />
            </div>
            <div class="row col-md-offset-0 col-lg-offset-0" style="padding-left: 10px;">
                <button id="sub" class="btn btn-primary btn-md col-xs-12 col-ms-12 col-md-7 col-lg-7  ">查询</button>
            </div>
            <div id="r-result" class="form-group clearfix">
            </div>
        </div>
    </div>
</div>


<footer id="foot" class="py-5" >
    <div class="container ">
        <div class="col-md-10 col-center-block ">
            <p align="center">
                <a class="bg-faded"  href="http://icp.alexa.cn/qutbus.cn" style="color:#D9D9D9" target="_blank">鲁ICP备17034510号</a>
            </p>
        </div>
    </div>
</footer>
<script src="js/bus.js" type="text/javascript"></script>
</body>

</html>
