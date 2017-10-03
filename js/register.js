$(function(){
	
	// check the register form
	
	username = /^[A-Za-z][A-Za-z0-9]{4,11}$/i;
	email = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+)*$/i;
	verifycode = /^[0-9]{4}$/i;
	
	$("#username").blur(function(){
		$("#checkusername").text((!username.test($(this).val()))?"请输入正确的用户名！":"");
	}).change(function(){
		$('#available').val(0);
	});
	$('#checkavailable').click(function(){
		$('#username').blur();
		if(username.test($('#username').val()))
			$.getJSON("?action=check",{username:$('#username').val()},function(data){
					$("#checkusername").text(data.msg);
					$('#available').val(data.code);
				});
	});
	$("#email").blur(function(){
		$("#checkemail").text((!email.test($(this).val()))?"请输入正确的邮件地址！":"");
	});
	$("#password").blur(function(){
		$("#checkpassword").text(($(this).val().length<6)?"密码至少6位":"");
	}).change(function(){
		$("#checkrepasswd").text("请重复以上密码，以避免错误");
	});
	$("#repasswd").blur(function(){
		$("#checkrepasswd").text(($(this).val()!=$("#password").val())?"两次输入的密码不一致，请重试":($(this).val().length<6)?"":"");
	});
	$("#verifycode").blur(function(){
		$("#checkverifycode").text((!verifycode.test($(this).val()))?"验证码为4位数字！":"");
	}); 
	$("#regbtn").click(function(){
		if(!username.test($("#username").val())){$("#username").blur().focus();return false;}
		if($("#available").val()=="0"){$("#checkusername").text("请选检查用户名是否可用");$('#checkavailable').focus();return false;}
		if($("#password").val().length<6){$("#password").blur().focus();return false;}
		if($("#repasswd").val()!=$("#password").val()){$("#repasswd").blur().focus();return false;}
		if(!email.test($("#email").val())){$("#email").blur().focus();return false;}
		if(!$("#accede").attr('checked')){alert("请阅读并同意条款");$("#accede").focus();return false;}
		if(!verifycode.test($("#verifycode").val())){$("#verifycode").blur().focus();return false;}
	});
});