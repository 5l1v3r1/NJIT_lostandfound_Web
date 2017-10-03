<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 06:58:16
         compiled from ".\templates\item_null.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2772858e64978dea956-56073817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '095f295241731f29e34aec8bf55175e1c74d528b' => 
    array (
      0 => '.\\templates\\item_null.tpl',
      1 => 1490457185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2772858e64978dea956-56073817',
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
	<title>找不到物品</title>
	<script type="text/javascript" src="js/item_found.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<h3>物品信息</h3>
				<p><?php echo (($tmp = @$_smarty_tpl->getVariable('msg')->value)===null||$tmp==='' ? "物品不存在或已被删除！" : $tmp);?>
</p>
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>