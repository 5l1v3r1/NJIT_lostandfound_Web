<?php /* Smarty version Smarty-3.0.6, created on 2017-04-02 16:11:48
         compiled from ".\templates\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2680158e122c4b679a1-23624480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89d1e5891599f8ad2f3de50c07ac5ae3329ee7a8' => 
    array (
      0 => '.\\templates\\user.tpl',
      1 => 1490457226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2680158e122c4b679a1-23624480',
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
	<title>用户信息</title>
	<script typ="text/javascript" src="js/user.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="tab">
					<ul><li><a href="#tabs-1">个性签名</a></li>
					<li><a href="#tabs-2">给TA留言</a></li></ul>
					<div id="tabs-1">
						<p><?php echo (($tmp = @$_smarty_tpl->getVariable('profile')->value['signature'])===null||$tmp==='' ? "暂时没有个性签名" : $tmp);?>
</p>
					</div>
					<div id="tabs-2">
					<?php if ($_smarty_tpl->getVariable('login')->value){?>
					<form action="message.php?action=send" method="post">
							<input type="hidden" name="to" value="<?php echo $_smarty_tpl->getVariable('user')->value['id'];?>
"/>
							<table class="formTable">
								<tr><th>* 留言内容</th><td><textarea name="content" id="content" maxlength="255"></textarea>
										<p class="check" id="checkcontent"></p></td></tr>
								<tr><th>* 验证码</th><td><img src="include/verify.php" id="verifyimg" title="刷新" onclick="changecode()"/>
									<p class="tip">请输入图中的数字</p>
									<input type="text" name="verifycode" id="verifycode"/>
									<span id="checkverifycode" class="check"></span></td></tr>
								<tr><th></th><td><button type="submit" class="submit" id="submitbtn">留言</button></td></tr>
							</table>
						</form><?php }else{ ?>
						<p>您尚未登录，无法使用此功能</p>
						<?php }?></div>
				</div>
			</div>
			<div class="contentRight">
				<h3>用户信息</h3>
				<?php if ($_smarty_tpl->getVariable('profile')->value){?>
				<ul id="contact">
					<li><span>昵称</span><?php echo $_smarty_tpl->getVariable('profile')->value['nickname'];?>
</li>
					<li><span>邮箱</span><?php echo (($tmp = @$_smarty_tpl->getVariable('profile')->value['email'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
					<li><span>QQ</span><?php echo (($tmp = @$_smarty_tpl->getVariable('profile')->value['qq'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
					<li><span>MSN</span><?php echo (($tmp = @$_smarty_tpl->getVariable('profile')->value['msn'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
					<li><span>GTALK</span><?php echo (($tmp = @$_smarty_tpl->getVariable('profile')->value['gtalk'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
					<li><span>手机</span><?php if (!$_smarty_tpl->getVariable('profile')->value["hide"]||$_smarty_tpl->getVariable('login')->value){?><?php echo (($tmp = @$_smarty_tpl->getVariable('profile')->value['phone'])===null||$tmp==='' ? "-" : $tmp);?>
<?php }else{ ?>只对注册用户显示<?php }?></li>
				</ul>
				<?php }else{ ?><p>尚未填写联系信息</p><?php }?>				
			</div>
			<div class="contentLeft">
				<div id="listbox">
					<h3>发布的物品信息</h3>
					<!-- item-list -->
					<ul id="itemlist">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?><li class="item">
						<?php if ($_smarty_tpl->tpl_vars['item']->value['where']!="#"){?>在 <a href="search.php?where=<?php echo $_smarty_tpl->tpl_vars['item']->value['where'];?>
" class="where"><?php echo $_smarty_tpl->tpl_vars['item']->value['where'];?>
</a> <?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['type']){?>捡到了<?php }else{ ?>丢失了<?php }?> <a href="<?php if ($_smarty_tpl->tpl_vars['item']->value['type']){?>found<?php }else{ ?>lost<?php }?>.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['what'];?>
</a> “<?php echo $_smarty_tpl->tpl_vars['item']->value['detail'];?>
”
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['posttime'];?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value['tag']){?>标签[<a href="?tag=<?php echo $_smarty_tpl->tpl_vars['item']->value['tag'];?>
" class="tag"><?php echo $_smarty_tpl->tpl_vars['item']->value['tag'];?>
</a>]<?php }?></p></li>
					<?php }} else { ?>
					<li><p>尚未发布任何信息！</p></li>
					<?php } ?></ul>
					<div id="pagenav"><?php echo $_smarty_tpl->getVariable('pagenav')->value;?>
</div>
				</div>
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>