$(function(){
	$("#accordion").accordion();
	if (!($.browser.msie && $.browser.version == "6.0"))
		$('#datepicker').datepicker({dateFormat: 'yy-mm-dd'});
	
	$('#submitbtn').click(function(){
		if(markers.length){
			var mapdata = "POLYGON((";
			for(var i=0; i<=markers.length; i++){
				var marker = markers[i%markers.length];
				mapdata += marker.getPosition().toUrlValue().split(',').join(' ');
				if(i<markers.length) mapdata +=",";
			}
			mapdata += "))";
		}else{
			mapdata = "";
		}
		$('#mapdata').val(mapdata);
	});
});

function initmap(div) {
	
	var mapOptions = { 
		zoom: 16,
		center: tkk,
		mapTypeControl: false,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	
	map = new google.maps.Map(document.getElementById(div), mapOptions);
	
	var ControlDiv = document.createElement('DIV');
	new Control(ControlDiv, "清空标记", clearMarkers);
	map.controls[google.maps.ControlPosition.TOP_RIGHT].push(ControlDiv);

	poly = new google.maps.Polygon(polyOptions);
	poly.setMap(map);
	
	google.maps.event.addListener(poly, 'click', addPolygonLatLng);
	google.maps.event.addListener(map, 'click', addPolygonLatLng);
}


window.onload = function(){
	initmap("post_map_canvas");
}