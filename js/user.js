$(function(){
	$("#tab").tabs();
	
	verifycode = /^[0-9]{4}$/i;
	
	$('#content').blur(function(){
		$('#checkcontent').text(($(this).val()=="")?"请填写要发送的信息":"");
	});
	
	$("#verifycode").blur(function(){
		$("#checkverifycode").text((!verifycode.test($(this).val()))?"验证码为4位数字":"");
	});
	
	$("#submitbtn").click(function(){
		if($('#content').val()==""){$('#content').blur().focus(); return false;}
		if(!verifycode.test($("#verifycode").val())){$("#verifycode").blur().focus();return false;}
	});
}); 