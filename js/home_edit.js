$(function(){
	$('#accordion').accordion();
		
	$("#nickname").blur(function(){
		$("#checknickname").text(($(this).val()=="")?"请输入您的昵称":"");
	});
	
	$("#submitbtn").click(function(){
		if($("#nickname").val()==""){$("#nickname").blur().focus();return false;}
	});
}); 