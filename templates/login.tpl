<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
{include file="config.tpl"}
	<title>登录</title>
	<script type="text/javascript" src="js/login.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<form action="?action=check" method="post" class="contentLeft"> 
				<h3>请登录</h3>
				<p>如果您已拥有帐号，请使用已有的帐号信息直接进行登录即可，不需要重复注册。</p> 
				<p id="warning">{$warning}</p>
				<table class="formTable" >
					<tr><th>用户名</th><td><input type="text" name="username" id="username" value="{$form['username']}" maxlength="12"/> 
						<span id="checkusername" class="check"></span></td></tr> 
					<tr><th>密码</th><td><input type="password" name="password" id="password"/> 
						<span id="checkpassword" class="check"></span></td></tr> 
					<tr><th>验证码</th><td><img src="include/verify.php" id="verifyimg" title="刷新" onclick="changecode()"/> 
						<p class="tip">请输入图中的数字和字母</p> 
						<input type="text" name="verifycode" id="verifycode"/> 
						<span id="checkverifycode" class="check"></span></td></tr> 
					<tr><th></th><td><button type="submit" id="loginbtn" class="submit">登录</button></td></tr> 
				</table>
				<h3>没有帐号?</h3>
				<p><a href="register.php">注册</a>成为用户，获得更快速的交互体验！</p> 
			</form>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
{include file="footer.tpl"}
</body>
</html>