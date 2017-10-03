$(function(){
	$('#nav-index').addClass("now");
	$('#enter').tabs();
	$('#enter').tabs("rotate" , 3000);
});

/* google map */

function initmap(div) {
	
	var mapOptions = {
		zoom: 16,
		center: tkk,
		mapTypeControl: false,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	
	map = new google.maps.Map(document.getElementById(div), mapOptions);
	
	var ControlDiv = document.createElement('DIV');
	new Control(ControlDiv, "默认视图", showHome);
	map.controls[google.maps.ControlPosition.TOP_RIGHT].push(ControlDiv);
	
	infowindow = new google.maps.InfoWindow();
	
	$(function(){
		$.get("include/mapdata.php",{type:"both"},function(data){
			$(data).find("data > item").each(function(){ 
				var item = [$(this).text(),$(this).attr("id"),$(this).attr("name")];
				mapdatas.push(item);
			});	
			addMarks(mapdatas); 
		});
	});
}

window.onload = function(){
	initmap("index_map_canvas");
}