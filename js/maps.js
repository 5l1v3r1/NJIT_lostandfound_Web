/* google map */

var map;
var tkk = new google.maps.LatLng(31.9242152962,118.8793309641);
var poly;
var polyOptions = {
	strokeColor: "#FFFF00",
	strokeOpacity: 0.5,
	strokeWeight: 2,
	fillColor: "#FFFF00",
	fillOpacity: 0.35
};
var marker;
var markers = new Array();
var mapdatas = new Array();
var infoWindow = new google.maps.InfoWindow();

/* 绘制区域添加点 */
function addPolygonLatLng(event) {
	
	// poly,全局变量, 存放地图上的区域边界
	var vertices = poly.getPath();
	
	var marker = new google.maps.Marker({
		id: vertices.getLength(),	// 记录编号, 便于删除
		position: event.latLng,
		draggable: true,
		map: map
	});
	
	vertices.push(event.latLng);
		 
	google.maps.event.addListener(marker, 'dragend', changeMarker);
	google.maps.event.addListener(marker, 'dblclick', removeMarker);
	
	// markers, 全局数组, 存放单个标记 
	markers.push(marker);
}

/* 清空标记, marker dblclick */
function removeMarker(event){
	var vertices = poly.getPath();
	var index = this.id;
	vertices.removeAt(index);
	markers.splice(index, 1);
	for(var i=index; i<markers.length; i++){
		markers[i].id = i;
		markers[i].setPosition(vertices.getAt(i))
	}
	this.setMap(null);
}

/* 修改区域边界位置 marker dragend */
function changeMarker(event){
	var vertices = poly.getPath();
	var index = this.id;
	vertices.setAt(index, event.latLng);
}

function clearMarkers(event){
	poly.setMap(null);
	for(i in markers) markers[i].setMap(null);
	markers.length = 0;
	poly = new google.maps.Polygon(polyOptions);
	poly.setMap(map);
	google.maps.event.addListener(poly, 'click', addPolygonLatLng);
}

function showHome(event){
	map.panTo(tkk);
}

function Control(controlDiv, title, handler) {
	
	controlDiv.style.padding = '5px';

	var controlUI = document.createElement('DIV');
	controlUI.style.backgroundColor = 'white';
	controlUI.style.borderStyle = 'solid';
	controlUI.style.borderWidth = '2px';
	controlUI.style.cursor = 'pointer';
	controlUI.style.textAlign = 'center';
	//controlUI.title = '';
	controlDiv.appendChild(controlUI);

	// Set CSS for the control interior
	var controlText = document.createElement('DIV');
	controlText.style.fontFamily = 'Arial,sans-serif';
	controlText.style.fontSize = '12px';
	controlText.style.paddingLeft = '4px';
	controlText.style.paddingRight = '4px';
	controlText.innerHTML = title;
	controlUI.appendChild(controlText);
	
	google.maps.event.addDomListener(controlUI, 'click', handler);
}

function showItem(){
	for(index in items){
		var item = items[index]; 
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(item['lat'], item['lng']),
			title: item['name'],
			map: map,
			id: item['id']
		});
		google.maps.event.addListener(marker, 'click', showInfo);
		google.maps.event.addListener(marker, 'dblclick', openItem);
	}
}

function openItem(id){
	window.location.href = "found.php?id="+this.id;	
}

function showInfo(event){
	var contentString = this.title+"，<a href='"+this.type+".php?id="+this.id+"'>查看>></a>";
	infoWindow.setContent(contentString);
	if(this.getPosition)
		infoWindow.setPosition(this.getPosition());
	else infoWindow.setPosition(event.latLng);
	infoWindow.open(map);
}

function hideInfo(){
	infoWindow.close();
}

//function addMarksFromMysql(mapdatas){
//	for(var item in mapdatas)
//	{
//		var itemstr = mapdatas[item][0];
//		var itemreg = /(POINT|POLYGON)\(+(\d.+\d)\)+/g;
//		var result = itemreg.exec(itemstr);
//		switch(result[1]){
//		case 'POINT':
//			// POINT(x y)
//			var point = result[2].split(" ");
//			var marker = new google.maps.Marker({
//				position: new google.maps.LatLng(point[0], point[1]),
//				title: mapdatas[item][2],
//				map: map
//			});
//			map.panTo(marker.getPosition());
//			break;
//		case 'POLYGON':
//			// POLYGON((x1 y1,x2 y2))
//			var points = result[2].split(",");
//			var poly = new google.maps.Polygon(polyOptions);
//			var vertices = poly.getPath();
//			
//			for(var i in points){
//				var point = points[i].split(" ");
//				vertices.push(new google.maps.LatLng(point[0], point[1]));
//			}
//
//			poly.setMap(map);
//			
//			break;
//		}
//	}
//}
function addMarks(mapdatas){
	for(var item in mapdatas)
	{
		var itemstr = mapdatas[item][0];
		var itemreg = /(POINT|POLYGON)\(+(\d.+\d)\)+/g;
		var result = itemreg.exec(itemstr);
		var editable = mapdatas[item][3]?true:false;

		switch(result[1]){
		case 'POINT':
			// POINT(x y)
			var point = result[2].split(" ");
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(point[0], point[1]),
				type: 'found',
				title: mapdatas[item][2],
				id: mapdatas[item][1],
				draggable: editable,
				map: map
			});
			markers.push(marker);
			google.maps.event.addListener(marker, "click", showInfo);
			google.maps.event.addListener(marker, "dblclick", openItem);
			// map.panTo(marker.getPosition());
			break;
		case 'POLYGON':
			// POLYGON((x1 y1,x2 y2))
			var points = result[2].split(",");
			poly = new google.maps.Polygon({
				strokeColor: "#FFFF00",
				strokeOpacity: 0.5,
				strokeWeight: 2,
				fillColor: "#FFFF00",
				fillOpacity: 0.2,
				type: 'lost',
				title: mapdatas[item][2],
				id: mapdatas[item][1],
				zIndex: item
			});
			
			if(editable){
				for(var i=0; i<points.length-1; i++){
					var point = points[i].split(" ");
					addPolygonLatLng({latLng: new google.maps.LatLng(point[0], point[1])});
				}
			}else{
				var vertices = poly.getPath();
				
				for(var i in points){
					var point = points[i].split(" ");
					vertices.push(new google.maps.LatLng(point[0], point[1]));
				}
			}
			poly.setMap(map);
			google.maps.event.addListener(poly, "click", showInfo);
			break;
		}
	}
}

function getPloygonCenter(ploygon){
	var vertices = ploygon.getPath();
	var Lat=0,Lng=0;
	var n = vertices.getLength();
	
	for(var i=0; i<n; i++){
		Lat+=vertices.getAt(i).lat();
		Lng+=vertices.getAt(i).lng();
	}
	
	if(n){
		return new google.maps.LatLng(Lat/n, Lng/n);
	}else{
		return null;
	}
}