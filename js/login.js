$(function(){
	$('#username').focus();

	verifycode = /^[0-9]{4}$/i;
	
	$('#username').blur(function(){
		$("#checkusername").text(($(this).val()=="")?"请输入用户名":"");
	});
	$('#password').blur(function(){
		$("#checkpassword").text(($(this).val()=="")?"请输入密码":"");
	});
	$('#verifycode').blur(function(){
		$('#checkverifycode').text((!verifycode.test($(this).val()))?"验证码为4位数字":"");
	});
	$('#loginbtn').click(function(){
		if($('#username').val()==""){$('#username').blur().focus(); return false;}
		if($('#password').val()==""){$('#password').blur().focus(); return false;}
		if(!verifycode.test($('#verifycode').val())){$('#verifycode').blur().focus(); return false;}
	});
}); 