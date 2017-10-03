<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 06:52:58
         compiled from ".\templates\home_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2251958e6483a1fd159-96096650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49f2b6a21445d1287c7ba0dd390113469f54f5e9' => 
    array (
      0 => '.\\templates\\home_edit.tpl',
      1 => 1490457122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2251958e6483a1fd159-96096650',
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
	<title>个人中心</title>
	<script typ="text/javascript" src="js/home_edit.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="accordion">
					<h3><a href="#" id="step1">编辑您的联系信息</a></h3>
					<div>
						<form action="?action=update" method="post">
							<p id="warning"><?php echo $_smarty_tpl->getVariable('msg')->value;?>
</p>
							<p>* 标记的为必填项</p>
							<table class="formTable">
								<tr><th>* 昵称</th><td><input type="text" name="nickname" id="nickname" value="<?php echo $_smarty_tpl->getVariable('profile')->value['nickname'];?>
"/>
									<span class="check" id="checknickname"></span></td></tr>
								<tr><th>常用邮箱</th><td><input type="text" name="email" id="email" value="<?php echo $_smarty_tpl->getVariable('profile')->value['email'];?>
"/></td></tr>
								<tr><th>QQ</th><td><input type="text" name="qq" id="qq" value="<?php echo $_smarty_tpl->getVariable('profile')->value['qq'];?>
"/></td></tr>
								<tr><th>MSN</th><td><input type="text" name="msn" id="msn" value="<?php echo $_smarty_tpl->getVariable('profile')->value['msn'];?>
"/></td></tr>
								<tr><th>Gtalk</th><td><input type="text" name="gtalk" id="gtalk" value="<?php echo $_smarty_tpl->getVariable('profile')->value['gtalk'];?>
"/></td></tr>
								<tr><th>手机</th><td><input type="text" name="phone" id="phone" value="<?php echo $_smarty_tpl->getVariable('profile')->value['phone'];?>
"/><label><input type="checkbox" class="checkbox" name="hide" id="hide" value="1"/>只有注册用户可见</label>
									<p class="check" id="checkphone"></p>
									</td></tr>
								<tr><th>个性签名</th><td><textarea name="signature" id="signature"><?php echo $_smarty_tpl->getVariable('profile')->value['signature'];?>
</textarea></td></tr>
								<tr><th></th><td><button type="submit" class="submit" id="submitbtn">编辑</button></td></tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<?php if ($_smarty_tpl->getVariable('profile')->value){?><script>
				var hide = "<?php echo $_smarty_tpl->getVariable('profile')->value['hide'];?>
";
				$(function(){
					if(hide) $('#hide').attr("checked", 1);
				});
			</script><?php }?>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>