$(document).ready(function() {
	var map = new BMap.Map("allmap",{
		enableMapClick: false
	});
	var point = new BMap.Point(116.331398, 39.897445);
	map.centerAndZoom(point, 17);

    map.enableScrollWheelZoom();
	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r) { //html5的getCurrentPosition() API方法
		if(this.getStatus() == BMAP_STATUS_SUCCESS) {
			var mk = new BMap.Marker(r.point);
			map.addOverlay(mk);
			map.panTo(r.point);
			//					alert('您的位置：' + r.point.lng + ',' + r.point.lat);
		} else {
			alert('failed' + this.getStatus());
		}
	}, {
		enableHighAccuracy: true
	})

	var busline = new BMap.BusLineSearch(map, {
		renderOptions: {
			map: map,
			panel: "r-result"
		},
		onGetBusListComplete: function(result) {
			if(result) {
				var fstLine = result.getBusListItem(0); //获取第一个公交列表显示到map上
				busline.getBusLine(fstLine);
			}
		}
	});

	$('#sub').click(function(){
		var busName = document.getElementById("bus").value;
		busline.getBusList(busName);
	})
	
});