<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 07:23:18
         compiled from ".\templates\found.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154858e11fd5d90182-71204603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd575297227588f94c9f0f2ed4ac7df5990b3af45' => 
    array (
      0 => '.\\templates\\found.tpl',
      1 => 1490457137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154858e11fd5d90182-71204603',
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
	<title>招领启事</title>
	<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript"><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><?php if ($_smarty_tpl->tpl_vars['item']->value['hasmap']){?>mapdatas.push(["<?php echo $_smarty_tpl->tpl_vars['item']->value['mapdata'];?>
",<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,"<?php echo $_smarty_tpl->tpl_vars['item']->value['what'];?>
"]);<?php }?><?php }} ?></script>
	<script type="text/javascript" src="js/found.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="post">
					<ul><li><a href="#tabs-1">快速提交</a></li></ul>
					<div id="tabs-1">
						<form action="post.php?type=found&action=quickpost" method="post">
							<label for="itemname">物品名称：</label><input type="text" name="itemname" id="itemname" />
							<input type="submit" id="submitbtn" value="发布招领信息"/>
						</form>
					</div>
				</div>
			</div>
			<div class="contentLeft">
				<div id="listbox">
					<h3>招领启事</h3>
					<?php $_template = new Smarty_Internal_Template("item_list.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('type',"found"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
					<div id="pagenav"><?php echo $_smarty_tpl->getVariable('pagenav')->value;?>
</div>
				</div>
			</div>
			<div class="contentRight"> 
				<h3>地图</h3> 
				<div id="items_map_canvas"></div>
			</div> 
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>