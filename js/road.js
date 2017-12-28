$(document).ready(function() {

	$('#switch').click(function() {
		var s1 = $('#suggestId1');
		var s2 = $('#suggestId2');
		var t;
		t = s1.val();
		s1.val(s2.val());
		s2.val(t);
	});
	$('#location').click(function() {
		userLocation();
	});

	/////////////////////////////////////////////////////////////////
	//地图初始化
	/////////////////////////////////////////////////////////////////
	var map = new BMap.Map("allmap", {
		enableMapClick: false
	}); //构造底图时，关闭底图可点

	var point = new BMap.Point(117.02496707,36.68278473);
	map.centerAndZoom(point, 15);

	/////////////////////////////////////////////////////////////////
	//定位当前位置并检索周围公交站点poi 生成起点选择列表
	/////////////////////////////////////////////////////////////////
	map.enableScrollWheelZoom(); //启用滚轮放大缩小

	function userLocation() {
		var geolocation = new BMap.Geolocation();
		geolocation.getCurrentPosition(function(r) { //html5的getCurrentPosition() API方法
			if(this.getStatus() == BMAP_STATUS_SUCCESS) {
				map.clearOverlays(); //清除其他覆盖物
				var mk = new BMap.Marker(r.point);
				map.addOverlay(mk);
				map.panTo(r.point);
				myPoint = r.point;
				var mPoint = new BMap.Point(r.point.lng, r.point.lat); //获取中心点
				var circle = new BMap.Circle(mPoint, 200, { //创建圆形区域
					fillColor: "blue",
					strokeWeight: 1,
					fillOpacity: 0.3,
					strokeOpacity: 0.3
				});
				map.addOverlay(circle); //添加覆盖物
				var local = new BMap.LocalSearch(map, {
					renderOptions: {
						map: map,
						autoViewport: false,
						//						panel:"message" //显示poi结果面板
					}
				});
				local.searchNearby('公交站', mPoint, 200);
				localresults = local.getResults(); //返回localResult类
				$('#suggestId1').val("当前位置");
			} else {
				alert('failed' + this.getStatus());
			}
		}, {
			enableHighAccuracy: true
		})
	}
	/////////////////////////////////////////////////////////////////
	//初始化定位到当前位置
	/////////////////////////////////////////////////////////////////
	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r) { //html5的getCurrentPosition() API方法
		if(this.getStatus() == BMAP_STATUS_SUCCESS) {
			var mk = new BMap.Marker(r.point);
			myPoint = r.point;
			map.addOverlay(mk);
			map.panTo(r.point);
			map.setZoom(16);
		} else {
			alert('failed' + this.getStatus());
		}
	}, {
		enableHighAccuracy: true
	})

	/////////////////////////////////////////////////////////////////
	//自动提示
	/////////////////////////////////////////////////////////////////
	autoWord("suggestId1", "searchResultPanel");
	autoWord("suggestId2", "searchResultPanel");
	/////////////////////////////////////////////////////////////////
	//查询
	/////////////////////////////////////////////////////////////////
	$(".result").click(function() {
		$('.sel_n .sel_body_name').height(30);
		map.clearOverlays();
		var start = document.getElementById("suggestId1").value;
		var end = document.getElementById("suggestId2").value;
		var routePolicy = [BMAP_TRANSIT_POLICY_LEAST_TIME, BMAP_TRANSIT_POLICY_LEAST_TRANSFER, BMAP_TRANSIT_POLICY_LEAST_WALKING, BMAP_TRANSIT_POLICY_AVOID_SUBWAYS];

		var transit = new BMap.TransitRoute(map, {
			renderOptions: {
				map: map,
				panel: "r-result"
			}
		});



		var i = $("#driving_way select").val();
		search(start, end, routePolicy[i]);

		function search(start, end, route) {
			transit.setPolicy(route);
			if(start != "当前位置"&&end!="当前位置") {
				transit.search(start, end);
			} else {
				if(end != "当前位置") {
					transit.search(myPoint, end);
				} else {
					transit.search(start, myPoint);
				}
			}
		}
	});

	/////////////////////////////////////////////////////////////////
	//自动提示方法
	/////////////////////////////////////////////////////////////////
	function autoWord(id, divclassName) { //传入参数 输入框的id和提示拦的class名
		var ac = new BMap.Autocomplete( //建立一个自动完成的对象
			{
				"input": id,
				"location": map
			});
		ac.addEventListener("onhighlight", function(e) { //鼠标放在下拉列表上的事件
			var str = "";
			var _value = e.fromitem.value;
			var value = "";
			if(e.fromitem.index > -1) {
				value = _value.province + _value.city + _value.district + _value.street + _value.business;
			}
			str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;

			value = "";
			if(e.toitem.index > -1) {
				_value = e.toitem.value;
				value = _value.province + _value.city + _value.district + _value.street + _value.business;
			}
			str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
			G(divclassName).innerHTML = str;
		});

		var myValue;
		ac.addEventListener("onconfirm", function(e) { //鼠标点击下拉列表后的事件
			var _value = e.item.value;
			myValue = _value.province + _value.city + _value.district + _value.street + _value.business;
			G(divclassName).innerHTML = "onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;

			setPlace();
		});

		function setPlace() {
			//					map.clearOverlays(); //清除地图上所有覆盖物
			function myFun() {
				var pp = local.getResults().getPoi(0).point; //获取第一个智能搜索的结果
				map.centerAndZoom(pp, 18);
				map.addOverlay(new BMap.Marker(pp)); //添加标注
			}
			var local = new BMap.LocalSearch(map, { //智能搜索
				onSearchComplete: myFun
			});
			local.search(myValue);
		}
	}

	function G(id) {
		return document.getElementsByClassName(id);
	}
});