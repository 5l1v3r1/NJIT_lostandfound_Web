$(function(){
	$('#accordion').accordion({autoHeight: false});
	
	if (!($.browser.msie && $.browser.version == "6.0"))
		$('#datepicker').datepicker({dateFormat: 'yy-mm-dd', maxDate: 0});
	
	verifycode = /^[0-9]{4}$/i;
	
	$('#what').blur(function(){
		$('#checkwhat').text(($(this).val()=="")?"请输入物品名称":"");
	});
	$('#datepicker').change(function(){
		$('#checkdate').text(($(this).val()=="")?"请输入日期":"");
	});
	$('input[name=maptype]').click(function(){
		$('#checkmap').text("");
	});
	$('#imagefile').change(function(){
		var file = $(this).val().split(".");
		var ext = file[file.length-1];
		switch(ext){
		case "jpeg":
		case "jpg":
		case "gif":
		case "png":
		case "": 
			$('#checkfile').text("");
			break;
		default:
			$('#checkfile').text("文件格式不正确，请重新选择");
		}
	});
	$('#detail').blur(function(){
		$('#checkdetail').text(($(this).val()=="")?"请描述下与物品有关的信息":"");
	});
	$('input[name=usertype]').change(function(){
		if($(this).val()=="0")
			$('#guestinfo').show();
		else
			$('#guestinfo').hide();
	});
	$('#guest').blur(function(){
		$('#checkguest').text(($(this).val()=="")?"请输入您的称呼":"");
	});
	$('#contact').blur(function(){
		$('#checkcontact').text(($(this).val()=="")?"请输入您的联系方式":"");
	});
	$('#editcode').blur(function(){
		$('#checkeditcode').text(($(this).val().length<6)?"请输一个合适的修改码":"");
	});
	$("#verifycode").blur(function(){
		$("#checkverifycode").text((!verifycode.test($(this).val()))?"验证码为4位数字":"");
	});
	
	function checkmap(){
		var usemap = $('#usemap').attr("checked");
		if($('#building').val()=="null" && !usemap){
			$('#checkmap').text("请选择具体的位置");
			return false;
		}
		if(usemap){
			if(markers.length<3){
				$('#checkmap').text("请在地图上标出区域（至少三个顶点）");
				return false;
			}
		}
		$('#checkmap').text("");
		return true;
	}
	
	function checkform(){
		if($('#what').val()==""){$('#what').blur().focus(); return false;}
		if($('#datepicker').val()==""){$('#datepicker').change().focus(); return false;}
		if(!checkmap()){$('#building').focus(); return false;}
		var file = $('#imagefile').val().split(".");
		var ext = file[file.length-1];
		switch(ext){
			case "jpeg":
			case "jpg":
			case "gif":
			case "png":
			case "":
				break;
			default:
				$('#imagefile').focus();
				return false;
		}
		if($('#detail').val()==""){$('#detail').blur().focus(); return false;}
		return true;
	}
	function checkuser(){
		if($('input[name=usertype]:checked').val()=="0"){	// 临时用户
			if($('#guest').val()==""){$('#guest').blur().focus(); return false;}
			if($('#contact').val()==""){$('#contact').blur().focus(); return false;}
			if($('#editcode').val().length<6){$('#editcode').blur().focus(); return false;}
		}
		return true;
	}
	
	$('#step2').click(function(){
		return checkform();
	});
	
	$('#step3').click(function(){
		if(!checkform()) return false;
		if(!checkuser()) return false;
	});
	
	$('#accordion').bind("accordionchangestart", function(event, ui){
		if(!checkform()){$('#checkform').text("物品信息不正确，请检查"); return false;}
		if(!checkuser()){$('#checkform').text("联系信息不正确，请检查"); return false;}
		$('#checkform').text("现在可以提交啦！");		
	});
	
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
		if(!checkuser()) return false;
	});
});

/* google map */

var map = null;
var poly = null;
var polyOptions = {
	strokeColor: "#FFFF00",
	strokeOpacity: 0.8,
	strokeWeight: 2,
	fillColor: "#FFFF00",
	fillOpacity: 0.35
};

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
	
	google.maps.event.addListener(poly, 'click', addPolygonLatLng);
	google.maps.event.addListener(map, 'click', addPolygonLatLng);
}


window.onload = function(){
	initmap("post_map_canvas");
}