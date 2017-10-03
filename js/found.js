$(function(){
	$("#nav-found").addClass("now");
	$("#post").tabs();
});

function initmap(div) {
	var mapOptions = {
		zoom: 16,
		center: tkk,
		mapTypeControl: false,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	
	map = new google.maps.Map(document.getElementById(div), mapOptions);
	
	addMarks(mapdatas);
	
	google.maps.event.addListener(map, 'click', hideInfo);
}

window.onload = function(){
	initmap("items_map_canvas");
} 