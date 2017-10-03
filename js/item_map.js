function initmap(div) {
	
	map = new google.maps.Map(document.getElementById(div), {
		zoom: 16,
		center: tkk,
		mapTypeControl: false,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	});
	
	addMarks(mapdatas);
	
	try{
		map.panTo(getPloygonCenter(poly));
	}catch(e){
		map.panTo(markers[0].getPosition());
	}
}

window.onload = function(){
	initmap("item_map_canvas");
}

 