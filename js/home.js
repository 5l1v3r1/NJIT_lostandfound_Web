$(function(){
	$("#post").tabs();
	
	email = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+)*$/i;
	verifycode = /^[0-9]{4}$/i;
	
	$("#username").blur(function(){
		$("#checkusername").text(($(this).val()=="")?"请输入你的名字":"");
	});
	
	$("#email").blur(function(){
		$("#checkemail").text((!email.test($(this).val()))?"请输入正确的邮件地址":"");
	});
	
	$('#content').blur(function(){
		$('#checkcontent').text(($(this).val()=="")?"请填写要发送的信息":"");
	});
	
	$("#verifycode").blur(function(){
		$("#checkverifycode").text((!verifycode.test($(this).val()))?"验证码为4位数字":"");
	});
	
	$("#submitbtn").click(function(){
		if($('#username').val()==""){$("#username").blur().focus();return false;}
		if(!email.test($("#email").val())){$("#email").blur().focus();return false;}
		if($('#content').val()==""){$('#content').blur().focus(); return false;}
		if(!verifycode.test($("#verifycode").val())){$("#verifycode").blur().focus();return false;}
	}); 
});