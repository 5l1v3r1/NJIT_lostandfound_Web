<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 07:23:31
         compiled from ".\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2850458e122806ec444-93579623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97d060df136bc68287855ad0037b446ebb85b73d' => 
    array (
      0 => '.\\templates\\home.tpl',
      1 => 1490457151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2850458e122806ec444-93579623',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\websoft9\wampstack-5.5.35-1\apache2\htdocs\include\smarty\plugins\modifier.truncate.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
<?php $_template = new Smarty_Internal_Template("config.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<title>个人中心</title>
	<script typ="text/javascript" src="js/home.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="post">
					<ul><li><a href="#tabs-1">个人中心</a></li>
					<li><a href="#tabs-2">短信箱<?php if ($_smarty_tpl->getVariable('messages')->value){?>(<?php echo count($_smarty_tpl->getVariable('messages')->value);?>
)<?php }?></a></li></ul>
					<div id="tabs-1">
						
					</div>
					<div id="tabs-2">
						<ul id="msglist">
						
						<?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('messages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value){
?>
							<li class="msg">
							<span>内容</span> “<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['msg']->value['content'],35,"...");?>
”
							<p><?php echo $_smarty_tpl->tpl_vars['msg']->value['posttime'];?>
</p>
							</li>
						<?php }} else { ?>
							<li><p>没有未读的短信息</p></li>
						<?php } ?></ul>
					</div>
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
					<li><span>手机</span><?php echo (($tmp = @$_smarty_tpl->getVariable('profile')->value['phone'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
				</ul>
				<p><a href="home.php?action=edit">修改>></a></p>
				<?php }else{ ?><p>您还没有填写联系信息，这可能造成他人无法直接与您取得联系</p>
				<p><a href="home.php?action=edit">现在填写>></a></p><?php }?>				
			</div>
			<div class="contentLeft">
				<div id="listbox">
					<h3>发布的物品信息</h3>
					<!-- item-list -->
					<ul id="itemlist">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
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