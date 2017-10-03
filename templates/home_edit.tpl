<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
{include file="config.tpl"}
	<title>个人中心</title>
	<script typ="text/javascript" src="js/home_edit.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="accordion">
					<h3><a href="#" id="step1">编辑您的联系信息</a></h3>
					<div>
						<form action="?action=update" method="post">
							<p id="warning">{$msg}</p>
							<p>* 标记的为必填项</p>
							<table class="formTable">
								<tr><th>* 昵称</th><td><input type="text" name="nickname" id="nickname" value="{$profile['nickname']}"/>
									<span class="check" id="checknickname"></span></td></tr>
								<tr><th>常用邮箱</th><td><input type="text" name="email" id="email" value="{$profile['email']}"/></td></tr>
								<tr><th>QQ</th><td><input type="text" name="qq" id="qq" value="{$profile['qq']}"/></td></tr>
								<tr><th>MSN</th><td><input type="text" name="msn" id="msn" value="{$profile['msn']}"/></td></tr>
								<tr><th>Gtalk</th><td><input type="text" name="gtalk" id="gtalk" value="{$profile['gtalk']}"/></td></tr>
								<tr><th>手机</th><td><input type="text" name="phone" id="phone" value="{$profile['phone']}"/><label><input type="checkbox" class="checkbox" name="hide" id="hide" value="1"/>只有注册用户可见</label>
									<p class="check" id="checkphone"></p>
									</td></tr>
								<tr><th>个性签名</th><td><textarea name="signature" id="signature">{$profile['signature']}</textarea></td></tr>
								<tr><th></th><td><button type="submit" class="submit" id="submitbtn">编辑</button></td></tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			{if $profile}<script>
				var hide = "{$profile['hide']}";
				{literal}$(function(){
					if(hide) $('#hide').attr("checked", 1);
				});{/literal}
			</script>{/if}
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
{include file="footer.tpl"}
</body>
</html>