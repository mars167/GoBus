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
									<li>
										<a href="busLine.php">公交线路</a>
									</li>
									<li class="active">
										<a href="#">百度地图</a>
									</li>
									<li class="btn-cta">
									<?php  echo	"<a href=\"$dir\"><span><i class=\"icon-user\"></i>$user</span></a>"; ?>
									</li>
									<li class="btn-cta">
									<?php	echo "<a $show class=\" \" href=\"logout.php\"> <span>注销</span> </a>"; ?>
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
    <div class="row" style="margin: 0px; ">
        <div class="container" style="padding: 0px; ">
            <div id="allmap" style=" border-radius:25px ; border: solid #6495ED; box-shadow: 5px 5px 5px #f1f1f1;"></div>
        </div>
    </div>
</div>

<<footer id="fh5co-footer" role="contentinfo">
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

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
</div>

<script src="js/map.js" ></script>

</body>


</html>
