$(function(){
	$('#accordion').accordion();
	
	if (!($.browser.msie && $.browser.version == "6.0"))
		$('#datepicker').datepicker({dateFormat: 'yy-mm-dd', maxDate: 0});
	
	$('#what').blur(function(){
		$('#checkwhat').text(($(this).val()=="")?"请输入物品名称":"");
	});
	$('#datepicker').change(function(){
		$('#checkwhen').text(($(this).val()=="")?"请输入日期":"");
	});
	$('#detail').blur(function(){
		$('#checkdetail').text(($(this).val()=="")?"请描述下与物品有关的信息":"");
	});
	
	function checkmap(){
		var usemap = $('#usemap').attr("checked");
		if(usemap && markers.length<3){
				$('#checkmap').text("请在地图上标出区域（至少三个顶点）");
				return false;
		}
		$('#checkmap').text("");
		return true;
	}
	
	function checkform(){
		if($('#what').val()==""){$('#what').blur().focus(); return false;}
		if($('#datepicker').val()==""){$('#datepicker').change().focus(); return false;}
		if(!checkmap()){$('#usemap').focus(); return false;}
		if($('#detail').val()==""){$('#detail').blur().focus(); return false;}
		return true;
	}
	 
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
		if(!verifycode.test($("#verifycode").val())){$("#verifycode").blur().focus(); return false;}
		if(!checkform()) return false;
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
	
	addMarks(mapdatas);
	
	if(getPloygonCenter(poly)) map.panTo(getPloygonCenter(poly));
	
	google.maps.event.addListener(poly, 'click', addPolygonLatLng);
	google.maps.event.addListener(map, 'click', addPolygonLatLng);
}


window.onload = function(){
	initmap("post_map_canvas");
}
