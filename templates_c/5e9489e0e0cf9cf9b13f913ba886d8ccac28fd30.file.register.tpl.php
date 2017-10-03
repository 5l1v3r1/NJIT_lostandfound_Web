<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 03:51:51
         compiled from ".\templates\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2795758e61dc71e9f47-61475958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e9489e0e0cf9cf9b13f913ba886d8ccac28fd30' => 
    array (
      0 => '.\\templates\\register.tpl',
      1 => 1491475908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2795758e61dc71e9f47-61475958',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
<?php $_template = new Smarty_Internal_Template("config.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<title>注册</title>
	<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<form action="?action=post" method="post" class="contentLeft">
				<h3>快速注册</h3>
				<p>注册成为用户，获得更快速的交互体验！</p>
				<p id="warning"><?php echo $_smarty_tpl->getVariable('warning')->value;?>
</p>
				<table class="formTable" >
					<tr><th>用户名</th><td><input type="text" name="username" id="username" value="<?php echo $_smarty_tpl->getVariable('form')->value['username'];?>
" maxlength="12"/>
						<span id="checkusername" class="check"></span>
						<p class="tip">可以是字母和数字，至少5位，必须以字母开关，不区分大小写。</p>
						<button type="button" name="checkavailable" id="checkavailable">检查用户是否可用</button>
						<input type="hidden" name="available" id="available" value="0"/></td></tr>
					<tr><th>密码</th><td><input type="password" name="password" id="password"/>
						<span id="checkpassword" class="check"></span></td></tr>
					<tr><th>确认密码</th><td><input type="password" id="repasswd"/>
						<span id="checkrepasswd" class="check"></span></td></tr>
					<tr><th>邮箱</th><td><input type="text" name="email" id="email" value="<?php echo $_smarty_tpl->getVariable('form')->value['email'];?>
"/>
						<span id="checkemail" class="check"></span>
						<p class="tip">请准确填写邮箱，忘记密码时会发送邮件到该邮箱。</p></td></tr>
					<tr><th>服务条款</th><td><div id="rule" overflow="auto">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;尊敬的用户，欢迎您注册成为本网站用户。在注册

前请您仔细阅读如下服务条款：本服务协议双方为本网站与本网站用户，本服务协议具有合

同效力。您确认本服务协议后，本服务协议即在您和本网站之间产生法律效力。请您务必在

注册之前认真阅读全部服务协议内容，如有任何疑问，可向本网站咨询。无论您事实上是否

在注册之前认真阅读了本服务协议，只要您点击协议正本下方的"同意"钮并按照本网站注册

程序成功注册为用户，您的行为仍然表示您同意并签署了本服务协议。<br><br>1.本网站服

务条款的确认和接纳本网站各项服务的所有权和运作权归本网站拥有。<br><br>2.用户必须

：<br>(1)自行配备上网的所需设备，包括个人电脑、调制解调器或其他必备上网装置。

<br>(2)自行负担个人上网所支付的与此服务有关的电话费用、网络费用<br><br>3.用户在

本网站上交易平台上不得发布下列违法信息：<br>(1)反对宪法所确定的基本原则的；<br>
(2)危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；<br>(3)损害国家荣誉

和利益的；<br>(4)煽动民族仇恨、民族歧视，破坏民族团结的；<br>(5)破坏国家宗教政策

，宣扬邪教和封建迷信的；<br>(6)散布谣言，扰乱社会秩序，破坏社会稳定的；<br>(7)散

布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；<br>(8)侮辱或者诽谤他人，侵

害他人合法权益的；<br>(9)含有法律、行政法规禁止的其他内容的。<br><br>4.有关个人

资料用户同意<br>(1)提供及时、详尽及准确的个人资料。<br>(2)同意接收来自本网站的信

息。<br>(3)不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用

为注册资料。<br>(4)本网站不公开用户的姓名、地址、电子邮箱和笔名，以下情况除外：

<br>(a)用户授权本网站透露这些信息。<br>(b)相应的法律及程序要求本网站提供用户的个

人资料。如果用户提供的资料包含有不正确的信息，本网站保留结束用户使用本网站信息服

务资格的权利。<br>&nbsp;<wbr><br>5.用户在注册时应当选择稳定性及安全性相对较好的

电子邮箱，并且同意接受并阅读本网站发往用户的各类电子邮件。如用户未及时从自己的电

子邮箱接受电子邮件或因用户电子邮箱或用户电子邮件接收及阅读程序本身的问题使电子邮

件无法正常接收或阅读的，只要本网站成功发送了电子邮件，应当视为用户已经接收到相关

的电子邮件。电子邮件在发信服务器上所记录的发出时间视为送达时间。<br><br>6.服务条

款的修改<br>本网站有权在必要时修改服务条款，本网站服务条款一旦发生变动，将会在重

要页面上提示修改内容。如果不同意所改动的内容，用户可以主动取消获得的本网站信息服

务。如果用户继续享用本网站信息服务，则视为接受服务条款的变动。本网站保留随时修改

或中断服务而不需通知用户的权利。本网站行使修改或中断服务的权利，不需对用户或第三

方负责。<br><br>7.用户隐私制度<br>尊重用户个人隐私是本网站的一项基本政策。所以，

本网站一定不会在未经合法用户授权时公开、编辑或透露其注册资料及保存在本网站中的非

公开内容，除非有法律许可要求或本网站在诚信的基础上认为透露这些信息在以下四种情况

是必要的：<br>(1)遵守有关法律规定，遵从本网站合法服务程序。<br>(2)保持维护本网站

的商标所有权。<br>(3)在紧急情况下竭力维护用户个人和社会大众的隐私安全。<br>(4)符

合其他相关的要求。本网站保留发布会员人口分析资询的权利。<br><br>8.用户的帐号、密

码和安全性<br>你一旦注册成功成为用户，你将得到一个密码和帐号。如果你不保管好自己

的帐号和密码安全，将负部责任。另外，每个用户都要对其帐户中的所有活动和事件负全责

。你可随时根据指示改变你的密码，也可以结束旧的帐户重开一个新帐户。用户同意若发现

任何非法使用用户帐号或安全漏洞的情况，请立即通告本网站。<br><br>9.拒绝提供担保

<br>用户明确同意信息服务的使用由用户个人承担风险。本网站不担保服务不会受中断，对

服务的及时性，安全性，出错发生都不作担保，但会在能力范围内，避免出错。

<br><br>10.有限责任<br>本网站对任何直接、间接、偶然、特殊及继起的损害不负责任，

这些损害来自：不正当使用本网站服务，或用户传送的信息不符合规定等。这些行为都有可

能导致本网站形象受损，所以本网站事先提出这种损害的可能性，同时会尽量避免这种损害

的发生。<br><br>11.信息的储存及限制<br>
本网站有判定用户的行为是否符合本网站服务条款的要求和精神的权利，如果用户违背本网

站服务条款的规定，本网站有权中断其服务的帐号。<br><br>12.用户管理<br>
用户必须遵循：<br>(1.使用信息服务不作非法用途。<br>(2)不干扰或混乱网络服务。

<br>(3)遵守所有使用服务的网络协议、规定、程序和惯例。用户的行为准则是以因特网法

规，政策、程序和惯例为根据的。<br><br>13.保障<br>
用户同意保障和维护本网站全体成员的利益，负责支付由用户使用超出服务范围引起的律师

费用，违反服务条款的损害补偿费用，其它人使用用户的电脑、帐号和其它知识产权的追索

费。<br><br>14.结束服务<br>
用户或本网站可随时根据实际情况中断一项或多项服务。本网站不需对任何个人或第三方负

责而随时中断服务。用户若反对任何服务条款的建议或对后来的条款修改有异议，或对本网

站服务不满，用户可以行使如下权利：<br>(1)不再使用本网站信息服务。<br>(2)通知本网

站停止对该用户的服务。结束用户服务后，用户使用本网站服务的权利马上中止。从那时起

，用户没有权利，本网站也没有义务传送任何未处理的信息或未完成的服务给用户或第三方

。<br><br>15.通告<br>
所有发给用户的通告都可通过重要页面的公告或电子邮件或常规的信件传送。服务条款的修

改、服务变更、或其它重要事件的通告都会以此形式进行。<br><br>16.信息内容的所有权

<br>本网站定义的信息内容包括：文字、软件、声音、相片、录象、图表；在广告中全部内

容；本网站为用户提供的其它信息。所有这些内容受版权、商标、标签和其它财产所有权法

律的保护。所以，用户只能在本网站和广告商授权下才能使用这些内容，而不能擅自复制、

再造这些内容、或创造与内容有关的派生产品。<br>&nbsp;<wbr><br>17.法律<br>
本网站信息服务条款要与中华人民共和国的法律解释一致。用户和本网站一致同意服从本网

站所在地有管辖权的法院管辖。如发生本网站服务条款与中华人民共和国法律相抵触时，则

这些条款将完全按法律规定重新解释，而其它条款则依旧保持对用户的约束力。

<br>&nbsp;<wbr>		
					</div><label><input type="checkbox" id="accede"/>我已阅读并同意以上服务条款</label></td></tr>
					<tr><th>验证码</th><td><img src="include/verify.php" id="verifyimg" title="刷新" onclick="changecode()"/>
						<p class="tip">请输入图中的数字</p>
						<input type="text" name="verifycode" id="verifycode"/>
						<span id="checkverifycode" class="check"></span></td></tr>
					<tr><th></th><td><button type="submit" id="regbtn" class="submit">马上注册</button></td></tr>
				</table>
				<h3>已经拥有帐号？</h3>
				<p>如果您已拥有帐号，请使用已有的帐号信息直接进行<a href="login.php">登录</a>即可，不需要重复注册。</p>
			</form>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>