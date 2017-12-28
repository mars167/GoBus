$(document).ready(function () {
    var aheigh = $(window).height()-$('#fh5co-footer').height();
  
    $('#allmap').height(aheigh-65);

    var map = new BMap.Map("allmap", {
        enableMapClick: false
    });
    var point = new BMap.Point(116.331398, 39.897445);
    map.centerAndZoom(point, 17);

    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r) {
        if(this.getStatus() == BMAP_STATUS_SUCCESS) {
            var mk = new BMap.Marker(r.point);
            map.addOverlay(mk);
            map.panTo(r.point);
        } else {
            alert('failed' + this.getStatus());
        }
    }, {
        enableHighAccuracy: true
    })

    var top_left_navigation = new BMap.NavigationControl();
    var top_right_navigation = new BMap.NavigationControl({
        anchor: BMAP_ANCHOR_TOP_RIGHT,
        type: BMAP_NAVIGATION_CONTROL_SMALL
    });
    map.addControl(new BMap.NavigationControl());
    map.addControl(new BMap.ScaleControl());
    map.addControl(new BMap.OverviewMapControl());
    map.addControl(new BMap.MapTypeControl());
    map.enableScrollWheelZoom();
    var geolocationControl = new BMap.GeolocationControl();
    geolocationControl.addEventListener("locationSuccess", function(e) {
        // 定位成功事件
        var address = '';
        address += e.addressComponent.province;
        address += e.addressComponent.city;
        address += e.addressComponent.district;
        address += e.addressComponent.street;
        address += e.addressComponent.streetNumber;
        document.getElementById("suggestId1").value = address;
    });
    geolocationControl.addEventListener("locationError", function(e) {
        // 定位失败事件
        alert(e.message);
    });
    map.addControl(geolocationControl);



});