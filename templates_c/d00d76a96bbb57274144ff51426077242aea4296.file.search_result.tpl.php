<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 07:23:16
         compiled from ".\templates\search_result.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1116458e218f0bcd8d8-20235222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd00d76a96bbb57274144ff51426077242aea4296' => 
    array (
      0 => '.\\templates\\search_result.tpl',
      1 => 1490457222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1116458e218f0bcd8d8-20235222',
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
	<title>搜索物品</title>
	<script type="text/javascript"></script>
	<script type="text/javascript" src="js/search.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="listbox">
					<h3>搜索结果</h3>
					<p id="warning"><?php echo $_smarty_tpl->getVariable('msg')->value;?>
</p>
					<!-- item-list -->
					<ul id="itemlist">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?><li class="item">
						有人<?php if ($_smarty_tpl->tpl_vars['item']->value['where']!="#"){?>在 <a href="search.php?where=<?php echo $_smarty_tpl->tpl_vars['item']->value['where'];?>
" class="where"><?php echo $_smarty_tpl->tpl_vars['item']->value['where'];?>
</a> <?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['type']){?>捡到了<?php }else{ ?>丢失了<?php }?> <a href="<?php if ($_smarty_tpl->tpl_vars['item']->value['type']){?>found<?php }else{ ?>lost<?php }?>.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="what"><?php echo $_smarty_tpl->tpl_vars['item']->value['what'];?>
</a> “<?php echo $_smarty_tpl->tpl_vars['item']->value['detail'];?>
”
						<?php if ($_smarty_tpl->tpl_vars['item']->value['image']){?><img src="images/image.png" title="有图有真相" /><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['item']->value['hasmap']){?><img src="images/map.png" title="有地图" /><?php }?>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['posttime'];?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value['tag']){?>标签[<a href="?tag=<?php echo $_smarty_tpl->tpl_vars['item']->value['tag'];?>
" class="tag"><?php echo $_smarty_tpl->tpl_vars['item']->value['tag'];?>
</a>]<?php }?></p></li>
					<?php }} else { ?>
					<li><p>什么东西也没有！</p></li>
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